<?php

require_once "AppController.php";
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    private $user_repository;

    public function __construct()
    {
        parent::__construct();
        $this->user_repository = new UserRepository();
    }

    public function login()
    {
        if($this->isGet()) { //!$this->isPost()
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = sha1($_POST['password']);

        $user = $this->user_repository->getUser($email);
        //$user = new User("lukasmix06@gmail.com","kopytko","Lukasz","Jasielski");

        if(!$user) {
            return $this->render('login', ['messages' => ["Taki użytkownik nie istnieje!"]]);
        }

        if($user->getEmail() != $email) {
            return $this->render("login", ['messages' => ["Nie ma użytkownika o podanym emailu!"]]);
        }

        if($user->getPassword() != $password) {
            return $this->render("login", ['messages' => ["Złe hasło!"]]);
        }

        // return $this->render('activities');
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/activities");
    }


    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Hasła muszą być takie same!']]);
        }

        $user = new User($email, sha1($password), $name, $surname, $phone);

        $this->user_repository->addUser($user);

        return $this->render('login', ['messages' => ['Gratulacje, zostałeś nowym użytkownikiem!']]);
    }
}
<?php

require_once "AppController.php";
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function login() {

        $user_repository = new UserRepository();

        if($this->isGet()) { //!$this->isPost()
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $user_repository->getUser($email);
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
}
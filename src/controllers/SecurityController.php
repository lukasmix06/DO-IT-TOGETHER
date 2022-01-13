<?php

require_once "AppController.php";
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController
{
    public function login() {
        $my_user = new User("lukasmix06@gmail.com","kopytko","Lukasz","Jasielski");

        if($this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        if($my_user->getEmail() != $email) {
            return $this->render("login", ['messages' => ["Nie ma użytkownika o podanym emailu!"]]);
        }

        if($my_user->getPassword() != $password) {
            return $this->render("login", ['messages' => ["Złe hasło!"]]);
        }

        // return $this->render('activities');
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/activities");
    }
}
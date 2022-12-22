<?php

require_once "AppController.php";
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class UserController extends AppController
{

    private $user_repository;

    public function __construct()
    {
        parent::__construct();
        $this->user_repository = new UserRepository();
    }

    public function profile()
    {
        session_start();
        if($this->isPost()) {
            return $this->render('profile');
        }

        $userID = $_SESSION['user'];
        //var_dump($userID);
        $profile = $this->user_repository->findUserById($userID);
        //var_dump($profile);

        $this->render('profile', ['profile' => $profile]);
    }



}
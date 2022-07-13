<?php

require_once "AppController.php";
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class UserController extends AppController
{

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();

    }

    public function profile()
    {
        /*if($this->isGet()) {
            return $this->render('profile')
        }*/


        $profile = AppController::getUser();
        var_dump(AppController::getUser());
        var_dump($profile);
        //$this->render('profile', ['profile' => $profile]);

    }



}
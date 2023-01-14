<?php

require_once "AppController.php";
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class UserController extends AppController
{
    const UPLOAD_DIRECTORY = "/../public/uploads/users/";
    private $user_repository;

    public function __construct()
    {
        parent::__construct();
        $this->user_repository = new UserRepository();
    }

    public function profile()
    {
        session_start();
        /*if($this->isPost()) {
            return $this->render('profile');
        }*/

        $userID = $_SESSION['user'];
        $profile = $this->user_repository->findUserById($userID);


        return $this->render('profile', ['profile' => $profile]);
    }

    public function changeUserData()
    {
        session_start();
        $userID = $_SESSION['user'];

        foreach ($_POST as $key => $value) {
            $this->user_repository->changeUserProperty($userID, $key, $value);
        }


        $profile = $this->user_repository->findUserById($userID);

        return $this->render('profile', ['profile' => $profile]);
    }

    public function changeUserPhoto()
    {
        session_start();
        $userID = $_SESSION['user'];
        $profile = $this->user_repository->findUserById($userID);

        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {

            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['file']['name']
            );

            $this->user_repository->changeUserProperty($userID, 'image', $_FILES['file']['name']);
            return $this->render('profile', ['profile' => $profile]);

        }

        return $this->render('profile', ['messages' => $this->messages, 'profile' => $profile]);
    }
}
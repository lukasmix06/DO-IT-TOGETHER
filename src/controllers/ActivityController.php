<?php

require_once "AppController.php";
require_once __DIR__.'/../models/Activity.php';
require_once __DIR__.'/../repository/ActivityRepository.php';

class ActivityController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ["image/png", 'image/jpeg'];
    const UPLOAD_DIRECTORY = "/../public/uploads/";

    private $messages = []; //będziemy tu dodawali nasze zmienne
    private $activityRepository;

    public function __construct()
    {
        parent::__construct();
        $this->activityRepository = new ActivityRepository();
    }


    public function addActivity() {

        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {

            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $activity = new Activity($_POST['title'], $_POST['description'], $_POST['place'], $_POST['sport'], $_POST['date'], $_POST['time'], $_FILES['file']['name']);
            $this->activityRepository->addActivity($activity);
            //trzeba jeszcze zaimplementować wyświetlanie projektów z bazy
            return $this->render("activities", ['messages' => $this->messages, 'activity'=>$activity]);
        }

        $this->render('add-activity', ['messages' => $this->messages]);
    }

    private function validate(array $file): bool
    {
        if($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = "File is too large for destination file system.";
            return false;
        }

        if(!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = "File type is not supported";
            return false;
        }

        return true;
    }
}
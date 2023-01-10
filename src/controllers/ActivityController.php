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


    public function activities()
    {
        session_start();

        $activities = $this->activityRepository->getActivities();
        $this->render('activities', ['activities' => $activities]);
    }

    public function getActivitiesToMap() {
        $activities = $this->activityRepository->getActivities();

        header('Content-Type: application/json; charset=utf-8');

        $returnData = [];
        foreach ($activities as $activity) {
            $returnData[] = [
                'type' => 'Feature'.$activity->getID(),
                'properties' => [
                    'description' => '<strong>'.$activity->getTitle().'</strong><p>'.$activity->getDescription().'</p>',
                    'icon' => 'marker-editor'
                ],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$activity->getLongitude(), $activity->getLatitude()]
                ]
            ];
        }

        echo json_encode($returnData);
    }

    public function addMarkerToMap() {
        header('Content-Type: application/json; charset=utf-8');

        if(isset($_POST['lat'])) {
            $returnData = [];

            $returnData[] = [
                'type' => 'Feature',
                'properties' => [
                    'description' => '', //może można całkowicie wyrzucić - sprawdzić
                    'icon' => 'marker-editor'
                ],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$_POST['lng'], $_POST['lat']]
                ]
            ];

            echo json_encode($returnData);
        }
    }

    public function addActivity() {
        session_start();

        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {

            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            list($place, $longitude, $latitude) = explode(";", $_POST['place']);
            $founderId = $_SESSION['user'];

            $activity = new Activity($_POST['title'], $_POST['description'], $place, $longitude, $latitude, $_POST['sport'], $_POST['date'], $_POST['time'], $_FILES['file']['name'], $founderId);
            $this->activityRepository->addActivity($activity);

            return $this->render("activities", ['messages' => $this->messages, 'activities' => $this->activityRepository->getActivities()]);
        }

        return $this->render('add-activity', ['messages' => $this->messages]);
    }

    public function search() //odbieranie na backendzie zapytania
    {
        $content_type = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if($content_type === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->activityRepository->getActivityByTitle($decoded['search']));
        }
    }

    public function participate(int $id) {
        $this->activityRepository->participate($id);
        http_response_code(200); //nie trzeba wysyłąć żadnej informacji zwrotnej poza tym
    }

    public function unparticipate(int $id) {
        $this->activityRepository->unparticipate($id);
        http_response_code(200);
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
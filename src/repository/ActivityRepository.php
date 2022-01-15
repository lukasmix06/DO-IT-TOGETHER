<?php

require_once "Repository.php";
require_once __DIR__.'/../models/Activity.php';

class ActivityRepository extends Repository
{
    public function getActivity(int $id): ?Activity {
        $statement = $this->database->connect()->prepare("
            SELECT * FROM activities where id = :id
            ");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $activity = $statement->fetch(PDO::FETCH_ASSOC); //dane zapisujemy jako tabela asocjacyjna

        if($activity == false) {
            return null; //zamiast zwracać null lepiej zwracać exception, który będzie odbierany w metodzie login
        }

        return new Activity (
            $activity['title'],
            $activity['description'],
            $activity['place_coordinates'],
            $activity['sport'],
            $activity['date'],
            $activity['time'],
            $activity['image']
        );

    }

    public function addActivity(Activity $activity): void
    {
        $date = new DateTime;
        $statement = $this->database->connect()->prepare('
            INSERT INTO activities (title, place_coordinates, date, time, sport, description, id_founder, created_at, image) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');

        $founder_id = 1; //pobrać wartośc na podstawie sesji zalogowanego użytkownika

        $statement->execute([
            $activity->getTitle(),
            $activity->getPlace(),
            $date->format('Y-m-d'), //do modyfikacji, docelowo $activity->getDate()
            $date->format('H:i:s'), //do modyfikacji, docelowo $activity->getTime(),
            $activity->getSport(),
            $activity->getDescription(),
            $founder_id,
            $date->format('Y-m-d'),
            $activity->getImage()
        ]);

    }
<<<<<<< HEAD
=======

    public function getActivities(): array
    {
        $result = [];

        $statement = $this->database->connect()->prepare('
            SELECT * FROM activities
        ');
        $statement->execute();
        $activities = $statement->fetchAll(PDO::FETCH_ASSOC); //zamiast samego fetch

        foreach($activities as $activity) {
            $result[] = new Activity(
                $activity['title'],
                $activity['description'],
                $activity['place_coordinates'],
                $activity['sport'],
                $activity['date'],
                $activity['time'],
                $activity['image']
            );
        }

        return $result;
    }
>>>>>>> activities
}
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
            $activity['longitude'],
            $activity['latitude'],
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
            INSERT INTO activities (title, date, time, place, longitude, latitude, sport, description, id_founder, created_at, image) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');

        $statement->execute([
            $activity->getTitle(),
            $activity->getDate(),//$date->format('Y-m-d'), //do modyfikacji, docelowo $activity->getDate()
            $activity->getTime(),//$date->format('H:i:s'), //do modyfikacji, docelowo $activity->getTime(),
            $activity->getPlace(),
            $activity->getLongitude(),
            $activity->getLatitude(),
            $activity->getSport(),
            $activity->getDescription(),
            $activity->getUserID(),
            $date->format('Y-m-d'),
            $activity->getImage()
        ]);
    }

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
                $activity['place'],
                $activity['longitude'],
                $activity['latitude'],
                $activity['sport'],
                $activity['date'],
                $activity['time'],
                $activity['image'],
                $activity['participants'],
                $activity['participants_max'],
                $activity['id'],
                $activity['id_founder']
            );
        }

        return $result;
    }

    public function getActivityByTitle(string $searchedFraze)
    {
        $searchedFraze = '%'.strtolower($searchedFraze).'%';
        //dać wyszukiwanie po większej ilosci parametrów
        $statement = $this->database->connect()->prepare('
            SELECT * FROM activities WHERE LOWER(title) LIKE :search OR 
                                           LOWER(description) LIKE :search OR
                                           LOWER(place) LIKE :search
        ');
        $statement->bindParam(':search', $searchedFraze, PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function participate(int $id_activity, int $id_user)
    {
        $statement1 = $this->database->connect()->prepare('
            UPDATE activities SET participants = participants + 1 WHERE id = :id_activity
        ');

        $statement1->bindParam(':id_activity', $id_activity, PDO::PARAM_INT);
        $statement1->execute();

        $statement2 = $this->database->connect()->prepare('
            INSERT INTO users_activities(id_user, id_activity) VALUES (:id_user, :id_activity)
        ');

        $statement2->bindParam(':id_activity', $id_activity, PDO::PARAM_INT);
        $statement2->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $statement2->execute();
    }

    public function unparticipate(int $id_activity, int $id_user)
    {
        $statement1 = $this->database->connect()->prepare('
            UPDATE activities SET participants = participants - 1 WHERE id = :id_activity AND participants>=0        
        ');

        $statement1->bindParam(':id_activity', $id_activity, PDO::PARAM_INT);
        $statement1->execute();

        $statement2 = $this->database->connect()->prepare('
            DELETE FROM users_activities WHERE id_activity = :id_activity and id_user = :id_user
        ');

        $statement2->bindParam(':id_activity', $id_activity, PDO::PARAM_INT);
        $statement2->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $statement2->execute();
    }

    public function getActivitiesIdByUser(int $id_user): array
    {
        $result = [];

        $statement = $this->database->connect()->prepare('
            SELECT id_activity FROM users_activities WHERE id_user = :id_user
        ');
        $statement->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $statement->execute();
        $activitiesId = $statement->fetchAll(PDO::FETCH_ASSOC); //zamiast samego fetch

        foreach($activitiesId as $activityId) {
            $result[] = $activityId["id_activity"];
        }

        return $result;
    }
}
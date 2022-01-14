<?php

require_once "Repository.php";
require_once __DIR__.'/../models/User.php';
//* FROM Users WHERE email = :email
class UserRepository extends Repository
{
    public function getUser(string $email): ?User {
        $statement = $this->database->connect()->prepare("
            SELECT * FROM users where email = :email
            ");
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC); //dane zapisujemy jako tabela asocjacyjna

        if($user == false) {
            return null; //zamiast zwracać null lepiej zwracać exception, który będzie odbierany w metodzie login
        }

        return new User (
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname']
        );

    }
}
<?php

require_once "Repository.php";
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User {
        $statement = $this->database->connect()->prepare("
            SELECT * FROM users u LEFT JOIN users_details ud 
            ON u.id_user_details = ud.id where email = :email
        ");
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC); //dane zapisujemy jako tabela asocjacyjna

        if($user == false) {
            return null; //zamiast zwracać null lepiej zwracać exception, który będzie odbierany w metodzie login
        }

        return new User(
            $user['id'],
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname']
        );
    }

    public function findUserById(int $id): ?User {
        $statement = $this->database->connect()->prepare("
            SELECT * FROM users u LEFT JOIN users_details ud 
            ON u.id_user_details = ud.id where u.id = :id
        ");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC); //dane zapisujemy jako tabela asocjacyjna

        if($user == false) {
            return null; //zamiast zwracać null lepiej zwracać exception, który będzie odbierany w metodzie login
        }

        return new User(
            $user['id'],
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['phone'],
            $user['gender'],
            $user['age'],
            $user['place_coordinates'],
            $user['self_description'],
            $user['points'],
            $user['image']
        );
    }

    public function addUser(User $user)
    {
        $statement = $this->database->connect()->prepare('
            INSERT INTO users_details (name, surname, phone)
            VALUES (?, ?, ?)
        ');

        $statement->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getPhone()
        ]);

        $statement = $this->database->connect()->prepare('
            INSERT INTO users (email, password, id_user_details)
            VALUES (?, ?, ?)
        ');

        $statement->execute([
            $user->getEmail(),
            $user->getPassword(),
            $this->getUserDetailsId($user)
        ]);
    }

    public function getUserDetailsId(User $user): int
    {
        $statement = $this->database->connect()->prepare('
            SELECT * FROM users_details WHERE name = :name AND surname = :surname AND phone = :phone
        ');
        $statement->bindParam(':name', $user->getName(), PDO::PARAM_STR);
        $statement->bindParam(':surname', $user->getSurname(), PDO::PARAM_STR);
        $statement->bindParam(':phone', $user->getPhone(), PDO::PARAM_STR);
        $statement->execute();

        $data = $statement->fetch(PDO::FETCH_ASSOC);
        return $data['id'];
    }

    public function changeUserProperty(int $id, string $property, string $value) {
        if($property == "email")
            $sql = "UPDATE users SET $property = :value where id = :id";
        else
            $sql = "UPDATE users_details ud SET $property = :value FROM users u where u.id = :id AND u.id_user_details = ud.id";

        $statement = $this->database->connect()->prepare($sql);
        $statement->bindParam(':value', $value, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }
}


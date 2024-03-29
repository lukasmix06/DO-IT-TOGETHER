<?php


class User
{
    private $id;
    private $email;
    private $password;
    private $name;
    private $surname;
    private $phone;
    private $gender;
    private $age;
    private $self_description;
    private $points;
    private $image;

    public function __construct(int $id, string $email, string $password, string $name, string $surname, string $phone = NULL,
                                string $gender = NULL, int $age = NULL, string $self_description = NULL, int $points = NULL, string $image = NULL)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->gender = $gender;
        $this->age = $age;
        $this->self_description = $self_description;
        $this->points = $points;
        $this->image = $image;
    }

    public function getID(): int
    {
        return $this->id;
    }

    public function setID(int $id)
    {
        $this->id = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender): void
    {
        $this->gender = $gender;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age): void
    {
        $this->age = $age;
    }

    public function getSelfDescription()
    {
        return $this->self_description;
    }


    public function setSelfDescription($self_description): void
    {
        $this->self_description = $self_description;
    }

    public function getPoints()
    {
        return $this->points;
    }

    public function setPoints($points): void
    {
        $this->points = $points;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }
}
<?php


class Activity
{
    private $title;
    private $description;
    private $longitude;
    private $latitude;
    private $sport;
    private $date;
    private $time;
    private $image;
    private $participants;
    private $participants_max;
    private $id;
    private $place;
    private $id_founder;


    public function __construct($title, $description, $place, $longitude, $latitude, $sport, $date, $time, $image, $participants, $participants_max, $id, $id_founder)
    {
        $this->title = $title;
        $this->description = $description;
        $this->place = $place;
        $this->longitude = $longitude;
        $this->latitude = $latitude;
        $this->sport = $sport;
        $this->date = $date;
        $this->time = $time;
        $this->image = $image;
        $this->participants = $participants;
        $this->participants_max = $participants_max;
        $this->id = $id;
        $this->id_founder = $id_founder;
    }

    public function getPlace()
    {
        return $this->place;
    }

    public function setPlace($place): void
    {
        $this->place = $place;
    }

    public function getTitle(): string
    {
        return $this->title;
    }


    public function setTitle(string $title)
    {
        $this->title = $title;
    }


    public function getDescription(): string
    {
        return $this->description;
    }


    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude)
    {
        $this->longitude = $longitude;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude)
    {
        $this->latitude = $latitude;
    }

    public function getSport(): string
    {
        return $this->sport;
    }

    public function setSport(string $sport)
    {
        $this->sport = $sport;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date)
    {
        $this->date = $date;
    }

    public function getTime(): string
    {
        return $this->time;
    }

    public function setTime(string $time)
    {
        $this->time = $time;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }

    public function getParticipants()
    {
        return $this->participants;
    }

    public function setParticipants($participants): void
    {
        $this->participants = $participants;
    }


    public function getParticipantsMax()
    {
        return $this->participants_max;
    }

    public function setParticipantsMax($participants_max): void
    {
        $this->participants_max = $participants_max;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getIdFounder()
    {
        return $this->id_founder;
    }

    public function setIdFounder($id_founder): void
    {
        $this->id_founder = $id_founder;
    }

}
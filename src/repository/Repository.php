<?php

require_once __DIR__.'/../../Database.php';

class Repository //zapenia połączenie z bazą danych
{
//można zastosować jakiś wzorzec projektowy np singleton
    protected $database;

    public function __construct() {
        $this->database = new Database();
    }

}
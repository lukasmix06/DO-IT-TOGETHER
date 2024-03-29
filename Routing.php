<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/ActivityController.php';
require_once 'src/controllers/UserController.php';

class Routing {
    public static $routes; //tablica przechowująca url oraz odpowiednio do niego otwartego kontrolera

    public static function get($url, $controller) {
        self::$routes[$url] = $controller;
    }

    public static function post($url, $controller) {
        self::$routes[$url] = $controller;
    }





    public static function run ($url) {
        $urlParts = explode("/", $url);
        $action = $urlParts[0];

        if (!array_key_exists($action, self::$routes)) { //sprawdzamy, czy istnieje klucz
            die("Wrong url!"); //die zatrzyma działanie interpretera
        }

        $controller = self::$routes[$action];
        $object = new $controller; //pod controller będzie string, można tak tworzyć obiekty w php
        
        $action = $action ?: 'index';

        $id = $urlParts[1] ?? ''; //sprawdzamy, czy nie jest nullem
        $object->$action($id);
    }
}








?>
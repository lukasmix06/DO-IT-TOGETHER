<?php

require 'Routing.php';

$path = $_SERVER['REQUEST_URI']; //ścieżka, którą wysłąła do nas przeglądarka na serwer
$path = trim($path, '/'); //chemy się pozbyć pierwszego slasha
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('activities', 'ActivityController');
Routing::post('login', 'SecurityController');
Routing::post('addActivity', 'ActivityController');
Routing::post('register', 'SecurityController');
Routing::post('search', 'ActivityController');
Routing::get('participate','ActivityController');
Routing::get('unparticipate','ActivityController');
Routing::post('profile', 'UserController');
Routing::post('logout', 'SecurityController');
Routing::post('getActivitiesToMap', 'ActivityController');
Routing::post('addMarkerToMap', 'ActivityController');
Routing::post('changeUserData', 'UserController');
Routing::post('changeUserPhoto','UserController');
Routing::get('users', 'UserController');

//TODO - nie dodano funkcji validate() do routingu!!!!

Routing::run($path);

#NA TYM ETAPIE NIE MA ZNACZENIA CZY POST CZY GET, BO OBIE FUNKCJE ROBIĄ DOKŁADNIE TO SAMO, CO CHYBA NIE JEST DOBRE
?>














<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);


require_once '../vendor/autoload.php';
require_once __DIR__.'/services/ToursService.class.php';

Flight::register('toursService', 'ToursService');
require_once __DIR__.'/routes/ToursRoutes.php';
//CRUD operations for users entity

/**
* List all users
*/








Flight::start();

 ?>

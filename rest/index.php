<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);


require_once '../vendor/autoload.php';
require_once __DIR__.'/services/ToursService.class.php';
require_once __DIR__.'/dao/UserDao.class.php';


Flight::register('toursService', 'ToursService');
Flight::register('userDao', 'UserDao');


require_once __DIR__.'/routes/ToursRoutes.php';
require_once __DIR__.'/routes/UserRoutes.php';

Flight::start();

 ?>

<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


require_once '../vendor/autoload.php';
require_once __DIR__.'/services/ToursService.class.php';
require_once __DIR__.'/dao/UserDao.class.php';


Flight::register('toursService', 'ToursService');
Flight::register('userDao', 'UserDao');


// middleware method for login
Flight::route('/*', function(){
  //return TRUE;
  //perform JWT decode
  $path = Flight::request()->url;
  if ($path == '/login') return TRUE; // exclude login route from middleware
  $headers = getallheaders();
  if (@!$headers['Authorization']){
    Flight::json(["message" => "Authorization is missing"], 403);
    return FALSE;
  }else{
    try {
      $decoded = (array)JWT::decode($headers['Authorization'], new Key("example_key", 'HS256'));
      Flight::set('user', $decoded);
      return TRUE;
    } catch (\Exception $e) {
      Flight::json(["message" => "Authorization token is not valid"], 403);
      return FALSE;
    }
  }
});


require_once __DIR__.'/routes/ToursRoutes.php';
require_once __DIR__.'/routes/UserRoutes.php';

Flight::start();

 ?>

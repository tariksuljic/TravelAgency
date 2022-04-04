<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require 'dao/travelAgencyDao.class.php';
require '../vendor/autoload.php';

Flight::register('travelAgency', 'travelAgencyDao');

//CRUD operations for users entity

/**
* List all users
*/

Flight::route('GET /users',function(){

  Flight::json(Flight::travelAgency()->get_all());

});


/**
*List individual users
*/
Flight::route('GET /users/@id',function($id){

  Flight::json(Flight::travelAgency()->get_by_id($id));

});

/**
* add users
*/
Flight::route('POST /users',function(){

  Flight::json(Flight::travelAgency()->add(Flight::request()->data->getData()));

});



/**
*update users

*/
Flight::route('PUT /users/@id',function($id){

  $data=Flight::request()->data->getData();
  $data['id']=$id;
  Flight::json(Flight::travelAgency()->update($data));

});


/**
* delete user

*/
Flight::route('DELETE /users/@id',function($id){
  Flight::travelAgency()->delete($id);
  Flight::json(["message"=>"deleted"]);

});




Flight::start();

 ?>

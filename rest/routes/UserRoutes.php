<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;


//list all tours
Flight::route('POST /login',function(){
      $login = Flight::request()->data->getData();
      $user = Flight::userDao()->get_user_by_email($login['email']);
      if(isset($user['iduser'])){
        if($user['password'] == md5($login['password'])){
          unset($user['password']);
          $jwt = JWT::encode($user, "example_key", 'HS256');
          Flight::json(["token"=>$jwt]);
        } else {
          Flight::json(["message"=>"Wrong password"],404);
        }

      }else {
        Flight::json(["message"=>"User doesn't exist"],404);
      }
      /*$payload = [
         'iss' => 'http://example.org',
         'aud' => 'http://example.com',
         'iat' => 1356999524,
         'nbf' => 1357000000
      ];*/

      //$decoded = JWT::decode($jwt, new Key($key, 'HS256'));



});



 ?>

<?php


  Flight::route('GET /tours',function(){

    Flight::json(Flight::toursService()->get_all());

  });



 ?>

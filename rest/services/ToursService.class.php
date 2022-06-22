<?php
require_once __DIR__.'/BaseService.class.php';
require_once __DIR__.'/../dao/ToursDao.class.php';


class ToursService extends BaseService{


   public function __construct(){
     parent::__construct(new ToursDao());
   }


}


 ?>

<?php
abstract class BaseService {

  protected $dao;

  public function __construct($dao){
    $this->dao = $dao;
  }

  public function get_all(){
    return $this->dao->get_all();
  }



}
?>

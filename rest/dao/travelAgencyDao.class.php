<?php

class travelAgencyDao{


  private $conn;

//constructor for dao class

  public function __construct(){

    $servername="127.0.0.1:3308";
    $username="travelAgency";
    $password="travelAgency123";
    $schema="travelagency";

    $this->conn=new PDO("mysql:host=$servername;dbname=$schema",$username,$password);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);




  }

  //Method used to read all objects from database

    public function get_all(){

    $stmt=$this->conn->prepare("SELECT * FROM users");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  //Method used to add user to the database
  public function add($users){
    $stmt=$this->conn->prepare("INSERT INTO users (description,created) VALUES(:description,:created)");
    $stmt->execute($users);
    return $users;

  }

  //Method to delete record from the database
  public function delete($id){

    $stmt=$this->conn->prepare("DELETE FROM users WHERE id=:id");
    $stmt->bindParam(':id',$id);
    $stmt->execute();

  }

  //Method to update user record

  public function update($id,$description,$created){

    $stmt=$this->conn->prepare("UPDATE users SET description=:description,created=:created WHERE id=:id");
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':description',$description);
    $stmt->bindParam(':created',$created);
    $stmt->execute();

  }

//Method to get user by id
  public function get_by_id($id){

    $stmt=$this->conn->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return @reset($result);


  }


}








 ?>

<?php

class travelAgencyDao{


  private $conn;

//constructor for dao class

  public function __construct(){

    $servername="sql11.freemysqlhosting.net";
    $username="sql11482437";
    $password="WkH8WvvA9Q";
    $schema="sql11482437";

    $this->conn=new PDO("mysql:host=$servername;dbname=$schema",$username,$password);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);




  }

  //Method used to read all objects from database

    public function get_all(){

    $stmt=$this->conn->prepare("SELECT * FROM Users");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  //Method used to add user to the database
  public function add($description,$created){
    $stmt=$this->conn->prepare("INSERT INTO Users (description,created) VALUES(:description,:created)");
    $stmt->execute(['description'=>$description,'created'=>$created]);
  }

  //Method to delete record from the database
  public function delete($id){

    $stmt=$this->conn->prepare("DELETE FROM Users WHERE id=:id");
    $stmt->bindParam(':id',$id);
    $stmt->execute();

  }

  //Method to update user record

  public function update($id,$description,$created){

    $stmt=$this->conn->prepare("UPDATE Users SET description=:description,created=:created WHERE id=:id");
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':description',$description);
    $stmt->bindParam(':created',$created);
    $stmt->execute();

  }


}








 ?>

<?php
class User{

 private $db;
 private $connect;

 public function __construct($db){
 $this->db = $db;
 $this->connect = $this->db->prepare("select Mail, idQualification, MDP, id , confirm from Employe where Mail=:Mail");
 }


 public function connect($email){
 $unUser = $this->connect->execute(array(':Mail'=>$email));
 if ($this->connect->errorCode()!=0){
 print_r($this->connect->errorInfo());
 }
 return $this->connect->fetch();
 }
}
?>
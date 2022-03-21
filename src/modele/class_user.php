<?php
class User{

 private $db;
 private $connect;
 private $selectById;

 public function __construct($db){
 $this->db = $db;
 $this->connect = $this->db->prepare("select Mail, idQualification, MDP, id, confirm from Employe where Mail=:Mail");
 $this->selectById  =  $db->prepare("select id, Nom, Prenom, Mail, Date_de_naissance  from  Employe  where id=:id");
 }


    public function connect($email){
        $unUser = $this->connect->execute(array(':Mail'=>$email));
        if ($this->connect->errorCode()!=0){
        print_r($this->connect->errorInfo());
        }
        return $this->connect->fetch();
    }

    public function selectById($id){
        $this->selectById->execute(array(':id'=>$id));
        if ($this->selectById->errorCode()!=0){
            print_r($this->selectById->errorInfo());  
        }
        return $this->selectById->fetch();
    }
}
?>
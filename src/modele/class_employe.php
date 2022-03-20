<?php
class Employe{

 private $db;
 private $insert; 
 private $select;
 private $confirmation;
 


 public function __construct($db){
 $this->db = $db;
 $this->insert = $this->db->prepare("INSERT INTO `Employe`(`Nom`, `Prenom`, `Date_de_naissance`, `Telephone`, `Mail`, `MDP`, `Adresse`, `Code_postal`, `Pays`, `Permis`, `Date_embauche`, `Num_secu`, `idQualification`, `Photo`, `confirmkey`) VALUES (:Nom ,:Prenom, :Date_de_naissance, :Telephone, :Mail, :MDP, :Adresse, :Code_postal, :Pays, :Permis, :Date_embauche, :Num_secu, :idQualification, :Photo, :confirmkey)"); 
 $this->select = $this->db->prepare("SELECT * FROM `Employe` WHERE Nom = :Nom AND Prenom = :Prenom");
 
 //à fix
 $this->confirmation = $this->db->prepare("UPDATE `Employe` SET `confirm`= 1  WHERE Nom =':Nom' AND confirmkey = :confirmkey");
}


 public function insert($inputNom, $inputPrenom, $inputDateNaissance, $inputTel, $inputEmail, $inputPassword, $inputAdresse, $inputCodePostal, $inputPays, $inputPermis, $inputDateEmbauche, $inputNumSecu, $inputQualification, $cheminPhoto, $key){ 
 $r = true;
 $this->insert->execute(array(':Nom'=>$inputNom, ':Prenom'=>$inputPrenom, ':Date_de_naissance'=>$inputDateNaissance, ':Telephone'=>$inputTel, ':Mail'=>$inputEmail, ':MDP'=>$inputPassword, ':Adresse'=>$inputAdresse, ':Code_postal'=>$inputCodePostal, ':Pays'=>$inputPays, ':Permis'=>$inputPermis, ':Date_embauche'=>$inputDateEmbauche, ':Num_secu'=>$inputNumSecu, ':idQualification'=>$inputQualification, ':Photo'=>$cheminPhoto, ':confirmkey'=>$key));
 if ($this->insert->errorCode()!=0){
 print_r($this->insert->errorInfo());
 $r=false;
 }
 return $r;
 }

 public function select($Nom , $Prenom){
    $this->select->execute(array(':Nom'=>$Nom, ':Prenom'=>$Prenom));
    if ($this->select->errorCode()!=0){
    print_r($this->select->errorInfo());
    }
    return $this->select->fetchAll();
    } 


    public function confirmation($Nom, $key){ 
        $r = true;
        $this->confirmation->execute(array(':Nom'=>$Nom,':confirmkey'=>$key));
        if ($this->confirmation->errorCode()!=0){
        print_r($this->confirmation->errorInfo());
        $r=false;
        }
        return $r;
    }

   
}

<?php
class Employe
{
    private $insert;
    private $select;
    private $update;
    private $selectById;
    private $delete; 

    public function __construct($db)
    {
        $this->db = $db;
        $this->insert = $this->db->prepare("INSERT INTO `Employe`(`Nom`, `Prenom`, `Date_de_naissance`, `Telephone`, `Mail`, `MDP`, `Adresse`, `Code_postal`, `Pays`, `Permis`, `Date_embauche`, `Num_secu`, `idQualification`, `Photo`, `confirmkey`) VALUES (:Nom ,:Prenom, :Date_de_naissance, :Telephone, :Mail, :MDP, :Adresse, :Code_postal, :Pays, :Permis, :Date_embauche, :Num_secu, :idQualification, :Photo, :confirmkey)");
        $this->select = $this->db->prepare("SELECT * FROM `Employe` WHERE true");
        $this->selectById = $db->prepare("SELECT id, Mail, Nom, Prenom, idQualification from Employe WHERE id=:id");
        $this->delete = $db->prepare("DELETE FROM Employe WHERE id = :id");

        $this->update = $db->prepare("UPDATE Employe set Nom =:Nom, Prenom =:Prenom, idQualification =:idQualification  WHERE id =:id");



        $this->confirmation = $this->db->prepare("UPDATE `Employe` SET `confirm`= 1  WHERE Nom =':Nom' AND confirmkey = :confirmkey");
    }

    public function update($id, $role, $nom, $prenom)
    {
        $r = true;
        var_dump("id : $id", "role : $role", "nom : $nom","prenom : $prenom");
        $this->update->execute(array(
            ':id' => $id, ':idQualification' => $role, ':Nom' => $nom,
            ':Prenom' => $prenom
        ));
        if ($this->update->errorCode() != 0) {
            print_r($this->update->errorInfo());
            $r = false;
        }
        return $r;
    }


    public function selectById($id)
    {
        $this->selectById->execute(array(':id' => $id));
        if ($this->selectById->errorCode() != 0) {
            print_r($this->selectById->errorInfo());
        }
        return $this->selectById->fetch();
    }


    public function insert($inputNom, $inputPrenom, $inputDateNaissance, $inputTel, $inputEmail, $inputPassword, $inputAdresse, $inputCodePostal, $inputPays, $inputPermis, $inputDateEmbauche, $inputNumSecu, $inputQualification, $cheminPhoto, $key)
    {
        $r = true;
        $this->insert->execute(array(':Nom' => $inputNom, ':Prenom' => $inputPrenom, ':Date_de_naissance' => $inputDateNaissance, ':Telephone' => $inputTel, ':Mail' => $inputEmail, ':MDP' => $inputPassword, ':Adresse' => $inputAdresse, ':Code_postal' => $inputCodePostal, ':Pays' => $inputPays, ':Permis' => $inputPermis, ':Date_embauche' => $inputDateEmbauche, ':Num_secu' => $inputNumSecu, ':idQualification' => $inputQualification, ':Photo' => $cheminPhoto, ':confirmkey' => $key));
        if ($this->insert->errorCode() != 0) {
            print_r($this->insert->errorInfo());
            $r = false;
        }
        return $r;
    }

    public function select()
    {
        $this->select->execute();
        if ($this->select->errorCode() != 0) {
            print_r($this->select->errorInfo());
        }
        return $this->select->fetchAll();
    }

    public function confirmation($Nom, $key)
    {
        $r = true;
        $this->confirmation->execute(array(':Nom' => $Nom, ':confirmkey' => $key));
        if ($this->confirmation->errorCode() != 0) {
            print_r($this->confirmation->errorInfo());
            $r = false;
        }
        return $r;
    }
    public function delete($id){
        $r = true;
        $this->delete->execute(array(':id'=>$id));
        if ($this->delete->errorCode()!=0){
        print_r($this->delete->errorInfo());
        $r=false;
        }
        return $r;
    }
}

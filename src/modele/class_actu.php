<?php
class Actu
{
    private $selectById;
    private $selectByOwner;
    private $select;
    private $insert;
    private $update;
    private $delete;

    public function __construct($db)
    {
        $this->select = $db->prepare("SELECT Actualite.id,titre, contenu, Nom, date
        FROM Actualite
        INNER JOIN Employe ON Actualite.idAuteur = Employe.id");

        $this->insert = $db->prepare("INSERT INTO Actualite(titre, contenu, idAuteur, date) VALUES (:titre,:contenu,:idAuteur,:dateT)");

        $this->selectById = $db->prepare("SELECT id, titre, contenu, date from  Actualite  where idAuteur=:id");

        $this->selectByOwner = $db->prepare("SELECT * from  Actualite where Actualite.idAuteur = :id");

        $this->update = $db->prepare("update  Actualite  set  titre=:titre,  contenu=:contenu, date=:date where id=:id");

        $this->delete = $db->prepare("delete from Actualite where id=:id");

    }

    public function insert($titre, $contenu, $idAuteur, $date)
    {
        $r = true;
        $this->insert->execute(array(':titre' => $titre, ':contenu' => $contenu, ':idAuteur' => $idAuteur, ':dateT' => $date));
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

    public function selectByOwner($id)
    {
        $this->selectByOwner->execute(array(':id'=>$id));
        if ($this->selectByOwner->errorCode() != 0) {
            print_r($this->selectByOwner->errorInfo());
        }
        return $this->selectByOwner->fetchAll();
    }

    public function selectById($id){
        $this->selectById->execute(array(':id'=>$id));
        if ($this->selectById->errorCode()!=0){
            print_r($this->selectById->errorInfo());  
        }
        return $this->selectById->fetch();
    }

    public function delete($id)
    {
        $r = true;
        $this->delete->execute(array(':id' => $id));
        if ($this->delete->errorCode() != 0) {
            print_r($this->delete->errorInfo());
            $r = false;
        }
        return $r;
    }

    public function update($id, $titre, $contenu, $date)
    {
        $r = true;
        $this->update->execute(array(':id' => $id, ':titre' => $titre, ':contenu' => $contenu, ':date' => $date));

        if ($this->update->errorCode() != 0) {
            print_r($this->update->errorInfo());
            $r = false;
        }
        return $r;
    }
}

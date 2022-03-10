<?php
class Actu
{
    private $select;
    private $insert;

    public function __construct($db)
    {
        $this->select = $db->prepare("SELECT titre, contenu, Nom, date
        FROM Actualite
        INNER JOIN Employe ON Actualite.idAuteur = Employe.id");
        $this->insert = $db->prepare("INSERT INTO Actualite(titre, contenu, idAuteur, date) VALUES (:titre,:contenu,:idAuteur,:dateT)");
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
}

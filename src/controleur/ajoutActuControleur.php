<?php
function AjoutActuControleur($twig,$db){

    // si tu est connecté tu affiche la page d'ajout d'actu, sinon tu affiche la page info.
    if(!isset($_SESSION['id'])){
        echo $twig->render('infoConnexion.html.twig');
    }else {

    if(isset($_POST['btAjout'])){
        $titre = $_POST['inputTitre'];
        $contenu = $_POST['inputContenu'];
        $idAuteur = $_SESSION['id'];
        $date = date("Y-m-d");
        $actu = new Actu($db);
        // var_dump($titre,$contenu, $idAuteur,$date,);
        $exec = $actu->insert($titre, $contenu, $idAuteur, $date);
    }
    echo $twig->render('employes/ajoutActu.html.twig');
}
}

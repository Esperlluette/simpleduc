<?php
function AjoutActuControleur($twig,$db){

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

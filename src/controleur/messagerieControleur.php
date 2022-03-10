<?php

function envoyerMessageGControleur($db){

    if(isset($_POST['btMessageG'])){
        $utilisateur = new Message($db);
        $utilisateur['id'] = $_SESSION["idEmploye"];
        $utilisateur['contenu'] = $_POST['exampleTextarea'];
        //$exec = $utilisateur->insert($utilisateur['id'],0,"Gen",$utilisateur['contenu'],0,date("d-m-Y"),null,0);
        $exec = $utilisateur->insert(1,2,"*","Test",0,date("d-m-Y"),null,0);
        if (!$exec){
            $form['valide'] = false;
            $form['message'] = 'Problème d\'insertion dans la table utilisateur ';
        }else{
            header("Location:index.php?page=messagerie");
        }
        
    }
    echo $twig->render('messagerie.html.twig',array('form'=>$form));
}

?>
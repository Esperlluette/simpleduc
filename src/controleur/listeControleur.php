<?php

function listeControleur($db, $twig)
{
    
    // si l'id de session est défini, je regarde s'il est égal à 3 (RH) ou 5 (Directeur), si oui j'affiche la liste des employés. 
    // si l'id de session est défini, je regarde s'il est égal à 3 (RH) ou 5 (Directeur), si non j'affiche l'accueil.
    // si l'id de session n'est pas defini je renvoie vers la page info connexion.
    
    
    if (!isset($_SESSION['id'])) {
        echo $twig->render('infoConnexion.html.twig');
    } else {

        var_dump($_SESSION);
        if ($_SESSION['role'] == 3 || $_SESSION == 5) {

            // je dev ici 
                $form = array(); 
                $employe = new Employe($db);
                $liste = $$employe->select();
                echo $twig->render('employes/RH/liste.html.twig', array('form'=>$form,'liste'=>$liste));

        }else {
            echo $twig->render('accueil.html.twig');
        }
    }
}

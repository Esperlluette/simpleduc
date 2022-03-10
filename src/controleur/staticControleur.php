<?php

    //
    //------Controleur relatif aux pages plus ou moins statiques 
    //


    // Controleur d'affichage des actualités et de l'accueil du site. 
function accueilControleur($twig,$db){ 
    $form = array();
    $actu = new Actu($db);
    $liste = $actu->select();
    echo $twig->render('accueil.html.twig', array('form'=>$form,'liste'=>$liste));
}

function mentionControleur($twig){ 
    echo $twig->render('mention.html.twig', array());
}

function aproposControleur($twig){ 
    echo $twig->render('apropos.html.twig', array());
}

function contactControleur($twig){ 
    echo $twig->render('guest/static/contact.html.twig', array());
}

function maintenanceControleur($twig){ 
    echo $twig->render('maintenance.html.twig', array());
}

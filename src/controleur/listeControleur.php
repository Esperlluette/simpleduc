<?php

function listeControleur($twig, $db)
{

    // si l'id de session est défini, je regarde s'il est égal à 3 (RH) ou 5 (Directeur), si oui j'affiche la liste des employés. 
    // si l'id de session est défini, je regarde s'il est égal à 3 (RH) ou 5 (Directeur), si non j'affiche l'accueil.
    // si l'id de session n'est pas defini je renvoie vers la page info connexion.
    if (!isset($_SESSION['id'])) {
        echo $twig->render('infoConnexion.html.twig');
    } else {
        if ($_SESSION['role'] == 3 || $_SESSION['role'] == 5) {
            $form = array();
            $employe = new Employe($db);
            // Si il existe un id dans l'url de la page, que je suis connécté et que j'ai un compte rh ou directeur, je supprime le compte lié a l'id
            if (isset($_GET['id'])) {
                $exec = $employe->delete($_GET['id']);
                if (!$exec) {
                    $etat = false;
                } else {
                    $etat = true;
                }
                header('Location: index.php?page=liste&etat=' . $etat);
                exit;
            }
            if (isset($_GET['etat'])) {
                $form['etat'] = $_GET['etat'];
            }
            $form = array();
            $employe = new Employe($db);
            $liste = $employe->select();
            echo $twig->render('employes/RH/list.html.twig', array('form' => $form, 'liste' => $liste));
        } else {
            echo $twig->render('accueil.html.twig');
        }
    }
}

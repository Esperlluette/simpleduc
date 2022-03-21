<?php
function vosActuControleur($twig, $db)
{
    //afficher la liste des actus
    $form = array();
    $actu = new Actu($db);
    $liste = $actu->select();

  $form = array();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $user = new User($db);
        $unUser = $user->selectById($_GET['id']);
        if ($unUser != null) {
            $form['actu'] = $unUser;
        } else {
            $form['message'] = 'actu incorrect';
        }
    }

    //bouton de suppression multiple
    if (isset($_POST['btSupprimer'])) {
        $cocher = $_POST['cocher'];
        $form['valide'] = true;
        $etat = true;
        foreach ($cocher as $id) {
            $exec = $actu->delete($id);
            if (!$exec) {
                $etat = false;
            }
        }
        header('Location: index.php?page=vosActu');
        exit;
    }

    //bouton de suppression unique
    if (isset($_GET['id'])) {
        $exec = $actu->delete($_GET['id']);
        if (!$exec) {
            $etat = false;
        } else {
            $etat = true;
        }
        header('Location: index.php?page=vosActu');
        exit;
    }

    echo $twig->render('employes/vosActu.html.twig', array('form' => $form, 'liste' => $liste));
}

function modifActuControleur($twig, $db)
{
    //récupère l'actu choisie
    $form = array();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $actu = new Actu($db);
        $uneactu = $actu->selectById($_GET['id']);
        if ($uneactu != null) {
            $form['actu'] = $uneactu;
        } else {
            $form['message'] = 'actu incorrect';
        }
    }

    //modifie une actu
    if (isset($_POST['btmodifactu'])) {
        $actu = new Actu($db);
        $id = $_GET['id'];
        $titre = $_POST['inputTitre'];
        $contenu = $_POST['inputContenu'];
        $date = date("Y-m-d");
        $exec = $actu->update($id, $titre, $contenu, $date);

        if (!$exec) {
            $form['valide'] = false;
            $form['message'] = 'Echec de la modification';
        } else {
            $form['valide'] = true;
            $form['message'] = 'Modification réussie';
            return header("Location:?page=vosActu");
        }
    } else {
        $form['message'] = 'Actu non précisé';
    }

    echo $twig->render('employes/modifActu.html.twig', array('form' => $form, 'id' => $id));
}
?>
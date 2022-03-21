<?php
function updateControleur($twig, $db)
{

    if (!isset($_SESSION['id'])) {
        echo $twig->render('infoConnexion.html.twig');
    } else {

        if ($_SESSION['role'] == 3 || $_SESSION['role'] == 5) {

            // je dev ici 
            $form = array();
            if (isset($_GET['id'])) {
                $form['id'] = $_GET['id'];
                $Employe = new Employe($db);
                $unEmploye = $Employe->selectById($_GET['id']);
                $role = new Qualification($db);
                $liste = $role->select();
                $form['Qualification'] = $liste;
                if ($Employe != null) {
                    $form['Employe'] = $unEmploye;
                } else {
                    $form['message'] = 'Utilisateur incorrect';
                }
                if (isset($_POST['btModifier'])) {
                    $utilisateur = new Employe($db);
                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $role = $_POST['role'];
                    $id = $_POST['id'];
                    $exec = $utilisateur->update($id, $role, $nom, $prenom);
                    if (!$exec) {
                        $form['valide'] = false;
                        $form['message'] = 'Echec de la modification';
                    } else {
                        $form['valide'] = true;
                        $form['message'] = 'Modification réussie';
                    }
                    header('Location:index.php?page=update&id='.$_GET['id']);
                } else {

                    $form['message'] = 'Utilisateur non précisé';
                }
                
            }
            echo $twig->render('employes/RH/update.html.twig', array('form' => $form,'employe'=>$unEmploye));
        }
    }
}

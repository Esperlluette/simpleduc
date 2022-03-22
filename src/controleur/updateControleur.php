<?php
function updateControleur($twig, $db)
{

    if (!isset($_SESSION['id'])) {
        echo $twig->render('infoConnexion.html.twig');
    } else {

        if ($_SESSION['role'] == 3 || $_SESSION['role'] == 5) {

            $form = array();

            //si dans l'url de la page il y a un id
            //alors 
            //  - Je crée un nouvel objet employé 
            //  - $unEmploye est le résultat de la fonction selectById 
            //  - Je crée un nouvel objet Qualification 
            //  - $liste est le résultat de la fonction select 
            //  - la liste est affecté à $form['qualification']
            //   si la variable employe est nulle------------------------------------------------------
            //   alors 
            //      - j'affecte $unEmploye à $form['Employe']
            //   sinon 
            //      - j'affecte "Utilisateur incorrect" à $form['message']
            //   si le bouton['btModifier'] à été appuyé ----------------------------------------------
            //   alors 
            //      - je crée un nouvel Employé que j'appelle $employe
            //      - la variable $nom prends le nom dans le formulaire
            //      - la variable $prenom prends le prenom dans le formulaire
            //      - la variable $role prends le role dans le formulaire
            //      - la variable $id prends le id dans l'url
            //      - le résultat de la methode update est un booléen et est affecté à $exec  
            //      - true si la requette à bien été exécutée.
            //      - false si la requette n'as pas été exécutée.
            //      si $exec est vrai ------------------------------------------------------------------
            //      alors
            //          - $form['valide'] reçoit false
            //          - $form['message'] reçoit "échec de la modification"
            //      sinon
            //          - $form['valide'] reçoit true
            //          - $form['message'] reçoit "Modification réussie"
            //   fsi
            //sinon
            //  - $form['message'] reçoit "Utilisateur non spécifié"
            //j'affiche la page update et j'envoie à la vue les variables $form et $unEmploye


            if (isset($_GET['id'])) {
                $role = new Qualification($db);
                $liste = $role->select();
                $form['Qualification'] = $liste;

                $employe = new Employe($db);
                $unEmploye = $employe->selectById($_GET['id']);
                if ($unEmploye != null) {
                    $form['Employe'] = $unEmploye;
                } else {
                    $form['message'] = 'Utilisateur incorrect';
                }
                if (isset($_POST['btModifier'])) {
                    $employe = new Employe($db);
                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $role = $_POST['role'];
                    $id = $_GET['id'];
                    $exec = $employe->update($id, $role, $nom, $prenom);
                    if (!$exec) {
                        $form['valide'] = false;
                        $form['message'] = 'Echec de la modification';
                    } else {
                        $form['valide'] = true;
                        $form['message'] = 'Modification réussie';
                        return header("Location:?page=liste");
                    }
                }
            } else {
                $form['message'] = 'Utilisateur non précisé';
            }
            echo $twig->render('employes/RH/update.html.twig', array('form' => $form, 'employe' => $unEmploye));
        }
    }
}

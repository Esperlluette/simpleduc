<?php

function profilRhControleur($twig){
    echo $twig->render('employes/RH/profil.html.twig');
}

//---Controleur d'inscription---
function inscrireControleur($twig,$db){
    $form = array();
    if(isset($_POST['btInscrire'])){
                    //tout est dans l'ordre de renseignement//
            // il n'envoie pas dans la base de données 
        $inputNom = $_POST['inputNom'];
        $inputPrenom = $_POST['inputPrenom'];
        $inputDateNaissance = $_POST['inputDateNaissance'];
        $inputTel = $_POST['inputTel'];
        $inputEmail = $_POST['inputEmail'];
        $inputPassword = $_POST['inputPassword'];
        $inputPassword2 = $_POST['inputPassword2'];
        $inputAdresse = $_POST['inputAdresse'];
        $inputCodePostal = $_POST['inputCodePostal'];
        $inputPays = $_POST['inputPays'];
        $inputPermis = $_POST['optionsRadios'];
        $inputDateEmbauche = $_POST['inputDateEmbauche'];
        $inputNumSecu = $_POST['inputNumSecu'];
        $inputQualification = $_POST['optionsRadios'];
        $cheminPhoto = null;
        
    
            //
            //---------Je ne m'en sert pas pour le moment ?-------------
            //---------Peut-être le déplacer dans un controleur a part ?---------
            //

        /*
            $upload = new Upload(array('png', 'gif', 'jpg', 'jpeg'), 'images', 500000);
            $photo = $upload->enregistrer('photo');
            $cheminPhoto = $photo['chemin'];
        */

        $form['valide'] = true;
        $form['nom'] = $inputNom;
        $form['prenom'] = $inputPrenom;
            //si les mdp sont differents
        if ($inputPassword!=$inputPassword2){
            $form['valide'] = false;
            $form['message'] = 'Les mots de passe sont différents';
            }else{
                    //si les mdp sont identiques
                $longueurkey = 15;
                $key = "";
                for($i=1;$i<$longueurkey;$i++){
                    $key .= mt_rand(0,9);
                }

                $serveur = $_SERVER['HTTP_HOST']; // Adresse du serveur
                $script = $_SERVER["SCRIPT_NAME"]; // Nom du fichier PHP exécuté
                $message = "
                <html>
                <head>
                </head>
                <body>
                <h1>Bienvenue sur Simpleduc</h1>
                Bienvenue sur Shop-Shop, pour confirmer votre inscription, veuillez cliquer sur le lien suivant :
                <a href=\"http://$serveur$script?page=confirmation&Nom=$inputNom&Prenom=$inputPrenom&confirmkey=$key\">Valider votre inscription</a>
                </body>
                </html>";
                $headers[] = 'MIME-Version: 1.0';
                $headers[] = 'Content-type: text/html; charset=utf-8';
                mail($inputEmail, 'Inscription sur Simpleduc', $message, implode("\n", $headers));
                $employe = new Employe($db);
                $exec = $employe->insert($inputNom, $inputPrenom, $inputDateNaissance, $inputTel, $inputEmail, password_hash($inputPassword,PASSWORD_DEFAULT), $inputAdresse, $inputCodePostal, $inputPays, $inputPermis, $inputDateEmbauche, $inputNumSecu, $inputQualification, $cheminPhoto, $key);
                    // si il y a un problème dans l'insertion dans la BDD
                if (!$exec){
                    $form['valide'] = false;
                    $form['message'] = 'Problème d\'insertion';
                }      
            } 
        }
    echo $twig->render('employes/RH/inscrire.html.twig', array('form'=>$form));
}

?>
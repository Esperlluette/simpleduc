<?php

function connexionControleur($twig,$db){
    $form = array();

    if(isset($_POST['btConnecter'])){
        $inputEmail = $_POST['inputEmail'];
        $inputPassword = $_POST['inputPassword'];
        var_dump($inputEmail, $inputPassword);
        $user = new User($db);
        $unUser = $user->connect($inputEmail);
        if(!password_verify($inputPassword,$unUser['MDP'])){
            $form['valide'] = false;
            $form['message'] = 'Login ou mot de passe incorrect';
        }else {
            $_SESSION['login'] = $inputEmail;
            $_SESSION['role'] = $unUser['idQualification'];
            $_SESSION['confirmation'] = $unUser['confirm'];
            $_SESSION['id']= $unUser['id'];
            header("Location:?page=accueil");
        }
    }
    echo $twig->render('connexion.html.twig', array('form'=>$form));
}

function deconnexionControleur($twig){
    session_unset();
    session_destroy();
    header("Location:index.php");
}

function confirmationControleur($twig,$db){
    if(isset($_GET['Nom'], $_GET['Prenom'], $_GET['confirmkey']) && !empty($_GET['Nom']) && !empty($_GET['Prenom']) && !empty($_GET['confirmkey'])){
        $Nom = $_GET['Nom'];
        $Prenom = $_GET['Prenom'];
        $key = intval($_GET['confirmkey']);
        $user = new Employe($db);
        $unUser = $user->confirmation($Nom, $key, $Prenom);
        header("Location:index.php");
    }
}

?>
<?php

function edit_fichepaieControleur($twig){ 
    echo $twig->render('employes/comptable/edit_fichepaie.html.twig', array());
}


    //---Controleur relatif aux Taux---
    function ajoutContratControleur($twig,$db){ 
        $form = array();
        if(isset($_POST['btAjoutContrat'])){
            $inputAnnee = $_POST['inputAnnee'];
            $inputType = $_POST['inputType'];
            
            $inputTauxSalaire = $_POST['inputTauxSalaire'];
            $inputComplementaireSanteIDD = $_POST['inputTauxComplementaireSanteIDD'];
            $inputComplementaireSante = $_POST['inputTauxComplementaireSante'];
            $inputSecuriteSocialePlafonne = $_POST['inputSecuriteSocialePlafonne'];
            $inputSecuriteSocialeDeplafonne = $_POST['inputSecuriteSocialeDeplafonne'];
            $inputTauxComplementaire = $_POST['inputTauxComplementaire'];
            $inputCSG = $_POST['inputCSG'];
            $inputCSG_non_deductible = $_POST['inputCSG_non_deductible'];
    
            
            $taux = new Taux($db);
            $exec = $taux->insert($inputAnnee, $inputType, $inputTauxSalaire, $inputComplementaireSanteIDD, $inputComplementaireSante, $inputSecuriteSocialePlafonne, $inputSecuriteSocialeDeplafonne, $inputTauxComplementaire, $inputCSG, $inputCSG_non_deductible,);
            if (!$exec){
                $form['valide'] = false;
                $form['message'] = 'Problème d\'insertion dans la table utilisateur ';
            }
        }
        echo $twig->render('ajoutContrat.html.twig', array());
    }

?>
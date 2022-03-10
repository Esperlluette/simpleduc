<?php
    
function getPage($db){
        //routes statiques
    $lesPages['accueil'] = "accueilControleur";
    $lesPages['mention'] = "mentionControleur";
    $lesPages['a-propos'] = "aproposControleur";
    $lesPages['contact'] = "contactControleur";
    $lesPages['confirmation'] = "confirmationControleur";
        //bdd manquante
    $lesPages['maintenance'] = "maintenanceControleur";
        //routes des connectés 
        $lesPages['connexion'] = "connexionControleur";
        $lesPages['deconnexion'] = "deconnexionControleur";
        $lesPages['actu'] = "ajoutActuControleur";
            //developpeurs
            $lesPages['profil-developpeur'] = "profildevControleur";

            //chefs developpeurs


            //comptable
            $lesPages['edit-fiche-de-paie'] = "edit_fichepaieControleur"; //le directeur peut consulter et modifier les fiches de paie.

            //RH
            $lesPages['inscription'] = "inscrireControleur"; //le Directeur a aussi les droits de création de compte
            $lesPages['modif-profil'] = "modif_profilControleur"; //le Directeur a aussi les droits de modification de profil, les employés peuvent modifier uniquement leurs profils.
            $lesPages['ajoutActu'] = "ajoutActuControleur";
            //Directeur


            
    if ($db!=null){  
        //var_dump($_GET);
        if(isset($_GET['page'])){    
            $page = $_GET['page']; 
        }  
        else{    
            $page = 'connexion';  
        }  
        
        if (!isset($lesPages[$page])){    
            $page = 'connexion';   
        }  
        $contenu = $lesPages[$page];  
    }else{   
        $contenu = $lesPages['maintenance'];
    }
    return $contenu; 
}
?>
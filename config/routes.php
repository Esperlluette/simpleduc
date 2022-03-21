<?php
    
function getPage($db){
        //routes statiques
    $lesPages['accueil'] = "accueilControleur";
    $lesPages['mention'] = "mentionControleur";
    $lesPages['a-propos'] = "aproposControleur";
    $lesPages['contact'] = "contactControleur";
    $lesPages['confirmation'] = "confirmationControleur";
    $lesPages['profil'] = "pageProfilControleur";
        //bdd manquante
    $lesPages['maintenance'] = "maintenanceControleur";
        //routes des connectés 
        $lesPages['connexion'] = "connexionControleur";
        $lesPages['deconnexion'] = "deconnexionControleur";
        $lesPages['actu'] = "ajoutActuControleur";
            //developpeurs

            //chefs developpeurs


            //comptable
            $lesPages['edit-fiche-de-paie'] = "edit_fichepaieControleur"; //le directeur peut consulter et modifier les fiches de paie.

            //RH
            $lesPages['inscription'] = "inscrireControleur"; //le Directeur a aussi les droits de création de compte
            $lesPages['ajoutActu'] = "ajoutActuControleur";
            $lesPages['liste'] = "listeControleur";
            $lesPages['update'] = "updateControleur";
            //Directeur
            $lesPages['vosActu'] = "vosActuControleur";
            $lesPages['modifActu'] = "modifActuControleur";

            
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
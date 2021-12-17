<?php
require('controller/frontend.php');
try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'tpindexation') {
	            tpindexation();
        }
    }
    else {
        accueil();
    }
}

catch(Exception $e) {
    // echo 'Erreur : ' . $e->getMessage();
    $errorMessage = $e->getMessage();
    // $errorMessage = "Test du message d'erreur";
    require('view/frontend/errorView.php');
}





        
   
    

<?php
function indexer($source){
	$tabOccurence = compter($source);
    if(empty($tabOccurence)){
        echo("Ce document n'existe pas dans le répertoire de test. <br/>");
    }
    else{
        echo("Ce document existe dans le répertoire de test. Nous allons l'indexer. <br/>");
        foreach ($tabOccurence as $mot => $frequence){
            $insertMot = insertMot($mot, $frequence, $source);
            if ($insertMot === false) {
                throw new Exception('Pas possible');
            }
            else {
                // echo'OK <br/>';
            }
        }
    echo'Indexation faite<br/>';
	}
}

function insertMot($mot, $occurence, $source){
    $db = dbConnect();
    $insert = $db->prepare('INSERT INTO mots (mot, occurence, source) VALUES(?, ?, ?)');
    $affectedLines = $insert->execute(array($mot, $occurence, $source));
    return $affectedLines;
}


function compter($source){
	$texte = file_get_contents ($source);
	$separateurs =  "’. ,…][(«»)\t\r\n" ;
	$tab_toks = lire($texte, $separateurs);

	$tab_new_mots_occurrences = array_count_values ($tab_toks);
    // var_dump($tab_new_mots_occurrences);
    return $tab_new_mots_occurrences; 
} 


function lire($texte, $separateurs){
	$tok =  strtok($texte, $separateurs);
    $motVide = array("contre", "avec", "pour", "encore", "sans", "jamais", "interdit");

	if(strlen($tok) > 2){
        if (!in_array($tok, $motVide)) {
            $tab_tok[] = $tok;
        }
    }

	while ($tok !== false) {
		$tok = strtok($separateurs);
		if(strlen($tok) > 2) {
            if (!in_array($tok, $motVide)) {
                    $tab_tok[] = $tok;
            }
        }
	}
    // var_dump($tab_tok);
	return $tab_tok;
}


function getMot($mot){
    $db = dbConnect();
    $result = $db->prepare('SELECT mot, occurence, source FROM mots WHERE mot = ? ORDER BY occurence DESC');
    $result->execute(array($mot));
    return $result;
}


// Connection db + Try & catch
function dbConnect(){
    try{
	    $db = new PDO('mysql:host=localhost;dbname=tpindexation;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        // echo "Connection db réussie <br/>";
        return $db;
	}
	catch (Exception $e){
	    die('Erreur : ' . $e->getMessage());
	}
}




















	

<?php

require_once __DIR__ . '/modele.inc.php';

function obtenirCategories() {
    try {

        $bdd = connexionBdd();

        
        $requete = $bdd->query("SELECT * FROM `type_questions`");
        $categories = $requete->fetchAll(PDO::FETCH_OBJ); 
        $requete->closeCursor();
        return json_encode($categories);
        
    } catch (Exception $ex) {
        
        $message = "obtenirCategories: " . $ex->getMessage();
        return json_encode($message);
    }
}

<?php

require_once __DIR__ . '/modele.inc.php';

function obtenirCategories() {
    try {

        $bdd = connexionBdd();

        $tabCategories = array();
        $requete = $bdd->query("SELECT * FROM `type_questions`");

        while ($categorie = $requete->fetch(PDO::FETCH_OBJ)) {

            array_push($tabCategories, $categorie);
        }
        $requete->closeCursor();
        return $tabCategories;
        
    } catch (Exception $ex) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}

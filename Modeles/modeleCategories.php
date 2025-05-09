<?php

require_once __DIR__ . '/modele.inc.php';

function obtenirCategories() {
    try {

        $bdd = connexionBdd();

        $tabClassement = array();
        $requete = $bdd->query("SELECT * FROM `type_questions`");

        while ($item = $requete->fetch(PDO::FETCH_OBJ)) {

            array_push($tabClassement, $item);
        }
        $requete->closeCursor();
        return $tabClassement;
        
    } catch (Exception $ex) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}

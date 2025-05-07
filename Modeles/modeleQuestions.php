<?php

require_once __DIR__ . '/modele.inc.php';

function obtenirQuestions($id, $nb) {
    try {

        $bdd = connexionBdd();

        $requete = $bdd->prepare("SELECT * FROM `questions` where id_type = :id_type ORDER BY RAND() LIMIT {$nb};");
        $requete->bindParam(":id_type", $id);      
        $requete->execute();
        
        $questions = $requete->fetchAll(PDO::FETCH_OBJ);   
        $requete->closeCursor();
        
        return $questions;
        
    } catch (Exception $ex) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}

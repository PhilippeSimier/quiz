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

function creerQuestion($id_type, $intitule, $reponse) {
    try {

        $bdd = connexionBdd();
        
        // Vérifier que la question n'existe pas déjà
        $verif = $bdd->prepare("SELECT COUNT(*) FROM `questions` WHERE `intitule` = :intitule");
        $verif->execute([":intitule" => $intitule]);
        if ($verif->fetchColumn() > 0) {
            return "L'intitulé de la question existe déjà";
        }

        $requete = $bdd->prepare("INSERT INTO `questions` (`id_type`, `intitule`, `reponse` ) VALUES (:id_type, :intitule, :reponse)");
        $requete->bindParam(":id_type", $id_type);
        $requete->bindParam(":intitule", $intitule); 
        $requete->bindParam(":reponse", $reponse); 
        $result = $requete->execute();   
        return $result;
        
    } catch (Exception $ex) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    
}

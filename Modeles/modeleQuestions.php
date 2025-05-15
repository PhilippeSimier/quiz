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
        
        return json_encode($questions);
        
    } catch (Exception $ex) {
        
        $message = "obtenirQuestions: " . $ex->getMessage();
        return json_encode($message);
    }
}

function creerQuestion($id_type, $intitule, $reponse) {
    try {

        $bdd = connexionBdd();
        
        // Vérifier que la question n'existe pas déjà
        $verif = $bdd->prepare("SELECT COUNT(*) FROM `questions` WHERE `intitule` = :intitule");
        $verif->execute([":intitule" => $intitule]);
        if ($verif->fetchColumn() > 0) {
            return json_encode(false);
        }

        $requete = $bdd->prepare("INSERT INTO `questions` (`id_type`, `intitule`, `reponse` ) VALUES (:id_type, :intitule, :reponse)");
        $requete->bindParam(":id_type", $id_type);
        $requete->bindParam(":intitule", $intitule); 
        $requete->bindParam(":reponse", $reponse); 
        $result = $requete->execute();
        return json_encode( $bdd->lastInsertId(),JSON_NUMERIC_CHECK );
        
        
    } catch (Exception $ex) {
        
        $message = "obtenirQuestions: " . $ex->getMessage();
        return json_encode($message);
    }
    
}

function updateQuestion($id, $id_type, $intitule, $reponse) {

    try {
        $bdd = connexionBdd();
        // Vérifier que l'id n'est pas vide
        if ($id == "") {
            return json_encode("l'id est vide !");
        }
        $requete = $bdd->prepare("UPDATE `questions` SET `id_type` = :id_type, `intitule` = :intitule, `reponse` = :reponse WHERE `questions`.`id` = :id;");
        $ret = $requete->execute([
            ":id_type" => $id_type,
            ":intitule" => $intitule,
            ":reponse" => $reponse,
            ":id" => $id
        ]);
        return json_encode($ret);
        
    } catch (Exception $ex) {

        $message = "updateQuestion: " . $ex->getMessage();
        return json_encode($message);
    }
}

function supprimerQuestion($id) {

    try {
        $bdd = connexionBdd();
        // Vérifier que l'id n'est pas vide
        if ($id == "") {
            return json_encode("l'id est vide !");
        }
        $requete = $bdd->prepare("DELETE FROM `questions` WHERE `questions`.`id` = :id");
        $ret = $requete->execute([
            ":id" => $id
        ]);

        return json_encode($ret);
    } catch (Exception $ex) {

        $message = "obtenirCategories: " . $ex->getMessage();
        return json_encode($message);
    }
}

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

function creerCategories($nom, $description) {
    
    try {
        $bdd = connexionBdd();
        // Vérifier que le login n'est pas vide
        if ($nom == "") {
            return json_encode("le nom de la catégorie est vide !");
        }

        // Vérifier que le pseudo n'existe pas déjà
        $verif = $bdd->prepare("SELECT COUNT(*) FROM `type_questions` WHERE `nom_type` = :nom");
        $verif->execute([":nom" => $nom]);
        if ($verif->fetchColumn() > 0) {
            return json_encode(false);
        }

        // Insérer le nouveau type de question
        $requete = $bdd->prepare("INSERT INTO `type_questions` (`nom_type`, `description`) VALUES (:nom, :description)");
        $retour = $requete->execute([
            ":nom" => $nom,
            ":description" => $description
        ]);
        return json_encode( $bdd->lastInsertId(), JSON_NUMERIC_CHECK );
        
    } catch (Exception $ex) {
        return "Erreur : " . $ex->getMessage();
    }
}

function supprimerCategories($id) {

    try {
        $bdd = connexionBdd();
        // Vérifier que le nom n'est pas vide
        if ($id == "") {
            return json_encode("l'id est vide !");
        }
        // supprime les questions de la catégorie
        $requete = $bdd->prepare("DELETE FROM `questions` WHERE `id_type` = :id");
        $ret = $requete->execute([
            ":id" => $id
        ]);
        
        // supprime les scores relative à la catégorie
        $requete = $bdd->prepare("DELETE FROM `scores` WHERE `id_type` = :id");
        $ret = $requete->execute([
            ":id" => $id
        ]);
        
        $requete = $bdd->prepare("DELETE FROM `type_questions` WHERE `type_questions`.`id` = :id");
        $ret = $requete->execute([
            ":id" => $id
        ]);

        return json_encode($ret);
    } catch (Exception $ex) {

        $message = "obtenirCategories: " . $ex->getMessage();
        return json_encode($message);
    }
}

function updateCategories($id, $nom, $description) {

    try {
        $bdd = connexionBdd();
        // Vérifier que l'id n'est pas vide
        if ($id == "") {
            return json_encode("l'id est vide !");
        }
        $requete = $bdd->prepare("UPDATE `type_questions` SET `nom_type` = :nom, `description` = :description WHERE `type_questions`.`id` = :id;");
        $ret = $requete->execute([
            ":nom" => $nom,
            ":description" => $description,
            ":id" => $id
        ]);
        return json_encode($ret);
        
    } catch (Exception $ex) {

        $message = "obtenirCategories: " . $ex->getMessage();
        return json_encode($message);
    }
}

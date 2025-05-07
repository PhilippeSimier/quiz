<?php

require_once __DIR__ . '/modele.inc.php';

function enregistrerScore($type, $score, $joueur){
    try {

        $bdd = connexionBdd();
        $requete = $bdd->prepare("INSERT INTO `scores` (`id_type`, `id_joueur`, `score`, `horodatage`) VALUES (:id_type, :id_joueur, :score, now())");
        $succes = $requete->execute([
            ":id_type" => $type,
            ":id_joueur" => $joueur,
            ":score" => $score
        ]);
        return $succes;
    }
    catch (Exception $ex) {
        $message = "Enregistrer Score: " . $ex->getMessage();
        return $message;
    }
}


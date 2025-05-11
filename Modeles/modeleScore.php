<?php

require_once __DIR__ . '/modele.inc.php';

function enregistrerScore($type, $score, $joueur) {
    try {

        $bdd = connexionBdd();
        $requete = $bdd->prepare("INSERT INTO `scores` (`id_type`, `id_joueur`, `score`, `horodatage`) VALUES (:id_type, :id_joueur, :score, now())");
        $succes = $requete->execute([
            ":id_type" => $type,
            ":id_joueur" => $joueur,
            ":score" => $score
        ]);
        return json_encode($succes);
        
    } catch (Exception $ex) {
        $message = "Enregistrer Score: " . $ex->getMessage();
        return json_encode($message);
    }
}

function obtenirClassement() {
    try {
        $bdd = connexionBdd();
        $sql  = 'select sum(`scores`.`score`) AS `total`, `joueurs`.`pseudo`  from (`scores` join `joueurs`) where (`joueurs`.`id` = `scores`.`id_joueur`) group by `scores`.`id_joueur` ORDER by total DESC';

        $requete = $bdd->query($sql);     
        $classement = $requete->fetchAll(PDO::FETCH_OBJ);
        return json_encode($classement, JSON_NUMERIC_CHECK);
        
    } catch (Exception $ex) {
        $message = "obtenirClassement: " . $ex->getMessage();
        return json_encode($message);
    }
}

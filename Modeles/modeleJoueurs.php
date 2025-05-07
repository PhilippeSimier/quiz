<?php

require_once __DIR__ . '/modele.inc.php';

function verifierMotDePasse($login, $motDePasseSaisi) {
    try {

        $bdd = connexionBdd();
        $requete = $bdd->prepare("SELECT mdp FROM `joueurs` where `pseudo` = :login");
        $requete->execute([":login" => $login]);
        $resultat = $requete->fetch(PDO::FETCH_OBJ);
        $requete->closeCursor();

        // Si aucun utilisateur trouvé
        if (!$resultat) {
            return false;
        }
        // Vérifie le mot de passe saisi avec le hash stocké
        return password_verify($motDePasseSaisi, $resultat->mdp);
    } catch (Exception $ex) {
        $message = "Erreur verifierMdp: " . $ex->getMessage();
        return $message;
    }
}

function obtenirId($login) {
    try {
        
        $bdd = connexionBdd();
        $requete = $bdd->prepare("SELECT id FROM `joueurs` where `pseudo` = :login");
        $requete->execute([":login" => $login]);
        $resultat = $requete->fetch(PDO::FETCH_OBJ);
        $requete->closeCursor();
        return $resultat->id;
        
    } catch (Exception $ex) {
        $message = "Erreur obtenirId: " . $ex->getMessage();
        return $message;
    }
}

function creerJoueur($login, $motDePasse) {
    try {
        $bdd = connexionBdd();

        // Vérifier que le pseudo n'existe pas déjà
        $verif = $bdd->prepare("SELECT COUNT(*) FROM `joueurs` WHERE `pseudo` = :login");
        $verif->execute([":login" => $login]);
        if ($verif->fetchColumn() > 0) {
            return "Ce pseudo existe déjà.";
        }

        // Hacher le mot de passe
        $hash = password_hash($motDePasse, PASSWORD_DEFAULT);

        // Insérer le nouvel utilisateur
        $requete = $bdd->prepare("INSERT INTO `joueurs` (`pseudo`, `mdp`) VALUES (:login, :mdp)");
        $requete->execute([
            ":login" => $login,
            ":mdp" => $hash
        ]);
        return true;
    } catch (Exception $ex) {
        return "Erreur : " . $ex->getMessage();
    }
}

function modifierMotDePasse($login, $nouveauMotDePasse) {
    try {
        $bdd = connexionBdd();

        // Vérifie si l'utilisateur existe
        $verif = $bdd->prepare("SELECT COUNT(*) FROM `joueurs` WHERE `pseudo` = :login");
        $verif->execute([":login" => $login]);
        if ($verif->fetchColumn() == 0) {
            return "Utilisateur introuvable.";
        }

        // Hash du nouveau mot de passe
        $hash = password_hash($nouveauMotDePasse, PASSWORD_DEFAULT);

        // Mise à jour du mot de passe
        $requete = $bdd->prepare("UPDATE `joueurs` SET `mdp` = :mdp WHERE `pseudo` = :login");
        $requete->execute([
            ":mdp" => $hash,
            ":login" => $login
        ]);

        return true;
    } catch (Exception $ex) {
        return "Erreur : " . $ex->getMessage();
    }
}

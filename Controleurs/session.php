<?php

require_once __DIR__ . '/../Modeles/modeleJoueurs.php';

session_start();

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET') {

    // récupération de la donnée 'commande'
    $commande = filter_input(INPUT_GET, 'commande');

    switch ($commande) {

        case 'connecter' :
            $login = filter_input(INPUT_GET, 'login');
            $motDePasseSaisi = filter_input(INPUT_GET, 'pswd');

            if (verifierMotDePasse($login, $motDePasseSaisi)) {

                $_SESSION['last_access'] = time();
                $_SESSION['login'] = $_GET['login'];
                $_SESSION['ipaddr'] = $_SERVER['REMOTE_ADDR'];
                $_SESSION['id'] = obtenirId($login);
                header("Location: ../Vues/quiz.php");
            } else {
                $_SESSION['erreur'] = 'Veuillez inscrire vos identifiants svp !';
                header("Location: ../Vues/connexion.php");
            }
            break;

        case 'deconnecter' :
            session_unset();
            header("Location: ../Vues/quiz.php");
            break;

        case 'creerCompte' :
            $login = filter_input(INPUT_GET, 'login');
            $motDePasse = filter_input(INPUT_GET, 'mdp');
            $retour = creerJoueur($login, $motDePasse);
            echo $retour;

        default:
        //echo json_encode("commande inconnue");
    }
}

function autoriser() {

    if (empty($_SESSION['login'])) {
        $_SESSION['erreur'] = "Vous n'êtes pas connecté(e)";
        return false;
    }
    // Vérification du temps d'accès
    if (time() - $_SESSION['last_access'] > 600) {
        unset($_SESSION['last_access']);
        unset($_SESSION['login']);
        unset($_SESSION['ipaddr']);
        $_SESSION['erreur'] = "Votre session a expirée.";
        return false;
    }

    // Vérification de l'adresse IP (elle ne doit pas changer)
    if ($_SERVER['REMOTE_ADDR'] != $_SESSION['ipaddr']) {

        unset($_SESSION['last_access']);
        unset($_SESSION['login']);
        unset($_SESSION['ipaddr']);
        $_SESSION['erreur'] = "erreur de session !!";
        return false;
    }

    return true;
}
?>


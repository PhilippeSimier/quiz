<?php

require_once __DIR__ . '/../Modeles/modeleCategories.php';
require_once __DIR__ . '/../Modeles/modeleQuestions.php';
require_once __DIR__ . '/../Modeles/modeleScore.php';

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {

    // récupération de la donnée 'commande'
    $commande = filter_input(INPUT_POST, 'commande');

    // envoi de l'en-tête pour la réponse en json
    header('Content-Type: application/json');

    switch ($commande) {

        case 'obtenirCategories' :
            echo obtenirCategories();
            break;

        case 'obtenirQuestions' :
            $type = filter_input(INPUT_POST, 'type');
            $nb = filter_input(INPUT_POST, 'nb');
            echo obtenirQuestions($type, $nb);
            break;

        case 'enregistrerScore' :
            $type = filter_input(INPUT_POST, 'type');
            $score = filter_input(INPUT_POST, 'score');
            $joueur = filter_input(INPUT_POST, 'joueur');
            echo enregistrerScore($type, $score, $joueur);
            break;

        case 'obtenirClassement' :
            echo obtenirClassement();
            break;

        default:
            echo json_encode("commande inconnue");
    }
}
    
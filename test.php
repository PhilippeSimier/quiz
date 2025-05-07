<?php

require_once './Modeles/modeleCategories.php';
require_once './Modeles/modeleQuestions.php';
require_once './Modeles/modeleScore.php';
require_once './Modeles/modeleJoueurs.php';

$categories = obtenirCategories();


$questions = obtenirQuestions(10,5);

echo '<pre>';
print_r($questions);
echo '</pre>';


$resultat = creerJoueur('toto', 'toto');
if ($resultat === true) {
    echo "</br>Utilisateur créé avec succès.   ";
} else {
    echo $resultat; // Affiche une erreur ou un message si le pseudo existe
}


if (verifierMotDePasse('toto', 'toto')) {
    echo "</br>Mot de passe correct";
} else {
    echo "</br>Identifiants invalides  ";
}

echo obtenirId('toto');









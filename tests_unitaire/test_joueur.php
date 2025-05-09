<?php

require_once '../Modeles/modeleJoueurs.php';


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

echo "</br>";

echo obtenirId('toto');











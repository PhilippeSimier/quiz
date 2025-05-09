<?php
/**
 * Script tests unitaires pour les modèles catégories et questions
 */

require_once '../Modeles/modeleCategories.php';
require_once '../Modeles/modeleQuestions.php';


$categories = obtenirCategories();

echo '<pre>';
print_r($categories);
echo '</pre>';

$res = creerQuestion(10, "Combien de temps (minutes) dure un match de basket en NBA ?", "48");
echo $res;

$questions = obtenirQuestions(10,5);

echo '<pre>';
print_r($questions);
echo '</pre>';














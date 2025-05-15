<?php
/**
 * Script tests unitaires pour les modèles catégories et questions
 */


require_once '../Modeles/modeleQuestions.php';




$id = creerQuestion(10, "intitule test créer", "test");
echo $id; echo '</br>';



$res = updateQuestion($id, 10, "Question test update", "test update");
echo $res; echo '</br>';

$res = supprimerQuestion($id);
echo $res; echo '</br>';
exit();

$questions = obtenirQuestions(10,5);

echo '<pre>';
print_r($questions);
echo '</pre>';

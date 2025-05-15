<?php

/**
 * Script tests unitaires pour le modèle catégories 
 */

require_once '../Modeles/modeleCategories.php';

$ret = creerCategories("test2", "test unitaires catégories");
echo $ret; echo '</br>';

$ret = creerCategories("test3", "test unitaires catégories");
echo $ret; echo '</br>';

$ret = updateCategories(10, "Sports", "Tous types de sports et compétitions");
echo $ret; echo '</br>';

echo(obtenirCategories());
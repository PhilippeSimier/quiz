<?php

/**
 * Script tests unitaires pour le modèle catégories 
 */

require_once '../Modeles/modeleCategories.php';

$ret = creerCategories("test2", "test unitaires catégories");
echo $ret;

$ret = creerCategories("test3", "test unitaires catégories");
echo $ret;

echo supprimerCategories(18);
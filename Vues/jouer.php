<?php
session_start();
require_once __DIR__ . '/../Controleurs/session.php';

if (!autoriser()){
    header("Location: ./connexion.php");
    exit();
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Jouer maintenant</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>    
        <script src="jouer.js" type="text/javascript"></script>

    </head>
    <body class="min-vh-100 d-flex flex-column">
        <?php require("./menu.php"); ?>
        <div class="container-fluid p-5 bg-primary text-white text-center">

            <h1>Choisissez une catégorie</h1>
            <p>Sélectionnez un thème pour commencer le quiz</p>

        </div>
        <div class="container mt-5" id="categories">


        </div>


        <?php readfile("./pied_de_page.html"); ?>
    </body>
</html>




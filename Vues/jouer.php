<?php
require_once __DIR__ . '/../Controleurs/session.php';

if (!autoriser()) {
    header("Location: ./connexion.php?route=jouer.php");
    exit();
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Jouer maintenant</title>
        <link href="./css/bootstrap5.min.css" rel="stylesheet">
        <script src="js/jquery-3.7.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jouer.js" type="text/javascript"></script>
        
        <style>
            .card-hover:hover {
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.4);
                transform: translateY(-5px);
                transition: all 0.2s ease-in-out;
                background-color: #f0f8ff; /* Bleu clair */
            }
        </style>

    </head>
    <body class="min-vh-100 d-flex flex-column">
        <?php require("./menu.php"); ?>
        <div class="container-fluid p-5 bg-primary text-white text-center">

            <h1>Choisissez une catégorie</h1>
            <p>Sélectionnez un thème pour commencer le quiz</p>

        </div>
        <div class="container mt-5" id="categories">
            <div class="row" id="grille"></div>
        </div>


        <?php readfile("./pied_de_page.html"); ?>
    </body>
</html>




<?php
// Contrôleur de session pour la page privée
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
        <title>Quiz-Questions</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="min-vh-100 d-flex flex-column">
        <?php require("./menu.php"); ?>
        <div class="container-fluid p-5 bg-primary text-white text-center">

            <h1>Personnaliser les questions</h1>
         </div>   
            

        
        <div class="container mt-5 categorie">
            
            <p>to do questions</p>
            
        </div>


        <?php readfile("./pied_de_page.html"); ?>
    </body>
</html>




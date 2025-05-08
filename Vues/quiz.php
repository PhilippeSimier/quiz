<?php
session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Quiz - accueil</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>    


    </head>
    <body class="min-vh-100 d-flex flex-column">
        <?php require("./menu.php"); ?>
        <div class="container-fluid p-5 bg-primary text-white text-center">
            <h1>On en apprend tous les jours grâce à CielQuiz!</h1>    

        </div>
        <div class="container mt-3">
            <div class="d-flex flex-column flex-md-row align-items-center">
                <img src="./images/quiz.png" alt="Quiz" class="img-fluid m-3" style="max-height: 50vh;"/>

                <h5 class="ms-3"> Teste ta culture générale et développe tes connaissances
                    grâce à nos quiz gratuits et divertissants. 
                    Que tu sois passionné(e) d’histoire, de géographie, 
                    de musique ou de cinéma, 
                    nous avons le quiz parfait pour toi! </h5>
            </div>
        </div>
        <?php readfile("./pied_de_page.html"); ?>
    </body>
</html>




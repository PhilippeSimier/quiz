<?php
require_once __DIR__ . '/../Controleurs/session.php';

if (!autoriser()) {
    header("Location: ./connexion.php");
    exit();
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Questions</title>
        <link href="./css/bootstrap5.min.css" rel="stylesheet">
        <script src="js/jquery-3.7.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/question.js" type="text/javascript"></script>
        
        <style>
            .question-box {
                margin-bottom: 20px;
            }
            #result {
                margin-top: 20px;
                font-weight: bold;
            }
        </style>

    </head>
    <body class="min-vh-100 d-flex flex-column">
        <?php require("./menu.php"); ?>
        <div class="container-fluid p-5 bg-primary text-white text-center">
            <h1>Questions <?php echo $_GET["type"] ?> </h1>    

        </div>
        <p style="display: none;" id="categorie"><?php echo $_GET["id"] ?></p>
        <div class="container mt-5" >
           
            <div class="bg-white rounded shadow-lg p-4">
                <div>
                    <h4 id="index"></h4>
                    <h4 id="question"></h4>
                </div>
                <div class="d-flex mt-5">
                    <input type="text" id="reponseJoueur" placeholder="Votre réponse" class="form-control me-2 w-25" />
                    <button id="valider" type="button" class="btn btn-primary">Valider</button>
                </div>
            </div>

            <div id="result"></div>

        </div>
        <?php readfile("./pied_de_page.html"); ?>
    </body>
</html>






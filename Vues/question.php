<?php
session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Questions</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>    
        <script src="question.js" type="text/javascript"></script>
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
            
            <div class="question-box">
                <div>
                    <h4 id="index"></h4>
                    <h4 id="question"></h4>
                </div>
                <input type="text" id="answerInput" placeholder="Votre réponse" />
                <button id="valider">Valider</button>
            </div>

            <div id="result"></div>

        </div>
        <?php readfile("./pied_de_page.html"); ?>
    </body>
</html>






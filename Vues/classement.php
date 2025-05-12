<?php
session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Quiz - Classement</title>
        
        <link href="./css/bootstrap5.min.css" rel="stylesheet">
        <link href="./css/dataTables.bootstrap5.min.css" rel="stylesheet">

        <!-- jQuery (nécessaire pour DataTables) -->        
        <script src="./js/jquery-3.7.1.min.js"></script>

        <!-- Bootstrap 5 JS -->
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>

        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script src="./js/classement.js"></script>

    </head>
    <body class="min-vh-100 d-flex flex-column">
    <?php require("./menu.php"); ?>
        <div class="container-fluid p-5 bg-primary text-white text-center">
            <h1>Le classement des meilleurs joueurs</h1>    

        </div>
        <div class="container my-5">
            <div class="table-responsive  w-100">
                <table id="classement" class="table table-striped table-bordered text-center" style="table-layout: fixed; width: 100%;">
                    <thead class="table-dark">
                        <tr>
                            <th  class="text-center">Score</th>
                            <th  class="text-center">Pseudo</th>

                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    <?php require("./pied_de_page.html"); ?>
    </body>
</html>




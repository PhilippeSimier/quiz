<?php
session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Quiz - Classement</title>
        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- DataTables Bootstrap 5 CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

        <!-- jQuery (nécessaire pour DataTables) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Bootstrap 5 JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script src="classement.js"></script>

    </head>
    <body class="min-vh-100 d-flex flex-column">
        <?php require("./menu.php"); ?>
        <div class="container-fluid p-5 bg-primary text-white text-center">
            <h1>Le classement des meilleurs joueurs</h1>    

        </div>
        <div class="container my-5">
            <div class="table-responsive  w-100">
                <table id="classement" class="table table-striped table-bordered text-center">
                    <thead class="table-dark">
                        <tr>

                            <th  class=" text-center">Pseudo</th>
                            <th  class="text-center">Scores</th>

                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <?php readfile("./pied_de_page.html"); ?>
    </body>
</html>




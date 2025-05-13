<?php
// Contrôleur de session pour la page privée
require_once __DIR__ . '/../Controleurs/session.php';

if (!autoriser()) {
    header("Location: ./connexion.php?route=gerer_categories.php");
    exit();
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Gérer catégories</title>

        <link href="./css/bootstrap5.min.css" rel="stylesheet">
        <link href="./css/dataTables.bootstrap5.min.css" rel="stylesheet">
        <link href="css/all.min.css" rel="stylesheet" type="text/css"/>

        <!-- jQuery (nécessaire pour DataTables) -->        
        <script src="./js/jquery-3.7.1.min.js"></script>

        <!-- Bootstrap 5 JS -->
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>

        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script src="js/gerer_categories.js"></script>

        <style>

            .btn-icon {
                background: none;
                border: none;
                font-size: 16px;
                cursor: pointer;
                padding: 2px 5px;
                color: #444;
            }
            .btn-icon:hover {
                color: #007bff;
            }

            .col-action {
                width: 40px;
                text-align: center;
            }
        </style>

    </head>
    <body class="min-vh-100 d-flex flex-column">
        <?php require("./menu.php"); ?>
        <div class="container-fluid p-5 bg-primary text-white text-center">

            <h1>Personnaliser les catégories</h1>
        </div>   

        <div class="container my-5">
            <div class="table-responsive  w-100">
                <table id="categories" class="table table-striped table-bordered text-center" style="table-layout: fixed; width: 100%;">
                    <thead class="table-dark">
                        <tr>
                            <th  class="text-center">id</th>
                            <th  class="text-center">Nom</th>
                            <th  class="text-center">description</th>
                            <th  class="text-center col-action"><i class="fas fa-pen"></i></th>
                            <th  class="text-center col-action"><i class="fas fa-trash"></i></th> 


                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <?php readfile("./pied_de_page.html"); ?>
        <!-- Modale d'édition -->
        <div id="editModal" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modifier une Catégorie</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="$('#editModal').hide()"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editId">
                        <div>
                            <label class="form-label">Nom :</label><br>
                            <input class="form-control" type="text" id="editNom" >
                        </div>
                        <div>
                            <label class="form-label">Description :</label><br>
                            <textarea class="form-control" id="editDescription" ></textarea>
                        </div>
                        <br>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="saveEdit">Enregistrer</button>
                        <button type="button" class="btn btn-secondary" onclick="$('#editModal').hide()">Annuler</button>
                    </div>
                </div>
            </div>
        </div>    
    </body>
</html>




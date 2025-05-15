<?php
// Contrôleur de session pour la page privée
require_once __DIR__ . '/../Controleurs/session.php';

if (!autoriser()) {
    header("Location: ./connexion.php?route=gerer_questions.php");
    exit();
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
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
        <script src="js/gerer_questions.js"></script>

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
            <h1>Personnaliser les questions</h1>
        </div>       
        <div class="container mt-5 categorie">
            <div class="table-responsive  w-100">
                <button id="btnAddNew" type="button" class="btn btn-secondary"> Ajouter </button>
                <table id="questions" class="table table-striped table-bordered text-center" style="table-layout: fixed; width: 100%;">
                    <thead class="table-dark">
                        <tr>
                            <th  class="text-center">id</th>
                            <th  class="text-center">id_type</th>
                            <th  class="text-center">Intitulé</th>
                            <th  class="text-center" style="width: 20%;">Réponse</th>
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
                        <h4 class="modal-title">Modifier une Question</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="$('#editModal').hide()"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editId">
                        <div>
                            <label class="form-label">Catégorie :</label><br>
                            <input class="form-control" type="text" id="editId_type" >
                        </div>
                        <div>
                            <label class="form-label">Intitulé :</label><br>
                            <textarea class="form-control" id="editIntitule" ></textarea>
                        </div>
                        <div>
                            <label class="form-label">réponse :</label><br>
                            <input class="form-control" type="text" id="editReponse" >
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




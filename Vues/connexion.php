<?php
session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Connexion Quiz</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="min-vh-100 d-flex flex-column">
        <?php require("./menu.php"); ?>
        <div class="container-fluid p-5 bg-primary text-white text-center">

            <h1>Compte Ciel Quiz</h1>

        </div>
        <div class="container mb-3 mt-3">
            <p><?= $_SESSION['erreur'] ?></p>
            <form action="../Controleurs/session.php" method="get">
                <input type="hidden" name="commande" value="connecter">
                <fieldset>
                    <legend>Connexion</legend>
                    <div class="mb-3 mt-3">
                        <label for="email">Login:</label>
                        <input type="text" class="form-control" id="login" placeholder="Enter login" name="login">
                    </div>
                    <div class="mb-3">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                    </div>
                    <div class="form-check mb-3">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> Rester connecté
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </fieldset>
            </form>
            <p class="p-3">Vous n'êtes pas membre ? <a href="./inscription.php">Créer un compte</a></p>

        </div>
        <?php readfile("./pied_de_page.html"); ?>

    </body>
</html>




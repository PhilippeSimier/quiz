<?php session_start(); ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Connexion Quiz</title>
        <link href="./css/bootstrap5.min.css" rel="stylesheet">
        <link href="./css/all.min.css" rel="stylesheet"/>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            function togglePassword(fieldId, iconElement) {
                const input = document.getElementById(fieldId);
                const icon = iconElement.querySelector('i');
                if (input.type === "password") {
                    input.type = "text";
                    icon.classList.remove("fa-eye");
                    icon.classList.add("fa-eye-slash");
                } else {
                    input.type = "password";
                    icon.classList.remove("fa-eye-slash");
                    icon.classList.add("fa-eye");
                }
            }
        </script>
    </head>
    <body class="min-vh-100 d-flex flex-column">
        <?php require("./menu.php"); ?>
        <div class="container-fluid p-5 bg-primary text-white text-center">

            <h1>Compte Ciel Quiz</h1>

        </div>
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">

            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6 mx-auto p-4 bg-white rounded shadow-lg">
                <p><?= $_SESSION['erreur'] ?></p>
                <form action="../Controleurs/session.php" method="get">
                    <input type="hidden" name="commande" value="connecter">
                    <fieldset>
                        <legend>Connexion</legend>
                        <div class="mb-3 mt-3">
                            <label for="login">Login:</label>
                            <input type="text" class="form-control" id="login" placeholder="Enter login" name="login">
                        </div>
                        <div class="mb-3">
                            <label for="pswd">Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="pswd" placeholder="Mot de passe" name="pswd">
                                <span class="input-group-text" onclick="togglePassword('pswd', this)">
                                    <i class="fa-solid fa-eye"></i>
                                </span>
                            </div>                                                     
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
        </div>

        <?php readfile("./pied_de_page.html"); ?>

    </body>
</html>




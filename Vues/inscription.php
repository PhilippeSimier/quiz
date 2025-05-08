<!DOCTYPE html>

<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Compte création Quiz</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="inscription.js" type="text/javascript"></script>
    </head>
    
    <body class="min-vh-100 d-flex flex-column">
        <?php require("./menu.php"); ?>

        <div class="container-fluid p-5 bg-primary text-white text-center">
            <h1>Créer un compte Quiz</h1>
        </div>   

        <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">

            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6 mx-auto p-4 bg-white rounded shadow-lg">
                
                <p id="retour"></p>
                <div>
                    
                    <fieldset>
                        <legend>Créer un compte</legend>
                        <div class="mb-3 mt-3">
                            <label for="email">Login:</label>
                            <input type="text" class="form-control" id="login" placeholder="login" name="login">
                        </div>
                        <div class="mb-3">
                            <label for="pwd">Mot de passe:</label>
                            <input type="password" class="form-control" id="pswdA" placeholder="Mot de passe" name="pswdA">
                        </div>
                        <div class="mb-3">
                            <label for="pwd">Confirmer mot de passe:</label>
                            <input type="password" class="form-control" id="pswdB" placeholder="Confirmer mot de passe" name="pswdB">
                        </div>
                        
                        <button id="creer" class="btn btn-primary">Créer</button>
                    </fieldset>
                </div>

                <p class="p-3">Vous avez déjà un compte ?  <a href="./connexion.php">Se connecter</a></p>
            </div>
        </div>



        <?php readfile("./pied_de_page.html"); ?>
    </body>
</html>


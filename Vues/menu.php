<nav class="navbar navbar-expand-sm  bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="quiz.php">Quiz</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="jouer.php">Jouer maintenant</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="classement.php">Classement général</a>
                </li>
                <?php
                if ($_SESSION['droit'] === 1) {
                    readfile("./item_personnaliser.html");
                }
                ?>        
            </ul>
            <!-- Bouton Connexion à droite -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <?php
                    if (empty($_SESSION['login'])) {
                        echo '<a href="connexion.php" class="btn btn-outline-primary">Connexion</a>';
                    } else {
                        require("./item_user.php");
                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>

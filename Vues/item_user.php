<li class="nav-item dropdown">
    
<span id="id_joueur" style="display: none;">
<?php echo  $_SESSION['id']; ?> 
</span> 
<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
<?php echo $_SESSION['login']; ?> 
</a>
    <ul class="dropdown-menu dropdown-menu-end">
        <li><a class="dropdown-item"  href="../Controleurs/session.php?commande=deconnecter">
                <i class="fas fa-right-from-bracket me-2"></i>Déconnexion</a><li>
        <li><a class="dropdown-item" href="#">Autre action</a></li>    
    </ul>
</li>
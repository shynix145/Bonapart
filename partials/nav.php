    


<nav class="nav">
    <div class="container nav__inner">
      <a href="index.php" class="nav__logo">Le Bon <em>Appart</em></a>
      <ul class="nav__links" id="nav-links">
        <li><a href="index.php">Toutes les annonces</a></li>

    


<?php if(isset($_SESSION['prenom'])): ?>
          <li><a href="dashboard.php">Mon espace</a></li>
<li class='nav__agent'> <?= 'Bonjour' . ' ' . $_SESSION['prenom'] ?></li>
        <li><a href="ajouter.php" class="btn btn--outline btn--sm">Publier une annonce</a></li>
        <li><a href="logout.php" class="btn btn--ghost btn--sm">Déconnexion</a></li>
      <?php else: ?>
                <li><a href="register.php" class="btn btn--ghost btn--sm">Incription</a></li>        
                <li><a href="login.php" class="btn btn--ghost btn--sm">Connexion</a></li>
<?php endif; ?>



      </ul>
      <button class="nav__toggle" id="nav-toggle" aria-label="Ouvrir le menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
  </nav>

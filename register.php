<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription — Le Bon Appart</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <!-- Navigation -->
  <nav class="nav">
    <div class="container nav__inner">
      <a href="index.php" class="nav__logo">Le Bon <em>Appart</em></a>
      <ul class="nav__links" id="nav-links">
        <li><a href="index.php">Toutes les annonces</a></li>
        <li><a href="login.php">Connexion</a></li>
        <li><a href="register.php" class="btn btn--primary btn--sm">Inscription</a></li>
      </ul>
      <button class="nav__toggle" id="nav-toggle" aria-label="Ouvrir le menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
  </nav>

  <main class="auth-layout">
    <div>

      <!-- Zone messages flash -->
      <div class="flash-zone">
        <!-- Exemple : <div class="alert alert--error">Cette adresse email est déjà utilisée.</div> -->
      </div>

      <div class="auth-card" style="max-width: 500px;">

        <div class="auth-card__logo">Le Bon <em>Appart</em></div>
        <h1 class="auth-card__title">Créer un compte</h1>
        <p class="auth-card__sub">Rejoignez la communauté et publiez vos annonces.</p>

        <!-- enctype requis pour l'upload d'avatar -->
        <form action="register.php" method="POST" enctype="multipart/form-data" class="form-stack">

          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="prenom">Prénom <span class="req">*</span></label>
              <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Marie" required autocomplete="given-name">
            </div>
            <div class="form-group">
              <label class="form-label" for="nom">Nom <span class="req">*</span></label>
              <input type="text" id="nom" name="nom" class="form-control" placeholder="Dupont" required autocomplete="family-name">
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" for="email">Adresse email <span class="req">*</span></label>
            <input type="email" id="email" name="email" class="form-control" placeholder="marie@exemple.fr" required autocomplete="email">
          </div>

          <div class="form-group">
            <label class="form-label" for="mot_de_passe">Mot de passe <span class="req">*</span></label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" class="form-control" placeholder="Au moins 8 caractères" required autocomplete="new-password">
          </div>

          <div class="form-group">
            <label class="form-label" for="avatar">Photo de profil</label>
            <input type="file" id="avatar" name="avatar" class="form-control" accept="image/jpeg,image/png,image/webp,image/avif">
            <span class="form-hint">Formats acceptés : JPG, PNG, WEBP, AVIF — 2 Mo maximum. Optionnel.</span>
          </div>

          <button type="submit" class="btn btn--primary btn--block btn--lg">Créer mon compte</button>

        </form>

        <div class="auth-card__footer">
          Déjà inscrit ? <a href="login.html">Se connecter</a>
        </div>

      </div>
    </div>
  </main>

  <!-- Pied de page -->
  <footer class="footer">
    <div class="container">
      <div class="footer__inner">
        <div class="footer__brand">
          <span class="footer__logo">Le Bon <em>Appart</em></span>
          <p>La plateforme d'annonces immobilières entre particuliers.</p>
        </div>
        <div>
          <span class="footer__col-title">Navigation</span>
          <nav class="footer__links">
            <a href="index.html">Accueil</a>
            <a href="index.html?type=location">Locations</a>
            <a href="index.html?type=vente">Ventes</a>
          </nav>
        </div>
        <div>
          <span class="footer__col-title">Mon compte</span>
          <nav class="footer__links">
            <a href="register.html">Devenir agent</a>
            <a href="login.html">Connexion</a>
          </nav>
        </div>
      </div>
      <p class="footer__copy">&copy; 2025 Le Bon Appart — Tous droits réservés.</p>
    </div>
  </footer>

  <script src="assets/js/app.js"></script>
</body>
</html>

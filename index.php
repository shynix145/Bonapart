<?php 

$page_title = "Accueil - Le Bon Appart";

?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Le Bon Appart — Annonces immobilières entre particuliers</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <!-- ============================
       Navigation
       ============================ -->
  <nav class="nav">
    <div class="container nav__inner">
      <a href="index.php" class="nav__logo">Le Bon <em>Appart</em></a>
      <ul class="nav__links" id="nav-links">
        <li><a href="index.php">Toutes les annonces</a></li>
        <li><a href="ajouter.php" class="btn btn--outline btn--sm">Publier une annonce</a></li>
        <!-- État : non connecté -->
        <li><a href="login.php">Connexion</a></li>
        <li><a href="register.php" class="btn btn--primary btn--sm">Inscription</a></li>
        <!-- État : connecté (PHP rendra ceci dynamique selon $_SESSION)
        <li class="nav__agent">Bonjour, Marie</li>
        <li><a href="dashboard.html">Mon espace</a></li>
        <li><a href="logout.php">Déconnexion</a></li>
        -->
      </ul>
      <button class="nav__toggle" id="nav-toggle" aria-label="Ouvrir le menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
  </nav>

  <!-- ============================
       Zone messages flash
       ============================ -->
  <div class="container">
    <div class="flash-zone">
      <!-- Exemple succès  : <div class="alert alert--success">Votre annonce a été publiée avec succès.</div> -->
      <!-- Exemple erreur  : <div class="alert alert--error">Une erreur est survenue. Veuillez réessayer.</div> -->
    </div>
  </div>

  <!-- ============================
       Héro
       ============================ -->
  <section class="hero">
    <div class="container">
      <span class="hero__label">La plateforme entre particuliers</span>
      <h1 class="hero__title">Trouvez votre prochain logement</h1>
      <p class="hero__desc">Des centaines d'annonces de location et de vente publiées directement par des particuliers partout en France.</p>
      <div class="hero__actions">
        <a href="#annonces" class="btn btn--primary btn--lg">Parcourir les annonces</a>
        <a href="register.html" class="btn btn--ghost btn--lg">Devenir agent</a>
      </div>
      <div class="hero__stats">
        <div>
          <span class="stat__number">248</span>
          <span class="stat__label">Annonces actives</span>
        </div>
        <div>
          <span class="stat__number">134</span>
          <span class="stat__label">Locations</span>
        </div>
        <div>
          <span class="stat__number">114</span>
          <span class="stat__label">Ventes</span>
        </div>
        <div>
          <span class="stat__number">87</span>
          <span class="stat__label">Agents inscrits</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================
       Liste des annonces
       ============================ -->
  <main id="annonces">
    <div class="container section">

      <div class="section-head">
        <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:16px;">
          <div>
            <span class="section-head__label">Annonces</span>
            <h2 class="section-head__title">Les dernières publications</h2>
          </div>
          <!-- Filtres par type — PHP ajustera la classe "active" selon $_GET['type'] -->
          <div class="filter-bar">
            <button class="filter-tab active">Tous <span class="filter-count">248</span></button>
            <a href="index.html?type=location" class="filter-tab">Location <span class="filter-count">134</span></a>
            <a href="index.html?type=vente"    class="filter-tab">Vente    <span class="filter-count">114</span></a>
          </div>
        </div>
      </div>

      <div class="grid grid--3">

        <article class="card">
          <div class="card__image">
            <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=600&h=400&fit=crop&auto=format" alt="Appartement lumineux 3 pièces">
            <span class="badge badge--location card__badge">Location</span>
          </div>
          <div class="card__body">
            <div class="card__price">850 € <span>/mois</span></div>
            <p class="card__title">Appartement lumineux 3 pièces</p>
            <p class="card__location">Lyon — 69001</p>
            <div class="card__agent">
              <div class="avatar avatar--sm">MD</div>
              <span>Marie Dupont</span>
            </div>
            <a href="annonce.html" class="btn btn--primary btn--sm btn--block">Voir l'annonce</a>
          </div>
        </article>

        <article class="card">
          <div class="card__image">
            <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=600&h=400&fit=crop&auto=format" alt="Studio rénové en centre-ville">
            <span class="badge badge--vente card__badge">Vente</span>
          </div>
          <div class="card__body">
            <div class="card__price">245 000 €</div>
            <p class="card__title">Studio rénové en centre-ville</p>
            <p class="card__location">Paris — 75011</p>
            <div class="card__agent">
              <div class="avatar avatar--sm">TL</div>
              <span>Thomas Leroy</span>
            </div>
            <a href="annonce.html" class="btn btn--primary btn--sm btn--block">Voir l'annonce</a>
          </div>
        </article>

        <article class="card">
          <div class="card__image">
            <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=600&h=400&fit=crop&auto=format" alt="Maison avec jardin 4 pièces">
            <span class="badge badge--location card__badge">Location</span>
          </div>
          <div class="card__body">
            <div class="card__price">1 200 € <span>/mois</span></div>
            <p class="card__title">Maison avec jardin 4 pièces</p>
            <p class="card__location">Bordeaux — 33000</p>
            <div class="card__agent">
              <div class="avatar avatar--sm">CM</div>
              <span>Claire Martin</span>
            </div>
            <a href="annonce.html" class="btn btn--primary btn--sm btn--block">Voir l'annonce</a>
          </div>
        </article>

        <article class="card">
          <div class="card__image">
            <img src="https://images.unsplash.com/photo-1493809842364-78817add7ffb?w=600&h=400&fit=crop&auto=format" alt="T2 avec vue dégagée">
            <span class="badge badge--vente card__badge">Vente</span>
          </div>
          <div class="card__body">
            <div class="card__price">189 000 €</div>
            <p class="card__title">T2 avec vue dégagée</p>
            <p class="card__location">Nantes — 44000</p>
            <div class="card__agent">
              <div class="avatar avatar--sm">AB</div>
              <span>Alice Bernard</span>
            </div>
            <a href="annonce.html" class="btn btn--primary btn--sm btn--block">Voir l'annonce</a>
          </div>
        </article>

        <article class="card">
          <div class="card__image">
            <img src="https://images.unsplash.com/photo-1484154218962-a197022b5858?w=600&h=400&fit=crop&auto=format" alt="Studio meublé proche transports">
            <span class="badge badge--location card__badge">Location</span>
          </div>
          <div class="card__body">
            <div class="card__price">680 € <span>/mois</span></div>
            <p class="card__title">Studio meublé proche transports</p>
            <p class="card__location">Toulouse — 31000</p>
            <div class="card__agent">
              <div class="avatar avatar--sm">PR</div>
              <span>Paul Roux</span>
            </div>
            <a href="annonce.html" class="btn btn--primary btn--sm btn--block">Voir l'annonce</a>
          </div>
        </article>

        <article class="card">
          <div class="card__image">
            <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=600&h=400&fit=crop&auto=format" alt="Loft industriel spacieux 5 pièces">
            <span class="badge badge--vente card__badge">Vente</span>
          </div>
          <div class="card__body">
            <div class="card__price">320 000 €</div>
            <p class="card__title">Loft industriel spacieux 5 pièces</p>
            <p class="card__location">Lille — 59000</p>
            <div class="card__agent">
              <div class="avatar avatar--sm">SB</div>
              <span>Sophie Blanc</span>
            </div>
            <a href="annonce.html" class="btn btn--primary btn--sm btn--block">Voir l'annonce</a>
          </div>
        </article>

      </div>
      <!-- PHP : si aucune annonce, afficher le bloc ci-dessous à la place de la grille
      <div class="empty-state">
        <div class="empty-state__icon"></div>
        <h4>Aucune annonce disponible</h4>
        <p>Aucune annonce ne correspond à votre recherche pour le moment.</p>
        <br>
        <a href="ajouter.html" class="btn btn--primary">Publier la première annonce</a>
      </div>
      -->

    </div>
  </main>

  <!-- ============================
       Pied de page
       ============================ -->
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
            <a href="ajouter.html">Publier une annonce</a>
          </nav>
        </div>
      </div>
      <p class="footer__copy">&copy; 2025 Le Bon Appart — Tous droits réservés.</p>
    </div>
  </footer>

  <script src="assets/js/app.js"></script>
</body>
</html>

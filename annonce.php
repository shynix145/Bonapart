<?php


?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appartement lumineux 3 pièces — Le Bon Appart</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <!-- Navigation -->
  <nav class="nav">
    <div class="container nav__inner">
      <a href="index.php" class="nav__logo">Le Bon <em>Appart</em></a>
      <ul class="nav__links" id="nav-links">
        <li><a href="index.php">Toutes les annonces</a></li>
        <li><a href="ajouter.php" class="btn btn--outline btn--sm">Publier une annonce</a></li>
        <li><a href="login.php">Connexion</a></li>
        <li><a href="register.php" class="btn btn--primary btn--sm">Inscription</a></li>
      </ul>
      <button class="nav__toggle" id="nav-toggle" aria-label="Ouvrir le menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
  </nav>

  <!-- Zone messages flash -->
  <div class="container">
    <div class="flash-zone">
      <!-- PHP affichera ici les messages de succès ou d'erreur -->
    </div>
  </div>

  <main>
    <div class="container">

      <!-- Fil d'Ariane -->
      <nav class="breadcrumb" style="padding-top:28px;">
        <a href="index.html">Accueil</a>
        <span class="breadcrumb__sep">/</span>
        <a href="index.html">Annonces</a>
        <span class="breadcrumb__sep">/</span>
        <span>Appartement lumineux 3 pièces</span>
      </nav>

      <div class="property-layout">

        <!-- ============================
             Colonne principale
             ============================ -->
        <div>
          <div class="property-image">
            <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=1200&h=600&fit=crop&auto=format" alt="Appartement lumineux 3 pièces" style="width:100%;height:100%;object-fit:cover;">
          </div>

          <div class="property-meta">
            <span class="badge badge--location">Location</span>
            <div class="property-price">850 € <span>/mois</span></div>
          </div>

          <h1 class="property-title">Appartement lumineux 3 pièces</h1>
          <p class="property-location">Lyon, 69001 — Rhône-Alpes</p>

          <div class="divider"></div>

          <p class="property-body">Bel appartement de 3 pièces au 4e étage avec ascenseur, situé dans le 1er arrondissement de Lyon, à deux pas des transports en commun et des commerces.

Le logement comprend un séjour lumineux de 28 m² avec parquet, une cuisine équipée indépendante, deux chambres de 12 et 14 m², une salle de bain avec baignoire et un espace rangement. Double vitrage, chauffage central inclus dans les charges.

Disponible à partir du 1er mars 2025. Caution d'un mois de loyer exigée. Dossier de candidature complet requis (justificatifs de revenus, pièce d'identité).</p>

          <!-- Boutons propriétaire — PHP les affiche uniquement si $_SESSION['agent_id'] === annonce.agent_id -->
          <div class="property-actions">
            <a href="modifier.html?id=1" class="btn btn--ghost btn--sm">Modifier l'annonce</a>
            <a href="supprimer.php?id=1" class="btn btn--danger btn--sm" onclick="return confirm('Supprimer cette annonce ?')">Supprimer</a>
          </div>

          <p class="property-date">Publiée le 18 janvier 2025</p>
        </div>

        <!-- ============================
             Sidebar
             ============================ -->
        <aside>

          <!-- Bloc agent -->
          <div class="sidebar-card">
            <span class="sidebar-card__label">Agent</span>
            <div class="agent-mini">
              <div class="avatar avatar--md">MD</div>
              <div>
                <p class="agent-mini__name">Marie Dupont</p>
                <p class="agent-mini__meta">Membre depuis janvier 2024</p>
              </div>
            </div>
            <a href="agent.html?id=1" class="btn btn--ghost btn--sm btn--block">Voir le profil</a>
          </div>

          <!-- Formulaire de réservation -->
          <div class="sidebar-card">
            <span class="sidebar-card__label">Envoyer un message</span>
            <form action="reserver.php" method="POST" class="form-stack">
              <input type="hidden" name="annonce_id" value="1">
              <div class="form-group">
                <label class="form-label" for="nom">Votre nom <span class="req">*</span></label>
                <input type="text" id="nom" name="nom" class="form-control" placeholder="Jean Dupont" required>
              </div>
              <div class="form-group">
                <label class="form-label" for="email_contact">Votre email <span class="req">*</span></label>
                <input type="email" id="email_contact" name="email" class="form-control" placeholder="jean@exemple.fr" required>
              </div>
              <div class="form-group">
                <label class="form-label" for="message">Message <span class="req">*</span></label>
                <textarea id="message" name="reservation_message" class="form-control" placeholder="Bonjour, je suis intéressé par votre annonce..." required></textarea>
              </div>
              <button type="submit" class="btn btn--primary btn--block">Envoyer le message</button>
            </form>
          </div>

        </aside>
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

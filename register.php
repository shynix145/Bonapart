<?php 

  require_once 'config.php';
  require_once './partials/head.php';
  require_once './partials/header.php';
  require_once './partials/nav.php';

  $error = [];

  if ($_SERVER['REQUEST_METHOD']==='POST'){
    $prenom = htmlspecialchars(trim($_POST['prenom'])) ?? '';
    $nom = htmlspecialchars(trim($_POST['nom'])) ?? '';
    $email = htmlspecialchars(trim($_POST['email'])) ?? '';
    $mot_de_passe = htmlspecialchars(trim($_POST['mot_de_passe'])) ?? '';

    if (empty($prenom)){
      $error['prenom'] = 'Ce champ est obligatoire';
    }
    if (empty($nom)){
      $error['nom'] = 'Ce champ est obligatoire';
    }
    if (empty($email)){
      $error['email'] = 'Ce champ est obligatoire';
    }
    if (empty($mot_de_passe)){
      $error['mot_de_passe'] = 'Ce champ est obligatoire';
    }

    $query ="SELECT * FROM agents WHERE email = :email";
    $res = $pdo->prepare($query);
    $res->bindValue(':email', $email, PDO::PARAM_STR);
    $res->execute();

    if ($res-> rowCount() > 0){
      $_SESSION['flash_error'] = "L'adresse email existe déjà";
    } else {
      $insert = "INSERT INTO `agents`(`prenom`, `nom`, `email`, `mot_de_passe`) VALUES (:prenom, :nom, :email, :mot_de_passe)";
      $req = $pdo->prepare($insert);
      $req-> bindValue(':prenom', $prenom);
      $req-> bindValue(':nom', $nom);
      $req-> bindValue(':email', $email);
      $hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
      $req-> bindValue(':mot_de_passe', $hash);
      if ($req-> execute()) {
        $_SESSION['flash'] = "Inscription validé";
        header('Location:dashboard.php');
      }
    }
  }

?>
  <main class="auth-layout">
    <div>

      <!-- Zone messages flash -->
      <div class="flash-zone">
        <!-- Exemple : <div class="alert alert--error">Cette adresse email est déjà utilisée.</div> -->
        <?php require 'flash.php' ?>
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
              <?php echo $error['prenom'] ?? '' ?>
            </div>
            <div class="form-group">
              <label class="form-label" for="nom">Nom <span class="req">*</span></label>
              <input type="text" id="nom" name="nom" class="form-control" placeholder="Dupont" required autocomplete="family-name">
              <?php echo $error['nom'] ?? '' ?>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" for="email">Adresse email <span class="req">*</span></label>
            <input type="email" id="email" name="email" class="form-control" placeholder="marie@exemple.fr" required autocomplete="email">
            <?php echo $error['email'] ?? '' ?>
          </div>

          <div class="form-group">
            <label class="form-label" for="mot_de_passe">Mot de passe <span class="req">*</span></label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" class="form-control" placeholder="Au moins 8 caractères" required autocomplete="new-password">
            <?php echo $error['mot_de_passe'] ?? '' ?>
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


<?php
require_once 'config.php';
require_once 'partials/head.php';
require_once 'partials/header.php';
require_once 'partials/nav.php';



if ($_SERVER['REQUEST_METHOD']==='POST'){
    $email = htmlspecialchars(trim($_POST['email'])) ?? '';
    $mot_de_passe = htmlspecialchars(trim($_POST['mot_de_passe'])) ?? '';

$sql = "SELECT * FROM agents WHERE email = :email";
$res = $pdo->prepare($sql);
$res-> bindValue(':email', $email, PDO::PARAM_STR);
$res-> execute();

if ($res-> rowCount() > 0){
  $user = $res->fetch(PDO::FETCH_ASSOC);
  if (password_verify($mot_de_passe, $user['mot_de_passe'])){
    $_SESSION['agent_id'] = $user['id'];
    $_SESSION['prenom'] = $user['prenom'];
    header("Location: dashboard.php");
  }

} else {
  header("Location: register.php");
  exit();
}

  }




?>
  <main class="auth-layout">
    <div>

      <!-- Zone messages flash -->
      <div class="flash-zone">
        <!-- Exemple : <div class="alert alert--error">Identifiants incorrects. Veuillez réessayer.</div> -->
        <!-- Exemple : <div class="alert alert--success">Inscription réussie. Vous pouvez vous connecter.</div> -->
      </div>

      <div class="auth-card">

        <div class="auth-card__logo">Le Bon <em>Appart</em></div>
        <h1 class="auth-card__title">Connexion</h1>
        <p class="auth-card__sub">Accédez à votre espace agent.</p>

        <form action="login.php" method="POST" class="form-stack">

          <div class="form-group">
            <label class="form-label" for="email">Adresse email <span class="req">*</span></label>
            <!-- PHP pré-remplira la valeur si le cookie remember_email existe -->
            <input
              type="email"
              id="email"
              name="email"
              class="form-control"
              placeholder="votre@email.fr"
              value=""
              autocomplete="email"
              required
            >
          </div>

          <div class="form-group">
            <label class="form-label" for="mot_de_passe">Mot de passe <span class="req">*</span></label>
            <input
              type="password"
              id="mot_de_passe"
              name="mot_de_passe"
              class="form-control"
              placeholder="••••••••"
              autocomplete="current-password"
              required
            >
          </div>

          <div class="form-check">
            <input type="checkbox" id="remember" name="remember" value="1">
            <label for="remember">Se souvenir de moi</label>
          </div>

          <button type="submit" class="btn btn--primary btn--block btn--lg">Se connecter</button>

        </form>

        <div class="auth-card__footer">
          Pas encore de compte ? <a href="register.php">Créer un compte</a>
        </div>

      </div>
    </div>
  </main>

<?php require_once 'partials/footer.php';?>
<?php 
  require_once 'config.php';
  require_once './partials/head.php';
  require_once './partials/header.php';
  require_once './partials/nav.php';

$page_title = "Publier une annonce";


if(!isset($_SESSION['agent_id'])){
    header("Location: login.php");
    exit();
}

if($_SERVER['REQUEST_METHOD']==='POST'){
$titre=htmlspecialchars(trim($_POST['titre'])) ?? '';
$description=htmlspecialchars(trim($_POST['description'])) ?? '';
$type=htmlspecialchars(trim($_POST['type'])) ?? '';
$prix=htmlspecialchars(trim($_POST['prix'])) ?? '';
$codepostal=htmlspecialchars(trim($_POST['postal_code'])) ?? '';
$city=htmlspecialchars(trim($_POST['city'])) ?? '';
$choix=['location','vente'];


if(empty($titre) || empty($description) || empty($type) ||empty($prix) || empty($codepostal) || empty($city)){
  $_SESSION['flash_error']="Veuillez remplir tous les champs"; 
} elseif (!in_array($type,$choix)){
$_SESSION['flash_error']="Veuillez renseigner un type";
}elseif(!is_numeric($prix)){
  $_SESSION['flash_error']="Veuillez renseigner un nombre"; 
} else {
$query=("INSERT INTO `annonces`(`agent_id`, `titre`, `description`, `type`, `prix`, `postal_code`, `city`) VALUES (:agent_id,:titre,:description,:type,:prix,:postal_code,:city)");

$insert_annonce = $pdo->prepare($query);
$insert_annonce->bindValue(':agent_id',$_SESSION['agent_id'],PDO::PARAM_INT);
$insert_annonce->bindValue(':titre',$titre,PDO::PARAM_STR);
$insert_annonce->bindValue(':description',$description,PDO::PARAM_STR);
$insert_annonce->bindValue(':type',$type,PDO::PARAM_STR);
$insert_annonce->bindValue(':prix',$prix,PDO::PARAM_INT);
$insert_annonce->bindValue(':postal_code',$prix,PDO::PARAM_STR);
$insert_annonce->bindValue(':city',$city,PDO::PARAM_STR);

if($insert_annonce->execute()){
$_SESSION['flash']="Votre annonce à bien été publié"; 
header('Location:dashboard.php');
exit();
}
}
}









?>













  <main>
    <div class="container section--sm">

      <!-- Zone messages flash -->
      <div class="flash-zone">
        <?php require 'flash.php' ?>
        <!-- Exemple : <div class="alert alert--error">Le titre est obligatoire.</div> -->
      </div>

      <div class="form-page">

        <form action="ajouter.php" method="POST" class="form-stack">

          <div class="form-group">
            <label class="form-label" for="titre">Titre de l'annonce <span class="req">*</span></label>
            <input type="text" id="titre" name="titre" class="form-control" placeholder="Ex : Appartement 3 pièces lumineux, proche métro" required>
          </div>

          <div class="form-group">
            <label class="form-label" for="description">Description <span class="req">*</span></label>
            <textarea id="description" name="description" class="form-control" placeholder="Décrivez le bien : superficie, nombre de pièces, équipements, état général, disponibilité..." required style="min-height:160px;"></textarea>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="type">Type d'annonce <span class="req">*</span></label>
              <select id="type" name="type" class="form-control" required>
                <option value="" disabled selected>Sélectionner...</option>
                <option value="location">Location</option>
                <option value="vente">Vente</option>
              </select>
            </div>
            <div class="form-group">
              <label class="form-label" for="prix">Prix <span class="req">*</span></label>
              <input type="number" id="prix" name="prix" class="form-control" placeholder="Ex : 850" min="0" step="0.01" required>
              <span class="form-hint">En euros. Pour une location, indiquez le loyer mensuel.</span>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="code_postal">Code postal <span class="req">*</span></label>
              <input type="text" id="code_postal" name="postal_code" class="form-control" placeholder="Ex : 69001" maxlength="10" required>
            </div>
            <div class="form-group">
              <label class="form-label" for="ville">Ville <span class="req">*</span></label>
              <input type="text" id="ville" name="city" class="form-control" placeholder="Ex : Lyon" required>
            </div>
          </div>

          <div class="divider"></div>

          <div class="form-actions">
            <a href="dashboard.html" class="btn btn--ghost">Annuler</a>
            <button type="submit" class="btn btn--primary btn--lg">Publier l'annonce</button>
          </div>

        </form>
      </div>

    </div>
  </main>

<?php require_once 'partials/footer.php';?> 

 

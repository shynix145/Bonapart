<?php 
  require_once 'config.php';
  require_once './partials/head.php';
  require_once './partials/header.php';
  require_once './partials/nav.php';

$page_title = "Modifier une annonce";


if(!isset($_SESSION['agent_id'])){
    header("Location: login.php");
    exit();
}
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $agent_annonce = 'SELECT * FROM annonces WHERE id= :id';
  $pre = $pdo->prepare($agent_annonce);
  $pre->bindValue(':id', $id, PDO::PARAM_INT);
  $pre->execute();
  $tbl = $pre->fetch(PDO::FETCH_ASSOC);
}

if ($tbl['agent_id'] === $_SESSION['agent_id']){
  if($_SERVER['REQUEST_METHOD']==='POST'){
  $titre=htmlspecialchars(trim($_POST['titre'])) ?? '';
  $description=htmlspecialchars(trim($_POST['description'])) ?? '';
  $type=htmlspecialchars(trim($_POST['type'])) ?? '';
  $prix=htmlspecialchars(trim($_POST['prix'])) ?? '';
  $codepostal=htmlspecialchars(trim($_POST['postal_code'])) ?? '';
  $city=htmlspecialchars(trim($_POST['city'])) ?? '';
  $choix=['location','vente'];
  
  $bdd = 'UPDATE annonces SET titre = :new_titre, description = :new_description, type = :new_type, prix = :new_prix, postal_code = :new_code_postal, city = :new_city' ;
  $value = $pdo->prepare($bdd);
  $value->bindValue(':new_titre', $titre);
  $value->bindValue(':new_description', $description);
  $value->bindValue(':new_type', $type);
  $value->bindValue(':new_prix', $prix, PDO::PARAM_INT);
  $value->bindValue(':new_code_postal', $code_postal);
  $value->bindValue(':new_city', $city);
  
  if($value->execute()){
    $_SESSION['flash']  = "Votre annoonce àété modifiée.";
    header('location: dashboard.php');
    exit;
  }}
}else{
  header('location: dashboard.php');
  exit;
}






?>





  <main>
    <div class="container section--sm">

      <!-- Zone messages flash -->
      <div class="flash-zone">
        <?php require 'flash.php' ?>
        <!-- Exemple : <div class="alert alert--error">Le titre est obligatoire.</div> -->
      </div>

      <!-- Fil d'Ariane -->
      <nav class="breadcrumb">
        <a href="dashboard.html">Mon espace</a>
        <span class="breadcrumb__sep">/</span>
        <span>Modifier</span>
      </nav>

      <div class="form-page">

        <!-- L'id est transmis en champ caché pour le traitement POST -->
        <form action="modifier.php" method="POST" class="form-stack">
          <input type="hidden" name="id" value="1">

          <div class="form-group">
            <label class="form-label" for="titre">Titre de l'annonce <span class="req">*</span></label>
            <!-- PHP pré-remplira avec la valeur de la base de données -->
            <input type="text" id="titre" name="titre" class="form-control" value= "<?= $tbl['titre'] ?>" required>
          </div>

          <div class="form-group">
            <label class="form-label" for="description">Description <span class="req">*</span></label>
            <textarea id="description" name="description" class="form-control" required style="min-height:160px;">"<?= $tbl['description'] ?>"</textarea>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="type">Type d'annonce <span class="req">*</span></label>
              <select id="type" name="type" class="form-control" required>
                <option value="<?= $tbl['type'] ?>" disabled>Sélectionner...</option>
                <!-- PHP sélectionnera l'option correspondant à la valeur en base -->
                <option value="location" selected>Location</option>
                <option value="vente">Vente</option>
              </select>
            </div>
            <div class="form-group">
              <label class="form-label" for="prix">Prix <span class="req">*</span></label>
              <input type="number" id="prix" name="prix" class="form-control" value="<?= $tbl['prix'] ?>" min="0" step="0.01" required>
              <span class="form-hint">En euros. Pour une location, indiquez le loyer mensuel.</span>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="code_postal">Code postal <span class="req">*</span></label>
              <input type="text" id="code_postal" name="postal_code" class="form-control" value="<?= $tbl['postal_code'] ?>" maxlength="10" required>
            </div>
            <div class="form-group">
              <label class="form-label" for="ville">Ville <span class="req">*</span></label>
              <input type="text" id="ville" name="city" class="form-control" value="<?= $tbl['city'] ?>" required>
            </div>
          </div>

          <div class="divider"></div>

          <div class="form-actions">
            <a href="annonce.html?id=1" class="btn btn--ghost">Annuler</a>
            <button type="submit" class="btn btn--primary btn--lg">Enregistrer les modifications</button>
          </div>

        </form>
      </div>

    </div>
  </main>

<?php require_once 'partials/footer.php';?> 

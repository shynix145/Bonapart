<?php 
  require_once 'config.php';
  require_once './partials/head.php';
  require_once './partials/header.php';
  require_once './partials/nav.php';

$page_title = "Dashboard";


if(!isset($_SESSION['agent_id'])){
    header("Location: login.php");
    exit();
}

$sqlAll = 'SELECT * FROM annonces ORDER BY created_at DESC';
$query = $pdo->prepare($sqlAll);
$query->execute();
$data = $query->fetchAll(PDO::FETCH_ASSOC);



$sqlLoc = 'SELECT * FROM annonces WHERE type = :location';
$queryLoc =$pdo->prepare($sqlLoc);
$queryLoc->bindValue(':location','location');
$queryLoc->execute();
$loc = $queryLoc->fetchAll(PDO::FETCH_ASSOC);


$sqlVen = 'SELECT * FROM annonces WHERE type = :vente';
$queryVen =$pdo->prepare($sqlVen);
$queryVen-> bindValue(':vente', 'vente', PDO::PARAM_STR);
$queryVen->execute();
$ven = $queryVen->fetchAll(PDO::FETCH_ASSOC);



?>



  <main>
    <div class="container section">

      <!-- Zone messages flash -->
      <div class="flash-zone">
        <?php require 'flash.php' ?>
        <!-- Exemple : <div class="alert alert--success">Annonce supprimée avec succès.</div> -->
      </div>

      <!-- Bloc de bienvenue -->
      <div class="dashboard-welcome">
        <div>
          <h1 class="dashboard-welcome__title">Bonjour, Marie</h1>
          <p>Gérez vos annonces depuis votre espace personnel.</p>
        </div>
        <a href="ajouter.php" class="btn btn--primary">Publier une annonce</a>
      </div>

      <!-- Statistiques -->
      <div class="dashboard-stats">
        <div class="dash-stat">
          <span class="dash-stat__value"><?= count($data)  ?></span>
          <span class="dash-stat__label">Annonces publiées</span>
        </div>
        <div class="dash-stat">
          <span class="dash-stat__value"><?= count($loc) ?></span>
          <span class="dash-stat__label">Locations</span>
        </div>
        <div class="dash-stat">
          <span class="dash-stat__value"><?= count($ven) ?></span>
          <span class="dash-stat__label">Ventes</span>
        </div>
      </div>

      <!-- Tableau des annonces -->
      <div class="table-wrapper">
        <div class="table-header">
          <h4>Mes annonces</h4>
          <a href="ajouter.php" class="btn btn--primary btn--sm">Nouvelle annonce</a>
        </div>
        <div style="overflow-x:auto;">
          <table>
            <thead>
              <tr>
                <th>Titre</th>
                <th>Type</th>
                <th>Prix</th>
                <th>Ville</th>
                <th>Publiée le</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $d):  ?> 
              <tr>
                <td><a href="annonce.php" style="color:var(--accent); font-weight:500;"><?= $d['titre'] ?></a></td>
                <td><span class="badge badge--location"><?= $d['type'] ?></span></td>
                <td><?= $d['prix'] ?> € /mois</td>
                <td class="td-muted"><?= $d['city'] . ", " . $d['postal_code'] ?></td>
                <td class="td-muted"><?= $d['created_at'] ?></td>
                <td>
                  <div class="table-actions">
                    <a href="modifier.php?id=<?= $d['id'] ?>" class="btn btn--ghost btn--sm">Modifier</a>
                    <a href="supprimer.php?id=<?= $d['id']?>" class="btn btn--danger btn--sm" onclick="return confirm('Supprimer cette annonce ?')">Supprimer</a>
                  </div>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- PHP : si aucune annonce, remplacer le tableau par ce bloc
      <div class="empty-state">
        <div class="empty-state__icon"></div>
        <h4>Aucune annonce publiée</h4>
        <p>Vous n'avez pas encore publié d'annonce.</p>
        <br>
        <a href="ajouter.php" class="btn btn--primary">Publier ma première annonce</a>
      </div>
      -->

    </div>
  </main>
<?php require_once 'partials/footer.php';?> 
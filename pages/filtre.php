<?php
ini_set("display_errors", "1");
session_start();
require('../inc/function.php');

$listes = getListCategorie();
$parameters = ["Nom", "Date de retour"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../assets/style/style-filtre.css">
  <title>Filtre</title>
</head>

<body>
  <header>
    <nav class="container-fluid d-flex justify-content-between align-items-center">
      <ul class="d-flex align-items-center mb-0">
        <img src="../assets/image/<?= $_SESSION['pdp']; ?>" alt="">
        <li><?= $_SESSION['user_name']; ?></li>
      </ul>
      <a href="accueil.php"><button>Accueil</button></a>
    </nav>
  </header>

  <main>
    <div class="container mt-4">
      <?php if (!empty($listes)) { ?>
        <div class="row justify-content-center mb-4">
          <div class="col-md-6">
            <form method="post" class="bg-white p-4 rounded shadow">
              <label for="cat" class="form-label">Catégories</label>
              <select name="categorie" id="cat" class="form-select mb-3" required>
                <option disabled selected>-- Choisir une catégorie --</option>
                <?php foreach ($listes as $list) { ?>
                  <option value="<?= $list['nom_categorie'] ?>"><?= $list['nom_categorie']; ?></option>
                <?php } ?>
              </select>
              <input type="submit" value="Valider" class="btn btn-dark w-100">
            </form>
          </div>
        </div>
      <?php } ?>

      <?php if (isset($_POST['categorie'])) {
        $categorie = $_POST['categorie']; ?>
        <?php $listesObjets = getObjetFiltre($categorie); ?>
        <div class="row justify-content-center">
          <div class="col-md-10">
            <h1 class="text-center mb-4">Objets de la catégorie <?= $categorie; ?></h1>
            <div class="table-responsive shadow rounded overflow-hidden">
              <table class="table table-striped table-hover table-bordered">
                <thead class="text-center">
                  <tr>
                    <?php foreach ($parameters as $param) { ?>
                      <th><?= $param; ?></th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody class="text-center align-middle">
                  <?php foreach ($listesObjets as $o) { ?>
                    <tr>
                      <td class="fw-semibold"><?= $o['nom_objet']; ?></td>
                      <?php $emprunt = verifieSiEmprunte($o['id_objet']); ?>
                      <td>
                        <?= $emprunt !== false
                          ? "<span class='badge bg-success'>$emprunt</span>"
                          : "<span class='text-muted fst-italic'>Non emprunté</span>" ?>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </main>
</body>

</html>

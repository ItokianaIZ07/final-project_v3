<?php
ini_set("display_errors", "1");
require('../inc/function.php');
$categorie = getListCategorie();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../assets/style/style-formulaire-objet.css">
  <title>Ajout Objet</title>
</head>
<body>

<header>
  <nav class="container-fluid d-flex justify-content-between align-items-center">
    <ul class="d-flex align-items-center mb-0">
      <img src="../assets/image/<?= $_SESSION['pdp']; ?>" alt="Profil">
      <li><?= $_SESSION['user_name']; ?></li>
    </ul>
    <ul class="d-flex align-items-center mb-0">
      <li class="me-2">
        <a href="formulaire-objet.php"><button>Add thing</button></a>
      </li>
      <li>
        <a href="filtre.php"><button>Filtrer</button></a>
      </li>
    </ul>
  </nav>
</header>

<main>
  <div class="container">
    <div class="form-container bg-dark p-5 shadow rounded">
      <h3 class="text-center text-white mb-4">Ajouter un objet</h3>
      <form action="traitement-ajout-objet.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="photo" class="form-label text-light">Photo</label>
          <input type="file" name="image" id="photo" class="form-control bg-dark text-white" accept=".jpg, .jpeg, .png" required>
        </div>
    
        <label for="nom" class="form-label text-light">Nom de l'objet</label>
        <input type="text" name="nomObjet" id="">

        <select name="categorie" id="">
            <?php foreach($categorie as $cat) {?>
                <option value="<?= $cat['id_categorie']; ?>"><?= $cat['nom_categorie']; ?></option>
            <?php }?>
        </select>

        <input type="hidden" name="idUser" value="<?= $_SESSION['user_id']; ?>">

        <button type="submit" class="btn btn-light w-100">Valider</button>
      </form>
    </div>
  </div>
</main>

</body>
</html>

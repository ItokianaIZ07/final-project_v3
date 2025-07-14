<?php
ini_set("display_errors", "1");
session_start();
require('../inc/function.php');

$nom = $_GET['name'];
$id = $_GET['id'];
$images = getAllImageOf($id);
$categorie = $_GET['categorie'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/style/style-affichage.css">
    <title>Affichage-Objet</title>
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
            <h1 class="text-center text-light mb-4"><?= htmlspecialchars($nom); ?></h1>

            <?php if (!empty($images)) { ?>
                <div class="text-center mb-4">
                    <img src="../assets/image/<?= $images[0]['nom_image']; ?>" alt="Image principale"
                        class="img-fluid img-large">
                </div>

                <?php if (count($images) > 1) { ?>
                    <div class="d-flex justify-content-center thumbnails flex-wrap">
                        <?php for ($i = 1; $i < count($images); $i++) { ?>
                            <img src="../assets/image/<?= $images[$i]['nom_image']; ?>" alt="Miniature <?= $i; ?>"
                                class="img-thumbnail">
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="text-center">
                    <img src="../assets/image/default.png" alt="Image par défaut" class="img-fluid img-large mt-3">
                </div>
            <?php } ?>
            <!-- <a href="formulaire-affichage.php?id=<?= $id ?>&categorie=<?= $categorie; ?>"><button>Ajouter image</button></a> -->
        </div>
    </main>


</body>

</html>
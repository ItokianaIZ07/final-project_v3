<?php
ini_set("display_errors", "1");
require('../inc/function.php');
session_start();
$parameters = ["Nom", "Date de retour"];
$objets = getListObject();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/style/style-accueil.css">
    <title>Accueil</title>

</head>

<body>

    <header>
        <nav class="container-fluid d-flex justify-content-between align-items-center">
            <ul class="d-flex align-items-center mb-0">
                <img src="../assets/image/<?= $_SESSION['pdp']; ?>" alt="Profil">
                <li><?= $_SESSION['user_name']; ?></li>
            </ul>
            <ul>
                <a href="formulaire-objet.php"><button>Add thing</button></a>
            </ul>
            <a href="filtre.php"><button>Filtrer</button></a>
        </nav>
    </header>

    <main>
        <div class="container mt-4">
            <?php if (!empty($objets)) { ?>
                <h1 class="text-center mb-4">Listes des objets</h1>
                <div class="table-responsive">
                    <table class="table table-hover table-striped border rounded overflow-hidden shadow-sm bg-white">
                        <thead class="table-dark text-center">
                            <tr>
                                <?php foreach ($parameters as $param) { ?>
                                    <th><?= $param; ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody class="text-center align-middle">
                            <?php foreach ($objets as $o) { ?>
                                <tr>
                                    <td class="fw-semibold">
                                        <div class="row">
                                            <div class="col">
                                                <?php $photo = getImageObjet($o['id_objet']);?>
                                                <?php if (empty($photo)) { ?>
                                                    <img src="../assets/image/default.png" alt="">
                                                <?php } else { ?>
                                                    <img src="../assets/image/<?= $photo; ?>" alt="">
                                                <?php } ?>
                                            </div>
                                            <div class="col">
                                                <a href="affichage.php?id=<?= $o['id_objet']; ?>&name=<?= $o['nom_objet']; ?>&categorie=<?= $o['id_categorie']; ?>">
                                                    <?= $o['nom_objet']; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <?php $emprunt = verifieSiEmprunte($o['id_objet']); ?>
                                    <td>
                                        <?php if($emprunt != false) {?>
                                            <span class="badge bg-success">Disponible le <?= $emprunt; ?></span>
                                        <?php }else{?>
                                            <a href="emprunt.php?idObjet=<?= $o['id_objet']; ?>&idMembre=<?= $_SESSION['user_id']; ?>"><span class='text-muted fst-italic'><button>Emprunte</button></span></a>
                                        <?php }?>    
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            <?php } ?>
        </div>
    </main>

</body>

</html>
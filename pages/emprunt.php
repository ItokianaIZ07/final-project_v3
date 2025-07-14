<?php
ini_set("display_errors", "1");
session_start();

$idObject = $_GET['idObjet'];
$idMembre = $_GET['idMembre'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/style/style-accueil.css">
    <title>Emprunt</title>
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
        <div class="container">
            <form action="traitement-emprunt.php" method="post">
                <label for="nbr">Rendre apres : </label>
                <input type="number" id="nbr" name="nbr" required>
                <span>jour</span>
                <input type="hidden" name="membre" value="<?= $idMembre; ?>">
                <input type="hidden" name="objet" value="<?= $idObject; ?>">
                <input type="submit" value="valider">
            </form>
        </div>
    </main>
</body>

</html>
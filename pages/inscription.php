<?php
$gender = array(
    "Homme" => "M",
    "Femme" => "F"
);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/style/style-inscription.css">
    <title>Inscription</title>

</head>

<body class="d-flex align-items-center justify-content-center min-vh-100">
    <main class="container">
        <form action="traitement-inscription.php" method="post" enctype="multipart/form-data"
            class="form-container shadow rounded p-5" style="max-width: 500px; margin: auto;">
            <h3 class="text-center text-black mb-4">Créer un compte</h3>

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" name="nom" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="mail" class="form-label">Email</label>
                <input type="email" name="mail" id="mail" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="mdp" class="form-label">Mot de passe</label>
                <input type="password" name="mdp" id="mdp" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <select name="genre" id="genre" class="form-select">
                    <?php foreach ($gender as $indice => $genre) { ?>
                        <option value="<?= $genre; ?>"><?= $indice; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date de naissance</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="ville" class="form-label">Ville</label>
                <input type="text" name="ville" id="ville" class="form-control" required>
            </div>

            <div class="mb-4">
                <label for="photo" class="form-label">Photo de profil</label>
                <input type="file" name="image" id="photo" class="form-control" accept=".jpg, .jpeg, .png" required>
            </div>

            <button type="submit" class="btn btn-black w-100">S'inscrire</button>
        </form>
    </main>
</body>

</html>

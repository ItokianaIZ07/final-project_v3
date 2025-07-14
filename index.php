<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/style/style-index.css">
  <title>Accueil</title>

</head>
<body class="d-flex align-items-center justify-content-center min-vh-100">

  <main class="container">
    <form action="pages/traitement-login.php" method="post" class="form-container shadow rounded p-5" style="max-width: 450px; margin: auto;">
      <h3 class="text-center mb-4 text-black">Connexion</h3>

      <label for="mail" class="form-label">Email</label>
      <input type="email" name="email" id="mail" class="form-control mb-3" required />

      <label for="pass" class="form-label">Password</label>
      <input type="password" name="pwd" id="pass" class="form-control mb-4" required />

      <button type="submit" class="btn btn-black w-100 mb-4">Se connecter</button>

      <div class="d-flex align-items-center justify-content-center mb-3">
        <hr class="flex-grow-1" />
        <span class="px-3 text-muted">OU</span>
        <hr class="flex-grow-1" />
      </div>

      <div class="text-center mb-4">
        <a href="#" class="text-decoration-none">Mot de passe oublié ? <span class="text-danger">courage &#128578;</span></a>
      </div>

      <div class="text-center border-top pt-3">
        <p class="mb-0">Vous n'avez pas de compte ?
          <a href="pages/inscription.php" class="text-decoration-none fw-bold">Inscrivez-vous</a>
        </p>
      </div>
    </form>
  </main>

</body>
</html>

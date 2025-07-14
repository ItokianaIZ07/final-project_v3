<?php
ini_set('display_errors', "1");

require("../inc/function.php");

$mail = $_POST['email'];
$mdp = $_POST['pwd'];

$result = login($mail, $mdp);
if(empty($result))
{
    header('Location: ../index.php?error=1');
}
else
{
    session_start();
    $_SESSION['user_id'] = $result['id_membre'];
    $_SESSION['user_name'] = $result['nom'];
    $_SESSION['pdp'] = $result['image_profil'];
    header('Location: accueil.php');
}
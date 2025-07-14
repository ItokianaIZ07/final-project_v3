<?php
ini_set("display_erros", "1");
require('../inc/function.php');

$categorie = $_POST['categorie'];
$nom = $_POST['nomObjet'];
$id = $_POST['idUser'];
$image = $_FILES['image'];

uploadImg($id, $image, $nom, $categorie);

header('Location: accueil.php');
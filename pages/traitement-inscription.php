<?php

ini_set('display_errors', "1");

require("../inc/function.php");

$nom = $_POST['nom'];
$date = $_POST['date'];
$genre = $_POST['genre'];
$ville = $_POST['ville'];
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];
$file = $_FILES['image'];

sign($nom,$date,$genre,$mail,$ville,$mdp,$file);

header('Location: ../index.php?success=1');
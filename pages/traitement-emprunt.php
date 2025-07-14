<?php
ini_set("display_errors", "1");
require('../inc/function.php');


$idObject = $_POST['objet'];
$idMembre = $_POST['membre'];
$nbr = $_POST['nbr'];

addEmprunt($idObject, $idMembre, $nbr);

header('Location: accueil.php');
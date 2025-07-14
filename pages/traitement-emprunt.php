<?php
ini_set("display_errors", "1");
require('../inc/function.php');


$idObject = $_POST['objet'];
$idMembre = $_POST['membre'];
$nbr = $_POST['nbr'];

if($nbr <= 0)
{
    header('Location: emprunt.php?error=0&idObjet='.$idObject.'&idMembre='.$idMembre);
    exit();
}

addEmprunt($idObject, $idMembre, $nbr);

header('Location: accueil.php');
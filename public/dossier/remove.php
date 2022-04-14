<?php
include __DIR__ . './../includes/header_main.php';
include __DIR__ . './../includes/header_agenda.php';
require __DIR__ . "./../../src/functions.php";
require __DIR__ . "./../../db/connexion.php";

$connexionRemoveDossier = new Connexion;
$pdoRemoveDossier = $connexionRemoveDossier->prepare("DELETE from dossiers where id=".$_GET['id'].";");
$pdoRemoveDossier->execute();
header("location:./../agenda_month.php");
exit;



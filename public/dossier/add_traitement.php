<?php 

require __DIR__ . "./../../src/functions.php";

//recuperer tout les données du formulaire de ajout

$nomDossier = getPostParam("nom");
$start = getPostParam("start");
$description = getPostParam("description");
$cdp = getPostParam("nom_cdp");
$deadlineDate = getPostParam("deadline_date");
$deadlineHour = getPostParam("deadline_hour");

// validation des données



//nom dossier

//acces BDD

$pdo = get_pdo();
$chefs = new Calendar\Events($pdo);
print_r($chefs); //debogage


require_once __DIR__ . "./../../db/connexion.php";
$connexion = new Connexion();
$sql = "SELECT * FROM chef_projet";
$pdoStatement = $connexion->prepare($sql);
$result = $pdoStatement->execute();
   
var_dump($result);
var_dump($sql);
var_dump($connexion);
dd($result);



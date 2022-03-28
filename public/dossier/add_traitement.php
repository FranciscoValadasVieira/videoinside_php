<?php 

include __DIR__ . './../includes/header.php';
require __DIR__ . "./../../src/functions.php";
require __DIR__ . "./../../db/connexion.php";

//recuperer tout les données du formulaire de ajout
$nom = getPostParam("nom");
$start = getPostParam("start");
$description = getPostParam("description");
$cdp = getPostParam("nom_cdp");
$deadlineDate = getPostParam("deadline_date");
$deadlineHour = getPostParam("deadline_hour");
$deadline = $deadlineDate . " " . $deadlineHour;


// $erreurs = [];
//validation


// //nom
// // $regEx= "/^[a-zA-Z]+[\s\-]?[a-zA-Z]+$/";
// $motif = "/^[a-zA-Z]+[a-zA-Z\s\-]+[a-zA-Z]+$/";
// $valide = preg_match($motif, $nom);
// if (!$valide) {
//   $erreurs["nom"] = "nom est invalide";
// }

// //prenom
// $valide = preg_match($motif, $prenom);
// if (!$valide) {
//   $erreurs["prenom"] = "prenom est invalide";
// }

// //date de naissance
// $ddn = date_create($date);
// if ($ddn === false) {
//   $erreurs["date"] = "date est invalide";
// } else {
//   //on crée la date de jour
//   $now = date_create();
//   //la différence entre ddn et now
//   $diff = $ddn->diff($now);
//   // var_dump($diff);
//   if ($diff->y < 18) {
//     $erreurs["date"] = "date est invalide";
//   }
// }
// //centre
// $centre = intval($centre);
// if ($centre < 0) {
//   $erreurs["centre"] = "centre est invalide";
// }
// //on vérifie si tab $erreurs est vide
// if (count($erreurs) > 0) {
//   //on renvoie l'user vers le form
//   $_SESSION["erreurs"] = $erreurs; //on ajoute les msgs d'erreur dans la Session
//   header("location:form_ajout.php");
// } else {
  //on insère les données dans la BDD

//   try {
    //sauvegarder le fichier sur le serveur  

//     header("location:liste_stagiaire.php");
//   } catch (PDOException $ex) {
//     // var_dump($ex);
//     header("location:form_ajout.php?erreur=dbErreur");
//   } catch (Exception $ex) {
//     // var_dump($ex->getMessage());
//     header("location:form_ajout.php?erreur=dbErreur");
//   }



//Insertion dans la BDD

//Récuperation ID du chef de projet
$connexionFindChef = new Connexion();
$pdoFindChef = $connexionFindChef->prepare("select id from chef_projet where nom_cdp='".$cdp."';");
$pdoFindChef->execute();
var_dump($pdoFindChef);
$chefId= $pdoFindChef->fetch()[0];
var_dump($chefId);

//SI le chef de projet n'est pas dans notre BDD, on lui insère, et on refait notre requête de recuperation de ID du chef de projet

  if ($chefId === False) {
    $connexionInsertChef = new Connexion;
    $pdoInsertChef = $connexionInsertChef->prepare('INSERT INTO chef_projet VALUES (null,"'.$cdp.'");');
    $pdoInsertChef->execute();
    $pdoFindChef = $connexionFindChef->prepare("select id from chef_projet where nom_cdp='".$cdp."';");
    $pdoFindChef->execute();
    $chefId= $pdoFindChef->fetch()[0];

  } 

// Insertion d'un nouveau dossier dans la BDD  
$connexionInsertDossier = new Connexion;
$sql = "INSERT INTO dossiers (id, nom, start, description, chef_projet_id, deadline) values (null, :nom, :start, :description, :chef_projet_id, :deadline)";
$pdoInsertDossier = $connexionInsertDossier->prepare($sql);
$tab = [":nom" => $nom, ":start" => $start,":description" => $description, ":chef_projet_id" => '2', ":deadline" => $deadline];
$pdoInsertDossier->execute($tab);

?>
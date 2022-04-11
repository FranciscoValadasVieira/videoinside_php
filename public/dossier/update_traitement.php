<?php 
include __DIR__ . './../includes/header_main.php';
include __DIR__ . './../includes/header_agenda.php';
require __DIR__ . "./../../src/functions.php";
require __DIR__ . "./../../db/connexion.php";
require __DIR__ . "./../../dao/DossierDAO.php";

//recuperer tout les données du formulaire de modification

$id = $_GET['id'];
$nom = getPostParam("nom");
$start = getPostParam("start");
$description = getPostParam("description");
$cdp = getPostParam("nom_cdp");
$deadlineDate = getPostParam("deadline_date");
$deadlineHour = getPostParam("deadline_hour");
$deadline = $deadlineDate . " " . $deadlineHour;
var_dump($deadline);
var_dump($cdp);
var_dump($id);



//VALIDATION DES DONNEES
$errors = [];

//nom
$motif = "/^[a-zA-Z]+[a-zA-Z\s\-]+[a-zA-Z]+$/";
$valide = h(preg_match($motif, $nom));
if (!$valide) {
  $errors["nom"] = "Le nom est invalide!";
}

// //start   ############ a verifier si est vraiment necessaire ######################"
// $valide = 
// if (!$valide) {
//   $errors["start"] = "La date d'entrée du dossier est invalide!";
// }

//description
$valide = h($description);
if (!$valide) {
  $errors["description"] = "La description est obligatoire!";
}

//Chef de projet
$motif = "/^[a-zA-Z]+[a-zA-Z\s\-]+[a-zA-Z]+$/";
$valide = h(preg_match($motif, $cdp));
if (!$valide) {
  $errors["nom_cdp"] = "Le chef de projet n'est pas valide!";
}

//deadline Date  ############ a verifier si est vraiment necessaire ######################"
// $valide = 
// if (!$valide) {
//   $errors["deadline_date"] = "La date du deadline du dossier est invalide!";
// }

//deadline Hour  ############ a verifier si est vraiment necessaire ######################"
// $valide = 
// if (!$valide) {
//   $errors["deadline_hour"] = "L'heure du deadline du dossier est invalide!";
// }


//Verification de table "errors"
if (count($errors) > 0) {
  //on renvoie l'user vers le form
  $_SESSION["errors"] = $errors; //on ajoute les msgs d'erreur dans la Session
  header("location:update.php?id=".$_GET['id']);

} else {
    
    //update dans la BDD
    //Récuperation ID du chef de projet
  try {
    
      // findChefId($cdp); tentative de creation du DosssierDAO
    
      $connexionFindChef = new Connexion;
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

      // Modification du dossier dans la BDD  
      $connexionUpdateDossier = new Connexion;
      var_dump($connexionUpdateDossier);
      $sql = "UPDATE dossiers SET nom='$nom', start='$start', description='$description', chef_projet_id='$chefId', deadline='$deadline' WHERE id=$id;";
      var_dump($sql);
      $pdoUpdateDossier = $connexionUpdateDossier->prepare($sql);
      $pdoUpdateDossier->execute();
      
      } catch (PDOException $ex) {
          // var_dump($ex);
          header("location:update.php?erreur=dbErreur");
      }
}
    ?>
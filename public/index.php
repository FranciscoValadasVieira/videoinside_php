<?php
// session_start();
// define("BASE_PATH", "/videoinside_php");
// define("CURRENT_USER", "currentUser");
// define("CSRF_PARAM_NAME", "_csrf");
// require_once '../controller/DossierController.php';
// require_once '../controller/UserController.php';
// require_once '../src/User/User.php';

// //Protection CSRF
// //Génération d'un jéton aléatoire
// if (!isset($_SESSION[CSRF_PARAM_NAME])) {
//   $_SESSION[CSRF_PARAM_NAME] = bin2hex(random_bytes(32));
// }

//système d'authentification et autorisation
//vérifier si l'utilisateur est connecté
// $currentUser = isset($_SESSION[CURRENT_USER]) ? unserialize($_SESSION[CURRENT_USER]) : null; //unserialize($_SESSION[CURRENT_USER]) -> convertir currentUser stocké en mémoire en objet PHP
// if ($currentUser == null) { //internaute n'est pas connecté
//   header('location:'.BASE_PATH.'/public/agenda.php');; //redirection vers la page login.php
//   exit;
// }

// //analyser l'URL
// $chemin = $_SERVER["REQUEST_URI"]; // /greta_92_2022_mvc/stagiaire/list?erreur=dberreur
// if (str_starts_with($chemin, BASE_PATH)) {
//   $chemin = substr($chemin, strlen(BASE_PATH) + 1); // stagiaire/list?erreur=dberreur
// } else {
//   $chemin = substr($chemin, 1); // stagiaire/list?erreur=dberreur
// }
// router($chemin, $currentUser);


// /**
//  * aiguille la requête vers un entité de traitement (le controleur)
//  * exemple: 
//  */
// function router($chemin, $currentUser)
// {
//   $tabChemin = explode("/", $chemin);
//   // print_r($tabChemin);
//   // compter le nombre d'élément de $tabChemin
//   $indexModel = -1;
//   $indexMethodeController = -1;
//   $indexIdModel = -1;
//   switch (count($tabChemin)) {
//     case 2: //stagiaire/list
//       $indexModel = 0; //stagiaire
//       $indexMethodeController = 1; //list
//       break;
//     case 3: //stagiaire/update/5
//       $indexModel = 0; //stagiaire
//       $indexMethodeController = 1; //update
//       $indexIdModel = 2; //5
//       break;
//     default:
//       include 'agenda.php';
//       exit;
//   }
//   $modele = $tabChemin[$indexModel]; //stagiaire?
//   $methodeController = explode("?", $tabChemin[$indexMethodeController])[0]; //on récupère le premier élement du tableau
//   if ($indexIdModel != -1) {
//     $idModele = explode("?", $tabChemin[$indexIdModel])[0]; //on récupère le premier élement du tableau
//   }
//   $methodeHttp = $_SERVER['REQUEST_METHOD'];


//   //vérifier l'autorisation
//   //les requetes HTTP POST terminant par "add", "update", "delete" sont autorisé uniquement pour l'utilisateur ayant le role "ADMIN"
//   if (in_array($methodeController, ["add", "update", "delete"]) && $methodeHttp == "POST") {
//     if ($currentUser->getRole() != "ADMIN") {
//       header('location:' . BASE_PATH . '/403.php'); //redirection vers la page 403.php
//       exit;
//     }
//   }

//   //Protection CSRF
//   //vérifier la présence de token CSRF pour les méthodes HTTP POST
//   if ($methodeHttp == 'POST') {
//     if (!isset($_POST['_csrf'])) {
//       header('location:' . $_SERVER['HTTP_REFERER'] . '?erreur=csrf');
//       exit;
//     }
//   }
//   switch ($modele) {
//       //GET user/add //afficher le form
//       //POST user/add //traiter le form
//     case 'user':
//       $userController = new UserController();
//       if ($methodeController == "add") { //GET stagiaire/add
//         if ($methodeHttp == "GET") {
//           $userController->showAddForm(); //affichage de formulaire
//         } else {
//           $userController->add(); //traitement de formualire
//         }
//       }
//       break;
      
//   }
// }
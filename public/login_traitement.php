<?php
include __DIR__ . './includes/header_main.php';
include __DIR__ . "./includes/header_agenda.php";
require_once __DIR__ .  "./../src/functions.php";
require_once __DIR__ . "./../dao/UserDAO.php";
$user = new UserDAO;
var_dump($user);

$username = getPostParam("username");
$password = getPostParam("password");
$newUser = $user->findByUsername($username);

// var_dump($newUser);


if ($password === $newUser->getPassword()) {
    $_SESSION[CURRENT_USER] = serialize($username);
    //renvoyer l'user vers la page d'accueil d'admin
     header("location:agenda_month.php");
     exit;

} else {
    //renvoyer l'user ver le formulaire de login
    $_SESSION[CURRENT_USER] = null;
     header("location:login.php?erreur=1");
     exit;
}


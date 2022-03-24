<?php
require_once '../dao/UserDAO.php';
require_once  '../src/User/User.php';


class UserController
{
  private $userDAO;

  public function __construct()
  {
    $this->userDAO = new UserDAO();
  }

  public function showAddForm() // GET user/add
  {
    include '../src/User/user/add.php';
  }

  public function add() //POST user/add
  {
    $username = $_POST["username"];
    $password = $_POST["password"];

    //création d'utilisateur
    $user = new User();
    $user->setUsername($username);
    //hacher le mot de passe
    $password = password_hash($password, PASSWORD_DEFAULT);
    $user->setPassword($password);
    $user->setRole($role);
    //insertion d'user dans BDD
    $this->userDAO->save($user);
    //redirection ver la page login.php
    header('location:' . BASE_PATH . '/login.php');
  }
}
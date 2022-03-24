<?php
require_once __DIR__ . "./../db/connexion.php";
require_once __DIR__ . "./../src/User/User.php";

class UserDAO
{
  private $connexion;

  public function __construct()
  {
    $this->connexion = new Connexion();
  }

  public function save(User $user)
  {
    $statment = $this->connexion->prepare("insert into user values(null, :username, :password)");
    $statment->execute([
      ":username" => $user->getUsername(),
      ":password" => $user->getPassword()
    ]);
  }
  public function findByUsername(string $username)
  {
    $statment = $this->connexion->prepare("select * from user where username=:username");
    $statment->execute([
      ":username" => $username
    ]);
    $user = $statment->fetch();
    if ($user) {
      $user = User::createUser($user);
    } else {
      $user = new User();
    }
    return $user;
  }
}

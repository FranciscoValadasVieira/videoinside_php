<?php
require_once __DIR__ . "./../db/connexion.php";

class DossierDAO {
  
private $connexion;

    public function __construct() {
        $this->connexion = new Connexion();
        }


    public function findChefId($cdp) { // on identifie le numero de ID du chef de projet choisis
  
        $pdoFindChef = $this->connexion->prepare("select id from chef_projet where nom_cdp='".$cdp."';");
        $pdoFindChef->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS, DossierDAO::class);
        $chefId= $pdoFindChef->fetch()[0];
        return $chefId;
        }

        

}
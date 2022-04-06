<?php

namespace Agenda;

class ChefProjet {

private $id;
private $nomCdp;

/**
 * Get the value of id
 */ 
public function getId()
{
return $this->id;
}

/**
 * Set the value of id
 *
 * @return  self
 */ 
public function setId($id)
{
    $this->id = $id;
    
    return $this;
}

/**
 * Get the value of nomCdp
 */ 
public function getNomCdp()
{
    return $this->nomCdp;
}

/**
 * Set the value of nomCdp
 *
 * @return  self
 */ 
public function setNomCdp($nomCdp)
{
$this->nomCdp = $nomCdp;

return $this;
}


// public functions


public function CheckChef($nomCdp) {
        
        $statement = $this->pdo->query("SELECT * FROM chef_projet");
        $statement->setFetchMode(\PDO::FETCH_CLASS, ChefProjet::class);
        $chefs = $statement->fetch();
        foreach ($chefs as $chef) {
            if($chef=$nomCdp) {
                $chef=TRUE;
            } else {
                $chef=False;
            };
        };
        return $chef; 
    }


public function RemoveChef($nomCdp){ 


}    

}
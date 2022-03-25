<?php
namespace Agenda;

class Dossier {

    private $id;
    private $nom;
    private $description;
    private $start;
    private $nom_cdp;
    private $deadline;

    /**
     * Get the value of id
     */ 
    public function getId() : id
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
     * Get the value of nom
     */ 
    public function getNom() : string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription() : string
    {
        return $this->description ?? ''; // si null envoi une chaine vide
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of start
     */ 
    public function getStart() : \DateTime
    {
        return new \DateTime($this->start);
    }

    /**
     * Set the value of start
     *
     * @return  self
     */ 
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get the value of deadline
     */ 
    public function getDeadline() : \DateTime
    {
        return new \DateTime($this->deadline);
    }

    /**
     * Set the value of deadline
     *
     * @return  self
     */ 
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;

        return $this;
    }

    /**
     * Get the value of cdp
     */ 
    public function getNomCdp() : string
    {
        return $this->nom_cdp;
    }

    /**
     * Set the value of cdp
     *
     * @return  self
     */ 
    public function setNomCdp($cdp)
    {
        $this->cdp = $cdp;

        return $this;
    }
}
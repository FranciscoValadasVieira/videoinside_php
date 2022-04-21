<?php 

namespace Agenda;

class Dossiers {

    private $pdo; //inicier le pdo dès le constructor

    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
    }


    /**
    * Recuperer les elements entre 2 dates
    * @param \DateTime $start
    * @param \DateTime $end
    * @return array 
    */

    public function getDossiersBetween(\DateTime $start, \DateTime $end) : array {
        $sql = "SELECT * FROM dossiers WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}' ORDER BY deadline ASC;";
        $statement =$this->pdo->query($sql);
        $results = $statement->fetchAll();
        return $results;
    }


    /**
     * 
     * Recuperer les elements entre 2 dates indexé par jour
     * @param \DateTime $start
     * @param \DateTime $end
     * @return array
     */

    public function getDossiersBetweenByDay(\DateTime $start, \DateTime $end) : array {
        $dossiers = $this->getDossiersBetween($start, $end);
        $days = [];
        foreach($dossiers as $d){
            $date = explode(' ', $d['start'])[0];
            if(!isset($days[$date])) {
                $days[$date] = [$d];
            } else {
                    $days[$date][] = $d;
                }
            }
            return $days;
        }


    /**
     * Recuperer un dossier
     * @param int $id 
     * @return Dossier
     * @throws \Exception
     */

    public function findDossier(int $id) : Dossier {
        require __DIR__ . './Dossier.php';
        $statement =  $this->pdo->query("select * from dossiers, chef_projet WHERE dossiers.chef_projet_id=chef_projet.id AND dossiers.id=$id;");
        $statement->setFetchMode(\PDO::FETCH_CLASS, Dossier::class);
        $result = $statement->fetch();
        print_r($result);
        if ($result === false) {
            throw new \Exception ('Aucun resultat n\'a été trouvé');
        } 
        return $result;
    
    } 

   
}
 
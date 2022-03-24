<?php 

namespace Calendar;

class Events {

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

    public function getEventsBetween(\DateTime $start, \DateTime $end) : array {
        $sql = "SELECT * FROM dossiers WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}'";
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

    public function getEventsBetweenByDay(\DateTime $start, \DateTime $end) : array {
        $events = $this->getEventsBetween($start, $end);
        $days = [];
        foreach($events as $event){
            $date = explode(' ', $event['start'])[0];
            if(!isset($days[$date])) {
                $days[$date] = [$event];
            } else {
                    $days[$date][] = $event;
                }
            }
            return $days;
        }


    /**
     * Recuperer un event
     * @param int $id 
     * @return Event
     * @throws \Exception
     */

    public function findEvent(int $id) : Event {
        require __DIR__ . './Event.php';
        $statement =  $this->pdo->query("select * from dossiers, chef_projet WHERE dossiers.chef_projet_id=chef_projet.id AND dossiers.id=$id;");
        $statement->setFetchMode(\PDO::FETCH_CLASS, Event::class);
        $result = $statement->fetch();
        print_r($result);
        if ($result === false) {
            throw new \Exception ('Aucun resultat n\'a été trouvé');
        } 
        return $result;
    
    } 

}
 
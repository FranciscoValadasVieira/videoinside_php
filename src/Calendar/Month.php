<?php
namespace Calendar;
use DateTime;


/**
 * constructor Month
 * @param for $month Le mois commpris entre 1 et 12
 * @param for $year Les années
 * @throws \Exception
 */

class Month {

    public $days = ['Lundi', 'Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];

    private $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    public $month; //les variables sont en public pour pouvoir etre consulter par les fleches de previous et next month
    public $year; //les variables sont en public pour pouvoir etre consulter par les fleches de previous et next month

    public function __construct( ?int $month = null, ?int $year = null) {

        if ($month === null) {
            $month = intval(date(format: 'm'));
        }
        if ($year === null) {
            $year = intval(date(format: 'Y'));
        }

        if ($month < 1 || $month > 12) {
        throw new \Exception (message: "Le mois n'est pas valide");
        }
        if ($year < 1970){
        throw new \Exception (message: "L' année est inferieur à 1970");
        }
        $this->month = $month;
        $this->year = $year;
    }
    
    /**
     * recuperer le premier jour de chaque mois
     * @return \DateTime
     */

    public function getStartingDay() : \DateTime {
        return new \DateTime ("{$this->year}-{$this->month}-01");
    }

    /**
     * retourne le mois en écris
     * @return string
     */
    
    public function toString() : string {
        return $this -> months[$this->month - 1] . " " . $this->year;
        
    }

    /**
     * je recupere les semaines pour chaque mois avec la condition pour le mois de javier qui donne -47 semaines
     */ 
    public function getWeeks():  int {
        $start = $this->getStartingDay();
        $end = (clone $start)->modify("+1 month -1 day");
        // var_dump($start, $end );
        // var_dump($start->format('W'), $end->format('W'));
        $weeks = intval($end->format('W')) - intval($start->format('W')) + 1;
        if ($weeks < 0) {
            $weeks = intval($end->format('W'));
        }
        return $weeks;
    }


    /**Savoir si le jour est dans le mois
     * @return bool
     */
    public function withinMonth(\DateTime $date) : bool{
        return $this->getStartingDay()->format('Y-m') === $date->format('Y-m');

    }


    // ajouter un mois
    public function nextMonth() : Month {
        $month = $this->month + 1;
        $year = $this-> year;
        if ($month > 12) {
            $month = 1;
            $year += 1; 
        }
        return new Month($month, $year);
    }


    // substraire un mois
    public function previousMonth() : Month {
        $month = $this->month - 1;
        $year = $this-> year;
        if ($month < 1) {
            $month = 12;
            $year -= 1; 
        }

        return new Month($month, $year);
    
    }
}
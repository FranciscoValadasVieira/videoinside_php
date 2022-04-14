<?php
namespace Agenda;
use DateTime;


/**
 * constructor Week
 */

class Week {

    public $days = ['Lundi', 'Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
    public $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    public $year; //les variables sont en public pour pouvoir etre consulter par les fleches de previous et next month
    public $week;//les variables sont en public pour pouvoir etre consulter par les fleches de previous et next month


    public function __construct( ?int $week = null, ?int $year = null) {

        if ($week === null) {
            $week = intval(date(format: 'W'));
        }
       
         if ($year === null) {
            $year = intval(date(format: 'o'));
        }
        

        if ($week < 1 || $week> 53) {
        throw new \Exception (message: "La semaine n'est pas valide");
        }
        if ($year < 1970){
        throw new \Exception (message: "L'année est inferieur à 1970");
        }
        $this->week = $week;
        $this->year = $year;
        
    }
    
    /**
     * recuperer le lundi de chaque semaine
     * @return \DateTime
     */

    public function getMondayOfWeek() : \DateTime  {

    $timestamp = mktime( 0, 0, 0, 1, 1,  $this->year ) + ( $this->week * 7 * 24 * 60 * 60 );
    $timestampForMonday = $timestamp - 86400 * ( date( 'N', $timestamp ) - 1 );
    $dateForMonday = date( 'd-m-Y', $timestampForMonday );
    return new \DateTime ($dateForMonday);
    }

    /**
     * recuperer le dimanche de chaque semaine
     * @return \DateTime
     */

    public function getSundayOfWeek() : \DateTime {

    $timestamp = mktime( 0, 0, 0, 1, 1,  $this->year ) + ( $this->week * 7 * 24 * 60 * 60 );
    $timestampForSunday = $timestamp - 86400 * ( date( 'N', $timestamp ) - 7 );
    $dateForSunday = date( 'd-m-Y', $timestampForSunday );
    return new \DateTime ($dateForSunday);
   
    }
    

    /**
     * retourne le mois en écris
     * @return string
     */
    
    public function monthToString() : string {
        
        $mondayMonth = $this-> getMondayOfWeek()->format('m');
        $sundayMonth = $this-> getSundayOfWeek()->format('m');
        $mondayYear = $this-> getMondayOfWeek()->format('Y');
        $sundayYear = $this-> getSundayOfWeek()->format('Y');

        if ($mondayMonth===$sundayMonth && $mondayYear===$sundayYear){
            return $this -> months[$mondayMonth -1] . " " . $mondayYear;
        } 
        elseif ($mondayMonth!=$sundayMonth && $mondayYear!=$sundayYear) {
            return $this -> months[$mondayMonth -1] . " " . $mondayYear . " / " . $this -> months[$sundayMonth -1] . " " . $sundayYear ;
        } else {
            return $this -> months[$mondayMonth -1] . " / " . $this -> months[$sundayMonth -1] . " " . $mondayYear;
        }
    }


    // ajouter une semaine
    public function nextWeek() : Week {
        $week = $this->week + 1;
        $year = $this-> year;
        if ($week > 52) {
            $week = 1;
            $year += 1; 
        }
        return new Week($week, $year);
    }


    // substraire une semaine
    public function previousWeek() : Week {
        $week = $this->week - 1;
        $year = $this-> year;
        if ($week < 1) {
            $week = 52;
            $year -= 1; 
        }

        return new Week($week, $year);
    
    }
}
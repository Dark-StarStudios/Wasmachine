<?php
include_once 'Apparaat.php';
class Magnetron extends Apparaat{
    public function __construct($isWork = false){ //Constructie opstarten als parent en argument (input) geeft 
        parent::__construct($isWork);
    }

    public function opwarmen(string $voeding, int $tijdSeconden, string $Wattege) {
        if($this->isWork){ //Controlleer of het apparaat werkt of niet 
            //laten zien dat de magnetron een food item opwarmd voor ...seconden met ...Wattege
            echo $voeding . " wordt met ".$Wattege." opgewarmd voor " . $tijdSeconden. "seconden !";
        }else{
            echo "De Magnetron is nog niet aan!";
        }
    }
}
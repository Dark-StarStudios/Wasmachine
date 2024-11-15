<?php
include_once 'Apparaat.php';
class Wasmachine extends Apparaat{
    public function __construct($isWork = false){ //Constructie opstarten als parent en argument (input) geeft 
        parent::__construct($isWork);
    }

    public function Wassen(string $kleding,string $zeep) {
        if($this->isWork){ //Controlleer of het apparaat werkt of niet 
            echo $kleding . " wordt gewassen door " . $zeep. "!"; //laten zien dat de kleding gewassen wordt door een zeep
        }else{
            echo "De Wasmachine is nog niet aan!";
        }
    }
}
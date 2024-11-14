<?php
class Apparaat {

    public bool $isWork; //Property of het apparaat werkt of niet 

    public function __construct($isWork = false){ //Constructie opstarten 
        $this->isWork = $isWork;
    }

    public function on(){ //Apparaat aanzetten
        $this->isWork = true;
    }
    public function off(){ //Apparaat uitzetten
        $this->isWork = false;
    }
}
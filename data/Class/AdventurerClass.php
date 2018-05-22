<?php


class AdventurerClass 
{
    public $name;
    public $hp;
    public $mp;
    
    function __construct($name)  
    {
        // On dois assigner à la proprieter nama la valeur $name
        $this->name = $name;
    }
    
    protected function setMp($mp)
    {
        return $this->mp = $mp;
    }

    protected function receiveDamage($dmg) // protected public private c'est des visibilités
    {
        if (isset($this->hp) && gettype($this->hp) == "integer") { // verifier que la varible existe et quel est du bon type 
            $this->hp = $this->hp - $dmg;
            return $this->hp;
        }
        // l'aventurier recoit des dégat qui sont soustraits à sa vie 
    }
    public function isDead() 
    {
        if($this->hp < 1) {
            return true;
        } else {
            return false;
        }
    }
}
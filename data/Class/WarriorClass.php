<?php 


class WarriorClass extends AdventurerClass 
{
    function __construct($name, $hp, $mp, $status = false)
    {
        parent ::__construct($name, $status);
        $this->hp = $hp;
        $this->mp = $mp;
    }
    public function hit($enemy) 
    {
        if(isset($enemy) && is_subclass_of($enemy, 'AdventurerClass')) {
            $dmg = rand(1, 10);
            $enemy->receiveDamage($dmg);
        }
    }
}
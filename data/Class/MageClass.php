<?php 


class MageClass extends AdventurerClass
{
    function __construct($name, $hp, $mp, $status = false)
    {
        parent ::__construct($name, $status);
        $this->hp = $hp;
        $this->mp = $mp;
    }

    public function FireBall($enemy) 
    {
        if(isset($enemy) && is_subclass_of($enemy, 'AdventurerClass')) {
            $useMp = rand(1, 5);
            if ($this->mp - $useMp >= 1) {  
                $dmg = rand(5, 20);
                $enemy->receiveDamage($dmg);
                $this->mp = $this->mp - $useMp;               
            } else {
                echo"Tu n'as plus de point de magie";
            }


        }

    }
}
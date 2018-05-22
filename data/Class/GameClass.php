<?php 
require_once('./Class/WarriorClass.php');
require_once('./Class/MageClass.php');

class GameClass 
{
    public $fighters = [];
    function __construct()
    {

    }

    public function createFighters() 
    {
        $this->fighters[] = new WarriorClass('Big Guerrier', 100, 20);
        $this->fighters[] = new MageClass('Harry Potter', 100, 35);

    }

    public function fight() 
    {
        while(true) 
        {  
                $this->fighters[0]->hit($this->fighters[1]);
                echo "<p>" . $this->fighters[0]->name . " a frappée " . $this->fighters[1]->name . "</p>";
                if($this->fighters[1]->isDead()) {   
                    echo"<p>" .  $this->fighters[1]->name . "is dead" . "<p>";
                    break;
                }

                $this->fighters[1]->FireBall($this->fighters[0]);
                echo "<p>" . $this->fighters[1]->name . " a frappée " . $this->fighters[0]->name . "</p>";
                if($this->fighters[0]->isDead()) {         
                    echo"<p>" .  $this->fighters[0]->name . " is dead " . "<p>"  ;
                    break;
                }
        }
            $this->endGame();
        }
    

    public function endGame()
    {
        echo "fin du combat";
    }
}
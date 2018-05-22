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
        $this->fighters[] = new WarriorClass('Big Guerrier', 50, 20);
        $this->fighters[] = new MageClass('Harry Potter', 50, 15);

    }

    public function fight() 
    {
        while(true) 
        {  
                $this->fighters[0]->hit($this->fighters[1]);
                echo "<p class='question'>" . $this->fighters[0]->name . " a frappée " . $this->fighters[1]->name . "</p>";
                echo "<p>" . $this->fighters[0]->name . " a  " . $this->fighters[0]->hp . " PV  </p>";
                echo "<p>" . $this->fighters[1]->name . " a  " . $this->fighters[1]->hp . " PV  </p>";
                if($this->fighters[1]->isDead()) {   
                    echo"<p class='dead'>" .  $this->fighters[1]->name . " is dead" . "<p>";
                    break;
                }
            echo"======================";
                $this->fighters[1]->FireBall($this->fighters[0]);
                echo "<p class='question'>" . $this->fighters[1]->name . " a frappée " . $this->fighters[0]->name . "</p>";
                echo "<p>" . $this->fighters[0]->name . " a  " . $this->fighters[0]->hp . " PV  </p>";
                echo "<p>" . $this->fighters[1]->name . " a  " . $this->fighters[1]->hp . " PV  et " . $this->fighters[1]->mp .  " MP </p>";

                if($this->fighters[0]->isDead()) {         
                    echo"<p class='dead'>" .  $this->fighters[0]->name . " is dead " . "<p>"  ;
                    break;
                }
             echo"======================";
        }
            $this->endGame();
        }
    

    public function endGame()
    {
        echo "fin du combat";
    }
}
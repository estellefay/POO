<?php 


class GameClass 
{
    public $fighters = [];
    function __construct()
    {
        if (isset($_GET['state']) && $_GET['state'] == 'save') {
            $this->createFighters($_POST);

        } else if (isset($_GET['state']) && $_GET['state'] == 'reset') {
            session_destroy();
            header('Location: index.php');
        } elseif (isset($_GET['state']) && $_GET['state'] == 'fight') {
            $fighters = SaveHelperClass::getData('fighters');
            $hero;
            $foe;
            foreach ($fighters as $key => $value) {
                if($value->status == "hero") {
                    $hero = $value;
                } elseif ($value->status == "foe") {
                    $foe = $value;
                }
            }

            if (get_class($hero) == "WarriorClass") {
                $hero->hit($foe);
            } elseif ((get_class($hero) == "MageClass")) {
                $hero->FireBall($foe);
            }

            if ($hero->hp <= 0 || $foe->hp <= 0) {
                RenderHelperClass::displayTemplate('end');
               var_dump('FIN DU JEU');die;
            } else {
                header('Location: index.php');
            }
            header('Location: index.php');
        }
        if(isset($_SESSION['fighters'])) {
            RenderHelperClass::displayTemplate('fight', SaveHelperClass::getData('fighters'));
            
        } else {
            RenderHelperClass::displayTemplate('form');
        }
    }

    

    protected function createFighters($fighters) 
    {

        foreach ($fighters as $key => $value) {
            if (gettype($value) == "array") {
                $class = ucfirst($value[3]) . 'Class'; #ucfirst mettre premiere lettre en majuscule 
                $this->fighters[] = new $class($value[0], $value[1], $value[2]);
            }
        }
        $this->fighters[] = new WarriorClass('Bozo', 100, 50, 'foe');
        SaveHelperClass::saveData('fighters', $this->fighters);
;


    }
/*
    public function fight() 
    {
        RenderHelperClass::simpleTag('h3', 'The fight is starting'); // utiliser la methode static definie dans la class RenderHelperClass
        while(true) 
        {  
                $this->fighters[0]->hit($this->fighters[1]);
                RenderHelperClass::simpleTag('p', "%0% à frappé %1%", [$this->fighters[0]->name, $this->fighters[1]->name], "question classe2");
                RenderHelperClass::simpleTag('p', "%0% à %1% PV", [$this->fighters[0]->name, $this->fighters[0]->hp], "classe1 classe2");
                RenderHelperClass::simpleTag('p', "%0% à %1% PV", [$this->fighters[1]->name, $this->fighters[1]->hp], "classe1 classe2");
                if($this->fighters[1]->isDead()) {   
                    RenderHelperClass::simpleTag('p', "%0% est dead", [$this->fighters[1]->name], "dead");     
                    break;
                }
            echo"======================";
                $this->fighters[1]->FireBall($this->fighters[0]);
                RenderHelperClass::simpleTag('p', "%0% à frappé %1%", [$this->fighters[1]->name, $this->fighters[0]->name], "question classe2");
                RenderHelperClass::simpleTag('p', "%0% à %1% PV", [$this->fighters[0]->name, $this->fighters[0]->hp], "classe1 classe2");
                RenderHelperClass::simpleTag('p', "%0% à %1% PV", [$this->fighters[1]->name, $this->fighters[1]->hp], "classe1 classe2");
                if($this->fighters[0]->isDead()) {   
                    RenderHelperClass::simpleTag('p', "%0% est dead", [$this->fighters[0]->name], "dead");      
                    break;
                }
             echo"======================";
        }
            $this->endGame();
        }
    
*/
    public function endGame()
    {
        echo "fin du combat";
    }
}
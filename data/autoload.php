<?php 

spl_autoload_register(function($class) { #fonction qui va être appeler automatiquement quand PHP tente d'acceder à une class qu'il ne connais pas
    include("./Class/" . $class . ".php");
});
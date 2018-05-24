<?php 
class RenderHelperClass
{
    /*
    $tag = string
    $content = string 
    $vars = optional array 
    $class = optional string
    */
    static function simpleTag($tag, $content, $vars = false, $class = false) # Methode static c'est que la methode est accesible directement depuis la class pas besoin d'initialiser un objet
    {
        if ($vars && gettype($vars) == "array") { 
            foreach ($vars as $key => $value) {
                $content = str_replace("%$key%", $value, $content);
            }
     }
        echo"<$tag class='$class'>$content</$tag>";
    }

    static function displayTemplate($templateName, $vars = false) 
    {
        $temp = "";
        $template = file_get_contents("./views/$templateName.html");
        if($vars) {

            foreach ($vars as $key => $value) {  # parcourir donnée de nos combatant 

                $temp .= "<div class='" .$value->status ."'>";
                $temp .= "<ul class = list-no-style>";
                $temp .= "<li> Name : " . $value->name . "</li>";
                $temp .= "<li> HP : " . $value->hp . "</li>";
                $temp .= "<li> MP : " . $value->mp . "</li>";
                $temp .= "<li> Class : " . str_replace("Class", "", get_class($value)) . "</li>";
                $temp .= "<li>Statut : " .$value->status . "</li>";
                $temp .= "</ul>";

                if($value->status == "hero") {
                    $temp .= "<a href='/index.php?state=fight'>Attack</a>";
                }
                $temp .= "</div>";
      
            } 

        }

        $template = str_replace("%fighters%", $temp, $template);
        echo($template);
    }

    
}
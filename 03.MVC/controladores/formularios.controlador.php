<?php

class ControladorFormularios {

    //Creacion de metodo de registro de usuarios.
    static public function crtRegistro() {
        
        if(isset($_POST["registroNombre"])) {

            //return $_POST["registroNombre"]."<br>".$_POST["registroEmail"]."<br>".$_POST["registroPassword"]."<br><br>";
            return "OK";
        }
    }
}

?>
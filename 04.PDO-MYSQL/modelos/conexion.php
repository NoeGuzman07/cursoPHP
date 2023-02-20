<?php

Class Conexion  {

    static public function conectar() {

        //Parametros a utilizar: PDO("nombre del servidor; nombre de la base de datos", "usuario", "contrasena")

        //Objecto de tipo PDO llamdo Link
        $link = new PDO("mysql:host=localhost;dbname=curso-php","root","");

        $link->exec("set names utf8");

        return $link;
    }
}

?>
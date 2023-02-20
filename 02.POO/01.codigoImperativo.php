<?php

//Capacitacion Dia #2: Martes - 14 - Febrero - 2023
//Dia de San Valentin (Dia del Amor y la Amistad)
//Cancion del dia: Phil Collins - In the air tonight

#Codigo Imperativo o Codigo Spaguetti

//Declaracion de objetos de tipo automovil
$automovil1 = (object)["marca"=>"Toyota", "modelo"=>"Corolla"];
$automovil2 = (object)["marca"=>"Hyundai", "modelo"=>"Accent Vission"];

//Creacion de funcion con parametros
function mostrar ($automovil) {

    echo "<p>Hola, soy un: $automovil->marca - Modelo: $automovil->modelo</p>";
}

//Llamado a la funcion
mostrar($automovil1);
mostrar($automovil2);

?>
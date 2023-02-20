<?php

//Capacitacion Dia #1: Lunes - 13 - Febrero - 2023

#1. Funciones SIN parametros
function saludo() {
    echo "Hola";
    echo "<br>";
}

//saludo();
saludo();

#2. Funciones CON parametros

function despedida($adios) {
    echo $adios."<br>";
}

despedida("adios");

#3. Funciones CON retorno

function retorno($retornar) {
    return $retornar;
}

echo retorno("retornar");

?>
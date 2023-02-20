<?php 

//En PHP se debe contar en el inicio de un proyecto el archivo index.php

//Este archivo mostrara la salida de las vistas al usuario
//y tambien a traves de el enviaremos las distintas acciones que el
//usuario envie al controlador.

//Require() es un codigo de JavaScript que estable que el codigo del archivo invocado es requerido, es decir, obligatorio para el funcionamiento del programa.
//Por ello, si el archivo especificado en la funcion require() no se encuentra saltara un error "PHP Fatal Error" y el programa PHP se detendra.

//La version require_once() funcionan de la misma forma que sus respectivo, salvo que, al utilizar la version _once, 
//se impide la carga de un mismo archivo mas de una vez.

//NOTA: Si requerimos el mismo codigo mas de una vez corremos el riesgo de redeclaraciones de variables, funciones
//o clases.

require_once "controladores/plantilla.controlador.php";
require_once "controladores/formularios.controlador.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrTraerPlantilla();

?>
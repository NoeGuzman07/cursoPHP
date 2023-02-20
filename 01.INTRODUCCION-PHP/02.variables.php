<?php

//Capacitacion Dia #1: Lunes - 13 - Febrero - 2023

//NOTA para abrir una variable utilizar el simbolo $

#Comentario explicando una variable numerica
$numero = 5;
echo $numero;

$numero = 5;
echo "<br> <br> Esto es una variable de tipo numero: $numero";

#Variable de tipo texto
$palabra = "palabra";
echo "<br> <br>";
echo "Esto es una variable de tipo texto: $palabra";

#Variable de tipo Booleana colocado en True
$booleana = true;
echo "<br> <br>";
echo "Esto es una variable de tipo booleana: $booleana";

#Variable de tipo Booleana colocado en False
# NOTA: La impresion en false se muestra vacio
$booleana2 = false;
echo "<br> <br>";
echo "Esto es una variable de tipo booleana: $booleana2";

#Variable de tipo Array (Arreglo)
# En este ejemplo se imprime el elemento del arreglo de la posicion 0
$colores = array("rojo", "amarillo", "verde", "azul");
echo "<br> <br>";
echo "Esto es una variable de tipo Array (Arreglo): $colores[0]";

#Variable de tipo Array (Arreglo)
# En este ejemplo se imprime el elemento del arreglo de la posicion 1
$colores = array("rojo", "amarillo", "verde", "azul");
echo "<br> <br>";
echo "Esto es una variable de tipo Array (Arreglo): $colores[1]";

#Variable de tipo Arreglo con propiedades
echo "<br> <br>";
$verduras = array("verdura1"=>"lechuga", "verdura2"=>"cebolla");
echo "Esto es una variable arreglo con propiedades: $verduras[verdura1]";

#Variable de tipo Objeto
echo "<br> <br>";
$frutas = (object)["fruta1"=>"pera", "fruta2"=>"manzana"];
echo "Esto es una variable de tipo objeto: $frutas->fruta1";

echo "<br> <br>";
echo "Esto es una variable de tipo objeto: $frutas->fruta2";

#Uso del metodo VAR_DUMP()
#Es un metodo que nos ayuda a mostrar que tipo de variable estamos utilizando
#Ademas, nos ayuda a identificar errores y las variables que podemos llamar en PHP
echo "<br> <br>";
echo "Nombre de la variable: "; var_dump($numero);
echo "<br> <br>";
echo "Nombre de la variable: "; var_dump($palabra);
echo "<br> <br>";
echo "Nombre de la variable: "; var_dump($booleana);
echo "<br> <br>";
echo "Nombre de la variable: "; var_dump($booleana2);
echo "<br> <br>";
echo "Nombre de la variable: "; var_dump($colores);
echo "<br> <br>";
echo "Nombre de la variable: "; var_dump($verduras);
echo "<br> <br>";
echo "Nombre de la variable: "; var_dump($frutas);

?>
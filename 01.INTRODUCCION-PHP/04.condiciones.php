<?php

//Capacitacion Dia #2: Martes - 14 - Febrero - 2023
//Dia de San Valentin (Dia del Amor y la Amistad)
//Cancion del dia: Phil Collins - In the air tonight

#Condiciones de tipo if - else
$a = 5;
$b = 10;

if($a > $b) {
    echo "A es mayor que B";
}

else if($a == $b) {
    echo "A es igual que B";
}

else {
    echo "A es menor que B";
}

echo "<br><br>";

# Uso de condiciones con switch-case
$dia = "sabado";

switch($dia) {

    case 'sabado': echo "Voy a estudiar PHP";
    break;
    case 'viernes': echo "Voy a ir a una fiesta";
    break;
    case 'domingo': echo "Voy a descansar";
    break;
    default: echo "Voy a ir a la universidad";

}

//Ciclo While

echo "<br><br>";
echo "Ciclo While";
echo "<br><br>";

$n = 1;

while($n <= 5) {
    echo "$n, ";
    $n++;
}

//Ciclo Do-While
echo "<br><br>";
echo "Ciclo Do-While";

$p = 1;

echo "<br><br>";

do {
    echo $p;
    $p++;
}while($p <= 5);

//Ciclo For

echo "<br><br>";
echo "Ciclo While";
echo "<br><br>";

for($i=1; $i<=5; $i++) {
    echo $i;
}

?>
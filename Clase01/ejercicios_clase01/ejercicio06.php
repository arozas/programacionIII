<?php
//Nombre: ALEJANDRO ROZAS
//División: 3-D
echo "Aplicación Nº 6 (Carga aleatoria)";
echo "<br>". "<br>";
/*
 *Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
 *función rand). Mediante una estructura condicional, determinar si el promedio de los números
 *son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
 *resultado.
 */

//Defino un array indexado de 5 elementos y a cada elementa le asigno un valor aleatorio del uno al diez.
$array = array(rand(1,10), rand(1,10), rand(1,10), rand(1,10),rand(1,10));
//Realiza el promedio usando la función de suma de arrays y lo promedio por el sizeof del mismo array.
$promedioElementos = (array_sum($array)/sizeof($array));

//Defino la sentencia de condición con un if.
if($promedioElementos ==6)
{
    echo "El valor es $promedioElementos";
}
elseif ($promedioElementos > 6)
{
    echo "El valor $promedioElementos es mayor que 6";
}
else{
    echo "El valor $promedioElementos es menor que 6";
}
?>
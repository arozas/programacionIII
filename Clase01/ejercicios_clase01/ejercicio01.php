<?php
//Nombre: ALEJANDRO ROZAS
//División: 3-C
echo "Aplicación No 1 (Sumar números)";
echo "<br>". "<br>";
/*
 * Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
 * supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
 * se sumaron.
 */

$sum = 0; // Inicializo la variable que acumulará la suma
$count = 0; // Inicializo el contador de números sumados
if(is_integer($sum)&& is_integer($count)) //Valido que las entradas sean números.
{
    for ($i = 1; $sum + $i <= 1000; $i++)
    {
        $sum += $i; // Sumamos el número actual a la variable $sum
        $count++; // Incrementamos el contador de números sumados
        echo "Numero sumado: ". $i . "<br>"; // Mostramos el número sumado en pantalla
        // concateno con puntos, le concateno un salto de linea, al final que es:
        //  "<br>" (Salto de línea).
    }
}
echo "<br>";
echo "El total de la suma de los numeros es: " . $sum . "<br>";
echo "Se sumaron un total de " . $count . " números." . "<br>";
echo "<br>". "<br>";

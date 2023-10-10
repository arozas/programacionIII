<?php
//Nombre: ALEJANDRO ROZAS
//División: 3-C
echo "Aplicación No 5 (Números en letras)";
echo "<br>". "<br>";
/*
 * Realizar un programa que en base al valor numérico de una variable $num, pueda mostrarse
 * por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
 * entre el 20 y el 60.
 * Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.
 */

// Defino la variable num:
$num = rand(0,100);

echo "El número generado es: ".$num;

// Defino unos arrays para contener las unidades y decenas escritas.
$unidades = array('', 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve');
$decenas = array(2 => 'veinte', 3 => 'treinta', 4 => 'cuarenta', 5 => 'cincuenta', 6 => 'sesenta');

// Valido por medio de condicionales if is el número se encuentra en el rango establecido.
if ($num >= 20 && $num <= 60)
{
    echo "<br>". "<br>";

    if ($num < 20) {
        echo $unidades[$num];
    } elseif ($num % 10 == 0) {
        echo $decenas[$num / 10];
    } else {
        echo $decenas[floor($num / 10)] . ' y ' . $unidades[$num % 10];
    }
}
elseif ($num < 20)
{
    echo "<br>". "<br>";
    echo "El número generado es menor a veinte.";
}
else
{
    echo "<br>". "<br>";
    echo "El número generado es mayor a sesesta.";
}
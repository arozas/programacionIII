<?php
//Nombre: ALEJANDRO ROZAS
//División: 3-D
echo "Aplicación No 3 (Obtener el valor del medio)";
echo "<br>". "<br>";
/*
 *Dadas tres variables numéricas de tipo entero $a, $b y $c realizar una aplicación que muestre
 *el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres
 *variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido. Ejemplo 1: $a
 *= 6; $b = 9; $c = 8; => se muestra 8.
 * Ejemplo 2: $a = 5; $b = 1; $c = 5; => se muestra un mensaje “No hay valor del medio”+
 */


// Defino las variables:
$a = rand(0,10);
$b = rand(0,10);
$c = rand(0,10);

echo "La variable en: ". $a . "<br>".
    "La variable en: ". $b . "<br>".
    "La variable en: ". $c . "<br>";

// Ordeno las las variables de menor a mayor
// Ordenando puedo identificar el valor del medio.
if ($a > $b) {
    $temp = $a;
    $a = $b;
    $b = $temp;
}
if ($b > $c) {
    $temp = $b;
    $b = $c;
    $c = $temp;
}
if ($a > $b) {
    $temp = $a;
    $a = $b;
    $b = $temp;
}

// Realizo la comprobación si existe un valor en el medio
if ($a == $b || $b == $c) {
    echo "No hay valor del medio";
} else {
    echo "El valor del medio es: " . $b;
}
?>

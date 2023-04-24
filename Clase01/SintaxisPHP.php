<?php
/*
Clase 01 - 27/03/2023
Profesores: Franco Lippi y Pablo Musella.

Esta materia va estar enfocada al aspecto del backend de la programación y se va a enfocar en las APIs (del inglés, application programming interface, en español, interfaz de programación de aplicaciones) y en la creación de Microservicios, dígase, las operaciones de lado del servidor.
 */
//Ejemplo de variables:
$nombre = "Juan";
$edad = 25;
$sueldo = 8500.33;
/* VARIABLES:
 * Como el tipo de dato de la variable esta implicito para el interprete en el valor no hay que declar su valor.
 * Las variables solas se van asignar el tipo de dato al seer leidas por interprete:
 * $nombre : string.
 * $edad : integer.
 * $sueldo : float.
 *
 * Las variables son case sensitive, digase reconcen entre mayusculas y minusculas.
 * en la catedra vamos a usar lower camelcase y las constantes en mayusculas.
 *
 * Como el tipo de dato de la variable esta implicito para el interprete en el valor no hay que declar su valor.
 * */
echo "VARIABLES";
echo "<br>";
print("nombre : $nombre ");
echo "<br>";
echo "edad: ",$edad;
echo "<br>";
printf("sueldo:%f ",$sueldo);

/*
 * Las funciones su nombre y como se invocan es muy parecido a como era en C. Esto es así por que el core de PHP esta desarrollado en C.
 * */

/* CONVERSION DE TIPOS:
 * Las conversiones las realiza automáticamente PHP dependiendo del contenido de las variables.
 * Se puede forzar la conversión por declarando adelante de la variable su valor.
 * */
echo "<br>"; echo "<br>";
echo "CONVERSIÓN DE TIPOS:";
echo "<br>";
$float = 1.36;
$integer = (int)$float;
echo "<br>";
echo"Conversion forzada:", $integer;
echo "<br>"; echo "<br>";
echo "OPERADORES:";
echo "<br>";
/* OPERADORES:
 * Los operadores son iguales a a los operaderes en C, C#, JAVA
 */
echo "<br>"; echo "<br>";
echo "Aritméticos:";
echo "<br>";
// Operaderes Aritméticos:
// Suma:
$valorA = 12;
$valorB = 15;
$valorC = 10;
$suma = $valorA + $valorB;
echo "<br>";
echo "La suma de A y B: ", $suma;
// Resta:
$resta = $valorB - $valorA;
echo "<br>";
echo "La resta de A y B: ", $resta;
// Multiplcación:
$multiplicacion = $valorB * $valorA;
echo "<br>";
echo "La multiplicación de A y B: ", $multiplicacion;
// División:
$division = $valorB / $valorA;
echo "<br>";
echo "La división de A y B: ", $division;
// Operadores de asignación:
echo "<br>"; echo "<br>";
echo "Asignación:";
echo "<br>";
$asignacion = $valorC = $valorB = $valorA;
echo "<br>";
echo "Valor de C = B = A: ", $asignacion;
// Operadores de comparación:
echo "<br>"; echo "<br>";
echo "Comparación:";
echo "<br>";
$comparacionA = $valorB > $valorA;
var_dump($comparacionA);
echo "<br>";
if(!$comparacionA)
echo "B es menor a A ";
echo "<br>"; echo "<br>";
echo "Incremento/Decremento:";
echo "<br>";
// Operadores de incremento o decremento:
echo "<br>";
echo "B: ",$valorB;
echo "<br>";
echo "A: ",$valorA;
$valorB--;
$valorA++;
echo "<br>";
echo "Post decremento e Incremento";
echo "<br>";
echo "B: ",$valorB;
echo "<br>";
echo "A: ",$valorA;
// Operadores de Logicos:
echo "<br>"; echo "<br>";
echo "Lógicos:";
echo "<br>";
// foo() nunca será llamado ya que los operadores están en cortocircuito
$a = (false && foo());
$b = (true  || foo());
$c = (false and foo());
$d = (true  or  foo());

// --------------------
// "||" tiene una precedencia mayor que "or"

// El resultado de la expresión (false || true) es asignado a $e
// Actúa como: ($e = (false || true))
$e = false || true;

// La constante false es asignada a $f antes de que suceda la operación "or"
// Actúa como: (($f = false) or true)
$f = false or true;
echo "<br>";
var_dump($e, $f);

// --------------------
// "&&" tiene una precedencia mayor que "and"

// El resultado de la expresión (true && false) es asignado a $g
// Actúa como: ($g = (true && false))
$g = true && false;

// La constante true es asignada a $h antes de que suceda la operación "and"
// Actúa como: (($h = true) and false)
$h = true and false;
echo "<br>";
var_dump($g, $h);

// Sentencias condicionales:
echo "<br>"; echo "<br>";
echo "SENTENCIAS CONDICIONALES:";
echo "<br>";
echo "<br>"; echo "<br>";
echo "if / else / elseif:";
echo "<br>";
if ($a > $b) {
    echo "<br>";
    echo "a es mayor que b";
} elseif ($a == $b) {
    echo "<br>";
    echo "a es igual que b";
} else {
    echo "<br>";
    echo "a es menor que b";
}
echo "<br>"; echo "<br>";
echo "Switch:";
echo "<br>";
$i = rand(0,5);
echo "<br>";
switch ($i) {
    case 0:
        echo "i es igual a 0";
        break;
    case 1:
        echo "i es igual a 1";
        break;
    case 2:
        echo "i es igual a 2";
        break;
    default:
        echo "i es igual a ", $i;
}
echo "<br>";
switch ($i) {
    case 0:
    case 1:
    case 2:
        echo "i es menor que 3 pero no negativo";
        break;
    default:
        echo "i es ", $i;
}
// Sentencias de iteración:
echo "<br>"; echo "<br>";
echo "SENTENCIAS ITERACIÓN:";
echo "<br>"; echo "<br>";
echo "Setencia for:";
echo "<br>";
echo "<br>";
/* ejemplo 1 */

for ($i = 1; $i <= 10; $i++) {
    echo $i;
}
echo "<br>";
/* ejemplo 2 */

for ($i = 1; ; $i++) {
    if ($i > 10) {
        break;
    }
    echo $i;
}
echo "<br>";
/* ejemplo 3 */

$i = 1;
for (; ; ) {
    if ($i > 10) {
        break;
    }
    echo $i;
    $i++;
}
echo "<br>";
/* ejemplo 4 */

for ($i = 1, $j = 0; $i <= 10; $j += $i, print $i, $i++);
/*
* Este es un array con algunos datos que se quieren modificar
* cuando se recorra el bucle for.
*/
$people = array(
    array('name' => 'Kalle', 'salt' => 856412),
    array('name' => 'Pierre', 'salt' => 215863)
);

for($i = 0; $i < count($people); ++$i) {
    $people[$i]['salt'] = mt_rand(000000, 999999);
}
/*
* Este es un array con algunos datos que se quieren modificar
* cuando se recorra el bucle for.
*/
$people = array(
    array('name' => 'Kalle', 'salt' => 856412),
    array('name' => 'Pierre', 'salt' => 215863)
);

for($i = 0; $i < count($people); ++$i) {
    $people[$i]['salt'] = mt_rand(000000, 999999);
}
/*
Es posible hacer un bucle a través de letras. Me sorprende cuántas personas no saben esto.
Para hacerlo, se puede utilizar el siguiente código en PHP:
*/
echo "<br>";
for($col = 'R'; $col != 'AD'; $col++) {
    echo $col.' ';
}
/*
Este código devuelve las letras del alfabeto de la R a la AC, lo que es muy útil cuando se trabaja con columnas de Excel.

Es importante tener en cuenta que no se puede utilizar la comparación $col < 'AD' para controlar el bucle. En su lugar, se debe utilizar la comparación $col != 'AD'.

¡Esta técnica puede ser muy conveniente y ahorrar tiempo cuando se trabaja con hojas de cálculo grandes!
*/
echo "<br>"; echo "<br>";
echo "Setencia foreach:";
echo "<br>";

$array = array(1, 2, 3, 4);
foreach ($array as &$valor) {
    $valor = $valor * 2;
    echo "<br>";
    echo $valor;
}
// $array ahora es array(2, 4, 6, 8)
unset($valor); // rompe la referencia con el último elemento
$array = array(1, 2, 3, 4);
foreach ($array as &$valor) {
    $valor = $valor * 2;
}
// $array ahora es array(2, 4, 6, 8)

// sin unset($valor), $valor aún es una referencia al último elemento: $array[3]

foreach ($array as $clave => $valor) {
    // $array[3] se actualizará con cada valor de $array...
    echo "<br>";
    echo "{$clave} => {$valor} ";
    print_r($array);
}
// ...hasta que finalmente el penúltimo valor se copia al último valor

// salida:
// 0 => 2 Array ( [0] => 2, [1] => 4, [2] => 6, [3] => 2 )
// 1 => 4 Array ( [0] => 2, [1] => 4, [2] => 6, [3] => 4 )
// 2 => 6 Array ( [0] => 2, [1] => 4, [2] => 6, [3] => 6 )
// 3 => 6 Array ( [0] => 2, [1] => 4, [2] => 6, [3] => 6 )

echo "<br>"; echo "<br>";
echo "Setencia while:";
echo "<br>";
echo "<br>";
echo "While:";
$i = 1;
while ($i <= 10) {
    echo "<br>";
    echo $i++;  /* el valor presentado sería
                   $i antes del incremento
                   (post-incremento) */
}

/* ejemplo 2 */

$i = 1;
echo "<br>";
echo "<br>";
echo "While y endwhile:";
while ($i <= 10):
    echo "<br>";
    echo $i;
    $i++;
endwhile;
/* ejemplo 3 */
echo "<br>";
echo "<br>";
echo "Este es un do while, imprime hasta 11 por que ejecuta codigo primero:";
do{
    echo "<br>";
    echo $i++;  /* el valor presentado sería
                   $i antes del incremento
                   (post-incremento) */
}
while ($i <= 10)
?>


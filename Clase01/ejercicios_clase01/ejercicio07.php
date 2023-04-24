<?php
//Nombre: ALEJANDRO ROZAS
//División: 3-D
echo "Aplicación Nº 7 (Mostrar impares)";
echo "<br>". "<br>";
/*
 *Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
 *Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
 *salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números
 *utilizando las estructuras while y foreach.
 */
//Declaro un array y lo inicializo sin valores.
$arrayImpares = [];
//Genero un número aleatorio de vueltas para iterar.
$vueltas = rand(21,1000);
//Declaro un contador de impares en 0.
$contadorImpares = 0;
//Itero con un for.
for ($i=0; $i<$vueltas; $i++)
{
    //Valido que el array sea impar y que solo cargue 10.
    if($i%2!=0 && $contadorImpares <= 10){
        //Si el número es impar, lo asigno al array.
        $arrayImpares[] = $i;
        $contadorImpares++;
    }
}
//Genero una variable index para mostrar en pantalla.
$index=0;
foreach($arrayImpares as $valor)
{
    echo "<br>El valor en indice [$index] del array es: $valor";
    $index++;
}
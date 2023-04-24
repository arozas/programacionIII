<?php

//Nombre: ALEJANDRO ROZAS
//División: 3-D
echo "Aplicación No 2 (Mostrar fecha y estación)";
echo "<br>". "<br>";
/*
 *Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
 *distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
 *año es. Utilizar una estructura selectiva múltiple.
 */

// Obtengo la fecha actual.
$fechaActual = date("Y-m-d H:i:s");

// Imprimo la fecha actual en los distintos formatos
echo "Fecha actual en formato 'Y-m-d H:i:s' se muestra así = " . $fechaActual . "<br>";
echo "Fecha actual en formato 'd/m/Y': se muestra así = " . date("d/m/Y") . "<br>";
echo "Fecha actual en formato 'l, F j, Y': se muestra así = " . date("l, F j, Y") . "<br>";

// Determino la estación del año formateando la fecha como solo mes en númerico y día númerico:.
$mesActual = date("n");
$diaActual = date("d");

switch ($mesActual) {
    case 1:
    case 2:
    case 12:
        if($diaActual>20)
        {
            $estacion = "Verano";
        }
        else
        {
            $estacion = "Primavera";
        }
        break;
    case 3:
    case 4:
    case 5:
        if($diaActual>20)
        {
            $estacion = "Otoño";
        }
        else
        {
            $estacion = "Verano";
        }
        break;
    case 6:
    case 7:
    case 8:
    if($diaActual>20)
        {
            $estacion = "Invierno";
        }
        else
        {
            $estacion = "Otoño";
        }
        break;
    default:
        $estacion = "Primavera";
}

echo "Estamos en: " . $estacion;
?>
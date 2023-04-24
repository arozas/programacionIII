<?php
//Nombre: ALEJANDRO ROZAS
//División: 3-D
echo "Aplicación No 13 (Invertir palabra)";
echo "<br>". "<br>";
/*
 * Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
 * función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
 * deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
 * “Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán: 1 si la palabra
 * pertenece a algún elemento del listado.
 * 0 en caso contrario.
*/

//Declaro la variable que va a contener el array de caracteres.
$palabra = "Parcial";
$max = 15;


echo ComprobarPalabra($palabra, $max);

//Creo la función que va invertir la palabra.
function ComprobarPalabra($par_1, $par_2){

    //Verifico que el caracter no sea null
    $rtn = 0;
    //Gerero la lista de de palabras.
    $palabrasValidas = array('Recuperatorio', 'Parcial', 'Programacion');


    //Realizo las operaciones:
    if($par_1 != null && is_string($par_1) && is_numeric($par_2)) {
        $largoPalabra = strlen($par_1);
        if($largoPalabra<$par_2){

            if( $par_1 == $palabrasValidas[0] || $par_1 == $palabrasValidas[1] || $par_1 == $palabrasValidas[2]) {
                $rtn = 1;
            }
        }
    }

    return $rtn;
}
?>
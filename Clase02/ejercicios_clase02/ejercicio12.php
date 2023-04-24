<?php
//Nombre: ALEJANDRO ROZAS
//División: 3-D
echo "Aplicación No 12 (Invertir palabra)";
echo "<br>". "<br>";
/*
 * Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
 * de las letras del Array.
 * Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.
*/

//Declaro la variable que va a contener el array de caracteres.
$palabra = "Alejandro";

echo InvertirPalabra($palabra);

//Creo la función que va invertir la palabra.
function InvertirPalabra($par_1){

    //Verifico que el caracter no sea null
    if($par_1 != null && is_string($par_1) ) {
        $largoPalabra = strlen($par_1);
        $palabraInvertida ="";
        for ($i = 0; $i < $largoPalabra; $i ++ ){
            $palabraInvertida[$largoPalabra-$i] = $par_1[$i];
        }
        return $palabraInvertida;
    }
    else{
        return "No hay palabra para invertir o no es una palabra.";
    }
}
?>
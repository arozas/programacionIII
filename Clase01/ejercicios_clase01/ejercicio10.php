<?php
//Nombre: ALEJANDRO ROZAS
//División: 3-C
echo "Aplicación Nº 10 (Arrays de Arrays)";
echo "<br> <br>";
/*
Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
Arrays de Arrays.
 */

$lapiceraRoja = array("color" => "Rojo", "marca"=>"Bic", "trazo"=>"Fino", "precio"=>100.50);
$lapiceraNegro = array("color" => "Negro", "marca"=>"Génerica", "trazo"=>"medio", "precio"=>99.50);
$lapiceraAzul = array("color" => "Azul", "marca"=>"Parker", "trazo"=>"Fino", "precio"=>10000.50);

$lapicerasIndexado =array($lapiceraRoja,
    $lapiceraNegro,
    $lapiceraAzul);

$lapicerasAsociativo = array("lapiceraRoja"=>$lapiceraRoja,
    "lapiceraNegra"=>$lapiceraNegro,
    "lapiceraAzul"=>$lapiceraAzul);

echo "<br>Array Indexado:";
foreach ($lapicerasIndexado as $value){
    mostrarLapicera($value);
}
echo "<br>Array Asociativo:";
foreach ($lapicerasAsociativo as $value){
    mostrarLapicera($value);
}

function mostrarLapicera($arrayLapiceras){
    print_var_name($arrayLapiceras);
    foreach ($arrayLapiceras as $key => $value)
    {
        switch ($key)
        {
            case "color":
                echo "<br>El $key es $value.";
                break;
            case "marca":
                echo "<br>La $key es $value.";
                break;
            case "trazo":
                echo "<br>El $key es $value.";
                break;
            default:
                echo "<br>El $key es $: $value.";
        }
    }
}
function print_var_name(){
    // read backtrace
    $bt   = debug_backtrace();
    // read file
    $file = file($bt[0]['file']);
    // select exact print_var_name($varname) line
    $src  = $file[$bt[0]['line']-1];
    // search pattern
    $pat = '#(.*)'.__FUNCTION__.' *?\( *?(.*) *?\)(.*)#i';
    // extract $varname from match no 2
    $var  = preg_replace($pat, '$2', $src);
    // print to browser
    echo '<pre>' . trim($var);
}
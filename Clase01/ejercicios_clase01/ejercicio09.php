<?php
//Nombre: ALEJANDRO ROZAS
//División: 3-C
echo "Aplicación Nº 9 (Arrays asociativos)";
echo "<br> <br>";
/*
Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
lapiceras.
 */

$lapiceraRoja = array("color" => "Rojo", "marca"=>"Bic", "trazo"=>"Fino", "precio"=>100.50);
$lapiceraNegro = array("color" => "Negro", "marca"=>"Génerica", "trazo"=>"medio", "precio"=>99.50);
$lapiceraAzul = array("color" => "Azul", "marca"=>"Parker", "trazo"=>"Fino", "precio"=>10000.50);

print_var_name($lapiceraRoja);
foreach ($lapiceraRoja as $key => $value)
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
print_var_name($lapiceraNegro);
foreach ($lapiceraNegro as $key => $value)
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
print_var_name($lapiceraAzul);
foreach ($lapiceraAzul as $key => $value)
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
?>
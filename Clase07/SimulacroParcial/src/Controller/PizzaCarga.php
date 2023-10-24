<?php

include_once Pizza::class;
include_once \src\JsonManager::class;

$sabor = $_GET["sabor"];
$tipo = $_GET["tipo"];
$cantidad = $_GET["cantidad"];
$precio = $_GET["precio"];

$ruta = "Pizza.json";
$array = \src\JsonManager::LeerJson($ruta);

if(isset($sabor) && isset($tipo) && isset($cantidad) && isset($precio))
{
    $pizzaAux = new Pizza($sabor, $precio, $tipo, $cantidad);
    Pizza::AltaModificacion($pizzaAux, $array, $ruta);
    printf("Pizza grabada en archivo.");
}else{
    printf("Faltan valores.");
}



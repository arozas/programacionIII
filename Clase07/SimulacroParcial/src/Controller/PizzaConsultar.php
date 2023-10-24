<?php

include_once 'src\Entities\Pizza.php';
include_once 'src\JsonManager.php';
include_once 'src\Tools.php';

$sabor = $_POST["sabor"];
$tipo = $_POST["tipo"];
$ruta = "Pizzas.json";


$productoAux = new Pizza($sabor, $tipo, null, null);
$array = JsonManager::LeerJson($ruta);

if(isset($sabor) && isset($tipo))
{
    if(Tools::ConsultaSiHayYCual($productoAux, $array) > -1)
    {
        printf("Sí hay :)");
    }
    else
    {
        if(Tools::ExisteUnValorEnArray($productoAux, $array, "_sabor"))
        {
            printf("Hay del mismo sabor. <br>");
        }
        else
        {
            printf("No hay del mismo sabor. <br>");
        }

        if(Tools::ExisteUnValorEnArray($productoAux, $array, "_tipo"))
        {
            printf("Hay del mismo tipo. <br>");
        }
        else
        {
            printf("No hay del mismo tipo. <br>");
        }
    }
}


?>
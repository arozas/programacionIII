<?php
include_once 'Pizza.php';
include_once 'Venta.php';
include_once 'Usuario.php';
include_once 'src\JsonManager.php';
include_once 'src\Tools.php';

$sabor = $_POST["sabor"];
$tipo = $_POST["tipo"];
$cantidad = $_POST["cantidad"];
$email = $_POST["email"];
$archivo = $_FILES["archivo"];

$rutaProductos = "Pizza.json";
$rutaUsuarios = "Usuarios.json";
$rutaVentas = "Ventas.json";

$arrayProductos = JsonManager::LeerJson($rutaProductos);
$arrayUsuarios = JsonManager::LeerJson($rutaUsuarios);
$arrayVentas = JsonManager::LeerJson($rutaVentas);

$productoAux = new Pizza($sabor, $tipo, null, null);
$usuarioAux = new Usuario($email);
$ventaAux = new Venta($productoAux,$usuarioAux,$cantidad, $archivo);

$indiceProductoAux = Tools::ConsultaSiHayYCual($productoAux, $arrayProductos);

if(isset($sabor) && isset($tipo) && isset($cantidad) && isset($email) && isset ($archivo))
{
    if($indiceProductoAux > -1)
    {
        $productoAuxEnArray = $arrayProductos[$indiceProductoAux];
        $stockProductoAuxEnArray = Tools::SacarValorDeClave($productoAuxEnArray, "cantidad");
        $cantidadPedido = Tools::SacarValorDeClave($ventaAux, "cantidad");

        if($stockProductoAuxEnArray >= $cantidadPedido)
        {
            $usuarioAux = $usuarioAux->Alta($arrayUsuarios, $rutaUsuarios);
            if($ventaAux->Alta($usuarioAux, $productoAuxEnArray, $arrayProductos, $arrayVentas,
                $rutaProductos, $rutaVentas))
            {
                printf("Venta realizada con éxito.<br>");
            }
        }
        else
        {
            printf("No quedan productos de este tipo.<br>");
        }
    }
    else
    {
        printf("No existe este producto.<br>");
    }
}
else
{
    printf("Introduzca todos los valores.");
}



?>
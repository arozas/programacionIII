<?php
//Nombre: ALEJANDRO ROZAS
//División: 3-D
echo "Aplicación No 21 ( Listado CSV y array de usuarios)";
echo "<br>". "<br>";
/*
Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,...etc),por ahora solo tenemos usuarios).

En el caso de usuarios carga los datos del archivo usuarios.csv. se deben cargar los datos en un array de usuarios.

Retorna los datos que contiene ese array en una lista
*/
include "UsuarioTres.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['nombre']) && isset($_POST['clave']) && isset($_POST['mail'])) {
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $email = $_POST['mail'];
        $usuario = new Usuario($nombre, $clave, $email);
        $resultado = $usuario->verificarLogin();
    }else {
        echo "Error";
    }
}else {
    echo "Método no permitido";
}
?>
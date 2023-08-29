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
include "UsuarioDos.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['listado']) && $_GET['listado'] == 'usuarios') {

        $usuarios = UsuarioDos::leerUsuarios();
        if (count($usuarios) > 0) {
            echo "<ul>";
            foreach ($usuarios as $usuario) {
                echo "<li>" . $usuario->getNombre() . " - " . $usuario->getMail() . "</li>";
            }
            echo "</ul>";
        } else {
            echo "No hay usuarios registrados.";
        }
    } else {
        echo "Solicitud inválida.";
    }
}else {
    echo "Método no permitido";
}
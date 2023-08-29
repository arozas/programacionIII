<?php
//Nombre: ALEJANDRO ROZAS
//División: 3-D
echo "Aplicación No 20 BIS (Registro CSV)";
echo "<br>". "<br>";
/*
Recibe los datos del usuario(nombre, clave,mail )por POST , crear un objeto y utilizar sus métodos para poder hacer el alta, guardando los datos en usuarios.csv. retorna si se pudo agregar o no.

Cada usuario se agrega en un renglón diferente al anterior.

Hacer los métodos necesarios en la clase usuario
*/
include_once "Usuario.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['nombre']) && isset($_POST['clave']) && isset($_POST['mail'])) {
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $email = $_POST['mail'];

        $usuario = new Usuario($nombre, $clave, $email);

        if($usuario->validarNombre() && $usuario->validarClave() && $usuario->validarEmail()) {
            $usuario->guardarEnCSV();
            echo 'UsuarioDos agregado correctamente.';
        } else {
            echo 'Error al agregar usuario: datos inválidos.';
        }
    } else {
        echo 'Error al agregar usuario: faltan datos.';
    }
}else {
    echo "Método no permitido";
}


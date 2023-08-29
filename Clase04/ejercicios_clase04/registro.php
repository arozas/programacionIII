<?php
require_once 'UsuarioController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $clave = $_POST['clave'] ?? '';
    $mail = $_POST['mail'] ?? '';

    // Validar los datos ingresados
    if (empty($nombre) || empty($clave) || empty($mail)) {
        die('Error: Todos los campos son requeridos.');
    }

    // Crear una instancia del controlador de usuario
    $usuarioController = new UsuarioController();

    // Registrar el usuario
    $resultado = $usuarioController->registrarUsuario($nombre, $clave, $mail);

    if ($resultado) {
        echo 'Usuario registrado correctamente.';
    } else {
        echo 'No se pudo agregar el usuario.';
    }
}
?>
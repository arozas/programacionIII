<?php
/**
 * Clase UsuarioController
 *
 * Controlador encargado de gestionar las acciones relacionadas con los usuarios.
 */
include_once "Clase04/ejercicios_clase04/Entidades/Usuario.php";
include_once "Clase04/ejercicios_clase04/Service/UsuarioService.php";
class UsuarioController
{
    private $usuarioService;

    /**
     * Constructor de la clase UsuarioController.
     * Instancia un objeto UsuarioService para interactuar con los datos.
     */
    public function __construct()
    {
        $this->usuarioService = new UsuarioService();
    }

    /**
     * Método altaUsuario
     *
     * Permite dar de alta a un nuevo usuario.
     *
     * @param string $nombre El nombre del usuario.
     * @param string $clave La contraseña del usuario.
     * @param string $mail El correo electrónico del usuario.
     * @param string|null $foto La ruta de la foto del usuario (opcional).
     *
     * @return string El resultado de la operación: mensaje de éxito o error.
     */
    public function altaUsuario($nombre, $clave, $mail, $foto)
    {
        // Validar los datos ingresados por el usuario
        if (empty($nombre) || empty($clave) || empty($mail)) {
            return 'Error: Debes completar todos los campos obligatorios.';
        }

        // Limpiar los datos antes de almacenarlos para garantizar la integridad
        $nombre = $this->limpiarDato($nombre);
        $clave = $this->limpiarDato($clave);
        $mail = $this->limpiarDato($mail);

        // Crear una instancia de Usuario con los datos ingresados
        $usuario = new Usuario($nombre, $clave, $mail, $foto);

        // Agregar el usuario utilizando el servicio de Usuario
        $resultado = $this->usuarioService->agregarUsuario($usuario);

        // Verificar el resultado de la operación y retornar un mensaje apropiado
        if ($resultado) {
            return 'Usuario agregado correctamente.';
        } else {
            return 'Error al agregar el usuario. Por favor, inténtalo nuevamente.';
        }
    }

    /**
     * Método limpiarDato
     *
     * Aplica las validaciones y limpieza de datos necesarias antes de almacenarlos.
     *
     * @param mixed $dato El dato a limpiar.
     *
     * @return mixed El dato limpio.
     */
    private function limpiarDato($dato)
    {
        // Aplicar las validaciones y limpieza de datos necesarias
        // ...

        // Retornar el dato limpio
        return $dato;
    }
}
?>
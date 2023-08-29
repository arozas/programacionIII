<?php
/**
* Clase UsuarioService
*
* Esta clase se encarga de gestionar el acceso a los archivos y guardar datos relacionados con los usuarios.
*/
include_once "Clase04/ejercicios_clase04/Entidades/Usuario.php";
class UsuarioService
{
    private $usuariosFile = 'usuarios.json'; // Ruta al archivo JSON que almacena la lista de usuarios
    private $fotosDirectory = 'Usuario/Fotos/'; // Directorio donde se guardan las fotos de los usuarios

/**
* Método agregarUsuario
*
* Agrega un nuevo usuario a la lista de usuarios.
*
* @param Usuario $usuario El objeto Usuario a agregar.
* @return bool True si el usuario se agregó correctamente, False si ocurrió un error.
*/
    public function agregarUsuario($usuario)
    {
        // Obtener la lista de usuarios existente desde el archivo JSON
        $usuarios = $this->obtenerUsuarios();

        // Generar un ID autoincremental
        $id = $this->generarIdAutoincremental($usuarios);

        // Asignar el ID al usuario
        $usuario->setId($id);

        // Guardar la foto en el servidor
        $fotoGuardada = $this->guardarFoto($usuario);

        if (!$fotoGuardada) {
        return false;
        }

        // Agregar el usuario a la lista
        $usuarios[] = $usuario;

        // Guardar la lista actualizada en el archivo JSON
        $this->guardarUsuarios($usuarios);

        return true;
    }

/**
* Método obtenerUsuarios
*
* Obtiene la lista de usuarios almacenada en el archivo JSON.
*
* @return array La lista de usuarios o un array vacío si no se encontró el archivo o no se pudo decodificar.
*/
    private function obtenerUsuarios()
    {
        if (file_exists($this->usuariosFile)) {
            $usuariosJson = file_get_contents($this->usuariosFile);
            $usuarios = json_decode($usuariosJson, true);

            if (is_array($usuarios)) {
                return $usuarios;
            }
        }
        return [];
    }

/**
* Método guardarUsuarios
*
* Guarda la lista de usuarios en el archivo JSON.
*
* @param array $usuarios La lista de usuarios a guardar.
* @return void
*/
    private function guardarUsuarios($usuarios)
    {
        $usuariosJson = json_encode($usuarios, JSON_PRETTY_PRINT);
        file_put_contents($this->usuariosFile, $usuariosJson);
    }

/**
* Método generarIdAutoincremental
*
* Genera un ID autoincremental para el nuevo usuario.
*
* @param array $usuarios La lista de usuarios existente.
* @return int El ID autoincremental para el nuevo usuario.
*/
    private function generarIdAutoincremental($usuarios)
    {
        if (empty($usuarios)) {
            return 1;
        }
        $ultimoUsuario = end($usuarios);
        return $ultimoUsuario->getId() + 1;
    }

/**
* Método guardarFoto
*
* Guarda la foto del usuario en el servidor.
*
* @param Usuario $usuario El objeto Usuario con la foto a guardar.
* @return bool True si la foto se guardó correctamente o si el usuario no tiene foto, False si ocurrió un error.
*/
    private function guardarFoto($usuario)
    {
        if ($usuario->getFoto() !== null) {
            $foto = $usuario->getFoto();
            $fotoNombre = $usuario->getId() . '.jpg';
            $rutaFoto = $this->fotosDirectory . $fotoNombre;

            if (!move_uploaded_file($foto, $rutaFoto)) {
                return false;
            }
        }
            return true;
    }
}

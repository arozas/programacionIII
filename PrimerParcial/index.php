<?php
/*
 * Alumno: Alejandro Alberto Martín Rozas
 * Asignatura: Pragramación III
 * Profesor: Franco Lippi / Agustín Friadenrich
 * Curso: 3 - C
 * Fecha: 24/10/2023
 * Universidad Tecnológica Nacional - Facultad Regional Avellaneda.
 *
 * PUNTO 1 - A- index.php: Recibe todas las peticiones que realiza el cliente (utilizaremos Postman),
 * y administra a qué archivo se debe incluir.
 */

use Helpers\FileManager;
use Helpers\Mensaje;

require_once 'src/Helpers/FileManager.php';
require_once 'src/Helpers/Mensaje.php';
require_once 'src/Helpers/Validador.php';
require_once 'src/Datos/Data.php';
require_once 'src/Entidades/Cliente.php';
require_once 'src/Entidades/Reserva.php';

const FILEPATH = 'Datos/';
const IMAGEPATH = 'ImagenesDeCliente/2023/';
$fileManager = FileManager::getInstance();
$fileManager->setFilePath(FILEPATH);
$fileManager->setImagePath(IMAGEPATH);

$route = $_GET['route'] ?? null;
switch ($route)
{
    case 'Cliente':
        require_once 'src/Controladores/ClienteController.php';
        break;
    case 'Reserva':
        require_once 'src/Controladores/ReservaController.php';
        break;
    case 'Reporte':
        require_once 'src/Controladores/ReporteController.php';
        break;
    default:
        Mensaje::ServerResponse(404, 'Error: Bad Request');
        break;
}

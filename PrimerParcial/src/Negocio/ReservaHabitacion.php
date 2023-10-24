<?php
/*
 * Alumno: Alejandro Alberto Martín Rozas
 * Asignatura: Pragramación III
 * Profesor: Franco Lippi / Agustín Friadenrich
 * Curso: 3 - C
 * Fecha: 24/10/2023
 * Universidad Tecnológica Nacional - Facultad Regional Avellaneda.
 *
 * PUNTO 3 - a- ReservaHabitacion.php: (por POST) se recibe el Tipo de Cliente, Nro de Cliente,
 * Fecha de Entrada, Fecha de Salida, Tipo de Habitación (Simple, Doble, Suite), y el
 * importe total de la reserva. Si el cliente existe en hoteles.json, se registra la reserva en
 * el archivo reservas.json con un id autoincremental). Si el cliente no existe, informar el
 * error.
 * b- Completar la reserva con imagen de confirmación de reserva con el nombre: Tipo de
 * Cliente, Nro. de Cliente e Id de Reserva, guardando la imagen en la carpeta /ImagenesDeReservas2023.to”.
 */

use Datos\Data;
use Entidades\Reserva;
use Helpers\FileManager;
use Helpers\Mensaje;
use Helpers\Validador;

require_once 'src/Helpers/FileManager.php';
require_once 'src/Entidades/Cliente.php';
require_once 'src/Entidades/Reserva.php';
require_once 'src/Entidades/Mensaje.php';

function verificarCliente($tipoCliente, $numeroCliente)
{
    $datos = Data::getInstance();
    $clientList = $datos->getClientList();
    $clienteExistente = null;

    if ($clientList) {
        foreach ($clientList as $cliente) {
            if ($cliente->getTipoCliente() == $tipoCliente && $cliente->getId() == $numeroCliente) {
                $clienteExistente = $cliente;
                break;
            }
        }
    }
    return $clienteExistente;
}

function validarCamposReserva()
{
    $rtn = false;
    $rtn = Validador::FieldEmptyValidation($_POST['tipoCliente'], 422, 'Faltan campos obligatorios: tipo Cliente.');
    $rtn = Validador::FieldClientTypeValidation($_POST['tipoCliente'], 422, 'Error: Tipo Cliente erroneo.');
    $rtn = Validador::FieldEmptyValidation($_POST['numeroCliente'], 422, 'Faltan campos obligatorios: Numero Cliente.');
    $rtn = Validador::FieldEmptyValidation($_POST['fechaEntrada'], 422, 'Faltan campos obligatorios: Fecha de entrada.');
    $rtn = Validador::FieldDateValidation($_POST['fechaEntrada'], 422, 'Error: Fecha de entrada formato incorrecto.');
    $rtn = Validador::FieldEmptyValidation($_POST['fechaSalida'], 422, 'Faltan campos obligatorios: Fecha de entrada.');
    $rtn = Validador::FieldDateValidation($_POST['fechaSalida'], 422, 'Error: Fecha de entrada formato incorrecto.');
    $rtn = Validador::FieldEmptyValidation($_POST['tipoHabitacion'], 422, 'Faltan campos obligatorios: Tipo de habitación.');
    $rtn = Validador::FieldRoomValidation($_POST['tipoHabitacion'], 422, 'Error: Tipo de habitación inexistente.');
    $rtn = Validador::FieldEmptyValidation($_POST['importeTotal'], 422, 'Faltan campos obligatorios: numero Documento.');
    $rtn = Validador::FieldFilesValidation($_FILES['imagenReserva']);
    return $rtn;
}


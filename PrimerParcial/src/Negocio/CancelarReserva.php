<?php
/*
 * Alumno: Alejandro Alberto Martín Rozas
 * Asignatura: Pragramación III
 * Profesor: Franco Lippi / Agustín Friadenrich
 * Curso: 3 - C
 * Fecha: 24/10/2023
 * Universidad Tecnológica Nacional - Facultad Regional Avellaneda.
 *
 * PUNTO 6- CancelarReserva.php: (por POST) se recibe el Tipo de Cliente, Nro de Cliente, y el Id
 * de Reserva a cancelar. Si el cliente existe en hoteles.json y la reserva en reservas.json,
 * se marca como cancelada en el registro de reservas. Si el cliente o la reserva no existen,
 * informar el tipo de error.
 */

use Datos\Data;
use Entidades\Reserva;
use Helpers\Mensaje;

$datos = Data::getInstance();
$listaClientes = $datos->getClientList();


$tipoCliente = $_POST['tipoCliente'] ?? '';
$numeroCliente = $_POST['numeroCliente'] ?? '';
$idReserva = $_POST['idReserva'] ?? '';

$cliente = obtenerClientePorTipoYNumero($listaClientes, $tipoCliente, $numeroCliente);

if ($cliente !== null) {

    $reserva = Reserva::obtenerReservaPorId($idReserva);

    if ($reserva !== null) {
        $reserva->cancelada = true;
        $rtn = Reserva::actualizarReserva($reserva);
        if($rtn == true)
        {
            Mensaje::ServerResponse(200, 'Reserva cancelada con éxito');
        }else
        {
            Mensaje::ServerResponse(500, 'Error actualizar reserva.');
        }
    } else {
        Mensaje::ServerResponse(404, 'La reserva no existe');
    }
} else {
    Mensaje::ServerResponse(404, 'El cliente no existe');
}



function obtenerClientePorTipoYNumero($clientes, $tipoCliente, $idCliente)
{
    $rtn = null;
    $erroresEncontrados = [];
    foreach ($clientes as $cliente) {
        if ($cliente->getId() == $idCliente)
        {
            if($cliente->getTipoCliente() == $tipoCliente) {
                $rtn = $cliente;
                break;
            }else{
                $erroresEncontrados[] = [
                    'Error:' => 'Tipo De cliente erroneo.'
                ];
                $rtn = $erroresEncontrados;
            }
        }
    }
    return $rtn;
}
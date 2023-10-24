<?php
/*
 * Alumno: Alejandro Alberto Martín Rozas
 * Asignatura: Pragramación III
 * Profesor: Franco Lippi / Agustín Friadenrich
 * Curso: 3 - C
 * Fecha: 24/10/2023
 * Universidad Tecnológica Nacional - Facultad Regional Avellaneda.
 *
 * PUNTO 4- ConsultaReservas.php: (por GET)
 * Datos a consultar:
 * a- El total de reservas (importe) por tipo de habitación y fecha en un día en particular
 * (se envía por parámetro), si no se pasa fecha, se muestran las del día anterior.
 * b- El listado de reservas para un cliente en particular.
 * c- El listado de reservas entre dos fechas ordenado por fecha.
 * d- El listado de reservas por tipo de habitación.
*/

use Datos\Data;
use Entidades\Reserva;
use Helpers\FileManager;
use Helpers\Mensaje;

require_once 'src/Entidades/Reserva.php';
require_once 'src/Helpers/FileManager.php';



function consultaTotalReservasPorTipoYFecha($fecha)
{
    $fileManager = FileManager::getInstance();
    $reservas = $fileManager->getJSON('reservas.json');

    if (empty($fecha)) {
        $fecha = date('d/m/Y', strtotime('-1 day'));
    }

    $reservasFiltradas = array_filter($reservas, function ($reserva) use ($fecha) {
        return $reserva['fechaEntrada'] === $fecha;
    });

    $totalPorTipo = array();

    foreach ($reservasFiltradas as $reserva) {
        $tipoHabitacion = $reserva['tipoHabitacion'];
        $importe = (float) str_replace(',', '', $reserva['importeTotal']);
        if (!isset($totalPorTipo[$tipoHabitacion])) {
            $totalPorTipo[$tipoHabitacion] = 0;
        }
        $totalPorTipo[$tipoHabitacion] += $importe;
    }

    if (!empty($totalPorTipo)) {
        Mensaje::ServerResponse(200, 'Totales por habitación: ', $totalPorTipo);
    } else {
        Mensaje::ServerResponse(202, 'No hay habitaciones reservadas.');
    }
}


function consultaReservasPorCliente($clienteId)
{
    $fileManager = FileManager::getInstance();
    $reservas = $fileManager->getJSON('reservas.json');

    $reservasCliente = array_filter($reservas, function ($reserva) use ($clienteId) {
        return $reserva['clienteId'] == $clienteId;
    });

    if($reservasCliente != null )
    {
        Mensaje::ServerResponse(200, 'Reservas del cliente: ', $reservasCliente);
    }else{
        Mensaje::ServerResponse(202, 'No hay reservas para el cliente.');
    }
}

function consultaReservasEntreFechas($fechaInicio, $fechaFin)
{
    $fileManager = FileManager::getInstance();
    $reservas = $fileManager->getJSON('reservas.json');

    $reservasFiltradas = array_filter($reservas, function ($reserva) use ($fechaInicio, $fechaFin) {
        $fechaReserva = DateTime::createFromFormat('d/m/Y', $reserva['fechaEntrada']);
        $fechaInicio = DateTime::createFromFormat('d/m/Y', $fechaInicio);
        $fechaFin = DateTime::createFromFormat('d/m/Y', $fechaFin);

        return $fechaReserva >= $fechaInicio && $fechaReserva <= $fechaFin;
    });

    usort($reservasFiltradas, function ($a, $b) {
        $fechaA = DateTime::createFromFormat('d/m/Y', $a['fechaEntrada']);
        $fechaB = DateTime::createFromFormat('d/m/Y', $b['fechaEntrada']);
        if ($fechaA == $fechaB) {
            return 0;
        }
        return ($fechaA < $fechaB) ? -1 : 1;
    });

    if($reservasFiltradas != null )
    {
        Mensaje::ServerResponse(200, 'Reservas entre fechas ingresada : ', $reservasFiltradas);
    }else{
        Mensaje::ServerResponse(202, 'No hay reservas en esas fechas.');
    }
}

function consultaReservasPorTipoHabitacion($tipoHabitacion)
{
    $fileManager = FileManager::getInstance();
    $reservas = $fileManager->getJSON('reservas.json');

    $reservasFiltradas = array_filter($reservas, function ($reserva) use ($tipoHabitacion) {
        return $reserva['tipoHabitacion'] === $tipoHabitacion;
    });

    if($reservasFiltradas != null )
    {
        Mensaje::ServerResponse(200, "Reservas de habitación tipo $tipoHabitacion :", $reservasFiltradas);
    }else{
        Mensaje::ServerResponse(202, 'No hay reservas de ese tipo de habitación.');
    }
}
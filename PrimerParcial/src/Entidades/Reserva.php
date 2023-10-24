<?php

namespace Entidades;

use Datos\Data;
use Helpers\FileManager;

class Reserva
{
    public $id;
    public $clienteId;
    public $tipoHabitacion;
    public $fechaEntrada;
    public $fechaSalida;
    public $importeTotal;
    public $cancelada;

    public function __construct($id, $clienteId, $tipoHabitacion, $fechaEntrada, $fechaSalida, $importeTotal)
    {
        $this->id = $id;
        $this->clienteId = $clienteId;
        $this->tipoHabitacion = $tipoHabitacion;
        $this->fechaEntrada = $fechaEntrada;
        $this->fechaSalida = $fechaSalida;
        $this->importeTotal = $importeTotal;
        $this->cancelada = false;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getClienteId()
    {
        return $this->clienteId;
    }

    public function getTipoHabitacion()
    {
        return $this->tipoHabitacion;
    }

    public function getFechaEntrada()
    {
        return $this->fechaEntrada;
    }

    public function getFechaSalida()
    {
        return $this->fechaSalida;
    }

    public function getImporteTotal()
    {
        return $this->importeTotal;
    }

    public function setImporteTotal($importe)
    {
        $this->importeTotal = $importe;
    }

    public function getCancelada()
    {
        return $this->cancelada;
    }

    public function setCancelada ($cancelada)
    {
        $this->cancelada = $cancelada;
    }

    public static function actualizarReserva($reservaAux)
    {
        $datos = Data::getInstance();
        $reservas = $datos->getReservaList();
        foreach ($reservas as $reserva) {
            if ($reserva->getId() == $reservaAux->getId()) {
                $reserva = $reservaAux;
            }
        }
        return FileManager::getInstance()->toJSON('reservas.json', $reservas);
    }
    public static function obtenerReservaPorId($id)
    {
        $datos = Data::getInstance();
        $reservas = $datos->getReservaList();
        foreach ($reservas as $reserva) {
            if ($reserva->getId() == $id) {
                return $reserva;
            }
        }
        return null;
    }
}

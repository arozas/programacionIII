<?php

namespace Datos;

use Entidades\Ajuste;
use Entidades\Cliente;
use Entidades\Reserva;
use Helpers\FileManager;

class Data
{
    private static $instance = null;
    private $clientList;
    private $reservaList;

    public function __construct()
    {
        $this->clientList =  $this->loadClientsList();
        $this->reservaList = $this->loaReserveList();
    }

    public function getClientList(): array
    {
        return $this->clientList;
    }

    public function getReservaList(): array
    {
        return $this->reservaList;
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function loadClientsList()
    {
        $fileManager = FileManager::getInstance();
        $listaDeJSON = $fileManager->getJSON('hotel.json');
        $listaClientes = [];

        if ($listaDeJSON != null && count($listaDeJSON) > 0) {
            foreach ($listaDeJSON as $clienteJson) {
                $clienteAuxiliar = new Cliente(
                    $clienteJson['nombre'],
                    $clienteJson['apellido'],
                    $clienteJson['tipoDocumento'],
                    $clienteJson['numeroDocumento'],
                    $clienteJson['email'],
                    $clienteJson['tipoCliente'],
                    $clienteJson['pais'],
                    $clienteJson['ciudad'],
                    $clienteJson['telefono'],
                    $clienteJson["id"]
                );
                $listaClientes[] = $clienteAuxiliar;
            }
        }

        return $listaClientes;
    }

    private function loaReserveList()
    {
        $fileManager = FileManager::getInstance();
        $JSONList = $fileManager->getJSON('reservas.json');
        $reserveList = [];

        if ($JSONList != null && count($JSONList) > 0) {
            foreach ($JSONList as $JsonReserve) {
                $auxReserve = new Reserva(
                    $JsonReserve['id'],
                    $JsonReserve['clienteId'],
                    $JsonReserve['tipoHabitacion'],
                    $JsonReserve['fechaEntrada'],
                    $JsonReserve['fechaSalida'],
                    $JsonReserve['importeTotal']
                );
                $reserveList[] = $auxReserve;
            }
        }
        return $reserveList;
    }

    private function loadAjusteList()
    {
        $fileManager = FileManager::getInstance();
        $JSONList = $fileManager->getJSON('ajuste.json');
        $ajusteList = [];

        if ($JSONList != null && count($JSONList) > 0) {
            foreach ($JSONList as $JsonReserve) {
                $auxAjuste = new Ajuste(
                    $JsonReserve['idReserva'],
                    $JsonReserve['motivo'],
                    $JsonReserve['montoAjustado'],
                    $JsonReserve['fechaAjuste']
                );
                $ajusteList[] = $auxAjuste;
            }
        }
        return $ajusteList;
    }

    public function __clone()
    {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }





}

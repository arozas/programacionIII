<?php

use Datos\Data;
use Entidades\Reserva;
use Helpers\FileManager;
use Helpers\Mensaje;
const RESERVAS_IMAGEPATH = 'ImagenesDeReservas/2023/';

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_GET['action']) && $_GET['action'] == "Ajuste")
    {
        if(isset($_POST['id_reserva']) && isset($_POST['motivo_ajuste']) && isset($_POST['importe']))
        {
            require_once 'src/Negocio/AjusteReserva.php';
        }else{
            Mensaje::ServerResponse(400, 'Faltan parametros');
        }
    }elseif(isset($_GET['action']) && $_GET['action'] == "Cancelar"){
        if(isset($_POST['tipoCliente']) && isset($_POST['numeroCliente']) && isset($_POST['idReserva']))
        {
            require_once 'src/Negocio/CancelarReserva.php';
        }else {
            Mensaje::ServerResponse(400, 'Faltan parametros');
        }
    }else{
        require_once 'src/Negocio/ReservaHabitacion.php';

        $fileManager = FileManager::getInstance();
        $tipoCliente = $_POST['tipoCliente'] ?? null;
        $numeroCliente = $_POST['numeroCliente'] ?? null;
        $fechaEntrada = $_POST['fechaEntrada'] ?? null;
        $fechaSalida = $_POST['fechaSalida'] ?? null;
        $tipoHabitacion = $_POST['tipoHabitacion'] ?? null;
        $importeTotal = $_POST['importeTotal'] ?? null;

        if (validarCamposReserva()) {

            $datos = Data::getInstance();
            $listaDeJSON = $datos->getClientList();
            $clienteExistente = verificarCliente($tipoCliente, $numeroCliente);

            if ($clienteExistente) {
                $reservasList = $datos->getReservaList();
                $nextReservaId = 1;

                if ($reservasList) {
                    $lastReserva = count($reservasList);
                    $nextReservaId = $lastReserva + 1;
                }

                $reserva = new Reserva(
                    $nextReservaId,
                    $clienteExistente->getId(),
                    $tipoHabitacion,
                    $fechaEntrada,
                    $fechaSalida,
                    $importeTotal
                );

                array_push($reservasList, $reserva);
                $fileManager->toJSON('reservas.json', $reservasList);
                $nombreImagen = $tipoCliente . '_' . $numeroCliente . '_' . $nextReservaId;
                $fileManager->setImagePath(RESERVAS_IMAGEPATH);
                $fileManager->saveImage('imagenReserva',$nombreImagen);

                Mensaje::ServerResponse(201, 'Reserva registrada con éxito');
            } else {
                Mensaje::ServerResponse(400, 'Cliente no encontrado.');
            }
        } else {
            Mensaje::ServerResponse(400, 'Faltan datos en el formulario');
        }

    }
}
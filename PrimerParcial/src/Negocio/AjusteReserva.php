<?php
/*
 * Alumno: Alejandro Alberto Martín Rozas
 * Asignatura: Pragramación III
 * Profesor: Franco Lippi / Agustín Friadenrich
 * Curso: 3 - C
 * Fecha: 24/10/2023
 * Universidad Tecnológica Nacional - Facultad Regional Avellaneda.
 *
 * 7- AjusteReserva.php (por POST)
 * Se ingresa el número de reserva afectada al ajuste y el motivo del mismo. El número de
 * reserva debe existir.
 * Guardar en el archivo ajustes.json
 * Actualiza en el estado de la reserva en el archivo reservas.json
 */

use Entidades\Ajuste;
use Entidades\Reserva;
use Helpers\FileManager;
use Helpers\Mensaje;

require_once 'src/Helpers/FileManager.php';
require_once 'src/Entidades/Ajuste.php';
require_once 'src/Entidades/Reserva.php';

$fileManager = FileManager::getInstance();
$fileManager->setFilePath(FILEPATH);

$idReserva = $_POST['id_reserva'];
$motivoAjuste = $_POST['motivo_ajuste'];
$importeAjuste = $_POST['importe'];

$reserva = Reserva::obtenerReservaPorId($idReserva);

if ($reserva === null) {
    Mensaje::ServerResponse(404, 'La reserva no existe');
}
$importeAjustado = 0;
if($reserva->getImporteTotal() > $importeAjuste)
{
    $importeAjustado = $reserva->getImporteTotal() - $importeAjuste;
}else{
    $importeAjustado = $importeAjuste - $reserva->getImporteTotal();
}
if($importeAjustado == 0)
{
    Mensaje::ServerResponse(200, 'Importe reserva ya fue modificado por este importe.');
}
$reserva->setImporteTotal($importeAjuste);

$fecha = date("d-m-Y");
$ajuste = new Ajuste($idReserva, $motivoAjuste, $importeAjustado,$fecha);
$ajustes = $fileManager->getJSON('ajustes.json');
$ajustes[] = $ajuste;
$fileManager->toJSON('ajustes.json', $ajustes);
Reserva::actualizarReserva($reserva);
Mensaje::ServerResponse(200, 'Importe reserva modificado con éxito', $ajuste);
echo "Ajuste realizado con éxito.";

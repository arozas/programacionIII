<?php

use Helpers\Mensaje;

if($_SERVER['REQUEST_METHOD'] === 'GET')
{
    require_once 'src/Negocio/ConsultaReserva.php';
    $consulta = $_GET['consulta'];
    switch ($consulta)
    {
        case 'total_reservas_por_tipo_fecha':
            $fecha = $_GET['fecha'] ?? date('d/m/Y', strtotime('-1 day'));
            consultaTotalReservasPorTipoYFecha($fecha);
            break;
        case 'reservas_por_cliente':
            $clienteId = $_GET['cliente_id'] ?? null;
            if($clienteId != null)
            {
                consultaReservasPorCliente($clienteId);
            }else{
                Mensaje::ServerResponse(404, 'Error: problemas con los parametros.');
            }
            break;
        case 'reservas_entre_fechas':
            $fechaInicio = $_GET['fecha_inicio'] ?? null;
            $fechaFin = $_GET['fecha_fin'] ?? null;
            if($fechaInicio != null && $fechaFin != null)
            {
                consultaReservasEntreFechas($fechaInicio, $fechaFin);
            }else{
                Mensaje::ServerResponse(404, 'Error: problemas con los parametros.');
            }
            break;
        case 'reservas_por_tipo_habitacion':
            $tipoHabitacion = $_GET['tipo_habitacion'] ?? null;
            if($tipoHabitacion != null){
                consultaReservasPorTipoHabitacion($tipoHabitacion);
            }else{
                Mensaje::ServerResponse(404, 'Error: problemas con los parametros.');
            }
            break;
        default:
            Mensaje::ServerResponse(404, 'Error: Reportes / Bad Request.');
            break;
    }
}
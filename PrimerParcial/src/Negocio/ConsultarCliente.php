<?php
/*
 * Alumno: Alejandro Alberto Martín Rozas
 * Asignatura: Pragramación III
 * Profesor: Franco Lippi / Agustín Friadenrich
 * Curso: 3 - C
 * Fecha: 24/10/2023
 * Universidad Tecnológica Nacional - Facultad Regional Avellaneda.
 *
 * PUNTO 2 - ConsultarCliente.php: (por POST) Se ingresa Tipo y Nro. de Cliente, si coincide con
 * algún registro del archivo hoteles.json, retornar el país, ciudad y teléfono del cliente/s.
 * De lo contrario informar si no existe la combinación de nro y tipo de cliente o, si existe
 * el número y no el tipo para dicho número, el mensaje: “tipo de cliente incorrecto”.
 */

use Datos\Data;
use Helpers\Mensaje;
use Helpers\Validador;

function validarDatos()
{
    $rtn = false;
    $rtn = Validador::FieldEmptyValidation($_POST['numeroDocumento'], 422, 'Faltan campos obligatorios: numero Documento.');
    $rtn = Validador::FieldEmptyValidation($_POST['tipoCliente'], 422, 'Faltan campos obligatorios: tipo Cliente.');
    $rtn = Validador::FieldClientTypeValidation($_POST['tipoCliente'], 422, 'Error: Tipo Cliente erroneo.');
    return $rtn;
}

function buscarClientePorTipoYNumero($clientes, $tipoCliente, $numeroDocumento)
{
    $rtn = null;
    $clientesEncontrados = [];
    $erroresEncontrados = [];
    foreach ($clientes as $cliente) {
            if ($cliente->getNumeroDocumento() === $numeroDocumento)
            {
                if($cliente->getTipoCliente() === $tipoCliente) {
                    $clientesEncontrados[] = [
                        'pais' => $cliente->getPais(),
                        'ciudad' => $cliente->getCiudad(),
                        'telefono' => $cliente->getTelefono(),
                    ];
                    $rtn = $clientesEncontrados;
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

<?php
/*
 * Alumno: Alejandro Alberto Martín Rozas
 * Asignatura: Pragramación III
 * Profesor: Franco Lippi / Agustín Friadenrich
 * Curso: 3 - C
 * Fecha: 24/10/2023
 * Universidad Tecnológica Nacional - Facultad Regional Avellaneda.
 *
 * PUNTO 5- ModificarCliente.php (por PUT)
 * Debe recibir todos los datos propios de un cliente; si dicho cliente existe (comparar por
 * Tipo y Nro. de Cliente) se modifica, de lo contrario informar que no existe ese cliente.
 */

use Helpers\Validador;

require_once 'src/Helpers/FileManager.php';
require_once 'src/Entidades/Cliente.php';
require_once 'src/Helpers/Mensaje.php';

function buscarClienteExistente($clientes, $id, $tipo )
{
    foreach ($clientes as $cliente) {
        if ($cliente->getId() == $id && $cliente->getTipoCliente() == $tipo) {
            return $cliente;
        }
    }
    return null;
}

function validarCamposModificar($data)
{
    $rtn = false;
    $rtn = Validador::FieldEmptyValidation($data['nombre'], 422, 'Faltan campos obligatorios: nombre.');
    $rtn = Validador::FieldEmptyValidation($data['apellido'], 422, 'Faltan campos obligatorios: apellido.');
    $rtn = Validador::FieldEmptyValidation($data['tipoDocumento'], 422, 'Faltan campos obligatorios: Tipo Documento.');
    $rtn = Validador::FieldDocumentValidation($data['tipoDocumento'], 422, 'Errer: Tipo Documento Invalido.');
    $rtn = Validador::FieldEmptyValidation($data['numeroDocumento'], 422, 'Faltan campos obligatorios: numero Documento.');
    if($data['tipoDocumento'] == 'DNI')
    {
        $rtn = Validador::FieldDNIValidation($data['numeroDocumento'], 422, 'Error: Número de documento incorrecto.');
    }
    if($data['tipoDocumento'] == 'CUIT' || $data['tipoDocumento'] == 'CUIL')
    {
        $rtn = Validador::FieldCUITValidation($data['numeroDocumento'], 422, 'Error: Número de CUIL/CUIT incorrecto.');
    }
    $rtn = Validador::FieldEmptyValidation($data['email'], 422, 'Faltan campos obligatorios: email.');
    $rtn = Validador::FieldEmailValidation($data['email'], 422, 'Error: Formato email incorrecto.');
    $rtn = Validador::FieldEmptyValidation($data['tipoCliente'], 422, 'Faltan campos obligatorios: tipo Cliente.');
    $rtn = Validador::FieldClientTypeValidation($data['tipoCliente'], 422, 'Error: Tipo Cliente erroneo.');
    $rtn = Validador::FieldEmptyValidation($data['pais'], 422, 'Faltan campos obligatorios: pais.');
    $rtn = Validador::FieldEmptyValidation($data['telefono'], 422, 'Faltan campos obligatorios: telefono.');
    $rtn = Validador::FieldPhoneValidation($data['telefono'], 422, 'Error: Número de télefono invalido.');

    return $rtn;
}
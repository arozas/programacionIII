<?php
/*
 * Alumno: Alejandro Alberto Martín Rozas
 * Asignatura: Pragramación III
 * Profesor: Franco Lippi / Agustín Friadenrich
 * Curso: 3 - C
 * Fecha: 24/10/2023
 * Universidad Tecnológica Nacional - Facultad Regional Avellaneda.
 *
 * PUNTO 1 - B- ClienteAlta.php: (por POST) se ingresa Nombre y Apellido, Tipo Documento,
 * Nro.Documento, Email, Tipo de Cliente (individual o corporativo), País, Ciudad y Teléfono.
 * Se guardan los datos en el archivo hoteles.json, tomando un id autoincremental de 6 dígitos
 * como Nro. de Cliente (emulado). Si el nombre y tipo ya existen , se actualiza la información
 * y se agrega al registro existente.
 * Completar el alta con imagen/foto del cliente, guardando la imagen con Número y Tipo de Cliente
 *  (ej.: NNNNNNTT) como identificación en la carpeta: /ImagenesDeClientes/2023.
 */

use Datos\Data;
use Entidades\Cliente;
use Helpers\FileManager;
use Helpers\Mensaje;
use Helpers\Validador;

function buscarClienteExistente($clienteNuevo, $listaClientes)
{
    foreach ($listaClientes as $cliente) {
        if ($cliente->Equals($clienteNuevo)) {
            return $cliente;
        }
    }
    return null;
}

function validarCamposCliente()
{
    $rtn = false;
    $rtn = Validador::FieldEmptyValidation($_POST['nombre'], 422, 'Faltan campos obligatorios: nombre.');
    $rtn = Validador::FieldEmptyValidation($_POST['apellido'], 422, 'Faltan campos obligatorios: apellido.');
    $rtn = Validador::FieldEmptyValidation($_POST['tipoDocumento'], 422, 'Faltan campos obligatorios: Tipo Documento.');
    $rtn = Validador::FieldDocumentValidation($_POST['tipoDocumento'], 422, 'Errer: Tipo Documento Invalido.');
    $rtn = Validador::FieldEmptyValidation($_POST['numeroDocumento'], 422, 'Faltan campos obligatorios: numero Documento.');
    if($_POST['tipoDocumento'] == 'DNI')
    {
        $rtn = Validador::FieldDNIValidation($_POST['numeroDocumento'], 422, 'Error: Número de documento incorrecto.');
    }
    if($_POST['tipoDocumento'] == 'CUIT' || $_POST['tipoDocumento'] == 'CUIL')
    {
        $rtn = Validador::FieldCUITValidation($_POST['numeroDocumento'], 422, 'Error: Número de CUIL/CUIT incorrecto.');
    }
    $rtn = Validador::FieldEmptyValidation($_POST['email'], 422, 'Faltan campos obligatorios: email.');
    $rtn = Validador::FieldEmailValidation($_POST['email'], 422, 'Error: Formato email incorrecto.');
    $rtn = Validador::FieldEmptyValidation($_POST['tipoCliente'], 422, 'Faltan campos obligatorios: tipo Cliente.');
    $rtn = Validador::FieldClientTypeValidation($_POST['tipoCliente'], 422, 'Error: Tipo Cliente erroneo.');
    $rtn = Validador::FieldEmptyValidation($_POST['pais'], 422, 'Faltan campos obligatorios: pais.');
    $rtn = Validador::FieldEmptyValidation($_POST['telefono'], 422, 'Faltan campos obligatorios: telefono.');
    $rtn = Validador::FieldPhoneValidation($_POST['telefono'], 422, 'Error: Número de télefono invalido.');
    $rtn = Validador::FieldFilesValidation($_FILES['imagenCliente']);
    return $rtn;
}

function crearCliente()
{
    return new Cliente(
        $_POST['nombre'],
        $_POST['apellido'],
        $_POST['tipoDocumento'],
        $_POST['numeroDocumento'],
        $_POST['email'],
        $_POST['tipoCliente'],
        $_POST['pais'],
        $_POST['ciudad'],
        $_POST['telefono']
    );
}

function guardarClientes($clientes)
{
    $fileManager = FileManager::getInstance();
    return $fileManager->toJSON("hotel.json", $clientes);
}

function guardarImagen($keyImagenPost, $nameImage)
{
    $fileManager = FileManager::getInstance();
    return $fileManager->saveImage($keyImagenPost, $nameImage);
}





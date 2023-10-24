<?php

use Datos\Data;
use Entidades\Cliente;
use Helpers\FileManager;
use Helpers\Mensaje;

$datos = Data::getInstance();
$fileManager = FileManager::getInstance();

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_GET['action']) && $_GET['action'] == "Consulta")
    {
        require_once 'src/Negocio/ConsultarCliente.php';
        $tipoCliente = $_POST['tipoCliente'] ?? null;
        $numeroDocumento = $_POST['numeroDocumento'] ?? null;

        if (validarDatos())
        {
            $listaClientes = $datos->getClientList();
            $clientesEncontrados = buscarClientePorTipoYNumero($listaClientes, $tipoCliente, $numeroDocumento);

            if (count($clientesEncontrados) > 0) {
                Mensaje::ServerResponse(200,'Cliente encontrado:' ,$clientesEncontrados);
            } else {
                Mensaje::ServerResponse(404, 'No se encontraron clientes con la combinación proporcionada.');
            }
        }
    }else{
        require_once 'src/Negocio/ClienteAlta.php';
        $listaClientes = $datos->getClientList();
        if (validarCamposCliente()) {
            $cliente = crearCliente();
            $clienteExistente = buscarClienteExistente($cliente, $listaClientes);

            if ($clienteExistente) {
                Mensaje::ServerResponse(409, 'Error: el cliente ya existe', $cliente);
            } else {
                $cliente->setId(count($listaClientes) + 100000);
                array_push($listaClientes, $cliente);
            }
            if (guardarClientes($listaClientes)) {
                $nombreImagen = $cliente->id . $cliente->tipoCliente;
                if (guardarImagen('imagenCliente', $nombreImagen)) {
                    Mensaje::ServerResponse(201, 'Exito: cliente guardado', $cliente);
                } else {
                    Mensaje::ServerResponse(500, 'Error al guardar la imagen');
                }
            } else {
                Mensaje::ServerResponse(500, 'Error al guardar el cliente');
            }
        }

    }
}
if($_SERVER['REQUEST_METHOD'] === 'PUT')
{
    require_once 'src/Negocio/ModificarCliente.php';
    $input = file_get_contents("php://input");
    $data = json_decode($input, true);

    if(isset($_GET['id']) && isset($_GET["tipoCliente"]))
    {
        if($data == null){
            Mensaje::ServerResponse(400, 'Error en formato de datos.');
        }
        if ($data && isset($data['tipoCliente']) && isset($data['numeroDocumento'])) {
            if(validarCamposModificar($data)){
                $clienteNuevo = new Cliente(
                    $data['nombre'],
                    $data['apellido'],
                    $data['tipoDocumento'],
                    $data['numeroDocumento'],
                    $data['email'],
                    $data['tipoCliente'],
                    $data['pais'],
                    $data['ciudad'],
                    $data['telefono']
                );
                $fileManager = FileManager::getInstance();
                $listaDeClientes = $datos->getClientList();;
                $clienteExistente = buscarClienteExistente($listaDeClientes, $_GET['id'], $_GET["tipoCliente"]);
                if ($clienteExistente) {
                    $clienteExistente->ActualizarInformacion($clienteNuevo);
                    $fileManager->toJSON('hotel.json', $listaDeClientes);
                    Mensaje::ServerResponse(200, 'Cliente modificado con éxito', $data);
                } else {
                    Mensaje::ServerResponse(404, 'El cliente no existe');
                }
            }else{
                Mensaje::ServerResponse(400, 'Datos para modificar no válidos');
            }
        }
    }else{
        Mensaje::ServerResponse(400, 'Datos de cliente no válidos');
    }
}
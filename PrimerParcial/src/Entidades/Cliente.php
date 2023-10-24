<?php

namespace Entidades;
class Cliente
{
    public $id;
    public $nombre;
    public $apellido;
    public $tipoDocumento;
    public $numeroDocumento;
    public $email;
    public $tipoCliente;
    public $pais;
    public $ciudad;
    public $telefono;

    public $baja;

    public function __construct($nombre, $apellido, $tipoDocumento, $numeroDocumento, $email, $tipoCliente, $pais, $ciudad, $telefono, $id = null) {
        if($id != null)
        {
            $this->id = $id;
        }else{
            $this->id = 0;
        }
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipoDocumento = $tipoDocumento;
        $this->numeroDocumento = $numeroDocumento;
        $this->email = $email;
        $this->tipoCliente = $tipoCliente;
        $this->pais = $pais;
        $this->ciudad = $ciudad;
        $this->telefono = $telefono;
        $this->baja = false;
    }

    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    public function getTipoCliente()
    {
        return $this->tipoCliente;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPais()
    {
        return $this->pais;
    }

    public function getCiudad()
    {
        return $this->ciudad;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function ActualizarInformacion($clienteNuevo)
    {
        // Actualiza las propiedades del cliente con los valores del clienteNuevo
        $this->nombre = $clienteNuevo->nombre;
        $this->apellido = $clienteNuevo->apellido;
        $this->tipoDocumento = $clienteNuevo->tipoDocumento;
        $this->numeroDocumento = $clienteNuevo->numeroDocumento;
        $this->email = $clienteNuevo->email;
        $this->tipoCliente = $clienteNuevo->tipoCliente;
        $this->pais = $clienteNuevo->pais;
        $this->ciudad = $clienteNuevo->ciudad;
        $this->telefono = $clienteNuevo->telefono;
    }

    public function ComprobarCliente($listaDeClientes)
    {
        $rtn = false;
        if(count($listaDeClientes)>0)
        {
            foreach ($listaDeClientes as $cliente)
            {
                if((strcmp($cliente->numeroDocumento,$this->numeroDocumento)==0)
                    &&(strcmp($cliente->tipoCliente,$this->tipoCliente)==0))
                {
                    $rtn = true;
                }
            }
        }
        return $rtn;
    }

    public function Equals(Cliente $clienteComparar)
    {
        return $this->tipoCliente === $clienteComparar->getTipoCliente() && $this->numeroDocumento === $clienteComparar->getNumeroDocumento();
    }


}
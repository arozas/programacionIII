<?php

class Venta
{
    public $usuario;
    public $producto;
    public $cantidad;
    public $file;

    public function __construct($usuario, $producto, $cantidad, $file)
    {
        $this->usuario = $usuario;
        $this->producto = $producto;
        $this->cantidad = $cantidad;
        $this->file = $file;
    }

    public function Alta($usuario, $producto, $arrayVentas, $rutaVentas)
    {
        $idProductoAux = Tools::SacarValorDeClave($producto, "id");
        $retorno = false;
        if ($idProductoAux < 1) {
            printf("No existen productos de este tipo. No se puede hacer el pedido. <br>");
        } else {
            $this->_fecha = new DateTime("now");
            $archivo = $this->GuardarImagen($producto, $usuario);
            $this->_file = $archivo;

            array_push($arrayVentas, $this);
            JsonManager::GrabarEnJson($arrayVentas, $rutaVentas);

            $cantidad = Tools::SacarValorDeClave($this, "cantidad");
            $retorno = true;

        }

        return $retorno;
    }
}
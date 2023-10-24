<?php
include_once "src\Tools.php";
include_once "src\JsonManager.php";

class Pizza
{
        public $id;
        public $sabor;
        public $precio;
        public $tipo;
        public $cantidad;

        public function __construct($sabor, $precio, $tipo, $cantidad)
        {
            $this->sabor = $sabor;
            $this->precio = $precio;
            $this->cantidad= $cantidad;
            $this->tipo = $tipo;
        }

        public function Equals($itemUno, $itemDos)
        {
            $retorno = false;

            $saborItemUno = Tools::SacarValorDeClave($itemUno, "sabor");
            $saborItemDos = Tools::SacarValorDeClave($itemDos, "sabor");
            $tipoItemUno = Tools::SacarValorDeClave($itemUno, "tipo");
            $tipoItemDos = Tools::SacarValorDeClave($itemDos, "tipo");

            if($saborItemUno != null && $saborItemDos != null &&
                $tipoItemUno != null &&  $tipoItemDos != null &&
                trim($saborItemUno) == trim($saborItemDos) &&
                trim($tipoItemUno) == trim($tipoItemDos))
            {
                $retorno = true;
            }
            return $retorno;
        }
        public static function AltaModificacion($item, $array, $ruta)
        {
            $indice = Tools::ConsultaSiHayYCual($item, $array);

            if($indice > -1)
            {
                $nuevoStock = Tools::SacarValorDeClave($array[$indice], "_cantidad") +$item->_cantidad;
                $replace = array("_precio" => $item->_precio, "_cantidad" => $nuevoStock);
                $array[$indice] = array_replace($array[$indice], $replace);
            }
            else
            {
                Tools::AsignarId($item, $array);
                array_push($array, $item);
            }
            JsonManager::GrabarEnJson($array, $ruta);
        }

}
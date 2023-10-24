<?php

class Tools
{
    public static function AsignarId($item, $array)
    {
        $idMasAlto = 0;

        if(sizeof($array) > 0)
        {
            foreach($array as $auxItem)
            {
                $id = Tools::SacarValorDeClave($auxItem, "_id");

                if($id >= $idMasAlto)
                {
                    $idMasAlto = $id;
                }
            }
        }
        $item->_id = $idMasAlto + 1;
    }

    public static function SacarValorDeClave($objeto, $clave)
    {
        foreach($objeto as $claveAux => $valor)
        {
            if($claveAux == $clave)
            {
                return $valor;
            }
        }
    }

    public static function ConsultaSiHayYCual($item, $array)
    {
        $retorno = -1;

        for($i = 0 ; $i < sizeof($array) ; $i++)
        {
            if($item->Equals($array[$i], $item))
            {
                $retorno = $i;
                break;
            }
        }
        return $retorno;
    }

    public static function ExisteUnValorEnArray($item, $array, $clave)
    {
        $retorno = false;
        $valorItem = Tools::SacarValorDeClave($item, $clave);

        foreach($array as $aux)
        {
            $valorAux = Tools::SacarValorDeClave($aux, $clave);

            if($valorAux == $valorItem)
            {
                $retorno = true;
                break;
            }
        }
        return $retorno;
    }

    public static function ConseguirIdPorElIndex($item, $array)
    {
        $retorno = -1;

        $indice = Tools::ConsultaSiHayYCual($item, $array);

        if($indice > -1)
        {
            $retorno = Tools::SacarValorDeClave($array[$indice], "_id");
        }

        return $retorno;
    }

    public static function ConseguirObjetoPorId($id, $array)
    {
        $retorno = null;

        foreach($array as $item)
        {
            $idAux = Tools::SacarValorDeClave($item, "_id");
            if($idAux == $id)
            {
                $retorno = $item;
                break;
            }
        }
        return $retorno;
    }

}
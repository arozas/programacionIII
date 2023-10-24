<?php

include_once 'src\Tools.php';
include_once 'src\JsonManager.php';

class Usuario
{
    public $_id;
    public $_email;

    public function __construct($email)
    {
        $this->_email = $email;
    }

    public function Equals($usuarioUno, $usuarioDos)
    {
        $retorno = false;
        $mailUsuarioUno = Tools::SacarValorDeClave($usuarioUno, "_email");
        $mailUsuarioDos = Tools::SacarValorDeClave($usuarioDos, "_email");

        if(trim($mailUsuarioUno) == trim($mailUsuarioDos))
        {
            $retorno = true;
        }
        return $retorno;
    }

    public function Alta($array, $ruta)
    {
        $retorno = null;
        $indice = Tools::ConsultaSiHayYCual($this, $array);
        if($indice == -1)
        {
            Tools::AsignarId($this, $array);
            array_push($array, $this);
            // $this->GrabarEnBD();
            $retorno = $this;
        }
        else
        {
            $retorno = $array[$indice];
        }
        JsonManager::GrabarEnJson($array, $ruta);
        return $retorno;
    }


}

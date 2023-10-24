<?php

namespace Entidades;

class Ajuste
{
    public $idReserva;
    public $motivo;
    public $montoAjustado;
    public $fechaAjuste;


    public function __construct($idReserva, $motivo, $importe, $date)
    {
        $this->idReserva = $idReserva;
        $this->motivo = $motivo;
        $this->montoAjustado = $importe;
        $this->fechaAjuste = $date;
    }

    public function getIdReserva()
    {
        return $this->idReserva;
    }

    public function getMotivo()
    {
        return $this->motivo;
    }

    public function getFechaAjuste()
    {
        return $this->fechaAjuste;
    }
}

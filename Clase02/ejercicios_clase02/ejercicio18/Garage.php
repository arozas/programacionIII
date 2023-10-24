<?php
require_once "C:/Users/Alejandro/Documents/UTN/ProgramacionIII/Clase02/ejercicios_clase02/ejercicio17/Auto.php";
class Garage
{
    // Atributos privados de la clase
    private string $_razonSocial;
    private float $_precioPorHora;
    private array $_autos = [];

    public function __construct($_razonSocial, $_precioPorHora = 0){
        $this->_razonSocial=$_razonSocial;
        $this->_precioPorHora=$_precioPorHora;
    }
    public function MostrarGarage():void {
        echo "<br>La razón social es: $this->_razonSocial";
        echo "<br>El precio por hora es: $this->_precioPorHora";
        if($this->_autos != null){
            //Valido que el array tenga elementos.
            if(sizeof($this->_autos) > 0){
                echo "<br>La lista de autos en el garage:<br><br>";
                //Recorro el array.
                foreach ($this->_autos as $auto){
                    //Valido que el objeto sea Auto.
                    if(is_a($auto,"Auto")) {
                        //Muestro el auto
                        Auto::MostrarAuto($auto);
                    }
                }
            }
        }else{
            echo "<br>El Garage no tiene autos.<br>";
        }
    }
    public function Equals($auto):bool {
        $rtn = false;
        if (is_a($auto, "Auto")) {
            if ($this->_autos != null) {
                if (sizeof($this->_autos) > 0) {
                    //Recorro el array.
                    foreach ($this->_autos as $item) {
                        //Valido que el objeto sea Auto.
                        if (is_a($item, "Auto")) {
                            //Comparo el auto:
                            if ($item->Equals($auto))
                                $rtn = true;
                        }
                    }
                }
            }
        }
        return $rtn;
    }
    public function Add($auto):void{
        if (is_a($auto, "Auto")) {
                if ($this->Equals($auto)) {
                    echo "<br>El auto ya se encuentra en el garage.<br>";
                } else {
                    array_push($this->_autos, $auto);
                }
        }else{
            echo "<br>No se puede operar por que no es tipo auto.<br>";
        }
    }
    public function Remove($auto):void{
        if (is_a($auto, "Auto")){
            if($this->_autos != null) {
                if ($this->Equals($auto)) {
                  for ($i=0; $i<sizeof($this->_autos);$i++)
                  {
                      if($this->_autos[$i]->Equals($auto)){
                          array_splice($this->_autos,$i,1);
                      }
                  }
                } else {
                    echo "<br>El auto no se encuentra en el garage.<br>";
                }
            }
            else {
                echo "<br>El Garage no tiene autos.<br>";
            }
        }else{
            echo "<br>No se puede operar por que no es tipo auto.<br>";
        }
    }
}
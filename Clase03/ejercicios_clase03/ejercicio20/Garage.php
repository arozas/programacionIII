<?php
require_once "./Auto.php";
class Garage
{
    // Atributos privados de la clase
    private string $_razonSocial;
    private float $_precioPorHora;
    private array $_autos = array();

    public function __construct($_razonSocial, $_precioPorHora = 0){
        $this->_razonSocial=$_razonSocial;
        $this->_precioPorHora=$_precioPorHora;
    }


    public function getAutos(): array
    {
        return $this->_autos;
    }
    public function setAutos(array $autos)
    {
        $this->_autos = $autos;
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
    public static function Alta($garage)
    {
        if($garage != null){
            $archivo = fopen("garages.csv", "a");
            $archivoAutos = fopen("autos.csv", "a");
            $guardado = fwrite($archivo, $garage->_razonSocial . "," . $garage->_precioPorHora . "\n");
            if($guardado != false && !empty($garage->getAutos())){
                foreach ($garage->getAutos() as $auto)
                Auto::AltaAuto($auto);
                echo "Se guardó un Auto en $garage->_razonSocial";
            }
            fclose($archivo);
        }else{
            echo "No se pudo guardar el archivo.";
        }
    }

    public static function Leer()
    {
        if(file_exists("garages.csv")){
            $garages = array();
            if (($archivo = fopen("garages.csv", "r")) !== false) {
                while (($datos = fgetcsv($archivo, 1000, ",")) !== false) {
                    $garage = new Garage($datos[0], $datos[1]);
                    if(file_exists("autos.csv")){
                            $garage->setAutos(Auto::LeerAutos());
                            echo "Se cargaron los en $garage->_razonSocial";
                        }
                    array_push($garages, $garage);
                }
                fclose($archivo);
            }
            return $garages;
        }else{
            echo "No hay archivo.";
            return null;
        }
    }
}
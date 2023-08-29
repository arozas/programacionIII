<?php
// Definición de la clase Auto
require "C:/Users/Alejandro/Documents/UTN/Programacion III/Bibliotecas/Validaciones.php";
class Auto {

    // Atributos privados de la clase
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    // Constructor con sobrecarga de parámetros para instanciar objetos de la clase
    public function __construct($marca, $color, $precio = 0.0, $fecha = null) {
        if(ValidarCadena($marca,10))
        $this->_marca = $marca;
        if(ValidarCadena($marca,10))
        $this->_color = $color;
        if(is_double($precio))
        {
            $this->_precio = $precio;
        }else{
            throw new InvalidArgumentException("El valor proporcionado no es una valor double de texto.");
        }

        // Si se pasó una fecha se convierte a objeto DateTime
        if (!is_null($fecha)) {
            $this->_fecha = new DateTime($fecha);
        } else {
            $this->_fecha = null;
        }
    }

    // Método de instancia para agregar impuestos al precio del auto
    public function AgregarImpuestos($impuesto) {
        if(!is_double($impuesto))
        {
            $this->_precio += $impuesto;
        }else{
            throw new InvalidArgumentException("El valor proporcionado no es una valor double.");
        }

    }

    // Método de clase para mostrar todos los atributos de un objeto Auto
    public static function MostrarAuto($auto) {
        if(is_a($auto, 'Auto')) {
            if($auto != null){
                echo "Marca: " . $auto->_marca . "<br>";
                echo "Color: " . $auto->_color . "<br>";
                if($auto->_precio>0)
                echo "Precio: " . $auto->_precio . "<br>";
                // Si la fecha no es nula se muestra en pantalla
                if (!is_null($auto->_fecha)) {
                    echo "Fecha: " . $auto->_fecha->format('Y-m-d') . "<br>";
                }
                echo "<br>";
            }else{
                throw new InvalidArgumentException("El valor proporcionado es nulo.");
            }
        }
        else{
            throw new InvalidArgumentException("El valor proporcionado no del tipo Auto.");
        }

    }

    // Método de instancia para comparar dos objetos Auto por marca
    public function Equals($auto) {
        if ($this->_marca == $auto->_marca) {
            return true;
        }
        return false;
    }

    // Método de clase para sumar dos objetos Auto y retornar el precio total
    public static function Add($auto1, $auto2): float {
        // Se compara la marca y el color de ambos autos
        if ($auto1->_marca == $auto2->_marca && $auto1->_color == $auto2->_color) {
            return $auto1->_precio + $auto2->_precio;
        } else {
            // Si no son iguales se informa al usuario
            echo "No se pueden sumar los autos ya que son de distinta marca o color.<br><br>";
            return 0;
        }
    }

    public static function AltaAuto(Auto $auto) {
        $archivo = fopen("autos.csv", "a");
        $linea = $auto->_marca . "," . $auto->_color . "," . $auto->_precio . ",";
        if ($auto->_fecha) {
            $linea .= $auto->_fecha->format('d/m/Y');
        }
        fwrite($archivo, $linea . "\n");
        fclose($archivo);
    }

    public static function LeerAutos() {
        $autos = array();
        if(file_exists("autos.csv")){
            $archivo = fopen("autos.csv", "r");
            while ($linea = fgets($archivo)) {
                $campos = explode(",", $linea);
                $marca = $campos[0];
                $color = $campos[1];
                $precio = floatval($campos[2]);
                $fecha = isset($campos[3]) ? DateTime::createFromFormat('d/m/Y', $campos[3]) : null;
                $auto = new Auto($marca, $color, $precio, $fecha);
                $autos[] = $auto;
            }
            fclose($archivo);
            return $autos;
        }
        else{
            echo "No hay archivo.";
        }

    }

}
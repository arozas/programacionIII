<?php
class Usuario {
    private $_nombre;
    private $_clave;
    private $_email;

    public function __construct($nombre, $clave, $email) {
        $this->_nombre = $nombre;
        $this->_clave = $clave;
        $this->_email = $email;
    }

    public function getNombre() {
        return $this->_nombre;
    }

    public function setNombre($nombre) {
        $this->_nombre = $nombre;
    }

    public function getClave() {
        return $this->_clave;
    }

    public function setClave($clave) {
        $this->_clave = $clave;
    }

    public function getEmail() {
        return $this->_email;
    }

    public function setEmail($email) {
        $this->_email = $email;
    }

    public function validarNombre() {
        if (strlen($this->_nombre) < 3) {
            return false;
        }
        return true;
    }

    public function validarClave() {
        if (strlen($this->_clave) < 6) {
            return false;
        }
        return true;
    }

    public function validarEmail() {
        if (!filter_var($this->_email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
    public function guardarEnCSV() {
        $archivo = fopen('usuarios.csv', 'a+');
        fwrite($archivo, $this->_nombre . ',' .$this->_clave . ',' . $this->_email. "\n");
        fclose($archivo);
    }
}
?>
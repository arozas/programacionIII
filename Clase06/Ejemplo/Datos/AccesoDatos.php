<?php
class AccesoDatos
{
    private static $ObjetoAccesoDatos;
    private $objetoPDO;

    private function __construct()
    {
        try{
        $this->objetoPDO = new PDO('mysql:host=localhost;dbname=clase06;charset=utf8', 'root', '', array(PDO::ATTR_EMULATE_PREPARES));
        $this->objetoPDO->exec("SET CHARACTER SET utf8");
        }
        catch (PDOException $exception)
        {
            print "Error!: " . $exception->getMessage();
            die();
        }
    }

    public function RetornarConsulta($sql)
    {
        return $this->objetoPDO->prepare($sql);
    }

    public function RetornarUltimoIDInsertado(){
        return $this->objetoPDO->lastInsertId();
    }

    /*
     * Patron singletón para limitar la clase a una sola instancia para toda la app.
     * Esta razón es por que lo general la conexión de datos son limitadas.
     *
     */
    public static function dameUnObjetoAcceso()
    {
        if(!isset(self::$ObjetoAccesoDatos))
        {
            self::$ObjetoAccesoDatos = new AccesoDatos();
        }
        return self::$ObjetoAccesoDatos;
    }

    //Evita que le objeto se pueda clonar.
    public function __clone(){
        trigger_error('La clonación de esta clase no está', E_USER_ERROR);
    }
}
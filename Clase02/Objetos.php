<?php
echo 'OBJETOS EN PHP.
<br><br>En POO, un objeto es una instancia de una clase. Una clase es una plantilla o molde que define las propiedades y métodos de un objeto. Las propiedades de una clase son variables que almacenan datos, mientras que los métodos son funciones que definen el comportamiento del objeto.
<br><br>
Sintaxis de los objetos en PHP:
<br><br>
Para crear un objeto en PHP, primero debemos definir una clase. La sintaxis básica para definir una clase es la siguiente:
<pre>
<code>
class NombreDeLaClase {
  // propiedades de la clase
  public $propiedad1; // propiedad pública
  private $propiedad2; // propiedad privada
  protected $propiedad3; // propiedad protegida
  
  // Setter y Getter:
  public function setPropiedad2($valor) {
    $this->propiedad2 = $valor;
  }

  public function getPropiedad2() {
    return $this->propiedad2;
  }
  
  // métodos de la clase
  public function metodo1() {
    // código del método
  }

  private function metodo2() {
    // código del método
  }
}
</code>
</pre>
En este ejemplo, definimos una clase llamada "NombreDeLaClase". La clase tiene dos propiedades: $propiedad1, que es pública, $propiedad2 es privada y $propiedad3 es protegida. La diferencia entre estos tipos de propiedades es la forma en que se acceden desde dentro y fuera de la clase.
<br><br>
. También tiene dos métodos: el método público "metodo1" y el método privado "metodo2".
br><br>
Por ejemplo:
<br><br>
Para crear un objeto a partir de esta clase, utilizamos la palabra clave "new". La sintaxis para crear un objeto en PHP es la siguiente:
<pre>
<code>
$objeto = new NombreDeLaClase();
</code>
</pre>
En este ejemplo, creamos un objeto llamado "objeto" a partir de la clase "NombreDeLaClase". Una vez que se ha creado el objeto, podemos acceder a sus propiedades y métodos utilizando el operador de flecha "->". 
<br><br>Por ejemplo:
<pre>
<code>
objeto->propiedad1 = "valor de propiedad";
echo $objeto->propiedad1; // muestra "valor de propiedad"

$objeto->metodo1(); // llama al método público
</code>
</pre>
En este ejemplo, establecemos el valor de la propiedad pública $propiedad1 en "valor de propiedad", y luego lo mostramos utilizando la función "echo". También llamamos al método público "metodo1" utilizando el operador de flecha "->".
<br><br>
Las propiedades privadas solo se pueden acceder desde dentro de la misma clase. Esto se hace para proteger los datos y evitar que sean modificados accidentalmente desde fuera de la clase. Para acceder a una propiedad privada desde dentro de la clase, se utiliza la palabra clave "this".  Esto es parte de la encapsulación de datos y comportamientos en POO, lo que ayuda a prevenir errores y hacer que el código sea más seguro y fácil de mantener.
<pre>
<code>
$objeto = new NombreDeLaClase();
$objeto->setPropiedad2("valor");
echo $objeto->getPropiedad2(); // muestra "valor"
</code>
</pre>
En este ejemplo, la propiedad $propiedad2 es privada y solo se puede acceder a través de los métodos públicos "setPropiedad2" y "getPropiedad2". Para acceder a la propiedad desde dentro de la clase, se utiliza la palabra clave "this" seguida del nombre de la propiedad.
<br><br>
Las propiedades protegidas se comportan de manera similar a las propiedades privadas, pero también se pueden acceder desde las clases hijas (herencia). 
<br><br>Por ejemplo:
<pre>
<code>
class ClaseHija extends NombreDeLaClase {
  public function setPropiedad3($valor) {
    $this->propiedad3 = $valor;
  }

  public function getPropiedad3() {
    return $this->propiedad3;
  }
}
$objeto = new ClaseHija();
$objeto->setPropiedad3("valor");
echo $objeto->getPropiedad3(); // muestra "valor"
</code>
</pre>
En este ejemplo, la clase "ClaseHija" hereda la propiedad protegida $propiedad3 de la clase "NombreDeLaClase". La propiedad se puede acceder desde dentro de la clase hija utilizando la palabra clave "this" seguida del nombre de la propiedad.
<br><br>
En la siguientes lineas se ejecuta todo lo expuesto anteriormente:
<br>
';

class ClaseBase {
    // propiedades de la clase
    public $propiedad1; // propiedad pública
    private $propiedad2; // propiedad privada
    protected $propiedad3; // propiedad protegida

    // Setter y Getter:
    public function setPropiedad2($valor) {
        $this->propiedad2 = $valor;
    }

    public function getPropiedad2() {
        return $this->propiedad2;
    }

    // métodos de la clase
    public function metodo1() {
        // código del método
        $this->metodo2();
    }

    private function metodo2() {
        // código del método
        echo "<br>Ejecuto este método público pero esta implementado en un método privado.";
    }
}
$objeto = new ClaseBase();
$objeto->propiedad1 = "<br>Declaración del valor de propiedad pública.";
echo $objeto->propiedad1; // muestra "valor de propiedad"

$objeto->metodo1(); // llama al método público

$objeto->setPropiedad2("<br>Set de valor de propiedad privada, muestro desde un get el valaor.");
echo $objeto->getPropiedad2(); // muestra "valor"

########################### CLASES DERIVADAS ###########################
class ClaseDerivadaBase extends ClaseBase {
    public function setPropiedad3($valor) {
        $this->propiedad3 = $valor;
    }

    public function getPropiedad3() {
        return $this->propiedad3;
    }
}

$objeto = new ClaseDerivadaBase();
$objeto->setPropiedad3("<br>Set de valor de propiedad protegida desde una clase derivada, muestro desde un get el valor de la clase derivada.");
echo $objeto->getPropiedad3(); // muestra "valor"

########################### CONSTRUCTORES ###########################

class ClaseConstructor {
    private $propidadPrivada;
    private $propidadProtegida;
    public function __construct($valor, $valorDos) {
        $this->propidadPrivada = $valor;
        $this->propidadProtegida = $valorDos;
    }
    public function MostrarPropiedades() {
        echo "<br><br>Muestro propiedades inicializadas desde un constructor
              <br>Valor propidadPrivada: $this->propidadPrivada
              <br>Valor propidadProtegida: $this->propidadProtegida
              ";
        echo "<br>Invoco una clase estatica dentro de un método de clase por medio de self::";
        self::FuncionStatica();
    }
    static function FuncionStatica(){
        echo "<br><br>Para invocar una funcion o atributo estático se debe hacer con doble dos puntos (::).";
    }
}
$objeto = new ClaseConstructor("Valor Privado","Valor Protegido");
$objeto->MostrarPropiedades();
echo "<br><br>Invoco una clase estatica fuera de la clase:";
ClaseConstructor::FuncionStatica();
#################### CONSTRUCTORES VALORES OPCIONALES ####################
/*
 * El constructor toma los valores de forma posicional, por lo tanto en un constructor con varios valores, el opcional debe ser el ultimo no el primero.
 * */
class ClaseConstructorOpcional {
    private $propidadPrivada;
    private $propidadProtegida;
    public function __construct($valor, $valorDos="") {
        $this->propidadPrivada = $valor;
        $this->propidadProtegida = $valorDos;
    }
    public function MostrarPropiedades() {
        echo "<br><br>Muestro propiedades inicializadas desde un constructor con valores opcionales:
              <br>Valor propidadPrivada: $this->propidadPrivada
              <br>Valor propidadProtegida: $this->propidadProtegida
              ";
        echo "<br>Invoco una clase estatica dentro de un método de clase por medio de self::";
        self::FuncionStatica();
    }
    static function FuncionStatica(){
        echo "<br><br>Para invocar una funcion o atributo estático se debe hacer con doble dos puntos (::).";
    }
}
$objeto = new ClaseConstructorOpcional("Valor Privado","Valor Protegido");
$objetoDos = new ClaseConstructorOpcional("Valor Protegido");

$objeto->MostrarPropiedades();
$objetoDos->MostrarPropiedades();
########################### POLIMORFISMO ###########################
class ClasePolimorfimo extends ClaseConstructor {
    public function __construct($valor, $valorDos)
    {
        parent::__construct($valor, $valorDos);
    }

    public function MostrarPropiedades(){
            echo "<br><br> Lo mensajes siguientes se muestran desde una clase derivada aplicando polimorfismo:";
            return parent::MostrarPropiedades();
    }
}
$objeto = new ClasePolimorfimo("Valor Privado","Valor Protegido");
$objeto->MostrarPropiedades();

########################### INTERFACES ###########################
/*
 * Se pueden implementar varias interfaces en una clase separando las mismas por medio de comas.
 * class Clase implements InterfazUno, InterfazDos, InterfazTres{
 * }
 */
interface IInterfaz{
   static function MetodoInterface();
}
class ClaseInterface implements IInterfaz {
    static function MetodoInterface(){
        echo "<br><br> Este mensaje se invoca desde un metodo en una clase que implementa una interface.";
    }
}

ClaseInterface::MetodoInterface();
?>

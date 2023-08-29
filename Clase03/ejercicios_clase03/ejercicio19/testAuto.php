<?php
//Nombre: ALEJANDRO ROZAS
//División: 3-D
echo "Aplicación No 19 (Auto)";
echo "<br>". "<br>";
/*
Realizar una clase llamada “Auto” que posea los siguientes atributos
privados:
        _color (String)
        _precio (Double)
        _marca (String).
        _fecha (DateTime)

Realizar un constructor capaz de poder instanciar objetos pasándole como
parámetros:
        i. La marca y el color.
        ii. La marca, color y el precio.
        iii. La marca, color, precio y fecha.

Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble
por parámetro y que se sumará al precio del objeto.

Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
por parámetro y que mostrará todos los atributos de dicho objeto.

Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
devolverá TRUE si ambos “Autos” son de la misma marca.

Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con la suma de los precios o cero si no se pudo realizar la operación.

Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);

Crear un método de clase para poder hacer el alta de un Auto, guardando los datos en un archivo autos.csv.

Hacer los métodos necesarios en la clase Auto para poder leer el listado desde el archivo autos.csv

Se deben cargar los datos en un array de autos.

En testAuto.php:
    ● Crear dos objetos “Auto” de la misma marca y distinto color.
    ● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
    ● Crear un objeto “Auto” utilizando la sobrecarga restante.
    ● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500 al atributo precio.
    ● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el resultado obtenido.
    ● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o no.
    ● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5)
*/
include_once 'Auto.php';
echo "<br>Se leen los autos desde el achivo.<br>";
$autos = Auto::LeerAutos();
if(empty($autos)){
    echo "<br>No hay autos en el archivo, se dan de alta autos:.<br>";
    Auto::AltaAuto(new Auto('Toyota', 'Rojo'));
    Auto::AltaAuto(new Auto('Chevrolet', 'Negro'));
    Auto::AltaAuto(new Auto('Ford', 'Rojo', 50000.0));
    Auto::AltaAuto(new Auto('Ford', 'Azul', 60000.0, '2022-01-01'));
    Auto::AltaAuto(new Auto('Toyota', 'Azul', 80000.0, '2022-02-01'));
}else{
    echo "<br>Los autos estan cargados.<br>";
}
for ($i=0; $i<sizeof($autos); $i++){
    if($i>1)
        $autos[$i]->AgregarImpuestos(1500);
    if($i<=1)
        echo "Suma del precio de auto1 y auto2: $" . Auto::Add($autos[0], $autos[1]) . "<br>";
    echo "<br>";
    if($i==1)
        if ($autos[0]->Equals($autos[1])) {
            echo "auto1 y auto2 son iguales.<br>";
        } else {
            echo "auto1 y auto2 son diferentes.<br>";
        }
    if($i==4)
        if ($autos[0]->Equals($autos[4])) {
            echo "auto1 y auto5 son iguales.<br>";
        } else {
            echo "auto1 y auto5 son diferentes.<br>";
        }
    if(($i+1)%2 != 0)
        Auto::MostrarAuto($autos[$i]);
}



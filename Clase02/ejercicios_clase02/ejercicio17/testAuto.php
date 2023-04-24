<?php
//Nombre: ALEJANDRO ROZAS
//División: 3-D
echo "Aplicación Nº 17 (Auto)";
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

En testGarage.php:
    ● Crear dos objetos “Auto” de la misma marca y distinto color.
    ● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
    ● Crear un objeto “Auto” utilizando la sobrecarga restante.
    ● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500 al atributo precio.
    ● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el resultado obtenido.
    ● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o no.
    ● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5)

*/
include_once 'Auto.php';
$autos = array(
    new Auto('Toyota', 'Rojo'),
    new Auto('Chevrolet', 'Negro'),
    new Auto('Ford', 'Rojo', 50000.0),
    new Auto('Ford', 'Azul', 60000.0, '2022-01-01'),
    new Auto('Toyota', 'Azul', 80000.0, '2022-02-01'));
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



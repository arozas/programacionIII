<?php
//Nombre: ALEJANDRO ROZAS
//División: 3-C
echo "Aplicación Nº 18 (Auto - Garage)";
echo "<br>". "<br>";
/*
    Crear la clase Garage que posea como atributos privados:
    _razonSocial (String)
    _precioPorHora (Double)
    _autos (Autos[], reutilizar la clase Auto del ejercicio anterior)

Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:
    i. La razón social.
    ii. La razón social, y el precio por hora.

Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y que mostrará todos los atributos del objeto.

Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.

Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage” (sólo si el auto no está en el garaje, de lo contrario informarlo).

Ejemplo: $miGarage->Add($autoUno);

Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del “Garage” (sólo si el auto está en el garaje, de lo contrario informarlo).

Ejemplo:
$miGarage->Remove($autoUno);

En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los métodos
*/
include_once './Garage.php';

$garageUno = new Garage("Garge sin autos.");
$garageUno->MostrarGarage();
$garageUno->Remove(new Auto('Toyota', 'Azul', 80000.0, '2022-02-01'));
$garageUno->Remove(300);
$garageDos = new Garage("Garge con autos y precio.", 1500.50);
$garageDos->Add(new Auto('Toyota', 'Rojo'));
$garageDos->Add(new Auto('Chevrolet', 'Negro'));
$garageDos->Add(new Auto('Renault', 'Rojo', 50000.0));
$garageDos->Add(new Auto('Ford', 'Azul', 60000.0, '2022-01-01'));
$garageDos->Add(new Auto('Peugeot', 'Azul', 80000.0, '2022-02-01'));
$garageDos->Add(new Auto('Toyota', 'Rojo'));
$garageDos->MostrarGarage();
$garageDos->Add(500);
$garageDos->Remove(new Auto('Toyota', 'Rojo'));
$garageDos->Remove(new Auto('Toyota', 'Rojo'));
$garageDos->MostrarGarage();



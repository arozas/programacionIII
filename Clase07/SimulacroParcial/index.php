<?php
//Alejandro Alberto Martín Rozas
//3-C.

$metodo = $_SERVER['REQUEST_METHOD'];

switch($metodo)
{
    case "GET":
        switch(key($_GET))
        {
            case "cargar":
                include 'src/Controller/PizzaCarga.php';
                break;
        }
    case "POST":
        switch(key($_GET))
        {
            case "consultar":
                include 'src/Controller/PizzaConsultar.php';
                break;
        }
}
?>
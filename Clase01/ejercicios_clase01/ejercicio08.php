<?php
//Nombre: ALEJANDRO ROZAS
//División: 3-D
echo "Aplicación Nº 8 (Carga aleatoria)";
echo "<br>". "<br>";
/*
 Imprima los valores del vector asociativo siguiente usando la estructura de control foreach:
 $v[1]=90; $v[30]=7; $v['e']=99; $v['hola']= 'mundo';
 */
$v[1]=90; $v[30]=7; $v['e']=99; $v['hola']= 'mundo';
foreach ($v as $valor){
    echo "<br>$valor";
}
?>
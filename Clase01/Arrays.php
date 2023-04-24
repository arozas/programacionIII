<?php
/*Un array en PHP es realmente un mapa ordenado. Un
mapa es un tipo de datos que asocia valores con claves.

Casi toda la estructura de PHP son arrays.

PHP tiene tres tipos de arrays
• Arrays indexados. Índices numéricos.
    Los indexados los valores son autoincrementales, por lo general empiezan en cero y a medida que agregemos nuevos elementos se va a incrementar el indice.
• Arrays asociativos. Índices nombrados.
    Los array asociativos, a diferecia de los indexados, los arrays asociativos funcionan como un diccionario con clave => valor.
• Arrays multidimensionales. Arrays que contienen otros arrays.
    Son arrays que contienen otros arrays, y es parte fundamental del core de php. Cuando creamos un objeto, lo que estamos creando en baje nivel es un array multidimensional, esto se puede visualizar usando la función vardump().
*/
echo "ARRAYS / ARREGLOS:";
echo "<br>";
echo "En PHP los arrays pueden ser creados con el
constructor del lenguaje array().";
echo "<br>"; echo "<br>";
echo "Declaración:";echo "<br>";
echo '$vec = array(1,2,3);';
echo "<br>"; echo "<br>";
$vec = array(1,2,3);
echo "Salida:"; echo "<br>";
var_dump($vec);
/*
Salida:
array(3){[0]=>int(1) [1]=>int(2) [2]=>int(3)}
*/
echo "<br>"; echo "<br>";
echo "Otra forma de declarlo:";echo "<br>";
echo '$vec[0] = 1; $vec[1] = 2; $vec[2] = 3;';
echo "<br>"; echo "<br>";
$vec[0] = 1; $vec[1] = 2; $vec[2] = 3;
echo "Salida:"; echo "<br>";
var_dump($vec);
echo "<br>"; echo "<br>";
echo "Array asociativos:";
echo "<br>";
echo "Arrays asociativos con el constructor array().";
echo "<br>"; echo "<br>";
echo "Declaración:";echo "<br>";
echo '$vec = array("Juan"=>22,"Romina"=>12,"Uriel"=>8);';
echo "<br>"; echo "<br>";
$vec = array("Juan"=>22,"Romina"=>12,"Uriel"=>8);
echo "Salida:"; echo "<br>";
var_dump($vec);
echo "<br>"; echo "<br>";
echo "Otra forma de declarlo:" ;echo "<br>";
echo '$vec["Hugo"]=15; $vec["Juana"]= 36;';
echo "<br>"; echo "<br>";
$vec["Hugo"]=15; $vec["Juana"]= 36;
echo "Salida:"; echo "<br>";
var_dump($vec);
echo "<br>";
echo "Una variable asociativo, si queremos hacerlo indexados lo que vamos mexclar los dos tipos de array en la varible conviviendo ambos.";
echo "<br>";
echo "Ejemplo:";
echo "<br>";
array_push($vec, 1);
var_dump($vec);
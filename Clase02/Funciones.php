<?php
echo "INCLUIR ARCHIVOS EXTERNOS (BIBLIOTECAS)";
echo
'<br><br> En PHP, "include" y "require" son dos funciones que se utilizan para incluir archivos externos en un script PHP, como lo son las clases y los archivos de bibliotecas. La diferencia principal entre ambas funciones es cómo manejan los errores si el archivo no se puede encontrar o incluir.
<br><br>
La función "include" permite incluir un archivo externo en el script PHP actual. La sintaxis básica es la siguiente:
<br><br>
include "./bibliotecaPhp.php";<br><br>';
echo
'La función "include" busca el archivo especificado en el directorio actual y lo incluye en el script PHP. Si el archivo no se encuentra, "include" mostrará una advertencia E_WARNING y continuará ejecutando el script.
<br><br>
La función "require", por otro lado, es similar a "include", pero es más estricta en el manejo de errores. Si el archivo especificado no se puede encontrar o incluir, "require" detendrá la ejecución del script y mostrará un error fatal: E_COMPILE_ERROR.
<br><br>
La sintaxis básica de "require" es la siguiente:
<br><br>
require "./bibliotecaPhp.php";
<br><br>
Aunque si no incluimos el punto y barra, en este caso se leeria igual el archivo, desde el punto de vista del servidor, siempre que se incluyan archivos es una buena practica ya que así la referencia de la ubicación es clara.
<br><br>
La función "require" es útil cuando se depende de un archivo externo para el correcto funcionamiento del script. Si el archivo no se puede incluir por alguna razón, es probable que el script no pueda funcionar correctamente, por lo que es importante que el error se muestre inmediatamente para solucionarlo.
<br><br>
Ambas funciones también tienen una variante que se llama "include_once" y "require_once". Estas funciones funcionan de la misma manera que "include" y "require", pero solo incluyen el archivo una vez, incluso si se llama varias veces. Esto puede ser útil para evitar conflictos de variables o funciones duplicadas. Digase un idex que llama a distintos archivos, el include o required once evita el conflicto de las referencias cruzadas.
<br><br>
Es importante tener en cuenta que el uso excesivo de "include" y "require" puede afectar el rendimiento del script, ya que cada vez que se incluye un archivo externo, el servidor debe leer y procesar ese archivo. Por lo tanto, es recomendable utilizar estas funciones con moderación y solo cuando sea necesario.
<br><br>';

require './bibliotecaPhp.php';

echo "FUNCIONES EN PHP:<br><br>";
echo
'En PHP, una función es un bloque de código que realiza una tarea específica. Las funciones se pueden llamar en cualquier parte del programa, y pueden tomar argumentos de entrada y devolver valores de salida. Para definir una función en PHP, se utiliza la palabra clave "function", seguida del nombre de la función, el cual no es case sensitive, y una lista de argumentos entre paréntesis. El cuerpo de la función va entre llaves.
<br><br>
Aquí hay un ejemplo de una función en PHP que suma dos números:
<pre>
    <code>
    function suma($num1, $num2) {
        $result = $num1 + $num2;
        return $result;
    }
    </code>
</pre> 
En este ejemplo, la función se llama "sum" y toma dos argumentos: $num1 y $num2. Dentro de la función, se define una variable $result que almacena el resultado de la suma de $num1 y $num2. Luego, la función devuelve el valor de $result utilizando la palabra clave "return".
<br><br>
Para llamar a la función y utilizarla en nuestro programa, simplemente escribimos su nombre y pasamos los argumentos requeridos entre paréntesis. 
 ';
echo "<br>La suma de 1 y 5 en:", suma(1,5);

//Como se aclaro antes las funciones no son case sensitive:

echo "<br>La suma de 1 y 5 en:", SUMA(1,5);

/*

En este caso, la función "sum" se llama con los argumentos 2 y 3, y devuelve el valor 5 que se almacena en la variable $answer. Luego, utilizamos la función "echo" para mostrar el valor de $answer en la pantalla.

Además de las funciones definidas por el usuario, PHP también tiene una gran cantidad de funciones incorporadas que se pueden utilizar en cualquier programa. Estas funciones están organizadas en módulos, como "math", "string" y "file", y se pueden llamar directamente desde cualquier parte del programa sin necesidad de definirlas primero.
*/
?>
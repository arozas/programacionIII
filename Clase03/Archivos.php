<?php
echo '
<h1>MANIPULACIÓN DE ARCHIVOS EN PHP</h1>
<section>
<h2>Generalidades - E/S con Archivos</h2>
<p>
    El manejo de archivos (de <strong>texto</strong> o <strong>binarios</strong>) es una parte importante de una aplicación web.
    <br><br>
    La manipulación de archivos en PHP implica la apertura y cierre de un recurso de archivo, la lectura y escritura de su contenido, y la modificación de su contenido si es necesario. Con las funciones descritas a continuación, podemos realizar todas estas operaciones de manera efectiva y eficiente.
</p>
</section>
';
echo '
<section>
<h2>Abrir Archivos - fopen()</h2>
<p>
En PHP, fopen() es una función integrada que se utiliza para abrir un archivo y crear un recurso de archivo. La función acepta dos argumentos obligatorios: el nombre del archivo que se va a abrir y el modo de apertura.
<br><br>
Nos permite abrir un archivo de forma local o externa(http:// o ftp://)

 En su sintaxis el primer parámetro define el nombre del archivo a ser abierto, y el segundo especifica el modo en el que archivo será abierto.
<br><br>
La función fopen() devuelve un recurso de archivo que se utiliza para realizar operaciones en el archivo abierto. Este recurso es un puntero a un objeto de archivo interno en el sistema operativo y se utiliza para leer, escribir y cerrar el archivo.
<br><br>
IMPORTATE: EL retorno de <code>fopen()</code> es un entero que nos permite refernciar al archivo abierto.
<br><br>
Sintaxis:
<pre>
<code>
//int fopen(archivo, modo);
$file = fopen("archivo.txt", "r"); // Abrir el archivo en modo de lectura
</code>
</pre>
El modo de apertura especifica el tipo de acceso que se permitirá para el archivo. Hay varios modos de apertura disponibles, que incluyen:
<br><br>
<ul>
<li>
"r" (modo de lectura): Abre el archivo para leer su contenido. Si el archivo no existe, se produce un error. el cursor comienza al principio del archivo.
</li>
<li>
"r+"(modo lectura y escritura simultánea), el cursor comienza al principio del archivo.
</li>
<li>
 "w" (modo de escritura): Abre el archivo para escribir su contenido con el puntero al inicio. Si el archivo no existe, se crea uno nuevo. Si el archivo ya existe, su contenido anterior se eliminará.
</li>
<li>
 "w+" (modo de escritura y lectura): Abre el archivo para escribir su contenido con el puntero al inicio. Si el archivo no existe, se crea uno nuevo. Si el archivo ya existe, su contenido anterior se eliminará.
</li>
<li>
"a" (modo de anexar): Abre el archivo para escribir su contenido al final del archivo existente. Si el archivo no existe, se crea uno nuevo.
</li>
<li>
"a+" (modo de anexar): Abre el archivo para escribir su contenido al final del archivo existente. Si el archivo no existe, se crea uno nuevo.
</li>
<li>
"x" (modo de creación exclusiva): Abre el archivo para escribir su contenido. Si el archivo ya existe, se produce un error.
</li>
<li>
"x+" (modo de creación exclusiva y apertura): Abre el archivo para escribir su contenido. Si el archivo ya existe, se produce un error.
</li>
</ul>
En resumen, fopen() es una función fundamental en PHP que se utiliza para abrir y crear archivos. Con los diferentes modos de apertura disponibles, se pueden realizar operaciones de lectura, escritura y anexado en archivos. Además, es importante cerrar el recurso de archivo utilizando la función fclose() después de haber terminado de trabajar con él para evitar problemas de memoria y liberar los recursos del sistema.
</p>
</section>
';
echo '
<section>
<h2>Cerrar Archivos - fclose()</h2>
<p>
Para cerrar el archivo, se utiliza la función <code>fclose()</code>. Es importante cerrar el archivo después de haber terminado de trabajar con él para liberar los recursos del sistema y evitar problemas de memoria.
<br><br>
<code>fclose()</code> requiere el indicador del archivo a ser cerrado (la variable que referencia al archivo). Retorna TRUE su tuvo éxito, FALSE en caso contrario.
<pre>
<code>
//int fopen(archivo, modo);
$file = fopen("archivo.txt", "r"); // Abrir el archivo en modo de lectura
fclose($file); //Cierra el archivo.
</code>
</pre>
</p>
</section>
';
echo '
<section>
<h2>Leer Archivos - fread()</h2>
<p>
En PHP, fread() es una función integrada que se utiliza para leer datos desde un archivo. La función acepta dos argumentos obligatorios: el recurso de archivo que se desea leer y la cantidad de bytes que se desea leer.
<br><br>
El recurso de archivo es un puntero que hace referencia al archivo abierto y se obtiene mediante la función fopen(). La cantidad de bytes especifica cuántos bytes se desean leer del archivo.
<br><br>
Es importante tener en cuenta que fread() puede leer cualquier tipo de archivo, incluyendo archivos de texto y archivos binarios. Sin embargo, es importante especificar el modo de apertura correcto al abrir el archivo para asegurarse de que los datos se lean correctamente.
<br><br>
El siguiente ejemplo muestra cómo abrir un archivo en modo de lectura, leer su contenido y luego cerrarlo:
<pre>
<code>
$file = fopen("archivo.txt", "r"); // Abrir el archivo en modo de lectura
$content = fread($file, filesize("archivo.txt")); // Leer el contenido del archivo
fclose($file); // Cerrar el archivo
</code>
</pre>
En este ejemplo, se abre el archivo "archivo.txt" en modo de lectura utilizando fopen(), se lee su contenido utilizando fread() y luego se cierra el archivo utilizando fclose().
<br><br>
Es importante tener en cuenta que si se intenta leer más bytes de los que hay disponibles en el archivo, fread() devolverá una cadena vacía. Además, si se intenta leer desde un archivo que no ha sido previamente abierto, se producirá un error.
<br><br>
En resumen, fread() es una función importante en PHP que se utiliza para leer datos desde un archivo. La función acepta un recurso de archivo y la cantidad de bytes que se desean leer. Es importante especificar el modo de apertura correcto al abrir el archivo para asegurarse de que los datos se lean correctamente. También es importante cerrar el archivo después de haber terminado de trabajar con él utilizando la función fclose().
</p>
</section>
<section>
<h3>Leer Archivos - fgets()</h3>
<p>
En PHP, fgets() es una función integrada que se utiliza para leer una línea completa desde un archivo. La función acepta un solo argumento obligatorio: el recurso de archivo que se desea leer.
<br><br>
El recurso de archivo es un puntero que hace referencia al archivo abierto y se obtiene mediante la función fopen(). La función fgets() lee una línea completa desde el archivo apuntado por el recurso de archivo y devuelve esa línea como una cadena.
<br><br>
Es importante tener en cuenta que fgets() lee solo una línea a la vez, lo que significa que si se desea leer todo el contenido del archivo, se debe llamar a la función en un bucle hasta que se haya leído todo el contenido.
<br><br>
El siguiente ejemplo muestra cómo abrir un archivo en modo de lectura, leer línea por línea su contenido y luego cerrarlo:
<pre>
<code>
$file = fopen("archivo.txt", "r"); // Abrir el archivo en modo de lectura
while(!feof($file)) {
  $line = fgets($file); // Leer una línea completa del archivo
  echo $line; // Imprimir la línea leída
}
fclose($file); // Cerrar el archivo
</code>
</pre>
En este ejemplo, se abre el archivo "archivo.txt" en modo de lectura utilizando fopen(), se lee línea por línea su contenido utilizando fgets() dentro de un bucle while y luego se cierra el archivo utilizando fclose().
<br><br>
Es importante tener en cuenta que si se intenta leer desde un archivo que no ha sido previamente abierto, se producirá un error.
<br><br>
fgets() es una función importante en PHP que se utiliza para leer una línea completa desde un archivo. La función acepta un recurso de archivo como argumento y devuelve esa línea como una cadena. Si se desea leer todo el contenido del archivo, se debe llamar a la función en un bucle hasta que se haya leído todo el contenido. También es importante cerrar el archivo después de haber terminado de trabajar con él utilizando la función fclose().
</p>
</section>
';
echo '
<section>
<h3>Leer Archivos - feof() (End of File)</h3>
<p>
En PHP, feof() es una función integrada que se utiliza para determinar si se ha alcanzado el final de un archivo. La función acepta un solo argumento obligatorio: el recurso de archivo que se desea verificar.
<br><br>
El recurso de archivo es un puntero que hace referencia al archivo abierto y se obtiene mediante la función fopen(). La función feof() devuelve un valor booleano que indica si se ha alcanzado el final del archivo o no. Si se ha alcanzado el final del archivo, la función devuelve true; en caso contrario, devuelve false.
<br><br>
La función feof() es útil cuando se desea leer todo el contenido de un archivo utilizando una estructura de bucle, como un while. El siguiente ejemplo muestra cómo leer todo el contenido de un archivo utilizando feof() y fgets():
<pre>
<code>
$file = fopen("archivo.txt", "r"); // Abrir el archivo en modo de lectura
while(!feof($file)) {
  $line = fgets($file); // Leer una línea completa del archivo
  echo $line; // Imprimir la línea leída
}
fclose($file); // Cerrar el archivo
</code>
</pre>
En este ejemplo, se abre el archivo "archivo.txt" en modo de lectura utilizando fopen(), se lee línea por línea su contenido utilizando fgets() dentro de un bucle while y luego se cierra el archivo utilizando fclose(). La función feof() se utiliza en la condición del bucle while para determinar cuándo se ha llegado al final del archivo.
<br><br>
Es importante tener en cuenta que si se intenta verificar si se ha alcanzado el final de un archivo que no ha sido previamente abierto, se producirá un error.
<br><br>
La función acepta un recurso de archivo como argumento y devuelve un valor booleano que indica si se ha alcanzado el final del archivo o no. La función es útil cuando se desea leer todo el contenido de un archivo utilizando una estructura de bucle
</p>
</section>
';
echo '
<section>
<h2>Escribir archivos - fwrite() - fputs()</h2>
<p>
En PHP, fwrite() o fputs() es una función integrada que se utiliza para escribir datos en un archivo. La función acepta dos argumentos obligatorios: el recurso de archivo que se va a escribir y la cadena de datos que se va a escribir en el archivo.
<br><br>
El recurso de archivo es un puntero que hace referencia al archivo abierto y se obtiene mediante la función fopen(). La cadena de datos es la información que se va a escribir en el archivo.
<br><br>
La función fwrite() devuelve el número de bytes escritos en el archivo o false en caso de error. Es importante tener en cuenta que si se intenta escribir en un archivo que no ha sido previamente abierto, se producirá un error.
<br><br>
El siguiente ejemplo muestra cómo escribir en un archivo utilizando fwrite():
<pre>
<code>
$file = fopen("archivo.txt", "w"); // Abrir el archivo en modo de escritura
$data = "Este es un ejemplo de datos a escribir en el archivo.";
fwrite($file, $data); // Escribir la cadena de datos en el archivo
fclose($file); // Cerrar el archivo
</code>
</pre>
En este ejemplo, se abre el archivo "archivo.txt" en modo de escritura utilizando fopen(), se escribe la cadena de datos utilizando fwrite() y luego se cierra el archivo utilizando fclose(). La función fwrite() devuelve el número de bytes escritos en el archivo.
<br><br>
También es posible escribir en un archivo línea por línea utilizando la función fputs(), que es similar a fwrite(). El siguiente ejemplo muestra cómo escribir en un archivo línea por línea utilizando fputs():
<pre>
<code>
$file = fopen("archivo.txt", "w"); // Abrir el archivo en modo de escritura
fputs($file, "Primera línea de datos.\n"); // Escribir la primera línea en el archivo
fputs($file, "Segunda línea de datos.\n"); // Escribir la segunda línea en el archivo
fclose($file); // Cerrar el archivo
</code>
</pre>
En este ejemplo, se abre el archivo "archivo.txt" en modo de escritura utilizando fopen(), se escriben dos líneas de datos utilizando fputs() y luego se cierra el archivo utilizando fclose().
</p>
</section>
';
echo '
<section>
<h2>Copiar achivos - copy()</h2>
<p>
En PHP, la función copy() se utiliza para copiar un archivo de un lugar a otro en el sistema de archivos. La función toma dos argumentos obligatorios: el nombre de archivo original y el nombre de archivo de destino.
<br><br>
La sintaxis básica de la función copy() es la siguiente:
<pre>
<code>
copy($origen, $destino);
</code>
</pre>
Donde $origen es la ruta del archivo que se desea copiar y $destino es la ruta del archivo copiado.
<br><br>
Es importante tener en cuenta que la función copy() no copia los permisos de archivo y los propietarios del archivo. Por lo tanto, es posible que sea necesario establecer manualmente los permisos del archivo copiado después de llamar a la función copy().
<br><br>
El siguiente ejemplo muestra cómo utilizar la función copy() para copiar un archivo:
<pre>
<code>
if (copy("/ruta/al/archivo_original.txt", "/ruta/al/archivo_copiado.txt")) {
    echo "El archivo se copió correctamente.";
} else {
    echo "No se pudo copiar el archivo.";
}
</code>
</pre>
En este ejemplo, se copia el archivo "archivo_original.txt" a "archivo_copiado.txt" utilizando la función copy(). Si la función se ejecuta con éxito, se imprime un mensaje de éxito. Si la función falla, se imprime un mensaje de error.
<br><br>
También es posible utilizar la función copy() para copiar archivos de una ubicación remota a una ubicación local en el servidor. El siguiente ejemplo muestra cómo utilizar la función copy() para copiar un archivo de una ubicación remota:
<pre>
<code>
if (copy("http://www.example.com/archivo_remoto.txt", "/ruta/al/archivo_local.txt")) {
    echo "El archivo se copió correctamente.";
} else {
    echo "No se pudo copiar el archivo.";
}
</code>
</pre>
En este ejemplo, se copia el archivo remoto "archivo_remoto.txt" a "archivo_local.txt" utilizando la función copy(). Si la función se ejecuta con éxito, se imprime un mensaje de éxito. Si la función falla, se imprime un mensaje de error.
<br><br>
En resumen, la función copy() es una función importante en PHP que se utiliza para copiar archivos de un lugar a otro en el sistema de archivos. La función acepta dos argumentos obligatorios: el nombre de archivo original y el nombre de archivo de destino. La función es útil cuando se desea crear copias de archivos para su uso en diferentes ubicaciones y se utiliza comúnmente en aplicaciones web para copiar archivos subidos por usuarios a una ubicación de almacenamiento permanente en el servidor.
</p>
</section>
';
echo '
<section>
<h2>Borrar archivos - unlink()</h2>
</section>
';
?>

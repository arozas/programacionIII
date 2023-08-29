<?php
echo '
<h1>SUBIR ARCHIVOS AL SERVIDOR</h1>
<section>
<h2>Subir Archivos</h2>
<p>
Los Archivos se suben por medio de métodos Post, ya que se necesita enviar el archivo a traves del body, por que por métodos Get, no se puede por que no puede viajar por la URL.
<br><br>
Aparte por la decodificación del archivo necesitamos especificar en el body mas informacion. El post permite enviar archivos con el tipo de dato Archivos.
<br><br>
Algunas reglas a seguir para el formulario .
<ul>
<li>
El método del formulario debe ser .
</li>
<li>
El formulario necesita del atributo enctype. Dicho atributo especifica el contenido/tipo a usarse cuando se envia el formulario.
</li>
<li>
El input de tipo permite mostrar una ventana modal para navegar en busca del archivo a ser subido.
</li>
</ul>
El atributo "enctype" (abreviatura de "enctype" en inglés) se utiliza en los formularios HTML para especificar cómo se codificarán y enviarán los datos del formulario al servidor web cuando el usuario envíe el formulario.
<br><br>
El valor del atributo "enctype" determina el tipo de codificación utilizada para enviar los datos del formulario. Hay dos valores comunes para el atributo "enctype":
<ul>
<li>
"application/x-www-form-urlencoded": Este es el valor predeterminado si no se especifica ningún atributo "enctype". En esta codificación, los caracteres especiales se codifican mediante el uso de una secuencia de escape (por ejemplo, espacios se convierten en "%20") y los datos del formulario se envían en una sola cadena en el cuerpo de la solicitud HTTP.
</li>
<li>
"application/x-www-form-urlencoded": Este es el valor predeterminado si no se especifica ningún atributo "enctype". En esta codificación, los caracteres especiales se codifican mediante el uso de una secuencia de escape (por ejemplo, espacios se convierten en "%20") y los datos del formulario se envían en una sola cadena en el cuerpo de la solicitud HTTP.
</li>
</ul>
"multipart/form-data": Este valor se utiliza cuando se desean enviar archivos adjuntos a través del formulario, como imágenes o documentos. En esta codificación, los datos del formulario se dividen en múltiples partes y se envían en un formato de multipart MIME. Cada parte del formulario, incluidos los archivos adjuntos, se envía de forma independiente.
<br><br>
El uso del atributo "enctype" es importante cuando se trabaja con formularios que incluyen archivos adjuntos, ya que sin él, el envío de archivos no funcionará correctamente. Si no hay archivos adjuntos en el formulario, generalmente no es necesario especificar el atributo "enctype", ya que se utilizará la codificación predeterminada.
<br><br>
El envio de archivo por medio de html dejo de ser usado por no ser seguro, ya que por medio de la edición de este, se podia generar inyeccione, lo cual genera vulnerabilidades, por esto mismo, hoy los metodos para enviar archivos evolucionaron para subsanar estas vulnerabilidades del sistema. Otro motivo es que el submit dentro del input al enviar el formulario hace una recarga de la página, y hoy en dia las paginas se cargan por componentes y manejan con vistas, por lo tanto es ideal evitar las redirecciones.
</p>
</section>
';
echo '
<section>
<h2>Del lado del servidor</h2>
<p>
Del lado del servidor, tenemos que manipular el archivo recibido en $_FILES. Utilizando funciones de PHP deberemos mover el archivo subido desde su ubicacion temporal a la ubicacion definitiva dentro del servidor.
<br><br>
Sintaxis:
<pre>
<code>
$destino = "uploads/".$_FILES["archivo"]["name"];
move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino);
</code>
</pre>
</p>
Es importante destacar que PHP al momento de recibir el archivo lo guarda en una carpeta temporal por cuestiones de seguridad, si nosotros no manipulamos el achivo recibido para moverlo a otra carpeta, el archivo no va a persistir.
</section>
';
echo '
<section>
<h2>La variable superglobal $_FILES</h2>
<p>
La variable superglobal $_FILES es una matriz asociativa en PHP que se utiliza para acceder a los datos de los archivos subidos a través de un formulario HTML con el atributo "enctype" establecido en "multipart/form-data". Esta variable esta desde la version 4.10 de PHP.
<br><br>
Cuando un usuario envía un formulario que incluye un campo de archivo, el archivo seleccionado se carga en el servidor y se almacena temporalmente en una ubicación específica. Luego, la información sobre el archivo se almacena en la matriz $_FILES, que contiene varios elementos clave:
<br><br>
<ul>
<li>
$_FILES["nombre_del_campo"]["name"]: Contiene el nombre original del archivo cargado por el usuario.
</li>
<li>
$_FILES["nombre_del_campo"]["type"]: Representa el tipo MIME del archivo.
</li>
<li>
$_FILES["nombre_del_campo"]["tmp_name"]: Especifica la ubicación temporal del archivo en el servidor.
</li>
<li>
$_FILES["nombre_del_campo"]["error"]: Proporciona un código de error (si lo hay) relacionado con la carga del archivo.
</li>
<li>
$_FILES["nombre_del_campo"]["size"]: Indica el tamaño del archivo en bytes.
</li>
</ul>
Es importante destacar que "nombre_del_campo" se refiere al valor del atributo name del campo de archivo en el formulario HTML.
<br><br>
Aquí hay un ejemplo de cómo se puede acceder a los datos de un archivo cargado utilizando $_FILES:
<pre>
<code>
form action="upload.php" method="post" enctype="multipart/form-data">
  input type="file" name="archivo">
  input type="submit" value="Enviar">
/form>
</code>
</pre>
En el archivo "upload.php", se puede acceder a los datos del archivo de la siguiente manera:
<pre>
<code>
$nombreArchivo = $_FILES["archivo"]["name"];
$tipoArchivo = $_FILES["archivo"]["type"];
$ubicacionTemporal = $_FILES["archivo"]["tmp_name"];
$tamañoArchivo = $_FILES["archivo"]["size"];

// Procesar el archivo cargado
// ...
</code>
</pre>
La matriz $_FILES permite a los desarrolladores acceder a la información necesaria para manipular y mover los archivos cargados, por ejemplo, almacenarlos permanentemente en el servidor, realizar validaciones adicionales o generar respuestas personalizadas al usuario.
</p>
</section>
';
echo '
<section>
<h2>Atributos HTML</h2>
<p>
Con el atributo booleano "multiple" de HTML5 permite que los usuarios seleccionen varios archivos para ser subidos al servidor.
<br><br>
El atributo accept, permite flitrar (en el cliente) los tipos de archivos que se permitirán subir al servidor.
<br><br>
Sin embargo, esto no puede ser una forma segura de validar, las validaciones son responabildad tanto del front como del back, ya que un servicio backend puede tener varios front, en este ejemplo concreto, por medio de postman, si el back no esta funcionando con tokens o validaciones para acceso al servicio, se pueden saltar las restricciones impuestas desde HTML.
</section>
';

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Cookies</h1>
<section>
    <p>
        Las cookies son pequeños archivos de texto que se almacenan en el lado del cliente (navegador web) cuando un usuario visita un sitio web. Estos archivos contienen información que se utiliza para realizar un seguimiento del usuario y personalizar su experiencia en el sitio. Las cookies se utilizan para diversos fines, como mantener la información de inicio de sesión, recordar las preferencias del usuario, rastrear la actividad del usuario y proporcionar contenido personalizado. Permiten que los sitios web almacenen información en el navegador del usuario y la recuperen en visitas posteriores.
    </p>
</section>
<section>
    <h2>Generalidades de las cookies:</h2>
    <p>
    <ul>
        <li>
            Las cookies se basan en el protocolo HTTP y se intercambian entre el servidor y el cliente a través de las cabeceras HTTP.
        </li>
        <li>
            Cada cookie tiene un nombre único que se utiliza para identificarla y un valor asociado que contiene la información almacenada.
        </li>
        <li>
            Las cookies también pueden tener otras propiedades, como la fecha de caducidad, el dominio y la ruta, que determinan cuándo y cómo se envían las cookies al servidor.
        </li>
    </ul>
    Cada vez que el mismo equipo solicita una página con un navegador, se enviará la cookie también
    <br><br>
    Con PHP, se puede tanto crear como recuperar valores de cookies.
    </p>
</section>
<section>
    <h2>Establecer una Cookie</h2>
    <p>
        En PHP, puedes establecer una cookie utilizando la función setcookie().
        setcookie()define una cookie para ser enviada junto con el resto de las cabeceras de HTTP.
    <br><br>
        Al igual que otras cabeceras, las cookies deben ser enviadas antes de que
        el script genere ninguna salida (es una restricción del protocolo).
    <br><br>
        Esto implica que las llamadas a esta función se coloquen antes de que se genere cualquier salida, incluyendo las etiquetas html y head al igual que cualquier espacio en blanco.
    <br><br>
        Una vez que han sido enviadas las cookies, se puede acceder a ellas en la próxima carga de la página gracias a los arrays $_COOKIE.
    <br><br>
        A excepción del parámetro name, los parámetros son opcionales.
    <br><br>
        Si existe algún tipo de salida anterior a la llamada de esta función, setcookie() fallará y retornará FALSE.
    <br><br>
        Si setcookie() ejecuta satisfactoriamente, retornará TRUE.
    <br><br>
        Esto no indica si es que el usuario ha aceptado la cookie o no.
    <pre>
        <code>
            // setcookie(name, [value], [expire], [path], [domain], [secure], [httponly]
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30),"/");
            // 86400 = 1 dia
        </code>
    </pre>
        Es una que existe a partir de PHP 4.1.0.
    <br><br>
        Es un array asociativo de elementos cargados al script actual a través del método POST.
    <br><br>
        Esta función acepta varios parámetros, pero los más comunes son:
    <ul>
        <li>
            setcookie(nombre, valor, caducidad, ruta, dominio, seguro, httponly).
        </li>
        <li>
            name - nombre: el nombre de la cookie.
        </li>
        <li>
            value - valor: el valor asociado con la cookie. Establece el valor de la cookie. Este valor se guarda en el cliente.
        </li>
        <li>
            expire - caducidad: opcionalmente, la fecha de caducidad de la cookie en forma de marca de tiempo Unix. Indica el tiempo en el que expira la cookie. Es una fecha Unix por tanto está expresada en números de segundos a partir de la presente época.
        </li>
        <li>
            path & domain - ruta y dominio: opcionalmente, la ruta y el dominio para los cuales la cookie es válida. Indica la ruta dentro del servidor en la que la cookie estará disponible. El dominio para el cual la cookie está disponible.
        </li>
        <li>
            secure - seguro: opcionalmente, indica si la cookie solo debe enviarse a través de conexiones seguras (HTTPS). Establece si la cookie sólo debiera transmitirse por una conexión segura HTTPS desde el cliente. Cuando se configura como, la cookie sólo se creará si es que existe una conexión segura.
        </li>
        <li>
            httponly: opcionalmente, indica si la cookie solo debe ser accesible a través del protocolo HTTP y no mediante scripts del lado del cliente. Cuando es TRUE la cookie será accesible sólo a través del protocolo HTTP. Esto significa que la cookie no será accesible por lenguajes de scripting, como JavaScript.
        </li>
    </ul>
    </p>
</section>
<section>
    <h2>Borrar una cookie.</h2>
    <p>
        Recuerda que las cookies son almacenadas en el lado del cliente y pueden ser manipuladas por los usuarios, por lo que no deben utilizarse para almacenar información sensible o confidencial. Además, es importante cumplir con las regulaciones de privacidad y proporcionar a los usuarios opciones para aceptar o rechazar el uso de cookies en tu sitio web.
    <ul>
        <li>
            Para borrar una cookie, puedes establecer una fecha de caducidad pasada al establecer la cookie utilizando la función setcookie(). Por ejemplo:
            <pre>
                <code>
                    setcookie('nombre_cookie', '', time() - 3600);
                </code>
            </pre>
            Esto establece la cookie 'nombre_cookie' con una fecha de caducidad en el pasado, lo que indica al navegador que elimine la cookie.
        </li>
        <li>
            Es importante tener en cuenta que una vez que una cookie ha sido establecida en el lado del cliente, solo puede ser eliminada o modificada en una solicitud posterior al servidor. Por lo tanto, el efecto de borrar una cookie no es inmediato.
        </li>
    </ul>
    </p>
</section>
</body>
</html>
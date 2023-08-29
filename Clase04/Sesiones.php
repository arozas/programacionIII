<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Sesiones</h1>
<section>
    <h2>Variables de Sesión</h2>
    <p>
        En el contexto del backend y la programación en PHP, las variables de sesión son una herramienta importante para mantener y administrar datos a lo largo de múltiples solicitudes del usuario. A continuación, explicaré las generalidades de las variables de sesión, cómo abrir una sesión y cómo destruir una sesión.
        <br><br>

    </p>
</section>
<section>
    <h3>Generalidades sobre las variables de sesión.</h3>
    <p>
        <ul type="square">
        <li>
            Las variables de sesión son variables especiales que se utilizan para almacenar información específica de un usuario durante su interacción con una aplicación web.
        </li>
        <li>
            A diferencia de las variables normales que se utilizan en un solo script o solicitud, las variables de sesión pueden persistir a través de múltiples solicitudes y páginas para un usuario en particular. Estas sesiones persisten mientras el usuario esté logueado o las destruyamos.
        </li>
        <li>
            Las variables de sesión se almacenan en el servidor y se asocian con un identificador único, generalmente en forma de una cookie en el lado del cliente, para rastrear la sesión del usuario.
        </li>
        <li>
            Esto permite que los datos de la sesión, como la información de inicio de sesión, las preferencias del usuario o el estado de la aplicación, se mantengan entre solicitudes y se accedan fácilmente en diferentes partes de la aplicación.
        </li>
    </ul>
    A tener en cuenta:
    <ol>
        <li>
            Persistencia de datos: Las variables de sesión proporcionan persistencia de datos a lo largo de múltiples solicitudes. Esto significa que los datos almacenados en las variables de sesión se mantienen disponibles incluso cuando el usuario navega por diferentes páginas o realiza varias acciones en una aplicación web. Por ejemplo, si un usuario inicia sesión en un sitio web, la información de su sesión (como el nombre de usuario) se puede almacenar en variables de sesión y mantenerse accesible en todas las páginas mientras dure su sesión.
        </li>
        <li>
            Identificación de sesiones: Cada sesión de usuario se identifica de manera única mediante un identificador de sesión. Normalmente, este identificador se almacena en una cookie en el lado del cliente, aunque también puede pasar como un parámetro en la URL. Este identificador se utiliza para rastrear la sesión del usuario y recuperar los datos asociados con esa sesión desde el servidor. De esta manera, cuando un usuario realiza una nueva solicitud, el servidor puede reconocerlo mediante su identificador de sesión y acceder a sus datos de sesión correspondientes.
        </li>
        <li>
            Almacenamiento en el servidor: Las variables de sesión se almacenan en el servidor, no en el lado del cliente. Esto significa que los datos de la sesión no se transmiten entre el cliente y el servidor en cada solicitud, lo que puede ahorrar ancho de banda. Sin embargo, se envía una cookie que contiene el identificador de sesión para mantener la asociación entre el cliente y el servidor.
        </li>
        <li>
            Acceso a través de la superglobal $_SESSION: En PHP, se accede a las variables de sesión a través de la superglobal $_SESSION. Es una matriz asociativa en la que se pueden almacenar y recuperar datos de sesión. Por ejemplo, $_SESSION['nombre'] = 'John'; asigna el valor "John" a la variable de sesión "nombre". Para acceder a los datos de sesión en diferentes partes de una aplicación, simplemente se utiliza $_SESSION['nombre'].
        </li>
        <li>
            Seguridad de las variables de sesión: Es crucial tener en cuenta la seguridad al utilizar variables de sesión. Almacenar datos confidenciales o sensibles en las variables de sesión puede plantear riesgos de seguridad, ya que los datos se almacenan en el servidor y pueden ser accesibles para otros usuarios o incluso ser robados si se producen brechas de seguridad. Por lo tanto, es importante evitar almacenar información confidencial, como contraseñas, en variables de sesión y seguir buenas prácticas de seguridad para proteger las sesiones, como generar identificadores de sesión seguros y utilizar conexiones HTTPS.
        </li>
    </ol>
    </p>
</section>
<section>
    <h3>Abrir Sesión.</h3>
    <p>
    Caracteristicas y generalidades:
    <ul>
        <li>
            Antes de utilizar las variables de sesión, es necesario iniciar una sesión. Esto se realiza mediante la función session_start(), que debe llamarse al comienzo de cada script o página que necesite acceder a las variables de sesión.
        </li>
        <li>
            La función session_start() inicializa la sesión o recupera la sesión existente si ya se ha iniciado previamente. También establece el identificador de sesión único en una cookie en el lado del cliente.
        </li>
        <li
            Después de iniciar una sesión, se pueden establecer y acceder a las variables de sesión utilizando la superglobal $_SESSION. Por ejemplo, $_SESSION['CLAVE'] = 765487cf34ert8dede5a562e4f3a7e12; asigna el valor "765487cf34ert8dede5a562e4f3a7e12" a la variable de sesión "nombre".
        </li>
    </ul>
    Sintaxis:
    <pre>
        <code>
            session_start();
            echo $_SESSION["CLAVE"];
        </code>
    </pre>
    En detalle:
    <ol>
        <li>
            Inicio de sesión: Antes de que un usuario pueda acceder a las variables de sesión y almacenar datos en ellas, es necesario iniciar una sesión. Esto se logra llamando a la función session_start(). Por lo general, se coloca esta función al comienzo de cada script o página que necesita acceder a las variables de sesión.
        </li>
        <li>
            Identificador de sesión: Cuando se llama a session_start(), PHP genera un identificador único de sesión para el usuario y lo asocia con una cookie en el lado del cliente. Esta cookie, que contiene el identificador de sesión, se envía automáticamente en cada solicitud posterior del usuario, lo que permite que el servidor reconozca y recupere la sesión correspondiente.
        </li>
        <li>
            Recuperación de datos de sesión: Después de iniciar una sesión utilizando session_start(), se pueden establecer y acceder a las variables de sesión mediante la superglobal $_SESSION. Esta superglobal es una matriz asociativa en la que los datos de sesión se almacenan y recuperan. Por ejemplo, si deseas almacenar el nombre de usuario en una variable de sesión, puedes hacerlo de la siguiente manera: $_SESSION['CLAVE'] = 765487cf34ert8dede5a562e4f3a7e12;.
        </li>
        <li>
            Persistencia de datos: Una vez que se han establecido las variables de sesión, se mantendrán disponibles en todas las páginas y solicitudes subsecuentes hasta que se cierre la sesión. Esto permite almacenar y mantener datos específicos del usuario a lo largo de su interacción con la aplicación web. Por ejemplo, puedes almacenar información de inicio de sesión, preferencias del usuario o cualquier otro dato relevante en las variables de sesión.
        </li>
        <li>
            Asociación entre cliente y servidor: Al iniciar una sesión, PHP crea una asociación entre el cliente (navegador web) y el servidor. Esto se logra mediante la generación y envío de una cookie de sesión que contiene el identificador único de sesión. En cada solicitud posterior, el navegador del cliente envía esta cookie al servidor, permitiendo que el servidor identifique y recupere la sesión correspondiente al usuario.
        </li>
    </ol>
    Es importante tener en cuenta que la función session_start() debe llamarse en todas las páginas o scripts que necesiten acceder a las variables de sesión. De lo contrario, no se podrán utilizar ni recuperar los datos de sesión.
    <br><br>
    Para eliminar todas las variables de sesion globales y destruir la sesión, hay que usar sesion_unset() y session_destroy().
    <br><br>
    En resumen, abrir una sesión implica iniciar una sesión de usuario utilizando session_start(), generando un identificador único de sesión y asociándolo con una cookie en el lado del cliente. Esto permite el acceso y almacenamiento de datos en las variables de sesión a lo largo de múltiples solicitudes del usuario, proporcionando persistencia de datos durante su interacción con la aplicación web.
    </p>
</section>
<section>
    <h3>Destruir Sesión.</h3>
    <p>
        Es importante manejar adecuadamente las variables de sesión en términos de seguridad y rendimiento, evitando el almacenamiento de datos sensibles y liberando las variables de sesión que ya no son necesarias para evitar el consumo innecesario de recursos del servidor.
        <br><br>
        Caracteristicas y generalidades:
    <ul>
        <li>
            Cuando se desea cerrar o destruir una sesión, se utiliza la función session_destroy(). Esta función elimina todos los datos de la sesión actual y destruye la sesión actual en el servidor.
        </li>
        <li>
            Es importante tener en cuenta que session_destroy() no elimina directamente las variables de sesión en la superglobal $_SESSION, sino que simplemente las marca como inválidas. Por lo tanto, después de llamar a session_destroy(), se recomienda también llamar a session_unset() para limpiar y eliminar todas las variables de sesión restantes.
        </li>
        <li>
            Después de destruir una sesión, se recomienda eliminar la cookie de sesión en el lado del cliente utilizando la función setcookie() con una fecha de caducidad pasada para invalidar la cookie.
        </li>
    </ul>
    En detalle:
    <ol>
        <li>
            Finalización de la sesión: Cuando un usuario ha completado su interacción con una aplicación web y desea cerrar su sesión, es necesario destruir la sesión correspondiente. La destrucción de la sesión implica eliminar todos los datos de sesión y finalizar la asociación entre el cliente y el servidor.
        </li>
        <li>
            Función session_destroy(): Para destruir una sesión en PHP, se utiliza la función session_destroy(). Esta función elimina todos los datos asociados con la sesión actual y marca la sesión como inválida en el servidor. La función session_destroy() no acepta ningún parámetro y debe llamarse después de haber abierto una sesión con session_start().
        </li>
        <li>
            Limpieza de variables de sesión: Después de llamar a session_destroy(), las variables de sesión aún pueden estar accesibles en la superglobal $_SESSION. Por lo tanto, se recomienda utilizar la función session_unset() para limpiar y eliminar todas las variables de sesión restantes después de destruir la sesión. La función session_unset() elimina todos los valores almacenados en $_SESSION, dejando la superglobal vacía.
        </li>
        <li>
            Eliminación de la cookie de sesión: Además de destruir la sesión en el servidor, es recomendable eliminar la cookie de sesión en el lado del cliente para invalidar la sesión. Puedes utilizar la función setcookie() para establecer una fecha de caducidad pasada en la cookie de sesión, lo que hace que el navegador la elimine. Por ejemplo, puedes usar el siguiente código para eliminar la cookie de sesión:
            <pre>
                <code>
                    setcookie(session_name(), '', time() - 3600, '/');
                </code>
            </pre>
            Este código establece la cookie de sesión con el nombre de sesión actual en una fecha de caducidad pasada (time() - 3600), lo que indica al navegador que elimine la cookie.
        </li>
        <li>
            Cerrar sesión completa: Para asegurarse de que se ha destruido completamente la sesión y que el usuario no pueda acceder a ninguna página restringida, es recomendable redirigir al usuario a una página de cierre de sesión o a la página de inicio de sesión después de destruir la sesión. Esto garantiza que todas las variables de sesión se hayan eliminado y que el usuario no tenga acceso no autorizado a páginas protegidas.
        </li>
    </ol>
    Es importante tener en cuenta que destruir una sesión con session_destroy() solo afecta la sesión actual del usuario. Las sesiones de otros usuarios no se ven afectadas.
    <br><br>
    En resumen, destruir una sesión implica eliminar todos los datos de sesión, marcar la sesión como inválida en el servidor, limpiar las variables de sesión restantes y eliminar la cookie de sesión en el lado del cliente. Esto asegura que la sesión del usuario se cierre correctamente y que se elimine cualquier acceso no autorizado a páginas protegidas por sesión.
    </p>
</section>
</body>
</html>
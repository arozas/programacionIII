<?php
/*======================================================================================================================
=============================================== LIBRERIA DE VALIDACIONES ===============================================
UTN Avellaneda      Asignatura: Laboratorio III     Año: 2023       Nombre: ALEJANDRO ROZAS     División: 3-D
========================================================================================================================
======================================================================================================================*/

/**
 * Summary:
 * Esta función valida si es texto y su cantidad de caracteres.
 * @param type $cadena El texta a validar.
 * @param type $longitudMaxima La cantidad de caracteres que debe tener el texto.
 * @return type Retorna true si cumple las condiciones y lanza una excepción si no.
 */
function ValidarCadena($cadena, $longitudMaxima): bool {
    if (!is_string($cadena)) {
        throw new InvalidArgumentException("El valor proporcionado no es una cadena de texto.");
    }
    if (is_integer($longitudMaxima) && strlen($cadena) > $longitudMaxima) {
        throw new InvalidArgumentException("La cadena no debe exceder los $longitudMaxima caracteres.");
    }
    if ($cadena === '') {
        throw new InvalidArgumentException("La cadena no puede estar vacía.");
    }
    return true;
}
?>
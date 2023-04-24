<?php
//Nombre: ALEJANDRO ROZAS
//División: 3-D
echo "Aplicación No 4 (Calculadora)";
echo "<br>". "<br>";
/*
 *Escribir un programa que use la variable $operador que pueda almacenar los símbolos
 *matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras $op1 y $op2. De acuerdo al
 *símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el
 *resultado por pantalla.
 */
$operador = '+';
$op1 = 10;
$op2 = 5;
/* PRIMERA CALCULADORA:

switch ($operador) {
  case '+':
    $resultado = $op1 + $op2;
    break;
  case '-':
    $resultado = $op1 - $op2;
    break;
  case '*':
    $resultado = $op1 * $op2;
    break;
  case '/':
    if ($op2 == 0) {
      echo "Error: división por cero";
      break;
    } else {
      $resultado = $op1 / $op2;
      break;
    }
  default:
    echo "Operador no válido";
    break;
}
echo "El resultado de la operación es: " . $resultado;

*/

// Calculadora usando funciones de PHP.
if (!in_array($operador, ['+', '-', '*', '/'])) {
    echo "Operador no válido";
} elseif ($operador == '/' && $op2 == 0) {
    echo "Error: división por cero";
} else {
    $resultado = eval("return $op1 $operador $op2;");
    // OJO CON eval()!!! Entiendo lo peligroso de la función en un uso no controlado.
    echo "El resultado de la operación es: $resultado";
}
?>
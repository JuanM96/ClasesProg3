<?php

require("funciones.php");
include_once("calculadora.php");
$resultado = Calculadora::sumar(3,3);
//require("noexiste.php");
//sumar(1,2);
echo $resultado;

?>
<?php
include_once("rectangulo.php");
include_once("triangulo.php");
$rectangulo = new rectangulo(3,5);
$rectangulo->Dibujar();
echo $rectangulo->ToString();
$triangulo = new triangulo(3,5);
echo $triangulo->ToString();
?>
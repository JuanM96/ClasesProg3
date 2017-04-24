<?php
$conexion = mysqli_connect("localhost","root","","productos");
$id = 2;
$consulta = mysqli_query($conexion,"SELECT * FROM producto");
var_dump($consulta);
echo "<br>";
$filas = mysqli_fetch_object($consulta);
var_dump($filas);
?>
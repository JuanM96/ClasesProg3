<?php
$conexion = mysqli_connect("localhost","root","","ejemplouno");
$id = 2;
$consulta = mysqli_query($conexion,"SELECT * FROM usuario WHERE id = ".$id);
var_dump($consulta);
echo "<br>";
$filas = mysqli_fetch_object($consulta);
var_dump($filas);
?>
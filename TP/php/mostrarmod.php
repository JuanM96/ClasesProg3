<?php
include_once("Empleado.php");
$archivo = fopen("empleado.txt","r");
$cont = 0;
echo "<script src='../script/modificar.js'></script>";
echo "<select name='empleados' size='20'>";
while (!feof($archivo)) {
    $cont += 1;
    $linea = fgets($archivo);
    $arrayEmpleado = explode("-",$linea);
    if (count($arrayEmpleado) != 1) {
        echo "<option>".$arrayEmpleado[2]." - ".$arrayEmpleado[1]."</option>";
    }
    
}
echo "</select><br>";
echo "<input type='submit' value='Aceptar' onclick='EmpleadoSelecto()'><br>";
echo "<a href='../index.html'>Volver a Inicio</a><br>";

fclose($archivo); 
?>
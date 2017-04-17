<?php
include_once("Empleado.php");
$archivo = fopen("empleado.txt","r");
while (!feof($archivo)) {
    $linea = fgets($archivo);
    $arrayEmpleado = explode("-",$linea);
    if (count($arrayEmpleado) != 1) {
        //$empleado = new Empleado($arrayEmpleado[0],$arrayEmpleado[1],$arrayEmpleado[2],$arrayEmpleado[3],$arrayEmpleado[4],$arrayEmpleado[5]);
        //echo $empleado->ToString()."<br>";
        echo "<fieldset><p>"."Nombre: ".$arrayEmpleado[0]."<br>Apellido: ".$arrayEmpleado[1]."<br>DNI: ".$arrayEmpleado[2]."<br>Sexo: ".$arrayEmpleado[3]."<br>Legajo: ".$arrayEmpleado[4]."<br>Sueldo: ".$arrayEmpleado[5]."<br><img src=".$arrayEmpleado[6]."-".$arrayEmpleado[7]." alt='Foto' height='100' width='100'>"."</p></fieldset><br>";
    }
    
}

fclose($archivo);
?>
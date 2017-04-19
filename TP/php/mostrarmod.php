<?php
//include_once("Empleado.php");
$archivo = fopen("empleado.txt","r");
$cont = 0;
// echo "<script src='../script/modificar.js'></script>";
// echo "<select name='empleados' size='20'>";
// while (!feof($archivo)) {
//     $cont += 1;
//     $linea = fgets($archivo);
//     $arrayEmpleado = explode("-",$linea);
//     if (count($arrayEmpleado) != 1) {
//         echo "<option value = ".$cont.">".$arrayEmpleado[2]." - ".$arrayEmpleado[1]."</option>";
//     }
    
// }
// echo "</select><br>";
// echo "<input type='submit' value='Aceptar' onclick='EmpleadoSelecto()'><br>";
// echo "<a href='../index.html'>Volver a Inicio</a><br>";

// fclose($archivo);
if(isset($_GET) && $_GET["value"] != null){
    while (!feof($archivo)) {
        $linea = fgets($archivo);
        $arrayEmpleado = explode("-",$linea);
        if (count($arrayEmpleado) != 1 && $cont == $_GET["value"]) {
            echo var_dump($arrayEmpleado);
        }
        $cont += 1;
    }
}
elseif (isset($_GET)) {
    while (!feof($archivo)) {
        $linea = fgets($archivo);
        $arrayEmpleado = explode("-",$linea);
        if (count($arrayEmpleado) != 1) {
            echo "<option value = ".$cont.">".$arrayEmpleado[2]." - ".$arrayEmpleado[1]."</option>";
        }
        $cont += 1;
    }
}

// elseif (isset($_POST)) {
    
// }
// else {
//     echo "Error al recuperar";
// }
?>
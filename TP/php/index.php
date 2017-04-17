<?php
require_once "Empleado.php";
require_once "Fabrica.php";
$empleado1 = new empleado("Juan","Gomez",1,"Masculino",14143,19000);
$empleado2 = new empleado("Marcos","Perez",2,"Masculino",5464362,23000);
/*echo $empleado1->ToString()."<BR>";
echo $empleado1->Hablar("Ingles");*/
$fabrica = new fabrica("Oreo");
/*$fabrica->AgregarEmpleado($empleado1);
echo "<BR>".$fabrica->ToString();
echo $fabrica->CalcularSueldos();
$fabrica->EliminarEmpleado($empleado1);
echo "<BR>".$fabrica->ToString();*/
//$fabrica->AgregarEmpleado($empleado1);
//$fabrica->AgregarEmpleado($empleado2);
//echo "<BR>".$fabrica->ToString();
$fabrica->GuardarFabrica();
echo "<BR>DESPUES DE GUARDAR<BR>".$fabrica->ToString();
?>
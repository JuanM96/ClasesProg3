<?php
require_once "Empleado.php";
require_once "Fabrica.php";
$empleado1 = new empleado("Juan","Gomez",39029433,"Masculino",234432,23000);
echo $empleado1->ToString()."<BR>";
echo $empleado1->Hablar("Ingles");
$fabrica = new fabrica("Oreo");
$fabrica->AgregarEmpleado($empleado1);
echo "<BR>".$fabrica->ToString();
echo $fabrica->CalcularSueldos();
$fabrica->EliminarEmpleado($empleado1);
echo "<BR>".$fabrica->ToString();
$fabrica->AgregarEmpleado($empleado1);
$fabrica->AgregarEmpleado($empleado1);
echo "<BR>".$fabrica->ToString();
?>
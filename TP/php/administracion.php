<?php
include_once("Empleado.php");
$carga = false;
if(strlen($_POST['nombre']) != 0 && strlen($_POST['apellido']) != 0 && strlen($_POST['dni']) != 0 && isset($_POST['sexo']) != 0 && strlen($_POST['legajo']) != 0 && strlen($_POST['sueldo']) /*&& $_FILES['foto']['name']*/ )
{

    $tiposValidos = array(IMAGETYPE_JPEG, IMAGETYPE_BMP, IMAGETYPE_PNG, IMAGETYPE_GIF);
    $file = $_POST['dni']."-".$_POST['apellido'].".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $pathUsados = scandir("../files");
    if(in_array(exif_imagetype($_FILES['file']['tmp_name']), $tiposValidos) && $_FILES['file']['size'] < 1024000 && !in_array($file, $pathUsados))
    {
        $empleado = new empleado($_POST['nombre'], $_POST['apellido'], $_POST['dni'], $_POST['sexo'], $_POST['legajo'], $_POST['sueldo']);
        $archivo = fopen("empleado.txt","a");
        move_uploaded_file($_FILES['file']['tmp_name'], "../files/".$file);
        $empleado->setPath("../files/".$file);
        if(fwrite($archivo, $empleado->toString()."\r\n") == FALSE)
        {
            echo "error al escribir el archivo";
        }
        else
        {
            $carga = true;
        }
        fclose($archivo);
    }
    else {
        echo "Error con la foto";
    }
}

if($carga)
{
    echo "<a href='mostrar.php'>Mostrar Empleados</a>";
}
else
{
    echo "<a href='../index.html'>Volver a Inicio</a>";
}

?>
<?php
include_once("Usuario.php");
$archivo = fopen("../saves/usuario.txt","r");
$contador = 0;
$borrar = $_GET['id'];
$arrayUsuarios = array();
$encontre = false;
while(!feof($archivo))
{
    $array = explode("-",fgets($archivo));

    if(count($array) != 1)
    {
        if ($contador != $borrar) {
            if (strlen($array[0])>1) {
                array_push($arrayUsuarios,new Usuario($array[2],$array[3],$array[0],$array[1]));
            }
        }
        else{
            $encontre=true;
        }
    }
    $contador++;
}
fclose($archivo);
if ($encontre == true) 
{
    $archivo = fopen("../saves/usuario.txt","w");
    var_dump(count($arrayUsuarios));

    for ($i=0; $i < count($arrayUsuarios); $i++) { 
        fwrite($archivo,$arrayUsuarios[$i]->ToString());
    }
    fclose($archivo);
    echo("<script>alert('Usuario Eliminado')</script>");
    echo("<script>window.location='Listado.php'</script>");
}
else {
    echo("<script>alert('ERROR Usuario inexistente')</script>");
    echo("<script>window.location='../index.html'</script>");
}

?>
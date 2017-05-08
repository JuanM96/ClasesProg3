<?php
$archivo = fopen("../saves/usuario.txt","r");
echo("<form action='Borrar.php' method='POST'>
<table border='1'>
<tr>
<td> Nombre </td>
<td> Edad </td>
<td> Email </td>
<td> Contraseña </td>
<td> Selección </td>
</tr>
");
$n=0;
while (!feof($archivo)) {
    $array = explode("-",fgets($archivo));
    if(count($array) != 1)
    {
        echo("<tr>");
        echo("<td> ".$array[2]." </td>");
        echo("<td> ".$array[3]." </td>");
        echo("<td> ".$array[0]." </td>");
        echo("<td> ".$array[1]." </td>");
        echo("<td>");
        echo("<input type='button' id='".$n."' value='Borrar'");
        echo("</td>");
        echo("</tr>");
    }
    $n++;
}
echo("</table>");
echo("</form>");
fclose($archivo);
?>

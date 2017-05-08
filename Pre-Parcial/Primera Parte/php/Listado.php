<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src = "../js/script.js"></script>
    <title>Document</title>
</head>
<body>
    <!--<form action='Borrar.php' method='POST'>-->
        <table width=530 border=2 cellpadding=0 cellspacing=0>
            <tr>
                <td> Nombre </td>
                <td> Edad </td>
                <td> Email </td>
                <td> Contraseña </td>
                <td> Selección </td>
            </tr>
            <?php
            $archivo = fopen("../saves/usuario.txt","r");
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
                    echo("<input type='button' id='".$n."' value='Borrar' onclick='Borrar(".$n.")'>");
                    //echo("<input type='checkbox' name='s".$n."' value='".$n."'>");
                    echo("</td>");
                    echo("</tr>");
                }
                $n++;
            }
            fclose($archivo);
            ?>
        </table>
    <!--</form>-->
        <!--<input type='submit'value='Eliminar'
    </form>-->
</body>
</html>


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
                <td> Numero </td>
                <td> Descripcion </td>
                <td> Pais </td>
                <td> Foto </td>
                <td> Selección </td>
            </tr>
            <?php
            include_once("AccesoDatos.php");
            $n=0;
            $obj = AccesoDatos::DameUnObjetoAcceso();
            $consulta = $obj->RetornarConsulta("SELECT * FROM conteiner");
            $consulta->execute();
            $array = $consulta->fetchAll();
            for ($i=0; $i < count($array); $i++) { 
                    echo("<tr>");
                    echo("<td> ".$array[$i][0]." </td>");
                    echo("<td> ".$array[$i][1]." </td>");
                    echo("<td> ".$array[$i][2]." </td>");
                    echo("<td> "."<img src="."../fotos/".$array[$i][3]." width='100' height='100'>"." </td>");
                    echo("<td>");
                    echo("<input type='button' id='".$array[$i][0]."' value='Borrar' onclick='Borrar(".$array[$i][0].")'>");
                    echo("</td>");
                    echo("</tr>");

            }
            ?>
        </table>
    <!--</form>-->
        <!--<input type='submit'value='Eliminar'
    </form>-->
</body>
</html>


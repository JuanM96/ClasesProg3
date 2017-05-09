<?php
include_once("Conteiner.php");
include_once("AccesoDatos.php");
$id = $_GET['id'];
$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
$consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM conteiner WHERE numero = :id");
$consulta->bindValue(':id', $id, PDO::PARAM_INT);
$flag = $consulta->execute();
if ($flag == true) {
    echo("<script>alert('Se Borro Correctamente')</script>");
    echo("<script>window.location='Listado.php'</script>");
}
else {
    echo("<script>alert('ERROR Reintente mas tarde')</script>");
    echo("<script>window.location='Listado.php'</script>");
}
?>
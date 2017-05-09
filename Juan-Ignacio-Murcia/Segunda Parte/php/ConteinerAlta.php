<?php
include_once("Conteiner.php");
if ($_POST['numero'] != null && $_POST['descripcion'] != null && $_POST['pais'] != null && $_FILES["archivo"] != null){
    $conteiner = new Conteiner($_POST['numero'],$_POST['descripcion'],$_POST['pais'],GuardarFoto($_FILES["archivo"]));
    $conteiner->GuardarEnTabla();
    echo("<script>alert('Se Guardo Correctamente')</script>");
    echo("<script>window.location='Listado.php'</script>");
}
function GuardarFoto($file)
{
    $destinoUp = "../fotos/".$_POST['numero']."-".$_POST['pais']."-".$file['name'];
    $backup = "../backup/".$_POST['numero']."-".$_POST['pais']."-".$file['name'];
    if(!file_exists($destinoUp))
    {
        move_uploaded_file($file["tmp_name"], $destinoUp);
    }
    else
    {
        copy($destinoUp,$backup);
        move_uploaded_file($file["tmp_name"], $destinoUp);
    }
    return $_POST['numero']."-".$_POST['pais']."-".$file['name'];
}
?>
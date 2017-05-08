<?php
include_once("Usuario.php");
if(strlen($_POST['nombre']) != 0 && strlen($_POST['edad']) != 0 && strlen($_POST['email']) != 0 && isset($_POST['password']) != 0)
{
    $usuario = new Usuario($_POST["nombre"],$_POST["edad"],$_POST["email"],$_POST["password"]);
    $usuario->GuardarEnTxt();
    echo("<script>alert('Se Registro Correctamente')</script>");
    echo("<script>window.location='../index.html'</script>");
}
else {
    echo("<script>alert('Error al registrarse vuelva a intentarlo nuevamente')</script>");
    echo("<script>window.location='../UsuarioCarga.html'</script>");
}
?>
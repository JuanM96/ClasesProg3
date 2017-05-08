<?php
if (strlen($_POST['email']) != 0 && isset($_POST['password']) != 0) {
    if (Verficar($_POST["email"],$_POST["password"]) == true) {
        header('Location: Listado.php');
    }
    else {
        echo("<script>alert('Su email o contraseña son incorrectos')</script>");
       // echo("<script>window.location='../index.html'</script>");
    }
}
else {
        echo("<script>alert('Error dejo campos vacios')</script>");
        echo("<script>window.location='../index.html'</script>");
}
function Verficar($email,$password){
    
    $ret = false;
    if (file_exists("../saves/usuario.txt")) {
        $archivo = fopen("../saves/usuario.txt","r");
        while(!feof($archivo))
        {
            $array = explode("-",fgets($archivo));

            if(count($array) != 1)
            {
                if ($array[0] == $email && $array[1] == $password) {
                    $ret = true;
                }
            }
            var_dump($array);
            echo("<br>");
        }
        fclose($archivo);

    }
    return $ret;
}
?>
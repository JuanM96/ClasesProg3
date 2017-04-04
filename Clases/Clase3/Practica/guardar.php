<?php
    var_dump($_REQUEST);
    var_dump($_POST)
    if($_POST['guardar'] == "guardar")
    {
        $nombre = $_POST['nombre'];
        $archivo = fopen("dato.txt","w");
        fwrite($archivo,$nombre);
        fclose($archivo);
    }
    elseif ($_POST['leer'] == "leer") 
    {
        $archivo = fopen("dato.txt","r");
        echo fread($archivo,filesize("dato.txt"));
        fclose($archivo);
    }
    


?>
<?php
/**
 * 
 */
class Usuario
{
    private $_nombre;
    private $_edad;
    private $_password;
    private $_email;
    
    function __construct($nombre,$edad,$email,$password)
    {
        $this->_nombre = $nombre;
        $this->_edad = $edad;
        $this->_email = $email;
        $this->_password = $password;
    }

    function GuardarEnTxt()
    {
        $archivo = fopen("../saves/usuario.txt",'a');
        fwrite($archivo,$this->ToString()."\n");
        fclose($archivo);
    }
    function ToString()
    {
        return $this->_email."-".$this->_password."-".$this->_nombre."-".$this->_edad;
    }
}

?>
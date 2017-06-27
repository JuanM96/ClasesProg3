<?php
/**
 * 
 */
include_once("AccesoDatos.php");
class Usuario
{
    public $mail;
    public $nombre;
    public $clave;
    function __construct($mail = NULL, $nombre = NULL, $clave = NULL)
    {
        if($mail != NULL && $nombre != NULL && $clave != NULL){
            $this->mail = $mail;
            $this->nombre = $nombre;
            $this->clave = $clave;
        }
    }
    public function Guardar(){
        $itsOk = false;
        $existeUsuario = Usuario::TraerUsuarioPorMail($this->mail);
        if ($existeUsuario == false) {
            $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
		    $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO `usuario`(`mail`, `nombre`, `clave`)VALUES (:mail,:nombre,:clave)");
		    $consulta->bindValue(':mail',$this->mail, PDO::PARAM_STR);
		    $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
		    $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
            $itsOk = $consulta->execute();
        }
        if ($itsOk) {
            $ret = "El Usuario Se Guardo Exitosamente";
        }
        else {
            $ret = "ERROR, Mail Ya Existente";
        }
        return $ret;
		
    }
    public static function TraerTodosUsuarios(){
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT `id`, `mail`, `nombre`, `clave` FROM usuario WHERE 1");
		$consulta->execute();			
		return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuario');
    }
    public static function TraerUsuarioPorMail($mail){
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT `id`, `mail`, `nombre`, `clave` FROM usuario WHERE mail = :mail");
        $consulta->bindValue(':mail',$mail, PDO::PARAM_STR);
		$consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
		$usuarioBuscado= $consulta->fetch();
		return $usuarioBuscado;
    }
    public function VerificarUsuario(){
        $objetoAccesoDatos = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta("SELECT * FROM usuario WHERE mail = :mail AND nombre = :nombre AND clave = :clave");
		$consulta->bindValue(':mail',$this->mail, PDO::PARAM_STR);
		$consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
		$consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
        $consulta->setFetchMode(PDO::FETCH_CLASS, "Usuario");
        if ($consulta->execute() && $ret['usuario'] = $consulta->fetch()) {
            $ret['resultado'] = "ok";
            
        }
        else {
            $ret['resultado'] = "no";
        }
        return $ret;
    }
    
}

?>
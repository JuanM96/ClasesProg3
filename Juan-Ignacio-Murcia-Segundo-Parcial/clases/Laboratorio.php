<?php
/**
 * 
 */
class Laboratorio
{
    public $nombre;
    function __construct($nombre = NULL)
    {
        if($nombre != NULL){
            $this->nombre = $nombre;
        }
    }
    public function Guardar(){
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO `laboratorio`(`nombre`)VALUES (:nombre)");
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        if($consulta->execute()){
            return "Se Guardo Exitosamente";
        }
        else{
            return "ERROR";
        }
    }
    public static function TraerLabPorId($id){
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT `nombre` FROM laboratorio WHERE id = :id");
        $consulta->bindValue(':id',$id, PDO::PARAM_STR);
		$consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_CLASS, 'Laboratorio');
		$labBuscado= $consulta->fetch();
		return $labBuscado;
    }
    public static function TraerTodosLosLaboratorios(){
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT `id`,`nombre` FROM laboratorio WHERE 1");
		$consulta->execute();			
		$laboratorios = $consulta->fetchAll(PDO::FETCH_CLASS, 'Laboratorio');
        if (count($laboratorios) == 0) {
            return "No Hay Laboratorios";
        }
        else {
            return $laboratorios;
        }
    }
}

?>
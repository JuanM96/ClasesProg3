<?php
/**
 * 
 */
include_once("AccesoDatos.php");
class Bicicleta
{
    public $color;
    public $rodado;
    public $marca;
    function __construct($color = NULL, $rodado = NULL, $marca = NULL)
    {
        if($color != NULL && $rodado != NULL && $marca != NULL){
            $this->color = $color;
            $this->rodado = $rodado;
            $this->marca = $marca;
        }
    }
    public function Guardar(){
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO `bicicleta`(`color`, `rodado`, `marca`)VALUES (:color,:rodado,:marca)");
        $consulta->bindValue(':color',$this->color, PDO::PARAM_STR);
        $consulta->bindValue(':rodado', $this->rodado, PDO::PARAM_STR);
        $consulta->bindValue(':marca', $this->marca, PDO::PARAM_STR);
        $itsOk = $consulta->execute();
        if ($itsOk) {
            $ret = "La bicicleta Se Guardo Exitosamente";
        }
        else {
            $ret = "ERROR";
        }
        return $ret;
		
    }

    public static function Borrar($id){
        $ret = "ERROR,ID INEXISTENTE.";
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM `bicicleta` WHERE id = :id");
        $consulta->bindValue(':id',$id, PDO::PARAM_INT);		
		if($consulta->execute()){
            $ret = "Se Borro La Bicicleta Exitosamente.";
        }
        return $ret;
    }
    public static function TraerTodasBicicletas(){
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT `id`, `color`, `rodado`, `marca` FROM bicicleta WHERE 1");
		$consulta->execute();			
		$bicicletas = $consulta->fetchAll(PDO::FETCH_CLASS, 'bicicleta');
        if (count($bicicletas) == 0) {
            return "No Hay Bicicletas";
        }
        else {
            return $bicicletas;
        }
    }
    public static function TraerTodasBicicletasSegunColor($color){
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso();
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT `id`, `color`, `rodado`, `marca` FROM bicicleta WHERE color = :color");
        $consulta->bindValue(':color',$color, PDO::PARAM_STR);
		$consulta->execute();			
		$bicicletas = $consulta->fetchAll(PDO::FETCH_CLASS, 'bicicleta');
        if (count($bicicletas) == 0) {
            return "No Hay Bicicletas Con Ese Color";
        }
        else {
            return $bicicletas;
        }
    }
    public static function TraerBicicletaSegunId($id){
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT `id`, `color`, `rodado`, `marca` FROM bicicleta WHERE id = :id");
        $consulta->bindValue(':id',$id, PDO::PARAM_INT);
		$consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_CLASS, 'bicicleta');
		$bicicletaBuscado= $consulta->fetch();
        if ($bicicletaBuscado == false) {
            $bicicletaBuscado = "Su Bicicleta No Existe O Fue Borrada";
        }
		return $bicicletaBuscado;
    }
}
?>
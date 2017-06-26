<?php
class Venta
{
    public $idBicicleta;
    public $nombreCliente;
    public $fecha;
    public $precio;
    public $foto;
    function __construct($idBicicleta = NULL, $nombreCliente = NULL, $fecha = NULL,$precio = NULL,$foto = NULL)
    {
        if($idBicicleta != NULL && $nombreCliente != NULL && $fecha != NULL && $precio != NULL && $foto != NULL){
            $this->idBicicleta = $idBicicleta;
            $this->nombreCliente = $nombreCliente;
            $this->fecha = $fecha;
            $this->precio = $precio;
            $this->foto = $foto;
        }
    }
    public function Guardar(){
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO `venta`(`idBicicleta`, `nombreCliente`, `fecha`, `precio`, `foto`)VALUES (:idBicicleta,:nombreCliente,:fecha,:precio,:foto)");
        $consulta->bindValue(':idBicicleta',$this->idBicicleta, PDO::PARAM_INT);
        $consulta->bindValue(':nombreCliente', $this->nombreCliente, PDO::PARAM_STR);
        $consulta->bindValue(':fecha', $this->fecha, PDO::PARAM_STR);
        $consulta->bindValue(':precio', $this->precio, PDO::PARAM_STR);
        $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
        $itsOk = $consulta->execute();
        if ($itsOk) {
            $ret = "La Venta Se Guardo Exitosamente";
        }
        else {
            $ret = "ERROR";
        }
        return $ret;
    }
    public function ModificarPorId($idBicicleta){
        $ventaAModificar = Venta::TraerVentaSegunId($idBicicleta);
        $ret = "";
        if ($ventaAModificar == false) {
            $ret = "Su Venta No Existe";
        }
        else{
            $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE `venta` SET nombreCliente = :nombre, fecha = :fecha, precio =:precio, foto= :foto WHERE idBicicleta = :idBicicleta");
            $consulta->bindValue(':idBicicleta',$idBicicleta, PDO::PARAM_INT);
            $consulta->bindValue(':nombreCliente', $this->nombreCliente, PDO::PARAM_STR);
            $consulta->bindValue(':fecha', $this->fecha, PDO::PARAM_STR);
            $consulta->bindValue(':precio', $this->precio, PDO::PARAM_STR);
            $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
            $itsOk = $consulta->execute();
            if ($itsOk) {
                $ret = "La Venta Se Actualizo Exitosamente";
            }
            else {
                $ret = "ERROR";
            }
            
        }
        return $ret;
    }

    public static function TraerVentaSegunId($id){
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT `idBicicleta`, `nombreCliente`, `fecha`, `precio`, `foto` FROM venta WHERE idBicicleta = :id");
        $consulta->bindValue(':id',$id, PDO::PARAM_INT);
		$consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_CLASS, 'Venta');
		$VentaBuscada= $consulta->fetch();
		return $VentaBuscada;
    }
}
?>
<?php
class Venta
{
    public $idMedicamento;
    public $nombreCliente;
    public $foto;
    function __construct($idMedicamento = NULL, $nombreCliente = NULL, $foto = NULL)
    {
        if($idMedicamento != NULL && $nombreCliente != NULL && $foto != NULL){
            $this->idMedicamento = $idMedicamento;
            $this->nombreCliente = $nombreCliente;
            $this->foto = $foto;
        }
    }
    public function Guardar(){
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO `venta`(`idMedicamento`, `nombreCliente`, `foto`)VALUES (:idMedicamento,:nombreCliente,:foto)");
        $consulta->bindValue(':idMedicamento',5, PDO::PARAM_INT);
        $consulta->bindValue(':nombreCliente', $this->nombreCliente, PDO::PARAM_STR);
        $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
        if($consulta->execute()){
            return "Se Guardo Exitosamente";
        }
        else{
            return "ERROR";
        }
    }
    public function ModificarPorId($idMedicamento){
        $ventaAModificar = Venta::TraerVentaSegunId($idMedicamento);
        $ret = "";
        if ($ventaAModificar == false) {
            $ret = "Su Venta No Existe";
        }
        else{
            $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE `venta` SET nombreCliente = :nombre, foto= :foto WHERE idMedicamento = :idMedicamento");
            $consulta->bindValue(':idMedicamento',$idMedicamento, PDO::PARAM_INT);
            $consulta->bindValue(':nombreCliente', $this->nombreCliente, PDO::PARAM_STR);
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
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT `idMedicamento`, `nombreCliente`, `foto` FROM venta WHERE idMedicamento = :id");
        $consulta->bindValue(':id',$id, PDO::PARAM_INT);
		$consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_CLASS, 'Venta');
		$VentaBuscada= $consulta->fetch();
		return $VentaBuscada;
    }
}
?>
<?php
/**
 * 
 */
require_once 'Laboratorio.php';
class Medicamento
{
    public $lab;
    public $idLaboratorio;
    public $nombre;
    public $precio;

    function __construct($idLaboratorio = NULL, $nombre = NULL, $precio = NULL)
    {
        if($idLaboratorio != NULL && $nombre != NULL && $precio != NULL){
            $this->idLaboratorio = $idLaboratorio;
            $this->nombre = $nombre;
            $this->precio = $precio;
            if (Laboratorio::TraerLabPorId($idLaboratorio) != false) {
                 $itsLab = Laboratorio::TraerLabPorId($idLaboratorio);
                 $this->lab = $itsLab->nombre;
            }
            else{
                $this->lab = "No Lab";
            }
        }
    }
    public function Guardar(){
        if ($this->lab == "No Lab") {
            return "El Laboratorio No Existe";
        }
        else {
            $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO `medicamento`(`idLaboratorio`, `nombre`, `precio`) VALUES (:idLaboratorio,:nombre,:precio)");
            $consulta->bindValue(':idLaboratorio', $this->idLaboratorio, PDO::PARAM_STR);
            $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
            $consulta->bindValue(':precio', $this->precio, PDO::PARAM_STR);
            if($consulta->execute()){
                return "Se Guardo Exitosamente";
            }
            else{
                return "ERROR";
            }
        }

    }
    public static function TraerTodosLosMedicamentos(){
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT `id`, `idLaboratorio`, `nombre`, `precio` FROM medicamento WHERE 1");
		$consulta->execute();			
		$medicamentos = $consulta->fetchAll(PDO::FETCH_CLASS, 'Medicamento');
        if (count($medicamentos) == 0) {
            return "No Hay medicamentos";
        }
        else {
            return $medicamentos;
        }
    }
    public static function TraerTodosLosMedicamentosSegunLab($idLaboratorio){
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso();
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT `id`, `idLaboratorio`, `nombre`, `precio` FROM medicamento WHERE idLaboratorio = :idLab");
        $consulta->bindValue(':idLab',$idLaboratorio, PDO::PARAM_STR);
		$consulta->execute();			
		$medicamentos = $consulta->fetchAll(PDO::FETCH_CLASS, 'Medicamento');
        if (count($medicamentos) == 0) {
            return "No Hay medicamentos de ese laboratorio";
        }
        else {
            return $medicamentos;
        }
    }
    public static function TraerMedicamentoSegunId($id){
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso();
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT `id`, `idLaboratorio`, `nombre`, `precio` FROM medicamento WHERE id = :id");
        $consulta->bindValue(':id',$id, PDO::PARAM_STR);
		$consulta->execute();			
        $consulta->setFetchMode(PDO::FETCH_CLASS, 'Medicamentos');
		$medicamentoBuscado = $consulta->fetch();
        if ($medicamentoBuscado == false) {
            return "No se encuentra el medicamento";
        }
        else {
            return $medicamentoBuscado;
        }
    }

    public static function Borrar($id){
        $ret = "ERROR,ID INEXISTENTE.";
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM `medicamento` WHERE id = :id");
        $consulta->bindValue(':id',$id, PDO::PARAM_INT);		
		if($consulta->execute()){
            $ret = "Se Borro el medicamento Exitosamente.";
        }
        return $ret;
    }
}

?>
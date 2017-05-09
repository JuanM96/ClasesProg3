<?php
include_once("AccesoDatos.php");
class Conteiner
{
    public $numero;
    public $descripcion;
    public $pais;
    public $foto;
    function __construct($numero,$descripcion,$pais,$foto)
    {
        $this->numero = $numero;
        $this->descripcion = $descripcion;
        $this->pais = $pais;
        $this->foto = $foto;
    }
    function GuardarEnTabla()
    {
        $objetoGuardarDatos = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objetoGuardarDatos->RetornarConsulta("INSERT INTO `Conteiner`(`numero`, `descripcion`, `pais`, `foto`) VALUES ('".$this->numero."', '".$this->descripcion."', '".$this->pais."', '".$this->foto."')");
        return $consulta->execute();
    }
    function ToString(){
        return $this->numero."-".$this->descripcion."-".$this->pais."-".$this->foto;
    }
    function ToArray(){
        return explode("-",$this->ToString());
    }

}

?>
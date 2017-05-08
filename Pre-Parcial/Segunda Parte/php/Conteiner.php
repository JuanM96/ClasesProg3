<?php
include_once("AccesoDatos.php");
class Conteiner
{
    public $numero;
    public $descripcion;
    public $pais;
    public $foto;

    
    function __construct($nom,$desc,$pais1,$foto1)
    {
        $this->nombre = $nom;
        $this->descripcion = $desc;
        $this->pais = $pais1;
        $this->foto = $foto1;
    }
    function GuardarEnTabla()
    {
        $objetoGuardarDatos = accesoDatos::DameUnObjetoAcceso();
        
        $consulta = $objetoGuardarDatos->RetornarConsulta("INSERT INTO container (numero, descripcion, pais, foto)"
                                                        ." VALUES(:numero, :descripcion, :pais, :path)");
        $consulta->bindValue(':numero', $this->numero, PDO::PARAM_INT);
        $consulta->bindValue(':descripcion', $this->descripcion, PDO::PARAM_STR);
        $consulta->bindvalue(':pais', $this->pais, PDO::PARAM_STR);
        $consulta->bindValue(':path', $this->foto, PDO::PARAM_STR);
        
        return $consulta->execute();
    }
}

?>
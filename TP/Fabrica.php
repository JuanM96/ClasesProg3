<?php
/**
 * 
 */
require_once "Empleado.php";
class Fabrica
{
    private $_empleados;
    private $_razonsocial;
    function __construct($razonSocial)
    {
        $this->_empleados=array();
        $this->_razonsocial = $razonSocial;
    }
    function AgregarEmpleado($persona)
    {
        array_push($this->_empleados,$persona);
        
    }
    function CalcularSueldos()
    {
        $ret = 0;
        foreach ($this->_empleados as $empleado) {
            $ret += $empleado -> getSueldo();
        }
        return $ret;
    }
    function EliminarEmpleado($persona)
    {
        unset($this->_empleados[array_search($persona,$this->_empleados)]);
    }
    private function EliminarEmpleadosRepetidos()
    {
        $aux = array_unique($this->_empleados,SORT_REGULAR);
        $this->_empleados = $aux;
    }

    function ToString()
    {
        $retorno = "Razon Social: ".$this->_razonsocial."<BR>";
        foreach ($this->_empleados as $empleado)
        {
            $retorno.=$empleado->ToString()."<BR>";
        }
        return $retorno;
    }
}

?>
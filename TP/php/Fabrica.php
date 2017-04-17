<?php
require_once "Empleado.php";
class Fabrica
{
    private $_empleados;
    private $_razonsocial;
    function __construct($razonSocial)
    {
        $this->_empleados= $this->LeerFabrica();
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
        $ret = "-".$this->_razonsocial."<BR>";
        foreach ($this->_empleados as $empleado)
        {
            $ret.=$empleado->ToString()."<BR>";
        }
        return $ret;
    }

    function GuardarFabrica()
    {
        $archivo = fopen("../backup/fabrica.txt",'wa+');
        foreach ($this->_empleados as $empleado)
        {
            fwrite($archivo,$empleado->ToString());
        }
        fclose($archivo);
    }
    function LeerFabrica()
    {
        $ret = array();
        if(file_exists("empleado.txt"))
        {
            
            $archivo = fopen("empleado.txt","r");
            while(!feof($archivo))
            {
                $array = explode("-",fgets($archivo));
                //$this->AgregarEmpleado(new Empleado($array[0],$array[1],$array[2],$array[3],$array[4],$array[5]));
                if(count($array) != 1)
                {
                    array_push($ret,new Empleado($array[0],$array[1],$array[2],$array[3],$array[4],$array[5]));
                }
                
            }
            fclose($archivo);
            
        }
        return $ret;
    }
}

?>
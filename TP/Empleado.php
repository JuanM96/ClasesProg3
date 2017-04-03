<?php
/**
 * 
 */
 include_once "Persona.php";
class Empleado extends Persona
{
    protected $_legajo;
    protected $_sueldo;
    function __construct($nombre,$apellido,$dni,$sexo,$legajo,$sueldo)
    {
        parent::__construct($nombre,$apellido,$dni,$sexo);
        $this->_legajo = $legajo;
        $this->_sueldo = $sueldo;
    }
    function getLegajo()
    {
        return $this->_legajo;
    }
    function getSueldo()
    {
        return $this->_sueldo;
    }
    function Hablar($idioma)
    {
        return "El empleado habla".$idioma;
    }
    function ToString()
    {
        return parent::ToString()."-".$this->getLegajo()."-".$this->getSueldo();
    }
}

?>
<?php
include_once("FiguraGeometrica.php");
/**
 * 
 */
class Rectangulo extends FiguraGeomotrica
{
    private $_ladoUno; //altura
    private $_ladoDos; //largo
    function __construct($l1,$l2)
    {
        parent::__construct();
        $this->_ladoUno = $l1;
        $this->_ladoDos = $l2;
        $this->CalcularDatos();
        //$_ladoUno = $l1;
        //$_ladoDos = $l2;
    }
    protected function CalcularDatos()
    {
        /*parent::*/$this->_perimetro = $this->_ladoUno * 2 + $this->_ladoDos * 2;
        /*parent::*/$this->_superficie = $this->_ladoUno * $this->_ladoDos;
    }
    public function Dibujar()
    {
        for ($i=0; $i < $this->_ladoUno; $i++) 
        { 
            for ($j=0; $j < $this->_ladoDos; $j++) 
            { 
                echo "*";
            }
            echo "<br>";
        }
    }
    public function ToString()
    {
        return "Rectangulo<br>".parent::ToString()."<br>Lado1: ".$this->_ladoUno."<br>Lado2: ".$this->_ladoDos."<br>Perimetro: ".$this->_perimetro."<br>Superficie: ".$this->_superficie."<br>";
    }

}

?>
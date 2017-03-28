<?php
/**
 * 
 */
class Triangulo extends FiguraGeomotrica
{
    private $_altura;
    private $_base;
    function __construct($b,$h)
    {
        parent::__construct();
        $this->_altura=$h;
        $this->_base=$b;
        $this->CalcularDatos();
    }
    protected function CalcularDatos()
    {
        /*parent::*/$this->_perimetro = sqrt(pow(($this->_base/2),2) + pow($this->_altura,2))*2 + $this->_base;
        /*parent::*/$this->_superficie = $this->_altura*$this->_base/2;
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
        return "Triangulo<br>".parent::ToString()."<br>Altura: ".$this->_altura."<br>Base: ".$this->_base."<br>Perimetro: ".$this->_perimetro."<br>Superficie: ".$this->_superficie."<br>";
    }
}

?>
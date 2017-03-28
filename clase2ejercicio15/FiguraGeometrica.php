<?php
/**
 * 
 */
abstract class FiguraGeomotrica
{
    //atributos
    protected $_color;
    protected $_perimetro;
    protected $_superficie;
    public function __construct()
    {
        $this->SetColor("Rojo");
    }
    protected abstract function CalcularDatos();
    public abstract function Dibujar();
    public function GetColor()
    {
        return $this->_color;
    }
    public function SetColor($color)
    {
        $this->_color = $color;
    }
    public function ToString()
    {
        return "Color: " . $this->GetColor()/*."<br>Perimetro: ".$this->_perimetro."<br>Superficie: ".$this->_superficie."<br>"*/;
    }
}

?>
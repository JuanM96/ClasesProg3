<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require_once 'Bicicleta.php';
require_once './vendor/autoload.php';
class BicicletaApi
{

    public function cargarBicicleta($request, $response, $args){
        $color = $request->getHeader('color');
        $rodado = $request->getHeader('rodado');
        $marca = $request->getHeader('marca');
        $bicicleta = new Bicicleta($color[0], $rodado[0], $marca[0]);
        
        return $response->getBody()->write($bicicleta->Guardar());
    }
    public function traerBicicletas($request, $response, $args){
        return $response->withJson(Bicicleta::TraerTodasBicicletas());
    }
    public function traerBicicletasSegunColor($request, $response, $args){
        $color = $request->getHeader('color');
        return $response->withJson(Bicicleta::TraerTodasBicicletasSegunColor($color[0]));
    }
    public function traerBicicletaSegunId($request, $response, $args){
        $id = $request->getHeader('id');
        return $response->withJson(Bicicleta::TraerBicicletaSegunId($id[0]));
    }
    public function borrarBicicletaPorId($request, $response, $args){
        $id = $request->getHeader('id');
        return $response->getBody()->write(Bicicleta::Borrar($id[0]));
    }
}
?>
<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require_once 'Laboratorio.php';
require_once './vendor/autoload.php';
class LaboratorioApi
{

    public function cargarLaboratorio($request, $response, $args){
        $nombre = $request->getHeader('nombre');
        $laboratorio = new Laboratorio($nombre[0]);
        
        return $response->getBody()->write($laboratorio->Guardar());
    }
    public function traerLaboratorio($request, $response, $args){
        return $response->withJson(Laboratorio::TraerTodosLosLaboratorios());
    }
}
<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require_once 'Medicamento.php';
require_once './vendor/autoload.php';
class MedicamentoApi
{

    public function cargarMedicamento($request, $response, $args){
        $idLab = $request->getHeader('idLab');
        $nombre = $request->getHeader('nombre');
        $precio = $request->getHeader('precio');
        $medicamento = new Medicamento($idLab[0], $nombre[0], $precio[0]);
        
        return $response->getBody()->write($medicamento->Guardar());
    }
    public function traerMedicamentos($request, $response, $args){
        return $response->withJson(Medicamento::TraerTodosLosMedicamentos());
    }
    public function traerMedicamentosSegunidLab($request, $response, $args){
        $idLab = $request->getHeader('idLab');
        return $response->withJson(Medicamento::TraerTodosLosMedicamentosSegunLab($idLab[0]));
    }
    public function traerMedicamentoSegunId($request, $response, $args){
        $id = $request->getHeader('id');
        return $response->withJson(Medicamento::TraerMedicamentoSegunId($id[0]));
    }
    public function borrarMedicamentoPorId($request, $response, $args){
        $id = $request->getHeader('id');
        return $response->getBody()->write(Medicamento::Borrar($id[0]));
    }
}
?>
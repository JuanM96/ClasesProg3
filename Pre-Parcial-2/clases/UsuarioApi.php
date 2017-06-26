<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require_once 'Usuario.php';
require_once './vendor/autoload.php';
class UsuarioApi extends Usuario
{

    public function cargarUsuario($request, $response, $args){
        $mail = $request->getHeader('mail');
        $nombre = $request->getHeader('nombre');
        $clave = $request->getHeader('clave');
        $usuario = new Usuario($mail[0], $nombre[0], $clave[0]);
        
        return $response->getBody()->write($usuario->Guardar());
    }

    public function verificarUsuario($request, $response, $args){
        $mail = $request->getHeader('mail');
        $nombre = $request->getHeader('nombre');
        $clave = $request->getHeader('clave');
        $usuario = new Usuario($mail[0], $nombre[0], $clave[0]);
        return $response->withJson($usuario->VerificarUsuario());
    }
    public function traerUsuarios($request, $response, $args){
        return $response->withJson(Usuario::TraerTodosUsuarios());
    }
}
?>
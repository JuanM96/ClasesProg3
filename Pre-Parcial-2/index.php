<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'clases/AccesoDatos.php';
require 'clases/UsuarioApi.php';
require 'clases/BicicletaApi.php';
require 'clases/VentaApi.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);

/*LLAMADA A METODOS DE INSTANCIA DE UNA CLASE*/
  
$app->group('/usuario', function () {

  $this->post('/guardar', \UsuarioApi::class . ':cargarUsuario');
  $this->post('/verificar', \UsuarioApi::class . ':verificarUsuario');
  $this->post('/traer', \UsuarioApi::class . ':traerUsuarios');
  
});

$app->group('/bicicleta', function () {

  $this->post('/guardar', \BicicletaApi::class . ':cargarBicicleta');
  $this->get('/traer', \BicicletaApi::class . ':traerBicicletas');
  $this->get('/traerPorColor', \BicicletaApi::class . ':traerBicicletasSegunColor');
  $this->get('/traerPorId', \BicicletaApi::class . ':traerBicicletaSegunId');
  $this->delete('/borrarPorId', \BicicletaApi::class . ':borrarBicicletaPorId');
});

$app->group('/venta', function () {

  $this->post('/guardar', \VentaApi::class . ':cargarVenta');
  $this->put('/modificar', \VentaApi::class . ':modificarVenta');
  
});
// $app->group('/cd', function () {
 
//   $this->get('/', \cdApi::class . ':traerTodos');
 
//   $this->get('/{id}', \cdApi::class . ':traerUno');

//   $this->post('/', \cdApi::class . ':CargarUno');

//   $this->delete('/', \cdApi::class . ':BorrarUno');

//   $this->put('/', \cdApi::class . ':ModificarUno');
  
// });

$app->run();






// use \Psr\Http\Message\ServerRequestInterface as Request;
// use \Psr\Http\Message\ResponseInterface as Response;

// require 'vendor/autoload.php';

// $app = new \Slim\App;
// $app->get('/hello/{name}', function (Request $request, Response $response) {
//     $name = $request->getAttribute('name');
//     $response->getBody()->write("Hello, $name");

//     return $response;
// });
// $app->get('/', function (Request $request, Response $response) {
    
//     $response->getBody()->write("Hola Mundo slim GET");

//     return $response;
// });
// $app->post('/', function (Request $request, Response $response) {
    
//     $response->getBody()->write("Hola Mundo slim POST");

//     return $response;
// });$app->get('/cds', function (Request $request, Response $response) {
//     $cd = cd::TraerTodoLosCds();
//     //$response->getBody()->write(json_encode($cd));
//     $response = $response->withjson($cd);
//     return $response;
// });
// $app->post('/cds', function (Request $request, Response $response) {
//     $array = $request->getQueryParams();
//     //$cd = new cd($array['titulo'],$array['cantante'],$array['año']);
//     $cd = new cd();
//     $cd->titulo = $array['titulo'];
//     $cd->titulo = $array['cantante'];
//     $cd->titulo = $array['año'];
//     $cd->InsertarElCd();
//     //$response->getBody()->write("Hola Mundo slim POST");
//     return $response;
// });
// $app->run();
?>
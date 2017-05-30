<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'clases/AccesoDatos.php';
require 'clases/cd.php';

$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});
$app->get('/', function (Request $request, Response $response) {
    
    $response->getBody()->write("Hola Mundo slim GET");

    return $response;
});
$app->post('/', function (Request $request, Response $response) {
    
    $response->getBody()->write("Hola Mundo slim POST");

    return $response;
});$app->get('/cds', function (Request $request, Response $response) {
    $cd = cd::TraerTodoLosCds();
    //$response->getBody()->write(json_encode($cd));
    $response = $response->withjson($cd);
    return $response;
});
$app->post('/cds', function (Request $request, Response $response) {
    $array = $request->getQueryParams();
    //$cd = new cd($array['titulo'],$array['cantante'],$array['año']);
    $cd = new cd();
    $cd->titulo = $array['titulo'];
    $cd->titulo = $array['cantante'];
    $cd->titulo = $array['año'];
    $cd->InsertarElCd();
    //$response->getBody()->write("Hola Mundo slim POST");
    return $response;
});
$app->run();
?>
<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../clases/AccesoDatos.php';

$app = new \Slim\App;
$app->post('/guardarempleado', function (Request $request, Response $response) {
    
    // $files = $request->getUploadedFiles();
    // // $targetPath = "../img/".$files['archivo']->getClientFilename();
    // // //$response->getBody()->write(var_dump($files));
    // // $files['archivo']->moveTo($targetPath);
    // $tipoArchivo = $files->getMediaType();
    // return $response->getBody()->write($tipoArchivo);
});
$app->run();



?>
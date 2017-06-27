<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'clases/AccesoDatos.php';
require 'clases/UsuarioApi.php';
require 'clases/MedicamentoApi.php';
require 'clases/VentaApi.php';
require 'clases/LaboratorioApi.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);

/*LLAMADA A METODOS DE INSTANCIA DE UNA CLASE*/
  
$app->group('/usuario', function () {

  $this->post('/guardar', \UsuarioApi::class . ':cargarUsuario');
  $this->post('/verificar', \UsuarioApi::class . ':verificarUsuario');
  $this->post('/traer', \UsuarioApi::class . ':traerUsuarios');
  
});

$app->group('/medicamento', function () {

  $this->post('/guardar', \MedicamentoApi::class . ':cargarMedicamento');
  $this->get('/traer', \MedicamentoApi::class . ':traerMedicamentos');
  $this->get('/traerSegunLab', \MedicamentoApi::class . ':traerMedicamentosSegunidLab');
  $this->get('/traerPorId', \MedicamentoApi::class . ':traerMedicamentoSegunId');
  $this->delete('/borrarPorId', \MedicamentoApi::class . ':borrarMedicamentoPorId');
});
$app->group('/laboratorio', function () {

  $this->post('/guardar', \LaboratorioApi::class . ':cargarLaboratorio');
  $this->get('/traer', \LaboratorioApi::class . ':traerLaboratorio');
  
});

$app->group('/venta', function () {

  $this->post('/guardar', \VentaApi::class . ':cargarVenta');
  $this->put('/modificar', \VentaApi::class . ':modificarVenta');
  
});

$app->run();
?>
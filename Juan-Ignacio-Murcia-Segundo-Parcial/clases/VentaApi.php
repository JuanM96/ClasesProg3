<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
    require_once 'Venta.php';
    require_once './vendor/autoload.php';
    class VentaApi
    {
        public function cargarVenta($request, $response, $args){
            $venta = $this->juntarDatos($request, $response, $args);
            if (is_string($venta)) {
                return $venta;
            }
            else {
                return $response->getBody()->write($venta->Guardar());
            }
        }

        public function modificarVenta($request, $response, $args){
            $venta = $this->juntarDatos($request, $response, $args);
            if (is_string($venta)) {
                return $venta;
            }
            else {
                return $response->getBody()->write($venta->ModificarPorId($this->idMedicamento));
            }
        }

        private function juntarDatos($request, $response, $args){
            $idMedicamento = $request->getHeader('idMedicamento');
            $nombreCliente = $request->getHeader('nombreCliente');
            $files = $request->getUploadedFiles();
            $pathNueva = "./fotos/ventas/";
            $pathBackup = "./fotos/backup/";
            $tiposPermitidos = ['jpg','jpeg','png'];
            $type = explode(".",$files['archivo']->getClientFilename());
            $type = end($type);
            $foto = $idMedicamento . " - " . $nombreCliente . "." . $type;
            if (in_array($type,$tiposPermitidos)) {
                $fotosExistentes = scandir($pathNueva);
                $targetPath = $pathNueva . $foto;
                if (!in_array($foto,$fotosExistentes)) {
                    $files['archivo']->moveTo($targetPath);
                }
                else {
                    copy($targetPath,$pathBackup);
                    $files['archivo']->moveTo($targetPath);
                }
                return new Venta(2, 'juan', $foto);
            }
            else {
                return "foto no permitida";
            }
            
        }
    }
?>
    

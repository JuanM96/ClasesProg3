<?php
require_once "./vendor/autoload.php";
use Firebase\JWT\JWT;
/**
 * 
 */
class autentificadorJWT
{
    private static $claveSecreta = "clavesecreta";
    static function CrearToken($datos){
        $time = time();
        $payload = array(
            'iat' => $time,
            'exp' => $time + 60,
            'data' => $datos,
            'app' => "apirestjwt"
        );
        return JWT::encode($payload,self::$claveSecreta);
    }
    static function VerificarToken($token){
        $decodificado = JWT::decode($token,self::$claveSecreta);
    }
}

?>
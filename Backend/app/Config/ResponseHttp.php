<?php


class ResponseHttp
{

    function __construct()
    {
        
    }

    final public static function headerHttpDev($method):void
    {
       
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit();
        }

        // Definir los dominios permitidos
        $allowedOrigins = array(
            'http://localhost:5173',
            'http://dominio2.com'
        );

        // Verificar si el origen de la solicitud está en la lista de dominios permitidos
        if (in_array($_SERVER['HTTP_ORIGIN'], $allowedOrigins)) {
            // Permitir solicitudes desde el origen permitido
            header("Access-Control-Allow-Origin: " . $_SERVER['HTTP_ORIGIN']);
        } else {
            // Devolver un error si el origen no está permitido
            http_response_code(403);
            exit();
        }

        // Permitir los métodos GET, POST, OPTIONS
        header("Access-Control-Allow-Methods: GET,PUT,POST,PATCH,DELETE");
        // Permitir ciertos encabezados en las solicitudes
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    }
}

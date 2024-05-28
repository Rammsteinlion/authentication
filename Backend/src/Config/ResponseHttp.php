<?php

namespace App\Config;


class ResponseHttp
{

    public static $message = array(
        'status' => '',
        'message' => ''
    );


    final public static function status200($res)
    {
        http_response_code(200);
        self::$message['status'] = 'ok';
        self::$message['message'] = $res;
        return self::$message;
    }

    final public static function status201(string $res = 'Recurso Creado'): array
    {
        http_response_code(201);
        self::$message['status'] = 'ok';
        self::$message['message'] = $res;
        return self::$message;
    }

    final public static function status400(string $res = 'Solicitud enviada incompleta ó formato incorrecto'): array
    {
        http_response_code(400);
        self::$message['status'] = 'ok';
        self::$message['message'] = $res;
        return self::$message;
    }

    final public static function status401(string $res = 'No tiene privilegios para acceder al recurso'): array
    {
        http_response_code(401);
        self::$message['status'] = 'ok';
        self::$message['message'] = $res;
        return self::$message;
    }

    final public static function status404(string $res = 'Pareces que estas perdido por favor verificar la direccióin'): array
    {
        http_response_code(404);
        self::$message['status'] = 'ok';
        self::$message['message'] = $res;
        return self::$message;
    }

    final public static function status500(string $res = 'Error interno del servidor'): array
    {
        http_response_code(500);
        self::$message['status'] = 'ok';
        self::$message['message'] = $res;
        return self::$message;
    }


    final public static function headerHttpDev($method): void
    {
        // Detectar el origen de la solicitud
        $clientIP = $_SERVER['REMOTE_ADDR'];
        $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : null;

        // Dominios e IPs permitidos
        $allowedOrigins = array(
            'http://localhost:5173',
            'http://localhost:5174',
            'http://dominio2.com'
        );

        $allowedIPs = array(
            '127.0.0.1', 
            '::1', 
            '192.168.1.1', 
        );

        // Validar el origen permitido
        if (in_array($origin, $allowedOrigins) || in_array($clientIP, $allowedIPs)) {
            header("Access-Control-Allow-Origin: $origin");
        } else {
            header("HTTP/1.1 403 Forbidden");
            exit;
        }

        // Permitir todos los métodos y encabezados
        header("Access-Control-Allow-Methods: GET, PUT, POST, PATCH, DELETE,");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    }





    // final public static function headerHttpDev($method): void
    // {
    //     echo('HOLA');
    //     die();
    //     // Manejo de preflight (solicitudes OPTIONS)
    //     if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    //         http_response_code(200);
    //         header("Access-Control-Allow-Methods: GET, PUT, POST, PATCH, DELETE");
    //         header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    //         exit();
    //     }

    //     //dominios permitidos
    //     $allowedOrigins = array(
    //         'http://localhost:5173',
    //         'http://localhost:5174/',
    //         'http://dominio2.com',
    //     );

    //     $allowedIPs = array(
    //         '127.0.0.1',
    //         '::1',
    //         '192.168.1.1',
    //     );


    //     // Detectar el origen de la solicitud
    //     $clientIP = $_SERVER['REMOTE_ADDR'];
    //     $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : null;
    //     error_log("Request from Origin: " . $origin . " and IP: " . $clientIP);
    //     var_dump($clientIP, 'UNO');
    //     exit();
    //     error_log("Request from Origin: " . $origin);
    //     // Verificar si el origen de la solicitud está en la lista de dominios permitidos
    //     if ($origin && in_array($origin, $allowedOrigins)) {
    //         // Permitir solicitudes desde el origen permitido
    //         header("Access-Control-Allow-Origin: " . $origin);
    //     } else {
    //         // Devolver un error si el origen no está permitido
    //         http_response_code(403);
    //         echo json_encode(array(
    //             "error" => "Origin not allowed",
    //             "status" => http_response_code(403)
    //         ));
    //         exit();
    //     }

    //     // Permitir los métodos GET, POST, OPTIONS
    //     header("Access-Control-Allow-Methods: GET,PUT,POST,PATCH,DELETE");
    //     // Permitir ciertos encabezados en las solicitudes
    //     header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    // }
}

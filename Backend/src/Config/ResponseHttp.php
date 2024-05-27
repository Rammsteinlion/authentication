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
        echo('HOLA');
        die();
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit();
        }

        //dominios permitidos
        $allowedOrigins = array(
            'http://localhost:5173',
            'http://localhost:5174/',
            'http://dominio2.com',
        );

        // Detectar el origen de la solicitud
        $clientIP = $_SERVER['REMOTE_ADDR'];
        $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : null;
        var_dump($clientIP);
        exit();
        error_log("Request from Origin: " . $origin);
        // Verificar si el origen de la solicitud está en la lista de dominios permitidos
        if ($origin && in_array($origin, $allowedOrigins)) {
            // Permitir solicitudes desde el origen permitido
            header("Access-Control-Allow-Origin: " . $origin);
        } else {
            // Devolver un error si el origen no está permitido
            http_response_code(403);
            echo json_encode(array(
                "error" => "Origin not allowed",
                "status" => http_response_code(403)
            ));
            exit();
        }

        // Permitir los métodos GET, POST, OPTIONS
        header("Access-Control-Allow-Methods: GET,PUT,POST,PATCH,DELETE");
        // Permitir ciertos encabezados en las solicitudes
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    }
}

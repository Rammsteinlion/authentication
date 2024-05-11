<?php

namespace App\Config;


class ResponseHttp
{

    public static $message = array(
        'status' => '',
        'message' => ''
    );


    final public static function status200(string $res): array
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
}

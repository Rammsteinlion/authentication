<?php

namespace App\Config;

use Dotenv\Dotenv;
use Dotenv\Util\Str;
use Firebase\JWT\JWT;

class Security
{

    private static $jwt_data;

    final public static function secretKey(): string
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
        $dotenv->load();
        return $_ENV['SECRET_KEY'];
    }

    final public static function createPassowrd(string $pw): string
    {
        $pass = password_hash($pw, PASSWORD_DEFAULT);
        return $pass;
    }

    final public static function validatePassword(string $pw, string $pwh): bool
    {

        if (password_verify($pw, $pwh)) {
            return true;
        } else {
            error_log('La contraseña es incorrecta');
            return false;
        }
    }

    final public static function createTokenJwt(string $key, array $data): string
    {
        $payload = array(
            'iat' => time(),
            'exp' => time() + (10),
            'data' => $data,
        );

        $jwt = JWT::encode($payload, $key, 'HS256');
        return $jwt;
    }


    final public static function validateTokenJwt(string $token, string $key)
    {
         var_dump($key,'HOOLA');
        die();
        
        // if (!isset($token['Authorization'])) {
        //     die(json_encode(ResponseHttp::status400()));
        //     error_Log('Datos Incompletos');
        //     exit();
        // }


        // try {

        //     $jwt = explode(" ", $token['Authorization']);
        //     $data = JWT::decode($jwt[1], $key . array('HS256'));
        //     var_dump(self::$jwt_data, 'UNO');
        //     var_dump($data, 'DOS');
        //     die();
        //     self::$jwt_data = $data;
        //     return $data;
        // } catch (\Exception $e) {
        //     error_log('Token invalido o expiro');
        //     die(json_encode(ResponseHttp::status401('token invalido o expirado')));
        //     exit();
        // }
    }

    // final public static function validateTokenJwt(array $token, string $key)
    // {
    //     echo ('HOOLA');
    //     die();

    //     if (!isset($token['Authorization'])) {
    //         die(json_encode(ResponseHttp::status400()));
    //         error_Log('Datos Incompletos');
    //         exit();
    //     }


    //     try {

    //         $jwt = explode(" ", $token['Authorization']);
    //         $data = JWT::decode($jwt[1], $key . array('HS256'));
    //         var_dump(self::$jwt_data, 'UNO');
    //         var_dump($data, 'DOS');
    //         die();
    //         self::$jwt_data = $data;
    //         return $data;
    //     } catch (\Exception $e) {
    //         error_log('Token invalido o expiro');
    //         die(json_encode(ResponseHttp::status401('token invalido o expirado')));
    //         exit();
    //     }
    // }

    //retornar los datos del jwt en un json
    final public static function getDataJwt(): array
    {
        $jwt_decode_array = json_decode(json_decode(self::$jwt_data), true);
        return $jwt_decode_array['data'];
        exit;
    }
}

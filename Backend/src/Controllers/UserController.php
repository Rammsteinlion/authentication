<?php

namespace App\Controllers;

use App\Config\ResponseHttp;
use Dotenv\Validator as DotenvValidator;
use Rakit\Validation\Validator;

class UserController
{

    private static $valdiate_rol  = '/^[1,2,3]{1,1}$/';
    private static $valdiate_number  = '/^[0-9]+$/';
    private static $valdiate_text  = '/^[a-zA-Z]+$/';

    private static string $method;
    private static string $route;
    private static array $params;
    private static $data;
    private static $headers;

    public function __construct(
        string $method,
        string $route,
        array $params,
        $data,
        $headers
    ) {
        self::$method = $method;
        self::$route = $route;
        self::$params = $params;
        self::$data = $data;
        self::$headers = $headers;
    }


    final public static function post(string $endPoint): void
    {

        if (self::$method == 'post' && $endPoint == self::$route) {
            
       
            $validator = new Validator;

            $validation = $validator->validate(self::$data, [
                'name' => 'required|regex:/^[a-zA-Z ]+$/',
                'username' => 'required|regex:/^[^\s]+$/',
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);

            if($validation->fails()){
                echo json_encode(ResponseHttp::status400('Error en los campos'));
            }else{
            }
        }
    }
}

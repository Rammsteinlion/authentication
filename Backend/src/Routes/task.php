<?php

use App\Config\ResponseHttp;
use App\Config\Security;
use App\Controllers\TaskController;

// Obtener todos los encabezados
$headers = getallheaders();

// Verificar si el token está presente en los encabezados
if (!isset($headers['Authorization']) || $headers['Authorization'] == null) {
    // El token no está presente en los encabezados
    echo(json_encode(ResponseHttp::status401(401, 'Unauthorized', 'Token missing')));
    exit();
}


// Extraer el token de los encabezados
$token = $headers['Authorization'];
Security::validateTokenJwt($token,Security::secretKey());
// Security::validateTokenJwt($token,Security::secretKey());

die();
// // Validar el token (aquí debes implementar tu lógica de validación)
// if ($token !== 'el_token_correcto') {
//     // El token no es válido
//     ResponseHttp::status400(401, 'Unauthorized', 'Invalid token');
//     exit();
// }


$method = strtolower($_SERVER['REQUEST_METHOD']);
$route = isset($_GET['route']) ? $_GET['route'] : null;
$params = explode('/', $route);
$input = file_get_contents('php://input');
$data = json_decode($input, true);
$headers = getallheaders();


// Validar la entrada
if (json_last_error() !== JSON_ERROR_NONE) {
    echo 'Error en la petición';
    die();
}

$task = new TaskController($method,$route,$params,$data,$headers);

var_dump($data);
die();
$task->taskSave('task/',$data)


?>
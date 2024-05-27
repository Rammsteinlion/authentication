<?php

use App\Config\ResponseHttp;
use App\Controllers\TaskController;

$method = strtolower($_SERVER['REQUEST_METHOD']);
$route = isset($_GET['route']) ? $_GET['route'] : null;
$params = explode('/', $route);
$input = file_get_contents('php://input');
$data = json_decode($input, true);
$headers = getallheaders();


// Validar la entrada
if (json_last_error() !== JSON_ERROR_NONE) {
    echo 'Error en el JSON recibido';
    die();
}


$task = new TaskController($method,$route,$params,$data,$headers);

$task->taskSave('task/',$data)


?>
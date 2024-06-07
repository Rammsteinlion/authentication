<?php

use App\Config\ErrorLog;
use App\Config\ResponseHttp;
use App\Config\Router;
use App\Controllers\TaskController;

require dirname(__DIR__) . '/vendor/autoload.php';

ResponseHttp::headerHttpDev($_SERVER['REQUEST_METHOD']);
ErrorLog::activateErrorLog();

// Agregar rutas de forma estática
Router::add('auth', function() {
    require dirname(__DIR__) . '/src/Routes/auth.php';
});

Router::add('user', function() {
    require dirname(__DIR__) . '/src/Routes/user.php';
});

Router::add('task', function() {
    require dirname(__DIR__) . '/src/Routes/task.php';
});

$method = strtolower($_SERVER['REQUEST_METHOD']);
$route = isset($_GET['route']) ? $_GET['route'] : null;
$params = explode('/', $route);
$input = file_get_contents('php://input');
$data = json_decode($input, true);
$headers = getallheaders();

// Router::add('task/save', function() use ($method, $route, $params, $data, $headers) {
//     $taskController = new TaskController($method, $route, $params, $data, $headers);
//     $taskController->taskSave();
// });

Router::add('task/deleteTask/', function() use ($method, $route, $params, $data, $headers) {
    $taskController = new TaskController($method, $route, $params, $data, $headers);
    $taskController->deleteTask('task/deleteTask/');
});

// Ejecutar el router de forma estática
Router::run();

?>

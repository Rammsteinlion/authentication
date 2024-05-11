<?php

use App\Config\ResponseHttp;
use App\Controllers\UserController;

$method = strtolower($_SERVER['REQUEST_METHOD']);
$route = isset($_GET['route']) ? $_GET['route'] : null;
$params = explode('/', $route);
$data = json_decode(file_get_contents("php://input"), true);
$headers = getallheaders();



$app = new UserController($method,$route,$params,$data,$headers);

$app->post('user/');

// echo json_encode(ResponseHttp::status404());

?>
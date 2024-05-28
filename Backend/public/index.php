<?php

use App\Config\ErrorLog;
use App\Config\ResponseHttp;


require dirname(__DIR__) . '/vendor/autoload.php';

ResponseHttp::headerHttpDev($_SERVER['REQUEST_METHOD']);
ErrorLog::activateErrorLog();


if (isset($_GET['route'])) {
    $url = explode('/', $_GET['route']);
    $list = ['auth', 'user','task'];
    $file = dirname(__DIR__) . '/src/Routes/' . $url[0] . '.php';

    if (!in_array($url[0],$list)) {
        echo (json_encode(ResponseHttp::status400()));
        error_log('No existe la ruta');
        exit;
    }

    if (is_readable($file)) {
        require $file;
        exit;
    } else {
        echo (json_encode(ResponseHttp::status400()));
        exit;
    }

} else {
    echo (json_encode(ResponseHttp::status404()));
    exit;
}



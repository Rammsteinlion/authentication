<?php

use App\Config\ResponseHttp;

require 'vendor/autoload.php';

ResponseHttp::headerHttpDev($_SERVER['REQUEST_METHOD']);

require_once 'app/app.php';
$app = new App();

?>

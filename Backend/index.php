<?php

require 'vendor/autoload.php';

require_once 'app/database.php';
require_once 'app/controller.php';
require_once 'app/model.php';
require_once 'app/app.php';
require_once 'app/Config/ResponseHttp.php';
require_once  'app/Config/configDB.php';

ResponseHttp::headerHttpDev($_SERVER['REQUEST_METHOD']);

$app = new App();


?>
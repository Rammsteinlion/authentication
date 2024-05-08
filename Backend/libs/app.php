<?php

require_once 'controllers/errors.php';


class APP{

    function __construct()
    {

        $url = isset($_GET['url']) ? $_GET['url']: null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $archivoController = 'controllers/' . $url[0] . '.php';

        if(file_exists($archivoController)){
            require_once $archivoController;

            //Inicializar controller
            $controller = new $url[0];
            $controller->loadModel($url[0]);

            if(isset($url[1])){
                $controller->{$url[1]}();
            }else{
                echo('ERROR');
            }
        }else{
        $error = new Errors();
        //$error->errorFuntion();
        }

    }

}


?>
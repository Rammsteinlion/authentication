<?php

/**
 * Clases padre 
 */

 
class Controller{

    function __construct()
    {
        echo "<p>Controller BASE</p>";
    }

    function loadModel($model){
        $url = 'models/'.$model.'model.php';

        if(file_exists($url)){
            require_once $url;

            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }
    
}

?>
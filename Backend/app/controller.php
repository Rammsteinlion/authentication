<?php

namespace App;

class Controller{


    function __construct()
    {
        
    }

    function loadModel($model):void{
        $url = 'models/'.$model.'model.php';

        if(file_exists($url)){
            require $url;

            $modelName = $model.'Model';
            $this->$model = new $modelName();
        }
    }
}

?>
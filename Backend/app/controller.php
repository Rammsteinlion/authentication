<?php

class Controller{


    function __construct()
    {
        
    }

    public function loadModel($model):void{
        $url = 'models/'.$model.'model.php';

        if(file_exists($url)){
            require $url;

            $modelName = $model.'Model';
            $this->$model = new $modelName();
        }
    }
}

?>
<?php

use App\Controller;

class Main extends Controller{

    function  __construct()
    {
        parent::__construct();
    }

    public function render() {
        $response = [
            'data' => false,
        ];
    
        // Establecer el encabezado de respuesta para indicar JSON
        header('Content-Type: application/json');
    
        // Devolver la respuesta codificada en JSON
        echo json_encode($response);
    }
}


?>
<?php

class Errors extends Controller {

    function __construct()
    {
        parent::__construct();
        echo "<p>ERROR AL CARGAR RECURSO</p>";
    }

    
    // public static $message = array(
    //     'status' => '',
    //     'message' => ''
    // );

    //  public function errorFuntion() {
    //     self::$message['status'] = '404';
    //     self::$message['message'] = 'Controlador no encontrado';
    //     return self::$message;
    // }

}

?>

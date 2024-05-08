<?php

class Main extends Controller{

    function __construct()
    {
        parent::__construct();
        echo('<p>Nuevo Controlador main</p>');
    }

    function saludo(){
        echo "<p>EJECUTASTE EL METODO SALUDO</p>";
    }
}

?>
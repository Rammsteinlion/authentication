<?php

class User extends Controller
{

    function __construct()
    {
        parent::__construct();
    }


    /**
     * Realiza el proceso de inicio de sesión.
     *
     * @param stdClass $params Objeto que contiene los parámetros de inicio de sesión.
     * @return stdClass Objeto que contiene los datos del usuario y el token.
     */
    public function SigIn(): void
    {
        // Obtener los datos del cuerpo de la solicitud en formato JSON
        $params = json_decode(file_get_contents('php://input'), true);
        // Manejar los datos o realizar cualquier proceso necesario aquí
        var_dump($params);
    }
}

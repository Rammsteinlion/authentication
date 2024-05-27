<?php

namespace App\Controllers;

use App\Config\ResponseHttp;
use App\Config\Security;
use App\Models\TaskModel;

class TaskController
{

    private static string $method;
    private static string $route;
    private static array $params;
    private static $data;
    private static $headers;

    public function __construct(
        string $method,
        string $route,
        array $params,
        $data,
        $headers
    ) {
        self::$method = $method;
        self::$route = $route;
        self::$params = $params;
        self::$data = $data;
        self::$headers = $headers;
    }

    final public function taskSave(string $endPoint): void
    {

        if (self::$method == 'post' && $endPoint == self::$route) {

            foreach (self::$data as $element) {
                if (empty($element)) {
                    echo json_encode(ResponseHttp::status400('Todos los campos son necesarios'));
                    break; 
                }
            }
            new TaskModel(self::$data);
            echo json_encode(TaskModel::postSaveTask());
        }
    }
}

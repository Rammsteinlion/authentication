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
            foreach (self::$data as $key => $value) {
                if ($value === '' || $value === null) {
                    echo json_encode(ResponseHttp::status400('Todos los campos son necesarios'));
                    break;
                }
            };
            new TaskModel(self::$data);
            echo json_encode(TaskModel::postSaveTask());
        }
        exit;
    }

    final public function deleteTask(string $endPoint): void
    {
        try {
            
            if (self::$method == 'delete' && $endPoint == self::$route) {
                $taskId = self::$data['id'] ?? null;
                var_dump($taskId);
                if ($taskId === null) {
                    echo json_encode(ResponseHttp::status400('ID de la tarea es necesario'));
                    return;
                }
                
                TaskModel::setTaskId($taskId);
                echo json_encode(TaskModel::postDeleteTask());
            }
            exit;
        } catch (\PDOException $pdo) {
            echo json_encode(ResponseHttp::status400('Error'));
        }
    }

}

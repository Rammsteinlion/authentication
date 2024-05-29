<?php

namespace App\Models;

use App\DB\ConnectionDB;
use App\Config\ResponseHttp;

class TaskModel extends ConnectionDB
{
    private static int $task_id;
    private static int $user_id;
    private static string $category_id;
    private static string $description;
    private static string $status;
    private static string $created_at;
    private static string $updated_at;


    public function __construct(array $data)
    {
        self::$description = $data['description'];
    }

    public static function getTaskId(): int
    {
        return self::$task_id;
    }

    public static function setTaskId(int $task_id): void
    {
        self::$task_id = $task_id;
    }

    public static function getUserId(): int
    {
        return self::$user_id;
    }

    public static function setUserId(int $user_id): void
    {
        self::$user_id = $user_id;
    }

    public static function getCategoryId(): string
    {
        return self::$category_id;
    }

    public static function setCategoryId(string $category_id): void
    {
        self::$category_id = $category_id;
    }

    public static function getDescription(): string
    {
        return self::$description;
    }

    public static function setDescription(string $description): void
    {
        self::$description = $description;
    }

    public static function getStatus(): string
    {
        return self::$status;
    }

    public static function setStatus(string $status): void
    {
        self::$status = $status;
    }

    public static function getCreatedAt(): string
    {
        return self::$created_at;
    }

    public static function setCreatedAt(string $created_at): void
    {
        self::$created_at = $created_at;
    }

    public static function getUpdatedAt(): string
    {
        return self::$updated_at;
    }

    public static function setUpdatedAt(string $updated_at): void
    {
        self::$updated_at = $updated_at;
    }


    final public static function postSaveTask(): void
    {
        try {
           $con = self::getConnection();
           $query1 = "INSERT INTO task (user_id,category_id,description) VALUES";
           $query2 = "(:user_id,:category_id,:description)";
           $query = $con->prepare($query1 . $query2);
           $query->execute([
            "user_id"=> 'ELKIN',
            "category_id"=> 2,
            "description"=> 'esta es nueva',
           ]);

           if ($query->rowCount() > 0) {
            echo json_encode(ResponseHttp::status200("Tarea registrada con exito"));
        } else {
            echo json_encode(ResponseHttp::status500("Error al registrar tarea"));
        }
        } catch (\PDOException $pdo) {
           error_log("TaskModel::postSaveTask -> . $pdo");
           die(json_encode(ResponseHttp::status500()));
        }
    }
}

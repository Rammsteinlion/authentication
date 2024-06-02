<?php

namespace App\Models;

use App\DB\ConnectionDB;
use App\Config\ResponseHttp;

class TaskModel extends ConnectionDB
{
    private static string $category_id;
    private static string $description;
    private static string $state;
    private static string $priority;
    private static string $created_at;
    private static string $updated_at;


    public function __construct(array $data)
    {
        self::$category_id = $data['category_id'];
        self::$description = $data['description'];
        self::$state = $data['state'];
        self::$priority = $data['priority'];
        self::$created_at = date('Y-m-d H:i:s');
        self::$updated_at = date('Y-m-d H:i:s');
    }


    // Getter for category_id
    final public static function getCategoryID(): string {
        return self::$category_id;
    }

    // Setter for category_id
    final public static function setCategoryID(string $category_id): void {
        self::$category_id = $category_id;
    }

    // Getter for description
    final public static function getDescription(): string {
        return self::$description;
    }

    // Setter for description
    final public static function setDescription(string $description): void {
        self::$description = $description;
    }

    // Getter for state
    final public static function getState(): string {
        return self::$state;
    }

    // Setter for status
    final public static function setState(string $state): void {
        self::$state = $state;
    }

     // Getter for state
     final public static function getPriority(): string {
        return self::$priority;
    }

    // Setter for status
    final public static function sePriority(string $priority): void {
        self::$priority = $priority;
    }

    // Getter for created_at
    final public static function getCreatedAt(): string {
        return self::$created_at;
    }

    // Setter for created_at
    final public static function setCreatedAt(string $created_at): void {
        self::$created_at = $created_at;
    }

    // Getter for updated_at
    final public static function getUpdatedAt(): string {
        return self::$updated_at;
    }

    // Setter for updated_at
    final public static function setUpdatedAt(string $updated_at): void {
        self::$updated_at = $updated_at;
    }


    final public static function postSaveTask(): void
    {
        try {


            $con = self::getConnection();
            var_dump($con,'HOLA');
            die();
            $query1 = "INSERT INTO task (category_id,user_assigned,description,priority,state,created_at,expiration_date) VALUES";
            $query2 = "(:category_id,:user_assigned,:description,:priority,:state,:created_at,:expiration_date,)";
            $query = $con->prepare($query1 . $query2);
            $query->execute([
                "category_id" => 20,
                "user_assigned" => 1,
                "description" => self::getDescription(),
                "priority" => self::getState(),
                "state" => self::getState(),
                "created_at" =>  "2024-05-29 22:47:06",
                "expiration_date" => "2024-05-29",
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

<?php

namespace App\Models;

use App\DB\ConnectionDB;

class TaskModel extends ConnectionDB {
    private static int $task_id;
    private static string $category_id;
    private static string $description;
    private static string $status;


    public function __construct(array $data)
    {
        echo('DATA');
        print_r($data);
        exit();
        
    }

    // Getter para task_id
    final public static function getTaskId(): int {
        return self::$task_id;
    }

    // Setter para task_id
    final public static function setTaskId(int $task_id): void {
        self::$task_id = $task_id;
    }

    // Getter para category_id
    final public static function getCategoryId(): string {
        return self::$category_id;
    }

    // Setter para category_id
    final public static function setCategoryId(string $category_id): void {
        self::$category_id = $category_id;
    }

    // Getter para description
    final public static function getDescription(): string {
        return self::$description;
    }

    // Setter para description
    final public static function setDescription(string $description): void {
        self::$description = $description;
    }

    // Getter para status
    final public static function getStatus(): string {
        return self::$status;
    }

    // Setter para status
    final public static function setStatus(string $status): void {
        self::$status = $status;
    }


    final public static function postSaveTask():void
    {
    

    }

}



?>


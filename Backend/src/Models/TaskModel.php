<?php

namespace App\Models;

use App\DB\ConnectionDB;

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
        print_r(self::$data);
        die();
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
        echo('donde se guardara todo TaskSave');
    }
}

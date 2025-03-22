<?php

use Database\Connection;

abstract class Model
{
    protected static string $tableName;

    public static function find(int $id): ?Model
    {
        $connection = Connection::getInstance()->getConnection();
        $sql = "SELECT * FROM " . static::$tableName . " WHERE id = $id";
        $result = $connection->query($sql);
        $record = $result->fetch_assoc();
        if (!$record) {
            return null;
        }
        $model = new static();
        foreach ($record as $key => $value) {
            $model->$key = $value;
        }
        return $model;
    }

    public static function all(): array
    {
        $connection = Connection::getInstance()->getConnection();
        $sql = "SELECT * FROM " . static::$tableName;
        $result = $connection->query($sql);
        $models = [];
        while ($record = $result->fetch_assoc()) {
            $model = new static();
            foreach ($record as $key => $value) {
                $model->$key = $value;
            }
            $models[] = $model;
        }
        return $models;
    }

    public static function save(array $data): void
    {
        $connection = Connection::getInstance()->getConnection();
        $getKeys = array_keys($data);

        if(true){

        }
    }
}
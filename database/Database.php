<?php

declare(strict_types = 1);

namespace Database;

use Database\Connection;
use Exception;

class Database extends Connection
{
    
    public function __construct()
    {
        parent::__construct();

    }

    public function createTable(string $tableName, array $fields): void
    {
        $fieldsString = implode(", ", $fields);
        $sql = "CREATE TABLE IF NOT EXISTS $tableName ($fieldsString)";
        try {
            $this->connection->query($sql);
        } catch (Exception $exception) {
            die("Error creating table: " . $exception->getMessage());
        }
    }

    public function dropTable(string $tableName): void
    {
        $sql = "DROP TABLE IF EXISTS $tableName";
        try {
            $this->connection->query($sql);
        } catch (Exception $exception) {
            die("Error dropping table: " . $exception->getMessage());
        }
    }

    public function alterTable(string $tableName, string $action, string $field): void
    {
        $sql = "ALTER TABLE $tableName $action $field";
        try {
            $this->connection->query($sql);
        } catch (Exception $exception) {
            die("Error altering table: " . $exception->getMessage());
        }
    }


}
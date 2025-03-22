<?php

declare(strict_types = 1);

namespace Database;

use mysqli;
use Exception;

class Connection {

    public mysqli $connection;
    
    public string $host = "db";
    public string $user = "user";
    public string $password = "password";
    public string $database = "blog";
    public int $port = 3306;

    public static $instance;

    public function __construct()
    {
        try {
            $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database, $this->port);
        } catch (Exception $exception) {
            die("Connection failed: " . $exception->getMessage());
        }
    }

    public static function getInstance(): Connection
    {
        if(is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection(): mysqli
    {
        return $this->connection;
    }

}
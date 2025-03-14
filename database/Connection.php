<?php

namespace Database;

use mysqli;
use Exception;

class Connection {

    public mysqli $connection;

    public function __construct()
    {
        try {
            $this->connection = new mysqli("db", "user", "password", "blog", 3306);
        } catch (Exception $exception) {
            die("Connection failed: " . $e->getMessage());
        }
    }

}
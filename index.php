<?php

declare(strict_types = 1);

require __DIR__ . '/vendor/autoload.php';

use Database\Database;

$database = new Database();
$database->createTable("posts", [
    "id INT AUTO_INCREMENT PRIMARY KEY",
    "title VARCHAR(255) NOT NULL",
    "content TEXT NOT NULL",
    "created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP"
]);

$database->dropTable("posts");


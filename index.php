<?php
$mysqli = new mysqli("db", "user", "password", "blog", 3306);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

echo "Connected successfully to MySQL!";

<?php

$config = require 'config.php';
$dsn = 'mysql:' . http_build_query($config['database'], '', ';');

try {
    $pdo = new PDO($dsn, $username = 'root', $password = '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($pdo) {
        // echo "Database connection successful!";
    }
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
<?php
// db.php

$host = '127.0.0.1'; // or localhost
$dbname = 'online_examination';
$user = 'root'; // change to your database username
$pass = ''; // change to your database password
$charset = 'utf8mb4';

// Create a new connection to the MySQL database using MySQLi
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset
if (!$conn->set_charset($charset)) {
    printf("Error loading character set %s: %s\n", $charset, $conn->error);
    exit();
}

// Use $conn for further operations
?>

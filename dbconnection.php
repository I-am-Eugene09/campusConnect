<?php

$host = 'localhost';
$database = 'dbtrash';
$user = 'root';
$password = '';

try{
    $pdo = new PDO("mysql: host=$host; dbname=$database", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}catch(PDOException $e ){
    die("cannot connect to database: " . htmlspecialchars($e->getMessage()));
}

?>

<!-- 
    // PDO database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // Prevent SQL injection with emulated prepared statements
} catch (PDOException $e) {
    die("Database connection failed: " . htmlspecialchars($e->getMessage()));
}

-->
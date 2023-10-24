<?php

$dbname = "ltd_admin";
$db_username = "postgres";
$host = 'localhost';
$port = 5430;

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$db_username;password=''");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $err) {
    die("connection failed: " . $err->getMessage());
}

?>
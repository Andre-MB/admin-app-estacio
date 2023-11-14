<?php
    $host = 'localhost';
    $user = 'postgres';
    $port = 5430;
    $database = 'ltd_admin';

    $dsn = "pgsql:host=$host;port=$port;dbname=$database;user=$user";

    try {
        $pg_conn = new PDO($dsn);

        $pg_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    date_default_timezone_set("America/Sao_Paulo");

?>
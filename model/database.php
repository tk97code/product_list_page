<?php

    $dsn = 'mysql:host=localhost;dbname=product_list';
    $username = 'root';
    $password = '';
    try {
        $db = new PDO($dsn, $username, $password);
        echo "connected";
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo $error_message;
        include('database_error.php');
        exit();
    }
?>
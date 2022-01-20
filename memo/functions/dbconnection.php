<?php

    $dns = 'mysql:dbname=memos;host=localhost';
    $username = 'root';
    $password = 'root';
    $option = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    
    $pdo = new PDO($dns, $username, $password, $option);

?>
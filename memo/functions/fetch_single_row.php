<?php

try {
    require('functions/dbconnection.php');
    $stmt = $pdo->prepare('SELECT * FROM `memo` WHERE id = :id');
    $stmt->bindValue('id', $query_param, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    exit($e->getMessage());
    echo $e->getMessage();
    die();
};

?>
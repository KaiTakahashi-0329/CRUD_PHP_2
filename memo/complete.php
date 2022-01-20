<?php

// formに入力された値の取得
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $text = $_POST['text'];
};

// DB接続関係の処理
try {
    require('functions/dbconnection.php');

    $stmt = $pdo->prepare('INSERT INTO memo (name, age, text) VALUES (:name, :age, :text)');
    $stmt->bindValue('name', $name, PDO::PARAM_STR);
    $stmt->bindValue('age', $age, PDO::PARAM_INT);
    $stmt->bindValue('text', $text, PDO::PARAM_STR);
    $stmt->execute();

    header('Location: list.php');

} catch(PDOException $e) {
    exit($e->getMessage());
    echo $e->getMessage();
    die();
};

?>
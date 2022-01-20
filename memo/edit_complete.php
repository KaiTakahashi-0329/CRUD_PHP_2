<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $text = $_POST['text'];
}

try {
    require('functions/dbconnection.php');
    $stmt = $pdo->prepare('UPDATE memo SET name = :name, age = :age, text = :text WHERE id = :id');
    $stmt->bindValue('name', $name, PDO::PARAM_STR);
    $stmt->bindValue('age', $age, PDO::PARAM_INT);
    $stmt->bindValue('text', $text, PDO::PARAM_STR);
    $stmt->bindValue('id', $id, PDO::PARAM_INT);
    $stmt->execute();

    header('Location: list.php');

} catch(PDOException $e) {
    exit($e->getMessage());
    var_dump($e->getMessage());
    die();
}

?>
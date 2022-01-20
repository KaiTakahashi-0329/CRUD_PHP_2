<?php 

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
}

try {
    require('functions/dbconnection.php');
    $stmt = $pdo->prepare('DELETE FROM `memo` WHERE id = :id');
    $stmt->bindValue('id', $id, PDO::PARAM_INT);
    $stmt->execute();

    header('Location:list.php');

} catch(PDOException $e) {
    exit($e->getMessage());
    echo $e->getMessage();
    die();
    
    echo '削除に失敗しました。<br>時間を置いてから再度試してください。<br>';
    echo '<a href="list.php">一覧画面へ戻る</a>';
}

?>
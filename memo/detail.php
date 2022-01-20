<?php

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query_param = $_GET['id'];
};

require('functions/fetch_single_row.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>詳細画面</title>
</head>
<body>
    <h1>詳細画面</h1>
    <p><a href="list.php">一覧画面に戻る</a></p>
    <hr>

    <div>
        <p>名前</p>
        <p><?php echo htmlspecialchars($result['name'] ,ENT_QUOTES, "UTF-8"); ?></p>
        <hr>

        <p>年齢</p>
        <p><?php echo htmlspecialchars($result['age'] ,ENT_QUOTES, "UTF-8"); ?></p>
        <hr>

        <p>本文</p>
        <p><?php echo htmlspecialchars($result['text'] ,ENT_QUOTES, "UTF-8"); ?></p>
        <hr>

        <p>作成日</p>
        <p><?php echo htmlspecialchars($result['create_date'] ,ENT_QUOTES, "UTF-8"); ?></p>
        <hr>
    </div>

    <form action="delete_confirm.php?id=<?php echo $result['id']; ?>" method="POST">
        <button type="submit">削除する</button>
    </form>
    <form action="edit.php?id=<?php echo $result['id']; ?>" method="POST">
        <button type="submit">編集する</button>
    </form>
</body>
</html>
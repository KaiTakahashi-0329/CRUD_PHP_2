<?php

$query_param = $_GET['id'];

try {
    require('functions/fetch_single_row.php');
} catch(PDOException $e) {
    exit($e->getMessage());
    echo $e->getMessage();
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メモ編集画面</title>
</head>
<body>
    <h1>メモ編集画面</h1>
    <hr>

    <form action="edit_confirm.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($result['id'], ENT_QUOTES, 'UTF-8'); ?>">
        <label>
            名前：
            <input type="text" name="name" value="<?php echo htmlspecialchars($result['name'], ENT_QUOTES, 'UTF-8'); ?>">
        </label>
        <label>
            年齢：
            <input type="text" name="age" maxlength="3" value="<?php echo htmlspecialchars($result['age'], ENT_QUOTES, 'UTF-8'); ?>">
        </label>
        <label for="textarea">本文：</label>
        <textarea name="text" id="textarea" cols="30" rows="10" placeholder="テキストを入れてください"><?php echo htmlspecialchars($result['text'], ENT_QUOTES, 'UTF-8'); ?></textarea>
        <button type="submit">編集する</button>
    </form>

    <style>
        label, textarea {
            display: block;
        }
    </style>
</body>
</html>
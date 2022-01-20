<?php
// 値チェックの関数を読み込み
require('functions/validate.php');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $text = $_POST['text'];
};

// 初期化
$validate_not_int = validate_int($age);
$validate_empty_name = validate_empty($name);
$validate_empty_age = validate_empty($age);
$validate_empty_text = validate_empty($text);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メモ確認画面</title>
</head>
<body>
    <form action="complete.php" method='POST'>
        <input type="hidden" name="name" value='<?php echo htmlspecialchars($name, ENT_QUOTES, "UTF-8"); ?>'>
        <input type="hidden" name="age" value='<?php echo htmlspecialchars($age, ENT_QUOTES, "UTF-8");?>'>
        <input type="hidden" name="text" value='<?php echo htmlspecialchars($text, ENT_QUOTES, "UTF-8");?>'>
        
        <h1>メモ確認画面</h1>
        <p>こちらの内容で問題ありませんか？</p>
        <p>問題なければ「登録する」をクリックしてください</p>
        <hr>
        
        <div>
            <h2>名前</h2>
            <?php if($validate_empty_name): ?>
                <p class="mod-red">値を入力してください。</p>
            <?php else: ?>
                <p><?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endif; ?>
        </div>
        <div>
            <h2>年齢</h2>
            <?php if($validate_empty_age): ?>
                <p class="mod-red">値を入力してください。</p>
            <?php elseif($validate_not_int): ?>
                <p class="mod-red">数字で年齢を入力してください。</p>
            <?php else: ?>
                <p><?php echo htmlspecialchars($age, ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endif; ?>
        </div>
        <div>
            <h2>本文</h2>
            <?php if($validate_empty_text): ?>
                <p class="mod-red">値を入力してください。</p>
            <?php else: ?>
                <p><?php echo htmlspecialchars($text, ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endif; ?>
        </div>

        <?php if($validate_not_int || $validate_empty_name || $validate_empty_age || $validate_empty_text): ?>
            <button type="button" onclick="history.back(-1)">修正する</button>
        <?php else: ?>
            <button type="button" onclick="history.back(-1)">修正する</button>
            <button type="submit">登録する</button>
        <?php endif; ?>
    </form>

    <style>
        .mod-red {
            color: red;
        }
    </style>
</body>
</html>
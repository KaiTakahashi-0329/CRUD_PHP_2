<?php 

$query_param = $_GET['id'];

require('functions/fetch_single_row.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>削除確認画面</title>
</head>
<body>
    <h1>削除確認画面</h1>
    <hr>

    <h2 class="mod-red">本当に削除しますか？<br>問題なければ「削除する」をクリックしてください。</h2>
    <form action="delete_complete.php" method="POST">
        <input type="hidden" value="<?php echo $result['id']; ?>" name="id">
        <button type="button"><a href="detail.php?id=<?php echo $query_param; ?>">詳細画面に戻る</a></button>
        <button type="submit">削除する</button>
    </form>

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

    <style>
        .mod-red {
            color: red;
        }
    </style>
</body>
</html>
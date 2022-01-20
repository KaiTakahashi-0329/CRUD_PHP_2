<?php

$url = $_SERVER['HTTP_REFERER'];
require('functions/decision_referer.php');

$referer_from_delete_confirm = decision_referer('delete_confirm.php', $url);
$referer_from_edit_complete = decision_referer('edit_confirm.php', $url);
$referer_from_index = decision_referer('index.php', $url);

try {
    require('functions/dbconnection.php');
    $stmt = $pdo->query('SELECT * FROM memo');
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch(PDOException $e) {
    exit($e->getMessage());
    echo $e->getMessage();
    die();
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>一覧表示画面</title>
</head>
<body>

    <div id="js-info">
        <?php if(isset($referer_from_delete_confirm)): ?>
            <p>削除が完了しました。</p>
            <button id="js-btn" type="button">OK</button>
            <hr>
        <?php elseif(isset($referer_from_index)): ?>
            <p>メモの追加を完了しました。</p>
            <button id="js-btn" type="button">OK</button>
            <hr>
        <?php elseif(isset($referer_from_edit_complete)): ?>
            <p>編集が完了しました。</p>
            <button id="js-btn" type="button">OK</button>
            <hr>
        <?php endif; ?>
    </div>

    <h1>一覧表示画面</h1>
    <a href="input.html">メモ入力画面へ</a>

    <hr>

    <table>
        <tr>
            <th>名前</th>
            <th>年齢</th>
            <th>本文</th>
            <th>作成日</th>
        </tr>

        <?php foreach($result as $item): ?>
        <tr>
            <th class="mod-textLeft"><?php echo htmlspecialchars($item['name'] ,ENT_QUOTES, "UTF-8"); ?></th>
            <th class="mod-textLeft"><?php echo htmlspecialchars($item['age'] ,ENT_QUOTES, "UTF-8"); ?></th>
            <th class="mod-textLeft">
                <?php if(mb_strlen($item['text']) > 15): ?>
                    <?php echo htmlspecialchars(mb_substr($item['text'], 0, 15) ,ENT_QUOTES, "UTF-8") . "・・・"; ?>
                <?php else: ?>
                        <?php echo htmlspecialchars(mb_substr($item['text'], 0, 15) ,ENT_QUOTES, "UTF-8"); ?>
                <?php endif; ?>
            </th>
            <th class="mod-textLeft"><?php echo htmlspecialchars($item['create_date'] ,ENT_QUOTES, "UTF-8"); ?></th>
            <th class="mod-textLeft"><a href="detail.php?id=<?php echo $item['id']; ?>">詳細を見る</a></th>
        </tr>
        <?php endforeach; ?>

    </table>

    <style>
        table {
            text-align: left;
        }
    </style>

    <script type="text/javascript" src="js/index.js"></script>
</body>
</html>
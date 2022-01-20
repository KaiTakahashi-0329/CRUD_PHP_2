<?php

// 引数詳細 (参照元のファイル, $_SERVER['HTTP_REFERER)
// どこのページから遷移してきたか調べる。引数に入れた文字列とマッチしたら引数に入れた文字列を返す
function decision_referer($referer, $url) {
    if(isset($url) && strpos($url, $referer) !== false) return $referer;
}

?>
# CRUD APP
CRUDの基本的な使い方を学ぶために作成
 
# Logic
基本的なファイル説明
index.html 入力画面    
index.php index.phpで入力された値の確認画面 不備があれば戻れば修正。問題なければ「登録する」でcomplete.phpに  
complete.phpでDBに保存 DBとのやりとりはPDOオブジェクトを使用  
list.php　投稿の一覧画面  
edit.php 投稿の修正画面  
edit_confirm.php edit.phpで入力された値の確認画面 不備があれば戻れば修正。問題なければ「登録する」でedit_complete.phpに基本的にはdelete系ファイルも同じ構造  
 
# その他
反省点はいくつかあったので次に生かしたい。  
・バリデーションチェックはfilter_inputを使う   
・action属性を空にして、自分自身にPOSTをすることで遷移しないでバリデーションチェックを行う  
・SQLのdelete構文などはセキュリティのためLIMIT 1 を指定しておく  
・htmlspecialcharsのパラメーターや文字コードは指定しておく  
 
# License
This software is released under the MIT License, see LICENSE.txt.

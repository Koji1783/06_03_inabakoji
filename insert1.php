<?php

// 送信確認
// var_dump($_POST);
// exit();

session_start();
if (
  !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()
) {
  echo "LOGIN ERROR";
  exit('<br><a href="login.php">ログイン</a>');
}else{
  session_regenerate_id(true);
  $_SESSION["chk_ssid"] = session_id();
}

// DB接続の設定
// DB名は`gsacf_x00_00`にする
$dbn = 'mysql:dbname=Gov_discussion;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// 1.接続
try {
  // ここでDB接続処理を実行する
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  // DB接続に失敗した場合はここでエラーを出力し，以降の処理を中止する
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}


// 項目入力のチェック
// 値が存在しないor空で送信されてきた場合はNGにする
if (
  !isset($_POST['comment']) || $_POST['comment']=='' ||
  !isset($_POST['hashtag']) || $_POST['hashtag']=='' ){
  exit('ParamError');
}

// 受け取ったデータを変数に入れる
$comment = $_POST['comment'];
$hashtag = $_POST['hashtag'];


// DB接続の設定
// DB名は`gsacf_x00_00`にする
$dbn = 'mysql:dbname=Gov_discussion;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  // ここでDB接続処理を実行する
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  // DB接続に失敗した場合はここでエラーを出力し，以降の処理を中止する
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// データ登録SQL作成
// `created_at`と`updated_at`には実行時の`sysdate()`関数を用いて実行時の日時を入力する
$sql = 'INSERT INTO sns_table(id, g_id, u_id, comment, hashtag, commentdate) VALUES (NULL,1,:u_id,:comment,:hashtag,current_timestamp)';



// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':u_id', $_SESSION["u_id"], PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':hashtag', $hashtag, PDO::PARAM_STR);
$status = $stmt->execute();


// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  // データ登録失敗次にエラーを表示
  exit('sqlError:'.$error[2]);

} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  header('Location:index.php');
}

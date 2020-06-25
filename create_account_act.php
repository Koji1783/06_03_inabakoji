<?php

// 送信確認
// var_dump($_POST);
// exit();



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
  !isset($_POST['u_name']) || $_POST['u_name']=='' ||
  !isset($_POST['u_id']) || $_POST['u_id']=='' ||
  !isset($_POST['u_pw']) || $_POST['u_pw']=='' ){
  exit('ParamError');
}

// 受け取ったデータを変数に入れる
$u_name = $_POST['u_name'];
$u_id = $_POST['u_id'];
$u_pw = $_POST['u_pw'];


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
$sql = 'INSERT INTO user_table(id, u_name, u_id, u_pw, indate) VALUES (NULL,:u_name,:u_id,:u_pw,sysdate())';



// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':u_name', $_POST["u_name"], PDO::PARAM_STR);
$stmt->bindValue(':u_id', $_POST["u_id"], PDO::PARAM_STR);
$stmt->bindValue(':u_pw', $_POST["u_pw"], PDO::PARAM_STR);
$status = $stmt->execute();


// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  // データ登録失敗次にエラーを表示
  exit('sqlError:'.$error[2]);

} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  $output = '作成が完了しました。';
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>政治をカタロウ</title>
</head>

<body>

  <div>
    <?= $output?>
    <a href="login.php">ログインする</a>
  </div>

</body>

</html>


<?php
session_start();
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

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


// 2.SQL準備&実行
$sql = 'SELECT * FROM user_table WHERE u_id=:lid AND u_pw=:lpw';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    // データ登録失敗次にエラーを表示
    exit('sqlError:'.$error[2]);
}

// 3.抽出データ数を取得
$val = $stmt->fetch();

// 4.該当レコードがあればSESSIONに値を代入
if( $val["id"] != ""){
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["u_id"] = $val["u_id"];
    $_SESSION["u_name"] = $val["u_name"];
    // 正常にSQLが実行された場合はtodo_input.phpに移動
    header('Location:index.php');
}else {
    // NGの場合はlogin.phpに移動
    header('Location:login.php');
}

// 処理終了
exit();


?>
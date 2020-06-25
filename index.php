<?php
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

$output = $_SESSION["u_name"]

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>政治をカタロウ</title>
</head>

<body>
  <header>
        <nav>
            <div>
                <a href="logout.php">ログアウト</a>
            </div>
            <?= $output?>さん、こんにちは。
        </nav>
    </header>
    <form action="select_origin.php" method="POST">
    <fieldset>
      <legend>創始者を調べる</legend>
      <div>
        <input type="text" name="origin_word">という言葉を最初に発言した人を
      </div>
      <div>
        <input type="submit" value="チェック">
      </div>
    </fieldset>
  </form>


  <form action="insert3.php" method="POST">
    <fieldset>
      <legend>投稿する（お題３）</legend>
      <a href="select3.php">みんなの投稿</a>
      <div>
        コメント: <textarea name="comment" cols="40" rows="10"></textarea>
      </div>
      <div>
        ハッシュタグ: <input type="text" name="hashtag">
      </div>
      <div>
        <input type="submit" value="投稿">
      </div>
    </fieldset>
  </form>


  <form action="insert2.php" method="POST">
    <fieldset>
      <legend>投稿する（お題２）</legend>
      <a href="select2.php">みんなの投稿</a>
      <div>
        コメント: <textarea name="comment" cols="40" rows="10"></textarea>
      </div>
      <div>
        ハッシュタグ: <input type="text" name="hashtag">
      </div>
      <div>
        <input type="submit" value="投稿">
      </div>
    </fieldset>
  </form>


  <form action="insert1.php" method="POST">
    <fieldset>
      <legend>投稿する（お題１）</legend>
      <a href="select1.php">みんなの投稿</a>
      <div>
        コメント: <textarea name="comment" cols="40" rows="10"></textarea>
      </div>
      <div>
        ハッシュタグ: <input type="text" name="hashtag">
      </div>
      <div>
        <input type="submit" value="投稿">
      </div>
    </fieldset>
  </form>

</body>

</html>


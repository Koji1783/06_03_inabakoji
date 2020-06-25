<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント作成</title>
</head>
<body>

    <form action="create_account_act.php" method="post">
        <div>
            <fieldset>
                <legend>アカウント設定</legend>
                <label>名前：<input type="text" name="u_name"></label>
                <label>ID：<input type="text" name="u_id"></label>
                <label>PW：<input type="text" name="u_pw"></label>
                <input type="submit" value="アカウントを作成">
            </fieldset>
        </div>
    </form>
    <a href="login.php">戻る</a>
</body>
</html>
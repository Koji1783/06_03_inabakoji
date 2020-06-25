<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
</head>
<body>
    <header>
        <nav>
            <div>
                アカウント作成は<a href="create_account.php">こちら</a>
            </div>
        </nav>
    </header>

    <form action="login_act.php" method="post">
        <div>
            <fieldset>
                <legend>政治をカタロウ</legend>
                <label>ID：<input type="text" name="lid"></label>
                <label>PW：<input type="text" name="lpw"></label>
                <input type="submit" value="ログイン">
            </fieldset>
        </div>
    </form>
</body>
</html>
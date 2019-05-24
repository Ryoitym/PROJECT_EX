<?php require_once("lib/init.php"); //共通関数の読み込み?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>アクセス権限がありません</title>
</head>
<body>
    <?php ph($message) ?>
    <form action="logout.php" method="post">
        <button type="submit" name="logout" value="logout">ログアウト</button>
    </form><br>
</body>
</html>
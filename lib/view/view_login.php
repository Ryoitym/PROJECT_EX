<?php
/**
 * このファイルの概要説明
 *　ログイン画面作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　sugerSong
 * 作成日：　2019/05/22
 * 最終更新日：　2019/05/22
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ログイン画面</title>
</head>
<body>
    <h1>ログイン画面</h1>
    <form action="view_login.php" method="post">
        メールアドレス：<input type="text" name="mail" value=""><br>
        パスワード：<input type="text" name="password" value=""><br>
        <input type="submit" value = "送信">
    </form>
</body>
</html>
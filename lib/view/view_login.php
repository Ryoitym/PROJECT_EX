<?php
/**
 * このファイルの概要説明
 *　ログイン画面作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　sugerSong
 * 作成日：　2019/05/22
 * 最終更新日：　2019/05/28
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
    <link rel="stylesheet" href= "lib/css/style.css">
    </head>
    <body class="management">

    <div class="m_center">
    <h1>ログイン画面</h1>
    <?php ph($message) ?>
    <form action="login.php" method="post">
        メールアドレス：<input type="text" name="mail" value=""><br>
        パスワード：<input type="password" name="password" value=""><br>
        <input type="submit" value = "送信">
    </form>
  </div>
</body>
</html>

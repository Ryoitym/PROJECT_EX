<?php
/**
 * このファイルの概要説明
 *　生鮮食品画面作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　orange juice
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/23
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>分類編集画面</title>
</head>
<body>
    <h1>分類編集画面</h1>
    <!-- ログアウトボタン-->
    <form action="view_logout.php">
        <input type="submit" value="ログアウト">
    </form><br>
    <!-- 分類入力フォーム-->
    <form action="view_category_insert.php">
        分類名：<input type="text" name="genre_name"><br>
        <input type="submit" value="登録"><br>
        <input type="reset" value="クリア">
    </form>
</body>
</html>

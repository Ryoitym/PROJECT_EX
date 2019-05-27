<?php
/**
 * このファイルの概要説明
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　appleCandy
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/23
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>店舗登録画面</title>
<link rel="stylesheet" href= "style.css">
</head>
<body>

<form action="logout.php" method="get">
    <button type="submit" name="logout" value="logout">ログアウト</button>
</form>
<h1>店舗登録画面</h1>

<br>
<form action="shop_insert.php" method="post">
    店舗名:<input type="text" name="shop_name"><br>
    住所：<input type="text" name="address"><br>
    電話番号：<input type="text" name="tel"><br>
    <input type="submit" value = "登録">
    <input type="reset" value = "クリア"><br>
</form>

</body>
</html>
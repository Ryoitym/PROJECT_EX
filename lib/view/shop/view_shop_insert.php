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
<?php
    require_once("../init.php");
?>
<form action="view_logout.php">
    <input type="submit" value="ログアウト">
</form>
<h1>店舗登録画面</h1>

<!--エラーメッセージをここに追加-->
<?php print "入力が不十分です";?><br>
<br>
<form action="">
    店舗名:<input type="text" value = ""><br>
    住所：<input type="text" value = ""><br>
    電話番号：<input type="text" value = ""><br>
</form>

<form action="view_shop_list_admin.php">
        <input type="submit" value = "登録">
</form>
<form action="view_shop_insert.php">
        <input type="submit" value = "クリア"><br>
</form>
</form>
</body>
</html>
<?php
/**
 * このファイルの概要説明
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　appleCandy
 * 作成日：　2019/05/22
 * 最終更新日：　2019/05/22
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>管理トップ画面（店長級社員）</title>
<link rel="stylesheet" href= "style.css">
</head>
<body>
<?php
    //init.phpができたらコメントアウト解除
    //require_once("init.php");
?>
<form action="view_logout.php">
    <input type="submit" value="ログアウト">
</form>
<h1>店長級社員管理画面</h1>

<form action="view_food_list.php.php">
        <input type="submit" value = "生鮮食品一覧">
</form>
<form action="view_special_price_food_list.php">
        <input type="submit" value = "特価品一覧"><br>
</form>
<form action="view_user_list.php">
        <input type="submit" value = "ユーザ一覧">
</form>
<form action="view_shop_list.php.php">
        <input type="submit" value = "店舗一覧"><br>
</form>
</body>
</html>
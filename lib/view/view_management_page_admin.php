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
<title>管理トップ画面（IT担当社員）</title>
<link rel="stylesheet" href= "lib/css/style.css">
</head>
<body class="management">

<div class="m_center">
<form action="logout.php" method="post">
        <button type="submit" name="logout" value="logout">ログアウト</button>
</form>

<h1>IT担当社員管理画面</h1>
<form action="food_list_admin.php">
        <input type="submit" value = "生鮮食品一覧" class="btn-management">
</form>
<form action="special_price_food_list_admin.php">
        <input type="submit" value = "特価品一覧" class="btn-management">
</form>
<form action="category_list_admin.php">
        <input type="submit" value = "分類一覧" class="btn-management">
</form>
<form action="user_list_admin.php">
        <input type="submit" value = "ユーザ一覧" class="btn-management">
</form>
<form action="shop_list_admin.php">
        <input type="submit" value = "店舗一覧" class="btn-management">
</form>
</div>
</body>
</html>

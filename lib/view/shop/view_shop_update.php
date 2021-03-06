<?php
/**
 * このファイルの概要説明
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　appleCandy
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/28
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>店舗編集画面</title>
<link rel="stylesheet" href= "lib/css/style.css">
</head>
<body class="management">

<div class="m_center">
<form action="logout.php" method="get">
    <button type="submit" name="logout" value="logout">ログアウト</button>
</form>
<h1>店舗編集画面</h1>
<?php ph($error_message);?>
<br>
<form action="shop_update.php" method="post">
    店舗名:<input type="text" name="shop_name" value= "<?php ph($row["shop_name"])?>" ><br>
    住所：<input type="text" name = "address" class="txt_address" value= "<?php  ph($row["address"]);?>" ><br>
    電話番号：<input type="text" name = "tel" value= "<?php  ph($row["tel"]);?>"    ><br>
    <input type="hidden" name="shop_id" value="<?php ph($row["shop_id"]);?>">

    <input type="submit" value = "編集">
    <input type="reset" value="クリア">
</form>

<p><a href="shop_list_admin.php">一覧に戻る</a></p>
</div>
</body>
</html>

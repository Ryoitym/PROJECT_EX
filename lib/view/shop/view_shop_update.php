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
<title>店舗編集画面</title>
<link rel="stylesheet" href= "style.css">
</head>
<body>
<?php
    require_once("lib/init.php");
    $dbh = connectDb();
    //require_once("shop_update.php");
?>
<form action="view_logout.php">
    <input type="submit" value="ログアウト">
</form>
<h1>店舗編集画面</h1>

<br>
<form action="shop_update.php" method="POST">
    店舗名:<input type="text" name="shop_name" value= "<?php ph($row["shop_name"])?>" ><br>
    住所：<input type="text" name = "address" value= "<?php echo $row["address"];?>" ><br>
    電話番号：<input type="text" name = "tel" value= "<?php echo $row["tel"];?>"    ><br>
    <input type="hidden" name="shop_id" value="<?php ph($row["shop_id"]);?>">
</form>

<form action="lib/view/shop/view_shop_list_admin.php">
        <input type="submit" value = "編集">
</form>
<form action="view_shop_insert.php">
        <input type="submit" value = "クリア"><br>
</form>
</form>
</body>
</html>
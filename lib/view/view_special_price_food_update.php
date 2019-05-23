<!-- /**
 * このファイルの概要説明
特価商品編集画面
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　nosu10101
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/23
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */ -->

 <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>特価商品編集画面</title>
    </head>
<body>

<input type="submit" value="ログアウト"><br>

エラーメッセージ

<form action="view_special_price_food_update.php" method="post">

生鮮食品名: <select name="food_select">
        <option value="1">test1</option><br>
        <option value="2">test2</option><br>
        <option value="3">test3</option><br>
        <option value="4">test4</option><br>
        </select><br>

特価価格:<input type="text" name="sale_price" size="20"><br>

日付: <select name="date_select">
        <option value="1">test1</option><br>
        <option value="2">test2</option><br>
        <option value="3">test3</option><br>
        <option value="4">test4</option><br>
        </select><br>

店舗名: <select name="shop_select">
        <option value="1">test1</option><br>
        <option value="2">test2</option><br>
        <option value="3">test3</option><br>
        <option value="4">test4</option><br>
        </select><br>

<input type="submit" value="編集"><br>
<input type="submit" value="クリア"><br>
</form>
</body>
</html>

<!-- /**
 * このファイルの概要説明
 *　特価商品一覧画面(IT担当者)
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　nosu10101
 * 作成日：　2019/05/22
 * 最終更新日：　2019/05/22
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */ -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>特価商品一覧画面</title>
</head>
<body>
<input type="submit" value="ログアウト">
<a href="">特価商品</a>
<a href="">生鮮食品</a>
<a href="">分類</a>
<a href="">ユーザ</a>
<a href="">店舗</a>

<form action="view_special_price_food_list_admin.php" method="get">
検索: <input type="text" name="search_name">
<input type="submit" value="検索">
</form>

<!-- borderは後で消す -->
<table border="1">
    <tr>
        <th>日付</th>
        <th>食品名</th>
        <th>価格</th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <td>test</td>
        <td>test</td>
        <td>test</td>
        <td></td>
        <td></td>
    </tr>
</table>

<a href="">全て表示</a>
</body>
</html>

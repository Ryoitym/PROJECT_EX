<!--
 * 店舗一覧を表示する画面
 *　データベース作成フォーマット
 * IT管理者でログインしているときの表示。
   画面上部のタブで画面切り替えが可能。
   表示順は、店舗名昇順

 *
 * システム名： FFS
 * 作成者：　amaru
 * 作成日：　2019/05/22
 * 最終更新日：　2019/05/28
 * レビュー担当者：orange juice
 * レビュー日：2019/05/28
 * バージョン： 1.1
 */
-->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>店舗一覧画面(店長級社員)</title>
<link rel="stylesheet" href= "lib/css/style.css">
</head>
<body class="management">

<div class="m_center">
<form action="logout.php" method="get">
    <button type="submit" name="logout" value="logout">ログアウト</button>
</form>
    <h1>店舗一覧画面</h1>

<a href="special_price_food_list.php">特価商品</a>
<a href="food_list.php">生鮮食品</a>
<a href="user_list.php">ユーザ</a>
<a href="shop_list.php">店舗</a>
<br>
<form action="shop_list.php"method="post">
<input type="text" name="search">
<input type="submit" value="検索">
</form>
<table border="1">
    <tr>
        <th>店舗名</th>
        <th class="midium">住所</th>
        <th class="midium">電話番号</th>
    </tr>
    <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {?>
    <tr>
        <td><?php ph($row["shop_name"]);?></td>
        <td><?php ph($row["address"]);?></td>
        <td><?php ph($row["tel"]);?></td>
    </tr>
    <?php } ?>
</table>
<a href="management_page.php">トップページへ戻る</a>
<a href="shop_list.php">全て表示</a>
</div>
</body>
</html>

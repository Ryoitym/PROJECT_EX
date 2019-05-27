<!--
 * 店舗一覧を表示する画面
 *　データベース作成フォーマット
 * IT管理者でログインしているときの表示。
   画面上部のタブで画面切り替えが可能。
   表示順は、店舗名昇順

 *
 * システム名： FFS
 * 作成者：　appleCandy
 * 作成日：　2019/05/22
 * 最終更新日：　2019/05/27
 * レビュー担当者：orange juice
 * レビュー日：2019/05/27
 * バージョン： 1.1
 */
-->
<form action="logout.php" method="post">
        <button type="submit" name="logout" value="logout">ログアウト</button>
</form>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>店舗一覧画面(IT担当者)</title>
</head>
<body>
    <h1>店舗一覧画面</h1><br>

<a href="special_price_food_list_admin.php">特価商品</a>
<a href="food_list_admin.php">生鮮食品</a>
<a href="category_list_admin.php">分類</a>
<a href="user_list_admin.php">ユーザ</a>
<a href="shop_list_admin.php">店舗</a>
<br>
<form action="shop_list_admin.php"method="post">
<input type="text" name="search">
<input type="submit" value="検索">
<p><a href="shop_insert.php">新規登録</a></p>
</form>
<table border="1">
    <tr>
        <th>店舗名</th>
        <th>住所</th>
        <th>電話番号</th>
        <th>編集</th>
        <th>削除</th>
    </tr>
    <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {?>
    <tr>
        <td><?php ph($row["shop_name"]);?></td>
        <td><?php ph($row["address"]);?></td>
        <td><?php ph($row["tel"]);?></td>
        <td><form action="shop_update.php?shop_id=<?php
            ph($row['shop_id']);?>"
             method="post">
        <input type="submit" value="編集"></form></td>
        <td><form action="shop_delete.php?shop_id=<?php
            ph($row['shop_id']);?>"
             method="post">
        <input type="submit" value="削除"></form></td>
    </tr>
    <?php } ?>
</table>
<p><a href="shop_list_admin.php">全て表示</a></p>
<a href="management_page_admin.php">トップページへ戻る</a>
</body>
</html>

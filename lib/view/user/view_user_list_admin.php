<?php
/**
 * このファイルの概要説明
 *　ログアウト画面作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　amaru
 * 作成日：　2019/05/22
 * 最終更新日：　2019/05/22
 * レビュー担当者：orange juice
 * レビュー日：2019/05/22
 * バージョン： 1.1
 */

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ユーザ一覧画面(IT担当者)</title>
</head>
<body>
  <form action="logout.php" method="post">
        <button type="submit" name="logout" value="logout">ログアウト</button>
</form>
<h1>ユーザ一覧</h1>
<a href="special_price_food_list_admin.php">特価商品</a>
<a href="food_list_admin.php">生鮮食品</a>
<a href="category_list_admin.php">分類</a>
<a href="user_list_admin.php">ユーザ</a>
<a href="shop_list_admin.php">店舗</a>
<br>
<form action="user_list_admin.php"method="post">
  検索：<input type="text" name="search">
        <input type="submit" value="検索">
<p><a href="user_insert.php">新規登録</a></p>
</form>
<table border="1">
    <tr>
        <th>店舗</th>
        <th>姓</th>
        <th>名</th>
        <th>メール</th>
        <th>編集</th>
        <th>削除</th>
    </tr>
    <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {?>
    <tr>
        <td><?php ph($row["shop_id"]);?></td>
        <td><?php ph($row["name_family"]);?></td>
        <td><?php ph($row["name_last"]);?></td>
        <td><?php ph($row["mail"]);?></td>
        <td><form action = "user_update.php?genre_id=<?php
             ph($row["user_id"]);?>" method="post">
             <input type="submit" value="編集">
            </form>
        </td>
        <td><form action = "user_delete.php" method="post">
            <input type="hidden" name="user_id" value="<?php ph($row["user_id"]);?>">
            <input type="submit" value="削除" onclick="return confirm('本当に削除しますか？');">
            </form>
        </td>
    </tr>
    <?php } ?>
</table>
<a href="user_list_admin.php">全て表示</a>
<a href="management_page_admin.php">トップページへ戻る</a>
</body>
</html>

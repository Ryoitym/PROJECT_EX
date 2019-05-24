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
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ユーザ一覧画面(店長)</title>
</head>
<body>
  <h1>ユーザ一覧</h1><br>
<a href="special_price_food_list_admin.php">特価商品</a>
<a href="food_list_admin.php">生鮮食品</a>
<a href="user_list_admin.php">ユーザ</a>
<a href="shop_list_admin.php">店舗</a>
<br>
<form action="user_list_admin.php"method="post">
<input type="text" name="name_family">
<input type="submit" value="検索">
<p><a href="user_insert.php">新規登録</a></p>
</form>
<brs>
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
        <td><a href="user_update.php?user_id=<?php
            ph($row["user_id"]);
        ?>">編集</a></td>
        <td><a href="user_delete.php?user_id=<?php
            ph($row["user_id"]);
        ?>">削除</a></td>
    </tr>
    <?php } ?>
</table>
<p><a href="#">全て表示</a></p>
</body>
</html>

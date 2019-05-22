<!--
 * ユーザ情報を表示する画面
 *　データベース作成フォーマット
 * 店長級社員でログインしているときの表示。
   画面上部のタブで画面切り替えが可能。
   表示順は、優先順位1位：店舗名昇順　優先順位2位：名前昇順
 *
 * システム名： FFS
 * 作成者：　余婉慈
 * 作成日：　2019/05/22
 * 最終更新日：　2019/05/22
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.0
 */
-->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ユーザ一覧画面(店長)</title>
</head>
<body>
    <h1>ユーザ一覧</h1><br>
<?php
    /*修正してない
    
    require_once("init.php");
    $dbh = connectDb();

    try {
        $sql = "SELECT * FROM user WHERE acess_lv = 2";
        $sth = $dbh->prepare($sql);

        $sth->execute();
    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }

    setcookie("access", 0);*/
?>
<a href="view_special_price_food_list_admin.php">特価商品</a>
<a href="view_food_list_admin.php">生鮮食品</a>
<a href="view_user_list_admin.php">ユーザ</a>
<a href="view_shop_list_admin.php">店舗</a>
<br>
<form action="view_user_list_admin.php"method="post">
<input type="text" name="name_family">
<input type="submit" value="検索">
<p><a href="insert.php">新規登録</a></p>
</form>
<brs>
<table border="1">
    <tr>
        <th>店舗名</th>
        <th>姓</th>
        <th>名</th>
        <th>メール</th>
        <th>編集</th>
        <th>削除</th>
    </tr>
    <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {?>
    <tr>
        <td><?php ph($row["shop_name"]);?></td>
        <td><?php ph($row["name_family"]);?></td>
        <td><?php ph($row["name_last"]);?></td>
        <td><?php ph($row["mail"]);?></td>
        <td><a href="update.php?student_id=<?php
            ph($row["student_id"]);
        ?>">編集</a></td>
        <td><a href="delete_exec.php?student_id=<?php
            ph($row["student_id"]);
        ?>">削除</a></td>
    </tr>
    <?php } ?>
</table>
<p><a href="#">全て表示</a></p>
</body>
</html>

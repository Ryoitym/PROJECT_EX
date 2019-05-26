<!-- /**
 * このファイルの概要説明
分類一覧画面
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　orange juice
 * 作成日：　2019/05/22
 * 最終更新日：　2019/05/25
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */ -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>分類一覧画面(IT担当者)</title>
</head>
<body>
  <form action="logout.php" method="post">
          <button type="submit" name="logout" value="logout">ログアウト</button>
  </form>
<h1>分類一覧画面</h1>
<!-- 画面上部タブ -->
<a href="special_price_food_list_admin.php">特価商品</a>
<a href="food_list_admin.php">生鮮食品</a>
<a href="category_list_admin.php">分類</a>
<a href="user_list_admin.php">ユーザ</a>
<a href="shop_list_admin.php">店舗</a>

  <!-- 検索窓作成 -->

<form action="category_list_admin.php" method="post">
    検索：<input type="text" name="search">
          <input type="submit" value="検索">
</form>
<form action = "category_insert.php" method="post">
        <input type="submit" value="新規登録">
</form>
<table border="1">
  <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {?>
      <tr>
        <td><?php ph($row["genre_name"]);?></td>
        <td>
          <form action = "category_update.php?genre_id=<?php
             ph($row["genre_id"]);?>" method="post">
             <input type="submit" value="編集">
           </form>
        </td>
        <td>
          <form action = "category_delete.php?genre_id=<?php
             ph($row["genre_id"]);?>" method="post">
             <input type="submit" value="削除">
          </form>
        </td>
      </tr>
  <?php } ?>
</table>
<a href="">全て表示</a>
<a href='category_list_admin.php'>トップページへ戻る</a>
</body>
</html>

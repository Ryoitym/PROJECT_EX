<!-- /**
 * このファイルの概要説明
分類一覧画面
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　orange juice
 * 作成日：　2019/05/22
 * 最終更新日：　2019/05/28
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */ -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>分類一覧画面(IT担当者)</title>
<link rel="stylesheet" href= "lib/css/style.css">
</head>
<body class="management">

<div class="m_center">
<form action="logout.php" method="get">
    <button type="submit" name="logout" value="logout">ログアウト</button>
</form>

<h1>分類一覧画面</h1>
<!-- 画面上部タブ -->
<div class="tab1">
<a class="tab" href="special_price_food_list_admin.php">特価商品</a>
<a class="tab" href="food_list_admin.php">生鮮食品</a>
<a class="tab" href="category_list_admin.php">分類</a>
<a class="tab" href="user_list_admin.php">ユーザ</a>
<a class="tab" href="shop_list_admin.php">店舗</a>
</div>
  <!-- 検索窓作成 -->

<form action="category_list_admin.php" method="post">
    検索：<input type="text" name="search">
          <input type="submit" value="検索">
</form>
<a href="category_insert.php">新規登録</a>
<table border="1">
  <tr>
      <th>分類名</th>
      <th>編集</th>
      <th>削除</th>
  </tr>
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
            <form action = "category_delete.php" method="post">
              <input type="hidden" name="genre_id" value="<?php ph($row["genre_id"]);?>">
             <input type="submit" value="削除" onclick="return confirm('本当に削除しますか？');">
             </form>
        </td>
      </tr>
  <?php } ?>
</table>
<a href="management_page_admin.php">トップページへ戻る</a>
<a href="category_list_admin.php">全て表示</a>
</div>
</body>
</html>

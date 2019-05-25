<!-- /**
 * このファイルの概要説明
 生鮮食品一覧画面
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
<title>生鮮食品一覧画面(IT担当者)</title>
</head>
<body>
<form action="logout.php" method="get">
        <button type="submit" name="logout" value="logout">ログアウト</button>
    </form>
<h1>生鮮食品一覧画面</h1>
<!-- 画面上部タブ -->
<a href="">特価商品</a>
<a href="">生鮮食品</a>
<a href="">分類</a>
<a href="">ユーザ</a>
<a href="">店舗</a>

  <!-- 検索窓作成 -->

    <form action="food_list_admin.php" method="post">
      検索：<input type="text" name="search">
            <input type="submit" value="検索">
      </form>
      <a href="food_insert.php">新規登録</a>
    <hr>
    <table border="1">
        <tr>
            <th>写真</th>
            <th>食品名</th>
            <th>価格</th>
            <th>説明文書</th>
            <th>エネルギー</th>
            <th>タンパク質</th>
            <th>脂質</th>
            <th>炭水化物</th>
            <th>ナトリウム</th>
            <th>カリウム</th>
            <th>表示フラグ</th>
            <th>分類ID</th>
        </tr>

<?php while($row = $sth->fetch(PDO::FETCH_ASSOC)){ ?>
      <tr>
        <td><?php ph($row["picture"]); ?></td>
        <td><?php ph($row["food_name"]); ?></td>
        <td><?php ph($row["food_price"]); ?></td>
        <td><?php ph($row["txt"]); ?></td>
        <td><?php ph($row["calorie"]); ?></td>
        <td><?php ph($row["protein"]); ?></td>
        <td><?php ph($row["lipid"]); ?></td>
        <td><?php ph($row["carb"]); ?></td>
        <td><?php ph($row["natrium"]); ?></td>
        <td><?php ph($row["kalium"]); ?></td>
        <td><?php ph($row["show_flag"]); ?></td>
        <td><?php ph($row["genre_id"]); ?></td>
        <td>
          <form action = "food_update.php?food_id=<?php
            ph($row["food_id"]);
          ?>" method="post">
            <input type="submit" value="編集">
          </form>
        </td>
        <td>
          <form action = "food_delete.php?food_id=<?php
            ph($row["food_id"]);
          ?>" method="post">
            <input type="submit" value="削除">
          </form>
        </td>
      </tr>
<?php } ?>
    </table>
  <hr>
  <a href="">全て表示</a><br>

  <a href='food_list_admin.php'>トップページへ戻る</a>
</body>
</html>

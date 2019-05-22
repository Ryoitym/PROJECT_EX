<!-- /**
 * このファイルの概要説明
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　orange juice
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
<title>生鮮食品一覧画面(IT担当者)</title>
</head>
<body>
  <?php
      require_once("function.php");
      $dbh = connectDb()

      try {
          // SQLを構築
          $sql = "SELECT * FROM food";
          $sth = $dbh->prepare($sql); // SQLを準備

          // SQLを発行
          $sth->execute();
      } catch (PDOException $e) {
          exit("SQL発行エラー：{$e->getMessage()}");
      }
  ?>
<table>
  <!-- 検索窓作成 -->
    <tr>
      <br>
      <form action="view_food_list_admin.php" method="get">
        検索：<input type="text" name="search">
        <input type="submit" value="検索">
      </form>
    </tr>
    <form action = "food_insert.php" method="post">
      <input type="submit" value="新規登録">
    </form>
    <hr>
    <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {?>
    <tr>
        <td><?php ph($row["picture"]);?></td>
        <td><?php ph($row["food_name"]);?></td>
        <td><?php ph($row["txt"]);?></td>
        <td><?php ph($row["calorie"]);?></td>
        <td><?php ph($row["protein"]);?></td>
        <td><?php ph($row["lipid"]);?></td>
        <td><?php ph($row["carb"]);?></td>
        <td><?php ph($row["natrium"]);?></td>
        <td><?php ph($row["kalium"]);?></td>
    </tr>
    <hr>
  <?php } ?>

          <form action = "food_update.php" method="post">
            <input type="submit" value="編集">
          </form>
          <form action = "food_delete.php" method="post">
            <input type="submit" value="削除">
          </form>
</table>
</body>
</html>

<?php
/**
 * このファイルの概要説明
 *　生鮮食品画面作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　orange juice
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/28
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>分類編集画面</title>
    <link rel="stylesheet" href= "lib/css/style.css">
</head>
<body class="management">

<div class="m_center">
    <h1>分類編集画面</h1>
    <!-- ログアウトボタン-->
    <form action="logout.php" method="get">
      <button type="submit" name="logout" value="logout">ログアウト</button>
    </form>
  <!-- エラー表示 -->
  <?php
  require_once("lib/init.php");
  ph($error_message);
  ?>
    <!-- 分類入力フォーム-->
    <form action="category_update.php" method="post">
      <!-- 編集前のデータを表示するためにvalueでデフォルト値を設定する -->
        分類名 <input type="text" name="genre_name" value="<?php ph($row["genre_name"]);?>"><br>
        <input type="hidden" name="genre_id" value="<?php ph($row["genre_id"]);?>">
        <input type="submit" value="登録">
        <input type="reset" value="クリア">
    </form>
      <p><a href="category_list_admin.php">一覧に戻る</a></p>
  </div>
</body>
</html>

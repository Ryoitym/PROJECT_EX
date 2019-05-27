<!-- /**
 * このファイルの概要説明
分類登録画面
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
<title>分類登録画面</title>
</head>
<body>
<form action="logout.php" method="get">
    <button type="submit" name="logout" value="logout">ログアウト</button>
</form>
<h1>分類登録画面</h1>
    <!-- エラー表示 -->
    <?php
    ph($error_message);
    ?>
    <form action = "category_insert.php" method="post">
  分類名 <input type="text" name="genre_name"><br>
        <input type="submit" value="登録">
        <input type="reset" value="クリア">
      </form>
      <p><a href="category_list_admin.php">一覧に戻る</a></p>
</body>
</html>

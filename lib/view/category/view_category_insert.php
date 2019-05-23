<!-- /**
 * このファイルの概要説明
分類登録画面
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
<title>分類登録画面</title>
</head>
<body>
<input type="submit" value="ログアウト"><br>
<h1>分類登録画面</h1>

分類名 <form action = "category_insert.php" method="post">
        <input type="text" name="genre_name">
        <input type="submit" value="登録">
        <input type="reset" value="クリア">
      </form>
      <p><a href="category_list_admin.php">分類一覧画面に戻る</a></p>
</body>
</html>

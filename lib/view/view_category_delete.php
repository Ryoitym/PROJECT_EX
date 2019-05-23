<!-- /**
 * このファイルの概要説明
分類削除画面
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　orange juice
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/23
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */ -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>分類削除確認画面</title>
</head>
<body>
分類削除確認画面

削除しますか？
 <form action = "view_category_delete.php" method="post">
      <input type="submit" value="削除">
      <input type="submit" value="キャンセル">
  </form>
  <input type="submit" value="ログアウト"><br>
  削除しました
  <a href="view_category_list_admin.php">分類一覧画面に戻る</a>

</body>
</html>

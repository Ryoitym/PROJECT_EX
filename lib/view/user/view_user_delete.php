<?php
/**
 * このファイルの概要説明
 *　ログアウト画面作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　amaru
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/28
 * レビュー担当者：orange juice
 * レビュー日：2019/05/27
 * バージョン： 1.1
 */

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ユーザ削除画面</title>
<link rel="stylesheet" href= "lib/css/style.css">
</head>
<body class="management">

<div class="m_center">
  <p>削除しました。</p>
  <p><a href="user_list_admin.php">ユーザ一覧画面に戻る</a></p>
  <form action="logout.php" method="get">
    <button type="submit" name="logout" value="logout">ログアウト</button>
</form>
</div>
</body>
</html>

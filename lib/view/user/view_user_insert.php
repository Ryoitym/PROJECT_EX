<?php
/**
 * このファイルの概要説明
 *　ログアウト画面作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　amaru
 * 作成日：　2019/05/22
 * 最終更新日：　2019/05/22
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ユーザ登録画面</title>
</head>
<body>
  <form action="logout.php" method="post">
      <button type="submit" name="logout" value="logout">ログアウト</button>
  </form><br>

<form action="user_insert.php" method="post">
姓: <input type="text" name="name_family"><br>
名: <input type="text" name="name_last"><br>
メールアドレス: <input type="email" name="mail" size="30" maxlength="40"><br>
パスワード:<input type="password" name="password" size="20"><br>
店舗名: <select name="shop_id">
        <option value="1">○○○○</option><br>
        <option value="2">■ ■ ■</option><br>
        <option value="3">△△△</option><br>
        <option value="4">♡♡♡</option><br>
        </select><br>
権限レベル: <select name="acess_lv">
        <option value="1">IT担当者</option><br>
        <option value="2">店長</option><br>
        </select><br>
<input type="submit" value="登録"><br>
<input type="reset" value="クリア"><br>
<p><a href="user_list_admin.php">一覧に戻る</a></p>
</form>
</body>
</html>

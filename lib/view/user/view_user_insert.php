<!--
 * ユーザ情報を登録する画面
 *　データベース作成フォーマット
 *
 *
 * システム名： FFS
 * 作成者：　amaru
 * 作成日：　2019/05/22
 * 最終更新日：　2019/05/22
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.0
 */
-->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ユーザ登録画面</title>
</head>
<body>
<input type="submit" value="ログアウト"><br>
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
<input type="submit" value="クリア"><br>
</form>
</body>
</html>

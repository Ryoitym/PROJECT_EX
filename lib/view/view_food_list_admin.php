<!-- /**
 * このファイルの概要説明
 生鮮食品一覧画面
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
<input type="submit" value="ログアウト">
生鮮食品一覧画面
<!-- 画面上部タブ -->
<a href="">特価商品</a>
<a href="">生鮮食品</a>
<a href="">分類</a>
<a href="">ユーザ</a>
<a href="">店舗</a>

  <!-- 検索窓作成 -->

    <form action="view_food_list_admin.php" method="get">
      検索：<input type="text" name="search">
            <input type="submit" value="検索">
      </form>
      <br>
    <form action = "food_insert.php" method="post">
      <input type="submit" value="新規登録">
    </form>
    <hr>
    <table border="1">
      <tr>
        <th>写真</th>
        <th>食品名</th>
        <th>価格</th>
        <th>説明文書</th>
        <th>栄養素</th>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    <form action = "food_update.php" method="post">
      <input type="submit" value="編集">
    </form>
    <form action = "food_delete.php" method="post">
      <input type="submit" value="削除">
    </form>
    
  <a href="">全て表示</a>
</table>
</body>
</html>

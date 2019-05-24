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
<title>生鮮食品一覧画面(店長)</title>
</head>
<body>
<form action="../../logout.php" method="post">
        <button type="submit" name="logout" value="logout">ログアウト</button>
    </form><br>
<h1>生鮮食品一覧画面</h1>
<!-- 画面上部タブ -->
<a href="">特価商品</a>
<a href="">生鮮食品</a>
<a href="">ユーザ</a>
<a href="">店舗</a>

  <!-- 検索窓作成 -->

    <form action="view_food_list_admin.php" method="get">
      検索：<input type="text" name="search">
            <input type="submit" value="検索">
      </form>
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
        </tr>
        <tr>
          <td>写真</td>
          <td>食品名</td>
          <td>価格</td>
          <td>説明文書</td>
          <td>エネルギー</td>
          <td>タンパク質</td>
          <td>脂質</td>
          <td>炭水化物</td>
          <td>ナトリウム</td>
          <td>カリウム</td>
          <td>表示<input type="radio" name="show" value="表示"></td>
          <td>非表示<input type="radio" name="show" value="非表示"></td>
        </tr>
</table>
  <a href='food_list.php'>トップページへ戻る</a>
  <a href="">全て表示</a>
</body>
</html>

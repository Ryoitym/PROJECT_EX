<!-- /**
 * このファイルの概要説明
 生鮮食品一覧画面
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　orange juice
 * 作成日：　2019/05/22
 * 最終更新日：　2019/05/28
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */ -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>生鮮食品一覧画面(店長)</title>
<link rel="stylesheet" href= "lib/css/style.css">
</head>
<body class="management">

<div class="m_center_food">
<form action="logout.php" method="get">
        <button type="submit" name="logout" value="logout">ログアウト</button>
</form>
<h1>生鮮食品一覧画面</h1>
<!-- 画面上部タブ -->
<a href="special_price_food_list.php">特価商品</a>
<a href="food_list.php">生鮮食品</a>
<a href="user_list.php">ユーザ</a>
<a href="shop_list.php">店舗</a>

  <!-- 検索窓作成 -->

    <form action="food_list.php" method="post">
      検索：<input type="text" name="search">
            <input type="submit" value="検索">
    </form>
      <hr>
  <div  class="food">
    <table border="1">
        <tr>
            <th class="small">写真</th>
            <th class="midium">食品名</th>
            <th class="small">価格</th>
            <th class="text">説明文書</th>
            <th class="small">エネルギー</th>
            <th class="small">タンパク質</th>
            <th class="small">脂質</th>
            <th class="small">炭水化物</th>
            <th class="small">ナトリウム</th>
            <th class="small">カリウム</th>
            <th class="small">表示フラグ</th>
            <th class="small">分類</th>
        </tr>
<?php while($row = $sth->fetch(PDO::FETCH_ASSOC)){ ?>
      <tr>
        <td><img src="lib/images/<?php ph($row["picture"]); ?>"></td>
        <td><?php ph($row["food_name"]); ?></td>
        <td><?php ph($row["food_price"]); ?></td>
        <td><?php ph($row["txt"]); ?></td>
        <td><?php ph($row["calorie"]); ?></td>
        <td><?php ph($row["protein"]); ?></td>
        <td><?php ph($row["lipid"]); ?></td>
        <td><?php ph($row["carb"]); ?></td>
        <td><?php ph($row["natrium"]); ?></td>
        <td><?php ph($row["kalium"]); ?></td>
        <td><?php
                if($row["show_flag"] == 1){
                  ph("表示");
                } else{
                  ph("非表示");
              }?></td>
        <td><?php ph($row["genre_name"]); ?></td>
      </tr>
<?php } ?>
</table>
</div>
  <a href="management_page.php">トップページへ戻る</a>
  <a href="food_list.php">全て表示</a>
</div>
</body>
</html>

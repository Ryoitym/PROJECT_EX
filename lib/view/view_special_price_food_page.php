<?php
/*
* このファイルの概要説明
* 特価品個別ページ画面のビュー
*
* システム名： FFS
* 作成者：　amaru
* 作成日：　2019/05/23
* 最終更新日：　2019/05/27
* レビュー担当者：
* レビュー日：
* バージョン： 1.0
*/
?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="utf-8">
<title>特価品個別ページ画面</title>
<link rel="stylesheet" href="lib/css/style-sample.css">
</head>

<body>
<div class="wrapper">
<header class="header_top_page">
<div class="title">
  <h1><a href="top_page.php"><img src="lib/images/ffs.jpg" alt="FFS"></a></h1>
</div>

<nav class="navigation_main">
<ul>
<li><a href="">特売商品一覧</a></li>
<li><a href="">生鮮食品一覧</a></li>
<li><a href="">店舗一覧</a></li>
</ul>
</nav>
</header><!--/.header-->
<hr>

<!-- 本文（中身・コンテンツ） -->
<div class="content">
  <main>
    <article>
      <h2><a href="shop_page.php?shop_id=<?php ph($special_price_food_value["shop_id"]); ?>"><?php ph($special_price_food_value["shop_name"]); ?>店舗限定！！！</a></h2>
        <!-- 生鮮食品の写真 --
        <img src="https://cdn1.bigcommerce.com/server700/5mvrqhbm/products/2496/images/151378/kamo-eggplant2-s__06471.1552440601.1280.1280.jpg?c=2" width=300px height=300px alt="">
         -->

         <img src="lib/pic/food_pic/<?php ph($special_price_food_value["picture"]) ?>" width=300px height=300px alt="特価商品画像">
        <!-- 商品名 -->
        <h3><?php ph($special_price_food_value["food_name"]); ?></h3>

        <!-- 説明 -->
        <!-- <p>説明</p> -->
        <p><?php ph($special_price_food_value["txt"]); ?></p>

        <!-- 価格 -->
        <h3>定価価格</h3>
        <h3><?php ph($special_price_food_value["food_price"]); ?>円</h3>

        <h3>特価価格</h3>
        <h3><?php ph($special_price_food_value["sale_price"]); ?>円</h3>

    </article>
    <article>
      <!-- 詳細情報 -->
        <table>
          <h2>栄養価</h2>
          <tr>
            <th>エネルギー：</th>
            <th><?php ph($special_price_food_value["calorie"]); ?></th>
            <td>Kcal</td>
          </tr>

          <tr>
            <td>たんぱく質：</td>
            <td><?php ph($special_price_food_value["protein"]); ?></td>
            <td>g</td>
          </tr>

          <tr>
            <td>脂質：</td>
            <td><?php ph($special_price_food_value["lipid"]); ?></td>
            <td>g</td>
          </tr>

          <tr>
            <td>炭水化物：</td>
            <td><?php ph($special_price_food_value["carb"]); ?></td>
            <td>g</td>
          </tr>

          <tr>
            <td>ナトリウム：</td>
            <td><?php ph($special_price_food_value["natrium"]); ?></td>
            <td>mg</td>
          </tr>

          <tr>
            <td>カリウム：</td>
            <td><?php ph($special_price_food_value["kalium"]); ?></td>
            <td>mg</td>
          </tr>
        </table>
    </article>
    <!--特価品一覧画面に戻る-->
    <a href="special_price_food_list_page.php">特価品一覧画面に戻る</a>
</main>
</div><!-- コンテンツはここまで -->

<!-- 最下部（著者情報） -->
<footer>
  <small>Copyright 2019 team FFS</small>
</footer>

</div><!--　wrapperはここまで　-->
</body>
</html>

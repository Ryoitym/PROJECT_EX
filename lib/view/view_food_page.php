<?php
/*
* このファイルの概要説明
* 生鮮食品個別ページ画面のビュー
*
* システム名： FFS
* 作成者：　amaru
* 作成日：　2019/05/27
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
<title>生鮮食品個別ページ画面</title>
<link rel="stylesheet" href="lib/css/style-pc.css">
</head>

<body>
<div class="wrapper">
<header class="header_top_page">
<div class="title">
  <h1><a href="TopPage.php"><img src="lib/images/ffs.jpg" alt="FFS"></a></h1>
</div>

<nav class="navigation_main">
<ul>
<li><a href="">本日の広告の品</a></li>
<li><a href="">当店取り扱い商品</a></li>
<li><a href="">店舗一覧</a></li>
</ul>
</nav>
</header><!--/.header-->
<hr>


<!-- 本文（中身・コンテンツ） -->
<article class="content_second_page">
<h2><!-- アイコン -->
  <!-- 生鮮食品名・特価品名・店舗名はここに -->
  <?php ph($food_value["food_name"]); ?>
</h2>

<!-- 生鮮食品・特価品の画像 -->
<img src="lib/images/<?php ph($food_value["picture"]) ?>" width="400px" height="400px" alt="生鮮食品画像">

<h2>紹介</h2>
<!-- 生鮮食品・特価品・店舗の説明 -->
<p>
  <!-- 説明 -->
  <!-- <p>説明</p> -->
  <h3><?php ph($food_value["txt"]); ?></h3>

</p>
<br>
<br>
<br>
  <!-- 価格 -->
  <h2>定価価格：
    <font color="red"><?php ph(number_format($food_value["food_price"])); ?></font>円</h2>

<!-- 生鮮食品の詳細情報 -->
<!-- 詳細情報 -->
  <table>
    <h2>栄養価</h2>
    <tr>
      <td>エネルギー：</td>
      <td><?php ph($food_value["calorie"]); ?></td>
      <td>Kcal</td>
    </tr>

    <tr>
      <td>たんぱく質：</td>
      <td><?php ph($food_value["protein"]); ?></td>
      <td>g</td>
    </tr>

    <tr>
      <td>脂質：</td>
      <td><?php ph($food_value["lipid"]); ?></td>
      <td>g</td>
    </tr>

    <tr>
      <td>炭水化物：</td>
      <td><?php ph($food_value["carb"]); ?></td>
      <td>g</td>
    </tr>

    <tr>
      <td>ナトリウム：</td>
      <td><?php ph($food_value["natrium"]); ?></td>
      <td>mg</td>
    </tr>

    <tr>
      <td>カリウム：</td>
      <td><?php ph($food_value["kalium"]); ?></td>
      <td>mg</td>
    </tr>
  </table>
</article>

    <!--特価品一覧画面に戻る-->
    <a href="TopPage.php"><button class="btn">トップページに戻る</button></a>
</main>
<!-- コンテンツはここまで -->

<footer class="footer_top_page">
<nav class="navigation_footer">
<ul>
  <li><a href="#sale" class="link">特売商品一覧</a></li>
  <li><a href="#food" class="link">生鮮食品一覧</a></li>
  <li><a href="#shop" class="link">店舗一覧</a></li>
</ul>
</nav>
<small>&copy; 2019 Team FFS </small>
</footer>
</div>

</div><!--　wrapperはここまで　-->
</body>
</html>

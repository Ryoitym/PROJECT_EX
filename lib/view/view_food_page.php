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
<li><a href="">本日の広告の品</a></li>
<li><a href="">当店取り扱い商品</a></li>
<li><a href="">店舗一覧</a></li>
</ul>
</nav>
</header><!--/.header-->
<hr>


<!-- 本文（中身・コンテンツ） -->
<article class="content_second_page">
<h2><!-- アイコン --><img src="lib/images/apple.png" alt=""/>
  <!-- 生鮮食品名・特価品名・店舗名はここに -->
  <?php ph($food_value["food_name"]); ?>
</h2>

<!-- 生鮮食品・特価品の画像 -->
<img src="lib/images/<?php ph($food_value["picture"]) ?>" width="400px" height="400px" alt="生鮮食品画像">

<h3><img src="lib/images/apple.png" alt=""/>紹介</h3>
<!-- 生鮮食品・特価品・店舗の説明 -->
<p>
  <!-- 説明 -->
  <!-- <p>説明</p> -->
  <?php ph($food_value["txt"]); ?>

  <!-- 価格 -->
  <h3><img src="lib/images/apple.png" alt=""/>定価価格：
    <?php ph(number_format($food_value["food_price"])); ?>円</h3>

</p>

<!-- 生鮮食品の詳細情報 -->
<!-- 詳細情報 -->
  <table>
    <h2><img src="lib/images/apple.png" alt=""/>栄養価</h2>
    <tr>
      <th>エネルギー：</th>
      <th><?php ph($food_value["calorie"]); ?></th>
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
    <a href="TopPage.php">トップページに戻る</a>
</main>
</div><!-- コンテンツはここまで -->

<!-- 最下部（著者情報） -->
<footer>
  <small>Copyright 2019 team FFS</small>
</footer>

</div><!--　wrapperはここまで　-->
</body>
</html>

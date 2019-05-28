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
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>生鮮食品個別ページ画面</title>
<link rel="stylesheet" href="css/style-pc.css">


<!--外部記述する場合
<link rel="stylesheet" href="css/style.css">
-->
</head>
<body>
<!-- css -->

<!-- タイトル -->
<header>
<div class="title">
  <h1><a href="TopPage.php"><img src="lib/images/ffs.jpg" alt="FFS"></a></h1>
</div>
</header>
<hr>

<!-- 本文（中身・コンテンツ） -->
<div class="content">
  <main>
    <article>
        <br>
        <!-- 生鮮食品の写真 -->
        <img src="lib/images/<?php ph($food_value["picture"]) ?>" width=300px height=300px alt="生鮮食品画像">

        <!-- 商品名 -->
        <h3><?php ph($food_value["food_name"]); ?></h3>

        <!-- 説明 -->
        <!-- <p>説明</p> -->
        <p><?php ph($food_value["txt"]); ?></p>

        <!-- 価格 -->
        <h3>定価価格</h3>
        <h3><?php ph($food_value["food_price"]); ?>円</h3>

    </article>
    <article>
      <!-- 詳細情報 -->
        <table>
          <h2>栄養価</h2>
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
    <a href="lib/view/view_top_page.php">公開トップページに戻る</a>
</main>
</div><!-- コンテンツはここまで -->

<!-- 最下部（著者情報） -->
<footer>
  <small>Copyright 2019 team FFS</small>
</footer>

</div><!--　wrapperはここまで　-->
</body>
</html>

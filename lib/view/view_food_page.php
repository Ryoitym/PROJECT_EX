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
<!--外部記述する場合
<link rel="stylesheet" href="css/style.css">
-->
</head>
<body>
<!-- css -->
<style type="text/css">
  body {
    font-family:"Lucida Grande", "segoe UI", "ヒラギノ丸ゴ ProN W4", "Hiragino Maru Gothic ProN", Meiryo, Arial, sans-serif;
    line-height: 1.8;
    color: #333;
    background: #E9FDCD;
  }
  img {
      max-width: 100%;
      height: auto;
  }

  p {
      text-shadow: 1px 1px 1px #fff;
  }

  hr {
    width: 100%;
  }

  /*レイアウト
  ----------------------------------------------------*/
  .wrapper {
      max-width: 960px;/*最大コンテンツ幅*/
      margin: 0 auto;
      padding: 10px;
      background-color: white;
      /*background-image:url(../img/bg_body.png);*/
  }

  /*header（最上部）
  ----------------------------------------------------*/
  header {
      margin-bottom: 1.5rem;
  }

  header h1 {
      line-height: 1.2;
      font-size: 2rem;
      font-weight: normal;
      color: #000;
      text-shadow: 1px 1px 1px #fff;
      text-align: center;
  }

  /*中身
  ----------------------------------------------------*/
  .content {
        padding: 0 10px;
  }

  main {
      float: left;
      margin-left: 10px;
      width: 65.9574%;

  }

  main h2 {
        margin: 0.5rem 0;
        padding: 0 0 0 10px;
        border-left: 3px solid #333;
        font-size: 1.5rem;
        font-weight: normal;
        text-shadow: 1px 1px 1px #fff;
  }

  main {
        margin-bottom: 3rem;

  }

  /*最下部
  ----------------------------------------------------*/
  footer {
    clear: both;
    padding: 40px 0;
    background: #dedede;
    color: grey;
    text-align: center;
  }
</style>

<div class="wrapper">
<!-- タイトル -->
<header>
  <h1>FFS</h1>
</header>
<hr>

<!-- 本文（中身・コンテンツ） -->
<div class="content">
  <main>
    <article>
        <?php ph($food_value["picture"]); ?>
        <br>
        <!-- 生鮮食品の写真 --
        <img src="https://cdn1.bigcommerce.com/server700/5mvrqhbm/products/2496/images/151378/kamo-eggplant2-s__06471.1552440601.1280.1280.jpg?c=2" width=300px height=300px alt="">
         -->
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
    <a href="view_top_page.php">公開トップページに戻る</a>
</main>
</div><!-- コンテンツはここまで -->

<!-- 最下部（著者情報） -->
<footer>
  <small>Copyright 2019 team FFS</small>
</footer>

</div><!--　wrapperはここまで　-->
</body>
</html>

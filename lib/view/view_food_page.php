<?php
/*
 * システム名： FFS
 * 作成者：　amaru
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/23
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

  #slide {
    clear: both;
    padding: 40px 0;
    background: #dedede;
    color: grey;
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
      <?php
       require_once("../function.php");
        $dbh=connectDb();

        try{
          $sql = "SELECT * FROM ffs_db.food ";
          $sth = $dbh->prepare($sql);

          $sth->execute();
        }
        catch (PDOException $e) {
          exit("SQL発行エラー：{$e->getMessage()}");
      }
      ?>

      <h2>食品名:</h2>
        <?php $row = $sth->fetch(PDO::FETCH_ASSOC) ?>
      <article>
          <?php
              switch($_GET['food_id']){
                case $i:?>
            <?php ph($_GET["food_name"]);?><br>

            </div>
              <?php break;}?>
    </article>
    <!--公開トップページ画面の生鮮食品欄に飛ぶ？-->
    <a href="view_top_page.php">生鮮食品一覧画面に戻る</a>
</main>
</div><!-- コンテンツはここまで -->

<!-- 最下部（著者情報） -->
<footer>
  <small>Copyright 2019 team FFS</small>
</footer>

</div><!--　wrapperはここまで　-->
</body>
</html>

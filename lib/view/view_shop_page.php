<?php
/**
 * このファイルの概要説明
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　appleCandy
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/23
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>店舗個別ページ画面</title>
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

  nav ul {
       margin: 0;
       padding: 0;
       list-style-type: none;
  }

  nav ul li {
       float: left;
       width: 25%; /*各メニューの幅*/
       text-align: center;
       text-shadow: 1px 1px 1px #fff;
  }

  nav ul li a{
       display: block;
       padding: 10px 0;
       color: #666;
       text-decoration: none;
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

  .box{
    display: inline-block;
    width: 150px;
    height: 150px;
    margin: 0 auto;
    padding: 10px;
    background-color: #dedede;
  }

  .box_shop{
    display: inline-block;
    width: 500px;
    height: 200px;
    margin: 0 auto;
    padding: 10px;
    background-color: #dedede;
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
<!-- タイトル & ナビゲーション & 特売商品欄 -->
<header>
<a href='view_top_page.php'><h1>FFS</h1></a>

<!-- 特売商品欄(スライダー機能必要) -->
  <div id="slide">
    <a href="#"></a>
  </div>
</header>


<!-- 本文（中身・コンテンツ） -->
<div class="content">
  <main>
  <h2>特売商品一覧</h2>
  <article>
  <?php 
  // SQLを構築
        require_once("../function.php");
        $dbh = connectDb();

        $sql = "SELECT * FROM ffs_db.sale t1 
                INNER JOIN ffs_db.food t2 
                ON t1.food_id = t2.food_id 
                ";
        
        $sth = $dbh->prepare($sql); // SQLを準備

        // プレースホルダに値をバインド
        //GETで飛んできたIDのレコードを取ってくる
        //$sth->bindValue(":sale_id", $_POST["sale_id"]);

        $sth->execute();
  
  for($i=0;$i<1;$i++){

    ?><div class="box">
        <!-- 生鮮食品の写真 -->
        <img src="#" alt="">

      <?php foreach ($sth as $value) {
        if($_GET["shop_id"]==$value["shop_id"]){echo $value["food_name"];
        echo $value["txt"];?><br><?php }}
      ?>
      <br>
      
      
      <?php }?>
      <?php ?>
      </div>

    </article>
    <?php 
      require_once("../function.php");
      $dbh=connectDb();

      try{
        $sql = "SELECT * FROM ffs_db.shop ";
        $sth = $dbh->prepare($sql);

        $sth->execute();
      }
      catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }
    ?>
    <article>
      <h2>店舗名</h2>
      <!-- 店舗リンク -->
      <?php $row = $sth->fetch(PDO::FETCH_ASSOC) ?>
      <div class="box_shop">
      <!--仮で999まで表示-->
        <?php for($i=0;$i<1000;$i++){
            switch($_GET['shop_id']){
              case $i:?>
              <div class="box_shop">
          <?php ph($_GET["shop_name"]);?></td>店<br>
          住所：<?php ph($_GET['address'])?><br>
          電話番号：<?php ph($_GET['tel'])?><br>
          </div>
            <?php break;}
          }?>
        
      </div>
    </article>
    <br>
    <a href='view_top_page.php'>トップページへ戻る</a>
</main>
</div><!-- コンテンツはここまで -->

<!-- 最下部（著者情報） -->
<footer>
  <small>Copyright 2019 team FFS</small>
</footer>

</div><!--　wrapperはここまで　-->
</body>
</html>
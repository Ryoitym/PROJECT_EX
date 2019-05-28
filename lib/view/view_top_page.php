<?php
// $food = get_food($_GET);
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
<title>公開トップページ画面</title>
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
    width: 50px;
    height: 50px;
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
  <h1>FFS</h1>
  <hr>
  <nav>
    <ul>
      <li><a href="#">特売</a></li>
      <li><a href="#">生鮮食品</a></li>
      <li><a href="#">店舗</a></li>
    </ul>
  </nav>

<!-- 特売商品欄(スライダー機能必要) -->
  <div id="slide">
    <a href="#">もっと見る</a>
  </div>
</header>


<!-- 本文（中身・コンテンツ） -->
<div class="content">
  <main>
    <article>
      <h2>生鮮食品一覧</h2>

      <!-- 分類 -->
      検索：<form action="TopPage.php"method="post">
      <select name="genre_id">
            <option value="0"></option>
            <option value="1">肉</option>
            <option value="2">野菜</option>
            <option value="3">魚</option>
      </select>
      <input type="text" name="food_name">
      <input type="submit" value="検索">
      <br>

      <!-- 栄養価 -->
      栄養価: <br><select name="eiyoka">
              <option value=""></option>
              <option value="calorie">エネルギー</option>
              <option value="protein">たんぱく質</option>
              <option value="lipid">脂質</option>
              <option value="carb">炭水化物</option>
              <option value="natrium">ナトリウム</option>
              <option value="kalium">カリウム</option>
              </select><br>
      </form>

<?php
  require_once("lib/function.php");
?>
<?php //var_dump($sth->fetchAll(PDO::FETCH_ASSOC));//exit();?>
<?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {?>
<tr>
<div class="box_food">
  <a href="view_food_page.php"><td><?php ph($row["food_name"]);?></td><br>
</div>
    <td><form action="view_food_page.php?food_id=<?php ph($row['food_id'])?>
      &food_name=<?php ph($row['food_name']);?>
      &food_price=<?php ph($row['food_price']);?>
      &txt=<?php ph($row['txt']);?>"
    method="post">
  </td>
</tr>
<?php }

?>

    </article>

    <article>
    <?php
     require_once("lib/init.php");
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


      <h2>店舗一覧</h2>
      <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {?>
    <tr>
    <div class="box_shop">
        <a href="view_shop_page.php"><td><?php ph($row["shop_name"]);?></td>店<br>
      </div>
          <!--仮で送信ボタン追加-->
          <td><form action="view_shop_page.php?shop_id=<?php
            ph($row['shop_id'])?>&shop_name=<?php ph($row['shop_name']);?>
            &address=<?php ph($row['address']);?>
            &tel=<?php ph($row['tel']);?>"
             method="post">
      <input type="submit" value="送信"></form></td>
    </tr>
    <?php } ?>

    </article>
</main>
</div><!-- コンテンツはここまで -->

<!-- 最下部（著者情報） -->
<footer>
  <small>Copyright 2019 team FFS</small>
</footer>

</div><!--　wrapperはここまで　-->
</body>
</html>

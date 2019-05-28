<?php
/**
 * このファイルの概要説明
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　appleCandy
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/28
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

<div class="wrapper">
<header class="header_top_page">
<div class="title">
  <h1><a href="index.php"><img src="../../view_top_page/images/ffs.jpg" alt="FFS"></a></h1>
</div>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="utf-8">
<title>FFS is Fresh foods Shop</title>
<link rel="stylesheet" href="css/style-pc.css">

</head>

<body>
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

        $sth->execute();

  for($i=0;$i<1;$i++){

    ?><div class="">
        <!-- 生鮮食品の写真 -->
        <img src="#" alt="">

      <?php foreach ($sth as $value) {
        if($value['shop_id']==$_GET['shop_id']){echo $value["food_name"];?><br><?php
        echo $value["txt"];?><br><?php }
      }
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
        $sql = "SELECT * FROM ffs_db.shop , ";
        $sql .= "ffs_db.sale t1
                INNER JOIN ffs_db.food t2
                ON t1.food_id = t2.food_id
                ";
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
          <?php ph($_GET["shop_name"]);?></td><br>
          住所：<?php ph($_GET['address'])?><br>
          電話番号：<?php ph($_GET['tel'])?><br>
          </div>
            <?php break;}
          }?>

      </div>
    </article>
    <br>
    <a href='../../view_top_page/view_top_page.php'>トップページへ戻る</a>
</main>
</div>

<div id="navToggle">
  <div> <span></span> <span></span> <span></span> </div>
</div><!--#navToggle END-->

<small>&copy; 2019 Team FFS </small>
</footer>

</div><!--/.wrapper-->

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript">
//スライド設定
function slideSwitch() {
    var $active = $('#slideshow IMG.active');
    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');
    $active.addClass('last-active');
    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 4000 );
});

//トグルメニュー
$(function() {
	$('#navToggle').click(function(){
		$('header').toggleClass('openNav');
	});
});
</script>

</body>

</html>

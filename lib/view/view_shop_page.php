<?php
/*
* このファイルの概要説明
*　公開店舗個別ページのビュー
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
<title>生鮮食品個別ページ画面</title>
<link rel="stylesheet" href="lib/css/style-pc.css">
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

<div class="content">
  <main>
  <h2><?php ph($_GET["shop_name"]);?>の本日の広告の品！！</h2>
  <article>
  <?php
  // SQLを構築
        require_once("lib/function.php");
        $dbh = connectDb();

        $sql = "SELECT * FROM ffs_db.sale t1
                INNER JOIN ffs_db.food t2
                ON t1.food_id = t2.food_id
                ";

        $sth = $dbh->prepare($sql); // SQLを準備

        $sth->execute();
?>
<?php require_once("lib/model/SpecialPriceFood.php");
        // モデルクラスのインスタンスを生成
    $special_price_food = new SpecialPriceFood($dbh);

    // 今日の特価商品一覧の連想配列を得て、変数$special_price_food_today_listに代入
    $today = date("Y-m-d");
    $special_price_food_today_list = $special_price_food->getDataSaleFoodShoppArrayAtDate($today);


    // モデルファイルを読み込む
    require_once("lib/model/Shop.php");

    // モデルクラスのインスタンスを生成
    $shop_i = new SpecialPriceFood($dbh);

    $shop_list = $shop_i->getDataShopArray();
    ?>
        <div class="">
        <!-- 生鮮食品の写真 -->
        
        <?php foreach ($special_price_food_today_list as $special_price_food_today) { ?>
          <?php if($_GET["shop_id"]==$special_price_food_today["shop_id"]){?>
              <section class="section_top_page">
              <?php
              $shop_url = "shop_page.php?shop_id=" .
              $special_price_food_today["shop_id"] .
              "&shop_name=" .
              $special_price_food_today["shop_name"] .
              "&address=" .
              $special_price_food_today["address"] .
              "&tel=" .
              $special_price_food_today["tel"];?>

              <a href="<?php ph($shop_url) ?>"></a>
              <a href="food_page.php?food_id=<?php ph($special_price_food_today["food_id"]); ?>">
                <img src="lib/images/<?php ph($special_price_food_today["picture"]); ?>" alt="<?php ph($special_price_food_today["food_name"]);?>の画像" width="300" height="300">
                <h2><?php ph($special_price_food_today["food_name"]); ?></h2>

                <p>定価 ￥<?php ph($special_price_food_today["food_price"]); ?></p>
                <p>特価 ￥<?php ph($special_price_food_today["sale_price"]); ?></p>
              </a>
              <!-- 商品の説明文 -->
              <p><?php ph($special_price_food_today["txt"]); ?></p>
              </section>
        <?php }?>
        <?php }?>

      
      <br>
      </div>

    </article>
<?php
     require_once("lib/function.php");
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
<div>
    <article>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
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
    <a href='TopPage.php'>トップページへ戻る</a>
</main>
</div>
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

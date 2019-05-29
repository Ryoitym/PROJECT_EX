<?php
/*
 * システム名： FFS
 * 作成者：　amaru
 * 作成日：　2019/05/26
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
<title>FFS is Fresh foods Shop</title>
<link rel="stylesheet" href="lib/css/style-pc.css">

</head>

<body>


<div class="wrapper">
<header class="header_top_page">
<div class="title">
  <h1><a href="TopPage.php" id="top"><img src="lib/images/ffs.jpg" alt="FFS"></a></h1>
</div>

<nav class="navigation_main">
<ul>
  <li><a href="#today" class="link">本日の広告の品</a></li>
  <li><a href="#item" class="link">当店取り扱い商品</a><li>
  <li><a href="#shop" class="link">店舗一覧</a></li>
</ul>
</nav>
</header><!--/.header-->

<!-- スライダー -->
<div class="main_visual">
<div id="slideshow">
<img src="lib/images/01.jpg" alt="Slideshow Image 1" class="active">
<img src="lib/images/02.jpg" alt="Slideshow Image 2">
<img src="lib/images/03.jpg" alt="Slideshow Image 3">
<img src="lib/images/04.jpg" alt="Slideshow Image 4">
</div>
</div><!--/.main_visual-->

<div class="main_area">
<font color=#5AAD5A id="today"><h2>本日の広告の品！！</h2></font>

<!-- image 400px x 400px -->

<?php foreach ($special_price_food_today_list as $special_price_food_today) { ?>
  <section class="section_top_page">
  <?php
  $shop_url = "shop_page.php?shop_id=" .
              $special_price_food_today["shop_id"] .
              "&shop_name=" .
              $special_price_food_today["shop_name"] .
              "&address=" .
              $special_price_food_today["address"] .
              "&tel=" .
              $special_price_food_today["tel"];
  ?>

  <a href="<?php ph($shop_url) ?>"><h4 class="spf_shop_name"><?php ph($special_price_food_today["shop_name"]); ?></h4> </a>
  <a href="<?php ph($shop_url) ?>">
    <img src="lib/images/<?php ph($special_price_food_today["picture"]); ?>" alt="<?php ph($special_price_food_today["food_name"]);?>の画像" width="300" height="300">
    <h2 class="spf_name"><?php ph($special_price_food_today["food_name"]); ?></h2>

    <p>定価 ￥<?php ph(number_format($special_price_food_today["food_price"])); ?></p>
    <p>特価 ￥<?php ph(number_format($special_price_food_today["sale_price"])); ?></p>
  </a>
  <!-- 商品の説明文 -->
  <p class="sph_food_description"><?php ph($special_price_food_today["txt"]); ?></p>
  </section>
<?php } ?>

<?php
$dbh = connectDb();
require_once("lib/model/Food.php");
//モデルクラスのインスタンスを生成
$food = new Food($dbh);

$show_food_id = @$_GET["genre_id"];
$genre_list = $food->getDataGenreArray($show_food_id);
?>
</div>

<div class="main_area">
  <font = color=#5AAD5A id="item"><h2>当店取り扱い商品</h2></font>
  <!-- 分類 -->
  検索：<form action="TopPage.php"method="post">
  <div class="cp_ipselect cp_sl02">
  <select name="genre_id">
  <option value="">選択してください</option>
  <?php foreach ($genre_list as $genre) {?>
          <option value="<?php ph($genre["genre_id"]);?>"

          >
              <?php ph($genre["genre_name"]); ?>
          </option>
          <br>
  <?php } ?>
  </select>
</div>
<div class="cp_iptxt">
    <input type="text" name="food_name" placeholder="生鮮食品名を入力してください。">
</div>
  <input type="submit" class="btn" value="検索">
  <br>

  <!-- 栄養価 -->
  栄養価: <br>
          <div class="cp_ipselect cp_sl02">
          <select name="eiyoka">
            <option value="">選択してください</option>
            <option value="calorie">エネルギー</option>
            <option value="protein">たんぱく質</option>
            <option value="lipid">脂質</option>
            <option value="carb">炭水化物</option>
            <option value="natrium">ナトリウム</option>
            <option value="kalium">カリウム</option>
        </select></div> <input type="submit" class="btn" value="検索"><br>
        <a href="TopPage.php"><button class="btn">生鮮食品を全て表示する</button></a>
  </form>

<!-- image 400px x 400px -->


<?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {?>
<section class="section_top_page">
  <a href="food_page.php?food_id=<?php ph($row['food_id'])?>&food_name=<?php ph($row['food_name']);?>&food_price=<?php ph($row['food_price']);?>">
    <img src="lib/images/<?php ph($row["picture"]); ?>" alt="<?php ph($row["food_name"]);?>の画像" width="300" height="300"><br>
    <?php ph($row["food_name"]);?><br>
    定価 ￥<?php ph(number_format($row["food_price"])); ?>
    <br>
    <?php
    switch(@$_POST["eiyoka"]){
      case "calorie";
        print "エネルギー:";
        break;
      case "protein";
        print "たんぱく質:";
        break;
      case "lipid";
        print "脂質:";
        break;
      case "carb";
        print "炭水化物:";
        break;
      case "natrium";
        print "ナトリウム:";
        break;
      case "kalium";
        print "カリウム:";
        break;
      default;
    }
     ?>
     <?php ph(@$row[$_POST["eiyoka"]]); ?>
    <?php
    switch(@$_POST["eiyoka"]){
      case "calorie";
        print "Kcal";
        break;
      case "protein";
        print "g";
        break;
      case "lipid";
        print "g";
        break;
      case "carb";
        print "g";
        break;
      case "natrium";
        print "mg";
        break;
      case "kalium";
        print "mg";
        break;
      default;
    }
    ?>
    </a>

    <p><?php ph($row["txt"]); ?></p>
    </section>
</section>
<?php }?>
</div>


<div class="main_area">
<font = color=#5AAD5A id="shop"><h2>店舗一覧</h2></font>

<!-- image 400px x 400px -->
<?php foreach ($shop_list as $shop) {?>
    <tr>
    <div class="box_shop">
        <a href="shop_page.php?shop_id=<?php
        ph($shop['shop_id']);?>&shop_name=<?php ph($shop['shop_name']);?>
        &address=<?php ph($shop['address']);?>
        &tel=<?php ph($shop['tel']);?>"
        method="post"><td><?php ph($shop["shop_name"]);?></td><br>
      </div>

    </tr>
    <?php } ?>

</div>


<footer class="footer_top_page">
<nav class="navigation_footer">
<ul>
  <li><a href="#today" class="link">本日の広告の品</a></li>
  <li><a href="#item" class="link">当店取り扱い商品</a></li>
  <li><a href="#shop" class="link">店舗一覧</a></li>
  <li><a href="#top" class="link">先頭に戻る</a></li>
</ul>
</nav>
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

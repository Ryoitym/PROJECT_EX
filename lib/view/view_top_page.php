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
  <h1><a href=""><img src="lib/images/ffs.jpg" alt="FFS"></a></h1>
</div>

<div id="navToggle">
  <div> <span></span> <span></span> <span></span> </div>
</div><!--#navToggle END-->

<nav class="navigation_main">
<ul>
  <li><a href="">特売商品一覧</a></li>
  <li><a href="＃">生鮮食品一覧</a><li>
  <li><a href="＃">店舗一覧</a></li>
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
<font = color="green"><h2>特価商品一覧</h2></font>

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

  <a href="<?php ph($shop_url) ?>"><?php ph($special_price_food_today["shop_name"]); ?> </a>
  <a href="food_page.php?food_id=<?php ph($special_price_food_today["food_id"]); ?>">
    <img src="lib/images/<?php ph($special_price_food_today["picture"]); ?>" alt="<?php ph($special_price_food_today["food_name"]);?>の画像" width="300" height="300">
    <h2><?php ph($special_price_food_today["food_name"]); ?></h2>

    <p>定価 ￥<?php ph($special_price_food_today["food_price"]); ?></p>
    <p>特価 ￥<?php ph($special_price_food_today["sale_price"]); ?></p>
  </a>
  <!-- 商品の説明文 -->
  <p><?php ph($special_price_food_today["txt"]); ?></p>
  </section>
<?php } ?>


</div>

<div class="main_area">
  <font = color="green"><h2>生鮮食品一覧</h2></font>

  <!-- 分類 -->
  検索：<form action="TopPage.php"method="post">
  <select name="genre_id">
        <option value="0">選択してください</option>
        <option value="1">野菜</option>
        <option value="2">肉</option>
        <option value="3">魚</option>
  </select>
  <input type="text" name="food_name">
  <input type="submit" value="検索">
  <br>

  <!-- 栄養価 -->
  栄養価: <br><select name="eiyoka">
          <option value="">選択してください</option>
          <option value="calorie">エネルギー</option>
          <option value="protein">たんぱく質</option>
          <option value="lipid">脂質</option>
          <option value="carb">炭水化物</option>
          <option value="natrium">ナトリウム</option>
          <option value="kalium">カリウム</option>
          </select> <input type="submit" value="検索"><br>
  </form>

<!-- image 400px x 400px -->


<?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {?>
<section class="section_top_page">
  <img src="lib/images/<?php ph($row["picture"]); ?>" alt="<?php ph($row["food_name"]);?>の画像" width="300" height="300"><br>
  <a href="food_page.php?food_id=<?php ph($row['food_id'])?>&food_name=<?php ph($row['food_name']);?>&food_price=<?php ph($row['food_price']);?>">
    <?php ph($row["food_name"]);?><br></a>
    定価 <?php ph($row["food_price"]); ?>
</section>
<?php }?>
</div>


<div class="main_area">
<font = color="green"><h2>店舗一覧</h2></font>

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
  <li><a href="index.html">特売商品一覧</a></li>
  <li><a href="＃">生鮮食品一覧</a></li>
  <li><a href="＃">店舗一覧</a></li>
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

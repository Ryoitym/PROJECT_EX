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

<div class="wrapper">
<header class="header_top_page">
<div class="title">
  <h1><a href="index.php"><img src="lib/images/ffs.jpg" alt="FFS"></a></h1>
</div>

<div id="navToggle">
  <div> <span></span> <span></span> <span></span> </div>
</div><!--#navToggle END-->

<nav class="navigation_main">
<ul>
  <li><a href="index.html">特売商品一覧</a></li>
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
<section class="section_top_page">
<a href="special_price_food_page.php?sale_id=1">

<h2><?php foreach ($sth as $value) {
    ?><img src="lib/images/<?php ph(($value['picture']));?>" alt="sale1">
        <?php if($value["sale_id"]==1){ph($value["food_name"]); break;?><br>
        <?php
        }
      }?> 1パック</h2>
¥<?php foreach ($sth as $value) {
        if($value["sale_id"]==1){ph($value["sale_price"]); break;?><br>
        <?php
        }
      }?>

</a>
</section>

<section class="section_top_page">
<a href="＃">

<h2><?php foreach ($sth as $value) {
  ?><img src="lib/images/<?php ph(($value['picture']));?>" alt="sale2">
        <?php if($value["sale_id"]==2){ph($value["food_name"]); ?><br>
        <?php
        }
        break;
      }?> 1パック<?php ph(($value['picture']));?></h2>
<p>￥<?php foreach ($sth as $value) {
        if($value["sale_id"]==2){ph($value["sale_price"]); ?><br>
        <?php
        }
        break;
      }?></p>
</a>
</section>

<section class="section_top_page">
<a href="＃">
<img src="lib/images/carrot.jpg" alt="にんじん">
<h2>にんじん 1パック 400g</h2>
<p>￥150</p>
</a>
</section>

<section class="section_top_page">
<a href="＃">
<img src="lib/images/potato.jpg" alt="じゃがいも">
<h2>じゃがいも 1パック 500g</h2>
<p>￥181</p>
</a>
</section>

</div>

<div class="main_area">
  <font = color="green"><h2>生鮮食品一覧</h2></font>

  <!-- 分類 -->
  <select name="genre_name">
        <option value="1">肉</option><br>
        <option value="2">野菜</option><br>
        <option value="3">魚</option><br>
        <option value="4">その他</option><br>
  </select>

  <!-- 栄養価 -->
  栄養価: <select name="eiyoka">
          <option value="calorie">エネルギー</option><br>
          <option value="protein">たんぱく質</option><br>
          <option value="lipid">脂質</option><br>
          <option value="carb">炭水化物</option><br>
          <option value="natrium">ナトリウム</option><br>
          <option value="kalium">カリウム</option><br>
          </select><br>

  <input type="text" name="keyword">
  <input type="submit" value="検索"><br>

<!-- image 400px x 400px -->
<section class="section_top_page">
<a href="../food_page.php?food_id=3">

<h2> <?php foreach ($sth as $value) {
  ?><img src="lib/images/<?php ph(($value['picture']));?>" alt="">
        <?php if($value["food_id"]==1){ph($value["food_name"]); break;?><br>
        <?php
        }
      }?>1個</h2>
<p>￥<?php foreach ($sth as $value) {
        ph($value["food_price"]); continue;?><br>
        <?php
        }
      ?></p>
</a>
</section>

<section class="section_top_page">
<a href="＃">
<img src="lib/images/onion.jpg" alt="玉ねぎ">
<h2>玉ねぎ 1パック 500g</h2>
<p>￥169</p>
</a>
</section>

<section class="section_top_page">
<a href="＃">
<img src="lib/images/carrot.jpg" alt="にんじん">
<h2>にんじん 1パック 400g</h2>
<p>￥150</p>
</a>
</section>

<section class="section_top_page">
<a href="＃">
<img src="lib/images/potato.jpg" alt="じゃがいも">
<h2>じゃがいも 1パック 500g</h2>
<p>￥181</p>
</a>
</section>

<section class="section_top_page">
<a href="＃">
<img src="lib/images/komatsuna.jpg" alt="小松菜">
<h2>小松菜 1パック 180g</h2>
<p>￥78</p>
</a>
</section>

<section class="section_top_page">
<a href="＃">
<img src="lib/images/melon.jpg" alt="マスクメロン">
<h2>マスクメロン 1個</h2>
<p>￥5400</p>
</a>
</section>

<section class="section_top_page">
<a href="＃">
<img src="lib/images/daikon.jpg" alt="大根">
<h2>大根 1本</h2>
<p>￥214</p>
</a>
</section>

<section class="section_top_page">
<a href="＃">
<img src="lib/images/chives.jpg" alt="にら">
<h2>にら 1パック 100g</h2>
<p>￥113</p>
</a>
</section>

<section class="section_top_page">
<a href="＃">
<img src="lib/images/1.jpg" alt="とろとろ炒めなす">
<h2>とろとろ炒めなす 2個</h2>
<p>￥379</p>
</a>
</section>

<section class="section_top_page">
<a href="＃">
<img src="lib/images/tomato.jpg" alt="奏トマト">
<h2>奏トマト 1パック 300g</h2>
<p>￥980</p>
</a>
</section>

<section class="section_top_page">
<a href="＃">
<img src="lib/images/hakusai.jpg" alt="白菜">
<h2>白菜 1/2個 800g</h2>
<p>￥232</p>
</a>
</section>

<section class="section_top_page">
<a href="＃">
<img src="lib/images/enoki.jpg" alt="えのき">
<h2>えのき 1パック 180g</h2>
<p>￥72</p>
</a>
</section>

<section class="section_top_page">
<a href="＃">
<img src="lib/images/orange.jpg" alt="ネーブルオレンジ">
<h2>ネーブルオレンジ 3個</h2>
<p>￥285</p>
</a>
</section>

<section class="section_top_page">
<a href="＃">
<img src="lib/images/egg.jpg" alt="ふじたま">
<h2>[冷蔵] ふじたま 10個</h2>
<p>￥215</p>
</a>
</section>

<section class="section_top_page">
<a href="＃">
<img src="lib/images/pepper.jpg" alt="パプリカ">
<h2>パプリカ 1パック 250g</h2>
<p>￥432</p>
</a>
</section>

<section class="section_top_page">
<a href="＃">
<img src="lib/images/kiwi.jpg" alt="ゴールド キウイフルーツ">
<h2>ゴールド キウイフルーツ 2個</h2>
<p>￥346</p>
</a>
</section>

</div>

<?php
     require_once("lib/function.php");
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

<div class="main_area">
<font = color="green"><h2>店舗一覧</h2></font>

<!-- image 400px x 400px -->
<?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {?>
    <tr>
    <div class="box_shop">
        <a href="lib/view/view_shop_page.php?shop_id=<?php
        ph($row['shop_id']);?>&shop_name=<?php ph($row['shop_name']);?>
        &address=<?php ph($row['address']);?>
        &tel=<?php ph($row['tel']);?>"
        method="post"><td><?php ph($row["shop_name"]);?></td><br>
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

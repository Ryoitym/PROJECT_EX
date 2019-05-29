<?php
/**
* このファイルの概要説明
* 特価商品登録画面のビュー
*
* このファイルの詳細説明
*
* システム名： FFS
* 作成者：　nosu10101
* 作成日：　2019/05/27
* 最終更新日：　2019/05/28
* レビュー担当者：
* レビュー日：
* バージョン： 1.1
*/
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>特価商品登録画面</title>
    <link rel="stylesheet" href= "lib/css/style.css">
    </head>
    <body class="management">

    <div class="m_center">
        <form action="logout.php" method="get">
            <button type="submit" name="logout" value="logout">ログアウト</button>
        </form>

        <!-- エラーメッセージ -->
        <?php print $error_message;?>

        <form action="special_price_food_insert.php" method="post">

        店舗名:
            <select name="shop_select">
                <?php foreach ($shop_list as $shop) {?>
                        <option value="<?php ph($shop["shop_id"]);?>">
                            <?php ph($shop["shop_name"]); ?>
                        </option>
                        <br>
                <?php } ?>
            </select>
        <br>

        日付
        <select name="date_select">
                <?php for ($i = 0 ; $i < 8 ; $i++) {?>
                    <?php $temp_date = date("Y-m-d",strtotime("+" . $i . " day")); ?>
                    <option value="<?php print $temp_date; ?>">
                    <?php print $temp_date; ?>
                    </option>
                    <br>
                <?php } ?>
        </select>
        <br>

        生鮮食品名:
            <select name="food_select">
                <?php foreach ($food_list as $food) {?>
                        <option value="<?php ph($food["food_id"]);?>">
                            <?php ph($food["food_name"]); ?>
                        </option>
                        <br>
                <?php } ?>
            </select>
        <br>

        価格 <input type="text" name="sale_price">

        <br>
            <input type="submit" value="登録" name="edit">
            <input type="submit" value="クリア" name="clear">
        </form>
        <a href="special_price_food_list.php">一覧に戻る</a>
      </div>
    </body>
</html>

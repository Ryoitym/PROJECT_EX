<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>特価商品登録画面</title>
    </head>
    
    <body>
        <input type="submit" value="ログアウト"> <br>

        <!-- エラーメッセージ -->
        <?php print $error_message;?>

        <form action="special_price_food_insert.php" method="post">

        店舗名:
            <select name="shop_select">
                <?php foreach ($shop_list as $shop) {?>
                        <option value="<?php print $shop["shop_id"];?>">
                            <?php print $shop["shop_name"]; ?>
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
                        <option value="<?php print $food["food_id"];?>">
                            <?php print $food["food_name"]; ?>
                        </option>
                        <br>
                <?php } ?>
            </select>
        <br>

        価格 <input type="text" name="sale_price">
        
        <br>
        <input type="submit" value="登録">
        <input type="submit" value="クリア">
        </form>
    </body>
</html>

<?php
/**
 * このファイルの概要説明
 * 特価商品編集画面
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　nosu10101
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/24
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */ 
?>

 <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>特価商品編集画面</title>
    </head>

    <body>

        <input type="submit" value="ログアウト"><br>

        <!-- エラーメッセージ -->
        <?php print $error_message;?>

        <form action="special_price_food_update.php" method="post">

            生鮮食品名: 
            <select name="food_select">
                <?php foreach ($food_list as $food) {?>
                        <option value="<?php print $food["food_id"];?>" 
                            <?php 
                            if (isset($special_price_food_value[0])) {
                                if ($special_price_food_value[0]["food_id"] == $food["food_id"]) {
                                    print "selected";
                                }
                            } 
                            ?>
                        >
                            <?php print $food["food_name"]; ?>
                        </option>
                        <br>
                <?php } ?>
            </select><br>

            特価価格:<input type="text" name="sale_price" size="20" 
                        <?php 
                            if (isset($special_price_food_value[0])) {
                                print "value=\"{$special_price_food_value[0]["sale_price"]}\"";
                            } 
                        ?>
                    >
            <br>

            日付:
            <select name="date_select">
            <?php for ($i = 0 ; $i < 8 ; $i++) {?>
                <?php $temp_date = date("Y-m-d",strtotime("+" . $i . " day")); ?>
                <option value="<?php print $temp_date; ?>"
                    <?php 
                        if (isset($special_price_food_value[0])) {
                            if ($special_price_food_value[0]["date"] == $temp_date) {
                                print " selected";
                            }
                        } 
                    ?>
                
                >
                <?php print $temp_date; ?>
                </option>
                <br>
            <?php } ?>
            </select><br>

            店舗名:
            <select name="shop_select">
                <?php foreach ($shop_list as $shop) {?>
                        <option value="<?php print $shop["shop_id"];?>" 
                        <?php 
                            if (isset($special_price_food_value[0])) {
                                if ($special_price_food_value[0]["shop_id"] == $shop["shop_id"]) {
                                    print " selected";
                                }
                            } 
                        ?>
                        >
                            <?php print $shop["shop_name"]; ?>
                        </option>
                        <br>
                <?php } ?>
            </select><br>

            <input type="submit" value="編集"><br>
            <input type="submit" value="クリア"><br>

            
            
        </form>
    </body>
</html>


<?php
/**
* このファイルの概要説明
* 特価商品編集画面のコントローラ
*　
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
    require_once("lib\init.php");
    $dbh = connectDb();

    // モデルファイルを読み込む
    require_once("lib/model/SpecialPriceFood.php");

    // モデルクラスのインスタンスを生成
    $special_price_food = new SpecialPriceFood($dbh);

    $result = $special_price_food->getDataFoodArray();

    $food_list = $special_price_food->getDataFoodArray();
    $shop_list = $special_price_food->getDataShopArray();

    $error_message = "";


    // 編集対象のidを遷移前のページからgetで得る
    $sale_id_r = $_GET["sale_id"];

    if (!empty($_POST)){
        
        // 選択日の前後の日付で、同生鮮商品かつ同店舗の特価価格商品の有無を表す。true：有　false：無
        $flag_yesterday = false;
        $flag_tomorrow = false;
        $flag_today = false;

        // セレクトボックスで選択した日付と前後の日付の入った連想配列を作成
        $dates = $special_price_food::getYesterdayTodayTomorrow($_POST["date_select"]);
        
        foreach ( $dates as $key => $date ) {

              $shop_list_comp = $special_price_food->getDataSalepArrayAtDate($date);

              foreach ($shop_list_comp as $shop) {
                  if ($shop["shop_id"] ==  $_POST["shop_select"] && $shop["food_id"] == $_POST["food_select"]){ 
                        if ($key == "yesterday") {
                            $flag_yesterday = true;
                        } else if ($key == "today") {
                            $flag_tomorrow = true;
                        } else if ($key == "tomorrow") {
                            $flag_today = true;
                        }
                  }
              }
        }
              
        if (empty($_POST["sale_price"]) || !is_numeric($_POST["sale_price"])) {
            $error_message .= "特価価格の入力に不備があります。<br>";
        } 
        if ($flag_yesterday == true || $flag_today == true || $flag_tomorrow == true) {
            if ($flag_yesterday === true) {
                $error_message .= $dates["yesterday"];
                $error_message .= "<br>";
            }
            if ($flag_today === true) {
                $error_message .= $dates["today"];
                $error_message .= "<br>";
            }
            if ($flag_tomorrow === true) {
                $error_message .= $dates["tomorrow"];
                $error_message .= "<br>";
            }
            $error_message .= "上記の日付で、同じ店舗でかつ同じ生鮮食品が特価価格商品として登録されています。<br>";
        }
        if ($error_message == "") {
            $special_price_food->update($sale_id_r, $_POST);
        }
    } else {
        
        $special_price_food_value = $special_price_food->getDataById($sale_id_r);
        // 確認用
        // var_dump($special_price_food_value);

    }
    
    $result = $special_price_food->getDataFoodArray();
    require_once("lib/view/special_price/view_special_price_food_update.php");

?>

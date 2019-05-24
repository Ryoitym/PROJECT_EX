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

    // 本来は他のページからpostかgetで得る
    $sale_id_r = "1";

    if (!empty($_POST)){
        
        // 選択日の前後の日付で、同生鮮商品かつ同店舗の特価価格商品の有無を表す。true：有　false：無
        $flag_before_and_fter = false;
        $flag_before = false;
        $flag_after = false;
        $flag_same = false;

        // セレクトボックスで選択した日付の前後の日付を得て、変数に代入
        $targetTime = strtotime($_POST["date_select"]);
        $before_date = date("Y-m-d",strtotime("-" . "1" . " day", $targetTime));
        $after_date = date("Y-m-d",strtotime("+" . "1" . " day", $targetTime));

        $dates = [  "before"    => strval($before_date), 
                    "same"      => strval($targetTime),
                    "after"     => strval($after_date)];
        
        foreach ( $dates as $key => $date ) {

              $shop_list_comp = $special_price_food->getDataSalepArrayAtDate($date);

              foreach ($shop_list_comp as $shop) {
                  if ($shop["shop_id"] ==  $_POST["shop_select"] && $shop["food_id"] == $_POST["food_select"]){ 
                        if ($key == "before") {
                            $flag_before = true;
                        } else if ($key == "after") {
                            $flag_after = true;
                        } else {
                            $flag_same = true;
                        }
                  }
              }
        }
              
        if (empty($_POST["sale_price"]) || !is_numeric($_POST["sale_price"])) {
            $error_message .= "特価価格の入力に不備があります。<br>";
        } 
        if ($flag_before == true || $flag_same == true || $flag_after == true) {
            if ($flag_before === true) {
                $error_message .= $before_date;
                $error_message .= "<br>";
            }
            if ($flag_same === true) {
                $error_message .= $targetTime;
                $error_message .= "<br>";
            }
            if ($flag_after === true) {
                $error_message .= $after_date;
                $error_message .= "<br>";
            }
            $error_message .= "上記の日付で、同じ店舗でかつ同じ生鮮食品が特価価格商品として登録されています。<br>";
        }
        if ($error_message == "") {
            $special_price_food->update($sale_id_r, $_POST);
        }
    }

    require_once("lib\\view\\special_price\\view_special_price_food_update.php");

?>

<?php
/*
* このファイルの概要説明
* 特価商品一覧画面のコントローラ(IT担当者)
*　
* このファイルの詳細説明
*
* システム名： FFS
* 作成者：　nosu10101
* 作成日：　2019/05/24
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


if (!empty($_GET) && !$_GET["search_name"]==""){
    $search_word = $_GET["search_name"];
    $special_price_food_list = $special_price_food->searchDataSpecialPriceFood($search_word);
} else {
    $special_price_food_list = $special_price_food->getDataSpecialPriceFoodArray();
}

require_once("lib/view/special_price/view_special_price_food_list_admin.php");

?>

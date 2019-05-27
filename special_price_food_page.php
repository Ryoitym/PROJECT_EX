<?php
/*
* このファイルの概要説明
* 特価品個別ページ画面のコントローラ
*　
* このファイルの詳細説明
*
* システム名： FFS
* 作成者：　nosu10101
* 作成日：　2019/05/24
* 最終更新日：　2019/05/27
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



$target_sale_id = $_GET["sale_id"];
$special_price_food_value = $special_price_food->getDataById($target_sale_id);

var_dump($special_price_food_value);
require_once("lib/view/view_special_price_food_page.php");
// <?php?>
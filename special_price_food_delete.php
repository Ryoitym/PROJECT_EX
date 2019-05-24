<?php
/**
* このファイルの概要説明
* 特価商品削除画面のコントローラ
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

// 削除
$special_price_food->delete($_GET["sale_id"]);

require_once("lib/view/special_price/view_special_price_food_delete.php");

?>
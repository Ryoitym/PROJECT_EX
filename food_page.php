<?php
/*
* このファイルの概要説明
* 生鮮食品個別ページ画面のコントローラ
*　
* このファイルの詳細説明
*
* システム名： FFS
* 作成者：　amaru
* 作成日：　2019/05/27
* 最終更新日：　2019/05/27
* レビュー担当者：
* レビュー日：
* バージョン： 1.2
*/

require_once("lib\init.php");

$dbh = connectDb();

//モデルファイル
require_once("lib/model/Food.php");

//モデルクラスのインスタンスを生成
$food = new Food($dbh);

$show_food_id = @$_GET["food_id"];
$food_value = $food->getDataById($show_food_id);

require_once("lib/view/view_food_page.php");

?>

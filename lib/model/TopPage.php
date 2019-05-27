<?php
/**
 * このファイルの概要説明
 *　ログアウト画面作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　amaru
 * 作成日：　2019/05/27
 * 最終更新日：　2019/05/27
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */

require_once("lib/function.php");
$dbh = connectDb();

if(empty($_POST)){
    try {
        $sql = "SELECT * FROM food";
        $sth = $dbh->prepare($sql);

        $sth->execute();
    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }
  }else{
    //検索ボタン押下時の処理
    try {
        $sql = "SELECT * FROM ffs_db.food WHERE food_name AND genre_name LIKE :search";
        $sth = $dbh->prepare($sql);

        // プレースホルダに値をバインド
        $search_name = "%" . $_POST["search"] . "%";
        $sth->bindValue(":search", $search_name);

        $sth->execute();
    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }

  }
    require_once("../view/view_top_page.php");

?>

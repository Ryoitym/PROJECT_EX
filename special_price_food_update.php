<!-- /**
 * このファイルの概要説明
特価商品編集画面のコントローラ
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　nosu10101
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/23
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */ -->
<?php
    require_once("lib\init.php");
    $dbh = connectDb();

    $food_list = array();
    $shop_list = array();

    try {
        // SQLを構築
        $sql = "SELECT * FROM ffs_db.food";
        $sth = $dbh->prepare($sql); // SQLを準備

        // SQLを発行
        $sth->execute();
        $food_list = $sth->fetchAll(PDO::FETCH_ASSOC);
        // データを戻す

    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }

    try {
        // SQLを構築
        $sql = "SELECT * FROM ffs_db.shop";
        $sth = $dbh->prepare($sql); // SQLを準備

        // SQLを発行
        $sth->execute();
        $shop_list = $sth->fetchAll(PDO::FETCH_ASSOC);
        // データを戻す

    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }
    
    require_once("lib\\view\\view_special_price_food_update.php");

?>
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
    $error_message = "";

    // 本来は他のページからpostかgetで得る
    $sale_id_r = "1";

    try {
        // SQLを構築
        $sql = 
        "SELECT * 
        FROM 
            ffs_db.food;";

        // $sql = 
        // "SELECT * 
        // FROM 
        // ffs_db.food t2 
        // ON t1.food_id = t2.food_id";
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

    if (!empty($_POST)){
        
        print $_POST["date_select"];
        $targetTime = strtotime($_POST["date_select"]);
        
        print date("Y-m-d",strtotime("+" . "1" . " day", $targetTime));
        print date("Y-m-d",strtotime("-" . "1" . " day", $targetTime));
        print $_POST["date_select"];
        if (empty($_POST["sale_price"]) || !is_numeric($_POST["sale_price"])) {
            $error_message .= "特価価格の入力に不備があります。<br>";
        } else {

            try {
                // プレースホルダ付きSQLを構築
                $sql = "UPDATE ffs_db.sale ";
                $sql .= "SET sale_price=:sale_price, date=:date, shop_id=:shop_id, food_id=:food_id ";
                $sql .= "WHERE sale_id=:sale_id";
                $sth = $dbh->prepare($sql); // SQLを準備
        
                // プレースホルダに値をバインド
                $sth->bindValue(":sale_price",  $_POST["sale_price"]);
                $sth->bindValue(":date",  $_POST["date_select"]);
                $sth->bindValue(":shop_id",   $_POST["shop_select"]);
                $sth->bindValue(":food_id",   $_POST["food_select"]);
                $sth->bindValue(":sale_id",  $sale_id_r);
                
        
                // SQLを発行
                $sth->execute();
            } catch (PDOException $e) {
                exit("SQL発行エラー：{$e->getMessage()}");
            }
        }
        
        // 日付の条件について
        // if () {

        // }
    }


    require_once("lib\\view\\view_special_price_food_update.php");

?>
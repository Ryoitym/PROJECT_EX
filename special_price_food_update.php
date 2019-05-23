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
        $sql =  "SELECT * FROM ffs_db.food;";

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
        $sql = "SELECT * FROM ffs_db.shop;";
        $sth = $dbh->prepare($sql); // SQLを準備

        // SQLを発行
        $sth->execute();
        $shop_list = $sth->fetchAll(PDO::FETCH_ASSOC);
        // データを戻す

    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }

    if (!empty($_POST)){
        
        // 選択日の前後の日付で、同生鮮商品かつ同店舗の特価価格商品の有無を表す。true：有　false：無
        $flag_before_and_fter = false;
        $flag_before = false;
        $flag_after = false;
        $flag_same = false;

        // セレクトボックスで選択した日付の前後の日付を得て、変数に代入
        $targetTime = strtotime($_POST["date_select"]);
        // print $_POST["date_select"];
        // print "<br>";
        $before_date = date("Y-m-d",strtotime("-" . "1" . " day", $targetTime));
        // print date("Y-m-d",strtotime("-" . "1" . " day", $targetTime));
        // print "<br>";
        $after_date = date("Y-m-d",strtotime("+" . "1" . " day", $targetTime));
        // print date("Y-m-d",strtotime("+" . "1" . " day", $targetTime));

        $dates = [  strval($before_date)    => "before", 
                    strval($targetTime)     => "same",
                    strval($after_date)     => "after"];
        
        foreach ( $dates as $key => $date ) {
              // SQLを構築
              $sql = "SELECT * FROM ffs_db.sale ";
              $sql .= "WHERE date = '{$date}';";

              $sth = $dbh->prepare($sql); // SQLを準備
      
              // SQLを発行
              $sth->execute();
              $shop_list_comp = $sth->fetchAll(PDO::FETCH_ASSOC);
              foreach ($shop_list_comp as $shop) {
                  if ($shop["shop_id"] ==  $_POST["shop_select"] && $shop["food_id"] == $_POST["food_select"]){ 
                    //   print "同じ！";
                        if ($key === "before") {
                            $flag_before = true;
                        } else if ($key === "after") {
                            $flag_after = true;
                        } else {
                            $flag_same = true;
                        }
                    //   $flag_before_and_fter = true;
                  }
              }
        }
              


        if (empty($_POST["sale_price"]) || !is_numeric($_POST["sale_price"])) {
            $error_message .= "特価価格の入力に不備があります。<br>";
        } else if ($flag_before === true) {
            $error_message .= "前日に、同じ店舗でかつ同じ生鮮食品が特価価格商品として登録されています。<br>";
        } else if ($flag_same === true) {
            $error_message .= "同じ日に、同じ店舗でかつ同じ生鮮食品が特価価格商品として登録されています。<br>";
        } else if ($flag_after === true) {
            $error_message .= "翌日に、同じ店舗でかつ同じ生鮮食品が特価価格商品として登録されています。<br>";
        } else {

            try {
                // プレースホルダ付きSQLを構築
                $sql = "UPDATE ffs_db.sale ";
                $sql .= "SET sale_price=:sale_price, date=:date, shop_id=:shop_id, food_id=:food_id ";
                $sql .= "WHERE sale_id=:sale_id;";
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


    require_once("lib\\view\\special_price\\view_special_price_food_update.php");

?>
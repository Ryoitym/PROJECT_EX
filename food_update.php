<!--
 * 生鮮食品編集画面
 *　データベース作成フォーマット
 *
 *
 * システム名： FFS
 * 作成者：　sugerSong
 * 作成日：　2019/05/24
 * 最終更新日：　2019/05/24
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.0
 */
-->

<?php
    require_once("lib/function.php");
    // 入力画面表示
    if(empty($_POST)){
        $dbh = connectDb();

        try {
            // SQLを構築
            $sql = "SELECT * FROM ffs_db.food ";
            $sql .= "WHERE food_id=:food_id";
            $sth = $dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            //GETで飛んできたIDのレコードを取ってくる
            $sth->bindValue(":food_id", $_GET["food_id"]);

            // SQLを発行
            $sth->execute();
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }

        require_once("lib/view/food/view_food_update.php");
    }else{
        // 入力チェック 既に登録されているかどうか
        $dbh = connectDb();

        try {
            // SQLを構築
            $sql = "SELECT * FROM ffs_db.food ";
            $sql .= "WHERE food_name=:food_name AND ";
            $sql .= " genre_id=:genre_id AND ";
            $sql .= " picture=:picture AND ";
            $sql .= " food_price=:food_price AND ";
            $sql .= " txt=:txt AND ";
            $sql .= " calorie=:calorie AND ";
            $sql .= " protein=:protein AND ";
            $sql .= " lipid=:lipid AND ";
            $sql .= " carb=:carb AND ";
            $sql .= " natrium=:natrium AND ";
            $sql .= " kalium=:kalium ";
            $sth = $dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            $sth->bindValue(":food_name",   $_POST["food_name"]);
            $sth->bindValue(":genre_id",    $_POST["genre_id"]);
            $sth->bindValue(":picture",     $_POST["picture"]);
            $sth->bindValue(":food_price",  $_POST["food_price"]);
            $sth->bindValue(":txt",         $_POST["txt"]);
            $sth->bindValue(":calorie",     $_POST["calorie"]);
            $sth->bindValue(":protein",     $_POST["protein"]);
            $sth->bindValue(":lipid",       $_POST["lipid"]);
            $sth->bindValue(":carb",        $_POST["carb"]);
            $sth->bindValue(":natrium",     $_POST["natrium"]);
            $sth->bindValue(":kalium",      $_POST["kalium"]);

            // SQLを発行
            $sth->execute();

            // 結果データを取得
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }

        if(!empty($row)){
            require_once("lib/view/food/view_food_update.php");
            ph("同じ内容の商品が登録されています");
        } else if(  strlen($_POST["food_name"]) == 0 ||
                    strlen($_POST["genre_id"])  == 0 ||
                    strlen($_POST["picture"])   == 0 ||
                    strlen($_POST["food_price"])== 0 ||
                    strlen($_POST["txt"])       == 0 ||
                    strlen($_POST["calorie"])   == 0 ||
                    strlen($_POST["protein"])   == 0 ||
                    strlen($_POST["lipid"])     == 0 ||
                    strlen($_POST["carb"])      == 0 ||
                    strlen($_POST["natrium"])   == 0 ||
                    strlen($_POST["kalium"])    == 0 ){
                require_once("lib/view/food/view_food_update.php");
                ph("入力不十分です");
        } else{
            
            try{
                // プレースホルダ付きSQLを構築
                $sql = "UPDATE ffs_db.food SET food_name=:food_name, genre_id=:genre_id, picture=:picture, food_price=:food_price, ";
                $sql .= "txt=:txt, calorie=:calorie, protein=:protein, lipid=:lipid, carb=:carb, natrium=:natrium, kalium=:kalium ";
                $sql .= "WHERE food_id = :food_id";
                $sth = $dbh->prepare($sql); // SQLを準備

                // プレースホルダに値をバインド
                $sth->bindValue(":food_name",   $_POST["food_name"]);
                $sth->bindValue(":genre_id",    $_POST["genre_id"]);
                $sth->bindValue(":picture",     $_POST["picture"]);
                $sth->bindValue(":food_price",  $_POST["food_price"]);
                $sth->bindValue(":txt",         $_POST["txt"]);
                $sth->bindValue(":calorie",     $_POST["calorie"]);
                $sth->bindValue(":protein",     $_POST["protein"]);
                $sth->bindValue(":lipid",       $_POST["lipid"]);
                $sth->bindValue(":carb",        $_POST["carb"]);
                $sth->bindValue(":natrium",     $_POST["natrium"]);
                $sth->bindValue(":kalium",      $_POST["kalium"]);
                $sth->bindValue(":food_id",     $_POST["food_id"]);

                // SQLを発行
                $sth->execute();
            } catch (PDOException $e) {
                exit("SQL発行エラー：{$e->getMessage()}");
            }
            header('Location: food_list_admin.php');
        }

        require_once("lib/view/food/view_food_update.php");
    }

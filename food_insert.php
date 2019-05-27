<!--
 * 生鮮食品登録画面
 *　データベース作成フォーマット
 *
 *
 * システム名： FFS
 * 作成者：　sugerSong
 * 作成日：　2019/05/24
 * 最終更新日：　2019/05/27
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */
-->

<?php
 $message = "";
      //共通関数読み込み
      require_once("lib/init.php");
      // IT担当者かどうか確認
      accesscheckAdmin();

      $dbh = connectDb();
      //入力画面表示
      if(empty($_POST)){

        //分類のためのSQL作成
        try{
        $sql = "SELECT * FROM ffs_db.genre";
        $sth = $dbh->prepare($sql); // SQLを準備
        $sth->execute();

        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }

        require_once("lib/view/food/view_food_insert.php");
      }else{
        // 入力チェック 既に登録されているかどうか
        $dbh = connectDb();
        try {
            // SQLを構築
            $sql = "SELECT * FROM ffs_db.food";
            $sql .= " WHERE food_name = :food_name AND";
            $sql .= " genre_id = :genre_id AND";
            $sql .= " picture = :picture AND";
            $sql .= " food_price = :food_price AND ";
            $sql .= " txt = :txt AND ";
            $sql .= " calorie = :calorie AND ";
            $sql .= " protein = :protein AND ";
            $sql .= " lipid = :lipid AND ";
            $sql .= " carb = :carb AND ";
            $sql .= " natrium = :natrium AND ";
            $sql .= " kalium = :kalium ";
            $sth = $dbh->prepare($sql); // SQLを準備

            $sth->bindValue(":food_name", $_POST["food_name"]);
            $sth->bindValue(":genre_id", $_POST["genre_id"]);
            $sth->bindValue(":picture", $_POST["picture"]);
            $sth->bindValue(":food_price", $_POST["food_price"]);
            $sth->bindValue(":txt", $_POST["txt"]);
            $sth->bindValue(":calorie", $_POST["calorie"]);
            $sth->bindValue(":protein", $_POST["protein"]);
            $sth->bindValue(":lipid", $_POST["lipid"]);
            $sth->bindValue(":carb", $_POST["carb"]);
            $sth->bindValue(":natrium", $_POST["natrium"]);
            $sth->bindValue(":kalium", $_POST["kalium"]);
            // SQLを発行
            $sth->execute();
            $row = $sth->fetch(PDO::FETCH_ASSOC); //結果データを取得
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }

        //入力チェック
        if(strlen($_POST["food_name"]) == 0 ||
        strlen($_POST["genre_id"])  == 0 ||
        strlen($_POST["picture"])   == 0 ||
        strlen($_POST["food_price"])== 0 ||
        strlen($_POST["txt"])       == 0 ||
        strlen($_POST["calorie"])   == 0 ||
        strlen($_POST["protein"])   == 0 ||
        strlen($_POST["lipid"])     == 0 ||
        strlen($_POST["carb"])      == 0 ||
        strlen($_POST["natrium"])   == 0 ||
        strlen($_POST["kalium"])    == 0){
        // 入力チェックNG
            //分類のためのSQL作成
        try{
            $sql = "SELECT * FROM ffs_db.genre";
            $sth = $dbh->prepare($sql); // SQLを準備
            $sth->execute();
            } catch (PDOException $e) {
                exit("SQL発行エラー：{$e->getMessage()}");
            }
            $message .= "入力不十分です";
            require_once("lib/view/food/view_food_insert.php");
        }else if(   is_numeric($_POST["food_price"]) == false || $_POST["food_price"] < 0 ||
                    is_numeric($_POST["calorie"]) == false || $_POST["food_price"] < 0 ||
                    is_numeric($_POST["protein"]) == false || $_POST["food_price"] < 0 ||
                    is_numeric($_POST["lipid"]) == false || $_POST["food_price"] < 0 ||
                    is_numeric($_POST["carb"]) == false || $_POST["food_price"] < 0 ||
                    is_numeric($_POST["natrium"]) == false || $_POST["food_price"] < 0 ||
                    is_numeric($_POST["kalium"]) == false || $_POST["food_price"] < 0 ){
                        //分類のためのSQL作成
            try{
                $sql = "SELECT * FROM ffs_db.genre";
                $sth = $dbh->prepare($sql); // SQLを準備
                $sth->execute();
                } catch (PDOException $e) {
                    exit("SQL発行エラー：{$e->getMessage()}");
                }
                $message .= "正の数値を入力してください";
                require_once("lib/view/food/view_food_insert.php");
        }else if(   strlen($_POST["food_name"]) >= 100 ||
                    strlen($_POST["picture"]) >= 300){
                        //分類のためのSQL作成
                try{
                    $sql = "SELECT * FROM ffs_db.genre";
                    $sth = $dbh->prepare($sql); // SQLを準備
                    $sth->execute();
                    } catch (PDOException $e) {
                        exit("SQL発行エラー：{$e->getMessage()}");
                    }
                    $message .= "食品名は１００文字、写真は３００文字以内で入力してください";
                    require_once("lib/view/food/view_food_insert.php");
        }else if(!empty($row)){
            //分類のためのSQL作成
        try{
            $sql = "SELECT * FROM ffs_db.genre";
            $sth = $dbh->prepare($sql); // SQLを準備
            $sth->execute();
            } catch (PDOException $e) {
                exit("SQL発行エラー：{$e->getMessage()}");
            }
            $message .= "すでに登録されています";
            require_once("lib/view/food/view_food_insert.php");
        }else{
          //入力チェックOK 分類を追加する
          $dbh = connectDb();
          try {
              // プレースホルダ付きSQLを構築
              $sql = "INSERT INTO ffs_db.food (food_name, genre_id, picture, food_price, ";
              $sql .= "txt, calorie, protein, lipid, carb, natrium, kalium) ";
              $sql .= "VALUES (:food_name, :genre_id, :picture, :food_price, ";
              $sql .= ":txt, :calorie, :protein, :lipid, :carb, :natrium, :kalium) ";
              $sth = $dbh->prepare($sql); // SQLを準備

              // プレースホルダに値をバインド
              $sth->bindValue(":food_name", $_POST["food_name"]);
              $sth->bindValue(":genre_id", $_POST["genre_id"]);
              $sth->bindValue(":picture", $_POST["picture"]);
              $sth->bindValue(":food_price", $_POST["food_price"]);
              $sth->bindValue(":txt", $_POST["txt"]);
              $sth->bindValue(":calorie", $_POST["calorie"]);
              $sth->bindValue(":protein", $_POST["protein"]);
              $sth->bindValue(":lipid", $_POST["lipid"]);
              $sth->bindValue(":carb", $_POST["carb"]);
              $sth->bindValue(":natrium", $_POST["natrium"]);
              $sth->bindValue(":kalium", $_POST["kalium"]);

              // SQLを発行
              $sth->execute();
          } catch (PDOException $e) {
              exit("SQL発行エラー：{$e->getMessage()}");
          }
          header('Location: food_list_admin.php');
        }
    }

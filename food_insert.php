<!--
 * 生鮮食品登録画面
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
      //共通関数読み込み
      require_once("lib/function.php");
      //入力画面表示
      if(empty($_POST)){
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
        if(empty($_POST["food_name"])||empty($_POST["genre_id"])||empty($_POST["picture"])
        ||empty($_POST["food_price"])||empty($_POST["txt"])||empty($_POST["calorie"])
        ||empty($_POST["protein"])||empty($_POST["lipid"])||empty($_POST["carb"])
        ||empty($_POST["natrium"])||empty($_POST["kalium"])){
        // 入力チェックNG
            require_once("lib/view/food/view_food_insert.php");
            ph("入力不十分です");
        }else if(!empty($row)){
            require_once("lib/view/food/view_food_insert.php");
            ph("すでに登録されています");
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

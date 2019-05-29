<!-- /**
 * このファイルの概要説明
分類編集画面のコントローラ
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　orange juice
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/28
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.2
 */ -->
<?php
    require_once("lib/init.php");
    // IT担当者かどうか確認
    accesscheckAdmin();

    $error_message = "";
    // 入力画面表示
    if(empty($_POST)){
      //編集画面表示　デフォルト値に元のデータ入れる
      $dbh = connectDb();

    try {
        // SQLを構築
        $sql = "SELECT * FROM ffs_db.genre ";
        $sql .= "WHERE genre_id=:genre_id";
        $sth = $dbh->prepare($sql); // SQLを準備

        // プレースホルダに値をバインド
        //get飛んできたIDのレコードを取ってくる
        $sth->bindValue(":genre_id", $_GET["genre_id"]);

        // SQLを発行
        $sth->execute();

        $row = $sth->fetch(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
          exit("SQL発行エラー：{$e->getMessage()}");
      }
      require_once("lib/view/category/view_category_update.php");
    }else{
      //入力チェック 既に登録されているか確認
      $dbh = connectDb();

      try{
        //SQLを構築
        $sql = "SELECT * FROM ffs_db.genre ";
        $sql .= "WHERE genre_name=:genre_name ";
        $sth = $dbh->prepare($sql); //SQLを準備

        $sth->bindValue(":genre_name",  $_POST["genre_name"]);

        // SQLを発行
        $sth->execute();

        // 結果データを取得
        $row = $sth->fetch(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
          exit("SQL発行エラー：{$e->getMessage()}");
      }

      if(!empty($row)){
        require_once("lib/view/category/view_category_update.php");
       $error_message = "すでに登録されています";
     }else if(empty($_POST["genre_name"])){
      $error_message = "入力不十分です";
      require_once("lib/view/category/view_category_update.php");
    }else{
      //編集する処理
      try{
            // プレースホルダ付きSQLを構築
          $sql = "UPDATE ffs_db.genre ";
          $sql .= "SET genre_name=:genre_name ";
          $sql .= "WHERE genre_id=:genre_id";
          $sth = $dbh->prepare($sql); // SQLを準備

          // プレースホルダに値をバインド
          $sth->bindValue(":genre_name",  $_POST["genre_name"]);
          $sth->bindValue(":genre_id",  $_POST["genre_id"]);

          // SQLを発行
          $sth->execute();
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
      }
      // 編集成功したとき一覧に飛ぶ
      header('Location: category_list_admin.php');
    }
  }

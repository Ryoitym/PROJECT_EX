<!-- /**
 * このファイルの概要説明
分類編集画面のコントローラ
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　orange juice
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/24
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.0
 */ -->
<?php
    require_once("lib/function.php");
    $dbh = connectDb();

    $error_message = "";

    try {
        // SQLを構築
        $sql = "SELECT * FROM ffs_db.genre";

        $sth = $dbh->prepare($sql); // SQLを準備

        // SQLを発行
        $sth->execute();
        $category_list = $sth->fetchAll(PDO::FETCH_ASSOC);
        // データを戻す

    if (!empty($_POST)){
      // 入力チェックNG
          require_once("lib/view/category/view_category_update.php");
         $error_message .= "入力が不十分です";
      }else if(!empty($category_list)){
          require_once("lib/view/category/view_category_update.php");
         $error_message .= "すでに登録されています";
      }
      // エラーメッセージが無い場合編集実行する
      if($error_message == ""){

            // プレースホルダ付きSQLを構築
          $sql = "UPDATE ffs_db.genre ";
          $sql .= "SET genre_name=:genre_name ";
          $sql .= "WHERE genre_id=:genre_id";
          $sth = $dbh->prepare($sql); // SQLを準備

          // プレースホルダに値をバインド
          $sth->bindValue(":genre_name",  $_POST["genre_name"]);
          $sth->bindValue(":genre_id",  $_POST["genre_id"]);

          // SQLを発行
          $sth_category->execute();
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
      }

    require_once("lib/view/view_category_update.php");

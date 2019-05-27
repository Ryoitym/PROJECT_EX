<!-- /**
 * このファイルの概要説明
分類登録画面
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　orange juice
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/27
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.2
 */ -->

  <?php
      //共通関数読み込み
      require_once("lib/init.php");
      // IT担当者かどうか確認
      accesscheckAdmin();

     $error_message = "";
      //入力画面表示
      if(empty($_POST)){
        require_once("lib/view/category/view_category_insert.php");
      }else{
        //既に登録されているかどうかの確認のためＤＢに同じものがあるか探すＳＱＬ
        $dbh = connectDb();
        try {
            // SQLを構築
            $sql = "SELECT * FROM genre";
            $sql .= " WHERE genre_name = :genre_name";
            $sth = $dbh->prepare($sql); // SQLを準備

            $sth->bindValue(":genre_name", $_POST["genre_name"]);
            // SQLを発行
            $sth->execute();
            $row = $sth->fetch(PDO::FETCH_ASSOC); //結果データを取得
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }

        //入力チェック
        if(empty($_POST["genre_name"])){
        // 入力されていないとき
            $error_message = "入力不十分です";
            require_once("lib/view/category/view_category_insert.php");
        }else if(!empty($row)){
          // 既に登録されているとき
             $error_message = "すでに登録されています";
            require_once("lib/view/category/view_category_insert.php");
        }else if(mb_strlen($_POST["genre_name"]) > 50){
            // 50文字以上で入力されたとき
             $error_message = "50文字以内で登録してください";
            require_once("lib/view/category/view_category_insert.php");
        }else{
          //入力チェックOK 分類を追加する
          $dbh = connectDb();
          try {
              // プレースホルダ付きSQLを構築
              $sql = "INSERT INTO ffs_db.genre (genre_name) ";
              $sql .= "VALUES (:genre_name)";
              $sth = $dbh->prepare($sql); // SQLを準備

              // プレースホルダに値をバインド
              $sth->bindValue(":genre_name",$_POST["genre_name"]);

              // SQLを発行
              $sth->execute();
          } catch (PDOException $e) {
              exit("SQL発行エラー：{$e->getMessage()}");
          }
          header('Location: category_list_admin.php');
        }
    }

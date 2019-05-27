<!--
 * ユーザ登録する画面
 *　データベース作成フォーマット
 *
 *
 * システム名： FFS
 * 作成者：　amaru
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/27
 * レビュー担当者：orange jyuuice
 * レビュー日：2019/05/27
 * バージョン： 1.1
 */
-->


  <?php
      //共通関数読み込み
      require_once("lib/init.php");
      // IT担当者かどうか確認
      accesscheckAdmin();

      $dbh = connectDb();
      //入力画面表示
      if(empty($_POST)){
          // 店舗をセレクトボックスで表示するためのSQL作成
          try{
          $sql = "SELECT * FROM ffs_db.shop";
          $sth = $dbh->prepare($sql); // SQLを準備
          $sth->execute();
          } catch (PDOException $e) {
              exit("SQL発行エラー：{$e->getMessage()}");
          }

        require_once("lib/view/user/view_user_insert.php");
      }else{
        // 入力チェック 既に登録されているかどうか
        try {
            // SQLを構築
            $sql = "SELECT * FROM ffs_db.user";
            $sql .= " WHERE name_family = :name_family and";
            $sql .= " name_last = :name_last and";
            $sql .= " mail = :mail and";
            $sql .= " password = :password and";
            $sql .= " shop_id = :shop_id and";
            $sql .= " acess_lv = :acess_lv";
            $sth = $dbh->prepare($sql); // SQLを準備

            $sth->bindValue(":name_family", $_POST["name_family"]);
            $sth->bindValue(":name_last", $_POST["name_last"]);
            $sth->bindValue(":mail", $_POST["mail"]);
            $sth->bindValue(":password", $_POST["password"]);
            $sth->bindValue(":shop_id", $_POST["shop_id"]);
            $sth->bindValue(":acess_lv", $_POST["acess_lv"]);
            // SQLを発行
            $sth->execute();
            $row = $sth->fetch(PDO::FETCH_ASSOC); //結果データを取得
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }

        //入力チェック
        if(empty($_POST["name_family"])||empty($_POST["name_last"])||empty($_POST["mail"])
        ||empty($_POST["password"])||empty($_POST["shop_id"])||empty($_POST["acess_lv"])){
        // 入力チェックNG
        // 店舗をセレクトボックスで表示するためのSQL作成
        try{
        $sql = "SELECT * FROM ffs_db.shop";
        $sth = $dbh->prepare($sql); // SQLを準備
        $sth->execute();
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
            require_once("lib/view/user/view_user_insert.php");
           ph("入力不十分です");
        }else if(!empty($row)){
          // 店舗をセレクトボックスで表示するためのSQL作成
          try{
          $sql = "SELECT * FROM ffs_db.shop";
          $sth = $dbh->prepare($sql); // SQLを準備
          $sth->execute();
          } catch (PDOException $e) {
              exit("SQL発行エラー：{$e->getMessage()}");
          }
            require_once("lib/view/user/view_user_insert.php");
           ph("すでに登録されています");
        }else{
          //入力チェックOK 分類を追加する
          $dbh = connectDb();
          try {
              // プレースホルダ付きSQLを構築
              // var_dump($_POST);
              $sql = "INSERT INTO ffs_db.user (name_family, name_last, mail, password, shop_id, acess_lv)";
              $sql .= " VALUES (:name_family, :name_last, :mail, :password, :shop_id, :acess_lv)";
              $sth = $dbh->prepare($sql); // SQLを準備

              // プレースホルダに値をバインド
              $sth->bindValue(":name_family",$_POST["name_family"]);
              $sth->bindValue(":name_last",$_POST["name_last"]);
              $sth->bindValue(":mail",$_POST["mail"]);
              $sth->bindValue(":password",$_POST["password"]);
              $sth->bindValue(":shop_id",$_POST["shop_id"]);
              $sth->bindValue(":acess_lv",$_POST["acess_lv"]);
              var_dump($sth);
              // SQLを発行
              $sth->execute();
          } catch (PDOException $e) {
              exit("SQL発行エラー：{$e->getMessage()}");
          }
          header('Location: user_list_admin.php');
        }
    } ?>

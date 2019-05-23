<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>店舗登録画面</title>
</head>
<body>
  <?php
      //共通関数読み込み
      require_once("lib/function.php");
      //入力画面表示
      if(empty($_POST)){
        require_once("lib/view/user/view_user_insert.php");
      }else{
        // 入力チェック 既に登録されているかどうか
        $dbh = connectDb();
        try {
            // SQLを構築
            $sql = "SELECT * FROM user";
            $sql .= " WHERE name_family = :name_family and";
            $sql .= " name_last = :name_last";
            $sth = $dbh->prepare($sql); // SQLを準備

            $sth->bindValue(":name_family", $_POST["name_family"]);
            $sth->bindValue(":name_last", $_POST["name_last"]);
            $sth->bindValue(":mail", $_POST["mail"]);
            $sth->bindValue(":password", $_POST["password"]);
            // SQLを発行
            $sth->execute();
            $row = $sth->fetch(PDO::FETCH_ASSOC); //結果データを取得
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }

        //入力チェック
        if(empty($_POST["name_family"])||empty($_POST["name_last"])||empty($_POST["mail"])||empty($_POST["password"])){
        // 入力チェックNG
            require_once("lib/view/user/view_user_insert.php");
           ph("入力不十分です");
        }else if(!empty($row)){
            require_once("lib/view/user/view_user_insert.php");
           ph("すでに登録されています");
        }else{
          //入力チェックOK 分類を追加する
          $dbh = connectDb();
          try {
              // プレースホルダ付きSQLを構築
              $sql = "INSERT INTO ffs_db.user (name_family, name_last, mail, password) ";
              $sql .= "VALUES (:name_family, :name_last, :mail, :password)";
              $sth = $dbh->prepare($sql); // SQLを準備

              // プレースホルダに値をバインド
              $sth->bindValue(":name_family", $_POST["name_family"]);
              $sth->bindValue(":name_last", $_POST["name_last"]);
              $sth->bindValue(":mail", $_POST["mail"]);
              $sth->bindValue(":password", $_POST["password"]);

              // SQLを発行
              $sth->execute();
          } catch (PDOException $e) {
              exit("SQL発行エラー：{$e->getMessage()}");
          }
          header('Location: lib/view/user/view_user_list_admin.php');
        }
    } ?>
  </body>
</html>

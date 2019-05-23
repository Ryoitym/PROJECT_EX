<?php
/**
 * このファイルの概要説明
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　appleCandy
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/23
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */
?>

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
        require_once("lib/view/shop/view_shop_insert.php");
      }else{
        // 入力チェック 既に登録されているかどうか
        $dbh = connectDb();
        try {
            // SQLを構築
            $sql = "SELECT * FROM shop";
            $sql .= " WHERE shop_name = :shop_name or";
            $sql .= " address = :address or";
            $sql .= " tel = :tel";
            $sth = $dbh->prepare($sql); // SQLを準備

            $sth->bindValue(":shop_name", $_POST["shop_name"]);
            $sth->bindValue(":address", $_POST["address"]);
            $sth->bindValue(":tel", $_POST["tel"]);
            // SQLを発行
            $sth->execute();
            $row = $sth->fetch(PDO::FETCH_ASSOC); //結果データを取得
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }

        //入力チェック
        if(empty($_POST["shop_name"])||empty($_POST["address"])||empty($_POST["tel"])){
        // 入力チェックNG
            require_once("lib/view/shop/view_shop_insert.php");
           ph("入力不十分です");
        }else if(!empty($row)){
            require_once("lib/view/shop/view_shop_insert.php");
           ph("すでに登録されています");
        }else{
          //入力チェックOK 分類を追加する
          $dbh = connectDb();
          try {
              // プレースホルダ付きSQLを構築
              $sql = "INSERT INTO ffs_db.shop (shop_name , address , tel) ";
              $sql .= "VALUES (:shop_name , :address , :tel)";
              $sth = $dbh->prepare($sql); // SQLを準備

              // プレースホルダに値をバインド
              $sth->bindValue(":shop_name",$_POST["shop_name"]);
              $sth->bindValue(":address",$_POST["address"]);
              $sth->bindValue(":tel",$_POST["tel"]);

              // SQLを発行
              $sth->execute();
          } catch (PDOException $e) {
              exit("SQL発行エラー：{$e->getMessage()}");
          }
          header('Location: lib/view/shop/view_shop_list_admin.php');
        }
    } ?>
  </body>
</html>
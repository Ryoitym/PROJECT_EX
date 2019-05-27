<?php
/**
 * このファイルの概要説明
 *　店舗一覧画面（店長級社員）コントローラ
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　appleCandy
 * 作成日：　2019/05/24
 * 最終更新日：　2019/05/27
 * レビュー担当者：orange juice
 * レビュー日：2019/05/27
 * バージョン： 1.1
 */

 require_once("lib/function.php");
    //SQL作成
    $dbh = connectDb();

    // 初回アクセス時
    if(empty($_POST)){
      try {
          $sql = "SELECT * FROM ffs_db.shop ";
          $sth = $dbh->prepare($sql);

          $sth->execute();
      } catch (PDOException $e) {
          exit("SQL発行エラー：{$e->getMessage()}");
      }
    }else{
      //検索ボタン押下時の処理
      try {
          $sql = "SELECT * FROM ffs_db.shop WHERE shop_name LIKE :search";
          $sth = $dbh->prepare($sql);

          // プレースホルダに値をバインド
          $search_name = "%" . $_POST["search"] . "%";
          $sth->bindValue(":search", $search_name);

          $sth->execute();
      } catch (PDOException $e) {
          exit("SQL発行エラー：{$e->getMessage()}");
      }
    }
    require_once("lib/view/shop/view_shop_list.php");

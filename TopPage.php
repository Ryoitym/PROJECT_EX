<?php
/**
 * このファイルの概要説明
 *　ログアウト画面作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　amaru
 * 作成日：　2019/05/27
 * 最終更新日：　2019/05/27
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */



require_once("lib/function.php");
$dbh = connectDb();

if(empty($_POST)){
    try {
      $sql = "SELECT * FROM food
      INNER JOIN genre ON food.genre_id=genre.genre_id ";
      $sth = $dbh->prepare($sql); // SQLを準備

        $sth->execute();
    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }
  }else{
    //検索ボタン押下時の処理
    try {
      // SQLを構築
      $sql = "SELECT * FROM food
      INNER JOIN genre ON food.genre_id=genre.genre_id
      WHERE food_name LIKE :search AND genre_id = ? AND eiyoka = ?";
      $sth = $dbh->prepare($sql); // SQLを準備

        // プレースホルダに値をバインド
        $search_name = "%" . $_POST["search"] . "%";
        $search_genre_id = $_POST["genre_id"];
        $search_eiyoka = $_POST["eiyoka"];

        $sth->bindValue(":search", $search_name);
        $sth->bindValue(":search_genre_id", $search_genre_id);
        $sth->bindValue(":search_eiyoka", $search_eiyoka);
        $sth->execute();
        //var_dump($sth->fetchAll(PDO::FETCH_ASSOC));
        //var_dump($_POST);
        // var_dump($sth->fetchAll(PDO::FETCH_ASSOC));
    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }

  }
    require_once("lib/view/view_top_page.php");

?>

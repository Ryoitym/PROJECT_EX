<?php
/**
 * このファイルの概要説明
 *　login画面control作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　sugerSong
 * 作成日：　2019/05/24
 * 最終更新日：　2019/05/27
 * レビュー担当者：orange juice
 * レビュー日：2019/05/27
 * バージョン： 1.1
 */

 require_once("lib/function.php");
    //SQL作成
    $dbh = connectDb();

    //初回アクセス時
    if(empty($_POST)){
        try {
            $sql = "SELECT * FROM ffs_db.food LEFT OUTER JOIN ffs_db.genre ON food.genre_id = genre.genre_id";
            $sth = $dbh->prepare($sql);

            $sth->execute();
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }else{
        //検索ボタン押下時の処理
        try {
            $sql = "SELECT * FROM ffs_db.food WHERE food_name LIKE :search";
            $sth = $dbh->prepare($sql);

            // プレースホルダに値をバインド
            $search_name = "%" . $_POST["search"] . "%";
            $sth->bindValue(":search", $search_name);

            $sth->execute();
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }
    require_once("lib/view/food/view_food_list.php");

<?php
/**
 * このファイルの概要説明
 *　分類一覧画面(IT担当者)
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　orange jyuice
 * 作成日：　2019/05/24
 * 最終更新日：　2019/05/24
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.0
 */

// 共通関数読み込み
 require_once("lib/init.php");
 // IT担当者かどうか確認
 accesscheckAdmin();
    //SQL作成
    $dbh = connectDb();

    //初回アクセス時 全て表示
    if(empty($_POST)){
        try {
            $sql = "SELECT * FROM ffs_db.genre ";
            $sth = $dbh->prepare($sql);

            $sth->execute();
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }else{
        //検索ボタン押下時の処理
        try {
            $sql = "SELECT * FROM ffs_db.genre WHERE genre_name LIKE :search";
            $sth = $dbh->prepare($sql);

            // プレースホルダに値をバインド
            $search_name = "%" . $_POST["search"] . "%";
            $sth->bindValue(":search", $search_name);

            $sth->execute();
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }
    require_once("lib/view/category/view_category_list_admin.php");

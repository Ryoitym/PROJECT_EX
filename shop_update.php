<!-- /**
 * このファイルの概要説明
分類編集画面のコントローラ
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　appleCandy
 * 作成日：　2019/05/24
 * 最終更新日：　2019/05/27
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */ -->
<?php
    require_once("lib/init.php");
    // IT担当者かどうか確認
    accesscheckAdmin();
    $error_message = "";

    if(empty($_POST)){
        $dbh = connectDb();
        try {
            // SQLを構築
            $sql = "SELECT * FROM ffs_db.shop ";
            $sql .= "WHERE shop_id=:shop_id";
            $sth = $dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            //GETで飛んできたIDのレコードを取ってくる
            $sth->bindValue(":shop_id", $_GET["shop_id"]);

            // SQLを発行
            $sth->execute();
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }

        require_once("lib/view/shop/view_shop_update.php");
    }else{
        // 入力チェック 既に登録されているかどうか
        $dbh = connectDb();
        try {
            // SQLを構築
            $sql = "SELECT * FROM ffs_db.shop ";
            $sql .= "WHERE shop_name=:shop_name AND shop_id=:shop_id AND ";
            $sql .= "address=:address AND ";
            $sql .= "tel=:tel ";
            $sth = $dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            //GETで飛んできたIDのレコードを取ってくる
            $sth->bindValue(":shop_name",  $_POST["shop_name"]);
            $sth->bindValue(":shop_id", $_POST["shop_id"]);
            $sth->bindValue(":address", $_POST["address"]);
            $sth->bindValue(":tel", $_POST["tel"]);

            // SQLを発行
            $sth->execute();

            // 結果データを取得
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
        if(empty($_POST["shop_name"]) || empty($_POST["address"]) || empty($_POST["tel"])){
            try {
                // SQLを構築
                $sql = "SELECT * FROM ffs_db.shop ";
                $sql .= "WHERE shop_id=:shop_id";
                $sth = $dbh->prepare($sql); // SQLを準備
    
                // プレースホルダに値をバインド
                //GETで飛んできたIDのレコードを取ってくる
                $sth->bindValue(":shop_id", $_POST["shop_id"]);
    
                // SQLを発行
                $sth->execute();
                $row = $sth->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                exit("SQL発行エラー：{$e->getMessage()}");
            }
            $error_message .= "入力が不十分です";
            require_once("lib/view/shop/view_shop_update.php");
        } else{
            try {
                // プレースホルダ付きSQLを構築
                $sql = "UPDATE ffs_db.shop ";
                $sql .= "SET shop_name=:shop_name, address=:address , tel=:tel ";
                $sql .= "WHERE shop_id=:shop_id";
                $sth = $dbh->prepare($sql); // SQLを準備

                // プレースホルダに値をバインド
                $sth->bindValue(":shop_name",  $_POST["shop_name"]);
                $sth->bindValue(":shop_id",  $_POST["shop_id"]);
                $sth->bindValue(":address",  $_POST["address"]);
                $sth->bindValue(":tel", $_POST["tel"]);

                // SQLを発行
                $sth->execute();
            } catch (PDOException $e) {
                exit("SQL発行エラー：{$e->getMessage()}");
            }
            header('Location: shop_list_admin.php');
        }
    }
    require_once("lib/view/shop/view_shop_update.php");

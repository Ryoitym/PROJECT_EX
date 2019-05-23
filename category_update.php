<!-- /**
 * このファイルの概要説明
分類編集画面のコントローラ
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　orange juice
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/23
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.0
 */ -->
<?php
    require_once("lib\init.php");
    $dbh = connectDb();

    $error_message = "";

    // 本来は他のページからpostかgetで得る
    $sale_id_r = "1";

    try {
        // SQLを構築
        $sql = "SELECT * FROM ffs_db.genre";
        $sth = $dbh->prepare($sql); // SQLを準備

        // SQLを発行
        $sth->execute();
        $shop_list = $sth->fetchAll(PDO::FETCH_ASSOC);
        // データを戻す

    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }

    if (!empty($_POST)){

        print $_POST["date_select"];
        $targetTime = strtotime($_POST["date_select"]);

        print date("Y-m-d",strtotime("+" . "1" . " day", $targetTime));
        print date("Y-m-d",strtotime("-" . "1" . " day", $targetTime));
        print $_POST["date_select"];
        if (empty($_POST["sale_price"]) || !is_numeric($_POST["sale_price"])) {
            $error_message .= "特価価格の入力に不備があります。<br>";
        } else {

            try {
                // プレースホルダ付きSQLを構築
                $sql = "UPDATE ffs_db.genre ";
                $sql .= "SET genre_name=:genre_name ";
                $sql .= "WHERE genre_id=:genre_id";
                $sth = $dbh->prepare($sql); // SQLを準備

                // プレースホルダに値をバインド
                $sth->bindValue(":genre_name",  $_POST["genre_name"]);

                // SQLを発行
                $sth->execute();
            } catch (PDOException $e) {
                exit("SQL発行エラー：{$e->getMessage()}");
            }
        }

    }


    require_once("lib\\view\\view_special_price_food_update.php");

?>

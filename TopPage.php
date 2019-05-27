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



require_once("lib/init.php");
$dbh = connectDb();

function get_food($dbh)
{
    try {

        $where = [];
        $bind = [];

        //生鮮食品名
        if (!empty($_POST["food_name"])) {
            $where[] = "food_name LIKE :food_name";
            $bind[] = "food_name";
        }

        //分類ID
        if (!empty($_POST["genre_id"])) {
            $where[] = "genre_id LIKE :genre_id";
            $bind[] = "genre_id";
        }

        //栄養価
        if (!empty($_POST["eiyoka"])) {
            $where[] = "eiyokae LIKE :eiyoka";
            $bind[] = "eiyoka";
        }

        if (!empty($where)) {
            $where_sql = implode(" AND ", $where);
            // SQLを構築
            $sql = "SELECT * FROM food ";
            $sql .= "INNER JOIN genre ";
            $sql .= "ON food.genre_id = genre.genre_id ";
            $sql .= "WHERE " . $where_sql ;

            $sth = $dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            foreach ($bind as $bind_value) {
                if ($bind_value == "genre_id") {
                    $sth->bindValue(":genre_id", $_POST["genre_id"]);
                } else {
                    $sth->bindValue(":{$bind_value}", "%{$_POST[$bind_value]}%");
                }
            }

            // SQLを発行
            $sth->execute();
            // データを戻す
            return $sth;

        } else {
            // SQLを構築
            $sql = "SELECT * FROM food ";
            $sql .= "INNER JOIN genre ";
            $sql .= "ON food.genre_id = genre.genre_id ";

            $sth = $dbh->prepare($sql); // SQLを準備

            // SQLを発行
            $sth->execute();
            // データを戻す
            return $sth;
        }

    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }
}
    require_once("lib/view/view_top_page.php");

?>

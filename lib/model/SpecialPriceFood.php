<?php
/**
 * このファイルの概要説明
 * 特価商品のモデル
 * 
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　nosu10101
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/24
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */


// 特価商品モデルクラス
class SpecialPriceFood
{
    private $dbh; // PDOインスタンス

    // コンストラクタ
    // $dbh:PDOインスタンス
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }


    // データベースからfoodのデータを取得し、連想配列を返す
    public function getDataSpecialPriceFoodArray()
    {
        try {
            // SQLを構築
            $sql = "SELECT * 
                    FROM ffs_db.sale t1 
                        INNER JOIN ffs_db.food t2
                            ON t1.food_id = t2.food_id
                        INNER JOIN ffs_db.shop t3
                            ON t1.shop_id = t3.shop_id";

            
            $sth = $this->dbh->prepare($sql); // SQLを準備

            // SQLを発行
            $sth->execute();

            // データを戻す
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }


    // データベースからfoodのデータを取得し、連想配列を返す
    public function getDataFoodArray()
    {
        try {
            // SQLを構築
            $sql = "SELECT * FROM ffs_db.food";
            $sth = $this->dbh->prepare($sql); // SQLを準備

            // SQLを発行
            $sth->execute();

            // データを戻す
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }

    // データベースからfoodのデータを取得し、連想配列を返す
    public function getDataShopArray()
    {
        try {
            // SQLを構築
            $sql = "SELECT * FROM ffs_db.shop";
            $sth = $this->dbh->prepare($sql); // SQLを準備

            // SQLを発行
            $sth->execute();

            // データを戻す
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }

    // データベースからfoodのデータを取得し、連想配列を返す
    public function getDataSalepArrayAtDate($date)
    {
        try {
            // SQLを構築
            $sql = "SELECT * FROM ffs_db.sale ";
            $sql .= "WHERE date = '{$date}';";

            $sth = $this->dbh->prepare($sql); // SQLを準備

            // SQLを発行
            $sth->execute();

            // データを戻す
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }


    // データベースのデータを更新する
    // $input: array 入力値
    public function update($sale_id_r, $input = null)
    {
        try {
            // プレースホルダ付きSQLを構築
            $sql = "UPDATE ffs_db.sale ";
            $sql .= "SET sale_price=:sale_price, date=:date, shop_id=:shop_id, food_id=:food_id ";
            $sql .= "WHERE sale_id=:sale_id;";
            $sth = $this->dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            $sth->bindValue(":sale_price",  $input["sale_price"]);
            $sth->bindValue(":date",        $input["date_select"]);
            $sth->bindValue(":shop_id",     $input["shop_select"]);
            $sth->bindValue(":food_id",     $input["food_select"]);
            $sth->bindValue(":sale_id",     $sale_id_r);

            // SQLを発行
            $sth->execute();
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }


    // データベースにデータを追加する
    // $input: array 入力値
    public function insert($input = null)
    {
        try {
            // プレースホルダ付きSQLを構築
            $sql = "INSERT INTO ffs_db.sale (sale_price, date, shop_id, food_id) ";
            $sql .= "VALUES (:sale_price, :date, :shop_id, :food_id)";
            $sth = $this->dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド

            $sth->bindValue(":sale_price",  $input["sale_price"]);
            $sth->bindValue(":date",        $input["date_select"]);
            $sth->bindValue(":shop_id",     $input["shop_select"]);
            $sth->bindValue(":food_id",     $input["food_select"]);

            // SQLを発行
            $sth->execute();
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }


    // データベースのデータを削除する
    // $id: 削除するデータのid DELETE FROM ffs_db.sale WHERE sale_id=6;
    public function delete($id)
    {
        try {
            // プレースホルダ付きSQLを構築
            $sql = "DELETE FROM ffs_db.sale ";
            $sql .= "WHERE sale_id=:id";
            $sth = $this->dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            $sth->bindValue(":id", (int)$id);

            // SQLを発行
            $sth->execute();
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }


    public static function getYesterdayTodayTomorrow($today) {
        $targetTime = strtotime($today);
        $before_date = date("Y-m-d",strtotime("-" . "1" . " day", $targetTime));
        $after_date = date("Y-m-d",strtotime("+" . "1" . " day", $targetTime));

        $dates = [  "yesterday" => strval($before_date), 
                    "today"     => $today,
                    "tomorrow"  => strval($after_date)];
        return $dates;
    }

}

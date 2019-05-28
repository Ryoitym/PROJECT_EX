<?php
/**
 * このファイルの概要説明
 * 特価商品モデル
 *
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　nosu10101
 * 作成日：　2019/05/28
 * 最終更新日：　2019/05/28
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */


// 特価商品モデルクラス
class Shop
{
    private $dbh; // PDOインスタンス

    // コンストラクタ
    // $dbh:PDOインスタンス
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }


    // データベースからSpecialPriceFoodのデータを取得し、連想配列を返す
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

    // データベースからSpecialPriceFoodのデータを取得し、連想配列を返す
    public function searchDataSpecialPriceFood($search_word)
    {
        try {
            // SQLを構築
            $sql = "SELECT *
                    FROM ffs_db.sale t1
                        INNER JOIN ffs_db.food t2
                            ON t1.food_id = t2.food_id
                        INNER JOIN ffs_db.shop t3
                            ON t1.shop_id = t3.shop_id
                    WHERE
                        food_name LIKE :search_word ";


            $sth = $this->dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            $name_search_word = "%". $search_word . "%";
            $sth->bindValue(":search_word", $name_search_word);

            // SQLを発行
            $sth->execute();

            // データを戻す
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }


    // データベースからshopのデータを取得し、連想配列を返す
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

    // データベースから引数で渡した日付と同じ日付のsaleのデータを取得し、連想配列を返す
    public function getDataSaleFoodShoppArrayAtDate($date)
    {
        try {
            // SQLを構築
            $sql = "SELECT *
                    FROM ffs_db.sale t1
                        INNER JOIN ffs_db.food t2
                            ON t1.food_id = t2.food_id
                        INNER JOIN ffs_db.shop t3
                            ON t1.shop_id = t3.shop_id
                    WHERE date = '{$date}';";
            $sth = $this->dbh->prepare($sql); // SQLを準備

            // SQLを発行
            $sth->execute();

            // データを戻す
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }


}

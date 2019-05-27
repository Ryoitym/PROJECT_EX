<?php
/**
 * このファイルの概要説明
 * 生鮮食品個別ページ画面モデル
 *
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


//生鮮食品モデルクラス
class Food
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

        // データベースからFoodのデータを取得し、連想配列を返す
        public function searchDataSpecialPriceFood($search_word)
        {
            try {
                // SQLを構築
                $sql = "SELECT * FROM ffs_db.food
                        WHERE food_name LIKE :search_word ";

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


        // データベースのデータをIDを指定して1件取得する
        // $id:idを指定
        public function getDataById($food_id)
        {
            try {
                // SQLを構築
                $sql = "SELECT * FROM ffs_db.food
                        WHERE sale_id = :food_id";

                $sth = $this->dbh->prepare($sql); // SQLを準備

                // プレースホルダに値をバインド
                $sth->bindValue(":food_id", (int) $food_id);

                // SQLを発行
                $sth->execute();

                // データを戻す
                $result_array = $sth->fetchAll(PDO::FETCH_ASSOC);
                return $result_array[0];
            } catch (PDOException $e) {
                exit("SQL発行エラー：{$e->getMessage()}");
            }
        }
?>

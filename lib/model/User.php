<?php
/**
 * このファイルの概要説明
 * ユーザモデル
 *
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　sugerSong
 * 作成日：　2019/05/28
 * 最終更新日：　2019/05/28
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */


// ユーザモデルクラス
class User
{
    private $dbh; // PDOインスタンス

    // コンストラクタ
    // $dbh:PDOインスタンス
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    //店舗データ取得
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
}
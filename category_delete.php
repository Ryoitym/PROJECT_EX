<!--
 * 分類削除確認画面
 *
 * システム名： FFS
 * 作成者：　orange juice
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/23
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.0
 */
-->

<?php
    require_once("lib/init.php");
    $dbh = connectDb();

    try {
        $sql = "DELETE FROM genre ";
        $sql .= "WHERE genre_id=:genre_id";
        $sth = $dbh->prepare($sql);

        $sth->bindValue(":genre_id", $_POST["genre_id"]);
        $sth->execute();

    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }

  require_once("lib/view/category/view_category_delete.php");

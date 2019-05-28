<!--
 * 分類削除確認画面
 *
 * システム名： FFS
 * 作成者：　orange juice
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/27
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */
-->

<?php
    require_once("lib/init.php");
    // IT担当者かどうか確認
    accesscheckAdmin();

    $dbh = connectDb();

    try {
        $sql = "DELETE FROM genre ";
        $sql .= "WHERE genre_id=:genre_id";
        $sth = $dbh->prepare($sql);

        $sth->bindValue(":genre_id", $_POST["genre_id"]);
        $sth->execute();

        require_once("lib/view/category/view_category_delete.php");

    } catch (PDOException $e) {
        require_once("lib/view/category/view_category_delete_error.php");
        //exit("SQL発行エラー：{$e->getMessage()}");
        
    }


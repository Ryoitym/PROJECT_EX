<?php
/**
 * このファイルの概要説明
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　appleCandy
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/27
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.2
 */
?>
<?php
    require_once("lib/init.php");
    // IT担当者かどうか確認
    accesscheckAdmin();

    $dbh = connectDb();

    try {
        $sql = "DELETE FROM shop ";
        $sql .= "WHERE shop_id=:shop_id";
        $sth = $dbh->prepare($sql);

        $sth->bindValue(":shop_id", $_POST["shop_id"]);
        $sth->execute();
        require_once('lib/view/shop/view_shop_delete.php');

    } catch (PDOException $e) {
        require_once('lib/view/shop/view_shop_delete_error.php');
    }
?>

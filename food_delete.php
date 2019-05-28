<!--
 * 生鮮食品削除画面
 *　データベース作成フォーマット
 *
 *
 * システム名： FFS
 * 作成者：　sugerSong
 * 作成日：　2019/05/24
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
        $sql = "DELETE FROM ffs_db.food ";
        $sql .= "WHERE food_id=:food_id";
        $sth = $dbh->prepare($sql);

        $sth->bindValue(":food_id", $_GET["food_id"]);
        $sth->execute();
        require_once("lib/view/food/view_food_delete.php");

    } catch (PDOException $e) {
        require_once("lib/view/food/view_food_delete_error.php");
    }
?>

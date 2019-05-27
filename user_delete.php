<!--
 * ユーザ削除確認画面
 *
 * システム名： FFS
 * 作成者：　amaru
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/27
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.2
 */
-->
<?php
    require_once("lib/init.php");
    // IT担当者かどうか確認
    accesscheckAdmin();

    $dbh = connectDb();

    try {
        $sql = "DELETE FROM user ";
        $sql .= "WHERE user_id=:user_id";
        $sth = $dbh->prepare($sql);

        $sth->bindValue(":user_id", $_POST["user_id"]);
        $sth->execute();

    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }
    require_once("lib/view/user/view_user_delete.php");
?>

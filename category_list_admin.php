<?php
/**
 * このファイルの概要説明
 *　分類一覧画面(IT担当者)
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　orange jyuice
 * 作成日：　2019/05/24
 * 最終更新日：　2019/05/24
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.0
 */

 require_once("lib/function.php");
 session_start();
 // IT担当者かどうか確認
 if($_SESSION["acess_lv"] == 1){
    //SQL作成
    $dbh = connectDb();

    try {
        $sql = "SELECT * FROM ffs_db.genre ";
        $sth = $dbh->prepare($sql);

        $sth->execute();
    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }
    require_once("lib/view/category/view_category_list_admin.php");
 } else{
    print "権限レベルが低いため、ログインからやり直してください<br>";
    print "<form action=\"logout.php\" method=\"post\">
                <button type=\"submit\" name=\"logout\" value=\"logout\">ログアウト</button>
           </form><br>";
 }

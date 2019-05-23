<?php
/**
 * このファイルの概要説明
 *　login画面control作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　sugerSong
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/23
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */

 require_once("lib/function.php");
 session_start();
 if($_SESSION["acess_lv"] == 1){
    //SQL作成
    $dbh = connectDb();

    try {
        $sql = "SELECT * FROM ffs_db.food ";
        $sth = $dbh->prepare($sql);

        $sth->execute();
    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }
    require_once("lib/view/food/view_food_list_admin.php");
 } else{
    print "権限レベルが低いため、ログインからやり直してください<br>";
    print "<form action=\"logout.php\" method=\"post\">
                <button type=\"submit\" name=\"logout\" value=\"logout\">ログアウト</button>
           </form><br>";
 }
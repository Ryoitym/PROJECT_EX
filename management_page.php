<?php
/**
 * このファイルの概要説明
 *　管理トップ画面(店長級社員)
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　orange juice
 * 作成日：　2019/05/24
 * 最終更新日：　2019/05/24
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.0
 */

 
// 店長級社員がいないためまだテストできていない
 require_once("lib/function.php");
 session_start();
 // 店長級社員かどうか確認
 if($_SESSION["acess_lv"] == 2){
    //SQL作成
    require_once("lib/view/view_management_page.php");
 } else{
    print "権限レベルが低いため、ログインからやり直してください<br>";
    print "<form action=\"logout.php\" method=\"post\">
                <button type=\"submit\" name=\"logout\" value=\"logout\">ログアウト</button>
           </form><br>";
 }
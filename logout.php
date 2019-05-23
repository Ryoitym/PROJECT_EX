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

if($_POST["logout"] == "logout"){
    session_start();
    unset($_SESSION["acess_lv"]);  //"acess_lv"のセッションを削除
    //var_dump($_SESSION["acess_lv"]);

    //logout確認画面を表示
    require_once("lib/view/view_logout.php");
} else{
    print "不正アクセスです";
}
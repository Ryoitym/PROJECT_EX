<?php
/**
 * このファイルの概要説明
 *　共通関数作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　sugerSong
 * 作成日：　2019/05/22
 * 最終更新日：　2019/05/22
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */



// XSS対策
function h($str)
    {
        return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
    }

function ph($str)
{
    print h($str);
}

// DB接続
function connectDb(){
    $dsn = "mysql:dbname=ffs_db;host=localhost;charset=utf8";   //DB特定
    $user = "root";     //user名
    $password = "";  //password

    try{
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        exit("データベース接続エラー:{$e->getMessage()}");
    }

    return $dbh;
}
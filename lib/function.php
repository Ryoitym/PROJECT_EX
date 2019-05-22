<?php
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
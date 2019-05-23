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


//共通関数読み込み
require_once("init.php");

if(empty($_POST)){
    //初回アクセス時
    require_once("view/view_login.php");
} else{
    //入力時の処理
    if(!empty($_POST["mail"]) && !empty($_POST["password"])){
        //SQL作成
        $dbh = connectDb();

        try {
            $sql = "SELECT user.mail, user.password, user.acess_lv FROM ffs_db.user ";
            $sql .= "WHERE user.mail = :mail AND user.password = :password";
            $sth = $dbh->prepare($sql);

            //プレースホルダに値をバインド
            $sth->bindValue(":mail", $_POST["mail"]);
            $sth->bindValue(":password", $_POST["password"]);

            $sth->execute();
            $row = $sth->feach(PDO::FETCH_ASSOC); //結果データを取得
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }

        var_dump($sth);
        print $row["acess_lv"];


    }else{
        //空白の場合
        print "メールアドレスまたはパスワードが違います";
        require_once("view/view_login.php");
        
    }
}
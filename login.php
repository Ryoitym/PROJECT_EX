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
require_once("lib/init.php");

if(empty($_POST)){
    //初回アクセス時
    require_once("lib/view/view_login.php");
} else{
    //入力時の処理
    if(!empty($_POST["mail"]) && !empty($_POST["password"])){
        //SQL作成
        $dbh = connectDb();

        try {
            $sql = "SELECT user.mail, user.password, user.acess_lv, shop_id FROM ffs_db.user ";
            $sql .= "WHERE user.mail = :mail AND user.password = :password";
            $sth = $dbh->prepare($sql);

            //プレースホルダに値をバインド
            $sth->bindValue(":mail", $_POST["mail"]);
            $sth->bindValue(":password", $_POST["password"]);

            $sth->execute();
            $row = $sth->fetch(PDO::FETCH_ASSOC); //結果データを取得
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }

        //メールアドレス or パスワードが間違っている時
        if(empty($row)){
            ph("メールアドレスまたはパスワードが違います");
            require_once("lib/view/view_login.php");
        } else{
        //入力内容が正しい時
            session_start();
            $_SESSION["acess_lv"] = $row["acess_lv"];
            $_SESSION["shop_id"] = $row["shop_id"];

            if($row["acess_lv"] == 1){
                header('Location:lib/view/view_management_page_admin.php');
            } elseif($row["acess_lv"] == 2){
                header('Location:lib/view/view_management_page.php');
            }
        }


    }else{
        //空白の場合
        ph("メールアドレスまたはパスワードが違います");
        require_once("lib/view/view_login.php");
        
    }
}
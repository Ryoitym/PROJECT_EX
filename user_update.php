<!-- /**
 * このファイルの概要説明
 ユーザ編集画面のコントローラ
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　amaru
 * 作成日：　2019/05/24
 * 最終更新日：　2019/05/24
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */ -->

 <?php
     require_once("lib/function.php");
     $dbh = connectDb();

     $error_message = "";

     try {
         // SQLを構築
         $sql = "SELECT * FROM ffs_db.user";
         $sth = $dbh->prepare($sql); // SQLを準備

         // SQLを発行
         $sth->execute();
         $user_list = $sth->fetchAll(PDO::FETCH_ASSOC);

     if (!empty($_POST)){
       // 入力チェックNG
           require_once("lib/view/user/view_user_update.php");
           $error_message .= "入力が不十分です";
       }else if(!empty($category_list)){
           require_once("lib/view/user/view_user_update.php");
           $error_message .= "すでに登録されています";
       }
       // エラーメッセージが無い場合編集実行する
       if($error_message == ""){

           // プレースホルダ付きSQLを構築
           $sql = "UPDATE user ";
           $sql .= "SET name_family=:name_family, name_last=:name_last, mail=:mail,
           password=:password, shop_id=:shop=id, acess_lv=:acess_lv";
           $sql .= "WHERE name_family=:name_family, name_last=:name_last, mail=:mail,
           password=:password, shop_id=:shop=id, acess_lv=:acess_lv";
           $sth = $dbh->prepare($sql); // SQLを準備

           // プレースホルダに値をバインド
           $sth->bindValue(":name_family",$_POST["name_family"]);
           $sth->bindValue(":name_last",$_POST["name_last"]);
           $sth->bindValue(":mail",$_POST["mail"]);
           $sth->bindValue(":password",$_POST["password"]);
           $sth->bindValue(":shop_id",$_POST["shop_id"]);
           $sth->bindValue(":acess_lv",$_POST["acess_lv"]);

           // SQLを発行
           $sth_category->execute();
         } catch (PDOException $e) {
             exit("SQL発行エラー：{$e->getMessage()}");
       }

     require_once("lib/view/user/view_user_update.php");

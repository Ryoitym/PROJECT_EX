<!-- /**
 * このファイルの概要説明
 ユーザ編集画面のコントローラ
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　
 * 作成日：　2019/05/24
 * 最終更新日：　2019/05/24
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */ -->
 <!DOCTYPE html>
 <html>
 <head>
 <meta charset="utf-8">
 <title>user update</title>
 </head>
 <body>
     <?php
     require_once("lib\init.php");
     $dbh = connectDb();

     try {
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
         $sth->execute();
     } catch (PDOException $e) {
         exit("SQL発行エラー：{$e->getMessage()}");
     }
 ?>

 <p>編集しました。</p>
 <p><a href="select1.php">トップページに戻る</a></p>
 </body>
 </html>

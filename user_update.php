<!-- /**
 * このファイルの概要説明
   ユーザ編集画面のコントローラ
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　amaru
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/27
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */ -->


 <?php
     require_once("lib/init.php");
     // 入力画面表示
     // IT担当者かどうか確認
     accesscheckAdmin();

     $error_message = "";

     $dbh = connectDb();

     // モデルファイルを読み込む
    require_once("lib/model/User.php");

    // モデルクラスのインスタンスを生成
    $user = new User($dbh);

    $shop_list = $user->getDataShopArray();


if(!empty($_GET)){
    $user_id_get = $_GET["user_id"];
}



     if(empty($_POST)){

     try {
         // SQLを構築
         $sql = "SELECT * FROM ffs_db.user";
         $sql .= " WHERE user_id = :user_id";
         $sth = $dbh->prepare($sql); // SQLを準備

         // プレースホルダに値をバインド
         //GETで飛んできたIDのレコードを取ってくる
         // $sth->bindValue(":user_id", $_GET["user_id"]);
         $sth->bindValue(":user_id", $_GET["user_id"]);


         // SQLを発行
         $sth->execute();

         // 結果データを取得
         $row = $sth->fetch(PDO::FETCH_ASSOC);
       } catch (PDOException $e) {
           exit("SQL発行エラー：{$e->getMessage()}");
       }
       require_once("lib/view/user/view_user_update.php");
     }else{
         // 入力チェック 既に登録されているかどうか
         $dbh = connectDb();

         try {
             // SQLを構築
             $sql = "SELECT * FROM ffs_db.user";
             $sql .= " WHERE user_id = :user_id";
             $sth = $dbh->prepare($sql); // SQLを準備

             // プレースホルダに値をバインド
             //GETで飛んできたIDのレコードを取ってくる
             if (isset($_POST["user_id"])) {
             // $sth->bindValue(":user_id", $_GET["user_id"]);
             $sth->bindValue(":user_id", $_POST["user_id"]);

           }

             // SQLを発行
             $sth->execute();

             // 結果データを取得
             $row = $sth->fetch(PDO::FETCH_ASSOC);
           } catch (PDOException $e) {
               exit("SQL発行エラー：{$e->getMessage()}");
           }

       //入力チェック
       if(empty($_POST["name_family"])||empty($_POST["name_last"])||empty($_POST["mail"])
       ||empty($_POST["password"])||empty($_POST["shop_id"])||empty($_POST["acess_lv"])){
       // 入力チェックNG
          $error_message="入力不十分です";
           require_once("lib/view/user/view_user_update.php");
       }
       // else if(!empty($row)){
       //     require_once("lib/view/user/view_user_update.php");
       //    ph("すでに登録されています");
        //}
        else{

       $dbh = connectDb();
       try{
             // プレースホルダ付きSQLを構築
           $sql = "UPDATE user ";
           $sql .= "SET name_family=:name_family, name_last=:name_last, mail=:mail,
           password=:password, shop_id=:shop_id, acess_lv=:acess_lv ";
           $sql .= "WHERE user_id=:user_id";
           $sth = $dbh->prepare($sql); // SQLを準備

           // プレースホルダに値をバインド
           $sth->bindValue(":user_id",intval($_POST["user_id"]));
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
       header('Location: user_list_admin.php');
     }
   }

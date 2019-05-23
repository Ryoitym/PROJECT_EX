<!-- /**
 * このファイルの概要説明
分類登録画面
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　orange juice
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/23
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */ -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>分類登録画面</title>
</head>
<body>
  <?php
      //共通関数読み込み
      require_once("lib/function.php");
      //入力画面表示
      if(empty($_POST)){
        require_once("lib/view/view_category_insert.php");
      }else{
        //入力チェック
        if(empty($_POST["genre_name"])){
        // 入力チェックNG
            require_once("lib/view/view_category_insert.php");
           ph("入力不十分です");
        }else{
          //入力チェックOK 分類を追加する
          $dbh = connectDb();
          try {
              // プレースホルダ付きSQLを構築
              $sql = "INSERT INTO ffs_db.genre (genre_name) ";
              $sql .= "VALUES (:genre_name)";
              $sth = $dbh->prepare($sql); // SQLを準備

              // プレースホルダに値をバインド
              $sth->bindValue(":genre_name",$_POST["genre_name"]);

              // SQLを発行
              $sth->execute();
          } catch (PDOException $e) {
              exit("SQL発行エラー：{$e->getMessage()}");
          }?>
          <p><a href="lib/view/view_category_list_admin.php">分類一覧画面に戻る</a></p>
      <?php   }
    } ?>
  </body>
</html>

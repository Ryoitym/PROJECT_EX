<?php
/**
 * このファイルの概要説明
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　appleCandy
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/23
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>店舗削除確認画面のコントローラ</title>
</head>
<body>
<script>
//ポップアップ
var del = window.confirm("本当に削除しますか？");
if(del){
<?php
    require_once("lib/function.php");
    $dbh = connectDb();

    try {
        $sql = "DELETE FROM shop ";
        $sql .= "WHERE shop_id=:shop_id";
        $sth = $dbh->prepare($sql);

        $sth->bindValue(":shop_id", $_GET["shop_id"]);
        $sth->execute();

    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }
?>
}else{
    window.location.replace('shop_list_admin.php');
}
</script>
<p>削除しました。</p>
<p><a href="lib/view/shop/view_shop_list_admin.php">店舗一覧画面に戻る</a></p>
</body>
</html>
<!--
 * 分類削除確認画面
 *
 * システム名： FFS
 * 作成者：　orange juice
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/23
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.0
 */
-->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>分類削除確認画面のコントローラ</title>
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
        $sql = "DELETE FROM genre ";
        $sql .= "WHERE genre_id=:genre_id";
        $sth = $dbh->prepare($sql);

        $sth->bindValue(":genre_id", $_GET["genre_id"]);
        $sth->execute();

    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }
?>
}else{
    window.location.replace('category_list_admin.php');
}
</script>
<p>削除しました。</p>
<p><a href="category_list_admin.php">分類一覧画面に戻る</a></p>
</body>
</html>

<?php
/**
 * このファイルの概要説明
 * 特価商品削除画面
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　nosu10101
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/28
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>特価商品削除結果画面</title>
        <link rel="stylesheet" href= "lib/css/style.css">
        </head>
        <body class="management">

        <div class="m_center">
    <form action="logout.php" method="get">
        <button type="submit" name="logout" value="logout">ログアウト</button>
    </form>
    <p>削除しました。</p>
    <?php header("refresh:1; url=special_price_food_list.php"); ?>
    <p><a href="special_price_food_list.php">特価商品一覧画面に戻る</a></p>
</div>
</body>
</html>

<?php
/**
 * このファイルの概要説明
 * 特価商品削除画面
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　nosu10101
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/24
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>特価商品削除確認画面</title>
    </head>
<body>
    <form action="logout.php" method="get">
        <button type="submit" name="logout" value="logout">ログアウト</button>
    </form>
    <!--ポップアップ-->
    <!-- <script>
        var del = window.confirm("本当に削除しますか？");
        if(del){
        }else{
            window.location.replace('user_list.php');
        }
    </script> -->
    <p>削除しました。</p>
    <p><a href="special_price_food_list.php">特価商品一覧画面に戻る</a></p>
</body>
</html>

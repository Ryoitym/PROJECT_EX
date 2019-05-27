<?php
/**
 * このファイルの概要説明
 *　特価商品一覧画面(IT担当者)
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　nosu10101
 * 作成日：　2019/05/22
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
    <title>特価商品一覧画面</title>
    </head>

    <body>
    <form action="logout.php" method="get">
        <button type="submit" name="logout" value="logout">ログアウト</button>
    </form>

    <a href="special_price_food_list_admin.php">特価商品</a>
    <a href="food_list_admin.php">生鮮食品</a>
    <a href="category_list_admin.php">分類</a>
    <a href="user_list_admin.php">ユーザ</a>
    <a href="shop_list_admin.php">店舗</a>

    <form action="special_price_food_list_admin.php" method="get">
        検索: <input type="text" name="search_name">
        <input type="submit" value="検索">
    </form>

    <!-- borderは後で消す -->
    <table border="1">
        <tr>
            <th>日付</th>
            <th>店舗名</th>
            <th>食品名</th>
            <th>価格</th>
        </tr>

        <?php foreach ($special_price_food_list as $special_price_food_i) {?>
            <tr>
                <td><?php print $special_price_food_i["date"]; ?></td>
                <td><?php print $special_price_food_i["shop_name"]; ?></td>
                <td><?php print $special_price_food_i["food_name"]; ?></td>
                <td><?php print $special_price_food_i["sale_price"]; ?></td>
            </tr>
        <?php } ?>
    </table>

    <a href="special_price_food_list_admin.php">全て表示</a>

    <a href="management_page_admin.php">トップページへ戻る</a>
    </body>
</html>

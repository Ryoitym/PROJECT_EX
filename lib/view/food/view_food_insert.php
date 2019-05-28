<?php
/**
 * このファイルの概要説明
 *　生鮮食品画面作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　sugerSong
 * 作成日：　2019/05/22
 * 最終更新日：　2019/05/28
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>生鮮食品登録画面</title>
<link rel="stylesheet" href= "lib/css/style.css">
</head>
<body class="management">

<div class="m_center">
    <h1>生鮮食品登録画面</h1>
    <?php ph($message); ?>
    <!-- ログアウトボタン-->
    <form action="logout.php" method="get">
        <button type="submit" name="logout" value="logout">ログアウト</button>
    </form>
    <!-- 生鮮食品入力フォーム-->
    <form action="food_insert.php" method="post">
        食品名：<input type="text" name="food_name" value=""><br>
        分類：<select name="genre_id">
        <?php foreach ($genre_list as $genre) {?>
                        <option value="<?php ph($genre["genre_id"]);?>">
                            <?php ph($genre["genre_name"]); ?>
                        </option>
                        <br>
                <?php } ?>
             </select><br>
        写真：<input type="text" name="picture" value="">
              <input type="submit" value="写真を選択"><br>
        価格：<input type="text" name="food_price" value=""><br>
        説明文書：<input type="textarea" name="txt" value=""><br>
        栄養価<br>
        エネルギー<input type="text" name="calorie" value=""><br>
        タンパク質<input type="text" name="protein" value=""><br>
        脂質<input type="text" name="lipid" value=""><br>
        炭水化物<input type="text" name="carb" value=""><br>
        ナトリウム<input type="text" name="natrium" value=""><br>
        カリウム<input type="text" name="kalium" value=""><br>
        <select name="show_flag">
            <option value="1">表示</option>
            <option value="0">非表示</option>
        </select><br>
        <input type="submit" value="登録">
        <input type="reset" value="クリア"><br>
        <a href="food_list_admin.php">生鮮食品一覧画面へ戻る</a>
    </form>
  </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ユーザ登録画面</title>
</head>
<body>
<?php
    require_once("lib/init.php");

    //POST時、入力が正常時
    if(!empty($_POST["name_family"]) || empty($_POST["name_last"]) || empty($_POST["mail"]) || empty($_POST["password"])){
        require_once("lib/init.php");

            $dbh = connectDb();
            try {
                // プレースホルダ付きSQLを構築
                $sql = "INSERT INTO user (name_family, name_last, mail, password) ";
                $sql .= "VALUES (:name_family, :name_last, :mail, :password)";
                $sth = $dbh->prepare($sql); // SQLを準備

                // プレースホルダに値をバインド
                $sth->bindValue(":name_family", $_POST["name_family"]);
                $sth->bindValue(":name_last", $_POST["name_last"]);
                $sth->bindValue(":mail", $_POST["mail"]);
                $sth->bindValue(":password", $_POST[":password"]);

                // SQLを発行
                $sth->execute();
            } catch (PDOException $e) {
                exit("SQL発行エラー：{$e->getMessage()}");
            }
            print "<p>新規追加しました。</p>";
            setcookie("access", 0);
    }
        //アクセス1回目 or 入力ミス時の処理
        elseif(empty($_COOKIE["access"]) || $_COOKIE["access"] == 1){
                $dbh = connectDb();

                try {
                    //companyセレクトのSQLを作成
                    $c_sql = "SELECT * FROM shop";
                    $c_sth = $dbh->prepare($c_sql);
                    $c_sth->execute();
                } catch (PDOException $e) {
                    exit("SQL発行エラー：{$e->getMessage()}");
                }
                setcookie("access", 1);
?>
<!--<form action="insert_exec.php" method="post">-->
<form action="user_insert.php" method="post">
姓： <input type="text" name="name_family"><br>
名： <input type="text" name="name_last"><br>
メールアドレス： <input type="text" name="mail"><br>
パスワード： <input type="text" name="password"><br>
店舗： <select name="shop_id">
        <?php while($row_c = $c_sth->fetch(PDO::FETCH_ASSOC)){;?>
            <option value="<?php ph($row_c["shop_id"]);?>"><?php ph($row_c["shop_name"]);?></option>
        <?php }?>
        <option value="1">○○○○</option><br>
        <option value="2">■ ■ ■</option><br>
        <option value="3">△△△</option><br>
        <option value="4">♡♡♡</option><br>
        </select><br>
権限レベル： <select name="shop_id">
        <?php while($row_c = $c_sth->fetch(PDO::FETCH_ASSOC)){;?>
            <option value="<?php ph($row_c["shop_id"]);?>"><?php ph($row_c["shop_name"]);?></option>
        <?php }?>
        <option value="1">IT担当社員</option><br>
        <option value="2">店長</option><br>
        </select><br>
<input type="submit"><br>
<?php
    //入力ミス時のエラー表示
    if(isset($_COOKIE["access"]) && $_COOKIE["access"] == 1){
        print "すべての項目を入力してください。";
    }
}?>
</form>
<p><a href="user_list.php">ユーザ一覧画面に戻る</a></p>
</body>
</html>

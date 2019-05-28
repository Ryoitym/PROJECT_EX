<?php
/**
 * このファイルの概要説明
 *　ログアウト画面作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　amaru
 * 作成日：　2019/05/27
 * 最終更新日：　2019/05/28
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */



require_once("lib/init.php");
$dbh = connectDb();

function get_food($dbh)
{
    try {

        $where = [];
        $bind = [];

        //生鮮食品名
        if (!empty($_POST["food_name"])) {
            $where[] = "food_name LIKE :food_name";
            $bind[] = "food_name";
        }

        //分類ID
        if (!empty($_POST["genre_id"])) {
            $where[] = "food.genre_id LIKE :genre_id";
            $bind[] = "genre_id";
        }
        //var_dump($where);
        if (!empty($where)) {
            $where_sql = implode(" AND ", $where);
            // SQLを構築
            $sql = "SELECT * FROM food ";
            $sql .= "INNER JOIN genre ";
            $sql .= "ON food.genre_id = genre.genre_id ";
            $sql .= "WHERE " . $where_sql ;

            if (!empty($_POST["eiyoka"])) {
              switch($_POST["eiyoka"]){
                case "calorie";
                  $sql .= "ORDER BY calorie";
                  break;
                case "protein";
                  $sql .= "ORDER BY protein";
                  break;
                case "lipid";
                  $sql .= "ORDER BY lipid";
                  break;
                case "carb";
                  $sql .= "ORDER BY carb";
                  break;
                case "natrium";
                  $sql .= "ORDER BY natrium";
                  break;
                default;
              }
            }


            //栄養価
            //var_dump($_POST);
            if (!empty($_POST["eiyoka"])) {
              //var_dump($_POST);
              $sql .= " ORDER BY :eiyoka ";
            }

            $sth = $dbh->prepare($sql); // SQLを準備

            if (!empty($_POST["eiyoka"])) {
              $sth->bindValue(":eiyoka", $_POST["eiyoka"]);
            }
            // プレースホルダに値をバインド
            foreach ($bind as $bind_value) {
                if ($bind_value == "genre_id") {
                    $sth->bindValue(":genre_id", $_POST["genre_id"]);
                } else {
                    $sth->bindValue(":{$bind_value}", "%{$_POST[$bind_value]}%");
                }
            }

            // SQLを発行

            $sth->execute();
            // データを戻す
            return $sth;

        } else {
            // SQLを構築
            $sql = "SELECT * FROM food ";
            $sql .= "INNER JOIN genre ";
            $sql .= "ON food.genre_id = genre.genre_id ";
            if (!empty($_POST["eiyoka"])) {
              switch($_POST["eiyoka"]){
                case "calorie";
                  $sql .= "ORDER BY calorie";
                  break;
                case "protein";
                  $sql .= "ORDER BY protein";
                  break;
                case "lipid";
                  $sql .= "ORDER BY lipid";
                  break;
                case "carb";
                  $sql .= "ORDER BY carb";
                  break;
                case "natrium";
                  $sql .= "ORDER BY natrium";
                  break;
                default;
              }
            }

            $sth = $dbh->prepare($sql); // SQLを準備

            // SQLを発行
            $sth->execute();
            // データを戻す
            return $sth;
        }

    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }
}

    $sth = get_food($dbh);

    // モデルファイルを読み込む
    require_once("lib/model/SpecialPriceFood.php");

    // モデルクラスのインスタンスを生成
    $special_price_food = new SpecialPriceFood($dbh);

    // 今日の特価商品一覧の連想配列を得て、変数$special_price_food_today_listに代入
    $today = date("Y-m-d");
    $special_price_food_today_list = $special_price_food->getDataSaleFoodShoppArrayAtDate($today);
    
    
    // モデルファイルを読み込む
    require_once("lib/model/Shop.php");

    // モデルクラスのインスタンスを生成
    $shop_i = new SpecialPriceFood($dbh);

    $shop_list = $shop_i->getDataShopArray();
    
    

    require_once("lib/view/view_top_page.php");
?>

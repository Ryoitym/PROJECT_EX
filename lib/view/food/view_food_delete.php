<?php
/**
 * このファイルの概要説明
 *　生鮮食品削除画面作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　sugerSong
 * 作成日：　2019/05/23
 * 最終更新日：　2019/05/28
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>生鮮食品削除画面</title>
<link rel="stylesheet" href= "lib/css/style.css">
</head>
<body class="management">

<div class="m_center">
<style type="text/css">
  #overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #000;
      filter:alpha(opacity=70);
      -moz-opacity:0.7;
      -khtml-opacity: 0.7;
      opacity: 0.7;
      z-index: 100;
      display: none;
  }

  .cnt223 a{
      text-decoration: none;
  }

  .popup{
      width: 100%;
      margin: 0 auto;
      display: none;
      position: fixed;
      z-index: 101;
  }

  .cnt223{
      min-width: 600px;
      width: 600px;
      min-height: 150px;
      margin: 100px auto;
      background: #f3f3f3;
      position: relative;
      z-index: 103;
      padding: 15px 35px;
      border-radius: 5px;
      box-shadow: 0 2px 5px #000;
  }

  .cnt223 p{
      clear: both;
      color: #555555;
      /* text-align: justify; */
      font-size: 20px;
      font-family: sans-serif;
  }

  .cnt223 p a{
      color: #d91900;
      font-weight: bold;
  }

  .cnt223 .x{
      float: right;
      height: 35px;
      left: 22px;
      position: relative;
      top: -25px;
      width: 34px;
  }

  .cnt223 .x:hover{
      cursor: pointer;
  }

</style>

<!-- 削除確認画面-->
<form action="logout.php" method="get">
    <button type="submit" name="logout" value="logout">ログアウト</button>
</form>
<h1>削除しました</h1>
<a href="food_list_admin.php">生鮮食品一覧画面</a>
</div>
</body>
</html>

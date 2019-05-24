<!-- /**
 * このファイルの概要説明
分類削除確認画面
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
 <html lang="ja">
 <head>
 <meta charset="utf-8">
 <title>分類削除確認画面</title>
 </head>

 <body>
   <!-- 削除確認 -->
   <script>
   // 確認ダイアログに表示
   var del = window.confirm("本当に削除しますか？");
   if(del){
   }else{
     // キャンセルのとき一覧に飛ぶ
       window.location.replace('category_list_admin.php');
   }
   </script>
 <input type="submit" value="ログアウト"><br>
 削除しました<br>
 <a href="category_list_admin.php">分類一覧画面に戻る</a>
 </body>
 </html>

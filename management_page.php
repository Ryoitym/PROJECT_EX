<?php
/**
 * このファイルの概要説明
 *　管理トップ画面(店長級社員)
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　orange juice
 * 作成日：　2019/05/24
 * 最終更新日：　2019/05/24
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.0
 */


 require_once("lib/init.php");
 // 店長級社員かどうか確認
 accesscheck();
 require_once("lib/view/view_management_page");

/**
 * このファイルの概要説明
 *　データベース作成フォーマット
 * このファイルの詳細説明
 *
 * システム名： FFS
 * 作成者：　appleCandy
 * 作成日：　2019/05/22
 * 最終更新日：　2019/05/22
 * レビュー担当者：
 * レビュー日：
 * バージョン： 1.1
 */

--　データベース作成
DROP DATABASE IF EXISTS ffs_db;
CREATE DATABASE ffs_db DEFAULT CHARACTER SET UTF8;

--　ユーザ作成
GRANT ALL PRIVILEGES ON ffs_db.* TO 'root'@'%' IDENTIFIED BY 'ffs';

/*
  mysql -u root -p -h IPアドレスで他PCのmysqlにアクセス可
*/

-- デフォルトDB指定
USE ffs_db;

-- 生鮮食品テーブル作成 food
DROP TABLE IF EXISTS food;
CREATE TABLE IF NOT EXISTS food (
  `food_id` INT AUTO_INCREMENT NOT NULL,
  `food_name` VARCHAR(100) NOT NULL,
  `food_price` INT NOT NULL,
  `picture` VARCHAR(300) NOT NULL,
  `txt` TEXT NOT NULL,
  `calorie` FLOAT NOT NULL,
  `protein` FLOAT,
  `lipid` FLOAT,
  `carb` FLOAT,
  `natrium` FLOAT,
  `kalium` FLOAT,
  `show_flag` INT NOT NULL,
  `genre_id` INT NOT NULL,
  PRIMARY KEY (`food_id`)
);

-- 店舗テーブル作成 shop
DROP TABLE IF EXISTS shop;
CREATE TABLE IF NOT EXISTS shop (
  `shop_id` INT AUTO_INCREMENT NOT NULL,
  `shop_name` VARCHAR(100) NOT NULL,
  `address` VARCHAR(100) NOT NULL,
  `tel` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`shop_id`)
);

-- ユーザテーブル作成 user
DROP TABLE IF EXISTS user;
CREATE TABLE IF NOT EXISTS user (
  `user_id` INT AUTO_INCREMENT NOT NULL,
  `password` VARCHAR(20) NOT NULL,
  `name_family` VARCHAR(50) NOT NULL,
  `name_last` VARCHAR(50) NOT NULL,
  `mail` VARCHAR(300) NOT NULL,
  `acess_lv` INT NOT NULL,
  `shop_id` INT NOT NULL,
  PRIMARY KEY (`user_id`)
);

-- 特価品テーブル作成 sale
DROP TABLE IF EXISTS sale;
CREATE TABLE IF NOT EXISTS sale (
  `sale_id` INT AUTO_INCREMENT NOT NULL,
  `sale_price` INT NOT NULL,
  `date` DATE NOT NULL,
  `shop_id` INT NOT NULL,
  `food_id` INT NOT NULL,
  PRIMARY KEY (`sale_id`)
);

-- 分類テーブル作成 genre
DROP TABLE IF EXISTS genre;
CREATE TABLE IF NOT EXISTS genre (
  `genre_id` INT AUTO_INCREMENT NOT NULL,
  `genre_name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`genre_id`)
);
--野菜
INSERT INTO genre(
  genre_id,
  genre_name
) VALUES (
  1,
  '野菜'
);

--肉
INSERT INTO genre(
  genre_id,
  genre_name
) VALUES (
  2,
  '肉'
);

--魚
INSERT INTO genre(
  genre_id,
  genre_name
) VALUES (
  3,
  '魚'
);

INSERT INTO food (
  food_id, 
  food_name,
  food_price,
  picture,
  txt,
  calorie,
  protein,
  lipid,
  carb,
  natrium,
  kalium,
  show_flag,
  genre_id
  ) VALUES (
    1, 
    '茄子',
    60,
    'http://placehold.jp/150x150.png',
    '高知県産　みずみずしくて今が旬！',
    22,
    1.1,
    0.1,
    5.1,
    0,
    220,
    1,
    1
    );

--田中さん
INSERT INTO user (
  user_id, 
  password,
  name_family,
  name_last,
  mail,
  acess_lv,
  shop_id
  ) VALUES (
    1, 
    'ffs',
    '田中',
    '太郎',
    'ffs@gmail.com',
    1,
    1
    );


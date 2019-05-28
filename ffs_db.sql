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

-- 分類テーブル作成 genre
DROP TABLE IF EXISTS genre;
CREATE TABLE IF NOT EXISTS genre (
  `genre_id` INT AUTO_INCREMENT NOT NULL,
  `genre_name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`genre_id`)
);

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
  PRIMARY KEY (`food_id`),
  FOREIGN KEY(`genre_id`) REFERENCES genre (`genre_id`)
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
  PRIMARY KEY (`user_id`),
  FOREIGN KEY(`shop_id`) REFERENCES shop (`shop_id`)
);

-- 特価品テーブル作成 sale
DROP TABLE IF EXISTS sale;
CREATE TABLE IF NOT EXISTS sale (
  `sale_id` INT AUTO_INCREMENT NOT NULL,
  `sale_price` INT NOT NULL,
  `date` DATE NOT NULL,
  `shop_id` INT NOT NULL,
  `food_id` INT NOT NULL,
  PRIMARY KEY (`sale_id`),
  FOREIGN KEY(`food_id`) REFERENCES food (`food_id`),
  FOREIGN KEY(`shop_id`) REFERENCES shop (`shop_id`)
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

--卵
INSERT INTO genre(
  genre_id,
  genre_name
)VALUES(
  4,
  '卵'
);
--果物
INSERT INTO genre(
  genre_id,
  genre_name
)VALUES(
  5,
  '果物'
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
    'eggplant.jpg',
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
    2,
    '卵',
    100,
    'eggplant.jpg',
    '千葉県産　農家直送の朝採れたて卵です！',
    151, 
    12.3, 
    10.3, 
    0.3,
    140, 
    130,
    1, 
    4
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
    3,
    'メロン',
    3000,
    'melon.jpg',
    '北海道産　高級メロンです。これを食べたら他店のメロンはもう食べられない！',
    176, 
    1.0, 
    0.1, 
    10.4,
    6, 
    350,
    1, 
    5
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
    4,
    'ステーキ用牛肉',
    6000,
    'meat.jpg',
    '国産　高級メロンです。これを食べたら他店のメロンはもう食べられない！',
    176, 
    1.0, 
    0.1, 
    10.4,
    6, 
    350,
    1, 
    5
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

--山田さん
INSERT INTO user (
  user_id,
  password,
  name_family,
  name_last,
  mail,
  acess_lv,
  shop_id
  ) VALUES (
    2,
    'yamada',
    '山田',
    '花子',
    'yamada@gmail.com',
    2,
    2
    );

-- 特価品、茄子
INSERT INTO sale(
  sale_id,
  sale_price,
  date,
  shop_id,
  food_id
  ) VALUES (
    1,
    50,
    '2019-05-27',
    1,
    1
  );

INSERT INTO shop(
  shop_id,
  shop_name,
  address,
  tel
  ) VALUES (
    1,
    '浅草橋店',
    '東京都台東区浅草橋5丁目２－３',
    '090-1234-5678'
  );

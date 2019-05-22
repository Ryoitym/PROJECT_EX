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
CREATE DATABASE ffs_db DEFAULT CHARACTER SET UTF-8;

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
  `text` VARCHAR NOT NULL,
  `calorie` FLOAT NOT NULL,
  `protein` FLOAT,
  `lipid` FLOAT,
  `carb` FLOAT,
  `natrium` FLOAT,
  `kalium` FLOAT,
  `show_flag` INT NOT NULL,
  `genre_id` INT NOT NULL,
  PRIMARY KEY (`food_id`)
) ENGINE=InnoDB;

-- mountain�e�[�u���f�[�^�C���T�[�g
INSERT INTO mountain (name, kana, height, location) VALUES ('�ԃm�x',   '�����̂���',       3190, '��A���v�X');
INSERT INTO mountain (name, kana, height, location) VALUES ('�ԐΊx',   '������������',     3121, '��A���v�X');
INSERT INTO mountain (name, kana, height, location) VALUES ('���x',   '�����΂݂���',     3101, '�k�A���v�X');
INSERT INTO mountain (name, kana, height, location) VALUES ('���䍂�x', '�����ق�������',   3190, '�k�A���v�X');
INSERT INTO mountain (name, kana, height, location) VALUES ('��ԎR',   '���񂽂�����',     3067, '���̑�'    );
INSERT INTO mountain (name, kana, height, location) VALUES ('����x',   '���炳�킾��',     3110, '�k�A���v�X');
INSERT INTO mountain (name, kana, height, location) VALUES ('�k�x',     '��������',         3193, '��A���v�X');
INSERT INTO mountain (name, kana, height, location) VALUES ('�k�䍂�x', '�����ق�������',   3106, '�k�A���v�X');
INSERT INTO mountain (name, kana, height, location) VALUES ('�����x',   '�����݂���',       3047, '��A���v�X');
INSERT INTO mountain (name, kana, height, location) VALUES ('��䃖�x', '���񂶂傤������', 3033, '��A���v�X');
INSERT INTO mountain (name, kana, height, location) VALUES ('���R',     '���Ă��',         3015, '�k�A���v�X');
INSERT INTO mountain (name, kana, height, location) VALUES ('���x',     '�Ȃ�����',         3084, '��A���v�X');
INSERT INTO mountain (name, kana, height, location) VALUES ('���x',     '�Ȃ�����',         3084, '�k�A���v�X');
INSERT INTO mountain (name, kana, height, location) VALUES ('�_���x',   '�̂��Ƃ肾��',     3051, '��A���v�X');
INSERT INTO mountain (name, kana, height, location) VALUES ('��Ɗx',   '�̂肭�炾��',     3026, '�k�A���v�X');
INSERT INTO mountain (name, kana, height, location) VALUES ('���x',     '�Ђ��肾��',       3013, '��A���v�X');
INSERT INTO mountain (name, kana, height, location) VALUES ('�O�䍂�x', '�܂��ق�������',   3090, '�k�A���v�X');
INSERT INTO mountain (name, kana, height, location) VALUES ('��x',     '�݂Ȃ݂���',       3033, '�k�A���v�X');
INSERT INTO mountain (name, kana, height, location) VALUES ('�����x',   '��肪����',       3180, '�k�A���v�X');
INSERT INTO mountain (name, kana, height, location) VALUES ('����x',   '��邳�킾��',     3141, '��A���v�X');

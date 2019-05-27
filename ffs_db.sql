/**
 * ���̃t�@�C���̊T�v����
 *�@�f�[�^�x�[�X�쐬�t�H�[�}�b�g
 * ���̃t�@�C���̏ڍא���
 *
 * �V�X�e�����F FFS
 * �쐬�ҁF�@appleCandy
 * �쐬���F�@2019/05/22
 * �ŏI�X�V���F�@2019/05/22
 * ���r���[�S���ҁF
 * ���r���[���F
 * �o�[�W�����F 1.1
 */

--�@�f�[�^�x�[�X�쐬
DROP DATABASE IF EXISTS ffs_db;
CREATE DATABASE ffs_db DEFAULT CHARACTER SET UTF8;

--�@���[�U�쐬
GRANT ALL PRIVILEGES ON ffs_db.* TO 'root'@'%' IDENTIFIED BY 'ffs';

/*
  mysql -u root -p -h IP�A�h���X�ő�PC��mysql�ɃA�N�Z�X��
*/

-- �f�t�H���gDB�w��
USE ffs_db;

-- ���N�H�i�e�[�u���쐬 food
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

-- �X�܃e�[�u���쐬 shop
DROP TABLE IF EXISTS shop;
CREATE TABLE IF NOT EXISTS shop (
  `shop_id` INT AUTO_INCREMENT NOT NULL,
  `shop_name` VARCHAR(100) NOT NULL,
  `address` VARCHAR(100) NOT NULL,
  `tel` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`shop_id`)
);

-- ���[�U�e�[�u���쐬 user
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

-- �����i�e�[�u���쐬 sale
DROP TABLE IF EXISTS sale;
CREATE TABLE IF NOT EXISTS sale (
  `sale_id` INT AUTO_INCREMENT NOT NULL,
  `sale_price` INT NOT NULL,
  `date` DATE NOT NULL,
  `shop_id` INT NOT NULL,
  `food_id` INT NOT NULL,
  PRIMARY KEY (`sale_id`)
);

-- ���ރe�[�u���쐬 genre
DROP TABLE IF EXISTS genre;
CREATE TABLE IF NOT EXISTS genre (
  `genre_id` INT AUTO_INCREMENT NOT NULL,
  `genre_name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`genre_id`)
);
--���
INSERT INTO genre(
  genre_id,
  genre_name
) VALUES (
  1,
  '���'
);

--��
INSERT INTO genre(
  genre_id,
  genre_name
) VALUES (
  2,
  '��'
);

--��
INSERT INTO genre(
  genre_id,
  genre_name
) VALUES (
  3,
  '��'
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
    '�֎q',
    60,
    'http://placehold.jp/150x150.png',
    '���m���Y�@�݂��݂������č����{�I',
    22,
    1.1,
    0.1,
    5.1,
    0,
    220,
    1,
    1
    );

--�c������
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
    '�c��',
    '���Y',
    'ffs@gmail.com',
    1,
    1
    );

--�R�c����
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
    '�R�c',
    '�Ԏq',
    'yamada@gmail.com',
    2,
    2
    );

-- �����i�A�֎q
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
    '�󑐋��X',
    '�����s�䓌��󑐋�5���ڂQ�|�R',
    '090-1234-5678'
  );

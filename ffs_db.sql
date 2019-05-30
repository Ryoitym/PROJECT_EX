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

-- ���ރe�[�u���쐬 genre
CREATE TABLE IF NOT EXISTS genre (
  `genre_id` INT AUTO_INCREMENT NOT NULL,
  `genre_name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`genre_id`)
);

-- �X�܃e�[�u���쐬 shop
CREATE TABLE IF NOT EXISTS shop (
  `shop_id` INT AUTO_INCREMENT NOT NULL,
  `shop_name` VARCHAR(100) NOT NULL,
  `address` VARCHAR(100) NOT NULL,
  `tel` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`shop_id`)
);

-- ���N�H�i�e�[�u���쐬 food
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


-- �����i�e�[�u���쐬 sale
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

-- ���[�U�e�[�u���쐬 user
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

--��
INSERT INTO genre(
  genre_id,
  genre_name
)VALUES(
  4,
  '��'
);
--�ʕ�
INSERT INTO genre(
  genre_id,
  genre_name
)VALUES(
  5,
  '�ʕ�'
);
--�b�k��
INSERT INTO genre(
  genre_id,
  genre_name
)VALUES(
  6,
  '�b�k��'
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
    'eggplant.jpg',
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
    '��',
    100,
    'egg.jpg',
    '��t���Y�@�_�ƒ����̒��̂ꂽ�ė��ł��I',
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
    '������',
    3000,
    'melon.jpg',
    '�k�C���Y�@�����������ł��B�����H�ׂ��瑼�X�̃������͂����H�ׂ��Ȃ��I',
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
    '�X�e�[�L�p����',
    10000,
    'meat.jpg',
    '���Y�@A�T�����N���јa���I
    �h�{�����͗A������萅�������Ȃ��������������A�����������ňꉿ�s�O�a���b�_�A�������L�x',
    517, 
    11, 
    50, 
    0.1,
    44, 
    160,
    1, 
    2
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
    5,
    '�L���x�c',
    80,
    'cabbage.jpg',
    '���쌧�Y�@�H�ׂ�Ƃ��̃V���L�V���L���𖡂킦��͓̂͂��X�����I',
    23, 
    1.3, 
    0.2, 
    5.2,
    5, 
    200,
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
    6,
    '���̐؂�g',
    500,
    'salmon.jpg',
    '��t���Y�@����̐؂�g�B���̈�i�ɒǉ�����΂��̓��͌��C�������ԈႢ�Ȃ��I',
    120, 
    20.14, 
    3.77, 
    0,
    50, 
    429,
    1, 
    3
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
    7,
    '�����q���X�e�[�L',
    1500,
    'meat_America.jpg',
    '�A�����J�Y�@�V�N�Ȃ����ɗⓀ���A�|��������߂����X���Ӑg�̈�i�I���[�Y�i�u���Ȃ����ɂ��������I',
    517, 
    11, 
    50, 
    0.1,
    44, 
    160,
    1, 
    2
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
    8,
    '�Y���C�K�j',
    6000,
    'kani.jpg',
    '�J�i�_�Y�@�V�[�t�[�h�̖{��A�J�i�_�̊C�Ŏ��n���ꂽ���킢���ɂ����؂Ȏp�{�C���ł��͂����܂��B 
    ��i�ŊÂ��r���ƁA�Z���ŃR�N�[�����ɖ��X�������ɖ��킦���ґ�Ȉ�i�ł��B ����������ɉ𓀂��邾���ŊȒP�ɏ����オ��܂��B
    ���̂܂܂��Ԃ�����ǂ��A�l�X�ȗ����Ɏg�����ǂ��A���D���ȐH�ו��Ŗ{��̖��������\���������B',
    57, 
    12.51, 
    0.36, 
    0.09,
    279, 
    279,
    1, 
    6
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
    9,
    '�l�Q',
    50,
    'carrot.jpg',
    '�����s�Y�@�s��̌��������ň���������l�Q�B�В����萻�̌���i�I',
    152, 
    0.8, 
    0.1, 
    8.7,
    34, 
    270,
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
    10,
    '�卪',
    20,
    'daikon.jpg',
    '��ʌ��Y�@�H�ނƂ��Ă̑卪�̓r�^�~��C�ȊO�ɖڗ������h�{�͂Ȃ��B
    �J�����[�͏��Ȃ��A�W�A�X�^�[�[�𑽂��܂ݏ�������������\���L�邽�߃_�C�G�b�g�E�t�[�h�Ƃ��Ă����ڂ���Ă���I',
    75, 
    0.5, 
    0.1, 
    4.1,
    19, 
    230,
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
    '�����s�󑐋�5����2-3��a�r��3F',
    '03-1234-5678'
  );

INSERT INTO shop(
  shop_id,
  shop_name,
  address,
  tel
  ) VALUES (
    2,
    '�H�t���X',
    '�����s���c��O�_�c1����15-16',
    '03-9876-5432'
  );
INSERT INTO shop(
  shop_id,
  shop_name,
  address,
  tel
  ) VALUES (
    3,
    '�Y���X',
    '��t���Y���s���l1-1',
    '047-999-2222'
  );
INSERT INTO shop(
  shop_id,
  shop_name,
  address,
  tel
  ) VALUES (
    4,
    '�V�h�X',
    '�����s�V�h��̕��꒬1-1',
    '03-2222-1234'
  );
INSERT INTO shop(
  shop_id,
  shop_name,
  address,
  tel
  ) VALUES (
    5,
    '��t�X',
    '��t����t�s��ы�퐶��1-33',
    '047-678-9765'
  );
INSERT INTO shop(
  shop_id,
  shop_name,
  address,
  tel
  ) VALUES (
    6,
    '�����w�O�X',
    '�����s���c��ۂ̓�1����',
    '03-5555-5555'
  );
INSERT INTO shop(
  shop_id,
  shop_name,
  address,
  tel
  ) VALUES (
    7,
    '�D���X',
    '�D���s�{��7-1-1',
    '047-765-4321'
  );
INSERT INTO shop(
  shop_id,
  shop_name,
  address,
  tel
  ) VALUES (
    8,
    '�H�t���d�C�X���X',
    '�����s���c��O�_�c1����20-1',
    '03-8765-9999'
  );
INSERT INTO shop(
  shop_id,
  shop_name,
  address,
  tel
  ) VALUES (
    9,
    '���l�X',
    '�_�ސ쌧���l�s���捂��2-16',
    '045-876-9999'
  );
INSERT INTO shop(
  shop_id,
  shop_name,
  address,
  tel
  ) VALUES (
    10,
    '�b�{�X',
    ' �R�����b�{�s�ۂ̓�1����',
    '050-2016-1600'
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
    30,
    '2019-05-30',
    1,
    1
  );
--��
INSERT INTO sale(
  sale_id,
  sale_price,
  date,
  shop_id,
  food_id
  ) VALUES (
    2,
    50,
    '2019-05-30',
    2,
    2
  );
--������
INSERT INTO sale(
  sale_id,
  sale_price,
  date,
  shop_id,
  food_id
  ) VALUES (
    3,
    2000,
    '2019-05-30',
    3,
    3
  );
--�X�e�[�L�p����
INSERT INTO sale(
  sale_id,
  sale_price,
  date,
  shop_id,
  food_id
  ) VALUES (
    4,
    8000,
    '2019-05-29',
    4,
    4
  );

SELECT * FROM shop;
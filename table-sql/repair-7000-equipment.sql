-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `repair-7000-equipment`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `admin`
-- 

CREATE TABLE `admin` (
  `adm_id` int(10) NOT NULL auto_increment COMMENT 'รหัสตาราง(pk)',
  `adm_user` varchar(20) NOT NULL COMMENT 'ใช้ Login เข้าระบบ',
  `adm_pass` varchar(15) NOT NULL COMMENT 'รหัสผ่าน',
  `adm_name` varchar(40) NOT NULL COMMENT 'ชื่อ - นามสกุล',
  `adm_tel` varchar(10) NOT NULL COMMENT 'เบอร์โทร',
  `adm_email` varchar(150) NOT NULL COMMENT 'อีเมล์',
  `adm_status` varchar(20) NOT NULL COMMENT 'สถานะสิทธิ์การใช้ระบบ',
  PRIMARY KEY  (`adm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='ตารางผู้ดูแลระบบ' AUTO_INCREMENT=16 ;

-- 
-- dump ตาราง `admin`
-- 

INSERT INTO `admin` VALUES (13, 'admin', '1234', 'Administrators', '0877744755', 'admin@hotmail.com', 'ผู้ดูแลระบบ');
INSERT INTO `admin` VALUES (15, 'admin2', '1234', '', '', '', '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `equipment_model`
-- 

CREATE TABLE `equipment_model` (
  `id_equipment_model` int(10) NOT NULL auto_increment COMMENT 'รหัสครุภัณฑ์(pk)',
  `type_id` varchar(10) NOT NULL COMMENT 'รหัสประเภทครุภัณฑ์(fk)',
  `name` varchar(150) NOT NULL COMMENT 'ชื่อครุภัณฑ์',
  `detail` text NOT NULL COMMENT 'รายละเอียด',
  `price` int(11) NOT NULL COMMENT 'ราคา',
  `note` text NOT NULL COMMENT 'หมายเหตุ',
  `date` datetime NOT NULL COMMENT 'วันที่บันทึกข้อมูล',
  `status` varchar(20) NOT NULL COMMENT 'สถานะ',
  PRIMARY KEY  (`id_equipment_model`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='ตารางข้อมูลครุภัณฑ์แต่ละรุ่น' AUTO_INCREMENT=5 ;

-- 
-- dump ตาราง `equipment_model`
-- 

INSERT INTO `equipment_model` VALUES (3, '4', 'คอมพิวเตอร์ 2', 'Cpu : Intel® Core™2 Duo Processor E4400 2 GHz<br>\nM/B : ASUS P5KPL/EPU<br>\nRam : Kingston DDR2 2 GB Bus 800<br>\nVGA : Nvidia Geforce 8400 gs<br>\nHDD : 150 GB', 4500, '-666', '2014-08-31 14:52:39', '1');
INSERT INTO `equipment_model` VALUES (2, '4', 'คอมพิวเตอร์ pc', 'Cpu : Intel® Core™2 Duo Processor E4400 2 GHz<br>\nM/B : ASUS P5KPL/EPU<br>\nRam : Kingston DDR2 2 GB Bus 800<br>\nVGA : Nvidia Geforce 8400 gs<br>\nHDD : 150 GB', 7500, 'มีการ์ดจอแยก ดูหนัง ฟังเพลง เล่นอินเตอร์เนท<br>\nเกมส์ออนไลน์ ลื่น ๆ ไม่มีสะดุด66', '2014-08-31 14:44:27', '1');
INSERT INTO `equipment_model` VALUES (4, '4', 'pc-ปี2014-codei7', 'CASE<br>\nAERO COOL Xpredator X1 White Edition USB3.0 <br>\nCPU<br>\nINTEL Core i7 - 4770 3.40 GHz <br>\nRAM<br>\nKINGSTON Hyper-X DDR3 8GB 1600 (4GBx2) <br>\nHDD<br>\nWestern Digital Blue 1TB WD10EZEX <br>\nPSU<br>\nCORSAIR VS650 <br>\nVGA<br>\nMSI GTX760 OC Twin Frozr <br>\nMotherboard<br>\nGIGABYTE GA-Z87-HD3 <br>\n', 2400, '-', '2014-09-14 02:07:11', '1');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `equipment_service`
-- 

CREATE TABLE `equipment_service` (
  `id_equipment_service` int(10) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL COMMENT 'รหัสผู้ใช้(fk)',
  `model_id` varchar(10) NOT NULL COMMENT 'รหัสรุ่นครุภัณฑ์',
  `lab_id` int(5) NOT NULL COMMENT 'รหัสห้อง(fk)',
  `equipment_code` varchar(10) NOT NULL COMMENT 'เลขประจำเครื่องครุภัณฑ์',
  `note` text NOT NULL COMMENT 'หมายเหตุ',
  `status` varchar(20) NOT NULL COMMENT 'สถาน',
  `date` datetime NOT NULL COMMENT 'วันที่ลงทะเบียน',
  PRIMARY KEY  (`id_equipment_service`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='ครุภัณฑ์ที่ให้บริการ' AUTO_INCREMENT=5 ;

-- 
-- dump ตาราง `equipment_service`
-- 

INSERT INTO `equipment_service` VALUES (1, 1, '2', 7, 'pc-001', '-', '1', '2014-09-04 02:01:50');
INSERT INTO `equipment_service` VALUES (2, 2, '2', 7, 'pc-002', '-', '1', '2014-09-04 02:02:28');
INSERT INTO `equipment_service` VALUES (3, 4, '2', 3, 'pc-003', '-', '1', '2014-09-04 02:02:51');
INSERT INTO `equipment_service` VALUES (4, 5, '2', 3, 'pc-005', '-', '1', '2014-09-04 02:03:39');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `equipment_type`
-- 

CREATE TABLE `equipment_type` (
  `id_equipment_type` int(11) NOT NULL auto_increment COMMENT 'รหัสประเภท',
  `name` varchar(100) NOT NULL COMMENT 'ชื่อปรเภท',
  PRIMARY KEY  (`id_equipment_type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='ตารางประเภทครุภัณฑ์' AUTO_INCREMENT=7 ;

-- 
-- dump ตาราง `equipment_type`
-- 

INSERT INTO `equipment_type` VALUES (4, 'คอมพิวเตอร์ PC');
INSERT INTO `equipment_type` VALUES (3, 'เครื่องปริ้นเตอร์');
INSERT INTO `equipment_type` VALUES (5, 'คอมพิวเตอร์ Notbook');
INSERT INTO `equipment_type` VALUES (6, 'test');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `lab`
-- 

CREATE TABLE `lab` (
  `id_lab` int(10) NOT NULL auto_increment COMMENT 'รหัสห้อง(pk)',
  `location_id` int(5) NOT NULL COMMENT 'รหัสถานที่(fk)',
  `name` varchar(100) NOT NULL COMMENT 'ชื่อห้อง',
  PRIMARY KEY  (`id_lab`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='ห้องที่ใช้ครุภัณฑ์' AUTO_INCREMENT=12 ;

-- 
-- dump ตาราง `lab`
-- 

INSERT INTO `lab` VALUES (3, 2, 'ห้อง 101');
INSERT INTO `lab` VALUES (4, 2, 'ห้อง 102');
INSERT INTO `lab` VALUES (5, 2, 'ห้อง 103');
INSERT INTO `lab` VALUES (6, 2, 'ห้อง 104');
INSERT INTO `lab` VALUES (7, 1, 'ห้อง 201');
INSERT INTO `lab` VALUES (8, 1, 'ห้อง 202');
INSERT INTO `lab` VALUES (9, 1, 'ห้อง 203');
INSERT INTO `lab` VALUES (10, 1, 'ห้อง 204');
INSERT INTO `lab` VALUES (11, 2, 'ต้ม ');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `location`
-- 

CREATE TABLE `location` (
  `id_location` int(10) NOT NULL auto_increment COMMENT 'รหัสถานที่(pk)',
  `name` varchar(100) NOT NULL COMMENT 'ชื่อสถานที่',
  PRIMARY KEY  (`id_location`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='สถานที่ใช้ครุภัณฑ์' AUTO_INCREMENT=4 ;

-- 
-- dump ตาราง `location`
-- 

INSERT INTO `location` VALUES (2, 'อาคาร1');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `member`
-- 

CREATE TABLE `member` (
  `mb_id` int(10) NOT NULL auto_increment COMMENT 'รหัสสมาชิก(pk)',
  `mb_user` varchar(20) NOT NULL COMMENT 'ใช้ Login เข้าระบบ',
  `mb_pass` varchar(15) NOT NULL COMMENT 'รหัสผ่าน',
  `mb_name` varchar(40) NOT NULL COMMENT 'ชื่อ - นามสกุล',
  `mb_affiliation` varchar(100) NOT NULL COMMENT 'สังกัด',
  `mb_address` text NOT NULL COMMENT 'ที่อยู่',
  `mb_province` varchar(50) NOT NULL COMMENT 'จังหวัด',
  `mb_zipcode` varchar(5) NOT NULL COMMENT 'รหัสไปรษณีย์',
  `mb_tel` varchar(10) NOT NULL COMMENT 'เบอร์โทร',
  `mb_telephone` varchar(10) NOT NULL COMMENT 'โทรศัพท์ภายใน',
  `mb_email` varchar(150) NOT NULL COMMENT 'อีเมล์',
  `mb_status` varchar(20) NOT NULL COMMENT 'สถานะ',
  `mb_date` datetime NOT NULL COMMENT 'วันที่ลงทะเบียน',
  PRIMARY KEY  (`mb_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='ตารางสมาชิก' AUTO_INCREMENT=11 ;

-- 
-- dump ตาราง `member`
-- 

INSERT INTO `member` VALUES (1, 'user', '1234', 'ทดสอบผู้ใช้1', 'ฝ่ายบริการ', 'xxx', 'เชียงใหม่', '54433', '0802833413', '0255545666', 'test@gmail.com', 'ผู้ใช้ระบบทั่วไป', '2014-09-04 01:56:48');
INSERT INTO `member` VALUES (2, 'user2', '1234', 'ทดสอบผู้ใช้2', 'ฝ่ายบริการ', 'xxx', 'เชียงใหม่', '54433', '0802833413', '0255545666', 'test@gmail.com', 'ผู้ใช้ระบบทั่วไป', '2014-09-04 01:57:15');
INSERT INTO `member` VALUES (3, 'user3', '1234', 'ทดสอบผู้ใช้3', 'ฝ่ายบริการ', 'xxx', 'เชียงใหม่', '54433', '0802833413', '0255545666', 'test@gmail.com', 'ผู้ใช้ระบบทั่วไป', '2014-09-04 01:57:30');
INSERT INTO `member` VALUES (4, 'user4', '1234', 'ทดสอบผู้ใช้4', 'ฝ่ายการเงิน', 'xxx', 'เชียงใหม่', '54433', '0802833413', '0255545666', 'test@gmail.com', 'ผู้ใช้ระบบทั่วไป', '2014-09-04 01:57:49');
INSERT INTO `member` VALUES (5, 'user5', '1234', 'ทดสอบผู้ใช้5', 'ฝ่ายการเงิน', 'xxx', 'เชียงใหม่', '54433', '0802833413', '0255545666', 'test@gmail.com', '', '2014-09-04 01:57:59');
INSERT INTO `member` VALUES (6, 'emp1', '1234', 'ทดสอบช่างซ่อม', 'ฝ่ายเทคโนโลยี', 'xxx', 'เชียงใหม่', '54433', '0802833413', '0255545666', 'test@gmail.com', 'ช่างซ่อมครุภัณฑ์', '2014-09-04 01:58:57');
INSERT INTO `member` VALUES (7, 'emp2', '1234', 'ทดสอบช่างซ่อม2', 'ฝ่ายเทคโนโลยี', 'xxx', 'เชียงใหม่', '54433', '0802833413', '0255545666', 'test@gmail.com', 'ช่างซ่อมครุภัณฑ์', '2014-09-04 01:59:11');
INSERT INTO `member` VALUES (8, 'emp3', '1234', 'ทดสอบช่างซ่อม3', 'ฝ่ายเทคโนโลยี', 'xxx', 'เชียงใหม่', '54433', '0802833413', '0255545666', 'test@gmail.com', 'ช่างซ่อมครุภัณฑ์', '2014-09-04 01:59:23');
INSERT INTO `member` VALUES (9, 'User6', '12345', 'ทดสอบผู้ใช้6', 'ฝ่ายบริการ', '', 'ฉะเชิงเทรา', '24000', '0385930980', '0258989890', 'Testuser@gmail.com', 'ช่างซ่อมครุภัณฑ์', '2015-04-19 17:31:50');
INSERT INTO `member` VALUES (10, 'ckjunk', '12345678910', 'pun', 'กระทรวง', '', 'กรุงเทพมหานคร', '00000', '0800000000', '123456790', 'ck@hotmail.com', 'ช่างซ่อมครุภัณฑ์', '2015-08-28 15:33:50');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `order_repair`
-- 

CREATE TABLE `order_repair` (
  `id_order_repair` int(10) NOT NULL auto_increment COMMENT 'รหัสใบแจ้งซ่อม(pk)',
  `service_id` int(10) NOT NULL COMMENT 'รหัสตารางใช้ครุภัณฑ์(fk)',
  `member_id` int(10) NOT NULL COMMENT 'รหัสสมาชิก(fk)',
  `admin_id` int(10) NOT NULL COMMENT 'รหัสช่างผู้รับงาน(fk)',
  `code` varchar(10) NOT NULL COMMENT 'รหัสครุภัณฑ์ที่แจ้งซ่อม',
  `malfunction` varchar(100) NOT NULL COMMENT 'อาการเสียที่พบ',
  `price` int(10) NOT NULL COMMENT 'ประเมินราคา',
  `note` text NOT NULL COMMENT 'หมายเหตุ',
  `total` int(7) NOT NULL COMMENT 'ราคาซ่อมจริง',
  `status` varchar(20) NOT NULL COMMENT 'สถานะใบแจ้งซ่อม',
  `date` datetime NOT NULL COMMENT 'วันที่แจ้งซ่อม',
  PRIMARY KEY  (`id_order_repair`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='ใบแจ้งซ่อม' AUTO_INCREMENT=10 ;

-- 
-- dump ตาราง `order_repair`
-- 

INSERT INTO `order_repair` VALUES (1, 1, 1, 7, 'pc-001', 'เปิดเครื่องไม่ติด', 500, 'ต้องเปลี่ยน แรม', 300, '5', '2014-09-04 02:04:49');
INSERT INTO `order_repair` VALUES (2, 2, 2, 8, 'pc-002', 'คอมพิวเตอร์มีเสียงดังเปิดเครื่องไม่ติด', 700, '', 0, '3', '2014-09-04 05:07:17');
INSERT INTO `order_repair` VALUES (3, 1, 1, 7, 'pc-001', 'จอฟ้า', 210, 'ddddddddd', 250, '4', '2014-09-04 16:10:32');
INSERT INTO `order_repair` VALUES (4, 1, 1, 8, 'pc-001', 'เข้าวิโดว์ไม่ได้', 250, '', 250, '4', '2014-09-04 17:04:04');
INSERT INTO `order_repair` VALUES (5, 1, 1, 0, 'pc-001', 'เปิดไม่ติด', 0, '', 0, '1', '2015-05-18 23:47:12');
INSERT INTO `order_repair` VALUES (6, 1, 1, 6, 'pc-001', 'เปิดไม่ติด', 320, 'กกกกกก', 300, '3', '2015-05-18 23:47:12');
INSERT INTO `order_repair` VALUES (7, 1, 1, 0, 'pc-001', 'พพพกกกกก', 0, '', 0, '1', '2015-08-26 14:44:28');
INSERT INTO `order_repair` VALUES (9, 1, 1, 6, 'pc-001', 'เครื่องเปิดไม่ติด', 300, 'ดหดหก ดหกดหกดห ดหกดห', 200, '3', '2015-09-03 17:42:15');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `order_repair_detail`
-- 

CREATE TABLE `order_repair_detail` (
  `id_order_repair_detail` int(10) NOT NULL auto_increment COMMENT 'รหัสตาราง(pk)',
  `order_repair_id` int(10) NOT NULL COMMENT 'รหัสใบแจ้งซ่อม(fk)',
  `emp_id` int(11) NOT NULL COMMENT 'รหัสช่างซ่อม',
  `malfunction` varchar(100) NOT NULL COMMENT 'อาการเสีย',
  `detail` text NOT NULL COMMENT 'รายละเอียดการซ่อม',
  `total` int(11) NOT NULL COMMENT 'ราคาซ่อม',
  `date` datetime NOT NULL COMMENT 'วันที่บันทึกข้อมูล',
  PRIMARY KEY  (`id_order_repair_detail`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='ตารางรายละเอียดการซ่อม' AUTO_INCREMENT=13 ;

-- 
-- dump ตาราง `order_repair_detail`
-- 

INSERT INTO `order_repair_detail` VALUES (1, 2, 6, 'คอมพิวเตอร์มีเสียงดังเปิดเครื่องไม่ติด', 'คอมพิวเตอร์มีเสียงดังเปิดเครื่องไม่ติด2', 650, '2014-09-04 16:44:55');
INSERT INTO `order_repair_detail` VALUES (2, 1, 7, 'เปิดเครื่องไม่ติด', 'เปิดเครื่องไม่ติด1', 655, '2014-09-04 16:46:03');
INSERT INTO `order_repair_detail` VALUES (3, 3, 7, 'จอฟ้า', 'sssssssss', 200, '2014-09-04 16:53:51');
INSERT INTO `order_repair_detail` VALUES (4, 4, 6, 'เข้าวิโดว์ไม่ได้', '111111', 15000, '2014-11-20 18:08:38');
INSERT INTO `order_repair_detail` VALUES (5, 2, 8, 'คอมพิวเตอร์มีเสียงดังเปิดเครื่องไม่ติด', '50404', 200, '2015-05-22 09:24:08');
INSERT INTO `order_repair_detail` VALUES (6, 8, 6, 'คอมพิวเตอร์เปิดไม่ติด', 'ลงโปรแกรมใหม่', 0, '2015-08-28 15:50:06');
INSERT INTO `order_repair_detail` VALUES (7, 9, 6, 'เครื่องเปิดไม่ติด', 'เปลี่ยนแรมใหม่ 2 GB', 300, '2015-09-03 17:47:16');
INSERT INTO `order_repair_detail` VALUES (8, 9, 6, 'เครื่องเปิดไม่ติด', 'ฎ๐&quot;ฎ๐ฎ๐ฎ', 200, '2015-09-03 18:45:59');
INSERT INTO `order_repair_detail` VALUES (9, 6, 6, 'เปิดไม่ติด', 'ๆำพๆไำๆ กหฟกฟหกฟ', 300, '2015-09-03 19:26:03');
INSERT INTO `order_repair_detail` VALUES (10, 8, 6, 'คอมพิวเตอร์เปิดไม่ติด', 'เเ กด เกดเกดเเกเ เดกเกดเกดเก', 300, '2015-09-03 19:33:39');
INSERT INTO `order_repair_detail` VALUES (11, 9, 6, 'เครื่องเปิดไม่ติด', '555555555555ก ฟหกฟ กฟหฟ หกฟหกหฟ<br />\r\n<br />\r\nกฟห<br />\r\nก<br />\r\nฟหก<br />\r\nฟหกก', 300, '2015-09-03 19:35:14');
INSERT INTO `order_repair_detail` VALUES (12, 9, 6, 'เครื่องเปิดไม่ติด', 'ดหดหก ดหกดหกดห ดหกดห', 200, '2015-09-03 19:36:42');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `province`
-- 

CREATE TABLE `province` (
  `id_province` int(2) NOT NULL auto_increment COMMENT 'รหัสตาราง(pk)',
  `name` varchar(50) NOT NULL COMMENT 'ชื่อจังหวัด',
  PRIMARY KEY  (`id_province`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 COMMENT='ตารางข้อมูลจังหวัดในประเทศไทย' AUTO_INCREMENT=78 ;

-- 
-- dump ตาราง `province`
-- 

INSERT INTO `province` VALUES (1, 'กระบี่');
INSERT INTO `province` VALUES (2, 'กรุงเทพมหานคร');
INSERT INTO `province` VALUES (3, 'กาญจนบุรี');
INSERT INTO `province` VALUES (4, 'กาฬสินธุ์');
INSERT INTO `province` VALUES (5, 'กำแพงเพชร');
INSERT INTO `province` VALUES (6, 'ขอนแก่น');
INSERT INTO `province` VALUES (7, 'จันทบุรี');
INSERT INTO `province` VALUES (8, 'ฉะเชิงเทรา');
INSERT INTO `province` VALUES (9, 'ชลบุรี');
INSERT INTO `province` VALUES (10, 'ชัยนาท');
INSERT INTO `province` VALUES (11, 'ชัยภูมิ');
INSERT INTO `province` VALUES (12, 'ชุมพร');
INSERT INTO `province` VALUES (13, 'เชียงราย');
INSERT INTO `province` VALUES (14, 'เชียงใหม่');
INSERT INTO `province` VALUES (15, 'ตรัง');
INSERT INTO `province` VALUES (16, 'ตราด');
INSERT INTO `province` VALUES (17, 'ตาก');
INSERT INTO `province` VALUES (18, 'นครนายก');
INSERT INTO `province` VALUES (19, 'นครปฐม');
INSERT INTO `province` VALUES (20, 'นครพนม');
INSERT INTO `province` VALUES (21, 'นครราชสีมา');
INSERT INTO `province` VALUES (22, 'นครศรีธรรมราช');
INSERT INTO `province` VALUES (23, 'นครสวรรค์');
INSERT INTO `province` VALUES (24, 'นนทบุรี');
INSERT INTO `province` VALUES (25, 'นราธิวาส');
INSERT INTO `province` VALUES (26, 'น่าน');
INSERT INTO `province` VALUES (27, 'บุรีรัมย์');
INSERT INTO `province` VALUES (28, 'ปทุมธานี');
INSERT INTO `province` VALUES (29, 'ประจวบคีรีขันธ์');
INSERT INTO `province` VALUES (30, 'ปราจีนบุรี');
INSERT INTO `province` VALUES (31, 'ปัตตานี');
INSERT INTO `province` VALUES (32, 'พระนครศรีอยุธยา');
INSERT INTO `province` VALUES (33, 'พะเยา');
INSERT INTO `province` VALUES (34, 'พังงา');
INSERT INTO `province` VALUES (35, 'พัทลุง');
INSERT INTO `province` VALUES (36, 'พิจิตร');
INSERT INTO `province` VALUES (37, 'พิษณุโลก');
INSERT INTO `province` VALUES (38, 'เพชรบุรี');
INSERT INTO `province` VALUES (39, ' เพชรบูรณ์');
INSERT INTO `province` VALUES (40, 'แพร่');
INSERT INTO `province` VALUES (41, 'ภูเก็ต');
INSERT INTO `province` VALUES (42, 'มหาสารคาม');
INSERT INTO `province` VALUES (43, 'มุกดาหาร');
INSERT INTO `province` VALUES (44, 'แม่ฮ่องสอน');
INSERT INTO `province` VALUES (45, 'ยโสธร');
INSERT INTO `province` VALUES (46, 'ยะลา');
INSERT INTO `province` VALUES (47, 'ร้อยเอ็ด');
INSERT INTO `province` VALUES (48, 'ระนอง');
INSERT INTO `province` VALUES (49, 'ระยอง');
INSERT INTO `province` VALUES (50, 'ราชบุรี');
INSERT INTO `province` VALUES (51, 'ลพบุรี');
INSERT INTO `province` VALUES (52, 'ลำปาง');
INSERT INTO `province` VALUES (53, 'ลำพูน');
INSERT INTO `province` VALUES (54, 'เลย');
INSERT INTO `province` VALUES (55, 'ศรีสะเกษ');
INSERT INTO `province` VALUES (56, 'สกลนคร');
INSERT INTO `province` VALUES (57, 'สงขลา');
INSERT INTO `province` VALUES (58, 'สตูล');
INSERT INTO `province` VALUES (59, 'สมุทรปราการ');
INSERT INTO `province` VALUES (60, 'สมุทรสงคราม');
INSERT INTO `province` VALUES (61, 'สมุทรสาคร');
INSERT INTO `province` VALUES (62, 'สระแก้ว');
INSERT INTO `province` VALUES (63, 'สระบุรี');
INSERT INTO `province` VALUES (64, 'สิงห์บุรี');
INSERT INTO `province` VALUES (65, 'สุโขทัย');
INSERT INTO `province` VALUES (66, 'สุพรรณบุรี');
INSERT INTO `province` VALUES (67, 'สุราษฎร์ธานี');
INSERT INTO `province` VALUES (68, 'สุรินทร์');
INSERT INTO `province` VALUES (69, 'หนองคาย');
INSERT INTO `province` VALUES (70, 'หนองบัวลำภู');
INSERT INTO `province` VALUES (71, 'อ่างทอง');
INSERT INTO `province` VALUES (72, 'อำนาจเจริญ');
INSERT INTO `province` VALUES (73, 'อุดรธานี');
INSERT INTO `province` VALUES (74, 'อุตรดิตถ์');
INSERT INTO `province` VALUES (75, 'อุทัยธานี');
INSERT INTO `province` VALUES (76, 'อุบลราชธานี');
INSERT INTO `province` VALUES (77, 'จังหวัดบึงกาฬ');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `solution`
-- 

CREATE TABLE `solution` (
  `id_solution` int(11) NOT NULL auto_increment COMMENT 'รหัสตาราง(pk)',
  `type_id` int(10) NOT NULL COMMENT 'รหัสประเภทอุปกรณ์(fk)',
  `title` varchar(100) NOT NULL COMMENT 'ปัญหา',
  `detail` text NOT NULL COMMENT 'รายละเอียดการแก้ไข',
  `date` datetime NOT NULL COMMENT 'วันที่บันทึก',
  PRIMARY KEY  (`id_solution`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='ตารางอาการเสียและวิธีแก้ไข' AUTO_INCREMENT=15 ;

-- 
-- dump ตาราง `solution`
-- 

INSERT INTO `solution` VALUES (11, 3, 'เสีย', '<p>\r\n	<span style="color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;"><strong>สาเหตุ : </strong>ไฟล์ข้อมูลที่เก็บอยู่บนฮาร์ดดิสก์ของคุณ อาจจะเสียหาย&nbsp;</span><br style="margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;" />\r\n	<span style="color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;"><strong>การแก้ปัญหา : </strong>ตรวจสอบส่วนของข้อมูลที่หายไปโดยการรันโปรแกรม Disk Defragmenter และเพื่อที่จะรันโปรแกรม Disk Defragmenter6 จากเดสก์ทอปของวินโดวส์ ให้คลิกที่ปุ่ม Start แล้วชี้ไปที่ Programs จากนั้นชี้ไปที่ Accessories และชี้ไปที่ System Tools ท้ายสุดให้คลิกที่ Disk Defragmenter&nbsp;</span></p>\r\n', '2015-08-16 22:11:42');
INSERT INTO `solution` VALUES (10, 4, 'การทำงานของฮาร์ดไดรฟ์ช้าลง', '<p>\r\n	<span style="color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;"><strong>สาเหตุ : </strong>ไม่ได้ต่อคอมพิวเตอร์ลงเต้าเสียบที่ด้านหลัง&nbsp;</span><br style="margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;" />\r\n	<span style="color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;"><strong>การแก้ปัญหา :</strong> ตรวจดูให้แน่ใจว่าสายไฟนั้นเสียบอยู่ที่เต้าเสียบไปบนฝาผนัง และไฟ AC บนฝาผนังที่ลงสายกราวนด์ของคอมพิวเตอร์อย่างแน่นหนา&nbsp;</span></p>\r\n', '2014-09-01 18:08:02');
INSERT INTO `solution` VALUES (9, 4, 'ข้อความแสดงการผิดพลาดเกี่ยวกับดิสก์ที่ไม่สามารถบูตได้ ', '<p>\r\n	<span style="color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;">สาเหตุ : ไม่ได้ต่อคอมพิวเตอร์ลงเต้าเสียบที่ด้านหลัง&nbsp;</span><br style="margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;" />\r\n	<span style="color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;">การแก้ปัญหา : ตรวจดูให้แน่ใจว่าสายไฟนั้นเสียบอยู่ที่เต้าเสียบไปบนฝาผนัง และไฟ AC บนฝาผนังที่ลงสายกราวนด์ของคอมพิวเตอร์อย่างแน่นหนา&nbsp;</span></p>\r\n', '2014-09-01 18:07:48');
INSERT INTO `solution` VALUES (5, 4, 'การทำงานของฮาร์ดไดรฟ์ช้าลง', '<p>\r\n	<span style="color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;">สาเหตุ : ไม่ได้ต่อคอมพิวเตอร์ลงเต้าเสียบที่ด้านหลัง&nbsp;</span><br style="margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;" />\r\n	<span style="color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;">การแก้ปัญหา : ตรวจดูให้แน่ใจว่าสายไฟนั้นเสียบอยู่ที่เต้าเสียบไปบนฝาผนัง และไฟ AC บนฝาผนังที่ลงสายกราวนด์ของคอมพิวเตอร์อย่างแน่นหนา&nbsp;</span></p>\r\n', '2014-09-01 18:11:41');
INSERT INTO `solution` VALUES (6, 4, 'การทำงานของฮาร์ดไดรฟ์ช้าลง', '<p>\r\n	<span style="color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;"><strong>สาเหตุ : </strong>ไม่ได้ต่อคอมพิวเตอร์ลงเต้าเสียบที่ด้านหลัง&nbsp;</span><br style="margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;" />\r\n	<span style="color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;"><strong>การแก้ปัญหา :</strong> ตรวจดูให้แน่ใจว่าสายไฟนั้นเสียบอยู่ที่เต้าเสียบไปบนฝาผนัง และไฟ AC บนฝาผนังที่ลงสายกราวนด์ของคอมพิวเตอร์อย่างแน่นหนา&nbsp;</span></p>\r\n', '2014-09-01 18:14:29');
INSERT INTO `solution` VALUES (7, 4, 'ข้อความแสดงการผิดพลาดเกี่ยวกับดิสก์ที่ไม่สามารถบูตได้ ', '<p>\r\n	<span style="font-size:14px;"><span style="font-family:tahoma,geneva,sans-serif;"><span style="color: rgb(64, 64, 64);"><strong>สาเหตุ : </strong>คอมพิวเตอร์พยายามเริ่มระบบจากดิสเก็ตต์ที่ไม่มีซอฟต์แวร์ สำหรับเริ่มระบบ&nbsp;</span><br style="margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;" />\r\n	<span style="color: rgb(64, 64, 64);"><strong>การแก้ปัญหา : </strong>นำแผ่นดิสเก็ตต์ออกจากไดรฟ์เมื่อไฟแสดงสถานะบนไดรฟ์ดับ แลว้ทำต่อๆ ไป โดยการกดคีย์ใด ๆ บนแป้นพิมพ์&nbsp;</span></span></span></p>\r\n', '2014-09-01 17:50:14');
INSERT INTO `solution` VALUES (8, 4, 'ข้อความแสดงการผิดพลาดเกี่ยวกับดิสก์ที่ไม่สามารถบูตได้ ', '<p>\r\n	<span style="font-size:12px;"><span style="font-family:tahoma,geneva,sans-serif;"><span style="color: rgb(64, 64, 64);"><strong>สาเหตุ : </strong>คอมพิวเตอร์พยายามเริ่มระบบจากดิสเก็ตต์ที่ไม่มีซอฟต์แวร์ สำหรับเริ่มระบบ&nbsp;</span><br style="margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;" />\r\n	<span style="color: rgb(64, 64, 64);"><strong>การแก้ปัญหา : </strong>นำแผ่นดิสเก็ตต์ออกจากไดรฟ์เมื่อไฟแสดงสถานะบนไดรฟ์ดับ แลว้ทำต่อๆ ไป โดยการกดคีย์ใด ๆ บนแป้นพิมพ์&nbsp;</span></span></span></p>\r\n', '2014-09-01 17:50:30');
INSERT INTO `solution` VALUES (12, 4, 'คอมพิวเตอร์ไม่สามารถอ่านแผ่นซีดีได้ ', '<p>\r\n	<span style="color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;"><strong>สาเหตุ : </strong>ไม่ได้ต่อคอมพิวเตอร์ลงเต้าเสียบที่ด้านหลัง&nbsp;</span><br style="margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;" />\r\n	<span style="color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;"><strong>การแก้ปัญหา :</strong> ตรวจดูให้แน่ใจว่าสายไฟนั้นเสียบอยู่ที่เต้าเสียบไปบนฝาผนัง และไฟ AC บนฝาผนังที่ลงสายกราวนด์ของคอมพิวเตอร์อย่างแน่นหนา&nbsp;</span></p>\r\n', '2014-09-01 18:09:07');
INSERT INTO `solution` VALUES (13, 4, 'คอมพิวเตอร์ไม่สามารถอ่านแผ่นซีดีได้ ', '<p>\r\n	<span style="color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;">สาเหตุ : ไม่ได้ต่อคอมพิวเตอร์ลงเต้าเสียบที่ด้านหลัง&nbsp;</span><br style="margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;" />\r\n	<span style="color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;">การแก้ปัญหา : ตรวจดูให้แน่ใจว่าสายไฟนั้นเสียบอยู่ที่เต้าเสียบไปบนฝาผนัง และไฟ AC บนฝาผนังที่ลงสายกราวนด์ของคอมพิวเตอร์อย่างแน่นหนา&nbsp;</span></p>\r\n', '2014-09-01 18:09:20');
INSERT INTO `solution` VALUES (14, 4, 'คอมพิวเตอร์ไม่สามารถอ่านแผ่นซีดีได้ ', '<p>\r\n	<span style="color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;"><strong>สาเหตุ : </strong>ไม่ได้ต่อคอมพิวเตอร์ลงเต้าเสียบที่ด้านหลัง&nbsp;</span><br style="margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;" />\r\n	<span style="color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;"><strong>การแก้ปัญหา :</strong> ตรวจดูให้แน่ใจว่าสายไฟนั้นเสียบอยู่ที่เต้าเสียบไปบนฝาผนัง และไฟ AC บนฝาผนังที่ลงสายกราวนด์ของคอมพิวเตอร์อย่างแน่นหนา&nbsp;</span></p>\r\n', '2014-09-01 18:16:17');

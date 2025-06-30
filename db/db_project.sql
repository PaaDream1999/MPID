-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2019 at 02:02 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repair7500_equipment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(10) NOT NULL COMMENT 'รหัสตาราง(pk)',
  `adm_user` varchar(20) NOT NULL COMMENT 'ใช้ Login เข้าระบบ',
  `adm_pass` varchar(15) NOT NULL COMMENT 'รหัสผ่าน',
  `adm_name` varchar(40) NOT NULL COMMENT 'ชื่อ - นามสกุล',
  `adm_tel` varchar(10) NOT NULL COMMENT 'เบอร์โทร',
  `adm_email` varchar(150) NOT NULL COMMENT 'อีเมล์',
  `adm_status` varchar(20) NOT NULL COMMENT 'สถานะสิทธิ์การใช้ระบบ'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ตารางผู้ดูแลระบบ';

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `adm_user`, `adm_pass`, `adm_name`, `adm_tel`, `adm_email`, `adm_status`) VALUES
(13, 'admin', '1234', 'Administrators', '0877744755', 'admin@hotmail.com', 'ผู้ดูแลระบบ'),
(15, 'admin2', '1234', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_model`
--

CREATE TABLE `equipment_model` (
  `id_equipment_model` int(10) NOT NULL COMMENT 'รหัสครุภัณฑ์(pk)',
  `type_id` varchar(10) NOT NULL COMMENT 'รหัสประเภทครุภัณฑ์(fk)',
  `name` varchar(150) NOT NULL COMMENT 'ชื่อครุภัณฑ์',
  `detail` text NOT NULL COMMENT 'รายละเอียด',
  `price` int(11) NOT NULL COMMENT 'ราคา',
  `note` text NOT NULL COMMENT 'หมายเหตุ',
  `date` datetime NOT NULL COMMENT 'วันที่บันทึกข้อมูล',
  `status` varchar(20) NOT NULL COMMENT 'สถานะ'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ตารางข้อมูลครุภัณฑ์แต่ละรุ่น';

--
-- Dumping data for table `equipment_model`
--

INSERT INTO `equipment_model` (`id_equipment_model`, `type_id`, `name`, `detail`, `price`, `note`, `date`, `status`) VALUES
(3, '4', 'คอมพิวเตอร์ 2', 'Cpu : Intel® Core™2 Duo Processor E4400 2 GHz<br>\nM/B : ASUS P5KPL/EPU<br>\nRam : Kingston DDR2 2 GB Bus 800<br>\nVGA : Nvidia Geforce 8400 gs<br>\nHDD : 150 GB', 4500, '-666', '2014-08-31 14:52:39', '1'),
(2, '4', 'คอมพิวเตอร์ pc', 'Cpu : Intel® Core™2 Duo Processor E4400 2 GHz<br>\nM/B : ASUS P5KPL/EPU<br>\nRam : Kingston DDR2 2 GB Bus 800<br>\nVGA : Nvidia Geforce 8400 gs<br>\nHDD : 150 GB', 7500, 'มีการ์ดจอแยก ดูหนัง ฟังเพลง เล่นอินเตอร์เนท<br>\nเกมส์ออนไลน์ ลื่น ๆ ไม่มีสะดุด66', '2014-08-31 14:44:27', '1'),
(4, '4', 'pc-ปี2014-codei7', 'CASE<br>\nAERO COOL Xpredator X1 White Edition USB3.0 <br>\nCPU<br>\nINTEL Core i7 - 4770 3.40 GHz <br>\nRAM<br>\nKINGSTON Hyper-X DDR3 8GB 1600 (4GBx2) <br>\nHDD<br>\nWestern Digital Blue 1TB WD10EZEX <br>\nPSU<br>\nCORSAIR VS650 <br>\nVGA<br>\nMSI GTX760 OC Twin Frozr <br>\nMotherboard<br>\nGIGABYTE GA-Z87-HD3 <br>\n', 2400, '-', '2014-09-14 02:07:11', '1');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_service`
--

CREATE TABLE `equipment_service` (
  `id_equipment_service` int(10) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'รหัสผู้ใช้(fk)',
  `model_id` varchar(10) NOT NULL COMMENT 'รหัสรุ่นครุภัณฑ์',
  `lab_id` int(5) NOT NULL COMMENT 'รหัสห้อง(fk)',
  `equipment_code` varchar(10) NOT NULL COMMENT 'เลขประจำเครื่องครุภัณฑ์',
  `note` text NOT NULL COMMENT 'หมายเหตุ',
  `status` varchar(20) NOT NULL COMMENT 'สถาน',
  `date` datetime NOT NULL COMMENT 'วันที่ลงทะเบียน'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ครุภัณฑ์ที่ให้บริการ';

--
-- Dumping data for table `equipment_service`
--

INSERT INTO `equipment_service` (`id_equipment_service`, `user_id`, `model_id`, `lab_id`, `equipment_code`, `note`, `status`, `date`) VALUES
(1, 1, '2', 7, 'pc-001', '-', '1', '2014-09-04 02:01:50'),
(2, 2, '2', 7, 'pc-002', '-', '1', '2014-09-04 02:02:28'),
(3, 4, '2', 3, 'pc-003', '-', '1', '2014-09-04 02:02:51'),
(4, 5, '2', 3, 'pc-005', '-', '1', '2014-09-04 02:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_type`
--

CREATE TABLE `equipment_type` (
  `id_equipment_type` int(11) NOT NULL COMMENT 'รหัสประเภท',
  `name` varchar(100) NOT NULL COMMENT 'ชื่อปรเภท'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ตารางประเภทครุภัณฑ์';

--
-- Dumping data for table `equipment_type`
--

INSERT INTO `equipment_type` (`id_equipment_type`, `name`) VALUES
(4, 'คอมพิวเตอร์ PC'),
(3, 'เครื่องปริ้นเตอร์'),
(5, 'คอมพิวเตอร์ Notbook'),
(6, 'testd');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id_lab` int(10) NOT NULL COMMENT 'รหัสห้อง(pk)',
  `location_id` int(5) NOT NULL COMMENT 'รหัสถานที่(fk)',
  `name` varchar(100) NOT NULL COMMENT 'ชื่อห้อง'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ห้องที่ใช้ครุภัณฑ์';

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id_lab`, `location_id`, `name`) VALUES
(3, 2, 'ห้อง 101'),
(4, 2, 'ห้อง 102'),
(5, 2, 'ห้อง 103'),
(6, 2, 'ห้อง 104'),
(7, 1, 'ห้อง 201'),
(8, 1, 'ห้อง 202'),
(9, 1, 'ห้อง 203'),
(10, 1, 'ห้อง 204'),
(11, 2, 'ต้ม ');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id_location` int(10) NOT NULL COMMENT 'รหัสถานที่(pk)',
  `name` varchar(100) NOT NULL COMMENT 'ชื่อสถานที่'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='สถานที่ใช้ครุภัณฑ์';

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id_location`, `name`) VALUES
(2, 'อาคาร1');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mb_id` int(10) NOT NULL COMMENT 'รหัสสมาชิก(pk)',
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
  `mb_date` datetime NOT NULL COMMENT 'วันที่ลงทะเบียน'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ตารางสมาชิก';

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mb_id`, `mb_user`, `mb_pass`, `mb_name`, `mb_affiliation`, `mb_address`, `mb_province`, `mb_zipcode`, `mb_tel`, `mb_telephone`, `mb_email`, `mb_status`, `mb_date`) VALUES
(1, 'user', '1234', 'ทดสอบผู้ใช้1', 'ฝ่ายบริการ', 'xxx', 'เชียงใหม่', '54433', '0802833413', '0255545666', 'test@gmail.com', 'ผู้ใช้ระบบทั่วไป', '2014-09-04 01:56:48'),
(2, 'user2', '1234', 'ทดสอบผู้ใช้2', 'ฝ่ายบริการ', 'xxx', 'เชียงใหม่', '54433', '0802833413', '0255545666', 'test@gmail.com', 'ผู้ใช้ระบบทั่วไป', '2014-09-04 01:57:15'),
(3, 'user3', '1234', 'ทดสอบผู้ใช้3', 'ฝ่ายบริการ', 'xxx', 'เชียงใหม่', '54433', '0802833413', '0255545666', 'test@gmail.com', 'ผู้ใช้ระบบทั่วไป', '2014-09-04 01:57:30'),
(4, 'user4', '1234', 'ทดสอบผู้ใช้4', 'ฝ่ายการเงิน', 'xxx', 'เชียงใหม่', '54433', '0802833413', '0255545666', 'test@gmail.com', 'ผู้ใช้ระบบทั่วไป', '2014-09-04 01:57:49'),
(5, 'user5', '1234', 'ทดสอบผู้ใช้5', 'ฝ่ายการเงิน', 'xxx', 'เชียงใหม่', '54433', '0802833413', '0255545666', 'test@gmail.com', '', '2014-09-04 01:57:59'),
(6, 'emp1', '1234', 'ทดสอบช่างซ่อม', 'ฝ่ายเทคโนโลยี', 'xxx', 'เชียงใหม่', '54433', '0802833413', '0255545666', 'test@gmail.com', 'ช่างซ่อมครุภัณฑ์', '2014-09-04 01:58:57'),
(7, 'emp2', '1234', 'ทดสอบช่างซ่อม2', 'ฝ่ายเทคโนโลยี', 'xxx', 'เชียงใหม่', '54433', '0802833413', '0255545666', 'test@gmail.com', 'ช่างซ่อมครุภัณฑ์', '2014-09-04 01:59:11'),
(8, 'emp3', '1234', 'ทดสอบช่างซ่อม3', 'ฝ่ายเทคโนโลยี', 'xxx', 'เชียงใหม่', '54433', '0802833413', '0255545666', 'test@gmail.com', 'ช่างซ่อมครุภัณฑ์', '2014-09-04 01:59:23'),
(9, 'User6', '12345', 'ทดสอบผู้ใช้6', 'ฝ่ายบริการ', '', 'ฉะเชิงเทรา', '24000', '0385930980', '0258989890', 'Testuser@gmail.com', 'ช่างซ่อมครุภัณฑ์', '2015-04-19 17:31:50'),
(10, 'ckjunk', '12345678910', 'pun', 'กระทรวง', '', 'กรุงเทพมหานคร', '00000', '0800000000', '123456790', 'ck@hotmail.com', 'ช่างซ่อมครุภัณฑ์', '2015-08-28 15:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `order_repair`
--

CREATE TABLE `order_repair` (
  `id_order_repair` int(10) NOT NULL COMMENT 'รหัสใบแจ้งซ่อม(pk)',
  `service_id` int(10) NOT NULL COMMENT 'รหัสตารางใช้ครุภัณฑ์(fk)',
  `member_id` int(10) NOT NULL COMMENT 'รหัสสมาชิก(fk)',
  `admin_id` int(10) NOT NULL COMMENT 'รหัสช่างผู้รับงาน(fk)',
  `code` varchar(10) NOT NULL COMMENT 'รหัสครุภัณฑ์ที่แจ้งซ่อม',
  `malfunction` varchar(100) NOT NULL COMMENT 'อาการเสียที่พบ',
  `price` int(10) NOT NULL COMMENT 'ประเมินราคา',
  `note` text NOT NULL COMMENT 'หมายเหตุ',
  `total` int(7) NOT NULL COMMENT 'ราคาซ่อมจริง',
  `status` varchar(20) NOT NULL COMMENT 'สถานะใบแจ้งซ่อม',
  `date` datetime NOT NULL COMMENT 'วันที่แจ้งซ่อม'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ใบแจ้งซ่อม';

--
-- Dumping data for table `order_repair`
--

INSERT INTO `order_repair` (`id_order_repair`, `service_id`, `member_id`, `admin_id`, `code`, `malfunction`, `price`, `note`, `total`, `status`, `date`) VALUES
(1, 1, 1, 7, 'pc-001', 'เปิดเครื่องไม่ติด', 500, 'ต้องเปลี่ยน แรม', 300, '5', '2014-09-04 02:04:49'),
(2, 2, 2, 8, 'pc-002', 'คอมพิวเตอร์มีเสียงดังเปิดเครื่องไม่ติด', 700, '', 0, '3', '2014-09-04 05:07:17'),
(3, 1, 1, 7, 'pc-001', 'จอฟ้า', 210, 'ddddddddd', 250, '4', '2014-09-04 16:10:32'),
(4, 1, 1, 8, 'pc-001', 'เข้าวิโดว์ไม่ได้', 250, '', 250, '4', '2014-09-04 17:04:04'),
(5, 1, 1, 0, 'pc-001', 'เปิดไม่ติด', 0, '', 0, '1', '2015-05-18 23:47:12'),
(6, 1, 1, 6, 'pc-001', 'เปิดไม่ติด', 320, 'กกกกกก', 300, '3', '2015-05-18 23:47:12'),
(7, 1, 1, 0, 'pc-001', 'พพพกกกกก', 0, '', 0, '1', '2015-08-26 14:44:28'),
(9, 1, 1, 6, 'pc-001', 'เครื่องเปิดไม่ติด', 300, 'ดหดหก ดหกดหกดห ดหกดห', 200, '3', '2015-09-03 17:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `order_repair_detail`
--

CREATE TABLE `order_repair_detail` (
  `id_order_repair_detail` int(10) NOT NULL COMMENT 'รหัสตาราง(pk)',
  `order_repair_id` int(10) NOT NULL COMMENT 'รหัสใบแจ้งซ่อม(fk)',
  `emp_id` int(11) NOT NULL COMMENT 'รหัสช่างซ่อม',
  `malfunction` varchar(100) NOT NULL COMMENT 'อาการเสีย',
  `detail` text NOT NULL COMMENT 'รายละเอียดการซ่อม',
  `total` int(11) NOT NULL COMMENT 'ราคาซ่อม',
  `date` datetime NOT NULL COMMENT 'วันที่บันทึกข้อมูล'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ตารางรายละเอียดการซ่อม';

--
-- Dumping data for table `order_repair_detail`
--

INSERT INTO `order_repair_detail` (`id_order_repair_detail`, `order_repair_id`, `emp_id`, `malfunction`, `detail`, `total`, `date`) VALUES
(1, 2, 6, 'คอมพิวเตอร์มีเสียงดังเปิดเครื่องไม่ติด', 'คอมพิวเตอร์มีเสียงดังเปิดเครื่องไม่ติด2', 650, '2014-09-04 16:44:55'),
(2, 1, 7, 'เปิดเครื่องไม่ติด', 'เปิดเครื่องไม่ติด1', 655, '2014-09-04 16:46:03'),
(3, 3, 7, 'จอฟ้า', 'sssssssss', 200, '2014-09-04 16:53:51'),
(4, 4, 6, 'เข้าวิโดว์ไม่ได้', '111111', 15000, '2014-11-20 18:08:38'),
(5, 2, 8, 'คอมพิวเตอร์มีเสียงดังเปิดเครื่องไม่ติด', '50404', 200, '2015-05-22 09:24:08'),
(6, 8, 6, 'คอมพิวเตอร์เปิดไม่ติด', 'ลงโปรแกรมใหม่', 0, '2015-08-28 15:50:06'),
(7, 9, 6, 'เครื่องเปิดไม่ติด', 'เปลี่ยนแรมใหม่ 2 GB', 300, '2015-09-03 17:47:16'),
(8, 9, 6, 'เครื่องเปิดไม่ติด', 'ฎ๐&quot;ฎ๐ฎ๐ฎ', 200, '2015-09-03 18:45:59'),
(9, 6, 6, 'เปิดไม่ติด', 'ๆำพๆไำๆ กหฟกฟหกฟ', 300, '2015-09-03 19:26:03'),
(10, 8, 6, 'คอมพิวเตอร์เปิดไม่ติด', 'เเ กด เกดเกดเเกเ เดกเกดเกดเก', 300, '2015-09-03 19:33:39'),
(11, 9, 6, 'เครื่องเปิดไม่ติด', '555555555555ก ฟหกฟ กฟหฟ หกฟหกหฟ<br />\r\n<br />\r\nกฟห<br />\r\nก<br />\r\nฟหก<br />\r\nฟหกก', 300, '2015-09-03 19:35:14'),
(12, 9, 6, 'เครื่องเปิดไม่ติด', 'ดหดหก ดหกดหกดห ดหกดห', 200, '2015-09-03 19:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id_province` int(2) NOT NULL COMMENT 'รหัสตาราง(pk)',
  `name` varchar(50) NOT NULL COMMENT 'ชื่อจังหวัด'
) ENGINE=MyISAM DEFAULT CHARSET=tis620 COMMENT='ตารางข้อมูลจังหวัดในประเทศไทย';

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id_province`, `name`) VALUES
(1, 'กระบี่'),
(2, 'กรุงเทพมหานคร'),
(3, 'กาญจนบุรี'),
(4, 'กาฬสินธุ์'),
(5, 'กำแพงเพชร'),
(6, 'ขอนแก่น'),
(7, 'จันทบุรี'),
(8, 'ฉะเชิงเทรา'),
(9, 'ชลบุรี'),
(10, 'ชัยนาท'),
(11, 'ชัยภูมิ'),
(12, 'ชุมพร'),
(13, 'เชียงราย'),
(14, 'เชียงใหม่'),
(15, 'ตรัง'),
(16, 'ตราด'),
(17, 'ตาก'),
(18, 'นครนายก'),
(19, 'นครปฐม'),
(20, 'นครพนม'),
(21, 'นครราชสีมา'),
(22, 'นครศรีธรรมราช'),
(23, 'นครสวรรค์'),
(24, 'นนทบุรี'),
(25, 'นราธิวาส'),
(26, 'น่าน'),
(27, 'บุรีรัมย์'),
(28, 'ปทุมธานี'),
(29, 'ประจวบคีรีขันธ์'),
(30, 'ปราจีนบุรี'),
(31, 'ปัตตานี'),
(32, 'พระนครศรีอยุธยา'),
(33, 'พะเยา'),
(34, 'พังงา'),
(35, 'พัทลุง'),
(36, 'พิจิตร'),
(37, 'พิษณุโลก'),
(38, 'เพชรบุรี'),
(39, ' เพชรบูรณ์'),
(40, 'แพร่'),
(41, 'ภูเก็ต'),
(42, 'มหาสารคาม'),
(43, 'มุกดาหาร'),
(44, 'แม่ฮ่องสอน'),
(45, 'ยโสธร'),
(46, 'ยะลา'),
(47, 'ร้อยเอ็ด'),
(48, 'ระนอง'),
(49, 'ระยอง'),
(50, 'ราชบุรี'),
(51, 'ลพบุรี'),
(52, 'ลำปาง'),
(53, 'ลำพูน'),
(54, 'เลย'),
(55, 'ศรีสะเกษ'),
(56, 'สกลนคร'),
(57, 'สงขลา'),
(58, 'สตูล'),
(59, 'สมุทรปราการ'),
(60, 'สมุทรสงคราม'),
(61, 'สมุทรสาคร'),
(62, 'สระแก้ว'),
(63, 'สระบุรี'),
(64, 'สิงห์บุรี'),
(65, 'สุโขทัย'),
(66, 'สุพรรณบุรี'),
(67, 'สุราษฎร์ธานี'),
(68, 'สุรินทร์'),
(69, 'หนองคาย'),
(70, 'หนองบัวลำภู'),
(71, 'อ่างทอง'),
(72, 'อำนาจเจริญ'),
(73, 'อุดรธานี'),
(74, 'อุตรดิตถ์'),
(75, 'อุทัยธานี'),
(76, 'อุบลราชธานี'),
(77, 'จังหวัดบึงกาฬ');

-- --------------------------------------------------------

--
-- Table structure for table `solution`
--

CREATE TABLE `solution` (
  `id_solution` int(11) NOT NULL COMMENT 'รหัสตาราง(pk)',
  `type_id` int(10) NOT NULL COMMENT 'รหัสประเภทอุปกรณ์(fk)',
  `title` varchar(100) NOT NULL COMMENT 'ปัญหา',
  `detail` text NOT NULL COMMENT 'รายละเอียดการแก้ไข',
  `date` datetime NOT NULL COMMENT 'วันที่บันทึก'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ตารางอาการเสียและวิธีแก้ไข';

--
-- Dumping data for table `solution`
--

INSERT INTO `solution` (`id_solution`, `type_id`, `title`, `detail`, `date`) VALUES
(11, 3, 'เสีย', '<p>\r\n	<span style=\"color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\"><strong>สาเหตุ : </strong>ไฟล์ข้อมูลที่เก็บอยู่บนฮาร์ดดิสก์ของคุณ อาจจะเสียหาย&nbsp;</span><br style=\"margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\" />\r\n	<span style=\"color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\"><strong>การแก้ปัญหา : </strong>ตรวจสอบส่วนของข้อมูลที่หายไปโดยการรันโปรแกรม Disk Defragmenter และเพื่อที่จะรันโปรแกรม Disk Defragmenter6 จากเดสก์ทอปของวินโดวส์ ให้คลิกที่ปุ่ม Start แล้วชี้ไปที่ Programs จากนั้นชี้ไปที่ Accessories และชี้ไปที่ System Tools ท้ายสุดให้คลิกที่ Disk Defragmenter&nbsp;</span></p>\r\n', '2015-08-16 22:11:42'),
(10, 4, 'การทำงานของฮาร์ดไดรฟ์ช้าลง', '<p>\r\n	<span style=\"color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\"><strong>สาเหตุ : </strong>ไม่ได้ต่อคอมพิวเตอร์ลงเต้าเสียบที่ด้านหลัง&nbsp;</span><br style=\"margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\" />\r\n	<span style=\"color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\"><strong>การแก้ปัญหา :</strong> ตรวจดูให้แน่ใจว่าสายไฟนั้นเสียบอยู่ที่เต้าเสียบไปบนฝาผนัง และไฟ AC บนฝาผนังที่ลงสายกราวนด์ของคอมพิวเตอร์อย่างแน่นหนา&nbsp;</span></p>\r\n', '2014-09-01 18:08:02'),
(9, 4, 'ข้อความแสดงการผิดพลาดเกี่ยวกับดิสก์ที่ไม่สามารถบูตได้ ', '<p>\r\n	<span style=\"color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\">สาเหตุ : ไม่ได้ต่อคอมพิวเตอร์ลงเต้าเสียบที่ด้านหลัง&nbsp;</span><br style=\"margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\" />\r\n	<span style=\"color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\">การแก้ปัญหา : ตรวจดูให้แน่ใจว่าสายไฟนั้นเสียบอยู่ที่เต้าเสียบไปบนฝาผนัง และไฟ AC บนฝาผนังที่ลงสายกราวนด์ของคอมพิวเตอร์อย่างแน่นหนา&nbsp;</span></p>\r\n', '2014-09-01 18:07:48'),
(5, 4, 'การทำงานของฮาร์ดไดรฟ์ช้าลง', '<p>\r\n	<span style=\"color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\">สาเหตุ : ไม่ได้ต่อคอมพิวเตอร์ลงเต้าเสียบที่ด้านหลัง&nbsp;</span><br style=\"margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\" />\r\n	<span style=\"color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\">การแก้ปัญหา : ตรวจดูให้แน่ใจว่าสายไฟนั้นเสียบอยู่ที่เต้าเสียบไปบนฝาผนัง และไฟ AC บนฝาผนังที่ลงสายกราวนด์ของคอมพิวเตอร์อย่างแน่นหนา&nbsp;</span></p>\r\n', '2014-09-01 18:11:41'),
(6, 4, 'การทำงานของฮาร์ดไดรฟ์ช้าลง', '<p>\r\n	<span style=\"color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\"><strong>สาเหตุ : </strong>ไม่ได้ต่อคอมพิวเตอร์ลงเต้าเสียบที่ด้านหลัง&nbsp;</span><br style=\"margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\" />\r\n	<span style=\"color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\"><strong>การแก้ปัญหา :</strong> ตรวจดูให้แน่ใจว่าสายไฟนั้นเสียบอยู่ที่เต้าเสียบไปบนฝาผนัง และไฟ AC บนฝาผนังที่ลงสายกราวนด์ของคอมพิวเตอร์อย่างแน่นหนา&nbsp;</span></p>\r\n', '2014-09-01 18:14:29'),
(7, 4, 'ข้อความแสดงการผิดพลาดเกี่ยวกับดิสก์ที่ไม่สามารถบูตได้ ', '<p>\r\n	<span style=\"font-size:14px;\"><span style=\"font-family:tahoma,geneva,sans-serif;\"><span style=\"color: rgb(64, 64, 64);\"><strong>สาเหตุ : </strong>คอมพิวเตอร์พยายามเริ่มระบบจากดิสเก็ตต์ที่ไม่มีซอฟต์แวร์ สำหรับเริ่มระบบ&nbsp;</span><br style=\"margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\" />\r\n	<span style=\"color: rgb(64, 64, 64);\"><strong>การแก้ปัญหา : </strong>นำแผ่นดิสเก็ตต์ออกจากไดรฟ์เมื่อไฟแสดงสถานะบนไดรฟ์ดับ แลว้ทำต่อๆ ไป โดยการกดคีย์ใด ๆ บนแป้นพิมพ์&nbsp;</span></span></span></p>\r\n', '2014-09-01 17:50:14'),
(8, 4, 'ข้อความแสดงการผิดพลาดเกี่ยวกับดิสก์ที่ไม่สามารถบูตได้ ', '<p>\r\n	<span style=\"font-size:12px;\"><span style=\"font-family:tahoma,geneva,sans-serif;\"><span style=\"color: rgb(64, 64, 64);\"><strong>สาเหตุ : </strong>คอมพิวเตอร์พยายามเริ่มระบบจากดิสเก็ตต์ที่ไม่มีซอฟต์แวร์ สำหรับเริ่มระบบ&nbsp;</span><br style=\"margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\" />\r\n	<span style=\"color: rgb(64, 64, 64);\"><strong>การแก้ปัญหา : </strong>นำแผ่นดิสเก็ตต์ออกจากไดรฟ์เมื่อไฟแสดงสถานะบนไดรฟ์ดับ แลว้ทำต่อๆ ไป โดยการกดคีย์ใด ๆ บนแป้นพิมพ์&nbsp;</span></span></span></p>\r\n', '2014-09-01 17:50:30'),
(12, 4, 'คอมพิวเตอร์ไม่สามารถอ่านแผ่นซีดีได้ ', '<p>\r\n	<span style=\"color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\"><strong>สาเหตุ : </strong>ไม่ได้ต่อคอมพิวเตอร์ลงเต้าเสียบที่ด้านหลัง&nbsp;</span><br style=\"margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\" />\r\n	<span style=\"color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\"><strong>การแก้ปัญหา :</strong> ตรวจดูให้แน่ใจว่าสายไฟนั้นเสียบอยู่ที่เต้าเสียบไปบนฝาผนัง และไฟ AC บนฝาผนังที่ลงสายกราวนด์ของคอมพิวเตอร์อย่างแน่นหนา&nbsp;</span></p>\r\n', '2014-09-01 18:09:07'),
(13, 4, 'คอมพิวเตอร์ไม่สามารถอ่านแผ่นซีดีได้ ', '<p>\r\n	<span style=\"color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\">สาเหตุ : ไม่ได้ต่อคอมพิวเตอร์ลงเต้าเสียบที่ด้านหลัง&nbsp;</span><br style=\"margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\" />\r\n	<span style=\"color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\">การแก้ปัญหา : ตรวจดูให้แน่ใจว่าสายไฟนั้นเสียบอยู่ที่เต้าเสียบไปบนฝาผนัง และไฟ AC บนฝาผนังที่ลงสายกราวนด์ของคอมพิวเตอร์อย่างแน่นหนา&nbsp;</span></p>\r\n', '2014-09-01 18:09:20'),
(14, 4, 'คอมพิวเตอร์ไม่สามารถอ่านแผ่นซีดีได้ ', '<p>\r\n	<span style=\"color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\"><strong>สาเหตุ : </strong>ไม่ได้ต่อคอมพิวเตอร์ลงเต้าเสียบที่ด้านหลัง&nbsp;</span><br style=\"margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\" />\r\n	<span style=\"color: rgb(64, 64, 64); font-family: Arial, Helvetica, Tahoma, sans-serif; font-size: 14px;\"><strong>การแก้ปัญหา :</strong> ตรวจดูให้แน่ใจว่าสายไฟนั้นเสียบอยู่ที่เต้าเสียบไปบนฝาผนัง และไฟ AC บนฝาผนังที่ลงสายกราวนด์ของคอมพิวเตอร์อย่างแน่นหนา&nbsp;</span></p>\r\n', '2014-09-01 18:16:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `equipment_model`
--
ALTER TABLE `equipment_model`
  ADD PRIMARY KEY (`id_equipment_model`);

--
-- Indexes for table `equipment_service`
--
ALTER TABLE `equipment_service`
  ADD PRIMARY KEY (`id_equipment_service`);

--
-- Indexes for table `equipment_type`
--
ALTER TABLE `equipment_type`
  ADD PRIMARY KEY (`id_equipment_type`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id_location`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mb_id`);

--
-- Indexes for table `order_repair`
--
ALTER TABLE `order_repair`
  ADD PRIMARY KEY (`id_order_repair`);

--
-- Indexes for table `order_repair_detail`
--
ALTER TABLE `order_repair_detail`
  ADD PRIMARY KEY (`id_order_repair_detail`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id_province`);

--
-- Indexes for table `solution`
--
ALTER TABLE `solution`
  ADD PRIMARY KEY (`id_solution`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตาราง(pk)', AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `equipment_model`
--
ALTER TABLE `equipment_model`
  MODIFY `id_equipment_model` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสครุภัณฑ์(pk)', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `equipment_service`
--
ALTER TABLE `equipment_service`
  MODIFY `id_equipment_service` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `equipment_type`
--
ALTER TABLE `equipment_type`
  MODIFY `id_equipment_type` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภท', AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id_lab` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสห้อง(pk)', AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id_location` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสถานที่(pk)', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mb_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสมาชิก(pk)', AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `order_repair`
--
ALTER TABLE `order_repair`
  MODIFY `id_order_repair` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสใบแจ้งซ่อม(pk)', AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `order_repair_detail`
--
ALTER TABLE `order_repair_detail`
  MODIFY `id_order_repair_detail` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตาราง(pk)', AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id_province` int(2) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตาราง(pk)', AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `solution`
--
ALTER TABLE `solution`
  MODIFY `id_solution` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตาราง(pk)', AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

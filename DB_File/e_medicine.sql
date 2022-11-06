-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.5-10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2022-01-17 19:30:56
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for e_medicine
DROP DATABASE IF EXISTS `e_medicine`;
CREATE DATABASE IF NOT EXISTS `e_medicine` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `e_medicine`;


-- Dumping structure for table e_medicine.tb_area
DROP TABLE IF EXISTS `tb_area`;
CREATE TABLE IF NOT EXISTS `tb_area` (
  `area_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table e_medicine.tb_area: ~6 rows (approximately)
DELETE FROM `tb_area`;
/*!40000 ALTER TABLE `tb_area` DISABLE KEYS */;
INSERT INTO `tb_area` (`area_id`, `area_name`, `added_by`, `entry_time`) VALUES
	(1, 'Muradpur', 'Admin', '2021-07-12 16:05:49'),
	(2, '2 No Gate', 'Admin', '2021-07-12 16:06:03'),
	(3, 'JEC', 'Admin', '2021-07-12 16:06:12'),
	(4, 'Agrabad', 'Admin', '2021-07-12 16:06:21'),
	(5, 'Chawkbazar', 'Admin', '2021-07-12 16:06:34'),
	(6, 'Boddarhat', 'Admin', '2021-07-12 16:06:43');
/*!40000 ALTER TABLE `tb_area` ENABLE KEYS */;


-- Dumping structure for table e_medicine.tb_medicine
DROP TABLE IF EXISTS `tb_medicine`;
CREATE TABLE IF NOT EXISTS `tb_medicine` (
  `medicine_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `shop_code` int(11) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `shop_location_details` varchar(255) DEFAULT NULL,
  `medicine_name` varchar(255) DEFAULT NULL,
  `medicine_type` varchar(255) DEFAULT NULL,
  `medicine_price` double DEFAULT NULL,
  `medicine_image` varchar(255) DEFAULT NULL,
  `medicine_added_date` varchar(255) DEFAULT NULL,
  `shop_owner` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`medicine_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COMMENT='name,phone,shop_id,shop_code,shop_name,shop_address,medicine_name,medicine_type,medicine_price,medicine_image,medicine_added_date,entry_time';

-- Dumping data for table e_medicine.tb_medicine: ~14 rows (approximately)
DELETE FROM `tb_medicine`;
/*!40000 ALTER TABLE `tb_medicine` DISABLE KEYS */;
INSERT INTO `tb_medicine` (`medicine_id`, `name`, `phone`, `shop_id`, `shop_code`, `shop_name`, `shop_location_details`, `medicine_name`, `medicine_type`, `medicine_price`, `medicine_image`, `medicine_added_date`, `shop_owner`, `entry_time`) VALUES
	(1, 'Md Abdur Rahim', '01854568255', 1, 420845, 'Laz Pharma', '#Road No-3, Nur Zahan Bhaban, #2nd Floor, Muradpur', 'Napa Extra', 'Medicine', 30, 'medicine_images/9c0975025ffb51861061c9c541ecd43fnapa-extra.jpg', '2021-07-12', 'Shop Owner', '2021-07-12 19:55:05'),
	(2, 'Md Abdur Rahim', '01854568255', 1, 420845, 'Laz Pharma', '#Road No-3, Nur Zahan Bhaban, #2nd Floor, Muradpur', 'Ace 500', 'Medicine', 45, 'medicine_images/6a370f31ed9e3c5586662b368481db89Ace-500.jpg', '2021-07-12', 'Shop Owner', '2021-07-12 19:55:38'),
	(3, 'Md Abdur Rahim', '01854568255', 1, 420845, 'Laz Pharma', '#Road No-3, Nur Zahan Bhaban, #2nd Floor, Muradpur', 'Exium 20', 'Medicine', 70, 'medicine_images/094eebfc5068f02bba3f35b1e71b0425exium20.jpg', '2021-07-12', 'Shop Owner', '2021-07-12 19:56:07'),
	(4, 'Md Abdur Rahim', '01854568255', 1, 420845, 'Laz Pharma', '#Road No-3, Nur Zahan Bhaban, #2nd Floor, Muradpur', 'Mixtard 30 Penpil', 'Insulin', 410, 'medicine_images/c7a7b24aaa635f5611c6243cecf0a1dcmixtard-30-penfil.jpg', '2021-07-12', 'Shop Owner', '2021-07-12 19:56:45'),
	(5, 'Md Abdur Rahim', '01854568255', 1, 420845, 'Laz Pharma', '#Road No-3, Nur Zahan Bhaban, #2nd Floor, Muradpur', 'Osartil 50 Plus', 'Medicine', 80, 'medicine_images/1d109c6b84de4572d8978e95e0baa4b0osartil-50-plus.jpg', '2021-07-12', 'Shop Owner', '2021-07-12 19:57:18'),
	(6, 'Md Abdur Rahim', '01854568255', 1, 420845, 'Laz Pharma', '#Road No-3, Nur Zahan Bhaban, #2nd Floor, Muradpur', 'Seclo 20', 'Medicine', 45, 'medicine_images/45f2dc3e7e2a98d09acc025bf314aa69seclo_20.jpg', '2021-07-12', 'Shop Owner', '2021-07-12 19:57:39'),
	(7, 'Md Abdur Rahim', '01854568255', 1, 420845, 'Laz Pharma', '#Road No-3, Nur Zahan Bhaban, #2nd Floor, Muradpur', 'KN 95', 'Face Mask', 20, 'medicine_images/a6568643d90ebae63cfb23e9f2235db6kn95.jpg', '2021-07-12', 'Shop Owner', '2021-07-12 19:58:12'),
	(8, 'Md Abdur Rahim', '01854215533', 2, 886462, 'T.T. Pharmachy', '#Road No-2, Zia Bhaban, #Ground Floor, #Shop No-3, New Market', 'ACE 500', 'Medicine', 45, 'medicine_images/5d2ce1d2b0c8d7f311805ab7d59baf92Ace-500.jpg', '2021-07-15', 'Shop Owner', '2021-07-12 19:58:57'),
	(9, 'Md Abdur Rahim', '01854215533', 2, 886462, 'T.T. Pharmachy', '#Road No-2, Zia Bhaban, #Ground Floor, #Shop No-3, New Market', 'Seclo 20', 'Medicine', 45, 'medicine_images/9452be255e23f4633bc5c8f766a8a5a6seclo_20.jpg', '2021-07-15', 'Shop Owner', '2021-07-12 19:59:20'),
	(10, 'Md Abdur Rahim', '01854215533', 2, 886462, 'T.T. Pharmachy', '#Road No-2, Zia Bhaban, #Ground Floor, #Shop No-3, New Market', 'Osartil 50 Plus', 'Medicine', 80, 'medicine_images/fa9a7d9daf60edd3cda52c620045a88fosartil-50-plus.jpg', '2021-07-21', 'Shop Owner', '2021-07-12 19:59:46'),
	(11, 'Md Abdur Rahim', '01854215533', 2, 886462, 'T.T. Pharmachy', '#Road No-2, Zia Bhaban, #Ground Floor, #Shop No-3, New Market', 'Mixtard 30 Penfil', 'Insulin', 405, 'medicine_images/d68aead3f1ed1875ebe6cc597347f42dmixtard-30-penfil.jpg', '2021-07-21', 'Shop Owner', '2021-07-12 20:00:20'),
	(12, 'Md Abdur Rahim', '01854568255', 3, 495094, 'Kamal Pharma', '#Road No-2, Opposite of Akhtaruzzaman Center, Komisonar bhaban, #Shop No-3, Agrabad', 'Napa Extra', 'Medicine', 30, 'medicine_images/9fd82c767277011708a2d1432c74d9b1napa-extra.jpg', '2021-07-21', 'Shop Owner', '2021-07-12 20:00:59'),
	(13, 'Md Abdur Rahim', '01854568255', 3, 495094, 'Kamal Pharma', '#Road No-2, Opposite of Akhtaruzzaman Center, Komisonar bhaban, #Shop No-3, Agrabad', 'Seclo 20', 'Medicine', 45, 'medicine_images/1c48e8288d83cf3c9b93155f9131b16eseclo_20.jpg', '2021-07-23', 'Shop Owner', '2021-07-12 20:01:36'),
	(14, 'Md Abdur Rahim', '01854568255', 3, 495094, 'Kamal Pharma', '#Road No-2, Opposite of Akhtaruzzaman Center, Komisonar bhaban, #Shop No-3, Agrabad', 'Osartil 50 Plus', 'Medicine', 80, 'medicine_images/9cc1124d164ffcbbb7936bd1889f065cosartil-50-plus.jpg', '2021-07-23', 'Shop Owner', '2021-07-12 20:02:00');
/*!40000 ALTER TABLE `tb_medicine` ENABLE KEYS */;


-- Dumping structure for table e_medicine.tb_order_medicine
DROP TABLE IF EXISTS `tb_order_medicine`;
CREATE TABLE IF NOT EXISTS `tb_order_medicine` (
  `order_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `order_code` int(11) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `shop_code` int(11) DEFAULT NULL,
  `shop_address` varchar(255) DEFAULT NULL,
  `shop_image` varchar(255) DEFAULT NULL,
  `medicine` varchar(255) DEFAULT NULL,
  `pescription_image` varchar(255) DEFAULT NULL,
  `order_date` varchar(255) DEFAULT NULL,
  `order_by` varchar(255) DEFAULT NULL,
  `shop_owner` varchar(255) DEFAULT NULL,
  `order_verify_status` int(11) DEFAULT '0',
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='order_code,customer_name,email,phone,address,shop_id,shop_name,shop_code,shop_address,medicine,medicine_image,order_date,order_by,shop_owner,entry_time';

-- Dumping data for table e_medicine.tb_order_medicine: ~3 rows (approximately)
DELETE FROM `tb_order_medicine`;
/*!40000 ALTER TABLE `tb_order_medicine` DISABLE KEYS */;
INSERT INTO `tb_order_medicine` (`order_id`, `order_code`, `customer_name`, `email`, `phone`, `address`, `shop_id`, `shop_name`, `shop_code`, `shop_address`, `shop_image`, `medicine`, `pescription_image`, `order_date`, `order_by`, `shop_owner`, `order_verify_status`, `entry_time`) VALUES
	(1, 758499, 'Md Abdul Karim', 'karim@gmail.com', '01857856888', '2 No. Gate, East Nasirabad', 1, 'Laz Pharma', 420845, 'Muradpur', 'shop_images/8799dede810a6c5e9743a33b4ae90d57shop_5.jpg', 'Napa Extra, Seclo 20, Mistard 30 Penfil', 'pescription_images/234efe6ac350bc04f711414ee5974c6e', '2021-07-13', 'Customer', 'Shop Owner', 1, '2021-07-12 20:15:24'),
	(2, 144784, 'Sahid Rahman', 'sahid@gmail.com', '01857562587', 'Muradpur', 1, 'Laz Pharma', 420845, 'Muradpur', 'shop_images/8799dede810a6c5e9743a33b4ae90d57shop_5.jpg', 'Seclo 20, Osartil 50 Plus', 'pescription_images/8ab1162c8e28cfdff77f9ab913b9ca50', '2021-07-21', 'Sahid', 'Shop Owner', 0, '2021-07-12 20:24:58'),
	(3, 576969, '01875325462', 'jishan@gmail.com', '01875325462', 'JEC', 1, 'Laz Pharma', 420845, 'Muradpur', 'shop_images/8799dede810a6c5e9743a33b4ae90d57shop_5.jpg', 'Napa Extra, Seclo 20, Face Mask, Mistard 30 Penfil', 'pescription_images/6f002e44f5e324fbb80aaf83566a5dce', '2021-07-23', 'Jishan', 'Shop Owner', 0, '2021-07-12 20:28:35');
/*!40000 ALTER TABLE `tb_order_medicine` ENABLE KEYS */;


-- Dumping structure for table e_medicine.tb_return_medicine
DROP TABLE IF EXISTS `tb_return_medicine`;
CREATE TABLE IF NOT EXISTS `tb_return_medicine` (
  `return_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `return_code` int(11) DEFAULT NULL,
  `return_date` varchar(50) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `order_code` int(11) DEFAULT NULL,
  `order_date` varchar(50) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `shop_address` varchar(255) DEFAULT NULL,
  `shop_owner` varchar(255) DEFAULT NULL,
  `return_medicine` varchar(255) DEFAULT NULL,
  `return_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`return_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table e_medicine.tb_return_medicine: ~2 rows (approximately)
DELETE FROM `tb_return_medicine`;
/*!40000 ALTER TABLE `tb_return_medicine` DISABLE KEYS */;
INSERT INTO `tb_return_medicine` (`return_id`, `return_code`, `return_date`, `order_id`, `order_code`, `order_date`, `shop_id`, `shop_name`, `shop_address`, `shop_owner`, `return_medicine`, `return_by`, `entry_time`) VALUES
	(1, 400042, '2021-10-04', 1, 758499, '2021-07-13', 1, 'Laz Pharma', 'Muradpur', 'Shop Owner', 'I want to return (Napa Extra 5 pcs)', 'Customer', '2021-10-04 10:53:31');
/*!40000 ALTER TABLE `tb_return_medicine` ENABLE KEYS */;


-- Dumping structure for table e_medicine.tb_shop
DROP TABLE IF EXISTS `tb_shop`;
CREATE TABLE IF NOT EXISTS `tb_shop` (
  `shop_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `about_shop` varchar(255) DEFAULT NULL,
  `shop_location` varchar(255) DEFAULT NULL,
  `shop_location_details` varchar(255) DEFAULT NULL,
  `shop_image` varchar(255) DEFAULT NULL,
  `shop_added_date` varchar(255) DEFAULT NULL,
  `shop_oc_time` varchar(255) DEFAULT NULL,
  `shop_contact` varchar(255) DEFAULT NULL,
  `shop_code` int(11) DEFAULT NULL,
  `shop_verify_status` int(11) DEFAULT '0',
  `shop_owner` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`shop_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='name,email,phone,shop_name,about_shop,shop_location,shop_location_details,shop_image,shop_added_date,shop_oc_time,shop_contact,shop_code,shop_owner,entry_time';

-- Dumping data for table e_medicine.tb_shop: ~5 rows (approximately)
DELETE FROM `tb_shop`;
/*!40000 ALTER TABLE `tb_shop` DISABLE KEYS */;
INSERT INTO `tb_shop` (`shop_id`, `name`, `email`, `phone`, `shop_name`, `about_shop`, `shop_location`, `shop_location_details`, `shop_image`, `shop_added_date`, `shop_oc_time`, `shop_contact`, `shop_code`, `shop_verify_status`, `shop_owner`, `entry_time`) VALUES
	(1, 'Md Abdur Rahim', 'rahim121@gmail.com', '01854568255', 'Laz Pharma', 'Drug shops and pharmacies, with their convenience, anonymity, and cost-savings (compared to private physicians), are an important source of health services, products, and information that is particularly important in the context of high maternal mortality', 'Muradpur', '#Road No-3, Nur Zahan Bhaban, #2nd Floor, #Shop No-3, Muradpur', 'shop_images/8799dede810a6c5e9743a33b4ae90d57shop_5.jpg', '2021-07-12', '( Sat - Wed ) 10:00 AM - 12:00 PM', '01875482155, 01845254566', 420845, 1, 'Shop Owner', '2021-07-12 15:33:07'),
	(2, 'Md Abdur Rahim', 'rahim121@gmail.com', '01854215533', 'T.T. Pharmachy', 'Drug shops and pharmacies, with their convenience, anonymity, and cost-savings (compared to private physicians), are an important source of health services, products, and information that is particularly important in the context of high maternal mortality', 'New Market', '#Road No-2, Zia Bhaban, #Ground Floor, #Shop No-3, New Market', 'shop_images/615a1314f918e751b50bff76a22075a53.jpg', '2021-07-15', '( Sat - Wed ) 10:00 AM - 12:00 PM', '01875482155, 01845254566', 886462, 1, 'Shop Owner', '2021-07-12 15:36:03'),
	(3, 'Md Abdur Rahim', 'rahim121@gmail.com', '01854568255', 'Kamal Pharma', 'Drug shops and pharmacies, with their convenience, anonymity, and cost-savings (compared to private physicians), are an important source of health services, products, and information that is particularly important in the context of high maternal mortality', 'Agrabad', '#Road No-2, Opposite of Akhtaruzzaman Center, Komisonar bhaban, #Shop No-3, Agrabad', 'shop_images/3a2f5d1903192497fb068d89b611edc3medicine_shop.jpg', '2021-07-17', '( Sat - Thur ) 10:00 AM - 01:00 PM', '01875482155, 01845254566', 495094, 1, 'Shop Owner', '2021-07-12 15:39:56'),
	(4, 'Md Abdur Rahim', 'rahim121@gmail.com', '01854215488', 'Janata Drug House', 'Drug shops and pharmacies, with their convenience, anonymity, and cost-savings (compared to private physicians), are an important source of health services, products, and information that is particularly important in the context of high maternal mortality', 'GEC', '#Road No-2, Central Plaza, #Ground Floor, #Shop No-5, GEC', 'shop_images/d90d68386eabba05748ca836db1fb32b1.jpg', '2021-07-19', '( Sat - Wed ) 10:00  AM - 12:00 PM', '01875482155, 01845254566', 229451, 1, 'Shop Owner', '2021-07-12 15:44:10'),
	(5, 'Md Abdur Rahim', 'rahim121@gmail.com', '01824874255', 'Zihan Pharma', 'Drug shops and pharmacies, with their convenience, anonymity, and cost-savings (compared to private physicians), are an important source of health services, products, and information that is particularly important in the context of high maternal mortality', 'Chawkbazar', '#Road No-3, Zia Bhaban, #1st Floor, #Shop No-3, Chawkbazar', 'shop_images/0133de88784b96e7960129029d98385c5.jpg', '2021-07-21', '( Sat -Wed ) 10:00 AM - 11:00 PM', '01875485688', 147822, 0, 'Shop Owner', '2021-07-12 15:53:36');
/*!40000 ALTER TABLE `tb_shop` ENABLE KEYS */;


-- Dumping structure for table e_medicine.tb_shop_payment
DROP TABLE IF EXISTS `tb_shop_payment`;
CREATE TABLE IF NOT EXISTS `tb_shop_payment` (
  `payment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `shop_code` int(11) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `shop_location_details` varchar(255) DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `trx_id` varchar(255) DEFAULT NULL,
  `payment_ss` varchar(255) DEFAULT NULL,
  `paid_by` varchar(255) DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `payment_code` int(11) DEFAULT NULL,
  `payment_verify_status` int(11) DEFAULT '0',
  `owner_user_name` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='name,phone,shop_id,shop_code,shop_name,shop_location_details,paid_amount,trx_id,payment_ss,paid_by,payment_date,payment_code,owner_user_name,entry_time';

-- Dumping data for table e_medicine.tb_shop_payment: ~4 rows (approximately)
DELETE FROM `tb_shop_payment`;
/*!40000 ALTER TABLE `tb_shop_payment` DISABLE KEYS */;
INSERT INTO `tb_shop_payment` (`payment_id`, `name`, `phone`, `shop_id`, `shop_code`, `shop_name`, `shop_location_details`, `paid_amount`, `trx_id`, `payment_ss`, `paid_by`, `payment_date`, `payment_code`, `payment_verify_status`, `owner_user_name`, `entry_time`) VALUES
	(1, 'Md Abdur Rahim', '01854568255', 1, 420845, 'Laz Pharma', '#Road No-3, Nur Zahan Bhaban, #2nd Floor, Muradpur', 500, '8G41LMGK57', 'payment_screenshot_images/ba8a7a79b3c409ea2137b704594cef4ebkash_payment.jpg', 'Bkash', '2021-07-12', 936654, 1, 'Shop Owner', '2021-07-12 19:48:46'),
	(2, 'Md Abdur Rahim', '01854215533', 2, 886462, 'T.T. Pharmachy', '#Road No-2, Zia Bhaban, #Ground Floor, #Shop No-3, New Market', 500, '8FT2HOERYG', 'payment_screenshot_images/d57c5cf525a166547c2e42238eab81d5bkash_payment.jpg', 'Bkash', '2021-07-15', 552198, 1, 'Shop Owner', '2021-07-12 19:49:31'),
	(3, 'Md Abdur Rahim', '01854568255', 3, 495094, 'Kamal Pharma', '#Road No-2, Opposite of Akhtaruzzaman Center, Komisonar bhaban, #Shop No-3, Agrabad', 500, '8FT9HLQTIX', 'payment_screenshot_images/e931eb857fcae40bad8fdd7e1fcca25fbkash_payment.jpg', 'Bkash', '2021-07-17', 826840, 1, 'Shop Owner', '2021-07-12 19:50:06'),
	(4, 'Md Abdur Rahim', '01854215488', 4, 229451, 'Janata Drug House', '#Road No-2, Central Plaza, #Ground Floor, #Shop No-5, GEC', 500, '8FN1DIK3YX', 'payment_screenshot_images/7027cc0384a2a7808833f9c7b247559abkash_payment.jpg', 'Bkash', '2021-07-19', 778821, 1, 'Shop Owner', '2021-07-12 19:50:56');
/*!40000 ALTER TABLE `tb_shop_payment` ENABLE KEYS */;


-- Dumping structure for table e_medicine.tb_shop_review
DROP TABLE IF EXISTS `tb_shop_review`;
CREATE TABLE IF NOT EXISTS `tb_shop_review` (
  `review_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `shop_code` int(11) DEFAULT NULL,
  `rating_value` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `shop_owner` varchar(255) DEFAULT NULL,
  `reviewed_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table e_medicine.tb_shop_review: ~3 rows (approximately)
DELETE FROM `tb_shop_review`;
/*!40000 ALTER TABLE `tb_shop_review` DISABLE KEYS */;
INSERT INTO `tb_shop_review` (`review_id`, `shop_id`, `shop_name`, `shop_code`, `rating_value`, `comment`, `shop_owner`, `reviewed_by`, `entry_time`) VALUES
	(1, 1, 'Laz Pharma', 420845, 4, 'Their service is very good.', 'Shop Owner', 'Customer', '2021-07-12 20:15:50'),
	(2, 1, 'Laz Pharma', 420845, 5, 'They are well behaved and their service is good. Thank to Laz Pharma.', 'Shop Owner', 'Sahid', '2021-07-12 20:26:02'),
	(3, 1, 'Laz Pharma', 420845, 3, 'Thanks to Laz Pharma.', 'Shop Owner', 'Jishan', '2021-07-12 20:29:07');
/*!40000 ALTER TABLE `tb_shop_review` ENABLE KEYS */;


-- Dumping structure for table e_medicine.tb_user
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table e_medicine.tb_user: ~5 rows (approximately)
DELETE FROM `tb_user`;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` (`user_id`, `name`, `email`, `phone`, `address`, `user_name`, `password`, `user_type`, `entry_time`) VALUES
	(1, 'Md Rahat', 'admin@gmail.com', '01840516731', 'Agrabad', 'Admin', '12345', 'Admin', '2021-07-07 11:23:00'),
	(2, 'Md Rahim', 'shopowner@gmail.com', '01857458255', 'Muradpur', 'Shop Owner', '12345', 'Shop Owner', '2021-07-07 11:23:00'),
	(3, 'Md Karim', 'customer@gmail.com', '01845862635', 'JEC', 'Customer', '12345', 'Customer', '2021-07-07 11:23:00'),
	(4, 'Sahid Rahman', 'sahid@gmail.com', '01857562587', 'Muradpur', 'Sahid', '12345', 'Customer', '2021-07-12 16:18:47'),
	(5, 'Jishan Ahmed', 'jishan@gmail.com', '01875325462', 'JEC', 'Jishan', '12345', 'Customer', '2021-07-12 16:19:31');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

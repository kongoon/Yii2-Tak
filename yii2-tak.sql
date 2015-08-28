-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2015 at 01:15 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii2-tak`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1440733321),
('staff', '4', 1440733321),
('user', '6', 1440733321);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1440732552, 1440732552),
('mission/mission/create', 2, 'เพิ่มภารกิจ', NULL, NULL, 1440730780, 1440730780),
('mission/mission/delete', 2, 'ลบภารกิจ', NULL, NULL, 1440730780, 1440730780),
('mission/mission/index', 2, 'รายการภารกิจ', NULL, NULL, 1440730780, 1440730780),
('mission/mission/update', 2, 'แก้ไขภารกิจ', NULL, NULL, 1440730780, 1440730780),
('mission/mission/view', 2, 'ดูภารกิจ', NULL, NULL, 1440730780, 1440730780),
('personal/personal/create', 2, 'เพิ่มบุคลากร', NULL, NULL, 1440730780, 1440730780),
('personal/personal/delete', 2, 'ลบบุคลากร', NULL, NULL, 1440730780, 1440730780),
('personal/personal/index', 2, 'รายการบุคลากร', NULL, NULL, 1440730780, 1440730780),
('personal/personal/update', 2, 'แก้ไขบุคลากร', NULL, NULL, 1440730780, 1440730780),
('personal/personal/view', 2, 'ดูบุคลากร', NULL, NULL, 1440730780, 1440730780),
('setting/department/create', 2, 'เพิ่มฝ่าย', NULL, NULL, 1440730780, 1440730780),
('setting/department/delete', 2, 'ลบฝ่าย', NULL, NULL, 1440730780, 1440730780),
('setting/department/index', 2, 'รายการฝ่าย', NULL, NULL, 1440730780, 1440730780),
('setting/department/update', 2, 'แก้ไขฝ่าย', NULL, NULL, 1440730780, 1440730780),
('setting/department/view', 2, 'ดูฝ่าย', NULL, NULL, 1440730780, 1440730780),
('staff', 1, NULL, NULL, NULL, 1440732552, 1440732552),
('updateOwnPost', 2, 'ปรับปรุงข้อมูลการโพสของตัวเอง', 'isStaff', NULL, 1440736090, 1440736090),
('user', 1, NULL, NULL, NULL, 1440732551, 1440732551);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('staff', 'mission/mission/create'),
('admin', 'mission/mission/delete'),
('user', 'mission/mission/index'),
('updateOwnPost', 'mission/mission/update'),
('user', 'mission/mission/view'),
('staff', 'personal/personal/create'),
('admin', 'personal/personal/delete'),
('user', 'personal/personal/index'),
('staff', 'personal/personal/update'),
('user', 'personal/personal/view'),
('staff', 'setting/department/create'),
('admin', 'setting/department/delete'),
('user', 'setting/department/index'),
('staff', 'setting/department/update'),
('user', 'setting/department/view'),
('admin', 'staff'),
('staff', 'updateOwnPost'),
('staff', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('isStaff', 'O:27:"common\\components\\StaffRule":3:{s:4:"name";s:7:"isStaff";s:9:"createdAt";i:1440736090;s:9:"updatedAt";i:1440736090;}', 1440736090, 1440736090);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(100) NOT NULL COMMENT 'หน่วยงาน',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`) VALUES
(1, 'ฝ่ายบริหาร'),
(2, 'การเงิน');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1440408782),
('m130524_201442_init', 1440408796),
('m140506_102106_rbac_init', 1440668585);

-- --------------------------------------------------------

--
-- Table structure for table `mission`
--

CREATE TABLE IF NOT EXISTS `mission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personal_user_id` int(11) NOT NULL COMMENT 'ผู้บันทึก',
  `title` varchar(255) NOT NULL COMMENT 'เรื่อง',
  `description` text COMMENT 'รายละเอียด',
  `date_start` datetime NOT NULL COMMENT 'เริ่ม',
  `date_end` datetime NOT NULL COMMENT 'สิ้นสุด',
  `created_at` datetime DEFAULT NULL COMMENT 'เพิ่มเมื่อ',
  `updated_at` datetime DEFAULT NULL COMMENT 'ปรับปรุงเมื่อ',
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mission_personal1_idx` (`personal_user_id`),
  KEY `fk_mission_personal2_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mission`
--

INSERT INTO `mission` (`id`, `personal_user_id`, `title`, `description`, `date_start`, `date_end`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 1, 'ทดสอบ', 'ทดสอบ', '2015-08-26 13:50:00', '2015-08-28 13:55:00', '2015-08-26 13:52:32', '2015-08-26 13:52:32', 1),
(2, 4, 'อบรม', 'รายละเอียด อบรม', '2015-08-31 08:00:00', '2015-09-04 16:00:00', '2015-08-26 14:56:02', '2015-08-26 14:56:02', 1),
(3, 6, 'ทดสอบหัวข้อภารกิจ', 'รายละเอียดการทดสอบ', '2015-08-27 08:00:00', '2015-09-04 16:00:00', '2015-08-26 16:04:32', '2015-08-26 16:04:32', 1),
(4, 1, 'ทดสอบ', 'ทดสอบรายละเอียด', '2015-08-31 08:00:00', '2015-09-04 16:00:00', '2015-08-28 11:30:40', '2015-08-28 11:30:40', 4);

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `user_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL COMMENT 'สังกัด',
  `firstname` varchar(100) NOT NULL COMMENT 'ชื่อ',
  `lastname` varchar(100) NOT NULL COMMENT 'นามสกุล',
  `address` text COMMENT 'ที่อยู่',
  `tel` varchar(45) DEFAULT NULL COMMENT 'เบอร์โทร',
  `color` varchar(7) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_personal_user1_idx` (`user_id`),
  KEY `fk_personal_department1_idx` (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`user_id`, `department_id`, `firstname`, `lastname`, `address`, `tel`, `color`) VALUES
(1, 1, 'Admin', 'Admin', 'Testing Address', '0891234567', '#ff0000'),
(4, 1, 'ทดสอบชื่อ', 'ทดสอบนามสกุล', 'Testing', '0891234567', '#ff9900'),
(6, 1, 'ทดสอบ', 'นามสกุล', 'ทดสอบที่อยู่', '0891234567', '#0000ff');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT 'เรื่อง',
  `description` text NOT NULL COMMENT 'รายละเอียด',
  `created_at` datetime DEFAULT NULL COMMENT 'บันทึกเมื่อ',
  `updated_at` datetime DEFAULT NULL COMMENT 'แก้ไขเมื่อ',
  `user_id` int(11) NOT NULL COMMENT 'ผู้โพส',
  PRIMARY KEY (`id`),
  KEY `fk_post_user_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 'aaaaaaaa', 'aaaaaaaaa', NULL, '2015-08-25 14:25:56', 1),
(3, 'ทดสอบ', 'ทดสอบรายละเอียด', NULL, NULL, 1),
(4, 'sdf', 'sdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 'ทดสอบ', 'ทดสอบ', '2015-08-25 14:33:11', '2015-08-25 14:33:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `role` int(11) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'jpnLnNu-Um20OwPavA9VDYEF-K_2Ph6P', '$2y$13$im2KPKS4ZBJfEdz7vW.eaumPoMKCmJlRHpTnc1yqMSWfN02TNIvu6', NULL, 'admin@admin.com', 10, 10, 1440409225, 1440409225),
(4, 'staff', '6D9xYZ88HcNXUdLbVHmlSw4dMvODEUSv', '$2y$13$0TyGoPPSVoOps2jvM9cXru9m0p2TeJru1lAcZJ5GoYsV7gyWVYg2G', NULL, 'demo@demo.com', 10, 5, 1440559241, 1440561716),
(6, 'demo', '14eti46kz1jgDIWe6-Q9sKkHB7QC2W9t', '$2y$13$0TyGoPPSVoOps2jvM9cXru9m0p2TeJru1lAcZJ5GoYsV7gyWVYg2G', NULL, 'test@test.com', 10, 1, 1440579822, 1440579822);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mission`
--
ALTER TABLE `mission`
  ADD CONSTRAINT `fk_mission_personal1` FOREIGN KEY (`personal_user_id`) REFERENCES `personal` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mission_personal2` FOREIGN KEY (`user_id`) REFERENCES `personal` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `fk_personal_department1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personal_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

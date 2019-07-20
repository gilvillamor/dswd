-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2019 at 06:08 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_dswd`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barangay`
--

CREATE TABLE IF NOT EXISTS `tbl_barangay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barangay_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_barangay`
--

INSERT INTO `tbl_barangay` (`id`, `barangay_name`) VALUES
(1, 'Select...'),
(2, 'Barangay 2'),
(3, 'Barangay 3'),
(4, 'Barangay 4'),
(5, 'Barangay 5'),
(6, 'Barangay 6'),
(7, 'Barangay 7'),
(8, 'Barangay 8'),
(9, 'Barangay 9'),
(10, 'Barangay 10'),
(11, 'Barangay 1'),
(12, 'Barangay 2'),
(13, 'Barangay 3'),
(14, 'Barangay 4'),
(15, 'Barangay 5'),
(16, 'Barangay 6'),
(17, 'Barangay 7'),
(18, 'Barangay 8'),
(19, 'Barangay 9'),
(20, 'Barangay 10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cv_school`
--

CREATE TABLE IF NOT EXISTS `tbl_cv_school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `household_id` varchar(200) NOT NULL,
  `household_member_id` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `recorded_grade_level` varchar(200) NOT NULL,
  `period` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `school_deworming` varchar(200) NOT NULL,
  `school_name` varchar(200) NOT NULL,
  `municipality` varchar(200) NOT NULL,
  `school_coordinator_name` varchar(200) NOT NULL,
  `school_coordinator_other` varchar(200) NOT NULL,
  `swa_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_position`
--

CREATE TABLE IF NOT EXISTS `tbl_employee_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_position` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_employee_position`
--

INSERT INTO `tbl_employee_position` (`id`, `employee_position`) VALUES
(1, 'Select...'),
(2, 'City Link'),
(3, 'Computer Maintenance Technologist'),
(4, '4P''S School Coordinator'),
(5, 'Regional Information Technology Officer'),
(6, 'Information Technology Officer II'),
(7, 'Social Welfare Assistant');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade_level`
--

CREATE TABLE IF NOT EXISTS `tbl_grade_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_level` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tbl_grade_level`
--

INSERT INTO `tbl_grade_level` (`id`, `grade_level`) VALUES
(1, 'Select...'),
(2, 'Kinder'),
(3, 'Day Care'),
(4, 'Kinder'),
(5, 'Grade 1'),
(6, 'Grade 2'),
(7, 'Grade 3'),
(8, 'Grade 4'),
(9, 'Grade 5'),
(10, 'Grade 6'),
(11, 'Grade 7'),
(12, 'Grade 8'),
(13, 'Grade 9'),
(14, 'Grade 10'),
(15, 'Grade 1'),
(16, 'Grade 2'),
(17, 'Grade 3'),
(18, 'Grade 4'),
(19, 'Grade 5'),
(20, 'Grade 6'),
(21, 'Grade 7'),
(22, 'Grade 8'),
(23, 'Grade 9'),
(24, 'Grade 10'),
(25, 'Grade 11'),
(26, 'Grade 12'),
(27, 'Grade 11'),
(28, 'Grade 12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_municipality`
--

CREATE TABLE IF NOT EXISTS `tbl_municipality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `municipality_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_municipality`
--

INSERT INTO `tbl_municipality` (`id`, `municipality_name`) VALUES
(1, 'Select...'),
(2, 'Ormoc City'),
(3, 'Tacloban City (Capital)'),
(4, 'Abuyog'),
(5, 'Alangalang'),
(6, 'Albuera'),
(7, 'Babatngon'),
(8, 'Barugo'),
(9, 'Bato'),
(10, 'Burauen'),
(11, 'City of Baybay'),
(12, 'Ormoc City'),
(13, 'Tacloban City (Capital)'),
(14, 'Abuyog'),
(15, 'Alangalang'),
(16, 'Albuera'),
(17, 'Babatngon'),
(18, 'Barugo'),
(19, 'Bato'),
(20, 'Burauen');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_province`
--

CREATE TABLE IF NOT EXISTS `tbl_province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_province`
--

INSERT INTO `tbl_province` (`id`, `province_name`) VALUES
(1, 'Select...'),
(2, 'Samar'),
(3, 'Leyte'),
(4, 'Eastern Samar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_remarks`
--

CREATE TABLE IF NOT EXISTS `tbl_remarks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `remarks` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_remarks`
--

INSERT INTO `tbl_remarks` (`id`, `remarks`) VALUES
(1, 'No remarks'),
(2, 'Not Enrolled in this School'),
(3, 'Transferred'),
(8, 'Dropout');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reporting_period`
--

CREATE TABLE IF NOT EXISTS `tbl_reporting_period` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `period` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_reporting_period`
--

INSERT INTO `tbl_reporting_period` (`id`, `period`) VALUES
(1, 'Select Period...'),
(2, 'Period 1 FEB-MARCH'),
(3, 'Period 2 APRIL-MAY'),
(4, 'Period 3 JUNE-JULY'),
(6, 'Period 4 AUG-SEPT'),
(7, 'Period 5 OCT-NOV'),
(8, 'Period 6 DEC-JAN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schools`
--

CREATE TABLE IF NOT EXISTS `tbl_schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(200) NOT NULL,
  `barangay_name` varchar(200) NOT NULL,
  `municipality_name` varchar(200) NOT NULL,
  `province_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_schools`
--

INSERT INTO `tbl_schools` (`id`, `school_name`, `barangay_name`, `municipality_name`, `province_name`) VALUES
(1, 'Select...', '', '', ''),
(2, 'Tacloban City National High School', 'Barangay 6', 'Tacloban City (Capital)', 'Leyte'),
(3, 'Leyte National High School', 'Barangay 5', 'Tacloban City (Capital)', 'Leyte'),
(4, 'Liceo Del Verbo Divino', 'Barangay 10', 'Tacloban City (Capital)', 'Leyte'),
(5, 'Palanog Elementary School', 'Barangay 7', 'Tacloban City (Capital)', 'Leyte');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school_coordinator`
--

CREATE TABLE IF NOT EXISTS `tbl_school_coordinator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_coordinator_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_school_coordinator`
--

INSERT INTO `tbl_school_coordinator` (`id`, `school_coordinator_name`) VALUES
(1, 'Select...'),
(2, 'Ma Riza Balintong'),
(3, 'Lily Dumas'),
(4, 'Lilia Villafrancia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students_beneficiary_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_students_beneficiary_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `household_id` varchar(200) NOT NULL,
  `household_member_id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `recorded_grade_level` varchar(200) NOT NULL,
  `school_name` varchar(200) NOT NULL,
  `municipality` varchar(200) NOT NULL,
  `province` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbl_students_beneficiary_profile`
--

INSERT INTO `tbl_students_beneficiary_profile` (`id`, `household_id`, `household_member_id`, `fname`, `lname`, `sex`, `recorded_grade_level`, `school_name`, `municipality`, `province`) VALUES
(22, '083747089-5273-00004', 26409384, 'MAURINE JANE', 'SABORNIDO', 'male', 'Day Care', 'Utap ES', 'City of Baybay', 'Leyte'),
(23, '083747089-5298-00017', 26444630, 'MARISOL', 'VALERA', 'female', 'Grade 1', 'Utap ES', 'Tacloban City (Capital)', 'Leyte'),
(24, '083747018-2953-00055', 22317788, 'CLARK STEVEN', 'ABRAHAM', 'male', 'Grade 7', 'Leyte National High School', 'Tacloban City (Capital)', 'Leyte'),
(25, '1211', 5004000, 'Gil', 'Villamor', 'Female', 'Day Care', 'Leyte National High School', 'Ormoc City', 'Samar'),
(26, '137605156-0001-21092', 40645, 'LEA', 'CARATAY', 'male', 'Grade 2', 'Tacloban City National High School', 'Tacloban City (Capital)', 'Leyte');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_swa`
--

CREATE TABLE IF NOT EXISTS `tbl_swa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `swa_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_swa`
--

INSERT INTO `tbl_swa` (`id`, `swa_name`) VALUES
(1, 'Select'),
(2, 'Mae Pelino'),
(3, 'Julie Belen Bituin'),
(4, 'Joan Antoni'),
(5, 'Justine Benedict Macuto');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year`
--

CREATE TABLE IF NOT EXISTS `tbl_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_year`
--

INSERT INTO `tbl_year` (`id`, `year`) VALUES
(1, 'Select...'),
(2, '2016'),
(3, '2017'),
(4, '2018'),
(5, '2019'),
(6, '2020');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `account_type` varchar(200) NOT NULL,
  `employee_position` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `account_type`, `employee_position`) VALUES
(2, 'admin', 'admin', 'admin', '', ''),
(3, 'user', 'user', 'username', 'administrator', 'Computer Maintenance Technologist'),
(4, 'gildx', 'gildx', 'Gilda Villamor', 'administrator', 'Computer Maintenance Technologist'),
(5, 'divina', 'divina', 'Divina Monte', 'user', 'Social Welfare Assistant'),
(6, 'noel', 'dayun', 'Noel Dayun', 'administrator', 'Computer Maintenance Technologist');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

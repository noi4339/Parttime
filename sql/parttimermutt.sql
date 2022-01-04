-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 03:42 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parttimermutt`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `faculty_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `department_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`faculty_id`, `department_id`, `department_name`) VALUES
(1, 1, 'วิศวกรรมโยธา'),
(1, 2, 'วิศวกรรมวัสดุและโลหการ'),
(1, 3, 'วิศวกรรมไฟฟ้า'),
(1, 4, 'วิศวกรรมเครื่องกล'),
(1, 5, 'วิศวกรรมอุตสาหการ'),
(1, 6, 'วิศวกรรมสิ่งทอ'),
(1, 7, 'วิศวกรรมอิเล็กทรอนิกส์และโทรคมนาคม'),
(1, 8, 'วิศวกรรมคอมพิวเตอร์'),
(1, 9, 'วิศวกรรมเคมี'),
(1, 10, 'วิศวกรรมเกษตร'),
(2, 11, 'การตลาด'),
(2, 12, 'การจัดการ'),
(2, 13, 'การบัญชี'),
(2, 14, 'ระบบสารสนเทศ'),
(2, 15, 'การเงินและเศรษฐศาสตร์'),
(2, 16, 'บริหารธุรกิจระหว่างประเทศ'),
(3, 17, 'การออกแบบแฟชั่นและนวัตกรรมเครื่องแต่งกาย'),
(3, 18, 'อาหารและโภชนาการ'),
(3, 19, 'ศิลปประดิษฐ์ในงานคหกรรมศาสตร์'),
(3, 20, 'การศึกษาปฐมวัย'),
(4, 21, 'ศิลปศึกษา'),
(4, 22, 'จิตรกรรม'),
(4, 23, 'ทัศนศิลป์'),
(4, 24, 'ศิลปะไทย'),
(4, 25, 'ออกแบบนิเทศศิลป์'),
(4, 26, 'ออกแบบผลิตภัณฑ์'),
(4, 27, 'ออกแบบภายใน'),
(4, 28, 'นวัตกรรมการออกแบบผลิตภัณฑ์ร่วมสมัย'),
(4, 29, 'นาฏศิลป์ไทยศึกษา'),
(4, 30, 'ดนตรีคีตศิลป์ไทยศึกษา'),
(4, 31, 'ดนตรีคีตศิลป์สากลศึกษา'),
(5, 32, 'เทคโนโลยีการผลิตพืชและภูมิทัศน์'),
(5, 33, 'เทคโนโลยีการผลิตสัตว์และวิทยาศาสตร์สุขภาพสัตว์'),
(5, 34, 'เทคโนโลยีอุตสาหกรรมเกษตร'),
(6, 35, 'วิศวกรรมโยธา'),
(6, 36, 'วิศวกรรมไฟฟ้า'),
(6, 37, 'วิศวกรรมเครื่องกล'),
(6, 38, 'วิศวกรรมอุตสาหการ'),
(6, 39, 'วิศวกรรมคอมพิวเตอร์'),
(6, 40, 'วิศวกรรมอิเล็กทรอนิกส์และระบบอัตโนมัติ'),
(6, 41, 'เทคโนโลยีบริหารงานก่อสร้าง'),
(6, 42, 'เทคโนโลยีบริหารการผลิต'),
(6, 43, 'วิศวกรรมอิเล็กทรอนิกส์อัจฉริยะ'),
(6, 44, 'วิศวกรรมเมคคาทรอนิกส์และหุ่นยนต์'),
(6, 45, 'วิศวกรรมเทคโนโลยีดิจิทัลเพื่อการศึกษา'),
(6, 46, 'วิศวกรรมเทคโนโลยีและสื่อสารการศึกษา'),
(6, 47, 'วิศวกรรมเทคโนโลยีสารสนเทศการศึกษา'),
(6, 48, 'นวัตกรรมการเรียนรู้และเทคโนโลยีสารสนเทศ'),
(7, 49, 'เทคโนโลยีสถาปัตยกรรม'),
(7, 50, 'สถาปัตยกรรมภายใน'),
(8, 51, 'คณิตศาสตร์ประยุกต์'),
(8, 52, 'เคมีประยุกต์'),
(8, 53, 'ชีววิทยาประยุกต์'),
(8, 54, 'ฟิสิกส์ประยุกต์'),
(8, 55, 'วิทยาการคอมพิวเตอร์'),
(8, 56, 'เทคโนโลยีสารสนเทศและการสื่อสารดิจิทัล'),
(8, 57, 'สถิติประยุกต์'),
(8, 58, 'วิทยาศาสตร์และการจัดการเทคโนโลยีอาหาร'),
(8, 59, 'การวิเคราะห์และจัดการข้อมูลขนาดใหญ่'),
(9, 60, 'เทคโนโลยีการถ่ายภาพและภาพยนตร์'),
(9, 61, 'เทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง'),
(9, 62, 'เทคโนโลยีมัลติมีเดีย'),
(9, 63, 'เทคโนโลยีสื่อดิจิทัล'),
(9, 64, 'เทคโนโลยีการโฆษณาและประชาสัมพันธ์'),
(9, 65, 'เทคโนโลยีการพิมพ์ดิจิทัลและบรรจุภัณฑ์'),
(10, 66, 'วิชาการท่องเที่ยว'),
(10, 67, 'การจัดการการโรงแรม'),
(10, 68, 'ภาษาอังกฤษเพื่อการ'),
(10, 69, 'อุตสาหกรรมการบริการการบิน'),
(11, 70, 'สุขภาพและความงาม'),
(11, 71, 'สาขาวิชานวัตกรรมผลิตภัณฑ์สุขภาพ'),
(12, 72, 'พยาบาลศาสตร์');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`) VALUES
(1, 'คณะวิศวกรรมศาสตร์ (วศ.)'),
(2, 'คณะบริหารธุรกิจ (บธ.)'),
(3, 'คณะเทคโนโลยีคหกรรมศาสตร์ (ทค.)'),
(4, 'คณะศิลปกรรมศาสตร์ (ศก.)'),
(5, 'คณะเทคโนโลยีการเกษตร (ทก.)'),
(6, 'คณะครุศาสตร์อุตสาหกรรม (คอ.)'),
(7, 'คณะสถาปัตยกรรมศาสตร์ (สถ.)'),
(8, 'คณะวิทยาศาสตร์และเทคโนโลยี (วท.)'),
(9, 'คณะเทคโนโลยีสื่อสารมวลชน (ทสม.)'),
(10, 'คณะศิลปศาสตร์ (ศศ.)'),
(11, 'คณะการแพทย์บูรณาการ (กพบ.)'),
(12, 'คณะพยาบาลศาสตร์');

-- --------------------------------------------------------

--
-- Table structure for table `org_detail`
--

CREATE TABLE `org_detail` (
  `org_detail_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `org_name` varchar(100) NOT NULL,
  `add_org` text NOT NULL,
  `PP20` text NOT NULL,
  `affidavit` text NOT NULL,
  `idcard_org` text NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lng` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `org_detail`
--

INSERT INTO `org_detail` (`org_detail_id`, `user_id`, `org_name`, `add_org`, `PP20`, `affidavit`, `idcard_org`, `lat`, `lng`) VALUES
(3, 56, 'sawaddee', 'm.1', 'PPJ-ParttimeRmutt.pptx', 'แผนการดำเนินงานparttime.pdf', 'ตอบคำถาม.txt', '13.72692023178957', '100.53144693374634');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `skill_id` int(11) NOT NULL,
  `skill_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`skill_id`, `skill_name`) VALUES
(1, 'skill1'),
(2, 'skill2');

-- --------------------------------------------------------

--
-- Table structure for table `std_detail`
--

CREATE TABLE `std_detail` (
  `std_detail_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `sex` varchar(8) NOT NULL,
  `age` int(11) NOT NULL,
  `std_id` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `std_detail`
--

INSERT INTO `std_detail` (`std_detail_id`, `user_id`, `skill_id`, `faculty_id`, `department_id`, `sex`, `age`, `std_id`) VALUES
(23, 51, 1, 1, 8, 'ชาย', 23, '21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `role` varchar(5) NOT NULL,
  `verification_code` text NOT NULL,
  `email_verified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `f_name`, `l_name`, `tel`, `role`, `verification_code`, `email_verified_at`) VALUES
(31, 'admin@admin.com', '81dc9bdb52d04dc20036dbd8313ed055', 'theerapat', 'janwana', '081-2345678', 'admin', '', '2021-12-30 07:01:18'),
(51, '1161304620114@mail.rmutt.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ธีรภัทร์', 'จันวนา', '082-2212334', 'std', '111111', '2022-01-04 21:29:06'),
(56, 'noi4339@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'theerapat', 'janwana', '081-2345678', 'org', '147619', '2022-01-01 05:19:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `org_detail`
--
ALTER TABLE `org_detail`
  ADD PRIMARY KEY (`org_detail_id`),
  ADD KEY `user_id_org` (`user_id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `std_detail`
--
ALTER TABLE `std_detail`
  ADD PRIMARY KEY (`std_detail_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `skill_id` (`skill_id`),
  ADD KEY `user_id_std` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `org_detail`
--
ALTER TABLE `org_detail`
  MODIFY `org_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `std_detail`
--
ALTER TABLE `std_detail`
  MODIFY `std_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `org_detail`
--
ALTER TABLE `org_detail`
  ADD CONSTRAINT `user_id_org` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `std_detail`
--
ALTER TABLE `std_detail`
  ADD CONSTRAINT `department_id` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `faculty_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`),
  ADD CONSTRAINT `skill_id` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`skill_id`),
  ADD CONSTRAINT `user_id_std` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

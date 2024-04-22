-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2021 at 12:44 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proctordiary`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AVG_MARKS` ()  BEGIN
DECLARE C_A INT(11);
DECLARE C_B INT(11);
DECLARE C_C INT(11);
DECLARE C_ASSIGNMENT INT(11);
DECLARE C_SUM INT(11);
DECLARE C_AVG INT(11);
DECLARE C_USN VARCHAR(10);
DECLARE C_SUBCODE VARCHAR(20);
DECLARE C_INTERNALS CURSOR FOR
SELECT `ia1` AS A,`ia2` AS B,`ia3` AS C,`assignment`,`inter_usn`,`inter_sub_code` FROM `internals` WHERE `total` IS NULL 
FOR UPDATE;

OPEN C_INTERNALS;
LOOP

FETCH C_INTERNALS INTO C_A,C_B,C_C,C_ASSIGNMENT,C_USN,C_SUBCODE;

SET C_SUM=C_A+C_B+C_C;

SET C_AVG=(C_SUM/3)+C_ASSIGNMENT;

UPDATE `internals` SET `total`=C_AVG where `inter_usn`=C_USN AND `inter_sub_code`=C_SUBCODE;
END LOOP;
CLOSE C_INTERNALS;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) DEFAULT NULL,
  `admin_email` varchar(50) DEFAULT NULL,
  `admin_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'AMCEC', 'amcec@gmail.com', 'amcec@123');

-- --------------------------------------------------------

--
-- Table structure for table `ats_combine`
--

CREATE TABLE `ats_combine` (
  `a_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `usn` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ats_combine`
--

INSERT INTO `ats_combine` (`a_id`, `t_id`, `usn`) VALUES
(1, 1, '1AM18CS067'),
(1, 1, '1AM18CS088'),
(1, 1, '1AM18CS096'),
(1, 7, '1AM18CS101');

-- --------------------------------------------------------

--
-- Table structure for table `delete_log`
--

CREATE TABLE `delete_log` (
  `identity` varchar(20) DEFAULT NULL,
  `date_and_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delete_log`
--

INSERT INTO `delete_log` (`identity`, `date_and_time`) VALUES
('1AM18CS067', '2020-12-27 17:53:01'),
('student_usn', '2020-12-27 17:57:48'),
('student_usn', '2020-12-27 17:57:53'),
('1AM18CS067', '2020-12-27 18:12:26'),
('1AM18CS067', '2020-12-27 18:14:08'),
('1AM18CS067', '2020-12-27 19:51:36'),
('1AM18CS067', '2020-12-28 03:43:26'),
('1AM18CS091', '2020-12-28 04:09:54'),
('1AM18CS088', '2020-12-28 04:09:58'),
('1AM18CS091', '2020-12-28 05:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `internals`
--

CREATE TABLE `internals` (
  `inter_usn` varchar(10) DEFAULT NULL,
  `inter_sub_code` varchar(20) NOT NULL,
  `ia1` varchar(10) DEFAULT NULL,
  `ia2` varchar(10) DEFAULT NULL,
  `ia3` varchar(10) DEFAULT NULL,
  `assignment` varchar(10) DEFAULT NULL,
  `total` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `meet_usn` varchar(10) NOT NULL,
  `meet_id` varchar(10) NOT NULL,
  `meet_date` date DEFAULT NULL,
  `meet_info` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`meet_usn`, `meet_id`, `meet_date`, `meet_info`) VALUES
('1AM18CS067', '18CS01', '2020-12-24', 'hii.. this is meeting one .'),
('1AM18CS067', '18CS02', '2020-12-25', 'hii this is meeting 2'),
('1AM18CS067', '18CS03', '2020-12-28', 'happy birthday mani .');

-- --------------------------------------------------------

--
-- Table structure for table `semsec`
--

CREATE TABLE `semsec` (
  `ssd_id` varchar(20) NOT NULL,
  `ssd_semester` varchar(20) DEFAULT NULL,
  `ssd_section` varchar(20) DEFAULT NULL,
  `ssd_dept` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semsec`
--

INSERT INTO `semsec` (`ssd_id`, `ssd_semester`, `ssd_section`, `ssd_dept`) VALUES
('1AM18CS067', '5', 'B', 'CSE'),
('1AM18CS088', '5', 'B', 'CSE'),
('1AM18CS096', '5', 'B', 'CSE'),
('1AM18CS101', '5', 'B', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `sss_combine`
--

CREATE TABLE `sss_combine` (
  `sss_usn` varchar(10) NOT NULL,
  `sss_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sss_combine`
--

INSERT INTO `sss_combine` (`sss_usn`, `sss_id`) VALUES
('1AM18CS067', '1AM18CS067'),
('1AM18CS088', '1AM18CS088'),
('1AM18CS096', '1AM18CS096'),
('1AM18CS101', '1AM18CS101');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_usn` varchar(10) NOT NULL,
  `student_name` varchar(50) DEFAULT NULL,
  `student_email` varchar(50) DEFAULT NULL,
  `student_password` varchar(50) DEFAULT NULL,
  `student_mobile` varchar(12) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `teach_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_usn`, `student_name`, `student_email`, `student_password`, `student_mobile`, `gender`, `teach_id`) VALUES
('1AM18CS067', 'Harshath  Hr', 'harsha@gmail.com', 'harsha@123', '9620603356', 'Male', '1'),
('1AM18CS088', 'lipika B', 'lipika@gmail.com', 'lipika@123', '9620603358', 'Female', '1'),
('1AM18CS096', 'Manoj Kumar B', 'manoj@gmail.com', 'manoj@123', '9620603357', 'Male', '1'),
('1AM18CS101', 'mehul Kataria', 'mehul@gmail.com', 'mehul@123', '9620603360', 'Male', '7');

--
-- Triggers `students`
--
DELIMITER $$
CREATE TRIGGER `after_delete_log` AFTER DELETE ON `students` FOR EACH ROW INSERT INTO `delete_log` (`identity`, `date_and_time`) VALUES (old.student_usn, current_timestamp())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_code` varchar(20) NOT NULL,
  `subject_name` varchar(50) DEFAULT NULL,
  `subject_semester` varchar(20) DEFAULT NULL,
  `subject_credits` varchar(10) DEFAULT NULL,
  `subject_dept` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_code`, `subject_name`, `subject_semester`, `subject_credits`, `subject_dept`) VALUES
('18CS52', 'CN', '5', '3', 'CSE'),
('18CS53', 'DBMS', '5', '3', 'CSE'),
('18CS54', 'ATC', '5', '3', 'CSE'),
('18CS55', 'PYTHON', '5', '3', 'CSE'),
('18CS56', 'UNIX', '5', '3', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(50) DEFAULT NULL,
  `teacher_email` varchar(50) DEFAULT NULL,
  `teacher_password` varchar(50) DEFAULT NULL,
  `teacher_dept` varchar(20) DEFAULT NULL,
  `teacher_mobile` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `teacher_name`, `teacher_email`, `teacher_password`, `teacher_dept`, `teacher_mobile`) VALUES
(1, 'Ms Sonali S Dash ', 'sonali@gmail.com', 'sonali@123', 'CSE', '1234567891'),
(2, 'Ms Sowmya Joshi', 'sowmya@gmail.com', 'sowmya@123', 'CSE', '1232343456'),
(3, 'Srividhya S', 'srividhya@gmail.com', 'srividhya@123', 'CSE', '1234567893'),
(4, 'Jeevitha R', 'jeevitha@gmail.com', 'jeevitha@123', 'CSE', '1234567894'),
(5, 'Nanditha S', 'nanditha@gmail.com', 'nanditha@123', 'CSE', '1234567895'),
(6, 'Pallavi G', 'pallavi@gmail.com', 'pallavi@123', 'CSE', '1234567896'),
(7, 'Snigdha Kesh', 'snigdha@gmail.com', 'snigdha@123', 'CSE', '1234567893'),
(8, 'vinetha', 'vinetha@gmail.com', 'vinetha@123', 'CSE', '1234567897');

-- --------------------------------------------------------

--
-- Table structure for table `tsub_combine`
--

CREATE TABLE `tsub_combine` (
  `tsub_id` int(11) NOT NULL,
  `sub_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tsub_combine`
--

INSERT INTO `tsub_combine` (`tsub_id`, `sub_code`) VALUES
(1, '18CS52'),
(6, '18CS56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ats_combine`
--
ALTER TABLE `ats_combine`
  ADD PRIMARY KEY (`a_id`,`t_id`,`usn`),
  ADD KEY `t_id` (`t_id`),
  ADD KEY `usn` (`usn`);

--
-- Indexes for table `internals`
--
ALTER TABLE `internals`
  ADD PRIMARY KEY (`inter_sub_code`),
  ADD KEY `inter_usn` (`inter_usn`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`meet_usn`,`meet_id`);

--
-- Indexes for table `semsec`
--
ALTER TABLE `semsec`
  ADD PRIMARY KEY (`ssd_id`);

--
-- Indexes for table `sss_combine`
--
ALTER TABLE `sss_combine`
  ADD PRIMARY KEY (`sss_usn`),
  ADD KEY `sss_id` (`sss_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_usn`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_code`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `tsub_combine`
--
ALTER TABLE `tsub_combine`
  ADD PRIMARY KEY (`tsub_id`,`sub_code`),
  ADD KEY `sub_code` (`sub_code`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ats_combine`
--
ALTER TABLE `ats_combine`
  ADD CONSTRAINT `ats_combine_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `ats_combine_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `teachers` (`teacher_id`),
  ADD CONSTRAINT `ats_combine_ibfk_3` FOREIGN KEY (`usn`) REFERENCES `students` (`student_usn`);

--
-- Constraints for table `internals`
--
ALTER TABLE `internals`
  ADD CONSTRAINT `internals_ibfk_1` FOREIGN KEY (`inter_usn`) REFERENCES `students` (`student_usn`),
  ADD CONSTRAINT `internals_ibfk_2` FOREIGN KEY (`inter_sub_code`) REFERENCES `subjects` (`subject_code`);

--
-- Constraints for table `meetings`
--
ALTER TABLE `meetings`
  ADD CONSTRAINT `meetings_ibfk_1` FOREIGN KEY (`meet_usn`) REFERENCES `students` (`student_usn`);

--
-- Constraints for table `sss_combine`
--
ALTER TABLE `sss_combine`
  ADD CONSTRAINT `sss_combine_ibfk_1` FOREIGN KEY (`sss_usn`) REFERENCES `students` (`student_usn`),
  ADD CONSTRAINT `sss_combine_ibfk_2` FOREIGN KEY (`sss_id`) REFERENCES `semsec` (`ssd_id`);

--
-- Constraints for table `tsub_combine`
--
ALTER TABLE `tsub_combine`
  ADD CONSTRAINT `tsub_combine_ibfk_1` FOREIGN KEY (`tsub_id`) REFERENCES `teachers` (`teacher_id`),
  ADD CONSTRAINT `tsub_combine_ibfk_2` FOREIGN KEY (`sub_code`) REFERENCES `subjects` (`subject_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

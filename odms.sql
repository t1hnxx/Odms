-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 02:53 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminID` int(9) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `admin-profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminID`, `email`, `name`, `username`, `password`, `admin-profile`) VALUES
(1, 2147483647, 'ceit.odms123@gmail.com', 'ADMIN 1', 'admin', 'efwds', 'ADMIN 1 - 2024.01.04 - 07.05.39am.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `completion`
--

CREATE TABLE `completion` (
  `id` int(11) NOT NULL,
  `documentID` varchar(19) NOT NULL,
  `documentName` varchar(200) NOT NULL,
  `documentOwner` varchar(200) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `academic_year` varchar(15) NOT NULL,
  `subjectCode` varchar(10) NOT NULL,
  `gradeP` varchar(15) NOT NULL,
  `gradeF` varchar(15) NOT NULL,
  `documentStatus` enum('created','submitted','on_hand','review','pick-up','return','graded','to_chairperson','to_registrar','to_dean','to_uregistrar','signed','to_research') NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `submittedTo` varchar(100) NOT NULL,
  `remarks` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `completion`
--

INSERT INTO `completion` (`id`, `documentID`, `documentName`, `documentOwner`, `semester`, `academic_year`, `subjectCode`, `gradeP`, `gradeF`, `documentStatus`, `createdby`, `submittedTo`, `remarks`, `date_created`, `date`) VALUES
(1, 'CF-240123-0516', 'Completion Form', '202014909', 'second', '2023-2024', 'ITEC 111A', 'INC', '3.00', 'created', '28038376072551', '28038376072551', 'No comment/remarks yet', '2024-01-23 09:30:05', '2024-01-23 09:30:05');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `courseCode` varchar(500) NOT NULL,
  `course_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `courseCode`, `course_name`) VALUES
(1, 'BSABE', 'Bachelor of Science in Agricultural and Biosystems Engineering'),
(2, 'BS Arch', 'Bachelor of Science in Architecture'),
(3, 'BSCpE', 'Bachelor of Science in Computer Engineering'),
(4, 'BSCS', 'Bachelor of Science in Computer Science'),
(5, 'BSEE', 'Bachelor of Science in Electrical Engineering'),
(6, 'BSECE', 'Bachelor of Science in Electronics Engineering'),
(7, 'BSIE', 'Bachelor of Science in Industrial Engineering'),
(8, 'BSIndT-ET', 'Bachelor of Science in Industrial Technology Major in Electrical Technology'),
(9, 'BSIndT-ELEX', 'Bachelor of Science in Industrial Technology Major in Electronics Technology'),
(10, 'BSIndT-AT', 'Bachelor of Science in Industrial Technology Major in Automotive Technology'),
(11, 'BSIT', 'Bachelor of Science in Information Technology'),
(12, 'BSCE', 'Bachelor of Science in Civil Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `departmentCode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `departmentName` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `departmentCode`, `departmentName`) VALUES
(1, 'DCEA', 'Department of Civil Engineering and Architecture'),
(2, 'DCEE', 'Department of Computer and Electronics Engineering'),
(3, 'DIET', 'Department of Industrial Engineering and Technology'),
(4, 'DIT', 'Department of Information Technology'),
(5, 'DAFE', 'Department of Agriculture and Food Engineering'),
(6, 'DEAN', 'Dean Office'),
(7, 'REGISTRAR', 'Registrar Office'),
(8, 'RESEARCH', 'Research');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `documentID` varchar(19) NOT NULL,
  `documentName` varchar(200) NOT NULL,
  `documentOwner` varchar(200) NOT NULL,
  `documentType` enum('thesis','journal','completion_form') NOT NULL,
  `documentStatus` enum('created','submitted','on_hand','review','pick-up','return','graded','to_chairperson','to_registrar','to_dean','to_uregistrar','signed','to_research') NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `submittedTo` varchar(100) NOT NULL,
  `remarks` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `documentID`, `documentName`, `documentOwner`, `documentType`, `documentStatus`, `createdby`, `submittedTo`, `remarks`, `date_created`, `date`) VALUES
(3, 'CF-240123-0516', 'Completion Form', '202014909', 'completion_form', 'created', '28038376072551', '28038376072551', 'No comment/remarks yet', '2024-01-23 09:30:05', '2024-01-23 09:30:05');

-- --------------------------------------------------------

--
-- Stand-in structure for view `documents`
-- (See below for the actual view)
--
CREATE TABLE `documents` (
`documentID` varchar(19)
,`documentName` varchar(200)
,`documentType` enum('thesis','journal','completion_form')
,`documentOwner` varchar(200)
,`documentStatus` enum('created','submitted','on_hand','review','pick-up','return','graded','to_chairperson','to_registrar','to_dean','to_uregistrar','signed','to_research')
,`submittedTo` varchar(100)
,`facultyFname` varchar(100)
,`facultyMname` varchar(100)
,`facultyLname` varchar(100)
,`date` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `document_handler`
-- (See below for the actual view)
--
CREATE TABLE `document_handler` (
`documentID` varchar(19)
,`documentName` varchar(200)
,`documentType` enum('thesis','journal','completion_form')
,`documentOwner` varchar(200)
,`submittedTo` varchar(100)
,`facultyFname` varchar(100)
,`facultyMname` varchar(100)
,`facultyLname` varchar(100)
,`documentStatus` enum('created','submitted','on_hand','review','pick-up','return','graded','to_chairperson','to_registrar','to_dean','to_uregistrar','signed','to_research')
);

-- --------------------------------------------------------

--
-- Table structure for table `document_transaction`
--

CREATE TABLE `document_transaction` (
  `id` int(11) NOT NULL,
  `documentID` varchar(19) NOT NULL,
  `documentName` varchar(200) NOT NULL,
  `documentOwner` varchar(200) NOT NULL,
  `documentType` enum('thesis','journal','completion_form','requested') NOT NULL,
  `documentStatus` enum('created','submitted','on_hand','review','pick-up','return','graded','to_chairperson','to_registrar','to_dean','to_uregistrar','signed','to_research') NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `submittedTo` varchar(100) NOT NULL,
  `remarks` text DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document_transaction`
--

INSERT INTO `document_transaction` (`id`, `documentID`, `documentName`, `documentOwner`, `documentType`, `documentStatus`, `createdby`, `submittedTo`, `remarks`, `date`) VALUES
(1, 'TCM-240123-8571', 'Odms', '202014909,202012144', 'thesis', 'created', '202014909', 'None', 'No comment/remarks yet', '2024-01-23 09:25:23'),
(2, 'TCM-240123-8571', 'Odms', '202014909,202012144', 'thesis', 'submitted', '202014909', '28038376072551', 'No comment/remarks yet', '2024-01-23 09:27:01'),
(3, 'TCM-240123-8571', 'Odms', '202014909,202012144', 'thesis', 'on_hand', '202014909', '28038376072551', 'No comment/remarks yet', '2024-01-23 09:27:46'),
(4, 'TCM-240123-8571', 'Odms', '202014909,202012144', 'thesis', 'review', '202014909', '28038376072551', 'No comment/remarks yet', '2024-01-23 09:28:07'),
(5, 'TCM-240123-8571', 'Odms', '202014909,202012144', 'thesis', 'pick-up', '202014909', '28038376072551', 'No comment/remarks yet', '2024-01-23 09:28:23'),
(6, 'TCM-240123-8571', 'Odms', '202014909,202012144', 'thesis', 'return', '202014909', 'None', 'No comment/remarks yet', '2024-01-23 09:28:35'),
(7, 'OJT-240123-5938', 'OJT Journal', '202014909', 'journal', 'created', '202014909', 'None', 'No comment/remarks yet', '2024-01-23 09:29:17'),
(8, 'CF-240123-0516', 'Completion Form', '202014909', 'completion_form', 'created', '28038376072551', '28038376072551', 'No comment/remarks yet', '2024-01-23 09:30:05'),
(9, 'TCM-240123-3629', 'ttt', '202014909', 'thesis', 'created', '202014909', 'None', 'No comment/remarks yet', '2024-01-23 09:34:40'),
(10, 'TCM-240123-2984', 'yy', '202014909', 'thesis', 'created', '202014909', 'None', 'No comment/remarks yet', '2024-01-23 09:35:44'),
(11, 'TCM-240123-0274', 'sss', '202014909,202012144', 'thesis', 'created', '202014909', 'None', 'No comment/remarks yet', '2024-01-23 09:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_archive`
--

CREATE TABLE `faculty_archive` (
  `id` int(11) NOT NULL,
  `facultyID` bigint(19) NOT NULL,
  `userType` varchar(100) NOT NULL,
  `facultyFname` varchar(100) NOT NULL,
  `facultyMname` varchar(100) NOT NULL,
  `facultyLname` varchar(100) NOT NULL,
  `facultyGender` varchar(100) NOT NULL,
  `facultyUsername` varchar(100) NOT NULL,
  `facultyEmail` varchar(100) NOT NULL,
  `facultyPassword` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `facultyDepartment` varchar(100) NOT NULL,
  `urlAddress` varchar(100) NOT NULL,
  `Fprofile_image` text NOT NULL,
  `documents_handle` int(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_email`
--

CREATE TABLE `faculty_email` (
  `id` int(11) NOT NULL,
  `facultyFname` varchar(100) NOT NULL,
  `facultyMname` varchar(100) NOT NULL,
  `facultyLname` varchar(100) NOT NULL,
  `facultyGender` varchar(100) NOT NULL,
  `facultyUsername` varchar(100) NOT NULL,
  `facultyEmail` varchar(100) NOT NULL,
  `facultyPassword` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `facultyDepartment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_email`
--

INSERT INTO `faculty_email` (`id`, `facultyFname`, `facultyMname`, `facultyLname`, `facultyGender`, `facultyUsername`, `facultyEmail`, `facultyPassword`, `position`, `facultyDepartment`) VALUES
(1, 'Stephanie', '', 'Erni', 'Female', 'prsnnl8726', 'stephanie.erni@cvsu.edu.ph', 'VD9qf8KY', 'instructor', 'DAFE'),
(2, 'Novie Grace', '', 'Obeal', 'Female', 'prsnnl2157', 'noviegrace.obeal@cvsu.edu.ph', '4yJI0VKY', 'instructor', 'DIET'),
(3, 'Catriza', '', 'Escalante', 'Female', 'prsnnl6890', 'catriza.escalante@cvsu.edu.ph', 'HyElKPui', 'instructor', 'DCEE'),
(4, 'Shaina', '', 'Erni', 'Female', 'prsnnl2143', 'stephanieerni21@gmail.com', 'u13x247s', 'instructor', 'DIT');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_info`
--

CREATE TABLE `faculty_info` (
  `id` int(11) NOT NULL,
  `facultyID` bigint(19) NOT NULL,
  `userType` varchar(100) NOT NULL,
  `facultyFname` varchar(100) NOT NULL,
  `facultyMname` varchar(100) NOT NULL,
  `facultyLname` varchar(100) NOT NULL,
  `facultyGender` varchar(100) NOT NULL,
  `facultyUsername` varchar(100) NOT NULL,
  `facultyEmail` varchar(100) NOT NULL,
  `facultyPassword` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `facultyDepartment` varchar(100) NOT NULL,
  `urlAddress` varchar(100) NOT NULL,
  `Fprofile_image` text NOT NULL,
  `documents_handle` int(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_info`
--

INSERT INTO `faculty_info` (`id`, `facultyID`, `userType`, `facultyFname`, `facultyMname`, `facultyLname`, `facultyGender`, `facultyUsername`, `facultyEmail`, `facultyPassword`, `position`, `facultyDepartment`, `urlAddress`, `Fprofile_image`, `documents_handle`, `date`) VALUES
(2, 84673154189916, 'Personnel', 'Akemi', 'HELLO', 'Williams', 'Female', '', 'williams.akemi@gmail.com', '98491cb05da5bff4492169ca0b0f31d9134be1f4', 'instructor', 'DIT', 'akemi.williams', ' - 2023.12.12 - 01.16.32pm.jpg', 1, '2023-12-08 01:27:29'),
(5, 994833223235, 'Personnel', 'Roberta', 'Yeah', 'Stevenson', 'Female', '', 'roberta.stevenson14@gmail.com', 'afb535997a0728efc1c5118fb39b827b508e0401', 'instructor', 'DIET', 'roberta.stevenson', 'roberta.stevenson994833223235 - 2024.01.03 - 04.31.49pm.jpg', 1, '2023-12-08 01:27:29'),
(6, 70415985107, 'Personnel', 'Kelsey', '', 'Ibarra', 'Female', '', 'ibarra.kelsey@gmail.com', 'dd5fef9c1c1da1394d6d34b248c51be2ad740840', 'instructor', 'DCEA', 'kelsey.ibarra', '', 0, '2023-12-08 01:27:29'),
(7, 7829711923, 'Personnel', 'Caitlyn ', '', 'Mcbride', 'Female', '', 'mcbride.caitlyn23@gmail.com', 'bfe54caa6d483cc3887dce9d1b8eb91408f1ea7a', 'instructor', 'DCEE', 'caitlyn .mcbride', '', 0, '2023-12-08 01:27:29'),
(252, 41909784257, 'Personnel', 'Jayson', 'Vecina', 'Erni', 'Male', '', 'jayson.erni23@gmail.com', 'afb535997a0728efc1c5118fb39b827b508e0401', 'instructor', 'DCEE', 'jayson.erni', 'jayson.erni41909784257 - 2024.01.09 - 12.00.48am.jpg', -2, '2024-01-08 21:23:53'),
(253, 98321795, 'Personnel', 'Arjay', '', 'Arpia', 'Male', '', 'arpia.arjay@cvsu.edu.ph', '356a192b7913b04c54574d18c28d46e6395428ab', 'instructor', 'DAFE', 'arjay.arpia', '', 0, '2024-01-09 02:02:51'),
(254, 811198, 'Personnel', 'Richelle Mae', '', 'Mendoza-Olpot', 'Female', '', 'olpot.richellemae@cvsu.edu.ph', '356a192b7913b04c54574d18c28d46e6395428ab', 'instructor', 'DAFE', 'richelle mae.mendoza-olpot', '', 0, '2024-01-09 02:04:48'),
(255, 3761132333747225687, 'Personnel', 'Ronwaldo', '', 'Aguila', 'Male', '', 'aguila.ronwaldo@cvsu.edu.ph', '356a192b7913b04c54574d18c28d46e6395428ab', 'instructor', 'DIET', 'ronwaldo.aguila', '', 0, '2024-01-09 02:05:58'),
(256, 67143, 'Personnel', 'Dina', '', 'Bawag', 'Female', '', 'bawag.dina@cvsu.edu.ph', '356a192b7913b04c54574d18c28d46e6395428ab', 'instructor', 'DIET', 'dina.bawag', '', 0, '2024-01-09 02:06:47'),
(257, 46509529590611, 'Personnel', 'Kathleen', '', 'Bescaser', 'Female', '', 'bescaser.kathleen@cvsu.edu.ph', '356a192b7913b04c54574d18c28d46e6395428ab', 'instructor', 'DCEA', 'kathleen.bescaser', '', 0, '2024-01-09 02:09:11'),
(258, 303550699418537471, 'Personnel', 'Ralph', '', 'Crucillo', 'Male', '', 'crucillo.ralph@cvsu.edu.ph', '356a192b7913b04c54574d18c28d46e6395428ab', 'instructor', 'DCEA', 'ralph.crucillo', '', 0, '2024-01-09 02:09:42'),
(259, 28038376072551, 'Personnel', 'Anabelle', '', 'Almarez', 'Female', '', 'almarez.anabelle@cvsu.edu.ph', '356a192b7913b04c54574d18c28d46e6395428ab', 'instructor', 'DIT', 'anabelle.almarez', 'anabelle.almarez28038376072551 - 2024.01.12 - 04.48.35pm.png', -70, '2024-01-09 02:11:10'),
(260, 455142409408, 'Personnel', 'Simeon', '', 'Daez', 'Male', '', 'daez.simeon@cvsu.edu.ph', '356a192b7913b04c54574d18c28d46e6395428ab', 'instructor', 'DIT', 'simeon.daez', '', 0, '2024-01-09 02:11:50'),
(261, 239610967, 'Personnel', 'Michael', 'T.', 'Costa', 'Male', '', 'costa.michael@cvsu.edu.ph', '356a192b7913b04c54574d18c28d46e6395428ab', 'chairperson', 'DCEE', 'michael.costa', '', 0, '2024-01-09 02:12:59'),
(262, 714538974407, 'Personnel', 'Sheryl', '', 'Fenol', 'Female', '', 'fenol.sheryl@cvsu.edu.ph', '356a192b7913b04c54574d18c28d46e6395428ab', 'instructor', 'DCEE', 'sheryl.fenol', '', 0, '2024-01-09 02:14:58'),
(263, 74465707, 'Personnel', 'Shana', '', 'Cruzate', 'Female', 'prsnnl7069', 'cruzate.shana@cvsu.edu.ph', '0ee120b7aa9b52096cfd83b8bdb176e400550c6f', 'instructor', 'DIET', 'shana.cruzate', '', 0, '2024-01-09 07:10:20'),
(268, 20247860651460426, 'Personnel', 'Novie Grace', '', 'Obeal', 'Female', 'prsnnl6895', 'noviegrace.obeal@cvsu.edu.ph', '596fd44d67dc93692a4439591ae5e08fff96d963', 'instructor', 'DIET', 'novie grace.obeal', '', 0, '2024-01-13 17:15:14'),
(269, 942149261, 'Personnel', 'Catriza', '', 'Escalante', 'Female', 'prsnnl3975', 'catriza.escalante@cvsu.edu.ph', 'f64ab13cfc51cbeb640f377adcd55df1e50c4710', 'instructor', 'DCEE', 'catriza.escalante', '', 0, '2024-01-13 17:15:15'),
(270, 75924943278857257, 'Personnel', 'Al Owen Roy', 'A.', 'Ferrera', 'Male', 'prsnnl4531', 'ferrera.owenroy@cvsu.edu.ph', '490aa9cab5b02e3024a98a9a90e56ce6793be275', 'chairperson', 'DAFE', 'al owen roy.ferrera', '', 0, '2024-01-14 16:27:52'),
(271, 46676, 'Personnel', 'Charlotte', 'B.', 'Carandang', 'Female', 'prsnnl9317', 'carandang.charlotte@cvsu.edu.ph', '356a192b7913b04c54574d18c28d46e6395428ab', 'chairperson', 'DIT', 'charlotte.carandang', '', 4, '2024-01-14 16:27:54'),
(272, 3484514833329, 'Personnel', 'Ma. Fatima', 'B.', 'Zuñiga', 'Female', 'prsnnl5342', 'zuniga.fatima@cvsu.edu.ph', '356a192b7913b04c54574d18c28d46e6395428ab', 'chairperson', 'DIET', 'ma. fatima.zuñiga', '', 0, '2024-01-14 16:27:55'),
(273, 598770, 'Personnel', 'Roslyn', 'P.', 'Peña', 'Female', 'prsnnl9302', 'pena.roslyn@cvsu.edu.ph', '356a192b7913b04c54574d18c28d46e6395428ab', 'chairperson', 'DCEA', 'roslyn.peña', 'roslyn.peña598770 - 2024.01.23 - 03.07.53am.jpg', -1, '2024-01-14 16:27:56'),
(275, 9919684342308, 'Personnel', 'Florence', 'M.', 'Banasihan', 'Female', 'prsnnl8319', 'banasihan.florence@cvsu.edu.ph', '356a192b7913b04c54574d18c28d46e6395428ab', 'registrar', 'REGISTRAR', 'florence.banasihan', '', -1, '2024-01-14 16:53:52'),
(276, 23795, 'Personnel', 'Jake', 'R.', 'Ersando', 'Male', 'prsnnl7581', 'ersando.jake@cvsu.edu.ph', '356a192b7913b04c54574d18c28d46e6395428ab', 'assistant_registrar', 'REGISTRAR', 'jake.ersando', '', 0, '2024-01-14 16:53:58'),
(277, 746136248, 'Personnel', 'Willie', 'C.', 'Buclatin', 'Male', 'prsnnl2610', 'buclatin.willie@cvsu.edu.ph', '356a192b7913b04c54574d18c28d46e6395428ab', 'dean', 'DEAN', 'willie.buclatin', '', 0, '2024-01-14 16:56:37'),
(278, 84925149538325373, 'Personnel', 'Edwin', 'R.', 'Arboleda', 'Male', 'prsnnl5860', 'arboleda.edwin@cvsu.edu.ph', '356a192b7913b04c54574d18c28d46e6395428ab', 'cResearch_coordinator', 'RESEARCH', 'edwin.arboleda', '', 0, '2024-01-15 06:14:13');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_sheets`
--

CREATE TABLE `faculty_sheets` (
  `id` int(11) NOT NULL,
  `facultyFname` varchar(100) NOT NULL,
  `facultyMname` varchar(100) NOT NULL,
  `facultyLname` varchar(100) NOT NULL,
  `facultyGender` varchar(100) NOT NULL,
  `facultyUsername` varchar(100) NOT NULL,
  `facultyEmail` varchar(100) NOT NULL,
  `facultyPassword` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `facultyDepartment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_sheets`
--

INSERT INTO `faculty_sheets` (`id`, `facultyFname`, `facultyMname`, `facultyLname`, `facultyGender`, `facultyUsername`, `facultyEmail`, `facultyPassword`, `position`, `facultyDepartment`) VALUES
(1, 'Stephanie', '', 'Erni', 'Female', 'prsnnl3124', 'stephanie.erni@cvsu.edu.ph', 'QhiY7VDN', '', 'DAFE'),
(2, 'Novie Grace', '', 'Obeal', 'Female', 'prsnnl8269', 'noviegrace.obeal@cvsu.edu.ph', 'PsJgonpq', '', 'DIET'),
(3, 'Catriza', '', 'Escalante', 'Female', 'prsnnl9871', 'catriza.escalante@cvsu.edu.ph', '2STuL1RM', '', 'DCEE'),
(4, 'Shaina', '', 'Erni', 'Female', 'prsnnl4078', 'stephanieerni21@gmail.com', 'r4w6JESd', '', 'DIT'),
(5, 'Anabelle', '', 'sass', 'Female', 'prsnnl2816', 'almarez.anabelle@cvsu.edu.ph', 'z8wItEqi', '', 'DIT'),
(6, 'Shana', '', 'Cruzate', 'Female', 'prsnnl7069', 'cruzate.shana@cvsu.edu.ph', 'Vgrxi6kK', 'instructor', 'DCEE'),
(19, 'Al Owen Roy', 'A.', 'Ferrera', 'Male', 'prsnnl4531', 'ferrera.owenroy@cvsu.edu.ph', 'fuIWTztq', '', 'DAFE'),
(20, 'Charlotte', 'B.', 'Carandang', 'Female', 'prsnnl9317', 'carandang.charlotte@cvsu.edu.ph', '4GHKLTFS', '', 'DIT'),
(21, 'Ma. Fatima', 'B.', 'Zuñiga', 'Female', 'prsnnl5342', 'zuniga.fatima@cvsu.edu.ph', 'lRsbSzGY', '', 'DIET'),
(22, 'Roslyn', 'P.', 'Peña', 'Female', 'prsnnl9302', 'pena.roslyn@cvsu.edu.ph', 'rlhegwbM', '', 'DCEA'),
(23, 'Michael', 'T.', 'Costa', 'Male', 'prsnnl3816', 'costa.michael@cvsu.edu.ph', 'f7o3KTwj', '', 'DCEE'),
(24, 'utngbfvd', 'rfbdvfrf', 'fvdvdv', 'Female', 'prsnnl4291', 'eferbfdfe@hrtrbfds.com', '0IpBFOw7', 'instructor', 'DCEE'),
(25, 'Florence', 'M.', 'Banasihan', 'Female', 'prsnnl8319', 'banasihan.florence@cvsu.edu.ph', 'u62HjOWb', 'instructor', 'REGISTRAR'),
(26, 'Jake', 'R.', 'Ersando', 'Male', 'prsnnl7581', 'ersando.jake@cvsu.edu.ph', 'vJM8QogT', 'instructor', 'REGISTRAR'),
(27, 'Willie', 'C.', 'Buclatin', 'Male', 'prsnnl2610', 'buclatin.willie@cvsu.edu.ph', 'vyZIaihT', 'instructor', 'DEAN'),
(28, 'Edwin', 'R.', 'Arboleda', 'Male', 'prsnnl5860', 'arboleda.edwin@cvsu.edu.ph', 'Z2R0rlC8', 'instructor', 'RESEARCH'),
(29, 'Stephanie', '', 'Erni', 'Female', 'prsnnl6890', 'stephanie.erni@cvsu.edu.ph', 'rgWDXY6R', 'instructor', 'DAFE'),
(30, 'Novie Grace', '', 'Obeal', 'Female', 'prsnnl5068', 'noviegrace.obeal@cvsu.edu.ph', 'LVHI1mEs', 'instructor', 'DIET'),
(31, 'Catriza', '', 'Escalante', 'Female', 'prsnnl8251', 'catriza.escalante@cvsu.edu.ph', 'g5NDRYQa', 'instructor', 'DCEE'),
(32, 'Shaina', '', 'Erni', 'Female', 'prsnnl3746', 'stephanieerni21@gmail.com', 'wykv36zZ', 'instructor', 'DIT'),
(33, 'Stephanie', '', 'Erni', 'Female', 'prsnnl1389', 'stephanie.erni@cvsu.edu.ph', '6LC1N8ZP', 'instructor', 'DAFE'),
(34, 'Novie Grace', '', 'Obeal', 'Female', 'prsnnl2319', 'noviegrace.obeal@cvsu.edu.ph', 'vfrQ2Geb', 'instructor', 'DIET'),
(35, 'Catriza', '', 'Escalante', 'Female', 'prsnnl0954', 'catriza.escalante@cvsu.edu.ph', 'x7gXPzIV', 'instructor', 'DCEE'),
(36, 'Shaina', '', 'Erni', 'Female', 'prsnnl0968', 'stephanieerni21@gmail.com', 'TBZm6L8J', 'instructor', 'DIT'),
(37, 'Stephanie', '', 'Erni', 'Female', 'prsnnl8726', 'stephanie.erni@cvsu.edu.ph', 'VD9qf8KY', 'instructor', 'DAFE'),
(38, 'Novie Grace', '', 'Obeal', 'Female', 'prsnnl2157', 'noviegrace.obeal@cvsu.edu.ph', '4yJI0VKY', 'instructor', 'DIET'),
(39, 'Catriza', '', 'Escalante', 'Female', 'prsnnl6890', 'catriza.escalante@cvsu.edu.ph', 'HyElKPui', 'instructor', 'DCEE'),
(40, 'Shaina', '', 'Erni', 'Female', 'prsnnl2143', 'stephanieerni21@gmail.com', 'u13x247s', 'instructor', 'DIT');

-- --------------------------------------------------------

--
-- Stand-in structure for view `sample`
-- (See below for the actual view)
--
CREATE TABLE `sample` (
`id` int(11)
,`facultyID` bigint(20)
,`userType` varchar(100)
,`facultyFname` varchar(100)
,`facultyMname` varchar(100)
,`facultyLname` varchar(100)
,`facultyGender` varchar(100)
,`facultyEmail` varchar(100)
,`facultyUsername` varchar(100)
,`facultyPassword` varchar(100)
,`facultyDepartment` varchar(100)
,`urlAddress` varchar(100)
,`Fprofile_image` mediumtext
,`documents_handle` int(11)
,`date` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `student_archive`
--

CREATE TABLE `student_archive` (
  `id` int(11) NOT NULL,
  `studentID` bigint(19) NOT NULL,
  `userType` varchar(100) NOT NULL,
  `studentNum` int(11) NOT NULL,
  `studentFname` varchar(100) NOT NULL,
  `studentMname` varchar(100) NOT NULL,
  `studentLname` varchar(100) NOT NULL,
  `studentGender` varchar(100) NOT NULL,
  `studentUsername` varchar(100) NOT NULL,
  `studentEmail` varchar(100) NOT NULL,
  `studentPassword` varchar(100) NOT NULL,
  `studentCourse` varchar(100) NOT NULL,
  `urlAddress` varchar(100) NOT NULL,
  `profile_image` varchar(100) NOT NULL,
  `documents_owned` int(11) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_email`
--

CREATE TABLE `student_email` (
  `id` int(11) NOT NULL,
  `studentNum` int(11) NOT NULL,
  `studentFname` varchar(100) NOT NULL,
  `studentMname` varchar(100) NOT NULL,
  `studentLname` varchar(100) NOT NULL,
  `studentGender` varchar(100) NOT NULL,
  `studentUsername` varchar(100) NOT NULL,
  `studentEmail` varchar(100) NOT NULL,
  `studentPassword` varchar(100) NOT NULL,
  `studentCourse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `studentID` bigint(19) NOT NULL,
  `userType` varchar(100) NOT NULL,
  `studentNum` int(11) NOT NULL,
  `studentFname` varchar(100) NOT NULL,
  `studentMname` varchar(100) NOT NULL,
  `studentLname` varchar(100) NOT NULL,
  `studentGender` varchar(100) NOT NULL,
  `studentUsername` varchar(100) NOT NULL,
  `studentEmail` varchar(100) NOT NULL,
  `studentPassword` varchar(100) NOT NULL,
  `studentCourse` varchar(100) NOT NULL,
  `urlAddress` varchar(100) NOT NULL,
  `profile_image` varchar(100) NOT NULL,
  `documents_owned` int(11) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `studentID`, `userType`, `studentNum`, `studentFname`, `studentMname`, `studentLname`, `studentGender`, `studentUsername`, `studentEmail`, `studentPassword`, `studentCourse`, `urlAddress`, `profile_image`, `documents_owned`, `date`) VALUES
(17, 999005557, 'Student', 202014909, 'Stephanie', '', 'Erni', 'Female', 'stdnt5791', 'stephanieerni21@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'BSIT', 'stephanie.erni', 'stephanie.erni202014909 - 2024.01.04 - 06.34.27am.jpg', 265, '2023-12-05 12:01:36'),
(54, 46752856777704440, 'Student', 202012345, 'Stephanie', '', 'FUMI', 'Female', 'bsit_stdnt6179', 'mateoseira@gmail.com', 'ebbe52f8d56576dd5f992c2e271c8b9f9291e666', 'BSIT', 'stephanie.fumi', '', NULL, '2024-01-09 06:52:56'),
(55, 49778358819, 'Student', 202012144, 'Catriza', '', 'Escalante', 'Female', '', 'catriza.escalante@csvu.edu.ph', '356a192b7913b04c54574d18c28d46e6395428ab', 'BSIT', 'catriza.escalante', '', NULL, '2024-01-09 11:32:21'),
(56, 520287408, 'Student', 202112144, 'Hanz Joseph', '', 'Cabugos', 'Male', 'stdnt3062', 'hanzjoseph.cabugos@cvsu.edu.ph', '356a192b7913b04c54574d18c28d46e6395428ab', 'BSIndT-AT', 'hanz joseph.cabugos', '', NULL, '2024-01-09 14:24:14'),
(57, 4192048, 'Student', 202114909, 'Josh Cullen', '', 'Santos', 'Female', 'stdnt3624', 'stephanie.erni@cvsu.edu.ph', 'c40422a4a00865459b64c62cd4a5d82d515eea27', 'BSCpE', 'josh cullen.santos', '', NULL, '2024-01-09 14:24:16'),
(58, 596617934908128561, 'Student', 2147483647, 'Stephanie', '', 'Erni', 'Female', 'stdnt8637', 'wefegth@fgbgnfgb.com', '7b95cbb2335b56e711734d98efe94a92a65cd983', 'BS Arch', 'stephanie.erni', '', NULL, '2024-01-22 16:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `student_sheets`
--

CREATE TABLE `student_sheets` (
  `id` int(11) NOT NULL,
  `studentNum` int(11) NOT NULL,
  `studentFname` varchar(100) NOT NULL,
  `studentMname` varchar(100) NOT NULL,
  `studentLname` varchar(100) NOT NULL,
  `studentGender` varchar(100) NOT NULL,
  `studentUsername` varchar(100) NOT NULL,
  `studentEmail` varchar(100) NOT NULL,
  `studentPassword` varchar(100) NOT NULL,
  `studentCourse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_sheets`
--

INSERT INTO `student_sheets` (`id`, `studentNum`, `studentFname`, `studentMname`, `studentLname`, `studentGender`, `studentUsername`, `studentEmail`, `studentPassword`, `studentCourse`) VALUES
(1, 202112144, 'Hanz Joseph', '', 'Cabugos', 'Male', 'stdnt3062', 'hanzjoseph.cabugos@cvsu.edu.ph', 'zV9BpyU5', 'BSEE'),
(2, 202114909, 'Josh Cullen', '', 'Santos', 'Female', 'stdnt3624', 'stephanie.erni@cvsu.edu.ph', 'HteE4iUk', 'BSCpE'),
(3, 777777777, 'kksakkas', '', 'kssklklk', 'Female', 'stdnt0216', 'stephanie.erni@cvsu.edu.ph', '9PRqT7ia', 'BSCpE'),
(4, 2147483647, 'Stephanie', '', 'Erni', 'Female', 'stdnt8637', 'wefegth@fgbgnfgb.com', 'Wovs87mJ', 'BS Arch');

-- --------------------------------------------------------

--
-- Stand-in structure for view `users_documents`
-- (See below for the actual view)
--
CREATE TABLE `users_documents` (
`id` int(11)
,`documentID` varchar(19)
,`documentName` varchar(200)
,`documentType` enum('thesis','journal','completion_form')
,`documentOwner` varchar(200)
,`submittedTo` varchar(100)
,`facultyFname` varchar(100)
,`facultyMname` varchar(100)
,`facultyLname` varchar(100)
,`facultyDepartment` varchar(100)
,`documentStatus` enum('created','submitted','on_hand','review','pick-up','return','graded','to_chairperson','to_registrar','to_dean','to_uregistrar','signed','to_research')
,`remarks` text
,`date_created` timestamp
,`date` timestamp
);

-- --------------------------------------------------------

--
-- Structure for view `documents`
--
DROP TABLE IF EXISTS `documents`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `documents`  AS SELECT `document`.`documentID` AS `documentID`, `document`.`documentName` AS `documentName`, `document`.`documentType` AS `documentType`, `document`.`documentOwner` AS `documentOwner`, `document`.`documentStatus` AS `documentStatus`, `document`.`submittedTo` AS `submittedTo`, `faculty_info`.`facultyFname` AS `facultyFname`, `faculty_info`.`facultyMname` AS `facultyMname`, `faculty_info`.`facultyLname` AS `facultyLname`, `document`.`date` AS `date` FROM (`document` left join `faculty_info` on(`document`.`submittedTo` = `faculty_info`.`facultyID`))  ;

-- --------------------------------------------------------

--
-- Structure for view `document_handler`
--
DROP TABLE IF EXISTS `document_handler`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `document_handler`  AS SELECT `document`.`documentID` AS `documentID`, `document`.`documentName` AS `documentName`, `document`.`documentType` AS `documentType`, `document`.`documentOwner` AS `documentOwner`, `document`.`submittedTo` AS `submittedTo`, `faculty_info`.`facultyFname` AS `facultyFname`, `faculty_info`.`facultyMname` AS `facultyMname`, `faculty_info`.`facultyLname` AS `facultyLname`, `document`.`documentStatus` AS `documentStatus` FROM (`faculty_info` left join `document` on(`document`.`submittedTo` = `faculty_info`.`facultyID`))  ;

-- --------------------------------------------------------

--
-- Structure for view `sample`
--
DROP TABLE IF EXISTS `sample`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sample`  AS SELECT `faculty_info`.`id` AS `id`, `faculty_info`.`facultyID` AS `facultyID`, `faculty_info`.`userType` AS `userType`, `faculty_info`.`facultyFname` AS `facultyFname`, `faculty_info`.`facultyMname` AS `facultyMname`, `faculty_info`.`facultyLname` AS `facultyLname`, `faculty_info`.`facultyGender` AS `facultyGender`, `faculty_info`.`facultyEmail` AS `facultyEmail`, `faculty_info`.`facultyUsername` AS `facultyUsername`, `faculty_info`.`facultyPassword` AS `facultyPassword`, `faculty_info`.`facultyDepartment` AS `facultyDepartment`, `faculty_info`.`urlAddress` AS `urlAddress`, `faculty_info`.`Fprofile_image` AS `Fprofile_image`, `faculty_info`.`documents_handle` AS `documents_handle`, `faculty_info`.`date` AS `date` FROM `faculty_info` union select `student_info`.`id` AS `id`,`student_info`.`studentNum` AS `studentNum`,`student_info`.`userType` AS `userType`,`student_info`.`studentFname` AS `studentFname`,`student_info`.`studentMname` AS `studentMname`,`student_info`.`studentLname` AS `studentLname`,`student_info`.`studentGender` AS `studentGender`,`student_info`.`studentEmail` AS `studentEmail`,`student_info`.`studentUsername` AS `studentUsername`,`student_info`.`studentPassword` AS `studentPassword`,`student_info`.`studentCourse` AS `studentCourse`,`student_info`.`urlAddress` AS `urlAddress`,`student_info`.`profile_image` AS `profile_image`,`student_info`.`documents_owned` AS `documents_owned`,`student_info`.`date` AS `date` from `student_info`  ;

-- --------------------------------------------------------

--
-- Structure for view `users_documents`
--
DROP TABLE IF EXISTS `users_documents`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users_documents`  AS SELECT `document`.`id` AS `id`, `document`.`documentID` AS `documentID`, `document`.`documentName` AS `documentName`, `document`.`documentType` AS `documentType`, `document`.`documentOwner` AS `documentOwner`, `document`.`submittedTo` AS `submittedTo`, `faculty_info`.`facultyFname` AS `facultyFname`, `faculty_info`.`facultyMname` AS `facultyMname`, `faculty_info`.`facultyLname` AS `facultyLname`, `faculty_info`.`facultyDepartment` AS `facultyDepartment`, `document`.`documentStatus` AS `documentStatus`, `document`.`remarks` AS `remarks`, `document`.`date_created` AS `date_created`, `document`.`date` AS `date` FROM (`document` left join `faculty_info` on(`document`.`submittedTo` = `faculty_info`.`facultyID`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `completion`
--
ALTER TABLE `completion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documentID` (`documentID`),
  ADD KEY `documentName` (`documentName`),
  ADD KEY `documentStatus` (`documentStatus`),
  ADD KEY `submittedTo` (`submittedTo`),
  ADD KEY `documentOwner` (`documentOwner`),
  ADD KEY `documentID_2` (`documentID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `courseCode` (`courseCode`),
  ADD KEY `course_name` (`course_name`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documentID` (`documentID`),
  ADD KEY `documentName` (`documentName`),
  ADD KEY `documentType` (`documentType`),
  ADD KEY `documentStatus` (`documentStatus`),
  ADD KEY `submittedTo` (`submittedTo`),
  ADD KEY `documentOwner` (`documentOwner`),
  ADD KEY `documentID_2` (`documentID`);

--
-- Indexes for table `document_transaction`
--
ALTER TABLE `document_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_archive`
--
ALTER TABLE `faculty_archive`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `facultyID` (`facultyID`),
  ADD KEY `facultyFname` (`facultyFname`),
  ADD KEY `facultyMname` (`facultyMname`),
  ADD KEY `facultyLname` (`facultyLname`),
  ADD KEY `facultyGender` (`facultyGender`),
  ADD KEY `facultyEmail` (`facultyEmail`),
  ADD KEY `facultyDepartment` (`facultyDepartment`),
  ADD KEY `urlAddress` (`urlAddress`),
  ADD KEY `facultyUsername` (`facultyUsername`);

--
-- Indexes for table `faculty_email`
--
ALTER TABLE `faculty_email`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultyEmail` (`facultyEmail`);

--
-- Indexes for table `faculty_info`
--
ALTER TABLE `faculty_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `facultyID` (`facultyID`),
  ADD KEY `facultyFname` (`facultyFname`),
  ADD KEY `facultyMname` (`facultyMname`),
  ADD KEY `facultyLname` (`facultyLname`),
  ADD KEY `facultyGender` (`facultyGender`),
  ADD KEY `facultyEmail` (`facultyEmail`),
  ADD KEY `facultyDepartment` (`facultyDepartment`),
  ADD KEY `urlAddress` (`urlAddress`),
  ADD KEY `facultyUsername` (`facultyUsername`);

--
-- Indexes for table `faculty_sheets`
--
ALTER TABLE `faculty_sheets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultyEmail` (`facultyEmail`);

--
-- Indexes for table `student_archive`
--
ALTER TABLE `student_archive`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentID_2` (`studentID`),
  ADD KEY `studentNum` (`studentNum`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `studentFname` (`studentFname`),
  ADD KEY `studentMname` (`studentMname`),
  ADD KEY `studentLname` (`studentLname`),
  ADD KEY `studentEmail` (`studentEmail`),
  ADD KEY `studentCourse` (`studentCourse`),
  ADD KEY `studentGender` (`studentGender`),
  ADD KEY `urlAddress` (`urlAddress`),
  ADD KEY `studentEmail_2` (`studentEmail`);

--
-- Indexes for table `student_email`
--
ALTER TABLE `student_email`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultyEmail` (`studentEmail`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentID_2` (`studentID`),
  ADD KEY `studentNum` (`studentNum`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `studentFname` (`studentFname`),
  ADD KEY `studentMname` (`studentMname`),
  ADD KEY `studentLname` (`studentLname`),
  ADD KEY `studentEmail` (`studentEmail`),
  ADD KEY `studentCourse` (`studentCourse`),
  ADD KEY `studentGender` (`studentGender`),
  ADD KEY `urlAddress` (`urlAddress`),
  ADD KEY `studentEmail_2` (`studentEmail`);

--
-- Indexes for table `student_sheets`
--
ALTER TABLE `student_sheets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultyEmail` (`studentEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `completion`
--
ALTER TABLE `completion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `document_transaction`
--
ALTER TABLE `document_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faculty_archive`
--
ALTER TABLE `faculty_archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty_email`
--
ALTER TABLE `faculty_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculty_info`
--
ALTER TABLE `faculty_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `faculty_sheets`
--
ALTER TABLE `faculty_sheets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `student_archive`
--
ALTER TABLE `student_archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_email`
--
ALTER TABLE `student_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `student_sheets`
--
ALTER TABLE `student_sheets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

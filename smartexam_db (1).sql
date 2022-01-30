-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2018 at 11:12 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartexam_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintab`
--

CREATE TABLE `admintab` (
  `aid` int(3) NOT NULL,
  `auname` varchar(50) NOT NULL,
  `apwd` varchar(250) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintab`
--

INSERT INTO `admintab` (`aid`, `auname`, `apwd`, `role`) VALUES
(1, 'pistis', '$2y$10$diDrVyYHCqpnDQORIyZMhu2iQ5sgxE7Ys8UCquAxcfZfZhNa3uGvO', 'Systemadmin');

-- --------------------------------------------------------

--
-- Table structure for table `categorytab`
--

CREATE TABLE `categorytab` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(30) NOT NULL,
  `cat_duration` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorytab`
--

INSERT INTO `categorytab` (`cat_id`, `cat_name`, `cat_duration`) VALUES
(7, 'JAMB', 4),
(8, 'NECO GCE', 30),
(9, 'WAEC', 7);

-- --------------------------------------------------------

--
-- Table structure for table `qtable`
--

CREATE TABLE `qtable` (
  `qid` int(11) NOT NULL,
  `question` longtext,
  `optiona` varchar(500) DEFAULT NULL,
  `optionb` varchar(500) DEFAULT NULL,
  `optionc` varchar(500) DEFAULT NULL,
  `optiond` varchar(500) DEFAULT NULL,
  `correctoption` varchar(500) DEFAULT NULL,
  `mark` int(11) DEFAULT NULL,
  `category` varchar(40) DEFAULT NULL,
  `subject` varchar(30) NOT NULL,
  `questimage` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qtable`
--

INSERT INTO `qtable` (`qid`, `question`, `optiona`, `optionb`, `optionc`, `optiond`, `correctoption`, `mark`, `category`, `subject`, `questimage`) VALUES
(2, 'how many planet do we have in the solar system kjdfiobfudibdfiubviuobf', '4', '2', '5', '6', '9', 10, 'Project Management', 'Christian Religious Studies', ''),
(10, 'The program manager is involved in the creation of a cost reduction version of a CDMA base station. The company has placed a major emphasis on quality and rolled out TQM in their factories in response to the variety of defects found in the original ver4sion of the board. So far, pilot builds of the board have indicated process inconsistencies between shifts. Which of the following should be checked to ensure the indications are accurate?\r\nkjckbdsbvidbvbsdviuds\r\n\r\nldfnipovn podnvhipodsnvipodnvipo', '2401681672401681672401681672401681672401681672401681672401681672401681672401681624016816724016816724016816724016816724017240168167240168167240168167240168167240168167240168167proces2401681672401681677', 'lnknoinioniionoinininononakjbjbjkbjkbkjbkbjkbjkbkjbkjbkjbkjbkbjkbkbkbkjbkjbbkbbt proces', 'checklists for the build and t2401681672 40168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167est proces', 'checklists for the build an2401681672 40168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167d test proces', 'checklists for the build 240168167240168 167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167240168167and test proces', 1, 'Project Management', 'Agric Science', ''),
(12, 'You have been the project manager on a new project for a foreign company, and the engagement has been successful. In the foreign country, it is customary to show a ppreciation by presenting a gift, so the company wants to award the project manager a new Rolex watch. It will be presented to you at the meeting. What is the professional and social responsibility for the project?\r\n You have been the project manager on a new project for a foreign company, and the engagement has been successful. In th', 'to accept the watch and not offend the c', 'to accept the watch and not offend the c', 'to accept the watch and not offend the c', 'to accept the watch and not offend the c', 'to accept the watch and not offend the c', 1, 'Project Management', 'Christian Religious Studies', ''),
(17, 'mjcbxkjxbk', 'oihiohoi', 'iohiojh', 'oihiohn', 'iohioh', 'oihoi', 0, 'JAMB', 'Mathematics', ''),
(18, 'cvkjcvbjb', 'ugiogg', 'iuogoigo', 'giogoi', 'gogo', 'gog', 8, 'JAMB', 'Mathematics', ''),
(19, 'mcxbvcxkjvk', 'KJVKJVK', 'kkuig', 'uguig', 'ugiug', 'iugiuog', 7, 'JAMB', 'Mathematics', ''),
(20, 'mjcbkjcvbk', 'kjdkb', 'iuiu', 'uigiug', 'kugiog', 'kihil', 4, 'JAMB', 'English', ''),
(21, 'byuvuyv', 'uvyuvu', 'yuvuyv', 'yvyuv', 'vyvyuv', 'yuvuyv', 2, 'WAEC', 'English', ''),
(22, 'dkklnkl;', 'nipon', 'noin', 'ionion', 'inio', 'inoi', 5, 'NECO GCE', 'Physics', ''),
(23, 'hgsayuvyug', 'uuyvv', 'uv]v', 'iviv', 'iuvi', 'vvi', 3, 'NECO GCE', 'Physics', 'questionpics/what-we-do_right.png'),
(24, 'knklnkcxb', 'kblkb', 'ibio', 'ibb', 'ibb', 'ibi', 2, 'NECO GCE', 'Mathematics', 'questionpics/IMG-20161203-WA0001.jpg'),
(25, 'kxnlibn', 'kbkb', 'ibib', 'biobo', 'biboi', 'oinoi', 5, 'NECO GCE', 'Physics', 'questionpics/images-3.jpeg'),
(26, 'kjbkdcbckb', 'biob', 'ibiob', 'ioiob', 'oibio', 'ioubio', 10, 'NECO GCE', 'Physics', ''),
(27, 'kjxxbnxoboi', 'ds', 'c', 'c', 'xc', 'a', 4, 'JAMB', 'Mathematics', '');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `regid` int(11) NOT NULL,
  `firstname` varchar(15) DEFAULT NULL,
  `lastname` varchar(15) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `desiredexam` varchar(10) DEFAULT NULL,
  `examcode` varchar(20) NOT NULL,
  `date` varchar(10) DEFAULT NULL,
  `examstatus` tinyint(1) NOT NULL,
  `examscore` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`regid`, `firstname`, `lastname`, `Phone`, `email`, `desiredexam`, `examcode`, `date`, `examstatus`, `examscore`) VALUES
(2, 'Adeniran', 'Adeyinka', '08054291827', 'nathanieladeniran@gmail.com', 'PMP', '', '29-07-17', 0, 0),
(13, 'kjnkjblknblbn', 'nknknkn', '9843898984890', 'nicon247@yahoo.com', 'uehiofouif', '255415564', '23-08-17', 1, 33.3333),
(16, 'kvnioncvoi', 'iuodiusob', '777797', 'jidor@yahoo.com', 'pm', '235436467', '23-08-17', 0, 0),
(18, 'aa', 'dd', '989333', 'dd@m.com', 'WAEC', '387449819', '10-06-18', 0, 0),
(20, 'kk', 'll', '89797', 'n@l.com', 'JAMB', '450932627', '10-06-18', 0, 0),
(23, 'ade', 'oti', '39399', 'n@u.com', 'JAMB', '272721544', '10-06-18', 0, 0),
(24, 'sebebe', 'seb', '08199993', 'np@o.com', 'NECO GCE', '745130242', '2018-06-22', 0, 0),
(25, 'Niyi', 'Alimi', '08066940498', 'neyonill@yahoo.com', 'JAMB', '420112618', '2018-06-22', 0, 0),
(34, 'klcxni', 'oinoi', 'ionoin', 'nn@l.com', 'JAMB', '906468800', '2018-06-22', 0, 0),
(35, 'jkdndknn', 'bibiob', '87734437', 'nppdi@m.com', 'JAMB', '386018632', '2018-06-22', 0, 0),
(36, 'jcbibiub', 'kjcxncxno', '929092', 'nlb@n.com', 'JAMB', '759453907', '2018-06-22', 0, 0),
(37, 'kfviub', 'iubibi', '98394', 'l@m.com', 'WAEC', '992641396', '2018-06-22', 1, 0),
(39, 'kjxbksksxhs', ',m,mm', '8474747474', 'nk@m.com', 'WAEC', '162363343', '2018-06-22', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `scoretab`
--

CREATE TABLE `scoretab` (
  `exam_id` bigint(20) NOT NULL,
  `reg_id` bigint(20) NOT NULL,
  `exam_code` varchar(10) NOT NULL,
  `exam_subject` varchar(30) NOT NULL,
  `exam_score` float NOT NULL,
  `exam_type` varchar(30) NOT NULL,
  `exam_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scoretab`
--

INSERT INTO `scoretab` (`exam_id`, `reg_id`, `exam_code`, `exam_subject`, `exam_score`, `exam_type`, `exam_date`) VALUES
(1, 23, '272721544', 'Mathematics', 0, 'JAMB', '2018-06-11'),
(2, 23, '272721544', 'English', 0, 'JAMB', '2018-06-11'),
(3, 23, '272721544', 'Mathematics', 0, 'JAMB', '2018-06-21'),
(11, 24, '745130242', 'Mathematics', 0, 'NECO GCE', '2018-06-22'),
(12, 24, '745130242', 'Mathematics', 0, 'NECO GCE', '2018-06-22'),
(13, 24, '745130242', 'Physics', 0, 'NECO GCE', '2018-06-22'),
(14, 24, '745130242', 'Mathematics', 0, 'NECO GCE', '2018-06-22'),
(15, 37, '992641396', 'English', 0, 'WAEC', '2018-06-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintab`
--
ALTER TABLE `admintab`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `categorytab`
--
ALTER TABLE `categorytab`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `qtable`
--
ALTER TABLE `qtable`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`regid`);

--
-- Indexes for table `scoretab`
--
ALTER TABLE `scoretab`
  ADD PRIMARY KEY (`exam_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintab`
--
ALTER TABLE `admintab`
  MODIFY `aid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categorytab`
--
ALTER TABLE `categorytab`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `qtable`
--
ALTER TABLE `qtable`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `regid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `scoretab`
--
ALTER TABLE `scoretab`
  MODIFY `exam_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

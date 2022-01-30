-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2018 at 09:25 PM
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
(1, 'pistis', '$2y$10$4LGCsueV9Eak6ls880qB8OVBiW3SQoGgBacJZCw5JCuwW71wceW1i', 'Systemadmin'),
(2, 'atanda', '$2y$10$5UTn9/C6b3nEMHmJOmO7KuzMSJbl2OaKf5gr3DB0wsoYasYZdzJOe', 'Systemadmin');

-- --------------------------------------------------------

--
-- Table structure for table `categorytab`
--

CREATE TABLE `categorytab` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_duration` int(6) NOT NULL,
  `instruction` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorytab`
--

INSERT INTO `categorytab` (`cat_id`, `cat_name`, `cat_duration`, `instruction`) VALUES
(7, 'JAMB', 1, ''),
(8, 'NECO GCE', 30, ''),
(9, 'WAEC', 7, ''),
(10, 'GCE', 40, ''),
(11, 'Others', 1, ' PLEASE READ THE FOLLOWING INSTRUCTIONS CAREFULLY  BEFORE CLICKING ON THE START BUTTON.     ONCE YOU CLICK THE START BUTTON. THE TIMER FOR THE QUESTION STARTS RUNNING AND THE QUESTION WILL BE SUBMITTED TO THE SERVER AUTOMATICALLY ONCE THE TIME IS UP The question you are about to answer includes various Subjects, with a total of 50 questions.      </p>       <p>NB. The Test is a question per page. Once you click on the Next Button, you Should not click on the browser back arrow button for any reason because if you do so the system will submit the exam to the server.</p>             <p>When you are through with the test, click on  the Submit button to Send your answers to the server.'),
(12, 'My Category', 12, ''),
(15, 'Jambs', 20, ' PLEASE READ THE FOLLOWING INSTRUCTIONS CAREFULLY  BEFORE CLICKING ON THE START BUTTON.\n    ONCE YOU CLICK THE START BUTTON. THE TIMER FOR THE QUESTION STARTS RUNNING AND THE QUESTION WILL BE SUBMITTED TO THE SERVER AUTOMATICALLY ONCE THE TIME IS UP\nThe question you are about to answer includes various Subjects, with a total of 50 questions.      </p>\n      <p>NB. The Test is a question per page. Once you click on the Next Button, you Should not click on the browser back arrow button for any reason because if you do so the system will submit the exam to the server.</p>\n     \n      <p>When you are through with the test, click on  the Submit button to Send your answers to the server.'),
(16, 'New testing', 20, 'Please read'),
(17, 'Religion and National ', 20, 'Testing... Please read well'),
(18, 'Common entrance', 2, 'Kjdskjdkbkidbskbichdsiocodsicoidsicbsdiocbosicosdbciobdsoicbdsobcoidsbcoidbsicbdsoibosbcosdbcuodscvdasbcdbsciodsoicbsdiovcoidsvbodsviuoavsiuocvaocvosdvcuo');

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
(33, 'What is 333 times 135?', '46323', '43623', '43290', '44955', '44955', 2, 'Others', 'Mathematics', ''),
(34, 'What will come in place of question mark in the following equation?\r\n\r\n1/4th of 1/2 of 3/4th of 52000 = ?\r\n', '4875', '4857', '4785', '4865', '4875', 2, 'Others', 'Mathematics', ''),
(35, 'What will come in place of question mark in the following equation?\r\n\r\n57/67 Ã— 32/171 Ã— 45/128 = ?', '15/262', '15/268', '15/266', '17/268', '15/268', 2, 'Others', 'Mathematics', ''),
(36, 'What will come in place of question mark in the following equation?\r\n\r\n283 Ã— 56 + 252 = 20 Ã— ?', '805', '803', '807', '809', '805', 2, 'Others', 'Mathematics', ''),
(37, 'What will come in place of question mark in the following equation?\r\n\r\n(5863 - âˆš2704) Ã— 0.5 = ?', '2955.5', '2905.5', '2590.5', '2909.5', '2905.5', 2, 'Others', 'Mathematics', ''),
(38, 'The petrol tank of Bajaj Pulsar can hold g liters. If a liter was removed when the tank was full, what part of the full tank was removed?', 'g-a', 'g/a', 'a/g', '(g-a)/a', 'a/g', 2, 'Others', 'Mathematics', ''),
(39, 'What will come in place of question mark (?) in the following question?\r\n\r\n76% of 1285 = 35% of 1256 +?', '543', '537', '547', '533', '537', 2, 'Others', 'Mathematics', ''),
(40, 'In the following question, two equations numbered I and II are given. You have to solve both the equations and give answer\r\n\r\nI. âˆš500 x + âˆš402 = 0\r\n\r\nII. âˆš360 y + âˆš200 = 0', 'if x > y', 'if x â‰¥ y', 'if x < y', 'if x â‰¤ y', 'if x < y', 2, 'Others', 'Mathematics', ''),
(41, 'The sum of 15% of a positive number and 20% of the same number is 126.What is one-third of that number?', '360', '1080', '120', '40', '120', 2, 'Others', 'Mathematics', ''),
(42, 'If 70% of a no. is subtracted from itself it reduces to 81.what is two fifth of that no.?', '88', '91', '108', '116', '108', 2, 'Others', 'Mathematics', ''),
(43, 'What value will replace the question mark in each of the following equations?\r\n\r\n? - 1936248 = 1635773', '3572021', '3572031', '3572028', '3572061', '3572021', 2, 'Others', 'Mathematics', ''),
(44, 'Evaluate :\r\n\r\n986 Ã— 237 + 986 Ã— 863', '1084600', '1084800', '986000', '986860', '1084600', 2, 'Others', 'Mathematics', ''),
(45, 'Kiran had been working in a bank for some years.', 'Simple past', 'Past continuous', 'Past perfect continuous', 'Past perfect.', 'Past perfect continuous', 2, 'Others', 'English', ''),
(46, 'Select the correct tense:\r\n\r\nI had seen him earlier.\r\n', 'Past continuous', 'Past perfect', 'Past perfect continuous', 'Future perfect', 'Past perfect', 2, 'Others', 'English', ''),
(47, 'Select the correct tense:\r\n\r\nShe had played carom.\r\n', 'Future perfect', 'Past perfect', 'Present perfect', 'Simple present', 'Past perfect', 2, 'Others', 'English', ''),
(48, 'Select the correct plural form for the given word:\r\n\r\nCountry\r\n', 'Countrys', 'Countryes', 'Countries', 'Countrees', 'Countries', 2, 'Others', 'English', ''),
(49, 'Select the correct plural form for the given word:\r\n\r\nMouse\r\n', 'Mice', 'Mouses', 'Mices', 'Mouese', 'Mice', 2, 'Others', 'English', ''),
(50, 'Past tense of Go is ?', 'Went', 'Gone', 'Left', 'Goner', 'Went', 2, 'Others', 'English', ''),
(51, 'Testing', 'A', 'B', 'C', 'D', 'C', 2, 'New testing', 'Accounts', ''),
(52, 'Pick out the most effective words from the given words to fill in the blank to make the sentence meaningfully complete.\r\n\r\nI _________ here __________ twenty years next month.\r\n', 'working, since', 'will be working, since', 'will have been working, since', 'will have been working, for', 'will have been working, for', 2, 'Religion and National ', 'Biology', 'questionpics/New-Map-of-Nigeria.jpg'),
(53, 'Pick out the most effective words from the given words to fill in the blank to make the sentence meaningfully complete.\r\n\r\nI ______ with my sister _______ I find an apartment.\r\n', 'am living, until', 'have been living, since', 'had lived, since', 'had been living, since', 'am living, until', 2, 'Religion and National ', 'Biology', ''),
(54, 'Pick out the most effective words from the given words to fill in the blank to make the sentence meaningfully complete.\r\n\r\nThe Jurassic __________ the geological history _______for approximately 62 billion years.\r\n', 'period since, lasts', 'period over, last', 'period in, lasted', 'period for, lasting', 'period in, lasted', 2, 'Religion and National ', 'Biology', 'questionpics/Location Moved.jpeg'),
(55, 'how many sides does a triangle has', '3', '4', '5', '6', '3', 2, 'Common entrance', 'Mathematics', '');

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
  `desiredexam` varchar(50) DEFAULT NULL,
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
(13, 'kjnkjblknblbn', 'nknknkn', '9843898984890', 'nicon247@yahoo.com', 'uehiofouif', '255415564', '23-08-17', 0, 33.3333),
(16, 'kvnioncvoi', 'iuodiusob', '777797', 'jidor@yahoo.com', 'pm', '235436467', '23-08-17', 0, 0),
(18, 'aa', 'dd', '989333', 'dd@m.com', 'WAEC', '387449819', '10-06-18', 0, 0),
(20, 'kk', 'll', '89797', 'n@l.com', 'JAMB', '450932627', '10-06-18', 0, 0),
(23, 'ade', 'oti', '39399', 'n@u.com', 'JAMB', '272721544', '10-06-18', 1, 0),
(24, 'sebebe', 'seb', '08199993', 'np@o.com', 'NECO GCE', '745130242', '2018-06-22', 1, 0),
(25, 'Niyi', 'Alimi', '08066940498', 'neyonill@yahoo.com', 'Others', '420112618', '2018-06-22', 1, 0),
(34, 'klcxni', 'oinoi', 'ionoin', 'nn@l.com', 'JAMB', '906468800', '2018-06-22', 0, 0),
(35, 'jkdndknn', 'bibiob', '87734437', 'nppdi@m.com', 'JAMB', '386018632', '2018-06-22', 0, 0),
(36, 'jcbibiub', 'kjcxncxno', '929092', 'nlb@n.com', 'JAMB', '759453907', '2018-06-22', 0, 0),
(37, 'kfviub', 'iubibi', '98394', 'l@m.com', 'WAEC', '992641396', '2018-06-22', 1, 0),
(39, 'kjxbksksxhs', ',m,mm', '8474747474', 'nk@m.com', 'Others', '162363343', '2018-06-22', 1, 0),
(40, 'Alimi', 'Tobi', '', '', 'Others', '779443929', '2018-06-28', 1, 0),
(41, 'kjxbkub', 'kbioho', '9898338', 'oidhsiodfh@m.com', 'Others', '424410870', '2018-06-28', 0, 0),
(42, 'kjcjxcbjk', 'KJBKJB', '', '', 'Others', '666031038', '2018-06-28', 0, 0),
(43, 'Alimi', 'Ade', '08066940498', 'neyonill@yahoo.com', 'Others', '272756437', '2018-06-28', 1, 0),
(44, 'Alimi', 'Idiris', '0806694046', '', 'Others', '915677052', '2018-06-28', 1, 0),
(45, 'ade', 'olu', '08168905925', '', 'Others', '596585663', '2018-06-28', 1, 0),
(46, 'MUTIU ', 'OGUNWALE', '8032948285', 'mnconceptng@gmail.com', 'New testing', '488202252', '2018-06-28', 0, 0),
(47, 'Niyi', 'Ajo', '906023301', '', 'Religion and National ', '393959346', '2018-06-28', 1, 0),
(48, 'Olwatobi', 'Ojo', '0898788999', '', 'Common entrance', '545195261', '2018-06-29', 0, 0);

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
(13, 24, '745130242', 'Physics', 0, 'NECO GCE', '2018-06-22'),
(15, 37, '992641396', 'English', 0, 'WAEC', '2018-06-22'),
(16, 25, '420112618', 'Mathematics', 0, 'JAMB', '2018-06-23'),
(17, 25, '420112618', 'English', 0, 'JAMB', '2018-06-23'),
(18, 24, '745130242', 'Government', 100, 'NECO GCE', '2018-06-23'),
(20, 39, '162363343', 'Mathematics', 41.6667, 'Others', '2018-06-28'),
(21, 40, '779443929', 'English', 80, 'Others', '2018-06-28'),
(22, 45, '596585663', 'English', 60, 'Others', '2018-06-28'),
(23, 43, '272756437', 'English', 100, 'Others', '2018-06-28'),
(26, 25, '420112618', 'English', 16.6667, 'Others', '2018-06-28'),
(27, 43, '272756437', 'English', 33.3333, 'Others', '2018-06-28'),
(28, 25, '420112618', 'English', 16.6667, 'Others', '2018-06-28'),
(38, 47, '393959346', 'Biology', 0, 'Religion and National ', '2018-06-29'),
(39, 47, '393959346', 'Biology', 0, 'Religion and National ', '2018-06-29'),
(40, 47, '393959346', 'Biology', 0, 'Religion and National ', '2018-06-29'),
(41, 40, '779443929', 'English', 0, 'Others', '2018-06-29'),
(42, 40, '779443929', 'English', 0, 'Others', '2018-06-29'),
(43, 40, '779443929', 'English', 0, 'Others', '2018-06-29'),
(44, 40, '779443929', 'English', 0, 'Others', '2018-06-29'),
(45, 40, '779443929', 'English', 0, 'Others', '2018-06-29'),
(46, 40, '779443929', 'English', 0, 'Others', '2018-06-29'),
(47, 40, '779443929', 'English', 0, 'Others', '2018-06-29'),
(48, 40, '779443929', 'English', 0, 'Others', '2018-06-29'),
(49, 40, '779443929', 'English', 133.333, 'Others', '2018-06-29'),
(54, 40, '779443929', 'English', 50, 'Others', '2018-06-29'),
(55, 44, '915677052', 'Mathematics', 100, 'Others', '2018-06-29'),
(56, 44, '915677052', 'English', 83.3333, 'Others', '2018-06-29'),
(61, 40, '779443929', 'English', 66.6667, 'Others', '2018-06-29'),
(71, 40, '779443929', 'English', 83.3333, 'Others', '2018-06-29'),
(72, 40, '779443929', 'English', 66.6667, 'Others', '2018-06-29'),
(73, 40, '779443929', 'English', 0, 'Others', '2018-06-29'),
(74, 40, '779443929', 'English', 50, 'Others', '2018-06-29'),
(75, 40, '779443929', 'English', 0, 'Others', '2018-06-29');

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
  MODIFY `aid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categorytab`
--
ALTER TABLE `categorytab`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `qtable`
--
ALTER TABLE `qtable`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `regid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `scoretab`
--
ALTER TABLE `scoretab`
  MODIFY `exam_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

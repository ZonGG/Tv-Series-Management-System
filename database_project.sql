-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 10:53 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `Account_ID` int(5) NOT NULL,
  `Member_ID` int(11) NOT NULL,
  `Account_Type` varchar(10) NOT NULL,
  `Access_Start` date NOT NULL,
  `Access_End` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Account_ID`, `Member_ID`, `Account_Type`, `Access_Start`, `Access_End`) VALUES
(10001, 1000000001, 'Paid', '2021-06-01', '2021-08-03'),
(10003, 1000000012, 'Free', '2021-07-01', '2021-08-30'),
(10004, 1000000002, 'Free', '2021-07-01', '2021-07-31'),
(10005, 1000000003, 'Free', '2021-07-01', '2021-07-31'),
(10006, 1000000004, 'Free', '2021-07-01', '2021-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `Actor_ID` int(4) NOT NULL,
  `Actor_Name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`Actor_ID`, `Actor_Name`) VALUES
(4001, 'Bryan Cranston'),
(4002, 'Anna Gunn'),
(4003, 'Betsy Brandt'),
(4004, 'Bob Odenkirk'),
(4005, 'Jonathan Banks'),
(4006, 'Aaron Paul'),
(4007, 'Dean Norris'),
(4008, 'RJ Mitte'),
(4009, 'Steven Michael Quezada'),
(4010, 'Giancarlo Esposito'),
(4019, 'Lorenzo Richelmy'),
(4020, 'Benedict Wong'),
(4021, 'Chin Han'),
(4022, 'Christina Hendricks'),
(4023, 'Retta'),
(4024, 'Mae Whitman'),
(4025, 'Matthew Lillard'),
(4026, 'Reno Wilson'),
(4027, 'Manny Montana'),
(4028, 'Lidya Jewett'),
(4029, 'Isaiah Stannard'),
(4030, 'James Lesure'),
(4031, 'David Hornsby'),
(4032, 'Zach Gilford'),
(4033, 'Charlie Cox'),
(4034, 'Deborah Ann Woll'),
(4035, 'Elden Henson'),
(4036, 'Kitty Chicha Amatayakul'),
(4037, 'Chanya McClory'),
(4038, 'Thanawetch Siriwattanakul');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(10001, 'rannie0211', '990211');

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE `award` (
  `Award_ID` int(5) NOT NULL,
  `Award_Name` varchar(256) NOT NULL,
  `Award_Category` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `award`
--

INSERT INTO `award` (`Award_ID`, `Award_Name`, `Award_Category`) VALUES
(50001, 'Primetime Emmy Awards', 'Outstanding Drama Series'),
(50004, 'Creative Arts Emmy Awards', 'Outstanding Single-Camera Picture Editing for a Drama Series'),
(50005, 'Australian Production Design Guild Awards', 'Set Decoration on a Television Drama'),
(50006, 'American Society of Cinematographers Awards', 'Outstanding Achievement in Cinematography in Regular Series'),
(50007, 'IGN Summer Movie Awards', 'Best TV Comic Book Adaptation'),
(50008, 'Online Film & Television Association', 'Best New Titles Sequence');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `Director_ID` int(6) NOT NULL,
  `Director_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`Director_ID`, `Director_Name`) VALUES
(700001, 'Vince Gilligan'),
(700002, 'Jenna Bans'),
(700003, 'John Fusco'),
(700004, 'Pairach Khumwan'),
(700005, 'Drew Goddard'),
(700006, 'Sittisiri Mongkolsiri'),
(700007, 'T-Thawat Taifayongvichit'),
(700008, 'Siwawut Sewatanon');

-- --------------------------------------------------------

--
-- Table structure for table `episode`
--

CREATE TABLE `episode` (
  `Episode_ID` int(5) NOT NULL,
  `Season_ID` int(5) NOT NULL,
  `Episode_Num` int(3) NOT NULL,
  `Episode_Duration` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `episode`
--

INSERT INTO `episode` (`Episode_ID`, `Season_ID`, `Episode_Num`, `Episode_Duration`) VALUES
(30001, 20006, 1, 44),
(30002, 20006, 2, 42),
(30003, 20006, 3, 51),
(30004, 20006, 4, 48),
(30005, 20006, 5, 38),
(30006, 20006, 6, 40),
(30007, 20006, 7, 39),
(30008, 20006, 8, 43),
(30009, 20006, 9, 48),
(30010, 20006, 10, 42),
(30011, 20001, 1, 58),
(30012, 20001, 2, 48),
(30013, 20001, 3, 48),
(30014, 20001, 4, 48),
(30015, 20001, 5, 48),
(30016, 20001, 6, 48),
(30017, 20001, 7, 48),
(30018, 20002, 1, 47),
(30019, 20002, 2, 48),
(30020, 20002, 3, 47),
(30021, 20002, 4, 48),
(30022, 20002, 5, 48),
(30023, 20002, 6, 48),
(30024, 20002, 7, 48),
(30025, 20002, 8, 48),
(30026, 20002, 9, 48),
(30027, 20002, 10, 48),
(30028, 20002, 11, 48),
(30029, 20002, 12, 48),
(30030, 20002, 13, 48),
(30031, 20003, 1, 47),
(30032, 20003, 2, 48),
(30033, 20003, 3, 47),
(30034, 20003, 4, 48),
(30035, 20003, 5, 48),
(30036, 20003, 6, 48),
(30037, 20003, 7, 48),
(30038, 20003, 8, 47),
(30039, 20003, 9, 48),
(30040, 20003, 10, 48),
(30041, 20003, 11, 48),
(30042, 20003, 12, 47),
(30043, 20003, 13, 48),
(30044, 20004, 1, 48),
(30045, 20004, 2, 46),
(30046, 20004, 3, 46),
(30047, 20004, 4, 45),
(30048, 20004, 5, 47),
(30049, 20004, 6, 47),
(30050, 20004, 7, 47),
(30051, 20004, 8, 47),
(30052, 20004, 9, 47),
(30053, 20004, 10, 47),
(30054, 20004, 11, 47),
(30055, 20004, 12, 46),
(30056, 20004, 13, 51),
(30057, 20005, 1, 43),
(30058, 20005, 2, 47),
(30059, 20005, 3, 47),
(30060, 20005, 4, 48),
(30061, 20005, 5, 48),
(30062, 20005, 6, 48),
(30063, 20005, 7, 48),
(30064, 20005, 8, 48),
(30065, 20005, 9, 48),
(30066, 20005, 10, 48),
(30067, 20005, 11, 48),
(30068, 20005, 12, 47),
(30069, 20005, 13, 48),
(30070, 20005, 14, 47),
(30071, 20005, 15, 54),
(30072, 20005, 16, 55),
(30073, 20007, 1, 52),
(30074, 20007, 2, 60),
(30075, 20007, 3, 61),
(30076, 20007, 4, 55),
(30077, 20007, 5, 58),
(30078, 20007, 6, 55),
(30079, 20007, 7, 53),
(30080, 20007, 8, 53),
(30081, 20007, 9, 54),
(30082, 20007, 10, 57),
(30083, 20008, 1, 56),
(30084, 20008, 2, 55),
(30085, 20008, 3, 51),
(30086, 20008, 4, 54),
(30087, 20008, 5, 59),
(30088, 20008, 6, 58),
(30089, 20008, 7, 56),
(30090, 20008, 8, 49),
(30091, 20008, 9, 46),
(30092, 20008, 10, 65),
(30093, 20009, 1, 43),
(30094, 20009, 2, 41),
(30095, 20009, 3, 43),
(30096, 20009, 4, 43),
(30097, 20009, 5, 42),
(30098, 20009, 6, 43),
(30099, 20009, 7, 42),
(30100, 20009, 8, 43),
(30101, 20009, 9, 43),
(30102, 20009, 10, 43),
(30103, 20010, 1, 43),
(30104, 20010, 2, 43),
(30105, 20010, 3, 45),
(30106, 20010, 4, 42),
(30107, 20010, 5, 43),
(30108, 20010, 6, 43),
(30109, 20010, 7, 43),
(30110, 20010, 8, 42),
(30111, 20010, 9, 43),
(30112, 20010, 10, 43),
(30113, 20010, 11, 45),
(30114, 20010, 12, 43),
(30115, 20010, 13, 42),
(30116, 20011, 1, 43),
(30117, 20011, 2, 42),
(30118, 20011, 3, 45),
(30119, 20011, 4, 43),
(30120, 20011, 5, 43),
(30121, 20011, 6, 43),
(30122, 20011, 7, 43),
(30123, 20011, 8, 42),
(30124, 20011, 9, 42),
(30125, 20011, 10, 43),
(30126, 20011, 11, 42),
(30127, 20012, 1, 54),
(30128, 20012, 2, 54),
(30129, 20012, 3, 53),
(30130, 20012, 4, 53),
(30131, 20012, 5, 57),
(30132, 20012, 6, 49),
(30133, 20012, 7, 51),
(30134, 20012, 8, 54),
(30135, 20012, 9, 58),
(30136, 20012, 10, 57),
(30137, 20012, 11, 60),
(30138, 20012, 12, 61),
(30139, 20012, 13, 57),
(30140, 20013, 1, 49),
(30141, 20013, 2, 51),
(30142, 20013, 3, 49),
(30143, 20013, 4, 61),
(30144, 20013, 5, 57),
(30145, 20013, 6, 57),
(30146, 20013, 7, 57),
(30147, 20013, 8, 55),
(30148, 20013, 9, 60),
(30149, 20013, 10, 53),
(30150, 20013, 11, 56),
(30151, 20013, 12, 53),
(30152, 20013, 13, 59),
(30153, 20014, 1, 54),
(30154, 20014, 2, 50),
(30155, 20014, 3, 50),
(30156, 20014, 4, 55),
(30157, 20014, 5, 50),
(30158, 20014, 6, 55),
(30159, 20014, 7, 50),
(30160, 20014, 8, 51),
(30161, 20014, 9, 54),
(30162, 20014, 10, 47),
(30163, 20014, 11, 50),
(30164, 20014, 12, 56),
(30165, 20014, 13, 54),
(30166, 20006, 11, 38),
(30167, 20006, 12, 41),
(30168, 20006, 13, 38),
(30169, 20015, 1, 49),
(30170, 20015, 2, 38),
(30171, 20015, 3, 44),
(30172, 20015, 4, 42),
(30173, 20015, 5, 46),
(30174, 20015, 6, 49),
(30175, 20015, 7, 49),
(30176, 20015, 8, 44);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `Genre_ID` int(6) NOT NULL,
  `Genre_Type` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`Genre_ID`, `Genre_Type`) VALUES
(600001, 'Crime TV Shows'),
(600002, 'TV Thrillers'),
(600003, 'TV Dramas'),
(600004, 'US TV Shows'),
(600005, 'TV Comedies'),
(600006, 'Romantic TV Dramas'),
(600007, 'Romantic TV Comedies'),
(600008, 'TV Action & Adventure');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Member_ID` int(11) NOT NULL,
  `Member_Name` varchar(256) NOT NULL,
  `Member_Date_of_Birth` date NOT NULL,
  `Gender` varchar(8) NOT NULL,
  `Member_Email` varchar(256) NOT NULL,
  `Member_Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Member_ID`, `Member_Name`, `Member_Date_of_Birth`, `Gender`, `Member_Email`, `Member_Password`) VALUES
(1000000001, 'Rannie Wong', '1999-02-11', 'Female', 'rannie0211@gmail.com', '990211'),
(1000000002, 'Freddy Wong', '1999-04-26', 'Male', '1233456@gmail.com', '123456'),
(1000000003, 'Hii Ming Jung', '2000-07-10', 'Male', 'hahaha@gmail.com', 'qwertyui'),
(1000000004, 'Spencer Chee Te-Inng', '2000-03-19', 'Male', 'sc319@gmail.com', 'asasd345'),
(1000000012, 'Mandy', '2021-07-01', 'Female', 'mandy@gmail.com', '999999');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_ID` int(4) NOT NULL,
  `Account_ID` int(11) NOT NULL,
  `Amount` double NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Payment_ID`, `Account_ID`, `Amount`, `Date`) VALUES
(4, 10001, 39, '2021-07-03'),
(5, 10001, 39, '2021-07-03'),
(6, 10001, 39, '2021-07-03'),
(7, 10001, 39, '2021-07-04'),
(8, 10001, 17, '2021-07-04'),
(9, 10001, 39, '2021-07-04'),
(10, 10003, 39, '2021-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season` (
  `Season_ID` int(5) NOT NULL,
  `Series_ID` int(6) NOT NULL,
  `Season_Year` int(4) NOT NULL,
  `Num_of_season` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`Season_ID`, `Series_ID`, `Season_Year`, `Num_of_season`) VALUES
(20001, 100002, 2008, 1),
(20002, 100002, 2009, 2),
(20003, 100002, 2010, 3),
(20004, 100002, 2011, 4),
(20005, 100002, 2012, 5),
(20006, 100001, 2018, 1),
(20007, 100003, 2014, 1),
(20008, 100003, 2016, 2),
(20009, 100004, 2018, 1),
(20010, 100004, 2019, 2),
(20011, 100004, 2020, 3),
(20012, 100005, 2015, 1),
(20013, 100005, 2016, 2),
(20014, 100005, 2018, 3),
(20015, 100001, 2021, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tv_series`
--

CREATE TABLE `tv_series` (
  `Series_ID` int(6) NOT NULL,
  `Title` varchar(60) NOT NULL,
  `Description` text NOT NULL,
  `image` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tv_series`
--

INSERT INTO `tv_series` (`Series_ID`, `Title`, `Description`, `image`) VALUES
(100001, 'Girl from Nowhere', 'A mysterious, clever girl named Nanno transfers to different schools, exposing the lies and misdeeds of the students and faculty at every turn.', 'img/girl_from_nowhere.jpg'),
(100002, 'Breaking Bad', 'A high school chemistry teacher dying of cancer teams with a former student to secure his family\'s future by manufacturing and selling crystal meth. ', 'img/breaking_bad.jpg'),
(100003, 'Marco Polo', 'Set in a world of greed, betrayalm sexual intrigue and rivalry, \"Marco Polo\" is based on the famed explorer\'s adventures in Kublai Khan\'s court.', 'img/marco_polo.jpg'),
(100004, 'Good Girls', 'Three suburban moms orchestrate a local grocery store heist to escape financial ruin and establish independence -- together.', 'img/good_girls.jpg'),
(100005, 'Marvel\'s Daredevil', 'Blinded as a young boy, Matt Murdock fights injustice by day as a lawyer and by night as the Super Hero Daredevil in Hell\'s Kitchen, New York City. ', 'img/marvel_daredevil.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tv_series_actor`
--

CREATE TABLE `tv_series_actor` (
  `Series_ID` int(6) NOT NULL,
  `Actor_ID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tv_series_actor`
--

INSERT INTO `tv_series_actor` (`Series_ID`, `Actor_ID`) VALUES
(100002, 4001),
(100002, 4002),
(100002, 4003),
(100002, 4004),
(100002, 4005),
(100002, 4006),
(100002, 4007),
(100002, 4008),
(100002, 4009),
(100002, 4010),
(100003, 4019),
(100003, 4020),
(100003, 4021),
(100004, 4022),
(100004, 4023),
(100004, 4024),
(100004, 4025),
(100004, 4026),
(100004, 4027),
(100004, 4028),
(100004, 4029),
(100004, 4030),
(100004, 4031),
(100004, 4032),
(100005, 4033),
(100005, 4034),
(100005, 4035),
(100001, 4036),
(100001, 4037),
(100001, 4038);

-- --------------------------------------------------------

--
-- Table structure for table `tv_series_award`
--

CREATE TABLE `tv_series_award` (
  `Series_ID` int(6) NOT NULL,
  `Award_ID` int(5) NOT NULL,
  `Year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tv_series_award`
--

INSERT INTO `tv_series_award` (`Series_ID`, `Award_ID`, `Year`) VALUES
(100002, 50004, 2014),
(100003, 50005, 2015),
(100003, 50006, 2016),
(100005, 50007, 2018),
(100005, 50008, 2015),
(100002, 50001, 2013),
(100002, 50001, 2014);

-- --------------------------------------------------------

--
-- Table structure for table `tv_series_director`
--

CREATE TABLE `tv_series_director` (
  `Series_ID` int(6) NOT NULL,
  `Director_ID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tv_series_director`
--

INSERT INTO `tv_series_director` (`Series_ID`, `Director_ID`) VALUES
(100002, 700001),
(100004, 700002),
(100003, 700003),
(100001, 700004),
(100005, 700005),
(100001, 700006),
(100001, 700007),
(100001, 700008);

-- --------------------------------------------------------

--
-- Table structure for table `tv_series_genre`
--

CREATE TABLE `tv_series_genre` (
  `Series_ID` int(6) NOT NULL,
  `Genre_ID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tv_series_genre`
--

INSERT INTO `tv_series_genre` (`Series_ID`, `Genre_ID`) VALUES
(100002, 600001),
(100002, 600002),
(100002, 600003),
(100002, 600004),
(100004, 600001),
(100004, 600003),
(100004, 600004),
(100004, 600005),
(100003, 600008),
(100005, 600008),
(100001, 600002);

-- --------------------------------------------------------

--
-- Table structure for table `viewhistory`
--

CREATE TABLE `viewhistory` (
  `History_ID` int(11) NOT NULL,
  `Series_ID` int(6) NOT NULL,
  `Member_ID` int(11) NOT NULL,
  `view_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `viewhistory`
--

INSERT INTO `viewhistory` (`History_ID`, `Series_ID`, `Member_ID`, `view_date`) VALUES
(9, 100004, 1000000001, '2021-06-27'),
(10, 100002, 1000000001, '2021-06-27'),
(11, 100001, 1000000001, '2021-06-27'),
(12, 100001, 1000000001, '2021-06-27'),
(13, 100001, 1000000001, '2021-06-27'),
(14, 100004, 1000000001, '2021-06-27'),
(15, 100004, 1000000001, '2021-06-27'),
(16, 100004, 1000000001, '2021-06-27'),
(17, 100004, 1000000001, '2021-06-27'),
(18, 100002, 1000000001, '2021-06-27'),
(19, 100003, 1000000001, '2021-06-27'),
(20, 100002, 1000000001, '2021-06-27'),
(21, 100005, 1000000001, '2021-06-27'),
(22, 100004, 1000000001, '2021-06-28'),
(23, 100003, 1000000001, '2021-06-28'),
(24, 100003, 1000000001, '2021-06-28'),
(25, 100001, 1000000001, '2021-07-01'),
(26, 100001, 1000000001, '2021-07-03'),
(27, 100001, 1000000001, '2021-07-03'),
(28, 100003, 1000000001, '2021-07-04'),
(29, 100003, 1000000001, '2021-07-04'),
(30, 100003, 1000000001, '2021-07-04'),
(31, 100003, 1000000001, '2021-07-04'),
(32, 100002, 1000000001, '2021-07-04'),
(33, 100003, 1000000001, '2021-07-04'),
(34, 100003, 1000000001, '2021-07-04'),
(35, 100003, 1000000001, '2021-07-04'),
(36, 100003, 1000000001, '2021-07-04'),
(37, 100003, 1000000001, '2021-07-05'),
(38, 100003, 1000000012, '2021-07-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Account_ID`),
  ADD KEY `Member_ID` (`Member_ID`);

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`Actor_ID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `award`
--
ALTER TABLE `award`
  ADD PRIMARY KEY (`Award_ID`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`Director_ID`);

--
-- Indexes for table `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`Episode_ID`),
  ADD KEY `Season_ID` (`Season_ID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`Genre_ID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Member_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_ID`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`Season_ID`),
  ADD KEY `Series_ID` (`Series_ID`);

--
-- Indexes for table `tv_series`
--
ALTER TABLE `tv_series`
  ADD PRIMARY KEY (`Series_ID`);

--
-- Indexes for table `tv_series_actor`
--
ALTER TABLE `tv_series_actor`
  ADD KEY `Actor_ID` (`Actor_ID`),
  ADD KEY `Series_ID` (`Series_ID`);

--
-- Indexes for table `tv_series_award`
--
ALTER TABLE `tv_series_award`
  ADD KEY `Award_ID` (`Award_ID`),
  ADD KEY `Serie_ID` (`Series_ID`);

--
-- Indexes for table `tv_series_director`
--
ALTER TABLE `tv_series_director`
  ADD KEY `Director_ID` (`Director_ID`),
  ADD KEY `Series_ID` (`Series_ID`);

--
-- Indexes for table `tv_series_genre`
--
ALTER TABLE `tv_series_genre`
  ADD KEY `Genre_ID` (`Genre_ID`),
  ADD KEY `Series_ID` (`Series_ID`);

--
-- Indexes for table `viewhistory`
--
ALTER TABLE `viewhistory`
  ADD PRIMARY KEY (`History_ID`),
  ADD KEY `Member_ID` (`Member_ID`),
  ADD KEY `Serie_ID` (`Series_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `Account_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10007;

--
-- AUTO_INCREMENT for table `actor`
--
ALTER TABLE `actor`
  MODIFY `Actor_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4039;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10003;

--
-- AUTO_INCREMENT for table `award`
--
ALTER TABLE `award`
  MODIFY `Award_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50010;

--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `Director_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=700009;

--
-- AUTO_INCREMENT for table `episode`
--
ALTER TABLE `episode`
  MODIFY `Episode_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30185;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `Genre_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=600009;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `Member_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000013;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `Season_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20021;

--
-- AUTO_INCREMENT for table `tv_series`
--
ALTER TABLE `tv_series`
  MODIFY `Series_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100006;

--
-- AUTO_INCREMENT for table `viewhistory`
--
ALTER TABLE `viewhistory`
  MODIFY `History_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`Member_ID`) REFERENCES `member` (`Member_ID`);

--
-- Constraints for table `episode`
--
ALTER TABLE `episode`
  ADD CONSTRAINT `episode_ibfk_1` FOREIGN KEY (`Season_ID`) REFERENCES `season` (`Season_ID`);

--
-- Constraints for table `season`
--
ALTER TABLE `season`
  ADD CONSTRAINT `season_ibfk_1` FOREIGN KEY (`Series_ID`) REFERENCES `tv_series` (`Series_ID`);

--
-- Constraints for table `tv_series_actor`
--
ALTER TABLE `tv_series_actor`
  ADD CONSTRAINT `tv_series_actor_ibfk_1` FOREIGN KEY (`Actor_ID`) REFERENCES `actor` (`Actor_ID`),
  ADD CONSTRAINT `tv_series_actor_ibfk_2` FOREIGN KEY (`Series_ID`) REFERENCES `tv_series` (`Series_ID`);

--
-- Constraints for table `tv_series_award`
--
ALTER TABLE `tv_series_award`
  ADD CONSTRAINT `tv_series_award_ibfk_1` FOREIGN KEY (`Award_ID`) REFERENCES `award` (`Award_ID`),
  ADD CONSTRAINT `tv_series_award_ibfk_2` FOREIGN KEY (`Series_ID`) REFERENCES `tv_series` (`Series_ID`);

--
-- Constraints for table `tv_series_director`
--
ALTER TABLE `tv_series_director`
  ADD CONSTRAINT `tv_series_director_ibfk_1` FOREIGN KEY (`Director_ID`) REFERENCES `director` (`Director_ID`),
  ADD CONSTRAINT `tv_series_director_ibfk_2` FOREIGN KEY (`Series_ID`) REFERENCES `tv_series` (`Series_ID`);

--
-- Constraints for table `tv_series_genre`
--
ALTER TABLE `tv_series_genre`
  ADD CONSTRAINT `tv_series_genre_ibfk_1` FOREIGN KEY (`Genre_ID`) REFERENCES `genre` (`Genre_ID`),
  ADD CONSTRAINT `tv_series_genre_ibfk_2` FOREIGN KEY (`Series_ID`) REFERENCES `tv_series` (`Series_ID`);

--
-- Constraints for table `viewhistory`
--
ALTER TABLE `viewhistory`
  ADD CONSTRAINT `viewhistory_ibfk_1` FOREIGN KEY (`Member_ID`) REFERENCES `member` (`Member_ID`),
  ADD CONSTRAINT `viewhistory_ibfk_2` FOREIGN KEY (`Series_ID`) REFERENCES `tv_series` (`Series_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

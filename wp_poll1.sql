-- Database
DROP DATABASE IF EXISTS wp_poll1;

-- CREATE DATABASE
CREATE DATABASE IF NOT EXISTS wp_poll1;

-- Use Database
USE wp_poll1;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poll_a`
--

CREATE TABLE `tbl_poll_a` (
  `aQuestionNumber` int(2) NOT NULL,
  `aResponse` varchar(250) NOT NULL,
  `aComment` varchar(250) DEFAULT NULL,
  `aResponse_Id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_poll_a`
--

INSERT INTO `tbl_poll_a` (`aQuestionNumber`, `aResponse`, `aComment`, `aResponse_Id`) VALUES
(11, 'Canada', 'I don\'t know', 9),
(11, 'Mexico', 'Cabo San Lucas', 10),
(11, 'Fiji', 'Turtle Island is our favorite', 11),
(11, 'Australia', 'Goondawindi', 12),
(11, 'Fiji', 'Octopus Island', 13),
(12, 'Bird', '', 14),
(1, 'Caucasian', 'Born in US', 15),
(2, 'greater than $200,000', '', 16),
(3, 'Instructors', 'Dawn', 17),
(5, 'Whitefish', 'best restaurants', 18),
(6, 'Wasabi', 'Sushi', 19),
(11, 'Canada', 'Lake Louise', 20),
(12, 'Dog', 'Prince', 21),
(1, 'African American', 'Born in Africa', 22),
(2, '$50,000 - $100,000', '', 23),
(3, 'Facilities', '', 24),
(5, 'Bigfork', '', 25),
(6, 'Tupelos', 'Cajun Penne Pasta', 26),
(11, 'Mexico', 'Cabo San Lucas', 27),
(12, 'Rodent', 'Squeaks', 28),
(1, 'Hispanic', '', 29),
(2, '$100,000 - $200,000', '', 30),
(3, 'Facilities', 'Mac lab', 31),
(5, 'Kalispell', '', 32),
(6, 'Tupelos', 'Chicken and Dumplings', 33),
(11, 'Fiji', '', 34),
(12, 'Bird', '', 35);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poll_q`
--

CREATE TABLE `tbl_poll_q` (
  `qQuestionNumber` int(2) NOT NULL,
  `qQuestion` varchar(250) NOT NULL,
  `qResponse1` varchar(50) NOT NULL,
  `qResponse2` varchar(50) NOT NULL,
  `qResponse3` varchar(50) NOT NULL,
  `qResponse4` varchar(50) NOT NULL,
  `qIncludeComment` tinyint(1) DEFAULT NULL,
  `qQuestion_Id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_poll_q`
--

INSERT INTO `tbl_poll_q` (`qQuestionNumber`, `qQuestion`, `qResponse1`, `qResponse2`, `qResponse3`, `qResponse4`, `qIncludeComment`, `qQuestion_Id`) VALUES
(11, 'What is your favorite country to visit?', 'Canada', 'Mexico', 'Fiji', 'Australia', NULL, 7),
(5, 'What is your Favorite town in Flathead Valley?', 'Kalispell', 'Whitefish', 'Bigfork', 'Columbia Falls', NULL, 9),
(6, 'What is your Favorite restaurant in Whitefish?', 'Tupelos', 'Mambos', 'Wasabi', 'Whitefish Lake Golf Restaurant', NULL, 11),
(12, 'What is your favorite pet?', 'Dog', 'Cat', 'Bird', 'Rodent', NULL, 13),
(1, 'Ethnicity', 'Caucasian', 'African American', 'Hispanic', 'Native American', NULL, 14),
(2, 'Household Income Level', 'less than $50,000', '$50,000 - $100,000', '$100,000 - $200,000', 'greater than $200,000', NULL, 16),
(3, 'Favorite thing about FVCC', 'Classes', 'Instructors', 'Dining Hall', 'Facilities', NULL, 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_poll_a`
--
ALTER TABLE `tbl_poll_a`
  ADD PRIMARY KEY (`aResponse_Id`);

--
-- Indexes for table `tbl_poll_q`
--
ALTER TABLE `tbl_poll_q`
  ADD PRIMARY KEY (`qQuestion_Id`),
  ADD UNIQUE KEY `QuestionNumber` (`qQuestionNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_poll_a`
--
ALTER TABLE `tbl_poll_a`
  MODIFY `aResponse_Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_poll_q`
--
ALTER TABLE `tbl_poll_q`
  MODIFY `qQuestion_Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

<!-- dbconnect.php file 
	 created by: Joyce Doorn 
	 date: 10/14/2018
	 Purpose:  Create a Poll -->
	 
<?php

/*

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

CREATE TABLE `tbl_poll_a` (
  `aQuestionNumber` int(2) NOT NULL,
  `aResponse` varchar(250) NOT NULL,
  `aComment` varchar(250) DEFAULT NULL,
  `aResponse_Id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `aResponse_Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_poll_q`
--
ALTER TABLE `tbl_poll_q`
  MODIFY `qQuestion_Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

*/
// connect to database
try
{

    $pdo = new PDO('mysql:host=127.0.0.1;dbname=wp_poll1','PollSite','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // only for educational purposes
    $dbstatus = "Good database connection<br>";

}
catch(PDOException $e)
{
    $dbstatus = 'Database connection failed<br>'.
                    $e->getMessage();
    $die();	
} 
SESSION_START();


?>
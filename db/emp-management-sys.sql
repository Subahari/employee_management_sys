-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 06:17 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emp-management-sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_reward`
--

CREATE TABLE `add_reward` (
  `RewardID` varchar(4) NOT NULL,
  `RewardTitle` varchar(50) NOT NULL,
  `EmployeeName` varchar(50) NOT NULL,
  `Year` varchar(20) NOT NULL,
  `RewardType` varchar(50) NOT NULL,
  `CurrentDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_reward`
--

INSERT INTO `add_reward` (`RewardID`, `RewardTitle`, `EmployeeName`, `Year`, `RewardType`, `CurrentDate`) VALUES
('R001', 'Best performance of the year 2020', 'Ravi Sekar', '2020', 'Gold', '2021-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `assign_project`
--

CREATE TABLE `assign_project` (
  `ProjectID` varchar(4) CHARACTER SET utf8 NOT NULL,
  `ProjectName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ProjectType` varchar(50) CHARACTER SET utf8 NOT NULL,
  `TeamMembers` varchar(200) CHARACTER SET utf8 NOT NULL,
  `DescriptionComments` varchar(200) CHARACTER SET utf8 NOT NULL,
  `DeadLine` date NOT NULL,
  `AssignDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_project`
--

INSERT INTO `assign_project` (`ProjectID`, `ProjectName`, `ProjectType`, `TeamMembers`, `DescriptionComments`, `DeadLine`, `AssignDate`) VALUES
('P003', 'Data entry for Lakmal private company', 'Data entry', 'Ravi Sekar', '15 days project', '2021-07-07', '2021-06-19'),
('P002', 'Web site develop for Tilko restaurant', 'Web development with HTML/CSS', 'Ravi Sekar,Mathu Joshap', '1 month project', '2021-09-12', '2021-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(7, 0, 'system is very customer friendly.Good ', 'Kalaa', '2021-06-25 10:45:58'),
(8, 0, 'Excellent employee management system.', 'sobi', '2021-06-25 10:47:46'),
(9, 0, 'Amazing system', 'Kavi', '2021-06-25 10:48:11'),
(10, 0, 'Nice platform', 'sivaaa', '2021-07-03 18:35:11'),
(11, 0, 'Nice platform', 'sivaa', '2021-07-03 18:35:34'),
(12, 0, 'Very awesome website', 'sobi', '2021-07-03 18:35:47'),
(13, 0, 'nice', 'sivaanu', '2021-07-08 17:07:26'),
(14, 0, 'when is your selection interview of it developer?', 'sivaanu', '2021-07-08 17:09:19'),
(15, 0, 'nice system.very user friendly', 'abivarthana', '2021-08-06 14:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `emp_registration`
--

CREATE TABLE `emp_registration` (
  `empid` varchar(5) CHARACTER SET utf8 NOT NULL,
  `title` varchar(10) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `nic` varchar(12) CHARACTER SET utf8 NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `emproll` varchar(100) CHARACTER SET utf8 NOT NULL,
  `department` varchar(100) CHARACTER SET utf8 NOT NULL,
  `appointment_date` date NOT NULL,
  `basic_salary` decimal(10,2) NOT NULL,
  `address` varchar(200) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 NOT NULL,
  `dob` date NOT NULL,
  `mobileno` varchar(10) CHARACTER SET utf8 NOT NULL,
  `homeno` varchar(10) CHARACTER SET utf8 NOT NULL DEFAULT '-',
  `civil_status` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ethnicity` varchar(100) CHARACTER SET utf8 NOT NULL,
  `religion` varchar(100) CHARACTER SET utf8 NOT NULL,
  `edu_level` varchar(100) CHARACTER SET utf8 NOT NULL,
  `work_experience` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '-',
  `photo` text CHARACTER SET utf8 NOT NULL,
  `cv` text CHARACTER SET utf8 NOT NULL,
  `bankname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `branch` varchar(100) CHARACTER SET utf8 NOT NULL,
  `acc_no` varchar(12) CHARACTER SET utf8 NOT NULL,
  `ec_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ec_relationship` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ec_mobileno` varchar(10) CHARACTER SET utf8 NOT NULL,
  `ec_homeno` varchar(10) CHARACTER SET utf8 NOT NULL,
  `ec_workno` varchar(10) CHARACTER SET utf8 NOT NULL,
  `usertype` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT 'emp'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_registration`
--

INSERT INTO `emp_registration` (`empid`, `title`, `firstname`, `lastname`, `email`, `nic`, `username`, `emproll`, `department`, `appointment_date`, `basic_salary`, `address`, `gender`, `dob`, `mobileno`, `homeno`, `civil_status`, `ethnicity`, `religion`, `edu_level`, `work_experience`, `photo`, `cv`, `bankname`, `branch`, `acc_no`, `ec_name`, `ec_relationship`, `ec_mobileno`, `ec_homeno`, `ec_workno`, `usertype`) VALUES
('EM001', 'Mr.', 'Ravi', 'Sekar', 'ravi@gmail.com', '918541010v', 'ravi', 'HR', 'HR', '2021-01-04', '40000.00', 'Colombo', 'Male', '1991-01-07', '0758541522', '', 'Single', 'Tamil', 'Hindu', 'Bcom', 'Manager at ESOFT', '448-Ravi_Sekar.png', '975-Ravi_Sekar.pdf', 'Bank of Ceylon', 'Jaffna', '7545125', 'Hashini', 'Wife', '0757845143', '0212245150', '', 'hr'),
('EM002', 'Miss.', 'Mathu', 'Joshap', 'mathu@gmail.com', '954512010v', 'mathu', 'Director', 'Finance', '2020-11-18', '45000.00', 'Mannar', 'Male', '1995-06-06', '0778541238', '', 'Single', 'Tamil', 'Hindu', 'BA', '', '82-Mathu_Joshap.jpeg', '624-Mathu_Joshap.pdf', 'Commercial Bank', 'Mannar', '854152130', 'Joshap', 'Father', '0757845452', '0212224588', '', 'emp'),
('EM003', 'Mr.', 'David', 'Silva', 'david@gmail.com', '967845012v', 'david', 'Assist-Manager', 'HR', '2021-06-25', '40000.00', 'Colombo', 'Male', '1996-06-03', '0754512520', '', 'Female', 'Sinhalese', 'Other', 'Bcom', '', '508-David_Silva.jpg', '364-David_Silva.pdf', 'Peoples Bank', 'Colombo', '754125630', 'Sachini', 'Wife', '0778546120', '', '', 'emp'),
('EM004', 'Mr.', 'Nowrin', 'Varma', 'nowrin@gmail.com', '19978541010v', 'nowrin', 'Manager', 'IT', '2021-06-16', '50000.00', 'Jaffna', 'Female', '1997-06-21', '0771234567', '', 'Male', 'Muslim', 'Other', 'BIT', '', '213-Nowrin_Varma.jpg', '514-Nowrin_Varma.pdf', 'Commercial Bank', 'Jaffna', '7845126', 'Varma', 'Father', '0778541235', '', '', 'emp'),
('EM005', 'Miss.', 'Abi', 'varma', 'abc@gmail.com', '995874123v', 'abi', 'HR', 'HR', '2021-01-07', '50000.00', 'temple road kandy', 'Female', '1999-07-10', '0779874561', '0213365412', 'Male', 'srilankan', 'Female', 'O/L', '', '792-Abi_varma.jpg', '100-Abi_varma.pdf', 'Bank of Ceylon', 'kandy', '160003541230', 'abi sivashakthi', 'wife', '0774856213', '0213654123', '0213336541', 'hr');

-- --------------------------------------------------------

--
-- Table structure for table `external_advertisement`
--

CREATE TABLE `external_advertisement` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `description` varchar(500) NOT NULL,
  `subject` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `external_advertisement`
--

INSERT INTO `external_advertisement` (`id`, `date`, `description`, `subject`) VALUES
(1, '2021-05-15 18:30:00', 'we are here by invited a interview coming on Monday.\r\nAll applicant should come in a formal dress on time at 9.00a.m.', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_ID` varchar(4) NOT NULL,
  `EmpID` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Rating` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Comments` varchar(1000) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feed_ID`, `EmpID`, `Date`, `Rating`, `Comments`) VALUES
('F001', 'EM001', '2021-06-19 12:06:29', '3', 'Good platform'),
('F002', 'EM003', '2021-06-20 22:06:12', '5', 'I love this platform. It is user friendly.'),
('F003', 'EM002', '2021-07-13 20:07:13', '4', 'Excellent Platform');

-- --------------------------------------------------------

--
-- Table structure for table `jobapplication`
--

CREATE TABLE `jobapplication` (
  `position` varchar(500) NOT NULL,
  `ID` int(5) NOT NULL,
  `title` char(5) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `civilstatus` varchar(100) NOT NULL,
  `address` varchar(50) NOT NULL,
  `district` varchar(25) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `qualification` varchar(25) NOT NULL,
  `adqualification` varchar(50) NOT NULL,
  `workexp` varchar(50) NOT NULL,
  `photo` text NOT NULL,
  `cv` text NOT NULL,
  `Apply Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobapplication`
--

INSERT INTO `jobapplication` (`position`, `ID`, `title`, `fname`, `lname`, `nic`, `birthday`, `gender`, `civilstatus`, `address`, `district`, `phone`, `email`, `qualification`, `adqualification`, `workexp`, `photo`, `cv`, `Apply Date`) VALUES
('IT HARDWARE,TECHNICAL SUPPORT', 54, 'Miss', 'Subahari ', 'rajah', '977730651v', '1997-09-29', 'Female', 'single', 'kopay south kopay', 'Kalutara', 774855658, 'subaharyk@gmail.com', 'Undergraduate', '', '', '', 'Subahari-_rajah.pdf', '2021-06-29 07:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `ID` int(5) NOT NULL,
  `Leave_ID` varchar(7) NOT NULL,
  `EmpID` varchar(5) NOT NULL,
  `Empname` varchar(200) NOT NULL,
  `LeaveType` varchar(25) NOT NULL,
  `FromDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `ToDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Duration` int(15) NOT NULL,
  `Description` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `AdminRemarkDate` timestamp NULL DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `ISRead` int(1) NOT NULL,
  `username` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`ID`, `Leave_ID`, `EmpID`, `Empname`, `LeaveType`, `FromDate`, `ToDate`, `Duration`, `Description`, `PostingDate`, `AdminRemark`, `AdminRemarkDate`, `Status`, `ISRead`, `username`) VALUES
(1, 'LEV0001', 'EM001', 'Mr. Ravi Sekar', 'Medical leave', '2021-06-21 18:30:00', '2021-06-24 18:30:00', 3, 'Fever', '2021-06-19 09:28:02', 'I approved.', '2021-06-19 09:29:28', 1, 1, 'ravi'),
(2, 'LEV0002', 'EM002', 'Miss. Mathu Joshap', 'Casual leave', '2021-06-23 18:30:00', '2021-06-24 18:30:00', 1, 'Relations Wedding', '2021-06-19 09:34:32', 'You have some more pending work. ', '2021-06-20 15:14:04', 2, 1, 'mathu'),
(3, 'LEV0003', 'EM003', 'Mr. David Silva', 'Medical leave', '2021-06-20 18:30:00', '2021-06-22 18:30:00', 2, 'Got fever', '2021-06-20 15:07:32', '0', NULL, 0, 1, 'david');

-- --------------------------------------------------------

--
-- Table structure for table `loan_applicants`
--

CREATE TABLE `loan_applicants` (
  `la_id` varchar(5) CHARACTER SET utf8 NOT NULL,
  `empid` varchar(5) CHARACTER SET utf8 NOT NULL,
  `loan_id` varchar(5) CHARACTER SET utf8 NOT NULL,
  `my_purpose` varchar(100) CHARACTER SET utf8 NOT NULL,
  `loan_amount` decimal(10,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `repayment` varchar(100) CHARACTER SET utf8 NOT NULL,
  `emi` float(10,2) NOT NULL,
  `documents` text CHARACTER SET utf8 NOT NULL,
  `date_of_apply` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT 'Waiting For Approval',
  `update_status_reason` varchar(300) CHARACTER SET utf8 NOT NULL DEFAULT 'Your application is being checked.',
  `update_status_count` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_applicants`
--

INSERT INTO `loan_applicants` (`la_id`, `empid`, `loan_id`, `my_purpose`, `loan_amount`, `duration`, `repayment`, `emi`, `documents`, `date_of_apply`, `status`, `update_status_reason`, `update_status_count`) VALUES
('LA002', 'EM001', 'L001', 'buy new house', '600000.00', 12, 'Reducing installments', 7521.33, '944-Ravi.zip', '2021-05-29 12:05:21', 'Approved', 'Your documents are perfect.', 1),
('LA003', 'EM003', 'L003', 'For my higher studies', '200000.00', 3, 'Reducing installments', 6175.42, '787-David.zip', '2021-06-20 20:06:11', 'Waiting For Approval', 'Your application is being checked.', 0),
('LA001', 'EM002', 'L002', 'Buy new motorbike', '300000.00', 4, 'Reducing installments', 7253.67, '803-Mathu.rar', '2021-06-18 11:06:14', 'Rejected', 'Documents are not clear', 1),
('LA004', 'EM004', 'L004', 'Relations medical purpose', '300000.00', 5, 'Fixed installments', 7250.00, '350-Nowrin.rar', '2021-07-26 15:07:04', 'Waiting For Approval', 'Your application is being checked.', 0),
('LA005', 'EM002', 'L003', 'For higher stydy', '200000.00', 6, 'Fixed installments', 3944.44, '588-Mathu.zip', '2021-08-25 23:08:11', 'Approved', 'Your document are clear.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loan_borrowers`
--

CREATE TABLE `loan_borrowers` (
  `lb_id` varchar(5) CHARACTER SET utf8 NOT NULL,
  `la_id` varchar(5) CHARACTER SET utf8 NOT NULL,
  `tot_repayment_amount` float(10,2) NOT NULL,
  `no_of_month_available` int(11) NOT NULL,
  `available_repayment_amount` float(10,2) NOT NULL,
  `status` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_borrowers`
--

INSERT INTO `loan_borrowers` (`lb_id`, `la_id`, `tot_repayment_amount`, `no_of_month_available`, `available_repayment_amount`, `status`) VALUES
('LB002', 'LA003', 222315.12, 31, 191438.02, 'Process'),
('LB001', 'LA002', 1083071.50, 138, 1037943.38, 'Process'),
('LB003', 'LA005', 283999.69, 72, 283999.69, 'Process');

-- --------------------------------------------------------

--
-- Table structure for table `loan_details`
--

CREATE TABLE `loan_details` (
  `loan_id` varchar(4) CHARACTER SET utf8 NOT NULL,
  `loan_type` varchar(50) CHARACTER SET utf8 NOT NULL,
  `loan_purpose` varchar(200) CHARACTER SET utf8 NOT NULL,
  `max_loan_amount` int(11) NOT NULL,
  `interest_rate` float(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_details`
--

INSERT INTO `loan_details` (`loan_id`, `loan_type`, `loan_purpose`, `max_loan_amount`, `interest_rate`) VALUES
('L001', 'Home Loan', '    Housing, purchase of land, construction                ', 1000000, 11.50),
('L002', 'Vehicle Loan', '  Vehicle        ', 550000, 7.50),
('L003', 'Education Loan', '   For higher education   ', 300000, 7.00),
('L004', 'Personal loan', '  For your personal   ', 650000, 9.00);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_payment`
--

CREATE TABLE `monthly_payment` (
  `empid` varchar(5) CHARACTER SET utf8 NOT NULL,
  `month_year` varchar(7) CHARACTER SET utf8 NOT NULL,
  `living_host` float(10,2) NOT NULL,
  `food` float(10,2) NOT NULL,
  `holiday_pay` float(10,2) NOT NULL,
  `total_earning` float(10,2) NOT NULL,
  `overtime` float(10,2) NOT NULL,
  `performance` float(10,2) NOT NULL,
  `loan_repayment` float(10,2) NOT NULL,
  `epf_8` float(10,2) NOT NULL,
  `net_salary` float(10,2) NOT NULL,
  `epf_12` float(10,2) NOT NULL,
  `epf_20` float(10,2) NOT NULL,
  `etf` float(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monthly_payment`
--

INSERT INTO `monthly_payment` (`empid`, `month_year`, `living_host`, `food`, `holiday_pay`, `total_earning`, `overtime`, `performance`, `loan_repayment`, `epf_8`, `net_salary`, `epf_12`, `epf_20`, `etf`) VALUES
('EM001', '2021-03', 1500.00, 1500.00, 1000.00, 44000.00, 500.00, 0.00, 7521.33, 3520.00, 33458.67, 5280.00, 8800.00, 1320.00),
('EM001', '2021-07', 1200.00, 1500.00, 500.00, 43200.00, 600.00, 500.00, 7521.33, 3456.00, 33322.67, 5184.00, 8640.00, 1296.00),
('EM002', '2021-07', 1200.00, 1000.00, 500.00, 47700.00, 100.00, 0.00, 0.00, 3816.00, 43984.00, 5724.00, 9540.00, 1431.00),
('EM003', '2021-07', 1200.00, 1100.00, 500.00, 42800.00, 200.00, 0.00, 6175.42, 3424.00, 33400.58, 5136.00, 8560.00, 1284.00),
('EM004', '2021-07', 750.00, 800.00, 300.00, 51850.00, 0.00, 0.00, 0.00, 4148.00, 47702.00, 6222.00, 10370.00, 1555.50),
('EM002', '2021-06', 1150.00, 800.00, 400.00, 47350.00, 0.00, 0.00, 0.00, 3788.00, 43562.00, 5682.00, 9470.00, 1420.50),
('EM003', '2021-06', 900.00, 1000.00, 500.00, 42400.00, 550.00, 500.00, 6175.42, 3392.00, 33882.58, 5088.00, 8480.00, 1272.00),
('EM004', '2021-06', 600.00, 700.00, 500.00, 51800.00, 0.00, 0.00, 0.00, 4144.00, 47656.00, 6216.00, 10360.00, 1554.00),
('EM001', '2021-06', 600.00, 700.00, 500.00, 41800.00, 0.00, 0.00, 7521.33, 3344.00, 30934.67, 5016.00, 8360.00, 1254.00),
('EM002', '2021-03', 450.00, 800.00, 400.00, 46650.00, 200.00, 0.00, 0.00, 3732.00, 43118.00, 5598.00, 9330.00, 1399.50),
('EM004', '2021-03', 700.00, 820.00, 600.00, 52120.00, 0.00, 0.00, 0.00, 4169.60, 47950.40, 6254.40, 10424.00, 1563.60),
('EM002', '2021-05', 1000.00, 800.00, 300.00, 47100.00, 200.00, 0.00, 0.00, 3768.00, 43532.00, 5652.00, 9420.00, 1413.00),
('EM003', '2021-05', 1000.00, 700.00, 300.00, 42000.00, 0.00, 0.00, 6175.42, 3360.00, 32464.58, 5040.00, 8400.00, 1260.00),
('EM004', '2021-05', 1000.00, 900.00, 300.00, 52200.00, 0.00, 0.00, 0.00, 4176.00, 48024.00, 6264.00, 10440.00, 1566.00),
('EM001', '2021-04', 600.00, 800.00, 300.00, 41700.00, 500.00, 0.00, 7521.33, 3336.00, 31342.67, 5004.00, 8340.00, 1251.00),
('EM002', '2021-04', 800.00, 650.00, 300.00, 46750.00, 0.00, 0.00, 0.00, 3740.00, 43010.00, 5610.00, 9350.00, 1402.50),
('EM002', '2021-02', 700.00, 600.00, 300.00, 46600.00, 0.00, 0.00, 0.00, 3728.00, 42872.00, 5592.00, 9320.00, 1398.00),
('EM001', '2021-05', 1100.00, 1100.00, 500.00, 42700.00, 1500.00, 500.00, 7521.33, 3416.00, 33762.67, 5124.00, 8540.00, 1281.00);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `email`, `token`) VALUES
(1, 'tjani2697@gmail.com', '5a5759093841372cf2e91bee46d428e96a1a30b064f4c95ea863eda14883daa1c504d86cf8a3e7153c2451e27c48c77aff91'),
(6, 'tjani2697@gmail.com', '1eff552e01bd4a285265d60cd696992db7e4295e66d79b62f8c811b1ff9e893c7e974ea82fa60a9ae573221aa61ecea64e41'),
(7, 'tjani2697@gmail.com', '6983ad88bfb1d10d0c0aa2efd101b44bbaeacc846c02b00c4704bc6712d9e57719304458d4a9bc77474e4391cec841d3a59d'),
(8, 'ravi@gmail.com', '9cc68f33fcb5672079fd3f11e7887a2b0013230e49b916114f50c0a042cef0cfe4d8959649c74f95eed81d1c51832777f9eb'),
(2, 'tjani2697@gmail.com', 'a16dfb2dda1c278701180a2d0ca5ec8cf2fe1354f7b21e581d2fe4ac6c34f2c60d30742c3cdf6a8178d1e9ef31c0b45e8c23'),
(35, 'ravi@gmail.com', '6b4dd769cb13b31305d21c3e41ef0d9ee3b8a54880af8830e5700cfc8b6f059cd52bf64fc537a529fc3427dfe9a094f0ecc8');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(100) NOT NULL,
  `empid` varchar(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` int(4) NOT NULL,
  `pay_amount` decimal(10,2) NOT NULL,
  `Discription` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `empid`, `username`, `month`, `year`, `pay_amount`, `Discription`) VALUES
(4, 'EM002', 'mathu', 'July', 2021, '45000.00', 'Setteled'),
(5, 'EM001', 'ravi', 'July', 2021, '30000.00', 'With loan amount reduced'),
(6, 'EM002', 'mathu', 'June', 2021, '50000.00', 'setteled'),
(7, 'EM001', 'ravi', 'June', 2021, '45000.00', 'Setteled'),
(8, 'EM002', 'mathu', 'May', 2021, '30000.00', 'setteled'),
(10, 'EM002', 'mathu', 'March', 2021, '25000.00', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `project_submission`
--

CREATE TABLE `project_submission` (
  `ProjectID` varchar(4) NOT NULL,
  `ProjectName` varchar(50) NOT NULL,
  `Deadline` date NOT NULL,
  `doc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_submission`
--

INSERT INTO `project_submission` (`ProjectID`, `ProjectName`, `Deadline`, `doc`) VALUES
('P002', 'Web site develop for Tilko restaurant', '2021-09-12', 'Web-site-develop-for-Tilko-restaurant.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(4) CHARACTER SET utf8 NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `usertype` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT 'emp',
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `token` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `usertype`, `verified`, `token`, `password`) VALUES
('1', 'admin', 'tjani2697@gmail.com', 'admin', 1, '2c2bc093b719a95b9555f66751ea0accba9f4b548dbfad129887e9af83ee954d608a553e96d3ab73dc8743f12aea16ec4db4', '$2y$10$W9rh8/oUnJQksLzbRFzeBubmPjHHquxE.qHrMTrSoo0nsm0T1XtjG'),
('U001', 'ravi', 'ravi@gmail.com', 'hr', 0, '3fa462fcc24effec419832a1a258237d06347507b6ec55dace009b36cc5d4ded3278e87668363087085adeafc50a4e8274c8', '$2y$10$igcI4kTqWYaF/oXENv2EYOX.LwvAVMG56rumRUh8mKqe9ZHh1g4BO'),
('U002', 'mathu', 'mathu@gmail.com', 'emp', 0, 'c2006011d25fd905a314f33fca3a21eed2534a77c69ffdc9ed125bf920c194533aa1447f6a0b1c697d04ff2f78ddca4bed30', '$2y$10$VvE5Jn9irR3jYhwq0MZ0c.1WyNsLVYmNu79ZCzZxgkRaP3qIwPanG'),
('U003', 'david', 'david@gmail.com', 'emp', 0, '332b46d57f84c095084e969bfe32e5b9a9aa9d7d9c848df16561d6f86a70eb246358458d3e3e073e1fbc4dfe3c9c4f6be092', '$2y$10$om3sX1OFgs9/SjYZu0/R7eJ.lcOgdBFD7irwPHaA3vVQH2Ba5oKLy'),
('U004', 'nowrin', 'nowrin@gmail.com', 'emp', 0, 'e93e273c02f0c4c4ced06afc96ac7be9c85775c65c969e7431a2462569aa49fe1372faedb2fe7bbd14b7f873887c3ab39072', '$2y$10$PVn51LZmhy7VMYuQmkRkzedqmNIPfIaXZ.a5Rr5BDeA7l2eQ5h2We'),
('U005', 'abi', 'abc@gmail.com', 'hr', 0, '617e710e8fb06c8cdb056fc63fbb9372f6689de16ab8ebc98e26af578da86e28006111dcc5d6c678179a74df136e12642170', '$2y$10$0/P9LCaiLNh.q2ZaPMuhGOyfdYMNMXZAIrqMsj4ljULyFaQzs7dwy');

-- --------------------------------------------------------

--
-- Table structure for table `vacany_add`
--

CREATE TABLE `vacany_add` (
  `Id` int(11) NOT NULL,
  `dateposted` timestamp NOT NULL DEFAULT current_timestamp(),
  `designation` varchar(50) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `jobtype` varchar(50) NOT NULL,
  `closingdate` date NOT NULL,
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacany_add`
--

INSERT INTO `vacany_add` (`Id`, `dateposted`, `designation`, `experience`, `qualification`, `jobtype`, `closingdate`, `contact`) VALUES
(33, '2021-06-17 17:20:07', 'Senior Developer', 'Fresher', 'B.sc IT', 'FullTime', '2021-10-30', 778541236),
(38, '2021-06-20 17:18:03', 'IT HARDWARE,TECHNICAL SUPPORT', 'Fresher', 'Any Graduate in Any Specialization. Post Graduatio', 'FullTime', '2021-06-29', 775241369),
(39, '2021-06-21 15:28:33', 'DOT NET,MVC & JQUERY', 'Fresher', 'B.sc IT', 'FullTime', '2021-06-29', 775241369);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `emp_registration`
--
ALTER TABLE `emp_registration`
  ADD PRIMARY KEY (`empid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `nic` (`nic`);

--
-- Indexes for table `external_advertisement`
--
ALTER TABLE `external_advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_ID`);

--
-- Indexes for table `jobapplication`
--
ALTER TABLE `jobapplication`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`Leave_ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `loan_applicants`
--
ALTER TABLE `loan_applicants`
  ADD PRIMARY KEY (`la_id`);

--
-- Indexes for table `loan_borrowers`
--
ALTER TABLE `loan_borrowers`
  ADD PRIMARY KEY (`lb_id`),
  ADD UNIQUE KEY `la_id` (`la_id`);

--
-- Indexes for table `loan_details`
--
ALTER TABLE `loan_details`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `monthly_payment`
--
ALTER TABLE `monthly_payment`
  ADD PRIMARY KEY (`empid`,`month_year`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`token`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vacany_add`
--
ALTER TABLE `vacany_add`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `external_advertisement`
--
ALTER TABLE `external_advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `jobapplication`
--
ALTER TABLE `jobapplication`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vacany_add`
--
ALTER TABLE `vacany_add`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

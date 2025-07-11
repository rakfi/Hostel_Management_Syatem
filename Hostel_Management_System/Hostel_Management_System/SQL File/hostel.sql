-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2025 at 12:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `reg_date`, `updation_date`) VALUES
(1, 'rakfi', 'admin@rakfi.com', 'rakfi@1995', '2024-01-31 20:31:45', '2024-01-01');
-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `id` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `ip` varbinary(16) NOT NULL,
  `logintime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complainthistory`
--

CREATE TABLE `complainthistory` (
  `id` int(11) NOT NULL,
  `complaintid` int(11) DEFAULT NULL,
  `compalintStatus` varchar(255) DEFAULT NULL,
  `complaintRemark` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complainthistory`
--

INSERT INTO `complainthistory` (`id`, `complaintid`, `compalintStatus`, `complaintRemark`, `postingDate`) VALUES
(1, 2, 'In Process', 'Technician assigned for water leakage.', '2025-01-18 09:45:00'),
(2, 3, 'Resolved', 'Repaired fan, working fine now.', '2025-01-20 15:30:00'),
(3, 4, 'In Process', 'Plumber dispatched for pipe issue.', '2025-01-19 13:20:00'),
(4, 5, 'Pending', 'Waiting for approval to change air conditioning unit.', '2025-01-21 10:00:00'),
(5, 6, 'Closed', 'Flooring fixed, issue resolved.', '2025-01-20 17:15:00'),
(6, 7, 'In Process', 'Carpenter on-site for door repair.', '2025-01-19 11:30:00');


-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `ComplainNumber` bigint(12) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `complaintType` varchar(255) DEFAULT NULL,
  `complaintDetails` mediumtext DEFAULT NULL,
  `complaintDoc` varchar(255) DEFAULT NULL,
  `complaintStatus` varchar(255) DEFAULT NULL,
  `registrationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `ComplainNumber`, `userId`, `complaintType`, `complaintDetails`, `complaintDoc`, `complaintStatus`, `registrationDate`) VALUES
(1, 389685413, 5, 'Electrical', 'Power outage in the living room.', NULL, 'Closed', '2025-01-14 11:10:24'),
(2, 389685414, 7, 'Plumbing', 'Leaking pipe in the kitchen.', NULL, 'In Process', '2025-01-15 12:05:30'),
(3, 389685415, 3, 'HVAC', 'Air conditioner not cooling properly.', NULL, 'Pending', '2025-01-16 14:25:10'),
(4, 389685416, 9, 'Electrical', 'Ceiling fan malfunctioning.', NULL, 'In Process', '2025-01-17 16:40:05');


-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `course_sn` varchar(255) DEFAULT NULL,
  `course_fn` varchar(255) DEFAULT NULL,
  `posting_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_code`, `course_sn`, `course_fn`, `posting_date`) VALUES
(1, 'B10123', 'B.Tech', 'Bachelor of Technology in Computer Science', '2025-01-01 19:31:42'),
(2, 'BCOM2101', 'B.Com', 'Bachelor of Commerce in Accounting', '2025-01-02 10:20:30'),
(3, 'BSC345', 'B.Sc', 'Bachelor of Science in Physics', '2025-01-02 12:45:55'),
(4, 'BCA9001', 'BCA', 'Bachelor of Computer Applications in IT', '2025-01-02 15:00:00'),
(5, 'MCA1200', 'MCA', 'Master of Computer Applications in Data Science', '2025-01-02 18:30:10'),
(6, 'MBA435', 'MBA', 'Master of Business Administration in Marketing', '2025-01-02 20:15:25'),
(7, 'BE808', 'BE', 'Bachelor of Engineering in Electronics and Communication', '2025-01-02 22:40:45');


-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `AccessibilityWarden` varchar(255) DEFAULT NULL,
  `AccessibilityMember` varchar(255) DEFAULT NULL,
  `RedressalProblem` varchar(255) DEFAULT NULL,
  `Room` varchar(255) DEFAULT NULL,
  `Mess` varchar(255) DEFAULT NULL,
  `HostelSurroundings` varchar(255) DEFAULT NULL,
  `OverallRating` varchar(255) DEFAULT NULL,
  `FeedbackMessage` varchar(255) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `postinDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `AccessibilityWarden`, `AccessibilityMember`, `RedressalProblem`, `Room`, `Mess`, `HostelSurroundings`, `OverallRating`, `FeedbackMessage`, `userId`, `postinDate`) VALUES
(1, 'Excellent', 'Good', 'Outstanding', 'Satisfactory', 'Good', 'Below Average', 'Very Good', 'N/A', 4, '2025-01-14 12:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `roomno` int(11) DEFAULT NULL,
  `seater` int(11) DEFAULT NULL,
  `feespm` int(11) DEFAULT NULL,
  `foodstatus` int(11) DEFAULT NULL,
  `stayfrom` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `course` varchar(500) DEFAULT NULL,
  `regno` int(11) DEFAULT NULL,
  `firstName` varchar(500) DEFAULT NULL,
  `middleName` varchar(500) DEFAULT NULL,
  `lastName` varchar(500) DEFAULT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `emailid` varchar(500) DEFAULT NULL,
  `egycontactno` bigint(11) DEFAULT NULL,
  `guardianName` varchar(500) DEFAULT NULL,
  `guardianRelation` varchar(500) DEFAULT NULL,
  `guardianContactno` bigint(11) DEFAULT NULL,
  `corresAddress` varchar(500) DEFAULT NULL,
  `corresCIty` varchar(500) DEFAULT NULL,
  `corresState` varchar(500) DEFAULT NULL,
  `corresPincode` int(11) DEFAULT NULL,
  `pmntAddress` varchar(500) DEFAULT NULL,
  `pmntCity` varchar(500) DEFAULT NULL,
  `pmnatetState` varchar(500) DEFAULT NULL,
  `pmntPincode` int(11) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `roomno`, `seater`, `feespm`, `foodstatus`, `stayfrom`, `duration`, `course`, `regno`, `firstName`, `middleName`, `lastName`, `gender`, `contactno`, `emailid`, `egycontactno`, `guardianName`, `guardianRelation`, `guardianContactno`, `corresAddress`, `corresCIty`, `corresState`, `corresPincode`, `pmntAddress`, `pmntCity`, `pmnatetState`, `pmntPincode`, `postingDate`, `updationDate`) VALUES
(2, 101, 4, 8500, 0, '2025-01-10', 5, 'Bachelor of Engineering', 10806125, 'Ravi', 'Kumar', 'Sharma', 'male', 9876543210, 'ravi.sharma@gmail.com', 1122334455, 'Suresh Kumar', 'Father', 9988776655, 'H-101, A Block', 'Mumbai', 'Maharashtra', 400001, 'H-101, A Block', 'Mumbai', 'Maharashtra', 400001, '2025-01-05 15:45:00', NULL),
(3, 201, 3, 6500, 1, '2025-01-12', 8, 'Bachelor of Computer Applications', 108061239, 'Maria', 'Jose', 'Fernandes', 'female', 1234578901, 'maria.jose@gmail.com', 2233445566, 'Victor Fernandes', 'Brother', 3344556677, 'Flat 402, Silver Heights', 'Bangalore', 'Karnataka', 560001, 'Flat 402, Silver Heights', 'Bangalore', 'Karnataka', 560001, '2025-01-05 16:00:00', NULL),
(4, 202, 3, 6100, 1, '2025-01-09', 6, 'Bachelor of Arts', 108061122, 'Sia', '', 'Kapoor', 'female', 1425364789, 'sia.kapoor@gmail.com', 4561237890, 'Raj Kapoor', 'Mother', 1234567891, 'Plot 34, Green Avenue', 'Chennai', 'Tamil Nadu', 600100, 'Plot 34, Green Avenue', 'Chennai', 'Tamil Nadu', 600100, '2025-01-05 16:15:30', NULL),
(5, 103, 4, 7700, 0, '2025-01-17', 7, 'Bachelor of Science', 14563289, 'Nisha', '', 'Gupta', 'female', 8956234785, 'nisha.gupta@gmail.com', 7845123456, 'Prakash Gupta', 'Guardian', 5623894567, 'D-115, Shivaji Enclave', 'Delhi', 'Delhi (NCT)', 110027, 'D-115, Shivaji Enclave', 'Delhi', 'Delhi (NCT)', 110027, '2025-01-05 16:30:00', NULL),
(6, 133, 6, 2100, 1, '2025-01-16', 9, 'Master of Business Administration', 14563278, 'Karan', 'Raj', 'Singh', 'male', 9632587412, 'karan.singh123@gmail.com', 8563145789, 'Vikram Singh', 'Uncle', 4563245678, 'C-22, Mayur Vihar', 'Noida', 'Uttar Pradesh', 201301, 'C-22, Mayur Vihar', 'Noida', 'Uttar Pradesh', 201301, '2025-01-05 16:45:00', NULL);


-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `seater` int(11) DEFAULT NULL,
  `room_no` int(11) DEFAULT NULL,
  `fees` int(11) DEFAULT NULL,
  `posting_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `seater`, `room_no`, `fees`, `posting_date`) VALUES
(1, 5, 100, 8000, '2025-01-01 22:45:43'),
(2, 2, 201, 6000, '2025-01-01 22:45:43'),
(3, 2, 200, 6000, '2025-01-01 22:45:43'),
(4, 3, 112, 4000, '2025-01-01 22:45:43'),
(5, 5, 132, 2000, '2025-01-01 22:45:43'),
(6, 3, 145, 3000, '2025-01-01 22:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `State` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `State`) VALUES
(1, 'Western Province'),
(2, 'Central Province'),
(3, 'Southern Province'),
(4, 'Northern Province'),
(5, 'Eastern Province'),
(6, 'North Western Province'),
(7, 'North Central Province'),
(8, 'Uva Province'),
(9, 'Sabaragamuwa Province'),
(10, 'Western Province (Colombo)'),
(11, 'Kandy District'),
(12, 'Galle District'),
(13, 'Matara District'),
(14, 'Jaffna District'),
(15, 'Anuradhapura District'),
(16, 'Gampaha District'),
(17, 'Ratnapura District'),
(18, 'Kurunegala District'),
(19, 'Trincomalee District'),
(20, 'Mannar District'),
(21, 'Colombo District'),
(22, 'Batticaloa District'),
(23, 'Vavuniya District'),
(24, 'Kalutara District'),
(25, 'Polonnaruwa District'),
(26, 'Mullaitivu District'),
(27, 'Matale District'),
(28, 'Nuwara Eliya District'),
(29, 'Kegalle District'),
(30, 'Ampara District');

-- --------------------------------------------------------

-- Table structure for table `userlog`

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userIp` varbinary(16) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table `userlog`

INSERT INTO `userlog` (`id`, `userId`, `userEmail`, `userIp`, `city`, `country`, `loginTime`) VALUES
(1, 5, 'janith@gmail.com', 0x3132372e302e302e33, 'Colombo', 'Sri Lanka', '2025-01-14 12:00:00');

-- --------------------------------------------------------

-- Table structure for table `userregistration`

CREATE TABLE `userregistration` (
  `id` int(11) NOT NULL,
  `regNo` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `contactNo` bigint(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(45) DEFAULT NULL,
  `passUdateDate` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table `userregistration`

INSERT INTO `userregistration` (`id`, `regNo`, `firstName`, `middleName`, `lastName`, `gender`, `contactNo`, `email`, `password`, `regDate`, `updationDate`, `passUdateDate`) VALUES
(3, '10806122', 'Janith', 'Kumara', 'Perera', 'male', 7776543210, 'janith.perera@gmail.com', 'Secure@456', '2025-01-02 15:30:00', NULL, NULL),
(4, '108061234', 'Nadeesha', 'Nuwan', 'Gunasekara', 'female', 7665432109, 'nadeesha.gunasekara@gmail.com', 'Password@321', '2025-01-02 15:30:00', NULL, NULL),
(5, 'BE124', 'Chamal', 'Nimal', 'Jayasinghe', 'male', 7123456789, 'chamal.jayasinghe@gmail.com', 'Chamal@123', '2025-01-02 15:30:00', NULL, NULL),
(6, '14563214', 'Dhanushka', 'Perera', 'Kumara', 'male', 7187654321, 'dhanushka.perera@gmail.com', 'Dhanushka@789', '2025-01-02 15:30:00', '17-04-2024 10:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complainthistory`
--
ALTER TABLE `complainthistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_no` (`room_no`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userregistration`
--
ALTER TABLE `userregistration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complainthistory`
--
ALTER TABLE `complainthistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

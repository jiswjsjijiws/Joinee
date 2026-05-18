-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2026 at 06:10 AM
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
-- Database: `joinee`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendanceID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendanceID`, `userID`, `eventID`) VALUES
(1, 11, 8),
(2, 11, 4),
(3, 11, 12),
(4, 11, 13),
(5, 11, 14),
(7, 18, 16),
(8, 18, 19),
(9, 18, 21),
(10, 18, 22),
(11, 20, 23);

-- --------------------------------------------------------

--
-- Table structure for table `attendance_code`
--

CREATE TABLE `attendance_code` (
  `codeID` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `eventID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance_code`
--

INSERT INTO `attendance_code` (`codeID`, `code`, `eventID`) VALUES
(3, 256, 8),
(4, 221, 8),
(5, 842, 4),
(8, 878, 13),
(15, 698, 22);

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `badgeID` int(11) NOT NULL,
  `badgeIcon` varchar(50) NOT NULL,
  `points` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`badgeID`, `badgeIcon`, `points`, `description`, `title`) VALUES
(13, 'gold.png', 200, 'wdw', 'a'),
(14, 'silver.png', 344, 'efef', 'b'),
(15, 'bronze.png', 80, 'haha', 'cd'),
(16, 'gold.png', 1, 'ee', 'e'),
(17, 'bronze.png', 70, 'finale\r\n', 'final badge');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `category` enum('Waste and Recycling','Food and Entertainment','Education','Green Businesses','Community and Nature','Other') NOT NULL,
  `capacity` int(11) NOT NULL,
  `location` varchar(500) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `points` int(11) NOT NULL,
  `status` enum('accepted','rejected','pending') NOT NULL,
  `checklist` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `userID`, `title`, `description`, `category`, `capacity`, `location`, `time`, `date`, `points`, `status`, `checklist`) VALUES
(2, 9, 'rr', 'rr', 'Education', 3, 'rr', '03:48:00', '2025-12-30', 333, 'rejected', 'There will be recycling bins placed at the event venue'),
(3, 9, 'tt', 'tt', 'Waste and Recycling', 4, 'tt', '03:49:00', '2026-01-31', 34, 'accepted', 'Plastics will be replaced with reusable or biodegradable materials'),
(4, 9, 'checking', 'xs', 'Green Businesses', 44, 'cn tower', '02:33:00', '2026-02-12', 34, 'accepted', 'There will be recycling bins placed at the event venue'),
(5, 9, 'event1', 'a', 'Waste and Recycling', 10, 'apu', '14:44:00', '2026-02-02', 99, 'pending', 'Plastics will be replaced with reusable or biodegradable materials, Waste or food leftover will be composted, Electronics used during the event will be turned off when not in use'),
(6, 9, 'event 20', 'fcf', 'Waste and Recycling', 4, 'cn tower', '16:43:00', '2026-02-26', 33, 'pending', 'This event is a sustainable event'),
(7, 9, 'event 3', 'tft', 'Other', 54, 'dd', '14:46:00', '2026-02-21', 77, 'rejected', 'Plastics will be replaced with reusable or biodegradable materials, Waste or food leftover will be composted, Electronics used during the event will be turned off when not in use'),
(8, 9, 'event 4', 'this is event 4', 'Waste and Recycling', 544, 'cn tower', '15:45:00', '2026-02-19', 644, 'accepted', 'There will be recycling bins placed at the event venue, Plastics will be replaced with reusable or biodegradable materials'),
(11, 13, 'ed', 'k', 'Waste and Recycling', 1000000, 'batu caves', '23:57:00', '2026-03-28', 88, 'accepted', 'Plastics will be replaced with reusable or biodegradable materials'),
(12, 14, 'c and n event', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Community and Nature', 200, 'ijj', '12:30:00', '2026-02-14', 99, 'accepted', 'Plastics will be replaced with reusable or biodegradable materials, Waste or food leftover will be composted'),
(13, 14, 'gb evebt', 'dcd', 'Green Businesses', 10, 'dd', '00:33:00', '2026-03-20', 9, 'accepted', 'Plastics will be replaced with reusable or biodegradable materials, Waste or food leftover will be composted'),
(14, 14, 'an', 'l', 'Waste and Recycling', 9000, 'apu', '11:05:00', '2026-03-20', 9900, 'accepted', ''),
(16, 17, 'My Third Event', 'tt', 'Green Businesses', 6, 'yh', '23:49:00', '2026-02-27', 77, 'accepted', 'Plastics will be replaced with reusable or biodegradable materials'),
(17, 17, 'My Fifth Event', 'ppap', 'Waste and Recycling', 8, 'cn tower', '12:16:00', '2026-02-06', 55, 'accepted', 'There will be recycling bins placed at the event venue, Waste or food leftover will be composted'),
(18, 17, 'My Last Events', 'cscss', 'Waste and Recycling', 1, 'apu', '12:19:00', '2026-02-05', 8, 'accepted', ''),
(19, 9, 'AHHHH', 'ccc', 'Waste and Recycling', 10, 'cn tower', '00:22:00', '2026-04-17', 33, 'accepted', ''),
(20, 17, 'final one', 'cde', 'Waste and Recycling', 3, 'cn tower', '01:24:00', '2026-02-11', 100, 'accepted', 'There will be recycling bins placed at the event venue'),
(21, 17, 'watch event', 'wdw', 'Waste and Recycling', 22, 'cn tower', '00:28:00', '2026-03-18', 22, 'accepted', ''),
(22, 17, 'lol', 'ed', 'Waste and Recycling', 2, 'cn tower', '12:41:00', '2026-03-19', 1, 'accepted', 'There will be recycling bins placed at the event venue'),
(23, 19, 'rabbit', 'dcdcd', 'Waste and Recycling', 1, 'cn tower', '13:09:00', '2026-03-19', 222, 'accepted', 'Waste or food leftover will be composted');

-- --------------------------------------------------------

--
-- Table structure for table `metrics`
--

CREATE TABLE `metrics` (
  `eventID` int(11) NOT NULL,
  `waste` decimal(10,2) NOT NULL,
  `water` decimal(10,2) NOT NULL,
  `electricity` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `metrics`
--

INSERT INTO `metrics` (`eventID`, `waste`, `water`, `electricity`) VALUES
(4, 100.00, 1.00, 10.00),
(8, 400.00, 2.00, 3.00),
(12, 100.00, 1.00, 2.00),
(13, 200.00, 1.00, 1.00),
(16, 133.33, 2.00, 20.00),
(19, 166.67, 1.00, 1.00),
(21, 66.67, 1.00, 1.00),
(22, 200.00, 1.00, 1.00),
(23, 50.00, 1.00, 1.00);

-- --------------------------------------------------------

--
-- Table structure for table `participant_badges`
--

CREATE TABLE `participant_badges` (
  `userID` int(11) NOT NULL,
  `badgeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participant_badges`
--

INSERT INTO `participant_badges` (`userID`, `badgeID`) VALUES
(11, 15),
(11, 17),
(18, 15),
(18, 16),
(18, 17),
(20, 15),
(20, 17);

-- --------------------------------------------------------

--
-- Table structure for table `participant_points`
--

CREATE TABLE `participant_points` (
  `userID` int(11) NOT NULL,
  `points` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participant_points`
--

INSERT INTO `participant_points` (`userID`, `points`) VALUES
(11, 10076),
(15, 0),
(18, 6),
(20, 72);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `requestID` int(11) NOT NULL,
  `tpnumber` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `purpose` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `signups`
--

CREATE TABLE `signups` (
  `signupID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signups`
--

INSERT INTO `signups` (`signupID`, `userID`, `eventID`) VALUES
(9, 11, 8),
(10, 11, 4),
(13, 11, 13),
(14, 11, 12),
(17, 11, 14),
(21, 18, 16),
(23, 18, 19),
(24, 18, 21),
(25, 18, 22),
(26, 20, 23);

-- --------------------------------------------------------

--
-- Table structure for table `thumbnails`
--

CREATE TABLE `thumbnails` (
  `thumbnailID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `thumbnail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thumbnails`
--

INSERT INTO `thumbnails` (`thumbnailID`, `eventID`, `thumbnail`) VALUES
(2, 2, 'RobloxScreenShot20250708_215230516.png'),
(3, 2, 'RobloxScreenShot20250708_215326577.png'),
(4, 3, 'RobloxScreenShot20250708_215157034.png'),
(5, 3, 'RobloxScreenShot20250708_215230516.png'),
(6, 3, 'RobloxScreenShot20250708_215326577.png'),
(7, 4, 'apu logo.png'),
(8, 5, 'Screenshot 2024-04-19 165802.png'),
(9, 5, 'Screenshot 2024-04-19 170541.png'),
(11, 6, 'Screenshot 2025-01-15 204327.png'),
(12, 7, 'Screenshot 2025-01-09 205837.png'),
(13, 7, 'Screenshot 2025-01-09 205856.png'),
(14, 8, 'Screenshot 2025-01-22 141512.png'),
(15, 8, 'Screenshot 2025-01-23 113408.png'),
(16, 8, 'Screenshot 2025-01-23 113416.png'),
(21, 11, 'Screenshot 2025-03-10 114540.png'),
(22, 11, 'Screenshot 2025-03-10 114553.png'),
(23, 12, 'Screenshot 2025-01-09 205837.png'),
(24, 12, 'Screenshot 2025-01-09 205856.png'),
(25, 13, 'Screenshot 2025-01-15 204356.png'),
(26, 13, 'Screenshot 2025-01-15 214723.png'),
(27, 14, 'Screenshot 2025-02-14 155916.png'),
(28, 14, 'Screenshot 2025-02-14 155928.png'),
(31, 16, 'Screenshot 2025-08-25 190538.png'),
(32, 17, 'RobloxScreenShot20250708_215230516.png'),
(33, 17, 'RobloxScreenShot20250708_215326577.png'),
(34, 18, 'RobloxScreenShot20250708_215157034.png'),
(35, 18, 'RobloxScreenShot20250708_215230516.png'),
(36, 18, 'RobloxScreenShot20250708_215326577.png'),
(37, 19, 'RobloxScreenShot20250708_215326577.png'),
(38, 20, 'wrist-size.PNG'),
(39, 21, 'wrist-size.PNG'),
(40, 22, '2023-Lotus-Emira-002-1600.jpg'),
(41, 23, '1983-Nissan-Bluebird-SSS-001-1080.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('participant','organizer','admin') NOT NULL,
  `profilePic` varchar(50) DEFAULT 'defaultPic.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `role`, `profilePic`) VALUES
(8, 'min', '10', 'admin', 'defaultPic.jpg'),
(9, 'cayleb', '123', 'organizer', 'Screenshot 2025-01-09 205837.png'),
(11, 'cayden', '123', 'participant', '1000039260.jpg'),
(13, 'karen', '321', 'organizer', 'Screenshot 2025-01-09 205926.png'),
(14, 'kom', '321', 'organizer', 'Screenshot 2025-01-03 205401.png'),
(15, 'popo', '888', 'participant', 'defaultPic.jpg'),
(17, 'lorraine', '123', 'organizer', 'defaultPic.jpg'),
(18, 'jack', '123', 'participant', 'questionmark.jpg'),
(19, 'khim', '123', 'organizer', 'defaultPic.jpg'),
(20, 'jeni', '123', 'participant', 'defaultPic.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendanceID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `eventID` (`eventID`);

--
-- Indexes for table `attendance_code`
--
ALTER TABLE `attendance_code`
  ADD PRIMARY KEY (`codeID`),
  ADD KEY `eventID` (`eventID`);

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`badgeID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `metrics`
--
ALTER TABLE `metrics`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `participant_badges`
--
ALTER TABLE `participant_badges`
  ADD PRIMARY KEY (`userID`,`badgeID`),
  ADD KEY `badgeID` (`badgeID`);

--
-- Indexes for table `participant_points`
--
ALTER TABLE `participant_points`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`requestID`);

--
-- Indexes for table `signups`
--
ALTER TABLE `signups`
  ADD PRIMARY KEY (`signupID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `eventID` (`eventID`);

--
-- Indexes for table `thumbnails`
--
ALTER TABLE `thumbnails`
  ADD PRIMARY KEY (`thumbnailID`),
  ADD KEY `eventID` (`eventID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `attendance_code`
--
ALTER TABLE `attendance_code`
  MODIFY `codeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `badgeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `requestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `signups`
--
ALTER TABLE `signups`
  MODIFY `signupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `thumbnails`
--
ALTER TABLE `thumbnails`
  MODIFY `thumbnailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendance_code`
--
ALTER TABLE `attendance_code`
  ADD CONSTRAINT `attendance_code_ibfk_1` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `metrics`
--
ALTER TABLE `metrics`
  ADD CONSTRAINT `metrics_ibfk_1` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participant_badges`
--
ALTER TABLE `participant_badges`
  ADD CONSTRAINT `participant_badges_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participant_badges_ibfk_2` FOREIGN KEY (`badgeID`) REFERENCES `badges` (`badgeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participant_points`
--
ALTER TABLE `participant_points`
  ADD CONSTRAINT `participant_points_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `signups`
--
ALTER TABLE `signups`
  ADD CONSTRAINT `signups_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `signups_ibfk_2` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thumbnails`
--
ALTER TABLE `thumbnails`
  ADD CONSTRAINT `thumbnails_ibfk_1` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

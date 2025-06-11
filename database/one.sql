-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2025 at 02:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumini`
--

-- --------------------------------------------------------

--
-- Table structure for table `one`
--

CREATE TABLE `one` (
  `id` int(11) NOT NULL,
  `registerNumber` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `academicYear` varchar(50) NOT NULL,
  `batch` varchar(100) DEFAULT NULL,
  `studyOrWork` enum('higherStudies','working','certificatecourse') NOT NULL,
  `studyName` varchar(255) DEFAULT NULL,
  `studyPlace` varchar(255) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `contactDetails` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `certificateInstitution` varchar(255) DEFAULT NULL,
  `certificateDuration` varchar(100) DEFAULT NULL,
  `certificateType` varchar(255) DEFAULT NULL,
  `idCard` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `offerLetter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `one`
--

INSERT INTO `one` (`id`, `registerNumber`, `name`, `academicYear`, `batch`, `studyOrWork`, `studyName`, `studyPlace`, `companyName`, `designation`, `contactDetails`, `email`, `phone`, `salary`, `certificateInstitution`, `certificateDuration`, `certificateType`, `idCard`, `photo`, `offerLetter`) VALUES
(7, 'BU21106', 'Sanjay', '2021-2024', 'SRP', 'higherStudies', 'MSC', 'BANGLORE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20230926_233319.jpg', '20230926_233120.jpg', NULL),
(8, 'BU21102', 'CLAMAN', '2021-2024', 'hwidh', 'working', NULL, NULL, 'BOSCO SOFT TECH', 'HR', 'bcjw', 'sanjay@gmail.com', '09876543210', '87777', NULL, NULL, NULL, NULL, NULL, 'alumni_higher_studies_details (1).pdf'),
(9, 'BU21109', 'Sanjay', '2018-2021', 'hwidh', 'certificatecourse', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MCC', '6MONTHS', 'private', NULL, NULL, NULL),
(12, 'BU21107', 'Sanjay', '2022-2025', 'KRISHNAGIRI', 'working', NULL, NULL, 'TECH', 'MANAGER', '978654323445', 'sanjay@gmail.com', '09876543210', '87777', NULL, NULL, NULL, NULL, NULL, '1st semester.pdf'),
(13, 'BU21107', 'Sanjay', '2021-2024', 'hwidh', 'certificatecourse', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NPTL', '6MONTHS', 'government', NULL, NULL, NULL),
(14, 'M24CS05', 'Claman', '2022-2025', 'KRI', 'higherStudies', 'Msc', 'Babglore', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'id claman.jpg', 'photo_johnson.jpg', NULL),
(15, 'M24CS24', 'Sanjay', '2022-2025', 'KRI', 'higherStudies', 'Msc', 'Banglore', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'id sanjay.jpg', 'SANJAY IMAGE.jpg', NULL),
(17, 'm25', 'see', '2015-2018', 'Ban', 'higherStudies', 'see', 'CHI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PHOTO.jpg', 'SANJAY SIGN (1).jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `one`
--
ALTER TABLE `one`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registerNumber` (`registerNumber`,`studyOrWork`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `one`
--
ALTER TABLE `one`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

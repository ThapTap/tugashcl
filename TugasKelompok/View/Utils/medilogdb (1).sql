-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 09:30 PM
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
-- Database: `medilogdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `ID` int(11) NOT NULL,
  `DocName` varchar(255) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `DocPhoneNumber` varchar(15) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varbinary(256) DEFAULT NULL,
  `DocEmail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`ID`, `DocName`, `specialization`, `DocPhoneNumber`, `username`, `password`, `DocEmail`) VALUES
(2, 'mandong', NULL, '1234567', 'mandong123', 0x24327924313024614d4c5263656635366f4d43455366373264594d794f655236467652444d4837614f72494c6c6c53342e6568776b674334792f5969, 'mandong@gmail.com'),
(7, 'Si Ganteng', NULL, '0812382472', 'ganteng123', 0x2432792431302463336f38414d4c422e58614c7568426a324d356f5a4f424c75382f2f4d55333030386b616e303159646c554d4c322f36752e683979, 'ganteng@gmail.com'),
(8, 'Althaf Rizqi', NULL, '0872177421', 'althafrizqi', 0x243279243130246443786c615942684f704f79574c377737566b63362e462e525541466971695a6372633855796946764c3857657167705364484579, 'rizqi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `medical_records`
--

CREATE TABLE `medical_records` (
  `ID` int(11) NOT NULL,
  `DoctorID` int(11) DEFAULT NULL,
  `PatientID` int(11) NOT NULL,
  `Date` datetime DEFAULT NULL,
  `heartRate` varchar(10) DEFAULT NULL,
  `Weight` decimal(10,2) DEFAULT NULL,
  `Diagnosis` varchar(255) DEFAULT NULL,
  `Prescription` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `ID` int(11) NOT NULL,
  `DoctorID` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Disease` varchar(50) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `phoneNumber` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`ID`, `DoctorID`, `Name`, `Disease`, `DateOfBirth`, `Age`, `phoneNumber`, `email`) VALUES
(3, 2, 'Si Pintar', 'Sakit kepala', '2016-10-18', 7, '0812345679', 'sipintar@gmail.com'),
(4, 2, 'John Doe', 'Demam', '2001-02-06', 22, '08123689778', 'johndoe@gmail.com'),
(5, 7, 'Jane Doe', 'Demam', '2006-01-18', 17, '0867867289', 'janedoe@gmail.com'),
(11, 7, 'Alexander Purnomo', 'Covid', '2003-05-02', 20, '082157488911', 'bimo@gmail.com'),
(12, 7, 'Mathew Imanski', 'Covid', '2003-12-12', 20, '082157488911', 'test@gmail.com'),
(13, 7, 'Mathew Imanuel', 'Covid', '2004-12-12', 19, '081324425112', 'mathew@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `DoctorID` (`DoctorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medical_records`
--
ALTER TABLE `medical_records`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD CONSTRAINT `medical_records_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`DoctorID`) REFERENCES `doctor` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

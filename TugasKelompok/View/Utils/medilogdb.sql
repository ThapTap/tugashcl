-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 04:04 AM
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
(7, 'Si Ganteng', NULL, '0812382472', 'ganteng123', 0x2432792431302463336f38414d4c422e58614c7568426a324d356f5a4f424c75382f2f4d55333030386b616e303159646c554d4c322f36752e683979, 'ganteng@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `medical record`
--

CREATE TABLE `medical record` (
  `ID` int(11) NOT NULL,
  `DoctorID` int(11) DEFAULT NULL,
  `PatientID` int(11) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `heartRate` varchar(10) DEFAULT NULL,
  `beratBadan` decimal(10,0) DEFAULT NULL,
  `Diagnosis` varchar(255) DEFAULT NULL,
  `prescription` varchar(255) DEFAULT NULL
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
(5, 7, 'Jane Doe', 'Demam', '2006-01-18', 17, '0867867289', 'janedoe@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `medical record`
--
ALTER TABLE `medical record`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `DoctorID` (`DoctorID`),
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medical record`
--
ALTER TABLE `medical record`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medical record`
--
ALTER TABLE `medical record`
  ADD CONSTRAINT `medical record_ibfk_1` FOREIGN KEY (`DoctorID`) REFERENCES `doctor` (`ID`),
  ADD CONSTRAINT `medical record_ibfk_2` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`ID`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`DoctorID`) REFERENCES `doctor` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

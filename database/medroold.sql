-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2017 at 07:51 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medroold`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `nic`, `date`, `time`, `number`) VALUES
(4, '948302802V', '2017-10-28', '15:00', 1),
(3, '958302802V', '2017-10-28', '15:00', 2),
(5, '987636473V', '2017-10-28', '15:00', 3),
(6, '908765456V', '2017-10-27', '15:00', 1),
(7, '912653787V', '2017-10-28', '15:00', 5),
(8, '947563546V', '2017-10-30', '15:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(5) NOT NULL,
  `reg_no` varchar(5) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `user_id` int(5) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `is_deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `reg_no`, `first_name`, `last_name`, `contact_no`, `address`, `position`, `user_id`, `status`, `is_deleted`) VALUES
(1, '11', 'Dr sarachchandra', 'dd', '01545655', 'ratnapura', 'jhg', 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `name` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `telno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`name`, `nic`, `area`, `telno`, `email`) VALUES
('Sammani Anuththara', '958302802V', 'Matara', '0776564354', 'sammani@gmail.com'),
('Praveena Dewapura', '987636473V', 'Galle', '0786574322', 'praveena@gmail.com'),
('Manasha Wijesurendra', '948302802V', 'Galle', '0776565656', 'manasha@gmail.com'),
('Dinithi Karunaratne', '947563546V', 'Galle', '0776543234', 'dinithi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `max_number` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `date`, `time`, `status`, `max_number`) VALUES
(1, '2017-10-23', '15:00', 'Available', 10),
(2, '2017-10-24', '15:00', 'Available', 10),
(3, '2017-10-25', '15:00', 'Available', 10),
(4, '2017-10-26', '15:00', 'Available', 10),
(5, '2017-10-27', '15:00', 'Available', 10),
(6, '2017-10-28', '17:00', 'Available', 5),
(7, '2017-10-30', '15:00', 'Available', 1),
(8, '2017-10-31', '15:00', 'Available', 1),
(9, '2017-11-01', '15:00', 'Available', 1),
(10, '2017-11-02', '15:00', 'Available', 1),
(11, '2017-11-03', '15:00', 'Available', 1),
(12, '2017-11-04', '15:00', 'Available', 10),
(13, '2017-11-08', '15:00', 'Available', 10),
(14, '2017-10-23', '12.00', 'Available', 5);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `drug` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `threshold` int(11) NOT NULL DEFAULT '10'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `date`, `drug`, `category`, `quantity`, `threshold`) VALUES
(10, '2017-12-16', 'Ibuprofen', 'Analgesics', 100, 10),
(11, '2017-12-16', 'Acetaminophen', 'Analgesics', 200, 10),
(12, '2017-12-16', 'Codeine', 'Analgesics', 100, 10),
(13, '2017-12-16', 'Hydrocodone', 'Analgesics', 200, 10),
(14, '2017-12-16', 'Anbesol', 'Anesthetic', 100, 10),
(15, '2016-12-16', 'Orajel', 'Anesthetics', 100, 10),
(16, '2016-12-16', 'Clindamycin', 'Antibiotics', 100, 10),
(17, '2016-12-16', 'Chlorhexidine', 'Antibiotics', 100, 10),
(18, '2016-12-16', 'Doxycycline', 'Antibiotics', 100, 10),
(19, '2016-12-16', 'Nystatin ', 'Antifungals', 100, 10),
(20, '2016-12-16', 'Fluorides', 'Other', 200, 10),
(21, '2016-12-16', 'Benzodiazepines', 'Other', 200, 10),
(22, '2016-12-16', 'Antiseptics', 'Other', 200, 10),
(23, '2016-12-16', 'Paracetamol', 'Pain Killers', 100, 10),
(24, '2016-12-16', 'Acetaminophen', 'Pain Killers', 100, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`nic`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2019 at 05:36 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbarka_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblname`
--

CREATE TABLE `tblname` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_work` int(11) NOT NULL,
  `id_salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblname`
--

INSERT INTO `tblname` (`id`, `name`, `id_work`, `id_salary`) VALUES
(47, 'Tasya', 2, 1),
(48, 'Poetra', 1, 1),
(49, 'Joko', 1, 1),
(50, 'Azhar', 2, 2),
(51, 'Yuda', 1, 1),
(52, 'Hendro', 2, 1),
(55, 'Yudi', 1, 1),
(56, 'Supri', 1, 1),
(57, 'cupi', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsalary`
--

CREATE TABLE `tblsalary` (
  `id` int(11) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsalary`
--

INSERT INTO `tblsalary` (`id`, `salary`) VALUES
(1, 10000000),
(2, 12000000);

-- --------------------------------------------------------

--
-- Table structure for table `tblwork`
--

CREATE TABLE `tblwork` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblwork`
--

INSERT INTO `tblwork` (`id`, `name`, `id_salary`) VALUES
(1, 'Front-End Dev', 1),
(2, 'Back-End Dev', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblname`
--
ALTER TABLE `tblname`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_work` (`id_work`) USING BTREE,
  ADD KEY `id_salary` (`id_salary`) USING BTREE;

--
-- Indexes for table `tblsalary`
--
ALTER TABLE `tblsalary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblwork`
--
ALTER TABLE `tblwork`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_salary` (`id_salary`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblname`
--
ALTER TABLE `tblname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tblsalary`
--
ALTER TABLE `tblsalary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblwork`
--
ALTER TABLE `tblwork`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblname`
--
ALTER TABLE `tblname`
  ADD CONSTRAINT `tblname_ibfk_1` FOREIGN KEY (`id_work`) REFERENCES `tblwork` (`id`),
  ADD CONSTRAINT `tblname_ibfk_2` FOREIGN KEY (`id_salary`) REFERENCES `tblsalary` (`id`);

--
-- Constraints for table `tblwork`
--
ALTER TABLE `tblwork`
  ADD CONSTRAINT `tblwork_ibfk_1` FOREIGN KEY (`id_salary`) REFERENCES `tblsalary` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

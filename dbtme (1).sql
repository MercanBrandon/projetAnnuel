-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2018 at 03:55 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtme`
--

-- --------------------------------------------------------

--
-- Table structure for table `adress`
--

DROP TABLE IF EXISTS `adress`;
CREATE TABLE `adress` (
  `id` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `adress`
--

TRUNCATE TABLE `adress`;
-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

DROP TABLE IF EXISTS `assign`;
CREATE TABLE `assign` (
  `assign_start_date` date DEFAULT NULL,
  `assign_end_date` date DEFAULT NULL,
  `id_vehicule` int(11) NOT NULL,
  `drv_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `assign`
--

TRUNCATE TABLE `assign`;
-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id_course` int(255) NOT NULL,
  `date_course` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `drv_id` varchar(255) NOT NULL,
  `usr_id` varchar(255) NOT NULL,
  `origin_adr_id` varchar(255) NOT NULL,
  `destination_adr_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `course`
--

TRUNCATE TABLE `course`;
--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id_course`, `date_course`, `drv_id`, `usr_id`, `origin_adr_id`, `destination_adr_id`) VALUES
(1, '2018-11-10 11:28:06', '1', '1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

DROP TABLE IF EXISTS `driver`;
CREATE TABLE `driver` (
  `drv_id` int(11) NOT NULL,
  `drv_hiring_date` date DEFAULT NULL,
  `drv_licence_date` date DEFAULT NULL,
  `usr_id` int(11) NOT NULL,
  `drv_lat` float NOT NULL,
  `drv_lng` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `driver`
--

TRUNCATE TABLE `driver`;
--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`drv_id`, `drv_hiring_date`, `drv_licence_date`, `usr_id`, `drv_lat`, `drv_lng`) VALUES
(1, '2018-10-31', '2015-10-01', 34, 48.8462, 2.50705);

-- --------------------------------------------------------

--
-- Table structure for table `usedby`
--

DROP TABLE IF EXISTS `usedby`;
CREATE TABLE `usedby` (
  `is_billing_adress` tinyint(1) DEFAULT NULL,
  `adr_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `usedby`
--

TRUNCATE TABLE `usedby`;
--
-- Dumping data for table `usedby`
--

INSERT INTO `usedby` (`is_billing_adress`, `adr_id`, `usr_id`) VALUES
(1, 1, 1),
(0, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `usr_id` int(11) NOT NULL,
  `usr_name` char(25) DEFAULT NULL,
  `usr_firstname` char(25) DEFAULT NULL,
  `usr_birthdate` date DEFAULT NULL,
  `usr_phone` char(25) DEFAULT NULL,
  `usr_email` char(100) DEFAULT NULL,
  `usr_password` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `user`
--

TRUNCATE TABLE `user`;
--
-- Dumping data for table `user`
--

INSERT INTO `user` (`usr_id`, `usr_name`, `usr_firstname`, `usr_birthdate`, `usr_phone`, `usr_email`, `usr_password`) VALUES
(1, 'Mercan', 'Brandon', '1997-02-22', '0768006602', 'mercan.brandon@outlook.fr', '22021997'),
(2, 'Louison', 'Laurence', '1997-10-05', '0690193646', 'missmwa971@gmail.com', '123456'),
(33, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'MERCAN', 'Thomas', '1997-02-22', '0690198240', 'thebrandon971@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE `vehicule` (
  `id_vehicule` int(11) NOT NULL,
  `immatriculation` char(25) DEFAULT NULL,
  `marque` char(25) DEFAULT NULL,
  `modele` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `vehicule`
--

TRUNCATE TABLE `vehicule`;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `adress`
--
ALTER TABLE `adress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`id_vehicule`,`drv_id`,`usr_id`),
  ADD KEY `FK_assign_drv_id` (`drv_id`),
  ADD KEY `FK_assign_usr_id` (`usr_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_course`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`drv_id`,`usr_id`),
  ADD KEY `FK_Driver_usr_id` (`usr_id`);

--
-- Indexes for table `usedby`
--
ALTER TABLE `usedby`
  ADD PRIMARY KEY (`adr_id`,`usr_id`),
  ADD KEY `FK_usedBy_usr_id` (`usr_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usr_id`),
  ADD KEY `usr_email` (`usr_email`);

--
-- Indexes for table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id_vehicule`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id_course` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `drv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id_vehicule` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign`
--
ALTER TABLE `assign`
  ADD CONSTRAINT `FK_assign_drv_id` FOREIGN KEY (`drv_id`) REFERENCES `driver` (`drv_id`),
  ADD CONSTRAINT `FK_assign_id_vehicule` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`id_vehicule`),
  ADD CONSTRAINT `FK_assign_usr_id` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`);

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `FK_Driver_usr_id` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`);

--
-- Constraints for table `usedby`
--
ALTER TABLE `usedby`
  ADD CONSTRAINT `FK_usedBy_adr_id` FOREIGN KEY (`adr_id`) REFERENCES `adress` (`adr_id`),
  ADD CONSTRAINT `FK_usedBy_usr_id` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2019 at 10:42 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adoptioncentre`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoption_branch`
--

CREATE TABLE `adoption_branch` (
  `branch_id` int(4) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `province` tinytext NOT NULL,
  `city` tinytext NOT NULL,
  `street` tinytext NOT NULL,
  `admin_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `id_number` int(8) NOT NULL,
  `species_id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `neutered` char(1) NOT NULL,
  `declawed` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `id_number` int(8) NOT NULL,
  `breed` varchar(20) NOT NULL,
  `branch_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` tinytext NOT NULL,
  `phone_number` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dog`
--

CREATE TABLE `dog` (
  `id_number` int(8) NOT NULL,
  `breed` varchar(20) NOT NULL,
  `branch_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `id_number` int(8) NOT NULL,
  `species` varchar(20) NOT NULL,
  `branch_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(6) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `staff_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for all the staff that work at the adoption branches';

-- --------------------------------------------------------

--
-- Table structure for table `works_at`
--

CREATE TABLE `works_at` (
  `branch_id` int(4) NOT NULL,
  `staff_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption_branch`
--
ALTER TABLE `adoption_branch`
  ADD PRIMARY KEY (`branch_id`),
  ADD KEY `ADMIN_ID_KEY` (`admin_id`);

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id_number`);

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD KEY `CAT_ID_KEY` (`id_number`),
  ADD KEY `CAT_BRANCH_ID_KEY` (`branch_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `dog`
--
ALTER TABLE `dog`
  ADD KEY `DOG_ID_KEY` (`id_number`),
  ADD KEY `DOG_BRANCH_ID_KEY` (`branch_id`);

--
-- Indexes for table `other`
--
ALTER TABLE `other`
  ADD KEY `OTHER_BRANCH_ID_KEY` (`id_number`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `works_at`
--
ALTER TABLE `works_at`
  ADD KEY `STAFF_ID_KEY` (`staff_id`),
  ADD KEY `BRANCH_ID_KEY` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption_branch`
--
ALTER TABLE `adoption_branch`
  MODIFY `branch_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `id_number` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoption_branch`
--
ALTER TABLE `adoption_branch`
  ADD CONSTRAINT `ADMIN_ID_KEY` FOREIGN KEY (`admin_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cat`
--
ALTER TABLE `cat`
  ADD CONSTRAINT `CAT_BRANCH_ID_KEY` FOREIGN KEY (`branch_id`) REFERENCES `adoption_branch` (`branch_id`),
  ADD CONSTRAINT `CAT_ID_KEY` FOREIGN KEY (`id_number`) REFERENCES `animal` (`id_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dog`
--
ALTER TABLE `dog`
  ADD CONSTRAINT `DOG_BRANCH_ID_KEY` FOREIGN KEY (`branch_id`) REFERENCES `adoption_branch` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `DOG_ID_KEY` FOREIGN KEY (`id_number`) REFERENCES `animal` (`id_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `other`
--
ALTER TABLE `other`
  ADD CONSTRAINT `OTHER_BRANCH_ID_KEY` FOREIGN KEY (`id_number`) REFERENCES `adoption_branch` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `OTHER_ID_KEY` FOREIGN KEY (`id_number`) REFERENCES `animal` (`id_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `works_at`
--
ALTER TABLE `works_at`
  ADD CONSTRAINT `BRANCH_ID_KEY` FOREIGN KEY (`branch_id`) REFERENCES `adoption_branch` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `STAFF_ID_KEY` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

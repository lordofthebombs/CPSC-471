-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2019 at 10:24 PM
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
-- Table structure for table `adoption`
--

CREATE TABLE `adoption` (
  `adoption_id` int(8) NOT NULL,
  `adopter` int(8) NOT NULL,
  `adoptee` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adoption`
--

INSERT INTO `adoption` (`adoption_id`, `adopter`, `adoptee`) VALUES
(13, 15, 23),
(14, 17, 30),
(15, 15, 30);

-- --------------------------------------------------------

--
-- Table structure for table `adoption_branch`
--

CREATE TABLE `adoption_branch` (
  `branch_id` int(4) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `country` varchar(20) NOT NULL,
  `province` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `street` tinytext NOT NULL,
  `admin_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adoption_branch`
--

INSERT INTO `adoption_branch` (`branch_id`, `phone_number`, `country`, `province`, `city`, `street`, `admin_id`) VALUES
(10, 2147483647, 'Canada', 'Alberta', 'Calgary', '6404', NULL),
(11, 2147483647, 'Canada', 'Alberta', 'Calgary', '561 Sunmills Dr', NULL),
(13, 403662347, 'Canada', 'BC', 'Victoria', 'Nanaimo St', NULL);

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

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`id_number`, `species_id`, `age`, `name`, `neutered`, `declawed`) VALUES
(23, 1, 10, 'Winston2.24', 'n', 'n'),
(26, 3, 14, 'Piper', 'y', 'y'),
(27, 2, 2, 'Mr. Whisker', 'n', 'y'),
(28, 3, 40, 'Shelly', 'y', 'n'),
(29, 1, 4, 'Hugo', 'y', 'n'),
(30, 2, 4, 'Spot', 'n', 'y'),
(31, 1, 10, 'Spike2.0', 'y', 'n'),
(55, 1, 1, 'Pinky', 'y', 'o');

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `id_number` int(8) NOT NULL,
  `breed` varchar(20) NOT NULL,
  `branch_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id_number`, `breed`, `branch_id`) VALUES
(27, 'Sphynx', 11),
(30, 'Tabby', 13);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `age` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `email`, `street`, `city`, `province`, `country`, `phone_number`, `first_name`, `last_name`, `age`) VALUES
(15, 'K.sachri@gmail.com', '540 14th ave', 'Calgary', 'AB', 'Canada', 2147483647, 'Kinan', 'Sachri', 26),
(17, 'jon@harris.com', '104', 'Calgary', 'AB', 'Canada', 2147483647, 'Jon', 'Harris', 26),
(18, 'bob@gmail.com', '561 Sunmills Dr', 'Calgary', 'Alberta', 'Canada', 2147483647, 'Bob', 'Smith', 54);

-- --------------------------------------------------------

--
-- Table structure for table `dog`
--

CREATE TABLE `dog` (
  `id_number` int(8) NOT NULL,
  `breed` varchar(20) NOT NULL,
  `branch_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dog`
--

INSERT INTO `dog` (`id_number`, `breed`, `branch_id`) VALUES
(23, 'Bulldog', 10),
(31, 'Pitbull', 13),
(55, 'Daschund', 10);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `brand` varchar(50) NOT NULL,
  `species_type` varchar(20) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`brand`, `species_type`, `quantity`) VALUES
('IAMS', 'dog', 5),
('MeowMix', 'cat', 10),
('Premium Dog Food', 'dog', 15);

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `id_number` int(8) NOT NULL,
  `breed` varchar(20) NOT NULL,
  `branch_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other`
--

INSERT INTO `other` (`id_number`, `breed`, `branch_id`) VALUES
(26, 'Parrot', 11);

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

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `first_name`, `last_name`, `staff_type`) VALUES
(9, 'Jon', 'Harris', 'Admin'),
(10, 'Warren', 'Chen', 'Admin'),
(11, 'Bader', 'Abdulwaseem', 'Admin'),
(12, 'Andrew', 'Kett', 'Admin'),
(13, 'Guy', 'Fieiri', 'Volunteer');

-- --------------------------------------------------------

--
-- Table structure for table `vet_clinic`
--

CREATE TABLE `vet_clinic` (
  `clinic_id` int(4) NOT NULL,
  `clinic_name` varchar(20) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `country` varchar(20) NOT NULL,
  `province` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `street` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vet_clinic`
--

INSERT INTO `vet_clinic` (`clinic_id`, `clinic_name`, `phone_number`, `country`, `province`, `city`, `street`) VALUES
(4, 'Beltlines', 2147483647, 'Canada', 'AB', 'Calgary', '13th'),
(5, 'Sundance Animal Hosp', 2147483647, 'Canada', 'BC', 'Victoria', 'Nanaimo St'),
(6, 'Connaught Vet Clinic', 2147483647, 'Canada', 'Alberta', 'Calgary', '13th ave SW'),
(7, 'Sundance', 2147483647, 'Canada', 'Alberta', 'Edmonton', 'Sunmills');

-- --------------------------------------------------------

--
-- Table structure for table `works_at`
--

CREATE TABLE `works_at` (
  `branch_id` int(4) NOT NULL,
  `staff_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `works_at`
--

INSERT INTO `works_at` (`branch_id`, `staff_id`) VALUES
(10, 9),
(11, 10),
(13, 12),
(13, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption`
--
ALTER TABLE `adoption`
  ADD PRIMARY KEY (`adoption_id`),
  ADD KEY `adopter` (`adopter`),
  ADD KEY `adoptee` (`adoptee`);

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
  ADD PRIMARY KEY (`id_number`),
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
  ADD PRIMARY KEY (`id_number`),
  ADD KEY `DOG_BRANCH_ID_KEY` (`branch_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`brand`);

--
-- Indexes for table `other`
--
ALTER TABLE `other`
  ADD PRIMARY KEY (`id_number`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `vet_clinic`
--
ALTER TABLE `vet_clinic`
  ADD PRIMARY KEY (`clinic_id`);

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
-- AUTO_INCREMENT for table `adoption`
--
ALTER TABLE `adoption`
  MODIFY `adoption_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `adoption_branch`
--
ALTER TABLE `adoption_branch`
  MODIFY `branch_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `id_number` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vet_clinic`
--
ALTER TABLE `vet_clinic`
  MODIFY `clinic_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoption`
--
ALTER TABLE `adoption`
  ADD CONSTRAINT `adoption_ibfk_1` FOREIGN KEY (`adoptee`) REFERENCES `animal` (`id_number`),
  ADD CONSTRAINT `adoption_ibfk_2` FOREIGN KEY (`adopter`) REFERENCES `client` (`client_id`);

--
-- Constraints for table `adoption_branch`
--
ALTER TABLE `adoption_branch`
  ADD CONSTRAINT `ADMIN_ID_KEY` FOREIGN KEY (`admin_id`) REFERENCES `staff` (`staff_id`) ON DELETE SET NULL ON UPDATE CASCADE;

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
  ADD CONSTRAINT `OTHER_BRANCH_ID_KEY` FOREIGN KEY (`branch_id`) REFERENCES `adoption_branch` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
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

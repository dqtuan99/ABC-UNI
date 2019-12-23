-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2019 at 02:54 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abcuni_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` varchar(20) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `Teacher_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `class_name`, `Teacher_name`) VALUES
('1', 'Phát triển ứng dụng Web', 'Dũng'),
('2', 'Giải tích 1', 'Thành'),
('3', 'Giải tích 2', 'Tuấn');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(11) NOT NULL,
  `class_id` varchar(20) NOT NULL,
  `exam_date` date DEFAULT NULL,
  `Time_started` time NOT NULL,
  `Time_finished` time NOT NULL,
  `exam_room` varchar(10) DEFAULT NULL,
  `exam_limit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `class_id`, `exam_date`, `Time_started`, `Time_finished`, `exam_room`, `exam_limit`) VALUES
(1, '1', '2019-12-25', '10:00:00', '11:00:00', '151', 20),
(2, '2', '2019-12-30', '10:00:00', '11:30:00', '12', 15);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `student_id` varchar(20) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `birthday` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`student_id`, `FullName`, `Country`, `phone`, `birthday`) VALUES
('103', 'Atelier graphique', 'France', '40.32.2555', '01/01/1999'),
('112', 'Signal Gift Stores', 'USA', '7025551838', '02/01/1999'),
('114', 'Australian Collectors, Co.', 'Australia', '03 9520 4555', '03/01/1999'),
('119', 'La Rochelle Gifts', 'France', '40.67.8555', '04/01/1999'),
('121', 'Baane Mini Imports', 'Norway', '07-98 9555', '05/01/1999'),
('124', 'Mini Gifts Distributors Ltd.', 'USA', '4155551450', '06/01/1999'),
('125', 'Havel & Zbyszek Co', 'Poland', '(26) 642-7555', '07/01/1999'),
('128', 'Blauer See Auto, Co.', 'Germany', '+49 69 66 90 2555', '08/01/1999'),
('129', 'Mini Wheels Co.', 'USA', '6505555787', '09/01/1999'),
('131', 'Land of Toys Inc.', 'USA', '2125557818', '10/01/1999'),
('141', 'Euro+ Shopping Channel', 'Spain', '(91) 555 94 44', '11/01/1999'),
('144', 'Volvo Model Replicas, Co', 'Sweden', '0921-12 3555', '12/01/1999'),
('145', 'Danish Wholesale Imports', 'Denmark', '31 12 3555', '13/01/1999'),
('146', 'Saveley & Henriot, Co.', 'France', '78.32.5555', '14/01/1999'),
('148', 'Dragon Souveniers, Ltd.', 'Singapore', '+65 221 7555', '15/01/1999'),
('151', 'Muscle Machine Inc', 'USA', '2125557413', '17/01/1999'),
('157', 'Diecast Classics Inc.', 'USA', '2155551555', '18/01/1999'),
('161', 'Technics Stores Inc.', 'USA', '6505556809', '19/01/1999'),
('166', 'Handji Gifts& Co', 'Singapore', '+65 224 1555', '20/01/1999'),
('167', 'Herkku Gifts', 'Norway  ', '+47 2267 3215', '21/01/1999'),
('168', 'American Souvenirs Inc', 'USA', '2035557845', '22/01/1999'),
('169', 'Porto Imports Co.', 'Portugal', '(1) 356-5555', '23/01/1999'),
('171', 'Daedalus Designs Imports', 'France', '20.16.1555', '24/01/1999'),
('172', 'La Corne D\'abondance, Co.', 'France', '(1) 42.34.2555', '25/01/1999'),
('173', 'Cambridge Collectables Co.', 'USA', '6175555555', '26/01/1999'),
('175', 'Gift Depot Inc.', 'USA', '2035552570', '27/01/1999'),
('177', 'Osaka Souveniers Co.', 'Japan', '+81 06 6342 5555', '28/01/1999'),
('181', 'Vitachrome Inc.', 'USA', '2125551500', '29/01/1999'),
('186', 'Toys of Finland, Co.', 'Finland', '90-224 8555', '30/01/1999'),
('187', 'AV Stores, Co.', 'UK', '(171) 555-1555', '01/02/1999'),
('189', 'Clover Collections, Co.', 'Ireland', '+353 1862 1555', '02/02/1999'),
('198', 'Auto-Moto Classics Inc.', 'USA', '6175558428', '03/02/1999'),
('201', 'UK Collectables, Ltd.', 'UK', '(171) 555-2282', '04/02/1999'),
('202', 'Canadian Gift Exchange Network', 'Canada', '(604) 555-3392', '05/02/1999'),
('204', 'Online Mini Collectables', 'USA', '6175557555', '06/02/1999'),
('205', 'Toys4GrownUps.com', 'USA', '6265557265', '07/02/1999'),
('206', 'Asian Shopping Network, Co', 'Singapore', '+612 9411 1555', '08/02/1999'),
('209', 'Mini Caravy', 'France', '88.60.1555', '09/02/1999'),
('211', 'King Kong Collectables, Co.', 'Hong Kong', '+852 2251 1555', '10/02/1999'),
('216', 'Enaco Distributors', 'Spain', '(93) 203 4555', '11/02/1999'),
('219', 'Boards & Toys Co.', 'USA', '3105552373', '12/02/1999'),
('223', 'Natürlich Autos', 'Germany', '0372-555188', '13/02/1999'),
('227', 'Heintze Collectables', 'Denmark', '86 21 3555', '14/02/1999'),
('233', 'Québec Home Shopping Network', 'Canada', '(514) 555-8054', '15/02/1999'),
('237', 'ANG Resellers', 'Spain', '(91) 745 6555', '16/02/1999'),
('239', 'Collectable Mini Designs Co.', 'USA', '7605558146', '17/02/1999'),
('240', 'giftsbymail.co.uk', 'UK', '(198) 555-8888', '18/02/1999'),
('242', 'Alpha Cognac', 'France', '61.77.6555', '19/02/1999'),
('247', 'Messner Shopping Network', 'Germany', '069-0555984', '20/02/1999'),
('249', 'Amica Models & Co.', 'Italy', '011-4988555', '21/02/1999');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` varchar(20) NOT NULL,
  `class_id` varchar(20) NOT NULL,
  `banTest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `class_id`, `banTest`) VALUES
('103', '1', 0),
('103', '3', 0),
('112', '1', 0),
('112', '3', 0),
('114', '1', 0),
('114', '3', 0),
('119', '1', 0),
('119', '3', 0),
('121', '1', 0),
('121', '3', 0),
('124', '1', 0),
('124', '3', 0),
('125', '1', 0),
('125', '3', 0),
('128', '1', 0),
('128', '3', 0),
('129', '1', 0),
('129', '3', 0),
('131', '1', 0),
('141', '1', 0),
('144', '1', 0),
('145', '1', 0),
('146', '1', 0),
('148', '1', 0),
('151', '1', 0),
('157', '1', 0),
('161', '1', 0),
('166', '1', 0),
('167', '1', 0),
('168', '1', 0),
('168', '2', 0),
('169', '1', 0),
('169', '2', 0),
('171', '1', 0),
('171', '2', 0),
('172', '1', 0),
('172', '2', 0),
('173', '1', 0),
('173', '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `studentsexams`
--

CREATE TABLE `studentsexams` (
  `student_id` varchar(20) NOT NULL,
  `exam_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentsexams`
--

INSERT INTO `studentsexams` (`student_id`, `exam_id`) VALUES
('103', 1),
('112', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`,`class_name`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`,`class_id`),
  ADD KEY `class_exam_fk` (`class_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`student_id`) USING BTREE;

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`,`class_id`),
  ADD KEY `class_id_fk` (`class_id`);

--
-- Indexes for table `studentsexams`
--
ALTER TABLE `studentsexams`
  ADD PRIMARY KEY (`student_id`,`exam_id`),
  ADD KEY `user_id` (`student_id`),
  ADD KEY `exam_id` (`exam_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `class_exam_fk` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `class_id_fk` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_fk3` FOREIGN KEY (`student_id`) REFERENCES `profiles` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentsexams`
--
ALTER TABLE `studentsexams`
  ADD CONSTRAINT `exam_id` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`exam_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`student_id`) REFERENCES `profiles` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

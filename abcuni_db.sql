-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 22, 2019 at 08:59 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

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
-- Table structure for table `cathi`
--

CREATE TABLE `cathi` (
  `cathi_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `hocphan_id` int(11) NOT NULL,
  `kythi_id` int(11) NOT NULL,
  `ngaythi` date NOT NULL,
  `cathi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cathi`
--

INSERT INTO `cathi` (`cathi_id`, `room_id`, `hocphan_id`, `kythi_id`, `ngaythi`, `cathi`) VALUES
(2, 2, 9, 3, '2019-12-23', 1),
(3, 3, 9, 3, '2019-12-24', 1),
(4, 3, 9, 3, '2019-12-25', 2),
(5, 3, 9, 1, '2018-05-23', 2),
(8, 1, 7, 3, '2019-12-28', 2),
(9, 2, 7, 3, '2019-12-28', 3),
(10, 3, 7, 3, '2019-12-28', 4),
(11, 3, 7, 3, '2019-12-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hocphan`
--

CREATE TABLE `hocphan` (
  `hocphan_id` int(11) NOT NULL,
  `ten_mon_hoc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hocphan`
--

INSERT INTO `hocphan` (`hocphan_id`, `ten_mon_hoc`, `teacher_id`) VALUES
(6, 'Discrete Mathematic', 1),
(7, 'Calculus 2', 1),
(8, 'Linear Algebra', 1),
(9, 'Computer Architecture', 1),
(10, 'Signal and System', 1),
(11, 'test', 1),
(12, 'Discrete Mathematic', 1),
(13, 'Discrete Mathematic 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kythi`
--

CREATE TABLE `kythi` (
  `kythi_id` int(11) NOT NULL,
  `ten_ky_thi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kythi`
--

INSERT INTO `kythi` (`kythi_id`, `ten_ky_thi`) VALUES
(1, '2018-2019/Ky 1'),
(2, '2018-2019/Ky 2'),
(3, '2019-2020/Ky 1'),
(4, 'Ky thi test'),
(5, '3'),
(6, '3');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(45) NOT NULL,
  `max_slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_name`, `max_slot`) VALUES
(1, 'PM201 - G2', 25),
(2, 'PM207 - G2', 25),
(3, 'PM202 - G2', 25);

-- --------------------------------------------------------

--
-- Table structure for table `sv_cathi`
--

CREATE TABLE `sv_cathi` (
  `id` int(11) NOT NULL,
  `sv_id` int(11) NOT NULL,
  `cathi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sv_cathi`
--

INSERT INTO `sv_cathi` (`id`, `sv_id`, `cathi_id`) VALUES
(8, 2, 8),
(9, 4, 8),
(10, 5, 8),
(11, 6, 9),
(12, 7, 9),
(13, 8, 8),
(14, 9, 10),
(15, 2, 2),
(16, 4, 2),
(17, 5, 3),
(18, 6, 2),
(19, 7, 4),
(20, 8, 3),
(21, 9, 5),
(22, 10, 5),
(23, 11, 4),
(24, 8, 11);

-- --------------------------------------------------------

--
-- Table structure for table `sv_kythi_hocphan`
--

CREATE TABLE `sv_kythi_hocphan` (
  `id` int(11) NOT NULL,
  `sv_id` int(11) NOT NULL,
  `kythi_id` int(11) NOT NULL,
  `hocphan_id` int(11) NOT NULL,
  `banned` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sv_kythi_hocphan`
--

INSERT INTO `sv_kythi_hocphan` (`id`, `sv_id`, `kythi_id`, `hocphan_id`, `banned`) VALUES
(1, 2, 3, 7, 0),
(8, 4, 3, 7, 0),
(9, 5, 3, 7, 0),
(10, 6, 3, 7, 0),
(11, 7, 3, 7, 0),
(12, 8, 3, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `isAdmin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`, `isAdmin`) VALUES
(1, 'dqtuan99', '7f1c9f0f60dbd68fb2904966b5a9ed86bca578a0195617d6dc236a5a1c8e10f4', 'Do Quang Tuan', 1),
(2, 'bathanh123456', '7f1c9f0f60dbd68fb2904966b5a9ed86bca578a0195617d6dc236a5a1c8e10f4', 'Nguyen Ba Thanh3', 0),
(4, 'testuser3', '7f1c9f0f60dbd68fb2904966b5a9ed86bca578a0195617d6dc236a5a1c8e10f4', 'Test Object 3', 0),
(5, 'testuser4', '7f1c9f0f60dbd68fb2904966b5a9ed86bca578a0195617d6dc236a5a1c8e10f4', 'Test Object 4', 0),
(6, 'testuser5', '7f1c9f0f60dbd68fb2904966b5a9ed86bca578a0195617d6dc236a5a1c8e10f4', 'Test Object 5', 0),
(7, 'testuser6', '7f1c9f0f60dbd68fb2904966b5a9ed86bca578a0195617d6dc236a5a1c8e10f4', 'Test Object 6', 0),
(8, 'testuser7', '7f1c9f0f60dbd68fb2904966b5a9ed86bca578a0195617d6dc236a5a1c8e10f4', 'Test Object 7', 0),
(9, 'testuser8', '7f1c9f0f60dbd68fb2904966b5a9ed86bca578a0195617d6dc236a5a1c8e10f4', 'Test Object 8', 0),
(10, 'testuser9', '7f1c9f0f60dbd68fb2904966b5a9ed86bca578a0195617d6dc236a5a1c8e10f4', 'Test Object 9', 0),
(11, 'bathanh12345', '7f1c9f0f60dbd68fb2904966b5a9ed86bca578a0195617d6dc236a5a1c8e10f4', 'Nguyen Ba Thanh69', 0),
(12, 'bathanh1234', '7f1c9f0f60dbd68fb2904966b5a9ed86bca578a0195617d6dc236a5a1c8e10f4', 'Nguyen Ba Thanh', 0),
(13, 'bathanh12345', '7f1c9f0f60dbd68fb2904966b5a9ed86bca578a0195617d6dc236a5a1c8e10f4', 'Nguyen Ba Thanh2', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cathi`
--
ALTER TABLE `cathi`
  ADD PRIMARY KEY (`cathi_id`),
  ADD KEY `cathi_hocphan_fk` (`hocphan_id`),
  ADD KEY `cathi_kythi_fk` (`kythi_id`),
  ADD KEY `cathi_room_fk` (`room_id`);

--
-- Indexes for table `hocphan`
--
ALTER TABLE `hocphan`
  ADD PRIMARY KEY (`hocphan_id`),
  ADD KEY `class_user_fk` (`teacher_id`);

--
-- Indexes for table `kythi`
--
ALTER TABLE `kythi`
  ADD PRIMARY KEY (`kythi_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `sv_cathi`
--
ALTER TABLE `sv_cathi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cathi_fk2` (`cathi_id`),
  ADD KEY `sv_fk2` (`sv_id`);

--
-- Indexes for table `sv_kythi_hocphan`
--
ALTER TABLE `sv_kythi_hocphan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hocphan_fk` (`hocphan_id`),
  ADD KEY `kythi_fk` (`kythi_id`),
  ADD KEY `sv_fk` (`sv_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cathi`
--
ALTER TABLE `cathi`
  MODIFY `cathi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hocphan`
--
ALTER TABLE `hocphan`
  MODIFY `hocphan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kythi`
--
ALTER TABLE `kythi`
  MODIFY `kythi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sv_cathi`
--
ALTER TABLE `sv_cathi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sv_kythi_hocphan`
--
ALTER TABLE `sv_kythi_hocphan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cathi`
--
ALTER TABLE `cathi`
  ADD CONSTRAINT `cathi_hocphan_fk` FOREIGN KEY (`hocphan_id`) REFERENCES `hocphan` (`hocphan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cathi_kythi_fk` FOREIGN KEY (`kythi_id`) REFERENCES `kythi` (`kythi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cathi_room_fk` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hocphan`
--
ALTER TABLE `hocphan`
  ADD CONSTRAINT `class_user_fk` FOREIGN KEY (`teacher_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `sv_cathi`
--
ALTER TABLE `sv_cathi`
  ADD CONSTRAINT `cathi_fk2` FOREIGN KEY (`cathi_id`) REFERENCES `cathi` (`cathi_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sv_fk2` FOREIGN KEY (`sv_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sv_kythi_hocphan`
--
ALTER TABLE `sv_kythi_hocphan`
  ADD CONSTRAINT `hocphan_fk` FOREIGN KEY (`hocphan_id`) REFERENCES `hocphan` (`hocphan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kythi_fk` FOREIGN KEY (`kythi_id`) REFERENCES `kythi` (`kythi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sv_fk` FOREIGN KEY (`sv_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

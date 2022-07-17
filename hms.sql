-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 04:28 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', 'admina', '');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` int(11) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `consultancyFees` int(11) NOT NULL,
  `appointmentDate` date NOT NULL,
  `appointmentTime` time NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userStatus` int(11) NOT NULL,
  `doctorStatus` int(11) NOT NULL,
  `updationDate` varchar(255) NOT NULL,
  `payment_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`, `payment_status`) VALUES
(21, 14, 1, 7, 300, '2021-04-27', '23:00:00', '2021-04-01 15:36:14', 1, 1, '', 1),
(22, 14, 1, 5, 50, '2021-04-20', '08:00:00', '2021-04-19 02:00:06', 1, 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(50) NOT NULL,
  `customer_phn` varchar(255) NOT NULL,
  `medi_name` varchar(255) NOT NULL,
  `medi_quantity` varchar(255) NOT NULL,
  `medi_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `customer_phn`, `medi_name`, `medi_quantity`, `medi_price`) VALUES
(25, '015015015015', 'napa', '499', '16966');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization_id` int(11) NOT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `address` longtext,
  `docFees` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization_id`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(1, 14, 'ABC', 'abc', '50', 1621946613, 'testd@gmail.com', '1e3adec1823d072f53db8db57d67bcc3', '2021-03-17 06:18:44', '2021-03-24 10:16:54'),
(3, 14, 'aadsd as', 'q asdaqdasd ', '100', 100, 'azhae@gmail.com', '12345678', '2021-03-24 10:09:32', NULL),
(4, 15, 'Av', 'adasd asd', '100', 21545454, 'sd kfsaj', '154845', '2021-03-24 13:35:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctorslog`
--

CREATE TABLE `doctorslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, NULL, 'testd@gamil.com', 0x3a3a3100000000000000000000000000, '2021-03-17 06:19:03', NULL, 0),
(2, 1, 'testd@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-17 06:19:28', '17-03-2021 11:50:40 AM', 1),
(3, 1, 'testd@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-17 06:20:49', NULL, 1),
(4, 1, 'testd@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-17 06:25:51', '17-03-2021 11:56:03 AM', 1),
(5, 1, 'testd@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-17 06:28:56', '17-03-2021 11:59:09 AM', 1),
(6, 1, 'testd@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-17 06:30:57', '17-03-2021 12:21:11 PM', 1),
(7, 1, 'testd@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-17 07:13:03', NULL, 1),
(8, 1, 'testd@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-19 13:20:45', NULL, 1),
(9, 1, 'testd@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-19 13:21:07', '19-03-2021 06:57:18 PM', 1),
(10, 1, 'testd@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-19 13:28:10', '19-03-2021 06:58:23 PM', 1),
(11, 1, 'testd@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-19 02:00:29', '19-04-2021 07:32:04 AM', 1),
(12, NULL, 'admin', 0x3a3a3100000000000000000000000000, '2021-04-19 02:02:16', NULL, 0),
(13, 1, 'testd@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-19 13:28:56', '19-04-2021 07:01:17 PM', 1),
(14, 1, 'testd@gmail.com', 0x3a3a3100000000000000000000000000, '2021-04-19 13:35:52', '19-04-2021 07:05:58 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(14, 'Test', '2021-03-15 12:21:32', NULL),
(15, 'Test2', '2021-03-15 12:21:48', NULL),
(16, 'Surgery', '2021-03-24 13:36:23', NULL),
(17, 'General Physician', '2021-04-19 01:50:32', NULL),
(18, 'Dentist', '2021-04-19 01:50:37', NULL),
(19, 'Ear-Nose-Throat Specialist', '2021-04-19 01:50:42', NULL),
(20, 'Bones Specialist', '2021-04-19 01:50:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medic_list`
--

CREATE TABLE `medic_list` (
  `id` int(50) NOT NULL,
  `medic_name` varchar(255) NOT NULL,
  `medic_stock` varchar(255) NOT NULL,
  `medic_price` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `expire_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medic_list`
--

INSERT INTO `medic_list` (`id`, `medic_name`, `medic_stock`, `medic_price`, `company_name`, `expire_date`) VALUES
(3, 'extra ', '0', '55', 'abc', '27/11/22'),
(4, 'napa', '0', '34', 'napa extra', '3-34-4'),
(6, 'napa2', '40', '34', 'napa extra', '3-34-4'),
(7, 'Napa Extra', '500', '10', 'Beximco', '151');

-- --------------------------------------------------------

--
-- Table structure for table `payment_user`
--

CREATE TABLE `payment_user` (
  `id` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `ammount` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_user`
--

INSERT INTO `payment_user` (`id`, `doctor_name`, `patient_name`, `user_email`, `date`, `ammount`, `status`) VALUES
(1, 'ABC', 'avindra', '17303045@iubat.edu', '2023-03-21', 1000, 0),
(2, 'ABC', 'avindra', '17303045@iubat.edu', '2023-03-21', 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` mediumtext,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `AdminRemark` mediumtext,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `IsRead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(29, NULL, '17303045@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-05 14:09:32', NULL, 0),
(30, 5, '17303045@iubat.edu', 0x3a3a3100000000000000000000000000, '2021-03-05 14:09:59', '05-03-2021 07:48:26 PM', 1),
(31, 5, '17303045@iubat.edu', 0x3a3a3100000000000000000000000000, '2021-03-06 13:08:05', '06-03-2021 06:38:56 PM', 1),
(32, 5, '17303045@iubat.edu', 0x3a3a3100000000000000000000000000, '2021-03-08 13:17:56', NULL, 1),
(33, 5, '17303045@iubat.edu', 0x3a3a3100000000000000000000000000, '2021-03-09 04:13:51', NULL, 1),
(34, 5, '17303045@iubat.edu', 0x3a3a3100000000000000000000000000, '2021-03-15 13:12:34', NULL, 1),
(35, NULL, 'testp@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-17 06:17:16', NULL, 0),
(36, 5, '17303045@iubat.edu', 0x3a3a3100000000000000000000000000, '2021-03-17 06:17:45', NULL, 1),
(37, NULL, 'testp@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-17 06:21:34', NULL, 0),
(38, 5, '17303045@iubat.edu', 0x3a3a3100000000000000000000000000, '2021-03-17 06:21:40', NULL, 1),
(39, 5, '17303045@iubat.edu', 0x3a3a3100000000000000000000000000, '2021-03-17 06:26:26', NULL, 1),
(40, NULL, 'testp@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-17 06:29:21', NULL, 0),
(41, 5, '17303045@iubat.edu', 0x3a3a3100000000000000000000000000, '2021-03-17 06:29:29', '17-03-2021 12:00:44 PM', 1),
(42, 5, '17303045@iubat.edu', 0x3a3a3100000000000000000000000000, '2021-03-18 01:50:08', NULL, 1),
(43, 5, '17303045@iubat.edu', 0x3a3a3100000000000000000000000000, '2021-03-19 12:39:45', NULL, 1),
(44, 5, '17303045@iubat.edu', 0x3a3a3100000000000000000000000000, '2021-03-19 13:03:10', '19-03-2021 06:34:02 PM', 1),
(45, 5, '17303045@iubat.edu', 0x3a3a3100000000000000000000000000, '2021-03-19 13:04:07', '19-03-2021 06:50:36 PM', 1),
(46, 5, '17303045@iubat.edu', 0x3a3a3100000000000000000000000000, '2021-03-23 12:53:38', '23-03-2021 06:23:50 PM', 1),
(47, NULL, 'admin', 0x3a3a3100000000000000000000000000, '2021-03-23 20:07:59', NULL, 0),
(48, 7, 'azharasel@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-23 20:08:59', NULL, 1),
(49, 7, 'azharasel@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-24 09:53:28', NULL, 1),
(50, 7, 'azharasel@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-24 10:42:19', '24-03-2021 04:17:01 PM', 1),
(51, 7, 'azharasel@gmail.com', 0x3132372e302e302e3100000000000000, '2021-03-24 11:01:24', '24-03-2021 04:31:59 PM', 1),
(52, 8, 'iamrasel@gmail.com', 0x3132372e302e302e3100000000000000, '2021-03-24 11:02:55', NULL, 1),
(53, 8, 'iamrasel@gmail.com', 0x3132372e302e302e3100000000000000, '2021-03-24 13:37:14', NULL, 1),
(54, 8, 'iamrasel@gmail.com', 0x3132372e302e302e3100000000000000, '2021-03-24 13:42:06', NULL, 1),
(55, 8, 'iamrasel@gmail.com', 0x3132372e302e302e3100000000000000, '2021-03-24 14:34:48', NULL, 1),
(56, 5, '17303045@iubat.edu', 0x3a3a3100000000000000000000000000, '2021-04-19 01:59:52', '19-04-2021 07:30:16 AM', 1),
(57, 5, '17303045@iubat.edu', 0x3a3a3100000000000000000000000000, '2021-04-19 13:28:36', '19-04-2021 06:58:48 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `address` longtext,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `address`, `city`, `gender`, `email`, `password`, `regDate`, `updationDate`) VALUES
(5, 'Avindra', 'bangladesh', 'dinajpur', 'male', '17303045@iubat.edu', '1e3adec1823d072f53db8db57d67bcc3', '2021-03-05 14:08:55', NULL),
(7, 'Rasel', 'Gopalpur', 'Dhaka', 'male', 'azharasel@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2021-03-23 20:08:50', NULL),
(8, 'testUser', 'adjh', 'asd ah', 'male', 'iamrasel@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2021-03-24 11:02:38', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctorId` (`doctorId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `doctorSpecialization` (`doctorSpecialization`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specilization_id` (`specilization_id`);

--
-- Indexes for table `doctorslog`
--
ALTER TABLE `doctorslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medic_list`
--
ALTER TABLE `medic_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_user`
--
ALTER TABLE `payment_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctorslog`
--
ALTER TABLE `doctorslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `medic_list`
--
ALTER TABLE `medic_list`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_user`
--
ALTER TABLE `payment_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`doctorId`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`doctorSpecialization`) REFERENCES `doctorspecilization` (`id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`specilization_id`) REFERENCES `doctorspecilization` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

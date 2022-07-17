-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 14, 2022 at 05:23 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u692894633_alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

CREATE TABLE `audit_trail` (
  `id` int(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `action_name` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `host` varchar(255) NOT NULL,
  `login_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`id`, `user_id`, `account_no`, `action`, `action_name`, `ip`, `host`, `login_time`) VALUES
(1, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-13-2022 10:14:17 PM'),
(2, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-13-2022 10:14:45 PM'),
(3, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-13-2022 10:15:39 PM'),
(4, 8, '22000008', 'account has been logged out', 'Admin . admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-13-2022 11:42:30 PM'),
(5, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-13-2022 11:44:39 PM'),
(6, 8, '22000008', 'account has been logged out', 'Admin . admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-13-2022 11:44:52 PM'),
(7, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-13-2022 11:46:41 PM'),
(8, 8, '22000008', 'account has been logged out', 'Admin . admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-13-2022 11:54:55 PM'),
(9, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-13-2022 11:54:58 PM'),
(10, 8, '22000008', 'account has been logged out', 'Admin . admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-13-2022 11:57:34 PM'),
(11, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-13-2022 11:57:36 PM'),
(12, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.33.171', '171.33.158.136.convergeict.com', 'Mar-14-2022 12:20:39 AM'),
(13, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.33.171', '171.33.158.136.convergeict.com', 'Mar-14-2022 12:22:58 AM'),
(14, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.33.171', '171.33.158.136.convergeict.com', 'Mar-14-2022 12:23:19 AM'),
(15, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 12:24:54 AM'),
(16, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 12:27:42 AM'),
(17, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 12:28:22 AM'),
(18, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 12:29:50 AM'),
(19, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 12:36:47 AM'),
(20, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 12:36:52 AM'),
(21, 8, '22000008', 'account has been logged out', 'Admin . admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 12:43:09 AM'),
(22, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 01:11:50 AM'),
(23, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 03:46:14 AM'),
(24, 8, '22000008', 'account has been logged out', 'Admin . admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 03:48:29 AM'),
(25, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 12:17:37 PM'),
(26, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 12:17:46 PM'),
(27, 8, '22000008', 'user account has been deleted', 'TEST T TEST', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 12:18:36 PM'),
(28, 8, '22000008', 'user account has been deleted', 'asdsadasdsa a asdasdasdasd', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 12:18:40 PM'),
(29, 8, '22000008', 'user account has been deleted', 'asdzxczxc z zxcasdasd', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 12:18:44 PM'),
(30, 8, '22000008', 'user account has been deleted', 'Admin a admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 12:18:48 PM'),
(31, 0, '22000009', 'account has been logged in', 'test T. Test', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 12:20:59 PM'),
(32, 0, '22000009', 'account has been logged in', 'test T. Test', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 12:21:10 PM'),
(33, 0, '22000009', 'user account has been deleted', 'Admin a Admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 12:24:00 PM'),
(34, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 01:17:55 PM'),
(35, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 01:17:59 PM'),
(36, 8, '22000008', 'user account has been deleted', 'TEST T TEST', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 01:21:57 PM'),
(37, 8, '22000008', 'user account has been deleted', 'asdsadasdsa a asdasdasdasd', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 01:22:01 PM'),
(38, 8, '22000008', 'user account has been deleted', 'asdzxczxc z zxcasdasd', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 01:22:04 PM'),
(39, 8, '22000008', 'user account has been deleted', 'test T Test', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 01:22:06 PM'),
(40, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 01:23:34 PM'),
(41, 8, '22000008', 'account has been logged in', 'Admin a. admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 01:23:36 PM'),
(42, 8, '22000008', 'account has been logged out', 'Admin . admin', '136.158.43.181', '181.43.158.136.convergeict.com', 'Mar-14-2022 01:23:44 PM');

-- --------------------------------------------------------

--
-- Table structure for table `datms_office`
--

CREATE TABLE `datms_office` (
  `off_id` int(100) NOT NULL,
  `off_code` varchar(100) NOT NULL,
  `off_name` varchar(255) NOT NULL,
  `off_location` varchar(255) NOT NULL,
  `off_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datms_office`
--

INSERT INTO `datms_office` (`off_id`, `off_code`, `off_name`, `off_location`, `off_date`) VALUES
(1, 'doc202224726989', 'College of Computer Studies', 'Program for logical people', 'Mar-04-2022 01:37:42 AM'),
(2, 'doc202243735074', 'CASE Department', 'Department of CASE Students', 'Mar-04-2022 02:05:23 PM'),
(3, 'doc202289852304', 'Registrar Department', 'A registrar\'s department is an essential unit within a college, university, or secondary school. The registrar\'s office provides a variety of services and supports for prospective students, current students, faculty, and staff related to: Marketing and re', 'Mar-04-2022 02:17:36 PM'),
(7, 'doc202256081427', 'Alumni Office', 'Alumni Office\n', 'Mar-14-2022 12:22:10 PM');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`) VALUES
(12, 'User Management');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `department_id`, `role`) VALUES
(1, 12, 'User Management Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `student_application`
--

CREATE TABLE `student_application` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `account_status` varchar(255) NOT NULL,
  `stud_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_application`
--

INSERT INTO `student_application` (`id`, `id_number`, `firstname`, `lastname`, `middlename`, `email`, `contact`, `address`, `course`, `gender`, `birthday`, `nationality`, `religion`, `civil_status`, `account_status`, `stud_date`) VALUES
(1, '22000001', 'Marivn', 'Marilao', 'L', 'marvinmarilao92@gmail.com', '9202966614', 'Ph. 2 Pkg. 2 Black 30 Lot 16 Bagong Silang Caloocan City 1428', 'BS Information Technology', 'Male', '1999-10-09', 'philippines', 'Roman Catholic', 'Single', 'Active', 'Mar-14-2022 01:31:03 AM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_access` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_number`, `password`, `last_access`) VALUES
(8, '22000008', '$2y$12$t0Yi3z6kcE5tispTKbkvlOVVBUQVj9H733Zlr7ds1yovkr4V9r6fa', '2022-03-13 15:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `office` varchar(50) NOT NULL,
  `department` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `account_status` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `admin` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`id`, `id_number`, `firstname`, `lastname`, `middlename`, `email`, `contact`, `address`, `office`, `department`, `role`, `account_status`, `about`, `admin`) VALUES
(8, '22000008', 'Admin', 'admin', 'a', 'admin@gmail.com', '9283972376', 'Unknown', 'Registrar Department', 'User Management', 'User Management Administrator', 'Active', 'NONE', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_trail`
--
ALTER TABLE `audit_trail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datms_office`
--
ALTER TABLE `datms_office`
  ADD PRIMARY KEY (`off_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department` (`department`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `student_application`
--
ALTER TABLE `student_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_number` (`id_number`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_trail`
--
ALTER TABLE `audit_trail`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `datms_office`
--
ALTER TABLE `datms_office`
  MODIFY `off_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `student_application`
--
ALTER TABLE `student_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

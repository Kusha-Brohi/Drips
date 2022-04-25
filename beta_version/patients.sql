-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 09:35 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drip`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_status` varchar(225) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `DOB` varchar(11) DEFAULT NULL,
  `MM` int(11) DEFAULT NULL,
  `YYY` int(11) DEFAULT NULL,
  `Gender` varchar(11) DEFAULT NULL,
  `material_status` varchar(11) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `Weight` int(11) DEFAULT NULL,
  `Lbs` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `Bmi` int(11) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `employment_status` varchar(255) DEFAULT NULL,
  `family_doc` varchar(255) DEFAULT NULL,
  `allergies` varchar(222) DEFAULT NULL,
  `medical_condition` varchar(222) DEFAULT NULL,
  `medical_condition2` varchar(222) DEFAULT NULL,
  `Surgeries1` varchar(222) DEFAULT NULL,
  `Surgeries2` varchar(222) DEFAULT NULL,
  `Surgeries3` text DEFAULT NULL,
  `Surgeries4` varchar(255) DEFAULT NULL,
  `Current_medication1` varchar(222) DEFAULT NULL,
  `Current_medication2` varchar(222) DEFAULT NULL,
  `family_medical_condition` varchar(222) DEFAULT NULL,
  `do_you_smoke` varchar(11) DEFAULT 'no',
  `do_u_tobacco` varchar(11) DEFAULT 'no',
  `do_u_Alcohol` varchar(11) DEFAULT 'no',
  `do_u_marijuana` varchar(22) DEFAULT 'no',
  `card` varchar(222) DEFAULT NULL,
  `card_num` text DEFAULT NULL,
  `card_holder` varchar(22) DEFAULT NULL,
  `validation` varchar(11) DEFAULT NULL,
  `Security_code` text DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `pic` varchar(225) DEFAULT NULL,
  `Quantity` varchar(255) DEFAULT NULL,
  `social_history` text DEFAULT NULL,
  `past_medical_history` text DEFAULT NULL,
  `past_condition2` text DEFAULT NULL,
  `past_condition3` text DEFAULT NULL,
  `past_condition4` text DEFAULT NULL,
  `mother_medical_condition` text DEFAULT NULL,
  `siblings_medical_condition` text DEFAULT NULL,
  `are_you_employed` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) NOT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `blood_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `customer_status`, `fname`, `lname`, `DOB`, `MM`, `YYY`, `Gender`, `material_status`, `phone`, `email`, `Weight`, `Lbs`, `height`, `Bmi`, `Address`, `employment_status`, `family_doc`, `allergies`, `medical_condition`, `medical_condition2`, `Surgeries1`, `Surgeries2`, `Surgeries3`, `Surgeries4`, `Current_medication1`, `Current_medication2`, `family_medical_condition`, `do_you_smoke`, `do_u_tobacco`, `do_u_Alcohol`, `do_u_marijuana`, `card`, `card_num`, `card_holder`, `validation`, `Security_code`, `updated_at`, `created_at`, `pic`, `Quantity`, `social_history`, `past_medical_history`, `past_condition2`, `past_condition3`, `past_condition4`, `mother_medical_condition`, `siblings_medical_condition`, `are_you_employed`, `job_title`, `employee_name`, `blood_type`) VALUES
(1, 16, NULL, NULL, 'patient12', '2006-11-11', 11, NULL, 'male', NULL, '3477323', 'patient@gmail.com', 22, NULL, 22, 22, 'test street', '', 'test', 'flu', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.', NULL, NULL, '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.', '1234Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.', NULL, NULL, NULL, NULL, 'visa', '1234567890', '1234567890', NULL, '134567890', '2021-05-31 11:05:58', '2021-05-31 11:05:58', 'uploads/patient/aaaa_1624301897.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL),
(2, 17, NULL, NULL, 'test', '11', 11, 11, 'male', NULL, '543543753', NULL, 22, NULL, NULL, NULL, 'dsg', 'sdsd', 'test test', NULL, 'dsd', 'dsada', 'dd', 'adsas', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull.', NULL, NULL, NULL, NULL, 'visa', '123456789', 'sdfd', NULL, '123456789', '2021-05-31 11:40:21', '2021-05-31 11:40:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL),
(3, 18, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, '543543753', NULL, 22, NULL, 22, 22, 'dsg', 'sdsd', 'test test', 'sdsad', 'dsd', 'dsada', 'adasd', 'adsas', NULL, NULL, 'sdsd', 'dsfs', 'dd', NULL, NULL, NULL, NULL, 'visa', '123456789', 'sdfd', NULL, '123456789', '2021-05-31 11:42:13', '2021-05-31 11:42:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL),
(4, 24, NULL, NULL, 'doe', '2004-04-08', NULL, NULL, NULL, NULL, '4565767677', NULL, 45, 43, 4, 345, 'test', 'test', 'test', 'test', 'test', 'test', 'hghg', 'bhbh', NULL, NULL, 'ggty', 'gftfy', 'gftyfty', NULL, NULL, NULL, NULL, '3q3443354', '3564545', '55456677', NULL, '14324567', '2021-06-14 04:47:28', '2021-06-14 04:47:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL),
(5, 26, '4', NULL, 'jack', '2015-01-08', NULL, NULL, NULL, NULL, '5465465', NULL, 233425, 456456, 567576, 66, 'tyu6t6', 'y6r67', 'rewwre', 'fgtdf', 'dfdd', 'ftft', 'drtrtdrt', 'tyy', NULL, NULL, '334', 'gffy', NULL, NULL, NULL, NULL, NULL, '13423422', '123456789', '123456789', NULL, '123456789', '2021-06-14 06:01:06', '2021-06-14 06:01:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL),
(6, 51, '4', NULL, 'doe', '2021-07-22', NULL, NULL, NULL, NULL, '1231', NULL, 123, NULL, 1231, 1, 'street1', 'ssdfsf', 'sfsdf', 'sfd', 'sfsf', 'sf', 'fsdf', 'sdfsf', NULL, NULL, 'sfsf', 'sfs', 'dfs', 'on', NULL, 'on', 'no', '123', '12312', '123', NULL, '1232131', '2021-07-09 08:02:56', '2021-07-09 08:02:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL),
(7, 53, '4', NULL, 'loen', '1995-11-11', NULL, NULL, NULL, NULL, '123456789', NULL, 11, NULL, 20, 275, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', NULL, NULL, 'test', 'test', 'test', 'on', NULL, 'on', 'no', '123456789', '123456789', '123456789', NULL, '123456789', '2021-07-12 13:03:32', '2021-07-12 13:03:32', NULL, NULL, 'test', 'test', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

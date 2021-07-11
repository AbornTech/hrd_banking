-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 04:02 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrd`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `alias` text NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `state` text NOT NULL,
  `district` text NOT NULL,
  `pincode` int(11) NOT NULL,
  `mobile` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `web_address` text NOT NULL,
  `cin` varchar(50) NOT NULL,
  `gstin` varchar(50) NOT NULL,
  `pan` varchar(20) NOT NULL,
  `incorporation_date` text NOT NULL,
  `authorised_capital` text NOT NULL,
  `paidup_capital` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`id`, `name`, `alias`, `address1`, `address2`, `state`, `district`, `pincode`, `mobile`, `phone`, `email`, `web_address`, `cin`, `gstin`, `pan`, `incorporation_date`, `authorised_capital`, `paidup_capital`) VALUES
(1, 'HRD NIDHI LIMITED', 'HRDNL', 'HRDNL Kasia Road, in front of Skylark Hotel', 'Corporation Bank', 'Uttar Pradesh', 'KUSHI NAGAR', 274304, '9115330222', '', 'hrdnidhilimited@gmail.com', 'www.hrdnl.com', 'U65999UP2019PLN123035', '', 'AAFCH0957H', '', '1000000', '20000000');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Admin'),
(2, 'users', 'Users');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(250) NOT NULL,
  `membership_no` varchar(250) NOT NULL,
  `enroll_date` date NOT NULL,
  `gender` varchar(25) NOT NULL,
  `marital_status` varchar(25) NOT NULL,
  `alternate_number` varchar(65) NOT NULL,
  `relative_type` varchar(65) NOT NULL,
  `relative_name` varchar(65) NOT NULL,
  `religion` varchar(65) NOT NULL,
  `member_group` int(250) NOT NULL,
  `member_title` varchar(65) NOT NULL,
  `member_name` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `primary_mobile_number` varchar(65) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mother_name` varchar(250) NOT NULL,
  `cast` varchar(250) NOT NULL,
  `introducer_member` int(250) NOT NULL,
  `latitude` varchar(250) NOT NULL,
  `longitude` varchar(250) NOT NULL,
  `aadhar_no` varchar(250) NOT NULL,
  `pan_no` varchar(250) NOT NULL,
  `voter_id` varchar(250) NOT NULL,
  `ration_card` varchar(250) NOT NULL,
  `driving_license` varchar(250) NOT NULL,
  `passport_no` varchar(250) NOT NULL,
  `status` tinyint(11) NOT NULL COMMENT '0 - pending 1- apporved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `membership_no`, `enroll_date`, `gender`, `marital_status`, `alternate_number`, `relative_type`, `relative_name`, `religion`, `member_group`, `member_title`, `member_name`, `dob`, `primary_mobile_number`, `email`, `mother_name`, `cast`, `introducer_member`, `latitude`, `longitude`, `aadhar_no`, `pan_no`, `voter_id`, `ration_card`, `driving_license`, `passport_no`, `status`) VALUES
(1, '', '2021-07-14', '1', '1', '8355067460', 'Father', '', '', 0, 'Mr.', 'ss', '2021-07-22', 'wwww', '', '', '', 0, '', '', '', '', '', '', '', '', 0),
(2, '', '2021-06-29', '1', '1', '9936113690', 'Father', 'Test2', 'Hindu', 2, 'Ms.', 'Test', '1995-07-17', '8355067460', 'ttest@gmail.com', 'Test', 'DD', 1, '12', '33', '31232321312', '321312312321', '23213213', '2321321321', '23213123', '12312334', 0),
(3, '', '2021-06-29', '1', '1', '', '', '', '', 0, 'Mr.', 'sss', '2021-07-01', 's', '', '', '', 0, '', '', '', '', '', '', '', '', 0),
(4, '', '2021-06-29', '1', '1', '', '', '', '', 0, 'Mr.', 'sss', '2021-07-01', 's', '', '', '', 0, '', '', '', '', '', '', '', '', 0),
(5, 'HR0000005', '2021-06-29', '1', '1', '', '', '', '', 0, 'Mr.', 'sss', '2021-07-01', 's', '', '', '', 0, '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member_groups`
--

CREATE TABLE `member_groups` (
  `id` int(250) NOT NULL,
  `group_name` varchar(250) NOT NULL,
  `under_group_id` int(250) NOT NULL,
  `remark` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_groups`
--

INSERT INTO `member_groups` (`id`, `group_name`, `under_group_id`, `remark`) VALUES
(1, 'ww', 2, 'ee'),
(2, 'qq', 0, '1212');

-- --------------------------------------------------------

--
-- Table structure for table `saving_acc_application`
--

CREATE TABLE `saving_acc_application` (
  `id` int(250) NOT NULL,
  `application_date` date NOT NULL,
  `application_no` varchar(250) NOT NULL,
  `member_id` int(250) NOT NULL,
  `joint_account` int(250) NOT NULL,
  `minor_id` int(250) NOT NULL,
  `agent_id` int(240) NOT NULL,
  `scheme_id` int(250) NOT NULL,
  `opening_amount` varchar(250) NOT NULL,
  `pay_mode` tinyint(11) NOT NULL,
  `bank_name` varchar(250) NOT NULL,
  `cheque_no` varchar(250) NOT NULL,
  `cheque_date` date NOT NULL,
  `bank_account_type` varchar(250) NOT NULL,
  `reference` varchar(250) NOT NULL,
  `status` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saving_acc_application`
--

INSERT INTO `saving_acc_application` (`id`, `application_date`, `application_no`, `member_id`, `joint_account`, `minor_id`, `agent_id`, `scheme_id`, `opening_amount`, `pay_mode`, `bank_name`, `cheque_no`, `cheque_date`, `bank_account_type`, `reference`, `status`) VALUES
(1, '2021-06-28', 'SA0001', 1, 1, 0, 2, 3, 'qqqq', 1, '', '', '0000-00-00', '', '', 0),
(2, '2021-07-02', 'SA0001', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(3, '2021-07-02', 'SA0001', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(4, '2021-07-02', 'SA0001', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(5, '2021-07-02', 'SA00001', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(6, '2021-07-02', 'SA00001', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(7, '2021-07-02', 'SA00001', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(8, '2021-07-02', 'SA00001', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(9, '2021-07-02', 'SA00001', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(10, '2021-07-02', 'SA00001', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(11, '2021-07-02', 'SA00012', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(12, '2021-07-02', 'SA00012', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(13, '2021-07-02', 'SA00013', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(14, '2021-07-02', 'SA00014', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(15, '2021-07-02', 'SA00015', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(16, '2021-07-02', 'SA00016', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(17, '2021-07-02', 'SA00017', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(18, '2021-07-02', 'SA00018', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(19, '2021-07-02', 'SA00019', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(20, '2021-07-02', 'SA00020', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(21, '2021-07-02', 'SA00021', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(22, '2021-07-02', 'SA00022', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(23, '2021-07-02', 'SA00023', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(24, '2021-07-02', 'SA00024', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(25, '2021-07-02', 'SA00025', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(26, '2021-07-02', 'SA00026', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(27, '2021-07-02', 'SA00027', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(28, '2021-07-02', 'SA00028', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0),
(29, '2021-07-02', 'SA00029', 2, 1, 0, 1, 3, 'www', 1, '', '', '0000-00-00', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `scheme`
--

CREATE TABLE `scheme` (
  `id` int(250) NOT NULL,
  `scheme_code` varchar(65) NOT NULL,
  `interest_payout` varchar(64) NOT NULL,
  `minimum_balance` varchar(65) NOT NULL,
  `scheme_name` varchar(65) NOT NULL,
  `interest_rate` varchar(65) NOT NULL,
  `is_active` tinyint(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scheme`
--

INSERT INTO `scheme` (`id`, `scheme_code`, `interest_payout`, `minimum_balance`, `scheme_name`, `interest_rate`, `is_active`, `created_date`, `is_deleted`) VALUES
(1, 'TEST1', 'Monthly', '89898', 'Scheme 1', '90', 1, '2021-07-10 17:17:14', 1),
(2, 'TEST1', 'Monthly', '89898', 'Scheme 1', '90', 1, '2021-07-10 17:18:29', 1),
(3, 'y', 'y', 'y', 'y', 'y', 1, '2021-07-10 17:19:17', 0),
(4, 'test2', 'Yeaf', '3993fff', 'we2', '2322', 1, '2021-07-10 17:20:47', 0),
(5, 'tetst', 'tetstett', 'tetst', 'tete', 'tetet', 1, '2021-07-10 17:21:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `parent_id` int(255) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `profile_pic` varchar(100) NOT NULL,
  `activation_code` varchar(100) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `salt` varchar(255) NOT NULL,
  `last_login` varchar(255) NOT NULL,
  `remember_code` varchar(50) NOT NULL,
  `city` varchar(200) DEFAULT NULL,
  `city_id` int(250) NOT NULL,
  `country_id` int(11) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL COMMENT '1 for direct user, 2 for company/agent',
  `forgotten_password_code` varchar(200) NOT NULL,
  `forgotten_password_time` varchar(200) NOT NULL,
  `age` varchar(10) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `allot_date` datetime DEFAULT NULL,
  `device_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parent_id`, `surname`, `name`, `last_name`, `email`, `mobile`, `password`, `address`, `profile_pic`, `activation_code`, `is_active`, `zip_code`, `salt`, `last_login`, `remember_code`, `city`, `city_id`, `country_id`, `dob`, `user_type`, `forgotten_password_code`, `forgotten_password_time`, `age`, `created`, `allot_date`, `device_id`) VALUES
(1, 0, '', 'Admin', 'Admin', 'admin@hrd.com', '8355067460', 'ab44f4d7b99367159fd28fee44d1b944f2cffbad', NULL, '', NULL, 1, NULL, '', '1626011855', '', NULL, 0, 0, '', 1, '', '', '25', '2015-04-12 16:26:07', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_groups`
--
ALTER TABLE `member_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saving_acc_application`
--
ALTER TABLE `saving_acc_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scheme`
--
ALTER TABLE `scheme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `member_groups`
--
ALTER TABLE `member_groups`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saving_acc_application`
--
ALTER TABLE `saving_acc_application`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `scheme`
--
ALTER TABLE `scheme`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 01, 2024 at 09:43 PM
-- Server version: 10.6.17-MariaDB
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psworksi_realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sno` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT '300x300.png',
  `forgot_key` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `permissions` longtext NOT NULL,
  `package` int(11) NOT NULL,
  `login_status` varchar(20) NOT NULL DEFAULT 'pending',
  `created_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `web_token` varchar(255) NOT NULL,
  `app_token` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sno`, `fullname`, `email`, `pass`, `phone`, `gender`, `img`, `forgot_key`, `role`, `permissions`, `package`, `login_status`, `created_date`, `modified_date`, `web_token`, `app_token`, `status`) VALUES
(1, 'Admin', 'rudra.pranay@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', '', 'user-icon.png', '', 'superadmin', '[]', 0, 'approve', '0000-00-00 00:00:00', NULL, '', '', 'active'),
(2, 'Admin', 'admin@nzrealty.com', '81dc9bdb52d04dc20036dbd8313ed055', '9603113211', 'male', 'user-icon.png', 'ODQzOA==', 'admin', '[{\"customers\":\"add\"},{\"companies\":\"add\"},{\"agents\":\"add\"},{\"packages\":\"add\"},{\"regions\":\"add\"},{\"districts\":\"add\"},{\"landlords\":\"add\"},{\"properties\":\"add\"},{\"p_amenities\":\"add\"},{\"suburbs\":\"add\"},{\"supplier_categories\":\"add\"},{\"supplier_services\":\"add\"},{\"popular_cities\":\"add\"},{\"client_logos\":\"add\"},{\"testimonials\":\"add\"},{\"settings\":\"edit\"},{\"customers\":\"edit\"},{\"companies\":\"edit\"},{\"agents\":\"edit\"},{\"packages\":\"edit\"},{\"regions\":\"edit\"},{\"districts\":\"edit\"},{\"landlords\":\"edit\"},{\"properties\":\"edit\"},{\"p_amenities\":\"edit\"},{\"suburbs\":\"edit\"},{\"supplier_categories\":\"edit\"},{\"supplier_services\":\"edit\"},{\"suppliers\":\"edit\"},{\"popular_cities\":\"edit\"},{\"client_logos\":\"edit\"},{\"testimonials\":\"edit\"},{\"terms\":\"edit\"},{\"privacy\":\"edit\"},{\"promotional\":\"edit\"},{\"customers\":\"delete\"},{\"companies\":\"delete\"},{\"agents\":\"delete\"},{\"packages\":\"delete\"},{\"landlords\":\"delete\"},{\"properties\":\"delete\"},{\"p_amenities\":\"delete\"},{\"supplier_categories\":\"delete\"},{\"supplier_services\":\"delete\"},{\"suppliers\":\"delete\"},{\"popular_cities\":\"delete\"},{\"client_logos\":\"delete\"},{\"testimonials\":\"delete\"},{\"customers\":\"view\"},{\"companies\":\"view\"},{\"agents\":\"view\"},{\"packages\":\"view\"},{\"regions\":\"view\"},{\"districts\":\"view\"},{\"landlords\":\"view\"},{\"properties\":\"view\"},{\"p_amenities\":\"view\"},{\"suburbs\":\"view\"},{\"supplier_categories\":\"view\"},{\"supplier_services\":\"view\"},{\"suppliers\":\"view\"},{\"popular_cities\":\"view\"},{\"client_logos\":\"view\"},{\"testimonials\":\"view\"},{\"terms\":\"view\"},{\"privacy\":\"view\"},{\"promotional\":\"view\"}]', 0, 'approve', '0000-00-00 00:00:00', NULL, '', '', 'active'),
(3, 'Company', 'email@company.com', '81dc9bdb52d04dc20036dbd8313ed055', '9603113211', 'male', '300x300.png', '', 'company', '[{\"agents\":\"add\"},{\"subscriptions\":\"add\"},{\"properties\":\"add\"},{\"property_schedules\":\"add\"},{\"property_visits\":\"add\"},{\"agents\":\"edit\"},{\"subscriptions\":\"edit\"},{\"properties\":\"edit\"},{\"property_schedules\":\"edit\"},{\"property_visits\":\"edit\"},{\"agents\":\"delete\"},{\"subscriptions\":\"delete\"},{\"properties\":\"delete\"},{\"property_schedules\":\"delete\"},{\"property_visits\":\"delete\"},{\"agents\":\"view\"},{\"subscriptions\":\"view\"},{\"properties\":\"view\"},{\"property_schedules\":\"view\"},{\"property_visits\":\"view\"}]', 0, 'approve', '0000-00-00 00:00:00', NULL, '', '', 'active'),
(4, 'Bhushan', 'bhushan145345@gmail.com', '9d7db78d9034aa5d1290cc7781b8f81a', '9603113211', '', '300x300.png', '', 'company', '[{\"customers\":\"add\"},{\"companies\":\"add\"},{\"agents\":\"add\"},{\"packages\":\"add\"},{\"properties\":\"add\"},{\"property_schedules\":\"add\"},{\"property_visits\":\"add\"},{\"customers\":\"edit\"},{\"companies\":\"edit\"},{\"agents\":\"edit\"},{\"packages\":\"edit\"},{\"properties\":\"edit\"},{\"property_schedules\":\"edit\"},{\"property_visits\":\"edit\"},{\"customers\":\"delete\"},{\"companies\":\"delete\"},{\"agents\":\"delete\"},{\"packages\":\"delete\"},{\"properties\":\"delete\"},{\"property_schedules\":\"delete\"},{\"property_visits\":\"delete\"},{\"customers\":\"view\"},{\"companies\":\"view\"},{\"agents\":\"view\"},{\"packages\":\"view\"},{\"properties\":\"view\"},{\"property_schedules\":\"view\"},{\"property_visits\":\"view\"}]', 0, 'pending', '2022-08-15 08:40:52', NULL, '', '', 'active'),
(5, 'Pranay', 'pranay@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '9030894779', '', '300x300.png', '', 'company', '[{\"customers\":\"add\"},{\"companies\":\"add\"},{\"agents\":\"add\"},{\"packages\":\"add\"},{\"properties\":\"add\"},{\"property_schedules\":\"add\"},{\"property_visits\":\"add\"},{\"customers\":\"edit\"},{\"companies\":\"edit\"},{\"agents\":\"edit\"},{\"packages\":\"edit\"},{\"properties\":\"edit\"},{\"property_schedules\":\"edit\"},{\"property_visits\":\"edit\"},{\"customers\":\"delete\"},{\"companies\":\"delete\"},{\"agents\":\"delete\"},{\"packages\":\"delete\"},{\"properties\":\"delete\"},{\"property_schedules\":\"delete\"},{\"property_visits\":\"delete\"},{\"customers\":\"view\"},{\"companies\":\"view\"},{\"agents\":\"view\"},{\"packages\":\"view\"},{\"properties\":\"view\"},{\"property_schedules\":\"view\"},{\"property_visits\":\"view\"}]', 3, 'pending', '2022-08-27 13:47:41', NULL, '', '', 'active'),
(6, 'Srikanth Real Estate Ltd', 'srikanthsamrat7@gmail.com', '49f3175a93cd22f5e345bca772f7c143', '0221878977', '', '300x300.png', '', 'company', '[{\"customers\":\"add\"},{\"companies\":\"add\"},{\"agents\":\"add\"},{\"packages\":\"add\"},{\"properties\":\"add\"},{\"property_schedules\":\"add\"},{\"property_visits\":\"add\"},{\"customers\":\"edit\"},{\"companies\":\"edit\"},{\"agents\":\"edit\"},{\"packages\":\"edit\"},{\"properties\":\"edit\"},{\"property_schedules\":\"edit\"},{\"property_visits\":\"edit\"},{\"customers\":\"delete\"},{\"companies\":\"delete\"},{\"agents\":\"delete\"},{\"packages\":\"delete\"},{\"properties\":\"delete\"},{\"property_schedules\":\"delete\"},{\"property_visits\":\"delete\"},{\"customers\":\"view\"},{\"companies\":\"view\"},{\"agents\":\"view\"},{\"packages\":\"view\"},{\"properties\":\"view\"},{\"property_schedules\":\"view\"},{\"property_visits\":\"view\"}]', 2, 'pending', '2022-08-27 16:33:20', NULL, '', '', 'active'),
(7, 'Bhushan', 'ps4works@gmail.com', 'f2eb053cc4626c3aec3a9aacd94dd35a', '9078563412', '', '300x300.png', '', 'company', '[{\"customers\":\"add\"},{\"companies\":\"add\"},{\"agents\":\"add\"},{\"packages\":\"add\"},{\"properties\":\"add\"},{\"property_schedules\":\"add\"},{\"property_visits\":\"add\"},{\"customers\":\"edit\"},{\"companies\":\"edit\"},{\"agents\":\"edit\"},{\"packages\":\"edit\"},{\"properties\":\"edit\"},{\"property_schedules\":\"edit\"},{\"property_visits\":\"edit\"},{\"customers\":\"delete\"},{\"companies\":\"delete\"},{\"agents\":\"delete\"},{\"packages\":\"delete\"},{\"properties\":\"delete\"},{\"property_schedules\":\"delete\"},{\"property_visits\":\"delete\"},{\"customers\":\"view\"},{\"companies\":\"view\"},{\"agents\":\"view\"},{\"packages\":\"view\"},{\"properties\":\"view\"},{\"property_schedules\":\"view\"},{\"property_visits\":\"view\"}]', 1, 'pending', '2022-08-30 11:47:41', NULL, '', '', 'active'),
(8, 'Srikanth Company', 'samratsrikanthgoud@gmail.com', '49f3175a93cd22f5e345bca772f7c143', '0221878977', '', '300x300.png', '', 'company', '[{\"customers\":\"add\"},{\"companies\":\"add\"},{\"agents\":\"add\"},{\"packages\":\"add\"},{\"properties\":\"add\"},{\"property_schedules\":\"add\"},{\"property_visits\":\"add\"},{\"customers\":\"edit\"},{\"companies\":\"edit\"},{\"agents\":\"edit\"},{\"packages\":\"edit\"},{\"properties\":\"edit\"},{\"property_schedules\":\"edit\"},{\"property_visits\":\"edit\"},{\"customers\":\"delete\"},{\"companies\":\"delete\"},{\"agents\":\"delete\"},{\"packages\":\"delete\"},{\"properties\":\"delete\"},{\"property_schedules\":\"delete\"},{\"property_visits\":\"delete\"},{\"customers\":\"view\"},{\"companies\":\"view\"},{\"agents\":\"view\"},{\"packages\":\"view\"},{\"properties\":\"view\"},{\"property_schedules\":\"view\"},{\"property_visits\":\"view\"}]', 3, 'pending', '2022-08-30 17:10:07', NULL, '', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `admin_sessions`
--

CREATE TABLE `admin_sessions` (
  `id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `last_activity` int(11) NOT NULL,
  `user_data` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_sessions`
--

INSERT INTO `admin_sessions` (`id`, `session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
(4884, 'b7601032b0a56b17f21e15edd4b9e0eb', '217.174.148.63', 'Wget/1.19.5 (linux-gnu)', 1714276801, ''),
(4885, 'd75326b4220d38032a19e480aa3aafb7', '49.43.219.157', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 1714281930, ''),
(4886, '190b1f14f05a441faf0ee27678e3444c', '49.44.80.231', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 1714281934, ''),
(4887, '14e5c3e6862d870639efd098a3318c78', '122.162.17.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 1714284273, 'a:1:{s:9:\"logged_in\";a:5:{s:4:\"name\";s:12:\"Rudra Pranay\";s:5:\"email\";s:22:\"rudra.pranay@gmail.com\";s:2:\"id\";s:1:\"2\";s:4:\"role\";s:4:\"user\";s:3:\"img\";s:26:\"profile_31641662536680.png\";}}'),
(4888, '7d424c43dba1c7b09c7168f36e0aa6b1', '122.162.17.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 1714282735, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"logged_in\";a:4:{s:4:\"name\";s:5:\"Admin\";s:5:\"email\";s:18:\"admin@nzrealty.com\";s:2:\"id\";s:1:\"2\";s:4:\"role\";s:5:\"admin\";}}'),
(4889, '0c65742283855d7f4d2acf1fc0510eef', '217.174.148.63', 'Wget/1.19.5 (linux-gnu)', 1714363202, ''),
(4891, '41ac5ba1a8b76203be3eb2f45cf59d5e', '49.205.252.196', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 1714365730, ''),
(4892, 'f4a0c459c24994e0dbce7c0b3454216f', '217.174.148.63', 'Wget/1.19.5 (linux-gnu)', 1714449602, ''),
(4893, '1cb31f88b98fd9789297e3876e299f8e', '217.174.148.63', 'Wget/1.19.5 (linux-gnu)', 1714536002, '');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `sno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `phone_2` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL DEFAULT '300x300.png',
  `address` varchar(255) NOT NULL,
  `company` int(11) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `servicearea` varchar(255) NOT NULL,
  `about` longtext NOT NULL,
  `package` int(11) NOT NULL,
  `languages` varchar(255) DEFAULT NULL,
  `qualification` text DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `login_status` enum('pending','approve') NOT NULL DEFAULT 'pending',
  `forgot_key` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`sno`, `name`, `phone`, `phone_2`, `email`, `password`, `img`, `address`, `company`, `position`, `experience`, `servicearea`, `about`, `package`, `languages`, `qualification`, `twitter`, `facebook`, `instagram`, `linkedin`, `login_status`, `forgot_key`, `created_date`, `modified_date`, `status`) VALUES
(1, 'Pranay', '2147483647', '0', '', NULL, '36afag18acaookwgsg.png', '', 1, '', '', '1', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '0000-00-00 00:00:00', NULL, 1),
(2, 'Rudra Pranay', '9030894779', '', 'rudra.pranay@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'profile_51301662527912.png', 'Hyderabad', 3, 'Business Development Manager', '6-12', '1', 'Description', 0, '1,2,3,5,6,15,21,23,33,49', 'Level 4 - Property Management Cert', 'https://www.twitter.com/ps4works', 'https://www.facebook.com/ps4works', 'https://www.instagram.com/ps4works', 'https://www.linkedin.com/ps4works', 'approve', NULL, '2023-05-07 14:23:27', '2024-01-30 14:19:29', 1),
(3, 'Pranay', '9030894779', '', 'pranay@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', '', 0, NULL, '0-', '', '', 5, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2022-08-27 13:45:52', '2023-10-25 12:49:34', 1),
(4, 'Shashi', '9603113211', '', 'bhushan145345@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', '', 3, '', '', '', 'ghg', 5, '2', '', '', '', '', '', 'approve', '30cfbc18de15f5d468156535695180e171fa92cc188245c4d8dcf7f01eb493ee', '2022-09-02 19:17:55', '2023-01-31 16:15:19', 0),
(5, 'Srikanth PM', '0221878977', '', 'srikanthsamrat7@gmail.com', '49f3175a93cd22f5e345bca772f7c143', '', '', 0, '', '', '', '', 5, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, '2022-09-02 19:17:51', NULL, 1),
(6, 'Samrat', '1234567890', '', 'samrat@noemail.com', '49f3175a93cd22f5e345bca772f7c143', 'profile_68931662713406.jpg', '', 4, 'Property Manager', '3-6', '', 'Massa tempor nec feugiat nisl pretium. Egestas fringilla phasellus faucibus scelerisque eleifend donec. Porta nibh venenatis cras sed felis eget velit aliquet. Neque volutpat ac tincidunt vitae semper quis lectus.', 0, '1,2,3,4,5', 'Level 4 Property Management - Skills\r\nReal Estate Salesperson - Skills', '', '', '', '', 'approve', NULL, '2022-09-09 14:20:05', '2023-04-11 13:09:05', 1),
(7, 'Srikanth', '9977997799', '', 'businesshubnz@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '300x300.png', '', 3, '', '0-0', '', '', 0, NULL, '', '', '', '', '', 'approve', NULL, '2022-09-10 15:41:48', '2023-06-22 17:36:40', 1),
(8, 'Sri', '997799997777', '', 'sri@noemail.com', '49f3175a93cd22f5e345bca772f7c143', '300x300.png', '', 0, '', '', '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, '2022-10-03 15:20:57', NULL, 1),
(9, 'Shashi', '998899776677', '', 'shashi@ps4works.in', '81dc9bdb52d04dc20036dbd8313ed055', '300x300.png', '', 4, '', '', '', 'dgszfdv ff f fghf ff f', 0, '1,4,5', NULL, '', '', '', '', 'approve', NULL, '2022-10-26 15:32:41', '2023-04-11 13:13:05', 0),
(10, 'SRK', '77777777777777', '', 'srk@noemail.com', '49f3175a93cd22f5e345bca772f7c143', '300x300.png', '', 0, NULL, NULL, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, '2022-10-29 18:00:43', NULL, 1),
(11, 'SRK', '77777777777777', '', 'srk@email.com', '49f3175a93cd22f5e345bca772f7c143', '300x300.png', '', 0, NULL, NULL, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, '2022-10-29 18:01:27', NULL, 1),
(12, 'SRK', '77777777777777', '', 'srik@noemail.com', '49f3175a93cd22f5e345bca772f7c143', '300x300.png', '', 0, NULL, NULL, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, '2022-10-29 18:01:46', NULL, 1),
(13, 'SRK', '77777777777777', '', 'srk@noemail.co.in', '49f3175a93cd22f5e345bca772f7c143', '300x300.png', '', 0, NULL, NULL, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, '2022-10-29 18:02:01', NULL, 1),
(14, 'SRK Private PM', '9999000099', '', 'srk@nomail.com', '49f3175a93cd22f5e345bca772f7c143', '300x300.png', '', 0, NULL, NULL, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, '2022-10-29 18:04:04', NULL, 1),
(15, 'Private PM Sri', '00000000000', '', 'samratsrikanthgoud@gmail.com', '49f3175a93cd22f5e345bca772f7c143', '300x300.png', '', 0, NULL, NULL, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, '2022-11-13 10:14:19', NULL, 1),
(18, 'com', '9876543210', '', 'com@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '300x300.png', 'asdasdasd', 0, 'asd', NULL, 'asd', '', 0, '1,2', 'sdf', NULL, NULL, NULL, NULL, 'pending', NULL, '2023-05-31 13:57:29', NULL, 1),
(19, 'Sumanth', '9876543210', '', 'sumanth@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '300x300.png', '', 3, 'BDM', '4-8', '', '', 0, '1,2', '', '', '', '', '', 'approve', NULL, '2023-01-31 16:05:34', '2023-01-31 16:15:24', 0),
(20, 'Agent Name', '6422896745', '', 'agentname@company.co.nz', '81dc9bdb52d04dc20036dbd8313ed055', '300x300.png', '', 14, 'Property Manager', '9-6', '', '', 0, '1,2,4,5', 'Graduation in Civil Engineering', '', '', '', '', 'approve', NULL, '2023-04-28 02:25:48', NULL, 1),
(21, 'Srikanth Company PM', '1234567899', '999999999999999', 'somikasiddagoni@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '7t0xl06wfwkkowkkc.jpeg', '', 16, 'Property Manager... DEMO', '4-6', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation', 0, '1,5', 'Skills Level 4 Property Management,\nSkills Level 5 Branch Manager,\nNZ Salesperson.', 'https://www.rentallistings.co.nz/', 'https://www.rentallistings.co.nz/', 'https://www.rentallistings.co.nz/', 'https://www.rentallistings.co.nz/', 'approve', NULL, '2023-06-05 05:14:04', '2023-10-22 12:39:14', 1),
(22, 'Testing', '111111111111', '', 'no@email.com', '81dc9bdb52d04dc20036dbd8313ed055', '300x300.png', '', 16, 'Letting Agent', '0-9', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation', 0, '1', NULL, 'https://www.rentallistings.co.nz/', NULL, NULL, NULL, 'approve', NULL, '2023-06-05 05:37:35', '2023-10-25 12:42:45', 0),
(23, 'Property Manager', '9876543210', '', 'pmanager@email.com', '81dc9bdb52d04dc20036dbd8313ed055', 'profile_73261686679539.png', '', 2, 'Property Manager Role', '4-8', '', 'About Property Manager', 0, '1,4', 'Graduation', '', 'www.facebook.com', 'www.instagram.com', '', 'approve', NULL, '2023-06-13 23:31:55', '2023-06-15 11:40:33', 1),
(24, 'Bhushan', '9078563412', '', 'bhushan@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '300x300.png', '', 3, 'Manager', '8-6', '', 'Working with Rental Listing is like having a family member who can fix everything. They know what you need, exactly when you need it. Working with Rental Listing is like having a family member who can fix everything. They know what you need, exactly when you need it. Working with Rental Listing is like having a family member who can fix everything. They know what you need, exactly when you need it. Working with Rental Listing is like having a family member who can fix everything. They know what you need, exactly when you need it. Working with Rental Listing is like having a family member who can fix everything. They know what you need, exactly when you need it. Working with Rental Listing is like having a family member who can fix everything. They know what you need, exactly when you need it.', 0, '1,2,4,5', 'Post Graduation', '', 'www.facebook.com', 'www.instagram.com', 'www.linkedin.com', 'approve', NULL, '2023-06-13 23:56:55', '2023-06-22 16:54:46', 0),
(25, 'Sandeep', '9876543210', '', 'sandeep@email.com', '81dc9bdb52d04dc20036dbd8313ed055', '300x300.png', '', 3, 'Manager', '6-8', '', 'Description about Sandeep will be here goes...', 0, '1,2,3,4,5', 'Post Graduation', 'www.twitter.com', 'www.facebook.com', '', '', 'approve', NULL, '2023-06-22 16:58:35', '2023-06-22 17:36:50', 1),
(26, 'Private PM', '123456789', '', 'private@pm.co.nz', '81dc9bdb52d04dc20036dbd8313ed055', '300x300.png', '', 0, '', '', '', '', 0, NULL, '', '', '', '', '', 'approve', NULL, '2023-07-18 16:17:44', '2023-11-23 13:25:16', 1),
(27, 'Harshita', '9347275025', '', 'harshi200128@gmail.com', '38ea73376be05a67aef6b2bdbe680ae8', '300x300.png', '', 0, NULL, NULL, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, '2023-10-07 18:05:48', NULL, 1),
(28, 'Pranay DEMO', '1212121233', '', 'info@rentallistings.co.nz', '81dc9bdb52d04dc20036dbd8313ed055', '2ckgg4falgw0ow0kck.jpg', '', 16, 'Senior Property Manager DEMO', '3-0', '', 'Lorem Ipsum', 0, '1,5', 'MBA, BBA', 'https://ps4works.in/', NULL, NULL, NULL, 'approve', NULL, '0000-00-00 00:00:00', '2023-10-22 12:46:42', 1),
(29, 'SRK PRIVATE AGENT', '111111111111111', '', 'support@rentallistings.co.nz', '81dc9bdb52d04dc20036dbd8313ed055', '19uo3ti4ywhwk408sg.jpg', '', 0, 'Private Agent', '5-0', '', 'Lorem Ipsum', 0, '5', 'LEVEL $ PM C NZ', 'https://www.rentallistings.co.nz/', NULL, NULL, NULL, 'approve', NULL, '0000-00-00 00:00:00', '2023-10-22 13:19:25', 1),
(30, 'Srikanth DEMO', '111111111', '', 'info000000@rentallistings.co.nz', '81dc9bdb52d04dc20036dbd8313ed055', '300x300.png', '', 2, 'DEMO PM', '2-3', '', 'Massa tempor nec feugiat nisl pretium. Egestas fringilla phasellus faucibus scelerisque eleifend donec. Porta nibh venenatis cras sed felis eget velit aliquet. Neque volutpat ac tincidunt vitae semper quis lectus. Turpis in eu mi bibendum neque egestas congue quisque. Sed elementum tempus egestas sed sed risus pretium quam. Dignissim sodales ut eu sem. Nibh mauris cursus mattis molestie a iaculis at erat pellentesque. Id interdum velit laoreet id donec ultrices tincidunt.', 0, '1,5', 'MBA, NZ Cert. in PM', 'https://www.rentallistings.co.nz/', 'https://www.rentallistings.co.nz/', 'https://www.rentallistings.co.nz/', 'https://www.rentallistings.co.nz/', 'approve', NULL, '2023-10-24 12:57:42', NULL, 1),
(33, 'Private Check', '1234567888', '', 'private@email.com', '81dc9bdb52d04dc20036dbd8313ed055', '300x300.png', '', 0, NULL, NULL, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, '2023-11-03 13:24:19', NULL, 1),
(32, 'For Emails Srikanth', '0221878977', '', 'rentallistings.co.nz@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'profile_73071698916510.jpg', '', 28, 'Head of PM', '3-6', '', 'Start by finding out what your rental property could be making you\r\nWe manage over 19,000 rental properties, with almost 300 dedicated property managers in 80 branches across Northland, Auckland and Tauranga. Let us optimise your returns and get you better rental rates.', 0, '1,2,3', 'PM Level 4', 'www.rentallistings.co.nz', '', 'https://www.rentallistings.co.nz/', '', 'approve', NULL, '2023-11-02 14:45:10', NULL, 1),
(34, 'Company PM New', '123456789', '', 'company@noemail.com', '81dc9bdb52d04dc20036dbd8313ed055', '300x300.png', '', 28, '', '0-0', '', '', 0, NULL, '', '', '', '', '', 'approve', NULL, '2023-11-03 13:30:02', NULL, 1),
(35, 'Sri PM 3', '1234567890', '', 'srikanth@noemail.co.nz', '81dc9bdb52d04dc20036dbd8313ed055', '300x300.png', '', 28, 'LEtting Agent', '1-7', '', 'Upload agent profile photo. Upload agent profile photo. Upload agent profile photo. Upload agent profile photo.', 0, '4,6,7,8,9,15,16', 'ABC', '', '', '', '', 'approve', NULL, '2023-11-07 15:15:44', '2023-11-17 18:02:20', 0),
(36, 'PM 4 but only 3 Agents Allowed', '99999999999', '', 'samratsrikanthgoud@noemail.com', '81dc9bdb52d04dc20036dbd8313ed055', '300x300.png', '', 28, 'ALL CAPS TO 1ST UPPER AND ALL LOWER', '2-6', '', 'USE PARAGRAPH STYLE.......       PACKAGE SELECTED IS SMALL(3 PMs/Agents) BUT ALLOWING TO ADD MORE THAN 3.', 0, '10,11', '', '', '', '', '', 'approve', NULL, '2023-11-07 15:17:28', '2023-11-17 18:02:16', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `agents_landlords`
-- (See below for the actual view)
--
CREATE TABLE `agents_landlords` (
`sno` int(11)
,`name` varchar(50)
,`type` varchar(8)
,`company` varchar(11)
,`companyname` varchar(53)
,`status` varchar(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `agents_request`
--

CREATE TABLE `agents_request` (
  `sno` int(11) NOT NULL,
  `agent` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `agents_request`
--

INSERT INTO `agents_request` (`sno`, `agent`, `user`, `name`, `email`, `phone`, `message`, `created_date`, `modified_date`, `status`) VALUES
(1, 2, 0, 'Pranay Rudra', 'rudra.pranay@gmail.com', '9030894779', 'Test Agent form', '2023-01-06 13:36:45', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `sno` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `date_time` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `change_type`
--

CREATE TABLE `change_type` (
  `ctid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `colname` varchar(255) NOT NULL,
  `changetype` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `change_type`
--

INSERT INTO `change_type` (`ctid`, `tid`, `colname`, `changetype`) VALUES
(1, 1, 'ipaddress', '{\"col_name\":\"ipaddress\",\"type\":\"textarea\"}'),
(2, 1, 'maintenance_mess', '{\"col_name\":\"maintenance_mess\",\"type\":\"textarea\"}'),
(7, 2, 'password', '{\"col_name\":\"password\",\"type\":\"password\",\"pencrypt\":\"md5\"}'),
(11, 7, 'servicearea', '{\"col_name\":\"servicearea\",\"type\":\"relation\",\"tablename\":\"suburbs\",\"valuename\":\"sno\",\"displayname\":\"suburb\",\"typename\":\"status\",\"typevalue\":\"1\"}'),
(13, 8, 'company', '{\"col_name\":\"company\",\"type\":\"relation\",\"tablename\":\"companies\",\"valuename\":\"sno\",\"displayname\":\"name\",\"typename\":\"status\",\"typevalue\":\"1\"}'),
(14, 8, 'servicearea', '{\"col_name\":\"aservicearea\",\"type\":\"relation\",\"tablename\":\"suburbs\",\"valuename\":\"sno\",\"displayname\":\"suburb\",\"typename\":\"status\",\"typevalue\":\"1\"}'),
(15, 10, 'package', '{\"col_name\":\"package\",\"type\":\"relation_depend\",\"tablename\":\"packages\",\"valuename\":\"sno\",\"displayname\":\"name\",\"typename\":\"status\",\"typevalue\":\"1\",\"dependvaluename\":\"user_type\",\"dependcolname\":\"type\"}'),
(16, 10, 'amount', '{\"col_name\":\"amount\",\"type\":\"none\"}'),
(17, 10, 'name', '{\"col_name\":\"name\",\"type\":\"relation\",\"tablename\":\"companies\",\"valuename\":\"sno\",\"displayname\":\"cname\",\"typename\":\"status\",\"typevalue\":\"1\"}'),
(18, 11, 'city_image', '{\"col_name\":\"city_image\",\"type\":\"image\",\"any\":\"\",\"width\":\"540\",\"height\":\"675\",\"crop\":\"ratio_crop\"}'),
(19, 13, 'city', '{\"col_name\":\"city\",\"type\":\"relation\",\"tablename\":\"cities\",\"valuename\":\"sno\",\"displayname\":\"city_name\",\"typename\":\"status\",\"typevalue\":\"1\"}'),
(20, 15, 'pro_pic', '{\"col_name\":\"pro_pic\",\"type\":\"image\",\"any\":\"\",\"width\":\"200\",\"height\":\"200\",\"crop\":\"ratio_crop\"}'),
(21, 18, 'region', '{\"col_name\":\"region\",\"type\":\"relation\",\"tablename\":\"regions\",\"valuename\":\"sno\",\"displayname\":\"region_name\",\"typename\":\"status\",\"typevalue\":\"1\"}'),
(22, 18, 'district', '{\"col_name\":\"district\",\"type\":\"relation_depend\",\"tablename\":\"districts\",\"valuename\":\"sno\",\"displayname\":\"district\",\"typename\":\"status\",\"typevalue\":\"1\",\"dependvaluename\":\"region\",\"dependcolname\":\"region\"}'),
(23, 11, 'region_image', '{\"col_name\":\"region_image\",\"type\":\"image\",\"any\":\"\",\"width\":\"540\",\"height\":\"675\",\"crop\":\"ratio_crop\"}'),
(24, 13, 'district_image', '{\"col_name\":\"district_image\",\"type\":\"image\",\"any\":\"\",\"width\":\"540\",\"height\":\"675\",\"crop\":\"ratio_crop\"}'),
(25, 13, 'region', '{\"col_name\":\"region\",\"type\":\"relation\",\"tablename\":\"regions\",\"valuename\":\"sno\",\"displayname\":\"region_name\",\"typename\":\"status\",\"typevalue\":\"1\"}'),
(26, 18, 'suburb_image', '{\"col_name\":\"suburb_image\",\"type\":\"image\",\"any\":\"\",\"width\":\"540\",\"height\":\"675\",\"crop\":\"ratio_crop\"}'),
(27, 16, 'region', '{\"col_name\":\"region\",\"type\":\"relation\",\"tablename\":\"regions\",\"valuename\":\"sno\",\"displayname\":\"region_name\",\"typename\":\"status\",\"typevalue\":\"1\"}'),
(28, 16, 'district', '{\"col_name\":\"district\",\"type\":\"relation_depend\",\"tablename\":\"districts\",\"valuename\":\"sno\",\"displayname\":\"district\",\"typename\":\"status\",\"typevalue\":\"1\",\"dependvaluename\":\"region\",\"dependcolname\":\"region\"}'),
(29, 16, 'suburb', '{\"col_name\":\"suburb\",\"type\":\"relation_depend\",\"tablename\":\"suburbs\",\"valuename\":\"sno\",\"displayname\":\"suburb\",\"typename\":\"status\",\"typevalue\":\"1\",\"dependvaluename\":\"district\",\"dependcolname\":\"district\"}'),
(30, 20, 'category', '{\"col_name\":\"category\",\"type\":\"relation\",\"tablename\":\"supplier_categories\",\"valuename\":\"sno\",\"displayname\":\"category\",\"typename\":\"status\",\"typevalue\":\"1\"}'),
(31, 21, 'region', '{\"col_name\":\"region\",\"type\":\"relation\",\"tablename\":\"regions\",\"valuename\":\"sno\",\"displayname\":\"region_name\",\"typename\":\"status\",\"typevalue\":\"1\"}'),
(32, 21, 'district', '{\"col_name\":\"district\",\"type\":\"relation_depend\",\"tablename\":\"districts\",\"valuename\":\"sno\",\"displayname\":\"district\",\"typename\":\"status\",\"typevalue\":\"1\",\"dependvaluename\":\"region\",\"dependcolname\":\"region\"}'),
(33, 21, 'suburbs', '{\"col_name\":\"suburbs\",\"type\":\"relation_depend\",\"tablename\":\"suburbs\",\"valuename\":\"sno\",\"displayname\":\"suburb\",\"typename\":\"status\",\"typevalue\":\"1\",\"dependvaluename\":\"district\",\"dependcolname\":\"district\"}'),
(34, 21, 'category', '{\"col_name\":\"category\",\"type\":\"relation\",\"tablename\":\"supplier_categories\",\"valuename\":\"sno\",\"displayname\":\"category\",\"typename\":\"status\",\"typevalue\":\"1\"}'),
(35, 21, 'services', '{\"col_name\":\"services\",\"type\":\"relation_depend\",\"tablename\":\"supplier_services\",\"valuename\":\"sno\",\"displayname\":\"service_name\",\"typename\":\"status\",\"typevalue\":\"1\",\"dependvaluename\":\"category\",\"dependcolname\":\"category\"}'),
(36, 21, 'logo', '{\"col_name\":\"logo\",\"type\":\"image\",\"any\":\"\",\"width\":\"400\",\"height\":\"400\",\"crop\":\"ratio_crop\"}'),
(37, 21, 'banner', '{\"col_name\":\"banner\",\"type\":\"image\",\"any\":\"\",\"width\":\"400\",\"height\":\"250\",\"crop\":\"ratio_crop\"}'),
(38, 21, 'service_areas', '{\"col_name\":\"service_areas\",\"type\":\"relation\",\"tablename\":\"suburbs\",\"valuename\":\"sno\",\"displayname\":\"suburb\",\"typename\":\"status\",\"typevalue\":\"1\"}'),
(39, 16, 'agent', '{\"col_name\":\"agent\",\"type\":\"relation_depend\",\"tablename\":\"agents_landlords\",\"valuename\":\"sno\",\"displayname\":\"name\",\"typename\":\"status\",\"typevalue\":\"1\",\"dependvaluename\":\"type\",\"dependcolname\":\"role\"}'),
(40, 22, 'property', '{\"col_name\":\"property\",\"type\":\"relation\",\"tablename\":\"properties\",\"valuename\":\"sno\",\"displayname\":\"address\",\"typename\":\"status\",\"typevalue\":\"1\"}'),
(41, 23, 'property', '{\"col_name\":\"property\",\"type\":\"relation\",\"tablename\":\"properties\",\"valuename\":\"sno\",\"displayname\":\"address\",\"typename\":\"status\",\"typevalue\":\"1\"}'),
(42, 23, 'user', '{\"col_name\":\"user\",\"type\":\"relation\",\"tablename\":\"customers\",\"valuename\":\"sno\",\"displayname\":\"name\",\"typename\":\"status\",\"typevalue\":\"1\"}'),
(43, 25, 'cimage', '{\"col_name\":\"cimage\",\"type\":\"image\",\"any\":\"\",\"width\":\"540\",\"height\":\"675\",\"crop\":\"ratio_crop\"}'),
(44, 26, 'cimage', '{\"col_name\":\"cimage\",\"type\":\"image\",\"any\":\"\",\"width\":\"160\",\"height\":\"90\",\"crop\":\"manual_crop\"}'),
(45, 2, 'img', '{\"col_name\":\"img\",\"type\":\"image\",\"any\":\"\",\"width\":\"300\",\"height\":\"300\",\"crop\":\"ratio_crop\"}'),
(46, 7, 'img', '{\"col_name\":\"img\",\"type\":\"image\",\"any\":\"\",\"width\":\"400\",\"height\":\"100\",\"crop\":\"ratio_crop\"}'),
(47, 7, 'logo', '{\"col_name\":\"logo\",\"type\":\"image\",\"any\":\"\",\"width\":\"300\",\"height\":\"100\",\"crop\":\"manual_crop\"}'),
(48, 7, 'package', '{\"col_name\":\"package\",\"type\":\"relation\",\"tablename\":\"packages\",\"valuename\":\"sno\",\"displayname\":\"name\",\"typename\":\"status\",\"typevalue\":\"1\"}'),
(49, 7, 'languages', '{\"col_name\":\"languages\",\"type\":\"none\"}'),
(50, 15, 'img', '{\"col_name\":\"img\",\"type\":\"image\",\"any\":\"\",\"width\":\"400\",\"height\":\"400\",\"crop\":\"ratio_crop\"}'),
(51, 15, 'languages', '{\"col_name\":\"languages\",\"type\":\"none\"}'),
(52, 28, 'user_image', '{\"col_name\":\"user_image\",\"type\":\"image\",\"any\":\"\",\"width\":\"120\",\"height\":\"120\",\"crop\":\"ratio_crop\"}'),
(53, 8, 'img', '{\"col_name\":\"img\",\"type\":\"image\",\"any\":\"\",\"width\":\"400\",\"height\":\"400\",\"crop\":\"ratio_crop\"}'),
(54, 8, 'about', '{\"col_name\":\"about\",\"type\":\"textarea\"}'),
(55, 8, 'qualification', '{\"col_name\":\"qualification\",\"type\":\"textarea\"}'),
(56, 10, 'user', '{\"col_name\":\"user\",\"type\":\"relation\",\"tablename\":\"companies\",\"valuename\":\"sno\",\"displayname\":\"name\",\"typename\":\"status\",\"typevalue\":\"1\"}'),
(57, 16, 'other', '{\"col_name\":\"other\",\"type\":\"textarea\"}'),
(58, 16, 'description', '{\"col_name\":\"description\",\"type\":\"textarea\"}'),
(59, 16, 'features', '{\"col_name\":\"features\",\"type\":\"textarea\"}'),
(60, 16, 'assignto', '{\"col_name\":\"assignto\",\"type\":\"relation_depend\",\"tablename\":\"agents_landlords\",\"valuename\":\"sno\",\"displayname\":\"name\",\"typename\":\"status\",\"typevalue\":\"1\",\"dependvaluename\":\"company\",\"dependcolname\":\"agent\"}'),
(61, 7, 'longitude', '{\"col_name\":\"longitude\",\"type\":\"none\"}'),
(62, 16, 'role', '{\"col_name\":\"role\",\"type\":\"select\",\"stype\":\"select\",\"s_selected\":\"\",\"s_options\":\"agents,landlord\"}'),
(63, 16, 'p_type', '{\"col_name\":\"p_type\",\"type\":\"relation_depend\",\"tablename\":\"property_category\",\"valuename\":\"name\",\"displayname\":\"value\",\"typename\":\"status\",\"typevalue\":\"1\",\"dependvaluename\":\"type\",\"dependcolname\":\"type\"}'),
(64, 16, 'pointer', '{\"col_name\":\"pointer\",\"type\":\"map\",\"point\":\"point\",\"latitude\":\"-42.1\",\"longitude\":\"172.77\"}'),
(65, 7, 'pointer', '{\"col_name\":\"pointer\",\"type\":\"map\",\"point\":\"point\",\"latitude\":\"-42.1\",\"longitude\":\"172.77\"}'),
(66, 8, 'password', '{\"col_name\":\"password\",\"type\":\"password\",\"pencrypt\":\"md5\"}'),
(67, 7, 'password', '{\"col_name\":\"password\",\"type\":\"password\",\"pencrypt\":\"md5\"}'),
(68, 15, 'password', '{\"col_name\":\"password\",\"type\":\"password\",\"pencrypt\":\"md5\"}'),
(69, 23, 'day_date', '{\"col_name\":\"day_date\",\"type\":\"relation_depend\",\"tablename\":\"property_schedules\",\"valuename\":\"date\",\"displayname\":\"date\",\"typename\":\"status\",\"typevalue\":\"1\",\"dependvaluename\":\"property\",\"dependcolname\":\"property\"}'),
(70, 7, 'about', '{\"col_name\":\"about\",\"type\":\"textarea\"}');

-- --------------------------------------------------------

--
-- Table structure for table `client_logos`
--

CREATE TABLE `client_logos` (
  `sno` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `cimage` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `client_logos`
--

INSERT INTO `client_logos` (`sno`, `city_name`, `cimage`, `url`, `status`) VALUES
(1, 'Urban Home Realestate', 'wmyqxe2s4e8w88s4ks.png', '', 1),
(10, 'Real Estate 2', '26j7zfjp16zosgscsc.png', '', 1),
(6, 'House Premium', 'r474ri9dd7kgk00c0w.png', '', 1),
(7, 'Bastille Property Management', 'f4t2t05uvpk4ck8cwc.png', '', 1),
(8, 'EcoHouse Company', 'g9gm5rnu7k00o8080c.png', '', 1),
(9, 'Real Estate', '2ibygzbexl6o808cc4.jpg', '', 1),
(11, 'Barfoot & Thompson', 'bipb30ojn1sssw8w4.jpg', 'https://www.rentallistings.co.nz/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `sno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `package` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `website` varchar(50) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `bgcolor` varchar(10) NOT NULL DEFAULT '#163c5d',
  `about` longtext NOT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `pointer` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `servicearea` varchar(255) NOT NULL,
  `languages` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `login_status` enum('pending','approve') NOT NULL DEFAULT 'pending',
  `forgot_key` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`sno`, `name`, `email`, `password`, `package`, `phone`, `fax`, `website`, `img`, `logo`, `bgcolor`, `about`, `latitude`, `longitude`, `pointer`, `address`, `servicearea`, `languages`, `twitter`, `facebook`, `instagram`, `linkedin`, `login_status`, `forgot_key`, `created_date`, `modified_date`, `status`) VALUES
(1, 'PS Infosys Realty Services', '', '', 0, '2147483647', '0', 'www.ps4works.in', NULL, 'tm8zpdn9k28cwo04c.png', '#163c5d', '', NULL, NULL, '', '', '1', NULL, '', '', '', '', 'pending', NULL, '0000-00-00 00:00:00', NULL, 1),
(2, 'PS4INFRA', 'rudra.pranay@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, '9030894779', '123456', 'https://ps4works.in', 'profile_26741662540496.png', NULL, '#4e8a42', 'About Company', '-42.87928274039802', '171.01258831874998', '-42.87928274039802,171.01258831874998', 'Queenstown, New Zealand', '', '1,2,5', NULL, NULL, NULL, NULL, 'approve', NULL, '2023-09-06 11:50:31', '2023-11-03 18:40:51', 1),
(3, 'PS4WORKS', 'ps4works@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, '8765432109', '1234567890', 'https://www.ps4works.in', 'profile_10831674043288.png', '7qxpj54y0cg0ks8o88.png', '#1d3458', '<p>Description about company will be placed here dynamically.</p>\n\n<div data-inspect-element=\"inspectElement\" id=\"inspect-element-top-layer\" popover=\"auto\" style=\"pointer-events: none; border: unset; padding: 0px;\">&nbsp;</div>', '-36.882657', '174.679264', '-36.882657,174.679264', 'Columbus Coffee, 391 Rosebank Road, Avondale, Auckland, Auckland 1026, New Zealand', 'qweqwewqe', '1,2,4', NULL, NULL, NULL, NULL, 'approve', NULL, '2023-06-14 00:18:19', '2023-06-22 17:03:08', 1),
(25, 'ABCDE', 'abcde@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 3, '111111111', NULL, '', NULL, NULL, '#163c5d', '', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2023-11-01 14:39:25', NULL, 1),
(5, 'Sri', 'sri@noemail.com', '49f3175a93cd22f5e345bca772f7c143', 2, '997799997777', NULL, '', NULL, NULL, '#163c5d', '', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2022-10-03 15:23:14', NULL, 1),
(6, 'Srik Test', 'srikanth@noemail.com', '49f3175a93cd22f5e345bca772f7c143', 2, '121212121212', NULL, '', NULL, NULL, '#163c5d', '', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2022-11-29 16:37:23', NULL, 1),
(7, 'Company', 'company@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, '1234567890', NULL, '', NULL, NULL, '#163c5d', '', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, 'approve', NULL, '2023-01-05 12:27:11', NULL, 1),
(11, 'com', 'com@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, '9876543210', NULL, '', NULL, NULL, '#163c5d', '', '-42.1', ' 172.77', '-42.1, 172.77', '', '', NULL, NULL, NULL, NULL, NULL, 'approve', NULL, '2023-01-05 21:58:24', '2023-12-12 12:34:42', 0),
(12, 'Demo', 'demo@noemail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, '135792468', NULL, '', NULL, NULL, '#163c5d', '', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2023-01-13 18:24:10', NULL, 1),
(13, 'Test', 'test@email.com', '81dc9bdb52d04dc20036dbd8313ed055', 3, '123456789', NULL, '', NULL, NULL, '#163c5d', '', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2023-01-16 01:53:30', NULL, 1),
(14, 'Your Company Name', 'bhushan145345@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, '9603113211', '7890123476', 'https://www.yourcompanyname.com', NULL, NULL, '#163c5d', '', '-36.8840258', '174.6844018', '-36.8840258,174.6844018', 'Rosebank Road, Avondale, Auckland 1026, New Zealand', '', NULL, NULL, NULL, NULL, NULL, 'approve', NULL, '2023-04-28 02:00:19', '2023-04-28 02:18:24', 1),
(15, 'ABC', 'abc@noemail.com', '49f3175a93cd22f5e345bca772f7c143', 3, '111122223333', NULL, '', NULL, NULL, '#163c5d', '', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2023-05-18 01:19:45', NULL, 1),
(29, 'Package Demo', '1234@gmail.co.nz', '81dc9bdb52d04dc20036dbd8313ed055', 1, '1234567855', NULL, '', NULL, NULL, '#163c5d', '', '-42.1', ' 172.77', '-42.1, 172.77', '', '', NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2023-11-03 13:09:05', '2023-12-12 12:36:16', 0),
(17, 'adsdsgf', 'harshi200128@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '9876543210', NULL, '', NULL, NULL, '#163c5d', '', '-42.1', ' 172.77', '-42.1, 172.77', '', '', NULL, NULL, NULL, NULL, NULL, 'approve', NULL, '2023-05-31 13:50:09', NULL, 1),
(18, 'Company Name #2', 'demo@companyname.co.nz', 'fe01ce2a7fbac8fafaed7c982a04e229', 2, '091234567', NULL, '', NULL, NULL, '#163c5d', '', '-45.67715608926799', '170.22117187500004', '-45.67715608926799,170.22117187500004', '', '', NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2023-09-11 15:14:35', '2023-10-21 13:29:31', 1),
(24, 'Demo SRK', 'somikasiddagoni@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, '11111111111', '22222222222222', 'https://www.rentallistings.co.nz/', 'bpki9tcttegco0wkgs.png', NULL, '#0f3762', '<p>Lorem Ipsum..............</p>\n\n<div id=\"inspect-element-top-layer\" style=\"pointer-events: none; border: unset; padding: 0px;\">&nbsp;</div>\n\n<div id=\"inspect-element-top-layer\" style=\"pointer-events: none; border: unset; padding: 0px;\">&nbsp;</div>\n\n<div id=\"inspect-element-top-layer\" style=\"pointer-events: none; border: unset; padding: 0px;\">&nbsp;</div>\n\n<div id=\"inspect-element-top-layer\" style=\"pointer-events: none; border: unset; padding: 0px;\">&nbsp;</div>\n\n<div id=\"inspect-element-top-layer\" style=\"pointer-events: none; border: unset; padding: 0px;\">&nbsp;</div>\n\n<div id=\"inspect-element-top-layer\" style=\"pointer-events: none; border: unset; padding: 0px;\">&nbsp;</div>\n\n<div id=\"inspect-element-top-layer\" style=\"pointer-events: none; border: unset; padding: 0px;\">&nbsp;</div>\n\n<div id=\"inspect-element-top-layer\" style=\"pointer-events: none; border: unset; padding: 0px;\">&nbsp;</div>\n\n<div id=\"inspect-element-top-layer\" style=\"pointer-events: none; border: unset; padding: 0px;\">&nbsp;</div>\n\n<div id=\"inspect-element-top-layer\" style=\"pointer-events: none; border: unset; padding: 0px;\">&nbsp;</div>\n\n<div id=\"inspect-element-top-layer\" style=\"pointer-events: none; border: unset; padding: 0px;\">&nbsp;</div>\n\n<div id=\"inspect-element-top-layer\" style=\"pointer-events: none; border: unset; padding: 0px;\">&nbsp;</div>\n\n<div data-inspect-element=\"inspectElement\" id=\"inspect-element-top-layer\" popover=\"auto\" style=\"pointer-events: none; border: unset; padding: 0px;\">&nbsp;</div>', '-36.8993841', '174.6317046', '-36.8993841,174.6317046', '36 Seymour Road, Sunnyvale, Auckland 0612, New Zealand', '', '3,5', 'https://www.rentallistings.co.nz/', 'https://www.rentallistings.co.nz/', 'https://www.rentallistings.co.nz/', 'https://www.rentallistings.co.nz/', 'approve', NULL, '0000-00-00 00:00:00', '2023-10-21 14:45:41', 1),
(28, 'For Emails Demo Company', 'samratsrikanthgoud@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, '0912345678', '123456789', 'https://www.rentallistings.co.nz', 'rl0mpzs4e00ksskk40.png', NULL, '#f28507', '<p>Start by finding out what your rental property could be making you We manage over 19,000 rental properties, with almost 300 dedicated property managers in 80 branches across Northland, Auckland and Tauranga. Let us optimise your returns and get you better rental rates.</p>', '-36.9130448', '174.6737454', '-36.9130448,174.6737454', '40F Titirangi Road, New Lynn, Auckland 0600, New Zealand', '', '1,2,3,4,5', 'https://www.rentallistings.co.nz', 'https://www.rentallistings.co.nz', NULL, NULL, 'approve', '6ac88bc6c4d485dbf4109e1e56c8fb5e0e039ff9c9f1bd9e92dffa507943f015', '2023-11-02 13:52:54', '2023-11-07 15:09:49', 1),
(30, 'Package Test', 'package@rentallistings.co.nz', '81dc9bdb52d04dc20036dbd8313ed055', 11, '123123123', NULL, '', NULL, NULL, '#163c5d', '', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2024-01-02 14:01:16', NULL, 1),
(33, 'Pranay', 'rudra.pranay1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, '9998887776', NULL, '', NULL, NULL, '#163c5d', '', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, 'approve', NULL, '2024-03-26 12:34:13', NULL, 1),
(34, 'Package Testing', 'somikasamrat@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, '12345678910', '9988776655', 'www.rentallistings.co.nz', 'profile_660e70de1e1d693341712222430.jpg', NULL, '#f5adef', 'Company for testing package and invoicing\r\nfree 12 months concept check', '-36.8993841', '174.6317046', '-36.8993841,174.6317046', '36 Seymour Road, Sunnyvale, Auckland 0612, New Zealand', '', '29,40,52', 'www.rentallistings.co.nz', 'www.rentallistings.co.nz', 'www.rentallistings.co.nz', 'www.rentallistings.co.nz', 'approve', NULL, '2024-04-04 14:38:55', '2024-04-04 14:50:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `companies_request`
--

CREATE TABLE `companies_request` (
  `sno` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `companies_request`
--

INSERT INTO `companies_request` (`sno`, `company`, `user`, `name`, `email`, `phone`, `message`, `created_date`, `modified_date`, `status`) VALUES
(1, 0, 0, 'Pranay', 'rudra.pranay@gmail.com', '9030894779', 'Test form company', '2023-01-06 13:43:18', NULL, 1),
(2, 3, 0, 'fdfsd', 'ffsfgfsg@fdsf.df', '9030894779', 'vxczv', '2023-01-06 13:46:30', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `create_table`
--

CREATE TABLE `create_table` (
  `cid` int(11) NOT NULL,
  `cttitle` varchar(255) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `table_type` enum('cms','custom') NOT NULL,
  `icon` varchar(255) NOT NULL,
  `bg_color` varchar(50) NOT NULL,
  `permissions` text NOT NULL,
  `rename_column` longtext NOT NULL,
  `pattern` longtext NOT NULL,
  `required_fields` longtext NOT NULL,
  `hidden` longtext NOT NULL,
  `order_by` varchar(255) NOT NULL,
  `menu_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `create_table`
--

INSERT INTO `create_table` (`cid`, `cttitle`, `table_name`, `table_type`, `icon`, `bg_color`, `permissions`, `rename_column`, `pattern`, `required_fields`, `hidden`, `order_by`, `menu_order`) VALUES
(1, 'Maintenance Mode', 'settings', 'cms', 'fas fa-cogs', '', '{\"count\":null,\"count_menu\":null,\"display\":null,\"title\":\"inactive\",\"add\":\"inactive\",\"edit\":\"active\",\"view\":\"inactive\",\"remove\":\"inactive\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"inactive\",\"numbers\":\"inactive\",\"pagination\":\"inactive\",\"limitlist\":\"inactive\",\"sortable\":\"inactive\",\"list\":null}', '{\"id\":\"Id\",\"theme\":\"Theme\",\"button\":\"Button\",\"title\":\"Title\",\"logo\":\"Logo\",\"favicon\":\"Favicon\",\"loginbg\":\"Loginbg\",\"menu\":\"Menu\",\"sentmail\":\"Sentmail\",\"footer_left\":\"Footer_left\",\"footer_right\":\"Footer_right\",\"maintenance\":\"Maintenance\",\"maintenance_mess\":\"Message\",\"ipaddress\":\"IP Addresses\",\"display_errors\":\"Display_errors\",\"display\":\"Display\"}', '{\"id\":\"\",\"theme\":\"\",\"button\":\"\",\"title\":\"\",\"logo\":\"\",\"favicon\":\"\",\"loginbg\":\"\",\"menu\":\"\",\"sentmail\":\"\",\"footer_left\":\"\",\"footer_right\":\"\",\"maintenance\":\"\",\"maintenance_mess\":\"\",\"ipaddress\":\"\",\"display_errors\":\"\",\"display\":\"\"}', '{\"id\":\"required\",\"theme\":\"required\",\"button\":\"required\",\"title\":\"required\",\"logo\":\"required\",\"favicon\":\"required\",\"loginbg\":\"required\",\"menu\":\"required\",\"sentmail\":\"required\",\"footer_left\":\"required\",\"footer_right\":\"required\",\"maintenance\":\"required\",\"maintenance_mess\":\"required\",\"ipaddress\":\"required\",\"display_errors\":\"required\",\"display\":\"required\"}', '{\"id\":\"show\",\"theme\":\"hidden\",\"button\":\"hidden\",\"title\":\"hidden\",\"logo\":\"hidden\",\"favicon\":\"hidden\",\"loginbg\":\"hidden\",\"menu\":\"hidden\",\"sentmail\":\"hidden\",\"footer_left\":\"hidden\",\"footer_right\":\"hidden\",\"maintenance\":\"show\",\"maintenance_mess\":\"show\",\"ipaddress\":\"show\",\"display_errors\":\"hidden\",\"display\":\"hidden\"}', '{\"id\":\"asc\"}', 0),
(2, 'Users', 'customers', 'cms', 'fa fa-users', '', '{\"count\":\"show\",\"count_menu\":null,\"display\":\"show\",\"title\":\"inactive\",\"add\":\"active\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"active\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"active\",\"numbers\":\"active\",\"pagination\":\"active\",\"limitlist\":\"active\",\"sortable\":\"active\",\"list\":null}', '{\"sno\":\"Sno\",\"name\":\"Name\",\"phone\":\"Phone\",\"password\":\"Password\",\"img\":\"Image\",\"email\":\"Email\",\"address\":\"Address\",\"login_status\":\"Login Status\",\"forgot_key\":\"Forgot_key\",\"created_date\":\"Created Date\",\"modified_date\":\"Modified Date\",\"status\":\"Status\"}', '{\"sno\":\"\",\"name\":\"\",\"phone\":\"\",\"password\":\"\",\"img\":\"\",\"email\":\"email\",\"address\":\"\",\"login_status\":\"\",\"forgot_key\":\"\",\"created_date\":\"\",\"modified_date\":\"\",\"status\":\"\"}', '{\"sno\":\"required\",\"name\":\"required\",\"phone\":\"not_required\",\"password\":\"not_required\",\"img\":\"not_required\",\"email\":\"required\",\"address\":\"not_required\",\"login_status\":\"required\",\"forgot_key\":\"not_required\",\"created_date\":\"not_required\",\"modified_date\":\"not_required\",\"status\":\"required\"}', '{\"sno\":\"show\",\"name\":\"show\",\"phone\":\"show\",\"password\":\"show\",\"img\":\"show\",\"email\":\"show\",\"address\":\"hidden\",\"login_status\":\"show\",\"forgot_key\":\"hidden\",\"created_date\":\"show\",\"modified_date\":\"hidden\",\"status\":\"show\"}', '{\"sno\":\"desc\"}', 0),
(7, 'Companies', 'companies', 'cms', 'fa fa-building', '', '{\"count\":\"show\",\"count_menu\":null,\"display\":\"show\",\"title\":\"inactive\",\"add\":\"active\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"active\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"active\",\"numbers\":\"active\",\"pagination\":\"active\",\"limitlist\":\"active\",\"sortable\":\"active\",\"list\":null}', '{\"sno\":\"Sno\",\"name\":\"Company Name\",\"phone\":\"Phone\",\"fax\":\"Fax\",\"email\":\"Email\",\"password\":\"Password\",\"img\":\"Logo\",\"package\":\"Package\",\"logo\":\"Logo\",\"bgcolor\":\"Background colour\",\"website\":\"Website\",\"about\":\"About\",\"latitude\":\"Latitude\",\"longitude\":\"Longitude\",\"pointer\":\"Pointer\",\"address\":\"Address\",\"servicearea\":\"Service Area\",\"languages\":\"Languages\",\"twitter\":\"Twitter\",\"facebook\":\"Facebook\",\"instagram\":\"Instagram\",\"linkedin\":\"Linkedin\",\"login_status\":\"Login Status\",\"forgot_key\":\"Forgot Key\",\"created_date\":\"Created Date\",\"modified_date\":\"Modified Date\",\"status\":\"Status\"}', '{\"sno\":\"\",\"name\":\"\",\"phone\":\"numeric\",\"fax\":\"numeric\",\"email\":\"\",\"password\":\"\",\"img\":\"\",\"package\":\"\",\"logo\":\"\",\"bgcolor\":\"\",\"website\":\"\",\"about\":\"\",\"latitude\":\"\",\"longitude\":\"\",\"pointer\":\"\",\"address\":\"\",\"servicearea\":\"\",\"languages\":\"\",\"twitter\":\"\",\"facebook\":\"\",\"instagram\":\"\",\"linkedin\":\"\",\"login_status\":\"\",\"forgot_key\":\"\",\"created_date\":\"\",\"modified_date\":\"\",\"status\":\"\"}', '{\"sno\":\"required\",\"name\":\"required\",\"phone\":\"not_required\",\"fax\":\"not_required\",\"email\":\"required\",\"password\":\"not_required\",\"img\":\"not_required\",\"package\":\"required\",\"logo\":\"not_required\",\"bgcolor\":\"not_required\",\"website\":\"not_required\",\"about\":\"not_required\",\"latitude\":\"not_required\",\"longitude\":\"not_required\",\"pointer\":\"not_required\",\"address\":\"not_required\",\"servicearea\":\"not_required\",\"languages\":\"not_required\",\"twitter\":\"not_required\",\"facebook\":\"not_required\",\"instagram\":\"not_required\",\"linkedin\":\"not_required\",\"login_status\":\"not_required\",\"forgot_key\":\"not_required\",\"created_date\":\"required\",\"modified_date\":\"required\",\"status\":\"required\"}', '{\"sno\":\"show\",\"name\":\"show\",\"phone\":\"show\",\"fax\":\"show\",\"email\":\"show\",\"password\":\"show\",\"img\":\"show\",\"package\":\"show\",\"logo\":\"show\",\"bgcolor\":\"show\",\"website\":\"show\",\"about\":\"show\",\"latitude\":\"show\",\"longitude\":\"show\",\"pointer\":\"show\",\"address\":\"show\",\"servicearea\":\"show\",\"languages\":\"show\",\"twitter\":\"show\",\"facebook\":\"show\",\"instagram\":\"show\",\"linkedin\":\"show\",\"login_status\":\"show\",\"forgot_key\":\"show\",\"created_date\":\"show\",\"modified_date\":\"show\",\"status\":\"show\"}', '{\"sno\":\"desc\"}', 0),
(8, 'Property Managers', 'agents', 'cms', 'fa fa-user-shield', '', '{\"count\":\"show\",\"count_menu\":null,\"display\":\"show\",\"title\":\"inactive\",\"add\":\"active\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"active\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"active\",\"numbers\":\"active\",\"pagination\":\"active\",\"limitlist\":\"active\",\"sortable\":\"active\",\"list\":null}', '{\"sno\":\"Sno\",\"name\":\"Name\",\"phone\":\"Phone\",\"phone_2\":\"Phone\",\"email\":\"Email\",\"password\":\"Password\",\"img\":\"Profile Photo\",\"address\":\"Address\",\"company\":\"Company\",\"position\":\"Position\",\"experience\":\"Experience\",\"servicearea\":\"Service Area\",\"about\":\"About\",\"package\":\"Package\",\"languages\":\"Languages\",\"qualification\":\"Qualification\",\"twitter\":\"Twitter\",\"facebook\":\"Facebook\",\"instagram\":\"Instagram\",\"linkedin\":\"Linkedin\",\"login_status\":\"Login Status\",\"forgot_key\":\"Forgot Key\",\"created_date\":\"Created Date\",\"modified_date\":\"Modified Date\",\"status\":\"Status\"}', '{\"sno\":\"\",\"name\":\"\",\"phone\":\"\",\"phone_2\":\"\",\"email\":\"\",\"password\":\"\",\"img\":\"\",\"address\":\"\",\"company\":\"\",\"position\":\"\",\"experience\":\"\",\"servicearea\":\"\",\"about\":\"\",\"package\":\"\",\"languages\":\"\",\"qualification\":\"\",\"twitter\":\"\",\"facebook\":\"\",\"instagram\":\"\",\"linkedin\":\"\",\"login_status\":\"\",\"forgot_key\":\"\",\"created_date\":\"\",\"modified_date\":\"\",\"status\":\"\"}', '{\"sno\":\"required\",\"name\":\"required\",\"phone\":\"required\",\"phone_2\":\"not_required\",\"email\":\"required\",\"password\":\"not_required\",\"img\":\"not_required\",\"address\":\"not_required\",\"company\":\"not_required\",\"position\":\"not_required\",\"experience\":\"not_required\",\"servicearea\":\"not_required\",\"about\":\"not_required\",\"package\":\"not_required\",\"languages\":\"not_required\",\"qualification\":\"not_required\",\"twitter\":\"not_required\",\"facebook\":\"not_required\",\"instagram\":\"not_required\",\"linkedin\":\"not_required\",\"login_status\":\"required\",\"forgot_key\":\"not_required\",\"created_date\":\"required\",\"modified_date\":\"required\",\"status\":\"not_required\"}', '{\"sno\":\"show\",\"name\":\"show\",\"phone\":\"show\",\"phone_2\":\"show\",\"email\":\"show\",\"password\":\"show\",\"img\":\"show\",\"address\":\"show\",\"company\":\"show\",\"position\":\"show\",\"experience\":\"show\",\"servicearea\":\"show\",\"about\":\"show\",\"package\":\"show\",\"languages\":\"show\",\"qualification\":\"show\",\"twitter\":\"show\",\"facebook\":\"show\",\"instagram\":\"show\",\"linkedin\":\"show\",\"login_status\":\"show\",\"forgot_key\":\"show\",\"created_date\":\"show\",\"modified_date\":\"show\",\"status\":\"show\"}', '{\"sno\":\"desc\"}', 0),
(9, 'Packages', 'packages', 'cms', 'fa fa-th', '', '{\"count\":null,\"count_menu\":null,\"display\":null,\"title\":\"inactive\",\"add\":\"active\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"active\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"active\",\"numbers\":\"active\",\"pagination\":\"active\",\"limitlist\":\"active\",\"sortable\":\"active\"}', '{\"sno\":\"Sno\",\"name\":\"Name\",\"user_type\":\"User Type\",\"properties\":\"Properties\",\"agents\":\"Agents\",\"actual_price\":\"Actual Price\",\"price\":\"Price\",\"notes\":\"Notes\",\"status\":\"Status\"}', '{\"sno\":\"\",\"name\":\"\",\"user_type\":\"\",\"properties\":\"\",\"agents\":\"\",\"actual_price\":\"\",\"price\":\"\",\"notes\":\"\",\"status\":\"\"}', '{\"sno\":\"required\",\"name\":\"required\",\"user_type\":\"required\",\"properties\":\"required\",\"agents\":\"required\",\"actual_price\":\"not_required\",\"price\":\"required\",\"notes\":\"not_required\",\"status\":\"required\"}', '{\"sno\":\"show\",\"name\":\"show\",\"user_type\":\"show\",\"properties\":\"show\",\"agents\":\"show\",\"actual_price\":\"show\",\"price\":\"show\",\"notes\":\"show\",\"status\":\"show\"}', '{\"sno\":\"asc\"}', 0),
(10, 'Subscriptions', 'subscriptions', 'cms', 'fas fa-user-plus', '', '{\"count\":\"show\",\"count_menu\":null,\"display\":\"show\",\"title\":\"inactive\",\"add\":\"inactive\",\"edit\":\"inactive\",\"view\":\"inactive\",\"remove\":\"inactive\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"active\",\"numbers\":\"active\",\"pagination\":\"active\",\"limitlist\":\"active\",\"sortable\":\"active\",\"list\":null}', '{\"sno\":\"Sno\",\"package\":\"Package\",\"details\":\"Details\",\"role\":\"Role\",\"user\":\"Company Name\",\"amount\":\"Amount\",\"created_date\":\"Created Date\",\"modified_date\":\"Modified Date\",\"status\":\"Status\"}', '{\"sno\":\"\",\"package\":\"\",\"details\":\"\",\"role\":\"\",\"user\":\"\",\"amount\":\"\",\"created_date\":\"\",\"modified_date\":\"\",\"status\":\"\"}', '{\"sno\":\"required\",\"package\":\"required\",\"details\":\"not_required\",\"role\":\"required\",\"user\":\"required\",\"amount\":\"required\",\"created_date\":\"required\",\"modified_date\":\"not_required\",\"status\":\"required\"}', '{\"sno\":\"show\",\"package\":\"show\",\"details\":\"show\",\"role\":\"show\",\"user\":\"show\",\"amount\":\"show\",\"created_date\":\"show\",\"modified_date\":\"show\",\"status\":\"show\"}', '{\"sno\":\"desc\"}', 0),
(11, 'Regions', 'regions', 'cms', 'fa fa-map', '', '{\"count\":\"show\",\"count_menu\":null,\"display\":\"show\",\"title\":\"inactive\",\"add\":\"active\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"active\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"active\",\"numbers\":\"active\",\"pagination\":\"active\",\"limitlist\":\"active\",\"sortable\":\"active\"}', '{\"sno\":\"Sno\",\"region_name\":\"Name\",\"region_image\":\"Image\",\"status\":\"Status\"}', '{\"sno\":\"\",\"region_name\":\"\",\"region_image\":\"\",\"status\":\"\"}', '{\"sno\":\"required\",\"region_name\":\"required\",\"region_image\":\"not_required\",\"status\":\"required\"}', '{\"sno\":\"show\",\"region_name\":\"show\",\"region_image\":\"show\",\"status\":\"show\"}', '{\"sno\":\"asc\"}', 0),
(13, 'Districts', 'districts', 'cms', 'fa fa-map-marker', '', '{\"count\":\"show\",\"count_menu\":null,\"display\":\"show\",\"title\":\"inactive\",\"add\":\"active\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"active\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"active\",\"numbers\":\"active\",\"pagination\":\"active\",\"limitlist\":\"active\",\"sortable\":\"active\"}', '{\"sno\":\"Sno\",\"district\":\"Name\",\"region\":\"Region\",\"district_image\":\"Image\",\"status\":\"Status\"}', '{\"sno\":\"\",\"district\":\"\",\"region\":\"\",\"district_image\":\"\",\"status\":\"\"}', '{\"sno\":\"required\",\"district\":\"required\",\"region\":\"required\",\"district_image\":\"not_required\",\"status\":\"required\"}', '{\"sno\":\"show\",\"district\":\"show\",\"region\":\"show\",\"district_image\":\"show\",\"status\":\"show\"}', '{\"sno\":\"asc\"}', 0),
(15, 'Landlord\'s', 'landlords', 'cms', 'fa fa-users', '', '{\"count\":null,\"count_menu\":null,\"display\":\"show\",\"title\":\"inactive\",\"add\":\"active\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"active\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"active\",\"numbers\":\"active\",\"pagination\":\"active\",\"limitlist\":\"active\",\"sortable\":\"active\",\"list\":null}', '{\"sno\":\"Sno\",\"name\":\"Name\",\"phone\":\"Phone\",\"email\":\"Email\",\"password\":\"Password\",\"img\":\"Profile Photo\",\"package\":\"Package\",\"languages\":\"Languages\",\"twitter\":\"Twitter\",\"facebook\":\"Facebook\",\"instagram\":\"Instagram\",\"linkedin\":\"Linkedin\",\"login_status\":\"Login Status\",\"forgot_key\":\"Forgot Key\",\"created_date\":\"Created Date\",\"modified_date\":\"Modified Date\",\"status\":\"Status\"}', '{\"sno\":\"\",\"name\":\"\",\"phone\":\"\",\"email\":\"\",\"password\":\"\",\"img\":\"\",\"package\":\"\",\"languages\":\"\",\"twitter\":\"\",\"facebook\":\"\",\"instagram\":\"\",\"linkedin\":\"\",\"login_status\":\"\",\"forgot_key\":\"\",\"created_date\":\"\",\"modified_date\":\"\",\"status\":\"\"}', '{\"sno\":\"required\",\"name\":\"required\",\"phone\":\"required\",\"email\":\"required\",\"password\":\"not_required\",\"img\":\"not_required\",\"package\":\"not_required\",\"languages\":\"not_required\",\"twitter\":\"not_required\",\"facebook\":\"not_required\",\"instagram\":\"not_required\",\"linkedin\":\"not_required\",\"login_status\":\"required\",\"forgot_key\":\"not_required\",\"created_date\":\"required\",\"modified_date\":\"required\",\"status\":\"required\"}', '{\"sno\":\"show\",\"name\":\"show\",\"phone\":\"show\",\"email\":\"show\",\"password\":\"show\",\"img\":\"show\",\"package\":\"show\",\"languages\":\"show\",\"twitter\":\"show\",\"facebook\":\"show\",\"instagram\":\"show\",\"linkedin\":\"show\",\"login_status\":\"show\",\"forgot_key\":\"show\",\"created_date\":\"show\",\"modified_date\":\"show\",\"status\":\"show\"}', '{\"sno\":\"desc\"}', 0),
(16, 'Properties', 'properties', 'cms', 'fas fa-home', '', '{\"count\":null,\"count_menu\":null,\"display\":\"show\",\"title\":\"inactive\",\"add\":\"active\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"active\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"active\",\"numbers\":\"active\",\"pagination\":\"active\",\"limitlist\":\"active\",\"sortable\":\"active\",\"list\":null}', '{\"sno\":\"Sno\",\"role\":\"Role\",\"agent\":\"Agent\",\"title\":\"Title\",\"address\":\"Address\",\"region\":\"Region\",\"district\":\"District\",\"suburb\":\"Suburb\",\"zip\":\"Zip\",\"bond\":\"Bond\",\"price\":\"Rent\",\"other\":\"Others\",\"negotiation\":\"Negotiation\",\"duration\":\"Duration\",\"description\":\"Description\",\"built_year\":\"Year Built\",\"sqft\":\"Land Area\",\"floor_area\":\"Floor Area\",\"tenants\":\"No. of Tenants\",\"type\":\"Prop Type\",\"p_type\":\"Prop Category\",\"bedrooms\":\"Bedrooms\",\"bathrooms\":\"Bathrooms\",\"parkings\":\"Garage\",\"carport\":\"Carport\",\"offshoreparking\":\"Off-Street Carpark\",\"balconies\":\"Balconies\",\"toilets\":\"Toilets\",\"features\":\"Features\",\"aminities\":\"Aminities\",\"available_from\":\"Available From\",\"apply_link\":\"Apply Link\",\"assignto\":\"Assign To\",\"featured\":\"Featured\",\"premium\":\"Premium\",\"boost\":\"Social Bst\",\"accesskey\":\"Access Key\",\"latitude\":\"Latitude\",\"longitude\":\"Longitude\",\"pointer\":\"Pointer\",\"txnid\":\"Txn Id\",\"txnstatus\":\"Txn Status\",\"txnamount\":\"Txn Amount\",\"txndate\":\"Txn Date\",\"response\":\"Response\",\"property_status\":\"Property Status\",\"created_date\":\"Created Date\",\"modified_date\":\"Modified Date\",\"status\":\"Status\"}', '{\"sno\":\"\",\"role\":\"\",\"agent\":\"\",\"title\":\"\",\"address\":\"\",\"region\":\"\",\"district\":\"\",\"suburb\":\"\",\"zip\":\"\",\"bond\":\"\",\"price\":\"numeric\",\"other\":\"\",\"negotiation\":\"\",\"duration\":\"\",\"description\":\"\",\"built_year\":\"numeric\",\"sqft\":\"numeric\",\"floor_area\":\"numeric\",\"tenants\":\"numeric\",\"type\":\"\",\"p_type\":\"\",\"bedrooms\":\"numeric\",\"bathrooms\":\"numeric\",\"parkings\":\"numeric\",\"carport\":\"numeric\",\"offshoreparking\":\"numeric\",\"balconies\":\"numeric\",\"toilets\":\"numeric\",\"features\":\"\",\"aminities\":\"\",\"available_from\":\"\",\"apply_link\":\"\",\"assignto\":\"\",\"featured\":\"\",\"premium\":\"\",\"boost\":\"\",\"accesskey\":\"\",\"latitude\":\"decimal\",\"longitude\":\"decimal\",\"pointer\":\"\",\"txnid\":\"\",\"txnstatus\":\"\",\"txnamount\":\"\",\"txndate\":\"\",\"response\":\"\",\"property_status\":\"\",\"created_date\":\"\",\"modified_date\":\"\",\"status\":\"\"}', '{\"sno\":\"required\",\"role\":\"required\",\"agent\":\"required\",\"title\":\"not_required\",\"address\":\"required\",\"region\":\"required\",\"district\":\"required\",\"suburb\":\"required\",\"zip\":\"not_required\",\"bond\":\"not_required\",\"price\":\"required\",\"other\":\"required\",\"negotiation\":\"required\",\"duration\":\"required\",\"description\":\"not_required\",\"built_year\":\"not_required\",\"sqft\":\"not_required\",\"floor_area\":\"not_required\",\"tenants\":\"not_required\",\"type\":\"required\",\"p_type\":\"required\",\"bedrooms\":\"not_required\",\"bathrooms\":\"not_required\",\"parkings\":\"not_required\",\"carport\":\"not_required\",\"offshoreparking\":\"not_required\",\"balconies\":\"not_required\",\"toilets\":\"not_required\",\"features\":\"not_required\",\"aminities\":\"not_required\",\"available_from\":\"required\",\"apply_link\":\"not_required\",\"assignto\":\"not_required\",\"featured\":\"not_required\",\"premium\":\"not_required\",\"boost\":\"not_required\",\"accesskey\":\"not_required\",\"latitude\":\"not_required\",\"longitude\":\"not_required\",\"pointer\":\"required\",\"txnid\":\"not_required\",\"txnstatus\":\"not_required\",\"txnamount\":\"not_required\",\"txndate\":\"not_required\",\"response\":\"not_required\",\"property_status\":\"required\",\"created_date\":\"required\",\"modified_date\":\"not_required\",\"status\":\"required\"}', '{\"sno\":\"show\",\"role\":\"show\",\"agent\":\"show\",\"title\":\"show\",\"address\":\"show\",\"region\":\"show\",\"district\":\"show\",\"suburb\":\"show\",\"zip\":\"show\",\"bond\":\"show\",\"price\":\"show\",\"other\":\"show\",\"negotiation\":\"show\",\"duration\":\"show\",\"description\":\"show\",\"built_year\":\"show\",\"sqft\":\"show\",\"floor_area\":\"show\",\"tenants\":\"show\",\"type\":\"show\",\"p_type\":\"show\",\"bedrooms\":\"show\",\"bathrooms\":\"show\",\"parkings\":\"show\",\"carport\":\"show\",\"offshoreparking\":\"show\",\"balconies\":\"show\",\"toilets\":\"show\",\"features\":\"show\",\"aminities\":\"show\",\"available_from\":\"show\",\"apply_link\":\"show\",\"assignto\":\"show\",\"featured\":\"show\",\"premium\":\"show\",\"boost\":\"show\",\"accesskey\":\"show\",\"latitude\":\"show\",\"longitude\":\"show\",\"pointer\":\"show\",\"txnid\":\"show\",\"txnstatus\":\"show\",\"txnamount\":\"show\",\"txndate\":\"show\",\"response\":\"show\",\"property_status\":\"show\",\"created_date\":\"show\",\"modified_date\":\"show\",\"status\":\"show\"}', '{\"sno\":\"desc\"}', 0),
(17, 'Amenities', 'p_amenities', 'cms', 'fa fa-th', '', '{\"count\":null,\"count_menu\":null,\"display\":null,\"title\":\"inactive\",\"add\":\"active\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"active\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"active\",\"numbers\":\"active\",\"pagination\":\"active\",\"limitlist\":\"active\",\"sortable\":\"active\",\"list\":null}', '', '', '', '', '', 0),
(18, 'Suburbs', 'suburbs', 'cms', 'fa fa-map-marker', '', '{\"count\":null,\"count_menu\":null,\"display\":null,\"title\":\"inactive\",\"add\":\"active\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"active\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"active\",\"numbers\":\"active\",\"pagination\":\"active\",\"limitlist\":\"active\",\"sortable\":\"active\"}', '{\"sno\":\"Sno\",\"suburb\":\"Suburb\",\"region\":\"Region\",\"district\":\"District\",\"suburb_image\":\"Image\",\"status\":\"Status\"}', '{\"sno\":\"\",\"suburb\":\"\",\"region\":\"\",\"district\":\"\",\"suburb_image\":\"\",\"status\":\"\"}', '{\"sno\":\"required\",\"suburb\":\"required\",\"region\":\"required\",\"district\":\"required\",\"suburb_image\":\"not_required\",\"status\":\"required\"}', '{\"sno\":\"show\",\"suburb\":\"show\",\"region\":\"show\",\"district\":\"show\",\"suburb_image\":\"show\",\"status\":\"show\"}', '{\"sno\":\"asc\"}', 0),
(19, 'Categories', 'supplier_categories', 'cms', 'fa fa-th', '', '{\"count\":null,\"count_menu\":null,\"display\":null,\"title\":\"inactive\",\"add\":\"active\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"active\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"active\",\"numbers\":\"active\",\"pagination\":\"active\",\"limitlist\":\"active\",\"sortable\":\"active\"}', '{\"sno\":\"Sno\",\"category\":\"Category\",\"icon\":\"Icon\",\"status\":\"Status\"}', '{\"sno\":\"\",\"category\":\"\",\"icon\":\"\",\"status\":\"\"}', '{\"sno\":\"required\",\"category\":\"required\",\"icon\":\"required\",\"status\":\"required\"}', '{\"sno\":\"show\",\"category\":\"show\",\"icon\":\"show\",\"status\":\"show\"}', '{\"sno\":\"asc\"}', 0),
(20, 'Services', 'supplier_services', 'cms', 'fa fa-cogs', '', '{\"count\":null,\"count_menu\":null,\"display\":null,\"title\":\"inactive\",\"add\":\"active\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"active\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"active\",\"numbers\":\"active\",\"pagination\":\"active\",\"limitlist\":\"active\",\"sortable\":\"active\"}', '{\"sno\":\"Sno\",\"service_name\":\"Service Name\",\"category\":\"Category\",\"status\":\"Status\"}', '{\"sno\":\"\",\"service_name\":\"\",\"category\":\"\",\"status\":\"\"}', '{\"sno\":\"required\",\"service_name\":\"required\",\"category\":\"required\",\"status\":\"required\"}', '{\"sno\":\"show\",\"service_name\":\"show\",\"category\":\"show\",\"status\":\"show\"}', '{\"sno\":\"asc\"}', 0),
(21, 'Suppliers', 'suppliers', 'cms', 'fa fa-user-cog', '', '{\"count\":null,\"count_menu\":null,\"display\":\"show\",\"title\":\"inactive\",\"add\":\"active\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"active\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"active\",\"numbers\":\"active\",\"pagination\":\"active\",\"limitlist\":\"active\",\"sortable\":\"active\"}', '{\"sno\":\"Sno\",\"name\":\"Name\",\"phone\":\"Phone\",\"email\":\"Email\",\"region\":\"Region\",\"district\":\"District\",\"suburbs\":\"Suburbs\",\"address\":\"Address\",\"category\":\"Category\",\"services\":\"Services\",\"service_areas\":\"Service Areas\",\"logo\":\"Logo\",\"banner\":\"Thumbnail Image\",\"status\":\"Status\"}', '{\"sno\":\"\",\"name\":\"\",\"phone\":\"\",\"email\":\"\",\"region\":\"\",\"district\":\"\",\"suburbs\":\"\",\"address\":\"\",\"category\":\"\",\"services\":\"\",\"service_areas\":\"\",\"logo\":\"\",\"banner\":\"\",\"status\":\"\"}', '{\"sno\":\"required\",\"name\":\"required\",\"phone\":\"required\",\"email\":\"not_required\",\"region\":\"required\",\"district\":\"required\",\"suburbs\":\"required\",\"address\":\"required\",\"category\":\"required\",\"services\":\"required\",\"service_areas\":\"required\",\"logo\":\"not_required\",\"banner\":\"not_required\",\"status\":\"required\"}', '{\"sno\":\"show\",\"name\":\"show\",\"phone\":\"show\",\"email\":\"show\",\"region\":\"show\",\"district\":\"show\",\"suburbs\":\"show\",\"address\":\"show\",\"category\":\"show\",\"services\":\"show\",\"service_areas\":\"show\",\"logo\":\"show\",\"banner\":\"show\",\"status\":\"show\"}', '{\"sno\":\"asc\"}', 0),
(22, 'Property Schedules', 'property_schedules', 'cms', 'fas fa-calendar-alt', '', '{\"count\":null,\"count_menu\":null,\"display\":null,\"title\":\"inactive\",\"add\":\"active\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"active\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"active\",\"numbers\":\"active\",\"pagination\":\"active\",\"limitlist\":\"active\",\"sortable\":\"active\",\"list\":null}', '{\"sno\":\"Sno\",\"property\":\"Property\",\"day\":\"Day\",\"date\":\"Date\",\"from_time\":\"From\",\"to_time\":\"To\",\"slots\":\"Slots\",\"reason\":\"Reason\",\"status\":\"Status\"}', '{\"sno\":\"\",\"property\":\"\",\"day\":\"\",\"date\":\"\",\"from_time\":\"\",\"to_time\":\"\",\"slots\":\"\",\"reason\":\"\",\"status\":\"\"}', '{\"sno\":\"required\",\"property\":\"required\",\"day\":\"required\",\"date\":\"required\",\"from_time\":\"required\",\"to_time\":\"required\",\"slots\":\"not_required\",\"reason\":\"not_required\",\"status\":\"required\"}', '{\"sno\":\"show\",\"property\":\"show\",\"day\":\"show\",\"date\":\"show\",\"from_time\":\"show\",\"to_time\":\"show\",\"slots\":\"hidden\",\"reason\":\"show\",\"status\":\"show\"}', '{\"sno\":\"desc\"}', 0),
(23, 'Property Visits', 'property_visits', 'cms', 'fa fa-clock', '', '{\"count\":null,\"count_menu\":null,\"display\":null,\"title\":\"inactive\",\"add\":\"active\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"active\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"active\",\"numbers\":\"active\",\"pagination\":\"active\",\"limitlist\":\"active\",\"sortable\":\"active\",\"list\":null}', '{\"sno\":\"Sno\",\"property\":\"Property\",\"user\":\"User\",\"name\":\"Name\",\"email\":\"Email\",\"phone\":\"Phone\",\"day_date\":\"Day Date\",\"schedule_id\":\"Schedule\",\"visited\":\"Visited\",\"send_link\":\"Send Link\",\"created_date\":\"Created Date\",\"modified_date\":\"Modified Date\",\"status\":\"Status\"}', '{\"sno\":\"\",\"property\":\"\",\"user\":\"\",\"name\":\"\",\"email\":\"\",\"phone\":\"\",\"day_date\":\"\",\"schedule_id\":\"\",\"visited\":\"\",\"send_link\":\"\",\"created_date\":\"\",\"modified_date\":\"\",\"status\":\"\"}', '{\"sno\":\"required\",\"property\":\"required\",\"user\":\"not_required\",\"name\":\"required\",\"email\":\"required\",\"phone\":\"not_required\",\"day_date\":\"required\",\"schedule_id\":\"required\",\"visited\":\"not_required\",\"send_link\":\"not_required\",\"created_date\":\"required\",\"modified_date\":\"required\",\"status\":\"required\"}', '{\"sno\":\"show\",\"property\":\"show\",\"user\":\"show\",\"name\":\"show\",\"email\":\"show\",\"phone\":\"show\",\"day_date\":\"show\",\"schedule_id\":\"show\",\"visited\":\"show\",\"send_link\":\"show\",\"created_date\":\"show\",\"modified_date\":\"show\",\"status\":\"show\"}', '{\"sno\":\"desc\"}', 0),
(24, 'Languages', 'languages', 'cms', 'fa fa-language', '', '{\"count\":null,\"count_menu\":null,\"display\":null,\"title\":\"inactive\",\"add\":\"active\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"active\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"active\",\"numbers\":\"active\",\"pagination\":\"active\",\"limitlist\":\"active\",\"sortable\":\"active\"}', '', '', '', '', '', 0),
(25, 'Popular Cities', 'popular_cities', 'cms', 'fa fa-th', '', '{\"count\":\"show\",\"count_menu\":\"show\",\"display\":null,\"title\":\"inactive\",\"add\":\"active\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"active\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"active\",\"numbers\":\"active\",\"pagination\":\"active\",\"limitlist\":\"active\",\"sortable\":\"active\"}', '{\"sno\":\"Sno\",\"city_name\":\"City Name\",\"cimage\":\"Image\",\"url\":\"Url\",\"status\":\"Status\"}', '{\"sno\":\"\",\"city_name\":\"\",\"cimage\":\"\",\"url\":\"\",\"status\":\"\"}', '{\"sno\":\"required\",\"city_name\":\"required\",\"cimage\":\"required\",\"url\":\"not_required\",\"status\":\"required\"}', '{\"sno\":\"show\",\"city_name\":\"show\",\"cimage\":\"show\",\"url\":\"show\",\"status\":\"show\"}', '{\"sno\":\"asc\"}', 0),
(26, 'Client Logos', 'client_logos', 'cms', 'fa fa-th', '', '{\"count\":\"show\",\"count_menu\":\"show\",\"display\":null,\"title\":\"inactive\",\"add\":\"active\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"active\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"active\",\"numbers\":\"active\",\"pagination\":\"active\",\"limitlist\":\"active\",\"sortable\":\"active\"}', '{\"sno\":\"Sno\",\"city_name\":\"Client Name\",\"cimage\":\"Image\",\"url\":\"Url\",\"status\":\"Status\"}', '{\"sno\":\"\",\"city_name\":\"\",\"cimage\":\"\",\"url\":\"\",\"status\":\"\"}', '{\"sno\":\"required\",\"city_name\":\"required\",\"cimage\":\"required\",\"url\":\"not_required\",\"status\":\"required\"}', '{\"sno\":\"show\",\"city_name\":\"show\",\"cimage\":\"show\",\"url\":\"show\",\"status\":\"show\"}', '{\"sno\":\"asc\"}', 0),
(27, 'Blogs', 'blogs', 'cms', 'fa fa-th', '', '{\"count\":null,\"count_menu\":null,\"display\":null,\"title\":\"inactive\",\"add\":\"active\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"active\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"active\",\"numbers\":\"active\",\"pagination\":\"active\",\"limitlist\":\"active\",\"sortable\":\"active\"}', '{\"sno\":\"Sno\",\"title\":\"Title\",\"blog_image\":\"Image\",\"description\":\"Description\",\"date_time\":\"Date\",\"status\":\"Status\"}', '{\"sno\":\"\",\"title\":\"\",\"blog_image\":\"\",\"description\":\"\",\"date_time\":\"\",\"status\":\"\"}', '{\"sno\":\"required\",\"title\":\"required\",\"blog_image\":\"required\",\"description\":\"required\",\"date_time\":\"not_required\",\"status\":\"required\"}', '{\"sno\":\"show\",\"title\":\"show\",\"blog_image\":\"show\",\"description\":\"show\",\"date_time\":\"show\",\"status\":\"show\"}', '{\"sno\":\"asc\"}', 0),
(28, 'Testimonials', 'testimonials', 'cms', 'fa fa-quote-right', '', '{\"count\":null,\"count_menu\":null,\"display\":null,\"title\":\"inactive\",\"add\":\"active\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"active\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"active\",\"numbers\":\"active\",\"pagination\":\"active\",\"limitlist\":\"active\",\"sortable\":\"active\",\"list\":null}', '{\"sno\":\"Sno\",\"name\":\"Name\",\"user_image\":\"Image\",\"city\":\"City\",\"testimonial\":\"Testimonial\",\"status\":\"Status\"}', '{\"sno\":\"\",\"name\":\"\",\"user_image\":\"\",\"city\":\"\",\"testimonial\":\"\",\"status\":\"\"}', '{\"sno\":\"required\",\"name\":\"required\",\"user_image\":\"not_required\",\"city\":\"not_required\",\"testimonial\":\"required\",\"status\":\"required\"}', '{\"sno\":\"show\",\"name\":\"show\",\"user_image\":\"show\",\"city\":\"show\",\"testimonial\":\"show\",\"status\":\"show\"}', '{\"sno\":\"asc\"}', 0),
(29, 'Terms & Conditions', 'terms', 'cms', 'fa fa-file-alt', '', '{\"count\":null,\"count_menu\":null,\"display\":null,\"title\":\"inactive\",\"add\":\"inactive\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"inactive\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"inactive\",\"numbers\":\"inactive\",\"pagination\":\"inactive\",\"limitlist\":\"inactive\",\"sortable\":\"inactive\",\"list\":null}', '', '', '', '', '', 0),
(30, 'Privacy Policy', 'privacy', 'cms', 'fa fa-file-alt', '', '{\"count\":null,\"count_menu\":null,\"display\":null,\"title\":\"inactive\",\"add\":\"inactive\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"inactive\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"inactive\",\"numbers\":\"inactive\",\"pagination\":\"inactive\",\"limitlist\":\"inactive\",\"sortable\":\"inactive\"}', '', '', '', '', '', 0),
(31, 'Promotions', 'promotional', 'cms', 'fas fa-money-check-alt', '', '{\"count\":null,\"count_menu\":null,\"display\":\"show\",\"title\":\"inactive\",\"add\":\"inactive\",\"edit\":\"active\",\"view\":\"active\",\"remove\":\"inactive\",\"csv\":\"inactive\",\"print\":\"inactive\",\"search\":\"inactive\",\"numbers\":\"inactive\",\"pagination\":\"inactive\",\"limitlist\":\"inactive\",\"sortable\":\"inactive\",\"list\":null}', '{\"sno\":\"Sno\",\"start_date\":\"Start Date\",\"end_date\":\"End Date\",\"duration\":\"Duration (Months)\",\"created_date\":\"Created Date\",\"modified_date\":\"Modified Date\",\"status\":\"Status\"}', '{\"sno\":\"\",\"start_date\":\"\",\"end_date\":\"\",\"duration\":\"numeric\",\"created_date\":\"\",\"modified_date\":\"\",\"status\":\"\"}', '{\"sno\":\"required\",\"start_date\":\"not_required\",\"end_date\":\"required\",\"duration\":\"required\",\"created_date\":\"not_required\",\"modified_date\":\"not_required\",\"status\":\"required\"}', '{\"sno\":\"show\",\"start_date\":\"show\",\"end_date\":\"show\",\"duration\":\"show\",\"created_date\":\"show\",\"modified_date\":\"show\",\"status\":\"show\"}', '{\"sno\":\"asc\"}', 0);

-- --------------------------------------------------------

--
-- Table structure for table `css`
--

CREATE TABLE `css` (
  `c_links` longtext NOT NULL,
  `css` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `css`
--

INSERT INTO `css` (`c_links`, `css`) VALUES
('', '@media print {\r\n   #print {\r\n       display:none;\r\n   }\r\n}\r\n.bootstrap-datetimepicker-widget{\r\n    z-index: 2048 !important;\r\n}\r\n.textarea, .select2-container-multi, .select2-container-multi .select2-choices{\r\n    height: 125px !important;\r\n}\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `sno` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT '300x300.png',
  `address` varchar(255) NOT NULL,
  `login_status` enum('pending','approve') NOT NULL DEFAULT 'pending',
  `forgot_key` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`sno`, `name`, `phone`, `email`, `password`, `img`, `address`, `login_status`, `forgot_key`, `created_date`, `modified_date`, `status`) VALUES
(2, 'Rudra Pranay', '9030894779', 'rudra.pranay@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'profile_31641662536680.png', '', 'approve', 'd5a1b5e3ce176f2ba4cf8c99e063a9a2298c4249bc4ee1d850a181422039f4cb', '2023-05-07 11:17:08', '2023-11-24 09:41:25', 1),
(4, 'Pranay', '9030894779', 'pranay@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '300x300.png', '', 'approve', NULL, '2022-08-27 13:53:19', NULL, 1),
(6, 'Shashi', '7890654321', 'bhushan145345@gmail.com', 'cce87ccaa07b3113c1fc22277226a078', '300x300.png', '', 'approve', 'b8d64990a273e9c1ec0f960a351c69c380114048986f4b257beb96c093a9a0be', '2022-08-30 11:58:16', NULL, 1),
(7, 'Srikanth User', '0221878977', 'srikanthsamrat7@gmail.com', '49f3175a93cd22f5e345bca772f7c143', '300x300.png', '', 'approve', NULL, '2022-08-30 17:33:29', NULL, 1),
(8, 'User/Tenant Srikanth', '111111111111', 'samratsrikanthgoud@gmail.com', '49f3175a93cd22f5e345bca772f7c143', '300x300.png', '', 'approve', NULL, '2022-09-09 13:57:42', '2022-09-09 13:59:45', 1),
(9, 'com', '9876543210', 'com@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '300x300.png', '', 'approve', NULL, '2023-01-05 21:59:17', NULL, 1),
(10, 'harshita', '7075510333', 'harshi200128@gmail.com', '38ea73376be05a67aef6b2bdbe680ae8', '300x300.png', '', 'approve', '', '2023-10-01 18:15:53', '2023-10-07 16:56:09', 1),
(11, 'Vijay Kumar', '09963879607', 'admin@vitasoft.in', '81dc9bdb52d04dc20036dbd8313ed055', '300x300.png', '', 'approve', NULL, '2024-04-19 10:44:42', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `sno` int(11) NOT NULL,
  `district` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `region` varchar(50) NOT NULL,
  `district_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`sno`, `district`, `region`, `district_image`, `status`) VALUES
(5, 'Auckland City', '5', '', 1),
(6, 'Franklin', '5', '', 1),
(7, 'Hauraki Gulf Islands', '5', '', 1),
(8, 'Manukau City', '5', '', 1),
(9, 'North Shore City', '5', '', 1),
(10, 'All of Auckland', '5', '', 1),
(11, 'Papakura', '5', '', 1),
(12, 'Rodney', '5', '', 1),
(13, 'Waiheke Island', '5', '', 1),
(14, 'Waitakere City', '5', '', 1),
(15, 'Far North', '4', '', 1),
(16, 'Kaipara', '4', '', 1),
(17, 'Whangārei', '4', '', 1),
(18, 'Hamilton City', '8', '', 1),
(19, 'Hauraki', '8', '', 1),
(20, 'Matamata-Piako', '8', '', 1),
(21, 'Otorohanga', '8', '', 1),
(22, 'South Waikato', '8', '', 1),
(23, 'Taupō', '8', '', 1),
(24, 'Waikato', '8', '', 1),
(25, 'Waipa', '8', '', 1),
(26, 'Waitomo', '8', '', 1),
(27, 'Kawerau', '7', '', 1),
(28, 'Ōpōtiki', '7', '', 1),
(29, 'Rotorua', '7', '', 1),
(30, 'Tauranga', '7', '', 1),
(31, 'Western Bay Of Plenty', '7', '', 1),
(32, 'Whakatāne', '7', '', 1),
(33, 'Thames-Coromandel', '6', '', 1),
(34, 'Gisborne', '9', '', 1),
(35, 'Ruapehu', '10', '', 1),
(36, 'Central Hawke\'s Bay', '11', '', 1),
(37, 'Hastings', '11', '', 1),
(38, 'Napier City', '11', '', 1),
(39, 'Wairoa', '11', '', 1),
(40, 'New Plymouth', '12', '', 1),
(41, 'South Taranaki', '12', '', 1),
(42, 'Stratford', '12', '', 1),
(43, 'Horowhenua', '13', '', 1),
(44, 'Manawatu', '13', '', 1),
(45, 'Palmerston North City', '13', '', 1),
(46, 'Rangitikei', '13', '', 1),
(47, 'Tararua', '13', '', 1),
(48, 'Whanganui', '13', '', 1),
(49, 'Carterton', '14', '', 1),
(50, 'Masterton District', '14', '', 1),
(51, 'South Wairarapa', '14', '', 1),
(52, 'Kapiti Coast', '15', '', 1),
(53, 'Lower Hutt City', '15', '', 1),
(54, 'Porirua City', '15', '', 1),
(55, 'Upper Hutt City', '15', '', 1),
(56, 'Wellington City', '15', '', 1),
(57, 'Blenheim', '16', '', 1),
(58, 'Kaikōura', '16', '', 1),
(59, 'Marlborough', '16', '', 1),
(60, 'Nelson', '17', '', 1),
(61, 'Tasman', '17', '', 1),
(62, 'Buller', '18', '', 1),
(63, 'Greymouth', '18', '', 1),
(64, 'Westland', '18', '', 1),
(65, 'Ashburton', '19', '', 1),
(66, 'Banks Peninsula', '19', '', 1),
(67, 'Christchurch City', '19', '', 1),
(68, 'Hurunui', '19', '', 1),
(69, 'Mackenzie', '19', '', 1),
(70, 'Selwyn', '19', '', 1),
(71, 'Timaru', '19', '', 1),
(72, 'Waimakariri', '19', '', 1),
(73, 'Waimate', '19', '', 1),
(74, 'Central Otago', '20', '', 1),
(75, 'Clutha', '20', '', 1),
(76, 'Dunedin', '20', '', 1),
(77, 'Queenstown', '20', '', 1),
(78, 'Waitaki', '20', '', 1),
(79, 'Wanaka', '20', '', 1),
(80, 'Catlins', '22', '', 1),
(81, 'Gore', '22', '', 1),
(82, 'Invercargill City', '22', '', 1),
(83, 'Southland', '22', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emailsetting`
--

CREATE TABLE `emailsetting` (
  `fieldoption` varchar(100) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `emailsetting`
--

INSERT INTO `emailsetting` (`fieldoption`, `value`) VALUES
('email_engine', 'smtp'),
('smtp_server', 'mail.ps4works.in'),
('smtp_username', 'pranay@ps4works.in'),
('smtp_password', 'Pranay@123$'),
('smtp_port', '26'),
('smtp_security', 'tls');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `sno` int(11) NOT NULL,
  `invoice_no` varchar(11) NOT NULL,
  `role` varchar(30) NOT NULL,
  `user` int(11) NOT NULL,
  `txnamount` float(23,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `due` int(11) NOT NULL,
  `notes` longtext NOT NULL,
  `txnid` varchar(20) NOT NULL,
  `txnstatus` varchar(20) NOT NULL,
  `response` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`sno`, `invoice_no`, `role`, `user`, `txnamount`, `discount`, `tax`, `total`, `paid`, `due`, `notes`, `txnid`, `txnstatus`, `response`, `created_date`, `modified_date`, `status`) VALUES
(1, '5', 'company', 2, 150.00, 0, 0, 150, 150, 0, '', 'ID640ad296b163a', 'Success', '{\"Success\":\"1\",\"AuthCode\":\"194804\",\"CardName\":\"Visa\",\"CardHolderName\":\"QWERTY\",\"CardNumber\":\"411111........11\",\"DateExpiry\":\"0326\",\"ClientInfo\":\"103.161.31.20\",\"DpsTxnRef\":\"0000000301170a09\",\"DpsBillingId\":\"\",\"AmountSettlement\":\"150.00\",\"CurrencySettlement\":\"NZD\",\"TxnMac\":\"2BC20210\",\"ResponseText\":\"APPROVED\",\"TxnType\":\"Purchase\",\"CurrencyInput\":\"NZD\",\"TxnData1\":\"5\",\"TxnData2\":\"\",\"TxnData3\":\"\",\"MerchantReference\":\"\",\"EmailAddress\":\"rudra.pranay@gmail.com\",\"BillingId\":\"\",\"TxnId\":\"ID640ad296b163a\"}', '2023-03-10 12:05:29', '2023-03-10 12:18:11', 1),
(2, '32', 'company', 28, 345.00, 0, 0, 345, 345, 0, '', 'ID65c878ec272ae', 'Success', '{\"Success\":\"1\",\"AuthCode\":\"000001\",\"CardName\":\"Account2Account\",\"CardHolderName\":\"A2A Customer\",\"CardNumber\":\"000000........00\",\"DateExpiry\":\"\",\"ClientInfo\":\"150.107.174.48\",\"DpsTxnRef\":\"0000000301a95fb3\",\"DpsBillingId\":\"\",\"AmountSettlement\":\"345.00\",\"CurrencySettlement\":\"NZD\",\"TxnMac\":\"\",\"ResponseText\":\"APPROVED\",\"TxnType\":\"Purchase\",\"CurrencyInput\":\"NZD\",\"TxnData1\":\"32\",\"TxnData2\":\"\",\"TxnData3\":\"\",\"MerchantReference\":\"\",\"EmailAddress\":\"samratsrikanthgoud@gmail.com\",\"BillingId\":\"\",\"TxnId\":\"ID65c878ec272ae\"}', '2024-02-11 13:08:29', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `js`
--

CREATE TABLE `js` (
  `j_links` longtext NOT NULL,
  `js` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `js`
--

INSERT INTO `js` (`j_links`, `js`) VALUES
('', '');

-- --------------------------------------------------------

--
-- Table structure for table `landlords`
--

CREATE TABLE `landlords` (
  `sno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT '300x300.png',
  `package` int(11) NOT NULL,
  `languages` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `login_status` enum('pending','approve') NOT NULL DEFAULT 'pending',
  `forgot_key` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `landlords`
--

INSERT INTO `landlords` (`sno`, `name`, `phone`, `email`, `password`, `img`, `package`, `languages`, `twitter`, `facebook`, `instagram`, `linkedin`, `login_status`, `forgot_key`, `created_date`, `modified_date`, `status`) VALUES
(1, 'Sandeep', '2147483647', 'sandeep@gmail.com', '', '', 0, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '0000-00-00 00:00:00', '2023-11-03 16:27:45', 1),
(2, 'Pranay Rudra', '9030894779', 'rudra.pranay@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'profile_87301662536854.png', 0, '1,5', NULL, NULL, NULL, NULL, 'approve', NULL, '2023-10-10 19:25:04', '2023-10-20 14:08:20', 1),
(8, 'Pranay', '9030894779', 'pranay@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '300x300.png', 0, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, '2022-09-06 11:49:33', NULL, 1),
(5, 'Bhushan', '8905671234', 'bhushan145345@gmail.com', 'cce87ccaa07b3113c1fc22277226a078', '', 8, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, '2022-09-06 10:57:40', NULL, 1),
(7, 'Srikanth P. Landlord', '0221878977', 'srikanthsamrat7@gmail.com', '49f3175a93cd22f5e345bca772f7c143', '', 8, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, '2022-08-30 17:12:55', NULL, 1),
(9, 'Samrat Srikanth || Landlord', '1234567891', 'samratsrikanthgoud@gmail.com', '49f3175a93cd22f5e345bca772f7c143', '39oh8opl9qasws80co.jpg', 0, NULL, NULL, NULL, NULL, NULL, 'approve', NULL, '2022-09-09 14:06:16', '2023-10-22 13:04:07', 1),
(10, 'SRK DEMO', '1111111111111111', 'info@rentallistings.co.nz', '81dc9bdb52d04dc20036dbd8313ed055', 'pbkmikb2dwgk8k4gcs.jpg', 0, '1,3,4', 'https://www.rentallistings.co.nz/', 'https://www.rentallistings.co.nz/', 'https://www.rentallistings.co.nz/', 'https://www.rentallistings.co.nz/', 'approve', NULL, '0000-00-00 00:00:00', '2023-10-22 13:06:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `sno` int(11) NOT NULL,
  `language` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`sno`, `language`, `status`) VALUES
(1, 'Afrikaans', 1),
(2, 'Arabic', 1),
(3, 'Bahasa', 1),
(4, 'Bengali', 1),
(5, 'Cantonese', 1),
(6, 'Chinese', 1),
(7, 'Cook Islands', 1),
(8, 'Czech', 1),
(9, 'Danish', 1),
(10, 'Dutch', 1),
(11, 'English', 1),
(12, 'Farsi', 1),
(13, 'Fiji Hindi', 1),
(14, 'Fijian', 1),
(15, 'Filipino', 1),
(16, 'French', 1),
(17, 'German', 1),
(18, 'Greek', 1),
(19, 'Gujarati', 1),
(20, 'Hindi', 1),
(21, 'Indonesian', 1),
(22, 'Italian', 1),
(23, 'Japanese', 1),
(24, 'Khmer', 1),
(25, 'Korean', 1),
(26, 'Malay', 1),
(27, 'Malayalam', 1),
(28, 'Mandarin', 1),
(29, 'Maori', 1),
(30, 'Marathi', 1),
(31, 'Min', 1),
(32, 'Nepalese', 1),
(33, 'New Zealand Sign Lan', 1),
(34, 'Niuean', 1),
(35, 'Persian', 1),
(36, 'Polish', 1),
(37, 'Portuguese', 1),
(38, 'Punjabi', 1),
(39, 'Russian', 1),
(40, 'Samoan', 1),
(41, 'Serbo-Croatian', 1),
(42, 'Sinhala', 1),
(43, 'Sinitic', 1),
(44, 'Spanish', 1),
(45, 'Swedish', 1),
(46, 'Tagalog', 1),
(47, 'Tamil', 1),
(48, 'Te Reo M?ori', 1),
(49, 'Telugu', 1),
(50, 'Thai', 1),
(51, 'Tokelauan', 1),
(52, 'Tongan', 1),
(53, 'Urdu', 1),
(54, 'Vietnamese', 1),
(55, 'Yue', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loginlog`
--

CREATE TABLE `loginlog` (
  `sno` int(11) NOT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `browser` varchar(128) DEFAULT NULL,
  `operatingsystem` varchar(128) DEFAULT NULL,
  `login` int(11) UNSIGNED DEFAULT NULL,
  `logout` int(11) UNSIGNED DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `loginlog`
--

INSERT INTO `loginlog` (`sno`, `ip`, `browser`, `operatingsystem`, `login`, `logout`, `role`, `user`) VALUES
(1, '110.235.227.161', 'Google Chrome', 'mac', 1660479736, 1660480036, 'user', 2),
(2, '110.235.227.161', 'Google Chrome', 'mac', 1660479876, 1660480176, 'user', 2),
(3, '110.235.227.161', 'Google Chrome', 'mac', 1660480098, 1660480398, 'user', 2),
(4, '110.235.227.161', 'Google Chrome', 'mac', 1660480110, 1660480410, 'user', 2),
(5, '110.235.227.161', 'Google Chrome', 'mac', 1660480159, 1660480459, 'user', 2),
(6, '110.235.227.161', 'Google Chrome', 'mac', 1660480182, 1660480482, 'user', 2),
(7, '110.235.227.161', 'Google Chrome', 'mac', 1660480193, 1660480493, 'user', 2),
(8, '110.235.227.161', 'Google Chrome', 'mac', 1660480313, 1660480613, 'user', 2),
(9, '110.235.227.161', 'Google Chrome', 'mac', 1660480322, 1660480622, 'user', 2),
(10, '110.235.227.161', 'Google Chrome', 'mac', 1660480437, 1660480737, 'user', 2),
(11, '110.235.227.161', 'Google Chrome', 'mac', 1660480445, 1660480745, 'user', 2),
(12, '110.235.227.161', 'Google Chrome', 'mac', 1660480577, 1660480877, 'user', 2),
(13, '110.235.227.161', 'Google Chrome', 'mac', 1660480854, 1660481154, 'superadmin', 1),
(14, '110.235.227.161', 'Google Chrome', 'mac', 1660481036, 1660481336, 'user', 2),
(15, '110.235.227.161', 'Google Chrome', 'mac', 1660481556, 1660481856, 'superadmin', 1),
(16, '110.235.227.161', 'Google Chrome', 'mac', 1660482072, NULL, 'landlord', 2),
(17, '110.235.227.161', 'Google Chrome', 'mac', 1660482137, 1660482437, 'superadmin', 1),
(18, '110.235.227.161', 'Google Chrome', 'mac', 1660483718, 1660484018, 'superadmin', 1),
(19, '110.235.227.161', 'Google Chrome', 'mac', 1660483908, NULL, 'agents', 2),
(20, '110.235.227.161', 'Google Chrome', 'mac', 1660487800, 1660488100, 'user', 2),
(21, '110.235.227.161', 'Google Chrome', 'mac', 1660488653, 1660488953, 'user', 2),
(22, '110.235.227.161', 'Google Chrome', 'mac', 1660489531, 1660489831, 'company', 1),
(23, '110.235.227.161', 'Google Chrome', 'mac', 1660489663, NULL, 'company', 1),
(24, '110.235.227.161', 'Google Chrome', 'mac', 1660489747, 1660490047, 'company', 3),
(25, '110.235.227.161', 'Google Chrome', 'mac', 1660489834, 1660490134, 'superadmin', 1),
(26, '110.235.227.161', 'Google Chrome', 'mac', 1660489933, NULL, 'superadmin', 1),
(27, '110.235.227.161', 'Google Chrome', 'mac', 1660489961, NULL, 'company', 3),
(28, '110.235.227.161', 'Google Chrome', 'mac', 1660490090, NULL, 'user', 2),
(29, '122.173.205.52', 'Mozilla Firefox', 'windows', 1660533121, 1660533421, 'superadmin', 1),
(30, '122.173.205.52', 'Mozilla Firefox', 'windows', 1660533301, NULL, 'superadmin', 1),
(31, '49.205.114.153', 'Mozilla Firefox', 'windows', 1660633011, 1660633311, 'company', 3),
(32, '49.205.114.153', 'Mozilla Firefox', 'windows', 1660633073, 1660633373, 'superadmin', 1),
(33, '49.205.114.153', 'Mozilla Firefox', 'windows', 1660633158, NULL, 'company', 3),
(34, '49.205.114.153', 'Mozilla Firefox', 'windows', 1660633670, 1660633970, 'superadmin', 1),
(35, '49.205.114.153', 'Mozilla Firefox', 'windows', 1660636782, 1660637082, 'superadmin', 1),
(36, '49.205.114.153', 'Mozilla Firefox', 'windows', 1660706913, 1660707213, 'superadmin', 1),
(37, '49.205.114.153', 'Mozilla Firefox', 'windows', 1660706965, 1660707265, 'user', 2),
(38, '49.205.114.153', 'Mozilla Firefox', 'windows', 1660707012, 1660707312, 'superadmin', 1),
(39, '49.205.114.153', 'Mozilla Firefox', 'windows', 1660708637, 1660708937, 'user', 2),
(40, '49.205.114.153', 'Mozilla Firefox', 'windows', 1660708666, NULL, 'superadmin', 1),
(41, '49.205.114.153', 'Mozilla Firefox', 'windows', 1660714929, NULL, 'user', 2),
(42, '117.98.151.221', 'Mozilla Firefox', 'windows', 1660726508, 1660726808, 'user', 2),
(43, '117.98.151.221', 'Mozilla Firefox', 'windows', 1660728003, NULL, 'user', 2),
(44, '151.210.134.97', 'Apple Safari', 'mac', 1660739122, NULL, 'admin', 2),
(45, '110.235.227.112', 'Google Chrome', 'mac', 1660800093, 1660800393, 'user', 2),
(46, '110.235.227.112', 'Google Chrome', 'mac', 1660801469, 1660801769, 'user', 2),
(47, '110.235.227.112', 'Google Chrome', 'mac', 1660801953, 1660802253, 'user', 2),
(48, '223.178.21.106', 'Mozilla Firefox', 'windows', 1660803072, NULL, 'user', 2),
(49, '110.235.227.112', 'Google Chrome', 'mac', 1660803402, 1660803702, 'user', 2),
(50, '110.235.227.112', 'Google Chrome', 'mac', 1660804139, 1660804439, 'user', 2),
(51, '110.235.227.112', 'Google Chrome', 'mac', 1660805193, NULL, 'superadmin', 1),
(52, '110.235.227.112', 'Google Chrome', 'mac', 1660810366, NULL, 'agents', 2),
(53, '151.210.137.241', 'Google Chrome', 'windows', 1660813949, NULL, 'admin', 2),
(54, '110.235.227.112', 'Google Chrome', 'mac', 1660821564, 1660821864, 'user', 2),
(55, '110.235.227.112', 'Google Chrome', 'mac', 1660821698, 1660821998, 'landlord', 2),
(56, '117.98.128.142', 'Mozilla Firefox', 'windows', 1660879424, NULL, 'user', 2),
(57, '117.98.128.142', 'Mozilla Firefox', 'windows', 1660879511, NULL, 'superadmin', 1),
(58, '117.98.128.142', 'Mozilla Firefox', 'windows', 1660879554, NULL, 'agents', 2),
(59, '110.235.227.112', 'Google Chrome', 'mac', 1660880850, NULL, 'user', 2),
(60, '110.235.227.112', 'Google Chrome', 'mac', 1660880865, 1660881165, 'landlord', 2),
(61, '110.235.227.112', 'Google Chrome', 'mac', 1660886384, NULL, 'landlord', 2),
(62, '110.235.227.89', 'Google Chrome', 'mac', 1660920438, 1660920738, 'agents', 2),
(63, '110.235.227.89', 'Google Chrome', 'mac', 1660920728, NULL, 'agents', 2),
(64, '110.235.227.89', 'Google Chrome', 'mac', 1660969997, 1660970297, 'landlord', 2),
(65, '110.235.227.89', 'Google Chrome', 'mac', 1660976935, 1660977235, 'landlord', 2),
(66, '110.235.227.89', 'Google Chrome', 'mac', 1661001464, NULL, 'landlord', 2),
(67, '110.235.227.213', 'Google Chrome', 'mac', 1661146582, 1661146882, 'landlord', 2),
(68, '122.162.90.62', 'Mozilla Firefox', 'windows', 1661156831, NULL, 'user', 2),
(69, '122.162.90.62', 'Mozilla Firefox', 'windows', 1661156855, NULL, 'landlord', 2),
(70, '110.235.227.213', 'Google Chrome', 'mac', 1661176054, 1661176354, 'landlord', 2),
(71, '110.235.227.213', 'Google Chrome', 'mac', 1661178072, 1661178372, 'user', 2),
(72, '110.235.227.213', 'Google Chrome', 'mac', 1661178144, 1661178444, 'user', 2),
(73, '110.235.227.213', 'Google Chrome', 'mac', 1661178216, 1661178516, 'user', 2),
(74, '110.235.227.213', 'Google Chrome', 'mac', 1661178260, 1661178560, 'user', 2),
(75, '110.235.227.213', 'Google Chrome', 'mac', 1661178310, 1661178610, 'user', 2),
(76, '110.235.227.213', 'Google Chrome', 'mac', 1661178346, NULL, 'user', 2),
(77, '110.235.227.213', 'Google Chrome', 'mac', 1661178367, NULL, 'landlord', 2),
(78, '106.203.203.172', 'Mozilla Firefox', 'windows', 1661249003, NULL, 'admin', 2),
(79, '106.203.203.172', 'Mozilla Firefox', 'windows', 1661250276, 1661250576, 'landlord', 2),
(80, '106.203.203.172', 'Mozilla Firefox', 'windows', 1661250651, NULL, 'user', 2),
(81, '151.210.138.173', 'Apple Safari', 'mac', 1661252314, 1661252614, 'admin', 2),
(82, '151.210.138.173', 'Apple Safari', 'mac', 1661252315, 1661252615, 'admin', 2),
(83, '151.210.138.173', 'Apple Safari', 'mac', 1661252575, 1661252875, 'admin', 2),
(84, '151.210.138.173', 'Apple Safari', 'mac', 1661252831, NULL, 'admin', 2),
(85, '106.203.203.172', 'Mozilla Firefox', 'windows', 1661252970, NULL, 'landlord', 2),
(86, '110.235.227.246', 'Google Chrome', 'mac', 1661578531, 1661578831, 'user', 2),
(87, '110.235.227.246', 'Google Chrome', 'mac', 1661578607, 1661578907, 'landlord', 2),
(88, '110.235.227.246', 'Google Chrome', 'mac', 1661581410, 1661581710, 'user', 2),
(89, '151.210.135.213', 'Google Chrome', 'windows', 1661597762, NULL, 'admin', 2),
(90, '110.235.227.246', 'Google Chrome', 'mac', 1661606599, 1661606899, 'landlord', 2),
(91, '110.235.227.246', 'Google Chrome', 'mac', 1661606958, 1661607258, 'user', 2),
(92, '110.235.227.246', 'Google Chrome', 'mac', 1661607350, 1661607650, 'landlord', 2),
(93, '110.235.227.246', 'Google Chrome', 'mac', 1661607478, NULL, 'landlord', 3),
(94, '110.235.227.246', 'Google Chrome', 'mac', 1661609377, 1661609677, 'user', 2),
(95, '110.235.227.246', 'Google Chrome', 'mac', 1661609389, NULL, 'user', 4),
(96, '110.235.227.246', 'Google Chrome', 'mac', 1661610296, NULL, 'user', 2),
(97, '110.235.227.246', 'Google Chrome', 'mac', 1661759407, NULL, 'landlord', 2),
(98, '110.235.227.141', 'Google Chrome', 'mac', 1661768199, NULL, 'user', 2),
(99, '110.235.227.146', 'Google Chrome', 'mac', 1661776826, 1661777126, 'landlord', 2),
(100, '110.225.200.35', 'Mozilla Firefox', 'windows', 1661838663, 1661838963, 'superadmin', 1),
(101, '110.225.200.35', 'Mozilla Firefox', 'windows', 1661838801, 1661839101, 'agents', 4),
(102, '110.225.200.35', 'Mozilla Firefox', 'windows', 1661839055, NULL, 'superadmin', 1),
(103, '110.225.200.35', 'Mozilla Firefox', 'windows', 1661840473, NULL, 'company', 7),
(104, '110.225.200.35', 'Mozilla Firefox', 'windows', 1661840843, 1661841143, 'user', 6),
(105, '110.225.200.35', 'Mozilla Firefox', 'windows', 1661840919, 1661841219, 'user', 6),
(106, '110.225.200.35', 'Mozilla Firefox', 'windows', 1661840947, NULL, 'user', 6),
(107, '110.225.200.35', 'Mozilla Firefox', 'windows', 1661841071, NULL, 'landlord', 5),
(108, '110.225.200.35', 'Mozilla Firefox', 'windows', 1661841123, NULL, 'agents', 4),
(109, '110.235.227.146', 'Google Chrome', 'mac', 1661842615, 1661842915, 'landlord', 2),
(110, '110.235.227.146', 'Google Chrome', 'mac', 1661853803, 1661854103, 'landlord', 6),
(111, '151.210.134.6', 'Google Chrome', 'windows', 1661857903, 1661858203, 'admin', 2),
(112, '151.210.134.6', 'Google Chrome', 'windows', 1661859658, 1661859958, 'landlord', 7),
(113, '151.210.134.6', 'Google Chrome', 'windows', 1661860216, NULL, 'company', 8),
(114, '151.210.134.6', 'Google Chrome', 'windows', 1661860582, NULL, 'agents', 5),
(115, '151.210.134.6', 'Google Chrome', 'windows', 1661860690, NULL, 'landlord', 7),
(116, '151.210.134.6', 'Google Chrome', 'windows', 1661860953, NULL, 'user', 7),
(117, '110.235.227.146', 'Google Chrome', 'mac', 1661861532, 1661861832, 'landlord', 2),
(118, '110.235.227.146', 'Google Chrome', 'mac', 1661864110, NULL, 'landlord', 6),
(119, '110.235.227.146', 'Google Chrome', 'mac', 1661871771, 1661872071, 'landlord', 2),
(120, '110.235.227.146', 'Google Chrome', 'linux', 1661885627, NULL, 'landlord', 2),
(121, '122.173.162.37', 'Mozilla Firefox', 'windows', 1662029350, 1662029650, 'superadmin', 1),
(122, '110.235.227.164', 'Google Chrome', 'mac', 1662093990, 1662094290, 'landlord', 2),
(123, '110.235.227.164', 'Google Chrome', 'mac', 1662094009, 1662094309, 'landlord', 6),
(124, '110.235.227.164', 'Google Chrome', 'mac', 1662094204, 1662094504, 'landlord', 2),
(125, '110.235.227.164', 'Google Chrome', 'mac', 1662096386, 1662096686, 'landlord', 6),
(126, '110.235.227.164', 'Google Chrome', 'mac', 1662097305, 1662097605, 'landlord', 2),
(127, '122.173.162.37', 'Mozilla Firefox', 'windows', 1662115729, 1662116029, 'superadmin', 1),
(128, '110.235.227.164', 'Google Chrome', 'mac', 1662116893, NULL, 'user', 2),
(129, '122.173.162.37', 'Mozilla Firefox', 'windows', 1662118954, 1662119254, 'superadmin', 1),
(130, '151.210.134.247', 'Google Chrome', 'windows', 1662120236, NULL, 'admin', 2),
(131, '151.210.134.247', 'Google Chrome', 'windows', 1662121889, 1662122189, 'company', 8),
(132, '151.210.134.247', 'Google Chrome', 'windows', 1662122748, NULL, 'company', 8),
(133, '122.173.162.37', 'Mozilla Firefox', 'windows', 1662126422, 1662126722, 'agents', 4),
(134, '151.210.134.247', 'Google Chrome', 'windows', 1662126438, NULL, 'agents', 5),
(135, '122.173.162.37', 'Mozilla Firefox', 'windows', 1662128124, NULL, 'agents', 4),
(136, '110.235.227.164', 'Google Chrome', 'mac', 1662129841, NULL, 'landlord', 2),
(137, '110.235.227.164', 'Google Chrome', 'mac', 1662130858, NULL, 'superadmin', 1),
(138, '110.235.227.164', 'Google Chrome', 'mac', 1662204754, NULL, 'company', 5),
(139, '110.235.227.164', 'Google Chrome', 'mac', 1662204771, NULL, 'landlord', 6),
(140, '151.210.136.210', 'Google Chrome', 'windows', 1662373116, NULL, 'agents', 5),
(141, '151.210.136.210', 'Google Chrome', 'windows', 1662373278, NULL, 'company', 8),
(142, '151.210.136.210', 'Google Chrome', 'windows', 1662373394, NULL, 'landlord', 7),
(143, '110.235.227.64', 'Google Chrome', 'mac', 1662381792, 1662382092, 'agents', 2),
(144, '122.173.162.37', 'Mozilla Firefox', 'windows', 1662442010, 1662442310, 'landlord', 5),
(145, '122.173.162.37', 'Mozilla Firefox', 'windows', 1662442039, NULL, 'superadmin', 1),
(146, '122.173.162.37', 'Mozilla Firefox', 'windows', 1662442159, NULL, 'landlord', 5),
(147, '110.235.227.64', 'Google Chrome', 'mac', 1662444585, 1662444885, 'user', 2),
(148, '110.235.227.64', 'Google Chrome', 'mac', 1662444749, 1662445049, 'user', 2),
(149, '110.235.227.64', 'Google Chrome', 'mac', 1662444903, 1662445203, 'agents', 2),
(150, '110.235.227.64', 'Google Chrome', 'mac', 1662445343, 1662445643, 'company', 2),
(151, '110.235.227.64', 'Google Chrome', 'mac', 1662445494, 1662445794, 'company', 2),
(152, '110.235.227.64', 'Google Chrome', 'mac', 1662445589, 1662445889, 'company', 2),
(153, '110.235.227.64', 'Google Chrome', 'mac', 1662446019, NULL, 'superadmin', 1),
(154, '110.235.227.64', 'Google Chrome', 'mac', 1662446154, 1662446454, 'company', 2),
(155, '110.235.227.64', 'Google Chrome', 'mac', 1662446386, 1662446686, 'company', 2),
(156, '110.235.227.64', 'Google Chrome', 'mac', 1662446923, 1662447223, 'agents', 2),
(157, '110.235.227.64', 'Google Chrome', 'mac', 1662447020, 1662447320, 'landlord', 2),
(158, '110.235.227.64', 'Google Chrome', 'mac', 1662460949, 1662461249, 'landlord', 2),
(159, '122.179.225.190', 'Mozilla Firefox', 'windows', 1662465115, 1662465415, 'landlord', 5),
(160, '122.179.225.190', 'Mozilla Firefox', 'windows', 1662470015, 1662470315, 'superadmin', 1),
(161, '122.179.225.190', 'Mozilla Firefox', 'windows', 1662470108, 1662470408, 'company', 3),
(162, '110.235.227.64', 'Google Chrome', 'mac', 1662471953, 1662472253, 'company', 2),
(163, '110.235.227.64', 'Google Chrome', 'mac', 1662474357, 1662474657, 'company', 3),
(164, '110.235.227.64', 'Google Chrome', 'mac', 1662474742, 1662475042, 'agents', 2),
(165, '110.235.227.64', 'Google Chrome', 'mac', 1662474762, 1662475062, 'company', 2),
(166, '110.235.227.64', 'Google Chrome', 'mac', 1662475062, 1662475362, 'agents', 2),
(167, '110.235.227.64', 'Google Chrome', 'mac', 1662475669, 1662475969, 'company', 3),
(168, '110.235.227.64', 'Google Chrome', 'mac', 1662481245, 1662481545, 'company', 2),
(169, '110.235.227.64', 'Google Chrome', 'mac', 1662481341, 1662481641, 'company', 3),
(170, '122.179.225.190', 'Mozilla Firefox', 'windows', 1662486116, 1662486416, 'landlord', 5),
(171, '122.179.225.190', 'Mozilla Firefox', 'windows', 1662486151, 1662486451, 'landlord', 5),
(172, '122.179.225.190', 'Mozilla Firefox', 'windows', 1662486172, NULL, 'company', 3),
(173, '110.235.227.64', 'Google Chrome', 'mac', 1662486433, 1662486733, 'company', 2),
(174, '110.235.227.64', 'Google Chrome', 'mac', 1662487140, 1662487440, 'landlord', 2),
(175, '110.235.227.64', 'Google Chrome', 'linux', 1662490621, 1662490921, 'user', 2),
(176, '122.179.225.190', 'Mozilla Firefox', 'windows', 1662490693, 1662490993, 'superadmin', 1),
(177, '122.179.225.190', 'Mozilla Firefox', 'windows', 1662494148, 1662494448, 'superadmin', 1),
(178, '122.179.225.190', 'Mozilla Firefox', 'windows', 1662499684, NULL, 'superadmin', 1),
(179, '122.179.225.190', 'Mozilla Firefox', 'windows', 1662499754, NULL, 'landlord', 5),
(180, '122.179.225.190', 'Mozilla Firefox', 'windows', 1662499847, 1662500147, 'agents', 2),
(181, '122.179.225.190', 'Mozilla Firefox', 'windows', 1662499906, NULL, 'landlord', 2),
(182, '122.179.225.190', 'Mozilla Firefox', 'windows', 1662500149, NULL, 'user', 2),
(183, '122.179.225.190', 'Mozilla Firefox', 'windows', 1662500246, NULL, 'agents', 2),
(184, '110.235.227.64', 'Google Chrome', 'mac', 1662522361, 1662522661, 'company', 2),
(185, '110.235.227.64', 'Google Chrome', 'mac', 1662523789, 1662524089, 'company', 3),
(186, '110.235.227.64', 'Google Chrome', 'mac', 1662529583, 1662529883, 'company', 2),
(187, '151.210.139.30', 'Google Chrome', 'windows', 1662536012, NULL, 'agents', 5),
(188, '110.235.227.64', 'Google Chrome', 'mac', 1662536277, 1662536577, 'user', 2),
(189, '122.183.43.208', 'Mozilla Firefox', 'windows', 1662536685, NULL, 'landlord', 2),
(190, '110.235.227.64', 'Google Chrome', 'mac', 1662536745, NULL, 'agents', 2),
(191, '110.235.227.64', 'Google Chrome', 'mac', 1662536829, 1662537129, 'landlord', 2),
(192, '151.210.139.30', 'Google Chrome', 'windows', 1662536997, NULL, 'landlord', 7),
(193, '151.210.139.30', 'Google Chrome', 'windows', 1662537420, NULL, 'admin', 2),
(194, '122.183.43.208', 'Mozilla Firefox', 'windows', 1662537547, NULL, 'agents', 2),
(195, '110.235.227.64', 'Google Chrome', 'mac', 1662540457, 1662540757, 'company', 2),
(196, '122.183.43.208', 'Mozilla Firefox', 'windows', 1662543246, 1662543546, 'company', 3),
(197, '110.235.227.64', 'Google Chrome', 'mac', 1662549799, 1662550099, 'user', 2),
(198, '110.235.227.64', 'Google Chrome', 'mac', 1662552494, NULL, 'landlord', 2),
(199, '110.235.227.64', 'Google Chrome', 'mac', 1662552691, NULL, 'company', 2),
(200, '110.235.227.64', 'Google Chrome', 'mac', 1662553531, 1662553831, 'company', 3),
(201, '110.235.227.64', 'Google Chrome', 'mac', 1662555226, NULL, 'company', 3),
(202, '122.183.43.208', 'Mozilla Firefox', 'windows', 1662555858, NULL, 'company', 3),
(203, '122.183.43.208', 'Mozilla Firefox', 'windows', 1662555942, NULL, 'superadmin', 1),
(204, '110.235.227.64', 'Google Chrome', 'mac', 1662563068, 1662563368, 'user', 2),
(205, '110.235.227.64', 'Google Chrome', 'linux', 1662608055, NULL, 'user', 2),
(206, '151.210.137.78', 'Google Chrome', 'windows', 1662625104, 1662625404, 'admin', 2),
(207, '151.210.137.78', 'Google Chrome', 'windows', 1662627246, NULL, 'admin', 2),
(208, '151.210.137.78', 'Google Chrome', 'windows', 1662632269, NULL, 'agents', 5),
(209, '151.210.137.78', 'Google Chrome', 'windows', 1662632381, NULL, 'landlord', 7),
(210, '222.154.233.83', 'Google Chrome', 'windows', 1662686117, 1662686417, 'company', 4),
(211, '222.154.233.83', 'Apple Safari', 'mac', 1662686172, NULL, 'admin', 2),
(212, '222.154.233.83', 'Google Chrome', 'windows', 1662686297, NULL, 'company', 4),
(213, '122.182.241.183', 'Mozilla Firefox', 'windows', 1662694867, NULL, 'agents', 2),
(214, '122.182.241.183', 'Mozilla Firefox', 'windows', 1662695063, NULL, 'landlord', 2),
(215, '122.182.241.183', 'Mozilla Firefox', 'windows', 1662695534, NULL, 'user', 2),
(216, '151.210.139.191', 'Google Chrome', 'windows', 1662712163, NULL, 'user', 8),
(217, '151.210.139.191', 'Google Chrome', 'windows', 1662712756, NULL, 'landlord', 9),
(218, '151.210.139.191', 'Google Chrome', 'windows', 1662713048, NULL, 'company', 4),
(219, '136.185.105.159', 'Mozilla Firefox', 'windows', 1662795903, NULL, 'user', 6),
(220, '151.210.135.89', 'Google Chrome', 'windows', 1662796055, 1662796355, 'user', 8),
(221, '151.210.135.89', 'Google Chrome', 'windows', 1662796056, NULL, 'user', 8),
(222, '136.185.105.159', 'Mozilla Firefox', 'windows', 1662798413, 1662798713, 'company', 3),
(223, '151.210.135.89', 'Google Chrome', 'windows', 1662798436, NULL, 'admin', 2),
(224, '136.185.105.159', 'Mozilla Firefox', 'windows', 1662798482, 1662798782, 'superadmin', 1),
(225, '151.210.135.89', 'Google Chrome', 'windows', 1662798487, 1662798787, 'company', 4),
(226, '151.210.135.89', 'Google Chrome', 'windows', 1662803118, NULL, 'company', 4),
(227, '151.210.135.89', 'Google Chrome', 'windows', 1662803199, NULL, 'company', 3),
(228, '136.185.105.159', 'Mozilla Firefox', 'windows', 1662804581, NULL, 'company', 3),
(229, '136.185.105.159', 'Mozilla Firefox', 'windows', 1662804719, NULL, 'landlord', 5),
(230, '151.210.135.89', 'Google Chrome', 'windows', 1662804755, NULL, 'agents', 7),
(231, '136.185.105.159', 'Mozilla Firefox', 'windows', 1662804868, NULL, 'agents', 4),
(232, '136.185.105.159', 'Mozilla Firefox', 'windows', 1662805322, 1662805622, 'agents', 2),
(233, '151.210.135.89', 'Google Chrome', 'windows', 1662805394, NULL, 'agents', 2),
(234, '136.185.105.159', 'Mozilla Firefox', 'windows', 1662807059, NULL, 'agents', 2),
(235, '136.185.105.159', 'Mozilla Firefox', 'windows', 1662807182, NULL, 'landlord', 2),
(236, '151.210.135.89', 'Google Chrome', 'windows', 1662807225, NULL, 'landlord', 2),
(237, '151.210.135.89', 'Google Chrome', 'windows', 1662810108, NULL, 'agents', 5),
(238, '136.185.105.159', 'Mozilla Firefox', 'windows', 1662831823, NULL, 'superadmin', 1),
(239, '122.175.188.108', 'Mozilla Firefox', 'windows', 1662913126, NULL, 'user', 2),
(240, '122.175.188.108', 'Mozilla Firefox', 'windows', 1662913398, 1662913698, 'company', 3),
(241, '122.175.188.108', 'Mozilla Firefox', 'windows', 1662918955, NULL, 'agents', 2),
(242, '122.175.188.108', 'Mozilla Firefox', 'windows', 1662919728, NULL, 'company', 3),
(243, '157.47.48.213', 'Google Chrome', 'mac', 1662963871, 1662964171, 'user', 2),
(244, '157.47.48.213', 'Google Chrome', 'mac', 1662963910, 1662964210, 'user', 2),
(245, '157.47.48.213', 'Google Chrome', 'mac', 1662964034, 1662964334, 'user', 2),
(246, '157.47.48.213', 'Google Chrome', 'mac', 1662964407, 1662964707, 'agents', 2),
(247, '157.47.48.213', 'Google Chrome', 'mac', 1662964686, 1662964986, 'user', 2),
(248, '157.47.48.213', 'Google Chrome', 'mac', 1662965008, 1662965308, 'agents', 2),
(249, '157.47.48.213', 'Google Chrome', 'mac', 1662966844, NULL, 'company', 2),
(250, '157.47.48.213', 'Google Chrome', 'mac', 1662967327, 1662967627, 'agents', 2),
(251, '157.47.48.213', 'Google Chrome', 'mac', 1662967346, 1662967646, 'landlord', 2),
(252, '157.47.48.213', 'Google Chrome', 'mac', 1662967359, 1662967659, 'user', 2),
(253, '157.47.48.213', 'Google Chrome', 'mac', 1662967542, 1662967842, 'agents', 2),
(254, '157.47.48.213', 'Google Chrome', 'mac', 1662967572, NULL, 'landlord', 2),
(255, '157.47.48.213', 'Google Chrome', 'mac', 1662967679, 1662967979, 'user', 2),
(256, '157.47.48.213', 'Google Chrome', 'mac', 1662968887, NULL, 'agents', 2),
(257, '157.47.48.213', 'Google Chrome', 'mac', 1662968944, NULL, 'user', 2),
(258, '157.47.48.213', 'Google Chrome', 'mac', 1662969512, NULL, 'company', 3),
(259, '151.210.139.116', 'Google Chrome', 'windows', 1662976534, NULL, 'agents', 5),
(260, '157.47.48.118', 'Google Chrome', 'mac', 1662985913, 1662986213, 'agents', 2),
(261, '157.47.48.118', 'Google Chrome', 'mac', 1662985915, 1662986215, 'agents', 2),
(262, '157.47.48.118', 'Google Chrome', 'mac', 1662989938, NULL, 'user', 2),
(263, '157.47.48.118', 'Google Chrome', 'mac', 1662989959, NULL, 'agents', 2),
(264, '157.47.48.118', 'Google Chrome', 'mac', 1662989980, NULL, 'landlord', 2),
(265, '110.225.198.29', 'Mozilla Firefox', 'windows', 1663074730, 1663075030, 'company', 3),
(266, '110.225.198.29', 'Mozilla Firefox', 'windows', 1663075300, 1663075600, 'agents', 2),
(267, '110.225.198.29', 'Mozilla Firefox', 'windows', 1663076239, 1663076539, 'company', 3),
(268, '110.225.198.29', 'Mozilla Firefox', 'windows', 1663076244, 1663076544, 'company', 3),
(269, '110.225.198.29', 'Mozilla Firefox', 'windows', 1663076282, 1663076582, 'landlord', 2),
(270, '110.225.198.29', 'Mozilla Firefox', 'windows', 1663076348, 1663076648, 'company', 3),
(271, '110.225.198.29', 'Mozilla Firefox', 'windows', 1663081772, 1663082072, 'agents', 2),
(272, '110.225.198.29', 'Mozilla Firefox', 'windows', 1663082229, NULL, 'user', 6),
(273, '110.225.198.29', 'Mozilla Firefox', 'windows', 1663082456, NULL, 'landlord', 2),
(274, '110.225.198.29', 'Mozilla Firefox', 'windows', 1663087594, 1663087894, 'company', 3),
(275, '110.225.198.29', 'Mozilla Firefox', 'windows', 1663088957, NULL, 'agents', 2),
(276, '110.225.198.29', 'Mozilla Firefox', 'windows', 1663091319, NULL, 'user', 2),
(277, '110.225.198.29', 'Mozilla Firefox', 'windows', 1663091410, NULL, 'agents', 4),
(278, '110.225.198.29', 'Mozilla Firefox', 'windows', 1663091538, NULL, 'company', 3),
(279, '157.47.55.153', 'Google Chrome', 'linux', 1663092813, NULL, 'user', 2),
(280, '157.47.32.109', 'Google Chrome', 'linux', 1663092964, NULL, 'agents', 2),
(281, '157.47.51.244', 'Google Chrome', 'linux', 1663092994, NULL, 'company', 2),
(282, '151.210.138.103', 'Google Chrome', 'windows', 1663099763, NULL, 'agents', 5),
(283, '157.47.41.52', 'Google Chrome', 'mac', 1663130457, NULL, 'company', 2),
(284, '157.47.41.52', 'Google Chrome', 'mac', 1663134344, 1663134644, 'agents', 2),
(285, '157.47.41.52', 'Google Chrome', 'mac', 1663139654, NULL, 'user', 2),
(286, '157.47.41.52', 'Google Chrome', 'mac', 1663139929, NULL, 'agents', 2),
(287, '157.47.41.52', 'Google Chrome', 'mac', 1663139958, NULL, 'landlord', 2),
(288, '157.47.63.19', 'Google Chrome', 'mac', 1663148772, 1663149072, 'user', 2),
(289, '157.47.63.19', 'Google Chrome', 'mac', 1663149469, 1663149769, 'user', 2),
(290, '157.47.63.19', 'Google Chrome', 'mac', 1663149569, 1663149869, 'user', 2),
(291, '151.210.134.194', 'Google Chrome', 'windows', 1663150266, 1663150566, 'agents', 5),
(292, '157.47.63.19', 'Google Chrome', 'mac', 1663150805, 1663151105, 'user', 2),
(293, '157.47.63.19', 'Google Chrome', 'mac', 1663150873, 1663151173, 'user', 2),
(294, '157.47.63.19', 'Google Chrome', 'mac', 1663151302, 1663151602, 'user', 2),
(295, '151.210.134.194', 'Google Chrome', 'windows', 1663151419, NULL, 'admin', 2),
(296, '157.47.63.19', 'Google Chrome', 'mac', 1663151482, NULL, 'user', 2),
(297, '151.210.134.194', 'Google Chrome', 'windows', 1663151554, NULL, 'company', 4),
(298, '151.210.134.194', 'Google Chrome', 'windows', 1663151810, NULL, 'agents', 5),
(299, '157.47.63.19', 'Google Chrome', 'mac', 1663152994, 1663153294, 'superadmin', 1),
(300, '157.47.63.19', 'Google Chrome', 'mac', 1663153020, NULL, 'superadmin', 1),
(301, '157.47.63.19', 'Google Chrome', 'mac', 1663153059, NULL, 'agents', 2),
(302, '157.47.59.248', 'Google Chrome', 'mac', 1663155488, NULL, 'company', 2),
(303, '157.47.59.248', 'Google Chrome', 'mac', 1663159085, NULL, 'agents', 2),
(304, '49.204.216.111', 'Google Chrome', 'windows', 1663174647, NULL, 'agents', 2),
(305, '157.47.36.221', 'Google Chrome', 'mac', 1663213732, NULL, 'company', 2),
(306, '157.47.62.39', 'Google Chrome', 'mac', 1663226655, NULL, 'company', 2),
(307, '157.47.62.39', 'Google Chrome', 'mac', 1663226687, NULL, 'agents', 2),
(308, '110.225.207.121', 'Mozilla Firefox', 'windows', 1663235093, 1663235393, 'agents', 2),
(309, '110.225.207.121', 'Mozilla Firefox', 'windows', 1663238471, NULL, 'company', 3),
(310, '110.225.207.121', 'Mozilla Firefox', 'windows', 1663242568, NULL, 'agents', 2),
(311, '223.233.102.11', 'Mozilla Firefox', 'windows', 1663263278, NULL, 'agents', 2),
(312, '157.47.57.106', 'Google Chrome', 'linux', 1663269287, NULL, 'user', 2),
(313, '151.210.139.129', 'Google Chrome', 'windows', 1663334753, 1663335053, 'agents', 5),
(314, '151.210.139.129', 'Google Chrome', 'windows', 1663335168, NULL, 'agents', 5),
(315, '151.210.139.129', 'Google Chrome', 'windows', 1663335235, NULL, 'company', 4),
(316, '151.210.139.129', 'Apple Safari', 'mac', 1663374686, NULL, 'agents', 5),
(317, '151.210.139.129', 'Apple Safari', 'mac', 1663374973, NULL, 'company', 4),
(318, '223.233.102.11', 'Mozilla Firefox', 'windows', 1663414644, NULL, 'agents', 4),
(319, '103.161.31.20', 'Google Chrome', 'mac', 1663476958, 1663477258, 'agents', 2),
(320, '103.161.31.20', 'Google Chrome', 'mac', 1663479740, 1663480040, 'landlord', 2),
(321, '103.161.31.20', 'Google Chrome', 'mac', 1663479769, 1663480069, 'company', 3),
(322, '103.161.31.20', 'Google Chrome', 'mac', 1663479962, 1663480262, 'agents', 2),
(323, '103.161.31.20', 'Google Chrome', 'mac', 1663480261, 1663480561, 'landlord', 2),
(324, '103.161.31.20', 'Google Chrome', 'mac', 1663480504, 1663480804, 'agents', 2),
(325, '151.210.136.6', 'Google Chrome', 'windows', 1663500702, NULL, 'agents', 5),
(326, '151.210.136.6', 'Google Chrome', 'windows', 1663501264, NULL, 'admin', 2),
(327, '151.210.136.6', 'Google Chrome', 'windows', 1663502063, NULL, 'company', 4),
(328, '151.210.136.6', 'Google Chrome', 'windows', 1663502330, NULL, 'agents', 6),
(329, '136.185.57.74', 'Mozilla Firefox', 'windows', 1663651272, NULL, 'company', 3),
(330, '136.185.57.74', 'Mozilla Firefox', 'windows', 1663651496, NULL, 'agents', 2),
(331, '136.185.57.74', 'Mozilla Firefox', 'windows', 1663652796, NULL, 'landlord', 2),
(332, '151.210.139.88', 'Apple Safari', 'mac', 1663664739, NULL, 'agents', 5),
(333, '103.161.31.20', 'Google Chrome', 'mac', 1663738148, 1663738448, 'agents', 2),
(334, '151.210.134.75', 'Apple Safari', 'mac', 1663753333, NULL, 'company', 4),
(335, '151.210.134.75', 'Apple Safari', 'mac', 1663753481, NULL, 'agents', 6),
(336, '103.161.31.20', 'Google Chrome', 'mac', 1663754213, 1663754513, 'agents', 2),
(337, '103.161.31.20', 'Google Chrome', 'mac', 1663754729, 1663755029, 'user', 2),
(338, '103.161.31.20', 'Google Chrome', 'mac', 1663754748, 1663755048, 'landlord', 2),
(339, '103.161.31.20', 'Google Chrome', 'mac', 1663754776, 1663755076, 'company', 2),
(340, '103.161.31.20', 'Google Chrome', 'mac', 1663755041, 1663755341, 'company', 3),
(341, '103.161.31.20', 'Google Chrome', 'mac', 1663756488, 1663756788, 'user', 2),
(342, '103.161.31.20', 'Google Chrome', 'mac', 1663756509, 1663756809, 'user', 2),
(343, '103.161.31.20', 'Google Chrome', 'mac', 1663756509, 1663756809, 'user', 2),
(344, '103.161.31.20', 'Google Chrome', 'mac', 1663756513, 1663756813, 'user', 2),
(345, '103.161.31.20', 'Google Chrome', 'mac', 1663756514, 1663756814, 'user', 2),
(346, '103.161.31.20', 'Google Chrome', 'mac', 1663757130, 1663757430, 'user', 2),
(347, '103.161.31.20', 'Google Chrome', 'mac', 1663761203, 1663761503, 'user', 2),
(348, '103.161.31.20', 'Google Chrome', 'mac', 1663762642, 1663762942, 'agents', 2),
(349, '110.225.200.147', 'Mozilla Firefox', 'windows', 1663826104, NULL, 'agents', 2),
(350, '151.210.139.203', 'Apple Safari', 'mac', 1663840540, NULL, 'agents', 6),
(351, '122.175.82.39', 'Mozilla Firefox', 'windows', 1663878694, NULL, 'agents', 2),
(352, '151.210.139.83', 'Apple Safari', 'mac', 1664027214, NULL, 'agents', 6),
(353, '151.210.138.113', 'Apple Safari', 'mac', 1664108763, NULL, 'agents', 6),
(354, '151.210.138.113', 'Google Chrome', 'windows', 1664163421, NULL, 'agents', 6),
(355, '103.161.31.20', 'Google Chrome', 'mac', 1664172602, 1664172902, 'agents', 2),
(356, '103.161.31.20', 'Google Chrome', 'mac', 1664196141, 1664196441, 'agents', 2),
(357, '103.161.31.20', 'Google Chrome', 'mac', 1664198258, 1664198558, 'agents', 2),
(358, '103.161.31.20', 'Google Chrome', 'linux', 1664248396, 1664248696, 'agents', 2),
(359, '151.210.137.124', 'Apple Safari', 'mac', 1664273016, NULL, 'agents', 6),
(360, '103.161.31.20', 'Google Chrome', 'mac', 1664340836, 1664341136, 'agents', 2),
(361, '151.210.135.136', 'Apple Safari', 'mac', 1664350394, NULL, 'agents', 6),
(362, '103.161.31.20', 'Google Chrome', 'mac', 1664366348, 1664366648, 'agents', 2),
(363, '103.161.31.20', 'Google Chrome', 'mac', 1664424196, 1664424496, 'agents', 2),
(364, '103.161.31.20', 'Google Chrome', 'mac', 1664427044, 1664427344, 'agents', 2),
(365, '151.210.134.180', 'Apple Safari', 'mac', 1664452294, NULL, 'agents', 6),
(366, '103.161.31.20', 'Google Chrome', 'mac', 1664510531, 1664510831, 'agents', 2),
(367, '103.161.31.20', 'Google Chrome', 'mac', 1664524378, 1664524678, 'agents', 2),
(368, '151.210.136.85', 'Apple Safari', 'mac', 1664528548, 1664528848, 'agents', 6),
(369, '151.210.136.85', 'Google Chrome', 'windows', 1664533925, NULL, 'landlord', 7),
(370, '151.210.136.85', 'Google Chrome', 'windows', 1664534725, NULL, 'agents', 6),
(371, '151.210.136.85', 'Google Chrome', 'windows', 1664535305, NULL, 'company', 4),
(372, '151.210.136.85', 'Google Chrome', 'windows', 1664535589, NULL, 'admin', 2),
(373, '151.210.136.85', 'Google Chrome', 'windows', 1664535672, NULL, 'company', 3),
(374, '151.210.136.85', 'Google Chrome', 'windows', 1664535824, NULL, 'agents', 2),
(375, '103.161.31.20', 'Google Chrome', 'mac', 1664538564, 1664538864, 'agents', 2),
(376, '103.161.31.20', 'Google Chrome', 'mac', 1664544977, 1664545277, 'landlord', 2),
(377, '103.161.31.20', 'Google Chrome', 'mac', 1664601762, 1664602062, 'agents', 2),
(378, '223.178.15.17', 'Mozilla Firefox', 'windows', 1664602220, NULL, 'agents', 2),
(379, '103.161.31.20', 'Google Chrome', 'mac', 1664628444, 1664628744, 'agents', 2),
(380, '151.210.136.85', 'Apple Safari', 'mac', 1664630479, NULL, 'agents', 6),
(381, '151.210.137.163', 'Apple Safari', 'mac', 1664709896, NULL, 'agents', 6),
(382, '103.161.31.20', 'Google Chrome', 'mac', 1664784994, 1664785294, 'agents', 2),
(383, '103.161.31.20', 'Google Chrome', 'mac', 1664788197, 1664788497, 'agents', 2),
(384, '151.210.136.177', 'Google Chrome', 'windows', 1664788606, NULL, 'user', 7),
(385, '151.210.136.177', 'Google Chrome', 'windows', 1664789863, NULL, 'agents', 5),
(386, '151.210.136.177', 'Google Chrome', 'windows', 1664790273, NULL, 'agents', 6),
(387, '151.210.136.177', 'Google Chrome', 'windows', 1664790349, NULL, 'landlord', 7),
(388, '151.210.136.177', 'Google Chrome', 'windows', 1664790658, NULL, 'agents', 8),
(389, '151.210.136.177', 'Google Chrome', 'windows', 1664790795, NULL, 'company', 5),
(390, '151.210.136.177', 'Google Chrome', 'windows', 1664790878, NULL, 'company', 4),
(391, '151.210.135.163', 'Apple Safari', 'mac', 1664956582, NULL, 'landlord', 7),
(392, '151.210.135.163', 'Apple Safari', 'mac', 1664956715, NULL, 'agents', 5),
(393, '151.210.135.163', 'Apple Safari', 'mac', 1664956795, NULL, 'company', 4),
(394, '151.210.137.255', 'Apple Safari', 'mac', 1665123803, NULL, 'agents', 5),
(395, '151.210.137.255', 'Google Chrome', 'windows', 1665125501, NULL, 'agents', 2),
(396, '151.210.137.255', 'Apple Safari', 'mac', 1665144852, NULL, 'agents', 2),
(397, '118.149.83.154', 'Apple Safari', 'mac', 1665185086, NULL, 'agents', 2),
(398, '151.210.139.199', 'Apple Safari', 'mac', 1665214427, NULL, 'agents', 2),
(399, '151.210.139.199', 'Google Chrome', 'windows', 1665231567, 1665231867, 'agents', 2),
(400, '151.210.139.199', 'Google Chrome', 'windows', 1665232419, NULL, 'agents', 2),
(401, '151.210.139.199', 'Google Chrome', 'windows', 1665233415, NULL, 'admin', 2),
(402, '152.57.147.118', 'Google Chrome', 'mac', 1665291187, NULL, 'user', 2),
(403, '152.57.147.118', 'Google Chrome', 'mac', 1665291200, NULL, 'agents', 2),
(404, '151.210.134.205', 'Apple Safari', 'mac', 1665481369, NULL, 'agents', 2),
(405, '151.210.138.127', 'Apple Safari', 'mac', 1665558733, NULL, 'user', 7),
(406, '151.210.138.127', 'Apple Safari', 'mac', 1665558927, NULL, 'agents', 5),
(407, '151.210.138.127', 'Apple Safari', 'mac', 1665559187, 1665559487, 'landlord', 7),
(408, '151.210.138.127', 'Apple Safari', 'mac', 1665561710, NULL, 'landlord', 7),
(409, '151.210.138.207', 'Apple Safari', 'mac', 1665654612, NULL, 'landlord', 7),
(410, '151.210.138.207', 'Apple Safari', 'mac', 1665654844, NULL, 'agents', 2),
(411, '151.210.138.207', 'Apple Safari', 'mac', 1665655049, NULL, 'admin', 2),
(412, '151.210.135.193', 'Google Chrome', 'windows', 1665894225, NULL, 'agents', 2),
(413, '151.210.135.193', 'Google Chrome', 'windows', 1665895820, NULL, 'company', 4),
(414, '151.210.135.193', 'Google Chrome', 'windows', 1665896698, NULL, 'admin', 2),
(415, '151.210.135.193', 'Google Chrome', 'windows', 1665896756, NULL, 'company', 3),
(416, '151.210.134.211', 'Google Chrome', 'windows', 1666262570, 1666262870, 'agents', 2),
(417, '122.173.195.49', 'Mozilla Firefox', 'windows', 1666634609, NULL, 'agents', 2),
(418, '151.210.137.253', 'Apple Safari', 'mac', 1666691741, NULL, 'agents', 2),
(419, '151.210.136.89', 'Google Chrome', 'windows', 1666727077, NULL, 'agents', 2),
(420, '106.213.115.110', 'Mozilla Firefox', 'windows', 1666774174, NULL, 'agents', 2),
(421, '151.210.139.63', 'Google Chrome', 'windows', 1666775452, 1666775752, 'agents', 2),
(422, '151.210.139.63', 'Google Chrome', 'windows', 1666778159, NULL, 'company', 2),
(423, '122.169.187.88', 'Mozilla Firefox', 'windows', 1666778162, NULL, 'company', 2),
(424, '151.210.139.63', 'Google Chrome', 'windows', 1666778437, NULL, 'company', 4),
(425, '122.169.187.88', 'Mozilla Firefox', 'windows', 1666778467, NULL, 'company', 4),
(426, '151.210.139.63', 'Google Chrome', 'windows', 1666780578, NULL, 'agents', 2),
(427, '122.169.187.88', 'Mozilla Firefox', 'windows', 1666780623, NULL, 'agents', 2),
(428, '122.164.124.238', 'Mozilla Firefox', 'windows', 1666792812, NULL, 'agents', 2),
(429, '106.203.207.107', 'Mozilla Firefox', 'windows', 1666873616, 1666873916, 'agents', 2),
(430, '103.161.31.20', 'Google Chrome', 'mac', 1666873633, 1666873933, 'agents', 2),
(431, '106.203.207.107', 'Mozilla Firefox', 'windows', 1666874695, NULL, 'agents', 2),
(432, '103.161.31.20', 'Google Chrome', 'mac', 1666874699, 1666874999, 'landlord', 2),
(433, '103.161.31.20', 'Google Chrome', 'mac', 1666874781, 1666875081, 'company', 2),
(434, '106.203.207.107', 'Mozilla Firefox', 'windows', 1666874786, 1666875086, 'company', 2),
(435, '106.203.207.107', 'Mozilla Firefox', 'windows', 1666875167, NULL, 'company', 2),
(436, '103.161.31.20', 'Google Chrome', 'mac', 1666942134, 1666942434, 'agents', 2),
(437, '103.161.31.20', 'Google Chrome', 'mac', 1666955945, 1666956245, 'agents', 2),
(438, '103.161.31.20', 'Google Chrome', 'mac', 1667022365, 1667022665, 'agents', 2),
(439, '106.212.49.159', 'Mozilla Firefox', 'windows', 1667024346, 1667024646, 'agents', 2),
(440, '103.161.31.20', 'Google Chrome', 'mac', 1667024728, 1667025028, 'agents', 2),
(441, '106.212.49.159', 'Mozilla Firefox', 'windows', 1667024995, NULL, 'landlord', 2),
(442, '106.212.49.159', 'Mozilla Firefox', 'windows', 1667025109, NULL, 'agents', 2),
(443, '106.212.49.159', 'Mozilla Firefox', 'windows', 1667025862, NULL, 'company', 2),
(444, '103.161.31.20', 'Google Chrome', 'mac', 1667026056, 1667026356, 'agents', 2),
(445, '103.161.31.20', 'Google Chrome', 'mac', 1667026060, 1667026360, 'agents', 2),
(446, '103.161.31.20', 'Google Chrome', 'mac', 1667027477, 1667027777, 'landlord', 2),
(447, '103.161.31.20', 'Google Chrome', 'mac', 1667028313, 1667028613, 'agents', 2),
(448, '151.210.136.156', 'Apple Safari', 'mac', 1667040947, 1667041247, 'agents', 2),
(449, '151.210.136.156', 'Google Chrome', 'windows', 1667045146, NULL, 'agents', 2),
(450, '151.210.136.156', 'Google Chrome', 'windows', 1667045899, NULL, 'company', 4),
(451, '151.210.136.156', 'Google Chrome', 'windows', 1667046002, NULL, 'landlord', 7),
(452, '151.210.136.156', 'Google Chrome', 'windows', 1667046172, NULL, 'agents', 5),
(453, '151.210.136.156', 'Google Chrome', 'windows', 1667046308, NULL, 'admin', 2),
(454, '151.210.136.156', 'Google Chrome', 'windows', 1667046412, NULL, 'agents', 6),
(455, '151.210.136.156', 'Google Chrome', 'windows', 1667046486, NULL, 'agents', 8),
(456, '151.210.136.156', 'Google Chrome', 'windows', 1667046644, NULL, 'agents', 10),
(457, '151.210.136.156', 'Google Chrome', 'windows', 1667046688, NULL, 'agents', 11),
(458, '151.210.136.156', 'Google Chrome', 'windows', 1667046706, NULL, 'agents', 12),
(459, '151.210.136.156', 'Google Chrome', 'windows', 1667046721, NULL, 'agents', 13),
(460, '151.210.136.156', 'Google Chrome', 'windows', 1667046844, NULL, 'agents', 14),
(461, '151.210.136.156', 'Apple Safari', 'mac', 1667125513, NULL, 'agents', 2),
(462, '151.210.139.190', 'Apple Safari', 'mac', 1667210619, 1667210919, 'agents', 2),
(463, '151.210.139.190', 'Apple Safari', 'mac', 1667245815, NULL, 'agents', 2),
(464, '223.178.19.17', 'Mozilla Firefox', 'windows', 1667271872, 1667272172, 'agents', 2),
(465, '103.161.31.20', 'Google Chrome', 'mac', 1667276160, 1667276460, 'agents', 2),
(466, '223.178.19.17', 'Mozilla Firefox', 'windows', 1667276792, 1667277092, 'agents', 2),
(467, '223.178.19.17', 'Mozilla Firefox', 'windows', 1667276950, NULL, 'landlord', 2),
(468, '223.178.19.17', 'Mozilla Firefox', 'windows', 1667278245, 1667278545, 'agents', 2),
(469, '223.178.19.17', 'Mozilla Firefox', 'windows', 1667299047, 1667299347, 'superadmin', 1),
(470, '223.178.19.17', 'Mozilla Firefox', 'windows', 1667299202, 1667299502, 'superadmin', 1),
(471, '223.178.19.17', 'Mozilla Firefox', 'windows', 1667299236, 1667299536, 'agents', 2),
(472, '151.210.136.9', 'Google Chrome', 'windows', 1667306819, NULL, 'agents', 2),
(473, '223.178.19.17', 'Mozilla Firefox', 'windows', 1667306856, 1667307156, 'agents', 2),
(474, '223.178.19.17', 'Mozilla Firefox', 'windows', 1667308579, NULL, 'agents', 2),
(475, '223.178.19.17', 'Mozilla Firefox', 'windows', 1667311898, NULL, 'superadmin', 1),
(476, '151.210.139.186', 'Apple Safari', 'mac', 1667378328, NULL, 'agents', 2),
(477, '151.210.139.186', 'Apple Safari', 'mac', 1667378759, NULL, 'company', 4),
(478, '151.210.139.186', 'Apple Safari', 'mac', 1667378849, NULL, 'landlord', 7),
(479, '151.210.138.115', 'Apple Safari', 'mac', 1667468020, NULL, 'company', 4),
(480, '151.210.138.115', 'Apple Safari', 'mac', 1667468074, NULL, 'agents', 2),
(481, '151.210.136.144', 'Google Chrome', 'windows', 1667559825, NULL, 'agents', 2),
(482, '151.210.136.144', 'Apple Safari', 'mac', 1667731177, NULL, 'agents', 2),
(483, '122.173.201.130', 'Mozilla Firefox', 'windows', 1667807501, NULL, 'superadmin', 1),
(484, '122.173.201.130', 'Mozilla Firefox', 'windows', 1667808750, NULL, 'agents', 2),
(485, '151.210.135.48', 'Apple Safari', 'mac', 1667901607, NULL, 'agents', 2),
(486, '151.210.135.48', 'Apple Safari', 'mac', 1667901764, 1667902064, 'company', 4),
(487, '151.210.135.48', 'Apple Safari', 'mac', 1667901862, NULL, 'company', 4),
(488, '136.185.58.161', 'Mozilla Firefox', 'windows', 1667918288, NULL, 'superadmin', 1),
(489, '136.185.58.161', 'Mozilla Firefox', 'windows', 1667918719, 1667919019, 'company', 2),
(490, '136.185.58.161', 'Mozilla Firefox', 'windows', 1667918778, 1667919078, 'agents', 2),
(491, '136.185.58.161', 'Mozilla Firefox', 'windows', 1667918830, 1667919130, 'company', 2),
(492, '136.185.58.161', 'Mozilla Firefox', 'windows', 1667936407, 1667936707, 'agents', 2),
(493, '136.185.58.161', 'Mozilla Firefox', 'windows', 1667938424, NULL, 'admin', 2),
(494, '136.185.58.161', 'Mozilla Firefox', 'windows', 1667938976, NULL, 'company', 2),
(495, '136.185.58.161', 'Mozilla Firefox', 'windows', 1667939244, NULL, 'agents', 2),
(496, '151.210.134.64', 'Google Chrome', 'windows', 1668313830, NULL, 'landlord', 7),
(497, '151.210.134.64', 'Google Chrome', 'windows', 1668314340, NULL, 'agents', 5),
(498, '151.210.134.64', 'Google Chrome', 'windows', 1668314659, NULL, 'agents', 15),
(499, '151.210.134.64', 'Google Chrome', 'windows', 1668314785, NULL, 'admin', 2),
(500, '151.210.134.64', 'Google Chrome', 'windows', 1668315899, NULL, 'agents', 2),
(501, '103.161.31.20', 'Google Chrome', 'mac', 1668317369, 1668317669, 'agents', 2),
(502, '103.161.31.20', 'Google Chrome', 'mac', 1668325859, 1668326159, 'agents', 2),
(503, '103.161.31.20', 'Google Chrome', 'mac', 1668423338, 1668423638, 'agents', 2),
(504, '103.161.31.20', 'Google Chrome', 'mac', 1668424349, 1668424649, 'landlord', 2),
(505, '103.161.31.20', 'Google Chrome', 'mac', 1668668880, 1668669180, 'agents', 2),
(506, '103.161.31.20', 'Google Chrome', 'mac', 1668668916, 1668669216, 'user', 2),
(507, '151.210.136.6', 'Google Chrome', 'windows', 1668855640, NULL, 'agents', 2),
(508, '151.210.136.164', 'Apple Safari', 'mac', 1669101935, NULL, 'agents', 2),
(509, '151.210.136.164', 'Apple Safari', 'mac', 1669102096, NULL, 'company', 4),
(510, '151.210.136.164', 'Google Chrome', 'windows', 1669111352, NULL, 'company', 4),
(511, '151.210.136.164', 'Google Chrome', 'windows', 1669111805, NULL, 'admin', 2),
(512, '151.210.136.164', 'Google Chrome', 'windows', 1669113575, NULL, 'user', 7),
(513, '151.210.134.208', 'Google Chrome', 'windows', 1669163792, 1669164092, 'company', 2),
(514, '151.210.134.208', 'Google Chrome', 'windows', 1669166949, NULL, 'agents', 5),
(515, '151.210.134.208', 'Google Chrome', 'windows', 1669167430, NULL, 'company', 2),
(516, '151.210.134.208', 'Google Chrome', 'windows', 1669167481, 1669167781, 'agents', 2),
(517, '151.210.134.208', 'Google Chrome', 'windows', 1669174109, NULL, 'agents', 2),
(518, '151.210.134.208', 'Google Chrome', 'windows', 1669175513, NULL, 'landlord', 7),
(519, '122.162.56.57', 'Mozilla Firefox', 'windows', 1669178585, NULL, 'superadmin', 1),
(520, '122.162.56.57', 'Mozilla Firefox', 'windows', 1669188274, 1669188574, 'agents', 2),
(521, '103.161.31.20', 'Google Chrome', 'mac', 1669202489, 1669202789, 'agents', 2),
(522, '103.161.31.20', 'Google Chrome', 'mac', 1669264724, 1669265024, 'agents', 2),
(523, '151.210.134.242', 'Apple Safari', 'mac', 1669285736, NULL, 'company', 4),
(524, '122.162.56.57', 'Mozilla Firefox', 'windows', 1669355795, NULL, 'agents', 2),
(525, '151.210.134.6', 'Google Chrome', 'windows', 1669465996, NULL, 'agents', 2),
(526, '151.210.134.6', 'Google Chrome', 'windows', 1669466371, NULL, 'admin', 2),
(527, '151.210.137.19', 'Apple Safari', 'mac', 1669615268, NULL, 'company', 4),
(528, '151.210.134.84', 'Google Chrome', 'windows', 1669720044, NULL, 'company', 6),
(529, '151.210.134.84', 'Google Chrome', 'windows', 1669720115, NULL, 'admin', 2),
(530, '151.210.138.187', 'Apple Safari', 'mac', 1669801024, NULL, 'agents', 2),
(531, '122.177.114.214', 'Mozilla Firefox', 'windows', 1669881207, 1669881507, 'agents', 2),
(532, '151.210.137.131', 'Google Chrome', 'windows', 1669885528, NULL, 'agents', 2),
(533, '122.177.114.214', 'Mozilla Firefox', 'windows', 1669887557, NULL, 'user', 2),
(534, '151.210.137.131', 'Google Chrome', 'windows', 1669887574, NULL, 'user', 7),
(535, '122.177.114.214', 'Mozilla Firefox', 'windows', 1669891720, 1669892020, 'agents', 2),
(536, '122.177.114.214', 'Mozilla Firefox', 'windows', 1669896043, 1669896343, 'agents', 2),
(537, '122.177.114.214', 'Mozilla Firefox', 'windows', 1669897879, NULL, 'company', 2),
(538, '151.210.137.131', 'Google Chrome', 'windows', 1669900291, NULL, 'company', 4),
(539, '122.177.114.214', 'Mozilla Firefox', 'windows', 1670050926, NULL, 'agents', 2),
(540, '151.210.138.46', 'Apple Safari', 'mac', 1670147578, NULL, 'company', 4),
(541, '151.210.138.46', 'Apple Safari', 'mac', 1670147886, NULL, 'agents', 2),
(542, '103.161.31.20', 'Google Chrome', 'mac', 1670216617, 1670216917, 'agents', 2),
(543, '103.161.31.20', 'Google Chrome', 'mac', 1670221815, 1670222115, 'user', 2),
(544, '103.161.31.20', 'Google Chrome', 'mac', 1670221842, 1670222142, 'agents', 2),
(545, '223.178.21.125', 'Mozilla Firefox', 'windows', 1670237141, NULL, 'user', 2),
(546, '223.178.21.125', 'Mozilla Firefox', 'windows', 1670237491, 1670237791, 'agents', 2),
(547, '151.210.135.212', 'Apple Safari', 'mac', 1670237628, NULL, 'agents', 2),
(548, '223.178.21.125', 'Mozilla Firefox', 'windows', 1670238875, NULL, 'company', 2),
(549, '223.178.21.125', 'Mozilla Firefox', 'windows', 1670239051, 1670239351, 'agents', 2),
(550, '223.178.21.125', 'Mozilla Firefox', 'windows', 1670239863, NULL, 'agents', 2),
(551, '103.161.31.20', 'Google Chrome', 'mac', 1670241790, 1670242090, 'agents', 2),
(552, '103.161.31.20', 'Google Chrome', 'mac', 1670301509, 1670301809, 'agents', 2),
(553, '103.161.31.20', 'Google Chrome', 'mac', 1670306983, 1670307283, 'agents', 2),
(554, '103.161.31.20', 'Google Chrome', 'mac', 1670307828, 1670308128, 'agents', 2),
(555, '103.161.31.20', 'Google Chrome', 'mac', 1670311665, 1670311965, 'user', 2),
(556, '103.161.31.20', 'Google Chrome', 'mac', 1670312230, 1670312530, 'user', 2),
(557, '103.161.31.20', 'Google Chrome', 'mac', 1670312419, 1670312719, 'agents', 2),
(558, '151.210.134.22', 'Apple Safari', 'mac', 1670316079, NULL, 'agents', 2),
(559, '223.178.33.4', 'Mozilla Firefox', 'windows', 1670390717, NULL, 'superadmin', 1),
(560, '151.210.133.95', 'Google Chrome', 'windows', 1670411452, 1670411752, 'user', 7),
(561, '151.210.133.95', 'Google Chrome', 'windows', 1670411528, NULL, 'admin', 2),
(562, '151.210.133.95', 'Google Chrome', 'windows', 1670411580, NULL, 'user', 7),
(563, '151.210.133.95', 'Google Chrome', 'windows', 1670411778, NULL, 'agents', 2),
(564, '151.210.133.95', 'Google Chrome', 'windows', 1670412202, NULL, 'company', 4),
(565, '222.154.233.83', 'Google Chrome', 'windows', 1670458909, NULL, 'agents', 2),
(566, '151.210.130.71', 'Apple Safari', 'mac', 1670666549, NULL, 'company', 4),
(567, '151.210.130.71', 'Apple Safari', 'mac', 1670666691, 1670666991, 'admin', 2),
(568, '151.210.130.71', 'Google Chrome', 'windows', 1670672348, 1670672648, 'agents', 2),
(569, '151.210.130.71', 'Google Chrome', 'windows', 1670672732, NULL, 'company', 4),
(570, '151.210.130.71', 'Google Chrome', 'windows', 1670673100, NULL, 'user', 7),
(571, '151.210.130.71', 'Google Chrome', 'windows', 1670673182, NULL, 'agents', 2),
(572, '151.210.130.71', 'Apple Safari', 'mac', 1670675540, NULL, 'admin', 2),
(573, '151.210.131.192', 'Google Chrome', 'windows', 1670841610, NULL, 'user', 7),
(574, '151.210.131.96', 'Google Chrome', 'windows', 1670928328, NULL, 'agents', 2),
(575, '151.210.129.61', 'Google Chrome', 'windows', 1671277860, NULL, 'user', 7),
(576, '151.210.129.61', 'Google Chrome', 'windows', 1671282196, NULL, 'company', 4),
(577, '151.210.129.61', 'Google Chrome', 'windows', 1671282225, NULL, 'admin', 2),
(578, '151.210.131.174', 'Google Chrome', 'windows', 1671617001, NULL, 'user', 7),
(579, '151.210.131.174', 'Google Chrome', 'windows', 1671617718, NULL, 'agents', 2),
(580, '136.185.44.81', 'Mozilla Firefox', 'windows', 1671699404, NULL, 'company', 2),
(581, '136.185.44.81', 'Mozilla Firefox', 'windows', 1671706402, NULL, 'agents', 2),
(582, '151.210.132.104', 'Google Chrome', 'windows', 1671706466, NULL, 'agents', 2),
(583, '136.185.44.81', 'Mozilla Firefox', 'windows', 1671712156, NULL, 'user', 2),
(584, '136.185.44.81', 'Mozilla Firefox', 'windows', 1671712884, NULL, 'superadmin', 1),
(585, '151.210.129.137', 'Apple Safari', 'mac', 1672052564, NULL, 'agents', 2),
(586, '103.161.31.20', 'Google Chrome', 'mac', 1672064825, 1672065125, 'user', 2),
(587, '103.161.31.20', 'Google Chrome', 'mac', 1672064850, 1672065150, 'agents', 2),
(588, '151.210.129.137', 'Google Chrome', 'windows', 1672126636, NULL, 'agents', 2),
(589, '122.182.237.68', 'Mozilla Firefox', 'windows', 1672165577, NULL, 'company', 2),
(590, '103.161.31.20', 'Google Chrome', 'mac', 1672385871, 1672386171, 'agents', 2),
(591, '151.210.133.68', 'Apple Safari', 'mac', 1672398134, NULL, 'agents', 2),
(592, '103.161.31.20', 'Google Chrome', 'mac', 1672406767, 1672407067, 'agents', 2),
(593, '103.161.31.20', 'Google Chrome', 'mac', 1672411282, 1672411582, 'agents', 2),
(594, '122.175.74.252', 'Mozilla Firefox', 'windows', 1672411298, 1672411598, 'agents', 2),
(595, '103.161.31.20', 'Google Chrome', 'mac', 1672558695, 1672558995, 'agents', 2),
(596, '122.175.74.252', 'Mozilla Firefox', 'windows', 1672559026, 1672559326, 'agents', 2),
(597, '122.175.74.252', 'Mozilla Firefox', 'windows', 1672559356, 1672559656, 'agents', 2),
(598, '151.210.133.68', 'Google Chrome', 'windows', 1672569533, NULL, 'user', 7);
INSERT INTO `loginlog` (`sno`, `ip`, `browser`, `operatingsystem`, `login`, `logout`, `role`, `user`) VALUES
(599, '151.210.133.68', 'Google Chrome', 'windows', 1672569705, NULL, 'agents', 2),
(600, '103.161.31.20', 'Google Chrome', 'mac', 1672634040, 1672634340, 'agents', 2),
(601, '122.175.74.252', 'Mozilla Firefox', 'windows', 1672644508, 1672644808, 'agents', 2),
(602, '122.175.74.252', 'Mozilla Firefox', 'windows', 1672645815, 1672646115, 'agents', 2),
(603, '151.210.133.116', 'Google Chrome', 'windows', 1672660758, NULL, 'landlord', 7),
(604, '151.210.133.116', 'Google Chrome', 'windows', 1672661170, NULL, 'agents', 5),
(605, '151.210.133.116', 'Google Chrome', 'windows', 1672661282, 1672661582, 'company', 4),
(606, '103.161.31.20', 'Google Chrome', 'mac', 1672661409, 1672661709, 'agents', 2),
(607, '122.175.74.252', 'Mozilla Firefox', 'windows', 1672675759, NULL, 'agents', 2),
(608, '122.175.74.252', 'Mozilla Firefox', 'windows', 1672679648, NULL, 'company', 2),
(609, '122.175.74.252', 'Google Chrome', 'windows', 1672688274, 1672688574, 'user', 2),
(610, '122.175.74.252', 'Google Chrome', 'windows', 1672688274, NULL, 'user', 2),
(611, '171.61.142.86', 'Mozilla Firefox', 'windows', 1672899422, 1672899722, 'agents', 2),
(612, '171.61.142.86', 'Mozilla Firefox', 'windows', 1672900484, NULL, 'user', 2),
(613, '171.61.142.86', 'Mozilla Firefox', 'windows', 1672900618, 1672900918, 'agents', 2),
(614, '171.61.142.86', 'Mozilla Firefox', 'windows', 1672900912, 1672901212, 'agents', 2),
(615, '171.61.142.86', 'Mozilla Firefox', 'windows', 1672901832, 1672902132, 'company', 7),
(616, '171.61.142.86', 'Mozilla Firefox', 'windows', 1672901960, NULL, 'company', 7),
(617, '171.61.142.86', 'Mozilla Firefox', 'windows', 1672913053, 1672913353, 'agents', 2),
(618, '171.61.142.86', 'Mozilla Firefox', 'windows', 1672915298, 1672915598, 'agents', 2),
(619, '171.61.142.86', 'Mozilla Firefox', 'windows', 1672917026, 1672917326, 'agents', 2),
(620, '171.61.142.86', 'Mozilla Firefox', 'windows', 1672918715, NULL, 'company', 2),
(621, '171.61.142.86', 'Mozilla Firefox', 'windows', 1672918742, NULL, 'company', 3),
(622, '171.61.142.86', 'Mozilla Firefox', 'windows', 1672918932, 1672919232, 'agents', 2),
(623, '171.61.142.86', 'Mozilla Firefox', 'windows', 1672925313, NULL, 'agents', 2),
(624, '103.161.31.20', 'Google Chrome', 'mac', 1672935164, 1672935464, 'company', 8),
(625, '103.161.31.20', 'Google Chrome', 'mac', 1672935310, NULL, 'agents', 16),
(626, '103.161.31.20', 'Google Chrome', 'mac', 1672935492, NULL, 'agents', 17),
(627, '103.161.31.20', 'Google Chrome', 'mac', 1672935572, NULL, 'agents', 18),
(628, '103.161.31.20', 'Google Chrome', 'mac', 1672935605, NULL, 'company', 8),
(629, '103.161.31.20', 'Google Chrome', 'mac', 1672935847, NULL, 'company', 9),
(630, '103.161.31.20', 'Google Chrome', 'mac', 1672935891, NULL, 'company', 10),
(631, '103.161.31.20', 'Google Chrome', 'mac', 1672936105, NULL, 'company', 11),
(632, '103.161.31.20', 'Google Chrome', 'mac', 1672936157, NULL, 'user', 9),
(633, '103.161.31.20', 'Google Chrome', 'mac', 1672936338, 1672936638, 'agents', 2),
(634, '171.61.88.123', 'Mozilla Firefox', 'windows', 1673001423, 1673001723, 'company', 2),
(635, '171.61.88.123', 'Mozilla Firefox', 'windows', 1673001456, NULL, 'company', 3),
(636, '103.161.31.20', 'Google Chrome', 'mac', 1673002533, 1673002833, 'company', 2),
(637, '171.61.88.123', 'Mozilla Firefox', 'windows', 1673004464, NULL, 'company', 2),
(638, '103.161.31.20', 'Google Chrome', 'mac', 1673006491, 1673006791, 'agents', 2),
(639, '103.161.31.20', 'Google Chrome', 'mac', 1673006555, 1673006855, 'company', 2),
(640, '103.161.31.20', 'Google Chrome', 'mac', 1673019855, 1673020155, 'agents', 2),
(641, '151.210.133.116', 'Google Chrome', 'windows', 1673065085, NULL, 'company', 4),
(642, '151.210.133.116', 'Google Chrome', 'windows', 1673065939, NULL, 'agents', 6),
(643, '151.210.133.116', 'Google Chrome', 'windows', 1673066724, NULL, 'admin', 2),
(644, '122.175.73.75', 'Mozilla Firefox', 'windows', 1673244129, NULL, 'agents', 2),
(645, '106.203.201.63', 'Mozilla Firefox', 'windows', 1673367421, 1673367721, 'agents', 2),
(646, '106.203.201.63', 'Mozilla Firefox', 'windows', 1673367669, 1673367969, 'user', 2),
(647, '106.203.201.63', 'Mozilla Firefox', 'windows', 1673369203, 1673369503, 'user', 2),
(648, '106.203.201.63', 'Mozilla Firefox', 'windows', 1673369583, 1673369883, 'user', 2),
(649, '103.161.31.20', 'Google Chrome', 'mac', 1673369878, 1673370178, 'agents', 2),
(650, '106.203.201.63', 'Mozilla Firefox', 'windows', 1673369928, 1673370228, 'user', 2),
(651, '106.203.201.63', 'Mozilla Firefox', 'windows', 1673370586, 1673370886, 'user', 2),
(652, '106.203.201.63', 'Mozilla Firefox', 'windows', 1673371018, 1673371318, 'company', 2),
(653, '106.203.201.63', 'Google Chrome', 'windows', 1673371957, NULL, 'superadmin', 1),
(654, '106.203.201.63', 'Mozilla Firefox', 'windows', 1673374255, 1673374555, 'company', 2),
(655, '106.203.201.63', 'Mozilla Firefox', 'windows', 1673374655, 1673374955, 'agents', 2),
(656, '106.203.201.63', 'Mozilla Firefox', 'windows', 1673375560, NULL, 'company', 2),
(657, '103.161.31.20', 'Google Chrome', 'mac', 1673413053, 1673413353, 'agents', 2),
(658, '103.161.31.20', 'Google Chrome', 'mac', 1673417626, 1673417926, 'agents', 2),
(659, '106.203.201.63', 'Mozilla Firefox', 'windows', 1673429666, NULL, 'user', 2),
(660, '106.203.201.63', 'Mozilla Firefox', 'windows', 1673432829, NULL, 'agents', 2),
(661, '103.161.31.20', 'Google Chrome', 'mac', 1673593542, 1673593842, 'user', 2),
(662, '103.161.31.20', 'Google Chrome', 'mac', 1673609573, 1673609873, 'user', 2),
(663, '151.210.132.255', 'Apple Safari', 'mac', 1673614450, NULL, 'company', 12),
(664, '151.210.131.236', 'Google Chrome', 'windows', 1673759565, NULL, 'company', 4),
(665, '151.210.131.236', 'Google Chrome', 'windows', 1673759692, NULL, 'agents', 2),
(666, '151.210.128.90', 'Google Chrome', 'windows', 1673814211, NULL, 'company', 13),
(667, '151.210.128.90', 'Google Chrome', 'windows', 1673814302, NULL, 'admin', 2),
(668, '103.161.31.20', 'Google Chrome', 'mac', 1673844630, 1673844930, 'user', 2),
(669, '103.161.31.20', 'Google Chrome', 'mac', 1673846009, 1673846309, 'user', 2),
(670, '103.161.31.20', 'Google Chrome', 'mac', 1673846196, 1673846496, 'agents', 2),
(671, '103.161.31.20', 'Google Chrome', 'mac', 1673847661, 1673847961, 'user', 2),
(672, '103.161.31.20', 'Google Chrome', 'mac', 1673847747, 1673848047, 'agents', 2),
(673, '103.161.31.20', 'Google Chrome', 'mac', 1673848198, 1673848498, 'user', 2),
(674, '103.161.31.20', 'Google Chrome', 'mac', 1673849851, NULL, 'user', 4),
(675, '151.210.128.15', 'Google Chrome', 'windows', 1673924800, NULL, 'company', 4),
(676, '223.178.43.228', 'Mozilla Firefox', 'windows', 1673941612, NULL, 'company', 2),
(677, '223.178.43.228', 'Mozilla Firefox', 'windows', 1673941660, 1673941960, 'agents', 2),
(678, '223.178.43.228', 'Mozilla Firefox', 'windows', 1673944558, NULL, 'user', 2),
(679, '223.178.43.228', 'Mozilla Firefox', 'windows', 1673944881, 1673945181, 'agents', 2),
(680, '223.178.43.228', 'Mozilla Firefox', 'windows', 1673951454, NULL, 'agents', 2),
(681, '122.183.154.10', 'Mozilla Firefox', 'windows', 1674033519, NULL, 'user', 2),
(682, '122.183.154.10', 'Mozilla Firefox', 'windows', 1674033754, NULL, 'company', 2),
(683, '122.183.154.10', 'Mozilla Firefox', 'windows', 1674034748, 1674035048, 'company', 3),
(684, '122.183.154.10', 'Mozilla Firefox', 'windows', 1674038431, 1674038731, 'agents', 2),
(685, '122.183.154.10', 'Mozilla Firefox', 'windows', 1674040254, 1674040554, 'agents', 2),
(686, '122.183.154.10', 'Mozilla Firefox', 'windows', 1674043223, 1674043523, 'company', 3),
(687, '122.183.154.10', 'Mozilla Firefox', 'windows', 1674064816, 1674065116, 'company', 3),
(688, '122.183.154.10', 'Mozilla Firefox', 'windows', 1674102013, 1674102313, 'company', 3),
(689, '122.183.154.10', 'Mozilla Firefox', 'windows', 1674102124, 1674102424, 'agents', 2),
(690, '122.183.154.10', 'Mozilla Firefox', 'windows', 1674107619, 1674107919, 'company', 3),
(691, '122.183.154.10', 'Mozilla Firefox', 'windows', 1674109489, 1674109789, 'agents', 2),
(692, '122.183.154.10', 'Mozilla Firefox', 'windows', 1674110538, 1674110838, 'company', 3),
(693, '122.183.154.10', 'Mozilla Firefox', 'windows', 1674110544, 1674110844, 'agents', 2),
(694, '122.183.154.10', 'Mozilla Firefox', 'windows', 1674113029, 1674113329, 'agents', 2),
(695, '122.183.154.10', 'Mozilla Firefox', 'windows', 1674136736, NULL, 'company', 3),
(696, '122.183.154.10', 'Mozilla Firefox', 'windows', 1674137595, NULL, 'agents', 2),
(697, '103.161.31.20', 'Google Chrome', 'mac', 1674138017, 1674138317, 'agents', 2),
(698, '103.161.31.20', 'Google Chrome', 'mac', 1674191769, 1674192069, 'agents', 2),
(699, '103.161.31.20', 'Google Chrome', 'mac', 1674195546, 1674195846, 'landlord', 2),
(700, '103.161.31.20', 'Google Chrome', 'mac', 1674195585, 1674195885, 'company', 2),
(701, '103.161.31.20', 'Google Chrome', 'mac', 1674195831, 1674196131, 'company', 3),
(702, '103.161.31.20', 'Google Chrome', 'mac', 1674196229, 1674196529, 'company', 2),
(703, '103.161.31.20', 'Google Chrome', 'mac', 1674196747, 1674197047, 'user', 2),
(704, '103.161.31.20', 'Google Chrome', 'mac', 1674197095, 1674197395, 'company', 3),
(705, '103.161.31.20', 'Google Chrome', 'mac', 1674211803, 1674212103, 'company', 3),
(706, '118.149.95.129', 'Apple Safari', 'mac', 1674302163, NULL, 'company', 4),
(707, '118.149.95.129', 'Apple Safari', 'mac', 1674302347, NULL, 'agents', 2),
(708, '103.161.31.20', 'Google Chrome', 'mac', 1674458328, 1674458628, 'agents', 2),
(709, '118.149.93.126', 'Apple Safari', 'mac', 1674465162, NULL, 'agents', 2),
(710, '110.225.198.177', 'Mozilla Firefox', 'windows', 1674548544, NULL, 'agents', 2),
(711, '110.225.198.177', 'Mozilla Firefox', 'windows', 1674555193, NULL, 'user', 2),
(712, '110.225.198.177', 'Mozilla Firefox', 'windows', 1674556364, NULL, 'superadmin', 1),
(713, '122.181.207.160', 'Mozilla Firefox', 'windows', 1674620361, 1674620661, 'company', 3),
(714, '122.181.207.160', 'Mozilla Firefox', 'windows', 1674631683, 1674631983, 'company', 3),
(715, '122.181.207.160', 'Mozilla Firefox', 'windows', 1674631733, NULL, 'superadmin', 1),
(716, '122.181.207.160', 'Mozilla Firefox', 'windows', 1674631843, NULL, 'company', 3),
(717, '223.178.11.154', 'Mozilla Firefox', 'windows', 1675067063, NULL, 'company', 3),
(718, '223.178.11.154', 'Mozilla Firefox', 'windows', 1675067445, NULL, 'agents', 2),
(719, '223.178.11.154', 'Mozilla Firefox', 'windows', 1675067522, NULL, 'superadmin', 1),
(720, '223.178.11.154', 'Mozilla Firefox', 'windows', 1675067854, NULL, 'user', 2),
(721, '151.210.128.216', 'Apple Safari', 'mac', 1675102769, 1675103069, 'company', 4),
(722, '151.210.128.216', 'Apple Safari', 'mac', 1675102770, NULL, 'company', 4),
(723, '106.212.63.128', 'Mozilla Firefox', 'windows', 1675158925, 1675159225, 'company', 3),
(724, '106.212.63.128', 'Mozilla Firefox', 'windows', 1675159597, NULL, 'agents', 2),
(725, '106.212.63.128', 'Mozilla Firefox', 'windows', 1675160546, 1675160846, 'company', 3),
(726, '106.212.63.128', 'Mozilla Firefox', 'windows', 1675161930, NULL, 'superadmin', 1),
(727, '106.212.63.128', 'Mozilla Firefox', 'windows', 1675163908, NULL, 'landlord', 2),
(728, '106.212.63.128', 'Mozilla Firefox', 'windows', 1675165293, NULL, 'company', 3),
(729, '151.210.132.197', 'Google Chrome', 'windows', 1675245627, NULL, 'admin', 2),
(730, '151.210.132.197', 'Google Chrome', 'windows', 1675245680, NULL, 'superadmin', 1),
(731, '151.210.132.197', 'Google Chrome', 'windows', 1675247281, NULL, 'agents', 2),
(732, '151.210.132.197', 'Google Chrome', 'windows', 1675247898, NULL, 'company', 2),
(733, '103.161.31.20', 'Google Chrome', 'mac', 1675323424, 1675323724, 'agents', 2),
(734, '151.210.130.216', 'Google Chrome', 'windows', 1675329782, NULL, 'user', 2),
(735, '151.210.130.216', 'Google Chrome', 'windows', 1675329929, NULL, 'company', 2),
(736, '151.210.130.216', 'Google Chrome', 'windows', 1675330081, NULL, 'agents', 2),
(737, '151.210.129.178', 'Google Chrome', 'windows', 1675368092, NULL, 'landlord', 2),
(738, '151.210.129.178', 'Google Chrome', 'windows', 1675369156, NULL, 'company', 2),
(739, '103.161.31.20', 'Google Chrome', 'mac', 1675396334, 1675396634, 'agents', 2),
(740, '103.161.31.20', 'Google Chrome', 'mac', 1675411751, 1675412051, 'user', 2),
(741, '103.161.31.20', 'Google Chrome', 'mac', 1675411798, 1675412098, 'company', 2),
(742, '151.210.128.103', 'Apple Safari', 'mac', 1675418462, 1675418762, 'agents', 5),
(743, '103.161.31.20', 'Google Chrome', 'mac', 1675419357, 1675419657, 'agents', 2),
(744, '103.161.31.20', 'Google Chrome', 'mac', 1675426185, 1675426485, 'company', 2),
(745, '103.161.31.20', 'Google Chrome', 'mac', 1675426411, 1675426711, 'landlord', 2),
(746, '103.161.31.20', 'Google Chrome', 'mac', 1675426454, 1675426754, 'agents', 2),
(747, '103.161.31.20', 'Google Chrome', 'mac', 1675427332, 1675427632, 'landlord', 2),
(748, '103.161.31.20', 'Google Chrome', 'mac', 1675427349, 1675427649, 'company', 2),
(749, '103.161.31.20', 'Google Chrome', 'mac', 1675427501, 1675427801, 'agents', 2),
(750, '103.161.31.20', 'Google Chrome', 'mac', 1675428069, 1675428369, 'company', 2),
(751, '151.210.128.103', 'Apple Safari', 'mac', 1675507966, NULL, 'agents', 5),
(752, '151.210.128.103', 'Apple Safari', 'mac', 1675508146, NULL, 'company', 4),
(753, '103.161.31.20', 'Google Chrome', 'mac', 1675666496, 1675666796, 'company', 2),
(754, '103.161.31.20', 'Google Chrome', 'mac', 1675666863, 1675667163, 'agents', 2),
(755, '103.161.31.20', 'Google Chrome', 'mac', 1675667070, 1675667370, 'landlord', 2),
(756, '103.161.31.20', 'Google Chrome', 'mac', 1675686021, 1675686321, 'agents', 2),
(757, '222.154.233.83', 'Google Chrome', 'windows', 1675741528, NULL, 'agents', 5),
(758, '103.161.31.20', 'Google Chrome', 'mac', 1675748718, 1675749018, 'agents', 2),
(759, '136.185.121.181', 'Mozilla Firefox', 'windows', 1675762328, 1675762628, 'agents', 2),
(760, '136.185.121.181', 'Mozilla Firefox', 'windows', 1675762525, NULL, 'agents', 5),
(761, '136.185.121.181', 'Mozilla Firefox', 'windows', 1675762954, 1675763254, 'agents', 2),
(762, '136.185.121.181', 'Mozilla Firefox', 'windows', 1675767323, NULL, 'agents', 2),
(763, '151.210.128.250', 'Google Chrome', 'windows', 1676120036, NULL, 'agents', 2),
(764, '122.169.188.172', 'Mozilla Firefox', 'windows', 1676217670, NULL, 'superadmin', 1),
(765, '151.210.139.120', 'Google Chrome', 'windows', 1676282168, NULL, 'agents', 2),
(766, '151.210.139.120', 'Google Chrome', 'windows', 1676283868, NULL, 'company', 2),
(767, '122.169.188.172', 'Mozilla Firefox', 'windows', 1676294328, NULL, 'agents', 2),
(768, '122.173.200.222', 'Mozilla Firefox', 'windows', 1676358307, 1676358607, 'agents', 2),
(769, '151.210.132.72', 'Google Chrome', 'windows', 1676366273, NULL, 'agents', 2),
(770, '151.210.132.72', 'Google Chrome', 'windows', 1676366473, NULL, 'user', 2),
(771, '122.173.200.222', 'Mozilla Firefox', 'windows', 1676371494, NULL, 'agents', 2),
(772, '151.210.128.224', 'Google Chrome', 'windows', 1676454746, NULL, 'agents', 2),
(773, '103.161.31.20', 'Google Chrome', 'mac', 1677569516, 1677569816, 'agents', 2),
(774, '151.210.135.178', 'Apple Safari', 'mac', 1677653808, NULL, 'agents', 2),
(775, '151.210.137.124', 'Google Chrome', 'windows', 1677933992, NULL, 'agents', 2),
(776, '49.43.202.37', 'Mozilla Firefox', 'windows', 1678112933, NULL, 'superadmin', 1),
(777, '106.201.79.34', 'Mozilla Firefox', 'windows', 1678180595, 1678180895, 'superadmin', 1),
(778, '106.201.79.34', 'Mozilla Firefox', 'windows', 1678267948, 1678268248, 'superadmin', 1),
(779, '103.161.31.20', 'Google Chrome', 'mac', 1678354502, 1678354802, 'company', 2),
(780, '106.201.79.34', 'Mozilla Firefox', 'windows', 1678354705, NULL, 'superadmin', 1),
(781, '106.201.79.34', 'Mozilla Firefox', 'windows', 1678354737, 1678355037, 'company', 2),
(782, '106.201.79.34', 'Mozilla Firefox', 'windows', 1678354986, NULL, 'agents', 2),
(783, '103.161.31.20', 'Google Chrome', 'mac', 1678355713, 1678356013, 'company', 3),
(784, '106.201.79.34', 'Mozilla Firefox', 'windows', 1678422240, NULL, 'company', 2),
(785, '103.161.31.20', 'Google Chrome', 'mac', 1678426305, 1678426605, 'company', 2),
(786, '103.161.31.20', 'Google Chrome', 'mac', 1678431532, 1678431832, 'company', 3),
(787, '103.161.31.20', 'Google Chrome', 'mac', 1678441406, 1678441706, 'company', 3),
(788, '103.161.31.20', 'Google Chrome', 'mac', 1678441515, 1678441815, 'agents', 2),
(789, '103.161.31.20', 'Google Chrome', 'mac', 1678441676, 1678441976, 'landlord', 2),
(790, '103.161.31.20', 'Google Chrome', 'mac', 1678451024, 1678451324, 'agents', 2),
(791, '103.161.31.20', 'Google Chrome', 'mac', 1678459509, 1678459809, 'company', 2),
(792, '103.161.31.20', 'Google Chrome', 'mac', 1678459543, 1678459843, 'landlord', 2),
(793, '151.210.136.28', 'Google Chrome', 'windows', 1678506764, NULL, 'agents', 2),
(794, '103.161.31.20', 'Google Chrome', 'mac', 1678520588, 1678520888, 'landlord', 2),
(795, '103.161.31.20', 'Google Chrome', 'mac', 1678523085, 1678523385, 'agents', 2),
(796, '103.161.31.20', 'Google Chrome', 'mac', 1678523954, 1678524254, 'landlord', 2),
(797, '122.171.52.241', 'Mozilla Firefox', 'windows', 1678532662, 1678532962, 'company', 2),
(798, '122.171.52.241', 'Mozilla Firefox', 'windows', 1678532698, 1678532998, 'agents', 2),
(799, '122.171.52.241', 'Mozilla Firefox', 'windows', 1678532791, NULL, 'landlord', 2),
(800, '103.161.31.20', 'Google Chrome', 'mac', 1678681213, 1678681513, 'agents', 2),
(801, '122.171.52.241', 'Mozilla Firefox', 'windows', 1678696471, NULL, 'company', 2),
(802, '151.210.137.15', 'Google Chrome', 'windows', 1678696486, NULL, 'company', 2),
(803, '122.171.52.241', 'Mozilla Firefox', 'windows', 1678696836, 1678697136, 'agents', 2),
(804, '151.210.137.15', 'Google Chrome', 'windows', 1678696844, NULL, 'agents', 2),
(805, '122.171.52.241', 'Mozilla Firefox', 'windows', 1678700516, 1678700816, 'superadmin', 1),
(806, '122.171.52.241', 'Mozilla Firefox', 'windows', 1678703112, NULL, 'superadmin', 1),
(807, '151.210.137.15', 'Google Chrome', 'windows', 1678703251, NULL, 'superadmin', 1),
(808, '122.171.52.241', 'Mozilla Firefox', 'windows', 1678878360, NULL, 'agents', 2),
(809, '103.161.31.20', 'Google Chrome', 'mac', 1678948930, 1678949230, 'agents', 2),
(810, '151.210.139.114', 'Google Chrome', 'windows', 1678961367, NULL, 'agents', 2),
(811, '103.161.31.20', 'Google Chrome', 'mac', 1679028556, 1679028856, 'agents', 2),
(812, '103.161.31.20', 'Google Chrome', 'mac', 1679287481, 1679287781, 'agents', 2),
(813, '151.210.134.211', 'Google Chrome', 'windows', 1679303102, NULL, 'user', 2),
(814, '151.210.134.211', 'Google Chrome', 'windows', 1679303202, NULL, 'agents', 2),
(815, '103.161.31.20', 'Google Chrome', 'mac', 1679313183, 1679313483, 'agents', 2),
(816, '151.210.134.211', 'Apple Safari', 'mac', 1679336471, NULL, 'agents', 2),
(817, '103.161.31.20', 'Google Chrome', 'mac', 1679417490, 1679417790, 'agents', 2),
(818, '157.48.176.186', 'Apple Safari', 'mac', 1679541995, NULL, 'agents', 2),
(819, '122.181.74.53', 'Mozilla Firefox', 'windows', 1679555319, 1679555619, 'agents', 2),
(820, '122.181.74.53', 'Mozilla Firefox', 'windows', 1679558137, NULL, 'agents', 2),
(821, '151.210.137.92', 'Google Chrome', 'windows', 1679558140, NULL, 'agents', 2),
(822, '151.210.137.92', 'Google Chrome', 'windows', 1679559764, NULL, 'superadmin', 1),
(823, '122.181.74.53', 'Mozilla Firefox', 'windows', 1679560104, NULL, 'admin', 2),
(824, '151.210.137.92', 'Google Chrome', 'windows', 1679560136, NULL, 'admin', 2),
(825, '122.181.74.53', 'Mozilla Firefox', 'windows', 1679560152, NULL, 'superadmin', 1),
(826, '103.161.31.20', 'Google Chrome', 'mac', 1679660864, 1679661164, 'agents', 2),
(827, '151.210.138.157', 'Google Chrome', 'windows', 1679813624, NULL, 'user', 2),
(828, '103.161.31.20', 'Google Chrome', 'mac', 1680088793, 1680089093, 'agents', 2),
(829, '103.161.31.20', 'Google Chrome', 'mac', 1680090917, 1680091217, 'landlord', 2),
(830, '103.161.31.20', 'Google Chrome', 'mac', 1680153436, 1680153736, 'company', 2),
(831, '103.161.31.20', 'Google Chrome', 'mac', 1680153504, 1680153804, 'company', 3),
(832, '103.161.31.20', 'Google Chrome', 'mac', 1680176139, 1680176439, 'landlord', 2),
(833, '103.161.31.20', 'Google Chrome', 'mac', 1680181127, 1680181427, 'agents', 2),
(834, '103.161.31.20', 'Google Chrome', 'mac', 1680190211, 1680190511, 'company', 3),
(835, '103.161.31.20', 'Google Chrome', 'mac', 1680243523, 1680243823, 'user', 2),
(836, '151.210.137.185', 'Google Chrome', 'windows', 1680354553, NULL, 'agents', 2),
(837, '151.210.137.185', 'Google Chrome', 'windows', 1680354767, NULL, 'superadmin', 1),
(838, '151.210.137.170', 'Google Chrome', 'windows', 1680607941, NULL, 'company', 2),
(839, '103.161.31.20', 'Google Chrome', 'mac', 1680755595, 1680755895, 'agents', 2),
(840, '110.225.199.105', 'Mozilla Firefox', 'windows', 1680758004, 1680758304, 'agents', 2),
(841, '110.225.199.105', 'Mozilla Firefox', 'windows', 1680768517, NULL, 'agents', 2),
(842, '103.161.31.20', 'Google Chrome', 'mac', 1680866159, 1680866459, 'agents', 2),
(843, '151.210.138.98', 'Google Chrome', 'windows', 1680996356, 1680996656, 'agents', 2),
(844, '151.210.138.98', 'Google Chrome', 'windows', 1680996598, NULL, 'company', 2),
(845, '151.210.138.98', 'Google Chrome', 'windows', 1681048008, NULL, 'agents', 2),
(846, '151.210.138.98', 'Google Chrome', 'windows', 1681048111, NULL, 'superadmin', 1),
(847, '103.161.31.20', 'Google Chrome', 'mac', 1681101117, 1681101417, 'agents', 2),
(848, '122.169.169.255', 'Mozilla Firefox', 'windows', 1681123475, NULL, 'agents', 2),
(849, '103.161.31.20', 'Google Chrome', 'mac', 1681124078, 1681124378, 'agents', 2),
(850, '103.161.31.20', 'Google Chrome', 'mac', 1681124182, 1681124482, 'company', 3),
(851, '103.161.31.20', 'Google Chrome', 'mac', 1681124763, 1681125063, 'agents', 2),
(852, '103.161.31.20', 'Google Chrome', 'mac', 1681124798, 1681125098, 'company', 3),
(853, '151.210.136.142', 'Google Chrome', 'windows', 1681125138, 1681125438, 'agents', 2),
(854, '151.210.136.142', 'Google Chrome', 'windows', 1681128742, NULL, 'agents', 2),
(855, '151.210.136.142', 'Google Chrome', 'windows', 1681130693, NULL, 'company', 2),
(856, '103.161.31.20', 'Google Chrome', 'mac', 1681188547, 1681188847, 'agents', 2),
(857, '151.210.138.44', 'Google Chrome', 'windows', 1681197624, 1681197924, 'agents', 2),
(858, '151.210.138.44', 'Google Chrome', 'windows', 1681197674, NULL, 'company', 2),
(859, '151.210.138.44', 'Google Chrome', 'windows', 1681198558, NULL, 'company', 4),
(860, '151.210.138.44', 'Google Chrome', 'windows', 1681199133, NULL, 'superadmin', 1),
(861, '151.210.138.44', 'Google Chrome', 'windows', 1681199687, NULL, 'agents', 2),
(862, '151.210.138.44', 'Google Chrome', 'windows', 1681200387, NULL, 'user', 2),
(863, '151.210.138.44', 'Google Chrome', 'windows', 1681200459, NULL, 'user', 7),
(864, '151.210.136.25', 'Google Chrome', 'windows', 1681461042, NULL, 'company', 2),
(865, '151.210.136.25', 'Apple Safari', 'mac', 1681466443, NULL, 'company', 4),
(866, '151.210.136.25', 'Apple Safari', 'mac', 1681466691, NULL, 'agents', 2),
(867, '171.61.137.189', 'Mozilla Firefox', 'windows', 1682627213, 1682627513, 'superadmin', 1),
(868, '171.61.137.189', 'Mozilla Firefox', 'windows', 1682627214, NULL, 'superadmin', 1),
(869, '171.61.137.189', 'Mozilla Firefox', 'windows', 1682627420, 1682627720, 'company', 14),
(870, '171.61.137.189', 'Mozilla Firefox', 'windows', 1682628546, 1682628846, 'company', 14),
(871, '171.61.137.189', 'Mozilla Firefox', 'windows', 1682629453, 1682629753, 'agents', 20),
(872, '171.61.137.189', 'Mozilla Firefox', 'windows', 1682629485, 1682629785, 'agents', 20),
(873, '171.61.137.189', 'Mozilla Firefox', 'windows', 1682629625, 1682629925, 'agents', 20),
(874, '171.61.137.189', 'Mozilla Firefox', 'windows', 1682630385, 1682630685, 'agents', 20),
(875, '171.61.137.189', 'Mozilla Firefox', 'windows', 1682630738, 1682631038, 'agents', 20),
(876, '171.61.137.189', 'Mozilla Firefox', 'windows', 1682630950, NULL, 'company', 14),
(877, '171.61.137.189', 'Mozilla Firefox', 'windows', 1682631099, NULL, 'agents', 20),
(878, '103.161.31.20', 'Google Chrome', 'mac', 1683031557, 1683031857, 'user', 2),
(879, '124.123.182.186', 'Google Chrome', 'mac', 1683093422, NULL, 'agents', 2),
(880, '124.123.182.186', 'Google Chrome', 'mac', 1683093612, NULL, 'user', 2),
(881, '124.123.163.100', 'Google Chrome', 'mac', 1683175671, NULL, 'user', 2),
(882, '103.161.31.20', 'Google Chrome', 'mac', 1683268105, 1683268405, 'agents', 2),
(883, '103.161.31.20', 'Google Chrome', 'mac', 1683285937, 1683286237, 'agents', 2),
(884, '103.161.31.20', 'Google Chrome', 'mac', 1683435993, 1683436293, 'agents', 2),
(885, '103.161.31.20', 'Google Chrome', 'mac', 1683436608, 1683436908, 'company', 3),
(886, '103.161.31.20', 'Google Chrome', 'mac', 1683436718, 1683437018, 'superadmin', 1),
(887, '103.161.31.20', 'Google Chrome', 'mac', 1683449138, 1683449438, 'superadmin', 1),
(888, '103.161.31.20', 'Google Chrome', 'mac', 1683525209, 1683525509, 'company', 3),
(889, '103.161.31.20', 'Google Chrome', 'mac', 1683611765, 1683612065, 'superadmin', 1),
(890, '103.161.31.20', 'Google Chrome', 'mac', 1683783094, 1683783394, 'superadmin', 1),
(891, '161.29.240.97', 'Google Chrome', 'windows', 1683983975, NULL, 'superadmin', 1),
(892, '161.29.231.252', 'Apple Safari', 'mac', 1684352986, NULL, 'company', 15),
(893, '210.54.90.84', 'Google Chrome', 'windows', 1684364962, NULL, 'agents', 5),
(894, '210.54.90.84', 'Google Chrome', 'windows', 1684382343, NULL, 'agents', 2),
(895, '161.29.242.33', 'Google Chrome', 'windows', 1684588634, NULL, 'superadmin', 1),
(896, '103.161.31.20', 'Google Chrome', 'mac', 1684721184, NULL, 'superadmin', 1),
(897, '161.29.245.14', 'Google Chrome', 'windows', 1685348077, NULL, 'agents', 2),
(898, '161.29.245.14', 'Google Chrome', 'windows', 1685348311, NULL, 'superadmin', 1),
(899, '161.29.240.157', 'Google Chrome', 'windows', 1685432377, 1685432677, 'superadmin', 1),
(900, '161.29.240.157', 'Google Chrome', 'windows', 1685432538, 1685432838, 'superadmin', 1),
(901, '161.29.240.157', 'Google Chrome', 'windows', 1685432730, 1685433030, 'company', 16),
(902, '161.29.240.157', 'Google Chrome', 'windows', 1685432929, 1685433229, 'superadmin', 1),
(903, '161.29.240.157', 'Google Chrome', 'windows', 1685433000, 1685433300, 'company', 16),
(904, '161.29.240.157', 'Google Chrome', 'windows', 1685433050, 1685433350, 'superadmin', 1),
(905, '161.29.240.157', 'Google Chrome', 'windows', 1685434071, NULL, 'company', 16),
(906, '161.29.240.157', 'Google Chrome', 'windows', 1685434228, NULL, 'admin', 2),
(907, '161.29.240.157', 'Google Chrome', 'windows', 1685434441, 1685434741, 'superadmin', 1),
(908, '161.29.240.157', 'Google Chrome', 'windows', 1685434494, 1685434794, 'superadmin', 1),
(909, '161.29.240.157', 'Google Chrome', 'windows', 1685434510, NULL, 'superadmin', 1),
(910, '122.179.236.117', 'Mozilla Firefox', 'windows', 1685518730, NULL, 'superadmin', 1),
(911, '122.179.236.117', 'Mozilla Firefox', 'windows', 1685519286, NULL, 'company', 16),
(912, '223.184.9.39', 'Mozilla Firefox', 'windows', 1685521209, 1685521509, 'company', 17),
(913, '223.184.9.39', 'Mozilla Firefox', 'windows', 1685521309, NULL, 'company', 17),
(914, '161.29.228.20', 'Google Chrome', 'windows', 1685521538, NULL, 'admin', 2),
(915, '223.184.9.39', 'Mozilla Firefox', 'windows', 1685521549, NULL, 'admin', 2),
(916, '161.29.228.20', 'Google Chrome', 'windows', 1685524323, NULL, 'landlord', 2),
(917, '161.29.228.20', 'Google Chrome', 'windows', 1685524429, NULL, 'agents', 2),
(918, '161.29.253.163', 'Google Chrome', 'windows', 1685603691, NULL, 'admin', 2),
(919, '161.29.253.163', 'Google Chrome', 'windows', 1685604026, NULL, 'company', 16),
(920, '161.29.245.176', 'Google Chrome', 'windows', 1685921321, NULL, 'company', 16),
(921, '161.29.245.176', 'Google Chrome', 'windows', 1685925751, NULL, 'company', 2),
(922, '161.29.245.176', 'Google Chrome', 'windows', 1685925922, 1685926222, 'company', 3),
(923, '161.29.245.176', 'Google Chrome', 'windows', 1685927229, NULL, 'agents', 2),
(924, '161.29.245.176', 'Google Chrome', 'windows', 1685927441, NULL, 'company', 3),
(925, '161.29.253.102', 'Google Chrome', 'windows', 1686124000, 1686124300, 'agents', 21),
(926, '161.29.253.102', 'Google Chrome', 'windows', 1686126714, NULL, 'agents', 21),
(927, '161.29.228.166', 'Google Chrome', 'windows', 1686466524, NULL, 'company', 16),
(928, '122.181.55.185', 'Mozilla Firefox', 'windows', 1686677755, NULL, 'company', 2),
(929, '122.181.55.185', 'Mozilla Firefox', 'windows', 1686679980, 1686680280, 'company', 3),
(930, '122.181.55.185', 'Mozilla Firefox', 'windows', 1686681490, 1686681790, 'superadmin', 1),
(931, '122.181.55.185', 'Mozilla Firefox', 'windows', 1686681761, 1686682061, 'company', 3),
(932, '122.181.55.185', 'Mozilla Firefox', 'windows', 1686681774, NULL, 'superadmin', 1),
(933, '122.181.55.185', 'Mozilla Firefox', 'windows', 1686682506, NULL, 'company', 3),
(934, '122.181.55.185', 'Mozilla Firefox', 'windows', 1686683781, NULL, 'agents', 2),
(935, '122.181.55.185', 'Mozilla Firefox', 'windows', 1686685064, NULL, 'landlord', 2),
(936, '103.161.31.20', 'Google Chrome', 'mac', 1686808270, 1686808570, 'agents', 2),
(937, '103.161.31.20', 'Google Chrome', 'mac', 1686809409, 1686809709, 'company', 2),
(938, '103.161.31.20', 'Google Chrome', 'mac', 1686809686, 1686809986, 'company', 3),
(939, '103.161.31.20', 'Google Chrome', 'mac', 1686810821, 1686811121, 'agents', 2),
(940, '103.161.31.20', 'Google Chrome', 'mac', 1687411312, 1687411612, 'agents', 2),
(941, '122.171.112.36', 'Mozilla Firefox', 'windows', 1687431759, NULL, 'company', 2),
(942, '122.171.112.36', 'Mozilla Firefox', 'windows', 1687431848, NULL, 'company', 14),
(943, '122.171.112.36', 'Mozilla Firefox', 'windows', 1687431930, 1687432230, 'company', 3),
(944, '103.161.31.20', 'Google Chrome', 'mac', 1687431989, 1687432289, 'agents', 2),
(945, '122.171.112.36', 'Mozilla Firefox', 'windows', 1687432014, NULL, 'agents', 2),
(946, '103.161.31.20', 'Google Chrome', 'mac', 1687432020, 1687432320, 'company', 3),
(947, '103.161.31.20', 'Google Chrome', 'mac', 1687432052, 1687432352, 'agents', 2),
(948, '103.161.31.20', 'Google Chrome', 'mac', 1687432120, 1687432420, 'agents', 2),
(949, '103.161.31.20', 'Google Chrome', 'mac', 1687432144, 1687432444, 'user', 2),
(950, '122.171.112.36', 'Mozilla Firefox', 'windows', 1687432181, 1687432481, 'company', 3),
(951, '103.161.31.20', 'Google Chrome', 'mac', 1687432229, 1687432529, 'company', 3),
(952, '103.161.31.20', 'Google Chrome', 'mac', 1687434810, NULL, 'user', 2),
(953, '103.161.31.20', 'Google Chrome', 'mac', 1687434826, 1687435126, 'agents', 2),
(954, '103.161.31.20', 'Google Chrome', 'mac', 1687434946, 1687435246, 'company', 3),
(955, '122.171.112.36', 'Mozilla Firefox', 'windows', 1687435246, NULL, 'company', 3),
(956, '103.161.31.20', 'Google Chrome', 'mac', 1687502198, 1687502498, 'agents', 2),
(957, '103.161.31.20', 'Google Chrome', 'mac', 1687506355, 1687506655, 'agents', 2),
(958, '103.161.31.20', 'Google Chrome', 'mac', 1687506433, 1687506733, 'agents', 2),
(959, '103.161.31.20', 'Google Chrome', 'mac', 1687841361, NULL, 'company', 3),
(960, '103.161.31.20', 'Google Chrome', 'mac', 1687845819, 1687846119, 'agents', 2),
(961, '103.161.31.20', 'Google Chrome', 'mac', 1687845859, NULL, 'company', 2),
(962, '103.161.31.20', 'Google Chrome', 'mac', 1688361847, NULL, 'agents', 2),
(963, '103.161.31.20', 'Google Chrome', 'mac', 1688364296, NULL, 'agents', 3),
(964, '103.161.31.20', 'Google Chrome', 'mac', 1688364733, NULL, 'landlord', 2),
(965, '161.29.230.187', 'Google Chrome', 'windows', 1688890656, 1688890956, 'company', 16),
(966, '161.29.230.187', 'Google Chrome', 'windows', 1688891528, NULL, 'company', 16),
(967, '161.29.230.187', 'Google Chrome', 'windows', 1688892862, NULL, 'company', 3),
(968, '161.29.252.179', 'Google Chrome', 'windows', 1688982988, 1688983288, 'agents', 21),
(969, '161.29.252.179', 'Google Chrome', 'windows', 1688986796, NULL, 'agents', 21),
(970, '161.29.252.179', 'Google Chrome', 'windows', 1688987362, NULL, 'user', 2),
(971, '161.29.245.70', 'Google Chrome', 'windows', 1689669171, 1689669471, 'agents', 21),
(972, '182.65.237.183', 'Mozilla Firefox', 'windows', 1689673365, 1689673665, 'agents', 21),
(973, '182.65.237.183', 'Mozilla Firefox', 'windows', 1689673821, 1689674121, 'agents', 2),
(974, '161.29.245.70', 'Google Chrome', 'windows', 1689675572, 1689675872, 'company', 16),
(975, '161.29.245.70', 'Google Chrome', 'windows', 1689676394, 1689676694, 'agents', 21),
(976, '161.29.245.70', 'Google Chrome', 'windows', 1689676510, NULL, 'agents', 21),
(977, '182.65.237.183', 'Mozilla Firefox', 'windows', 1689676530, 1689676830, 'agents', 21),
(978, '182.65.237.183', 'Mozilla Firefox', 'windows', 1689677179, 1689677479, 'landlord', 2),
(979, '161.29.245.70', 'Google Chrome', 'windows', 1689677265, 1689677565, 'agents', 26),
(980, '182.65.237.183', 'Mozilla Firefox', 'windows', 1689677457, 1689677757, 'agents', 26),
(981, '182.65.237.183', 'Mozilla Firefox', 'windows', 1689677612, 1689677912, 'superadmin', 1),
(982, '161.29.245.70', 'Google Chrome', 'windows', 1689677806, NULL, 'landlord', 2),
(983, '182.65.237.183', 'Mozilla Firefox', 'windows', 1689677874, 1689678174, 'landlord', 2),
(984, '182.65.237.183', 'Mozilla Firefox', 'windows', 1689678261, 1689678561, 'agents', 26),
(985, '182.65.237.183', 'Mozilla Firefox', 'windows', 1689678279, NULL, 'landlord', 2),
(986, '182.65.237.183', 'Mozilla Firefox', 'windows', 1689678347, 1689678647, 'agents', 2),
(987, '161.29.245.70', 'Google Chrome', 'windows', 1689678352, NULL, 'agents', 2),
(988, '182.65.237.183', 'Mozilla Firefox', 'windows', 1689678382, 1689678682, 'agents', 2),
(989, '161.29.245.70', 'Google Chrome', 'windows', 1689678398, NULL, 'agents', 5),
(990, '161.29.245.70', 'Google Chrome', 'windows', 1689678434, NULL, 'agents', 15),
(991, '182.65.237.183', 'Mozilla Firefox', 'windows', 1689678449, NULL, 'agents', 23),
(992, '182.65.237.183', 'Mozilla Firefox', 'windows', 1689678666, NULL, 'agents', 21),
(993, '182.65.237.183', 'Mozilla Firefox', 'windows', 1689678718, NULL, 'agents', 26),
(994, '161.29.245.70', 'Google Chrome', 'windows', 1689678994, NULL, 'agents', 26),
(995, '161.29.245.70', 'Google Chrome', 'windows', 1689679403, 1689679703, 'company', 4),
(996, '182.65.237.183', 'Mozilla Firefox', 'windows', 1689679434, NULL, 'company', 3),
(997, '161.29.245.70', 'Google Chrome', 'windows', 1689679443, NULL, 'company', 4),
(998, '161.29.245.70', 'Google Chrome', 'windows', 1689679712, NULL, 'company', 3),
(999, '182.65.237.183', 'Mozilla Firefox', 'windows', 1689680123, NULL, 'agents', 2),
(1000, '161.29.245.70', 'Google Chrome', 'windows', 1689680997, NULL, 'company', 16),
(1001, '182.65.237.183', 'Mozilla Firefox', 'windows', 1689681751, 1689682051, 'superadmin', 1),
(1002, '182.65.237.183', 'Mozilla Firefox', 'windows', 1689682859, NULL, 'superadmin', 1),
(1003, '182.65.237.183', 'Mozilla Firefox', 'windows', 1689685095, NULL, 'user', 2),
(1004, '161.29.241.20', 'Google Chrome', 'windows', 1690031138, NULL, 'user', 7),
(1005, '161.29.241.20', 'Google Chrome', 'windows', 1690031434, NULL, 'agents', 5),
(1006, '161.29.241.20', 'Google Chrome', 'windows', 1690031493, NULL, 'landlord', 7),
(1007, '161.29.241.20', 'Google Chrome', 'windows', 1690031591, NULL, 'agents', 2),
(1008, '103.174.80.195', 'Google Chrome', 'mac', 1690375685, 1690375985, 'superadmin', 1),
(1009, '161.29.253.226', 'Google Chrome', 'windows', 1691318884, NULL, 'agents', 2),
(1010, '161.29.230.29', 'Google Chrome', 'windows', 1691400028, NULL, 'agents', 2),
(1011, '161.29.245.88', 'Google Chrome', 'windows', 1692056611, NULL, 'company', 4),
(1012, '161.29.245.88', 'Google Chrome', 'windows', 1692057162, 1692057462, 'company', 16),
(1013, '161.29.245.88', 'Google Chrome', 'windows', 1692057831, NULL, 'company', 16),
(1014, '161.29.245.88', 'Google Chrome', 'windows', 1692057892, NULL, 'company', 6),
(1015, '161.29.245.88', 'Google Chrome', 'windows', 1692057900, NULL, 'admin', 2),
(1016, '161.29.243.5', 'Google Chrome', 'windows', 1692868288, NULL, 'admin', 2),
(1017, '103.174.80.193', 'Google Chrome', 'mac', 1693202262, 1693202562, 'agents', 2),
(1018, '161.29.245.27', 'Google Chrome', 'windows', 1694423555, 1694423855, 'admin', 2),
(1019, '161.29.245.27', 'Google Chrome', 'windows', 1694425476, NULL, 'company', 18),
(1020, '161.29.245.27', 'Google Chrome', 'windows', 1694425523, NULL, 'admin', 2),
(1021, '161.29.245.27', 'Google Chrome', 'windows', 1694425720, NULL, 'superadmin', 1),
(1022, '161.29.228.26', 'Google Chrome', 'windows', 1694854452, 1694854752, 'admin', 2),
(1023, '161.29.228.26', 'Google Chrome', 'windows', 1694854475, 1694854775, 'superadmin', 1),
(1024, '161.29.228.26', 'Google Chrome', 'windows', 1694854547, 1694854847, 'admin', 2),
(1025, '161.29.228.26', 'Google Chrome', 'windows', 1694854829, NULL, 'superadmin', 1),
(1026, '161.29.228.26', 'Google Chrome', 'windows', 1694855224, NULL, 'admin', 2),
(1027, '161.29.228.26', 'Google Chrome', 'windows', 1694860869, NULL, 'agents', 15),
(1028, '103.160.27.149', 'Google Chrome', 'windows', 1696164354, NULL, 'user', 10),
(1029, '150.107.175.33', 'Google Chrome', 'windows', 1696227005, 1696227305, 'admin', 2),
(1030, '103.174.80.195', 'Google Chrome', 'mac', 1696569839, 1696570139, 'superadmin', 1),
(1031, '103.174.80.195', 'Google Chrome', 'mac', 1696589744, 1696590044, 'superadmin', 1),
(1032, '103.174.80.195', 'Google Chrome', 'mac', 1696590112, 1696590412, 'agents', 2),
(1033, '103.174.80.195', 'Google Chrome', 'mac', 1696598584, 1696598884, 'superadmin', 1),
(1034, '103.160.27.219', 'Google Chrome', 'windows', 1696677995, NULL, 'user', 10),
(1035, '103.160.27.219', 'Google Chrome', 'windows', 1696682148, 1696682448, 'agents', 27),
(1036, '103.160.27.219', 'Google Chrome', 'windows', 1696682765, 1696683065, 'agents', 27),
(1037, '103.160.27.219', 'Google Chrome', 'windows', 1696686595, NULL, 'agents', 27),
(1038, '103.174.80.195', 'Google Chrome', 'mac', 1696912304, 1696912604, 'superadmin', 1),
(1039, '103.174.80.195', 'Google Chrome', 'mac', 1696912466, 1696912766, 'agents', 2),
(1040, '103.174.80.195', 'Google Chrome', 'mac', 1696931249, 1696931549, 'superadmin', 1),
(1041, '103.174.80.195', 'Google Chrome', 'mac', 1696931845, NULL, 'agents', 2),
(1042, '49.205.249.150', 'Mozilla Firefox', 'windows', 1697086242, NULL, 'superadmin', 1),
(1043, '103.174.80.195', 'Google Chrome', 'mac', 1697086699, NULL, 'superadmin', 1),
(1044, '150.107.175.33', 'Google Chrome', 'windows', 1697531610, 1697531910, 'admin', 2),
(1045, '103.41.96.166', 'Google Chrome', 'mac', 1697776048, 1697776348, 'superadmin', 1),
(1046, '103.41.96.166', 'Google Chrome', 'mac', 1697776073, 1697776373, 'admin', 2),
(1047, '103.41.96.166', 'Google Chrome', 'mac', 1697780389, 1697780689, 'company', 2),
(1048, '103.41.96.166', 'Google Chrome', 'mac', 1697785396, 1697785696, 'agents', 2),
(1049, '103.41.96.166', 'Google Chrome', 'mac', 1697785573, 1697785873, 'superadmin', 1),
(1050, '103.41.96.166', 'Google Chrome', 'mac', 1697786650, 1697786950, 'agents', 2),
(1051, '103.41.96.166', 'Google Chrome', 'mac', 1697866915, 1697867215, 'superadmin', 1),
(1052, '150.107.175.33', 'Google Chrome', 'windows', 1697867311, 1697867611, 'admin', 2),
(1053, '150.107.175.33', 'Google Chrome', 'windows', 1697868449, NULL, 'company', 23),
(1054, '150.107.175.33', 'Google Chrome', 'windows', 1697873187, 1697873487, 'admin', 2),
(1055, '103.41.96.166', 'Google Chrome', 'mac', 1697873320, NULL, 'admin', 2),
(1056, '150.107.175.33', 'Google Chrome', 'windows', 1697873335, 1697873635, 'company', 24),
(1057, '150.107.175.33', 'Google Chrome', 'windows', 1697873492, NULL, 'company', 24),
(1058, '103.41.96.166', 'Google Chrome', 'mac', 1697873505, 1697873805, 'superadmin', 1),
(1059, '103.41.96.166', 'Google Chrome', 'mac', 1697879947, NULL, 'company', 24),
(1060, '103.41.96.166', 'Google Chrome', 'mac', 1697887978, 1697888278, 'company', 2),
(1061, '103.41.96.166', 'Google Chrome', 'mac', 1697889629, 1697889929, 'agents', 2),
(1062, '103.41.96.166', 'Google Chrome', 'mac', 1697889837, NULL, 'agents', 21),
(1063, '150.107.175.33', 'Google Chrome', 'windows', 1697955289, 1697955589, 'admin', 2),
(1064, '150.107.175.33', 'Google Chrome', 'windows', 1697955335, NULL, 'admin', 2),
(1065, '103.41.96.166', 'Google Chrome', 'mac', 1697955665, 1697955965, 'superadmin', 1),
(1066, '150.107.175.33', 'Google Chrome', 'windows', 1697956861, 1697957161, 'agents', 2),
(1067, '150.107.175.33', 'Google Chrome', 'windows', 1697958044, 1697958344, 'agents', 2),
(1068, '150.107.175.33', 'Google Chrome', 'windows', 1697959734, NULL, 'agents', 28),
(1069, '150.107.175.33', 'Google Chrome', 'windows', 1697960205, NULL, 'landlord', 10),
(1070, '150.107.175.33', 'Google Chrome', 'windows', 1697960799, 1697961099, 'agents', 29),
(1071, '150.107.175.33', 'Google Chrome', 'windows', 1697962245, NULL, 'agents', 29),
(1072, '103.41.96.166', 'Google Chrome', 'mac', 1698070429, 1698070729, 'superadmin', 1),
(1073, '150.107.175.33', 'Google Chrome', 'windows', 1698131843, 1698132143, 'user', 2),
(1074, '150.107.175.33', 'Google Chrome', 'windows', 1698132135, NULL, 'company', 2),
(1075, '150.107.175.33', 'Google Chrome', 'windows', 1698132676, 1698132976, 'agents', 30),
(1076, '103.41.96.166', 'Google Chrome', 'mac', 1698132755, 1698133055, 'superadmin', 1),
(1077, '150.107.175.33', 'Google Chrome', 'windows', 1698133997, NULL, 'agents', 30),
(1078, '103.41.96.166', 'Google Chrome', 'mac', 1698134445, 1698134745, 'agents', 2),
(1079, '150.107.175.33', 'Google Chrome', 'windows', 1698139196, 1698139496, 'user', 2),
(1080, '150.107.175.33', 'Google Chrome', 'windows', 1698139870, 1698140170, 'user', 2),
(1081, '150.107.175.33', 'Google Chrome', 'windows', 1698140326, 1698140626, 'superadmin', 1),
(1082, '103.41.96.166', 'Google Chrome', 'mac', 1698151071, 1698151371, 'user', 2),
(1083, '103.41.96.166', 'Google Chrome', 'mac', 1698152887, 1698153187, 'agents', 2),
(1084, '103.41.96.166', 'Google Chrome', 'mac', 1698153454, 1698153754, 'agents', 2),
(1085, '103.41.96.166', 'Google Chrome', 'mac', 1698159231, 1698159531, 'agents', 2),
(1086, '103.41.96.166', 'Google Chrome', 'mac', 1698215950, 1698216250, 'superadmin', 1),
(1087, '150.107.175.33', 'Google Chrome', 'windows', 1698221106, 1698221406, 'user', 2),
(1088, '150.107.175.33', 'Google Chrome', 'windows', 1698221401, 1698221701, 'user', 2),
(1089, '150.107.175.33', 'Google Chrome', 'windows', 1698221652, 1698221952, 'user', 2),
(1090, '150.107.175.33', 'Google Chrome', 'windows', 1698221943, 1698222243, 'agents', 2),
(1091, '150.107.175.33', 'Google Chrome', 'windows', 1698222454, 1698222754, 'agents', 2),
(1092, '150.107.175.33', 'Google Chrome', 'windows', 1698223281, 1698223581, 'agents', 2),
(1093, '150.107.175.33', 'Google Chrome', 'windows', 1698224201, 1698224501, 'superadmin', 1),
(1094, '150.107.175.33', 'Google Chrome', 'windows', 1698224518, 1698224818, 'user', 2),
(1095, '150.107.175.33', 'Google Chrome', 'windows', 1698224822, 1698225122, 'user', 2),
(1096, '103.41.96.166', 'Google Chrome', 'mac', 1698229478, 1698229778, 'agents', 2),
(1097, '103.41.96.166', 'Google Chrome', 'mac', 1698230120, 1698230420, 'superadmin', 1),
(1098, '103.41.96.166', 'Google Chrome', 'mac', 1698230283, 1698230583, 'agents', 2),
(1099, '150.107.175.33', 'Google Chrome', 'windows', 1698569504, NULL, 'superadmin', 1),
(1100, '150.107.175.33', 'Google Chrome', 'windows', 1698570757, NULL, 'user', 2),
(1101, '150.107.175.33', 'Google Chrome', 'windows', 1698570864, NULL, 'agents', 2),
(1102, '118.149.84.27', 'Google Chrome', 'windows', 1698745463, NULL, 'agents', 2),
(1103, '118.149.84.27', 'Google Chrome', 'windows', 1698747143, NULL, 'company', 4),
(1104, '118.149.84.27', 'Google Chrome', 'windows', 1698747438, NULL, 'superadmin', 1),
(1105, '150.107.174.127', 'Google Chrome', 'windows', 1698822510, NULL, 'superadmin', 1),
(1106, '150.107.174.127', 'Google Chrome', 'windows', 1698824806, 1698825106, 'agents', 2),
(1107, '150.107.174.127', 'Google Chrome', 'windows', 1698825032, NULL, 'user', 2),
(1108, '150.107.174.127', 'Google Chrome', 'windows', 1698826484, 1698826784, 'agents', 30),
(1109, '150.107.174.127', 'Google Chrome', 'windows', 1698826973, NULL, 'agents', 30),
(1110, '150.107.174.127', 'Google Chrome', 'windows', 1698827865, NULL, 'agents', 2),
(1111, '150.107.174.127', 'Google Chrome', 'windows', 1698829623, NULL, 'agents', 31),
(1112, '150.107.174.127', 'Google Chrome', 'windows', 1698829765, NULL, 'company', 25),
(1113, '103.41.96.166', 'Google Chrome', 'mac', 1698839785, 1698840085, 'user', 2),
(1114, '103.41.96.166', 'Google Chrome', 'mac', 1698844043, 1698844343, 'agents', 2),
(1115, '103.41.96.166', 'Google Chrome', 'mac', 1698845149, 1698845449, 'user', 2),
(1116, '103.41.96.166', 'Google Chrome', 'mac', 1698846349, 1698846649, 'agents', 2),
(1117, '103.41.96.166', 'Google Chrome', 'mac', 1698846441, 1698846741, 'company', 2),
(1118, '150.107.174.108', 'Google Chrome', 'windows', 1698909038, 1698909338, 'superadmin', 1),
(1119, '150.107.174.108', 'Google Chrome', 'windows', 1698909483, NULL, 'company', 26),
(1120, '150.107.174.108', 'Google Chrome', 'windows', 1698912129, NULL, 'company', 27),
(1121, '150.107.174.108', 'Google Chrome', 'windows', 1698913375, 1698913675, 'company', 28),
(1122, '150.107.174.108', 'Google Chrome', 'windows', 1698915103, 1698915403, 'agents', 5),
(1123, '150.107.174.108', 'Google Chrome', 'windows', 1698915618, 1698915918, 'company', 28),
(1124, '150.107.174.108', 'Google Chrome', 'windows', 1698916265, 1698916565, 'company', 28),
(1125, '150.107.174.108', 'Google Chrome', 'windows', 1698916810, 1698917110, 'agents', 32),
(1126, '150.107.174.108', 'Google Chrome', 'windows', 1698917328, 1698917628, 'agents', 32),
(1127, '103.41.96.166', 'Google Chrome', 'mac', 1698926456, 1698926756, 'company', 2),
(1128, '103.41.96.166', 'Google Chrome', 'mac', 1698926841, 1698927141, 'superadmin', 1),
(1129, '103.41.96.166', 'Google Chrome', 'mac', 1698928928, 1698929228, 'agents', 2),
(1130, '150.107.174.108', 'Google Chrome', 'windows', 1698995533, 1698995833, 'agents', 32),
(1131, '150.107.174.108', 'Google Chrome', 'windows', 1698995711, 1698996011, 'agents', 5),
(1132, '103.41.96.166', 'Google Chrome', 'mac', 1698996638, 1698996938, 'superadmin', 1),
(1133, '150.107.174.108', 'Google Chrome', 'windows', 1698996836, 1698997136, 'superadmin', 1),
(1134, '150.107.174.108', 'Google Chrome', 'windows', 1698997145, NULL, 'company', 29),
(1135, '150.107.174.108', 'Google Chrome', 'windows', 1698997596, 1698997896, 'agents', 2),
(1136, '150.107.174.108', 'Google Chrome', 'windows', 1698997666, 1698997966, 'agents', 32),
(1137, '150.107.174.108', 'Google Chrome', 'windows', 1698997923, NULL, 'agents', 29),
(1138, '150.107.174.108', 'Google Chrome', 'windows', 1698998059, NULL, 'agents', 33),
(1139, '150.107.174.108', 'Google Chrome', 'windows', 1698998189, 1698998489, 'company', 28),
(1140, '150.107.174.108', 'Google Chrome', 'windows', 1698998552, NULL, 'agents', 34),
(1141, '150.107.174.108', 'Google Chrome', 'windows', 1698998739, 1698999039, 'agents', 32),
(1142, '150.107.174.108', 'Google Chrome', 'windows', 1698998808, 1698999108, 'company', 28),
(1143, '150.107.174.108', 'Google Chrome', 'windows', 1698998944, 1698999244, 'landlord', 2),
(1144, '150.107.174.108', 'Google Chrome', 'windows', 1699000776, NULL, 'company', 3),
(1145, '150.107.174.108', 'Google Chrome', 'windows', 1699001032, 1699001332, 'agents', 2),
(1146, '103.41.96.166', 'Google Chrome', 'mac', 1699005653, 1699005953, 'agents', 2),
(1147, '103.41.96.166', 'Google Chrome', 'mac', 1699005719, 1699006019, 'agents', 33),
(1148, '103.41.96.166', 'Google Chrome', 'mac', 1699007711, 1699008011, 'superadmin', 1),
(1149, '103.41.96.166', 'Google Chrome', 'mac', 1699013692, 1699013992, 'agents', 33),
(1150, '103.41.96.166', 'Google Chrome', 'mac', 1699014716, 1699015016, 'agents', 33),
(1151, '103.41.96.166', 'Google Chrome', 'mac', 1699014766, 1699015066, 'agents', 2),
(1152, '103.41.96.166', 'Google Chrome', 'mac', 1699014950, NULL, 'agents', 33),
(1153, '103.41.96.166', 'Google Chrome', 'mac', 1699015062, 1699015362, 'landlord', 2),
(1154, '103.41.96.166', 'Google Chrome', 'mac', 1699015954, 1699016254, 'agents', 2),
(1155, '103.41.96.166', 'Google Chrome', 'mac', 1699016476, 1699016776, 'landlord', 2),
(1156, '103.41.96.166', 'Google Chrome', 'mac', 1699016495, 1699016795, 'company', 2),
(1157, '103.41.96.166', 'Google Chrome', 'mac', 1699016509, 1699016809, 'agents', 2),
(1158, '103.41.96.166', 'Google Chrome', 'mac', 1699016608, 1699016908, 'superadmin', 1),
(1159, '103.41.96.166', 'Google Chrome', 'mac', 1699016767, 1699017067, 'company', 2),
(1160, '103.41.96.166', 'Google Chrome', 'mac', 1699017103, 1699017403, 'agents', 2),
(1161, '103.41.96.166', 'Google Chrome', 'mac', 1699017123, 1699017423, 'landlord', 2),
(1162, '49.37.153.234', 'Google Chrome', 'windows', 1699339808, NULL, 'user', 2),
(1163, '49.37.153.234', 'Google Chrome', 'windows', 1699340091, NULL, 'company', 2),
(1164, '49.37.153.234', 'Google Chrome', 'windows', 1699340146, NULL, 'superadmin', 1),
(1165, '49.37.153.234', 'Google Chrome', 'windows', 1699342046, NULL, 'agents', 2),
(1166, '150.107.174.108', 'Google Chrome', 'windows', 1699349739, 1699350039, 'company', 28),
(1167, '150.107.174.108', 'Google Chrome', 'windows', 1699349904, 1699350204, 'admin', 2),
(1168, '150.107.174.108', 'Google Chrome', 'windows', 1699351019, 1699351319, 'agents', 32),
(1169, '150.107.174.108', 'Google Chrome', 'windows', 1699351811, NULL, 'agents', 32),
(1170, '150.107.174.108', 'Google Chrome', 'windows', 1699354786, NULL, 'user', 7),
(1171, '150.107.174.108', 'Google Chrome', 'windows', 1699355075, 1699355375, 'company', 28),
(1172, '150.107.174.108', 'Google Chrome', 'windows', 1699433347, NULL, 'admin', 2),
(1173, '150.107.174.108', 'Google Chrome', 'windows', 1699434916, NULL, 'superadmin', 1),
(1174, '103.41.96.166', 'Google Chrome', 'mac', 1699439150, 1699439450, 'superadmin', 1),
(1175, '103.41.96.166', 'Google Chrome', 'mac', 1699445494, 1699445794, 'superadmin', 1),
(1176, '103.41.96.166', 'Google Chrome', 'mac', 1699618617, 1699618917, 'superadmin', 1),
(1177, '150.107.174.108', 'Google Chrome', 'windows', 1699949634, NULL, 'agents', 2),
(1178, '150.107.174.108', 'Google Chrome', 'windows', 1699949696, NULL, 'agents', 5),
(1179, '150.107.174.108', 'Google Chrome', 'windows', 1699949944, NULL, 'landlord', 2),
(1180, '150.107.174.108', 'Google Chrome', 'windows', 1699950413, NULL, 'company', 28),
(1181, '103.41.96.166', 'Google Chrome', 'mac', 1700031538, 1700031838, 'agents', 2),
(1182, '103.41.96.166', 'Google Chrome', 'mac', 1700031575, NULL, 'superadmin', 1),
(1183, '103.41.96.166', 'Google Chrome', 'mac', 1700112727, 1700113027, 'agents', 2);
INSERT INTO `loginlog` (`sno`, `ip`, `browser`, `operatingsystem`, `login`, `logout`, `role`, `user`) VALUES
(1184, '103.41.96.166', 'Google Chrome', 'mac', 1700139792, 1700140092, 'agents', 2),
(1185, '103.41.96.166', 'Google Chrome', 'mac', 1700146419, 1700146719, 'agents', 2),
(1186, '103.41.96.166', 'Google Chrome', 'mac', 1700191233, 1700191533, 'agents', 2),
(1187, '103.41.96.166', 'Google Chrome', 'mac', 1700218754, NULL, 'agents', 36),
(1188, '103.41.96.166', 'Google Chrome', 'mac', 1700218815, NULL, 'company', 28),
(1189, '103.41.96.166', 'Google Chrome', 'mac', 1700224803, 1700225103, 'agents', 2),
(1190, '150.107.174.115', 'Google Chrome', 'windows', 1700397568, 1700397868, 'superadmin', 1),
(1191, '150.107.174.115', 'Google Chrome', 'windows', 1700437137, 1700437437, 'superadmin', 1),
(1192, '150.107.174.115', 'Google Chrome', 'windows', 1700439458, 1700439758, 'agents', 2),
(1193, '150.107.174.115', 'Google Chrome', 'windows', 1700446612, 1700446912, 'company', 28),
(1194, '150.107.174.115', 'Google Chrome', 'windows', 1700447098, 1700447398, 'company', 28),
(1195, '150.107.174.115', 'Google Chrome', 'windows', 1700448099, 1700448399, 'agents', 2),
(1196, '150.107.174.115', 'Google Chrome', 'windows', 1700459728, 1700460028, 'agents', 2),
(1197, '150.107.174.115', 'Google Chrome', 'windows', 1700465115, 1700465415, 'company', 28),
(1198, '150.107.174.115', 'Google Chrome', 'windows', 1700471602, 1700471902, 'user', 2),
(1199, '150.107.174.115', 'Google Chrome', 'windows', 1700471747, 1700472047, 'landlord', 2),
(1200, '150.107.174.115', 'Google Chrome', 'windows', 1700550826, 1700551126, 'agents', 2),
(1201, '150.107.174.115', 'Google Chrome', 'windows', 1700635483, 1700635783, 'user', 2),
(1202, '150.107.174.115', 'Google Chrome', 'windows', 1700721301, 1700721601, 'landlord', 2),
(1203, '150.107.174.115', 'Google Chrome', 'windows', 1700721656, 1700721956, 'agents', 2),
(1204, '150.107.174.115', 'Google Chrome', 'windows', 1700721751, NULL, 'agents', 5),
(1205, '150.107.174.115', 'Google Chrome', 'windows', 1700721879, 1700722179, 'company', 28),
(1206, '150.107.174.115', 'Google Chrome', 'windows', 1700723504, 1700723804, 'landlord', 2),
(1207, '150.107.174.115', 'Google Chrome', 'windows', 1700724123, 1700724423, 'company', 28),
(1208, '150.107.174.115', 'Google Chrome', 'windows', 1700725494, 1700725794, 'agents', 2),
(1209, '150.107.174.115', 'Google Chrome', 'windows', 1700725671, 1700725971, 'agents', 26),
(1210, '150.107.174.115', 'Google Chrome', 'windows', 1700725790, 1700726090, 'agents', 2),
(1211, '150.107.174.115', 'Google Chrome', 'windows', 1700726283, 1700726583, 'agents', 26),
(1212, '150.107.174.115', 'Google Chrome', 'windows', 1700726327, NULL, 'agents', 26),
(1213, '150.107.174.115', 'Google Chrome', 'windows', 1700727392, 1700727692, 'agents', 2),
(1214, '150.107.174.115', 'Google Chrome', 'windows', 1700727532, NULL, 'company', 2),
(1215, '103.41.96.166', 'Google Chrome', 'mac', 1700798637, 1700798937, 'user', 2),
(1216, '103.41.96.166', 'Google Chrome', 'mac', 1700799167, 1700799467, 'landlord', 2),
(1217, '103.41.96.166', 'Google Chrome', 'mac', 1700799411, NULL, 'company', 2),
(1218, '103.41.96.166', 'Google Chrome', 'mac', 1700803782, 1700804082, 'user', 2),
(1219, '103.41.96.166', 'Google Chrome', 'mac', 1700809715, 1700810015, 'agents', 2),
(1220, '103.41.96.166', 'Google Chrome', 'mac', 1700809963, 1700810263, 'user', 2),
(1221, '150.107.174.115', 'Google Chrome', 'windows', 1700828254, NULL, 'user', 2),
(1222, '150.107.174.115', 'Google Chrome', 'windows', 1700828606, NULL, 'agents', 2),
(1223, '150.107.174.115', 'Google Chrome', 'windows', 1700828789, NULL, 'landlord', 2),
(1224, '150.107.174.115', 'Google Chrome', 'windows', 1700828978, NULL, 'company', 28),
(1225, '150.107.174.115', 'Google Chrome', 'windows', 1700829691, NULL, 'admin', 2),
(1226, '150.107.174.115', 'Google Chrome', 'windows', 1700829711, NULL, 'superadmin', 1),
(1227, '103.41.96.166', 'Google Chrome', 'mac', 1700891052, NULL, 'agents', 2),
(1228, '103.41.96.166', 'Google Chrome', 'mac', 1700891330, NULL, 'landlord', 2),
(1229, '103.41.96.166', 'Google Chrome', 'mac', 1700891748, NULL, 'user', 2),
(1230, '150.107.174.48', 'Google Chrome', 'windows', 1702363146, 1702363446, 'company', 2),
(1231, '150.107.174.48', 'Google Chrome', 'windows', 1702363301, 1702363601, 'agents', 2),
(1232, '150.107.174.48', 'Google Chrome', 'windows', 1702363542, 1702363842, 'superadmin', 1),
(1233, '104.28.29.66', 'Apple Safari', 'mac', 1703407318, NULL, 'company', 28),
(1234, '150.107.174.48', 'Google Chrome', 'windows', 1704183737, 1704184037, 'agents', 2),
(1235, '150.107.174.48', 'Google Chrome', 'windows', 1704184045, 1704184345, 'superadmin', 1),
(1236, '150.107.174.48', 'Google Chrome', 'windows', 1704184277, NULL, 'company', 30),
(1237, '150.107.174.48', 'Google Chrome', 'windows', 1704184312, 1704184612, 'superadmin', 1),
(1238, '150.107.174.48', 'Google Chrome', 'windows', 1704259613, 1704259913, 'company', 28),
(1239, '150.107.174.48', 'Google Chrome', 'windows', 1704261080, 1704261380, 'user', 2),
(1240, '150.107.174.48', 'Apple Safari', 'mac', 1704348654, NULL, 'company', 28),
(1241, '106.212.63.188', 'Mozilla Firefox', 'windows', 1704537174, NULL, 'superadmin', 1),
(1242, '150.107.174.48', 'Google Chrome', 'windows', 1704694927, 1704695227, 'company', 28),
(1243, '150.107.174.48', 'Google Chrome', 'windows', 1704963424, 1704963724, 'admin', 2),
(1244, '150.107.174.48', 'Google Chrome', 'windows', 1704963546, 1704963846, 'agents', 5),
(1245, '103.174.80.197', 'Google Chrome', 'mac', 1705643640, NULL, 'superadmin', 1),
(1246, '150.107.174.48', 'Google Chrome', 'windows', 1705831190, NULL, 'admin', 2),
(1247, '150.107.174.48', 'Google Chrome', 'windows', 1705831208, 1705831508, 'superadmin', 1),
(1248, '150.107.174.48', 'Google Chrome', 'windows', 1705831261, 1705831561, 'agents', 2),
(1249, '150.107.174.48', 'Google Chrome', 'windows', 1705989516, NULL, 'company', 2),
(1250, '150.107.174.48', 'Google Chrome', 'windows', 1705990541, 1705990841, 'user', 2),
(1251, '150.107.174.48', 'Google Chrome', 'windows', 1706076753, 1706077053, 'superadmin', 1),
(1252, '150.107.174.48', 'Google Chrome', 'windows', 1706080250, 1706080550, 'superadmin', 1),
(1253, '150.107.174.48', 'Google Chrome', 'windows', 1706080828, 1706081128, 'agents', 2),
(1254, '103.174.80.193', 'Google Chrome', 'mac', 1706096157, NULL, 'agents', 2),
(1255, '172.225.245.102', 'Apple Safari', 'mac', 1706152018, 1706152318, 'agents', 5),
(1256, '49.205.248.224', 'Google Chrome', 'windows', 1706155410, NULL, 'superadmin', 1),
(1257, '172.225.245.102', 'Apple Safari', 'mac', 1706218979, NULL, 'agents', 5),
(1258, '150.107.174.48', 'Google Chrome', 'windows', 1706245598, 1706245898, 'superadmin', 1),
(1259, '103.174.80.193', 'Google Chrome', 'mac', 1706364255, NULL, 'superadmin', 1),
(1260, '150.107.174.48', 'Google Chrome', 'windows', 1706411058, 1706411358, 'superadmin', 1),
(1261, '150.107.174.48', 'Google Chrome', 'windows', 1706512223, 1706512523, 'superadmin', 1),
(1262, '150.107.174.48', 'Google Chrome', 'windows', 1706512389, 1706512689, 'agents', 2),
(1263, '150.107.174.48', 'Google Chrome', 'windows', 1706514181, 1706514481, 'agents', 2),
(1264, '150.107.174.48', 'Google Chrome', 'windows', 1706514584, NULL, 'user', 2),
(1265, '150.107.174.48', 'Google Chrome', 'windows', 1706515464, 1706515764, 'superadmin', 1),
(1266, '150.107.174.48', 'Google Chrome', 'windows', 1706516285, 1706516585, 'superadmin', 1),
(1267, '150.107.174.48', 'Google Chrome', 'windows', 1706516390, 1706516690, 'superadmin', 1),
(1268, '150.107.174.48', 'Google Chrome', 'windows', 1706516531, 1706516831, 'superadmin', 1),
(1269, '150.107.174.48', 'Google Chrome', 'windows', 1706516937, 1706517237, 'superadmin', 1),
(1270, '150.107.174.48', 'Google Chrome', 'windows', 1706602525, 1706602825, 'superadmin', 1),
(1271, '150.107.174.48', 'Google Chrome', 'windows', 1706603534, NULL, 'company', 31),
(1272, '150.107.174.48', 'Google Chrome', 'windows', 1706603708, NULL, 'company', 32),
(1273, '150.107.174.48', 'Google Chrome', 'windows', 1706604070, 1706604370, 'company', 28),
(1274, '150.107.174.48', 'Google Chrome', 'windows', 1706604403, 1706604703, 'agents', 2),
(1275, '150.107.174.48', 'Google Chrome', 'windows', 1706604647, 1706604947, 'agents', 5),
(1276, '150.107.174.48', 'Google Chrome', 'windows', 1706604728, 1706605028, 'agents', 2),
(1277, '150.107.174.48', 'Google Chrome', 'windows', 1706604841, 1706605141, 'agents', 5),
(1278, '150.107.174.48', 'Google Chrome', 'windows', 1706605075, NULL, 'landlord', 2),
(1279, '150.107.174.48', 'Google Chrome', 'windows', 1706605228, 1706605528, 'agents', 5),
(1280, '223.178.10.254', 'Mozilla Firefox', 'windows', 1706677046, NULL, 'superadmin', 1),
(1281, '223.178.10.254', 'Mozilla Firefox', 'windows', 1706677327, NULL, 'company', 2),
(1282, '150.107.174.48', 'Google Chrome', 'windows', 1706687398, NULL, 'agents', 5),
(1283, '103.174.80.198', 'Google Chrome', 'mac', 1707487134, NULL, 'agents', 2),
(1284, '150.107.174.48', 'Apple Safari', 'mac', 1707594470, NULL, 'agents', 5),
(1285, '150.107.174.48', 'Google Chrome', 'windows', 1707636683, 1707636983, 'company', 28),
(1286, '150.107.174.48', 'Google Chrome', 'windows', 1707725227, NULL, 'company', 28),
(1287, '150.107.174.48', 'Google Chrome', 'windows', 1707725322, 1707725622, 'agents', 32),
(1288, '150.107.174.48', 'Google Chrome', 'windows', 1707730660, 1707730960, 'agents', 32),
(1289, '150.107.174.48', 'Google Chrome', 'windows', 1707802216, 1707802516, 'superadmin', 1),
(1290, '150.107.174.48', 'Google Chrome', 'windows', 1708228214, 1708228514, 'superadmin', 1),
(1291, '150.107.174.48', 'Google Chrome', 'windows', 1708229504, 1708229804, 'superadmin', 1),
(1292, '150.107.174.48', 'Google Chrome', 'windows', 1708229741, NULL, 'agents', 2),
(1293, '150.107.174.48', 'Google Chrome', 'windows', 1708230197, 1708230497, 'superadmin', 1),
(1294, '171.61.129.51', 'Mozilla Firefox', 'windows', 1708402211, NULL, 'agents', 2),
(1295, '103.174.80.143', 'Google Chrome', 'mac', 1708405737, 1708406037, 'agents', 2),
(1296, '150.107.174.48', 'Google Chrome', 'windows', 1708411451, NULL, 'agents', 32),
(1297, '150.107.174.48', 'Google Chrome', 'windows', 1708415223, 1708415523, 'superadmin', 1),
(1298, '150.107.174.48', 'Google Chrome', 'windows', 1708814557, NULL, 'superadmin', 1),
(1299, '150.107.174.233', 'Google Chrome', 'windows', 1709382749, 1709383049, 'superadmin', 1),
(1300, '150.107.174.233', 'Google Chrome', 'windows', 1709384138, 1709384438, 'superadmin', 1),
(1301, '150.107.174.233', 'Google Chrome', 'windows', 1709384691, 1709384991, 'agents', 2),
(1302, '171.61.95.25', 'Google Chrome', 'windows', 1709882757, 1709883057, 'agents', 2),
(1303, '171.61.95.25', 'Google Chrome', 'windows', 1709882791, NULL, 'superadmin', 1),
(1304, '171.61.95.25', 'Google Chrome', 'windows', 1709883463, NULL, 'agents', 2),
(1305, '150.107.174.233', 'Google Chrome', 'windows', 1710650292, 1710650592, 'superadmin', 1),
(1306, '150.107.174.233', 'Google Chrome', 'windows', 1710650433, 1710650733, 'agents', 2),
(1307, '103.174.80.143', 'Google Chrome', 'mac', 1710743624, 1710743924, 'agents', 2),
(1308, '150.107.174.233', 'Google Chrome', 'windows', 1710833152, NULL, 'agents', 2),
(1309, '103.174.80.143', 'Google Chrome', 'mac', 1710848213, NULL, 'agents', 2),
(1310, '150.107.174.233', 'Google Chrome', 'windows', 1711171300, NULL, 'agents', 32),
(1311, '150.107.174.233', 'Google Chrome', 'windows', 1711407741, 1711408041, 'superadmin', 1),
(1312, '152.58.196.190', 'Google Chrome', 'mac', 1711430571, NULL, 'company', 2),
(1313, '152.58.196.190', 'Google Chrome', 'mac', 1711436655, NULL, 'company', 33),
(1314, '152.59.198.99', 'Google Chrome', 'mac', 1711521262, NULL, 'company', 2),
(1315, '152.59.198.99', 'Google Chrome', 'mac', 1711522388, NULL, 'superadmin', 1),
(1316, '152.59.198.35', 'Google Chrome', 'mac', 1711722036, NULL, 'superadmin', 1),
(1317, '152.58.196.193', 'Google Chrome', 'mac', 1712053691, NULL, 'superadmin', 1),
(1318, '150.107.174.233', 'Google Chrome', 'windows', 1712221172, 1712221472, 'superadmin', 1),
(1319, '150.107.174.233', 'Google Chrome', 'windows', 1712221737, NULL, 'company', 34),
(1320, '150.107.174.233', 'Google Chrome', 'windows', 1712223541, NULL, 'superadmin', 1),
(1321, '122.174.78.29', 'Google Chrome', 'windows', 1712252797, 1712253097, 'superadmin', 1),
(1322, '122.174.78.29', 'Google Chrome', 'windows', 1712252812, 1712253112, 'agents', 2),
(1323, '122.174.78.29', 'Google Chrome', 'windows', 1712252835, 1712253135, 'superadmin', 1),
(1324, '122.174.78.29', 'Google Chrome', 'windows', 1712253974, NULL, 'agents', 2),
(1325, '122.174.78.29', 'Google Chrome', 'windows', 1712254018, NULL, 'company', 2),
(1326, '122.174.78.29', 'Google Chrome', 'windows', 1712254624, NULL, 'superadmin', 1),
(1327, '152.59.199.129', 'Google Chrome', 'mac', 1712292044, NULL, 'company', 2),
(1328, '152.59.199.129', 'Google Chrome', 'mac', 1712292639, NULL, 'superadmin', 1),
(1329, '150.107.174.1', 'Apple Safari', 'mac', 1712829580, NULL, 'company', 34),
(1330, '150.107.174.1', 'Google Chrome', 'windows', 1712834608, 1712834908, 'superadmin', 1),
(1331, '150.107.174.1', 'Google Chrome', 'windows', 1712835360, NULL, 'company', 2),
(1332, '150.107.174.1', 'Google Chrome', 'windows', 1712835449, 1712835749, 'company', 28),
(1333, '150.107.174.1', 'Google Chrome', 'windows', 1712836529, NULL, 'company', 28),
(1334, '150.107.174.1', 'Google Chrome', 'windows', 1712836766, NULL, 'company', 24),
(1335, '110.225.239.246', 'Google Chrome', 'windows', 1712850175, 1712850475, 'superadmin', 1),
(1336, '110.225.239.246', 'Google Chrome', 'windows', 1712850200, NULL, 'admin', 2),
(1337, '110.225.239.246', 'Google Chrome', 'windows', 1712850885, NULL, 'superadmin', 1),
(1338, '150.107.174.1', 'Google Chrome', 'windows', 1712929595, 1712929895, 'superadmin', 1),
(1339, '150.107.174.1', 'Google Chrome', 'windows', 1712930280, 1712930580, 'superadmin', 1),
(1340, '183.82.102.247', 'Google Chrome', 'windows', 1713503684, NULL, 'user', 11),
(1341, '150.107.174.1', 'Google Chrome', 'windows', 1713505522, 1713505822, 'admin', 2),
(1342, '150.107.174.1', 'Google Chrome', 'windows', 1713505603, NULL, 'superadmin', 1),
(1343, '150.107.174.1', 'Google Chrome', 'windows', 1713505674, NULL, 'admin', 2),
(1344, '150.107.174.1', 'Google Chrome', 'windows', 1713505821, NULL, 'agents', 2),
(1345, '115.243.2.227', 'Google Chrome', 'windows', 1713508538, NULL, 'admin', 2),
(1346, '115.243.2.227', 'Google Chrome', 'windows', 1713509095, NULL, 'user', 2),
(1347, '122.162.17.5', 'Google Chrome', 'windows', 1714282429, NULL, 'admin', 2),
(1348, '122.162.17.5', 'Google Chrome', 'windows', 1714283843, NULL, 'user', 2);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `table_name` varchar(255) NOT NULL DEFAULT '#',
  `icon` varchar(100) NOT NULL DEFAULT 'glyphicon glyphicon-folder-close',
  `child_id` int(11) NOT NULL,
  `menu_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`parent_id`, `name`, `table_name`, `icon`, `child_id`, `menu_order`) VALUES
(1, 'Maintenance Mode', 'settings', 'fas fa-cogs', 0, 100),
(2, 'Users', 'customers', 'fa fa-users', 0, 3),
(7, 'Companies', 'companies', 'fa fa-building', 0, 3),
(8, 'Property Managers', 'agents', 'fa fa-user-shield', 0, 4),
(9, 'Packages', 'packages', 'fa fa-th', 24, 6),
(10, 'Subscriptions', 'subscriptions', 'fas fa-user-plus', 0, 6),
(11, 'Regions', 'regions', 'fa fa-map', 14, 7),
(13, 'Districts', 'districts', 'fa fa-map-marker', 14, 8),
(14, 'Locations', '#', 'glyphicon glyphicon-folder-close', 0, 98),
(16, 'Landlord\'s', 'landlords', 'fa fa-users', 0, 5),
(17, 'Properties', 'properties', 'fas fa-home', 0, 2),
(18, 'Amenities', 'p_amenities', 'fa fa-th', 24, 53),
(19, 'Suburbs', 'suburbs', 'fa fa-map-marker', 14, 54),
(20, 'Categories', 'supplier_categories', 'fa fa-th', 23, 56),
(21, 'Services', 'supplier_services', 'fa fa-cogs', 23, 57),
(22, 'Suppliers', 'suppliers', 'fa fa-user-cog', 23, 55),
(23, 'Service Suppliers', '#', 'glyphicon glyphicon-folder-close', 0, 58),
(24, 'Settings', '#', 'glyphicon glyphicon-folder-close', 0, 99),
(25, 'Property Schedules', 'property_schedules', 'fas fa-calendar-alt', 0, 101),
(26, 'Property Visits', 'property_visits', 'fa fa-clock', 0, 102),
(27, 'Languages', 'languages', 'fa fa-language', 24, 103),
(28, 'Popular Cities', 'popular_cities', 'fa fa-th', 30, 104),
(29, 'Client Logos', 'client_logos', 'fa fa-th', 30, 105),
(30, 'Website', '#', 'glyphicon glyphicon-folder-close', 0, 106),
(31, 'Blogs', 'blogs', 'fa fa-th', 0, 107),
(32, 'Testimonials', 'testimonials', 'fa fa-quote-right', 0, 108),
(33, 'Terms & Conditions', 'terms', 'fa fa-file-alt', 0, 109),
(34, 'Privacy Policy', 'privacy', 'fa fa-file-alt', 0, 110),
(35, 'Promotions', 'promotional', 'fas fa-money-check-alt', 0, 103);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `sno` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `product` varchar(50) NOT NULL,
  `ref_image_1` varchar(255) NOT NULL,
  `ref_image_2` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `notes` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `sno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_type` enum('Landlord','Agents','Company') NOT NULL,
  `properties` int(11) NOT NULL,
  `agents` int(11) NOT NULL,
  `actual_price` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `Web` tinyint(1) NOT NULL DEFAULT 0,
  `notes` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`sno`, `name`, `user_type`, `properties`, `agents`, `actual_price`, `price`, `Web`, `notes`, `created_date`, `modified_date`, `status`) VALUES
(1, 'Small Company', 'Company', 10, 3, 135, 95, 1, '', '0000-00-00 00:00:00', '2024-04-12 19:19:36', 1),
(2, 'Medium Company', 'Company', 20, 7, 195, 135, 1, '', '0000-00-00 00:00:00', '2024-04-12 19:20:12', 1),
(3, 'Large Company', 'Company', 30, 15, 275, 195, 1, '', '0000-00-00 00:00:00', '2024-04-12 19:19:02', 1),
(10, 'Custom 1', 'Company', 10, 3, 135, 0, 0, 'Duplicate for small', '2023-11-03 00:00:00', '2024-04-12 19:25:44', 1),
(11, 'Custom 2', 'Company', 20, 7, 195, 0, 0, '', '0000-00-00 00:00:00', '2024-04-12 19:26:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `popular_cities`
--

CREATE TABLE `popular_cities` (
  `sno` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `cimage` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `popular_cities`
--

INSERT INTO `popular_cities` (`sno`, `city_name`, `cimage`, `url`, `status`) VALUES
(11, 'Auckland', 'xm17z93btf4okw8ssg.jpg', '', 1),
(10, 'Hamilton', 'h4frgrdkzmgc8k40ko.jpg', '', 1),
(8, 'Wellington', '9bt2u0gd6gowg04co4.jpg', '', 1),
(7, 'Christchurch', 'bh49k0l7y3kgko88so.jpg', '', 1),
(9, 'Tauranga', '6wtoibezm204oc8ow.jpg', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `privacy`
--

CREATE TABLE `privacy` (
  `sno` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `privacy`
--

INSERT INTO `privacy` (`sno`, `description`, `created_date`, `modified_date`, `status`) VALUES
(1, '<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>Privacy Policy</strong></p>\n\n<p style=\"text-align: justify;\">Your privacy is important to us and we take responsibility to protect your personal information. This privacy policy sets out how we collect, use, disclose and protect your personal information while you use our website and services. By using this website, you agree to our privacy policy. We reserve the right to change this policy at any time and notify you of any major changes to this privacy policy from time to time, you agree that you will periodically review the most up-to-date version of this privacy policy.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>Collection of Information</strong></p>\n\n<p style=\"text-align: justify;\">Rental Listings will collect information from you that is required to create an account which includes personal information. This personal information may include (but is not limited to) your name, phone number and email address. Failure to provide this personal information will not allow you to create your account. You must ensure that all information you provide is correct and up-to-date. If you change any of your details, you agree to update them. If you have difficulties updating your details, you can reach us at&nbsp;support@rentallistins.co.nz. For any reason, if you wish to delete your account, you can contact us at support@rentallistins.co.nz. Once an account is deleted, your personal information and active listings will be removed from the website.</p>\n\n<p style=\"text-align: justify;\">The information provided by you is used to register or subscribe to use our website &amp; services, to post or upload to create your profile, publish your listing(s) on our website, to interact &amp; communicate with others, and save others&rsquo; listing(s) to your dashboard.</p>\n\n<p style=\"text-align: justify;\">We will not collect information about any person who is under the age of 13.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>Use and Disclosure</strong></p>\n\n<p style=\"text-align: justify;\">We may use the personal information we collect:</p>\n\n<ul style=\"list-style-type:circle\">\n	<li style=\"text-align: justify;\">To verify your identity.</li>\n	<li style=\"text-align: justify;\">To assist you in case you forget your password or login details.</li>\n	<li style=\"text-align: justify;\">To assist with our services.</li>\n	<li style=\"text-align: justify;\">To manage and enhance the Services.</li>\n	<li style=\"text-align: justify;\">To communicate with you, including by email, mail or phone.</li>\n	<li style=\"text-align: justify;\">To provide information to you about other properties, products and services, which we consider may be of interest to you.</li>\n	<li style=\"text-align: justify;\">To provide you with information about our updated services and newsletters.</li>\n	<li style=\"text-align: justify;\">To promote, marketing, and publicity purposes.</li>\n	<li style=\"text-align: justify;\">To provide the most relevant information or advertising of your interest.</li>\n	<li style=\"text-align: justify;\">And To any other use that you authorize.</li>\n</ul>\n\n<p style=\"text-align: justify;\">We may disclose all information that we collect, including your personal information:</p>\n\n<ul style=\"list-style-type:circle\">\n	<li style=\"text-align: justify;\">To property management companies, property managers, agents and other service providers or property owners that use our website.</li>\n	<li style=\"text-align: justify;\">To aggregate tracking information and other information that does not personally identify you to third parties such as our partners, agents, and advertisers.</li>\n	<li style=\"text-align: justify;\">To third parties when we believe in good faith that we are required to do so by law.</li>\n	<li style=\"text-align: justify;\">To investigate your use of the website and services if we have a reason to suspect that you are in breach of the terms and conditions or have otherwise engaged in unlawful activity as required or as permitted by any law.</li>\n	<li style=\"text-align: justify;\">And To any other use that you authorize.</li>\n</ul>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>Third Parties and Advertisers</strong></p>\n\n<p style=\"text-align: justify;\">We do not control any activity of property management companies, property managers, agents,, landlords, owners, content providers, partners and advertisers connected with our website and to whom you provide personal information whilst using our website or services. Our website contains links to other websites, which may not follow the same privacy policies as ours. We recommend that you check any relevant privacy policies before providing your personal information to any third party.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>Third-Party Ad Servers</strong></p>\n\n<p style=\"text-align: justify;\">Some of our advertisers use third-party companies to serve advertisements when you visit our website. These companies may use information (not including your name, address, email address or telephone number) about your visits to our website and other websites, including information gathered by cookies, to provide advertisements about goods and services of interest to you. We do not control the activities of these companies and they may not follow the same privacy policies as ours. We recommend that you check their privacy policies before providing your personal information to any third party.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>Website Tracking</strong></p>\n\n<p style=\"text-align: justify;\">We may collect non-personal information about the computer, mobile, tablet, telephone, smartphone or other device that you use to access our website or services. Where you allow our website or services to deliver content based on your location (by enabling this feature on your device) and we may collect location data. This information is used only for the automated delivery of relevant content and advertising to you and for no other purpose.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>Cookies &amp; Preferences</strong></p>\n\n<p style=\"text-align: justify;\">We may use a cookie file containing information that can identify the computer you are working from. The cookie file is anonymous as it only gives us details of your IP address, PC information (Windows, Linux or OS X), Browser (e.g. Internet Explorer, Google Chrome, or others and the version of the browser) and domain (whether you are accessing our website from New Zealand or overseas).</p>\n\n<p style=\"text-align: justify;\">We may use the information generated by &quot;cookies&quot;:</p>\n\n<ul style=\"list-style-type:circle\">\n	<li style=\"text-align: justify;\">To track traffic patterns to and from our website such as the pages you visit, the time you spend on each page, the date and time of your visit, and referring pages (pages you came from or go to);</li>\n	<li style=\"text-align: justify;\">To ensure advertising is being shown to the most appropriate person and limit the frequency of display for certain ad formats; and</li>\n	<li style=\"text-align: justify;\">To enable you to use of website and services as a member without having to log on each time and to visit member-restricted areas of the website.</li>\n</ul>\n\n<p style=\"text-align: justify;\">We may allow third-party companies (and some of our advertisers use third-party companies) to serve ads and/or collect certain information when you and other Internet users visit our website. These companies may use non-personally identifiable information (e.g., click stream information, browser type, time and date, subject of advertisements clicked or scrolled over) and precise geo location and user device identification during your visits to our website and other websites to provide advertisements about goods and services likely to be of greater interest to you. These companies typically use a cookie or other technology to collect this information. To learn more about this interest-based advertising practice or to opt out of this type of advertising, you can visit&nbsp;www.networkadvertising.org. Third-party companies may also use your non-personal information collected in this way in aggregated form or for statistical purposes.</p>\n\n<p style=\"text-align: justify;\">You can choose to refuse cookies by turning them off in your browser and/or deleting them from your hard drive. You do not need to have cookies turned on to use our website, but you may need them for customizable sites we may develop in the future. If your cookies are turned off we will not have any control over the frequency of display of certain ad formats. This could affect your reading experience. Visit&nbsp;<u>www.aboutcookies.org</u> and www.allaboutcookies.org&nbsp;for more information on how to manage, control and delete cookies on your web browser.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>GIFs</strong></p>\n\n<p style=\"text-align: justify;\">Clear GIFs are tiny graphics with a unique identifier, similar in function to cookies. Clear gifs may ping or alert an advertiser&#39;s server about the online movements of web users. For instance, advertisers may place a clear gif allowing them to recognize an existing cookie on your browser if from the same service. The main difference between cookies and clear gifs is that clear gifs are invisible on the page and are much smaller. We do not have access to any information collected by these clear gifs nor additional information they may be tied to by the advertiser.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>Social Media</strong></p>\n\n<p style=\"text-align: justify;\">This website includes social media features such as Facebook, Instagram, YouTube and other widgets, share buttons or interactive mini-programs that run on our website. These features may collect your IP address, which pages you visit on our site, and how long for. Social media features and widgets are either hosted by a third party or hosted directly on our website. Your interactions with these features are governed by the privacy policy of the third party providing it and we accept no responsibility for the actions of those third parties.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>Analytics</strong></p>\n\n<p style=\"text-align: justify;\">We use third-party analytics providers such as Google Analytics and other service providers to measure and optimize our online business and communications. We may collect analytics information such as information about your device, applications, operating system, IP address, geo-demographic information and your visits to our website to analyze the performance and effectiveness of our website, services, advertising and marketing,</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>Storage &amp; Access</strong></p>\n\n<p style=\"text-align: justify;\">Rental Listings will take all reasonable steps to protect the personal information it holds about you from misuse, loss, or unauthorized access. We will keep your personal information for as long as is reasonably required for the purposes we collected it and as set out in this policy; unless we are required to hold it for longer by law. You have the right to seek access to and update the personal information that we hold about you. You can seek access to and update your personal information by contacting us at support@rentallistings.co.nz. You acknowledge that the security of online transactions you conduct using this website cannot be guaranteed. We do not accept any responsibility for the misuse of, loss of, or unauthorized access to, your personal information where the security of that information is not within our control.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>Newsletters</strong></p>\n\n<p style=\"text-align: justify;\">By accessing our website you agree to receive promotional newsletters from us. If you wish to stop receiving emails or other communications from us that may be sent to you in the future, please notify us by contacting us at support@rentallistings.co.nz&nbsp;or by clicking the unsubscribe link at the bottom of our email newsletter that you have received.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>For information about the New Zealand Privacy Act please log on&nbsp;to www.privacy.org.nz</strong></p>\n\n<p>&nbsp;</p>', '2024-01-19 00:36:49', '2024-01-24 11:49:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `promotional`
--

CREATE TABLE `promotional` (
  `sno` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `duration` int(2) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `promotional`
--

INSERT INTO `promotional` (`sno`, `start_date`, `end_date`, `duration`, `created_date`, `modified_date`, `status`) VALUES
(1, '2023-01-01', '2024-12-31', 12, '2024-03-27 11:31:36', '2024-04-12 19:29:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `sno` int(11) NOT NULL,
  `role` varchar(30) NOT NULL,
  `agent` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `region` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `suburb` int(11) NOT NULL,
  `zip` varchar(20) DEFAULT NULL,
  `bond` double NOT NULL,
  `price` double NOT NULL,
  `other` text DEFAULT NULL,
  `negotiation` tinyint(1) NOT NULL DEFAULT 0,
  `duration` enum('Annum','Week','Month') DEFAULT NULL,
  `description` longtext NOT NULL,
  `built_year` year(4) NOT NULL,
  `sqft` int(11) NOT NULL,
  `floor_area` int(11) NOT NULL,
  `tenants` int(11) NOT NULL,
  `type` enum('residential','commercial') NOT NULL DEFAULT 'residential',
  `p_type` varchar(50) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `parkings` int(11) NOT NULL,
  `carport` int(11) NOT NULL,
  `offshoreparking` int(11) DEFAULT 0,
  `balconies` int(11) NOT NULL,
  `toilets` int(11) NOT NULL,
  `features` text DEFAULT NULL,
  `aminities` varchar(255) DEFAULT NULL,
  `available_from` date NOT NULL,
  `apply_link` varchar(511) DEFAULT NULL,
  `assignto` text DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `premium` tinyint(1) NOT NULL DEFAULT 0,
  `boost` tinyint(1) NOT NULL DEFAULT 0,
  `accesskey` varchar(50) NOT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `pointer` varchar(255) NOT NULL,
  `txnid` varchar(20) DEFAULT NULL,
  `txnstatus` varchar(20) DEFAULT NULL,
  `txnamount` float(23,2) DEFAULT NULL,
  `txndate` date NOT NULL,
  `response` text DEFAULT NULL,
  `property_status` enum('Pending','Available','Rented','Withdrawn') NOT NULL DEFAULT 'Pending',
  `created_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`sno`, `role`, `agent`, `title`, `address`, `region`, `district`, `suburb`, `zip`, `bond`, `price`, `other`, `negotiation`, `duration`, `description`, `built_year`, `sqft`, `floor_area`, `tenants`, `type`, `p_type`, `bedrooms`, `bathrooms`, `parkings`, `carport`, `offshoreparking`, `balconies`, `toilets`, `features`, `aminities`, `available_from`, `apply_link`, `assignto`, `featured`, `premium`, `boost`, `accesskey`, `latitude`, `longitude`, `pointer`, `txnid`, `txnstatus`, `txnamount`, `txndate`, `response`, `property_status`, `created_date`, `modified_date`, `status`) VALUES
(1, 'landlord', '1', 'Villa on Hollywood Boulevard', '398 Pete Pascale Pl, New York', 5, 5, 1, NULL, 500, 450, '{\"gst\":false,\"outgoings\":false}', 0, 'Week', '<p>Massa tempor nec feugiat nisl pretium. Egestas fringilla phasellus faucibus scelerisque eleifend donec. Porta nibh venenatis cras sed felis eget velit aliquet. Neque volutpat ac tincidunt vitae semper quis lectus. Turpis in eu mi bibendum neque egestas congue quisque. Sed elementum tempus egestas sed sed risus pretium quam. Dignissim sodales ut eu sem. Nibh mauris cursus mattis molestie a iaculis at erat pellentesque. Id interdum velit laoreet id donec ultrices tincidunt.</p>', '2020', 979, 0, 0, 'residential', 'apartment', 3, 2, 1, 0, 0, 2, 0, '{\"pet\":false,\"smokers\":false,\"furnished\":false,\"compliant\":false}', '1', '2022-09-01', NULL, NULL, 0, 0, 0, '9723741660919482946', '-42.05922895152362', '173.26987792968754', '-42.05922895152362,173.26987792968754', NULL, NULL, 0.00, '0000-00-00', NULL, 'Available', '2023-10-10 18:55:10', NULL, 1),
(2, 'landlord', '2', 'Affordable Urban House', '1421 San Pedro St, Los Angeles', 5, 5, 1, NULL, 1300, 1250, NULL, 0, NULL, 'Massa tempor nec feugiat nisl pretium. Egestas fringilla phasellus faucibus scelerisque eleifend donec. Porta nibh venenatis cras sed felis eget velit aliquet. Neque volutpat ac tincidunt vitae semper quis lectus. Turpis in eu mi bibendum neque egestas congue quisque. Sed elementum tempus egestas sed sed risus pretium quam. Dignissim sodales ut eu sem. Nibh mauris cursus mattis molestie a iaculis at erat pellentesque. Id interdum velit laoreet id donec ultrices tincidunt.', '2020', 2300, 0, 0, 'residential', 'house', 3, 3, 1, 0, 1, 0, 0, NULL, '3,5,6,4,11,2,7,1,14,15', '2022-08-18', '', NULL, 1, 0, 0, '5283441660919516840', '-42.1', '172.77', '', 'ID6424547c64b84', 'Success', 120.00, '2023-03-29', '{\"Success\":\"1\",\"AuthCode\":\"040901\",\"CardName\":\"Visa\",\"CardHolderName\":\"SDRQESF\",\"CardNumber\":\"411111........11\",\"DateExpiry\":\"0430\",\"ClientInfo\":\"103.161.31.20\",\"DpsTxnRef\":\"00000003011eef68\",\"DpsBillingId\":\"\",\"AmountSettlement\":\"120.00\",\"CurrencySettlement\":\"NZD\",\"TxnMac\":\"2BC20210\",\"ResponseText\":\"APPROVED\",\"TxnType\":\"Purchase\",\"CurrencyInput\":\"NZD\",\"TxnData1\":\"5283441660919516840\",\"TxnData2\":\"\",\"TxnData3\":\"\",\"MerchantReference\":\"\",\"EmailAddress\":\"rudra.pranay@gmail.com\",\"BillingId\":\"\",\"TxnId\":\"ID6424547c64b84\"}', 'Available', '2022-08-18 00:00:00', '2023-03-30 17:27:30', 1),
(3, 'landlord', '2', 'Villa on Hollywood Boulevard', '398 Pete Pascale Pl, New York', 5, 5, 1, NULL, 500, 450, NULL, 0, NULL, '<p>Massa tempor nec feugiat nisl pretium. Egestas fringilla phasellus faucibus scelerisque eleifend donec. Porta nibh venenatis cras sed felis eget velit aliquet. Neque volutpat ac tincidunt vitae semper quis lectus. Turpis in eu mi bibendum neque egestas congue quisque. Sed elementum tempus egestas sed sed risus pretium quam. Dignissim sodales ut eu sem. Nibh mauris cursus mattis molestie a iaculis at erat pellentesque. Id interdum velit laoreet id donec ultrices tincidunt.</p>', '2020', 979, 0, 0, 'residential', 'apartment', 3, 2, 1, 0, 0, 0, 0, NULL, '1', '2022-09-01', '', NULL, 1, 1, 1, '2725191660919524736', '-42.1', '172.77', '', 'ID642449849858f', 'Success', 120.00, '2023-03-29', '{\"Success\":\"1\",\"AuthCode\":\"032214\",\"CardName\":\"Visa\",\"CardHolderName\":\"QWERTY\",\"CardNumber\":\"411111........11\",\"DateExpiry\":\"0325\",\"ClientInfo\":\"103.161.31.20\",\"DpsTxnRef\":\"00000003011eedbd\",\"DpsBillingId\":\"\",\"AmountSettlement\":\"120.00\",\"CurrencySettlement\":\"NZD\",\"TxnMac\":\"2BC20210\",\"ResponseText\":\"APPROVED\",\"TxnType\":\"Purchase\",\"CurrencyInput\":\"NZD\",\"TxnData1\":\"2725191660919524736\",\"TxnData2\":\"\",\"TxnData3\":\"\",\"MerchantReference\":\"\",\"EmailAddress\":\"rudra.pranay@gmail.com\",\"BillingId\":\"\",\"TxnId\":\"ID642449849858f\"}', 'Available', '2022-08-19 00:00:00', '2023-03-30 17:06:00', 1),
(4, 'agents', '2', 'Urban House', '40f Titirangi Road, New Lynn, Auckland 0600, New Zealand', 5, 5, 6, NULL, 5000, 5000, '{\"gst\":\"plusgst\",\"outgoings\":\"plusout\"}', 0, 'Annum', 'Massa tempor nec feugiat nisl pretium. Egestas fringilla phasellus faucibus scelerisque eleifend donec. Porta nibh venenatis cras sed felis eget velit aliquet. Neque volutpat ac tincidunt vitae semper quis lectus. Turpis in eu mi bibendum neque egestas congue quisque. Sed elementum tempus egestas sed sed risus pretium quam. Dignissim sodales ut eu sem. Nibh mauris cursus mattis molestie a iaculis at erat pellentesque. Id interdum velit laoreet id donec ultrices tincidunt.', '2022', 960, 860, 2, 'commercial', 'showroom', 2, 2, 1, 0, 1, 0, 2, '{\"pet\":\"yes\",\"smokers\":\"no\",\"furnished\":\"yes\",\"compliant\":\"in-progress\"}', '33,34,35,36,37', '2022-11-01', 'https://ps4works.in/clients/nzrealty/properties/single/3143161662475619194', '7', 1, 1, 1, '3143161662475619194', '-36.9130899', '174.673839', '-42.1, 172.77', 'ID63e104387ec27', 'Success', 115.00, '2023-10-06', '{\"Success\":\"1\",\"AuthCode\":\"024455\",\"CardName\":\"Visa\",\"CardHolderName\":\"PRANAY RUDRA\",\"CardNumber\":\"411111........11\",\"DateExpiry\":\"0226\",\"ClientInfo\":\"103.161.31.20\",\"DpsTxnRef\":\"00000004002e2372\",\"DpsBillingId\":\"\",\"AmountSettlement\":\"115.00\",\"CurrencySettlement\":\"NZD\",\"TxnMac\":\"2BC20210\",\"ResponseText\":\"APPROVED\",\"TxnType\":\"Purchase\",\"CurrencyInput\":\"NZD\",\"TxnData1\":\"3143161662475619194\",\"TxnData2\":\"\",\"TxnData3\":\"\",\"MerchantReference\":\"\",\"EmailAddress\":\"rudra.pranay@gmail.com\",\"BillingId\":\"\",\"TxnId\":\"ID63e104387ec27\"}', 'Available', '2022-09-06 20:16:59', '2023-03-29 17:23:12', 1),
(5, 'landlord', '1', 'Villa on Hollywood Boulevard', '398 Pete Pascale Pl, New York', 5, 5, 1, NULL, 500, 450, '{\"gst\":false,\"outgoings\":false}', 0, 'Week', '<p>Massa tempor nec feugiat nisl pretium. Egestas fringilla phasellus faucibus scelerisque eleifend donec. Porta nibh venenatis cras sed felis eget velit aliquet. Neque volutpat ac tincidunt vitae semper quis lectus. Turpis in eu mi bibendum neque egestas congue quisque. Sed elementum tempus egestas sed sed risus pretium quam. Dignissim sodales ut eu sem. Nibh mauris cursus mattis molestie a iaculis at erat pellentesque. Id interdum velit laoreet id donec ultrices tincidunt.</p>', '2020', 979, 0, 0, 'residential', 'apartment', 3, 2, 1, 0, 0, 2, 0, '{\"pet\":false,\"smokers\":false,\"furnished\":false,\"compliant\":false}', '1,2,3', '2022-09-01', NULL, NULL, 0, 0, 0, '97237416609194829461', '-42.1', ' 172.77', '-42.1, 172.77', NULL, NULL, 0.00, '0000-00-00', NULL, 'Available', '2023-10-25 13:18:38', '2023-10-25 13:18:42', 1),
(6, 'landlord', '2', 'Affordable Urban House', '1421 San Pedro St, Los Angeles', 5, 5, 1, NULL, 1300, 1250, NULL, 0, 'Week', 'Massa tempor nec feugiat nisl pretium. Egestas fringilla phasellus faucibus scelerisque eleifend donec. Porta nibh venenatis cras sed felis eget velit aliquet. Neque volutpat ac tincidunt vitae semper quis lectus. Turpis in eu mi bibendum neque egestas congue quisque. Sed elementum tempus egestas sed sed risus pretium quam. Dignissim sodales ut eu sem. Nibh mauris cursus mattis molestie a iaculis at erat pellentesque. Id interdum velit laoreet id donec ultrices tincidunt.', '2020', 2300, 0, 0, 'residential', 'house', 3, 3, 1, 0, 1, 0, 0, NULL, '3,5,6,4,11,2,7,1,14,15', '2022-08-18', '', NULL, 0, 1, 0, '52834416609195168402', '-42.1', '172.77', '-42.1,172.77', NULL, NULL, NULL, '0000-00-00', NULL, 'Available', '2022-08-18 00:00:00', '2023-11-23 12:31:25', 1),
(7, 'landlord', '2', 'Villa on Hollywood Boulevard', '1421 San Pedro St, Los Angeles', 5, 5, 7, NULL, 450, 400, NULL, 0, NULL, 'Massa tempor nec feugiat nisl pretium. Egestas fringilla phasellus faucibus scelerisque eleifend donec. Porta nibh venenatis cras sed felis eget velit aliquet. Neque volutpat ac tincidunt vitae semper quis lectus. Turpis in eu mi bibendum neque egestas congue quisque. Sed elementum tempus egestas sed sed risus pretium quam. Dignissim sodales ut eu sem. Nibh mauris cursus mattis molestie a iaculis at erat pellentesque. Id interdum velit laoreet id donec ultrices tincidunt.', '2022', 4300, 0, 0, 'residential', 'villa', 4, 4, 4, 0, 4, 0, 0, '{\"pet\":\"negotiable\",\"compliant\":\"in-progress\"}', '13,3,12,5,6,4,11,2,7,1,15', '2022-08-19', '', NULL, 1, 1, 1, '27251916609195247363', '-42.1', '172.77', '', 'ID642587513017e', 'Success', 320.00, '2023-03-30', '{\"Success\":\"1\",\"AuthCode\":\"015808\",\"CardName\":\"Visa\",\"CardHolderName\":\"4EWQEW\",\"CardNumber\":\"411111........11\",\"DateExpiry\":\"0428\",\"ClientInfo\":\"103.161.31.20\",\"DpsTxnRef\":\"0000000400427947\",\"DpsBillingId\":\"\",\"AmountSettlement\":\"115.00\",\"CurrencySettlement\":\"NZD\",\"TxnMac\":\"2BC20210\",\"ResponseText\":\"APPROVED\",\"TxnType\":\"Purchase\",\"CurrencyInput\":\"NZD\",\"TxnData1\":\"27251916609195247363\",\"TxnData2\":\"boost\",\"TxnData3\":\"205.00\",\"MerchantReference\":\"\",\"EmailAddress\":\"rudra.pranay@gmail.com\",\"BillingId\":\"\",\"TxnId\":\"ID642587513017e\"}', 'Available', '2022-08-19 00:00:00', '2023-03-30 18:28:13', 1),
(8, 'agents', '2', 'Urban House', '31A Saint Georges Road, Avondale, Auckland 0600, New Zealand', 5, 5, 1, NULL, 5000, 7000, NULL, 1, 'Week', 'Massa tempor nec feugiat nisl pretium. Egestas fringilla phasellus faucibus scelerisque eleifend donec. Porta nibh venenatis cras sed felis eget velit aliquet. Neque volutpat ac tincidunt vitae semper quis lectus. Turpis in eu mi bibendum neque egestas congue quisque. Sed elementum tempus egestas sed sed risus pretium quam. Dignissim sodales ut eu sem. Nibh mauris cursus mattis molestie a iaculis at erat pellentesque. Id interdum velit laoreet id donec ultrices tincidunt.', '2022', 1160, 1060, 2, 'residential', 'apartment', 2, 2, 1, 0, 1, 0, 2, '{\"pet\":\"no\",\"smokers\":\"yes\",\"furnished\":\"yes\",\"compliant\":\"yes\"}', NULL, '2022-11-01', 'https://ps4works.in/clients/nzrealty/properties/single/3143161662475619194', '7', 1, 1, 1, '31431616624756191944', '-36.90117676711678', '174.69593888954924', '-36.90117676711678,174.69593888954924', 'ID63fdb312362f3', 'Success', 115.00, '2023-10-06', '{\"Success\":\"1\",\"AuthCode\":\"205628\",\"CardName\":\"Visa\",\"CardHolderName\":\"1111\",\"CardNumber\":\"411111........11\",\"DateExpiry\":\"0629\",\"ClientInfo\":\"103.161.31.20\",\"DpsTxnRef\":\"00000003010e4696\",\"DpsBillingId\":\"\",\"AmountSettlement\":\"115.00\",\"CurrencySettlement\":\"NZD\",\"TxnMac\":\"2BC20210\",\"ResponseText\":\"APPROVED\",\"TxnType\":\"Purchase\",\"CurrencyInput\":\"NZD\",\"TxnData1\":\"31431616624756191944\",\"TxnData2\":\"\",\"TxnData3\":\"\",\"MerchantReference\":\"\",\"EmailAddress\":\"rudra.pranay@gmail.com\",\"BillingId\":\"\",\"TxnId\":\"ID63fdb312362f3\"}', 'Available', '2022-09-06 20:16:59', '2024-02-20 09:41:32', 1),
(26, 'agents', '32', 'Test Without Ticking Optional and All 0\'s under Property Info', '## Ash Street, Avondale, Auckland 1026, New Zealand', 5, 5, 10, NULL, 40, 10, NULL, 0, 'Week', 'Test Without Ticking Optional and All 0\'s under Property Info\r\nTest Without Ticking Optional and All 0\'s under Property Info\r\nTest Without Ticking Optional and All 0\'s under Property Info', '2023', 0, 0, 4, 'residential', 'apartment', 0, 0, 5, 7, 11, 0, 0, NULL, '82,90,83,104,81,86', '2024-02-20', '', NULL, 1, 1, 0, '382643', '-36.8955339', '174.6887054', '-36.8955339,174.6887054', NULL, NULL, NULL, '0000-00-00', NULL, 'Available', '2024-02-20 12:33:30', '2024-02-20 12:47:57', 1),
(9, 'agents', '2', 'Modren House, Victor Street, Avondale, Auckland City', '41C Victor Street, Avondale, Auckland 1026, New Zealand', 5, 5, 10, NULL, 3120, 780, NULL, 0, 'Annum', 'Rent this spacious and modern four bedroom, two-story home with two full bathrooms and an ensuite. Enjoy the convenience of a single garage and a Health Homes compliant living space. Located in a prime location near Rosebank School, Avondale Intermediate, Avondale College, parks, public transportation, and easy access to the motorway. Don\'t miss out on this fantastic opportunity - book a viewing today!', '2010', 160, 0, 5, 'residential', 'apartment', 3, 3, 1, 0, 1, 0, 0, '{\"pet\":\"yes\",\"smokers\":\"no\",\"furnished\":\"yes\",\"compliant\":\"yes\"}', '27,3,20,30,25,19,17,14', '2023-03-01', 'https://ps4works.in/clients/nzrealty/properties/single/491910', NULL, 1, 1, 1, '491910', '-36.891265787400805', '174.69187149807817', '-36.891265787400805,174.69187149807817', 'ID642588de4976c', 'Success', 115.00, '2023-03-30', '{\"Success\":\"1\",\"AuthCode\":\"020445\",\"CardName\":\"Visa\",\"CardHolderName\":\"SAFSDAF\",\"CardNumber\":\"411111........11\",\"DateExpiry\":\"0529\",\"ClientInfo\":\"103.161.31.20\",\"DpsTxnRef\":\"000000040042798d\",\"DpsBillingId\":\"\",\"AmountSettlement\":\"115.00\",\"CurrencySettlement\":\"NZD\",\"TxnMac\":\"2BC20210\",\"ResponseText\":\"APPROVED\",\"TxnType\":\"Purchase\",\"CurrencyInput\":\"NZD\",\"TxnData1\":\"491910\",\"TxnData2\":\"boost\",\"TxnData3\":\"\",\"MerchantReference\":\"\",\"EmailAddress\":\"rudra.pranay@gmail.com\",\"BillingId\":\"\",\"TxnId\":\"ID642588de4976c\"}', 'Rented', '2023-02-07 15:15:20', '2023-06-23 12:28:28', 1),
(10, 'agents', '21', 'Beach Front  House', '68C Terry Street, Blockhouse Bay, Auckland 0600, New Zealand', 5, 5, 12, NULL, 3200, 800, NULL, 0, 'Annum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '2020', 0, 0, 0, 'residential', 'house', 4, 2, 1, 0, 0, 0, 0, '{\"pet\":\"negotiable\",\"smokers\":\"no\",\"furnished\":\"no\",\"compliant\":\"in-progress\"}', '13,20,25,22,6', '2023-07-26', 'https://www.rentallistings.co.nz/', NULL, 1, 1, 0, '270396', '-36.9166817', '174.7069164', '-36.9166817,174.7069164', NULL, NULL, NULL, '0000-00-00', NULL, 'Available', '2023-07-10 15:50:43', NULL, 1),
(11, 'agents', '21', 'Beach Front House', 'Terry Street, Blockhouse Bay, Auckland 0600, New Zealand', 5, 5, 12, NULL, 4200, 1050, NULL, 0, 'Annum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '2023', 0, 0, 7, 'residential', 'house', 5, 3, 1, 0, 2, 0, 0, '{\"pet\":\"negotiable\",\"smokers\":\"no\",\"furnished\":\"no\",\"compliant\":\"in-progress\"}', '21,22,6,11,2,24', '2023-07-24', 'https://www.rentallistings.co.nz/', NULL, 0, 1, 0, '469921', '-36.9166817', '174.7069164', '-36.9166817,174.7069164', 'ID64abdc9ef27be', 'Success', 35.00, '2023-07-10', '{\"Success\":\"1\",\"AuthCode\":\"223056\",\"CardName\":\"Visa\",\"CardHolderName\":\"K LEE\",\"CardNumber\":\"424242........42\",\"DateExpiry\":\"1024\",\"ClientInfo\":\"198.41.238.126\",\"DpsTxnRef\":\"000000040057821f\",\"DpsBillingId\":\"\",\"AmountSettlement\":\"35.00\",\"CurrencySettlement\":\"NZD\",\"TxnMac\":\"0A52511F\",\"ResponseText\":\"APPROVED\",\"TxnType\":\"Purchase\",\"CurrencyInput\":\"NZD\",\"TxnData1\":\"469921\",\"TxnData2\":\"premium\",\"TxnData3\":\"\",\"MerchantReference\":\"\",\"EmailAddress\":\"somikasiddagoni@gmail.com\",\"BillingId\":\"\",\"TxnId\":\"ID64abdc9ef27be\"}', 'Available', '2023-07-10 15:55:34', '2023-07-10 16:14:19', 1),
(12, 'agents', '21', 'ABC', '3034 Great North Road, New Lynn, Auckland 0600, New Zealand', 5, 5, 12, NULL, 2000, 500, '{\"gst\":\"plusgst\",\"outgoings\":\"plusout\"}', 0, 'Week', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '2000', 0, 121, 0, 'residential', 'apartment', 2, 2, 1, 0, 0, 0, 2, '{\"pet\":\"no\",\"smokers\":\"no\",\"furnished\":\"no\",\"compliant\":\"yes\"}', '13,21,35,36,37', '2023-08-01', 'www.rentallistings.co.nz', '28', 1, 1, 0, '598302', '-36.90606520000001', '174.6880603', '-36.90606520000001,174.6880603', NULL, NULL, 0.00, '0000-00-00', NULL, 'Available', '2023-07-18 14:09:37', '2023-10-22 12:47:52', 1),
(14, 'agents', '30', 'DEMO RESIDENTIAL', '120 Mount Albert Road, Mount Albert, Auckland 1025, New Zealand', 5, 5, 9, NULL, 2000, 500, NULL, 0, 'Week', 'Massa tempor nec feugiat nisl pretium. Egestas fringilla phasellus faucibus scelerisque eleifend donec. Porta nibh venenatis cras sed felis eget velit aliquet. Neque volutpat ac tincidunt vitae semper quis lectus. Turpis in eu mi bibendum neque egestas congue quisque. Sed elementum tempus egestas sed sed risus pretium quam. Dignissim sodales ut eu sem. Nibh mauris cursus mattis molestie a iaculis at erat pellentesque. Id interdum velit laoreet id donec ultrices tincidunt.', '2000', 0, 0, 0, 'residential', 'studio', 5, 2, 3, 0, 0, 0, 0, '{\"pet\":\"negotiable\",\"smokers\":\"no\",\"furnished\":\"yes\",\"compliant\":\"in-progress\"}', '21,13,27,26,3,20,30,25,23,12', '2023-11-27', 'www.rentallistings.co.nz/', '23', 1, 1, 0, '488404', '-36.8914777', '174.7248705', '-36.8914777,174.7248705', NULL, NULL, 0.00, '0000-00-00', NULL, 'Available', '2023-10-24 14:38:50', '2023-12-12 12:11:23', 1),
(15, 'agents', '2', 'Demo Commercial', '17 Wakefield Street, Auckland CBD, Auckland 1010, New Zealand', 5, 5, 8, NULL, 0, 240, '{\"gst\":\"ingst\",\"outgoings\":\"inout\"}', 0, 'Month', 'Massa tempor nec feugiat nisl pretium. Egestas fringilla phasellus faucibus scelerisque eleifend donec. Porta nibh venenatis cras sed felis eget velit aliquet. Neque volutpat ac tincidunt vitae semper quis lectus. Turpis in eu mi bibendum neque egestas congue quisque. Sed elementum tempus egestas sed sed risus pretium quam. Dignissim sodales ut eu sem. Nibh mauris cursus mattis molestie a iaculis at erat pellentesque. Id interdum velit laoreet id donec ultrices tincidunt.', '2000', 820, 720, 0, 'commercial', 'landsection', 0, 2, 2, 0, 0, 0, 2, NULL, '36,34,33,37,35', '2023-10-24', 'ps4works.in/', NULL, 1, 1, 0, '696499', '-36.8532589', '174.7641784', '-36.8532589,174.7641784', NULL, NULL, 0.00, '0000-00-00', NULL, 'Available', '2023-10-24 19:28:11', '2024-01-24 13:00:11', 1),
(16, 'agents', '2', 'Demo Retail', '100 Donovan Street, Blockhouse Bay, Auckland 0600, New Zealand', 5, 5, 12, NULL, 0, 2000, '{\"gst\":\"plusgst\",\"outgoings\":\"plusout\"}', 0, 'Annum', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '0000', 200, 120, 0, 'commercial', 'retail', 0, 0, 2, 0, 0, 0, 1, NULL, '34', '2023-10-30', 'https://www.rentallistings.co.nz/', '7', 1, 1, 0, '849196', '-36.92163499999999', '174.7096164', '-36.92163499999999,174.7096164', NULL, NULL, NULL, '0000-00-00', NULL, 'Available', '2023-10-25 14:00:17', '2024-02-20 09:41:57', 1),
(17, 'agents', '2', 'TEST for Inclusive GST and Outgoings', '69 Epsom Avenue, Epsom, Auckland 1023, New Zealand', 5, 5, 17, NULL, 0, 55000, '{\"gst\":\"ingst\",\"outgoings\":\"inout\"}', 0, 'Annum', 'TEST for Inclusive GST and OutgoingsTEST for Inclusive GST and OutgoingsTEST for Inclusive GST and OutgoingsTEST for Inclusive GST and Outgoings', '2023', 150, 120, 0, 'commercial', 'office', 0, 0, 0, 0, 0, 0, 0, NULL, '53,52,35,42,48,44,55,56,50,47,51,46,43,36,49,37,33,54,57', '2023-10-31', '', NULL, 1, 1, 0, '811479', '-36.8819384', '174.7674037', '-36.8819384,174.7674037', NULL, NULL, NULL, '0000-00-00', NULL, 'Available', '2023-10-25 14:14:46', '2024-03-17 10:11:02', 1),
(18, 'agents', '30', 'Commercial DEMO', '60 Balmoral Road, Mount Eden, Auckland 1024, New Zealand', 5, 5, 11, NULL, 0, 50000, '{\"gst\":\"plusgst\",\"outgoings\":\"inout\"}', 0, 'Annum', 'Commercial DEMO Commercial DEMO Inc GST Inc outgoings', '0000', 500, 145, 0, 'commercial', 'office', 0, 0, 10, 0, 0, 0, 2, NULL, '36,33,37', '2024-01-15', '', NULL, 1, 1, 0, '894346', '-36.88965770000001', '174.7590794', '-36.88965770000001,174.7590794', NULL, NULL, NULL, '0000-00-00', NULL, 'Available', '2023-11-01 13:56:52', '2023-11-23 13:55:07', 1),
(19, 'agents', '5', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '40F Miro Street, Mount Maunganui 3116, New Zealand', 5, 5, 9, NULL, 1600, 400, NULL, 0, 'Week', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaa aaaaaaaaaaaa aaaaaaaaaaaaaaa aaaaaaaaaaaa aaaaaaaaaaaaa aaaaaaaaaaaaa', '2024', 0, 0, 0, 'residential', 'house', 2, 2, 2, 2, 2, 0, 0, '{\"pet\":\"negotiable\",\"smokers\":\"no\",\"furnished\":\"yes\",\"compliant\":\"in-progress\"}', NULL, '2024-01-15', '', NULL, 1, 1, 0, '395898', '-37.6488628', '176.1892564', '-37.6488628,176.1892564', NULL, NULL, NULL, '0000-00-00', NULL, 'Available', '2023-11-02 14:25:45', '2024-02-11 01:19:11', 1),
(20, 'agents', '32', 'beautifully appointed 4-bedroom, 3-bathroom home', '### Paihia Road, One Tree Hill, Auckland 1061, New Zealand', 5, 5, 7, NULL, 3600, 900, NULL, 0, 'Week', 'Discover the epitome of modern living in this beautifully appointed 4-bedroom, 3-bathroom home located in the heart of Hobsonville. With a thoughtful layout and an array of luxurious amenities, this property is ideal for those seeking both comfort and convenience.\r\n\r\n?????????? Key Features:\r\n\r\n4 spacious bedrooms, perfect for families or professionals seeking ample space\r\n3 elegant bathrooms, including ensuites for two master bedrooms and a shared bathroom for the other two bedrooms\r\nAdditional separate toilet downstairs, strategically located by the lounge area for utmost convenience\r\nA single garage for secure parking and storage\r\nA contemporary kitchen with an open dining area, ideal for hosting gatherings and creating lasting memories\r\nA separate lounge area, offering a private retreat for relaxation and entertainment\r\nBonus office room for those who work from home or desire a dedicated workspace\r\nAmple storage spaces throughout, ensuring a clutter-free living experience\r\nSolar power system, promoting eco-friendliness and substantial savings on electricity bills\r\n\r\n?? Location Highlights:\r\n\r\nJust minutes away on foot from the esteemed Scott Point School, ensuring a stress-free commute for families with children\r\nOnly a few minutes\' drive to the bustling town center and easily accessible motorways, making daily commuting a breeze\r\nDon\'t miss out on the opportunity to make this exquisite house your new home. Contact us now to schedule a viewing and secure your slice of Hobsonville living at its finest!', '2023', 0, 0, 0, 'residential', 'villa', 4, 3, 1, 0, 2, 0, 0, '{\"pet\":\"no\",\"smokers\":\"no\",\"furnished\":\"no\",\"compliant\":\"yes\"}', '21,13,26,25,23,12,2,16', '2023-11-27', '', NULL, 1, 1, 0, '890737', '-36.9070137', '174.7980768', '-36.9070137,174.7980768', NULL, NULL, NULL, '0000-00-00', NULL, 'Available', '2023-11-07 15:43:33', '2023-11-20 14:09:54', 1),
(21, 'agents', '32', 'Commercial for Lease', '## Wellington Road, Wellington, New Zealand', 5, 5, 14, NULL, 0, 75000, '{\"gst\":\"ingst\",\"outgoings\":\"plusout\"}', 0, 'Annum', 'Successfully Submitted.........       Para should appear as entered(breaks)............  Photos not showing in order according to add property in the dashboard(need to sort this out)....... PHOTOS UPLOAD HAVING MAJOR ISSUES, NEED TO LOOK INTO IT DURING FINAL CORRECTIONS.....    Photos not taking position(going back).......   Garages to change to Parking in features........  Add toilets in the front features with icon.........          Just minutes away on foot from the esteemed Scott Point School, ensuring a stress-free commute for families with children\r\nOnly a few minutes\' drive to the bustling town center and easily accessible motorways, making daily commuting a breeze\r\nDon\'t miss out on the opportunity to make this exquisite house your new home. Contact us now to schedule a viewing and secure your slice of Hobsonville living at its finest!', '0000', 1050, 550, 0, 'commercial', 'industrial', 0, 2, 12, 0, 0, 0, 2, NULL, '35,33,34,36,37', '2023-12-25', '', NULL, 1, 1, 0, '249650', '-41.3119705', '174.7927063', '-41.3119705,174.7927063', NULL, NULL, NULL, '0000-00-00', NULL, 'Available', '2023-11-07 15:53:27', '2024-02-11 13:31:29', 1),
(22, 'agents', '32', 'Price by Negotiation', '## Tauranga City Council, Bay of Plenty, New Zealand', 5, 5, 18, NULL, 0, 0, NULL, 1, 'Annum', 'Price by Negotiation to be shown in the front.....   if land area is not entered, do not show in the front.......   Is address below map in single page required or not.....', '0000', 0, 1500, 0, 'commercial', 'warehouse', 0, 3, 3, 0, 0, 0, 0, NULL, '36,34,33,37,35', '2023-11-20', '', '34', 1, 1, 0, '413201', '-37.7134059', '176.1242881', '-37.7134059,176.1242881', NULL, NULL, NULL, '0000-00-00', NULL, 'Available', '2023-11-07 16:11:42', '2023-11-24 18:09:50', 1),
(23, 'agents', '32', '3X Carpark Spaces Available in Central Auckland', 'Shortland Street, Auckland CBD, Auckland 1010, New Zealand', 5, 5, 1, NULL, 0, 180, '{\"gst\":\"ingst\"}', 0, 'Month', '3X Carpark Spaces Available in Central Auckland 3X Carpark Spaces Available in Central Auckland 3X Carpark Spaces Available in Central Auckland 3X Carpark Spaces Available in Central Auckland', '0000', 45, 40, 0, 'commercial', 'parkingspace', 0, 0, 3, 0, 0, 0, 0, NULL, '55,56,36,54', '2024-02-16', '', '34,36', 1, 1, 0, '793887', '-36.8469641', '174.7683487', '-36.8469641,174.7683487', NULL, NULL, NULL, '0000-00-00', NULL, 'Available', '2024-02-12 13:43:52', '2024-02-20 12:22:43', 1),
(24, 'agents', '32', 'Showroom Available for Lease', 'Queen Street, Auckland CBD, Auckland, New Zealand', 5, 5, 1, NULL, 0, 0, NULL, 1, 'Annum', 'Showroom Available for Lease Showroom Available for Lease Showroom Available for Lease Showroom Available for Lease', '0000', 1050, 300, 0, 'commercial', 'showroom', 0, 2, 15, 0, 0, 0, 6, NULL, '50,47,51,45,35,49,44,33,57,96,53,52,34,42,46,43,36,48,37,54,55,56', '2024-02-15', '', '34,36', 1, 1, 0, '772229', '-36.8508852', '174.7645088', '-36.8508852,174.7645088', NULL, NULL, NULL, '0000-00-00', NULL, 'Available', '2024-02-12 13:51:28', '2024-02-12 14:25:43', 1),
(25, 'agents', '32', 'Brand New Townhouse', '36 Seymour Road, Sunnyvale, Auckland 0612, New Zealand', 5, 14, 1920, NULL, 3400, 850, NULL, 0, 'Week', 'Brand New Townhouse available for rent. Contact PM\r\nFeatures\r\nA..\r\nB...\r\nC.....\r\nD.......', '2023', 198, 0, 5, 'residential', 'townhouse', 4, 3, 1, 2, 3, 0, 0, '{\"pet\":\"negotiable\",\"smokers\":\"no\",\"furnished\":\"no\",\"compliant\":\"yes\"}', '92,79,82,85,61,63,80,81,67,65,60,84,74,91,58,93,94,89,76,59,90,83,71,73,78,70,69,75,88,68,66,86,77,95,87,62,72', '2024-02-15', '', '34,36', 1, 1, 0, '194550', '-36.8993841', '174.6317046', '-36.8993841,174.6317046', NULL, NULL, NULL, '0000-00-00', NULL, 'Available', '2024-02-12 14:37:38', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `property_category`
--

CREATE TABLE `property_category` (
  `sno` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `type` enum('residential','commercial') NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `property_category`
--

INSERT INTO `property_category` (`sno`, `name`, `value`, `type`, `status`) VALUES
(1, 'apartment', 'Apartment', 'residential', 1),
(2, 'house', 'House', 'residential', 1),
(3, 'villa', 'Villa', 'residential', 1),
(4, 'unit', 'Unit', 'residential', 1),
(5, 'holidayrental', 'Holiday Rental', 'residential', 1),
(6, 'lifestyleproperty', 'Lifestyle Property', 'residential', 1),
(7, 'rooms', 'Rooms', 'residential', 1),
(8, 'studio', 'Studio', 'residential', 1),
(9, 'townhouse', 'Townhouse', 'residential', 1),
(10, 'others', 'Others', 'residential', 1),
(11, 'farm', 'Farm', 'commercial', 1),
(12, 'industrial', 'Industrial', 'commercial', 1),
(13, 'landsection', 'Land/Section', 'commercial', 1),
(14, 'motelhotel', 'Motel/Hotel', 'commercial', 1),
(15, 'office', 'Office', 'commercial', 1),
(16, 'retail', 'Retail', 'commercial', 1),
(17, 'showroom', 'Showroom', 'commercial', 1),
(18, 'warehouse', 'Warehouse', 'commercial', 1),
(19, 'parkingspace', 'Parking Space', 'commercial', 1),
(20, 'others', 'Others', 'commercial', 1);

-- --------------------------------------------------------

--
-- Table structure for table `property_request`
--

CREATE TABLE `property_request` (
  `sno` int(11) NOT NULL,
  `property` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `property_request`
--

INSERT INTO `property_request` (`sno`, `property`, `user`, `name`, `email`, `phone`, `message`, `created_date`, `modified_date`, `status`) VALUES
(1, 4, 0, 'Pranay', 'rudra.pranay@gmail.com', '9030894779', 'Hello, I\'m interested in Urban House', '2022-09-08 08:44:47', NULL, 1),
(2, 4, 0, 'Rudra', 'ps4works@gmail.com', '9030894779', 'Hello, I\'m interested in Urban House', '2022-09-08 08:50:28', NULL, 1),
(3, 8, 0, 'Bhushan', 'bhushan@ps4works.in', '9603113211', 'Hello, I\'m interested in Urban House', '2022-12-01 13:16:08', NULL, 1),
(4, 4, 7, 'Srikanth User', 'srikanthsamrat7@gmail.com', '1234567891', 'Hello, I\'m interested in Urban House', '2022-12-01 15:26:02', NULL, 1),
(5, 9, 0, 'Pranay Rudra', 'rudra.pranay@gmail.com', '9030894779', 'Testing Email', '2023-05-02 17:47:48', NULL, 1),
(6, 9, 0, 'Pranay Rudra', 'rudra.pranay@gmail.com', '9030894779', 'Testing for email', '2023-05-02 17:48:38', NULL, 1),
(7, 9, 0, 'Rudra Pranay', 'rudra.pranay@gmail.com', '9030894779', 'Type your message here..', '2023-05-02 17:53:07', NULL, 1),
(8, 9, 0, 'Rudra', 'rudra.pranay@gmail.com', '9030894779', 'Type your message here..', '2023-05-02 17:58:59', NULL, 1),
(9, 9, 0, 'Rudra', 'rudra.pranay@gmail.com', '9030894779', 'Type your message here..', '2023-05-02 18:13:24', NULL, 1),
(10, 9, 0, 'Pranay', 'rudra.pranay@gmail.com', '9030894779', 'Type your message here..', '2023-05-02 18:14:00', NULL, 1),
(11, 9, 0, 'Pranay Rudra', 'rudra.pranay@gmail.com', '9030894779', 'Type your message here..', '2023-05-02 18:15:33', NULL, 1),
(12, 9, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '', 'Hello, I\'m interested in Modren House, Victor Street, Avondale, Auckland City', '2023-05-02 18:16:44', NULL, 1),
(13, 9, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '9030894779', 'Type your message here..', '2023-05-02 18:26:51', NULL, 1),
(14, 9, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '', 'Type your message here..', '2023-05-02 18:32:54', NULL, 1),
(15, 9, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '9030894779', 'Type your message here..', '2023-05-02 18:42:56', NULL, 1),
(16, 9, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '9030894779', 'Type your message here..', '2023-05-02 18:56:51', NULL, 1),
(17, 9, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '9030894779', 'Type your message here..', '2023-05-02 18:57:40', NULL, 1),
(18, 9, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '9030894779', 'Type your message here..', '2023-05-04 10:31:04', NULL, 1),
(19, 16, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '9030894779', '', '2023-11-24 12:30:38', NULL, 1),
(20, 16, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '9030894779', 'sdfa', '2023-11-24 12:35:25', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `property_schedules`
--

CREATE TABLE `property_schedules` (
  `sno` int(11) NOT NULL,
  `property` int(11) NOT NULL,
  `day` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `date` date NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `slots` int(11) NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `property_schedules`
--

INSERT INTO `property_schedules` (`sno`, `property`, `day`, `date`, `from_time`, `to_time`, `slots`, `reason`, `status`) VALUES
(1, 1, 'Monday', '2022-09-26', '10:00:00', '17:00:00', 0, NULL, 1),
(2, 2, 'Monday', '2022-09-26', '11:00:00', '19:00:00', 3, NULL, 1),
(3, 2, 'Tuesday', '2022-09-26', '11:00:00', '19:00:00', 3, NULL, 1),
(4, 2, 'Wednesday', '2022-09-26', '10:30:00', '14:30:00', 3, NULL, 1),
(5, 2, 'Thursday', '2022-09-26', '11:00:00', '19:00:00', 3, NULL, 1),
(6, 2, 'Friday', '2022-09-26', '11:00:00', '19:00:00', 3, NULL, 1),
(7, 2, 'Saturday', '2022-09-26', '11:00:00', '19:00:00', 3, NULL, 1),
(8, 2, 'Sunday', '2022-09-26', '11:00:00', '19:00:00', 3, NULL, 1),
(9, 3, 'Monday', '2022-09-26', '09:00:00', '19:00:00', 20, NULL, 1),
(10, 3, 'Tuesday', '2022-09-26', '09:00:00', '19:00:00', 2, NULL, 1),
(11, 3, 'Wednesday', '2022-09-26', '09:00:00', '19:00:00', 2, NULL, 1),
(12, 3, 'Thursday', '2022-09-26', '09:00:00', '19:00:00', 2, NULL, 1),
(13, 3, 'Friday', '2022-09-26', '09:00:00', '19:00:00', 2, NULL, 1),
(14, 3, 'Saturday', '2022-09-26', '09:00:00', '19:00:00', 2, NULL, 1),
(15, 3, 'Sunday', '2022-09-26', '11:00:00', '19:00:00', 2, NULL, 1),
(16, 4, 'Monday', '2022-09-26', '08:00:00', '20:00:00', 1, 'cdsafds', 0),
(17, 4, 'Tuesday', '2022-09-26', '08:00:00', '20:00:00', 1, 'dfasf', 0),
(18, 4, 'Wednesday', '2022-09-26', '08:00:00', '20:00:00', 1, '', 0),
(19, 4, 'Thursday', '2022-09-26', '08:00:00', '20:00:00', 1, '', 0),
(20, 4, 'Friday', '2022-09-26', '08:00:00', '20:00:00', 1, NULL, 1),
(21, 4, 'Saturday', '2022-09-26', '08:00:00', '20:00:00', 1, 'adsfdsf', 0),
(22, 4, 'Sunday', '2022-09-26', '08:00:00', '20:00:00', 1, 'check', 0),
(23, 4, 'Wednesday', '2022-09-28', '01:44:00', '13:44:00', 1, 'dfdsaf', 0),
(24, 4, 'Wednesday', '2022-09-28', '01:51:00', '13:52:00', 1, NULL, 1),
(25, 4, 'Wednesday', '2022-09-28', '01:52:00', '13:52:00', 1, NULL, 1),
(26, 4, 'Wednesday', '2022-09-28', '01:52:00', '13:52:00', 1, NULL, 1),
(27, 4, 'Wednesday', '2022-09-28', '01:52:00', '13:52:00', 1, NULL, 1),
(28, 4, 'Wednesday', '2022-09-28', '01:52:00', '13:52:00', 1, NULL, 1),
(29, 4, 'Wednesday', '2022-09-28', '01:52:00', '13:52:00', 1, '', 0),
(30, 4, 'Wednesday', '2022-09-28', '01:52:00', '13:52:00', 1, NULL, 1),
(31, 4, 'Wednesday', '2022-09-28', '01:52:00', '13:52:00', 1, NULL, 1),
(32, 4, 'Wednesday', '2022-09-28', '02:00:00', '14:00:00', 1, NULL, 1),
(33, 4, 'Wednesday', '2022-09-28', '02:00:00', '14:00:00', 1, NULL, 1),
(34, 4, 'Wednesday', '2022-09-28', '02:02:00', '14:02:00', 1, NULL, 1),
(35, 4, 'Wednesday', '2022-09-28', '02:07:00', '14:07:00', 1, NULL, 1),
(36, 4, 'Wednesday', '2022-09-28', '02:12:00', '14:12:00', 1, NULL, 1),
(37, 4, 'Wednesday', '2022-09-28', '02:12:00', '14:12:00', 1, NULL, 1),
(38, 4, 'Thursday', '2022-09-29', '02:18:00', '14:18:00', 1, 'test', 0),
(39, 4, 'Wednesday', '2022-09-28', '02:20:00', '14:20:00', 1, NULL, 1),
(40, 4, 'Wednesday', '2022-09-28', '02:24:00', '14:24:00', 1, '', 0),
(41, 4, 'Wednesday', '2022-09-28', '02:35:00', '14:35:00', 1, NULL, 1),
(42, 4, 'Thursday', '2022-09-29', '02:36:00', '14:36:00', 1, '', 0),
(43, 4, 'Wednesday', '2022-09-28', '02:37:00', '14:37:00', 1, '', 0),
(45, 2, 'Friday', '2022-09-30', '07:07:00', '19:07:00', 1, 'Test', 0),
(44, 4, 'Friday', '2022-09-30', '02:49:00', '14:49:00', 1, '', 0),
(46, 4, 'Monday', '2022-10-03', '01:46:00', '13:46:00', 1, 'Qwerty', 0),
(47, 4, 'Tuesday', '2022-10-04', '01:47:00', '13:47:00', 1, NULL, 1),
(48, 4, 'Wednesday', '2022-10-05', '01:47:00', '13:47:00', 1, NULL, 1),
(49, 4, 'Thursday', '2022-10-06', '01:47:00', '13:48:00', 1, NULL, 1),
(50, 4, 'Monday', '2022-10-10', '02:40:00', '14:40:00', 1, 'The PM is Sick and no staff available', 0),
(51, 4, 'Friday', '2022-10-14', '08:00:00', '20:56:00', 1, NULL, 1),
(52, 4, 'Saturday', '2022-10-29', '04:15:00', '16:15:00', 1, NULL, 1),
(53, 4, 'Saturday', '2022-10-29', '04:27:00', '16:27:00', 1, NULL, 1),
(54, 8, 'Monday', '2022-12-05', '11:00:00', '16:30:00', 1, 'hjk', 0),
(55, 4, 'Thursday', '2022-12-08', '11:00:00', '16:44:00', 1, NULL, 1),
(56, 4, 'Wednesday', '2022-12-07', '11:00:00', '11:30:00', 1, NULL, 1),
(57, 4, 'Friday', '2022-12-09', '16:00:00', '16:30:00', 1, NULL, 1),
(58, 4, 'Thursday', '2022-12-22', '13:30:00', '13:00:00', 1, NULL, 1),
(59, 4, 'Saturday', '2022-12-31', '14:30:00', '15:00:00', 1, NULL, 1),
(60, 4, 'Saturday', '2022-12-10', '12:30:00', '13:00:00', 1, NULL, 1),
(61, 4, 'Wednesday', '2022-12-07', '15:00:00', '15:30:00', 1, NULL, 1),
(62, 4, 'Tuesday', '2022-12-06', '13:40:00', '14:40:00', 1, NULL, 1),
(63, 4, 'Monday', '2022-12-05', '14:45:00', '15:30:00', 1, 'gj', 0),
(64, 4, 'Friday', '2022-12-09', '13:45:00', '14:45:00', 1, NULL, 1),
(73, 8, 'Thursday', '2022-12-08', '11:38:00', '15:40:00', 1, NULL, 1),
(71, 8, 'Tuesday', '2022-12-06', '13:28:00', '15:28:00', 1, NULL, 1),
(72, 8, 'Wednesday', '2022-12-07', '13:34:00', '16:34:00', 1, NULL, 1),
(74, 4, 'Monday', '2023-01-30', '11:30:00', '14:00:00', 1, NULL, 1),
(75, 8, 'Friday', '2023-01-20', '10:30:00', '16:30:00', 1, NULL, 1),
(76, 8, 'Monday', '2023-01-23', '10:00:00', '16:00:00', 1, NULL, 1),
(77, 8, 'Tuesday', '2023-01-24', '10:00:00', '16:00:00', 1, NULL, 1),
(78, 8, 'Wednesday', '2023-01-25', '10:00:00', '16:00:00', 1, NULL, 1),
(79, 8, 'Thursday', '2023-01-26', '10:00:00', '16:00:00', 1, NULL, 1),
(80, 8, 'Friday', '2023-01-27', '10:00:00', '16:00:00', 1, NULL, 1),
(81, 8, 'Saturday', '2023-01-14', '10:00:00', '16:29:00', 1, NULL, 1),
(82, 8, 'Wednesday', '2023-01-11', '10:00:00', '16:00:00', 1, NULL, 1),
(83, 8, 'Thursday', '2023-01-12', '10:00:00', '15:00:00', 1, NULL, 1),
(84, 8, 'Friday', '2023-01-13', '10:00:00', '15:00:00', 1, NULL, 1),
(85, 8, 'Sunday', '2023-01-15', '10:00:00', '16:00:00', 1, NULL, 1),
(86, 8, 'Tuesday', '2023-01-17', '10:00:00', '16:00:00', 1, NULL, 1),
(87, 8, 'Saturday', '2023-01-14', '16:56:41', '20:56:41', 1, NULL, 1),
(88, 4, 'Saturday', '2023-04-01', '10:30:00', '15:00:00', 1, NULL, 1),
(89, 9, 'Friday', '2023-04-14', '00:15:00', '12:30:00', 1, 'Wrong time', 0),
(90, 9, 'Friday', '2023-04-14', '12:15:00', '12:30:00', 1, NULL, 1),
(91, 9, 'Thursday', '2023-04-20', '15:00:00', '15:20:00', 1, NULL, 1),
(92, 9, 'Thursday', '2023-05-04', '09:00:00', '18:00:00', 1, NULL, 1),
(93, 9, 'Friday', '2023-05-05', '09:00:00', '13:00:00', 1, NULL, 1),
(94, 9, 'Saturday', '2023-05-06', '09:00:00', '22:00:00', 1, NULL, 1),
(102, 22, 'Tuesday', '2023-11-14', '10:00:00', '10:20:00', 1, NULL, 1),
(96, 4, 'Friday', '2023-05-19', '11:00:00', '12:00:00', 1, NULL, 1),
(97, 11, 'Saturday', '2023-07-15', '11:00:00', '12:00:00', 1, NULL, 1),
(98, 11, 'Tuesday', '2023-07-18', '13:30:00', '14:00:00', 1, NULL, 1),
(99, 14, 'Saturday', '2023-10-28', '10:00:00', '10:20:00', 1, NULL, 1),
(100, 14, 'Sunday', '2023-10-29', '12:15:00', '12:30:00', 1, NULL, 1),
(101, 16, 'Saturday', '2023-10-28', '02:00:00', '02:15:00', 0, NULL, 1),
(103, 22, 'Saturday', '2023-11-11', '12:30:00', '12:45:00', 1, NULL, 1),
(104, 20, 'Saturday', '2023-12-09', '11:30:00', '11:45:00', 1, NULL, 1),
(105, 21, 'Monday', '2024-01-08', '15:00:00', '15:20:00', 1, NULL, 1),
(106, 16, 'Tuesday', '2023-12-19', '08:10:00', '08:30:00', 1, 'PM away for some reason', 0),
(107, 17, 'Saturday', '2023-11-25', '12:00:00', '12:30:00', 1, NULL, 1),
(108, 3, 'Saturday', '2023-12-02', '10:00:00', '10:15:00', 1, NULL, 1),
(109, 16, 'Saturday', '2023-11-25', '12:00:00', '16:00:00', 1, NULL, 1),
(110, 16, 'Saturday', '2023-11-25', '12:00:00', '16:00:00', 1, NULL, 1),
(111, 17, 'Wednesday', '2024-01-31', '10:45:00', '11:00:00', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `property_views`
--

CREATE TABLE `property_views` (
  `sno` int(11) NOT NULL,
  `property` int(11) NOT NULL,
  `ipaddress` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `property_views`
--

INSERT INTO `property_views` (`sno`, `property`, `ipaddress`, `datetime`) VALUES
(1, 2, '110.235.227.164', '2022-09-02 23:24:48'),
(2, 2, '110.235.227.164', '2022-08-30 11:55:37'),
(3, 2, '110.235.227.164', '2022-08-03 11:50:51'),
(4, 2, '110.235.227.164', '2022-07-03 11:53:38'),
(5, 1, '110.235.227.164', '2022-09-02 16:32:28'),
(6, 3, '157.48.205.170', '2022-09-02 14:06:13'),
(7, 1, '157.48.205.170', '2022-09-02 15:06:26'),
(8, 3, '110.235.227.164', '2022-09-02 16:58:37'),
(9, 2, '122.173.162.37', '2022-09-02 19:45:50'),
(10, 2, '110.235.227.164', '2022-09-03 17:50:04'),
(11, 2, '151.210.134.247', '2022-09-04 17:09:40'),
(12, 3, '151.210.134.247', '2022-09-04 17:11:06'),
(13, 2, '151.210.136.210', '2022-09-05 16:39:49'),
(14, 2, '122.173.162.37', '2022-09-05 17:14:16'),
(15, 3, '122.173.162.37', '2022-09-05 17:56:39'),
(16, 3, '151.210.136.210', '2022-09-05 17:56:43'),
(17, 3, '110.235.227.64', '2022-09-05 18:14:37'),
(18, 3, '110.235.227.64', '2022-09-06 11:44:17'),
(19, 2, '157.48.163.183', '2022-09-06 16:09:32'),
(20, 2, '110.235.227.64', '2022-09-06 20:07:32'),
(21, 4, '110.235.227.64', '2022-09-06 23:07:18'),
(22, 4, '122.179.225.190', '2022-09-06 23:13:46'),
(23, 1, '110.235.227.64', '2022-09-06 23:15:43'),
(24, 2, '110.235.227.64', '2022-09-07 00:26:26'),
(25, 3, '110.235.227.64', '2022-09-07 00:27:37'),
(26, 4, '110.235.227.64', '2022-09-07 00:28:00'),
(27, 1, '110.235.227.64', '2022-09-07 13:26:37'),
(28, 4, '110.235.227.64', '2022-09-08 07:54:03'),
(29, 2, '110.235.227.64', '2022-09-08 08:51:46'),
(30, 2, '122.182.241.183', '2022-09-09 09:19:01'),
(31, 3, '122.182.241.183', '2022-09-09 09:22:38'),
(32, 1, '122.182.241.183', '2022-09-09 09:23:00'),
(33, 4, '122.182.241.183', '2022-09-09 09:23:23'),
(34, 2, '136.185.105.159', '2022-09-10 13:17:15'),
(35, 4, '136.185.105.159', '2022-09-10 15:19:38'),
(36, 3, '136.185.105.159', '2022-09-10 16:34:46'),
(37, 3, '122.175.188.108', '2022-09-11 23:20:45'),
(38, 4, '122.175.188.108', '2022-09-11 23:24:54'),
(39, 2, '157.47.48.213', '2022-09-12 11:54:47'),
(40, 4, '157.47.48.213', '2022-09-12 12:07:18'),
(41, 1, '157.47.48.213', '2022-09-12 12:43:05'),
(42, 3, '157.47.48.118', '2022-09-12 17:46:34'),
(43, 2, '110.225.198.29', '2022-09-13 22:50:50'),
(44, 4, '157.47.50.229', '2022-09-13 23:05:20'),
(45, 4, '157.47.41.52', '2022-09-14 10:36:23'),
(46, 2, '157.47.63.19', '2022-09-14 15:51:06'),
(47, 1, '157.47.63.19', '2022-09-14 16:03:00'),
(48, 3, '157.47.63.19', '2022-09-14 16:03:40'),
(49, 4, '157.47.62.39', '2022-09-15 10:06:20'),
(50, 2, '157.47.62.39', '2022-09-15 11:38:40'),
(51, 2, '103.161.31.20', '2022-09-16 17:34:06'),
(52, 4, '103.161.31.20', '2022-09-16 18:00:33'),
(53, 3, '103.161.31.20', '2022-09-16 18:08:34'),
(54, 2, '151.210.136.6', '2022-09-18 16:59:28'),
(55, 4, '151.210.136.6', '2022-09-18 17:34:01'),
(56, 3, '151.210.136.6', '2022-09-18 17:34:09'),
(57, 1, '151.210.136.6', '2022-09-18 17:34:38'),
(58, 4, '151.210.139.88', '2022-09-20 14:39:12'),
(59, 2, '151.210.134.75', '2022-09-21 15:09:44'),
(60, 4, '103.161.31.20', '2022-09-21 16:15:54'),
(61, 3, '103.161.31.20', '2022-09-21 17:23:05'),
(62, 2, '151.210.139.203', '2022-09-22 15:32:34'),
(63, 2, '122.175.82.39', '2022-09-23 02:46:37'),
(64, 2, '151.210.139.83', '2022-09-24 19:13:24'),
(65, 2, '151.210.138.113', '2022-09-25 17:51:20'),
(66, 4, '151.210.138.113', '2022-09-26 08:55:20'),
(67, 2, '151.210.138.113', '2022-09-26 09:06:14'),
(68, 1, '103.161.31.20', '2022-09-26 11:36:29'),
(69, 3, '103.161.31.20', '2022-09-26 11:36:51'),
(70, 4, '151.210.137.124', '2022-09-27 15:36:21'),
(71, 2, '151.210.135.136', '2022-09-28 13:07:03'),
(72, 3, '151.210.135.136', '2022-09-28 22:54:50'),
(73, 2, '151.210.134.180', '2022-09-29 17:24:48'),
(74, 2, '103.161.31.20', '2022-09-30 14:21:33'),
(75, 4, '103.161.31.20', '2022-09-30 14:21:35'),
(76, 3, '103.161.31.20', '2022-09-30 14:40:45'),
(77, 4, '103.161.31.20', '2022-10-01 10:48:33'),
(78, 2, '151.210.136.85', '2022-10-01 18:56:06'),
(79, 3, '151.210.136.85', '2022-10-01 18:57:00'),
(80, 4, '103.161.31.20', '2022-10-02 12:51:41'),
(81, 4, '103.161.31.20', '2022-10-03 11:04:06'),
(82, 3, '103.161.31.20', '2022-10-03 11:36:00'),
(83, 2, '103.161.31.20', '2022-10-03 11:43:06'),
(84, 4, '103.161.31.20', '2022-10-04 10:56:42'),
(85, 2, '103.161.31.20', '2022-10-04 11:23:04'),
(86, 4, '151.210.135.163', '2022-10-05 13:24:14'),
(87, 4, '151.210.136.38', '2022-10-06 15:10:35'),
(88, 2, '151.210.139.199', '2022-10-08 13:11:12'),
(89, 4, '151.210.139.199', '2022-10-08 13:13:48'),
(90, 4, '151.210.136.197', '2022-10-10 15:31:20'),
(91, 4, '151.210.134.205', '2022-10-11 15:11:11'),
(92, 4, '103.161.31.20', '2022-10-12 11:51:46'),
(93, 2, '103.161.31.20', '2022-10-12 20:00:21'),
(94, 4, '151.210.138.207', '2022-10-13 15:24:53'),
(95, 2, '151.210.134.80', '2022-10-15 16:29:09'),
(96, 4, '151.210.134.80', '2022-10-15 16:29:15'),
(97, 4, '151.210.135.193', '2022-10-16 10:36:14'),
(98, 4, '151.210.134.211', '2022-10-20 16:09:53'),
(99, 3, '151.210.134.211', '2022-10-20 16:10:33'),
(100, 2, '151.210.134.211', '2022-10-20 16:10:41'),
(101, 4, '151.210.137.253', '2022-10-25 15:23:32'),
(102, 4, '151.210.136.89', '2022-10-26 01:13:29'),
(103, 4, '103.161.31.20', '2022-10-27 16:56:01'),
(104, 4, '151.210.136.156', '2022-10-29 16:24:51'),
(105, 4, '151.210.139.190', '2022-10-31 15:12:23'),
(106, 3, '151.210.139.190', '2022-10-31 15:17:29'),
(107, 4, '151.210.139.190', '2022-11-01 01:19:31'),
(108, 2, '223.178.19.17', '2022-11-01 18:38:51'),
(109, 2, '151.210.136.144', '2022-11-04 18:11:59'),
(110, 4, '151.210.136.144', '2022-11-04 18:12:22'),
(111, 4, '151.210.137.102', '2022-11-07 12:03:01'),
(112, 3, '122.173.201.130', '2022-11-07 13:46:28'),
(113, 2, '122.173.201.130', '2022-11-07 13:46:50'),
(114, 3, '103.161.31.20', '2022-11-08 11:45:06'),
(115, 2, '136.185.58.161', '2022-11-09 01:49:53'),
(116, 3, '151.210.134.191', '2022-11-09 13:43:26'),
(117, 2, '103.161.31.20', '2022-11-10 11:58:54'),
(118, 3, '151.210.138.19', '2022-11-10 14:38:02'),
(119, 4, '151.210.138.19', '2022-11-10 14:38:09'),
(120, 2, '151.210.139.97', '2022-11-11 15:23:40'),
(121, 2, '151.210.134.64', '2022-11-13 09:54:30'),
(122, 3, '151.210.134.64', '2022-11-13 16:00:57'),
(123, 2, '103.161.31.20', '2022-11-14 16:12:30'),
(124, 2, '151.210.138.121', '2022-11-16 16:06:52'),
(125, 2, '222.154.233.83', '2022-11-17 08:45:07'),
(126, 3, '103.161.31.20', '2022-11-17 18:26:28'),
(127, 4, '103.161.31.20', '2022-11-17 18:26:47'),
(128, 2, '151.210.136.223', '2022-11-18 15:58:06'),
(129, 2, '151.210.136.6', '2022-11-19 11:45:46'),
(130, 4, '151.210.136.6', '2022-11-19 16:27:31'),
(131, 2, '151.210.136.229', '2022-11-21 16:07:20'),
(132, 2, '151.210.136.164', '2022-11-22 12:54:36'),
(133, 3, '151.210.134.208', '2022-11-23 04:55:55'),
(134, 4, '122.162.56.57', '2022-11-23 10:17:17'),
(135, 2, '122.162.56.57', '2022-11-23 10:26:15'),
(136, 1, '122.162.56.57', '2022-11-23 10:29:52'),
(137, 2, '151.210.134.242', '2022-11-24 16:03:11'),
(138, 8, '103.161.31.20', '2022-11-24 16:41:56'),
(139, 4, '122.162.56.57', '2022-11-25 11:11:06'),
(140, 8, '151.210.135.141', '2022-11-25 17:11:51'),
(141, 7, '151.210.135.141', '2022-11-25 17:12:13'),
(142, 3, '151.210.134.6', '2022-11-26 17:58:29'),
(143, 6, '151.210.134.6', '2022-11-26 17:59:12'),
(144, 1, '151.210.134.6', '2022-11-26 17:59:26'),
(145, 8, '151.210.134.6', '2022-11-26 18:08:44'),
(146, 8, '151.210.134.6', '2022-11-27 16:57:22'),
(147, 8, '151.210.137.19', '2022-11-28 11:30:00'),
(148, 4, '103.161.31.20', '2022-11-28 11:42:47'),
(149, 2, '151.210.134.84', '2022-11-29 11:33:07'),
(150, 8, '151.210.134.84', '2022-11-29 16:40:04'),
(151, 7, '151.210.138.187', '2022-11-30 13:22:05'),
(152, 2, '151.210.138.187', '2022-11-30 14:31:53'),
(153, 4, '151.210.138.187', '2022-11-30 15:23:40'),
(154, 2, '222.154.233.83', '2022-12-01 08:52:35'),
(155, 8, '103.161.31.20', '2022-12-01 11:16:46'),
(156, 4, '103.161.31.20', '2022-12-01 11:22:53'),
(157, 6, '151.210.137.131', '2022-12-01 12:21:45'),
(158, 6, '151.210.139.64', '2022-12-02 09:24:44'),
(159, 8, '151.210.139.64', '2022-12-02 09:25:00'),
(160, 4, '151.210.138.46', '2022-12-02 14:52:18'),
(161, 3, '122.177.114.214', '2022-12-02 14:56:25'),
(162, 8, '122.177.114.214', '2022-12-03 11:36:42'),
(163, 4, '122.177.114.214', '2022-12-03 12:03:07'),
(164, 2, '122.177.114.214', '2022-12-03 13:55:47'),
(165, 8, '151.210.138.46', '2022-12-04 15:48:17'),
(166, 4, '151.210.138.46', '2022-12-04 15:50:52'),
(167, 3, '151.210.138.46', '2022-12-04 17:43:39'),
(168, 4, '103.161.31.20', '2022-12-05 11:02:38'),
(169, 8, '103.161.31.20', '2022-12-05 12:12:12'),
(170, 8, '222.154.233.83', '2022-12-06 09:49:07'),
(171, 4, '222.154.233.83', '2022-12-06 09:49:19'),
(172, 4, '222.154.233.83', '2022-12-07 05:59:00'),
(173, 8, '151.210.133.95', '2022-12-07 16:38:35'),
(174, 2, '151.210.133.95', '2022-12-07 16:38:56'),
(175, 6, '151.210.133.95', '2022-12-07 16:39:39'),
(176, 4, '151.210.129.62', '2022-12-08 15:30:30'),
(177, 2, '106.200.175.154', '2022-12-09 11:23:03'),
(178, 8, '106.200.175.154', '2022-12-09 11:23:15'),
(179, 4, '106.200.175.154', '2022-12-09 11:23:25'),
(180, 3, '106.200.175.154', '2022-12-09 11:23:52'),
(181, 6, '106.200.175.154', '2022-12-09 11:24:42'),
(182, 1, '106.200.175.154', '2022-12-09 11:24:58'),
(183, 5, '106.200.175.154', '2022-12-09 11:25:12'),
(184, 4, '151.210.130.71', '2022-12-10 13:36:56'),
(185, 8, '151.210.130.71', '2022-12-10 13:39:19'),
(186, 2, '151.210.130.71', '2022-12-10 17:08:38'),
(187, 4, '151.210.130.71', '2022-12-11 16:13:15'),
(188, 4, '151.210.131.192', '2022-12-12 15:03:12'),
(189, 8, '151.210.131.192', '2022-12-12 15:03:52'),
(190, 8, '222.154.233.83', '2022-12-13 09:42:06'),
(191, 4, '151.210.131.96', '2022-12-13 16:15:08'),
(192, 8, '151.210.131.50', '2022-12-14 15:04:00'),
(193, 6, '151.210.130.111', '2022-12-15 13:04:05'),
(194, 4, '151.210.129.61', '2022-12-16 17:26:25'),
(195, 8, '151.210.129.61', '2022-12-16 17:26:47'),
(196, 2, '151.210.129.61', '2022-12-16 17:27:15'),
(197, 5, '151.210.129.61', '2022-12-17 17:15:56'),
(198, 8, '151.210.129.61', '2022-12-17 17:16:22'),
(199, 2, '151.210.129.61', '2022-12-17 17:16:28'),
(200, 4, '151.210.129.61', '2022-12-17 17:16:44'),
(201, 1, '151.210.129.61', '2022-12-17 17:58:03'),
(202, 6, '151.210.129.61', '2022-12-17 18:32:30'),
(203, 3, '136.185.44.81', '2022-12-17 20:23:54'),
(204, 1, '151.210.129.61', '2022-12-18 15:20:45'),
(205, 8, '151.210.129.61', '2022-12-18 15:26:58'),
(206, 2, '106.201.12.178', '2022-12-18 16:07:45'),
(207, 5, '151.210.129.61', '2022-12-18 17:17:46'),
(208, 2, '118.148.87.190', '2022-12-19 07:59:54'),
(209, 8, '118.148.87.190', '2022-12-19 08:00:05'),
(210, 4, '151.210.131.243', '2022-12-19 16:13:14'),
(211, 4, '222.154.233.83', '2022-12-20 07:53:16'),
(212, 1, '222.154.233.83', '2022-12-20 08:56:58'),
(213, 2, '222.154.233.83', '2022-12-20 08:57:03'),
(214, 8, '136.185.44.81', '2022-12-20 17:57:54'),
(215, 4, '222.154.233.83', '2022-12-21 06:07:34'),
(216, 2, '222.154.233.83', '2022-12-21 08:20:29'),
(217, 8, '136.185.44.81', '2022-12-21 12:01:43'),
(218, 1, '136.185.44.81', '2022-12-21 12:13:30'),
(219, 7, '136.185.44.81', '2022-12-21 12:14:54'),
(220, 3, '136.185.44.81', '2022-12-21 22:32:57'),
(221, 4, '136.185.44.81', '2022-12-22 01:04:25'),
(222, 8, '151.210.131.174', '2022-12-22 01:23:36'),
(223, 2, '151.210.132.104', '2022-12-22 14:17:49'),
(224, 6, '151.210.132.104', '2022-12-22 14:17:55'),
(225, 3, '136.185.44.81', '2022-12-22 14:19:14'),
(226, 1, '136.185.44.81', '2022-12-22 15:14:42'),
(227, 4, '151.210.128.147', '2022-12-23 14:51:20'),
(228, 8, '151.210.131.58', '2022-12-24 09:48:46'),
(229, 4, '151.210.128.207', '2022-12-25 16:48:15'),
(230, 2, '151.210.129.137', '2022-12-26 06:30:40'),
(231, 6, '151.210.129.137', '2022-12-26 06:30:49'),
(232, 4, '151.210.129.137', '2022-12-26 06:31:56'),
(233, 3, '151.210.129.137', '2022-12-26 16:30:37'),
(234, 4, '151.210.129.137', '2022-12-27 02:50:26'),
(235, 1, '122.182.237.68', '2022-12-27 19:32:37'),
(236, 3, '122.182.237.68', '2022-12-27 19:32:40'),
(237, 8, '122.182.237.68', '2022-12-27 19:32:42'),
(238, 8, '122.182.237.68', '2022-12-28 01:05:57'),
(239, 4, '151.210.129.137', '2022-12-28 03:32:27'),
(240, 8, '103.161.31.20', '2022-12-29 11:59:27'),
(241, 4, '151.210.129.129', '2022-12-29 13:50:18'),
(242, 8, '103.161.31.20', '2022-12-30 09:12:01'),
(243, 4, '151.210.133.68', '2023-01-01 16:07:28'),
(244, 2, '122.175.74.252', '2023-01-01 23:36:03'),
(245, 4, '103.161.31.20', '2023-01-02 11:03:52'),
(246, 2, '122.175.74.252', '2023-01-02 21:34:54'),
(247, 8, '122.175.74.252', '2023-01-02 21:39:38'),
(248, 8, '122.175.74.252', '2023-01-03 00:28:33'),
(249, 4, '151.210.133.116', '2023-01-03 17:01:59'),
(250, 4, '151.210.133.116', '2023-01-04 09:06:40'),
(251, 6, '151.210.133.116', '2023-01-04 09:08:16'),
(252, 8, '151.210.133.116', '2023-01-05 03:29:38'),
(253, 4, '171.61.142.86', '2023-01-05 12:08:18'),
(254, 2, '171.61.142.86', '2023-01-05 12:08:24'),
(255, 3, '171.61.142.86', '2023-01-05 15:13:17'),
(256, 1, '103.161.31.20', '2023-01-05 17:16:54'),
(257, 8, '103.161.31.20', '2023-01-06 13:21:06'),
(258, 4, '103.161.31.20', '2023-01-06 13:52:58'),
(259, 1, '171.61.88.123', '2023-01-06 13:53:13'),
(260, 8, '151.210.133.116', '2023-01-07 02:26:42'),
(261, 4, '151.210.133.116', '2023-01-07 02:27:42'),
(262, 7, '151.210.133.116', '2023-01-07 10:42:00'),
(263, 4, '151.210.128.177', '2023-01-09 15:06:41'),
(264, 4, '151.210.132.155', '2023-01-10 16:14:13'),
(265, 8, '106.203.201.63', '2023-01-10 21:50:53'),
(266, 2, '106.203.201.63', '2023-01-10 23:33:57'),
(267, 8, '106.203.201.63', '2023-01-11 00:13:19'),
(268, 2, '103.161.31.20', '2023-01-11 10:09:06'),
(269, 4, '103.161.31.20', '2023-01-11 10:27:40'),
(270, 3, '106.203.201.63', '2023-01-11 15:24:04'),
(271, 4, '151.210.129.120', '2023-01-12 14:05:58'),
(272, 8, '151.210.129.120', '2023-01-12 14:06:42'),
(273, 8, '103.161.31.20', '2023-01-13 12:35:15'),
(274, 4, '151.210.132.255', '2023-01-13 18:20:24'),
(275, 4, '151.210.131.236', '2023-01-14 13:40:28'),
(276, 8, '151.210.131.236', '2023-01-15 10:38:23'),
(277, 8, '103.161.31.20', '2023-01-16 10:18:33'),
(278, 4, '103.161.31.20', '2023-01-16 11:10:45'),
(279, 2, '103.161.31.20', '2023-01-16 11:48:14'),
(280, 8, '151.210.128.15', '2023-01-17 08:47:32'),
(281, 4, '103.161.31.20', '2023-01-17 11:07:09'),
(282, 4, '122.183.154.10', '2023-01-18 15:35:40'),
(283, 8, '122.183.154.10', '2023-01-18 17:27:23'),
(284, 8, '151.210.133.137', '2023-01-19 03:26:24'),
(285, 2, '122.183.154.10', '2023-01-19 10:43:05'),
(286, 4, '122.183.154.10', '2023-01-19 10:43:30'),
(287, 8, '103.161.31.20', '2023-01-20 10:45:27'),
(288, 4, '118.148.80.169', '2023-01-20 16:08:31'),
(289, 8, '118.149.95.129', '2023-01-21 17:24:08'),
(290, 4, '103.161.31.20', '2023-01-23 14:07:33'),
(291, 8, '118.149.93.126', '2023-01-23 14:40:19'),
(292, 8, '110.225.198.177', '2023-01-24 14:32:29'),
(293, 4, '110.225.198.177', '2023-01-24 15:41:41'),
(294, 2, '110.225.198.177', '2023-01-24 15:55:00'),
(295, 8, '118.148.80.65', '2023-01-25 11:28:52'),
(296, 8, '118.148.86.134', '2023-01-26 15:12:01'),
(297, 8, '118.149.95.124', '2023-01-28 16:41:19'),
(298, 8, '151.210.128.216', '2023-01-30 11:27:33'),
(299, 1, '223.178.11.154', '2023-01-30 14:13:36'),
(300, 8, '151.210.132.255', '2023-01-31 15:22:25'),
(301, 4, '106.212.63.128', '2023-01-31 17:20:00'),
(302, 8, '151.210.132.197', '2023-02-01 15:00:13'),
(303, 5, '151.210.132.197', '2023-02-01 15:51:47'),
(304, 5, '151.210.130.216', '2023-02-02 14:51:57'),
(305, 4, '151.210.130.216', '2023-02-02 15:01:44'),
(306, 8, '151.210.130.216', '2023-02-02 15:49:14'),
(307, 7, '103.161.31.20', '2023-02-03 18:37:34'),
(308, 8, '222.154.233.83', '2023-02-07 09:17:02'),
(309, 9, '136.185.121.181', '2023-02-07 15:19:08'),
(310, 3, '151.210.128.250', '2023-02-11 18:22:36'),
(311, 7, '118.149.92.87', '2023-02-13 12:36:25'),
(312, 3, '118.149.92.87', '2023-02-13 12:38:09'),
(313, 4, '118.149.92.87', '2023-02-13 12:39:17'),
(314, 8, '118.149.92.87', '2023-02-13 13:03:09'),
(315, 9, '151.210.139.120', '2023-02-13 15:57:35'),
(316, 8, '151.210.132.72', '2023-02-14 14:54:41'),
(317, 9, '151.210.132.72', '2023-02-14 14:55:53'),
(318, 4, '151.210.132.72', '2023-02-14 14:57:50'),
(319, 2, '151.210.132.72', '2023-02-14 14:58:00'),
(320, 3, '151.210.132.72', '2023-02-14 14:58:16'),
(321, 4, '151.210.128.224', '2023-02-15 15:20:11'),
(322, 9, '151.210.138.66', '2023-02-28 14:58:20'),
(323, 8, '151.210.135.178', '2023-03-01 12:28:07'),
(324, 4, '151.210.135.178', '2023-03-01 12:28:33'),
(325, 9, '151.210.134.33', '2023-03-03 16:21:55'),
(326, 8, '151.210.137.124', '2023-03-04 18:18:05'),
(327, 8, '151.210.136.28', '2023-03-11 09:28:05'),
(328, 9, '151.210.136.28', '2023-03-11 09:34:19'),
(329, 9, '122.171.52.241', '2023-03-14 16:45:38'),
(330, 8, '122.171.52.241', '2023-03-15 16:51:45'),
(331, 4, '122.171.52.241', '2023-03-15 23:19:08'),
(332, 8, '151.210.139.114', '2023-03-16 13:40:00'),
(333, 9, '151.210.139.114', '2023-03-16 13:40:22'),
(334, 7, '151.210.139.114', '2023-03-16 13:40:59'),
(335, 9, '151.210.139.75', '2023-03-17 16:31:13'),
(336, 8, '151.210.139.75', '2023-03-17 16:31:13'),
(337, 9, '151.210.139.28', '2023-03-18 16:44:24'),
(338, 9, '151.210.134.211', '2023-03-20 14:34:28'),
(339, 4, '151.210.134.211', '2023-03-20 14:35:25'),
(340, 1, '151.210.134.211', '2023-03-20 23:50:28'),
(341, 8, '103.161.31.20', '2023-03-21 01:05:11'),
(342, 9, '103.161.31.20', '2023-03-21 16:46:00'),
(343, 9, '103.161.31.20', '2023-03-22 00:00:46'),
(344, 8, '103.161.31.20', '2023-03-22 01:36:11'),
(345, 9, '157.48.187.229', '2023-03-23 08:58:44'),
(346, 2, '122.181.74.53', '2023-03-23 12:35:18'),
(347, 4, '122.181.74.53', '2023-03-23 12:35:24'),
(348, 3, '151.210.137.92', '2023-03-23 12:59:13'),
(349, 4, '103.161.31.20', '2023-03-24 11:55:41'),
(350, 9, '151.210.136.165', '2023-03-24 17:58:31'),
(351, 6, '151.210.136.165', '2023-03-24 17:59:07'),
(352, 8, '151.210.136.165', '2023-03-24 17:59:34'),
(353, 4, '151.210.138.157', '2023-03-26 12:22:09'),
(354, 9, '151.210.138.157', '2023-03-26 12:25:30'),
(355, 4, '151.210.135.143', '2023-03-28 14:46:07'),
(356, 4, '103.161.31.20', '2023-03-29 11:32:16'),
(357, 6, '103.161.31.20', '2023-03-29 12:08:51'),
(358, 1, '103.161.31.20', '2023-03-29 12:10:53'),
(359, 9, '103.161.31.20', '2023-03-30 10:12:31'),
(360, 1, '103.161.31.20', '2023-03-30 10:19:08'),
(361, 8, '103.161.31.20', '2023-03-30 10:20:57'),
(362, 4, '103.161.31.20', '2023-03-31 11:12:07'),
(363, 6, '103.161.31.20', '2023-03-31 11:19:00'),
(364, 9, '151.210.137.185', '2023-04-01 18:36:17'),
(365, 4, '151.210.137.185', '2023-04-01 18:37:22'),
(366, 3, '151.210.137.170', '2023-04-04 13:09:54'),
(367, 4, '151.210.137.170', '2023-04-04 13:10:25'),
(368, 9, '151.210.137.106', '2023-04-05 16:27:04'),
(369, 7, '151.210.137.106', '2023-04-05 16:28:16'),
(370, 6, '151.210.137.106', '2023-04-05 16:28:25'),
(371, 4, '151.210.137.106', '2023-04-05 16:28:33'),
(372, 4, '103.161.31.20', '2023-04-06 10:02:48'),
(373, 8, '110.225.199.105', '2023-04-06 10:14:24'),
(374, 9, '110.225.199.105', '2023-04-06 10:14:51'),
(375, 9, '103.161.31.20', '2023-04-07 11:09:25'),
(376, 8, '103.161.31.20', '2023-04-07 11:21:06'),
(377, 4, '103.161.31.20', '2023-04-07 11:21:32'),
(378, 7, '103.161.31.20', '2023-04-07 11:24:12'),
(379, 4, '122.169.169.255', '2023-04-09 22:25:47'),
(380, 9, '103.161.31.20', '2023-04-10 10:16:26'),
(381, 4, '103.161.31.20', '2023-04-10 11:56:55'),
(382, 3, '151.210.136.142', '2023-04-10 18:10:28'),
(383, 9, '103.161.31.20', '2023-04-11 10:15:43'),
(384, 8, '151.210.138.44', '2023-04-11 13:23:45'),
(385, 9, '103.161.31.20', '2023-04-12 09:59:53'),
(386, 9, '151.210.136.25', '2023-04-16 13:20:34'),
(387, 9, '151.210.137.78', '2023-04-20 16:21:36'),
(388, 8, '151.210.135.142', '2023-04-25 09:19:22'),
(389, 8, '151.210.136.67', '2023-04-27 16:57:24'),
(390, 4, '151.210.136.67', '2023-04-27 16:58:53'),
(391, 3, '151.210.137.166', '2023-04-29 14:13:26'),
(392, 9, '103.161.31.20', '2023-05-02 17:38:40'),
(393, 6, '103.161.31.20', '2023-05-02 18:58:49'),
(394, 4, '103.161.31.20', '2023-05-02 19:04:31'),
(395, 8, '124.123.182.186', '2023-05-03 11:29:27'),
(396, 9, '124.123.182.186', '2023-05-03 11:29:31'),
(397, 9, '124.123.163.100', '2023-05-04 10:14:17'),
(398, 9, '103.161.31.20', '2023-05-05 10:29:35'),
(399, 4, '161.29.240.135', '2023-05-05 12:13:41'),
(400, 9, '161.29.240.135', '2023-05-07 16:20:31'),
(401, 6, '161.29.240.135', '2023-05-07 16:21:26'),
(402, 3, '161.29.241.73', '2023-05-09 11:49:02'),
(403, 9, '161.29.253.248', '2023-05-12 14:26:09'),
(404, 4, '161.29.240.97', '2023-05-13 18:48:20'),
(405, 9, '161.29.231.252', '2023-05-18 01:16:18'),
(406, 3, '118.148.81.221', '2023-05-18 03:55:51'),
(407, 8, '118.149.92.42', '2023-05-18 04:25:52'),
(408, 4, '210.54.90.84', '2023-05-18 04:33:56'),
(409, 4, '118.148.81.105', '2023-05-24 07:02:34'),
(410, 9, '161.29.240.157', '2023-05-30 13:45:42'),
(411, 4, '161.29.240.157', '2023-05-30 13:45:59'),
(412, 4, '223.184.9.39', '2023-05-31 13:59:43'),
(413, 9, '161.29.228.20', '2023-05-31 14:59:10'),
(414, 6, '49.249.87.18', '2023-05-31 17:32:40'),
(415, 6, '122.164.190.181', '2023-06-01 11:59:09'),
(416, 4, '161.29.245.176', '2023-06-03 20:24:07'),
(417, 9, '161.29.245.176', '2023-06-05 04:53:20'),
(418, 4, '122.181.55.185', '2023-06-13 23:21:35'),
(419, 1, '103.161.31.20', '2023-06-15 11:38:39'),
(420, 9, '161.29.231.186', '2023-06-15 15:31:48'),
(421, 7, '161.29.231.186', '2023-06-15 15:32:38'),
(422, 4, '161.29.231.186', '2023-06-15 15:33:21'),
(423, 8, '103.161.31.20', '2023-06-22 16:38:32'),
(424, 4, '122.171.112.36', '2023-06-22 16:38:41'),
(425, 5, '122.171.112.36', '2023-06-22 16:38:58'),
(426, 9, '122.171.112.36', '2023-06-22 16:45:18'),
(427, 9, '103.161.31.20', '2023-06-23 12:24:09'),
(428, 7, '103.161.31.20', '2023-06-23 13:39:58'),
(429, 1, '161.29.252.94', '2023-06-27 15:13:36'),
(430, 4, '161.29.252.94', '2023-06-27 15:14:10'),
(431, 8, '161.29.252.94', '2023-06-27 15:14:20'),
(432, 4, '161.29.230.187', '2023-07-09 14:28:10'),
(433, 4, '161.29.252.179', '2023-07-10 15:25:45'),
(434, 11, '161.29.252.179', '2023-07-10 16:02:51'),
(435, 10, '161.29.252.179', '2023-07-10 16:04:54'),
(436, 4, '172.225.245.103', '2023-07-15 17:18:05'),
(437, 11, '104.28.29.66', '2023-07-15 17:19:19'),
(438, 10, '161.29.245.70', '2023-07-18 14:03:46'),
(439, 12, '161.29.245.70', '2023-07-18 14:10:07'),
(440, 13, '161.29.245.70', '2023-07-18 15:26:38'),
(441, 11, '182.65.237.183', '2023-07-18 15:55:21'),
(442, 6, '161.29.245.70', '2023-07-18 16:52:08'),
(443, 3, '161.29.245.70', '2023-07-18 16:53:02'),
(444, 4, '146.75.216.3', '2023-07-18 18:42:25'),
(445, 12, '161.29.252.35', '2023-07-20 14:24:30'),
(446, 13, '45.112.51.60', '2023-07-24 11:57:31'),
(447, 12, '45.112.51.60', '2023-07-24 11:58:01'),
(448, 10, '152.58.233.211', '2023-07-29 13:43:57'),
(449, 8, '104.28.29.66', '2023-08-03 05:09:46'),
(450, 5, '210.54.90.84', '2023-08-03 05:22:11'),
(451, 12, '161.29.253.226', '2023-08-06 15:30:08'),
(452, 13, '161.29.253.226', '2023-08-06 18:00:31'),
(453, 11, '210.54.90.84', '2023-08-24 04:51:52'),
(454, 12, '210.54.90.84', '2023-08-24 04:52:14'),
(455, 11, '172.225.245.101', '2023-09-05 15:15:02'),
(456, 6, '172.225.245.101', '2023-09-05 15:15:25'),
(457, 10, '172.225.245.101', '2023-09-05 15:15:42'),
(458, 12, '172.225.245.101', '2023-09-05 15:16:42'),
(459, 12, '172.225.245.101', '2023-09-06 09:00:13'),
(460, 6, '161.29.245.27', '2023-09-11 14:32:40'),
(461, 8, '161.29.245.27', '2023-09-11 14:34:54'),
(462, 3, '161.29.228.26', '2023-09-16 16:10:33'),
(463, 12, '103.41.96.166', '2023-10-20 12:07:14'),
(464, 12, '103.41.96.166', '2023-10-21 14:54:34'),
(465, 10, '150.107.175.33', '2023-10-22 11:42:15'),
(466, 7, '150.107.175.33', '2023-10-22 12:02:20'),
(467, 6, '150.107.175.33', '2023-10-22 12:03:15'),
(468, 11, '103.41.96.166', '2023-10-22 12:09:38'),
(469, 12, '150.107.175.33', '2023-10-22 12:19:03'),
(470, 3, '150.107.175.33', '2023-10-22 12:48:38'),
(471, 4, '150.107.175.33', '2023-10-24 12:45:22'),
(472, 14, '150.107.175.33', '2023-10-24 14:40:29'),
(473, 7, '150.107.175.33', '2023-10-24 14:46:14'),
(474, 5, '103.41.96.166', '2023-10-24 14:47:11'),
(475, 15, '103.41.96.166', '2023-10-24 19:28:19'),
(476, 4, '103.41.96.166', '2023-10-25 11:09:17'),
(477, 15, '103.41.96.166', '2023-10-25 11:34:24'),
(478, 14, '150.107.175.33', '2023-10-25 13:24:31'),
(479, 1, '150.107.175.33', '2023-10-25 13:40:43'),
(480, 16, '150.107.175.33', '2023-10-25 14:01:21'),
(481, 17, '150.107.175.33', '2023-10-25 14:15:15'),
(482, 7, '103.41.96.166', '2023-10-25 16:02:38'),
(483, 14, '150.107.175.33', '2023-10-27 13:32:47'),
(484, 16, '150.107.175.33', '2023-10-28 17:54:03'),
(485, 17, '150.107.175.33', '2023-10-29 01:27:34'),
(486, 16, '150.107.175.33', '2023-10-29 14:18:26'),
(487, 14, '150.107.175.33', '2023-10-29 14:19:34'),
(488, 17, '103.41.96.166', '2023-10-30 12:58:01'),
(489, 15, '103.41.96.166', '2023-10-30 16:05:54'),
(490, 3, '118.149.84.27', '2023-10-31 15:19:36'),
(491, 11, '118.149.84.27', '2023-10-31 15:20:06'),
(492, 11, '150.107.174.127', '2023-11-01 12:50:11'),
(493, 16, '150.107.174.127', '2023-11-01 13:21:07'),
(494, 14, '150.107.174.127', '2023-11-01 13:21:56'),
(495, 3, '150.107.174.127', '2023-11-01 13:29:27'),
(496, 15, '150.107.174.127', '2023-11-01 13:42:05'),
(497, 18, '150.107.174.127', '2023-11-01 13:57:03'),
(498, 17, '150.107.174.127', '2023-11-01 14:06:41'),
(499, 12, '103.41.96.166', '2023-11-01 18:47:12'),
(500, 4, '103.41.96.166', '2023-11-01 19:23:44'),
(501, 10, '103.41.96.166', '2023-11-01 20:04:42'),
(502, 16, '150.107.174.108', '2023-11-03 13:48:59'),
(503, 17, '150.107.174.108', '2023-11-03 13:49:38'),
(504, 3, '103.41.96.166', '2023-11-03 16:08:18'),
(505, 14, '103.41.96.166', '2023-11-03 16:10:26'),
(506, 15, '103.41.96.166', '2023-11-03 18:45:49'),
(507, 8, '49.37.153.234', '2023-11-07 12:23:11'),
(508, 20, '150.107.174.108', '2023-11-07 15:44:24'),
(509, 21, '150.107.174.108', '2023-11-07 15:56:24'),
(510, 22, '150.107.174.108', '2023-11-07 16:12:37'),
(511, 22, '150.107.174.108', '2023-11-08 13:50:52'),
(512, 20, '150.107.174.108', '2023-11-08 14:05:12'),
(513, 21, '150.107.174.108', '2023-11-08 14:38:40'),
(514, 20, '103.41.96.166', '2023-11-09 10:21:12'),
(515, 21, '103.41.96.166', '2023-11-09 10:33:24'),
(516, 22, '103.41.96.166', '2023-11-09 10:34:49'),
(517, 20, '103.41.96.166', '2023-11-14 11:54:27'),
(518, 22, '150.107.174.108', '2023-11-14 13:54:25'),
(519, 17, '103.41.96.166', '2023-11-17 14:04:30'),
(520, 21, '103.41.96.166', '2023-11-17 16:27:30'),
(521, 22, '103.41.96.166', '2023-11-17 16:27:57'),
(522, 4, '150.107.174.115', '2023-11-19 04:40:57'),
(523, 22, '150.107.174.115', '2023-11-19 18:06:47'),
(524, 21, '150.107.174.115', '2023-11-19 18:08:03'),
(525, 17, '150.107.174.115', '2023-11-20 11:31:56'),
(526, 20, '150.107.174.115', '2023-11-20 13:50:46'),
(527, 16, '150.107.174.115', '2023-11-20 14:44:55'),
(528, 22, '150.107.174.115', '2023-11-21 12:16:44'),
(529, 16, '150.107.174.115', '2023-11-22 12:28:29'),
(530, 15, '150.107.174.115', '2023-11-22 12:34:24'),
(531, 3, '150.107.174.115', '2023-11-23 12:06:22'),
(532, 8, '150.107.174.115', '2023-11-23 12:16:15'),
(533, 17, '150.107.174.115', '2023-11-23 13:47:40'),
(534, 16, '103.41.96.166', '2023-11-24 12:30:15'),
(535, 4, '150.107.174.115', '2023-11-24 17:51:23'),
(536, 8, '150.107.174.115', '2023-11-24 17:52:07'),
(537, 22, '150.107.174.115', '2023-11-24 18:07:53'),
(538, 3, '103.41.96.166', '2023-11-25 11:19:12'),
(539, 20, '103.41.96.166', '2023-11-25 11:19:55'),
(540, 20, '103.41.96.166', '2023-12-06 16:03:06'),
(541, 14, '103.41.96.166', '2023-12-06 16:39:54'),
(542, 19, '152.58.197.85', '2023-12-20 19:54:07'),
(543, 22, '103.174.80.193', '2023-12-23 12:29:16'),
(544, 4, '150.107.174.48', '2024-01-03 11:22:19'),
(545, 20, '103.174.80.197', '2024-01-03 17:38:24'),
(546, 16, '103.174.80.197', '2024-01-03 18:02:50'),
(547, 3, '103.174.80.197', '2024-01-04 13:25:32'),
(548, 16, '103.174.80.197', '2024-01-04 13:25:40'),
(549, 6, '111.69.49.146', '2024-01-10 01:39:47'),
(550, 20, '103.174.80.197', '2024-01-12 18:49:14'),
(551, 3, '150.107.174.48', '2024-01-21 15:28:01'),
(552, 15, '150.107.174.48', '2024-01-21 15:28:33'),
(553, 21, '150.107.174.48', '2024-01-21 15:28:48'),
(554, 3, '150.107.174.48', '2024-01-23 13:15:41'),
(555, 20, '150.107.174.48', '2024-01-24 16:18:34'),
(556, 20, '172.225.245.102', '2024-01-25 08:34:34'),
(557, 19, '172.225.245.102', '2024-01-26 03:13:14'),
(558, 3, '150.107.174.48', '2024-01-28 09:03:21'),
(559, 7, '150.107.174.48', '2024-01-28 09:03:24'),
(560, 16, '150.107.174.48', '2024-01-28 09:03:44'),
(561, 8, '150.107.174.48', '2024-01-28 09:04:15'),
(562, 15, '150.107.174.48', '2024-01-28 09:08:07'),
(563, 17, '150.107.174.48', '2024-01-29 13:12:30'),
(564, 17, '150.107.174.48', '2024-01-30 13:48:15'),
(565, 4, '223.178.10.254', '2024-01-31 10:26:02'),
(566, 20, '150.107.174.48', '2024-01-31 13:19:23'),
(567, 16, '150.107.174.48', '2024-01-31 13:19:38'),
(568, 16, '150.107.174.48', '2024-02-10 10:11:35'),
(569, 21, '150.107.174.48', '2024-02-10 10:12:48'),
(570, 21, '150.107.174.48', '2024-02-11 13:16:49'),
(571, 24, '150.107.174.48', '2024-02-12 13:52:13'),
(572, 3, '150.107.174.48', '2024-02-12 14:16:14'),
(573, 7, '150.107.174.48', '2024-02-12 14:16:37'),
(574, 6, '150.107.174.48', '2024-02-12 14:17:03'),
(575, 20, '150.107.174.48', '2024-02-12 14:17:22'),
(576, 25, '150.107.174.48', '2024-02-12 14:38:02'),
(577, 16, '150.107.174.48', '2024-02-16 11:44:17'),
(578, 14, '171.61.129.51', '2024-02-20 09:37:19'),
(579, 16, '171.61.129.51', '2024-02-20 09:41:37'),
(580, 2, '103.174.80.143', '2024-02-20 10:32:25'),
(581, 24, '150.107.174.48', '2024-02-20 12:13:10'),
(582, 23, '150.107.174.48', '2024-02-20 12:13:17'),
(583, 26, '150.107.174.48', '2024-02-20 12:33:39'),
(584, 23, '150.107.174.48', '2024-02-21 00:02:11'),
(585, 26, '150.107.174.48', '2024-02-24 18:28:20'),
(586, 23, '150.107.174.48', '2024-02-25 04:10:56'),
(587, 24, '150.107.174.233', '2024-03-02 18:06:17'),
(588, 26, '150.107.174.233', '2024-03-02 18:27:19'),
(589, 23, '150.107.174.233', '2024-03-02 18:31:32'),
(590, 20, '171.61.95.25', '2024-03-08 12:43:04'),
(591, 24, '171.61.95.25', '2024-03-08 12:49:51'),
(592, 18, '171.61.95.25', '2024-03-08 12:54:59'),
(593, 4, '171.61.95.25', '2024-03-08 12:55:11'),
(594, 24, '104.28.29.66', '2024-03-15 08:06:59'),
(595, 23, '150.107.174.233', '2024-03-17 09:52:23'),
(596, 4, '150.107.174.233', '2024-03-17 09:53:09'),
(597, 24, '150.107.174.233', '2024-03-17 10:03:47'),
(598, 25, '150.107.174.233', '2024-03-17 10:07:24'),
(599, 26, '150.107.174.233', '2024-03-17 10:14:31'),
(600, 16, '150.107.174.233', '2024-03-17 10:16:33'),
(601, 24, '122.173.90.181', '2024-03-18 01:23:24'),
(602, 4, '122.173.90.181', '2024-03-18 01:36:54'),
(603, 21, '103.174.80.143', '2024-03-18 12:05:13'),
(604, 26, '103.174.80.143', '2024-03-18 12:06:01'),
(605, 17, '150.107.174.233', '2024-03-19 12:39:21'),
(606, 18, '150.107.174.233', '2024-03-19 12:40:03'),
(607, 16, '150.107.174.233', '2024-03-19 12:45:52'),
(608, 23, '150.107.174.233', '2024-03-19 12:46:39'),
(609, 24, '150.107.174.233', '2024-03-19 12:47:02'),
(610, 25, '150.107.174.233', '2024-03-19 12:48:18'),
(611, 21, '150.107.174.233', '2024-03-19 13:59:40'),
(612, 22, '150.107.174.233', '2024-03-19 14:00:28'),
(613, 23, '104.28.29.66', '2024-03-20 04:47:59'),
(614, 26, '104.28.29.66', '2024-03-20 04:48:19'),
(615, 24, '150.107.174.233', '2024-03-23 10:45:17'),
(616, 26, '150.107.174.233', '2024-03-23 10:45:58'),
(617, 25, '150.107.174.233', '2024-03-23 10:46:21'),
(618, 23, '150.107.174.233', '2024-03-23 10:49:10'),
(619, 16, '150.107.174.233', '2024-03-23 10:59:33'),
(620, 25, '152.59.198.99', '2024-03-27 18:28:07'),
(621, 26, '152.59.198.99', '2024-03-27 19:30:04'),
(622, 26, '152.58.196.193', '2024-04-02 15:51:37'),
(623, 16, '150.107.174.1', '2024-04-12 19:26:33'),
(624, 25, '150.107.174.1', '2024-04-12 19:26:58'),
(625, 16, '115.243.2.227', '2024-04-19 12:17:44'),
(626, 3, '122.162.17.5', '2024-04-28 11:11:22'),
(627, 4, '122.162.17.5', '2024-04-28 11:13:10'),
(628, 25, '122.162.17.5', '2024-04-28 11:24:48'),
(629, 16, '122.162.17.5', '2024-04-28 11:34:39');

-- --------------------------------------------------------

--
-- Table structure for table `property_visits`
--

CREATE TABLE `property_visits` (
  `sno` int(11) NOT NULL,
  `property` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `day_date` date NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `visited` tinyint(1) NOT NULL DEFAULT 0,
  `send_link` tinyint(1) NOT NULL DEFAULT 0,
  `created_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `property_visits`
--

INSERT INTO `property_visits` (`sno`, `property`, `user`, `name`, `email`, `phone`, `day_date`, `schedule_id`, `visited`, `send_link`, `created_date`, `modified_date`, `status`) VALUES
(1, 8, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '', '2023-01-14', 81, 1, 1, '2023-01-13 17:05:52', '2023-10-20 13:54:30', 0),
(2, 8, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '', '2023-01-17', 86, 1, 1, '2023-01-13 17:06:21', '2023-03-24 17:58:15', 1),
(3, 8, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '', '2023-01-25', 78, 1, 0, '2023-01-16 10:43:58', '2023-02-01 16:00:14', 1),
(4, 4, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '', '2023-01-30', 74, 1, 1, '2023-01-16 11:11:19', '2023-02-02 15:01:10', 1),
(5, 8, 4, 'Pranay', 'pranay@gmail.com', '', '2023-01-26', 79, 1, 1, '2023-01-16 11:49:33', '2023-01-31 15:48:18', 1),
(6, 9, 7, 'Srikanth User', 'srikanthsamrat7@gmail.com', '0221878977', '2023-04-20', 91, 0, 0, '2023-04-11 13:38:35', NULL, 1),
(7, 9, 7, 'Srikanth User', 'srikanthsamrat7@gmail.com', '0221878977', '2023-04-14', 90, 0, 0, '2023-04-11 13:38:57', NULL, 1),
(8, 9, 7, 'Srikanth User', 'srikanthsamrat7@gmail.com', '', '2023-04-14', 90, 0, 0, '2023-04-11 13:40:29', NULL, 1),
(9, 9, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '9030894779', '2023-05-05', 93, 0, 0, '2023-05-03 11:52:37', NULL, 1),
(10, 9, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '9030894779', '2023-05-05', 95, 0, 0, '2023-05-04 10:32:03', NULL, 1),
(11, 9, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '9030894779', '2023-05-05', 95, 0, 0, '2023-05-04 10:38:17', NULL, 1),
(12, 9, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '9030894779', '2023-05-05', 95, 0, 0, '2023-05-04 10:39:46', NULL, 1),
(13, 9, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '9030894779', '2023-05-06', 94, 0, 0, '2023-05-04 10:45:50', NULL, 1),
(14, 9, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '9030894779', '2023-05-06', 94, 0, 0, '2023-05-04 10:54:42', NULL, 1),
(15, 9, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '9030894779', '2023-05-06', 94, 0, 0, '2023-05-04 11:08:42', NULL, 1),
(16, 9, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '9030894779', '2023-05-06', 94, 1, 1, '2023-05-04 11:08:57', '2023-05-31 14:53:35', 1),
(17, 9, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '9030894779', '2023-05-06', 94, 1, 1, '2023-05-04 11:09:29', '2023-05-31 14:53:23', 1),
(18, 9, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '9030894779', '2023-05-06', 94, 1, 1, '2023-05-04 11:10:49', '2023-05-05 17:08:16', 0),
(19, 16, 2, 'Rudra', 'rudra.pranay@gmail.com', '', '2023-10-28', 101, 0, 0, '2023-10-25 16:46:27', NULL, 0),
(20, 22, 7, 'Srikanth User', 'srikanthsamrat7@gmail.com', '0221878977', '2023-11-11', 103, 0, 0, '2023-11-07 16:31:22', NULL, 1),
(21, 22, 7, 'Srikanth User', 'srikanthsamrat7@gmail.com', '', '2023-11-14', 102, 0, 0, '2023-11-07 16:33:18', NULL, 1),
(22, 16, 2, 'Rudra Pranay', 'rudra.pranay@gmail.com', '9030894779', '2023-11-25', 109, 0, 0, '2023-11-24 12:43:26', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `p_amenities`
--

CREATE TABLE `p_amenities` (
  `sno` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `property_type` enum('Residential','Commercial') NOT NULL DEFAULT 'Residential',
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `p_amenities`
--

INSERT INTO `p_amenities` (`sno`, `name`, `property_type`, `status`) VALUES
(47, 'Dining Area', 'Commercial', 1),
(46, 'Kitchenette', 'Commercial', 1),
(45, 'Gym', 'Commercial', 1),
(44, 'Outdoor Space', 'Commercial', 1),
(43, 'Lawn Area', 'Commercial', 1),
(42, 'Internet/WiFi', 'Commercial', 1),
(52, 'Fire+Ventilation', 'Commercial', 1),
(51, 'Fire Extinguisher', 'Commercial', 1),
(50, 'Conference Rooms', 'Commercial', 1),
(49, 'Meeting Rooms', 'Commercial', 1),
(48, 'Lounge Area', 'Commercial', 1),
(57, 'Security Alarm', 'Commercial', 1),
(56, 'Security Cameras', 'Commercial', 1),
(55, 'Secured Gate', 'Commercial', 1),
(54, 'Secured Carpark', 'Commercial', 1),
(53, 'Fire Alarm', 'Commercial', 1),
(33, 'Private Space', 'Commercial', 1),
(34, 'Heat Pump', 'Commercial', 1),
(35, 'Heat Pump+AC', 'Commercial', 1),
(36, 'Lift', 'Commercial', 1),
(37, 'Office Rooms', 'Commercial', 1),
(96, 'Waiting Area', 'Commercial', 1),
(58, 'Includes Power', 'Residential', 1),
(59, 'Includes Water', 'Residential', 1),
(60, 'Includes Internet', 'Residential', 1),
(61, 'Fibre Installed', 'Residential', 1),
(62, 'TV Ariel', 'Residential', 1),
(63, 'Fireplace', 'Residential', 1),
(72, 'Washing Machine', 'Residential', 1),
(65, 'Intercom', 'Residential', 1),
(66, 'HRV System', 'Residential', 1),
(67, 'Heat Pump', 'Residential', 1),
(68, 'Heat Pump+AC', 'Residential', 1),
(69, 'Fridge/Freezer', 'Residential', 1),
(70, 'Dishwasher', 'Residential', 1),
(71, 'Centralized AC', 'Residential', 1),
(73, 'Clothes Dryer', 'Residential', 1),
(74, 'Lawn Mowing', 'Residential', 1),
(75, 'Gardening', 'Residential', 1),
(76, 'Sprinklers', 'Residential', 1),
(77, 'Private Deck', 'Residential', 1),
(78, 'Deck Area', 'Residential', 1),
(79, 'BBQ', 'Residential', 1),
(80, 'Garden Shed', 'Residential', 1),
(81, 'Gazebo', 'Residential', 1),
(82, 'Beachfront', 'Residential', 1),
(83, 'Beach View', 'Residential', 1),
(84, 'Lake View', 'Residential', 1),
(85, 'City View', 'Residential', 1),
(86, 'Pool', 'Residential', 1),
(87, 'Spa Pool/Bath', 'Residential', 1),
(88, 'Gym', 'Residential', 1),
(89, 'Snooker/Pool', 'Residential', 1),
(90, 'Bar Area', 'Residential', 1),
(91, 'Lift', 'Residential', 1),
(92, 'Balcony', 'Residential', 1),
(93, 'Secured Carpark', 'Residential', 1),
(94, 'Security Cameras', 'Residential', 1),
(95, 'Security Gate', 'Residential', 1),
(97, 'Includes Gas', 'Residential', 1),
(98, 'Patio', 'Residential', 1),
(99, 'Fully Fenced', 'Residential', 1),
(100, 'Partially Fenced', 'Residential', 1),
(101, 'No Fence', 'Residential', 1),
(102, 'Lawn Area', 'Residential', 1),
(103, 'Garden Area', 'Residential', 1),
(104, 'Burglar Alarm', 'Residential', 1),
(105, 'Security Alarm', 'Residential', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p_gallery`
--

CREATE TABLE `p_gallery` (
  `sno` int(11) NOT NULL,
  `property` int(11) NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `type` enum('thumbnail','normal') NOT NULL DEFAULT 'normal',
  `video_url` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `p_gallery`
--

INSERT INTO `p_gallery` (`sno`, `property`, `images`, `type`, `video_url`, `order`, `status`) VALUES
(1, 2, 'property_thumbnail_36081660984018.jpeg', 'thumbnail', '', 0, 1),
(2, 3, 'property_thumbnail_67261661157192.jpg', 'thumbnail', '', 0, 1),
(29, 1, 'property_pics_5841660916608.jpeg', 'normal', '', 0, 1),
(28, 1, 'property_thumbnail_36081660984018.jpeg', 'thumbnail', '', 0, 1),
(27, 3, 'property_pics_81411661177047.jpeg', 'normal', '', 3, 1),
(26, 3, 'property_pics_20411661177045.jpeg', 'normal', '', 6, 1),
(25, 3, 'property_pics_75651661177043.jpeg', 'normal', '', 0, 1),
(24, 2, 'property_pics_80131660983853.jpeg', 'normal', '', 1, 1),
(20, 3, 'property_pics_5841660916609.jpeg', 'normal', '', 2, 0),
(19, 3, 'property_pics_58416609166081.jpeg', 'normal', '', 4, 1),
(18, 3, 'property_pics_5841660916608.jpeg', 'normal', '', 1, 1),
(23, 2, 'property_pics_631816609838531.jpeg', 'normal', '', 2, 1),
(22, 2, 'property_pics_63181660983853.jpeg', 'normal', '', 3, 1),
(21, 3, 'property_pics_87821660983699.jpeg', 'normal', '', 5, 1),
(30, 2, 'property_pics_22711662471829.jpeg', 'normal', '', 0, 1),
(31, 4, 'property_thumbnail_16721662475619.jpeg', 'thumbnail', '', 0, 1),
(32, 4, 'property_pics_47616624752172.jpeg', 'normal', '', 0, 1),
(33, 4, 'property_pics_779816624752171.jpeg', 'normal', '', 1, 1),
(34, 4, 'property_pics_47616624752171.jpeg', 'normal', '', 2, 1),
(35, 4, 'property_pics_779816624752172.jpeg', 'normal', '', 3, 1),
(36, 4, 'property_pics_77981662475217.jpeg', 'normal', '', 4, 1),
(37, 4, 'property_pics_4761662475217.jpeg', 'normal', '', 5, 0),
(38, 4, 'property_pics_408916652329071.jpg', 'normal', '', 6, 1),
(39, 4, 'property_pics_85461665232931.jpg', 'normal', '', 7, 1),
(40, 6, 'property_thumbnail_36081660984018.jpeg', 'thumbnail', '', 0, 1),
(41, 7, 'property_thumbnail_67261661157192.jpg', 'thumbnail', '', 0, 1),
(42, 5, 'property_pics_5841660916608.jpeg', 'normal', '', 0, 1),
(43, 5, 'property_thumbnail_36081660984018.jpeg', 'thumbnail', '', 0, 1),
(44, 7, 'property_pics_81411661177047.jpeg', 'normal', '', 3, 1),
(45, 7, 'property_pics_20411661177045.jpeg', 'normal', '', 6, 1),
(46, 7, 'property_pics_75651661177043.jpeg', 'normal', '', 0, 1),
(47, 6, 'property_pics_80131660983853.jpeg', 'normal', '', 1, 1),
(48, 7, 'property_pics_5841660916609.jpeg', 'normal', '', 2, 1),
(49, 7, 'property_pics_58416609166081.jpeg', 'normal', '', 4, 1),
(50, 7, 'property_pics_5841660916608.jpeg', 'normal', '', 1, 1),
(51, 6, 'property_pics_631816609838531.jpeg', 'normal', '', 2, 1),
(52, 6, 'property_pics_63181660983853.jpeg', 'normal', '', 3, 1),
(53, 7, 'property_pics_87821660983699.jpeg', 'normal', '', 5, 1),
(54, 6, 'property_pics_22711662471829.jpeg', 'normal', '', 0, 1),
(55, 8, 'property_thumbnail_16721662475619.jpeg', 'thumbnail', '', 0, 1),
(56, 8, 'property_pics_47616624752172.jpeg', 'normal', '', 0, 1),
(57, 8, 'property_pics_779816624752171.jpeg', 'normal', '', 1, 1),
(58, 8, 'property_pics_47616624752171.jpeg', 'normal', '', 2, 1),
(59, 8, 'property_pics_779816624752172.jpeg', 'normal', '', 3, 1),
(60, 8, 'property_pics_77981662475217.jpeg', 'normal', '', 4, 1),
(61, 8, 'property_pics_4761662475217.jpeg', 'normal', '', 5, 1),
(62, 8, 'property_pics_408916652329071.jpg', 'normal', '', 6, 1),
(63, 8, 'property_pics_85461665232931.jpg', 'normal', '', 7, 1),
(64, 9, 'property_pics_47616624752172.jpeg', 'normal', '', 0, 1),
(65, 9, 'property_pics_779816624752171.jpeg', 'normal', '', 2, 1),
(66, 9, 'property_pics_47616624752171.jpeg', 'normal', '', 4, 1),
(67, 9, 'property_pics_779816624752172.jpeg', 'normal', '', 6, 1),
(68, 9, 'property_pics_77981662475217.jpeg', 'normal', '', 9, 1),
(69, 9, 'property_pics_4761662475217.jpeg', 'normal', '', 10, 0),
(70, 9, 'property_pics_408916652329071.jpg', 'normal', '', 11, 1),
(71, 9, 'property_pics_85461665232931.jpg', 'normal', '', 12, 1),
(72, 9, 'property_thumbnail_58111675763121.jpg', 'thumbnail', '', 0, 1),
(73, 9, 'property_pics_41161675763076.jpg', 'normal', '', 1, 1),
(74, 9, 'property_pics_41161675763077.jpg', 'normal', '', 3, 1),
(75, 9, 'property_pics_25581675763077.jpg', 'normal', '', 5, 1),
(76, 9, 'property_pics_255816757630771.jpg', 'normal', '', 7, 1),
(77, 9, 'property_pics_25581675763078.jpg', 'normal', '', 8, 1),
(78, 10, 'property_thumbnail_28371688984443.jpg', 'thumbnail', '', 0, 1),
(79, 10, 'property_pics_14781688984334.jpg', 'normal', '', 0, 1),
(80, 10, 'property_pics_20161688984318.jpg', 'normal', '', 2, 1),
(81, 10, 'property_pics_90221688984318.jpg', 'normal', '', 3, 1),
(82, 10, 'property_pics_201616889843191.jpg', 'normal', '', 4, 1),
(83, 10, 'property_pics_20161688984319.jpg', 'normal', '', 5, 1),
(84, 10, 'property_pics_78331688984320.jpg', 'normal', '', 6, 1),
(85, 10, 'property_pics_783316889843201.jpg', 'normal', '', 7, 1),
(86, 10, 'property_pics_72021688984322.jpg', 'normal', '', 8, 1),
(87, 10, 'property_pics_16461688984322.jpg', 'normal', '', 9, 1),
(88, 10, 'property_pics_57541688984323.jpg', 'normal', '', 10, 1),
(89, 10, 'property_pics_81011688984325.jpg', 'normal', '', 11, 1),
(90, 10, 'property_pics_48941688984325.jpg', 'normal', '', 12, 1),
(91, 10, 'property_pics_14781688984334.jpg', 'normal', '', 13, 1),
(92, 10, 'property_pics_58691688984334.jpg', 'normal', '', 14, 1),
(93, 11, 'property_thumbnail_56311688984734.jpg', 'thumbnail', '', 0, 1),
(94, 11, 'property_pics_41621688984690.jpg', 'normal', '', 0, 1),
(95, 11, 'property_pics_57271688984690.jpg', 'normal', '', 1, 1),
(96, 11, 'property_pics_7231688984691.jpg', 'normal', '', 2, 1),
(97, 11, 'property_pics_72316889846911.jpg', 'normal', '', 3, 1),
(98, 11, 'property_pics_7231688984692.jpg', 'normal', '', 4, 1),
(99, 11, 'property_pics_57991688984692.jpg', 'normal', '', 5, 1),
(100, 11, 'property_pics_42611688984693.jpg', 'normal', '', 6, 1),
(101, 11, 'property_pics_42611688984694.jpg', 'normal', '', 7, 1),
(102, 11, 'property_pics_99821688984695.jpg', 'normal', '', 8, 1),
(103, 11, 'property_pics_998216889846951.jpg', 'normal', '', 9, 1),
(104, 11, 'property_pics_19531688984697.jpg', 'normal', '', 10, 1),
(105, 11, 'property_pics_95531688984699.jpg', 'normal', '', 11, 1),
(106, 12, 'property_thumbnail_99461689669577.jpg', 'thumbnail', '', 0, 1),
(107, 12, 'property_pics_61431689669399.jpg', 'normal', '', 1, 1),
(108, 12, 'property_pics_54051689669399.jpg', 'normal', '', 2, 1),
(109, 12, 'property_pics_54051689669400.jpg', 'normal', '', 0, 1),
(110, 12, 'property_pics_540516896694001.jpg', 'normal', '', 3, 1),
(111, 12, 'property_pics_8211689669401.jpg', 'normal', '', 4, 1),
(112, 12, 'property_pics_82116896694011.jpg', 'normal', '', 5, 1),
(113, 12, 'property_pics_84881689669831.jpg', 'normal', '', 6, 1),
(114, 13, 'property_thumbnail_47901689674161.jpg', 'thumbnail', '', 0, 1),
(115, 13, 'property_pics_91731689674049.jpg', 'normal', '', 0, 0),
(116, 13, 'property_pics_917316896740491.jpg', 'normal', '', 1, 0),
(117, 13, 'property_pics_46571689674050.jpg', 'normal', '', 2, 0),
(118, 13, 'property_pics_72631689674050.jpg', 'normal', '', 3, 0),
(119, 14, 'property_thumbnail_21751698138530.jpg', 'thumbnail', '', 0, 1),
(120, 14, 'property_pics_11571698138435.jpg', 'normal', '', 0, 1),
(121, 14, 'property_pics_6781698138431.jpg', 'normal', '', 1, 1),
(122, 14, 'property_pics_79401698138431.jpg', 'normal', '', 2, 1),
(123, 14, 'property_pics_11571698138436.jpg', 'normal', '', 3, 1),
(124, 14, 'property_pics_397016981384321.jpg', 'normal', '', 4, 1),
(125, 14, 'property_pics_39701698138432.jpg', 'normal', '', 5, 1),
(126, 14, 'property_pics_96861698138433.jpg', 'normal', '', 6, 1),
(127, 14, 'property_pics_96861698138434.jpg', 'normal', '', 7, 1),
(128, 15, 'property_thumbnail_71251698155892.png', 'thumbnail', '', 0, 1),
(129, 15, 'property_pics_54811698155073.png', 'normal', '', 0, 1),
(130, 16, 'property_thumbnail_65041698222618.jpg', 'thumbnail', '', 0, 1),
(131, 16, 'property_pics_66731698222607.jpg', 'normal', '', 0, 1),
(132, 16, 'property_pics_667316982226071.jpg', 'normal', '', 1, 1),
(133, 16, 'property_pics_66731698222608.jpg', 'normal', '', 2, 1),
(134, 17, 'property_thumbnail_20541698828719.jpg', 'thumbnail', '', 0, 1),
(135, 17, 'property_pics_85381698223440.jpg', 'normal', '', 0, 1),
(136, 17, 'property_pics_97761698223443.jpg', 'normal', '', 3, 1),
(137, 17, 'property_pics_67291698223468.jpg', 'normal', '', 2, 0),
(138, 17, 'property_pics_52771698223997.jpg', 'normal', '', 3, 0),
(139, 18, 'property_thumbnail_58821698827212.jpg', 'thumbnail', '', 0, 1),
(140, 18, 'property_pics_559616988271981.jpg', 'normal', '', 0, 1),
(141, 18, 'property_pics_54551698827198.jpg', 'normal', '', 1, 1),
(142, 18, 'property_pics_545516988271981.jpg', 'normal', '', 2, 1),
(143, 18, 'property_pics_545516988271982.jpg', 'normal', '', 3, 1),
(144, 18, 'property_pics_545516988271983.jpg', 'normal', '', 4, 1),
(145, 18, 'property_pics_54551698827199.jpg', 'normal', '', 5, 1),
(146, 18, 'property_pics_545516988271991.jpg', 'normal', '', 6, 1),
(147, 19, 'property_thumbnail_24441698915346.jpg', 'thumbnail', '', 0, 1),
(148, 19, 'property_pics_24281698915306.jpg', 'normal', '', 0, 1),
(149, 19, 'property_pics_24281698915307.jpg', 'normal', '', 1, 1),
(150, 19, 'property_pics_51921698915307.jpg', 'normal', '', 2, 1),
(151, 19, 'property_pics_41241698915309.jpg', 'normal', '', 3, 1),
(152, 19, 'property_pics_412416989153091.jpg', 'normal', '', 4, 1),
(153, 19, 'property_pics_87881698915311.jpg', 'normal', '', 5, 1),
(154, 20, 'property_thumbnail_28261699352014.jpg', 'thumbnail', '', 0, 1),
(155, 20, 'property_pics_13451699351978.jpg', 'normal', '', 1, 1),
(156, 20, 'property_pics_66871699351978.jpg', 'normal', '', 2, 1),
(157, 20, 'property_pics_36241699351979.jpg', 'normal', '', 0, 1),
(158, 20, 'property_pics_4131699351981.jpg', 'normal', '', 3, 1),
(159, 20, 'property_pics_41316993519811.jpg', 'normal', '', 4, 1),
(160, 21, 'property_thumbnail_22641699352608.jpg', 'thumbnail', '', 0, 1),
(161, 21, 'property_pics_43661699352553.jpg', 'normal', '', 1, 1),
(162, 21, 'property_pics_3231699352555.jpg', 'normal', '', 2, 1),
(163, 21, 'property_pics_3231699352556.jpg', 'normal', '', 3, 1),
(164, 21, 'property_pics_28901699352558.jpg', 'normal', '', 0, 1),
(165, 22, 'property_thumbnail_94561699353703.jpg', 'thumbnail', '', 0, 1),
(166, 22, 'property_pics_57441699353618.jpg', 'normal', '', 0, 1),
(167, 22, 'property_pics_69601699353624.jpg', 'normal', '', 1, 1),
(168, 22, 'property_pics_26581699353629.jpg', 'normal', '', 2, 1),
(169, 17, 'property_pics_655721a5a0dd378811700209062.jpeg', 'normal', '', 1, 0),
(170, 17, 'property_pics_65572619c4f3c9811700210202.jpeg', 'normal', '', 0, 0),
(171, 22, 'property_pics_656098c94373183171700829385.jpg', 'normal', '', 0, 1),
(172, 22, 'property_pics_656098cb4567388971700829387.jpg', 'normal', '', 0, 1),
(173, 22, 'property_pics_656098cce6c7012861700829389.jpg', 'normal', '', 0, 1),
(174, 22, 'property_pics_656098cdf0e7191151700829390.jpg', 'normal', '', 0, 1),
(175, 22, 'property_pics_656098ce4907584561700829390.jpg', 'normal', '', 0, 1),
(176, 22, 'property_pics_656098ce648be84561700829390.jpg', 'normal', '', 0, 1),
(177, 22, 'property_pics_656098cff0f8e44291700829392.jpg', 'normal', '', 0, 1),
(178, 22, 'property_pics_656098d013c8691901700829392.jpg', 'normal', '', 0, 1),
(179, 22, 'property_pics_656098d16eb3346421700829393.jpg', 'normal', '', 0, 1),
(180, 22, 'property_pics_656098d1eb25a46421700829394.jpg', 'normal', '', 0, 1),
(181, 22, 'property_pics_656098d3ba35665871700829396.jpg', 'normal', '', 0, 1),
(182, 22, 'property_pics_656098d495e9152141700829397.jpg', 'normal', '', 0, 1),
(183, 22, 'property_pics_656098d5b5e4289791700829398.jpg', 'normal', '', 0, 1),
(184, 17, 'property_pics_65b7571fcff1287051706514208.jpg', 'normal', '', 1, 1),
(185, 17, 'property_pics_65b75721bd63073111706514210.jpg', 'normal', '', 2, 1),
(186, 21, 'property_pics_65c87d4f6c0ae98581707638095.jpg', 'normal', '', 0, 1),
(187, 21, 'property_pics_65c87d5b51fcd58301707638107.jpg', 'normal', '', 0, 1),
(188, 23, 'property_thumbnail_65c9d3400ee2982061707725632.jpg', 'thumbnail', '', 0, 1),
(189, 23, 'property_pics_65c9d31f19b748081707725599.jpg', 'normal', '', 0, 1),
(190, 24, 'property_thumbnail_65c9d5084916f7051707726088.jpg', 'thumbnail', '', 0, 1),
(191, 24, 'property_pics_65c9d4e166b1891931707726049.jpg', 'normal', '', 0, 1),
(192, 24, 'property_pics_65c9d4dfcab6273491707726048.jpg', 'normal', '', 13, 1),
(193, 24, 'property_pics_65c9d4e20f8be65251707726050.jpg', 'normal', '', 1, 1),
(194, 24, 'property_pics_65c9d4e2ab64d65251707726051.jpg', 'normal', '', 2, 1),
(195, 24, 'property_pics_65c9d4e35620555531707726051.jpg', 'normal', '', 3, 1),
(196, 24, 'property_pics_65c9d4e3f17a855531707726052.jpg', 'normal', '', 4, 1),
(197, 24, 'property_pics_65c9d4e49f34256151707726053.jpg', 'normal', '', 5, 1),
(198, 24, 'property_pics_65c9d4e54337e64461707726053.jpg', 'normal', '', 6, 1),
(199, 24, 'property_pics_65c9d4e5e562e64461707726054.jpg', 'normal', '', 7, 1),
(200, 24, 'property_pics_65c9d4e6879d688221707726055.jpg', 'normal', '', 8, 1),
(201, 24, 'property_pics_65c9d4e7374a095271707726055.jpg', 'normal', '', 9, 1),
(202, 24, 'property_pics_65c9d4e7839f895271707726056.jpg', 'normal', '', 10, 1),
(203, 24, 'property_pics_65c9d4e831b0e96391707726056.jpg', 'normal', '', 11, 1),
(204, 24, 'property_pics_65c9d4e8c8ca096391707726057.jpg', 'normal', '', 12, 1),
(205, 24, 'property_pics_65c9d4e977e498911707726057.jpg', 'normal', '', 14, 1),
(206, 25, 'property_thumbnail_65c9dfda7c08383881707728859.jpg', 'thumbnail', '', 0, 1),
(207, 25, 'property_pics_65c9df9f7161411371707728799.jpg', 'normal', '', 0, 1),
(208, 25, 'property_pics_65c9df9f715f211371707728799.jpg', 'normal', '', 1, 1),
(209, 25, 'property_pics_65c9dfa12b4bd36761707728801.jpg', 'normal', '', 2, 1),
(210, 25, 'property_pics_65c9dfa12a57e36761707728801.jpg', 'normal', '', 3, 1),
(211, 25, 'property_pics_65c9dfa26089540351707728802.jpg', 'normal', '', 4, 1),
(212, 25, 'property_pics_65c9dfa19570936761707728802.jpg', 'normal', '', 5, 1),
(213, 25, 'property_pics_65c9dfa3993e925341707728804.jpg', 'normal', '', 6, 1),
(214, 25, 'property_pics_65c9dfa46e57418151707728804.jpg', 'normal', '', 7, 1),
(215, 25, 'property_pics_65c9dfa614d8715561707728806.jpg', 'normal', '', 8, 1),
(216, 25, 'property_pics_65c9dfa614c2f15561707728806.jpg', 'normal', '', 9, 1),
(217, 25, 'property_pics_65c9dfa8e987628051707728809.jpg', 'normal', '', 10, 1),
(218, 25, 'property_pics_65c9dfab4d31d82241707728811.jpg', 'normal', '', 11, 1),
(219, 25, 'property_pics_65c9dfc65188843541707728838.jpg', 'normal', '', 12, 1),
(220, 25, 'property_pics_65c9dfc651e1a43541707728838.jpg', 'normal', '', 13, 1),
(221, 26, 'property_thumbnail_65d44ec27420090181708412610.jpg', 'thumbnail', '', 0, 1),
(222, 26, 'property_pics_65d44e966380992551708412566.jpg', 'normal', '', 1, 1),
(223, 26, 'property_pics_65d44e966179c92551708412566.jpg', 'normal', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `sno` int(11) NOT NULL,
  `region_name` varchar(20) NOT NULL,
  `region_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`sno`, `region_name`, `region_image`, `status`) VALUES
(6, 'Coromandel', '', 1),
(5, 'Auckland', '', 1),
(4, 'Northland', '', 1),
(7, 'Bay of Plenty', '', 1),
(8, 'Waikato', '', 1),
(9, 'Gisborne', '', 1),
(10, 'Central North Islan', '', 1),
(11, 'Hawke\'s Bay', '', 1),
(12, 'Taranaki', '', 1),
(13, 'Manawatu/Whanganui', '', 1),
(14, 'Wairarapa', '', 1),
(15, 'Wellington', '', 1),
(16, 'Marlborough', '', 1),
(17, 'Nelson & Tasman', '', 1),
(18, 'West Coast', '', 1),
(19, 'Canterbury', '', 1),
(20, 'Otago & Lakes', '', 1),
(21, 'Otago', '', 1),
(22, 'Southland', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `sno` int(11) NOT NULL,
  `property` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date_time` datetime(6) NOT NULL,
  `visited` tinyint(1) NOT NULL DEFAULT 0,
  `apply` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `theme` varchar(50) NOT NULL,
  `button` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `loginbg` varchar(255) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `sentmail` varchar(255) NOT NULL,
  `footer_left` longtext NOT NULL,
  `footer_right` longtext NOT NULL,
  `maintenance` tinyint(1) NOT NULL DEFAULT 0 COMMENT '	0 is No, 1 is Yes	',
  `maintenance_mess` longtext DEFAULT NULL,
  `ipaddress` text NOT NULL,
  `display_errors` tinyint(1) NOT NULL DEFAULT 1,
  `display` enum('show','hidden') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `theme`, `button`, `title`, `logo`, `favicon`, `loginbg`, `menu`, `sentmail`, `footer_left`, `footer_right`, `maintenance`, `maintenance_mess`, `ipaddress`, `display_errors`, `display`) VALUES
(1, 'gray-dark', 'btn-info', 'Rental Listings', 'rental-listing-logo-01.png', 'rental-listing-favicon.png', 'nz-bg.png', '', 'contact@rentallistings.co.nz', '<p>Copyright &copy; 2023&nbsp;<a href=\"https://www.ps4works.in\" rel=\"nofollow\" target=\"_blank\">PS4WORKS</a>. All rights reserved.</p>\r\n\r\n<div data-inspect-element=\"inspectElement\" id=\"inspect-element-top-layer\" popover=\"auto\" style=\"pointer-events: none; border: unset; padding: 0px;\">&nbsp;</div>\r\n', '<p>&nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n\r\n<div data-inspect-element=\"inspectElement\" id=\"inspect-element-top-layer\" popover=\"auto\" style=\"pointer-events: none; border: unset; padding: 0px;\">&nbsp;</div>\r\n', 0, 'Sorry for the inconvenience but we’re performing some maintenance at the moment. we’ll be back online shortly!', '106.212.63.128', 0, 'hidden');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `sno` int(11) NOT NULL,
  `package` int(11) NOT NULL,
  `details` mediumtext NOT NULL,
  `role` varchar(20) NOT NULL,
  `user` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`sno`, `package`, `details`, `role`, `user`, `amount`, `created_date`, `modified_date`, `status`) VALUES
(19, 3, '{\"sno\":\"3\",\"name\":\"Large Company\",\"user_type\":\"Company\",\"properties\":\"30\",\"agents\":\"15\",\"actual_price\":\"325\",\"price\":\"275\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 15, 275, '2023-05-18 01:19:45', NULL, 1),
(20, 3, '{\"sno\":\"3\",\"name\":\"Large Company\",\"user_type\":\"Company\",\"properties\":\"30\",\"agents\":\"15\",\"actual_price\":\"325\",\"price\":\"275\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 16, 275, '2023-05-30 13:15:29', NULL, 0),
(23, 3, '{\"sno\":\"3\",\"name\":\"Large Company\",\"user_type\":\"Company\",\"properties\":\"30\",\"agents\":\"15\",\"actual_price\":\"325\",\"price\":\"275\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 23, 275, '2023-10-21 11:37:29', NULL, 1),
(4, 3, '{\"sno\":\"3\",\"name\":\"Large Company\",\"user_type\":\"Company\",\"properties\":\"30\",\"agents\":\"15\",\"actual_price\":\"300\",\"price\":\"250\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 8, 250, '2022-08-30 17:10:07', NULL, 1),
(5, 2, '{\"sno\":\"2\",\"name\":\"Medium Business\",\"user_type\":\"Company\",\"properties\":\"20\",\"agents\":\"7\",\"actual_price\":\"200\",\"price\":\"150\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 2, 150, '2023-09-27 11:50:31', NULL, 1),
(6, 1, '{\"sno\":\"1\",\"name\":\"Small Company\",\"user_type\":\"Company\",\"properties\":\"7\",\"agents\":\"3\",\"actual_price\":\"120\",\"price\":\"100\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 3, 100, '2022-09-06 18:44:19', NULL, 1),
(7, 3, '{\"sno\":\"3\",\"name\":\"Large Company\",\"user_type\":\"Company\",\"properties\":\"30\",\"agents\":\"15\",\"actual_price\":\"300\",\"price\":\"250\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 4, 250, '2022-09-09 06:44:47', NULL, 1),
(8, 2, '{\"sno\":\"2\",\"name\":\"Medium Business\",\"user_type\":\"Company\",\"properties\":\"20\",\"agents\":\"7\",\"actual_price\":\"200\",\"price\":\"150\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 5, 150, '2022-10-03 15:23:14', NULL, 1),
(9, 2, '{\"sno\":\"2\",\"name\":\"Medium Business\",\"user_type\":\"Company\",\"properties\":\"20\",\"agents\":\"7\",\"actual_price\":\"235\",\"price\":\"195\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 6, 195, '2022-11-29 16:37:23', NULL, 1),
(10, 1, '{\"sno\":\"1\",\"name\":\"Small Company\",\"user_type\":\"Company\",\"properties\":\"10\",\"agents\":\"3\",\"actual_price\":\"175\",\"price\":\"135\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 7, 135, '2023-01-05 12:27:11', NULL, 1),
(11, 2, '{\"sno\":\"2\",\"name\":\"Medium Business\",\"user_type\":\"Company\",\"properties\":\"20\",\"agents\":\"7\",\"actual_price\":\"235\",\"price\":\"195\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 8, 195, '2023-01-05 21:42:44', NULL, 1),
(12, 3, '{\"sno\":\"3\",\"name\":\"Large Company\",\"user_type\":\"Company\",\"properties\":\"30\",\"agents\":\"15\",\"actual_price\":\"325\",\"price\":\"275\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 8, 275, '2023-01-05 21:50:05', NULL, 1),
(13, 2, '{\"sno\":\"2\",\"name\":\"Medium Business\",\"user_type\":\"Company\",\"properties\":\"20\",\"agents\":\"7\",\"actual_price\":\"235\",\"price\":\"195\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 9, 195, '2023-01-05 21:54:07', NULL, 1),
(14, 2, '{\"sno\":\"2\",\"name\":\"Medium Business\",\"user_type\":\"Company\",\"properties\":\"20\",\"agents\":\"7\",\"actual_price\":\"235\",\"price\":\"195\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 10, 195, '2023-01-05 21:54:50', NULL, 1),
(15, 2, '{\"sno\":\"2\",\"name\":\"Medium Business\",\"user_type\":\"Company\",\"properties\":\"20\",\"agents\":\"7\",\"actual_price\":\"235\",\"price\":\"195\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 11, 195, '2023-01-05 21:58:24', NULL, 1),
(16, 1, '{\"sno\":\"1\",\"name\":\"Small Company\",\"user_type\":\"Company\",\"properties\":\"10\",\"agents\":\"3\",\"actual_price\":\"175\",\"price\":\"135\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 12, 135, '2023-01-13 18:24:10', NULL, 1),
(17, 3, '{\"sno\":\"3\",\"name\":\"Large Company\",\"user_type\":\"Company\",\"properties\":\"30\",\"agents\":\"15\",\"actual_price\":\"325\",\"price\":\"275\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 13, 275, '2023-01-16 01:53:30', NULL, 1),
(18, 2, '{\"sno\":\"2\",\"name\":\"Medium Business\",\"user_type\":\"Company\",\"properties\":\"20\",\"agents\":\"7\",\"actual_price\":\"235\",\"price\":\"195\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 14, 195, '2023-04-28 02:00:19', NULL, 1),
(22, 2, '{\"sno\":\"2\",\"name\":\"Medium Business\",\"user_type\":\"Company\",\"properties\":\"20\",\"agents\":\"7\",\"actual_price\":\"235\",\"price\":\"195\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 18, 195, '2023-09-11 15:14:35', NULL, 0),
(24, 3, '{\"sno\":\"3\",\"name\":\"Large Company\",\"user_type\":\"Company\",\"properties\":\"30\",\"agents\":\"15\",\"actual_price\":\"325\",\"price\":\"275\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 24, 275, '2023-10-21 13:39:45', NULL, 1),
(25, 2, '{\"sno\":\"2\",\"name\":\"Medium Business\",\"user_type\":\"Company\",\"properties\":\"20\",\"agents\":\"7\",\"actual_price\":\"235\",\"price\":\"195\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 24, 195, '2023-10-21 13:40:13', NULL, 1),
(26, 3, '{\"sno\":\"3\",\"name\":\"Large Company\",\"user_type\":\"Company\",\"properties\":\"30\",\"agents\":\"15\",\"actual_price\":\"325\",\"price\":\"275\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 16, 275, '2023-10-21 16:38:12', NULL, 1),
(27, 3, '{\"sno\":\"3\",\"name\":\"Large Company\",\"user_type\":\"Company\",\"properties\":\"30\",\"agents\":\"15\",\"actual_price\":\"325\",\"price\":\"275\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 16, 275, '2023-10-21 16:48:50', NULL, 1),
(28, 3, '{\"sno\":\"3\",\"name\":\"Large Company\",\"user_type\":\"Company\",\"properties\":\"30\",\"agents\":\"15\",\"actual_price\":\"325\",\"price\":\"275\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 16, 275, '2023-10-22 12:01:47', NULL, 1),
(29, 3, '{\"sno\":\"3\",\"name\":\"Large Company\",\"user_type\":\"Company\",\"properties\":\"30\",\"agents\":\"15\",\"actual_price\":\"325\",\"price\":\"275\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 25, 275, '2023-11-01 14:39:25', NULL, 1),
(30, 1, '{\"sno\":\"1\",\"name\":\"Small Company\",\"user_type\":\"Company\",\"properties\":\"10\",\"agents\":\"3\",\"actual_price\":\"175\",\"price\":\"135\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 26, 135, '2023-11-02 12:48:03', NULL, 1),
(31, 1, '{\"sno\":\"1\",\"name\":\"Small Company\",\"user_type\":\"Company\",\"properties\":\"10\",\"agents\":\"3\",\"actual_price\":\"175\",\"price\":\"135\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 27, 135, '2023-11-02 13:32:09', NULL, 1),
(32, 1, '{\"sno\":\"1\",\"name\":\"Small Company\",\"user_type\":\"Company\",\"properties\":\"10\",\"agents\":\"3\",\"actual_price\":\"175\",\"price\":\"135\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 28, 135, '2023-11-02 13:52:54', NULL, 1),
(33, 10, '{\"sno\":\"10\",\"name\":\"Small\",\"user_type\":\"Company\",\"properties\":\"10\",\"agents\":\"3\",\"actual_price\":\"135\",\"price\":\"0\",\"notes\":\"Duplicate for small\",\"created_date\":\"2023-11-03 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 29, 0, '2023-11-03 13:09:05', NULL, 1),
(34, 1, '{\"sno\":\"1\",\"name\":\"Small Company\",\"user_type\":\"Company\",\"properties\":\"10\",\"agents\":\"3\",\"actual_price\":\"175\",\"price\":\"135\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 29, 135, '2023-11-03 13:11:05', NULL, 1),
(35, 2, '{\"sno\":\"2\",\"name\":\"Medium Business\",\"user_type\":\"Company\",\"properties\":\"20\",\"agents\":\"7\",\"actual_price\":\"235\",\"price\":\"195\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 11, 195, '2023-12-12 12:34:42', NULL, 1),
(36, 11, '{\"sno\":\"11\",\"name\":\"Medium Duplicate\",\"user_type\":\"Company\",\"properties\":\"20\",\"agents\":\"7\",\"actual_price\":\"195\",\"price\":\"0\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 30, 0, '2024-01-02 14:01:16', NULL, 1),
(37, 1, '{\"sno\":\"1\",\"name\":\"Small Company\",\"user_type\":\"Company\",\"properties\":\"10\",\"agents\":\"3\",\"actual_price\":\"175\",\"price\":\"135\",\"Web\":\"1\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":null,\"status\":\"1\"}', 'company', 31, 135, '2024-01-30 14:02:13', NULL, 1),
(38, 11, '{\"sno\":\"11\",\"name\":\"Medium Duplicate\",\"user_type\":\"Company\",\"properties\":\"20\",\"agents\":\"7\",\"actual_price\":\"195\",\"price\":\"0\",\"Web\":\"1\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":\"2024-01-30 14:03:13\",\"status\":\"1\"}', 'company', 32, 0, '2024-01-30 14:05:08', NULL, 1),
(39, 1, '{\"sno\":\"1\",\"name\":\"Small Company\",\"user_type\":\"Company\",\"properties\":\"10\",\"agents\":\"3\",\"actual_price\":\"135\",\"price\":\"135\",\"Web\":\"1\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":\"2024-01-30 14:09:04\",\"status\":\"1\"}', 'company', 33, 135, '2024-03-26 12:34:13', NULL, 1),
(40, 2, '{\"sno\":\"2\",\"name\":\"Medium Business\",\"user_type\":\"Company\",\"properties\":\"20\",\"agents\":\"7\",\"actual_price\":\"195\",\"price\":\"195\",\"Web\":\"1\",\"notes\":\"\",\"created_date\":\"0000-00-00 00:00:00\",\"modified_date\":\"2024-01-30 14:09:15\",\"status\":\"1\"}', 'company', 34, 195, '2024-04-04 14:38:55', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `suburbs`
--

CREATE TABLE `suburbs` (
  `sno` int(11) NOT NULL,
  `suburb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `region` varchar(50) NOT NULL,
  `district` varchar(20) NOT NULL,
  `suburb_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `suburbs`
--

INSERT INTO `suburbs` (`sno`, `suburb`, `region`, `district`, `suburb_image`, `status`) VALUES
(1, 'Auckland Central', '5', '5', '', 1),
(7, 'Freemans Bay', '5', '5', '', 1),
(6, 'Grey Lynn', '5', '5', '', 1),
(8, 'All of Auckland City', '5', '5', '', 1),
(9, 'Arch Hill', '5', '5', '', 1),
(10, 'Avondale', '5', '5', '', 1),
(11, 'Balmoral', '5', '5', '', 1),
(12, 'Blockhouse Bay', '5', '5', '', 1),
(13, 'City Centre', '5', '5', '', 1),
(14, 'Coxs Bay', '5', '5', '', 1),
(15, 'Eden Terrace', '5', '5', '', 1),
(16, 'Ellerslie', '5', '5', '', 1),
(17, 'Epsom', '5', '5', '', 1),
(18, 'Glen Innes', '5', '5', '', 1),
(19, 'Ahipara', '4', '15', '', 1),
(20, 'Awanui', '4', '15', '', 1),
(21, 'Awarua', '4', '15', '', 1),
(22, 'Cable Bay', '4', '15', '', 1),
(23, 'Coopers Beach', '4', '15', '', 1),
(24, 'Haruru', '4', '15', '', 1),
(25, 'Herekino', '4', '15', '', 1),
(26, 'Hihi', '4', '15', '', 1),
(27, 'Hokianga Surrounds', '4', '15', '', 1),
(28, 'Horeke', '4', '15', '', 1),
(29, 'Houhora', '4', '15', '', 1),
(30, 'Kaeo', '4', '15', '', 1),
(31, 'Kaikohe', '4', '15', '', 1),
(32, 'Kaikohe Surrounds', '4', '15', '', 1),
(33, 'Kaikohe West', '4', '15', '', 1),
(34, 'Kaingaroa', '4', '15', '', 1),
(35, 'Kaitaia', '4', '15', '', 1),
(36, 'Kaitaia Surrounds', '4', '15', '', 1),
(37, 'Karikari Peninsula', '4', '15', '', 1),
(38, 'Kawakawa', '4', '15', '', 1),
(39, 'Kawakawa Surrounds', '4', '15', '', 1),
(40, 'Kerikeri', '4', '15', '', 1),
(41, 'Kerikeri Surrounds', '4', '15', '', 1),
(42, 'Kohukohu', '4', '15', '', 1),
(43, 'Mangamuka', '4', '15', '', 1),
(44, 'Mangōnui', '4', '15', '', 1),
(45, 'Mangonui Surrounds', '4', '15', '', 1),
(46, 'Maromaku', '4', '15', '', 1),
(47, 'Matauri Bay', '4', '15', '', 1),
(48, 'Matawaia', '4', '15', '', 1),
(49, 'Moerewa', '4', '15', '', 1),
(50, 'Motatau', '4', '15', '', 1),
(51, 'Ngawha Springs', '4', '15', '', 1),
(52, 'North Hokianga', '4', '15', '', 1),
(53, 'Nukutawhiti', '4', '15', '', 1),
(54, 'Ōhaeawai', '4', '15', '', 1),
(55, 'Ōkaihau', '4', '15', '', 1),
(56, 'Ōmāpere', '4', '15', '', 1),
(57, 'Opononi', '4', '15', '', 1),
(58, 'Opua', '4', '15', '', 1),
(59, 'Paewhenua Island', '4', '15', '', 1),
(60, 'Paihia', '4', '15', '', 1),
(61, 'Paihia Surrounds', '4', '15', '', 1),
(62, 'Pakaraka', '4', '15', '', 1),
(63, 'Pakotai', '4', '15', '', 1),
(64, 'Peria', '4', '15', '', 1),
(65, 'Pipiwai', '4', '15', '', 1),
(66, 'Pukenui', '4', '15', '', 1),
(67, 'Pukewharariki', '4', '15', '', 1),
(68, 'Punakitere Valley', '4', '15', '', 1),
(69, 'Rawene', '4', '15', '', 1),
(70, 'Russell', '4', '15', '', 1),
(71, 'Russell Surrounds', '4', '15', '', 1),
(72, 'South Hokianga', '4', '15', '', 1),
(73, 'Taipa', '4', '15', '', 1),
(74, 'Takahue', '4', '15', '', 1),
(75, 'Taupo Bay/Totara North', '4', '15', '', 1),
(76, 'Towai', '4', '15', '', 1),
(77, 'Waimate North', '4', '15', '', 1),
(78, 'Waiomio', '4', '15', '', 1),
(79, 'Waipapa', '4', '15', '', 1),
(80, 'Waitangi', '4', '15', '', 1),
(81, 'Whangaroa', '4', '15', '', 1),
(82, 'Whangaroa/Kaeo Surrounds', '4', '15', '', 1),
(83, 'Arapohue', '4', '16', '', 1),
(84, 'Dargaville', '4', '16', '', 1),
(85, 'Dargaville Surrounds', '4', '16', '', 1),
(86, 'Kaiwaka', '4', '16', '', 1),
(87, 'Mangawhai', '4', '16', '', 1),
(88, 'Mangawhai Heads', '4', '16', '', 1),
(89, 'Mareretu', '4', '16', '', 1),
(90, 'Matakohe', '4', '16', '', 1),
(91, 'Maungaturoto', '4', '16', '', 1),
(92, 'Otamatea Surrounds', '4', '16', '', 1),
(93, 'Paparoa', '4', '16', '', 1),
(94, 'Pouto', '4', '16', '', 1),
(95, 'Ruawai', '4', '16', '', 1),
(96, 'Ruawai Surrounds', '4', '16', '', 1),
(97, 'Tangiteroria', '4', '16', '', 1),
(98, 'Tangiteroria', '4', '16', '', 1),
(99, 'Te Kōpuru', '4', '16', '', 1),
(100, 'Tinopai', '4', '16', '', 1),
(101, 'Topuni', '4', '16', '', 1),
(102, 'Waipoua', '4', '16', '', 1),
(103, 'Whakapirau', '4', '16', '', 1),
(104, 'Avenues', '4', '17', '', 1),
(105, 'Glenbervie', '4', '17', '', 1),
(106, 'Hikurangi', '4', '17', '', 1),
(107, 'Horahora', '4', '17', '', 1),
(108, 'Hukerenui and Surrounds', '4', '17', '', 1),
(109, 'Kamo', '4', '17', '', 1),
(110, 'Kauri', '4', '17', '', 1),
(111, 'Kensington', '4', '17', '', 1),
(112, 'Kiripaka', '4', '17', '', 1),
(113, 'Kokopu', '4', '17', '', 1),
(114, 'Langs Beach', '4', '17', '', 1),
(115, 'Mangapai and Surrounds', '4', '17', '', 1),
(116, 'Marsden Point', '4', '17', '', 1),
(117, 'Matapouri', '4', '17', '', 1),
(118, 'Matarau', '4', '17', '', 1),
(119, 'Maungakaramea', '4', '17', '', 1),
(120, 'Maungatapere', '4', '17', '', 1),
(121, 'Maunu', '4', '17', '', 1),
(122, 'Morningside', '4', '17', '', 1),
(123, 'Ngunguru', '4', '17', '', 1),
(124, 'Oakleigh', '4', '17', '', 1),
(125, 'Oakura Coast', '4', '17', '', 1),
(126, 'Okara', '4', '17', '', 1),
(127, 'One Tree Point', '4', '17', '', 1),
(128, 'Onerahi', '4', '17', '', 1),
(129, 'Otaika', '4', '17', '', 1),
(130, 'Otangarei', '4', '17', '', 1),
(131, 'Parahaki', '4', '17', '', 1),
(132, 'Parua Bay', '4', '17', '', 1),
(133, 'Pataua', '4', '17', '', 1),
(134, 'Poroti', '4', '17', '', 1),
(135, 'Port Whangārei', '4', '17', '', 1),
(136, 'Portland', '4', '17', '', 1),
(137, 'Raumanga', '4', '17', '', 1),
(138, 'Regent', '4', '17', '', 1),
(139, 'Riverside', '4', '17', '', 1),
(140, 'Ruakākā', '4', '17', '', 1),
(141, 'Ruatangata', '4', '17', '', 1),
(142, 'Tamaterau', '4', '17', '', 1),
(143, 'Te Hihi Stream Estate', '4', '17', '', 1),
(144, 'Tikipunga', '4', '17', '', 1),
(145, 'Totara Parklands', '4', '17', '', 1),
(146, 'Tutukaka', '4', '17', '', 1),
(147, 'Waiotira', '4', '17', '', 1),
(148, 'Waipu', '4', '17', '', 1),
(149, 'Whakapara', '4', '17', '', 1),
(150, 'Whananaki', '4', '17', '', 1),
(151, 'Whangarei Area', '4', '17', '', 1),
(152, 'Whangarei Central', '4', '17', '', 1),
(153, 'Whangārei Heads', '4', '17', '', 1),
(154, 'Whangarei Surrounds', '4', '17', '', 1),
(155, 'Whareora', '4', '17', '', 1),
(156, 'Whau Valley', '4', '17', '', 1),
(157, 'Woodhill', '4', '17', '', 1),
(158, 'Avalon', '8', '18', '', 1),
(159, 'Bader', '8', '18', '', 1),
(160, 'Baverstock', '8', '18', '', 1),
(161, 'Beerescourt', '8', '18', '', 1),
(162, 'Burbush', '8', '18', '', 1),
(163, 'Chartwell', '8', '18', '', 1),
(164, 'Chedworth', '8', '18', '', 1),
(165, 'Claudelands', '8', '18', '', 1),
(166, 'Deanwell', '8', '18', '', 1),
(167, 'Dinsdale', '8', '18', '', 1),
(168, 'Enderley', '8', '18', '', 1),
(169, 'Fairfield', '8', '18', '', 1),
(170, 'Fairview Downs', '8', '18', '', 1),
(171, 'Fitzroy', '8', '18', '', 1),
(172, 'Flagstaff', '8', '18', '', 1),
(173, 'Forest Lake', '8', '18', '', 1),
(174, 'Frankton', '8', '18', '', 1),
(175, 'Glenview', '8', '18', '', 1),
(176, 'Grandview Heights', '8', '18', '', 1),
(177, 'Hamilton Central', '8', '18', '', 1),
(178, 'Hamilton East', '8', '18', '', 1),
(179, 'Hamilton Lake', '8', '18', '', 1),
(180, 'Hamilton Surrounds', '8', '18', '', 1),
(181, 'Harrowfield', '8', '18', '', 1),
(182, 'Hillcrest', '8', '18', '', 1),
(183, 'Huntington', '8', '18', '', 1),
(184, 'Maeroa', '8', '18', '', 1),
(185, 'Melville', '8', '18', '', 1),
(186, 'Nawton', '8', '18', '', 1),
(187, 'Northgate', '8', '18', '', 1),
(188, 'Peacocke', '8', '18', '', 1),
(189, 'Pukete', '8', '18', '', 1),
(190, 'Queenwood', '8', '18', '', 1),
(191, 'Riverlea', '8', '18', '', 1),
(192, 'Rototuna', '8', '18', '', 1),
(193, 'Rototuna North', '8', '18', '', 1),
(194, 'Ruakura', '8', '18', '', 1),
(195, 'Saint Andrews', '8', '18', '', 1),
(196, 'Silverdale', '8', '18', '', 1),
(197, 'Te Rapa', '8', '18', '', 1),
(198, 'Te Rapa Park', '8', '18', '', 1),
(199, 'Temple View', '8', '18', '', 1),
(200, 'Western Heights', '8', '18', '', 1),
(201, 'Whitiora', '8', '18', '', 1),
(202, 'Hauraki Surrounds', '8', '19', '', 1),
(203, 'Kaihere', '8', '19', '', 1),
(204, 'Karangahake', '8', '19', '', 1),
(205, 'Kerepehi', '8', '19', '', 1),
(206, 'Mangatarata', '8', '19', '', 1),
(207, 'Ngatea', '8', '19', '', 1),
(208, 'Paeroa', '8', '19', '', 1),
(209, 'Pipiroa', '8', '19', '', 1),
(210, 'Turua', '8', '19', '', 1),
(211, 'Waihi', '8', '19', '', 1),
(212, 'Waikino', '8', '19', '', 1),
(213, 'Waitakaruru', '8', '19', '', 1),
(214, 'Gordon', '8', '20', '', 1),
(215, 'Manawaru', '8', '20', '', 1),
(216, 'Matamata', '8', '20', '', 1),
(217, 'Morrinsville', '8', '20', '', 1),
(218, 'Ngarua', '8', '20', '', 1),
(219, 'Okauia', '8', '20', '', 1),
(220, 'Richmond Downs', '8', '20', '', 1),
(221, 'Tahuna', '8', '20', '', 1),
(222, 'Te Aroha', '8', '20', '', 1),
(223, 'Te Poi', '8', '20', '', 1),
(224, 'Turangaomoana', '8', '20', '', 1),
(225, 'Waharoa', '8', '20', '', 1),
(226, 'Waihou', '8', '20', '', 1),
(227, 'Waitoa', '8', '20', '', 1),
(228, 'Wardville', '8', '20', '', 1),
(229, 'Kawhia', '8', '21', '', 1),
(230, 'Maihiihi', '8', '21', '', 1),
(231, 'Ōpārau', '8', '21', '', 1),
(232, 'Otorohanga', '8', '21', '', 1),
(233, 'Otorohanga Surrounds', '8', '21', '', 1),
(234, 'Taharoa', '8', '21', '', 1),
(235, 'Arapuni', '8', '22', '', 1),
(236, 'Kinleith', '8', '22', '', 1),
(237, 'Lichfield', '8', '22', '', 1),
(238, 'Putāruru', '8', '22', '', 1),
(239, 'South Waikato Surrounds', '8', '22', '', 1),
(240, 'Tapapa', '8', '22', '', 1),
(241, 'Tīrau', '8', '22', '', 1),
(242, 'Tokoroa', '8', '22', '', 1),
(243, 'Acacia Bay', '8', '23', '', 1),
(244, 'Broadlands Forest', '8', '23', '', 1),
(245, 'Hatepe', '8', '23', '', 1),
(246, 'Hilltop', '8', '23', '', 1),
(247, 'Iwitahi', '8', '23', '', 1),
(248, 'Kinloch', '8', '23', '', 1),
(249, 'Kuratau', '8', '23', '', 1),
(250, 'Lake Taupo', '8', '23', '', 1),
(251, 'Lake Taupo East', '8', '23', '', 1),
(252, 'Lake Taupo West', '8', '23', '', 1),
(253, 'Mangakino', '8', '23', '', 1),
(254, 'Maunganamu', '8', '23', '', 1),
(255, 'Motuoapa', '8', '23', '', 1),
(256, 'Nukuhau', '8', '23', '', 1),
(257, 'Omori', '8', '23', '', 1),
(258, 'Oruanui', '8', '23', '', 1),
(259, 'Oruatua', '8', '23', '', 1),
(260, 'Pukawa', '8', '23', '', 1),
(261, 'Rainbow Point', '8', '23', '', 1),
(262, 'Rangatira Park', '8', '23', '', 1),
(263, 'Richmond Heights', '8', '23', '', 1),
(264, 'Tahorakuri', '8', '23', '', 1),
(265, 'Tauhara', '8', '23', '', 1),
(266, 'Taupō', '8', '23', '', 1),
(267, 'Taupo Surrounds', '8', '23', '', 1),
(268, 'Te Rangiita', '8', '23', '', 1),
(269, 'Tihoi', '8', '23', '', 1),
(270, 'Tokaanu', '8', '23', '', 1),
(271, 'Tūrangi', '8', '23', '', 1),
(272, 'Waipahihi', '8', '23', '', 1),
(273, 'Wairakei and Surrounds', '8', '23', '', 1),
(274, 'Waitahanui', '8', '23', '', 1),
(275, 'Waitetoko', '8', '23', '', 1),
(276, 'Whakamaru', '8', '23', '', 1),
(277, 'Whareroa', '8', '23', '', 1),
(278, 'Wharewaka', '8', '23', '', 1),
(279, 'Churchill', '8', '24', '', 1),
(280, 'Eureka', '8', '24', '', 1),
(281, 'Glen Massey', '8', '24', '', 1),
(282, 'Gordonton', '8', '24', '', 1),
(283, 'Hampton Downs', '8', '24', '', 1),
(284, 'Horotiu', '8', '24', '', 1),
(285, 'Horsham Downs', '8', '24', '', 1),
(286, 'Huntly', '8', '24', '', 1),
(287, 'Maramarua', '8', '24', '', 1),
(288, 'Matangi', '8', '24', '', 1),
(289, 'Meremere', '8', '24', '', 1),
(290, 'Newstead', '8', '24', '', 1),
(291, 'Ngāruawāhia', '8', '24', '', 1),
(292, 'Orini', '8', '24', '', 1),
(293, 'Pukemoremore', '8', '24', '', 1),
(294, 'Puketaha', '8', '24', '', 1),
(295, 'Raglan', '8', '24', '', 1),
(296, 'Rangiriri', '8', '24', '', 1),
(297, 'Rangiriri West', '8', '24', '', 1),
(298, 'Rotokauri', '8', '24', '', 1),
(299, 'Rotongaro', '8', '24', '', 1),
(300, 'Ruawaro', '8', '24', '', 1),
(301, 'Tamahere', '8', '24', '', 1),
(302, 'Taupiri', '8', '24', '', 1),
(303, 'Tauwhare', '8', '24', '', 1),
(304, 'Te Ākau', '8', '24', '', 1),
(305, 'Te Hoe', '8', '24', '', 1),
(306, 'Te Kauwhata', '8', '24', '', 1),
(307, 'Te Kowhai', '8', '24', '', 1),
(308, 'Waerenga', '8', '24', '', 1),
(309, 'Waikato Surrounds', '8', '24', '', 1),
(310, 'Waiterimu', '8', '24', '', 1),
(311, 'Whakamaru', '8', '24', '', 1),
(312, 'Whatawhata', '8', '24', '', 1),
(313, 'Whitikahu', '8', '24', '', 1),
(314, 'Cambridge', '8', '25', '', 1),
(315, 'Kaipaki', '8', '25', '', 1),
(316, 'Karamu', '8', '25', '', 1),
(317, 'Karapiro', '8', '25', '', 1),
(318, 'Kihikihi', '8', '25', '', 1),
(319, 'Leamington', '8', '25', '', 1),
(320, 'Ngāhinapōuri', '8', '25', '', 1),
(321, 'Ōhaupō', '8', '25', '', 1),
(322, 'Pirongia', '8', '25', '', 1),
(323, 'Pukeatua', '8', '25', '', 1),
(324, 'Rotoorangi', '8', '25', '', 1),
(325, 'Rukuhia', '8', '25', '', 1),
(326, 'Te Awamutu', '8', '25', '', 1),
(327, 'Te Miro', '8', '25', '', 1),
(328, 'Te Pahu', '8', '25', '', 1),
(329, 'Tokanui', '8', '25', '', 1),
(330, 'Waipa Surrounds', '8', '25', '', 1),
(331, 'Wharepapa South', '8', '25', '', 1),
(332, 'Aria', '8', '26', '', 1),
(333, 'Awakino', '8', '26', '', 1),
(334, 'Benneydale', '8', '26', '', 1),
(335, 'Mahoenui', '8', '26', '', 1),
(336, 'Marokopa', '8', '26', '', 1),
(337, 'Piopio', '8', '26', '', 1),
(338, 'Te Kuiti', '8', '26', '', 1),
(339, 'Waitomo', '8', '26', '', 1),
(340, 'Kawerau', '7', '27', '', 1),
(341, 'Opotiki and Surrounds', '7', '28', '', 1),
(342, 'Opotiki Coastal', '7', '28', '', 1),
(343, 'Opotiki Surrounds', '7', '28', '', 1),
(344, 'Te Kaha', '7', '28', '', 1),
(345, 'Waihau Bay', '7', '28', '', 1),
(346, 'Ātiamuri', '7', '29', '', 1),
(347, 'Broadlands', '7', '29', '', 1),
(348, 'Fairy Springs', '7', '29', '', 1),
(349, 'Fenton Park', '7', '29', '', 1),
(350, 'Fordlands', '7', '29', '', 1),
(351, 'Glenholme', '7', '29', '', 1),
(352, 'Hamurana', '7', '29', '', 1),
(353, 'Hannahs Bay', '7', '29', '', 1),
(354, 'Hillcrest', '7', '29', '', 1),
(355, 'Holdens Bay', '7', '29', '', 1),
(356, 'Horohoro', '7', '29', '', 1),
(357, 'Kawaha Point', '7', '29', '', 1),
(358, 'Koutu', '7', '29', '', 1),
(359, 'Lake Areas', '7', '29', '', 1),
(360, 'Lake Ōkareka', '7', '29', '', 1),
(361, 'Lake Rotoehu', '7', '29', '', 1),
(362, 'Lake Rotoiti', '7', '29', '', 1),
(363, 'Lake Rotomā', '7', '29', '', 1),
(364, 'Lake Tarawera', '7', '29', '', 1),
(365, 'Lynmore', '7', '29', '', 1),
(366, 'Mamaku', '7', '29', '', 1),
(367, 'Mangakakahi', '7', '29', '', 1),
(368, 'Mourea', '7', '29', '', 1),
(369, 'Ngakuru', '7', '29', '', 1),
(370, 'Ngapuna', '7', '29', '', 1),
(371, 'Ngongotahā', '7', '29', '', 1),
(372, 'Ohinemutu', '7', '29', '', 1),
(373, 'Okere Falls', '7', '29', '', 1),
(374, 'Ōwhata', '7', '29', '', 1),
(375, 'Pukehangi', '7', '29', '', 1),
(376, 'Reporoa and Surrounds', '7', '29', '', 1),
(377, 'Rerewhakaaitu', '7', '29', '', 1),
(378, 'Rotoiti Forest', '7', '29', '', 1),
(379, 'Rotorua Central', '7', '29', '', 1),
(380, 'Rotorua Surrounds', '7', '29', '', 1),
(381, 'Selwyn Heights', '7', '29', '', 1),
(382, 'Springfield', '7', '29', '', 1),
(383, 'Tihiotonga', '7', '29', '', 1),
(384, 'Tikitere', '7', '29', '', 1),
(385, 'Utuhina', '7', '29', '', 1),
(386, 'Victoria', '7', '29', '', 1),
(387, 'Waikite Valley', '7', '29', '', 1),
(388, 'Westbrook', '7', '29', '', 1),
(389, 'Western Heights', '7', '29', '', 1),
(390, 'Whakarewarewa', '7', '29', '', 1),
(391, 'Avenues', '7', '30', '', 1),
(392, 'Bellevue', '7', '30', '', 1),
(393, 'Bethlehem', '7', '30', '', 1),
(394, 'Brookfield', '7', '30', '', 1),
(395, 'Gate Pa', '7', '30', '', 1),
(396, 'Greerton', '7', '30', '', 1),
(397, 'Hairini', '7', '30', '', 1),
(398, 'Judea', '7', '30', '', 1),
(399, 'Matapihi', '7', '30', '', 1),
(400, 'Matua', '7', '30', '', 1),
(401, 'Maungatapu', '7', '30', '', 1),
(402, 'Mount Maunganui', '7', '30', '', 1),
(403, 'Ohauiti', '7', '30', '', 1),
(404, 'Oropi', '7', '30', '', 1),
(405, 'Otūmoetai', '7', '30', '', 1),
(406, 'Papamoa', '7', '30', '', 1),
(407, 'Parkvale', '7', '30', '', 1),
(408, 'Poike', '7', '30', '', 1),
(409, 'Pyes Pa', '7', '30', '', 1),
(410, 'Tauranga Central', '7', '30', '', 1),
(411, 'Tauranga South', '7', '30', '', 1),
(412, 'Tauranga Surrounds', '7', '30', '', 1),
(413, 'Tauriko', '7', '30', '', 1),
(414, 'Welcome Bay', '7', '30', '', 1),
(415, 'Aongatete', '7', '31', '', 1),
(416, 'Athenree', '7', '31', '', 1),
(417, 'Kaimai', '7', '31', '', 1),
(418, 'Katikati', '7', '31', '', 1),
(419, 'Maketu', '7', '31', '', 1),
(420, 'Matakana Island', '7', '31', '', 1),
(421, 'Ohauiti', '7', '31', '', 1),
(422, 'Omanawa', '7', '31', '', 1),
(423, 'Ōmokoroa', '7', '31', '', 1),
(424, 'Oropi', '7', '31', '', 1),
(425, 'Paengaroa', '7', '31', '', 1),
(426, 'Pahoia', '7', '31', '', 1),
(427, 'Pongakawa', '7', '31', '', 1),
(428, 'Pukehina', '7', '31', '', 1),
(429, 'Pyes Pa', '7', '31', '', 1),
(430, 'Tanners Point', '7', '31', '', 1),
(431, 'Te Puke', '7', '31', '', 1),
(432, 'Te Puna', '7', '31', '', 1),
(433, 'Waihi Beach', '7', '31', '', 1),
(434, 'Wairoa', '7', '31', '', 1),
(435, 'Western BOP Surrounds', '7', '31', '', 1),
(436, 'Whakamārama', '7', '31', '', 1),
(437, 'Coastlands', '7', '32', '', 1),
(438, 'Edgecumbe', '7', '32', '', 1),
(439, 'Manawahe', '7', '32', '', 1),
(440, 'Matahi', '7', '32', '', 1),
(441, 'Matatā', '7', '32', '', 1),
(442, 'Murupara', '7', '32', '', 1),
(443, 'Murupara Surrounds', '7', '32', '', 1),
(444, 'Ōhope', '7', '32', '', 1),
(445, 'Otakiri', '7', '32', '', 1),
(446, 'Rotoma', '7', '32', '', 1),
(447, 'Tāneatua', '7', '32', '', 1),
(448, 'Te Teko', '7', '32', '', 1),
(449, 'Thornton', '7', '32', '', 1),
(450, 'Waimana', '7', '32', '', 1),
(451, 'Whakatāne', '7', '32', '', 1),
(452, 'Whakatane Surrounds', '7', '32', '', 1),
(453, 'Cooks Beach', '6', '33', '', 1),
(454, 'Coroglen', '6', '33', '', 1),
(455, 'Coromandel', '6', '33', '', 1),
(456, 'Coromandel Coast', '6', '33', '', 1),
(457, 'Coromandel Surrounds', '6', '33', '', 1),
(458, 'East Coast Surrounds', '6', '33', '', 1),
(459, 'Hahei', '6', '33', '', 1),
(460, 'Hikuai', '6', '33', '', 1),
(461, 'Hikutaia', '6', '33', '', 1),
(462, 'Hot Water Beach', '6', '33', '', 1),
(463, 'Kaimarama', '6', '33', '', 1),
(464, 'Kopu', '6', '33', '', 1),
(465, 'Kūaotunu', '6', '33', '', 1),
(466, 'Matarangi', '6', '33', '', 1),
(467, 'Matatoki', '6', '33', '', 1),
(468, 'Motutapere Island', '6', '33', '', 1),
(469, 'Onemana', '6', '33', '', 1),
(470, 'Opito Bay', '6', '33', '', 1),
(471, 'Opoutere', '6', '33', '', 1),
(472, 'Pauanui', '6', '33', '', 1),
(473, 'Port Charles', '6', '33', '', 1),
(474, 'Puriri', '6', '33', '', 1),
(475, 'Tairua', '6', '33', '', 1),
(476, 'Tapu', '6', '33', '', 1),
(477, 'Te Kouma', '6', '33', '', 1),
(478, 'Te Mata', '6', '33', '', 1),
(479, 'Te Puru', '6', '33', '', 1),
(480, 'Thames', '6', '33', '', 1),
(481, 'Thames Coast', '6', '33', '', 1),
(482, 'Thames Surrounds', '6', '33', '', 1),
(483, 'Thornton Bay', '6', '33', '', 1),
(484, 'Tuateawa', '6', '33', '', 1),
(485, 'Waikawau', '6', '33', '', 1),
(486, 'Waiomu', '6', '33', '', 1),
(487, 'Waitete Bay', '6', '33', '', 1),
(488, 'Whakatete Bay', '6', '33', '', 1),
(489, 'Whangamatā', '6', '33', '', 1),
(490, 'Whangapoua', '6', '33', '', 1),
(491, 'Whenuakite', '6', '33', '', 1),
(492, 'Whiritoa', '6', '33', '', 1),
(493, 'Whitianga', '6', '33', '', 1),
(494, 'Awapuni', '9', '34', '', 1),
(495, 'East Cape', '9', '34', '', 1),
(496, 'Elgin', '9', '34', '', 1),
(497, 'Gisborne', '9', '34', '', 1),
(498, 'Gisborne City Surrounds', '9', '34', '', 1),
(499, 'Gisborne Coastal', '9', '34', '', 1),
(500, 'Gisborne Country', '9', '34', '', 1),
(501, 'Hexton', '9', '34', '', 1),
(502, 'Hicks Bay', '9', '34', '', 1),
(503, 'Inner Kaiti', '9', '34', '', 1),
(504, 'Kaiti', '9', '34', '', 1),
(505, 'Lytton West', '9', '34', '', 1),
(506, 'Makaraka', '9', '34', '', 1),
(507, 'Mangapapa', '9', '34', '', 1),
(508, 'Manutuke', '9', '34', '', 1),
(509, 'Matawai', '9', '34', '', 1),
(510, 'Matawhero', '9', '34', '', 1),
(511, 'Matokitoki', '9', '34', '', 1),
(512, 'Muriwai', '9', '34', '', 1),
(513, 'Ngatapa', '9', '34', '', 1),
(514, 'Okitu', '9', '34', '', 1),
(515, 'Ormond', '9', '34', '', 1),
(516, 'Outer Kaiti', '9', '34', '', 1),
(517, 'Patutahi', '9', '34', '', 1),
(518, 'Pehiri', '9', '34', '', 1),
(519, 'Pouawa', '9', '34', '', 1),
(520, 'Riverdale', '9', '34', '', 1),
(521, 'Ruatoria and Surrounds', '9', '34', '', 1),
(522, 'Tamarau', '9', '34', '', 1),
(523, 'Taruheru', '9', '34', '', 1),
(524, 'Te Araroa', '9', '34', '', 1),
(525, 'Te Hapara', '9', '34', '', 1),
(526, 'Te Karaka', '9', '34', '', 1),
(527, 'Tiniroto', '9', '34', '', 1),
(528, 'Tokomaru Bay', '9', '34', '', 1),
(529, 'Tolaga Bay', '9', '34', '', 1),
(530, 'Wainui', '9', '34', '', 1),
(531, 'Waipaoa', '9', '34', '', 1),
(532, 'Whangara', '9', '34', '', 1),
(533, 'Whatatutu', '9', '34', '', 1),
(534, 'Whataupoko', '9', '34', '', 1),
(535, 'Kakahi', '10', '35', '', 1),
(536, 'Manunui', '10', '35', '', 1),
(537, 'National Park', '10', '35', '', 1),
(538, 'Ohakune', '10', '35', '', 1),
(539, 'Ōhura', '10', '35', '', 1),
(540, 'Ōwhango', '10', '35', '', 1),
(541, 'Raetihi', '10', '35', '', 1),
(542, 'Ruapehu-King Country Surrounds', '10', '35', '', 1),
(543, 'Taumarunui', '10', '35', '', 1),
(544, 'Tongariro', '10', '35', '', 1),
(545, 'Waimiha-Ongarue', '10', '35', '', 1),
(546, 'Waiouru', '10', '35', '', 1),
(547, 'Central Hawke\'s Bay Coastal', '11', '36', '', 1),
(548, 'Central Hawke\'s Bay Country', '11', '36', '', 1),
(549, 'Elsthorpe', '11', '36', '', 1),
(550, 'Mangaorapa', '11', '36', '', 1),
(551, 'Ongaonga', '11', '36', '', 1),
(552, 'Ormondville', '11', '36', '', 1),
(553, 'Ōtāne', '11', '36', '', 1),
(554, 'Pōrangahau', '11', '36', '', 1),
(555, 'Takapau', '11', '36', '', 1),
(556, 'Tikokino', '11', '36', '', 1),
(557, 'Waipawa', '11', '36', '', 1),
(558, 'Waipukurau and Surrounds', '11', '36', '', 1),
(559, 'Akina', '11', '37', '', 1),
(560, 'Bridge Pa', '11', '37', '', 1),
(561, 'Camberley', '11', '37', '', 1),
(562, 'Clive', '11', '37', '', 1),
(563, 'Crownthorpe', '11', '37', '', 1),
(564, 'Dartmoor', '11', '37', '', 1),
(565, 'Eskdale', '11', '37', '', 1),
(566, 'Fernhill', '11', '37', '', 1),
(567, 'Flaxmere', '11', '37', '', 1),
(568, 'Frimley', '11', '37', '', 1),
(569, 'Glengarry', '11', '37', '', 1),
(570, 'Hastings', '11', '37', '', 1),
(571, 'Hastings Country', '11', '37', '', 1),
(572, 'Haumoana', '11', '37', '', 1),
(573, 'Havelock North', '11', '37', '', 1),
(574, 'Hawke\'s Bay Area', '11', '37', '', 1),
(575, 'Karamu', '11', '37', '', 1),
(576, 'Kuripapango', '11', '37', '', 1),
(577, 'Longlands', '11', '37', '', 1),
(578, 'Mahora', '11', '37', '', 1),
(579, 'Mangateretere', '11', '37', '', 1),
(580, 'Maraekakaho', '11', '37', '', 1),
(581, 'Mayfair', '11', '37', '', 1),
(582, 'Omahu', '11', '37', '', 1),
(583, 'Otamauri', '11', '37', '', 1),
(584, 'Pakipaki', '11', '37', '', 1),
(585, 'Pakowhai', '11', '37', '', 1),
(586, 'Parkvale', '11', '37', '', 1),
(587, 'Poukawa', '11', '37', '', 1),
(588, 'Puketapu', '11', '37', '', 1),
(589, 'Puketitiri', '11', '37', '', 1),
(590, 'Raureka', '11', '37', '', 1),
(591, 'Roys Hill', '11', '37', '', 1),
(592, 'Saint Leonards', '11', '37', '', 1),
(593, 'Sherenden', '11', '37', '', 1),
(594, 'Tangoio', '11', '37', '', 1),
(595, 'Te Awanga', '11', '37', '', 1),
(596, 'Te Haroto', '11', '37', '', 1),
(597, 'Tomoana', '11', '37', '', 1),
(598, 'Tutira', '11', '37', '', 1),
(599, 'Twyford', '11', '37', '', 1),
(600, 'Waimārama', '11', '37', '', 1),
(601, 'Waipatu', '11', '37', '', 1),
(602, 'Waiwhare', '11', '37', '', 1),
(603, 'Whakatu', '11', '37', '', 1),
(604, 'Whanawhana', '11', '37', '', 1),
(605, 'Woolwich', '11', '37', '', 1),
(606, 'Ahuriri', '11', '38', '', 1),
(607, 'Awatoto', '11', '38', '', 1),
(608, 'Bay View', '11', '38', '', 1),
(609, 'Bluff Hill', '11', '38', '', 1),
(610, 'Greenmeadows', '11', '38', '', 1),
(611, 'Hospital Hill', '11', '38', '', 1),
(612, 'Jervoistown', '11', '38', '', 1),
(613, 'Maraenui', '11', '38', '', 1),
(614, 'Marewa', '11', '38', '', 1),
(615, 'Meeanee', '11', '38', '', 1),
(616, 'Napier Airport', '11', '38', '', 1),
(617, 'Napier Central', '11', '38', '', 1),
(618, 'Napier City Surrounds', '11', '38', '', 1),
(619, 'Napier Hill', '11', '38', '', 1),
(620, 'Napier Port', '11', '38', '', 1),
(621, 'Napier South', '11', '38', '', 1),
(622, 'Onekawa', '11', '38', '', 1),
(623, 'Pandora', '11', '38', '', 1),
(624, 'Pirimai', '11', '38', '', 1),
(625, 'Poraiti', '11', '38', '', 1),
(626, 'Tamatea', '11', '38', '', 1),
(627, 'Taradale', '11', '38', '', 1),
(628, 'Te Awa', '11', '38', '', 1),
(629, 'Westshore', '11', '38', '', 1),
(630, 'Kotemaori', '11', '39', '', 1),
(631, 'Māhia', '11', '39', '', 1),
(632, 'Nuhaka/Morere', '11', '39', '', 1),
(633, 'Raupunga', '11', '39', '', 1),
(634, 'Ruakituri', '11', '39', '', 1),
(635, 'Tuai/Ohuka', '11', '39', '', 1),
(636, 'Wairoa', '11', '39', '', 1),
(637, 'Wairoa Country', '11', '39', '', 1),
(638, 'Bell Block', '12', '40', '', 1),
(639, 'Blagdon', '12', '40', '', 1),
(640, 'Brooklands', '12', '40', '', 1),
(641, 'Egmont Village', '12', '40', '', 1),
(642, 'Ferndale', '12', '40', '', 1),
(643, 'Fitzroy', '12', '40', '', 1),
(644, 'Frankleigh Park', '12', '40', '', 1),
(645, 'Glen Avon', '12', '40', '', 1),
(646, 'Highlands Park', '12', '40', '', 1),
(647, 'Hillsborough', '12', '40', '', 1),
(648, 'Hurdon', '12', '40', '', 1),
(649, 'Hurford', '12', '40', '', 1),
(650, 'Hurworth', '12', '40', '', 1),
(651, 'Inglewood', '12', '40', '', 1),
(652, 'Kaimiro', '12', '40', '', 1),
(653, 'Korito', '12', '40', '', 1),
(654, 'Koru', '12', '40', '', 1),
(655, 'Lepperton', '12', '40', '', 1),
(656, 'Lynmouth', '12', '40', '', 1),
(657, 'Mangorei', '12', '40', '', 1),
(658, 'Marfell', '12', '40', '', 1),
(659, 'Merrilands', '12', '40', '', 1),
(660, 'Mokau', '12', '40', '', 1),
(661, 'Motumahanga (Saddleback)', '12', '40', '', 1),
(662, 'Moturoa', '12', '40', '', 1),
(663, 'New Plymouth Area Surrounds', '12', '40', '', 1),
(664, 'New Plymouth Central', '12', '40', '', 1),
(665, 'New Plymouth City Surrounds', '12', '40', '', 1),
(666, 'New Plymouth Coastal', '12', '40', '', 1),
(667, 'Norfolk', '12', '40', '', 1),
(668, 'Ōakura', '12', '40', '', 1),
(669, 'Ōkato', '12', '40', '', 1),
(670, 'Okoki', '12', '40', '', 1),
(671, 'Omata', '12', '40', '', 1),
(672, 'Onaero', '12', '40', '', 1),
(673, 'Pukeiti', '12', '40', '', 1),
(674, 'Spotswood', '12', '40', '', 1),
(675, 'Strandon', '12', '40', '', 1),
(676, 'Tarata', '12', '40', '', 1),
(677, 'Tariki', '12', '40', '', 1),
(678, 'Tarurutangi', '12', '40', '', 1),
(679, 'Tikorangi', '12', '40', '', 1),
(680, 'Tongapōrutu', '12', '40', '', 1),
(681, 'Urenui', '12', '40', '', 1),
(682, 'Uruti', '12', '40', '', 1),
(683, 'Vogeltown', '12', '40', '', 1),
(684, 'Waitara', '12', '40', '', 1),
(685, 'Waiwhakaiho', '12', '40', '', 1),
(686, 'Welbourn', '12', '40', '', 1),
(687, 'Westown', '12', '40', '', 1),
(688, 'Whalers Gate', '12', '40', '', 1),
(689, 'Eltham', '12', '41', '', 1),
(690, 'Hāwera', '12', '41', '', 1),
(691, 'Kaponga', '12', '41', '', 1),
(692, 'Manaia', '12', '41', '', 1),
(693, 'Manutahi', '12', '41', '', 1),
(694, 'Matemateaonga', '12', '41', '', 1),
(695, 'Normanby', '12', '41', '', 1),
(696, 'Ohangai', '12', '41', '', 1),
(697, 'Okaiawa', '12', '41', '', 1),
(698, 'Ōpunake', '12', '41', '', 1),
(699, 'Patea', '12', '41', '', 1),
(700, 'Rahotu', '12', '41', '', 1),
(701, 'South Taranaki Surrounds', '12', '41', '', 1),
(702, 'Waitōtara', '12', '41', '', 1),
(703, 'Waverley', '12', '41', '', 1),
(704, 'Cardiff5', '12', '42', '', 1),
(705, 'Douglas', '12', '42', '', 1),
(706, 'Mahoe', '12', '42', '', 1),
(707, 'Midhirst', '12', '42', '', 1),
(708, 'Pembroke', '12', '42', '', 1),
(709, 'Pohokura and Surrounds', '12', '42', '', 1),
(710, 'Stratford', '12', '42', '', 1),
(711, 'Stratford Surrounds', '12', '42', '', 1),
(712, 'Tahora', '12', '42', '', 1),
(713, 'Foxton', '13', '43', '', 1),
(714, 'Foxton Beach', '13', '43', '', 1),
(715, 'Hokio Beach', '13', '43', '', 1),
(716, 'Horowhenua Surrounds', '13', '43', '', 1),
(717, 'Levin', '13', '43', '', 1),
(718, 'Manakau', '13', '43', '', 1),
(719, 'Moutoa', '13', '43', '', 1),
(720, 'Ōhau', '13', '43', '', 1),
(721, 'Shannon', '13', '43', '', 1),
(722, 'Tokomaru', '13', '43', '', 1),
(723, 'Waikawa Beach', '13', '43', '', 1),
(724, 'Waitārere', '13', '43', '', 1),
(725, 'Waitārere', '13', '43', '', 1),
(726, 'Āpiti0', '13', '44', '', 1),
(727, 'Bunnythorpe', '13', '44', '', 1),
(728, 'Cheltenham', '13', '44', '', 1),
(729, 'Feilding', '13', '44', '', 1),
(730, 'Halcombe', '13', '44', '', 1),
(731, 'Himatangi', '13', '44', '', 1),
(732, 'Himatangi Beach', '13', '44', '', 1),
(733, 'Kairanga', '13', '44', '', 1),
(734, 'Kimbolton', '13', '44', '', 1),
(735, 'Manawatu Surrounds', '13', '44', '', 1),
(736, 'Newbury', '13', '44', '', 1),
(737, 'Ohakea', '13', '44', '', 1),
(738, 'Ōhingaiti', '13', '44', '', 1),
(739, 'Opiki', '13', '44', '', 1),
(740, 'Pohangina', '13', '44', '', 1),
(741, 'Rangiwahia', '13', '44', '', 1),
(742, 'Rongotea', '13', '44', '', 1),
(743, 'Sanson', '13', '44', '', 1),
(744, 'Tangimoana', '13', '44', '', 1),
(745, 'Tiakitahuna', '13', '44', '', 1),
(746, 'Waituna West', '13', '44', '', 1),
(747, 'Aokautere', '13', '45', '', 1),
(748, 'Ashhurst', '13', '45', '', 1),
(749, 'Awapuni', '13', '45', '', 1),
(750, 'Cloverlea', '13', '45', '', 1),
(751, 'Fitzherbert', '13', '45', '', 1),
(752, 'Highbury', '13', '45', '', 1),
(753, 'Hokowhitu', '13', '45', '', 1),
(754, 'Kelvin Grove', '13', '45', '', 1),
(755, 'Linton', '13', '45', '', 1),
(756, 'Longburn', '13', '45', '', 1),
(757, 'Massey University', '13', '45', '', 1),
(758, 'Milson', '13', '45', '', 1),
(759, 'Palmerston North Central', '13', '45', '', 1),
(760, 'Palmerston North Surrounds', '13', '45', '', 1),
(761, 'Parklands', '13', '45', '', 1),
(762, 'Riverdale', '13', '45', '', 1),
(763, 'Roslyn', '13', '45', '', 1),
(764, 'Summerhill', '13', '45', '', 1),
(765, 'Takaro', '13', '45', '', 1),
(766, 'Terrace End', '13', '45', '', 1),
(767, 'Turitea', '13', '45', '', 1),
(768, 'West End', '13', '45', '', 1),
(769, 'Westbrook', '13', '45', '', 1),
(770, 'Whakarongo', '13', '45', '', 1),
(771, 'Bulls', '13', '46', '', 1),
(772, 'Hunterville', '13', '46', '', 1),
(773, 'Koitiata', '13', '46', '', 1),
(774, 'Lake Alice', '13', '46', '', 1),
(775, 'Mangaweka', '13', '46', '', 1),
(776, 'Marton', '13', '46', '', 1),
(777, 'Parewanui', '13', '46', '', 1),
(778, 'Rangitikei Surrounds', '13', '46', '', 1),
(779, 'Rātana', '13', '46', '', 1),
(780, 'Taihape and Surrounds', '13', '46', '', 1),
(781, 'Turakina', '13', '46', '', 1),
(782, 'Dannevirke', '13', '47', '', 1),
(783, 'Eketāhuna', '13', '47', '', 1),
(784, 'Norsewood', '13', '47', '', 1),
(785, 'Pahiatua', '13', '47', '', 1),
(786, 'Pongaroa', '13', '47', '', 1),
(787, 'Tīraumea', '13', '47', '', 1),
(788, 'Woodville', '13', '47', '', 1),
(789, 'Horowhenua', '13', '48', '', 1),
(790, 'Manawatu', '13', '48', '', 1),
(791, 'Palmerston North City', '13', '48', '', 1),
(792, 'Rangitikei', '13', '48', '', 1),
(793, 'Tararua', '13', '48', '', 1),
(794, 'Whanganui', '13', '48', '', 1),
(795, 'Carterton', '14', '49', '', 1),
(796, 'Carterton Surrounds', '14', '49', '', 1),
(797, 'Gladstone', '14', '49', '', 1),
(798, 'Te Wharau', '14', '49', '', 1),
(799, 'Bideford', '14', '50', '', 1),
(800, 'Blairlogie', '14', '50', '', 1),
(801, 'Castlepoint', '14', '50', '', 1),
(802, 'Kiriwhakapapa', '14', '50', '', 1),
(803, 'Lansdowne', '14', '50', '', 1),
(804, 'Mangapakeha', '14', '50', '', 1),
(805, 'Masterton Suburb', '14', '50', '', 1),
(806, 'Masterton Surrounds', '14', '50', '', 1),
(807, 'Matahiwi', '14', '50', '', 1),
(808, 'Mataikona', '14', '50', '', 1),
(809, 'Mauriceville', '14', '50', '', 1),
(810, 'Ōpaki', '14', '50', '', 1),
(811, 'Otahome', '14', '50', '', 1),
(812, 'Riversdale Beach', '14', '50', '', 1),
(813, 'Solway', '14', '50', '', 1),
(814, 'Te Whiti', '14', '50', '', 1),
(815, 'Tīnui', '14', '50', '', 1),
(816, 'Upper Plain', '14', '50', '', 1),
(817, 'Wainuioru', '14', '50', '', 1),
(818, 'Whangaehu', '14', '50', '', 1),
(819, 'Cape Palliser', '14', '51', '', 1),
(820, 'Featherston', '14', '51', '', 1),
(821, 'Greytown', '14', '51', '', 1),
(822, 'Hinakura', '14', '51', '', 1),
(823, 'Lake Ferry', '14', '51', '', 1),
(824, 'Martinborough', '14', '51', '', 1),
(825, 'Pirinoa', '14', '51', '', 1),
(826, 'Tora', '14', '51', '', 1),
(827, 'Tuturumuri', '14', '51', '', 1),
(828, 'Kapiti Coast Surrounds', '15', '52', '', 1),
(829, 'Otaihanga', '15', '52', '', 1),
(830, 'Ōtaki', '15', '52', '', 1),
(831, 'Ōtaki Beach', '15', '52', '', 1),
(832, 'Paekākāriki', '15', '52', '', 1),
(833, 'Paraparaumu', '15', '52', '', 1),
(834, 'Paraparaumu Beach', '15', '52', '', 1),
(835, 'Peka Peka', '15', '52', '', 1),
(836, 'Raumati Beach', '15', '52', '', 1),
(837, 'Raumati South', '15', '52', '', 1),
(838, 'Te Horo', '15', '52', '', 1),
(839, 'Waikanae', '15', '52', '', 1),
(840, 'Waikanae Beach', '15', '52', '', 1),
(841, 'Alicetown', '15', '53', '', 1),
(842, 'Avalon', '15', '53', '', 1),
(843, 'Belmont', '15', '53', '', 1),
(844, 'Boulcott', '15', '53', '', 1),
(845, 'Central Hutt', '15', '53', '', 1),
(846, 'Days Bay', '15', '53', '', 1),
(847, 'Eastbourne', '15', '53', '', 1),
(848, 'Epuni', '15', '53', '', 1),
(849, 'Fairfield', '15', '53', '', 1),
(850, 'Gracefield', '15', '53', '', 1),
(851, 'Harbour View', '15', '53', '', 1),
(852, 'Haywards', '15', '53', '', 1),
(853, 'Hutt Valley Surrounds', '15', '53', '', 1),
(854, 'Kelson', '15', '53', '', 1),
(855, 'Korokoro', '15', '53', '', 1),
(856, 'Lower Hutt', '15', '53', '', 1),
(857, 'Lowry Bay', '15', '53', '', 1),
(858, 'Māhina Bay', '15', '53', '', 1),
(859, 'Manor Park', '15', '53', '', 1),
(860, 'Maungaraki', '15', '53', '', 1),
(861, 'Melling', '15', '53', '', 1),
(862, 'Moera', '15', '53', '', 1),
(863, 'Naenae', '15', '53', '', 1),
(864, 'Normandale', '15', '53', '', 1),
(865, 'Pencarrow Head', '15', '53', '', 1),
(866, 'Petone', '15', '53', '', 1),
(867, 'Point Howard', '15', '53', '', 1),
(868, 'Seaview', '15', '53', '', 1),
(869, 'Sorrento Bay', '15', '53', '', 1),
(870, 'Stokes Valley', '15', '53', '', 1),
(871, 'Taitā', '15', '53', '', 1),
(872, 'Tirohanga', '15', '53', '', 1),
(873, 'Wainuiomata', '15', '53', '', 1),
(874, 'Waiwhetu', '15', '53', '', 1),
(875, 'Waterloo', '15', '53', '', 1),
(876, 'Woburn', '15', '53', '', 1),
(877, 'York Bay', '15', '53', '', 1),
(878, 'Aotea', '15', '54', '', 1),
(879, 'Ascot Park', '15', '54', '', 1),
(880, 'Camborne', '15', '54', '', 1),
(881, 'Cannons Creek', '15', '54', '', 1),
(882, 'Elsdon', '15', '54', '', 1),
(883, 'Judgeford', '15', '54', '', 1),
(884, 'Mana', '15', '54', '', 1),
(885, 'Papakōwhai', '15', '54', '', 1),
(886, 'Paremata', '15', '54', '', 1),
(887, 'Pāuatahanui', '15', '54', '', 1),
(888, 'Plimmerton', '15', '54', '', 1),
(889, 'Porirua', '15', '54', '', 1),
(890, 'Porirua East', '15', '54', '', 1),
(891, 'Pukerua Bay', '15', '54', '', 1),
(892, 'Ranui Heights', '15', '54', '', 1),
(893, 'Takapūwāhia', '15', '54', '', 1),
(894, 'Tītahi Bay', '15', '54', '', 1),
(895, 'Waitangirua', '15', '54', '', 1),
(896, 'Whitby', '15', '54', '', 1),
(897, 'Akatarawa', '15', '55', '', 1),
(898, 'Birchville', '15', '55', '', 1),
(899, 'Blue Mountains', '15', '55', '', 1),
(900, 'Brown Owl', '15', '55', '', 1),
(901, 'Clouston Park', '15', '55', '', 1),
(902, 'Craigs Flat', '15', '55', '', 1),
(903, 'Ebdentown', '15', '55', '', 1),
(904, 'Elderslea', '15', '55', '', 1),
(905, 'Heretaunga', '15', '55', '', 1),
(906, 'Kaitoke', '15', '55', '', 1),
(907, 'Kingsley Heights', '15', '55', '', 1),
(908, 'Mangaroa', '15', '55', '', 1),
(909, 'Maoribank', '15', '55', '', 1),
(910, 'Maymorn', '15', '55', '', 1),
(911, 'Moonshine Valley', '15', '55', '', 1),
(912, 'Mount Marua', '15', '55', '', 1),
(913, 'Pakuratahi', '15', '55', '', 1),
(914, 'Pinehaven', '15', '55', '', 1),
(915, 'Rimutaka Hill', '15', '55', '', 1),
(916, 'Riverstone Terraces', '15', '55', '', 1),
(917, 'Silverstream', '15', '55', '', 1),
(918, 'Te Mārua', '15', '55', '', 1),
(919, 'Timberlea', '15', '55', '', 1),
(920, 'Totara Park', '15', '55', '', 1),
(921, 'Trentham', '15', '55', '', 1),
(922, 'Upper Hutt', '15', '55', '', 1),
(923, 'Upper Hutt Surrounds', '15', '55', '', 1),
(924, 'Wallaceville', '15', '55', '', 1),
(925, 'Whitemans Valley', '15', '55', '', 1),
(926, 'Aro Valley', '15', '56', '', 1),
(927, 'Berhampore', '15', '56', '', 1),
(928, 'Breaker Bay', '15', '56', '', 1),
(929, 'Broadmeadows', '15', '56', '', 1),
(930, 'Brooklyn', '15', '56', '', 1),
(931, 'Churton Park', '15', '56', '', 1),
(932, 'Crofton Downs', '15', '56', '', 1),
(933, 'Glenside', '15', '56', '', 1),
(934, 'Grenada North', '15', '56', '', 1),
(935, 'Grenada Village', '15', '56', '', 1),
(936, 'Hataitai', '15', '56', '', 1),
(937, 'Highbury', '15', '56', '', 1),
(938, 'Horokiwi', '15', '56', '', 1),
(939, 'Houghton Bay', '15', '56', '', 1),
(940, 'Island Bay', '15', '56', '', 1),
(941, 'Johnsonville', '15', '56', '', 1),
(942, 'Kaiwharawhara', '15', '56', '', 1),
(943, 'Karaka Bays', '15', '56', '', 1),
(944, 'Karori', '15', '56', '', 1),
(945, 'Kelburn', '15', '56', '', 1),
(946, 'Khandallah', '15', '56', '', 1),
(947, 'Kilbirnie', '15', '56', '', 1),
(948, 'Kingston', '15', '56', '', 1),
(949, 'Lyall Bay', '15', '56', '', 1),
(950, 'Mākara', '15', '56', '', 1),
(951, 'Maupuia', '15', '56', '', 1),
(952, 'Melrose', '15', '56', '', 1),
(953, 'Miramar', '15', '56', '', 1),
(954, 'Mornington', '15', '56', '', 1),
(955, 'Mount Cook', '15', '56', '', 1),
(956, 'Mount Victoria', '15', '56', '', 1),
(957, 'Newlands', '15', '56', '', 1),
(958, 'Newtown', '15', '56', '', 1),
(959, 'Ngaio', '15', '56', '', 1),
(960, 'Ngauranga', '15', '56', '', 1),
(961, 'Northland', '15', '56', '', 1),
(962, 'Ohariu', '15', '56', '', 1),
(963, 'Oriental Bay', '15', '56', '', 1),
(964, 'Ōwhiro Bay', '15', '56', '', 1),
(965, 'Paparangi', '15', '56', '', 1),
(966, 'Rongotai', '15', '56', '', 1),
(967, 'Roseneath', '15', '56', '', 1),
(968, 'Seatoun', '15', '56', '', 1),
(969, 'Southgate', '15', '56', '', 1),
(970, 'Strathmore Park', '15', '56', '', 1),
(971, 'Tawa', '15', '56', '', 1),
(972, 'Te Aro', '15', '56', '', 1),
(973, 'Thorndon', '15', '56', '', 1),
(974, 'Vogeltown', '15', '56', '', 1),
(975, 'Wadestown', '15', '56', '', 1),
(976, 'Wellington Central', '15', '56', '', 1),
(977, 'Wilton', '15', '56', '', 1),
(978, 'Woodridge', '15', '56', '', 1),
(979, 'Clarence', '16', '58', '', 1),
(980, 'Hapuku', '16', '58', '', 1),
(981, 'Kaikōura', '16', '58', '', 1),
(982, 'Kaikoura Surrounds', '16', '58', '', 1),
(983, 'Oaro', '16', '58', '', 1),
(984, 'Stag And Spey', '16', '58', '', 1),
(985, 'Anakiwa and Surrounds', '16', '59', '', 1),
(986, 'Awatere Valley', '16', '59', '', 1),
(987, 'Blenheim', '16', '59', '', 1),
(988, 'Blenheim Central', '16', '59', '', 1),
(989, 'Burleigh', '16', '59', '', 1),
(990, 'Fairhall', '16', '59', '', 1),
(991, 'Grovetown', '16', '59', '', 1),
(992, 'Havelock', '16', '59', '', 1),
(993, 'Islington', '16', '59', '', 1),
(994, 'Kenepuru Sound', '16', '59', '', 1),
(995, 'Mahau Sound', '16', '59', '', 1),
(996, 'Marlborough Country', '16', '59', '', 1),
(997, 'Marlborough Sounds', '16', '59', '', 1),
(998, 'Mayfield', '16', '59', '', 1),
(999, 'Ōkiwi Bay', '16', '59', '', 1),
(1000, 'Omaka', '16', '59', '', 1),
(1001, 'Oyster Bay', '16', '59', '', 1),
(1002, 'Pelorus Sounds', '16', '59', '', 1),
(1003, 'Picton', '16', '59', '', 1),
(1004, 'Port Underwood', '16', '59', '', 1),
(1005, 'Queen Charlotte Sound', '16', '59', '', 1),
(1006, 'Rai Valley', '16', '59', '', 1),
(1007, 'Rapaura', '16', '59', '', 1),
(1008, 'Rarangi', '16', '59', '', 1),
(1009, 'Redwood Pass', '16', '59', '', 1),
(1010, 'Redwoodtown', '16', '59', '', 1),
(1011, 'Renwick', '16', '59', '', 1),
(1012, 'Riverlands', '16', '59', '', 1),
(1013, 'Riversdale', '16', '59', '', 1),
(1014, 'Seddon', '16', '59', '', 1),
(1015, 'Spring Creek', '16', '59', '', 1),
(1016, 'Springlands', '16', '59', '', 1),
(1017, 'Stephens Island (Takapourewa', '16', '59', '', 1),
(1018, 'Tennyson Inlet', '16', '59', '', 1),
(1019, 'Tuamarina', '16', '59', '', 1),
(1020, 'Waihopai Valley', '16', '59', '', 1),
(1021, 'Waikawa', '16', '59', '', 1),
(1022, 'Wairau Valley', '16', '59', '', 1),
(1023, 'Ward', '16', '59', '', 1),
(1024, 'Witherlea', '16', '59', '', 1),
(1025, 'Woodbourne', '16', '59', '', 1),
(1026, 'Annesbrook', '17', '60', '', 1),
(1027, 'Atawhai', '17', '60', '', 1),
(1028, 'Beachville', '17', '60', '', 1),
(1029, 'Bishopdale', '17', '60', '', 1),
(1030, 'Britannia Heights', '17', '60', '', 1),
(1031, 'Cable Bay', '17', '60', '', 1),
(1032, 'Delaware Bay', '17', '60', '', 1),
(1033, 'Enner Glynn', '17', '60', '', 1),
(1034, 'Glenduan', '17', '60', '', 1),
(1035, 'Hira', '17', '60', '', 1),
(1036, 'Maitai', '17', '60', '', 1),
(1037, 'Marybank', '17', '60', '', 1),
(1038, 'Moana', '17', '60', '', 1),
(1039, 'Monaco', '17', '60', '', 1),
(1040, 'Nelson City', '17', '60', '', 1),
(1041, 'Nelson South', '17', '60', '', 1),
(1042, 'Nelson Surrounds', '17', '60', '', 1),
(1043, 'Port Nelson', '17', '60', '', 1),
(1044, 'Stepneyville', '17', '60', '', 1),
(1045, 'Stoke', '17', '60', '', 1),
(1046, 'Tāhunanui', '17', '60', '', 1),
(1047, 'The Brook', '17', '60', '', 1),
(1048, 'The Wood', '17', '60', '', 1),
(1049, 'Todds Valley', '17', '60', '', 1),
(1050, 'Toi Toi', '17', '60', '', 1),
(1051, 'Wakapuaka', '17', '60', '', 1),
(1052, 'Wakatu', '17', '60', '', 1),
(1053, 'Washington Valley', '17', '60', '', 1),
(1054, 'Whangamoa', '17', '60', '', 1),
(1055, 'Abel Tasman', '17', '61', '', 1),
(1056, 'Aniseed Valley', '17', '61', '', 1),
(1057, 'Appleby', '17', '61', '', 1),
(1058, 'Atapo', '17', '61', '', 1),
(1059, 'Brightwater', '17', '61', '', 1),
(1060, 'Brooklyn', '17', '61', '', 1),
(1061, 'Collingwood', '17', '61', '', 1),
(1062, 'Dovedale', '17', '61', '', 1),
(1063, 'Golden Downs', '17', '61', '', 1),
(1064, 'Hope', '17', '61', '', 1),
(1065, 'Kaiteriteri', '17', '61', '', 1),
(1066, 'Lower Moutere', '17', '61', '', 1),
(1067, 'Mahana', '17', '61', '', 1),
(1068, 'Māpua', '17', '61', '', 1),
(1069, 'Motueka', '17', '61', '', 1),
(1070, 'Murchison', '17', '61', '', 1),
(1071, 'Nelson Bays Coastal', '17', '61', '', 1),
(1072, 'Nelson Country', '17', '61', '', 1),
(1073, 'Ngātīmoti', '17', '61', '', 1),
(1074, 'Parapara', '17', '61', '', 1),
(1075, 'Redwood Valley', '17', '61', '', 1),
(1076, 'Richmond', '17', '61', '', 1),
(1077, 'Ruby Bay', '17', '61', '', 1),
(1078, 'St Arnaud', '17', '61', '', 1),
(1079, 'Tākaka', '17', '61', '', 1),
(1080, 'Tapawera', '17', '61', '', 1),
(1081, 'Tasman', '17', '61', '', 1),
(1082, 'Thorpe', '17', '61', '', 1),
(1083, 'Upper Moutere', '17', '61', '', 1),
(1084, 'Wakefield', '17', '61', '', 1),
(1085, 'Woodstock', '17', '61', '', 1),
(1086, 'Buller Surrounds', '18', '62', '', 1),
(1087, 'Cape Foulwind', '18', '62', '', 1),
(1088, 'Carters Beach', '18', '62', '', 1),
(1089, 'Charleston', '18', '62', '', 1),
(1090, 'Denniston', '18', '62', '', 1),
(1091, 'Hector', '18', '62', '', 1),
(1092, 'Inangahua', '18', '62', '', 1),
(1093, 'Kahurangi National Park', '18', '62', '', 1),
(1094, 'Karamea', '18', '62', '', 1),
(1095, 'Punakaiki', '18', '62', '', 1),
(1096, 'Reefton', '18', '62', '', 1),
(1097, 'Seddonville', '18', '62', '', 1),
(1098, 'Stockton', '18', '62', '', 1),
(1099, 'Waimangaroa', '18', '62', '', 1),
(1100, 'Westport', '18', '62', '', 1),
(1101, 'Westport Surrounds', '18', '62', '', 1),
(1102, 'Ahaura', '18', '63', '', 1),
(1103, 'Atarau', '18', '63', '', 1),
(1104, 'Barrytown', '18', '63', '', 1),
(1105, 'Blackball', '18', '63', '', 1),
(1106, 'Blaketown', '18', '63', '', 1),
(1107, 'Coal Creek', '18', '63', '', 1),
(1108, 'Cobden', '18', '63', '', 1),
(1109, 'Dobson', '18', '63', '', 1),
(1110, 'Dunollie', '18', '63', '', 1),
(1111, 'Gladstone', '18', '63', '', 1),
(1112, 'Greymouth', '18', '63', '', 1),
(1113, 'Greymouth Surrounds', '18', '63', '', 1),
(1114, 'Haupiri', '18', '63', '', 1),
(1115, 'Hohonu', '18', '63', '', 1),
(1116, 'Ikamatua', '18', '63', '', 1),
(1117, 'Kaiata', '18', '63', '', 1),
(1118, 'Karoro', '18', '63', '', 1),
(1119, 'Marsden', '18', '63', '', 1),
(1120, 'Moana / Lake Brunner', '18', '63', '', 1),
(1121, 'Ngahere', '18', '63', '', 1),
(1122, 'Nine Mile', '18', '63', '', 1),
(1123, 'Paroa', '18', '63', '', 1),
(1124, 'Point Elizabeth', '18', '63', '', 1),
(1125, 'Rapahoe', '18', '63', '', 1),
(1126, 'Runanga', '18', '63', '', 1),
(1127, 'Stillwater', '18', '63', '', 1),
(1128, 'Taylorville', '18', '63', '', 1),
(1129, 'Totara Flat', '18', '63', '', 1),
(1130, 'Bruce Bay', '18', '64', '', 1),
(1131, 'Fox Glacier', '18', '64', '', 1),
(1132, 'Franz Josef Glacier', '18', '64', '', 1),
(1133, 'Haast', '18', '64', '', 1),
(1134, 'Harihari', '18', '64', '', 1),
(1135, 'Hokitika', '18', '64', '', 1),
(1136, 'Jackson Bay', '18', '64', '', 1),
(1137, 'Kaniere', '18', '64', '', 1),
(1138, 'Kokatahi', '18', '64', '', 1),
(1139, 'Kumara', '18', '64', '', 1),
(1140, 'Ōkārito', '18', '64', '', 1),
(1141, 'Otira', '18', '64', '', 1),
(1142, 'Ross', '18', '64', '', 1),
(1143, 'Westland Area', '18', '64', '', 1),
(1144, 'Westland Surrounds', '18', '64', '', 1),
(1145, 'Whataroa', '18', '64', '', 1),
(1146, 'Allenton', '19', '65', '', 1),
(1147, 'Ashburton', '19', '65', '', 1),
(1148, 'Ashburton Surrounds', '19', '65', '', 1),
(1149, 'Chertsey', '19', '65', '', 1),
(1150, 'Eiffelton', '19', '65', '', 1),
(1151, 'Elgin', '19', '65', '', 1),
(1152, 'Fairton', '19', '65', '', 1),
(1153, 'Hampstead', '19', '65', '', 1),
(1154, 'Hinds', '19', '65', '', 1),
(1155, 'Huntingdon', '19', '65', '', 1),
(1156, 'Lauriston', '19', '65', '', 1),
(1157, 'Lismore', '19', '65', '', 1),
(1158, 'Mayfield', '19', '65', '', 1),
(1159, 'Methven', '19', '65', '', 1),
(1160, 'Mount Somers', '19', '65', '', 1),
(1161, 'Netherby', '19', '65', '', 1),
(1162, 'Rakaia', '19', '65', '', 1),
(1163, 'Tinwald', '19', '65', '', 1),
(1164, 'Westerfield', '19', '65', '', 1),
(1165, 'Winchmore', '19', '65', '', 1),
(1166, 'Winslow', '19', '65', '', 1),
(1167, 'Akaroa', '19', '66', '', 1),
(1168, 'Banks Peninsula Surrounds', '19', '66', '', 1),
(1169, 'Birdlings Flat', '19', '66', '', 1),
(1170, 'Cass Bay', '19', '66', '', 1),
(1171, 'Charteris Bay', '19', '66', '', 1),
(1172, 'Corsair Bay', '19', '66', '', 1),
(1173, 'Diamond Harbour', '19', '66', '', 1),
(1174, 'Duvauchelle', '19', '66', '', 1),
(1175, 'French Farm', '19', '66', '', 1),
(1176, 'Governors Bay', '19', '66', '', 1),
(1177, 'Le Bons Bay', '19', '66', '', 1),
(1178, 'Little Akaloa', '19', '66', '', 1),
(1179, 'Little River', '19', '66', '', 1),
(1180, 'Lyttelton', '19', '66', '', 1),
(1181, 'Okains Bay', '19', '66', '', 1),
(1182, 'Pigeon Bay', '19', '66', '', 1),
(1183, 'Port Levy', '19', '66', '', 1),
(1184, 'Purau', '19', '66', '', 1),
(1185, 'Robinsons Bay', '19', '66', '', 1),
(1186, 'Takamatua', '19', '66', '', 1),
(1187, 'Wainui', '19', '66', '', 1),
(1188, 'Addington', '19', '67', '', 1),
(1189, 'Aidanfield', '19', '67', '', 1),
(1190, 'Aranui', '19', '67', '', 1),
(1191, 'Avondale', '19', '67', '', 1),
(1192, 'Avonhead', '19', '67', '', 1),
(1193, 'Avonside', '19', '67', '', 1),
(1194, 'Beckenham', '19', '67', '', 1),
(1195, 'Belfast', '19', '67', '', 1),
(1196, 'Bexley', '19', '67', '', 1),
(1197, 'Bishopdale', '19', '67', '', 1),
(1198, 'Bromley', '19', '67', '', 1),
(1199, 'Brooklands', '19', '67', '', 1),
(1200, 'Broomfield', '19', '67', '', 1),
(1201, 'Bryndwr', '19', '67', '', 1),
(1202, 'Burnside', '19', '67', '', 1),
(1203, 'Burwood', '19', '67', '', 1),
(1204, 'Casebrook', '19', '67', '', 1),
(1205, 'Cashmere', '19', '67', '', 1),
(1206, 'Christchurch Airport', '19', '67', '', 1),
(1207, 'Christchurch Central', '19', '67', '', 1),
(1208, 'Christchurch Surrounds', '19', '67', '', 1),
(1209, 'Clifton', '19', '67', '', 1),
(1210, 'Coutts Island', '19', '67', '', 1),
(1211, 'Cracroft', '19', '67', '', 1),
(1212, 'Dallington', '19', '67', '', 1),
(1213, 'Edgeware', '19', '67', '', 1),
(1214, 'Fendalton', '19', '67', '', 1),
(1215, 'Ferrymead', '19', '67', '', 1),
(1216, 'Halswell', '19', '67', '', 1),
(1217, 'Harewood', '19', '67', '', 1),
(1218, 'Heathcote Valley', '19', '67', '', 1),
(1219, 'Hei Hei', '19', '67', '', 1),
(1220, 'Hillmorton', '19', '67', '', 1),
(1221, 'Hillsborough', '19', '67', '', 1),
(1222, 'Hoon Hay', '19', '67', '', 1),
(1223, 'Hornby', '19', '67', '', 1),
(1224, 'Huntsbury', '19', '67', '', 1),
(1225, 'Ilam', '19', '67', '', 1),
(1226, 'Islington', '19', '67', '', 1),
(1227, 'Kainga', '19', '67', '', 1),
(1228, 'Kennedys Bush', '19', '67', '', 1),
(1229, 'Linwood', '19', '67', '', 1),
(1230, 'Mairehau', '19', '67', '', 1),
(1231, 'Marshland', '19', '67', '', 1),
(1232, 'Merivale', '19', '67', '', 1),
(1233, 'Middleton', '19', '67', '', 1),
(1234, 'Moncks Bay', '19', '67', '', 1),
(1235, 'Mount Pleasant', '19', '67', '', 1),
(1236, 'New Brighton', '19', '67', '', 1),
(1237, 'North New Brighton', '19', '67', '', 1),
(1238, 'Northcote', '19', '67', '', 1),
(1239, 'Northwood', '19', '67', '', 1),
(1240, 'Opawa', '19', '67', '', 1),
(1241, 'Papanui', '19', '67', '', 1),
(1242, 'Parklands', '19', '67', '', 1),
(1243, 'Phillipstown', '19', '67', '', 1),
(1244, 'Redcliffs', '19', '67', '', 1),
(1245, 'Redwood', '19', '67', '', 1),
(1246, 'Riccarton', '19', '67', '', 1),
(1247, 'Richmond', '19', '67', '', 1),
(1248, 'Richmond Hill', '19', '67', '', 1),
(1249, 'Russley', '19', '67', '', 1),
(1250, 'Saint Albans', '19', '67', '', 1),
(1251, 'Saint Martins', '19', '67', '', 1),
(1252, 'Scarborough', '19', '67', '', 1),
(1253, 'Shirley', '19', '67', '', 1),
(1254, 'Sockburn', '19', '67', '', 1),
(1255, 'Somerfield', '19', '67', '', 1),
(1256, 'South New Brighton', '19', '67', '', 1),
(1257, 'Southshore', '19', '67', '', 1),
(1258, 'Spencerville', '19', '67', '', 1),
(1259, 'Spreydon', '19', '67', '', 1),
(1260, 'Strowan', '19', '67', '', 1),
(1261, 'Styx', '19', '67', '', 1),
(1262, 'Sumner', '19', '67', '', 1),
(1263, 'Sydenham', '19', '67', '', 1),
(1264, 'Templeton', '19', '67', '', 1),
(1265, 'Upper Riccarton', '19', '67', '', 1),
(1266, 'Waimairi Beach', '19', '67', '', 1),
(1267, 'Wainoni', '19', '67', '', 1),
(1268, 'Waltham', '19', '67', '', 1),
(1269, 'Westmorland', '19', '67', '', 1),
(1270, 'Wigram', '19', '67', '', 1),
(1271, 'Woolston', '19', '67', '', 1),
(1272, 'Yaldhurst', '19', '67', '', 1),
(1273, 'Amberley', '19', '68', '', 1),
(1274, 'Balcairn', '19', '68', '', 1),
(1275, 'Cheviot', '19', '68', '', 1),
(1276, 'Culverden', '19', '68', '', 1),
(1277, 'Gore Bay', '19', '68', '', 1),
(1278, 'Greta Valley', '19', '68', '', 1),
(1279, 'Hanmer Springs', '19', '68', '', 1),
(1280, 'Hawarden', '19', '68', '', 1),
(1281, 'Hundalee', '19', '68', '', 1),
(1282, 'Hurunui', '19', '68', '', 1),
(1283, 'Hurunui Surrounds', '19', '68', '', 1),
(1284, 'Leithfield', '19', '68', '', 1),
(1285, 'Leslie Hills', '19', '68', '', 1),
(1286, 'Lewis Pass', '19', '68', '', 1),
(1287, 'Lyford', '19', '68', '', 1),
(1288, 'MacDonald Downs', '19', '68', '', 1),
(1289, 'Motunau', '19', '68', '', 1),
(1290, 'Pyramid Valley', '19', '68', '', 1),
(1291, 'Rotherham', '19', '68', '', 1),
(1292, 'Scargill', '19', '68', '', 1),
(1293, 'Virginia', '19', '68', '', 1),
(1294, 'Waiau', '19', '68', '', 1),
(1295, 'Waikari', '19', '68', '', 1),
(1296, 'Waipara', '19', '68', '', 1),
(1297, 'Albury', '19', '69', '', 1),
(1298, 'Fairlie', '19', '69', '', 1),
(1299, 'Lake Tekapo', '19', '69', '', 1),
(1300, 'Mackenzie Surrounds', '19', '69', '', 1),
(1301, 'Mt Cook', '19', '69', '', 1),
(1302, 'Twizel', '19', '69', '', 1),
(1303, 'Arthur\'s Pass', '19', '70', '', 1),
(1304, 'Burnham', '19', '70', '', 1),
(1305, 'Castle Hill', '19', '70', '', 1),
(1306, 'Craigieburn', '19', '70', '', 1),
(1307, 'Darfield', '19', '70', '', 1),
(1308, 'Doyleston', '19', '70', '', 1),
(1309, 'Dunsandel', '19', '70', '', 1),
(1310, 'Glentunnel', '19', '70', '', 1),
(1311, 'Hororata', '19', '70', '', 1),
(1312, 'Kirwee', '19', '70', '', 1),
(1313, 'Lake Coleridge', '19', '70', '', 1),
(1314, 'Lake Pearson', '19', '70', '', 1),
(1315, 'Lansdowne', '19', '70', '', 1),
(1316, 'Leeston', '19', '70', '', 1),
(1317, 'Lincoln', '19', '70', '', 1),
(1318, 'Malvern Hills', '19', '70', '', 1),
(1319, 'Motukarara', '19', '70', '', 1),
(1320, 'Prebbleton', '19', '70', '', 1),
(1321, 'Rolleston', '19', '70', '', 1),
(1322, 'Selwyn Surrounds', '19', '70', '', 1),
(1323, 'Sheffield', '19', '70', '', 1),
(1324, 'Southbridge', '19', '70', '', 1),
(1325, 'Springfield', '19', '70', '', 1),
(1326, 'Springston', '19', '70', '', 1),
(1327, 'Tai Tapu', '19', '70', '', 1),
(1328, 'Waddington', '19', '70', '', 1),
(1329, 'Weedons', '19', '70', '', 1),
(1330, 'West Melton', '19', '70', '', 1),
(1331, 'Whitecliffs', '19', '70', '', 1),
(1332, 'Windwhistle', '19', '70', '', 1),
(1333, 'Clandeboye', '19', '71', '', 1),
(1334, 'Fairview', '19', '71', '', 1),
(1335, 'Geraldine', '19', '71', '', 1),
(1336, 'Gleniti', '19', '71', '', 1),
(1337, 'Glenwood', '19', '71', '', 1);
INSERT INTO `suburbs` (`sno`, `suburb`, `region`, `district`, `suburb_image`, `status`) VALUES
(1338, 'Hadlow', '19', '71', '', 1),
(1339, 'Highfield', '19', '71', '', 1),
(1340, 'Kensington', '19', '71', '', 1),
(1341, 'Levels', '19', '71', '', 1),
(1342, 'Maori Hill', '19', '71', '', 1),
(1343, 'Marchwiel', '19', '71', '', 1),
(1344, 'Mesopotamia', '19', '71', '', 1),
(1345, 'Pareora', '19', '71', '', 1),
(1346, 'Parkside', '19', '71', '', 1),
(1347, 'Pleasant Point', '19', '71', '', 1),
(1348, 'Redruth', '19', '71', '', 1),
(1349, 'Rosewill', '19', '71', '', 1),
(1350, 'Seaview', '19', '71', '', 1),
(1351, 'Smithfield', '19', '71', '', 1),
(1352, 'Temuka', '19', '71', '', 1),
(1353, 'Timaru Central', '19', '71', '', 1),
(1354, 'Timaru Surrounds', '19', '71', '', 1),
(1355, 'Waimataitai', '19', '71', '', 1),
(1356, 'Washdyke', '19', '71', '', 1),
(1357, 'Watlington', '19', '71', '', 1),
(1358, 'West End', '19', '71', '', 1),
(1359, 'Winchester', '19', '71', '', 1),
(1360, 'Ashley', '19', '72', '', 1),
(1361, 'Clarkville', '19', '72', '', 1),
(1362, 'Cust', '19', '72', '', 1),
(1363, 'Fernside', '19', '72', '', 1),
(1364, 'Glentui', '19', '72', '', 1),
(1365, 'Kaiapoi', '19', '72', '', 1),
(1366, 'Loburn', '19', '72', '', 1),
(1367, 'Ohoka', '19', '72', '', 1),
(1368, 'Okuku', '19', '72', '', 1),
(1369, 'Oxford', '19', '72', '', 1),
(1370, 'Pegasus', '19', '72', '', 1),
(1371, 'Rangiora', '19', '72', '', 1),
(1372, 'Ravenswood', '19', '72', '', 1),
(1373, 'Sefton', '19', '72', '', 1),
(1374, 'Swannanoa', '19', '72', '', 1),
(1375, 'The Pines Beach', '19', '72', '', 1),
(1376, 'Tuahiwi', '19', '72', '', 1),
(1377, 'Waikuku', '19', '72', '', 1),
(1378, 'Waikuku Beach', '19', '72', '', 1),
(1379, 'Waimakariri Surrounds', '19', '72', '', 1),
(1380, 'West Eyreton', '19', '72', '', 1),
(1381, 'Woodend', '19', '72', '', 1),
(1382, 'Elephant Hill', '19', '73', '', 1),
(1383, 'Glenavy', '19', '73', '', 1),
(1384, 'Hakataramea', '19', '73', '', 1),
(1385, 'Hakataramea Valley', '19', '73', '', 1),
(1386, 'Hunter', '19', '73', '', 1),
(1387, 'Hunters Hills', '19', '73', '', 1),
(1388, 'Ikawai', '19', '73', '', 1),
(1389, 'Kirkliston', '19', '73', '', 1),
(1390, 'Makikihi', '19', '73', '', 1),
(1391, 'Maungati', '19', '73', '', 1),
(1392, 'Morven', '19', '73', '', 1),
(1393, 'Otaio', '19', '73', '', 1),
(1394, 'Saint Andrews', '19', '73', '', 1),
(1395, 'St Andrews', '19', '73', '', 1),
(1396, 'Waihao Downs', '19', '73', '', 1),
(1397, 'Waihaorunga', '19', '73', '', 1),
(1398, 'Waimate', '19', '73', '', 1),
(1399, 'Waimate Surrounds', '19', '73', '', 1),
(1400, 'Waitangi', '19', '73', '', 1),
(1401, 'Alexandra', '20', '74', '', 1),
(1402, 'Bannockburn', '20', '74', '', 1),
(1403, 'Central Otago Surrounds', '20', '74', '', 1),
(1404, 'Clyde', '20', '74', '', 1),
(1405, 'Cromwell', '20', '74', '', 1),
(1406, 'Ettrick', '20', '74', '', 1),
(1407, 'Lindis Pass', '20', '74', '', 1),
(1408, 'Naseby', '20', '74', '', 1),
(1409, 'Nevis', '20', '74', '', 1),
(1410, 'Omakau', '20', '74', '', 1),
(1411, 'Ophir', '20', '74', '', 1),
(1412, 'Oturehua', '20', '74', '', 1),
(1413, 'Paerau', '20', '74', '', 1),
(1414, 'Queensberry', '20', '74', '', 1),
(1415, 'Ranfurly', '20', '74', '', 1),
(1416, 'Roxburgh', '20', '74', '', 1),
(1417, 'Roxburgh East', '20', '74', '', 1),
(1418, 'Balclutha', '20', '75', '', 1),
(1419, 'Catlins Surrounds', '20', '75', '', 1),
(1420, 'Chaslands', '20', '75', '', 1),
(1421, 'Clinton and Surrounds', '20', '75', '', 1),
(1422, 'Dunrobin', '20', '75', '', 1),
(1423, 'Greenfield', '20', '75', '', 1),
(1424, 'Kaitangata', '20', '75', '', 1),
(1425, 'Kaka Point', '20', '75', '', 1),
(1426, 'Lawrence', '20', '75', '', 1),
(1427, 'Milton', '20', '75', '', 1),
(1428, 'Owaka', '20', '75', '', 1),
(1429, 'Papatowai/Pounawea', '20', '75', '', 1),
(1430, 'South Otago Coastal', '20', '75', '', 1),
(1431, 'South Otago Country', '20', '75', '', 1),
(1432, 'Stirling', '20', '75', '', 1),
(1433, 'Taieri Mouth', '20', '75', '', 1),
(1434, 'Tapanui', '20', '75', '', 1),
(1435, 'Waihola', '20', '75', '', 1),
(1436, 'Waitahuna', '20', '75', '', 1),
(1437, 'West Otago Surrounds', '20', '75', '', 1),
(1438, 'Abbotsford', '20', '76', '', 1),
(1439, 'Allanton', '20', '76', '', 1),
(1440, 'Andersons Bay', '20', '76', '', 1),
(1441, 'Aramoana', '20', '76', '', 1),
(1442, 'Balaclava', '20', '76', '', 1),
(1443, 'Belleknowes', '20', '76', '', 1),
(1444, 'Berwick Forest', '20', '76', '', 1),
(1445, 'Blackhead', '20', '76', '', 1),
(1446, 'Bradford', '20', '76', '', 1),
(1447, 'Brighton', '20', '76', '', 1),
(1448, 'Broad Bay', '20', '76', '', 1),
(1449, 'Brockville', '20', '76', '', 1),
(1450, 'Burnside', '20', '76', '', 1),
(1451, 'Calton Hill', '20', '76', '', 1),
(1452, 'Careys Bay', '20', '76', '', 1),
(1453, 'Caversham', '20', '76', '', 1),
(1454, 'Chain Hills', '20', '76', '', 1),
(1455, 'Clyde Hill', '20', '76', '', 1),
(1456, 'Company Bay', '20', '76', '', 1),
(1457, 'Concord', '20', '76', '', 1),
(1458, 'Corstorphine', '20', '76', '', 1),
(1459, 'Dalmore', '20', '76', '', 1),
(1460, 'Deborah Bay', '20', '76', '', 1),
(1461, 'Dunedin Central', '20', '76', '', 1),
(1462, 'East Otago', '20', '76', '', 1),
(1463, 'East Taieri', '20', '76', '', 1),
(1464, 'Fairfield', '20', '76', '', 1),
(1465, 'Forbury', '20', '76', '', 1),
(1466, 'Glenleith', '20', '76', '', 1),
(1467, 'Glenross', '20', '76', '', 1),
(1468, 'Green Island', '20', '76', '', 1),
(1469, 'Halfway Bush', '20', '76', '', 1),
(1470, 'Harington Point', '20', '76', '', 1),
(1471, 'Harwood', '20', '76', '', 1),
(1472, 'Helensburgh', '20', '76', '', 1),
(1473, 'Henley', '20', '76', '', 1),
(1474, 'Highcliff', '20', '76', '', 1),
(1475, 'Hyde', '20', '76', '', 1),
(1476, 'Kaikorai', '20', '76', '', 1),
(1477, 'Karitane', '20', '76', '', 1),
(1478, 'Kenmure', '20', '76', '', 1),
(1479, 'Kensington', '20', '76', '', 1),
(1480, 'Kew', '20', '76', '', 1),
(1481, 'Leith Valley', '20', '76', '', 1),
(1482, 'Liberton', '20', '76', '', 1),
(1483, 'Lookout Point', '20', '76', '', 1),
(1484, 'Macandrew Bay', '20', '76', '', 1),
(1485, 'Maia', '20', '76', '', 1),
(1486, 'Maori Hill', '20', '76', '', 1),
(1487, 'Maryhill', '20', '76', '', 1),
(1488, 'Middlemarch', '20', '76', '', 1),
(1489, 'Mornington', '20', '76', '', 1),
(1490, 'Mosgiel', '20', '76', '', 1),
(1491, 'Mount Cargill', '20', '76', '', 1),
(1492, 'Mount Grand', '20', '76', '', 1),
(1493, 'Musselburgh', '20', '76', '', 1),
(1494, 'Normanby', '20', '76', '', 1),
(1495, 'North Dunedin', '20', '76', '', 1),
(1496, 'North East Valley', '20', '76', '', 1),
(1497, 'North Taieri', '20', '76', '', 1),
(1498, 'Ocean Grove', '20', '76', '', 1),
(1499, 'Ocean View', '20', '76', '', 1),
(1500, 'Opoho', '20', '76', '', 1),
(1501, 'Outram', '20', '76', '', 1),
(1502, 'Pine Hill', '20', '76', '', 1),
(1503, 'Port Chalmers', '20', '76', '', 1),
(1504, 'Portobello', '20', '76', '', 1),
(1505, 'Pūrākaunui Inlet', '20', '76', '', 1),
(1506, 'Ravensbourne', '20', '76', '', 1),
(1507, 'Roseneath', '20', '76', '', 1),
(1508, 'Roslyn', '20', '76', '', 1),
(1509, 'Saddle Hill', '20', '76', '', 1),
(1510, 'Saint Clair', '20', '76', '', 1),
(1511, 'Saint Kilda', '20', '76', '', 1),
(1512, 'Saint Leonards', '20', '76', '', 1),
(1513, 'Sawyers Bay', '20', '76', '', 1),
(1514, 'Scroggs Hill', '20', '76', '', 1),
(1515, 'Shiel Hill', '20', '76', '', 1),
(1516, 'South Dunedin', '20', '76', '', 1),
(1517, 'Tainui', '20', '76', '', 1),
(1518, 'The Cove', '20', '76', '', 1),
(1519, 'The Glen', '20', '76', '', 1),
(1520, 'Upper Waitati', '20', '76', '', 1),
(1521, 'Vauxhall', '20', '76', '', 1),
(1522, 'Waikouaiti', '20', '76', '', 1),
(1523, 'Waipori Falls', '20', '76', '', 1),
(1524, 'Waitati', '20', '76', '', 1),
(1525, 'Wakari', '20', '76', '', 1),
(1526, 'Waldronville', '20', '76', '', 1),
(1527, 'Warrington', '20', '76', '', 1),
(1528, 'Waverley', '20', '76', '', 1),
(1529, 'Westwood', '20', '76', '', 1),
(1530, 'Woodhaugh', '20', '76', '', 1),
(1531, 'Arrowtown', '20', '77', '', 1),
(1532, 'Arthurs Point', '20', '77', '', 1),
(1533, 'Closeburn', '20', '77', '', 1),
(1534, 'Dalefield/Lake Hayes', '20', '77', '', 1),
(1535, 'Dalefield/Wakatipu Basin', '20', '77', '', 1),
(1536, 'Fernhill/Sunshine Bay', '20', '77', '', 1),
(1537, 'Frankton', '20', '77', '', 1),
(1538, 'Gibbston', '20', '77', '', 1),
(1539, 'Glenorchy', '20', '77', '', 1),
(1540, 'Jack\'s Point', '20', '77', '', 1),
(1541, 'Kelvin Heights', '20', '77', '', 1),
(1542, 'Kingston', '20', '77', '', 1),
(1543, 'Lake Hayes Estate', '20', '77', '', 1),
(1544, 'Lower Shotover', '20', '77', '', 1),
(1545, 'Queenstown', '20', '77', '', 1),
(1546, 'Queenstown Hill', '20', '77', '', 1),
(1547, 'Deborah', '20', '78', '', 1),
(1548, 'Duntroon', '20', '78', '', 1),
(1549, 'Enfield and Surrounds', '20', '78', '', 1),
(1550, 'Five Forks and Surrounds', '20', '78', '', 1),
(1551, 'Hampden', '20', '78', '', 1),
(1552, 'Herbert', '20', '78', '', 1),
(1553, 'Kakanui', '20', '78', '', 1),
(1554, 'Kurow', '20', '78', '', 1),
(1555, 'Lake Ōhau', '20', '78', '', 1),
(1556, 'Maheno', '20', '78', '', 1),
(1557, 'Moeraki', '20', '78', '', 1),
(1558, 'North Otago', '20', '78', '', 1),
(1559, 'North Otago Surrounds', '20', '78', '', 1),
(1560, 'Oamaru', '20', '78', '', 1),
(1561, 'Omarama', '20', '78', '', 1),
(1562, 'Otematata', '20', '78', '', 1),
(1563, 'Palmerston', '20', '78', '', 1),
(1564, 'Pukeuri', '20', '78', '', 1),
(1565, 'Richmond', '20', '78', '', 1),
(1566, 'Totara', '20', '78', '', 1),
(1567, 'Waianakarua', '20', '78', '', 1),
(1568, 'Waihemo', '20', '78', '', 1),
(1569, 'Weston', '20', '78', '', 1),
(1570, 'Albert Town', '20', '79', '', 1),
(1571, 'Cardrona', '20', '79', '', 1),
(1572, 'Hāwea Flat', '20', '79', '', 1),
(1573, 'Lake Hāwea', '20', '79', '', 1),
(1574, 'Luggate', '20', '79', '', 1),
(1575, 'Makarora', '20', '79', '', 1),
(1576, 'Treble Cone/Mount Aspiring', '20', '79', '', 1),
(1577, 'Wanaka', '20', '79', '', 1),
(1578, 'Wanaka Surrounds', '20', '79', '', 1),
(1579, 'Gore', '22', '81', '', 1),
(1580, 'Gore Surrounds', '22', '81', '', 1),
(1581, 'Mataura', '22', '81', '', 1),
(1582, 'Pukerau', '22', '81', '', 1),
(1583, 'Waikaka', '22', '81', '', 1),
(1584, 'Appleby', '22', '82', '', 1),
(1585, 'Ascot', '22', '82', '', 1),
(1586, 'Avenal', '22', '82', '', 1),
(1587, 'Awarua', '22', '82', '', 1),
(1588, 'Bluff', '22', '82', '', 1),
(1589, 'Clifton', '22', '82', '', 1),
(1590, 'Georgetown', '22', '82', '', 1),
(1591, 'Gladstone', '22', '82', '', 1),
(1592, 'Glengarry', '22', '82', '', 1),
(1593, 'Grasmere', '22', '82', '', 1),
(1594, 'Hargest', '22', '82', '', 1),
(1595, 'Hawthorndale', '22', '82', '', 1),
(1596, 'Heidelberg', '22', '82', '', 1),
(1597, 'Invercargill', '22', '82', '', 1),
(1598, 'Invercargill Surrounds', '22', '82', '', 1),
(1599, 'Kew', '22', '82', '', 1),
(1600, 'Kingswell', '22', '82', '', 1),
(1601, 'Lorneville', '22', '82', '', 1),
(1602, 'Makarewa', '22', '82', '', 1),
(1603, 'Mill Road', '22', '82', '', 1),
(1604, 'Myross Bush', '22', '82', '', 1),
(1605, 'Newfield', '22', '82', '', 1),
(1606, 'Oreti Beach', '22', '82', '', 1),
(1607, 'Otatara', '22', '82', '', 1),
(1608, 'Prestonville', '22', '82', '', 1),
(1609, 'Richmond', '22', '82', '', 1),
(1610, 'Rockdale', '22', '82', '', 1),
(1611, 'Rosedale', '22', '82', '', 1),
(1612, 'Roslyn Bush', '22', '82', '', 1),
(1613, 'Ryal Bush', '22', '82', '', 1),
(1614, 'Strathern', '22', '82', '', 1),
(1615, 'Tisbury', '22', '82', '', 1),
(1616, 'Turnbull Thomson Park', '22', '82', '', 1),
(1617, 'Underwood', '22', '82', '', 1),
(1618, 'Waikiwi', '22', '82', '', 1),
(1619, 'Waimatua', '22', '82', '', 1),
(1620, 'Waverley', '22', '82', '', 1),
(1621, 'West Plains', '22', '82', '', 1),
(1622, 'Windsor', '22', '82', '', 1),
(1623, 'Balfour', '22', '83', '', 1),
(1624, 'Castlerock', '22', '83', '', 1),
(1625, 'Colac Bay', '22', '83', '', 1),
(1626, 'Dipton', '22', '83', '', 1),
(1627, 'Edendale', '22', '83', '', 1),
(1628, 'Garston', '22', '83', '', 1),
(1629, 'Halfmoon Bay', '22', '83', '', 1),
(1630, 'Hedgehope', '22', '83', '', 1),
(1631, 'Lumsden', '22', '83', '', 1),
(1632, 'Lumsden Surrounds', '22', '83', '', 1),
(1633, 'Manapouri', '22', '83', '', 1),
(1634, 'Mossburn', '22', '83', '', 1),
(1635, 'Nightcaps', '22', '83', '', 1),
(1636, 'Ohai', '22', '83', '', 1),
(1637, 'Orepuki', '22', '83', '', 1),
(1638, 'Otautau', '22', '83', '', 1),
(1639, 'Riversdale', '22', '83', '', 1),
(1640, 'Riverton & Surrounds', '22', '83', '', 1),
(1641, 'Riverton/Aparima', '22', '83', '', 1),
(1642, 'Stewart Island', '22', '83', '', 1),
(1643, 'Te Anau', '22', '83', '', 1),
(1644, 'Te Anau Surrounds', '22', '83', '', 1),
(1645, 'Thornbury', '22', '83', '', 1),
(1646, 'Tuatapere', '22', '83', '', 1),
(1647, 'Waianiwa', '22', '83', '', 1),
(1648, 'Waikaia', '22', '83', '', 1),
(1649, 'Wallacetown', '22', '83', '', 1),
(1650, 'Winton', '22', '83', '', 1),
(1651, 'Winton Surrounds', '22', '83', '', 1),
(1652, 'Woodlands', '22', '83', '', 1),
(1653, 'Wyndham', '22', '83', '', 1),
(1654, 'Wyndham Surrounds', '22', '83', '', 1),
(1655, 'Glendowie', '5', '5', '', 1),
(1656, 'Grafton', '5', '5', '', 1),
(1657, 'Greenlane', '5', '5', '', 1),
(1658, 'Grey Lynn', '5', '5', '', 1),
(1659, 'Herne Bay', '5', '5', '', 1),
(1660, 'Hillsborough', '5', '5', '', 1),
(1661, 'Kingsland', '5', '5', '', 1),
(1662, 'Kohimarama', '5', '5', '', 1),
(1663, 'Lynfield', '5', '5', '', 1),
(1664, 'Meadowbank', '5', '5', '', 1),
(1665, 'Mission Bay', '5', '5', '', 1),
(1666, 'Morningside', '5', '5', '', 1),
(1667, 'Mount Albert', '5', '5', '', 1),
(1668, 'Mount Eden', '5', '5', '', 1),
(1669, 'Mount Roskill', '5', '5', '', 1),
(1670, 'Mount Wellington', '5', '5', '', 1),
(1671, 'New Windsor', '5', '5', '', 1),
(1672, 'Newmarket', '5', '5', '', 1),
(1673, 'Newton', '5', '5', '', 1),
(1674, 'One Tree Hill', '5', '5', '', 1),
(1675, 'Onehunga', '5', '5', '', 1),
(1676, 'Orakei', '5', '5', '', 1),
(1677, 'Ōtāhuhu', '5', '5', '', 1),
(1678, 'Panmure', '5', '5', '', 1),
(1679, 'Parnell', '5', '5', '', 1),
(1680, 'Penrose', '5', '5', '', 1),
(1681, 'Point Chevalier', '5', '5', '', 1),
(1682, 'Point England', '5', '5', '', 1),
(1683, 'Ponsonby', '5', '5', '', 1),
(1684, 'Remuera', '5', '5', '', 1),
(1685, 'Royal Oak', '5', '5', '', 1),
(1686, 'Saint Heliers', '5', '5', '', 1),
(1687, 'Saint Johns', '5', '5', '', 1),
(1688, 'Saint Marys Bay', '5', '5', '', 1),
(1689, 'Sandringham', '5', '5', '', 1),
(1690, 'Stonefields', '5', '5', '', 1),
(1691, 'Three Kings', '5', '5', '', 1),
(1692, 'Wai O Taiki Bay', '5', '5', '', 1),
(1693, 'Waterview', '5', '5', '', 1),
(1694, 'Western Springs', '5', '5', '', 1),
(1695, 'Westmere', '5', '5', '', 1),
(1696, 'Aka Aka', '5', '6', '', 1),
(1697, 'Ararimu', '5', '6', '', 1),
(1698, 'Āwhitu', '5', '6', '', 1),
(1699, 'Bombay', '5', '6', '', 1),
(1700, 'Buckland', '5', '6', '', 1),
(1701, 'Clarks Beach', '5', '6', '', 1),
(1702, 'Glen Murray', '5', '6', '', 1),
(1703, 'Glenbrook', '5', '6', '', 1),
(1704, 'Hunua', '5', '6', '', 1),
(1705, 'Kaiaua', '5', '6', '', 1),
(1706, 'Karaka', '5', '6', '', 1),
(1707, 'Kingseat', '5', '6', '', 1),
(1708, 'Mangatangi', '5', '6', '', 1),
(1709, 'Mangatāwhiri', '5', '6', '', 1),
(1710, 'Manukau Heads', '5', '6', '', 1),
(1711, 'Mauku', '5', '6', '', 1),
(1712, 'Mercer', '5', '6', '', 1),
(1713, 'Onewhero', '5', '6', '', 1),
(1714, 'Ōtaua', '5', '6', '', 1),
(1715, 'Paerata', '5', '6', '', 1),
(1716, 'Patumahoe', '5', '6', '', 1),
(1717, 'Pōkeno', '5', '6', '', 1),
(1718, 'Pollok', '5', '6', '', 1),
(1719, 'Port Waikato', '5', '6', '', 1),
(1720, 'Pukekawa', '5', '6', '', 1),
(1721, 'Pukekohe', '5', '6', '', 1),
(1722, 'Pukekohe East', '5', '6', '', 1),
(1723, 'Pūkorokoro / Miranda', '5', '6', '', 1),
(1724, 'Puni', '5', '6', '', 1),
(1725, 'Ramarama', '5', '6', '', 1),
(1726, 'Te Kohanga', '5', '6', '', 1),
(1727, 'Tuakau', '5', '6', '', 1),
(1728, 'Waiau Pa', '5', '6', '', 1),
(1729, 'Waiuku', '5', '6', '', 1),
(1730, 'Whakatīwai', '5', '6', '', 1),
(1731, 'Whangape', '5', '6', '', 1),
(1732, 'Great Barrier Island', '5', '7', '', 1),
(1733, 'Kawau Island', '5', '7', '', 1),
(1734, 'Other Islands', '5', '7', '', 1),
(1735, 'Rakino Island', '5', '7', '', 1),
(1736, 'Alfriston', '5', '8', '', 1),
(1737, 'Auckland Airport', '5', '8', '', 1),
(1738, 'Beachlands', '5', '8', '', 1),
(1739, 'Botany Downs', '5', '8', '', 1),
(1740, 'Brookby', '5', '8', '', 1),
(1741, 'Bucklands Beach', '5', '8', '', 1),
(1742, 'Burswood', '5', '8', '', 1),
(1743, 'Clendon Park', '5', '8', '', 1),
(1744, 'Clevedon', '5', '8', '', 1),
(1745, 'Clover Park', '5', '8', '', 1),
(1746, 'Cockle Bay', '5', '8', '', 1),
(1747, 'Dannemora', '5', '8', '', 1),
(1748, 'East Tāmaki', '5', '8', '', 1),
(1749, 'East Tāmaki Heights', '5', '8', '', 1),
(1750, 'Eastern Beach', '5', '8', '', 1),
(1751, 'Farm Cove', '5', '8', '', 1),
(1752, 'Favona', '5', '8', '', 1),
(1753, 'Flat Bush', '5', '8', '', 1),
(1754, 'Golflands', '5', '8', '', 1),
(1755, 'Goodwood Heights', '5', '8', '', 1),
(1756, 'Half Moon Bay', '5', '8', '', 1),
(1757, 'Highland Park', '5', '8', '', 1),
(1758, 'Hillpark', '5', '8', '', 1),
(1759, 'Howick', '5', '8', '', 1),
(1760, 'Huntington Park', '5', '8', '', 1),
(1761, 'Kawakawa Bay', '5', '8', '', 1),
(1762, 'Māngere', '5', '8', '', 1),
(1763, 'Māngere Bridge', '5', '8', '', 1),
(1764, 'Māngere East', '5', '8', '', 1),
(1765, 'Manukau', '5', '8', '', 1),
(1766, 'Manukau Heights', '5', '8', '', 1),
(1767, 'Manurewa', '5', '8', '', 1),
(1768, 'Manurewa East', '5', '8', '', 1),
(1769, 'Maraetai', '5', '8', '', 1),
(1770, 'Mellons Bay', '5', '8', '', 1),
(1771, 'Middlemore Hospital', '5', '8', '', 1),
(1772, 'Mission Heights', '5', '8', '', 1),
(1773, 'Ness Valley', '5', '8', '', 1),
(1774, 'Northpark', '5', '8', '', 1),
(1775, 'Ōrere Point', '5', '8', '', 1),
(1776, 'Ōtara', '5', '8', '', 1),
(1777, 'Pakuranga', '5', '8', '', 1),
(1778, 'Pakuranga Heights', '5', '8', '', 1),
(1779, 'Papatoetoe', '5', '8', '', 1),
(1780, 'Pine Harbour', '5', '8', '', 1),
(1781, 'Randwick Park', '5', '8', '', 1),
(1782, 'Shamrock Park', '5', '8', '', 1),
(1783, 'Shelly Park', '5', '8', '', 1),
(1784, 'Somerville', '5', '8', '', 1),
(1785, 'Sunnyhills', '5', '8', '', 1),
(1786, 'The Gardens', '5', '8', '', 1),
(1787, 'Totara Heights', '5', '8', '', 1),
(1788, 'Tōtara Park', '5', '8', '', 1),
(1789, 'Wattle Downs', '5', '8', '', 1),
(1790, 'Weymouth', '5', '8', '', 1),
(1791, 'Whitford', '5', '8', '', 1),
(1792, 'Wiri', '5', '8', '', 1),
(1793, 'Albany', '5', '9', '', 1),
(1794, 'Bayswater', '5', '9', '', 1),
(1795, 'Bayview', '5', '9', '', 1),
(1796, 'Beach Haven', '5', '9', '', 1),
(1797, 'Belmont', '5', '9', '', 1),
(1798, 'Birkdale', '5', '9', '', 1),
(1799, 'Birkenhead', '5', '9', '', 1),
(1800, 'Browns Bay', '5', '9', '', 1),
(1801, 'Campbells Bay', '5', '9', '', 1),
(1802, 'Castor Bay', '5', '9', '', 1),
(1803, 'Chatswood', '5', '9', '', 1),
(1804, 'Devonport', '5', '9', '', 1),
(1805, 'Fairview Heights', '5', '9', '', 1),
(1806, 'Forrest Hill', '5', '9', '', 1),
(1807, 'Glenfield', '5', '9', '', 1),
(1808, 'Greenhithe', '5', '9', '', 1),
(1809, 'Hauraki', '5', '9', '', 1),
(1810, 'Hillcrest', '5', '9', '', 1),
(1811, 'Long Bay', '5', '9', '', 1),
(1812, 'Lucas Heights', '5', '9', '', 1),
(1813, 'Mairangi Bay', '5', '9', '', 1),
(1814, 'Milford', '5', '9', '', 1),
(1815, 'Murrays Bay', '5', '9', '', 1),
(1816, 'Narrow Neck', '5', '9', '', 1),
(1817, 'Northcote', '5', '9', '', 1),
(1818, 'Northcote Point', '5', '9', '', 1),
(1819, 'Northcross', '5', '9', '', 1),
(1820, 'Okura', '5', '9', '', 1),
(1821, 'Oteha', '5', '9', '', 1),
(1822, 'Paremoremo', '5', '9', '', 1),
(1823, 'Pinehill', '5', '9', '', 1),
(1824, 'Rosedale', '5', '9', '', 1),
(1825, 'Rothesay Bay', '5', '9', '', 1),
(1826, 'Schnapper Rock', '5', '9', '', 1),
(1827, 'Stanley Point', '5', '9', '', 1),
(1828, 'Sunnynook', '5', '9', '', 1),
(1829, 'Takapuna', '5', '9', '', 1),
(1830, 'Torbay', '5', '9', '', 1),
(1831, 'Totara Vale', '5', '9', '', 1),
(1832, 'Unsworth Heights', '5', '9', '', 1),
(1833, 'Waiake', '5', '9', '', 1),
(1834, 'Wairau Valley', '5', '9', '', 1),
(1835, 'Windsor Park', '5', '9', '', 1),
(1836, 'Ardmore', '5', '11', '', 1),
(1837, 'Conifer Grove', '5', '11', '', 1),
(1838, 'Drury', '5', '11', '', 1),
(1839, 'Hingaia', '5', '11', '', 1),
(1840, 'Ōpaheke', '5', '11', '', 1),
(1841, 'Pahurehure', '5', '11', '', 1),
(1842, 'Papakura', '5', '11', '', 1),
(1843, 'Red Hill', '5', '11', '', 1),
(1844, 'Rosehill', '5', '11', '', 1),
(1845, 'Runciman', '5', '11', '', 1),
(1846, 'Takanini', '5', '11', '', 1),
(1847, 'Auckland Central', '5', '12', '', 1),
(1848, 'Avondale', '5', '12', '', 1),
(1849, 'Blockhouse Bay', '5', '12', '', 1),
(1850, 'Eden Terrace', '5', '12', '', 1),
(1851, 'Ellerslie', '5', '12', '', 1),
(1852, 'Epsom', '5', '12', '', 1),
(1853, 'Freemans Bay', '5', '12', '', 1),
(1854, 'Glen Innes', '5', '12', '', 1),
(1855, 'Glendowie', '5', '12', '', 1),
(1856, 'Grafton', '5', '12', '', 1),
(1857, 'Greenlane', '5', '12', '', 1),
(1858, 'Grey Lynn', '5', '12', '', 1),
(1859, 'Herne Bay', '5', '12', '', 1),
(1860, 'Hillsborough', '5', '12', '', 1),
(1861, 'Kingsland', '5', '12', '', 1),
(1862, 'Kohimarama', '5', '12', '', 1),
(1863, 'Lynfield', '5', '12', '', 1),
(1864, 'Meadowbank', '5', '12', '', 1),
(1865, 'Mission Bay', '5', '12', '', 1),
(1866, 'Morningside', '5', '12', '', 1),
(1867, 'Mount Albert', '5', '12', '', 1),
(1868, 'Mount Eden', '5', '12', '', 1),
(1869, 'Mount Roskill', '5', '12', '', 1),
(1870, 'Mount Wellington', '5', '12', '', 1),
(1871, 'New Windsor', '5', '12', '', 1),
(1872, 'Newmarket', '5', '12', '', 1),
(1873, 'Newton', '5', '12', '', 1),
(1874, 'One Tree Hill', '5', '12', '', 1),
(1875, 'Onehunga', '5', '12', '', 1),
(1876, 'Orakei', '5', '12', '', 1),
(1877, 'Ōtāhuhu', '5', '12', '', 1),
(1878, 'Panmure', '5', '12', '', 1),
(1879, 'Parnell', '5', '12', '', 1),
(1880, 'Penrose', '5', '12', '', 1),
(1881, 'Point Chevalier', '5', '12', '', 1),
(1882, 'Point England', '5', '12', '', 1),
(1883, 'Ponsonby', '5', '12', '', 1),
(1884, 'Remuera', '5', '12', '', 1),
(1885, 'Royal Oak', '5', '12', '', 1),
(1886, 'Saint Heliers', '5', '12', '', 1),
(1887, 'Saint Johns', '5', '12', '', 1),
(1888, 'Saint Marys Bay', '5', '12', '', 1),
(1889, 'Sandringham', '5', '12', '', 1),
(1890, 'Stonefields', '5', '12', '', 1),
(1891, 'Three Kings', '5', '12', '', 1),
(1892, 'Wai O Taiki Bay', '5', '12', '', 1),
(1893, 'Waterview', '5', '12', '', 1),
(1894, 'Western Springs', '5', '12', '', 1),
(1895, 'Westmere', '5', '12', '', 1),
(1896, 'Ōmiha', '5', '13', '', 1),
(1897, 'Oneroa', '5', '13', '', 1),
(1898, 'Onetangi', '5', '13', '', 1),
(1899, 'Ostend', '5', '13', '', 1),
(1900, 'Palm Beach', '5', '13', '', 1),
(1901, 'Waiheke Island', '5', '13', '', 1),
(1902, 'Cornwallis', '5', '14', '', 1),
(1903, 'Glen Eden', '5', '14', '', 1),
(1904, 'Glendene', '5', '14', '', 1),
(1905, 'Green Bay', '5', '14', '', 1),
(1906, 'Henderson', '5', '14', '', 1),
(1907, 'Henderson Valley', '5', '14', '', 1),
(1908, 'Herald Island', '5', '14', '', 1),
(1909, 'Hobsonville', '5', '14', '', 1),
(1910, 'Huia', '5', '14', '', 1),
(1911, 'Karekare', '5', '14', '', 1),
(1912, 'Kelston', '5', '14', '', 1),
(1913, 'Laingholm', '5', '14', '', 1),
(1914, 'Massey', '5', '14', '', 1),
(1915, 'New Lynn', '5', '14', '', 1),
(1916, 'Oratia', '5', '14', '', 1),
(1917, 'Parau', '5', '14', '', 1),
(1918, 'Piha', '5', '14', '', 1),
(1919, 'Rānui', '5', '14', '', 1),
(1920, 'Sunnyvale', '5', '14', '', 1),
(1921, 'Swanson', '5', '14', '', 1),
(1922, 'Te Atatū Peninsula', '5', '14', '', 1),
(1923, 'Te Atatū South', '5', '14', '', 1),
(1924, 'Te Henga (Bethells Beach', '5', '14', '', 1),
(1925, 'Titirangi', '5', '14', '', 1),
(1926, 'Waiatarua', '5', '14', '', 1),
(1927, 'Waitākere', '5', '14', '', 1),
(1928, 'West Harbour', '5', '14', '', 1),
(1929, 'Westgate', '5', '14', '', 1),
(1930, 'Whenuapai', '5', '14', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `sno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `region` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `suburbs` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `services` varchar(255) DEFAULT NULL,
  `service_areas` varchar(255) DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `forgot_key` varchar(255) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`sno`, `name`, `phone`, `email`, `region`, `district`, `suburbs`, `address`, `category`, `services`, `service_areas`, `logo`, `banner`, `created_date`, `forgot_key`, `modified_date`, `status`) VALUES
(1, 'DSB Plumbers', '9603113211', '', 5, 5, 1, 'Hno.123, Street 5, City name', 1, '1,4,3,2,6', '1,2', '9ne1k529vpk4s8w8kc.png', 'yld6zxag89w4gc808s.jpg', '0000-00-00 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_categories`
--

CREATE TABLE `supplier_categories` (
  `sno` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supplier_categories`
--

INSERT INTO `supplier_categories` (`sno`, `category`, `icon`, `status`) VALUES
(1, 'Plumbing', '', 1),
(2, 'Electricity', '', 1),
(3, 'Handyman', 'HM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_services`
--

CREATE TABLE `supplier_services` (
  `sno` int(11) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `category` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supplier_services`
--

INSERT INTO `supplier_services` (`sno`, `service_name`, `category`, `status`) VALUES
(1, 'Installing Pipes', 1, 1),
(2, 'Drain Cleaning', 1, 1),
(3, 'Pipe Repair', 1, 1),
(4, 'Toilet Repair', 1, 1),
(5, 'Wiring', 2, 1),
(6, 'Appliances', 2, 1),
(7, 'Inverter & Stabilizer', 2, 1),
(8, 'EV Charger', 2, 1),
(9, 'General maintenance', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `sno` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`sno`, `description`, `created_date`, `modified_date`, `status`) VALUES
(1, '<p style=\"text-align:justify\"><strong>Terms and Conditions</strong></p>\n\n<p style=\"text-align:justify\">By using, registering, accessing or visiting our website, you are deemed to have accepted these terms (the <strong>&quot;Terms and Conditions&quot;)</strong> and privacy policy (the&nbsp;<strong>&ldquo;Privacy Policy&rdquo;</strong>).&nbsp;If you do not agree to any of these terms and privacy policies, please do not use our website and services.</p>\n\n<p style=\"text-align:justify\">Welcome to Rental Listings.co.nz!!! We are NZ&rsquo;s first-only rental listings website where property management companies (subscribers), property managers, agents and landlords can advertise residential, commercial, or/and industrial properties that are available for rent. We are an online Real Estate (&ldquo;Property Management&rdquo;) advertising, marketing and information service provider website connecting people with the rental market. Upon registration, the companies, property managers, and agents can create their own profile pages. Landlords or owners can also create an account and advertise their listings but they will not be able create their profile page. The rental seekers can create an account, find the available properties for rent, and book for viewings if available. This website is owned, operated, and maintained by Rental Listings Limited.</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><strong>Amendments</strong></p>\n\n<p style=\"text-align:justify\">Rental Listings Limited may, at its sole discretion, modify, vary, amend or revise these terms and conditions of Use (including, without limitation, any services provided under these Terms and Conditions) at any time, and by continuing to use our website, you will be deemed to have accepted these changes. If you do not agree to those changes you can request to terminate your account at any time.</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><strong>Disclaimer and Disclosure</strong></p>\n\n<p style=\"text-align:justify\">Rental listings.co.nz is designed and developed to help property managers, agents, landlords and owners find suitable tenants for their listed property/ies likewise for the rental property seekers to find a suitable rental property through our website. However, in presenting you with available properties from the property managers, agents, landlords and owners we are not recommending you to choose a particular listing, property manager, agent, landlord or company. It is just a website to facilitate engagement between independent third parties. Although we aim to ensure the property listings, advertisements and information contained within our website are accurate and up to date, we make no warranty as to the accuracy, legality, completeness, or usefulness of the information, nor do we assume any legal liability or responsibility for this. This includes the truth about ownership of any rental listing.</p>\n\n<p style=\"text-align:justify\">Listings are not screened for content and Rental Listings reserves the right to change the contents or remove any listing at any time without notice. Rental Listings will only present you with listed rental properties based on your selection criteria and we do not accept any responsibility or liability for the quality or fitness of any rental listings, or any representations made concerning any rental listings. We are not a party to any transaction or tenancy facilitated through our website. All transactions are conducted at the parties&rsquo; own risk and a party&rsquo;s ability to complete a transaction, or a party&rsquo;s title to any particular rental listing. We are not responsible for any rental properties, the tenancy application process, tenancy agreements, tenancy checks, bond lodgements or anything related to these processes. We do not provide any representations to anyone about the listings, companies, property managers, agents, landlords, owners or users.</p>\n\n<p style=\"text-align:justify\">Rental Listings makes no representations about, and accepts no responsibility for, the suitability or quality of any property, product or service that is advertised on this website. If you have a dispute about any property, product or service that you take up after using our website, then you will need to resolve that dispute with the property manager, agent, company, landlord, owner or financial service provider directly.</p>\n\n<p style=\"text-align:justify\">Rental Listings.co.nz is not the agent of any property management company, property manager, agent, landlord or owner about any listings or the provision of any product or service, nor the agent of either party to any transaction that is between you and any property management company, property manager, agent, landlord or owner.</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><strong>Responsibilities and Liabilities (Do&rsquo;s and Do Not&rsquo;s)</strong></p>\n\n<ul style=\"list-style-type:circle\">\n	<li style=\"text-align:justify\">These Terms must be read subject to our obligations to you to guarantee the quality and fitness for the purpose of our services under consumer protection laws like the Consumer Guarantees Act 1993 and the Fair Trading Act 1986. Nothing in these Terms overrides or restricts those obligations. However, we emphasize that we do not provide those guarantees in relation to products or services supplied to you by any property management company, property manager, agent, landlord, owner, advertiser or any other third party.</li>\n	<li style=\"text-align:justify\">Comply with the terms and conditions and any other agreements.</li>\n	<li style=\"text-align:justify\">To upload Content, you must register and create and account with Rental Listings.co.nz by providing information including your name, email address and your mobile telephone number.</li>\n	<li style=\"text-align:justify\">You must be 18 years or older or over the age of majority in the jurisdiction.</li>\n	<li style=\"text-align:justify\">All information that you supply to us is current, complete, accurate and provided promptly, complies with all applicable laws, regulations, standards, codes and does not infringe anyone&rsquo;s rights (including intellectual property rights).</li>\n	<li style=\"text-align:justify\">You agree and warrant that you are the sole author or owner of the content;</li>\n	<li style=\"text-align:justify\">Keep your login information and your password safe and secure.</li>\n	<li style=\"text-align:justify\">We recommend a strong password and keep the password confidential at all times.</li>\n	<li style=\"text-align:justify\">Your account is for your sole and personal use, any activity undertaken with your login details is your responsibility.</li>\n	<li style=\"text-align:justify\">You should not allow others to use your account and you should not assign or transfer your account to any other person or party.</li>\n	<li style=\"text-align:justify\">If your details are used by someone else or if you think your credentials are stolen or hacked, please try to login and change your password and/or please report us ASAP via email at support@rentallistings.co.nz.</li>\n	<li style=\"text-align:justify\">You agree to indemnify Rental Listings against any liability we suffer arising out of your failure to maintain the confidentiality of your username and password.</li>\n	<li style=\"text-align:justify\">You will own and be responsible for all the content and information that you submit to your account.</li>\n	<li style=\"text-align:justify\">You are granting Rental Listings and our affiliates a non-exclusive, worldwide, transferable, irrevocable and sub-licensable right to use, copy, modify, distribute, publish, and process the information and content that you provide, without any further compensation to you or others.</li>\n	<li style=\"text-align:justify\">You agree that we have no obligation to maintain copies of any content or information that you or others provide. We are only required to provide you with copies of such content as required by applicable law and as noted in our Privacy Policy.</li>\n	<li style=\"text-align:justify\">You acknowledge that our use of your Content may include licensing such content to third parties and/or using such content for advertising purposes. In no event shall we be required to seek your approval or provide you with any compensation in connection with such use/s.</li>\n	<li style=\"text-align:justify\">You agree to indemnify Rental Listings and its directors, employees, agents, representatives and third-party service providers from any damage or loss made against or suffered by any of those indemnified arising, in whole or in part, as a result of the publication of your content.</li>\n	<li style=\"text-align:justify\">You authorize us to use any content you provide to us in good faith to comply with any legal process, respond to claims of third parties and protect the rights of our website, its users and the public.</li>\n	<li style=\"text-align:justify\">Do not damage or disrupt our website, its content or any service provided by us.</li>\n	<li style=\"text-align:justify\">Do not use to mislead others or their content.</li>\n	<li style=\"text-align:justify\">Do not access, use or interfere with anybody else&rsquo;s profile, email or other communications that are not intended for you.</li>\n	<li style=\"text-align:justify\">Do not abuse, defame, threaten, stalk or harass others.</li>\n	<li style=\"text-align:justify\">Do not try to develop, support or use software or any other means to scrape the website</li>\n	<li style=\"text-align:justify\">Do not copy any data from the website or use any information obtained from the website without our consent</li>\n	<li style=\"text-align:justify\">Do not use the website for tasks that it is not intended for</li>\n	<li style=\"text-align:justify\">Do not reverse engineer, decompile, disassemble, decipher or otherwise attempt to derive the source code of the website or any related technology</li>\n	<li style=\"text-align:justify\">Do not violate intellectual property rights or any other rights.</li>\n	<li style=\"text-align:justify\">Rental Listings is not for use by anyone under the age of 18. If you are under 18 years or under the age of majority in the jurisdiction from which you access the Website, you should have the consent of one of your parents or legal guardians, to register an Account.</li>\n	<li style=\"text-align:justify\">To the fullest extent permitted by law, Rental Listings exclude all liability (including in contract, for negligence or otherwise) for any loss, damage (whether direct, indirect or consequential), costs or expenses suffered by you or in respect of claims made against you, however caused, in connection with:</li>\n</ul>\n\n<ol style=\"list-style-type:lower-alpha\">\n	<li style=\"text-align:justify\">Your use of our website (services, products, goods or content) or any other website that you access via Rental Listings.co.nz;</li>\n	<li style=\"text-align:justify\">Any lack of availability, interruption, delay in operation, virus, internet access difficulties, or equipment malfunction in relation to our website or any other website that you access via Rental Listings.co.nz;</li>\n	<li style=\"text-align:justify\">Any fraudulent or unauthorized use of your account;</li>\n	<li style=\"text-align:justify\">Any property and any subsequent agreement you may enter into in relation to any property; and</li>\n	<li style=\"text-align:justify\">Your use of any products, goods or services supplied or offered on our website or communicated to you by a property management company, property manager, agent, landlord, owner, advertisement or any other third party via our website.</li>\n</ol>\n\n<ul style=\"list-style-type:circle\">\n	<li style=\"text-align:justify\">You are solely responsible for making your own assessment and decision about any listing on the website.</li>\n	<li style=\"text-align:justify\">We do not make any representation or provide any warranty in respect of the content of any listing, company or profile.</li>\n	<li style=\"text-align:justify\">We do not conduct any identity or personal checks on any person who creates an account on our website.</li>\n	<li style=\"text-align:justify\">We do not make any representation or provide any warranty in respect of the content of any listing or any other content provided by the users.</li>\n	<li style=\"text-align:justify\">In using, registering, accessing or visiting our website you acknowledge and agree to our Disclaimer and disclosures which are also incorporated into these terms and conditions.</li>\n</ul>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><strong>Breaching the Terms and Conditions</strong></p>\n\n<p style=\"text-align:justify\">If you breach any of these terms and conditions, we reserve the right to block your access to our website, delete your account and/or take any other action as suitable.</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><strong>Changes to Our Website</strong></p>\n\n<p style=\"text-align:justify\">We may change or discontinue any of the services we provide through our website at any time. We are not obligated to store or display any information, articles or content on our Website and can remove it in our sole discretion, with or without notice to you.</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><strong>Termination of Account</strong></p>\n\n<p style=\"text-align:justify\">Rental Listings in its absolute discretion may decline to register, suspend or terminate your account and disable access to the website and services without prior notice if:</p>\n\n<ul style=\"list-style-type:circle\">\n	<li style=\"text-align:justify\">You breach or violate any of the terms and conditions and privacy policies.</li>\n	<li style=\"text-align:justify\">If we are requested to do so by a government or law enforcement agency;</li>\n	<li style=\"text-align:justify\">If we consider it necessary due to technical or security issues or due to a prolonged period of inactivity on the website.</li>\n	<li style=\"text-align:justify\">In our sole opinion, your ongoing use of the website and service will bring or may bring, the reputation of our website into disrepute or cause to be in breach of an applicable law.</li>\n</ul>\n\n<p style=\"text-align:justify\">We are not required to provide any reasons for a decision to decline to register, suspend or terminate your account or disable your access to the website.</p>\n\n<p style=\"text-align:justify\">If your account is terminated, any information or content previously submitted or other information held by us in relation to your use of the website or services may be deleted and if this occurs it cannot be returned to you.</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><strong>Third-Party Articles and Content</strong></p>\n\n<p style=\"text-align:justify\">Articles or reports on the website provided by a named third party express their views, and do not necessarily reflect the views of our website.</p>\n\n<p style=\"text-align:justify\">We are not obligated to publish any information, articles or content on our website and can remove it in our sole discretion, with or without notice to you.</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><strong>Intellectual Property Rights</strong></p>\n\n<p style=\"text-align:justify\">You acknowledge and agree that you are permitted to use the website or its content only as set out in these terms and conditions. All content on the website is our exclusive property or is used with the consent and permission of the copyright and/or trademark owner and no content featured here including (but not limited to) intellectual property rights, text, images, web pages, audio, video, software, structure, design and compilation may be reproduced, published or transmitted. You acknowledge that without our prior written consent, you are not permitted to use the website or its content to develop any software program, including (but not limited to) training a machine learning, coding, interface, website structure or artificial intelligence system.</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><strong>Privacy Statement</strong></p>\n\n<p style=\"text-align:justify\">You acknowledge that you have read and understood the terms of our Privacy Policy available on our website. You agree that Rental Listings may use and disclose information about you as per the terms of that Privacy Policy. If you make contact with a person or company through our website and that person requests that you do not contact them again, you must comply with that request. You must not disclose the contact details of any person that you obtain through our website without the prior consent of that person or company.</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><strong>Communication</strong></p>\n\n<p style=\"text-align:justify\">If you use any communication tools and posts that are available through the website (such as enquiry forms or messaging tools) or you post or otherwise upload anything to the website, you agree only to use such communication tools and other aspects of the website for lawful and legitimate purposes. You must not use any communication tool or other aspect of the website to post or disseminate any material unrelated to the use of the website, including (without limitation) offers of goods or services for sale, files that may damage any other person&rsquo;s electronic devices or software, content that may be offensive to any other user of the website, or material or data in violation of any law (including data or other material that is protected by copyright or trade secrets which you do not have the right to use). When you make any communication or provision of information on the website, you represent that you own the content of the communication. We are under no obligation to ensure that the communications on the website are legitimate and we are not able to monitor communications at all times. We reserve the right to remove any communication at any time in our sole discretion.</p>\n\n<p style=\"text-align:justify\">Please report any objectionable information to us at&nbsp;support@rentallistings.co.nz.</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><strong>Technical Difficulties</strong></p>\n\n<p style=\"text-align:justify\">You acknowledge that your use of the website and associated services may be subject to interruption or delays due to the nature of the Internet and mobile phone communications.&nbsp; and its service providers. We do not make any warranty that the website or services will be error-free, without interruption, delays or free from defects in design or engineering.</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><strong>Indemnity</strong></p>\n\n<p style=\"text-align:justify\">You agree to indemnify and hold Rental Listings and its directors, employees, agents, representatives and third-party service providers, harmless from any loss, claims, liabilities or damages we suffer relating to your use of the website and the services or their use by any person on your behalf, or your failure to comply with these terms and conditions.</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><strong>Third Party Sites</strong></p>\n\n<p style=\"text-align:justify\">This Website may contain links to other websites or resources operated by parties other than our website. References to any products, services, processes, trade names, trademarks, or other information of third parties do not imply or constitute an endorsement, sponsorship, association with or recommendation by Rental Listings. Links to third-party sites not operated by our website are provided to you for your convenience and/or reference only. You acknowledge and agree that we do not control such sites and Rental Listings are not responsible for the content on those sites or the privacy of other practices of such sites. You further acknowledge and agree that Rental Listings shall not be responsible or liable, directly or indirectly, for any damage, loss or cost whatsoever caused or alleged to be caused by or in connection with the use of or in relation to any such sites or the contents, goods or services available on or through any such websites.</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><strong>Google</strong></p>\n\n<p style=\"text-align:justify\">We and you agree that Google, and any Google subsidiary, are third-party beneficiaries of these terms and conditions and that Google has the right to enforce these terms and conditions against you as a third-party beneficiary.</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><strong>Disputes</strong></p>\n\n<p style=\"text-align:justify\">If any dispute arises between you and us, we both agree in good faith to attempt to resolve the dispute amicably through negotiation or other informal means before pursuing any formal legal action.</p>\n\n<p style=\"text-align:justify\">Please note that any dispute that arises concerning any property, product or service you access or are introduced to via the website must be resolved between you and the relevant company, property manager, agent, landlord or relevant third party. You agree that Rental Listings has no responsibility for the quality, suitability or any other aspect of any property, product or service that is advertised on our website and you will not involve us in any dispute or in the resolution of disputes that arise between you and the relevant company, property manager, agent, landlord or relevant third party.</p>\n\n<p>&nbsp;</p>', '2024-01-19 00:36:49', '2024-02-20 13:17:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `sno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `testimonial` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`sno`, `name`, `user_image`, `city`, `testimonial`, `status`) VALUES
(1, 'Olive Erickson', '10y46lcspuio48kwc4.jpg', 'Auckland', '<p>Working with Rental Listing is like having a family member who can fix everything. They know what you need, exactly when you need it.</p>', 1),
(2, 'Carl Knight', '8z2d2x4y96o08oow0g.jpg', 'Avandole', '<p>Working with Rental Listing is like having a family member who can fix everything. They know what you need, exactly when you need it.</p>', 1),
(3, 'Lydia Wise', '1eann8ul5pc088o8ok.jpg', 'City Centre', '<p>Working with Rental Listing is like having a family member who can fix everything. They know what you need, exactly when you need it.</p>', 0),
(4, 'Test', '7nht6723570oc80c8.jpg', 'Tauranga', '<p>Testing... Working with Rental Listing is like having a family member who can fix everything. They know what you need, exactly when you need it.</p>', 1),
(5, 'Williams Read', '1t93syuuyf0g8o4k4k.jpg', 'Auckland', '<p>Great Website</p>', 1),
(6, 'Length Test', '', 'Tauranga', '<p>Welcome to Rental Listings.co.nz!!! We are NZ&rsquo;s first-only rental listings website where property management companies (subscribers), property managers, agents and landlords can advertise residential, commercial, or/and industrial properties that are available for rent. We are an online Real Estate (&ldquo;Property Management&rdquo;) advertising, marketing and information service provider website connecting people with the rental market. Upon registration, the companies, property managers, and agents can create their own profile pages. Landlords or owners can also create an account and advertise their listings but they will not be able create their profile page. The rental seekers can create an account, find the available properties for rent, and book for viewings if available. This website is owned, operated, and maintained by Rental Listings Limited.</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `tid` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `tcondition` longtext NOT NULL,
  `tformat` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`tid`, `type`, `tcondition`, `tformat`) VALUES
(1, 'image', '<div class=\'col-md-3 mb\'><select name=\"icrop\" class=\"form-control\" id=\"gpsImage\" required>\r\n   <option value=\"\" selected>Select Type</option>\r\n   <option value=\"manual_crop\">Manual Crop</option>\r\n <option value=\"ratio_crop\">Ratio Crop</option>\r\n  <option value=\"crop\">Crop</option>\r\n</select></div>', '<div class=\"col-sm-3 mb\"><input class=\"form-control\" name=\"ct_width\" placeholder=\"Width\" required ></div><div class=\"col-sm-2 mb\"><input class=\"form-control\" name=\"ct_height\" placeholder=\"Height\" required ></div>'),
(2, 'file', '<div class=\'col-md-3 mb\'><select name=\"frename\" class=\"form-control\" id=\"gpsFile\" required>    <option value=\"\" selected>Select Type</option>    <option value=\"not_rename\">Not Rename</option>    <option value=\"rename\">Rename</option> </select></div>', ''),
(3, 'password', '<div class=\'col-md-3 mb\'><select name=\"pencrypt\" class=\"form-control\" >    <option value=\"\" selected>None</option>    <option value=\"md5\">MD5</option>    <option value=\"sha1\">SHA1</option> </select></div>', ''),
(4, 'select', '<div class=\'col-md-3 mb\'><select name=\"stype\" class=\"form-control\" required>    <option value=\"\" selected>Select Type</option>    <option value=\"select\">Select</option>    <option value=\"multiselect\">Multiselect</option> </select></div>', '<div class=\"col-sm-3 mb\"><input class=\"form-control\" name=\"s_selected\" placeholder=\"example\"></div><div class=\"col-sm-4 mb\"><input class=\"form-control\" name=\"s_options\" placeholder=\"example1,example2\" required ></div>'),
(5, 'datetime', '<div class=\'col-md-3 mb\'><select name=\"dtype\" class=\"form-control\" required ><option value=\"\" selected>Select Type</option><option value=\"datetime\">Date Time</option><option value=\"date\">Date</option></select></div>', ''),
(6, 'textarea', '', ''),
(7, 'int', '', ''),
(8, 'remote_image', '<div class=\"col-sm-6 mb\"><input class=\"form-control\" name=\"links\" placeholder=\"http://www.example.com/uploads/\" required ></div>', ''),
(9, 'thumbs', '<div class=\"col-sm-3 mb\"><input class=\"form-control\" name=\"small\" placeholder=\"small:width\" required ></div><div class=\"col-sm-2 mb\"><input class=\"form-control\" name=\"middle\" placeholder=\"middle:width\" required ></div><div class=\"col-sm-2 mb\"><input class=\"form-control\" name=\"big\" placeholder=\"big:width\" required ></div>', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `sno` int(11) NOT NULL,
  `property` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `user` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`sno`, `property`, `role`, `user`, `created_date`, `modified_date`, `status`) VALUES
(1, 2, 'user', 2, '0000-00-00 00:00:00', '2022-09-08 09:04:45', 1),
(2, 1, 'user', 2, '2022-08-29 16:41:13', '2023-10-25 13:43:11', 1),
(3, 3, 'user', 2, '2022-08-29 18:03:28', '2022-09-21 17:23:34', 1),
(4, 1, 'landlord', 2, '2022-08-29 18:24:06', '2022-08-30 12:47:49', 1),
(5, 2, 'user', 6, '2022-08-30 11:59:19', '2022-08-30 11:59:49', 0),
(6, 3, 'user', 6, '2022-08-30 11:59:22', NULL, 1),
(7, 2, 'agents', 2, '2022-09-05 18:13:46', NULL, 1),
(8, 4, 'user', 2, '2022-09-07 00:27:50', '2023-10-24 18:36:11', 1),
(9, 4, 'landlord', 2, '2022-09-07 17:38:44', NULL, 1),
(10, 2, 'user', 8, '2022-09-10 13:28:28', '2022-09-10 13:29:02', 0),
(11, 4, 'user', 7, '2022-10-03 14:46:53', '2022-12-07 16:45:21', 0),
(12, 3, 'user', 7, '2022-10-03 14:47:50', '2022-10-12 12:42:46', 0),
(13, 8, 'user', 2, '2023-01-03 01:08:19', '2023-01-11 15:19:33', 1),
(14, 2, 'user', 4, '2023-01-16 11:48:20', NULL, 1),
(15, 9, 'user', 7, '2023-04-11 13:40:20', NULL, 1),
(16, 14, 'user', 2, '2023-10-25 13:35:39', NULL, 1),
(17, 16, 'user', 2, '2023-10-29 14:43:21', '2023-11-01 13:21:47', 1),
(18, 12, 'user', 2, '2023-11-01 18:56:00', '2023-11-01 19:01:38', 0);

-- --------------------------------------------------------

--
-- Structure for view `agents_landlords`
--
DROP TABLE IF EXISTS `agents_landlords`;

CREATE ALGORITHM=UNDEFINED DEFINER=`psworksi`@`localhost` SQL SECURITY DEFINER VIEW `agents_landlords`  AS SELECT `agents`.`sno` AS `sno`, `agents`.`name` AS `name`, 'agents' AS `type`, `agents`.`company` AS `company`, (select concat(' - ',`companies`.`name`) from `companies` where `companies`.`sno` = `agents`.`company` and `companies`.`status` = 1) AS `companyname`, '1' AS `status` FROM `agents` WHERE `agents`.`status` = '1'union select `landlords`.`sno` AS `sno`,`landlords`.`name` AS `name`,'landlord' AS `type`,'0' AS `company`,' ' AS `companyname`,'1' AS `status` from `landlords` where `landlords`.`status` = '1'  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `admin_sessions`
--
ALTER TABLE `admin_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `agents_request`
--
ALTER TABLE `agents_request`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `change_type`
--
ALTER TABLE `change_type`
  ADD PRIMARY KEY (`ctid`);

--
-- Indexes for table `client_logos`
--
ALTER TABLE `client_logos`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `companies_request`
--
ALTER TABLE `companies_request`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `create_table`
--
ALTER TABLE `create_table`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `emailsetting`
--
ALTER TABLE `emailsetting`
  ADD PRIMARY KEY (`fieldoption`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `landlords`
--
ALTER TABLE `landlords`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `loginlog`
--
ALTER TABLE `loginlog`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `popular_cities`
--
ALTER TABLE `popular_cities`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `privacy`
--
ALTER TABLE `privacy`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `promotional`
--
ALTER TABLE `promotional`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `property_category`
--
ALTER TABLE `property_category`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `property_request`
--
ALTER TABLE `property_request`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `property_schedules`
--
ALTER TABLE `property_schedules`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `property_views`
--
ALTER TABLE `property_views`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `property_visits`
--
ALTER TABLE `property_visits`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `p_amenities`
--
ALTER TABLE `p_amenities`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `p_gallery`
--
ALTER TABLE `p_gallery`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `region_name` (`region_name`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `suburbs`
--
ALTER TABLE `suburbs`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `supplier_categories`
--
ALTER TABLE `supplier_categories`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `supplier_services`
--
ALTER TABLE `supplier_services`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_sessions`
--
ALTER TABLE `admin_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4894;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `agents_request`
--
ALTER TABLE `agents_request`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `change_type`
--
ALTER TABLE `change_type`
  MODIFY `ctid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `client_logos`
--
ALTER TABLE `client_logos`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `companies_request`
--
ALTER TABLE `companies_request`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `create_table`
--
ALTER TABLE `create_table`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `landlords`
--
ALTER TABLE `landlords`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `loginlog`
--
ALTER TABLE `loginlog`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1349;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `popular_cities`
--
ALTER TABLE `popular_cities`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `privacy`
--
ALTER TABLE `privacy`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promotional`
--
ALTER TABLE `promotional`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `property_category`
--
ALTER TABLE `property_category`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `property_request`
--
ALTER TABLE `property_request`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `property_schedules`
--
ALTER TABLE `property_schedules`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `property_views`
--
ALTER TABLE `property_views`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=630;

--
-- AUTO_INCREMENT for table `property_visits`
--
ALTER TABLE `property_visits`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `p_amenities`
--
ALTER TABLE `p_amenities`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `p_gallery`
--
ALTER TABLE `p_gallery`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `suburbs`
--
ALTER TABLE `suburbs`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1931;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier_categories`
--
ALTER TABLE `supplier_categories`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier_services`
--
ALTER TABLE `supplier_services`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

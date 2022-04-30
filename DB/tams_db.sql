-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2022 at 11:12 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tams_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `contact_number` varchar(200) DEFAULT NULL,
  `staff_id` varchar(10) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `full_name`, `username`, `password`, `contact_number`, `staff_id`, `department`, `email`, `status`, `created_date`, `updated_date`) VALUES
(202024, 'subiharan chandrakumarann', 'admin', '$2y$10$t7zu1bBu836DvYEAJVw8k.D9R55UBa.QXM/z3TJU5qPEChMqEG.5G', '0775430351', '5784/AD', 'Adminstartive Department', 'wordpress.subiharan@gmail.com', 1, '2022-04-25 17:38:32', '2022-04-25 18:21:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(10) NOT NULL,
  `total_amount` float DEFAULT NULL,
  `cus_payment_card_type` varchar(100) DEFAULT NULL,
  `cus_id` int(10) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '0 = not confirmed,\r\n1 = cancelled by host,\r\n2 = confirmed,\r\n3 = cancelled by customer,\r\n4 =completed,\r\n5 =Inprogress',
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `payment_status` tinyint(1) DEFAULT NULL COMMENT '0 = unpaid,\r\n1 = paid,\r\n2 = refunded by host,\r\n3 = refunded by admin',
  `total_nights` int(20) DEFAULT NULL,
  `total_persons` int(20) DEFAULT NULL,
  `partner_id` int(10) NOT NULL,
  `total_kids` int(11) DEFAULT NULL,
  `total_adults` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `service_name` varchar(100) DEFAULT NULL,
  `service_type` varchar(100) DEFAULT NULL,
  `payment_card_holder_name` varchar(100) DEFAULT NULL,
  `payment_card_number` int(100) DEFAULT NULL,
  `cancellation_ava` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `total_amount`, `cus_payment_card_type`, `cus_id`, `start_date`, `end_date`, `status`, `created_date`, `updated_date`, `payment_status`, `total_nights`, `total_persons`, `partner_id`, `total_kids`, `total_adults`, `service_id`, `service_name`, `service_type`, `payment_card_holder_name`, `payment_card_number`, `cancellation_ava`) VALUES
(1112, 5000, 'Master Card', 3030, '2022-04-17', '2022-04-21', 4, '2022-04-19 22:00:00', '2022-04-29 20:05:57', 1, 1, 3, 6061, 1, 2, 4044, 'Madulkelle Tea and Eco Lodge', 'Home Stay', 'fsd', 24124, 0),
(101011, 2500, 'Visa Card', 3030, '2022-04-29', '2022-04-30', 4, '2022-04-23 09:57:00', '2022-04-30 19:13:50', 1, 1, 1, 6061, 0, 1, 4044, 'Madulkelle Tea and Eco Lodge', 'Home Stay', 'dsfds', 123213, 1),
(101013, 5000, 'Master Card', 3030, '2022-04-25', '2022-05-05', 5, '2022-04-25 16:00:48', '2022-04-29 20:03:23', 1, 9, 1, 6061, 0, 1, 8, 'Sri Lanka Uncovered', 'Tour Package', 'asdas', 12421, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `email_address` varchar(500) DEFAULT NULL,
  `contact_number` varchar(200) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `first_name`, `last_name`, `address`, `email_address`, `contact_number`, `username`, `password`, `created_date`, `updated_date`, `status`) VALUES
(37, 'admin', 'admin', 'admin', 'admin@xmail.com', '14124124', 'adminsanju', '$2y$10$4aSwPX.ZZHbd8MBUcEZnfeNDTH4ofW3hgzgMe7swfqXwP4X4Isw1C', '2022-03-15 07:37:29', '2022-04-19 21:12:35', 1),
(3030, 'Subiharan', 'Chandrakumaran', '12/3, pothukola, panwila, kandy', 'Subiharan@gmail.com', '0775430351', 'user', '$2y$10$/nsDkanR7e6sPRxgnvXVJeZkOmdbduRJdVCdyQnvMQzeFgyjqNTbq', '2022-04-20 02:22:05', NULL, 1),
(303030, 'manoj', 'ragal', '45,wattegama, kandy', 'manoj@gmail.com', '07765484621', 'manoj', '$2y$10$ZdFcts4G0wtw1AhsAT.HueHoCHsS3LvsnwdTyvxp5QDNpa6DV.ilW', '2022-04-29 20:56:57', NULL, 1),
(303031, 'dilshan', 'keel', 'dilshan@gmail.com', 'dilshan@hotmail.com', '0775530351', 'dilshan', '$2y$10$gOUstja1IoUZaiif//KEVe4f.HTZyF8JUbYY9sbt7b7yJC/Hr31x.', '2022-04-29 20:57:45', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_earning`
--

CREATE TABLE `tbl_earning` (
  `earning_id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  `payout` float DEFAULT NULL,
  `net_amount` float DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `service_type` varchar(100) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `service_name` varchar(100) DEFAULT NULL,
  `profit_percentage` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_earning`
--

INSERT INTO `tbl_earning` (`earning_id`, `booking_id`, `total_amount`, `payout`, `net_amount`, `customer_id`, `created_date`, `service_type`, `service_id`, `service_name`, `profit_percentage`) VALUES
(71, 1110, 15000, 13500, 1500, 3030, '2022-04-20 15:04:53', 'Tour Package', 8, 'Sri Lanka Uncovered', '10'),
(72, 1111, 15000, 13500, 1500, 3030, '2022-04-20 15:05:49', 'Home Stay', 4044, 'Madulkelle Tea and Eco Lodge', '10'),
(73, 1112, 6500, 5850, 650, 3030, '2022-04-20 15:16:38', 'Home Stay', 4044, 'Madulkelle Tea and Eco Lodge', '20'),
(808080, 101011, 2500, 2250, 250, 3030, '2022-04-23 09:57:00', 'Home Stay', 4044, 'Madulkelle Tea and Eco Lodge', '10'),
(808081, 101012, NULL, 5000, NULL, 0, '2022-04-25 11:41:27', NULL, NULL, NULL, NULL),
(808082, 101013, 5000, 4500, 500, 3030, '2022-04-25 16:00:48', 'Tour Package', 8, 'Sri Lanka Uncovered', '10'),
(808083, 101014, 123, 110.7, 12.3, 3030, '2022-04-27 13:02:12', 'Tour Package', 505051, 'sad', '10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_home`
--

CREATE TABLE `tbl_home` (
  `home_id` int(20) NOT NULL,
  `home_name` varchar(50) DEFAULT NULL,
  `cover_img1` text DEFAULT NULL,
  `location_address` varchar(200) DEFAULT NULL,
  `ava_night_price_adult` float DEFAULT NULL,
  `lg_desc` varchar(1500) DEFAULT NULL,
  `home_type` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `cancellation` tinyint(1) DEFAULT NULL,
  `ava_start_date` date DEFAULT NULL,
  `ava_end_date` date DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) DEFAULT NULL COMMENT '0=inactive, 1=active, 2=not verified, 3=verification failed,\r\n4 = disabled by admin 	 ',
  `partner_id` int(20) DEFAULT NULL,
  `rooms` int(10) NOT NULL,
  `max_adults` int(10) DEFAULT NULL,
  `max_kids` int(10) DEFAULT NULL,
  `ava_night_price_kid` float DEFAULT NULL,
  `s_time` time DEFAULT NULL,
  `e_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_home`
--

INSERT INTO `tbl_home` (`home_id`, `home_name`, `cover_img1`, `location_address`, `ava_night_price_adult`, `lg_desc`, `home_type`, `district`, `province`, `cancellation`, `ava_start_date`, `ava_end_date`, `created_date`, `updated_date`, `status`, `partner_id`, `rooms`, `max_adults`, `max_kids`, `ava_night_price_kid`, `s_time`, `e_time`) VALUES
(4044, 'Madulkelle Tea and Eco Lodge', '1774802820.jpg', 'Madulkelle', 2500, 'Located in Madulkelle in the Kandy District region, Eco Lodge features a garden. The property is 7 miles. ', 'Cottage', 'Kandy', 'Central Province', 1, '2022-05-10', '2022-05-31', '2022-04-20 14:59:02', '2022-04-29 17:33:37', 1, 6061, 5, 5, 2, 1500, '08:00:00', '08:00:00'),
(404040, 'Raya Holiday Villa', '1039069714.png', 'Kandy', 45000, 'Raya Holiday Bungalow is situated in a quiet and relaxing waterfront environment facing the Mahaweli reservoir. Only 5km to Pallekale International Cricket Stadium. Less than 8km to the heart of Kandy.', 'Villa', 'Kandy', 'Central Province', 1, '2022-05-10', '2022-06-30', '2022-04-29 17:37:02', '2022-04-29 17:37:24', 1, 6061, 5, 5, 2, 3000, '08:00:00', '08:00:00'),
(404041, 'The Kandy House', '1607827161.jpg', 'Kandy', 3000, 'The Kandy House is a lovely private residence available for your exclusive use (just you - no other guests!). Just a few minutes out of Kandy centre (2.5km), the house affords stunning views within a peaceful setting.', 'Villa', 'Kandy', 'Central Province', 0, '2022-05-15', '2022-05-20', '2022-04-29 17:39:26', '2022-04-29 17:45:02', 1, 6061, 6, 8, 3, 2000, '08:00:00', '08:00:00'),
(404042, 'The Backpackers hub in the kadyan Hills!', '279486242.jpg', 'kandy', 3000, 'We are a hidden spot in a Hill City. Its windy and bit cold in the night. 6pm afterwards you could witness wild boars, porcupines and some bad-ass monkey gang while you sip on to that hot coffee of your choice.', 'Villa', 'Kandy', 'Central Province', 1, '2022-05-25', '2022-06-30', '2022-04-29 17:43:58', '2022-04-29 17:45:04', 1, 6061, 3, 5, 3, 4000, '08:00:00', '08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inquiry`
--

CREATE TABLE `tbl_inquiry` (
  `inquiry_id` int(10) NOT NULL,
  `enquirer_name` varchar(50) DEFAULT NULL,
  `enquirer_email` varchar(100) DEFAULT NULL,
  `enquirer_contact` varchar(100) DEFAULT NULL,
  `enquirer_subject` varchar(100) DEFAULT NULL,
  `enquirer_descr` varchar(500) DEFAULT NULL,
  `inquiry_received_date` timestamp NULL DEFAULT current_timestamp(),
  `inquiry_updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_inquiry`
--

INSERT INTO `tbl_inquiry` (`inquiry_id`, `enquirer_name`, `enquirer_email`, `enquirer_contact`, `enquirer_subject`, `enquirer_descr`, `inquiry_received_date`, `inquiry_updated_date`, `status`) VALUES
(1, 'afds', 'info@happyholidayss.com', 'afds', 'afds', 'afdsj', '2022-03-16 16:40:33', '2022-04-30 19:27:24', 1),
(5050, 'ajith', 'ajith@gmail.com', '0766587431', 'need to know about tours in matale', 'i need to know about tour packages in matale area', '2022-04-20 19:09:25', '2022-04-29 21:02:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partner`
--

CREATE TABLE `tbl_partner` (
  `partner_id` int(11) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `email_address` varchar(500) DEFAULT NULL,
  `contact_number` varchar(200) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `zipcode` int(6) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `province` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_partner`
--

INSERT INTO `tbl_partner` (`partner_id`, `first_name`, `last_name`, `username`, `password`, `address`, `email_address`, `contact_number`, `status`, `gender`, `zipcode`, `created_date`, `updated_date`, `province`) VALUES
(6061, 'subiharan', 'chandrakumaran', 'subiharan', '$2y$10$uiab1iacEH45hkBiB63f1OLxprsM4qMJRawGvX8XyRSIShgLagsRy', '56,panwila,kandy', 'partner@gmail.com', '0775430351', 1, 'Male', 213324, '2022-04-20 06:43:59', '2022-04-30 19:25:04', 'Central'),
(606062, 'partner2', 'partner2', 'partner2', '$2y$10$aVWLtQN3TRjgNRStJDA79OJ/t.Dr7eeP0sbfr.SDu.0/Uf3pEzExS', 'asdasd', 'partner2@gmail.com', '14214', 1, 'male', 1221, '2022-04-27 12:37:19', '2022-04-27 12:37:53', 'Eastern');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(100) NOT NULL,
  `review_title` varchar(200) DEFAULT NULL,
  `review_description` varchar(600) DEFAULT NULL,
  `review_user_type` varchar(100) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `review_rating` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `approved_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) DEFAULT NULL,
  `service_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `review_title`, `review_description`, `review_user_type`, `customer_id`, `service_id`, `review_rating`, `created_date`, `approved_date`, `status`, `service_name`) VALUES
(707072, 'Best Service !', 'The Best !', 'Business', 37, 4044, 4, '2022-04-27 06:43:25', '2022-04-29 20:59:27', 0, NULL),
(707073, 'Awsome !', 'we had best experience !', 'Friends', 3030, 4044, 1, '2022-04-27 06:56:13', '2022-04-29 20:59:49', 1, 'Madulkelle Tea and Eco Lodge'),
(707074, 'We Had Fun !', 'One of the Best Tour Package, We Really Enjoyed It', 'Family', 3030, 505055, 5, '2022-04-29 19:49:58', '2022-04-29 19:50:34', 1, 'Splendour Of Sri Lanka');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tour`
--

CREATE TABLE `tbl_tour` (
  `tour_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `details` varchar(500) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `tour_type` varchar(100) DEFAULT NULL,
  `duration_nights` int(10) DEFAULT NULL,
  `adult_price` double DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `partner_id` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '0=inactive,\r\n1=active,\r\n2=not verified,\r\n3=verification failed,\r\n4 = disabled by admin',
  `language` varchar(100) DEFAULT NULL,
  `availabile_seats` int(11) DEFAULT NULL,
  `ava_start_date` date DEFAULT NULL,
  `ava_end_date` date DEFAULT NULL,
  `cancellation` tinyint(1) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `gathering_location` varchar(100) DEFAULT NULL,
  `s_time` time DEFAULT NULL,
  `e_time` time DEFAULT NULL,
  `kid_price` float DEFAULT NULL,
  `kid_status` tinyint(1) DEFAULT NULL COMMENT '1=enabled,\r\n0=disabled'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tour`
--

INSERT INTO `tbl_tour` (`tour_id`, `title`, `details`, `location`, `tour_type`, `duration_nights`, `adult_price`, `image`, `created_date`, `updated_date`, `partner_id`, `status`, `language`, `availabile_seats`, `ava_start_date`, `ava_end_date`, `cancellation`, `district`, `gathering_location`, `s_time`, `e_time`, `kid_price`, `kid_status`) VALUES
(9, 'Sri Lanka Uncovered', 'Start in Negombo and end in Unawatuna! With the Active Adventure tour Sri Lanka Uncovered, you have a 10 days tour package taking you through Negombo, Sri Lanka and 7 other destinations in Sri Lanka. Sri Lanka Uncovered includes accommodation, an expert guide, meals, transport and more. ', 'Negombo', 'Active Adventure', 9, 5000, '2048692867.jpg', '2022-04-20 15:02:41', '2022-04-29 20:41:21', 6061, 0, 'English', 45, '2022-04-25', '2022-05-05', 0, 'Colombo', 'near negombo bus stand', '08:00:00', '17:00:00', 2500, 1),
(505051, 'sad', 'asfasf', 'asda', 'Active Adventure', 3, 123, '1030306262.jpg', '2022-04-27 12:39:02', '2022-04-29 19:54:54', 606062, 1, 'Tamil', 1, '2022-04-28', '2022-04-30', 1, 'Colombo', 'ASFASF', '05:55:00', '04:44:00', 0, 0),
(505052, 'Sacred Sri Lanka', 'Start and end in Colombo! With the In-depth Cultural tour Sacred Sri Lanka - Free Upgrade to Private Tour Available, you have a 5 days tour package taking you through Colombo, Sri Lanka and 6 other destinations in Sri Lanka. Sacred Sri Lanka - Free Upgrade to Private Tour Available includes accommodation in a hotel as well as an expert guide, meals, transport and more. ', 'Colombo', 'In-depth Cultural', 9, 15000, '103122_28bd5386.jpg', '2022-04-29 16:31:36', '2022-04-29 16:55:53', 6061, 1, 'english', 30, '2022-05-10', '2022-05-20', 1, 'Colombo', 'Near Colombo Railway Station', '08:00:00', '08:00:00', 0, 0),
(505053, 'Amazing Sri Lanka', 'Start in Kandy and end in Colombo! With the Active Adventure tour Amazing Sri Lanka, you have a 5 days tour package taking you through Kandy, Sri Lanka and 6 other destinations in Sri Lanka. Amazing Sri Lanka includes accommodation in a hotel as well as an expert guide, meals, transport and more. ', 'Kandy', 'Explorer', 4, 10000, '175872_7ada2a64.jpg', '2022-04-29 16:33:33', '2022-04-29 16:58:44', 6061, 1, 'english', 50, '2022-05-10', '2022-05-15', 1, 'Kandy', 'Kandy Thalatha Maligawa', '08:00:00', '18:00:00', 5000, 1),
(505054, 'Wonders of Sri Lanka', 'Start in Negombo and end in Colombo! With the Active Adventure tour Sri Lanka\'s Bestseller - Wonders of Sri Lanka, you have a 6 days tour package taking you through Negombo, Sri Lanka and 8 other destinations in Sri Lanka. Sri Lanka\'s Bestseller - Wonders of Sri Lanka includes accommodation in a hotel as well as an expert guide, meals, transport and more. ', 'Negombo', 'Active Adventure', 5, 20000, '176045_479ea4f8.jpg', '2022-04-29 16:40:55', '2022-04-29 16:43:27', 6061, 1, 'English', 50, '2022-05-15', '2022-05-20', 0, 'Kandy', 'near negombo main bus stand', '08:00:00', '20:00:00', 10000, 1),
(505055, 'Splendour Of Sri Lanka', 'Start in Colombo and end in Negombo! With the In-depth Cultural tour Splendour Of Sri Lanka (7 Days) Free Upgrade to Private Tour Available, you have a 7 days tour package taking you through Colombo, Sri Lanka and 10 other destinations in Sri Lanka. Splendour Of Sri Lanka (7 Days) Free Upgrade to Private Tour Available includes accommodation in a hotel as well as an expert guide, meals, transport and more.', 'Colombo', 'In-depth Cultural', 6, 20000, '775773148.jpg', '2022-04-29 17:31:20', '2022-04-29 19:55:26', 6061, 1, 'English', 50, '2022-05-20', '2022-07-27', 1, 'Colombo', 'Colombo Main Bus Stand', '06:00:00', '08:00:00', 10000, 1),
(505056, 'Highlights of Sri Lanka', 'Start and end in Negombo! With the In-depth Cultural tour Highlights of Sri Lanka, you have a 8 days tour package taking you through Negombo, Sri Lanka and 10 other destinations in Sri Lanka. Highlights of Sri Lanka includes accommodation in a hotel as well as an expert guide, meals, transport and more.', 'Batticaloa', 'In-depth Cultural', 7, 10000, '261213411.jpg', '2022-04-30 19:17:47', '2022-04-30 19:19:29', 6061, NULL, 'English', 45, '2022-05-14', '2022-05-22', 1, 'Choose...', 'batticaloa bus stand', '08:00:00', '08:00:00', 5000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `partner_id` (`partner_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_earning`
--
ALTER TABLE `tbl_earning`
  ADD PRIMARY KEY (`earning_id`);

--
-- Indexes for table `tbl_home`
--
ALTER TABLE `tbl_home`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `tbl_inquiry`
--
ALTER TABLE `tbl_inquiry`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `tbl_partner`
--
ALTER TABLE `tbl_partner`
  ADD PRIMARY KEY (`partner_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_tour`
--
ALTER TABLE `tbl_tour`
  ADD PRIMARY KEY (`tour_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202030;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101015;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303032;

--
-- AUTO_INCREMENT for table `tbl_earning`
--
ALTER TABLE `tbl_earning`
  MODIFY `earning_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=808084;

--
-- AUTO_INCREMENT for table `tbl_home`
--
ALTER TABLE `tbl_home`
  MODIFY `home_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=404043;

--
-- AUTO_INCREMENT for table `tbl_inquiry`
--
ALTER TABLE `tbl_inquiry`
  MODIFY `inquiry_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=505050;

--
-- AUTO_INCREMENT for table `tbl_partner`
--
ALTER TABLE `tbl_partner`
  MODIFY `partner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=606063;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=707075;

--
-- AUTO_INCREMENT for table `tbl_tour`
--
ALTER TABLE `tbl_tour`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=505057;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD CONSTRAINT `tbl_booking_ibfk_1` FOREIGN KEY (`partner_id`) REFERENCES `tbl_partner` (`partner_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

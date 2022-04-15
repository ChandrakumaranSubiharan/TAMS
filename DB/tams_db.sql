-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 02:42 PM
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
  `avatar` text DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `contact_number` varchar(200) DEFAULT NULL,
  `staff_id` varchar(10) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user_category` varchar(200) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `avatar`, `full_name`, `username`, `password`, `contact_number`, `staff_id`, `department`, `email`, `user_category`, `status`, `created_date`, `updated_date`) VALUES
(2, NULL, 'asdsa', 'asdsa', '$2y$10$ozFT548c6gvU2CaTi5c/1O/Ehlh.hHWSINEKBJBde5RvR2srwZ15K', 'asdsa', 'asdsa', 'asdsa', 'asdsa@gsmail.com', 'asdsa', 1, '2022-03-16 10:52:31', '2022-03-16 15:22:47'),
(3, NULL, 'subiharan chandrakumaran', 'admin', '$2y$10$9onYIzKwR7YB5d2aGCcgT.3.FL.J9Sb8Kwph.w6yzT1rnipwj9EPG', '0775430351', '5684/AD', 'Adminstartive Department', 'admin@mail.com', 'super admin', 1, '2022-03-16 10:54:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(10) NOT NULL,
  `total_amount` float DEFAULT NULL,
  `cus_first_name` varchar(100) DEFAULT NULL,
  `cus_last_name` varchar(100) DEFAULT NULL,
  `cus_email` varchar(100) DEFAULT NULL,
  `cus_contact` varchar(100) DEFAULT NULL,
  `cus_payment_card_type` varchar(100) DEFAULT NULL,
  `cus_id` int(10) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `payment_status` tinyint(1) DEFAULT NULL,
  `total_nights` int(20) DEFAULT NULL,
  `total_persons` int(20) DEFAULT NULL,
  `partner_id` int(10) NOT NULL,
  `total_kids` int(11) DEFAULT NULL,
  `total_adults` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `service_name` varchar(100) DEFAULT NULL,
  `service_type` varchar(100) DEFAULT NULL,
  `payment_card_holder_name` varchar(100) DEFAULT NULL,
  `payment_card_number` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `total_amount`, `cus_first_name`, `cus_last_name`, `cus_email`, `cus_contact`, `cus_payment_card_type`, `cus_id`, `start_date`, `end_date`, `status`, `created_date`, `updated_date`, `payment_status`, `total_nights`, `total_persons`, `partner_id`, `total_kids`, `total_adults`, `service_id`, `service_name`, `service_type`, `payment_card_holder_name`, `payment_card_number`) VALUES
(1086, 20000, 'admin', 'admin', 'admin', 'admin', 'Master Card', 37, '2022-04-13', '2022-04-18', 0, '2022-04-08 16:04:55', NULL, 1, 5, 2, 5, 1, 1, 9, 'Madulkelle Tea and Eco Lodge', 'Home Stay', 'admin', 123124),
(1087, 4000, 'admin', 'admin', 'admin', 'admin', 'Visa Card', 37, '2022-04-18', '2022-04-19', 0, '2022-04-08 16:08:05', NULL, 1, 1, 2, 5, 1, 1, 9, 'Madulkelle Tea and Eco Lodge', 'Home Stay', 'admin', 142),
(1088, 15000, 'admin', 'admin', 'admin', 'admin', 'Master Card', 2022, '0000-00-00', '0000-00-00', 0, '2022-04-08 16:08:33', NULL, 1, 5, 2, 14, 3, 2, 0, 'Tour Package', 'admin', '37', 2022),
(1089, 15000, 'admin', 'admin', 'admin', 'admin', 'Master Card', 37, '2022-04-10', '2022-04-30', 0, '2022-04-08 16:15:09', NULL, 1, 9, 4, 5, 2, 2, 3, 'One Life Adventure', 'Tour Package', 'admin', 14);

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
  `image_profile` text DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `first_name`, `last_name`, `address`, `email_address`, `contact_number`, `username`, `password`, `image_profile`, `created_date`, `updated_date`, `status`) VALUES
(37, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', '$2y$10$khByQXAcewuduTY1sfAdXehO2AVRLFz2swPe61nxfsq5.hSor/cIK', NULL, '2022-03-15 07:37:29', NULL, 1),
(38, 'asfds', 'asfds', 'asfds', 'asfds', 'asfds', 'asfds', '$2y$10$OvDv2QBFMWR5lZar3Ot7h.hSFLCBktCrNpUYoMEuBJDLmOXB65sQ.', NULL, '2022-03-15 07:48:56', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_earning`
--

CREATE TABLE `tbl_earning` (
  `earning_id` int(11) NOT NULL,
  `partner_id` int(11) DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  `payout` float DEFAULT NULL,
  `net_amount` float DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `service_type` varchar(100) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `service_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_earning`
--

INSERT INTO `tbl_earning` (`earning_id`, `partner_id`, `total_amount`, `payout`, `net_amount`, `customer_id`, `created_date`, `service_type`, `service_id`, `service_name`) VALUES
(39, 5, 16000, 14400, 1600, 37, '2022-04-06 16:26:05', 'Home Stay', 9, 'Madulkelle Tea and Eco Lodge'),
(40, 5, 8000, 7200, 800, 37, '2022-04-06 16:27:58', 'Home Stay', 9, 'Madulkelle Tea and Eco Lodge'),
(41, 5, 4000, 3600, 400, 37, '2022-04-06 16:44:50', 'Home Stay', 9, 'Madulkelle Tea and Eco Lodge'),
(42, 5, 4000, 3600, 400, 37, '2022-04-07 03:49:58', 'Home Stay', 9, 'Madulkelle Tea and Eco Lodge'),
(43, 5, 4000, 3600, 400, 37, '2022-04-08 04:59:30', 'Home Stay', 9, 'Madulkelle Tea and Eco Lodge'),
(44, 5, 4000, 3600, 400, 37, '2022-04-08 14:02:29', 'Home Stay', 9, 'Madulkelle Tea and Eco Lodge'),
(45, 5, 30000, 24000, 6000, 37, '2022-04-08 15:57:41', 'Tour Package', 3, 'One Life Adventure'),
(46, 5, 15000, 12000, 3000, 37, '2022-04-08 16:01:12', 'Tour Package', 3, 'One Life Adventure'),
(47, 5, 20000, 18000, 2000, 37, '2022-04-08 16:04:55', 'Home Stay', 9, 'Madulkelle Tea and Eco Lodge'),
(48, 5, 4000, 3600, 400, 37, '2022-04-08 16:08:06', 'Home Stay', 9, 'Madulkelle Tea and Eco Lodge'),
(49, 5, 15000, 12000, 3000, 37, '2022-04-08 16:08:33', 'Tour Package', 3, 'One Life Adventure'),
(50, 5, 15000, 12000, 3000, 37, '2022-04-08 16:15:09', 'Tour Package', 3, 'One Life Adventure');

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
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) DEFAULT NULL COMMENT '0=inactive, 1=active, 2=not verified, 3=verification failed ',
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
(9, 'Madulkelle Tea and Eco Lodge', 'hom01.png', 'Madulkelle', 2500, 'Located in Madulkelle in the Kandy District region, Eco Lodge  features a garden. The property is 7 miles.', 'Resort', 'Kandy', 'Central Province', 0, '2022-04-19', '2022-04-22', '2022-03-20 15:54:35', '2022-04-15 09:11:58', 1, 5, 3, 6, 2, 1500, '08:00:00', '08:00:00'),
(10, 'Occazia Residence', '135527753.jpg', 'Poorwarama Mawatha', 20000, 'Located in Colombo, 2.9 km from Mount Lavinia Beach, Occazia Residence has accommodations with free bikes.', 'Villa', 'Colombo', 'Western', 0, '2022-04-13', '2022-04-30', '2022-03-20 16:14:44', '2022-04-08 08:03:29', 1, 5, 7, 5, 3, NULL, NULL, NULL),
(11, 'subiharan', '1876813897.jpg', 'subiharan', 21431, 'wfageshdgm', 'Cabin', 'Colombo', 'Western Province', 1, '2022-03-02', '2022-03-31', '2022-03-23 05:23:23', '2022-04-02 14:04:43', 0, 0, 9, NULL, NULL, NULL, NULL, NULL),
(12, 'fgshfdgjf', '2126121636.png', 'dgsh', 2354, 'sfadsgfdh', 'Cottage', 'Jaffna', 'Northern Province', 1, '2022-03-02', '2022-03-31', '2022-03-23 05:25:59', '2022-04-02 14:04:41', 0, 0, 4, NULL, NULL, NULL, NULL, NULL),
(13, 'asdfdgsfd', '69506495.jpg', 'sgfhdgjhj', 24343, 'dvsfd', 'Villa', 'Jaffna', 'Western Province', 1, '2022-03-01', '2022-03-31', '2022-03-23 05:38:36', '2022-04-02 14:04:37', 0, 5, 8, NULL, NULL, NULL, NULL, NULL),
(14, 'blue moon', '1177411604.png', 'blue moon', 13243, 'blue moon', 'Resort', 'Kandy', 'Northern Province', 0, '2022-04-05', '2022-04-30', '2022-03-23 06:48:11', '2022-04-02 14:04:33', 0, 5, 9, 1, 1, NULL, NULL, NULL),
(4040, 'sdfd', '41110856.jpg', 'sdfd', 21421, 'asdasd', 'Resort', 'Jaffna', 'Western Province', 1, '2022-04-05', '2022-04-29', '2022-04-15 07:06:43', '2022-04-15 10:46:12', 2, 4, 8, 8, 2, 21412, '05:55:00', '05:55:00');

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
  `inquiry_received_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `inquiry_updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_inquiry`
--

INSERT INTO `tbl_inquiry` (`inquiry_id`, `enquirer_name`, `enquirer_email`, `enquirer_contact`, `enquirer_subject`, `enquirer_descr`, `inquiry_received_date`, `inquiry_updated_date`, `status`) VALUES
(1, 'afds', 'info@happyholidayss.com', 'afds', 'afds', 'afdsj', '2022-03-16 16:40:33', '2022-03-16 16:40:33', 0);

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
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `province` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_partner`
--

INSERT INTO `tbl_partner` (`partner_id`, `first_name`, `last_name`, `username`, `password`, `address`, `email_address`, `contact_number`, `status`, `gender`, `zipcode`, `created_date`, `updated_date`, `province`) VALUES
(1, 'asdsfdgf', 'asdsfdgf', 'asdsfdgf', '$2y$10$cMabVvf4E3doIfSlRAnrL.MuvujrbJI6s6l06R9.RL1/cW9jAduES', 'asdsfdgf', 'asdsfdgf', 'asdsfdgf', 0, '1', 0, '2022-03-15 08:51:07', NULL, '1'),
(2, 'dwesrdhtf', 'dwesrdhtf', 'dwesrdhtf', '$2y$10$KVsJIOBrmJ30YbN4NJ3GhulsaHXVg6CwIQ6xjGXItB/2K65Adcd9.', 'dwesrdhtf', 'dwesrdhtf', 'dwesrdhtf', 0, '3', 0, '2022-03-15 09:00:27', NULL, '4'),
(3, 'dgfhgjhkjk', 'dgfhgjhkjk', 'dgfhgjhkjk', '$2y$10$CBd8LB3/wkNwrGCko1ki/.jyveMjho2PfY4lbLyjXoddz5he95sU.', 'dgfhgjhkjk', 'dgfhgjhkjk', 'dgfhgjhkjk', 0, '2', 1412, '2022-03-15 12:06:32', NULL, '4'),
(4, 'asgsa', 'asgsa', 'asgsa', '$2y$10$NYHEwOuKLpt7PEwEMl4R6uxwkbGy4Bf9p8juHpHVMyj.5GCuKvhr6', 'asgsa', 'asgsa', 'asgsa', 0, 'prefered not to say', 2125, '2022-03-15 12:10:12', NULL, 'Uva'),
(5, 'partner', 'partner', 'partner', '$2y$10$urO7KTGMCkaOf1PggnrLdO5iRjgc6mhxJVo/03.usTE5xF7bIMifW', 'partner', 'partner@mail.com', 'partner', 1, 'male', 21324, '2022-03-15 13:32:08', '2022-04-15 12:40:15', 'Northern');

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
  `created_date` timestamp NULL DEFAULT NULL,
  `approved_date` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `review_title`, `review_description`, `review_user_type`, `customer_id`, `service_id`, `review_rating`, `created_date`, `approved_date`, `status`, `customer_name`) VALUES
(5, 'asd', 'asdas', 'Friends', 37, 9, 1, '2022-04-08 03:53:41', NULL, 0, 'admin'),
(6, 'We had great experience while our stay and Hilton Hotels!', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s stand dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.', 'Friends', 37, 9, 5, '2022-04-08 04:14:28', NULL, 1, 'admin'),
(7, ' We had great experience while our stay and Hilton Hotels!', '\r\nWe had great experience while our stay and Hilton Hotels!\r\n5/5We had great experience while our stay and Hilton Hotels!\r\n5/5We had great experience while our stay and Hilton Hotels!\r\n5/5\r\n', 'Friends', 37, 9, 3, '2022-04-08 04:23:06', NULL, 1, 'admin'),
(8, ' We had great experience while our stay and Hilton Hotels!', '\r\nWe had great experience while our stay and Hilton Hotels!\r\n5/5We had great experience while our stay and Hilton Hotels!\r\n5/5We had great experience while our stay and Hilton Hotels!\r\n5/5\r\n', 'Friends', 37, 9, 3, '2022-04-08 04:23:15', NULL, 1, 'admin'),
(9, 'I Enjoyed It', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Friends', 37, 3, 4, '2022-04-08 15:51:16', NULL, 1, 'admin');

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
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `partner_id` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '0=inactive,\r\n1=active,\r\n2=not verified,\r\n3=verification failed',
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
(3, 'One Life Adventure', 'Start in paradeniya and end in Colombo! With the Active Adventure tour Sri Lanka One Life Adventures - 12 Days, you have a 12 days tour package taking you through paradeniya, Sri Lanka and 9 other destinations in Sri Lanka. Sri Lanka One Life Adventures - 12 Days includes accommodation in a hotel as well as an expert guide, meals, transport and more.\r\n', 'paradeniya', 'Active Adventure', 9, 5000, '926926904.jpg', '2022-04-05 16:15:05', '2022-04-15 10:40:05', 5, 2, 'English', 2, '2022-04-10', '2022-04-30', 0, 'Kandy', 'hillcity hotel', '08:00:00', '16:00:00', 1000, 0),
(4, 'Sri Lanka Uncovered', 'Start in Negombo and end in Unawatuna! With the Active Adventure tour Sri Lanka Uncovered, you have a 10 days tour package taking you through Negombo, Sri Lanka and 7 other destinations in Sri Lanka. Sri Lanka Uncovered includes accommodation, an expert guide, meals, transport and more. ', 'Negombo', 'Explorer', 9, 5000, '110771948.jpg', '2022-04-14 05:17:52', '2022-04-15 10:48:22', 4, 1, 'English', 50, '2022-04-25', '2022-05-05', 0, 'Colombo', 'lily hotel', '08:00:00', '20:00:00', 2500, 1);

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
  ADD PRIMARY KEY (`booking_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2020;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1090;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3030;

--
-- AUTO_INCREMENT for table `tbl_earning`
--
ALTER TABLE `tbl_earning`
  MODIFY `earning_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_home`
--
ALTER TABLE `tbl_home`
  MODIFY `home_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4041;

--
-- AUTO_INCREMENT for table `tbl_inquiry`
--
ALTER TABLE `tbl_inquiry`
  MODIFY `inquiry_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5050;

--
-- AUTO_INCREMENT for table `tbl_partner`
--
ALTER TABLE `tbl_partner`
  MODIFY `partner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6060;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_tour`
--
ALTER TABLE `tbl_tour`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

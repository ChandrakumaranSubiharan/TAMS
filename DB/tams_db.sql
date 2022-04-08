-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2022 at 04:41 PM
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
  `home_id` int(10) DEFAULT NULL,
  `package_id` int(10) DEFAULT NULL,
  `partner_id` int(10) NOT NULL,
  `home_name` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `created_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_home`
--

CREATE TABLE `tbl_home` (
  `home_id` int(20) NOT NULL,
  `home_name` varchar(50) DEFAULT NULL,
  `cover_img1` text DEFAULT NULL,
  `location_address` varchar(200) DEFAULT NULL,
  `ava_night_price` float DEFAULT NULL,
  `lg_desc` varchar(1500) DEFAULT NULL,
  `home_type` varchar(100) DEFAULT NULL,
  `extra_people` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `cancellation` tinyint(1) DEFAULT NULL,
  `ava_start_date` date DEFAULT NULL,
  `ava_end_date` date DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) DEFAULT NULL,
  `partner_id` int(20) DEFAULT NULL,
  `rooms` int(10) NOT NULL,
  `max_adults` int(10) DEFAULT NULL,
  `max_kids` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_home`
--

INSERT INTO `tbl_home` (`home_id`, `home_name`, `cover_img1`, `location_address`, `ava_night_price`, `lg_desc`, `home_type`, `extra_people`, `district`, `province`, `cancellation`, `ava_start_date`, `ava_end_date`, `created_date`, `updated_date`, `status`, `partner_id`, `rooms`, `max_adults`, `max_kids`) VALUES
(9, 'Madulkelle Tea and Eco Lodge', '1135827141.png', 'Madulkelle', 2500, 'Located in Madulkelle in the Kandy District region, Eco Lodge  features a garden. The property is 7 miles.', 'Resort', 'No Charge', 'Kandy', 'Central', 0, '2022-04-05', '2022-04-14', '2022-03-20 15:54:35', '2022-04-02 09:45:26', 1, 5, 3, 5, 2),
(10, 'Occazia Residence', '135527753.jpg', 'Poorwarama Mawatha', 20000, 'Located in Colombo, 2.9 km from Mount Lavinia Beach, Occazia Residence has accommodations with free bikes.', 'Villa', 'No Charge', 'Colombo', 'Western', 0, '2022-03-25', '2022-03-31', '2022-03-20 16:14:44', '2022-03-25 16:14:48', 1, 5, 7, 5, 3),
(11, 'subiharan', '1876813897.jpg', 'subiharan', 21431, 'wfageshdgm', 'Cabin', 'No Charge', 'Colombo', 'Western Province', 1, '2022-03-02', '2022-03-31', '2022-03-23 05:23:23', '2022-04-02 14:04:43', 0, 0, 9, NULL, NULL),
(12, 'fgshfdgjf', '2126121636.png', 'dgsh', 2354, 'sfadsgfdh', 'Cottage', 'afs', 'Jaffna', 'Northern Province', 1, '2022-03-02', '2022-03-31', '2022-03-23 05:25:59', '2022-04-02 14:04:41', 0, 0, 4, NULL, NULL),
(13, 'asdfdgsfd', '69506495.jpg', 'sgfhdgjhj', 24343, 'dvsfd', 'Villa', 'asd', 'Jaffna', 'Western Province', 1, '2022-03-01', '2022-03-31', '2022-03-23 05:38:36', '2022-04-02 14:04:37', 0, 5, 8, NULL, NULL),
(14, 'blue moon', '1177411604.png', 'blue moon', 13243, 'blue moon', 'Resort', 'No Charge', 'Kandy', 'Northern Province', 0, '2022-04-05', '2022-04-30', '2022-03-23 06:48:11', '2022-04-02 14:04:33', 0, 5, 9, 1, 1);

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
  `avatar` text DEFAULT NULL,
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

INSERT INTO `tbl_partner` (`partner_id`, `avatar`, `first_name`, `last_name`, `username`, `password`, `address`, `email_address`, `contact_number`, `status`, `gender`, `zipcode`, `created_date`, `updated_date`, `province`) VALUES
(1, '', 'asdsfdgf', 'asdsfdgf', 'asdsfdgf', '$2y$10$cMabVvf4E3doIfSlRAnrL.MuvujrbJI6s6l06R9.RL1/cW9jAduES', 'asdsfdgf', 'asdsfdgf', 'asdsfdgf', 0, '1', 0, '2022-03-15 08:51:07', NULL, '1'),
(2, 'null', 'dwesrdhtf', 'dwesrdhtf', 'dwesrdhtf', '$2y$10$KVsJIOBrmJ30YbN4NJ3GhulsaHXVg6CwIQ6xjGXItB/2K65Adcd9.', 'dwesrdhtf', 'dwesrdhtf', 'dwesrdhtf', 0, '3', 0, '2022-03-15 09:00:27', NULL, '4'),
(3, NULL, 'dgfhgjhkjk', 'dgfhgjhkjk', 'dgfhgjhkjk', '$2y$10$CBd8LB3/wkNwrGCko1ki/.jyveMjho2PfY4lbLyjXoddz5he95sU.', 'dgfhgjhkjk', 'dgfhgjhkjk', 'dgfhgjhkjk', 0, '2', 1412, '2022-03-15 12:06:32', NULL, '4'),
(4, NULL, 'asgsa', 'asgsa', 'asgsa', '$2y$10$NYHEwOuKLpt7PEwEMl4R6uxwkbGy4Bf9p8juHpHVMyj.5GCuKvhr6', 'asgsa', 'asgsa', 'asgsa', 0, 'prefered not to say', 2125, '2022-03-15 12:10:12', NULL, 'Uva'),
(5, NULL, 'partner', 'partner', 'partner', '$2y$10$xExmQfXOMVKzYnQv63/qM.lpEF0ddIS2kdjWFJze2yTwyr9QxiKre', 'partner', 'partner', 'partner', 1, 'male', 21324, '2022-03-15 13:32:08', '2022-03-15 18:03:30', 'Northern');

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
  `duration_days` int(10) DEFAULT NULL,
  `price_per_day_adult` double DEFAULT NULL,
  `price_per_day_child` double DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `partner_id` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `availabile_seats` int(11) DEFAULT NULL,
  `ava_start_date` date DEFAULT NULL,
  `ava_end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1039;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3030;

--
-- AUTO_INCREMENT for table `tbl_earning`
--
ALTER TABLE `tbl_earning`
  MODIFY `earning_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_home`
--
ALTER TABLE `tbl_home`
  MODIFY `home_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4040;

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
-- AUTO_INCREMENT for table `tbl_tour`
--
ALTER TABLE `tbl_tour`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

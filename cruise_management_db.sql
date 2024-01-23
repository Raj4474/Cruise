-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2023 at 02:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cruise_management_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(10) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_email`, `a_pwd`) VALUES
(1, 'System admin', 'sysadmin@cms.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `b_id` int(10) NOT NULL,
  `b_in` date NOT NULL,
  `b_out` date NOT NULL,
  `b_guests` varchar(100) NOT NULL,
  `u_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`b_id`, `b_in`, `b_out`, `b_guests`, `u_id`) VALUES
(8, '2023-09-08', '2023-09-15', 'pilu', 11),
(9, '2023-09-19', '2023-09-29', 'tushar', 12),
(10, '2023-09-02', '2023-09-14', 'nasit', 11),
(11, '2023-09-07', '2023-09-15', 'Raj Hirpara', 11),
(12, '2023-09-07', '2023-09-15', 'Raj Hirpara', 11);

-- --------------------------------------------------------

--
-- Table structure for table `cruises`
--

CREATE TABLE `cruises` (
  `c_id` int(10) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_days` int(5) NOT NULL,
  `c_price` int(10) NOT NULL,
  `c_pic` varchar(255) NOT NULL,
  `c_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cruises`
--

INSERT INTO `cruises` (`c_id`, `c_name`, `c_days`, `c_price`, `c_pic`, `c_category`) VALUES
(4, 'Greece, Italy & Croatia Cruise (7 Nights)', 6, 330, 'popular-cruises-5-370x264.jpeg', 'Advanture'),
(5, 'The Fjords and Glaciers Cruise through Norway and Scandinavia', 7, 480, 'popular-cruises-2-370x264.jpeg', 'Advanture');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `m_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `msg` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ships`
--

CREATE TABLE `ships` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_imo` varchar(30) NOT NULL,
  `s_max_pass` int(10) NOT NULL,
  `s_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ships`
--

INSERT INTO `ships` (`s_id`, `s_name`, `s_imo`, `s_max_pass`, `s_img`) VALUES
(1, 'Advanture', '4569855', 3000, 'ship-1.jpg'),
(5, 'antem', 'AM556876', 2100, 'ship-3.jpg'),
(6, 'brilliance', 'TR48762', 3400, 'ship-4.jpg'),
(7, 'enchantment', 'WQ33248', 1200, 'ship-5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(10) NOT NULL,
  `u_fname` varchar(100) NOT NULL,
  `u_lname` varchar(100) NOT NULL,
  `u_dob` date NOT NULL,
  `u_country` varchar(100) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_pwd` varchar(100) NOT NULL,
  `u_phone` varchar(10) NOT NULL,
  `u_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_fname`, `u_lname`, `u_dob`, `u_country`, `u_email`, `u_pwd`, `u_phone`, `u_img`) VALUES
(3, 'krmit', 'Hirpara', '2005-01-29', 'Canada', 'krmit@gmail.com', '789', '5478961235', 'images/user_profile_img/testimonials-person-5-96x96.jpeg'),
(11, 'Raj', 'Hirpara', '2004-05-05', 'Maldives', 'raj@gmail.com', '12345678', '7894651231', 'images/user_profile_img/testimonials-person-3-96x96.jpeg'),
(12, 'tushar', 'malvi', '2023-09-13', 'India', 'tushar@gmail.com', 'tushar123456', '1122334455', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `cruises`
--
ALTER TABLE `cruises`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `ships`
--
ALTER TABLE `ships`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cruises`
--
ALTER TABLE `cruises`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ships`
--
ALTER TABLE `ships`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

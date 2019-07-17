-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2019 at 06:55 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goverdhan`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `menu_sub_category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `menu_category_id` int(11) NOT NULL,
  `name_hindi` varchar(255) CHARACTER SET utf8 NOT NULL,
  `daily` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_sub_category_id`, `name`, `status`, `is_deleted`, `menu_category_id`, `name_hindi`, `daily`) VALUES
(1, 1, 'Mango Ras', '', 0, 2, 'आम  रस', 'changed'),
(2, 2, 'Pineapple Halwa', '', 0, 2, 'अनन्नास हलवा', 'changed'),
(3, 3, 'Khaman', '', 0, 3, 'खमण', 'changed'),
(4, 4, 'Mung Dal Gugra', '', 0, 3, 'मुंग दाल गुगरा', 'changed'),
(5, 5, 'NA', '', 0, 3, 'NA', 'changed'),
(6, 6, 'Paneer Butter Masala', '', 0, 1, 'पनीर मक्खन मसाला', 'changed'),
(7, 7, 'Kamal Kandi', '', 0, 1, 'कमल कांडी', 'changed'),
(8, 8, 'Safed Chawala', '', 0, 1, 'सफ़ेद चवला', 'changed'),
(9, 9, 'Bataka Sukhi Bhaji', '', 0, 1, 'बटका सुखी भाजी', 'changed'),
(10, 10, 'Dal Bati', '', 0, 4, 'दाल बाटी', 'changed'),
(11, 11, 'Lasan Ki Chatni', '', 0, 4, 'लसान की चटनी', 'changed'),
(12, 12, 'Poori', '', 0, 5, 'पुरी', 'changed'),
(13, 13, 'Dal (Rajsthani | Gujrati)', '', 0, 5, 'दाल (राजस्थानी | गुजराती)', 'changed'),
(14, 14, 'Kadhi(Rajsthani | Gujrati)', '', 0, 5, 'कढ़ी (राजस्थानी | गुजराती)', 'changed'),
(15, 15, 'Rice | Khicadi', '', 0, 5, 'चावल | खिचडी', 'changed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

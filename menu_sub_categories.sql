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
-- Table structure for table `menu_sub_categories`
--

CREATE TABLE `menu_sub_categories` (
  `id` int(11) NOT NULL,
  `menu_category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_sub_categories`
--

INSERT INTO `menu_sub_categories` (`id`, `menu_category_id`, `name`, `status`, `is_deleted`) VALUES
(1, 2, 'Liquid', '', 0),
(2, 2, 'Dry', '', 0),
(3, 3, 'Fry', '', 0),
(4, 3, 'Punjabi', '', 0),
(5, 3, 'Chinese', '', 0),
(6, 1, 'Paneer', '', 0),
(7, 1, 'Season', '', 0),
(8, 1, 'Kathole', '', 0),
(9, 1, 'Bataka', '', 0),
(10, 4, 'option 1', '', 0),
(11, 4, 'option 2', '', 0),
(12, 5, 'option 2', '', 0),
(13, 5, 'option 3', '', 0),
(14, 5, 'option 4', '', 0),
(15, 5, 'option 5', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_sub_categories`
--
ALTER TABLE `menu_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_sub_categories`
--
ALTER TABLE `menu_sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

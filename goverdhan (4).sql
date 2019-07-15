-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2019 at 07:06 AM
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
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `attendance_status` int(5) NOT NULL COMMENT '1 Present, 2 Half Day, 3 Absent, 4 Off, 5 full',
  `attendance_date` date NOT NULL,
  `remarks` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) NOT NULL,
  `transaction_date` date NOT NULL,
  `voucher_no` int(10) NOT NULL,
  `table_id` int(10) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `tax_id` int(10) NOT NULL,
  `round_off` decimal(5,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_type` varchar(10) NOT NULL,
  `delivery_no` int(10) DEFAULT NULL,
  `take_away_no` int(10) DEFAULT NULL,
  `occupied_time` timestamp NULL DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `no_of_pax` int(11) DEFAULT NULL,
  `payment_status` int(10) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `employee_id` int(10) DEFAULT NULL,
  `offer_id` int(10) DEFAULT NULL,
  `is_deleted` varchar(10) DEFAULT 'no',
  `financial_year_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `transaction_date`, `voucher_no`, `table_id`, `total`, `tax_id`, `round_off`, `grand_total`, `customer_id`, `created_on`, `order_type`, `delivery_no`, `take_away_no`, `occupied_time`, `status`, `no_of_pax`, `payment_status`, `payment_type`, `employee_id`, `offer_id`, `is_deleted`, `financial_year_id`) VALUES
(1, '2019-07-02', 1, 0, '336.00', 0, '0.00', '336.00', NULL, '2019-07-02 10:25:07', 'dinner', NULL, NULL, '2019-07-02 04:55:07', '', NULL, 0, 'cash', 1, NULL, 'no', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bill_rows`
--

CREATE TABLE `bill_rows` (
  `id` int(10) NOT NULL,
  `bill_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `rate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discount_per` decimal(10,2) DEFAULT '0.00',
  `discount_amount` decimal(10,2) NOT NULL,
  `net_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tax_per` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_rows`
--

INSERT INTO `bill_rows` (`id`, `bill_id`, `item_id`, `quantity`, `rate`, `amount`, `discount_per`, `discount_amount`, `net_amount`, `tax_per`) VALUES
(1, 1, 3, '1.00', '200.00', '200.00', '0.00', '0.00', '210.00', '5.00'),
(2, 1, 2, '1.00', '120.00', '120.00', '0.00', '0.00', '126.00', '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `bill_settings`
--

CREATE TABLE `bill_settings` (
  `id` int(10) NOT NULL,
  `header` text NOT NULL,
  `footer` text NOT NULL,
  `last_copied_bill_id` int(11) NOT NULL,
  `current_software` varchar(10) NOT NULL,
  `default_value` varchar(100) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_settings`
--

INSERT INTO `bill_settings` (`id`, `header`, `footer`, `last_copied_bill_id`, `current_software`, `default_value`, `date_from`, `date_to`) VALUES
(1, '<div style="line-height: 20px;" align="center">\r\n					<span style="font-size: 16px;font-weight: bold;color: #373435;">Gordhan Thal</span><br>\r\n					<span style="font-size: 9px;font-weight: bold;color: #606062;">Udaipur (Raj.) 8949995264<br></span></div><div style="line-height: 20px;" align="center"><span style="font-size: 14px;font-weight: bold;color: #606062;">GST Invoice<br></span>\r\n				</div>', '<div align="center">\r\n					<span style="font-size:10px;">Thank you for your order. Have a nice day !&nbsp;</span></div>', 0, 'Actual', 'Yes', '0000-00-00', '0000-00-00'),
(2, '<div style="line-height: 20px;" align="center">\n					<span style="font-size: 16px;font-weight: bold;color: #373435;">DOSA PLAZA</span><br>\n					<span style="font-size: 9px;font-weight: bold;color: #606062;">Bhilwara (Raj.) 8949995264<br></span></div><div style="line-height: 20px;" align="center"><span style="font-size: 14px;font-weight: bold;color: #606062;">GST Invoice<br></span>\n				</div>', '<div align="center">\r\n					<span style="font-size:10px;">Thank you for your order. Have a nice day ! </span></div>', 0, 'Actual', 'No', '2019-06-01', '2019-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) NOT NULL,
  `booking_date` date NOT NULL,
  `no_of_guests` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_mobile` varchar(10) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`) VALUES
(1, 'Spicy'),
(2, 'Midum socy'),
(3, 'less oil'),
(4, 'No masrum');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gst_no` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `website` varchar(111) NOT NULL,
  `brand_name` varchar(111) NOT NULL,
  `logo` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `gst_no`, `email`, `mobile_no`, `website`, `brand_name`, `logo`) VALUES
(1, 'Gordhan Thal', '22ASDFR0967W6Z6', 'gordhanthal@dummy.com', '9876543210', 'www.gordhanthal.com', 'GT', '1'),
(2, 'wd', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `copy_bills`
--

CREATE TABLE `copy_bills` (
  `id` int(10) NOT NULL,
  `transaction_date` date NOT NULL,
  `voucher_no` varchar(50) NOT NULL,
  `table_id` int(10) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `tax_id` int(10) NOT NULL,
  `round_off` decimal(5,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_type` varchar(10) NOT NULL,
  `delivery_no` int(10) DEFAULT NULL,
  `take_away_no` int(10) DEFAULT NULL,
  `occupied_time` timestamp NULL DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `no_of_pax` int(11) DEFAULT NULL,
  `payment_status` int(10) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `employee_id` int(10) DEFAULT NULL,
  `offer_id` int(10) DEFAULT NULL,
  `is_deleted` varchar(10) DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `copy_bills`
--

INSERT INTO `copy_bills` (`id`, `transaction_date`, `voucher_no`, `table_id`, `total`, `tax_id`, `round_off`, `grand_total`, `customer_id`, `created_on`, `order_type`, `delivery_no`, `take_away_no`, `occupied_time`, `status`, `no_of_pax`, `payment_status`, `payment_type`, `employee_id`, `offer_id`, `is_deleted`) VALUES
(1, '2019-07-02', '1', 0, '336.00', 0, '0.00', '336.00', NULL, '2019-07-02 10:25:07', 'dinner', NULL, NULL, '2019-07-02 04:55:07', '', NULL, 0, 'cash', 1, NULL, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `copy_bill_rows`
--

CREATE TABLE `copy_bill_rows` (
  `id` int(10) NOT NULL,
  `bill_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `rate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discount_per` decimal(10,2) DEFAULT '0.00',
  `discount_amount` decimal(10,2) NOT NULL,
  `net_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tax_per` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `copy_bill_rows`
--

INSERT INTO `copy_bill_rows` (`id`, `bill_id`, `item_id`, `quantity`, `rate`, `amount`, `discount_per`, `discount_amount`, `net_amount`, `tax_per`) VALUES
(1, 1, 3, '1.00', '200.00', '200.00', '0.00', '0.00', '210.00', '5.00'),
(2, 1, 2, '1.00', '120.00', '120.00', '0.00', '0.00', '126.00', '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` text,
  `mobile_no` varchar(10) NOT NULL,
  `dob` date DEFAULT NULL,
  `anniversary` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `customer_code` int(10) NOT NULL,
  `c_unique_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daily_usages`
--

CREATE TABLE `daily_usages` (
  `id` int(11) NOT NULL,
  `voucher_no` int(11) NOT NULL,
  `transaction_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_usages`
--

INSERT INTO `daily_usages` (`id`, `voucher_no`, `transaction_date`) VALUES
(1, 1, '2019-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `daily_usage_rows`
--

CREATE TABLE `daily_usage_rows` (
  `id` int(11) NOT NULL,
  `daily_usage_id` int(11) NOT NULL,
  `raw_material_id` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_usage_rows`
--

INSERT INTO `daily_usage_rows` (`id`, `daily_usage_id`, `raw_material_id`, `quantity`) VALUES
(1, 1, 1, '4.00'),
(2, 1, 2, '3.00');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `is_deleted`) VALUES
(1, 'Steward', 0),
(2, 'Captain', 0),
(3, 'Housekeeping', 0),
(4, 'Admin', 0),
(5, 'kitchen', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL,
  `designation_id` int(10) NOT NULL,
  `delete_month` int(10) DEFAULT NULL,
  `delete_year` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `mobile_no`, `email`, `address`, `created_on`, `is_deleted`, `designation_id`, `delete_month`, `delete_year`) VALUES
(1, 'Gopal', '', '', '', '2019-06-13 12:56:14', 0, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_salaries`
--

CREATE TABLE `employee_salaries` (
  `id` int(10) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `employee_id` int(10) NOT NULL,
  `effective_from` date NOT NULL DEFAULT '2000-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expanse_heads`
--

CREATE TABLE `expanse_heads` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expanse_heads`
--

INSERT INTO `expanse_heads` (`id`, `name`) VALUES
(1, 'Pav'),
(2, 'petrol Activa'),
(3, 'petrol passion'),
(4, 'petrol delux'),
(5, 'wood for pizza'),
(6, 'sachin sir'),
(7, 'shilpa mam'),
(8, 'namkeen'),
(9, 'vegitable'),
(10, 'chaaku dhaar'),
(11, 'dj'),
(12, 'cold drink/ soda'),
(13, 'sabji'),
(14, 'aata pisaai'),
(15, 'freight( tempo )'),
(16, 'sir discount'),
(17, 'koyla'),
(18, 'papad'),
(19, 'water 1 ltr gallons'),
(20, 'water 500 ml gallons'),
(21, 'newspaper '),
(22, 'baloon decoration'),
(23, 'motorcycle /activa repairing puncture'),
(24, 'amul cream'),
(25, 'extra xyz'),
(26, 'electrician'),
(27, 'plumber'),
(28, 'khaati'),
(29, 'paneer'),
(30, 'milk');

-- --------------------------------------------------------

--
-- Table structure for table `expanse_vouchers`
--

CREATE TABLE `expanse_vouchers` (
  `id` int(10) NOT NULL,
  `transaction_date` date NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `voucher_no` int(10) NOT NULL,
  `narration` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expanse_voucher_rows`
--

CREATE TABLE `expanse_voucher_rows` (
  `id` int(10) NOT NULL,
  `expanse_voucher_id` int(10) NOT NULL,
  `expanse_head_id` int(10) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `floor_nos`
--

CREATE TABLE `floor_nos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `floor_nos`
--

INSERT INTO `floor_nos` (`id`, `name`, `status`) VALUES
(1, 'First Floor', 'Active'),
(2, 'Second Floor', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_records`
--

CREATE TABLE `inventory_records` (
  `id` int(10) NOT NULL,
  `transaction_date` date NOT NULL,
  `item_list_id` int(10) NOT NULL,
  `projection` decimal(10,2) DEFAULT NULL,
  `adjustment` decimal(10,2) DEFAULT NULL,
  `mall` decimal(10,2) DEFAULT NULL,
  `road` decimal(10,2) DEFAULT NULL,
  `wastage` decimal(10,2) DEFAULT NULL,
  `closing_balance` decimal(10,2) DEFAULT NULL,
  `consumption` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_sub_category_id` int(11) NOT NULL,
  `tax_id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  `rate` decimal(10,2) NOT NULL,
  `discount_applicable` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL COMMENT '0 = active, 1 = deleted',
  `is_favorite` tinyint(1) NOT NULL DEFAULT '0',
  `color` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_sub_category_id`, `tax_id`, `name`, `description`, `rate`, `discount_applicable`, `created_on`, `created_by`, `edited_on`, `is_deleted`, `is_favorite`, `color`) VALUES
(1, 1, 2, 'Gordhan Special Thali', 'Gordhan Special Thali', '150.00', 0, '2019-06-19 09:16:47', 1, '0000-00-00 00:00:00', 0, 0, '#ffffaa'),
(2, 1, 2, 'Adult Thali', 'Adult Thali', '120.00', 0, '2019-06-19 13:16:26', 1, '0000-00-00 00:00:00', 0, 0, '#ffffaa'),
(3, 2, 2, 'Special Gordhen thali', 'Special Gordhen thali', '200.00', 0, '2019-06-19 13:18:27', 1, '0000-00-00 00:00:00', 0, 0, '#9afd9a'),
(4, 3, 1, 'Jeera Rice', 'Jeera Rice', '90.00', 0, '2019-06-19 13:25:25', 1, '0000-00-00 00:00:00', 0, 0, '#ffffaa'),
(5, 5, 2, 'Gordhan Special Dal Bati', 'Gordhan Special Dal Bati', '130.00', 1, '2019-06-19 13:25:57', 1, '0000-00-00 00:00:00', 0, 0, '#fb8181'),
(6, 4, 2, 'Dal Tadka', 'Dal Tadka', '80.00', 0, '2019-06-19 13:26:36', 1, '0000-00-00 00:00:00', 0, 0, '#fb8181'),
(7, 3, 2, 'wefwe', 'ewfwf', '121.00', 0, '2019-06-21 14:17:44', 1, '2019-07-09 10:13:45', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = active, 1 = deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `name`, `is_deleted`) VALUES
(1, 'Dine In', 0),
(2, 'Take Away', 0),
(3, 'Swiggy', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_lists`
--

CREATE TABLE `item_lists` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_rows`
--

CREATE TABLE `item_rows` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `raw_material_id` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_sub_categories`
--

CREATE TABLE `item_sub_categories` (
  `id` int(11) NOT NULL,
  `item_category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL COMMENT '0 = active, 1 = deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_sub_categories`
--

INSERT INTO `item_sub_categories` (`id`, `item_category_id`, `name`, `is_deleted`) VALUES
(1, 1, 'Thali', 0),
(2, 1, 'Special Thali', 0),
(3, 2, 'Rice', 0),
(4, 2, 'Dal', 0),
(5, 3, 'Special Dal-Bati', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kots`
--

CREATE TABLE `kots` (
  `id` int(10) NOT NULL,
  `voucher_no` varchar(100) NOT NULL,
  `table_id` int(10) NOT NULL,
  `bill_pending` varchar(10) NOT NULL DEFAULT 'yes',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bill_id` int(10) DEFAULT NULL,
  `one_comment` text NOT NULL,
  `order_type` varchar(20) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `delete_time` timestamp NULL DEFAULT NULL,
  `employee_id` int(10) DEFAULT NULL,
  `financial_year_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kots`
--

INSERT INTO `kots` (`id`, `voucher_no`, `table_id`, `bill_pending`, `created_on`, `bill_id`, `one_comment`, `order_type`, `is_deleted`, `delete_time`, `employee_id`, `financial_year_id`) VALUES
(1, '1', 0, 'no', '2019-07-02 10:25:07', 1, '', 'dinner', 0, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kot_rows`
--

CREATE TABLE `kot_rows` (
  `id` int(10) NOT NULL,
  `kot_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `item_comment` text NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `delete_time` timestamp NULL DEFAULT NULL,
  `delete_comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kot_rows`
--

INSERT INTO `kot_rows` (`id`, `kot_id`, `item_id`, `quantity`, `rate`, `amount`, `item_comment`, `is_deleted`, `delete_time`, `delete_comment`) VALUES
(1, 1, 3, '1.00', '200.00', '200.00', '', 0, NULL, ''),
(2, 1, 2, '1.00', '120.00', '120.00', '', 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `manual_stocks`
--

CREATE TABLE `manual_stocks` (
  `id` int(10) NOT NULL,
  `raw_material_id` int(10) NOT NULL,
  `physical` decimal(10,2) DEFAULT NULL,
  `transaction_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offer_codes`
--

CREATE TABLE `offer_codes` (
  `id` int(10) NOT NULL,
  `offer_name` varchar(100) NOT NULL,
  `offer_code` varchar(100) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=enabled, 0=disabled',
  `discount_per` decimal(4,2) NOT NULL,
  `discount_rs` decimal(4,2) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer_codes`
--

INSERT INTO `offer_codes` (`id`, `offer_name`, `offer_code`, `is_enabled`, `discount_per`, `discount_rs`, `date_from`, `date_to`) VALUES
(1, 'demo', 'demo', 1, '10.00', '0.00', '0000-00-00', '0000-00-00'),
(2, '12% discount', '12Dis', 1, '12.00', '0.00', '0000-00-00', '0000-00-00'),
(3, '10 rs discount', '10rs', 1, '0.00', '0.00', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `controller_name` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `controller_name`, `action`, `name`) VALUES
(1, 'Users', 'Dashboard', 'Dashboard'),
(2, 'PurchaseVouchers', 'add', 'Stock In Add'),
(3, 'PurchaseVouchers', 'index', 'List Stock In '),
(4, 'RawMaterials', 'stock_adjustment', 'Raw Materials Stock Adjustment'),
(5, 'Attendances', 'add', 'Attendances '),
(6, 'ItemCategories', 'add', 'Item Category'),
(7, 'ItemSubCategories', 'add', 'Item Sub Category'),
(8, 'Items', 'add', 'Items Add'),
(9, 'Items', 'index', 'Items View'),
(10, 'RawMaterialCategories', 'add', 'Raw Material Category'),
(11, 'RawMaterialSubCategories', 'add', 'Raw Material Sub Category'),
(12, 'RawMaterials', 'add', 'Raw Material Add'),
(13, 'RawMaterials', 'index', 'RawMaterial View'),
(14, 'OfferCodes', 'index', 'Offer Code'),
(15, 'Employees', 'add', 'Employee Add'),
(16, 'Employees', 'index', 'Employee View'),
(17, 'Vendors', 'add', 'Vendor Add'),
(18, 'Vendors', 'index', 'Vendors View'),
(19, 'Customers', 'index', 'Customers'),
(20, 'Bills', 'index', 'Bills'),
(21, 'Comments', 'add', 'Comments'),
(22, 'Tables', 'add', 'Tables'),
(23, 'Designations', 'add', 'Designations'),
(24, 'Taxes', 'add', 'Taxes'),
(25, 'Units', 'add', 'Units'),
(26, 'Users', 'Reports', 'Reports'),
(27, 'Tables', 'index', 'Table'),
(28, 'UserRights', 'index', 'User Rights'),
(29, 'RawMaterials', 'store', 'Store'),
(30, 'ExpanseVouchers', 'add', 'Expanse Voucher Add'),
(31, 'ExpanseVouchers', 'index', 'Expanse Voucher List'),
(32, 'ExpanseVouchers', 'view', 'Expanse Voucher Report'),
(33, 'Users', 'index', 'Users'),
(34, 'InventoryRecords', 'index', 'Manual Daily Inventory'),
(35, 'InventoryRecords', 'report', 'Manual Daily Inventory - Report'),
(36, 'VegetableRecords', 'index', 'Vegetable Records'),
(37, 'VegetableRates', 'index', 'Vegetable Rates'),
(38, 'ItemSubCategories', 'subGroupItemReportSearch', 'Daily Sales - Sub Group Wise'),
(39, 'ManualStocks', 'index', 'Manual Stock of RM'),
(40, 'tables', 'index', 'Billing'),
(41, 'Bookings', 'add', 'Bookings Add'),
(42, 'Bookings', 'index', 'Bookings List'),
(43, 'Bill-settings', 'index', 'Bill Setting'),
(44, 'ExpanseHeads', 'index', 'Expense Heads'),
(45, 'Vegetables', 'index', 'Vegetable master'),
(46, 'ItemLists', 'index', 'Daily Inventory Item Master'),
(47, 'Bills', 'edit', 'Bill Edit'),
(48, 'Bills', 'delete', 'Bill Delete'),
(49, 'Employees', 'EmployeesAttendance', 'Attendance-Report'),
(50, 'Bills', 'view2', 'Bill Re-print');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_vouchers`
--

CREATE TABLE `purchase_vouchers` (
  `id` int(11) NOT NULL,
  `voucher_no` int(255) NOT NULL,
  `transaction_date` date NOT NULL,
  `vendor_id` int(50) NOT NULL,
  `grand_total` decimal(15,0) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_vouchers`
--

INSERT INTO `purchase_vouchers` (`id`, `voucher_no`, `transaction_date`, `vendor_id`, `grand_total`, `invoice_no`, `comment`) VALUES
(1, 1, '2019-06-25', 1, '151', '12', ''),
(2, 2, '2019-07-01', 2, '579', 'dwdw', 'scdcdscsd');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_voucher_rows`
--

CREATE TABLE `purchase_voucher_rows` (
  `id` int(11) NOT NULL,
  `raw_material_id` int(50) NOT NULL,
  `quantity` decimal(8,2) DEFAULT NULL,
  `rate` decimal(15,3) DEFAULT NULL,
  `discount_per` decimal(8,2) DEFAULT NULL,
  `discount_amt` decimal(15,2) DEFAULT NULL,
  `tax_per` decimal(8,2) DEFAULT NULL,
  `tax_amt` decimal(15,2) DEFAULT NULL,
  `round_off` decimal(15,2) DEFAULT NULL,
  `net_amt_total` decimal(15,2) DEFAULT NULL,
  `purchase_voucher_id` int(50) NOT NULL,
  `taxable_value` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_voucher_rows`
--

INSERT INTO `purchase_voucher_rows` (`id`, `raw_material_id`, `quantity`, `rate`, `discount_per`, `discount_amt`, `tax_per`, `tax_amt`, `round_off`, `net_amt_total`, `purchase_voucher_id`, `taxable_value`) VALUES
(1, 1, '12.00', '12.000', NULL, NULL, '5.00', '7.20', NULL, '151.20', 1, '144.00'),
(4, 2, '12.00', '12.000', '12.00', '17.28', '0.00', '0.00', NULL, '126.72', 2, '126.72'),
(5, 1, '22.00', '22.000', '11.00', '53.24', '5.00', '21.54', NULL, '452.30', 2, '430.76');

-- --------------------------------------------------------

--
-- Table structure for table `raw_materials`
--

CREATE TABLE `raw_materials` (
  `id` int(10) NOT NULL,
  `raw_material_sub_category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tax_id` int(22) NOT NULL,
  `hsn_code` varchar(11) NOT NULL,
  `primary_unit_id` int(11) NOT NULL COMMENT 'Unit Conversion Id',
  `has_secondary_unit` tinyint(1) NOT NULL COMMENT '1 for yes, 0 for not',
  `secondary_unit_id` int(11) NOT NULL COMMENT 'Unit Conversion Id',
  `formula` decimal(10,2) NOT NULL,
  `purchase_voucher_unit_type` varchar(20) NOT NULL,
  `recipe_unit_type` varchar(20) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raw_materials`
--

INSERT INTO `raw_materials` (`id`, `raw_material_sub_category_id`, `name`, `tax_id`, `hsn_code`, `primary_unit_id`, `has_secondary_unit`, `secondary_unit_id`, `formula`, `purchase_voucher_unit_type`, `recipe_unit_type`, `is_deleted`) VALUES
(1, 1, 'Loki', 2, '12121', 1, 0, 0, '0.00', '', '', 0),
(2, 1, 'Patato', 1, '1212', 1, 0, 0, '0.00', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_categories`
--

CREATE TABLE `raw_material_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raw_material_categories`
--

INSERT INTO `raw_material_categories` (`id`, `name`, `is_deleted`) VALUES
(1, 'Mandi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_sub_categories`
--

CREATE TABLE `raw_material_sub_categories` (
  `id` int(11) NOT NULL,
  `raw_material_category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raw_material_sub_categories`
--

INSERT INTO `raw_material_sub_categories` (`id`, `raw_material_category_id`, `name`, `is_deleted`) VALUES
(1, 1, 'Vegitables', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ready_orders`
--

CREATE TABLE `ready_orders` (
  `id` int(10) NOT NULL,
  `table_no` int(10) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `data` blob NOT NULL,
  `expires` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `data`, `expires`) VALUES
('0v5mmt13s6751oovpkgo96uuv5', 0x436f6e6669677c613a313a7b733a343a2274696d65223b693a313536323035303934333b7d466c6173687c613a303a7b7d417574687c613a313a7b733a343a2255736572223b4f3a32313a224170705c4d6f64656c5c456e746974795c55736572223a31313a7b733a31343a22002a005f61636365737369626c65223b613a353a7b733a31313a22656d706c6f7965655f6964223b623a313b733a343a226e616d65223b623a313b733a383a22757365726e616d65223b623a313b733a383a2270617373776f7264223b623a313b733a343a22726f6c65223b623a313b7d733a31303a22002a005f68696464656e223b613a313a7b693a303b733a383a2270617373776f7264223b7d733a31343a22002a005f70726f70657274696573223b613a373a7b733a323a226964223b693a313b733a343a226e616d65223b733a353a22476f70616c223b733a383a22757365726e616d65223b733a353a22616e6b6974223b733a383a2270617373776f7264223b733a36303a22243279243130243373432f4c4f485565616341673565596550624c58654c4e784e32307950354a614e626677703148626130434844333076616b3369223b733a343a22726f6c65223b733a353a2261646d696e223b733a31313a22656d706c6f7965655f6964223b693a313b733a383a22656d706c6f796565223b4f3a32353a224170705c4d6f64656c5c456e746974795c456d706c6f796565223a31313a7b733a31343a22002a005f61636365737369626c65223b613a373a7b733a313a222a223b623a313b733a393a226d6f62696c655f6e6f223b623a313b733a353a22656d61696c223b623a313b733a373a2261646472657373223b623a313b733a31303a22637265617465645f6f6e223b623a313b733a31303a2269735f64656c65746564223b623a313b733a31313a22617474656e64616e636573223b623a313b7d733a31343a22002a005f70726f70657274696573223b613a31303a7b733a323a226964223b693a313b733a343a226e616d65223b733a353a22476f70616c223b733a393a226d6f62696c655f6e6f223b733a303a22223b733a353a22656d61696c223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a31303a22637265617465645f6f6e223b4f3a32303a2243616b655c4931386e5c46726f7a656e54696d65223a333a7b733a343a2264617465223b733a32363a22323031392d30362d31332031383a32363a31342e303030303030223b733a31333a2274696d657a6f6e655f74797065223b693a333b733a383a2274696d657a6f6e65223b733a31333a22417369612f43616c6375747461223b7d733a31303a2269735f64656c65746564223b623a303b733a31343a2264657369676e6174696f6e5f6964223b693a343b733a31323a2264656c6574655f6d6f6e7468223b4e3b733a31313a2264656c6574655f79656172223b4e3b7d733a31323a22002a005f6f726967696e616c223b613a303a7b7d733a31303a22002a005f68696464656e223b613a303a7b7d733a31313a22002a005f7669727475616c223b613a303a7b7d733a31333a22002a005f636c6173734e616d65223b4e3b733a393a22002a005f6469727479223b613a303a7b7d733a373a22002a005f6e6577223b623a303b733a31303a22002a005f6572726f7273223b613a303a7b7d733a31313a22002a005f696e76616c6964223b613a303a7b7d733a31373a22002a005f7265676973747279416c696173223b733a393a22456d706c6f79656573223b7d7d733a31323a22002a005f6f726967696e616c223b613a303a7b7d733a31313a22002a005f7669727475616c223b613a303a7b7d733a31333a22002a005f636c6173734e616d65223b4e3b733a393a22002a005f6469727479223b613a303a7b7d733a373a22002a005f6e6577223b623a303b733a31303a22002a005f6572726f7273223b613a303a7b7d733a31313a22002a005f696e76616c6964223b613a303a7b7d733a31373a22002a005f7265676973747279416c696173223b733a353a225573657273223b7d7d, 1562050943),
('53o79kvem2mb4gcfjphtrdbcc5', 0x436f6e6669677c613a313a7b733a343a2274696d65223b693a313536333032303339303b7d466c6173687c613a303a7b7d417574687c613a313a7b733a343a2255736572223b4f3a32313a224170705c4d6f64656c5c456e746974795c55736572223a31313a7b733a31343a22002a005f61636365737369626c65223b613a353a7b733a31313a22656d706c6f7965655f6964223b623a313b733a343a226e616d65223b623a313b733a383a22757365726e616d65223b623a313b733a383a2270617373776f7264223b623a313b733a343a22726f6c65223b623a313b7d733a31303a22002a005f68696464656e223b613a313a7b693a303b733a383a2270617373776f7264223b7d733a31343a22002a005f70726f70657274696573223b613a373a7b733a323a226964223b693a313b733a343a226e616d65223b733a353a22476f70616c223b733a383a22757365726e616d65223b733a353a22616e6b6974223b733a383a2270617373776f7264223b733a36303a22243279243130243373432f4c4f485565616341673565596550624c58654c4e784e32307950354a614e626677703148626130434844333076616b3369223b733a343a22726f6c65223b733a353a2261646d696e223b733a31313a22656d706c6f7965655f6964223b693a313b733a383a22656d706c6f796565223b4f3a32353a224170705c4d6f64656c5c456e746974795c456d706c6f796565223a31313a7b733a31343a22002a005f61636365737369626c65223b613a373a7b733a313a222a223b623a313b733a393a226d6f62696c655f6e6f223b623a313b733a353a22656d61696c223b623a313b733a373a2261646472657373223b623a313b733a31303a22637265617465645f6f6e223b623a313b733a31303a2269735f64656c65746564223b623a313b733a31313a22617474656e64616e636573223b623a313b7d733a31343a22002a005f70726f70657274696573223b613a31303a7b733a323a226964223b693a313b733a343a226e616d65223b733a353a22476f70616c223b733a393a226d6f62696c655f6e6f223b733a303a22223b733a353a22656d61696c223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a31303a22637265617465645f6f6e223b4f3a32303a2243616b655c4931386e5c46726f7a656e54696d65223a333a7b733a343a2264617465223b733a32363a22323031392d30362d31332031383a32363a31342e303030303030223b733a31333a2274696d657a6f6e655f74797065223b693a333b733a383a2274696d657a6f6e65223b733a31333a22417369612f43616c6375747461223b7d733a31303a2269735f64656c65746564223b623a303b733a31343a2264657369676e6174696f6e5f6964223b693a343b733a31323a2264656c6574655f6d6f6e7468223b4e3b733a31313a2264656c6574655f79656172223b4e3b7d733a31323a22002a005f6f726967696e616c223b613a303a7b7d733a31303a22002a005f68696464656e223b613a303a7b7d733a31313a22002a005f7669727475616c223b613a303a7b7d733a31333a22002a005f636c6173734e616d65223b4e3b733a393a22002a005f6469727479223b613a303a7b7d733a373a22002a005f6e6577223b623a303b733a31303a22002a005f6572726f7273223b613a303a7b7d733a31313a22002a005f696e76616c6964223b613a303a7b7d733a31373a22002a005f7265676973747279416c696173223b733a393a22456d706c6f79656573223b7d7d733a31323a22002a005f6f726967696e616c223b613a303a7b7d733a31313a22002a005f7669727475616c223b613a303a7b7d733a31333a22002a005f636c6173734e616d65223b4e3b733a393a22002a005f6469727479223b613a303a7b7d733a373a22002a005f6e6577223b623a303b733a31303a22002a005f6572726f7273223b613a303a7b7d733a31313a22002a005f696e76616c6964223b613a303a7b7d733a31373a22002a005f7265676973747279416c696173223b733a353a225573657273223b7d7d, 1563020391),
('cghd8l2ldn9v71djaa967i08s4', 0x436f6e6669677c613a313a7b733a343a2274696d65223b693a313536323637333437363b7d466c6173687c613a303a7b7d417574687c613a313a7b733a343a2255736572223b4f3a32313a224170705c4d6f64656c5c456e746974795c55736572223a31313a7b733a31343a22002a005f61636365737369626c65223b613a353a7b733a31313a22656d706c6f7965655f6964223b623a313b733a343a226e616d65223b623a313b733a383a22757365726e616d65223b623a313b733a383a2270617373776f7264223b623a313b733a343a22726f6c65223b623a313b7d733a31303a22002a005f68696464656e223b613a313a7b693a303b733a383a2270617373776f7264223b7d733a31343a22002a005f70726f70657274696573223b613a373a7b733a323a226964223b693a313b733a343a226e616d65223b733a353a22476f70616c223b733a383a22757365726e616d65223b733a353a22616e6b6974223b733a383a2270617373776f7264223b733a36303a22243279243130243373432f4c4f485565616341673565596550624c58654c4e784e32307950354a614e626677703148626130434844333076616b3369223b733a343a22726f6c65223b733a353a2261646d696e223b733a31313a22656d706c6f7965655f6964223b693a313b733a383a22656d706c6f796565223b4f3a32353a224170705c4d6f64656c5c456e746974795c456d706c6f796565223a31313a7b733a31343a22002a005f61636365737369626c65223b613a373a7b733a313a222a223b623a313b733a393a226d6f62696c655f6e6f223b623a313b733a353a22656d61696c223b623a313b733a373a2261646472657373223b623a313b733a31303a22637265617465645f6f6e223b623a313b733a31303a2269735f64656c65746564223b623a313b733a31313a22617474656e64616e636573223b623a313b7d733a31343a22002a005f70726f70657274696573223b613a31303a7b733a323a226964223b693a313b733a343a226e616d65223b733a353a22476f70616c223b733a393a226d6f62696c655f6e6f223b733a303a22223b733a353a22656d61696c223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a31303a22637265617465645f6f6e223b4f3a32303a2243616b655c4931386e5c46726f7a656e54696d65223a333a7b733a343a2264617465223b733a32363a22323031392d30362d31332031383a32363a31342e303030303030223b733a31333a2274696d657a6f6e655f74797065223b693a333b733a383a2274696d657a6f6e65223b733a31333a22417369612f43616c6375747461223b7d733a31303a2269735f64656c65746564223b623a303b733a31343a2264657369676e6174696f6e5f6964223b693a343b733a31323a2264656c6574655f6d6f6e7468223b4e3b733a31313a2264656c6574655f79656172223b4e3b7d733a31323a22002a005f6f726967696e616c223b613a303a7b7d733a31303a22002a005f68696464656e223b613a303a7b7d733a31313a22002a005f7669727475616c223b613a303a7b7d733a31333a22002a005f636c6173734e616d65223b4e3b733a393a22002a005f6469727479223b613a303a7b7d733a373a22002a005f6e6577223b623a303b733a31303a22002a005f6572726f7273223b613a303a7b7d733a31313a22002a005f696e76616c6964223b613a303a7b7d733a31373a22002a005f7265676973747279416c696173223b733a393a22456d706c6f79656573223b7d7d733a31323a22002a005f6f726967696e616c223b613a303a7b7d733a31313a22002a005f7669727475616c223b613a303a7b7d733a31333a22002a005f636c6173734e616d65223b4e3b733a393a22002a005f6469727479223b613a303a7b7d733a373a22002a005f6e6577223b623a303b733a31303a22002a005f6572726f7273223b613a303a7b7d733a31313a22002a005f696e76616c6964223b613a303a7b7d733a31373a22002a005f7265676973747279416c696173223b733a353a225573657273223b7d7d, 1562673476);

-- --------------------------------------------------------

--
-- Table structure for table `stock_ledgers`
--

CREATE TABLE `stock_ledgers` (
  `id` int(10) NOT NULL,
  `transaction_date` date NOT NULL,
  `raw_material_id` int(50) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `effected_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `voucher_name` varchar(50) NOT NULL,
  `is_wastage` tinyint(1) NOT NULL DEFAULT '0',
  `adjustment_commant` varchar(50) NOT NULL,
  `wastage_commant` varchar(50) NOT NULL,
  `purchase_voucher_row_id` int(10) NOT NULL,
  `purchase_voucher_id` int(10) NOT NULL,
  `bill_id` int(10) NOT NULL,
  `bill_row_id` int(10) NOT NULL,
  `daily_usage_id` int(11) NOT NULL,
  `daily_usage_row_id` int(11) NOT NULL,
  `user_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_ledgers`
--

INSERT INTO `stock_ledgers` (`id`, `transaction_date`, `raw_material_id`, `quantity`, `rate`, `status`, `effected_on`, `voucher_name`, `is_wastage`, `adjustment_commant`, `wastage_commant`, `purchase_voucher_row_id`, `purchase_voucher_id`, `bill_id`, `bill_row_id`, `daily_usage_id`, `daily_usage_row_id`, `user_id`) VALUES
(1, '2019-06-25', 1, '12.00', '12.00', 'in', '2019-06-25 04:58:26', 'Purchase Voucher', 0, '', '', 1, 1, 0, 0, 0, 0, NULL),
(6, '2019-07-01', 2, '12.00', '10.56', 'in', '2019-07-01 09:43:51', 'Purchase Voucher', 0, '', '', 4, 2, 0, 0, 0, 0, NULL),
(7, '2019-07-01', 1, '22.00', '19.58', 'in', '2019-07-01 09:43:51', 'Purchase Voucher', 0, '', '', 5, 2, 0, 0, 0, 0, NULL),
(17, '2019-07-01', 1, '4.00', '0.00', 'out', '2019-07-02 06:56:34', 'Daily Usage', 0, '', '', 0, 0, 0, 0, 1, 1, NULL),
(18, '2019-07-01', 2, '3.00', '0.00', 'out', '2019-07-02 06:56:34', 'Daily Usage', 0, '', '', 0, 0, 0, 0, 1, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(10) NOT NULL,
  `name` int(10) NOT NULL,
  `floor_no_id` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `c_name` varchar(255) DEFAULT NULL,
  `c_mobile` varchar(10) DEFAULT NULL,
  `no_of_pax` int(10) DEFAULT NULL,
  `occupied_time` timestamp NULL DEFAULT NULL,
  `dob` date NOT NULL,
  `doa` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `c_address` text NOT NULL,
  `employee_id` int(10) NOT NULL,
  `payment_status` varchar(10) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `customer_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `name`, `floor_no_id`, `capacity`, `status`, `c_name`, `c_mobile`, `no_of_pax`, `occupied_time`, `dob`, `doa`, `email`, `c_address`, `employee_id`, `payment_status`, `bill_id`, `customer_id`) VALUES
(1, 1, 1, 5, 'occupied', '', '', 1, '2019-07-13 11:53:19', '0000-00-00', '0000-00-00', '', '', 0, '', 0, NULL),
(2, 2, 1, 6, '', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', '', '', 0, '', 0, NULL),
(3, 3, 1, 4, '', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', '', '', 0, '', 0, NULL),
(4, 1, 2, 8, '', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', '', '', 0, '', 0, NULL),
(5, 2, 2, 0, '', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', '', '', 0, '', 0, NULL),
(6, 3, 2, 6, '', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', '', '', 0, '', 0, NULL),
(7, 4, 1, 2, '', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', '', '', 0, '', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `tax_per` decimal(5,2) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `name`, `tax_per`, `status`) VALUES
(1, '0%', '0.00', ''),
(2, '5%', '5.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `is_deleted`) VALUES
(1, 'Kg', 0),
(2, 'Gm', 0),
(3, 'Pcs', 0),
(4, 'Sheet', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL,
  `employee_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `employee_id`) VALUES
(1, 'Gopal', 'ankit', '$2y$10$3sC/LOHUeacAg5eYePbLXeLNxN20yP5JaNbfwp1Hba0CHD30vak3i', 'admin', 1),
(4, 'Ramsingh', 'ramsingh', '$2y$10$g52BLbduX53VIehBc31Zye9v3nQB8oPmBj7ZRgUQf1xd63FMK3NlG', 'counter', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_rights`
--

CREATE TABLE `user_rights` (
  `id` int(11) NOT NULL,
  `user_id` int(12) NOT NULL,
  `page_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_rights`
--

INSERT INTO `user_rights` (`id`, `user_id`, `page_id`) VALUES
(207, 4, 1),
(208, 4, 5),
(210, 4, 26),
(213, 4, 34),
(214, 4, 35),
(216, 4, 38),
(218, 4, 40),
(316, 1, 1),
(317, 1, 2),
(318, 1, 3),
(319, 1, 4),
(320, 1, 5),
(321, 1, 6),
(322, 1, 7),
(323, 1, 8),
(324, 1, 9),
(325, 1, 10),
(326, 1, 11),
(327, 1, 12),
(328, 1, 13),
(329, 1, 14),
(330, 1, 15),
(331, 1, 16),
(332, 1, 17),
(333, 1, 18),
(334, 1, 19),
(335, 1, 20),
(336, 1, 21),
(337, 1, 22),
(338, 1, 23),
(339, 1, 24),
(340, 1, 25),
(341, 1, 26),
(342, 1, 27),
(343, 1, 28),
(344, 1, 29),
(345, 1, 30),
(346, 1, 31),
(347, 1, 32),
(348, 1, 33),
(349, 1, 34),
(350, 1, 35),
(351, 1, 36),
(352, 1, 37),
(353, 1, 38),
(354, 1, 39),
(355, 1, 40),
(356, 1, 41),
(357, 1, 42),
(358, 1, 43),
(359, 1, 44),
(360, 1, 45),
(361, 1, 46),
(362, 1, 47),
(363, 1, 48),
(364, 1, 49),
(365, 1, 50),
(366, 5, 1),
(367, 6, 1),
(368, 7, 1),
(369, 8, 1),
(370, 9, 1),
(371, 5, 19),
(373, 6, 20),
(374, 7, 20),
(375, 8, 20),
(376, 9, 20),
(377, 5, 26),
(378, 6, 26),
(379, 7, 26),
(380, 8, 26),
(381, 9, 26),
(382, 9, 30),
(383, 9, 31),
(384, 5, 30),
(385, 5, 31),
(386, 4, 30),
(387, 4, 31),
(390, 9, 34),
(391, 9, 35),
(393, 4, 41),
(394, 5, 41),
(395, 6, 41),
(396, 7, 41),
(397, 8, 41),
(398, 9, 41),
(399, 4, 42),
(400, 5, 42),
(401, 6, 42),
(402, 7, 42),
(403, 8, 42),
(404, 9, 42),
(405, 5, 34),
(406, 5, 35),
(407, 9, 36),
(408, 9, 37),
(409, 4, 36),
(410, 4, 37),
(411, 5, 39),
(412, 9, 39),
(413, 4, 39),
(415, 6, 40),
(416, 7, 40),
(417, 8, 40),
(418, 9, 40),
(420, 5, 38),
(421, 6, 38),
(422, 7, 38),
(423, 8, 38),
(424, 9, 38),
(426, 4, 19),
(427, 9, 19),
(428, 7, 19),
(429, 7, 30),
(430, 7, 31),
(431, 4, 32),
(432, 5, 32),
(433, 7, 32),
(434, 9, 32),
(435, 7, 34),
(436, 7, 35),
(437, 7, 39),
(439, 5, 20),
(440, 5, 40),
(441, 4, 20),
(443, 4, 27),
(451, 7, 27),
(452, 5, 27),
(453, 6, 27),
(454, 7, 27),
(455, 8, 27),
(456, 9, 27),
(457, 5, 5),
(458, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `vegetables`
--

CREATE TABLE `vegetables` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `rate` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vegetable_rates`
--

CREATE TABLE `vegetable_rates` (
  `id` int(10) NOT NULL,
  `vegetable_id` int(10) NOT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `month` int(10) NOT NULL,
  `year` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vegetable_records`
--

CREATE TABLE `vegetable_records` (
  `id` int(10) NOT NULL,
  `vegetable_id` int(10) NOT NULL,
  `transaction_date` date NOT NULL,
  `quantity` decimal(10,2) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `gst_no` varchar(30) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL COMMENT '0 = active, 1 = deleted',
  `files_upload` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `contact_person`, `contact_number`, `address`, `gst_no`, `email`, `is_deleted`, `files_upload`) VALUES
(1, 'Gopal Patel', 'Gopal Patel', '9001855886', 'aajad vihar.opposite umaid villa hotel.\r\naajad vihar', 'ewqqwe3qw3232322', 'Gopal@mail.com', 0, ''),
(2, 'gops', 'Gopal Patel', '9001855886', 'aajad vihar.opposite umaid villa hotel.\r\naajad vihar', '12112', 'gg@fff.com', 0, ''),
(3, 'Gopal Patel', 'Gopal Patel', '9001855886', 'aajad vihar.opposite umaid villa hotel.\r\naajad vihar', '1111', '1111', 0, '5d19dc57ca878.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_amounts`
--

CREATE TABLE `vendor_amounts` (
  `id` int(10) NOT NULL,
  `transaction_date` date NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_items`
--

CREATE TABLE `vendor_items` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `raw_material_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_items`
--

INSERT INTO `vendor_items` (`id`, `vendor_id`, `raw_material_id`) VALUES
(3, 2, 1),
(4, 2, 2),
(5, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_rows`
--
ALTER TABLE `bill_rows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_settings`
--
ALTER TABLE `bill_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `copy_bills`
--
ALTER TABLE `copy_bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `copy_bill_rows`
--
ALTER TABLE `copy_bill_rows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_code` (`customer_code`);

--
-- Indexes for table `daily_usages`
--
ALTER TABLE `daily_usages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_usage_rows`
--
ALTER TABLE `daily_usage_rows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salaries`
--
ALTER TABLE `employee_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expanse_heads`
--
ALTER TABLE `expanse_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expanse_vouchers`
--
ALTER TABLE `expanse_vouchers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expanse_voucher_rows`
--
ALTER TABLE `expanse_voucher_rows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floor_nos`
--
ALTER TABLE `floor_nos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_records`
--
ALTER TABLE `inventory_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_lists`
--
ALTER TABLE `item_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_rows`
--
ALTER TABLE `item_rows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_sub_categories`
--
ALTER TABLE `item_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kots`
--
ALTER TABLE `kots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kot_rows`
--
ALTER TABLE `kot_rows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manual_stocks`
--
ALTER TABLE `manual_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_codes`
--
ALTER TABLE `offer_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_vouchers`
--
ALTER TABLE `purchase_vouchers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_voucher_rows`
--
ALTER TABLE `purchase_voucher_rows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raw_materials`
--
ALTER TABLE `raw_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raw_material_categories`
--
ALTER TABLE `raw_material_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raw_material_sub_categories`
--
ALTER TABLE `raw_material_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ready_orders`
--
ALTER TABLE `ready_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_ledgers`
--
ALTER TABLE `stock_ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_rights`
--
ALTER TABLE `user_rights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vegetables`
--
ALTER TABLE `vegetables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vegetable_rates`
--
ALTER TABLE `vegetable_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vegetable_records`
--
ALTER TABLE `vegetable_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_amounts`
--
ALTER TABLE `vendor_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_items`
--
ALTER TABLE `vendor_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bill_rows`
--
ALTER TABLE `bill_rows`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bill_settings`
--
ALTER TABLE `bill_settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `copy_bills`
--
ALTER TABLE `copy_bills`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `copy_bill_rows`
--
ALTER TABLE `copy_bill_rows`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `daily_usages`
--
ALTER TABLE `daily_usages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `daily_usage_rows`
--
ALTER TABLE `daily_usage_rows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee_salaries`
--
ALTER TABLE `employee_salaries`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expanse_heads`
--
ALTER TABLE `expanse_heads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `expanse_vouchers`
--
ALTER TABLE `expanse_vouchers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expanse_voucher_rows`
--
ALTER TABLE `expanse_voucher_rows`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `floor_nos`
--
ALTER TABLE `floor_nos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `inventory_records`
--
ALTER TABLE `inventory_records`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `item_lists`
--
ALTER TABLE `item_lists`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_rows`
--
ALTER TABLE `item_rows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_sub_categories`
--
ALTER TABLE `item_sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kots`
--
ALTER TABLE `kots`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kot_rows`
--
ALTER TABLE `kot_rows`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `manual_stocks`
--
ALTER TABLE `manual_stocks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `offer_codes`
--
ALTER TABLE `offer_codes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `purchase_vouchers`
--
ALTER TABLE `purchase_vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `purchase_voucher_rows`
--
ALTER TABLE `purchase_voucher_rows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `raw_materials`
--
ALTER TABLE `raw_materials`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `raw_material_categories`
--
ALTER TABLE `raw_material_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `raw_material_sub_categories`
--
ALTER TABLE `raw_material_sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ready_orders`
--
ALTER TABLE `ready_orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock_ledgers`
--
ALTER TABLE `stock_ledgers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_rights`
--
ALTER TABLE `user_rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=459;
--
-- AUTO_INCREMENT for table `vegetables`
--
ALTER TABLE `vegetables`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vegetable_rates`
--
ALTER TABLE `vegetable_rates`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vegetable_records`
--
ALTER TABLE `vegetable_records`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vendor_amounts`
--
ALTER TABLE `vendor_amounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vendor_items`
--
ALTER TABLE `vendor_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

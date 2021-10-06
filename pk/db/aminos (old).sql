-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2020 at 04:07 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aminos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(20) NOT NULL,
  `ad_contact` bigint(20) NOT NULL,
  `ad_email` varchar(30) NOT NULL,
  `ad_address` varchar(30) NOT NULL,
  `ad_username` varchar(20) NOT NULL,
  `ad_password` varchar(300) NOT NULL,
  `ad_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_name`, `ad_contact`, `ad_email`, `ad_address`, `ad_username`, `ad_password`, `ad_date`) VALUES
(2, 'dylan', 8660557946, 'praveen@gmail.com', 'hubli', 'dylan24', 'RHlsYW4yNA==', '2020-03-03'),
(4, 'abc', 0, 'abc', '              dsfgdg   ', 'abc', 'YWJj', '2020-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `b_id` int(20) NOT NULL,
  `b_name` varchar(30) NOT NULL,
  `b_location` varchar(30) NOT NULL,
  `b_address` varchar(50) NOT NULL,
  `b_contact` bigint(20) NOT NULL,
  `b_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`b_id`, `b_name`, `b_location`, `b_address`, `b_contact`, `b_date`) VALUES
(1, 'amino\'s - Dharwad', 'dwd', 'PB Rd., Opp. Modern Hall, Dharwad', 9876543210, '29-03-2020'),
(2, 'amino\'s - Hubli', 'hubli', 'Marvel Artiza Mall, PB Rd., Hubli, Karnataka', 8765432109, '29-03-2020'),
(4, 'Mysore', 'Mysore', 'Mysore', 8989767678, '27-03-2020');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(30) NOT NULL,
  `cus_fname` varchar(20) NOT NULL,
  `cus_lname` varchar(20) NOT NULL,
  `cus_name` varchar(30) NOT NULL,
  `cus_contact` bigint(20) NOT NULL,
  `cus_email` varchar(200) NOT NULL,
  `cus_address` varchar(50) NOT NULL,
  `cus_username` varchar(50) NOT NULL,
  `cus_password` varchar(300) NOT NULL,
  `cus_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_fname`, `cus_lname`, `cus_name`, `cus_contact`, `cus_email`, `cus_address`, `cus_username`, `cus_password`, `cus_date`) VALUES
(1, '', '', 'Pooja', 9019837348, 'pooja@gmail.com', 'DWDD ', 'Pooja', 'UG9vamExMjM0', '27-03-2020'),
(5, '', '', 'MALAN', 8147081846, 'malanabiharavi1998@', 'hanagal', 'malan', 'bWFsYW4xMjM0', '26-03-2020'),
(6, '', '', 'anu', 7406251264, 'anitaasundi@gmail.com', 'dharwad', 'anu', 'YW51MTIzNDU2', '2019-03-25'),
(7, '', '', 'asma', 9876543210, 'asma@gmail.com', 'dwd', 'asma1', 'YXNtYTEyMzQ=', '2019-03-25'),
(8, '', '', 'apoorva', 9036617368, 'appu123@gmail.com', 'dharwad', 'azaa', 'QVNBUzEyMzEyMw==', '2019-03-25'),
(9, '', '', 'anu', 9481419629, 'anuasundi@gmail.com', 'hubli', 'asasAS123', 'YXNhc0FTMTIz', '2019-03-26'),
(10, '', '', 'Asma', 8050857848, 'Asma@gmail.com', 'gandhinagar', 'Asma.Nargund', 'QXNtYTEyMzQ=', '2019-03-30'),
(11, '', '', '', 0, '', '', '', '', '2019-03-27'),
(12, '', '', 'asma', 9008643114, 'anu@gmail.com', 'hubli', 'anuu', 'MTIxMg==', '2019-03-29'),
(13, '', '', 'imtiyaz', 9164302251, 'anitaasundi123@gmail.com', 'hangal', 'imti', 'MTIxMg==', '2019-03-29'),
(14, '', '', 'yaseen', 9164302037, 'yaseenh@gmail.com', 'sirasi', 'yaseen', 'MTIzNA==', '2019-03-29'),
(15, '', '', 'yaseen', 7406251265, 'anitaasund1i@gmail.com', 'hubli', 'aaa', 'YXNhczEyMzEyMw==', '2019-03-29'),
(16, '', '', 'yaseen', 7406251266, 'anitaasund11i@gmail.com', 'hubli', 'aaaa', 'YXNhczEyMzEyMw==', '2019-03-29'),
(17, '', '', 'ani', 9449190276, 'anu123@gmail.com', 'dharwad', 'ash', 'YXNhczEyMzEyMw==', '2019-03-29'),
(18, '', '', 'dev', 9986960718, 'anu1234@gmail.com', 'dharwad', 'dev', 'YXNhc2FzMTI=', '2019-03-29'),
(19, '', '', 'Malanabi', 7026932069, 'shanumonusmile@gmail.com', 'hangal', 'shanumonu', 'c2hhbnVtb251MTQz', '2019-03-30'),
(20, '', '', 'dylan', 9741804715, 'dylan@gmail.com', 'hubli', '24', 'UHJhdmVlbjEyMw==', '2020-03-12'),
(21, '', '', 'dylan', 9741804719, 'dylan5@gmail.com', 'vages', 'Praveen24', 'UHJhdmVlbjI0', '2020-03-18'),
(22, '', '', 'retghb', 999999999, '                hjhgjyhjkhkj', 'ytjukiuyk', 'yuytjuy', 'dXlqeXV0anl1', '21-03-2020'),
(23, '', '', 'klaus', 8660557946, 'dhaewad                ', 'klaus12@gmail.com', 'klaus12', 'S2xhdXMxMg==', '21-03-2020'),
(24, '', '', '', 8660257946, 'uydgchqsujaiok', 'qwerty', 'klaus13', 'cXdlcnR5', '22-03-2020'),
(25, '', '', 'abc', 9876098709, 'qwertyuiiiiiop                ', 'qaz', 'abc', 'MTIzNDU2', '22-03-2020'),
(26, '', '', 'abc', 7654, 'abc', 'abc', 'qwer', 'YWJj', '26-03-2020'),
(27, '', '', 'S K Daruwala', 8660825024, 'sk@email.com', 'dwd', 'skd866', 'MTIzNDU2', '27-05-2020'),
(28, 's', 'k', 's k', 8660825023, 'skd@email.com', 'dwd', 'skd', 'MTIzNA==', '05-06-2020'),
(29, 'praveen', 'k', 'praveen k', 9844230725, 'praveenk@gmail.com', 'hubli', 'pk@124', 'cGtAMTI0', '28-08-2020'),
(30, 'Balu', 'D', 'Balu D', 8660557945, 'k@gmail.com', 'hubli', 'balu12', 'YmFsdTEy', '31-08-2020'),
(31, 'Puneeth', 'k', 'Puneeth k', 8618725016, 'puneeth@gmail.com', 'dharwad', 'Puneeth24', 'UHVuZWV0aDI0', '31-08-2020'),
(32, 'Puneeth', 'k', 'Puneeth k', 8618725017, 'puneethk12@gmail.com', 'dharwad', 'Puneeth45', 'UHVuZWV0aDI0', '31-08-2020'),
(33, '', '', 'klaus', 9876098705, 'pavitrakalamanavar@gmail.com', 'L-I-G 18 KHB COLONY LAKKAMANAHALLI OPPOSITE KMF', 'klaus56', 'S2xhdXMxMjM0', '2020-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `customer_invoice`
--

CREATE TABLE `customer_invoice` (
  `ci_id` int(11) NOT NULL,
  `ci_invoice_no` int(9) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `b_name` varchar(50) NOT NULL,
  `ci_order_no` varchar(50) NOT NULL,
  `ci_shipping_address` text NOT NULL,
  `ci_landmark` varchar(100) NOT NULL,
  `ci_city` varchar(50) NOT NULL,
  `ci_pin` int(6) NOT NULL,
  `ci_state` varchar(50) NOT NULL,
  `ci_country` varchar(50) NOT NULL,
  `ci_delivery_charges` int(11) NOT NULL,
  `ci_contact_no` bigint(15) NOT NULL,
  `ci_date` date NOT NULL,
  `ci_payment_mode` varchar(20) NOT NULL,
  `ci_transaction_no` varchar(50) NOT NULL,
  `ci_subtotal` float NOT NULL,
  `ci_tax` float NOT NULL,
  `ci_total_discount` float NOT NULL,
  `ci_grand_total` float NOT NULL,
  `ci_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_invoice`
--

INSERT INTO `customer_invoice` (`ci_id`, `ci_invoice_no`, `cus_id`, `b_name`, `ci_order_no`, `ci_shipping_address`, `ci_landmark`, `ci_city`, `ci_pin`, `ci_state`, `ci_country`, `ci_delivery_charges`, `ci_contact_no`, `ci_date`, `ci_payment_mode`, `ci_transaction_no`, `ci_subtotal`, `ci_tax`, `ci_total_discount`, `ci_grand_total`, `ci_status`) VALUES
(10, 0, 19, '0', '988997', 'near bcm hostel', 'hangal', '', 0, '', '', 0, 7026932069, '2019-03-30', 'COD', '0', 0, 0, 0, 0, 'ORDER DELIVERED');

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE `dealers` (
  `dea_id` int(11) NOT NULL,
  `dea_name` varchar(30) NOT NULL,
  `dea_contact` bigint(20) NOT NULL,
  `dea_email` varchar(50) NOT NULL,
  `dea_address` varchar(50) NOT NULL,
  `dea_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealers`
--

INSERT INTO `dealers` (`dea_id`, `dea_name`, `dea_contact`, `dea_email`, `dea_address`, `dea_date`) VALUES
(2, 'shahajaan', 9008650114, 'shahajaan5@gmail.com', 'shiggon', '1988-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_id` int(20) NOT NULL,
  `b_id` int(30) NOT NULL,
  `e_name` varchar(30) NOT NULL,
  `e_contact` bigint(20) NOT NULL,
  `e_address` varchar(50) NOT NULL,
  `e_email` varchar(50) NOT NULL,
  `e_username` varchar(30) NOT NULL,
  `e_password` varchar(30) NOT NULL,
  `e_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`, `b_id`, `e_name`, `e_contact`, `e_address`, `e_email`, `e_username`, `e_password`, `e_date`) VALUES
(5, 1, 'niklaus', 9741804715, '                hubli', 'pk@gmail.com', 'Niklaus24', 'TmlrbGF1czI0', '30-08-2020');

-- --------------------------------------------------------

--
-- Table structure for table `extra_charges`
--

CREATE TABLE `extra_charges` (
  `ec_id` int(11) NOT NULL,
  `cgst` int(11) NOT NULL,
  `sgst` int(11) NOT NULL,
  `minimum_amount` int(11) NOT NULL,
  `delivery_charges` int(11) NOT NULL,
  `min_stock_qty` int(11) NOT NULL,
  `max_stock_qty` int(11) NOT NULL,
  `ec_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra_charges`
--

INSERT INTO `extra_charges` (`ec_id`, `cgst`, `sgst`, `minimum_amount`, `delivery_charges`, `min_stock_qty`, `max_stock_qty`, `ec_date`) VALUES
(1, 10, 10, 500, 100, 50, 50, '2019-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `ho_id` int(20) NOT NULL,
  `ho_name` varchar(30) NOT NULL,
  `ho_contact` bigint(20) NOT NULL,
  `ho_address` varchar(30) NOT NULL,
  `ho_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`ho_id`, `ho_name`, `ho_contact`, `ho_address`, `ho_date`) VALUES
(5, 'hoysala', 8618989769, 'dharwad', '2019-03-25'),
(7, 'Hans', 8147081846, 'Hubli', '2019-03-27'),
(8, 'President', 9008650114, 'Hubli', '2019-03-27'),
(9, 'The Gate', 8618989769, 'Hubli', '2019-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_daily_payment`
--

CREATE TABLE `hotel_daily_payment` (
  `hdp_id` int(11) NOT NULL,
  `ho_id` int(11) NOT NULL,
  `daily_amount` int(11) NOT NULL,
  `hdp_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_daily_payment`
--

INSERT INTO `hotel_daily_payment` (`hdp_id`, `ho_id`, `daily_amount`, `hdp_date`) VALUES
(2, 0, 0, ''),
(3, 1, 2222, '2019-03-04'),
(4, 2, 150, '2019-03-07'),
(5, 4042, 500, '2019-03-07'),
(10, 3, 500, '2019-03-25'),
(11, 5, 0, '2019-03-27'),
(12, 7, 1000, '2019-03-27'),
(13, 8, 200, '2019-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_purchase_invoice`
--

CREATE TABLE `hotel_purchase_invoice` (
  `hpi_id` int(11) NOT NULL,
  `ho_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `total` float NOT NULL,
  `cgst_percent` float NOT NULL,
  `cgst` float NOT NULL,
  `sgst_percent` float NOT NULL,
  `sgst` float NOT NULL,
  `total_amount` float NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_purchase_invoice`
--

INSERT INTO `hotel_purchase_invoice` (`hpi_id`, `ho_id`, `pd_id`, `unit_price`, `qty`, `total`, `cgst_percent`, `cgst`, `sgst_percent`, `sgst`, `total_amount`, `date`) VALUES
(1, 3, 9, 12, 120, 1440, 0, 0, 0, 0, 0, '2019-03-22'),
(2, 3, 9, 12, 1200, 14400, 10, 1440, 10, 1440, 17280, '2019-03-22'),
(3, 3, 9, 12, 100, 1200, 10, 120, 10, 120, 1440, '2019-03-22'),
(4, 3, 9, 12, 100, 1200, 10, 120, 10, 120, 1440, '2019-03-22'),
(5, 3, 10, 12, 100, 1200, 10, 120, 10, 120, 1440, '2019-03-22'),
(6, 3, 9, 12, 1200, 14400, 10, 1440, 10, 1440, 17280, '2019-03-22'),
(7, 3, 10, 12, 100, 1200, 10, 120, 10, 120, 1440, '2019-03-22'),
(8, 3, 10, 10, 120, 1200, 10, 120, 10, 120, 1440, '2019-03-25'),
(9, 5, 24, 10, 120, 1200, 10, 120, 10, 120, 1440, '2019-03-25'),
(10, 5, 24, 10, 120, 1200, 10, 120, 10, 120, 1440, '2019-03-25'),
(11, 5, 24, 10, 120, 1200, 10, 120, 10, 120, 1440, '2019-03-25'),
(12, 5, 24, 10, 120, 1200, 10, 120, 10, 120, 1440, '2019-03-25'),
(13, 5, 24, 10, 120, 1200, 10, 120, 10, 120, 1440, '2019-03-25'),
(14, 6, 18, 4, 120, 480, 10, 48, 10, 48, 576, '2019-03-27'),
(15, 7, 21, 3, 90, 270, 10, 27, 10, 27, 324, '2019-03-27'),
(16, 7, 21, 3, 90, 270, 10, 27, 10, 27, 324, '2019-03-27'),
(17, 8, 12, 200, 2, 400, 10, 40, 10, 40, 480, '2019-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_total_payment`
--

CREATE TABLE `hotel_total_payment` (
  `htp_id` int(11) NOT NULL,
  `ho_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `paid` float NOT NULL,
  `balance` float NOT NULL,
  `htp_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_total_payment`
--

INSERT INTO `hotel_total_payment` (`htp_id`, `ho_id`, `amount`, `paid`, `balance`, `htp_date`) VALUES
(1, 3, 20160, 1000, 19160, '2019-03-25'),
(2, 5, 1440, 500, 940, '2019-03-25'),
(3, 6, 576, 0, 576, '2019-03-27'),
(4, 7, 648, 500, 148, '2019-03-27'),
(5, 8, 480, 100, 380, '2019-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `product_cart_details`
--

CREATE TABLE `product_cart_details` (
  `pcd_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `pcd_name` varchar(20) NOT NULL,
  `pcd_qty` int(10) NOT NULL,
  `pcd_price` float NOT NULL,
  `pcd_total_amount` float NOT NULL,
  `pcd_order_no` int(30) NOT NULL,
  `pcd_status` varchar(20) NOT NULL,
  `pcd_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_cart_details`
--

INSERT INTO `product_cart_details` (`pcd_id`, `pd_id`, `cus_id`, `pcd_name`, `pcd_qty`, `pcd_price`, `pcd_total_amount`, `pcd_order_no`, `pcd_status`, `pcd_date`) VALUES
(1, 29, 1, 'Special Dust Tea', 1, 103, 103, 75339, 'ORDER DELIVERED', '2019-03-22'),
(3, 20, 1, 'Blueberry Matcha', 1, 60, 60, 75339, 'ORDER DELIVERED', '2019-03-22'),
(4, 19, 1, 'Bamboo Leaf', 1, 55, 55, 75339, 'ORDER DELIVERED', '2019-03-22'),
(5, 29, 1, 'Special Dust Tea', 6, 103, 618, 93924, 'ORDER CONFIRMED', '2019-03-22'),
(6, 29, 1, 'Special Dust Tea', 5, 103, 515, 0, 'CART', '2019-03-22'),
(7, 11, 5, 'Flush tgfop', 5, 100, 450, 65915, 'ORDER CONFIRMED', '2019-03-25'),
(8, 10, 5, 'Flush Sftgfop', 5, 100, 400, 65915, 'ORDER CONFIRMED', '2019-03-25'),
(9, 16, 5, 'Fu Cha Brick', 10, 100, 900, 0, 'CART', '2019-03-25'),
(10, 9, 10, 'Queen Shola', 5, 50, 200, 639643, 'ORDER DELIVERED', '2019-03-27'),
(11, 18, 10, 'Kulasi', 5, 45, 225, 639643, 'ORDER DELIVERED', '2019-03-27'),
(13, 29, 10, 'Chingmar', 5, 103, 515, 65748, 'ORDER DELIVERED', '2019-03-27'),
(14, 10, 10, 'Tiger Hill', 6, 100, 600, 581058, 'ORDER DELIVERED', '2019-03-28'),
(15, 12, 10, 'Batali', 5, 150, 750, 581058, 'ORDER DELIVERED', '2019-03-28'),
(16, 28, 10, 'Jamini', 5, 160, 800, 722143, 'ORDER CONFIRMED', '2019-03-28'),
(18, 31, 18, 'Royal', 5, 150, 750, 976417, 'ORDER CONFIRMED', '2019-03-29'),
(19, 13, 10, 'High field', 5, 70, 350, 666677, 'ORDER DELIVERED', '2019-03-30'),
(20, 19, 10, 'Bamboo Leaf', 5, 55, 275, 666677, 'ORDER DELIVERED', '2019-03-30'),
(23, 32, 19, 'Beli hu', 5, 275, 1375, 988997, 'ORDER DELIVERED', '2019-03-30'),
(24, 11, 10, 'Laxmi bari', 5, 100, 500, 0, 'CART', '2019-04-01'),
(25, 0, 6, '<br />\r\n<b>Notice</b', 5, 0, 0, 0, 'CART', '0000-00-00'),
(26, 0, 6, '<br />\r\n<b>Notice</b', 5, 0, 0, 0, 'CART', '0000-00-00'),
(27, 0, 6, '<br />\r\n<b>Notice</b', 5, 0, 0, 0, 'CART', '0000-00-00'),
(28, 0, 6, '<br />\r\n<b>Notice</b', 5, 0, 0, 0, 'CART', '0000-00-00'),
(61, 8, 21, 'paneer salad', 1, 112.5, 112.5, 8745765, 'CART', '0000-00-00'),
(64, 9, 21, 'egg salad', 1, 140, 140, 8745765, 'CART', '0000-00-00'),
(65, 10, 21, 'chicken salad', 1, 107.2, 107.2, 8745765, 'CART', '0000-00-00'),
(66, 7, 28, 'classic salad', 1, 91, 91, 8745765, 'CART', '0000-00-00'),
(81, 8, 30, 'BBQ Paneer Salad', 0, 112.5, 0, 8745765, 'CART', '0000-00-00'),
(83, 8, 32, 'BBQ Paneer Salad', 0, 112.5, 0, 8745765, 'CART', '0000-00-00'),
(84, 7, 32, 'Classic Caeser Salad', 0, 91, 0, 8745765, 'CART', '0000-00-00'),
(87, 8, 29, 'BBQ Paneer Salad', 1, 112.5, 112.5, 8745765, 'CART', '0000-00-00'),
(88, 7, 29, 'Classic Caeser Salad', 1, 91, 91, 8745765, 'CART', '0000-00-00'),
(89, 9, 29, 'Classic Caeser Salad', 1, 140, 140, 8745765, 'CART', '0000-00-00'),
(90, 10, 29, 'BBQ Chicken Salad', 1, 107.2, 107.2, 8745765, 'CART', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `pc_id` int(20) NOT NULL,
  `pc_name` varchar(30) NOT NULL,
  `pc_image` varchar(100) NOT NULL,
  `pc_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`pc_id`, `pc_name`, `pc_image`, `pc_date`) VALUES
(13, 'Signature Salads', 'IMG_1504275503.jpg', '30-08-2020'),
(14, 'Signature Subs', 'IMG_373812777.jpg', '25-04-2020'),
(15, 'Nourish Bowls', 'IMG_424706290.jpg', '25-04-2020'),
(16, 'Signature Wraps', 'IMG_1886850802.jpg', '25-04-2020'),
(17, 'Protein Shakes', 'IMG_182818196.jpg', '25-04-2020'),
(18, 'Smoothies', 'IMG_2027718252.jpg', '25-04-2020');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `pd_id` int(20) NOT NULL,
  `pc_id` int(20) NOT NULL,
  `psc_id` int(20) NOT NULL,
  `pd_name` varchar(20) NOT NULL,
  `pd_description` text NOT NULL,
  `pd_price` float NOT NULL,
  `pd_image1` varchar(100) NOT NULL,
  `pd_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`pd_id`, `pc_id`, `psc_id`, `pd_name`, `pd_description`, `pd_price`, `pd_image1`, `pd_date`) VALUES
(7, 13, 1, 'Classic Caeser Salad', 'it is classic salad', 130, 'IMG_608963744.jpg', '27-08-2020'),
(8, 13, 1, 'BBQ Paneer Salad', 'it is paneer salad', 150, 'IMG_846667212.jpg', '27-08-2020'),
(9, 13, 2, 'Classic Caeser Salad', 'it is egg salad', 140, 'IMG_25088727.jpg', '27-08-2020'),
(10, 13, 2, 'BBQ Chicken Salad', 'it is chicken salad', 160, 'IMG_1591351773.jpg', '27-08-2020'),
(15, 13, 1, 'Greek Salad', 'Greek Salad Consist of  Iceberg lettuce, Red Onions, Tomatoes, Black Olives, Cucumber Jalapeno,  Cheese or Paneer.\r\nDrizzle with Greek Dressing', 120, 'IMG_170050065.jpg', '30-08-2020'),
(16, 13, 2, 'Greek Salad', 'Greek Salad Consist of  Iceberg lettuce, Red Onions, Tomatoes, Black Olives, Cucumber Jalapeno,  Baked Chicken.\r\nDrizzle with Greek Dressing', 130, 'IMG_530381095.jpg', '30-08-2020'),
(17, 14, 1, 'Paneer Tikka Sub', 'The Paneer Tikka Sub Sandwich is a delicious creamy and spicy sandwich that is made with paneer tossed in a Tandoori Mayo and chat masala. The addition of fresh ingredients like cucumber, tomatoes, lettuce and onions adds to the freshness of this dish. ', 79, 'IMG_1966757260.jpg', '30-08-2020'),
(18, 14, 1, 'Corn Sub', 'The Corn Sub Sandwich is a delicious creamy and spicy sandwich that is made with corn tossed in a Tandoori Mayo and chat masala. The addition of fresh ingredients like cucumber, tomatoes, lettuce and onions adds to the freshness of this dish.', 69, 'IMG_2047808807.png', '30-08-2020'),
(19, 14, 2, 'Classic Chicken Sub', 'Nice roasted chicken pieces, fresh lettuce and tomato, avocado and a spread of sweet and tangy Deli Mayo bringing it all together', 89, 'IMG_1212191497.jpg', '30-08-2020'),
(20, 14, 2, 'Egg snacker', 'The Hard-Boiled Egg: The Perfect Snack The hard-boiled egg is really the perfect package of fat and protein for a wholesome, simple snack that truly fills you up.', 69, 'IMG_1119179882.jpg', '30-08-2020'),
(21, 15, 2, 'Taco Bowl', 'Iceberg Lettuce, Corn, Mixed Beans, Tomatoes, Red Onions, Carrots, Green Bell Pepper, Baked Chicken , Healthy crisp.\r\nDrizzle with chipotle dressing', 240, 'IMG_1047906859.jpg', '30-08-2020'),
(22, 15, 1, 'Taco Bowl', 'Iceberg Lettuce, Corn, Mixed Beans, Tomatoes, Red Onions, Carrots, Green Bell Pepper, Paneer , Healthy crisp. Drizzle with chipotle dressing', 230, 'IMG_36127394.jpg', '30-08-2020'),
(23, 15, 1, 'High Fiber Bowl', 'Iceberg lettuce, Spinach, Red Onions,  Apples, Almonds, Oats, Barley, Cranberry, Chia seeds, Flax seeds, Sweet Potatoes \r\nDrizzle with BBQ or Jalapeno dressing', 250, 'IMG_1388644740.jpg', '30-08-2020'),
(24, 15, 2, 'Thai Bowl', 'Iceberg Lettuce, Spinach, Carrots, Peanuts , Fresh Lime , Baked Chicken,Steamed Corn, Cucumber, Fresh Beans,Healthy Crisp, Tomatoes, Red Cabbage\r\nDrizzle with Mustard dressing', 270, 'IMG_760914864.jpg', '30-08-2020'),
(25, 0, 0, '', '', 0, 'IMG_1853243090.', '30-08-2020'),
(26, 0, 0, '', '528695', 20, 'IMG_489867241.', '30-08-2020');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_category`
--

CREATE TABLE `product_sub_category` (
  `psc_id` int(20) NOT NULL,
  `psc_name` varchar(30) NOT NULL,
  `psc_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_sub_category`
--

INSERT INTO `product_sub_category` (`psc_id`, `psc_name`, `psc_date`) VALUES
(1, 'Veg', '30-08-2020'),
(2, 'Non Veg', '15-03-2020');

-- --------------------------------------------------------

--
-- Table structure for table `stock_details`
--

CREATE TABLE `stock_details` (
  `sd_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `sd_unit_price` float NOT NULL,
  `sd_qty` int(30) NOT NULL,
  `sd_discount` float NOT NULL,
  `sd_discount_price` float NOT NULL,
  `sd_sale_price` float NOT NULL,
  `sd_status` varchar(20) NOT NULL,
  `sd_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_details`
--

INSERT INTO `stock_details` (`sd_id`, `pd_id`, `sd_unit_price`, `sd_qty`, `sd_discount`, `sd_discount_price`, `sd_sale_price`, `sd_status`, `sd_date`) VALUES
(31, 3, 48, 100, 30, 14.4, 33.6, 'Available', '24-04-2020'),
(32, 5, 357, 100, 25, 89.25, 267.75, 'Currently Not Availa', '24-04-2020'),
(33, 6, 999, 100, 35, 349.65, 649.35, 'Available', '24-04-2020'),
(34, 7, 130, 100, 30, 39, 91, 'Available', '25-04-2020'),
(35, 8, 150, 100, 25, 37.5, 112.5, 'Available', '29-08-2020'),
(36, 9, 140, 100, 0, 0, 140, 'Available', '25-04-2020'),
(37, 10, 160, 100, 33, 52.8, 107.2, 'Available', '25-04-2020'),
(38, 15, 120, 10, 0, 0, 120, 'Available', '30-08-2020'),
(39, 16, 130, 6, 0, 0, 130, 'Available', '30-08-2020'),
(40, 17, 79, 8, 0, 0, 79, 'Available', '30-08-2020'),
(41, 18, 69, 8, 0, 0, 69, 'Available', '30-08-2020'),
(42, 19, 89, 10, 0, 0, 89, 'Available', '30-08-2020'),
(43, 20, 69, 10, 0, 0, 69, 'Available', '30-08-2020'),
(44, 21, 230, 10, 0, 0, 230, 'Available', '30-08-2020'),
(45, 22, 240, 10, 0, 0, 240, 'Available', '30-08-2020'),
(46, 23, 250, 10, 0, 0, 250, 'Available', '30-08-2020'),
(47, 24, 270, 10, 0, 0, 270, 'Available', '30-08-2020');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_purchase`
--

CREATE TABLE `supplier_purchase` (
  `sp_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `dea_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `purchase_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_purchase`
--

INSERT INTO `supplier_purchase` (`sp_id`, `pd_id`, `dea_id`, `qty`, `unit_price`, `total`, `purchase_date`) VALUES
(2, 99, 1, 2, 2, 20000, '2019-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `worker_id` int(11) NOT NULL,
  `worker_name` varchar(50) NOT NULL,
  `worker_contact` bigint(50) NOT NULL,
  `worker_address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`worker_id`, `worker_name`, `worker_contact`, `worker_address`) VALUES
(3, 'ashok', 7406251264, 'annigeri'),
(4, 'Raju', 9986960718, 'dharwad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `customer_invoice`
--
ALTER TABLE `customer_invoice`
  ADD PRIMARY KEY (`ci_id`);

--
-- Indexes for table `dealers`
--
ALTER TABLE `dealers`
  ADD PRIMARY KEY (`dea_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `extra_charges`
--
ALTER TABLE `extra_charges`
  ADD PRIMARY KEY (`ec_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`ho_id`);

--
-- Indexes for table `hotel_daily_payment`
--
ALTER TABLE `hotel_daily_payment`
  ADD PRIMARY KEY (`hdp_id`);

--
-- Indexes for table `hotel_purchase_invoice`
--
ALTER TABLE `hotel_purchase_invoice`
  ADD PRIMARY KEY (`hpi_id`);

--
-- Indexes for table `hotel_total_payment`
--
ALTER TABLE `hotel_total_payment`
  ADD PRIMARY KEY (`htp_id`);

--
-- Indexes for table `product_cart_details`
--
ALTER TABLE `product_cart_details`
  ADD PRIMARY KEY (`pcd_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `product_sub_category`
--
ALTER TABLE `product_sub_category`
  ADD PRIMARY KEY (`psc_id`);

--
-- Indexes for table `stock_details`
--
ALTER TABLE `stock_details`
  ADD PRIMARY KEY (`sd_id`);

--
-- Indexes for table `supplier_purchase`
--
ALTER TABLE `supplier_purchase`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`worker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `b_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `customer_invoice`
--
ALTER TABLE `customer_invoice`
  MODIFY `ci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dealers`
--
ALTER TABLE `dealers`
  MODIFY `dea_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `extra_charges`
--
ALTER TABLE `extra_charges`
  MODIFY `ec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `ho_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hotel_daily_payment`
--
ALTER TABLE `hotel_daily_payment`
  MODIFY `hdp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hotel_purchase_invoice`
--
ALTER TABLE `hotel_purchase_invoice`
  MODIFY `hpi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hotel_total_payment`
--
ALTER TABLE `hotel_total_payment`
  MODIFY `htp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_cart_details`
--
ALTER TABLE `product_cart_details`
  MODIFY `pcd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `pc_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `pd_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_sub_category`
--
ALTER TABLE `product_sub_category`
  MODIFY `psc_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock_details`
--
ALTER TABLE `stock_details`
  MODIFY `sd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `supplier_purchase`
--
ALTER TABLE `supplier_purchase`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

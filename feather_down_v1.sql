-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2015 at 04:13 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `feather_down_v1`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_global_tax`(in primary_flag int(11), in language_id int(11), in environement_id int(11))
BEGIN
    
	SELECT tax_group_id,contents.env_title,contents.environment_content_id 
	FROM tbl_tax_group t  
	LEFT OUTER JOIN tbl_environment_content contents ON (contents.primary_table_id = t.tax_group_id) 
	WHERE contents.primary_table_flag = primary_flag AND contents.language_id = language_id and FIND_IN_SET(environement_id,environments);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_global_tax_addedit`(IN primary_flag INT(11), IN language_id INT(11), IN environement_id INT(11))
BEGIN
    
	call sp_get_global_tax(primary_flag,language_id,environement_id);
	
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
`admin_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `admin_username` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `isactive` enum('1','2') DEFAULT NULL COMMENT '1 = Yes, 2 = No'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `first_name`, `last_name`, `email_address`, `admin_username`, `admin_password`, `isactive`) VALUES
(1, 'Hiren', 'Dave', 'hiren.magneto@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_affiliate`
--

CREATE TABLE IF NOT EXISTS `tbl_affiliate` (
`affiliate_id` bigint(20) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `affi_username` varchar(255) DEFAULT NULL,
  `affi_password` varchar(255) DEFAULT NULL,
  `affi_email_address` varchar(255) DEFAULT NULL,
  `domain_url` varchar(255) DEFAULT NULL,
  `address1` varchar(500) DEFAULT NULL,
  `address2` varchar(500) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `environment_id` int(11) DEFAULT NULL,
  `commission_rate` float(4,4) DEFAULT NULL,
  `affi_comment` text,
  `admin_comment` text,
  `isactive` enum('1','2') DEFAULT NULL COMMENT '1 = Yes, 2 = No',
  `affi_from_date` date DEFAULT NULL,
  `affi_to_date` date DEFAULT NULL,
  `environments` text COMMENT 'Data will be saved in comma separated.',
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tbl_affiliate`:
--   `environment_id`
--       `tbl_environment` -> `environment_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_affiliate_payment_history`
--

CREATE TABLE IF NOT EXISTS `tbl_affiliate_payment_history` (
`affiliate_payment_id` bigint(20) NOT NULL,
  `affiliate_id` bigint(20) DEFAULT NULL,
  `payment_type_id` bigint(20) DEFAULT NULL,
  `amount_paid` float(4,4) DEFAULT NULL,
  `amount_paid_on` datetime DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tbl_affiliate_payment_history`:
--   `affiliate_id`
--       `tbl_affiliate` -> `affiliate_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_available_stock_info`
--

CREATE TABLE IF NOT EXISTS `tbl_available_stock_info` (
`available_stock_id` bigint(20) NOT NULL,
  `location_id` bigint(20) DEFAULT NULL,
  `location_product_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `available_stock` int(11) DEFAULT NULL,
  `available_stock_from` date DEFAULT NULL,
  `available_stock_till` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tbl_available_stock_info`:
--   `location_product_id`
--       `tbl_location_product` -> `location_product_id`
--   `product_id`
--       `tbl_product` -> `product_id`
--   `location_id`
--       `tbl_location` -> `location_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE IF NOT EXISTS `tbl_booking` (
`booking_id` bigint(20) NOT NULL,
  `booking_code` varchar(25) DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `location_id` bigint(20) DEFAULT NULL,
  `sale_type_id` int(11) DEFAULT NULL,
  `affiliate_id` int(11) DEFAULT NULL,
  `sales_channel_int_id` int(11) DEFAULT NULL,
  `no_adults` int(11) DEFAULT NULL,
  `no_babies` int(11) DEFAULT NULL,
  `no_children` int(11) DEFAULT NULL,
  `payment_status` enum('1','2','3','4') DEFAULT NULL COMMENT '1 = Paid, 2 = Not paid, 3 = partial, 4 = cancel',
  `customer_comment` text,
  `supplier_comment` text,
  `office_comment` text,
  `booking_expiry_date` date DEFAULT NULL,
  `promotion_code` varchar(255) DEFAULT NULL,
  `isactive` enum('1','2') DEFAULT NULL COMMENT '1 = Yes, 2 = No',
  `environments` text,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tbl_booking`:
--   `sale_type_id`
--       `tbl_sale_type` -> `sale_type_id`
--   `customer_id`
--       `tbl_customer` -> `customer_id`
--   `location_id`
--       `tbl_location` -> `location_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_communication`
--

CREATE TABLE IF NOT EXISTS `tbl_booking_communication` (
`booking_com_id` bigint(20) NOT NULL,
  `booking_id` bigint(20) DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
  `template_sent_on` datetime DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `email_subject` varchar(500) DEFAULT NULL,
  `email_recipient` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tbl_booking_communication`:
--   `booking_id`
--       `tbl_booking` -> `booking_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_booking_detail` (
`booking_detail_id` bigint(20) NOT NULL,
  `booking_id` bigint(20) DEFAULT NULL,
  `booking_from` date DEFAULT NULL,
  `booking_till` date DEFAULT NULL,
  `location_product_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `product_amount` float(4,4) DEFAULT NULL,
  `product_qty` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tbl_booking_detail`:
--   `booking_id`
--       `tbl_booking` -> `booking_id`
--   `location_product_id`
--       `tbl_location_product` -> `location_product_id`
--   `product_id`
--       `tbl_product` -> `product_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_invoice`
--

CREATE TABLE IF NOT EXISTS `tbl_booking_invoice` (
`booking_invoice_id` bigint(20) NOT NULL,
  `invoice_code` varchar(25) DEFAULT NULL,
  `booking_id` bigint(20) DEFAULT NULL,
  `booking_code` varchar(25) DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `invoice_raised_on` datetime DEFAULT NULL,
  `invoice_due_on` date DEFAULT NULL,
  `amount` float(4,4) DEFAULT NULL,
  `customer_address` text,
  `state_id` bigint(20) DEFAULT NULL,
  `city_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_booking_payment` (
`booking_payment_id` bigint(20) NOT NULL,
  `booking_invoice_id` bigint(20) DEFAULT NULL,
  `booking_id` bigint(20) DEFAULT NULL,
  `booking_code` varchar(25) DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `invoice_code` varchar(25) DEFAULT NULL,
  `currency_code` int(11) DEFAULT NULL,
  `amount_paid_on` datetime DEFAULT NULL,
  `amount_paid` float(4,4) DEFAULT NULL,
  `payment_code` varchar(25) DEFAULT NULL,
  `payment_status` enum('1','2','3','4') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tbl_booking_payment`:
--   `booking_invoice_id`
--       `tbl_booking_invoice` -> `booking_invoice_id`
--   `booking_id`
--       `tbl_booking` -> `booking_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_payment_rules`
--

CREATE TABLE IF NOT EXISTS `tbl_booking_payment_rules` (
`payment_rule_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `template_id` int(11) DEFAULT NULL,
  `request_send_before` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_day` int(11) NOT NULL,
  `end_day` int(11) NOT NULL,
  `environments` text COMMENT 'It will be comma separated, because it rules may be same for other environment domain as well',
  `isactive` enum('0','1') NOT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking_payment_rules`
--

INSERT INTO `tbl_booking_payment_rules` (`payment_rule_id`, `title`, `template_id`, `request_send_before`, `start_date`, `end_date`, `start_day`, `end_day`, `environments`, `isactive`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, '60 days and above', 1, 5, '2015-02-01', '2015-06-30', 60, 0, '1,3', '1', '2015-02-23 17:06:03', 'admin', '2015-02-23 17:06:03', 'admin'),
(2, '30 days to 60 days', 2, 3, '2015-02-01', '2015-06-30', 30, 59, '1,3', '1', '2015-02-23 19:31:35', 'admin', '2015-02-23 19:39:49', 'admin'),
(3, '1 day to 29 days', 3, 1, '2015-02-01', '2015-06-30', 1, 29, '1,3,4', '1', '2015-02-23 19:44:00', 'admin', '2015-02-23 19:44:25', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_payment_rules_inst`
--

CREATE TABLE IF NOT EXISTS `tbl_booking_payment_rules_inst` (
`instalment_id` int(11) NOT NULL,
  `payment_rule_id` int(11) NOT NULL,
  `percent` int(11) NOT NULL,
  `day` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tbl_booking_payment_rules_inst`:
--   `payment_rule_id`
--       `tbl_booking_payment_rules` -> `payment_rule_id`
--

--
-- Dumping data for table `tbl_booking_payment_rules_inst`
--

INSERT INTO `tbl_booking_payment_rules_inst` (`instalment_id`, `payment_rule_id`, `percent`, `day`) VALUES
(1, 1, 20, 0),
(2, 1, 50, 30),
(3, 1, 30, 20),
(10, 2, 50, 0),
(11, 2, 30, 10),
(12, 2, 20, 20),
(17, 3, 50, 0),
(18, 3, 50, 29);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_questionnaire`
--

CREATE TABLE IF NOT EXISTS `tbl_booking_questionnaire` (
`booking_question_id` bigint(20) NOT NULL,
  `booking_id` bigint(20) DEFAULT NULL,
  `booking_code` varchar(25) DEFAULT NULL,
  `questionnaire_id` int(11) DEFAULT NULL,
  `answer` int(1) DEFAULT NULL,
  `suggestions` text,
  `admin_reply` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tbl_booking_questionnaire`:
--   `booking_id`
--       `tbl_booking` -> `booking_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE IF NOT EXISTS `tbl_city` (
`city_id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_slug` varchar(50) NOT NULL,
  `city_abbreviation` varchar(5) NOT NULL,
  `environments` text NOT NULL,
  `isactive` enum('0','1') NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tbl_city`:
--   `state_id`
--       `tbl_province` -> `province_id`
--   `country_id`
--       `tbl_country` -> `country_id`
--

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`city_id`, `city_name`, `country_id`, `state_id`, `city_slug`, `city_abbreviation`, `environments`, `isactive`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(7, 'Ahmedabad', 6, 4, 'ahmedabad', 'ADB', '1,3', '1', '2015-02-21 17:56:53', 'admin', '2015-02-21 17:56:53', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_communication_history`
--

CREATE TABLE IF NOT EXISTS `tbl_communication_history` (
`conversation_history_id` bigint(20) NOT NULL,
  `conversation_type_id` int(11) DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
  `primary_table_id` bigint(20) DEFAULT NULL COMMENT 'It can be any user e.g. customer, affiliate, supplier and it will saved based on flag',
  `conversation_on` datetime DEFAULT NULL,
  `sender_id` bigint(20) DEFAULT NULL,
  `client_comment` text,
  `admin_comment` text,
  `table_flag` enum('1','2') DEFAULT NULL COMMENT '1 = Customer, Affiliate',
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tbl_communication_history`:
--   `conversation_type_id`
--       `tbl_communication_type` -> `conversation_type_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_communication_type`
--

CREATE TABLE IF NOT EXISTS `tbl_communication_type` (
`conversation_type_id` int(11) NOT NULL,
  `isactive` enum('1','2') DEFAULT NULL COMMENT '1 = Yes, 2 = No',
  `environments` text,
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE IF NOT EXISTS `tbl_country` (
`country_id` int(11) NOT NULL,
  `country_name` varchar(50) NOT NULL,
  `country_slug` varchar(50) NOT NULL,
  `country_abbreviation` varchar(5) NOT NULL,
  `country_flag` varchar(500) DEFAULT NULL,
  `environments` text NOT NULL,
  `isactive` enum('0','1') NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`country_id`, `country_name`, `country_slug`, `country_abbreviation`, `country_flag`, `environments`, `isactive`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 'Italy', 'italy', 'ITA', NULL, '1,3', '1', '2015-02-10 13:54:59', 'Guest', '2015-02-24 13:00:40', 'admin'),
(2, 'Spain', 'spain', 'sp', NULL, '1,3', '1', '2015-02-10 13:54:59', 'Guest', '2015-02-16 13:27:46', 'Guest'),
(4, 'England', 'england', 'ENG', NULL, '2,4', '1', '2015-02-10 13:54:59', 'Guest', '2015-02-16 13:27:43', 'Guest'),
(5, 'Swiss', 'swiss', 'sws', NULL, '1,2,3,4', '1', '2015-02-10 13:54:59', 'Guest', '2015-02-16 13:27:41', 'Guest'),
(6, 'India', 'india', 'IND', NULL, '1,3', '1', '2015-02-21 13:48:48', 'admin', '2015-02-21 13:48:48', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_currency`
--

CREATE TABLE IF NOT EXISTS `tbl_currency` (
`currency_id` int(11) NOT NULL,
  `currency_name` varchar(255) DEFAULT NULL,
  `currency_slug` varchar(255) DEFAULT NULL,
  `currency_abrv` varchar(255) DEFAULT NULL,
  `currency_symbol` varchar(255) DEFAULT NULL,
  `isactive` enum('1','2') DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_currency`
--

INSERT INTO `tbl_currency` (`currency_id`, `currency_name`, `currency_slug`, `currency_abrv`, `currency_symbol`, `isactive`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 'Euro1', 'euro1', 'EUR', '€', '1', NULL, NULL, '2015-02-24 16:06:57', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
`customer_id` bigint(20) NOT NULL,
  `company_id` bigint(20) DEFAULT NULL,
  `prefix` varchar(15) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender_type` enum('1','2','3') DEFAULT NULL COMMENT '1 = Male, 2 = Female, 3 = Unspacified',
  `email_address` varchar(255) DEFAULT NULL,
  `environment_id` int(11) DEFAULT NULL,
  `cust_username` varchar(255) DEFAULT NULL,
  `cust_password` varchar(255) DEFAULT NULL,
  `address1` varchar(500) DEFAULT NULL,
  `address2` varchar(500) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `invoice_address1` varchar(255) DEFAULT NULL,
  `invoice_address2` varchar(255) DEFAULT NULL,
  `invoice_postal_code` varchar(20) DEFAULT NULL,
  `invoice_city_id` int(11) DEFAULT NULL,
  `invoice_state_id` int(11) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `contact_no` varchar(25) DEFAULT NULL,
  `mobile_no` varchar(25) DEFAULT NULL,
  `fax_no` varchar(25) DEFAULT NULL,
  `web_url` varchar(255) DEFAULT NULL,
  `news_letter` enum('1','2') DEFAULT NULL COMMENT '1 = Yes, 2 = No',
  `brochure` enum('1','2') DEFAULT NULL COMMENT '1 = Yes, 2 = No',
  `customer_comment` text,
  `admin_comment` text,
  `environments` text COMMENT 'It will save comman separated value',
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tbl_customer`:
--   `company_id`
--       `tbl_company` -> `company_id`
--   `environment_id`
--       `tbl_environment` -> `environment_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_settings`
--

CREATE TABLE IF NOT EXISTS `tbl_email_settings` (
`email_settings_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `template_id` int(11) NOT NULL,
  `email_ids` text NOT NULL,
  `isactive` enum('0','1') NOT NULL,
  `environments` text NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_email_settings`
--

INSERT INTO `tbl_email_settings` (`email_settings_id`, `title`, `template_id`, `email_ids`, `isactive`, `environments`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 'Test', 0, 'jatin.magneto@gmail.com', '1', '1,3', '2015-02-17 15:15:20', 'admin', '2015-02-17 15:18:42', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_environment`
--

CREATE TABLE IF NOT EXISTS `tbl_environment` (
`environment_id` int(11) NOT NULL,
  `environment_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `environment_url` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `language_id` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `environment_desc` text CHARACTER SET latin1,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_environment`
--

INSERT INTO `tbl_environment` (`environment_id`, `environment_name`, `environment_url`, `language_id`, `environment_desc`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 'Indian', 'www.test.co.in', '1', 'Indian environment', '2015-02-07 11:15:04', 'Guest', '2015-02-16 17:53:28', 'Guest'),
(2, 'French', 'www.test.fr', '2', 'French environment', '2015-02-09 16:58:21', 'Guest', '2015-02-12 19:24:30', 'Guest'),
(3, 'Test1', 'test1.com', '1', 'test1', '2015-02-13 17:28:24', 'Guest', '2015-02-16 17:56:18', 'Guest'),
(4, 'Test2', 'test2.com', '2', 'test2', '2015-02-13 17:28:49', 'Guest', '2015-02-16 17:56:15', 'Guest');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_environment_content`
--

CREATE TABLE IF NOT EXISTS `tbl_environment_content` (
`environment_content_id` bigint(20) NOT NULL,
  `primary_table_id` bigint(20) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `env_title` varchar(500) DEFAULT NULL,
  `env_sub_title` varchar(500) DEFAULT NULL,
  `env_title_slug` varchar(500) DEFAULT NULL,
  `env_desc` text,
  `primary_table_flag` int(11) unsigned DEFAULT NULL COMMENT '1 = Payment Type, 2 = Sale Type, 3 =Sale Channel Type ,4 = Tax Group, 5 = Product Category, 6=Product  and so on'
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tbl_environment_content`:
--   `language_id`
--       `tbl_language` -> `language_id`
--

--
-- Dumping data for table `tbl_environment_content`
--

INSERT INTO `tbl_environment_content` (`environment_content_id`, `primary_table_id`, `language_id`, `env_title`, `env_sub_title`, `env_title_slug`, `env_desc`, `primary_table_flag`) VALUES
(21, 4, 1, 'SaleChannelType eng title eng up1', 'SaleChannelType sub title eng', 'SaleChannelType title slig eng1', 'SaleChannelType eng', 3),
(22, 4, 2, 'SaleChannelType eng title fr up', 'SaleChannelType sub title fr', 'SaleChannelType title slig fr', 'SaleChannelType fr1', 3),
(25, 2, 1, 'Purchase VAT High', 'PVH', 'purchase-vat-high', '', 4),
(26, 2, 2, 'Purchase VAT High fr', 'PVH fr', 'purchase-vat-high fr', '', 4),
(27, 3, 1, 'Purchase VAT Low', 'Purchase VAT Low', 'Purchase VAT Low', 'Purchase VAT Low', 4),
(28, 3, 2, 'Purchase VAT Low 1', 'Purchase VAT Low 1', 'Purchase VAT Low 1', 'Purchase VAT Low 1', 4),
(97, 3, 1, '', '', '', '', 5),
(98, 3, 2, '', '', '', '', 5),
(99, 3, 3, '', '', '', '', 5),
(100, 4, 1, '', '', '', '', 5),
(101, 4, 2, '', '', '', '', 5),
(102, 4, 3, '', '', '', '', 5),
(131, 2, 1, 'a', '', 'a', '', 5),
(132, 2, 2, 'b', '', 'b', '', 5),
(133, 2, 3, 'b', '', 'b', '', 5),
(134, 2, 4, 'b', '', 'b', '', 5),
(159, 1, 1, 'ProductCategory eng 1', 'ProductCategory', 'productcategory-eng-1', 'eng', 5),
(160, 1, 2, 'ProductCategory fr 1', 'ProductCategory', 'productcategory-fr-1', 'fr', 5),
(161, 1, 3, 'ProductCategory fr 1', 'ProductCategory', 'productcategory-fr-1', 'fr', 5),
(162, 1, 4, 'ProductCategory fr 1', 'ProductCategory', 'productcategory-fr-1', 'fr', 5),
(163, 4, 1, 'SaleType title eng up', 'SaleType sub title eng', 'SaleType title slug eng', 'SaleType eng', 2),
(164, 4, 2, 'SaleType title fr 1', 'SaleType sub title fr', 'SaleType title slug fr', 'SaleType fr', 2),
(165, 4, 3, 'SaleType title fr 1', 'SaleType sub title fr', 'SaleType title slug fr', 'SaleType fr', 2),
(166, 4, 4, 'SaleType title fr 1', 'SaleType sub title fr', 'SaleType title slug fr', 'SaleType fr', 2),
(167, 8, 1, 'Cash', 'Cash', 'cash', '', 1),
(168, 8, 2, '', '', '', '', 1),
(169, 8, 3, '', '', '', '', 1),
(170, 8, 4, '', '', '', '', 1),
(175, 3, 1, 'chk', 'try', 'chk', '', 6),
(176, 3, 2, 'rttt', '', 'rttt', '', 6),
(177, 3, 3, 'try', '', 'try', '', 6),
(178, 3, 4, 'try', 'trty', 'try', '', 6),
(187, 1, 1, '', '', '', '', 6),
(188, 1, 2, '', '', '', '', 6),
(189, 1, 3, '', '', '', '', 6),
(190, 1, 4, '', '', '', '', 6),
(191, 1, 1, 'Sales VAT 5% eng', 'Sales VAT5% eng', 'sales-vat-5-eng', 'eng', 4),
(192, 1, 2, 'Sales VAT5% fr', 'Sales VAT 5% fr', 'sales-vat5-fr', ' fr', 4),
(193, 1, 3, 'Sales VAT5% sp', 'Sales VAT 5% sp', 'sales-vat5-sp', 'spanish', 4),
(194, 1, 4, 'Sales VAT5% sp', 'Sales VAT 5% sp', 'sales-vat5-sp', 'spanish', 4),
(195, 7, 1, 'PaymentType title eng', 'PaymentType sub title eng', 'PaymentType slug eng', 'PaymentType eng', 1),
(196, 7, 2, 'PaymentType title fr', 'PaymentType sub title fr', 'PaymentType slug fr', 'PaymentType fr', 1),
(197, 7, 3, 'PaymentType title fr', 'PaymentType sub title fr', 'PaymentType slug fr', 'PaymentType fr', 1),
(198, 7, 4, 'PaymentType title fr', 'PaymentType sub title fr', 'PaymentType slug fr', 'PaymentType fr', 1),
(203, 2, 1, 'en test', '', 'en-test', '', 6),
(204, 2, 2, '', '', '', '', 6),
(205, 2, 3, '', '', '', '', 6),
(206, 2, 4, 'nl test', '', 'nl-test', '', 6),
(207, 3, 1, '', '', '', '', 5),
(208, 3, 2, '', '', '', '', 5),
(209, 3, 3, '', '', '', '', 5),
(210, 3, 4, '', '', '', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_language`
--

CREATE TABLE IF NOT EXISTS `tbl_language` (
`language_id` int(11) NOT NULL,
  `locale` varchar(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `isactive` enum('0','1') NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_language`
--

INSERT INTO `tbl_language` (`language_id`, `locale`, `name`, `isactive`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 'en', 'English', '1', '0000-00-00 00:00:00', '', '2015-02-24 11:17:27', 'admin'),
(2, 'fr', 'French', '1', '2015-02-07 12:41:29', 'Guest', '2015-02-19 15:58:51', 'admin'),
(3, 'sp', 'Spanish', '1', '2015-02-19 10:23:05', '', '0000-00-00 00:00:00', 'admin'),
(4, 'nl', 'Dutch a', '1', '2015-02-19 16:00:56', 'admin', '2015-02-24 11:35:27', 'admin'),
(5, 'GU', 'GUJ', '1', '2015-02-24 18:21:57', 'admin', '2015-02-24 18:21:57', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_linked_product`
--

CREATE TABLE IF NOT EXISTS `tbl_linked_product` (
`linked_product_id` int(11) NOT NULL,
  `main_product_id` bigint(18) NOT NULL,
  `product_id` bigint(18) NOT NULL,
  `linked_product_quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tbl_linked_product`:
--   `product_id`
--       `tbl_product` -> `product_id`
--   `main_product_id`
--       `tbl_product` -> `product_id`
--

--
-- Dumping data for table `tbl_linked_product`
--

INSERT INTO `tbl_linked_product` (`linked_product_id`, `main_product_id`, `product_id`, `linked_product_quantity`) VALUES
(7, 1, 2, 10),
(8, 1, 3, 5),
(10, 2, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locale`
--

CREATE TABLE IF NOT EXISTS `tbl_locale` (
`locale_id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `environments` text,
  `locale` varchar(255) DEFAULT NULL,
  `locale_slug` varchar(255) DEFAULT NULL,
  `date_short` varchar(15) DEFAULT NULL,
  `date_long` varchar(15) DEFAULT NULL,
  `locale_pricing` varchar(10) DEFAULT NULL,
  `isactive` enum('1','2') DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tbl_locale`:
--   `currency_id`
--       `tbl_currency` -> `currency_id`
--

--
-- Dumping data for table `tbl_locale`
--

INSERT INTO `tbl_locale` (`locale_id`, `country_id`, `currency_id`, `language_id`, `environments`, `locale`, `locale_slug`, `date_short`, `date_long`, `locale_pricing`, `isactive`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 2, 1, 1, '1,3', 'en_ZA', 'en_za', '%d-%m-%Y', '%a %d %b', 'R%s', '1', '2015-02-16 19:23:35', 'admin', '2015-02-18 20:07:18', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE IF NOT EXISTS `tbl_location` (
`location_id` bigint(20) NOT NULL,
  `location_type_id` int(11) DEFAULT NULL,
  `location_name` varchar(255) DEFAULT NULL,
  `location_slug` varchar(255) DEFAULT NULL,
  `location_desc` text,
  `location_address` text,
  `zip_code` varchar(15) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `tax_included` enum('1','2') DEFAULT NULL COMMENT '1 = Yes, 2 = No',
  `latitute` varchar(25) DEFAULT NULL,
  `longitude` varchar(25) DEFAULT NULL,
  `isactive` enum('1','2') DEFAULT NULL COMMENT '1 = Yes, 2 = No',
  `environments` text COMMENT 'value will be in comma separated',
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tbl_location`:
--   `location_type_id`
--       `tbl_location_type` -> `location_type_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location_pdf`
--

CREATE TABLE IF NOT EXISTS `tbl_location_pdf` (
`location_pdf_id` bigint(20) NOT NULL,
  `location_id` bigint(20) DEFAULT NULL,
  `master_pdf_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tbl_location_pdf`:
--   `location_id`
--       `tbl_location` -> `location_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location_product`
--

CREATE TABLE IF NOT EXISTS `tbl_location_product` (
`location_product_id` bigint(20) NOT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `location_id` bigint(20) DEFAULT NULL,
  `stock_from` date DEFAULT NULL,
  `stock_till` date DEFAULT NULL,
  `total_qty` int(11) DEFAULT NULL,
  `product_available_type` int(11) DEFAULT NULL,
  `product_available_special_type` int(11) DEFAULT NULL,
  `available_days` varchar(255) DEFAULT NULL COMMENT 'value will be stored in comma separrated',
  `available_nights` int(2) DEFAULT NULL,
  `is_manadatory` enum('1','2') DEFAULT NULL COMMENT '1 = Yes, 2 = No',
  `sale_price` float(4,4) DEFAULT NULL,
  `sale_price_unit_id` int(11) DEFAULT NULL,
  `sale_max_qty` int(11) DEFAULT NULL,
  `sale_max_unit_id` int(11) DEFAULT NULL,
  `sale_percentage` float(3,2) DEFAULT NULL,
  `sale_type_id` int(11) DEFAULT NULL,
  `primary_status` enum('1','2') DEFAULT NULL,
  `secondary_status` enum('1','2') DEFAULT NULL,
  `purchase_price` float(4,4) DEFAULT NULL,
  `purchase_price_unit_id` int(11) DEFAULT NULL,
  `purchase_percentage` float(3,2) DEFAULT NULL,
  `environment_id` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tbl_location_product`:
--   `location_id`
--       `tbl_location` -> `location_id`
--   `product_id`
--       `tbl_product` -> `product_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location_type`
--

CREATE TABLE IF NOT EXISTS `tbl_location_type` (
`location_type_id` int(11) NOT NULL,
  `location_type` varchar(255) DEFAULT NULL,
  `isactive` enum('1','2') DEFAULT NULL COMMENT '1 = Yes, 2 = No',
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_type`
--

CREATE TABLE IF NOT EXISTS `tbl_payment_type` (
`pay_type_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `environments` text,
  `isactive` enum('0','1') NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment_type`
--

INSERT INTO `tbl_payment_type` (`pay_type_id`, `title`, `environments`, `isactive`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(7, 'PaymentType title', '1', '1', '2015-02-09 20:06:05', 'Guest', '2015-02-24 17:39:51', 'admin'),
(8, 'Cash', '1,3', '1', '2015-02-24 15:52:50', 'admin', '2015-02-24 15:52:50', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pdf_master`
--

CREATE TABLE IF NOT EXISTS `tbl_pdf_master` (
`master_pdf_id` bigint(20) NOT NULL,
  `pdf_path` varchar(500) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
`product_id` bigint(18) NOT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `allow_max_persons` int(2) DEFAULT NULL,
  `allow_max_adults` int(2) DEFAULT NULL,
  `per_day` enum('0','1') DEFAULT NULL,
  `per_day_stay` enum('0','1') DEFAULT NULL,
  `travel_sum` enum('0','1') DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `isactive` enum('0','1') DEFAULT NULL,
  `environments` text,
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tbl_product`:
--   `product_category_id`
--       `tbl_product_category` -> `category_id`
--

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_category_id`, `product_code`, `title`, `allow_max_persons`, `allow_max_adults`, `per_day`, `per_day_stay`, `travel_sum`, `image`, `isactive`, `environments`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, 1, 'P103', 'Cycle', 2, 2, '1', '1', '1', 'images/product/54eb28b427733_Chrysanthemum.jpg', '1', '1,2,3,4', 'admin', '2015-02-23 18:47:26', 'admin', '2015-02-24 17:39:27'),
(2, 1, '1235', 'scooter', 10, 5, '1', '1', '1', 'images/product/54ec530bc2c9a_13.jpg', '1', '1,3', 'admin', '2015-02-24 16:00:21', 'admin', '2015-02-24 18:06:51'),
(3, 1, '1236', 'cart', 10, 5, '1', '1', '1', 'images/product/54ec5414d0b5b_15.jpg', '1', '1,3', 'admin', '2015-02-24 16:04:46', 'admin', '2015-02-24 16:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_category`
--

CREATE TABLE IF NOT EXISTS `tbl_product_category` (
`category_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `parent_category_id` int(11) DEFAULT NULL,
  `sales_group_tax_id` int(11) DEFAULT NULL,
  `purchase_group_tax_id` int(11) DEFAULT NULL,
  `isactive` enum('1','2') DEFAULT NULL COMMENT '1 = Yes, 2 = No',
  `environments` text COMMENT 'value will be stored in comman seperated',
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tbl_product_category`:
--   `purchase_group_tax_id`
--       `tbl_tax` -> `tax_id`
--   `sales_group_tax_id`
--       `tbl_tax` -> `tax_id`
--

--
-- Dumping data for table `tbl_product_category`
--

INSERT INTO `tbl_product_category` (`category_id`, `title`, `parent_category_id`, `sales_group_tax_id`, `purchase_group_tax_id`, `isactive`, `environments`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 'main', 0, 4, 5, '1', '1,3', '2015-02-16 20:00:00', 'admin', '2015-02-24 12:52:58', 'admin'),
(3, 'sub 1', 1, 4, 4, '1', '1,3', '2015-02-24 18:07:43', 'admin', '2015-02-24 18:07:43', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_province`
--

CREATE TABLE IF NOT EXISTS `tbl_province` (
`province_id` int(11) NOT NULL,
  `province_name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL,
  `province_slug` varchar(50) NOT NULL,
  `province_abbreviation` varchar(5) NOT NULL,
  `environments` text NOT NULL,
  `isactive` enum('0','1') NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tbl_province`:
--   `country_id`
--       `tbl_country` -> `country_id`
--

--
-- Dumping data for table `tbl_province`
--

INSERT INTO `tbl_province` (`province_id`, `province_name`, `country_id`, `province_slug`, `province_abbreviation`, `environments`, `isactive`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 'Emilia-Romagna', 1, 'emilia-romagna', 'er', '1,2', '1', '2015-02-10 15:34:44', 'Guest', '2015-02-10 15:33:55', 'Guest'),
(2, 'Molise', 2, 'molise', 'mol', '1', '1', '2015-02-10 15:34:44', 'Guest', '2015-02-21 13:51:11', 'admin'),
(3, 'Lazio', 1, 'lazio', 'laz', '1', '1', '2015-02-10 15:34:44', 'Guest', '2015-02-13 12:40:03', 'Guest'),
(4, 'Gujarat', 6, 'gujarat', 'GUJ', '1,2,3', '1', '2015-02-21 13:49:10', 'admin', '2015-02-21 13:49:10', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_channel_type`
--

CREATE TABLE IF NOT EXISTS `tbl_sale_channel_type` (
`sale_channel_type_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `isactive` enum('0','1') NOT NULL,
  `environments` text NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sale_channel_type`
--

INSERT INTO `tbl_sale_channel_type` (`sale_channel_type_id`, `title`, `isactive`, `environments`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(4, 'SaleChannelType title', '1', '1,2', 'Guest', '2015-02-09 20:09:02', 'Guest', '2015-02-12 20:03:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_type`
--

CREATE TABLE IF NOT EXISTS `tbl_sale_type` (
`sale_type_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `isactive` enum('0','1') DEFAULT NULL COMMENT '1 = Yes, 0 = No',
  `environments` text,
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sale_type`
--

INSERT INTO `tbl_sale_type` (`sale_type_id`, `title`, `isactive`, `environments`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(4, 'SaleType title', '1', '1', 'Guest', '2015-02-09 20:07:49', 'admin', '2015-02-24 14:55:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tax`
--

CREATE TABLE IF NOT EXISTS `tbl_tax` (
`tax_id` int(11) NOT NULL,
  `tax_group_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `province_id` varchar(255) NOT NULL,
  `value` decimal(7,4) NOT NULL,
  `value_type` varchar(50) NOT NULL,
  `vat_margin_value` decimal(7,4) NOT NULL,
  `vat_margin_value_type` varchar(50) NOT NULL,
  `code` int(50) NOT NULL,
  `title` varchar(500) NOT NULL,
  `title_slug` varchar(500) NOT NULL,
  `isactive` enum('0','1') NOT NULL,
  `publish_from` date NOT NULL,
  `publish_until` date NOT NULL,
  `environments` text NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tbl_tax`:
--   `tax_group_id`
--       `tbl_tax_group` -> `tax_group_id`
--

--
-- Dumping data for table `tbl_tax`
--

INSERT INTO `tbl_tax` (`tax_id`, `tax_group_id`, `country_id`, `province_id`, `value`, `value_type`, `vat_margin_value`, `vat_margin_value_type`, `code`, `title`, `title_slug`, `isactive`, `publish_from`, `publish_until`, `environments`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(4, 1, 1, '1,3', '95.9500', 'Percentage', '12.0000', 'Percentage', 1235678, 'Test tax', 'test-tax', '1', '2015-02-13', '2015-02-13', '1,3', '2015-02-20 16:44:05', 'admin', '2015-02-23 17:02:03', 'admin'),
(5, 1, 1, '3', '95.9500', 'Percentage', '12.0000', 'Percentage', 4444, 'multiple state tax', 'multiple-state-tax', '1', '2015-02-07', '2015-02-08', '1,3', '2015-02-21 15:38:46', 'admin', '2015-02-23 17:04:44', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tax_group`
--

CREATE TABLE IF NOT EXISTS `tbl_tax_group` (
`tax_group_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `environments` text NOT NULL,
  `isactive` enum('0','1') NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tax_group`
--

INSERT INTO `tbl_tax_group` (`tax_group_id`, `title`, `environments`, `isactive`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 'Sales VAT 5%', '1,2', '1', '2015-02-10 17:48:33', 'Guest', '2015-02-24 17:39:36', 'admin'),
(2, 'Purchase VAT High', '1', '1', '2015-02-11 11:42:32', 'Guest', '2015-02-13 11:19:27', 'Guest');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_affiliate`
--
ALTER TABLE `tbl_affiliate`
 ADD PRIMARY KEY (`affiliate_id`), ADD KEY `FK_tbl_affiliate_environment` (`environment_id`);

--
-- Indexes for table `tbl_affiliate_payment_history`
--
ALTER TABLE `tbl_affiliate_payment_history`
 ADD PRIMARY KEY (`affiliate_payment_id`), ADD KEY `FK_tbl_affiliate_payment_history` (`affiliate_id`);

--
-- Indexes for table `tbl_available_stock_info`
--
ALTER TABLE `tbl_available_stock_info`
 ADD PRIMARY KEY (`available_stock_id`), ADD KEY `FK_tbl_available_stock_info` (`location_id`), ADD KEY `FK_location_product_id` (`location_product_id`), ADD KEY `FK_product_id` (`product_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
 ADD PRIMARY KEY (`booking_id`), ADD KEY `FK_tbl_booking_location` (`location_id`), ADD KEY `FK_tbl_booking` (`sale_type_id`), ADD KEY `FK_tbl_booking_customer` (`customer_id`);

--
-- Indexes for table `tbl_booking_communication`
--
ALTER TABLE `tbl_booking_communication`
 ADD PRIMARY KEY (`booking_com_id`), ADD KEY `FK_tbl_booking_communication` (`booking_id`);

--
-- Indexes for table `tbl_booking_detail`
--
ALTER TABLE `tbl_booking_detail`
 ADD PRIMARY KEY (`booking_detail_id`), ADD KEY `FK_tbl_booking_detail` (`booking_id`), ADD KEY `FK_tbl_booking_detail_product` (`product_id`), ADD KEY `FK_tbl_booking_detail_location` (`location_product_id`);

--
-- Indexes for table `tbl_booking_invoice`
--
ALTER TABLE `tbl_booking_invoice`
 ADD PRIMARY KEY (`booking_invoice_id`);

--
-- Indexes for table `tbl_booking_payment`
--
ALTER TABLE `tbl_booking_payment`
 ADD PRIMARY KEY (`booking_payment_id`), ADD KEY `FK_tbl_booking_payment` (`booking_id`), ADD KEY `FK_tbl_booking_invoice_payment` (`booking_invoice_id`);

--
-- Indexes for table `tbl_booking_payment_rules`
--
ALTER TABLE `tbl_booking_payment_rules`
 ADD PRIMARY KEY (`payment_rule_id`);

--
-- Indexes for table `tbl_booking_payment_rules_inst`
--
ALTER TABLE `tbl_booking_payment_rules_inst`
 ADD PRIMARY KEY (`instalment_id`), ADD KEY `payment_rule_id` (`payment_rule_id`);

--
-- Indexes for table `tbl_booking_questionnaire`
--
ALTER TABLE `tbl_booking_questionnaire`
 ADD PRIMARY KEY (`booking_question_id`), ADD KEY `FK_tbl_booking_questionnaire` (`booking_id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
 ADD PRIMARY KEY (`city_id`), ADD KEY `state_id` (`state_id`), ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `tbl_communication_history`
--
ALTER TABLE `tbl_communication_history`
 ADD PRIMARY KEY (`conversation_history_id`), ADD KEY `FK_tbl_conversation_history_` (`conversation_type_id`);

--
-- Indexes for table `tbl_communication_type`
--
ALTER TABLE `tbl_communication_type`
 ADD PRIMARY KEY (`conversation_type_id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
 ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `tbl_currency`
--
ALTER TABLE `tbl_currency`
 ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
 ADD PRIMARY KEY (`customer_id`), ADD KEY `FK_tbl_customer_environment` (`environment_id`), ADD KEY `FK_tbl_customer_company` (`company_id`);

--
-- Indexes for table `tbl_email_settings`
--
ALTER TABLE `tbl_email_settings`
 ADD PRIMARY KEY (`email_settings_id`);

--
-- Indexes for table `tbl_environment`
--
ALTER TABLE `tbl_environment`
 ADD PRIMARY KEY (`environment_id`);

--
-- Indexes for table `tbl_environment_content`
--
ALTER TABLE `tbl_environment_content`
 ADD PRIMARY KEY (`environment_content_id`), ADD KEY `FK_tbl_environment_content_environment` (`language_id`), ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `tbl_language`
--
ALTER TABLE `tbl_language`
 ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `tbl_linked_product`
--
ALTER TABLE `tbl_linked_product`
 ADD PRIMARY KEY (`linked_product_id`), ADD KEY `product_id` (`product_id`), ADD KEY `main_product_id` (`main_product_id`);

--
-- Indexes for table `tbl_locale`
--
ALTER TABLE `tbl_locale`
 ADD PRIMARY KEY (`locale_id`), ADD KEY `currency_id` (`currency_id`), ADD KEY `currency_id_2` (`currency_id`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
 ADD PRIMARY KEY (`location_id`), ADD KEY `FK_tbl_location` (`location_type_id`);

--
-- Indexes for table `tbl_location_pdf`
--
ALTER TABLE `tbl_location_pdf`
 ADD PRIMARY KEY (`location_pdf_id`), ADD KEY `FK_tbl_location_pdf` (`location_id`);

--
-- Indexes for table `tbl_location_product`
--
ALTER TABLE `tbl_location_product`
 ADD PRIMARY KEY (`location_product_id`), ADD KEY `FK_tbl_location_location_product` (`location_id`), ADD KEY `FK_tbl_location_product11` (`product_id`);

--
-- Indexes for table `tbl_location_type`
--
ALTER TABLE `tbl_location_type`
 ADD PRIMARY KEY (`location_type_id`);

--
-- Indexes for table `tbl_payment_type`
--
ALTER TABLE `tbl_payment_type`
 ADD PRIMARY KEY (`pay_type_id`);

--
-- Indexes for table `tbl_pdf_master`
--
ALTER TABLE `tbl_pdf_master`
 ADD PRIMARY KEY (`master_pdf_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
 ADD PRIMARY KEY (`product_id`), ADD KEY `FK_tbl_product1` (`product_category_id`);

--
-- Indexes for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
 ADD PRIMARY KEY (`category_id`), ADD KEY `parent_category_id` (`parent_category_id`), ADD KEY `sales_group_tax_id` (`sales_group_tax_id`), ADD KEY `purchase_group_tax_id` (`purchase_group_tax_id`);

--
-- Indexes for table `tbl_province`
--
ALTER TABLE `tbl_province`
 ADD PRIMARY KEY (`province_id`), ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `tbl_sale_channel_type`
--
ALTER TABLE `tbl_sale_channel_type`
 ADD PRIMARY KEY (`sale_channel_type_id`);

--
-- Indexes for table `tbl_sale_type`
--
ALTER TABLE `tbl_sale_type`
 ADD PRIMARY KEY (`sale_type_id`);

--
-- Indexes for table `tbl_tax`
--
ALTER TABLE `tbl_tax`
 ADD PRIMARY KEY (`tax_id`), ADD KEY `tax_group_id` (`tax_group_id`);

--
-- Indexes for table `tbl_tax_group`
--
ALTER TABLE `tbl_tax_group`
 ADD PRIMARY KEY (`tax_group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_affiliate`
--
ALTER TABLE `tbl_affiliate`
MODIFY `affiliate_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_affiliate_payment_history`
--
ALTER TABLE `tbl_affiliate_payment_history`
MODIFY `affiliate_payment_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_available_stock_info`
--
ALTER TABLE `tbl_available_stock_info`
MODIFY `available_stock_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
MODIFY `booking_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_booking_communication`
--
ALTER TABLE `tbl_booking_communication`
MODIFY `booking_com_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_booking_detail`
--
ALTER TABLE `tbl_booking_detail`
MODIFY `booking_detail_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_booking_invoice`
--
ALTER TABLE `tbl_booking_invoice`
MODIFY `booking_invoice_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_booking_payment`
--
ALTER TABLE `tbl_booking_payment`
MODIFY `booking_payment_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_booking_payment_rules`
--
ALTER TABLE `tbl_booking_payment_rules`
MODIFY `payment_rule_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_booking_payment_rules_inst`
--
ALTER TABLE `tbl_booking_payment_rules_inst`
MODIFY `instalment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_booking_questionnaire`
--
ALTER TABLE `tbl_booking_questionnaire`
MODIFY `booking_question_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_communication_history`
--
ALTER TABLE `tbl_communication_history`
MODIFY `conversation_history_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_communication_type`
--
ALTER TABLE `tbl_communication_type`
MODIFY `conversation_type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_currency`
--
ALTER TABLE `tbl_currency`
MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
MODIFY `customer_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_email_settings`
--
ALTER TABLE `tbl_email_settings`
MODIFY `email_settings_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_environment`
--
ALTER TABLE `tbl_environment`
MODIFY `environment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_environment_content`
--
ALTER TABLE `tbl_environment_content`
MODIFY `environment_content_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=211;
--
-- AUTO_INCREMENT for table `tbl_language`
--
ALTER TABLE `tbl_language`
MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_linked_product`
--
ALTER TABLE `tbl_linked_product`
MODIFY `linked_product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_locale`
--
ALTER TABLE `tbl_locale`
MODIFY `locale_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
MODIFY `location_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_location_pdf`
--
ALTER TABLE `tbl_location_pdf`
MODIFY `location_pdf_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_location_product`
--
ALTER TABLE `tbl_location_product`
MODIFY `location_product_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_location_type`
--
ALTER TABLE `tbl_location_type`
MODIFY `location_type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_payment_type`
--
ALTER TABLE `tbl_payment_type`
MODIFY `pay_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_pdf_master`
--
ALTER TABLE `tbl_pdf_master`
MODIFY `master_pdf_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
MODIFY `product_id` bigint(18) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_province`
--
ALTER TABLE `tbl_province`
MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_sale_channel_type`
--
ALTER TABLE `tbl_sale_channel_type`
MODIFY `sale_channel_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_sale_type`
--
ALTER TABLE `tbl_sale_type`
MODIFY `sale_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_tax`
--
ALTER TABLE `tbl_tax`
MODIFY `tax_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_tax_group`
--
ALTER TABLE `tbl_tax_group`
MODIFY `tax_group_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_affiliate`
--
ALTER TABLE `tbl_affiliate`
ADD CONSTRAINT `FK_tbl_affiliate_environment` FOREIGN KEY (`environment_id`) REFERENCES `tbl_environment` (`environment_id`);

--
-- Constraints for table `tbl_affiliate_payment_history`
--
ALTER TABLE `tbl_affiliate_payment_history`
ADD CONSTRAINT `FK_tbl_affiliate_payment_history` FOREIGN KEY (`affiliate_id`) REFERENCES `tbl_affiliate` (`affiliate_id`);

--
-- Constraints for table `tbl_available_stock_info`
--
ALTER TABLE `tbl_available_stock_info`
ADD CONSTRAINT `FK_location_product_id` FOREIGN KEY (`location_product_id`) REFERENCES `tbl_location_product` (`location_product_id`),
ADD CONSTRAINT `FK_product_id` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`),
ADD CONSTRAINT `FK_tbl_available_stock_info` FOREIGN KEY (`location_id`) REFERENCES `tbl_location` (`location_id`);

--
-- Constraints for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
ADD CONSTRAINT `FK_tbl_booking` FOREIGN KEY (`sale_type_id`) REFERENCES `tbl_sale_type` (`sale_type_id`),
ADD CONSTRAINT `FK_tbl_booking_customer` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`),
ADD CONSTRAINT `FK_tbl_booking_location` FOREIGN KEY (`location_id`) REFERENCES `tbl_location` (`location_id`);

--
-- Constraints for table `tbl_booking_communication`
--
ALTER TABLE `tbl_booking_communication`
ADD CONSTRAINT `FK_tbl_booking_communication` FOREIGN KEY (`booking_id`) REFERENCES `tbl_booking` (`booking_id`);

--
-- Constraints for table `tbl_booking_detail`
--
ALTER TABLE `tbl_booking_detail`
ADD CONSTRAINT `FK_tbl_booking_detail` FOREIGN KEY (`booking_id`) REFERENCES `tbl_booking` (`booking_id`),
ADD CONSTRAINT `FK_tbl_booking_detail_location` FOREIGN KEY (`location_product_id`) REFERENCES `tbl_location_product` (`location_product_id`),
ADD CONSTRAINT `FK_tbl_booking_detail_product` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`);

--
-- Constraints for table `tbl_booking_payment`
--
ALTER TABLE `tbl_booking_payment`
ADD CONSTRAINT `FK_tbl_booking_invoice_payment` FOREIGN KEY (`booking_invoice_id`) REFERENCES `tbl_booking_invoice` (`booking_invoice_id`),
ADD CONSTRAINT `FK_tbl_booking_payment` FOREIGN KEY (`booking_id`) REFERENCES `tbl_booking` (`booking_id`);

--
-- Constraints for table `tbl_booking_payment_rules_inst`
--
ALTER TABLE `tbl_booking_payment_rules_inst`
ADD CONSTRAINT `payment_rule` FOREIGN KEY (`payment_rule_id`) REFERENCES `tbl_booking_payment_rules` (`payment_rule_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_booking_questionnaire`
--
ALTER TABLE `tbl_booking_questionnaire`
ADD CONSTRAINT `FK_tbl_booking_questionnaire` FOREIGN KEY (`booking_id`) REFERENCES `tbl_booking` (`booking_id`);

--
-- Constraints for table `tbl_city`
--
ALTER TABLE `tbl_city`
ADD CONSTRAINT `tbl_city_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `tbl_province` (`province_id`),
ADD CONSTRAINT `tbl_country_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `tbl_country` (`country_id`);

--
-- Constraints for table `tbl_communication_history`
--
ALTER TABLE `tbl_communication_history`
ADD CONSTRAINT `FK_tbl_conversation_history_` FOREIGN KEY (`conversation_type_id`) REFERENCES `tbl_communication_type` (`conversation_type_id`);

--
-- Constraints for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
ADD CONSTRAINT `FK_tbl_customer_company` FOREIGN KEY (`company_id`) REFERENCES `tbl_company` (`company_id`),
ADD CONSTRAINT `FK_tbl_customer_environment` FOREIGN KEY (`environment_id`) REFERENCES `tbl_environment` (`environment_id`);

--
-- Constraints for table `tbl_environment_content`
--
ALTER TABLE `tbl_environment_content`
ADD CONSTRAINT `language` FOREIGN KEY (`language_id`) REFERENCES `tbl_language` (`language_id`);

--
-- Constraints for table `tbl_linked_product`
--
ALTER TABLE `tbl_linked_product`
ADD CONSTRAINT `linked_product` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`),
ADD CONSTRAINT `main_product` FOREIGN KEY (`main_product_id`) REFERENCES `tbl_product` (`product_id`);

--
-- Constraints for table `tbl_locale`
--
ALTER TABLE `tbl_locale`
ADD CONSTRAINT `currency` FOREIGN KEY (`currency_id`) REFERENCES `tbl_currency` (`currency_id`);

--
-- Constraints for table `tbl_location`
--
ALTER TABLE `tbl_location`
ADD CONSTRAINT `FK_tbl_location` FOREIGN KEY (`location_type_id`) REFERENCES `tbl_location_type` (`location_type_id`);

--
-- Constraints for table `tbl_location_pdf`
--
ALTER TABLE `tbl_location_pdf`
ADD CONSTRAINT `FK_tbl_location_pdf` FOREIGN KEY (`location_id`) REFERENCES `tbl_location` (`location_id`);

--
-- Constraints for table `tbl_location_product`
--
ALTER TABLE `tbl_location_product`
ADD CONSTRAINT `FK_tbl_location_location_product` FOREIGN KEY (`location_id`) REFERENCES `tbl_location` (`location_id`),
ADD CONSTRAINT `FK_tbl_location_product` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`),
ADD CONSTRAINT `FK_tbl_location_product11` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`);

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
ADD CONSTRAINT `FK_tbl_product1` FOREIGN KEY (`product_category_id`) REFERENCES `tbl_product_category` (`category_id`);

--
-- Constraints for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
ADD CONSTRAINT `purchase_group` FOREIGN KEY (`purchase_group_tax_id`) REFERENCES `tbl_tax` (`tax_id`),
ADD CONSTRAINT `sales_group` FOREIGN KEY (`sales_group_tax_id`) REFERENCES `tbl_tax` (`tax_id`);

--
-- Constraints for table `tbl_province`
--
ALTER TABLE `tbl_province`
ADD CONSTRAINT `tbl_province_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `tbl_country` (`country_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_tax`
--
ALTER TABLE `tbl_tax`
ADD CONSTRAINT `tax_group` FOREIGN KEY (`tax_group_id`) REFERENCES `tbl_tax_group` (`tax_group_id`);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

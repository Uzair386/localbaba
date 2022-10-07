-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2020 at 04:21 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dship`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_name_unique` (`name`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

UPDATE `admins` SET `id` = 1,`name` = 'rootuser',`display_name` = 'Root',`email` = 'info@products.com.ng',`password` = '$2y$10$6LD9eNg6aj2ewitznMDaX.G9o/FbeVaZjoTLfkhKrIuL/qwAcgW0m',`remember_token` = NULL,`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `admins`.`id` = 1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

UPDATE `categories` SET `id` = 1,`parent_id` = 0,`name` = 'General',`slug` = 'general',`description` = 'Default Root Table',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `categories`.`id` = 1;

-- --------------------------------------------------------

--
-- Table structure for table `child__invoices`
--

CREATE TABLE IF NOT EXISTS `child__invoices` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) DEFAULT '1',
  `price_without_tax` decimal(27,2) DEFAULT NULL,
  `price_with_tax` decimal(27,2) DEFAULT NULL,
  `tax_amount` decimal(27,2) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `currency_symbol` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$',
  `tracking_code` text COLLATE utf8mb4_unicode_ci,
  `link` text COLLATE utf8mb4_unicode_ci,
  `amount_gain` decimal(27,2) DEFAULT NULL,
  `supplier_price` decimal(27,2) DEFAULT NULL,
  `initial_amount` decimal(27,2) DEFAULT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` decimal(27,2) DEFAULT NULL,
  `coupon_percentage_off` decimal(3,1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=243 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

UPDATE `countries` SET `id` = 1,`code` = 'US',`name` = 'United States',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 1;
UPDATE `countries` SET `id` = 2,`code` = 'CA',`name` = 'Canada',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 2;
UPDATE `countries` SET `id` = 3,`code` = 'AF',`name` = 'Afghanistan',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 3;
UPDATE `countries` SET `id` = 4,`code` = 'AL',`name` = 'Albania',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 4;
UPDATE `countries` SET `id` = 5,`code` = 'DZ',`name` = 'Algeria',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 5;
UPDATE `countries` SET `id` = 6,`code` = 'AS',`name` = 'American Samoa',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 6;
UPDATE `countries` SET `id` = 7,`code` = 'AD',`name` = 'Andorra',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 7;
UPDATE `countries` SET `id` = 8,`code` = 'AO',`name` = 'Angola',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 8;
UPDATE `countries` SET `id` = 9,`code` = 'AI',`name` = 'Anguilla',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 9;
UPDATE `countries` SET `id` = 10,`code` = 'AQ',`name` = 'Antarctica',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 10;
UPDATE `countries` SET `id` = 11,`code` = 'AG',`name` = 'Antigua and/or Barbuda',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 11;
UPDATE `countries` SET `id` = 12,`code` = 'AR',`name` = 'Argentina',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 12;
UPDATE `countries` SET `id` = 13,`code` = 'AM',`name` = 'Armenia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 13;
UPDATE `countries` SET `id` = 14,`code` = 'AW',`name` = 'Aruba',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 14;
UPDATE `countries` SET `id` = 15,`code` = 'AU',`name` = 'Australia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 15;
UPDATE `countries` SET `id` = 16,`code` = 'AT',`name` = 'Austria',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 16;
UPDATE `countries` SET `id` = 17,`code` = 'AZ',`name` = 'Azerbaijan',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 17;
UPDATE `countries` SET `id` = 18,`code` = 'BS',`name` = 'Bahamas',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 18;
UPDATE `countries` SET `id` = 19,`code` = 'BH',`name` = 'Bahrain',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 19;
UPDATE `countries` SET `id` = 20,`code` = 'BD',`name` = 'Bangladesh',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 20;
UPDATE `countries` SET `id` = 21,`code` = 'BB',`name` = 'Barbados',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 21;
UPDATE `countries` SET `id` = 22,`code` = 'BY',`name` = 'Belarus',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 22;
UPDATE `countries` SET `id` = 23,`code` = 'BE',`name` = 'Belgium',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 23;
UPDATE `countries` SET `id` = 24,`code` = 'BZ',`name` = 'Belize',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 24;
UPDATE `countries` SET `id` = 25,`code` = 'BJ',`name` = 'Benin',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 25;
UPDATE `countries` SET `id` = 26,`code` = 'BM',`name` = 'Bermuda',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 26;
UPDATE `countries` SET `id` = 27,`code` = 'BT',`name` = 'Bhutan',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 27;
UPDATE `countries` SET `id` = 28,`code` = 'BO',`name` = 'Bolivia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 28;
UPDATE `countries` SET `id` = 29,`code` = 'BA',`name` = 'Bosnia and Herzegovina',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 29;
UPDATE `countries` SET `id` = 30,`code` = 'BW',`name` = 'Botswana',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 30;
UPDATE `countries` SET `id` = 31,`code` = 'BV',`name` = 'Bouvet Island',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 31;
UPDATE `countries` SET `id` = 32,`code` = 'BR',`name` = 'Brazil',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 32;
UPDATE `countries` SET `id` = 33,`code` = 'IO',`name` = 'British lndian Ocean Territory',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 33;
UPDATE `countries` SET `id` = 34,`code` = 'BN',`name` = 'Brunei Darussalam',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 34;
UPDATE `countries` SET `id` = 35,`code` = 'BG',`name` = 'Bulgaria',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 35;
UPDATE `countries` SET `id` = 36,`code` = 'BF',`name` = 'Burkina Faso',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 36;
UPDATE `countries` SET `id` = 37,`code` = 'BI',`name` = 'Burundi',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 37;
UPDATE `countries` SET `id` = 38,`code` = 'KH',`name` = 'Cambodia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 38;
UPDATE `countries` SET `id` = 39,`code` = 'CM',`name` = 'Cameroon',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 39;
UPDATE `countries` SET `id` = 40,`code` = 'CV',`name` = 'Cape Verde',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 40;
UPDATE `countries` SET `id` = 41,`code` = 'KY',`name` = 'Cayman Islands',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 41;
UPDATE `countries` SET `id` = 42,`code` = 'CF',`name` = 'Central African Republic',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 42;
UPDATE `countries` SET `id` = 43,`code` = 'TD',`name` = 'Chad',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 43;
UPDATE `countries` SET `id` = 44,`code` = 'CL',`name` = 'Chile',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 44;
UPDATE `countries` SET `id` = 45,`code` = 'CN',`name` = 'China',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 45;
UPDATE `countries` SET `id` = 46,`code` = 'CX',`name` = 'Christmas Island',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 46;
UPDATE `countries` SET `id` = 47,`code` = 'CC',`name` = 'Cocos (Keeling) Islands',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 47;
UPDATE `countries` SET `id` = 48,`code` = 'CO',`name` = 'Colombia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 48;
UPDATE `countries` SET `id` = 49,`code` = 'KM',`name` = 'Comoros',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 49;
UPDATE `countries` SET `id` = 50,`code` = 'CG',`name` = 'Congo',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 50;
UPDATE `countries` SET `id` = 51,`code` = 'CK',`name` = 'Cook Islands',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 51;
UPDATE `countries` SET `id` = 52,`code` = 'CR',`name` = 'Costa Rica',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 52;
UPDATE `countries` SET `id` = 53,`code` = 'HR',`name` = 'Croatia (Hrvatska)',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 53;
UPDATE `countries` SET `id` = 54,`code` = 'CU',`name` = 'Cuba',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 54;
UPDATE `countries` SET `id` = 55,`code` = 'CY',`name` = 'Cyprus',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 55;
UPDATE `countries` SET `id` = 56,`code` = 'CZ',`name` = 'Czech Republic',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 56;
UPDATE `countries` SET `id` = 57,`code` = 'CD',`name` = 'Democratic Republic of Congo',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 57;
UPDATE `countries` SET `id` = 58,`code` = 'DK',`name` = 'Denmark',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 58;
UPDATE `countries` SET `id` = 59,`code` = 'DJ',`name` = 'Djibouti',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 59;
UPDATE `countries` SET `id` = 60,`code` = 'DM',`name` = 'Dominica',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 60;
UPDATE `countries` SET `id` = 61,`code` = 'DO',`name` = 'Dominican Republic',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 61;
UPDATE `countries` SET `id` = 62,`code` = 'TP',`name` = 'East Timor',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 62;
UPDATE `countries` SET `id` = 63,`code` = 'EC',`name` = 'Ecudaor',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 63;
UPDATE `countries` SET `id` = 64,`code` = 'EG',`name` = 'Egypt',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 64;
UPDATE `countries` SET `id` = 65,`code` = 'SV',`name` = 'El Salvador',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 65;
UPDATE `countries` SET `id` = 66,`code` = 'GQ',`name` = 'Equatorial Guinea',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 66;
UPDATE `countries` SET `id` = 67,`code` = 'ER',`name` = 'Eritrea',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 67;
UPDATE `countries` SET `id` = 68,`code` = 'EE',`name` = 'Estonia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 68;
UPDATE `countries` SET `id` = 69,`code` = 'ET',`name` = 'Ethiopia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 69;
UPDATE `countries` SET `id` = 70,`code` = 'FK',`name` = 'Falkland Islands (Malvinas)',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 70;
UPDATE `countries` SET `id` = 71,`code` = 'FO',`name` = 'Faroe Islands',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 71;
UPDATE `countries` SET `id` = 72,`code` = 'FJ',`name` = 'Fiji',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 72;
UPDATE `countries` SET `id` = 73,`code` = 'FI',`name` = 'Finland',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 73;
UPDATE `countries` SET `id` = 74,`code` = 'FR',`name` = 'France',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 74;
UPDATE `countries` SET `id` = 75,`code` = 'FX',`name` = 'France, Metropolitan',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 75;
UPDATE `countries` SET `id` = 76,`code` = 'GF',`name` = 'French Guiana',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 76;
UPDATE `countries` SET `id` = 77,`code` = 'PF',`name` = 'French Polynesia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 77;
UPDATE `countries` SET `id` = 78,`code` = 'TF',`name` = 'French Southern Territories',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 78;
UPDATE `countries` SET `id` = 79,`code` = 'GA',`name` = 'Gabon',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 79;
UPDATE `countries` SET `id` = 80,`code` = 'GM',`name` = 'Gambia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 80;
UPDATE `countries` SET `id` = 81,`code` = 'GE',`name` = 'Georgia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 81;
UPDATE `countries` SET `id` = 82,`code` = 'DE',`name` = 'Germany',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 82;
UPDATE `countries` SET `id` = 83,`code` = 'GH',`name` = 'Ghana',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 83;
UPDATE `countries` SET `id` = 84,`code` = 'GI',`name` = 'Gibraltar',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 84;
UPDATE `countries` SET `id` = 85,`code` = 'GR',`name` = 'Greece',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 85;
UPDATE `countries` SET `id` = 86,`code` = 'GL',`name` = 'Greenland',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 86;
UPDATE `countries` SET `id` = 87,`code` = 'GD',`name` = 'Grenada',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 87;
UPDATE `countries` SET `id` = 88,`code` = 'GP',`name` = 'Guadeloupe',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 88;
UPDATE `countries` SET `id` = 89,`code` = 'GU',`name` = 'Guam',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 89;
UPDATE `countries` SET `id` = 90,`code` = 'GT',`name` = 'Guatemala',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 90;
UPDATE `countries` SET `id` = 91,`code` = 'GN',`name` = 'Guinea',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 91;
UPDATE `countries` SET `id` = 92,`code` = 'GW',`name` = 'Guinea-Bissau',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 92;
UPDATE `countries` SET `id` = 93,`code` = 'GY',`name` = 'Guyana',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 93;
UPDATE `countries` SET `id` = 94,`code` = 'HT',`name` = 'Haiti',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 94;
UPDATE `countries` SET `id` = 95,`code` = 'HM',`name` = 'Heard and Mc Donald Islands',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 95;
UPDATE `countries` SET `id` = 96,`code` = 'HN',`name` = 'Honduras',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 96;
UPDATE `countries` SET `id` = 97,`code` = 'HK',`name` = 'Hong Kong',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 97;
UPDATE `countries` SET `id` = 98,`code` = 'HU',`name` = 'Hungary',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 98;
UPDATE `countries` SET `id` = 99,`code` = 'IS',`name` = 'Iceland',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 99;
UPDATE `countries` SET `id` = 100,`code` = 'IN',`name` = 'India',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 100;
UPDATE `countries` SET `id` = 101,`code` = 'ID',`name` = 'Indonesia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 101;
UPDATE `countries` SET `id` = 102,`code` = 'IR',`name` = 'Iran (Islamic Republic of)',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 102;
UPDATE `countries` SET `id` = 103,`code` = 'IQ',`name` = 'Iraq',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 103;
UPDATE `countries` SET `id` = 104,`code` = 'IE',`name` = 'Ireland',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 104;
UPDATE `countries` SET `id` = 105,`code` = 'IL',`name` = 'Israel',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 105;
UPDATE `countries` SET `id` = 106,`code` = 'IT',`name` = 'Italy',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 106;
UPDATE `countries` SET `id` = 107,`code` = 'CI',`name` = 'Ivory Coast',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 107;
UPDATE `countries` SET `id` = 108,`code` = 'JM',`name` = 'Jamaica',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 108;
UPDATE `countries` SET `id` = 109,`code` = 'JP',`name` = 'Japan',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 109;
UPDATE `countries` SET `id` = 110,`code` = 'JO',`name` = 'Jordan',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 110;
UPDATE `countries` SET `id` = 111,`code` = 'KZ',`name` = 'Kazakhstan',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 111;
UPDATE `countries` SET `id` = 112,`code` = 'KE',`name` = 'Kenya',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 112;
UPDATE `countries` SET `id` = 113,`code` = 'KI',`name` = 'Kiribati',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 113;
UPDATE `countries` SET `id` = 114,`code` = 'KP',`name` = 'Korea, Democratic People\'s Republic of',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 114;
UPDATE `countries` SET `id` = 115,`code` = 'KR',`name` = 'Korea, Republic of',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 115;
UPDATE `countries` SET `id` = 116,`code` = 'KW',`name` = 'Kuwait',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 116;
UPDATE `countries` SET `id` = 117,`code` = 'KG',`name` = 'Kyrgyzstan',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 117;
UPDATE `countries` SET `id` = 118,`code` = 'LA',`name` = 'Lao People\'s Democratic Republic',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 118;
UPDATE `countries` SET `id` = 119,`code` = 'LV',`name` = 'Latvia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 119;
UPDATE `countries` SET `id` = 120,`code` = 'LB',`name` = 'Lebanon',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 120;
UPDATE `countries` SET `id` = 121,`code` = 'LS',`name` = 'Lesotho',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 121;
UPDATE `countries` SET `id` = 122,`code` = 'LR',`name` = 'Liberia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 122;
UPDATE `countries` SET `id` = 123,`code` = 'LY',`name` = 'Libyan Arab Jamahiriya',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 123;
UPDATE `countries` SET `id` = 124,`code` = 'LI',`name` = 'Liechtenstein',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 124;
UPDATE `countries` SET `id` = 125,`code` = 'LT',`name` = 'Lithuania',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 125;
UPDATE `countries` SET `id` = 126,`code` = 'LU',`name` = 'Luxembourg',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 126;
UPDATE `countries` SET `id` = 127,`code` = 'MO',`name` = 'Macau',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 127;
UPDATE `countries` SET `id` = 128,`code` = 'MK',`name` = 'Macedonia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 128;
UPDATE `countries` SET `id` = 129,`code` = 'MG',`name` = 'Madagascar',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 129;
UPDATE `countries` SET `id` = 130,`code` = 'MW',`name` = 'Malawi',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 130;
UPDATE `countries` SET `id` = 131,`code` = 'MY',`name` = 'Malaysia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 131;
UPDATE `countries` SET `id` = 132,`code` = 'MV',`name` = 'Maldives',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 132;
UPDATE `countries` SET `id` = 133,`code` = 'ML',`name` = 'Mali',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 133;
UPDATE `countries` SET `id` = 134,`code` = 'MT',`name` = 'Malta',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 134;
UPDATE `countries` SET `id` = 135,`code` = 'MH',`name` = 'Marshall Islands',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 135;
UPDATE `countries` SET `id` = 136,`code` = 'MQ',`name` = 'Martinique',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 136;
UPDATE `countries` SET `id` = 137,`code` = 'MR',`name` = 'Mauritania',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 137;
UPDATE `countries` SET `id` = 138,`code` = 'MU',`name` = 'Mauritius',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 138;
UPDATE `countries` SET `id` = 139,`code` = 'TY',`name` = 'Mayotte',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 139;
UPDATE `countries` SET `id` = 140,`code` = 'MX',`name` = 'Mexico',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 140;
UPDATE `countries` SET `id` = 141,`code` = 'FM',`name` = 'Micronesia, Federated States of',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 141;
UPDATE `countries` SET `id` = 142,`code` = 'MD',`name` = 'Moldova, Republic of',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 142;
UPDATE `countries` SET `id` = 143,`code` = 'MC',`name` = 'Monaco',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 143;
UPDATE `countries` SET `id` = 144,`code` = 'MN',`name` = 'Mongolia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 144;
UPDATE `countries` SET `id` = 145,`code` = 'MS',`name` = 'Montserrat',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 145;
UPDATE `countries` SET `id` = 146,`code` = 'MA',`name` = 'Morocco',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 146;
UPDATE `countries` SET `id` = 147,`code` = 'MZ',`name` = 'Mozambique',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 147;
UPDATE `countries` SET `id` = 148,`code` = 'MM',`name` = 'Myanmar',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 148;
UPDATE `countries` SET `id` = 149,`code` = 'NA',`name` = 'Namibia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 149;
UPDATE `countries` SET `id` = 150,`code` = 'NR',`name` = 'Nauru',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 150;
UPDATE `countries` SET `id` = 151,`code` = 'NP',`name` = 'Nepal',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 151;
UPDATE `countries` SET `id` = 152,`code` = 'NL',`name` = 'Netherlands',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 152;
UPDATE `countries` SET `id` = 153,`code` = 'AN',`name` = 'Netherlands Antilles',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 153;
UPDATE `countries` SET `id` = 154,`code` = 'NC',`name` = 'New Caledonia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 154;
UPDATE `countries` SET `id` = 155,`code` = 'NZ',`name` = 'New Zealand',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 155;
UPDATE `countries` SET `id` = 156,`code` = 'NI',`name` = 'Nicaragua',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 156;
UPDATE `countries` SET `id` = 157,`code` = 'NE',`name` = 'Niger',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 157;
UPDATE `countries` SET `id` = 158,`code` = 'NG',`name` = 'Nigeria',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 158;
UPDATE `countries` SET `id` = 159,`code` = 'NU',`name` = 'Niue',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 159;
UPDATE `countries` SET `id` = 160,`code` = 'NF',`name` = 'Norfork Island',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 160;
UPDATE `countries` SET `id` = 161,`code` = 'MP',`name` = 'Northern Mariana Islands',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 161;
UPDATE `countries` SET `id` = 162,`code` = 'NO',`name` = 'Norway',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 162;
UPDATE `countries` SET `id` = 163,`code` = 'OM',`name` = 'Oman',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 163;
UPDATE `countries` SET `id` = 164,`code` = 'PK',`name` = 'Pakistan',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 164;
UPDATE `countries` SET `id` = 165,`code` = 'PW',`name` = 'Palau',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 165;
UPDATE `countries` SET `id` = 166,`code` = 'PA',`name` = 'Panama',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 166;
UPDATE `countries` SET `id` = 167,`code` = 'PG',`name` = 'Papua New Guinea',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 167;
UPDATE `countries` SET `id` = 168,`code` = 'PY',`name` = 'Paraguay',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 168;
UPDATE `countries` SET `id` = 169,`code` = 'PE',`name` = 'Peru',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 169;
UPDATE `countries` SET `id` = 170,`code` = 'PH',`name` = 'Philippines',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 170;
UPDATE `countries` SET `id` = 171,`code` = 'PN',`name` = 'Pitcairn',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 171;
UPDATE `countries` SET `id` = 172,`code` = 'PL',`name` = 'Poland',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 172;
UPDATE `countries` SET `id` = 173,`code` = 'PT',`name` = 'Portugal',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 173;
UPDATE `countries` SET `id` = 174,`code` = 'PR',`name` = 'Puerto Rico',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 174;
UPDATE `countries` SET `id` = 175,`code` = 'QA',`name` = 'Qatar',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 175;
UPDATE `countries` SET `id` = 176,`code` = 'SS',`name` = 'Republic of South Sudan',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 176;
UPDATE `countries` SET `id` = 177,`code` = 'RE',`name` = 'Reunion',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 177;
UPDATE `countries` SET `id` = 178,`code` = 'RO',`name` = 'Romania',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 178;
UPDATE `countries` SET `id` = 179,`code` = 'RU',`name` = 'Russian Federation',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 179;
UPDATE `countries` SET `id` = 180,`code` = 'RW',`name` = 'Rwanda',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 180;
UPDATE `countries` SET `id` = 181,`code` = 'KN',`name` = 'Saint Kitts and Nevis',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 181;
UPDATE `countries` SET `id` = 182,`code` = 'LC',`name` = 'Saint Lucia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 182;
UPDATE `countries` SET `id` = 183,`code` = 'VC',`name` = 'Saint Vincent and the Grenadines',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 183;
UPDATE `countries` SET `id` = 184,`code` = 'WS',`name` = 'Samoa',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 184;
UPDATE `countries` SET `id` = 185,`code` = 'SM',`name` = 'San Marino',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 185;
UPDATE `countries` SET `id` = 186,`code` = 'ST',`name` = 'Sao Tome and Principe',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 186;
UPDATE `countries` SET `id` = 187,`code` = 'SA',`name` = 'Saudi Arabia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 187;
UPDATE `countries` SET `id` = 188,`code` = 'SN',`name` = 'Senegal',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 188;
UPDATE `countries` SET `id` = 189,`code` = 'RS',`name` = 'Serbia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 189;
UPDATE `countries` SET `id` = 190,`code` = 'SC',`name` = 'Seychelles',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 190;
UPDATE `countries` SET `id` = 191,`code` = 'SL',`name` = 'Sierra Leone',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 191;
UPDATE `countries` SET `id` = 192,`code` = 'SG',`name` = 'Singapore',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 192;
UPDATE `countries` SET `id` = 193,`code` = 'SK',`name` = 'Slovakia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 193;
UPDATE `countries` SET `id` = 194,`code` = 'SI',`name` = 'Slovenia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 194;
UPDATE `countries` SET `id` = 195,`code` = 'SB',`name` = 'Solomon Islands',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 195;
UPDATE `countries` SET `id` = 196,`code` = 'SO',`name` = 'Somalia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 196;
UPDATE `countries` SET `id` = 197,`code` = 'ZA',`name` = 'South Africa',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 197;
UPDATE `countries` SET `id` = 198,`code` = 'GS',`name` = 'South Georgia South Sandwich Islands',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 198;
UPDATE `countries` SET `id` = 199,`code` = 'ES',`name` = 'Spain',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 199;
UPDATE `countries` SET `id` = 200,`code` = 'LK',`name` = 'Sri Lanka',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 200;
UPDATE `countries` SET `id` = 201,`code` = 'SH',`name` = 'St. Helena',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 201;
UPDATE `countries` SET `id` = 202,`code` = 'PM',`name` = 'St. Pierre and Miquelon',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 202;
UPDATE `countries` SET `id` = 203,`code` = 'SD',`name` = 'Sudan',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 203;
UPDATE `countries` SET `id` = 204,`code` = 'SR',`name` = 'Suriname',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 204;
UPDATE `countries` SET `id` = 205,`code` = 'SJ',`name` = 'Svalbarn and Jan Mayen Islands',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 205;
UPDATE `countries` SET `id` = 206,`code` = 'SZ',`name` = 'Swaziland',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 206;
UPDATE `countries` SET `id` = 207,`code` = 'SE',`name` = 'Sweden',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 207;
UPDATE `countries` SET `id` = 208,`code` = 'CH',`name` = 'Switzerland',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 208;
UPDATE `countries` SET `id` = 209,`code` = 'SY',`name` = 'Syrian Arab Republic',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 209;
UPDATE `countries` SET `id` = 210,`code` = 'TW',`name` = 'Taiwan',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 210;
UPDATE `countries` SET `id` = 211,`code` = 'TJ',`name` = 'Tajikistan',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 211;
UPDATE `countries` SET `id` = 212,`code` = 'TZ',`name` = 'Tanzania, United Republic of',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 212;
UPDATE `countries` SET `id` = 213,`code` = 'TH',`name` = 'Thailand',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 213;
UPDATE `countries` SET `id` = 214,`code` = 'TG',`name` = 'Togo',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 214;
UPDATE `countries` SET `id` = 215,`code` = 'TK',`name` = 'Tokelau',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 215;
UPDATE `countries` SET `id` = 216,`code` = 'TO',`name` = 'Tonga',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 216;
UPDATE `countries` SET `id` = 217,`code` = 'TT',`name` = 'Trinidad and Tobago',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 217;
UPDATE `countries` SET `id` = 218,`code` = 'TN',`name` = 'Tunisia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 218;
UPDATE `countries` SET `id` = 219,`code` = 'TR',`name` = 'Turkey',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 219;
UPDATE `countries` SET `id` = 220,`code` = 'TM',`name` = 'Turkmenistan',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 220;
UPDATE `countries` SET `id` = 221,`code` = 'TC',`name` = 'Turks and Caicos Islands',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 221;
UPDATE `countries` SET `id` = 222,`code` = 'TV',`name` = 'Tuvalu',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 222;
UPDATE `countries` SET `id` = 223,`code` = 'UG',`name` = 'Uganda',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 223;
UPDATE `countries` SET `id` = 224,`code` = 'UA',`name` = 'Ukraine',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 224;
UPDATE `countries` SET `id` = 225,`code` = 'AE',`name` = 'United Arab Emirates',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 225;
UPDATE `countries` SET `id` = 226,`code` = 'GB',`name` = 'United Kingdom',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 226;
UPDATE `countries` SET `id` = 227,`code` = 'UM',`name` = 'United States minor outlying islands',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 227;
UPDATE `countries` SET `id` = 228,`code` = 'UY',`name` = 'Uruguay',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 228;
UPDATE `countries` SET `id` = 229,`code` = 'UZ',`name` = 'Uzbekistan',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 229;
UPDATE `countries` SET `id` = 230,`code` = 'VU',`name` = 'Vanuatu',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 230;
UPDATE `countries` SET `id` = 231,`code` = 'VA',`name` = 'Vatican City State',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 231;
UPDATE `countries` SET `id` = 232,`code` = 'VE',`name` = 'Venezuela',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 232;
UPDATE `countries` SET `id` = 233,`code` = 'VN',`name` = 'Vietnam',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 233;
UPDATE `countries` SET `id` = 234,`code` = 'VG',`name` = 'Virgin Islands (British)',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 234;
UPDATE `countries` SET `id` = 235,`code` = 'VI',`name` = 'Virgin Islands (U.S.)',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 235;
UPDATE `countries` SET `id` = 236,`code` = 'WF',`name` = 'Wallis and Futuna Islands',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 236;
UPDATE `countries` SET `id` = 237,`code` = 'EH',`name` = 'Western Sahara',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 237;
UPDATE `countries` SET `id` = 238,`code` = 'YE',`name` = 'Yemen',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 238;
UPDATE `countries` SET `id` = 239,`code` = 'YU',`name` = 'Yugoslavia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 239;
UPDATE `countries` SET `id` = 240,`code` = 'ZR',`name` = 'Zaire',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 240;
UPDATE `countries` SET `id` = 241,`code` = 'ZM',`name` = 'Zambia',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 241;
UPDATE `countries` SET `id` = 242,`code` = 'ZW',`name` = 'Zimbabwe',`created_at` = NULL,`updated_at` = NULL WHERE `countries`.`id` = 242;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_off` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `percentage_off` decimal(4,2) NOT NULL DEFAULT '1.00',
  `customer_age` int(11) NOT NULL DEFAULT '100000000',
  `usage_total` int(11) NOT NULL DEFAULT '50',
  `usage_per_customer` int(11) NOT NULL DEFAULT '1',
  `min_product` int(11) DEFAULT '1',
  `min_item` int(11) DEFAULT '1',
  `min_amount` decimal(8,2) DEFAULT '1.00',
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `activation_method` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `coupons_code_unique` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crawler_aliexpresses`
--

CREATE TABLE IF NOT EXISTS `crawler_aliexpresses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_block_ini` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '.list-item-180',
  `product_name_element` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'h3 span',
  `product_url_element` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'h3 a.history-item',
  `product_image_element` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'img.picCore',
  `product_price_element` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'span.value',
  `affiliate_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crawler_aliexpresses`
--

UPDATE `crawler_aliexpresses` SET `id` = 1,`product_block_ini` = '.list-item-180',`product_name_element` = 'h3 span',`product_url_element` = 'h3 a.history-item',`product_image_element` = 'img.picCore',`product_price_element` = 'span.value',`affiliate_id` = '',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `crawler_aliexpresses`.`id` = 1;

-- --------------------------------------------------------

--
-- Table structure for table `crawler_ebays`
--

CREATE TABLE IF NOT EXISTS `crawler_ebays` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_block_ini` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'li.s-item',
  `product_name_element` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'h3.s-item__title',
  `product_url_element` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'a.s-item__link',
  `product_image_element` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'img.s-item__image-img',
  `product_price_element` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'span.s-item__price',
  `affiliate_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crawler_ebays`
--

UPDATE `crawler_ebays` SET `id` = 1,`product_block_ini` = 'li.s-item',`product_name_element` = 'h3.s-item__title',`product_url_element` = 'a.s-item__link',`product_image_element` = 'img.s-item__image-img',`product_price_element` = 'span.s-item__price',`affiliate_id` = '',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `crawler_ebays`.`id` = 1;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `html_entity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

UPDATE `currencies` SET `id` = 1,`name` = 'United Arab Emirates Dirham',`code` = 'AED',`symbol` = 'د.إ',`html_entity` = '',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 1;
UPDATE `currencies` SET `id` = 2,`name` = 'Afghan Afghani',`code` = 'AFN',`symbol` = '؋',`html_entity` = '',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 2;
UPDATE `currencies` SET `id` = 3,`name` = 'Albanian Lek',`code` = 'ALL',`symbol` = 'L',`html_entity` = '',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 3;
UPDATE `currencies` SET `id` = 4,`name` = 'Armenian Dram',`code` = 'AMD',`symbol` = 'դր.',`html_entity` = '',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 4;
UPDATE `currencies` SET `id` = 5,`name` = 'Netherlands Antillean Gulden',`code` = 'ANG',`symbol` = 'ƒ',`html_entity` = '&#x0192;',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 5;
UPDATE `currencies` SET `id` = 6,`name` = 'Angolan Kwanza',`code` = 'AOA',`symbol` = 'Kz',`html_entity` = '',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 6;
UPDATE `currencies` SET `id` = 7,`name` = 'Argentine Peso',`code` = 'ARS',`symbol` = '$',`html_entity` = '&#x20B1;',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 7;
UPDATE `currencies` SET `id` = 8,`name` = 'Australian Dollar',`code` = 'AUD',`symbol` = '$',`html_entity` = '$',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 8;
UPDATE `currencies` SET `id` = 9,`name` = 'Aruban Florin',`code` = 'AWG',`symbol` = 'ƒ',`html_entity` = '&#x0192;',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 9;
UPDATE `currencies` SET `id` = 10,`name` = 'Azerbaijani Manat',`code` = 'AZN',`symbol` = 'null',`html_entity` = '',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 10;
UPDATE `currencies` SET `id` = 11,`name` = 'Bosnia and Herzegovina Convertible Mark',`code` = 'BAM',`symbol` = 'КМ',`html_entity` = '',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 11;
UPDATE `currencies` SET `id` = 12,`name` = 'Barbadian Dollar',`code` = 'BBD',`symbol` = '$',`html_entity` = '$',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 12;
UPDATE `currencies` SET `id` = 13,`name` = 'Bangladeshi Taka',`code` = 'BDT',`symbol` = '৳',`html_entity` = '',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 13;
UPDATE `currencies` SET `id` = 14,`name` = 'Bulgarian Lev',`code` = 'BGN',`symbol` = 'лв',`html_entity` = '',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 14;
UPDATE `currencies` SET `id` = 15,`name` = 'Bahraini Dinar',`code` = 'BHD',`symbol` = 'ب.د',`html_entity` = '',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 15;
UPDATE `currencies` SET `id` = 16,`name` = 'Burundian Franc',`code` = 'BIF',`symbol` = 'Fr',`html_entity` = '',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 16;
UPDATE `currencies` SET `id` = 17,`name` = 'Bermudian Dollar',`code` = 'BMD',`symbol` = '$',`html_entity` = '$',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 17;
UPDATE `currencies` SET `id` = 18,`name` = 'Brunei Dollar',`code` = 'BND',`symbol` = '$',`html_entity` = '$',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 18;
UPDATE `currencies` SET `id` = 19,`name` = 'Bolivian Boliviano',`code` = 'BOB',`symbol` = 'Bs.',`html_entity` = '',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 19;
UPDATE `currencies` SET `id` = 20,`name` = 'Brazilian Real',`code` = 'BRL',`symbol` = 'R$',`html_entity` = 'R$',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 20;
UPDATE `currencies` SET `id` = 21,`name` = 'Bahamian Dollar',`code` = 'BSD',`symbol` = '$',`html_entity` = '$',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 21;
UPDATE `currencies` SET `id` = 22,`name` = 'Bhutanese Ngultrum',`code` = 'BTN',`symbol` = 'Nu.',`html_entity` = '',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 22;
UPDATE `currencies` SET `id` = 23,`name` = 'Botswana Pula',`code` = 'BWP',`symbol` = 'P',`html_entity` = '',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 23;
UPDATE `currencies` SET `id` = 24,`name` = 'Belarusian Ruble',`code` = 'BYR',`symbol` = 'Br',`html_entity` = '',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 24;
UPDATE `currencies` SET `id` = 25,`name` = 'Belize Dollar',`code` = 'BZD',`symbol` = '$',`html_entity` = '$',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 25;
UPDATE `currencies` SET `id` = 26,`name` = 'Canadian Dollar',`code` = 'CAD',`symbol` = '$',`html_entity` = '$',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 26;
UPDATE `currencies` SET `id` = 27,`name` = 'Congolese Franc',`code` = 'CDF',`symbol` = 'Fr',`html_entity` = '',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 27;
UPDATE `currencies` SET `id` = 28,`name` = 'Swiss Franc',`code` = 'CHF',`symbol` = 'Fr',`html_entity` = '',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 28;
UPDATE `currencies` SET `id` = 29,`name` = 'Unidad de Fomento',`code` = 'CLF',`symbol` = 'UF',`html_entity` = '&#x20B1;',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 29;
UPDATE `currencies` SET `id` = 30,`name` = 'Chilean Peso',`code` = 'CLP',`symbol` = '$',`html_entity` = '&#36;',`created_at` = '2020-10-18 15:17:04',`updated_at` = '2020-10-18 15:17:04' WHERE `currencies`.`id` = 30;
UPDATE `currencies` SET `id` = 31,`name` = 'Chinese Renminbi Yuan',`code` = 'CNY',`symbol` = '¥',`html_entity` = '&#20803;',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 31;
UPDATE `currencies` SET `id` = 32,`name` = 'Colombian Peso',`code` = 'COP',`symbol` = '$',`html_entity` = '&#x20B1;',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 32;
UPDATE `currencies` SET `id` = 33,`name` = 'Costa Rican Colón',`code` = 'CRC',`symbol` = '₡',`html_entity` = '&#x20A1;',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 33;
UPDATE `currencies` SET `id` = 34,`name` = 'Cuban Convertible Peso',`code` = 'CUC',`symbol` = '$',`html_entity` = '',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 34;
UPDATE `currencies` SET `id` = 35,`name` = 'Cuban Peso',`code` = 'CUP',`symbol` = '$',`html_entity` = '&#x20B1;',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 35;
UPDATE `currencies` SET `id` = 36,`name` = 'Cape Verdean Escudo',`code` = 'CVE',`symbol` = '$',`html_entity` = '',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 36;
UPDATE `currencies` SET `id` = 37,`name` = 'Czech Koruna',`code` = 'CZK',`symbol` = 'Kč',`html_entity` = '',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 37;
UPDATE `currencies` SET `id` = 38,`name` = 'Djiboutian Franc',`code` = 'DJF',`symbol` = 'Fdj',`html_entity` = '',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 38;
UPDATE `currencies` SET `id` = 39,`name` = 'Danish Krone',`code` = 'DKK',`symbol` = 'kr',`html_entity` = '',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 39;
UPDATE `currencies` SET `id` = 40,`name` = 'Dominican Peso',`code` = 'DOP',`symbol` = '$',`html_entity` = '&#x20B1;',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 40;
UPDATE `currencies` SET `id` = 41,`name` = 'Algerian Dinar',`code` = 'DZD',`symbol` = 'د.ج',`html_entity` = '',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 41;
UPDATE `currencies` SET `id` = 42,`name` = 'Egyptian Pound',`code` = 'EGP',`symbol` = 'ج.م',`html_entity` = '&#x00A3;',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 42;
UPDATE `currencies` SET `id` = 43,`name` = 'Eritrean Nakfa',`code` = 'ERN',`symbol` = 'Nfk',`html_entity` = '',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 43;
UPDATE `currencies` SET `id` = 44,`name` = 'Ethiopian Birr',`code` = 'ETB',`symbol` = 'Br',`html_entity` = '',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 44;
UPDATE `currencies` SET `id` = 45,`name` = 'Euro',`code` = 'EUR',`symbol` = '€',`html_entity` = '&#x20AC;',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 45;
UPDATE `currencies` SET `id` = 46,`name` = 'Fijian Dollar',`code` = 'FJD',`symbol` = '$',`html_entity` = '$',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 46;
UPDATE `currencies` SET `id` = 47,`name` = 'Falkland Pound',`code` = 'FKP',`symbol` = '£',`html_entity` = '&#x00A3;',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 47;
UPDATE `currencies` SET `id` = 48,`name` = 'British Pound',`code` = 'GBP',`symbol` = '£',`html_entity` = '&#x00A3;',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 48;
UPDATE `currencies` SET `id` = 49,`name` = 'Georgian Lari',`code` = 'GEL',`symbol` = 'ლ',`html_entity` = '',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 49;
UPDATE `currencies` SET `id` = 50,`name` = 'Ghanaian Cedi',`code` = 'GHS',`symbol` = '₵',`html_entity` = '&#x20B5;',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 50;
UPDATE `currencies` SET `id` = 51,`name` = 'Gibraltar Pound',`code` = 'GIP',`symbol` = '£',`html_entity` = '&#x00A3;',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 51;
UPDATE `currencies` SET `id` = 52,`name` = 'Gambian Dalasi',`code` = 'GMD',`symbol` = 'D',`html_entity` = '',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 52;
UPDATE `currencies` SET `id` = 53,`name` = 'Guinean Franc',`code` = 'GNF',`symbol` = 'Fr',`html_entity` = '',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 53;
UPDATE `currencies` SET `id` = 54,`name` = 'Guatemalan Quetzal',`code` = 'GTQ',`symbol` = 'Q',`html_entity` = '',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 54;
UPDATE `currencies` SET `id` = 55,`name` = 'Guyanese Dollar',`code` = 'GYD',`symbol` = '$',`html_entity` = '$',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 55;
UPDATE `currencies` SET `id` = 56,`name` = 'Hong Kong Dollar',`code` = 'HKD',`symbol` = '$',`html_entity` = '$',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 56;
UPDATE `currencies` SET `id` = 57,`name` = 'Honduran Lempira',`code` = 'HNL',`symbol` = 'L',`html_entity` = '',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 57;
UPDATE `currencies` SET `id` = 58,`name` = 'Croatian Kuna',`code` = 'HRK',`symbol` = 'kn',`html_entity` = '',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 58;
UPDATE `currencies` SET `id` = 59,`name` = 'Haitian Gourde',`code` = 'HTG',`symbol` = 'G',`html_entity` = '',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 59;
UPDATE `currencies` SET `id` = 60,`name` = 'Hungarian Forint',`code` = 'HUF',`symbol` = 'Ft',`html_entity` = '',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 60;
UPDATE `currencies` SET `id` = 61,`name` = 'Indonesian Rupiah',`code` = 'IDR',`symbol` = 'Rp',`html_entity` = '',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 61;
UPDATE `currencies` SET `id` = 62,`name` = 'Israeli New Sheqel',`code` = 'ILS',`symbol` = '₪',`html_entity` = '&#x20AA;',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 62;
UPDATE `currencies` SET `id` = 63,`name` = 'Indian Rupee',`code` = 'INR',`symbol` = '₹',`html_entity` = '&#x20b9;',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 63;
UPDATE `currencies` SET `id` = 64,`name` = 'Iraqi Dinar',`code` = 'IQD',`symbol` = 'ع.د',`html_entity` = '',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 64;
UPDATE `currencies` SET `id` = 65,`name` = 'Iranian Rial',`code` = 'IRR',`symbol` = '﷼',`html_entity` = '&#xFDFC;',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 65;
UPDATE `currencies` SET `id` = 66,`name` = 'Icelandic Króna',`code` = 'ISK',`symbol` = 'kr',`html_entity` = '',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 66;
UPDATE `currencies` SET `id` = 67,`name` = 'Jamaican Dollar',`code` = 'JMD',`symbol` = '$',`html_entity` = '$',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 67;
UPDATE `currencies` SET `id` = 68,`name` = 'Jordanian Dinar',`code` = 'JOD',`symbol` = 'د.ا',`html_entity` = '',`created_at` = '2020-10-18 15:17:05',`updated_at` = '2020-10-18 15:17:05' WHERE `currencies`.`id` = 68;
UPDATE `currencies` SET `id` = 69,`name` = 'Japanese Yen',`code` = 'JPY',`symbol` = '¥',`html_entity` = '&#x00A5;',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 69;
UPDATE `currencies` SET `id` = 70,`name` = 'Kenyan Shilling',`code` = 'KES',`symbol` = 'KSh',`html_entity` = '',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 70;
UPDATE `currencies` SET `id` = 71,`name` = 'Kyrgyzstani Som',`code` = 'KGS',`symbol` = 'som',`html_entity` = '',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 71;
UPDATE `currencies` SET `id` = 72,`name` = 'Cambodian Riel',`code` = 'KHR',`symbol` = '៛',`html_entity` = '&#x17DB;',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 72;
UPDATE `currencies` SET `id` = 73,`name` = 'Comorian Franc',`code` = 'KMF',`symbol` = 'Fr',`html_entity` = '',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 73;
UPDATE `currencies` SET `id` = 74,`name` = 'North Korean Won',`code` = 'KPW',`symbol` = '₩',`html_entity` = '&#x20A9;',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 74;
UPDATE `currencies` SET `id` = 75,`name` = 'South Korean Won',`code` = 'KRW',`symbol` = '₩',`html_entity` = '&#x20A9;',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 75;
UPDATE `currencies` SET `id` = 76,`name` = 'Kuwaiti Dinar',`code` = 'KWD',`symbol` = 'د.ك',`html_entity` = '',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 76;
UPDATE `currencies` SET `id` = 77,`name` = 'Cayman Islands Dollar',`code` = 'KYD',`symbol` = '$',`html_entity` = '$',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 77;
UPDATE `currencies` SET `id` = 78,`name` = 'Kazakhstani Tenge',`code` = 'KZT',`symbol` = '〒',`html_entity` = '',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 78;
UPDATE `currencies` SET `id` = 79,`name` = 'Lao Kip',`code` = 'LAK',`symbol` = '₭',`html_entity` = '&#x20AD;',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 79;
UPDATE `currencies` SET `id` = 80,`name` = 'Lebanese Pound',`code` = 'LBP',`symbol` = 'ل.ل',`html_entity` = '&#x00A3;',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 80;
UPDATE `currencies` SET `id` = 81,`name` = 'Sri Lankan Rupee',`code` = 'LKR',`symbol` = '₨',`html_entity` = '&#x0BF9;',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 81;
UPDATE `currencies` SET `id` = 82,`name` = 'Liberian Dollar',`code` = 'LRD',`symbol` = '$',`html_entity` = '$',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 82;
UPDATE `currencies` SET `id` = 83,`name` = 'Lesotho Loti',`code` = 'LSL',`symbol` = 'L',`html_entity` = '',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 83;
UPDATE `currencies` SET `id` = 84,`name` = 'Lithuanian Litas',`code` = 'LTL',`symbol` = 'Lt',`html_entity` = '',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 84;
UPDATE `currencies` SET `id` = 85,`name` = 'Latvian Lats',`code` = 'LVL',`symbol` = 'Ls',`html_entity` = '',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 85;
UPDATE `currencies` SET `id` = 86,`name` = 'Libyan Dinar',`code` = 'LYD',`symbol` = 'ل.د',`html_entity` = '',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 86;
UPDATE `currencies` SET `id` = 87,`name` = 'Moroccan Dirham',`code` = 'MAD',`symbol` = 'د.م.',`html_entity` = '',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 87;
UPDATE `currencies` SET `id` = 88,`name` = 'Moldovan Leu',`code` = 'MDL',`symbol` = 'L',`html_entity` = '',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 88;
UPDATE `currencies` SET `id` = 89,`name` = 'Malagasy Ariary',`code` = 'MGA',`symbol` = 'Ar',`html_entity` = '',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 89;
UPDATE `currencies` SET `id` = 90,`name` = 'Macedonian Denar',`code` = 'MKD',`symbol` = 'ден',`html_entity` = '',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 90;
UPDATE `currencies` SET `id` = 91,`name` = 'Myanmar Kyat',`code` = 'MMK',`symbol` = 'K',`html_entity` = '',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 91;
UPDATE `currencies` SET `id` = 92,`name` = 'Mongolian Tögrög',`code` = 'MNT',`symbol` = '₮',`html_entity` = '&#x20AE;',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 92;
UPDATE `currencies` SET `id` = 93,`name` = 'Macanese Pataca',`code` = 'MOP',`symbol` = 'P',`html_entity` = '',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 93;
UPDATE `currencies` SET `id` = 94,`name` = 'Mauritanian Ouguiya',`code` = 'MRO',`symbol` = 'UM',`html_entity` = '',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 94;
UPDATE `currencies` SET `id` = 95,`name` = 'Mauritian Rupee',`code` = 'MUR',`symbol` = '₨',`html_entity` = '&#x20A8;',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 95;
UPDATE `currencies` SET `id` = 96,`name` = 'Maldivian Rufiyaa',`code` = 'MVR',`symbol` = 'MVR',`html_entity` = '',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 96;
UPDATE `currencies` SET `id` = 97,`name` = 'Malawian Kwacha',`code` = 'MWK',`symbol` = 'MK',`html_entity` = '',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 97;
UPDATE `currencies` SET `id` = 98,`name` = 'Mexican Peso',`code` = 'MXN',`symbol` = '$',`html_entity` = '$',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 98;
UPDATE `currencies` SET `id` = 99,`name` = 'Malaysian Ringgit',`code` = 'MYR',`symbol` = 'RM',`html_entity` = '',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 99;
UPDATE `currencies` SET `id` = 100,`name` = 'Mozambican Metical',`code` = 'MZN',`symbol` = 'MTn',`html_entity` = '',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 100;
UPDATE `currencies` SET `id` = 101,`name` = 'Namibian Dollar',`code` = 'NAD',`symbol` = '$',`html_entity` = '$',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 101;
UPDATE `currencies` SET `id` = 102,`name` = 'Nigerian Naira',`code` = 'NGN',`symbol` = '₦',`html_entity` = '&#x20A6;',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 102;
UPDATE `currencies` SET `id` = 103,`name` = 'Nicaraguan Córdoba',`code` = 'NIO',`symbol` = 'C$',`html_entity` = '',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 103;
UPDATE `currencies` SET `id` = 104,`name` = 'Norwegian Krone',`code` = 'NOK',`symbol` = 'kr',`html_entity` = 'kr',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 104;
UPDATE `currencies` SET `id` = 105,`name` = 'Nepalese Rupee',`code` = 'NPR',`symbol` = '₨',`html_entity` = '&#x20A8;',`created_at` = '2020-10-18 15:17:06',`updated_at` = '2020-10-18 15:17:06' WHERE `currencies`.`id` = 105;
UPDATE `currencies` SET `id` = 106,`name` = 'New Zealand Dollar',`code` = 'NZD',`symbol` = '$',`html_entity` = '$',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 106;
UPDATE `currencies` SET `id` = 107,`name` = 'Omani Rial',`code` = 'OMR',`symbol` = 'ر.ع.',`html_entity` = '&#xFDFC;',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 107;
UPDATE `currencies` SET `id` = 108,`name` = 'Panamanian Balboa',`code` = 'PAB',`symbol` = 'B/.',`html_entity` = '',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 108;
UPDATE `currencies` SET `id` = 109,`name` = 'Peruvian Nuevo Sol',`code` = 'PEN',`symbol` = 'S/.',`html_entity` = 'S/.',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 109;
UPDATE `currencies` SET `id` = 110,`name` = 'Papua New Guinean Kina',`code` = 'PGK',`symbol` = 'K',`html_entity` = '',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 110;
UPDATE `currencies` SET `id` = 111,`name` = 'Philippine Peso',`code` = 'PHP',`symbol` = '₱',`html_entity` = '&#x20B1;',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 111;
UPDATE `currencies` SET `id` = 112,`name` = 'Pakistani Rupee',`code` = 'PKR',`symbol` = '₨',`html_entity` = '&#x20A8;',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 112;
UPDATE `currencies` SET `id` = 113,`name` = 'Polish Złoty',`code` = 'PLN',`symbol` = 'zł',`html_entity` = 'z&#322;',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 113;
UPDATE `currencies` SET `id` = 114,`name` = 'Paraguayan Guaraní',`code` = 'PYG',`symbol` = '₲',`html_entity` = '&#x20B2;',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 114;
UPDATE `currencies` SET `id` = 115,`name` = 'Qatari Riyal',`code` = 'QAR',`symbol` = 'ر.ق',`html_entity` = '&#xFDFC;',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 115;
UPDATE `currencies` SET `id` = 116,`name` = 'Romanian Leu',`code` = 'RON',`symbol` = 'Lei',`html_entity` = '',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 116;
UPDATE `currencies` SET `id` = 117,`name` = 'Serbian Dinar',`code` = 'RSD',`symbol` = 'РСД',`html_entity` = '',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 117;
UPDATE `currencies` SET `id` = 118,`name` = 'Russian Ruble',`code` = 'RUB',`symbol` = 'р.',`html_entity` = '&#x0440;&#x0443;&#x0431;',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 118;
UPDATE `currencies` SET `id` = 119,`name` = 'Rwandan Franc',`code` = 'RWF',`symbol` = 'FRw',`html_entity` = '',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 119;
UPDATE `currencies` SET `id` = 120,`name` = 'Saudi Riyal',`code` = 'SAR',`symbol` = 'ر.س',`html_entity` = '&#xFDFC;',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 120;
UPDATE `currencies` SET `id` = 121,`name` = 'Solomon Islands Dollar',`code` = 'SBD',`symbol` = '$',`html_entity` = '$',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 121;
UPDATE `currencies` SET `id` = 122,`name` = 'Seychellois Rupee',`code` = 'SCR',`symbol` = '₨',`html_entity` = '&#x20A8;',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 122;
UPDATE `currencies` SET `id` = 123,`name` = 'Sudanese Pound',`code` = 'SDG',`symbol` = '£',`html_entity` = '',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 123;
UPDATE `currencies` SET `id` = 124,`name` = 'Swedish Krona',`code` = 'SEK',`symbol` = 'kr',`html_entity` = '',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 124;
UPDATE `currencies` SET `id` = 125,`name` = 'Singapore Dollar',`code` = 'SGD',`symbol` = '$',`html_entity` = '$',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 125;
UPDATE `currencies` SET `id` = 126,`name` = 'Saint Helenian Pound',`code` = 'SHP',`symbol` = '£',`html_entity` = '&#x00A3;',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 126;
UPDATE `currencies` SET `id` = 127,`name` = 'Slovak Koruna',`code` = 'SKK',`symbol` = 'Sk',`html_entity` = '',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 127;
UPDATE `currencies` SET `id` = 128,`name` = 'Sierra Leonean Leone',`code` = 'SLL',`symbol` = 'Le',`html_entity` = '',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 128;
UPDATE `currencies` SET `id` = 129,`name` = 'Somali Shilling',`code` = 'SOS',`symbol` = 'Sh',`html_entity` = '',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 129;
UPDATE `currencies` SET `id` = 130,`name` = 'Surinamese Dollar',`code` = 'SRD',`symbol` = '$',`html_entity` = '',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 130;
UPDATE `currencies` SET `id` = 131,`name` = 'South Sudanese Pound',`code` = 'SSP',`symbol` = '£',`html_entity` = '&#x00A3;',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 131;
UPDATE `currencies` SET `id` = 132,`name` = 'São Tomé and Príncipe Dobra',`code` = 'STD',`symbol` = 'Db',`html_entity` = '',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 132;
UPDATE `currencies` SET `id` = 133,`name` = 'Salvadoran Colón',`code` = 'SVC',`symbol` = '₡',`html_entity` = '&#x20A1;',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 133;
UPDATE `currencies` SET `id` = 134,`name` = 'Syrian Pound',`code` = 'SYP',`symbol` = '£S',`html_entity` = '&#x00A3;',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 134;
UPDATE `currencies` SET `id` = 135,`name` = 'Swazi Lilangeni',`code` = 'SZL',`symbol` = 'L',`html_entity` = '',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 135;
UPDATE `currencies` SET `id` = 136,`name` = 'Thai Baht',`code` = 'THB',`symbol` = '฿',`html_entity` = '&#x0E3F;',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 136;
UPDATE `currencies` SET `id` = 137,`name` = 'Tajikistani Somoni',`code` = 'TJS',`symbol` = 'ЅМ',`html_entity` = '',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 137;
UPDATE `currencies` SET `id` = 138,`name` = 'Turkmenistani Manat',`code` = 'TMT',`symbol` = 'T',`html_entity` = '',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 138;
UPDATE `currencies` SET `id` = 139,`name` = 'Tunisian Dinar',`code` = 'TND',`symbol` = 'د.ت',`html_entity` = '',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 139;
UPDATE `currencies` SET `id` = 140,`name` = 'Tongan Paʻanga',`code` = 'TOP',`symbol` = 'T$',`html_entity` = '',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 140;
UPDATE `currencies` SET `id` = 141,`name` = 'Turkish Lira',`code` = 'TRY',`symbol` = 'TL',`html_entity` = '',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 141;
UPDATE `currencies` SET `id` = 142,`name` = 'Trinidad and Tobago Dollar',`code` = 'TTD',`symbol` = '$',`html_entity` = '$',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 142;
UPDATE `currencies` SET `id` = 143,`name` = 'New Taiwan Dollar',`code` = 'TWD',`symbol` = '$',`html_entity` = '$',`created_at` = '2020-10-18 15:17:07',`updated_at` = '2020-10-18 15:17:07' WHERE `currencies`.`id` = 143;
UPDATE `currencies` SET `id` = 144,`name` = 'Tanzanian Shilling',`code` = 'TZS',`symbol` = 'Sh',`html_entity` = '',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `currencies`.`id` = 144;
UPDATE `currencies` SET `id` = 145,`name` = 'Ukrainian Hryvnia',`code` = 'UAH',`symbol` = '₴',`html_entity` = '&#x20B4;',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `currencies`.`id` = 145;
UPDATE `currencies` SET `id` = 146,`name` = 'Ugandan Shilling',`code` = 'UGX',`symbol` = 'USh',`html_entity` = '',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `currencies`.`id` = 146;
UPDATE `currencies` SET `id` = 147,`name` = 'United States Dollar',`code` = 'USD',`symbol` = '$',`html_entity` = '$',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `currencies`.`id` = 147;
UPDATE `currencies` SET `id` = 148,`name` = 'Uruguayan Peso',`code` = 'UYU',`symbol` = '$',`html_entity` = '&#x20B1;',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `currencies`.`id` = 148;
UPDATE `currencies` SET `id` = 149,`name` = 'Uzbekistani Som',`code` = 'UZS',`symbol` = 'null',`html_entity` = '',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `currencies`.`id` = 149;
UPDATE `currencies` SET `id` = 150,`name` = 'Venezuelan Bolívar',`code` = 'VEF',`symbol` = 'Bs F',`html_entity` = '',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `currencies`.`id` = 150;
UPDATE `currencies` SET `id` = 151,`name` = 'Vietnamese Đồng',`code` = 'VND',`symbol` = '₫',`html_entity` = '&#x20AB;',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `currencies`.`id` = 151;
UPDATE `currencies` SET `id` = 152,`name` = 'Vanuatu Vatu',`code` = 'VUV',`symbol` = 'Vt',`html_entity` = '',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `currencies`.`id` = 152;
UPDATE `currencies` SET `id` = 153,`name` = 'Samoan Tala',`code` = 'WST',`symbol` = 'T',`html_entity` = '',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `currencies`.`id` = 153;
UPDATE `currencies` SET `id` = 154,`name` = 'Central African Cfa Franc',`code` = 'XAF',`symbol` = 'Fr',`html_entity` = '',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `currencies`.`id` = 154;
UPDATE `currencies` SET `id` = 155,`name` = 'Silver (Troy Ounce)',`code` = 'XAG',`symbol` = 'oz t',`html_entity` = '',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `currencies`.`id` = 155;
UPDATE `currencies` SET `id` = 156,`name` = 'Gold (Troy Ounce)',`code` = 'XAU',`symbol` = 'oz t',`html_entity` = '',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `currencies`.`id` = 156;
UPDATE `currencies` SET `id` = 157,`name` = 'East Caribbean Dollar',`code` = 'XCD',`symbol` = '$',`html_entity` = '$',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `currencies`.`id` = 157;
UPDATE `currencies` SET `id` = 158,`name` = 'Special Drawing Rights',`code` = 'XDR',`symbol` = 'SDR',`html_entity` = '$',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `currencies`.`id` = 158;
UPDATE `currencies` SET `id` = 159,`name` = 'West African Cfa Franc',`code` = 'XOF',`symbol` = 'Fr',`html_entity` = '',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `currencies`.`id` = 159;
UPDATE `currencies` SET `id` = 160,`name` = 'Cfp Franc',`code` = 'XPF',`symbol` = 'Fr',`html_entity` = '',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `currencies`.`id` = 160;
UPDATE `currencies` SET `id` = 161,`name` = 'Yemeni Rial',`code` = 'YER',`symbol` = '﷼',`html_entity` = '&#xFDFC;',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `currencies`.`id` = 161;
UPDATE `currencies` SET `id` = 162,`name` = 'South African Rand',`code` = 'ZAR',`symbol` = 'R',`html_entity` = '&#x0052;',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `currencies`.`id` = 162;
UPDATE `currencies` SET `id` = 163,`name` = 'Zambian Kwacha',`code` = 'ZMK',`symbol` = 'ZK',`html_entity` = '',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `currencies`.`id` = 163;
UPDATE `currencies` SET `id` = 164,`name` = 'Zambian Kwacha',`code` = 'ZMW',`symbol` = 'ZK',`html_entity` = '',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `currencies`.`id` = 164;

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE IF NOT EXISTS `gateways` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `paypal_active` tinyint(1) DEFAULT '1',
  `paypal_client_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_client_secret` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_active` tinyint(1) DEFAULT '1',
  `stripe_publishable_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_secret_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voguepay_active` tinyint(1) DEFAULT '1',
  `voguepay_merchant_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

UPDATE `gateways` SET `id` = 1,`paypal_active` = 1,`paypal_client_id` = 'ARp5caOdXyUzjhYBooYaikaJ2jVuJOLkb-YrDTplRQkBXPdNTyNvMbVGB4FWOJ6Jbt',`paypal_client_secret` = 'EBH1dDmmChz00Cvcwb9VeLpygxV6vX_deW2O7zla7xhj0nhTsThWYd9Zo-AiMtkrs',`stripe_active` = 1,`stripe_publishable_key` = 'pk_test_qKe8nGFSUZkLRt0ETMieMh80',`stripe_secret_key` = 'sk_test_ySExMEvYiX71wvqDmLAMu1UC',`voguepay_active` = 1,`voguepay_merchant_id` = 'demo',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `gateways`.`id` = 1;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_read` int(11) DEFAULT '0',
  `admin_read` int(11) DEFAULT '0',
  `invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Nil',
  `status` int(11) NOT NULL DEFAULT '0',
  `tax` int(11) NOT NULL DEFAULT '0',
  `currency_symbol` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$',
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `address` text COLLATE utf8mb4_unicode_ci,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'state',
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'city',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'phone',
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `total_products` int(11) DEFAULT '1',
  `total_items` int(11) DEFAULT '1',
  `total_amount_without_tax` decimal(9,2) DEFAULT NULL,
  `tax_amount` decimal(27,2) DEFAULT NULL,
  `total_amount_with_tax` decimal(27,2) DEFAULT NULL,
  `tracking_code` text COLLATE utf8mb4_unicode_ci,
  `amount_gain` decimal(27,2) DEFAULT NULL,
  `supplier_amount` decimal(27,2) DEFAULT NULL,
  `initial_amount` decimal(27,2) DEFAULT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` decimal(27,2) DEFAULT NULL,
  `coupon_percentage_off` decimal(4,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invoices_invoice_number_unique` (`invoice_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

UPDATE `migrations` SET `id` = 74,`migration` = '2014_10_12_000000_create_users_table',`batch` = 1 WHERE `migrations`.`id` = 74;
UPDATE `migrations` SET `id` = 75,`migration` = '2014_10_12_100000_create_password_resets_table',`batch` = 1 WHERE `migrations`.`id` = 75;
UPDATE `migrations` SET `id` = 76,`migration` = '2018_06_21_161840_create_admins_table',`batch` = 1 WHERE `migrations`.`id` = 76;
UPDATE `migrations` SET `id` = 77,`migration` = '2018_06_21_161920_create_products_table',`batch` = 1 WHERE `migrations`.`id` = 77;
UPDATE `migrations` SET `id` = 78,`migration` = '2018_06_24_140720_create_categories_table',`batch` = 1 WHERE `migrations`.`id` = 78;
UPDATE `migrations` SET `id` = 79,`migration` = '2018_07_01_212126_create_invoices_table',`batch` = 1 WHERE `migrations`.`id` = 79;
UPDATE `migrations` SET `id` = 80,`migration` = '2018_07_05_151057_create_settings_table',`batch` = 1 WHERE `migrations`.`id` = 80;
UPDATE `migrations` SET `id` = 81,`migration` = '2018_07_07_024421_create_posts_table',`batch` = 1 WHERE `migrations`.`id` = 81;
UPDATE `migrations` SET `id` = 82,`migration` = '2018_07_07_032231_create_pages_table',`batch` = 1 WHERE `migrations`.`id` = 82;
UPDATE `migrations` SET `id` = 83,`migration` = '2018_07_11_155645_create_currencies_table',`batch` = 1 WHERE `migrations`.`id` = 83;
UPDATE `migrations` SET `id` = 84,`migration` = '2018_07_18_220051_create_gateways_table',`batch` = 1 WHERE `migrations`.`id` = 84;
UPDATE `migrations` SET `id` = 85,`migration` = '2018_07_29_163304_create_sliders_table',`batch` = 1 WHERE `migrations`.`id` = 85;
UPDATE `migrations` SET `id` = 86,`migration` = '2018_08_04_211858_create_crawler_ebays_table',`batch` = 1 WHERE `migrations`.`id` = 86;
UPDATE `migrations` SET `id` = 87,`migration` = '2018_08_31_095216_create_suppliers_table',`batch` = 1 WHERE `migrations`.`id` = 87;
UPDATE `migrations` SET `id` = 88,`migration` = '2018_08_31_141400_create_countries_table',`batch` = 1 WHERE `migrations`.`id` = 88;
UPDATE `migrations` SET `id` = 89,`migration` = '2018_09_06_142845_create_child__invoices_table',`batch` = 1 WHERE `migrations`.`id` = 89;
UPDATE `migrations` SET `id` = 90,`migration` = '2018_09_27_115041_create_crawler_aliexpresses_table',`batch` = 1 WHERE `migrations`.`id` = 90;
UPDATE `migrations` SET `id` = 91,`migration` = '2019_01_06_051545_create_variants_table',`batch` = 1 WHERE `migrations`.`id` = 91;
UPDATE `migrations` SET `id` = 92,`migration` = '2020_07_29_220234_create_coupons_table',`batch` = 1 WHERE `migrations`.`id` = 92;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

UPDATE `pages` SET `id` = 1,`title` = 'About',`slug` = 'about',`content` = 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',`created_at` = '2020-10-18 15:17:03',`updated_at` = '2020-10-18 15:17:03' WHERE `pages`.`id` = 1;
UPDATE `pages` SET `id` = 2,`title` = 'Policy Privacy',`slug` = 'policy-privacy',`content` = 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',`created_at` = '2020-10-18 15:17:03',`updated_at` = '2020-10-18 15:17:03' WHERE `pages`.`id` = 2;
UPDATE `pages` SET `id` = 3,`title` = 'Terms and Conditions',`slug` = 'tos',`content` = 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',`created_at` = '2020-10-18 15:17:03',`updated_at` = '2020-10-18 15:17:03' WHERE `pages`.`id` = 3;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `image_ex1` text COLLATE utf8mb4_unicode_ci,
  `image_ex2` text COLLATE utf8mb4_unicode_ci,
  `image_ex3` text COLLATE utf8mb4_unicode_ci,
  `image_ex4` text COLLATE utf8mb4_unicode_ci,
  `image_ex5` text COLLATE utf8mb4_unicode_ci,
  `original_url` text COLLATE utf8mb4_unicode_ci,
  `supplier_id` mediumint(9) NOT NULL,
  `views_count` bigint(20) NOT NULL DEFAULT '0',
  `cart_count` bigint(20) NOT NULL DEFAULT '0',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `variant_id` int(11) NOT NULL DEFAULT '0',
  `variant_name` text COLLATE utf8mb4_unicode_ci,
  `unique_value` text COLLATE utf8mb4_unicode_ci,
  `category_id` int(11) NOT NULL DEFAULT '1',
  `rating_id` int(11) DEFAULT '4',
  `price` decimal(9,2) DEFAULT NULL,
  `supplier_price` decimal(9,2) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `currency_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '147',
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `site_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `site_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `site_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `site_about` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'keywords,keyword',
  `meta_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Dropship get the best deal',
  `search_element` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'price',
  `search_order` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'desc',
  `disqus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'https://comparison-1.disqus.com/embed.js',
  `social_facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'https://facebook.com',
  `social_twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'https://twitter.com',
  `social_instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'https://instagram.com',
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `csv_import_limit` int(11) DEFAULT '1000',
  `live_production` tinyint(1) DEFAULT '1',
  `default_quantity` int(11) DEFAULT '2',
  `home_rand_pro` int(11) DEFAULT '8',
  `home_posts` int(11) DEFAULT '4',
  `home_users` int(11) DEFAULT '6',
  `compare_percentage` int(11) DEFAULT '50',
  `compared_products` int(11) DEFAULT '10',
  `enable_admin` tinyint(1) DEFAULT '0',
  `tax` int(11) DEFAULT '21',
  `price_percent_gain` int(11) DEFAULT '10',
  `cart_button` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Add to Cart',
  `delivery_terms` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

UPDATE `settings` SET `id` = 1,`currency_id` = '147',`site_name` = 'Qp Dropship',`site_email` = 'info@products.com.ng',`site_number` = '+123456789',`site_address` = 'Lorem ipsum dolor sit amet, anim id est laborum. Sed ut perspconsectetur, adipisci vam aliquam qua',`site_about` = 'Lorem ipsum dolor sit amet, anim id est laborum. Sed ut perspconsectetur, adipisci vam aliquam qua',`keywords` = 'keywords,keyword',`meta_name` = 'Dropship get the best deal',`search_element` = 'price',`search_order` = 'desc',`disqus` = 'https://comparison-1.disqus.com/embed.js',`social_facebook` = 'https://facebook.com',`social_twitter` = 'https://twitter.com',`social_instagram` = 'https://instagram.com',`logo` = 'uploads/logo/logo.png',`csv_import_limit` = 1000,`live_production` = 1,`default_quantity` = 2,`home_rand_pro` = 8,`home_posts` = 4,`home_users` = 6,`compare_percentage` = 50,`compared_products` = 10,`enable_admin` = 0,`tax` = 21,`price_percent_gain` = 10,`cart_button` = 'Add to Cart',`delivery_terms` = '<p><strong>Free Shipping Thresholds</strong>&nbsp;(Excluding International Customers):</p>\n<p>- Over&nbsp;<strong>$250</strong>&nbsp;Free FedEx Ground or&nbsp;USPS Priority<br />- Over&nbsp;<strong>$800</strong>&nbsp;Free FedEx Standard Overnight<br />- Over&nbsp;<strong>$1000</strong>&nbsp;Free FedEx Priority Overnight</p>',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `settings`.`id` = 1;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

UPDATE `sliders` SET `id` = 1,`title` = 'Slider1',`image` = 'uploads/slider/1.jpg',`url` = '',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `sliders`.`id` = 1;
UPDATE `sliders` SET `id` = 2,`title` = 'Slider2',`image` = 'uploads/slider/2.jpg',`url` = '',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `sliders`.`id` = 2;
UPDATE `sliders` SET `id` = 3,`title` = 'Slider3',`image` = 'uploads/slider/3.jpg',`url` = '',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `sliders`.`id` = 3;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `address` text COLLATE utf8mb4_unicode_ci,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `amount_sold` decimal(27,2) NOT NULL DEFAULT '0.00',
  `currency_id` int(11) DEFAULT '147',
  `country_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `validation_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `price_update_block` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `price_update_element` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `stock_update_element` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `description_update_element` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `suppliers_name_unique` (`name`),
  UNIQUE KEY `suppliers_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `country_id` int(11) DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `validation_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_unique` (`name`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE IF NOT EXISTS `variants` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variants`
--

UPDATE `variants` SET `id` = 1,`name` = 'Colour',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `variants`.`id` = 1;
UPDATE `variants` SET `id` = 2,`name` = 'Size',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `variants`.`id` = 2;
UPDATE `variants` SET `id` = 3,`name` = 'Condition',`created_at` = '2020-10-18 15:17:08',`updated_at` = '2020-10-18 15:17:08' WHERE `variants`.`id` = 3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

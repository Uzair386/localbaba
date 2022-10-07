-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2020 at 04:25 PM
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

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `display_name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rootuser', 'Root', 'info@products.com.ng', '$2y$10$6LD9eNg6aj2ewitznMDaX.G9o/FbeVaZjoTLfkhKrIuL/qwAcgW0m', NULL, '2020-10-18 15:17:04', '2020-10-18 15:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, 'General', 'general', 'Default Root Table', '2020-10-18 15:17:04', '2020-10-18 15:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `child__invoices`
--

DROP TABLE IF EXISTS `child__invoices`;
CREATE TABLE `child__invoices` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'US', 'United States', NULL, NULL),
(2, 'CA', 'Canada', NULL, NULL),
(3, 'AF', 'Afghanistan', NULL, NULL),
(4, 'AL', 'Albania', NULL, NULL),
(5, 'DZ', 'Algeria', NULL, NULL),
(6, 'AS', 'American Samoa', NULL, NULL),
(7, 'AD', 'Andorra', NULL, NULL),
(8, 'AO', 'Angola', NULL, NULL),
(9, 'AI', 'Anguilla', NULL, NULL),
(10, 'AQ', 'Antarctica', NULL, NULL),
(11, 'AG', 'Antigua and/or Barbuda', NULL, NULL),
(12, 'AR', 'Argentina', NULL, NULL),
(13, 'AM', 'Armenia', NULL, NULL),
(14, 'AW', 'Aruba', NULL, NULL),
(15, 'AU', 'Australia', NULL, NULL),
(16, 'AT', 'Austria', NULL, NULL),
(17, 'AZ', 'Azerbaijan', NULL, NULL),
(18, 'BS', 'Bahamas', NULL, NULL),
(19, 'BH', 'Bahrain', NULL, NULL),
(20, 'BD', 'Bangladesh', NULL, NULL),
(21, 'BB', 'Barbados', NULL, NULL),
(22, 'BY', 'Belarus', NULL, NULL),
(23, 'BE', 'Belgium', NULL, NULL),
(24, 'BZ', 'Belize', NULL, NULL),
(25, 'BJ', 'Benin', NULL, NULL),
(26, 'BM', 'Bermuda', NULL, NULL),
(27, 'BT', 'Bhutan', NULL, NULL),
(28, 'BO', 'Bolivia', NULL, NULL),
(29, 'BA', 'Bosnia and Herzegovina', NULL, NULL),
(30, 'BW', 'Botswana', NULL, NULL),
(31, 'BV', 'Bouvet Island', NULL, NULL),
(32, 'BR', 'Brazil', NULL, NULL),
(33, 'IO', 'British lndian Ocean Territory', NULL, NULL),
(34, 'BN', 'Brunei Darussalam', NULL, NULL),
(35, 'BG', 'Bulgaria', NULL, NULL),
(36, 'BF', 'Burkina Faso', NULL, NULL),
(37, 'BI', 'Burundi', NULL, NULL),
(38, 'KH', 'Cambodia', NULL, NULL),
(39, 'CM', 'Cameroon', NULL, NULL),
(40, 'CV', 'Cape Verde', NULL, NULL),
(41, 'KY', 'Cayman Islands', NULL, NULL),
(42, 'CF', 'Central African Republic', NULL, NULL),
(43, 'TD', 'Chad', NULL, NULL),
(44, 'CL', 'Chile', NULL, NULL),
(45, 'CN', 'China', NULL, NULL),
(46, 'CX', 'Christmas Island', NULL, NULL),
(47, 'CC', 'Cocos (Keeling) Islands', NULL, NULL),
(48, 'CO', 'Colombia', NULL, NULL),
(49, 'KM', 'Comoros', NULL, NULL),
(50, 'CG', 'Congo', NULL, NULL),
(51, 'CK', 'Cook Islands', NULL, NULL),
(52, 'CR', 'Costa Rica', NULL, NULL),
(53, 'HR', 'Croatia (Hrvatska)', NULL, NULL),
(54, 'CU', 'Cuba', NULL, NULL),
(55, 'CY', 'Cyprus', NULL, NULL),
(56, 'CZ', 'Czech Republic', NULL, NULL),
(57, 'CD', 'Democratic Republic of Congo', NULL, NULL),
(58, 'DK', 'Denmark', NULL, NULL),
(59, 'DJ', 'Djibouti', NULL, NULL),
(60, 'DM', 'Dominica', NULL, NULL),
(61, 'DO', 'Dominican Republic', NULL, NULL),
(62, 'TP', 'East Timor', NULL, NULL),
(63, 'EC', 'Ecudaor', NULL, NULL),
(64, 'EG', 'Egypt', NULL, NULL),
(65, 'SV', 'El Salvador', NULL, NULL),
(66, 'GQ', 'Equatorial Guinea', NULL, NULL),
(67, 'ER', 'Eritrea', NULL, NULL),
(68, 'EE', 'Estonia', NULL, NULL),
(69, 'ET', 'Ethiopia', NULL, NULL),
(70, 'FK', 'Falkland Islands (Malvinas)', NULL, NULL),
(71, 'FO', 'Faroe Islands', NULL, NULL),
(72, 'FJ', 'Fiji', NULL, NULL),
(73, 'FI', 'Finland', NULL, NULL),
(74, 'FR', 'France', NULL, NULL),
(75, 'FX', 'France, Metropolitan', NULL, NULL),
(76, 'GF', 'French Guiana', NULL, NULL),
(77, 'PF', 'French Polynesia', NULL, NULL),
(78, 'TF', 'French Southern Territories', NULL, NULL),
(79, 'GA', 'Gabon', NULL, NULL),
(80, 'GM', 'Gambia', NULL, NULL),
(81, 'GE', 'Georgia', NULL, NULL),
(82, 'DE', 'Germany', NULL, NULL),
(83, 'GH', 'Ghana', NULL, NULL),
(84, 'GI', 'Gibraltar', NULL, NULL),
(85, 'GR', 'Greece', NULL, NULL),
(86, 'GL', 'Greenland', NULL, NULL),
(87, 'GD', 'Grenada', NULL, NULL),
(88, 'GP', 'Guadeloupe', NULL, NULL),
(89, 'GU', 'Guam', NULL, NULL),
(90, 'GT', 'Guatemala', NULL, NULL),
(91, 'GN', 'Guinea', NULL, NULL),
(92, 'GW', 'Guinea-Bissau', NULL, NULL),
(93, 'GY', 'Guyana', NULL, NULL),
(94, 'HT', 'Haiti', NULL, NULL),
(95, 'HM', 'Heard and Mc Donald Islands', NULL, NULL),
(96, 'HN', 'Honduras', NULL, NULL),
(97, 'HK', 'Hong Kong', NULL, NULL),
(98, 'HU', 'Hungary', NULL, NULL),
(99, 'IS', 'Iceland', NULL, NULL),
(100, 'IN', 'India', NULL, NULL),
(101, 'ID', 'Indonesia', NULL, NULL),
(102, 'IR', 'Iran (Islamic Republic of)', NULL, NULL),
(103, 'IQ', 'Iraq', NULL, NULL),
(104, 'IE', 'Ireland', NULL, NULL),
(105, 'IL', 'Israel', NULL, NULL),
(106, 'IT', 'Italy', NULL, NULL),
(107, 'CI', 'Ivory Coast', NULL, NULL),
(108, 'JM', 'Jamaica', NULL, NULL),
(109, 'JP', 'Japan', NULL, NULL),
(110, 'JO', 'Jordan', NULL, NULL),
(111, 'KZ', 'Kazakhstan', NULL, NULL),
(112, 'KE', 'Kenya', NULL, NULL),
(113, 'KI', 'Kiribati', NULL, NULL),
(114, 'KP', 'Korea, Democratic People\'s Republic of', NULL, NULL),
(115, 'KR', 'Korea, Republic of', NULL, NULL),
(116, 'KW', 'Kuwait', NULL, NULL),
(117, 'KG', 'Kyrgyzstan', NULL, NULL),
(118, 'LA', 'Lao People\'s Democratic Republic', NULL, NULL),
(119, 'LV', 'Latvia', NULL, NULL),
(120, 'LB', 'Lebanon', NULL, NULL),
(121, 'LS', 'Lesotho', NULL, NULL),
(122, 'LR', 'Liberia', NULL, NULL),
(123, 'LY', 'Libyan Arab Jamahiriya', NULL, NULL),
(124, 'LI', 'Liechtenstein', NULL, NULL),
(125, 'LT', 'Lithuania', NULL, NULL),
(126, 'LU', 'Luxembourg', NULL, NULL),
(127, 'MO', 'Macau', NULL, NULL),
(128, 'MK', 'Macedonia', NULL, NULL),
(129, 'MG', 'Madagascar', NULL, NULL),
(130, 'MW', 'Malawi', NULL, NULL),
(131, 'MY', 'Malaysia', NULL, NULL),
(132, 'MV', 'Maldives', NULL, NULL),
(133, 'ML', 'Mali', NULL, NULL),
(134, 'MT', 'Malta', NULL, NULL),
(135, 'MH', 'Marshall Islands', NULL, NULL),
(136, 'MQ', 'Martinique', NULL, NULL),
(137, 'MR', 'Mauritania', NULL, NULL),
(138, 'MU', 'Mauritius', NULL, NULL),
(139, 'TY', 'Mayotte', NULL, NULL),
(140, 'MX', 'Mexico', NULL, NULL),
(141, 'FM', 'Micronesia, Federated States of', NULL, NULL),
(142, 'MD', 'Moldova, Republic of', NULL, NULL),
(143, 'MC', 'Monaco', NULL, NULL),
(144, 'MN', 'Mongolia', NULL, NULL),
(145, 'MS', 'Montserrat', NULL, NULL),
(146, 'MA', 'Morocco', NULL, NULL),
(147, 'MZ', 'Mozambique', NULL, NULL),
(148, 'MM', 'Myanmar', NULL, NULL),
(149, 'NA', 'Namibia', NULL, NULL),
(150, 'NR', 'Nauru', NULL, NULL),
(151, 'NP', 'Nepal', NULL, NULL),
(152, 'NL', 'Netherlands', NULL, NULL),
(153, 'AN', 'Netherlands Antilles', NULL, NULL),
(154, 'NC', 'New Caledonia', NULL, NULL),
(155, 'NZ', 'New Zealand', NULL, NULL),
(156, 'NI', 'Nicaragua', NULL, NULL),
(157, 'NE', 'Niger', NULL, NULL),
(158, 'NG', 'Nigeria', NULL, NULL),
(159, 'NU', 'Niue', NULL, NULL),
(160, 'NF', 'Norfork Island', NULL, NULL),
(161, 'MP', 'Northern Mariana Islands', NULL, NULL),
(162, 'NO', 'Norway', NULL, NULL),
(163, 'OM', 'Oman', NULL, NULL),
(164, 'PK', 'Pakistan', NULL, NULL),
(165, 'PW', 'Palau', NULL, NULL),
(166, 'PA', 'Panama', NULL, NULL),
(167, 'PG', 'Papua New Guinea', NULL, NULL),
(168, 'PY', 'Paraguay', NULL, NULL),
(169, 'PE', 'Peru', NULL, NULL),
(170, 'PH', 'Philippines', NULL, NULL),
(171, 'PN', 'Pitcairn', NULL, NULL),
(172, 'PL', 'Poland', NULL, NULL),
(173, 'PT', 'Portugal', NULL, NULL),
(174, 'PR', 'Puerto Rico', NULL, NULL),
(175, 'QA', 'Qatar', NULL, NULL),
(176, 'SS', 'Republic of South Sudan', NULL, NULL),
(177, 'RE', 'Reunion', NULL, NULL),
(178, 'RO', 'Romania', NULL, NULL),
(179, 'RU', 'Russian Federation', NULL, NULL),
(180, 'RW', 'Rwanda', NULL, NULL),
(181, 'KN', 'Saint Kitts and Nevis', NULL, NULL),
(182, 'LC', 'Saint Lucia', NULL, NULL),
(183, 'VC', 'Saint Vincent and the Grenadines', NULL, NULL),
(184, 'WS', 'Samoa', NULL, NULL),
(185, 'SM', 'San Marino', NULL, NULL),
(186, 'ST', 'Sao Tome and Principe', NULL, NULL),
(187, 'SA', 'Saudi Arabia', NULL, NULL),
(188, 'SN', 'Senegal', NULL, NULL),
(189, 'RS', 'Serbia', NULL, NULL),
(190, 'SC', 'Seychelles', NULL, NULL),
(191, 'SL', 'Sierra Leone', NULL, NULL),
(192, 'SG', 'Singapore', NULL, NULL),
(193, 'SK', 'Slovakia', NULL, NULL),
(194, 'SI', 'Slovenia', NULL, NULL),
(195, 'SB', 'Solomon Islands', NULL, NULL),
(196, 'SO', 'Somalia', NULL, NULL),
(197, 'ZA', 'South Africa', NULL, NULL),
(198, 'GS', 'South Georgia South Sandwich Islands', NULL, NULL),
(199, 'ES', 'Spain', NULL, NULL),
(200, 'LK', 'Sri Lanka', NULL, NULL),
(201, 'SH', 'St. Helena', NULL, NULL),
(202, 'PM', 'St. Pierre and Miquelon', NULL, NULL),
(203, 'SD', 'Sudan', NULL, NULL),
(204, 'SR', 'Suriname', NULL, NULL),
(205, 'SJ', 'Svalbarn and Jan Mayen Islands', NULL, NULL),
(206, 'SZ', 'Swaziland', NULL, NULL),
(207, 'SE', 'Sweden', NULL, NULL),
(208, 'CH', 'Switzerland', NULL, NULL),
(209, 'SY', 'Syrian Arab Republic', NULL, NULL),
(210, 'TW', 'Taiwan', NULL, NULL),
(211, 'TJ', 'Tajikistan', NULL, NULL),
(212, 'TZ', 'Tanzania, United Republic of', NULL, NULL),
(213, 'TH', 'Thailand', NULL, NULL),
(214, 'TG', 'Togo', NULL, NULL),
(215, 'TK', 'Tokelau', NULL, NULL),
(216, 'TO', 'Tonga', NULL, NULL),
(217, 'TT', 'Trinidad and Tobago', NULL, NULL),
(218, 'TN', 'Tunisia', NULL, NULL),
(219, 'TR', 'Turkey', NULL, NULL),
(220, 'TM', 'Turkmenistan', NULL, NULL),
(221, 'TC', 'Turks and Caicos Islands', NULL, NULL),
(222, 'TV', 'Tuvalu', NULL, NULL),
(223, 'UG', 'Uganda', NULL, NULL),
(224, 'UA', 'Ukraine', NULL, NULL),
(225, 'AE', 'United Arab Emirates', NULL, NULL),
(226, 'GB', 'United Kingdom', NULL, NULL),
(227, 'UM', 'United States minor outlying islands', NULL, NULL),
(228, 'UY', 'Uruguay', NULL, NULL),
(229, 'UZ', 'Uzbekistan', NULL, NULL),
(230, 'VU', 'Vanuatu', NULL, NULL),
(231, 'VA', 'Vatican City State', NULL, NULL),
(232, 'VE', 'Venezuela', NULL, NULL),
(233, 'VN', 'Vietnam', NULL, NULL),
(234, 'VG', 'Virgin Islands (British)', NULL, NULL),
(235, 'VI', 'Virgin Islands (U.S.)', NULL, NULL),
(236, 'WF', 'Wallis and Futuna Islands', NULL, NULL),
(237, 'EH', 'Western Sahara', NULL, NULL),
(238, 'YE', 'Yemen', NULL, NULL),
(239, 'YU', 'Yugoslavia', NULL, NULL),
(240, 'ZR', 'Zaire', NULL, NULL),
(241, 'ZM', 'Zambia', NULL, NULL),
(242, 'ZW', 'Zimbabwe', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crawler_aliexpresses`
--

DROP TABLE IF EXISTS `crawler_aliexpresses`;
CREATE TABLE `crawler_aliexpresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_block_ini` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '.list-item-180',
  `product_name_element` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'h3 span',
  `product_url_element` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'h3 a.history-item',
  `product_image_element` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'img.picCore',
  `product_price_element` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'span.value',
  `affiliate_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crawler_aliexpresses`
--

INSERT INTO `crawler_aliexpresses` (`id`, `product_block_ini`, `product_name_element`, `product_url_element`, `product_image_element`, `product_price_element`, `affiliate_id`, `created_at`, `updated_at`) VALUES
(1, '.list-item-180', 'h3 span', 'h3 a.history-item', 'img.picCore', 'span.value', '', '2020-10-18 15:17:08', '2020-10-18 15:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `crawler_ebays`
--

DROP TABLE IF EXISTS `crawler_ebays`;
CREATE TABLE `crawler_ebays` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_block_ini` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'li.s-item',
  `product_name_element` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'h3.s-item__title',
  `product_url_element` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'a.s-item__link',
  `product_image_element` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'img.s-item__image-img',
  `product_price_element` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'span.s-item__price',
  `affiliate_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crawler_ebays`
--

INSERT INTO `crawler_ebays` (`id`, `product_block_ini`, `product_name_element`, `product_url_element`, `product_image_element`, `product_price_element`, `affiliate_id`, `created_at`, `updated_at`) VALUES
(1, 'li.s-item', 'h3.s-item__title', 'a.s-item__link', 'img.s-item__image-img', 'span.s-item__price', '', '2020-10-18 15:17:08', '2020-10-18 15:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `html_entity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `symbol`, `html_entity`, `created_at`, `updated_at`) VALUES
(1, 'United Arab Emirates Dirham', 'AED', 'د.إ', '', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(2, 'Afghan Afghani', 'AFN', '؋', '', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(3, 'Albanian Lek', 'ALL', 'L', '', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(4, 'Armenian Dram', 'AMD', 'դր.', '', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(5, 'Netherlands Antillean Gulden', 'ANG', 'ƒ', '&#x0192;', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(6, 'Angolan Kwanza', 'AOA', 'Kz', '', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(7, 'Argentine Peso', 'ARS', '$', '&#x20B1;', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(8, 'Australian Dollar', 'AUD', '$', '$', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(9, 'Aruban Florin', 'AWG', 'ƒ', '&#x0192;', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(10, 'Azerbaijani Manat', 'AZN', 'null', '', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(11, 'Bosnia and Herzegovina Convertible Mark', 'BAM', 'КМ', '', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(12, 'Barbadian Dollar', 'BBD', '$', '$', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(13, 'Bangladeshi Taka', 'BDT', '৳', '', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(14, 'Bulgarian Lev', 'BGN', 'лв', '', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(15, 'Bahraini Dinar', 'BHD', 'ب.د', '', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(16, 'Burundian Franc', 'BIF', 'Fr', '', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(17, 'Bermudian Dollar', 'BMD', '$', '$', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(18, 'Brunei Dollar', 'BND', '$', '$', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(19, 'Bolivian Boliviano', 'BOB', 'Bs.', '', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(20, 'Brazilian Real', 'BRL', 'R$', 'R$', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(21, 'Bahamian Dollar', 'BSD', '$', '$', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(22, 'Bhutanese Ngultrum', 'BTN', 'Nu.', '', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(23, 'Botswana Pula', 'BWP', 'P', '', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(24, 'Belarusian Ruble', 'BYR', 'Br', '', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(25, 'Belize Dollar', 'BZD', '$', '$', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(26, 'Canadian Dollar', 'CAD', '$', '$', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(27, 'Congolese Franc', 'CDF', 'Fr', '', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(28, 'Swiss Franc', 'CHF', 'Fr', '', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(29, 'Unidad de Fomento', 'CLF', 'UF', '&#x20B1;', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(30, 'Chilean Peso', 'CLP', '$', '&#36;', '2020-10-18 15:17:04', '2020-10-18 15:17:04'),
(31, 'Chinese Renminbi Yuan', 'CNY', '¥', '&#20803;', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(32, 'Colombian Peso', 'COP', '$', '&#x20B1;', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(33, 'Costa Rican Colón', 'CRC', '₡', '&#x20A1;', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(34, 'Cuban Convertible Peso', 'CUC', '$', '', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(35, 'Cuban Peso', 'CUP', '$', '&#x20B1;', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(36, 'Cape Verdean Escudo', 'CVE', '$', '', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(37, 'Czech Koruna', 'CZK', 'Kč', '', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(38, 'Djiboutian Franc', 'DJF', 'Fdj', '', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(39, 'Danish Krone', 'DKK', 'kr', '', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(40, 'Dominican Peso', 'DOP', '$', '&#x20B1;', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(41, 'Algerian Dinar', 'DZD', 'د.ج', '', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(42, 'Egyptian Pound', 'EGP', 'ج.م', '&#x00A3;', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(43, 'Eritrean Nakfa', 'ERN', 'Nfk', '', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(44, 'Ethiopian Birr', 'ETB', 'Br', '', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(45, 'Euro', 'EUR', '€', '&#x20AC;', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(46, 'Fijian Dollar', 'FJD', '$', '$', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(47, 'Falkland Pound', 'FKP', '£', '&#x00A3;', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(48, 'British Pound', 'GBP', '£', '&#x00A3;', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(49, 'Georgian Lari', 'GEL', 'ლ', '', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(50, 'Ghanaian Cedi', 'GHS', '₵', '&#x20B5;', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(51, 'Gibraltar Pound', 'GIP', '£', '&#x00A3;', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(52, 'Gambian Dalasi', 'GMD', 'D', '', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(53, 'Guinean Franc', 'GNF', 'Fr', '', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(54, 'Guatemalan Quetzal', 'GTQ', 'Q', '', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(55, 'Guyanese Dollar', 'GYD', '$', '$', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(56, 'Hong Kong Dollar', 'HKD', '$', '$', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(57, 'Honduran Lempira', 'HNL', 'L', '', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(58, 'Croatian Kuna', 'HRK', 'kn', '', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(59, 'Haitian Gourde', 'HTG', 'G', '', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(60, 'Hungarian Forint', 'HUF', 'Ft', '', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(61, 'Indonesian Rupiah', 'IDR', 'Rp', '', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(62, 'Israeli New Sheqel', 'ILS', '₪', '&#x20AA;', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(63, 'Indian Rupee', 'INR', '₹', '&#x20b9;', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(64, 'Iraqi Dinar', 'IQD', 'ع.د', '', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(65, 'Iranian Rial', 'IRR', '﷼', '&#xFDFC;', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(66, 'Icelandic Króna', 'ISK', 'kr', '', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(67, 'Jamaican Dollar', 'JMD', '$', '$', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(68, 'Jordanian Dinar', 'JOD', 'د.ا', '', '2020-10-18 15:17:05', '2020-10-18 15:17:05'),
(69, 'Japanese Yen', 'JPY', '¥', '&#x00A5;', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(70, 'Kenyan Shilling', 'KES', 'KSh', '', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(71, 'Kyrgyzstani Som', 'KGS', 'som', '', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(72, 'Cambodian Riel', 'KHR', '៛', '&#x17DB;', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(73, 'Comorian Franc', 'KMF', 'Fr', '', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(74, 'North Korean Won', 'KPW', '₩', '&#x20A9;', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(75, 'South Korean Won', 'KRW', '₩', '&#x20A9;', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(76, 'Kuwaiti Dinar', 'KWD', 'د.ك', '', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(77, 'Cayman Islands Dollar', 'KYD', '$', '$', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(78, 'Kazakhstani Tenge', 'KZT', '〒', '', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(79, 'Lao Kip', 'LAK', '₭', '&#x20AD;', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(80, 'Lebanese Pound', 'LBP', 'ل.ل', '&#x00A3;', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(81, 'Sri Lankan Rupee', 'LKR', '₨', '&#x0BF9;', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(82, 'Liberian Dollar', 'LRD', '$', '$', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(83, 'Lesotho Loti', 'LSL', 'L', '', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(84, 'Lithuanian Litas', 'LTL', 'Lt', '', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(85, 'Latvian Lats', 'LVL', 'Ls', '', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(86, 'Libyan Dinar', 'LYD', 'ل.د', '', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(87, 'Moroccan Dirham', 'MAD', 'د.م.', '', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(88, 'Moldovan Leu', 'MDL', 'L', '', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(89, 'Malagasy Ariary', 'MGA', 'Ar', '', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(90, 'Macedonian Denar', 'MKD', 'ден', '', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(91, 'Myanmar Kyat', 'MMK', 'K', '', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(92, 'Mongolian Tögrög', 'MNT', '₮', '&#x20AE;', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(93, 'Macanese Pataca', 'MOP', 'P', '', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(94, 'Mauritanian Ouguiya', 'MRO', 'UM', '', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(95, 'Mauritian Rupee', 'MUR', '₨', '&#x20A8;', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(96, 'Maldivian Rufiyaa', 'MVR', 'MVR', '', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(97, 'Malawian Kwacha', 'MWK', 'MK', '', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(98, 'Mexican Peso', 'MXN', '$', '$', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(99, 'Malaysian Ringgit', 'MYR', 'RM', '', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(100, 'Mozambican Metical', 'MZN', 'MTn', '', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(101, 'Namibian Dollar', 'NAD', '$', '$', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(102, 'Nigerian Naira', 'NGN', '₦', '&#x20A6;', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(103, 'Nicaraguan Córdoba', 'NIO', 'C$', '', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(104, 'Norwegian Krone', 'NOK', 'kr', 'kr', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(105, 'Nepalese Rupee', 'NPR', '₨', '&#x20A8;', '2020-10-18 15:17:06', '2020-10-18 15:17:06'),
(106, 'New Zealand Dollar', 'NZD', '$', '$', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(107, 'Omani Rial', 'OMR', 'ر.ع.', '&#xFDFC;', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(108, 'Panamanian Balboa', 'PAB', 'B/.', '', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(109, 'Peruvian Nuevo Sol', 'PEN', 'S/.', 'S/.', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(110, 'Papua New Guinean Kina', 'PGK', 'K', '', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(111, 'Philippine Peso', 'PHP', '₱', '&#x20B1;', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(112, 'Pakistani Rupee', 'PKR', '₨', '&#x20A8;', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(113, 'Polish Złoty', 'PLN', 'zł', 'z&#322;', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(114, 'Paraguayan Guaraní', 'PYG', '₲', '&#x20B2;', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(115, 'Qatari Riyal', 'QAR', 'ر.ق', '&#xFDFC;', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(116, 'Romanian Leu', 'RON', 'Lei', '', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(117, 'Serbian Dinar', 'RSD', 'РСД', '', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(118, 'Russian Ruble', 'RUB', 'р.', '&#x0440;&#x0443;&#x0431;', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(119, 'Rwandan Franc', 'RWF', 'FRw', '', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(120, 'Saudi Riyal', 'SAR', 'ر.س', '&#xFDFC;', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(121, 'Solomon Islands Dollar', 'SBD', '$', '$', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(122, 'Seychellois Rupee', 'SCR', '₨', '&#x20A8;', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(123, 'Sudanese Pound', 'SDG', '£', '', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(124, 'Swedish Krona', 'SEK', 'kr', '', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(125, 'Singapore Dollar', 'SGD', '$', '$', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(126, 'Saint Helenian Pound', 'SHP', '£', '&#x00A3;', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(127, 'Slovak Koruna', 'SKK', 'Sk', '', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(128, 'Sierra Leonean Leone', 'SLL', 'Le', '', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(129, 'Somali Shilling', 'SOS', 'Sh', '', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(130, 'Surinamese Dollar', 'SRD', '$', '', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(131, 'South Sudanese Pound', 'SSP', '£', '&#x00A3;', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(132, 'São Tomé and Príncipe Dobra', 'STD', 'Db', '', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(133, 'Salvadoran Colón', 'SVC', '₡', '&#x20A1;', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(134, 'Syrian Pound', 'SYP', '£S', '&#x00A3;', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(135, 'Swazi Lilangeni', 'SZL', 'L', '', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(136, 'Thai Baht', 'THB', '฿', '&#x0E3F;', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(137, 'Tajikistani Somoni', 'TJS', 'ЅМ', '', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(138, 'Turkmenistani Manat', 'TMT', 'T', '', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(139, 'Tunisian Dinar', 'TND', 'د.ت', '', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(140, 'Tongan Paʻanga', 'TOP', 'T$', '', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(141, 'Turkish Lira', 'TRY', 'TL', '', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(142, 'Trinidad and Tobago Dollar', 'TTD', '$', '$', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(143, 'New Taiwan Dollar', 'TWD', '$', '$', '2020-10-18 15:17:07', '2020-10-18 15:17:07'),
(144, 'Tanzanian Shilling', 'TZS', 'Sh', '', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(145, 'Ukrainian Hryvnia', 'UAH', '₴', '&#x20B4;', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(146, 'Ugandan Shilling', 'UGX', 'USh', '', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(147, 'United States Dollar', 'USD', '$', '$', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(148, 'Uruguayan Peso', 'UYU', '$', '&#x20B1;', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(149, 'Uzbekistani Som', 'UZS', 'null', '', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(150, 'Venezuelan Bolívar', 'VEF', 'Bs F', '', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(151, 'Vietnamese Đồng', 'VND', '₫', '&#x20AB;', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(152, 'Vanuatu Vatu', 'VUV', 'Vt', '', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(153, 'Samoan Tala', 'WST', 'T', '', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(154, 'Central African Cfa Franc', 'XAF', 'Fr', '', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(155, 'Silver (Troy Ounce)', 'XAG', 'oz t', '', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(156, 'Gold (Troy Ounce)', 'XAU', 'oz t', '', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(157, 'East Caribbean Dollar', 'XCD', '$', '$', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(158, 'Special Drawing Rights', 'XDR', 'SDR', '$', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(159, 'West African Cfa Franc', 'XOF', 'Fr', '', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(160, 'Cfp Franc', 'XPF', 'Fr', '', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(161, 'Yemeni Rial', 'YER', '﷼', '&#xFDFC;', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(162, 'South African Rand', 'ZAR', 'R', '&#x0052;', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(163, 'Zambian Kwacha', 'ZMK', 'ZK', '', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(164, 'Zambian Kwacha', 'ZMW', 'ZK', '', '2020-10-18 15:17:08', '2020-10-18 15:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

DROP TABLE IF EXISTS `gateways`;
CREATE TABLE `gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `paypal_active` tinyint(1) DEFAULT '1',
  `paypal_client_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_client_secret` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_active` tinyint(1) DEFAULT '1',
  `stripe_publishable_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_secret_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voguepay_active` tinyint(1) DEFAULT '1',
  `voguepay_merchant_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `paypal_active`, `paypal_client_id`, `paypal_client_secret`, `stripe_active`, `stripe_publishable_key`, `stripe_secret_key`, `voguepay_active`, `voguepay_merchant_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'ARp5caOdXyUzjhYBooYaikaJ2jVuJOLkb-YrDTplRQkBXPdNTyNvMbVGB4FWOJ6Jbt', 'EBH1dDmmChz00Cvcwb9VeLpygxV6vX_deW2O7zla7xhj0nhTsThWYd9Zo-AiMtkrs', 1, 'pk_test_qKe8nGFSUZkLRt0ETMieMh80', 'sk_test_ySExMEvYiX71wvqDmLAMu1UC', 1, 'demo', '2020-10-18 15:17:08', '2020-10-18 15:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(74, '2014_10_12_000000_create_users_table', 1),
(75, '2014_10_12_100000_create_password_resets_table', 1),
(76, '2018_06_21_161840_create_admins_table', 1),
(77, '2018_06_21_161920_create_products_table', 1),
(78, '2018_06_24_140720_create_categories_table', 1),
(79, '2018_07_01_212126_create_invoices_table', 1),
(80, '2018_07_05_151057_create_settings_table', 1),
(81, '2018_07_07_024421_create_posts_table', 1),
(82, '2018_07_07_032231_create_pages_table', 1),
(83, '2018_07_11_155645_create_currencies_table', 1),
(84, '2018_07_18_220051_create_gateways_table', 1),
(85, '2018_07_29_163304_create_sliders_table', 1),
(86, '2018_08_04_211858_create_crawler_ebays_table', 1),
(87, '2018_08_31_095216_create_suppliers_table', 1),
(88, '2018_08_31_141400_create_countries_table', 1),
(89, '2018_09_06_142845_create_child__invoices_table', 1),
(90, '2018_09_27_115041_create_crawler_aliexpresses_table', 1),
(91, '2019_01_06_051545_create_variants_table', 1),
(92, '2020_07_29_220234_create_coupons_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `created_at`, `updated_at`) VALUES
(1, 'About', 'about', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2020-10-18 15:17:03', '2020-10-18 15:17:03'),
(2, 'Policy Privacy', 'policy-privacy', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2020-10-18 15:17:03', '2020-10-18 15:17:03'),
(3, 'Terms and Conditions', 'tos', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2020-10-18 15:17:03', '2020-10-18 15:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `currency_id`, `site_name`, `site_email`, `site_number`, `site_address`, `site_about`, `keywords`, `meta_name`, `search_element`, `search_order`, `disqus`, `social_facebook`, `social_twitter`, `social_instagram`, `logo`, `csv_import_limit`, `live_production`, `default_quantity`, `home_rand_pro`, `home_posts`, `home_users`, `compare_percentage`, `compared_products`, `enable_admin`, `tax`, `price_percent_gain`, `cart_button`, `delivery_terms`, `created_at`, `updated_at`) VALUES
(1, '147', 'Qp Dropship', 'info@products.com.ng', '+123456789', 'Lorem ipsum dolor sit amet, anim id est laborum. Sed ut perspconsectetur, adipisci vam aliquam qua', 'Lorem ipsum dolor sit amet, anim id est laborum. Sed ut perspconsectetur, adipisci vam aliquam qua', 'keywords,keyword', 'Dropship get the best deal', 'price', 'desc', 'https://comparison-1.disqus.com/embed.js', 'https://facebook.com', 'https://twitter.com', 'https://instagram.com', 'uploads/logo/logo.png', 1000, 1, 2, 8, 4, 6, 50, 10, 0, 21, 10, 'Add to Cart', '<p><strong>Free Shipping Thresholds</strong>&nbsp;(Excluding International Customers):</p>\n<p>- Over&nbsp;<strong>$250</strong>&nbsp;Free FedEx Ground or&nbsp;USPS Priority<br />- Over&nbsp;<strong>$800</strong>&nbsp;Free FedEx Standard Overnight<br />- Over&nbsp;<strong>$1000</strong>&nbsp;Free FedEx Priority Overnight</p>', '2020-10-18 15:17:08', '2020-10-18 15:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Slider1', 'uploads/slider/1.jpg', '', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(2, 'Slider2', 'uploads/slider/2.jpg', '', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(3, 'Slider3', 'uploads/slider/3.jpg', '', '2020-10-18 15:17:08', '2020-10-18 15:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

DROP TABLE IF EXISTS `variants`;
CREATE TABLE `variants` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Colour', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(2, 'Size', '2020-10-18 15:17:08', '2020-10-18 15:17:08'),
(3, 'Condition', '2020-10-18 15:17:08', '2020-10-18 15:17:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_name_unique` (`name`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `child__invoices`
--
ALTER TABLE `child__invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `crawler_aliexpresses`
--
ALTER TABLE `crawler_aliexpresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crawler_ebays`
--
ALTER TABLE `crawler_ebays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_invoice_number_unique` (`invoice_number`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_name_unique` (`name`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `child__invoices`
--
ALTER TABLE `child__invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crawler_aliexpresses`
--
ALTER TABLE `crawler_aliexpresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `crawler_ebays`
--
ALTER TABLE `crawler_ebays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

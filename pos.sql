-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 09:41 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_code` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_by`, `updated_by`, `parent_id`, `category_name`, `category_code`, `category_image`, `category_slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(44, 2, NULL, NULL, 'milk', NULL, NULL, NULL, NULL, '2022-11-30 14:47:52', '2022-11-30 14:47:52'),
(45, 2, NULL, NULL, 'coffe', NULL, NULL, NULL, NULL, '2022-11-30 16:27:55', '2022-11-30 16:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `content_invoices`
--

CREATE TABLE `content_invoices` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `purchasing_price` decimal(8,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content_invoices`
--

INSERT INTO `content_invoices` (`id`, `invoice_id`, `product_id`, `product_name`, `quantity`, `price`, `purchasing_price`, `discount`, `created_at`, `updated_at`) VALUES
(1, 134, 33, 'nido 900g', 20, 440, '20.00', 0, '2022-12-01 14:14:41', '2022-12-01 14:14:41'),
(2, 134, 34, 'najjar', 20, 300, '12.00', 0, '2022-12-01 14:14:42', '2022-12-01 14:14:42'),
(3, 134, 35, 'tartra', 10, 120, '10.00', 0, '2022-12-01 14:14:42', '2022-12-01 14:14:42'),
(4, 135, 33, 'nido 900g', 20, 440, '20.00', 0, '2022-12-01 15:55:52', '2022-12-01 15:55:52'),
(5, 136, 34, 'najjar', 30, 450, '12.00', 0, '2022-12-01 16:34:57', '2022-12-01 16:34:57'),
(6, 136, 35, 'tartra', 10, 120, '10.00', 0, '2022-12-01 16:34:57', '2022-12-01 16:34:57'),
(7, 137, 33, 'nido 900g', 20, 431.2, '20.00', 2, '2022-12-01 16:41:57', '2022-12-01 16:41:57'),
(8, 138, 33, 'nido 900g', 1, 22, '20.00', 0, '2022-12-01 16:42:29', '2022-12-01 16:42:29'),
(9, 139, 33, 'nido 900g', 8, 176, '20.00', 0, '2022-12-01 16:46:45', '2022-12-01 16:46:45'),
(10, 140, 33, 'nido 900g', 8, 176, '20.00', 0, '2022-12-02 10:33:43', '2022-12-02 10:33:43'),
(11, 141, 33, 'nido 900g', 3, 66, '20.00', 0, '2022-12-02 10:33:53', '2022-12-02 10:33:53'),
(12, 142, 33, 'nido 900g', 4, 88, '20.00', 0, '2022-12-02 10:33:59', '2022-12-02 10:33:59'),
(13, 143, 33, 'nido 900g', 4, 88, '20.00', 0, '2022-12-21 08:37:15', '2022-12-21 08:37:15'),
(14, 143, 34, 'najjar', 3, 45, '12.00', 0, '2022-12-21 08:37:15', '2022-12-21 08:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `created_by`, `updated_by`, `email`, `phone`, `image`, `address`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 'Customer one', NULL, NULL, 'one@gmail', '70838385', NULL, 'adress', NULL, '2022-07-30 07:38:24', '2022-07-30 07:38:24'),
(5, 'Customer two', NULL, NULL, 'tow@gmail', '70999999', NULL, NULL, NULL, '2022-07-30 07:39:42', '2022-07-30 07:39:42'),
(6, 'ali', NULL, NULL, 'test@example.com', '70837485', NULL, 'asdfasdfdd', NULL, '2022-08-31 07:14:46', '2022-08-31 07:14:46'),
(7, 'hassan', NULL, NULL, NULL, '41541', NULL, NULL, NULL, '2022-09-15 05:26:17', '2022-09-15 05:26:17'),
(8, 'mohamad', NULL, NULL, NULL, '23234', NULL, NULL, NULL, '2022-09-15 05:26:26', '2022-09-15 05:26:26'),
(9, 'zafer', NULL, NULL, NULL, '123234', NULL, NULL, NULL, '2022-09-15 05:26:33', '2022-09-15 05:26:33'),
(13, 'tony', NULL, NULL, 'tony@gmail.com', '121212212', NULL, 'SDSD', NULL, '2022-12-21 08:38:59', '2022-12-21 08:38:59');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expenses_type_id` int(11) NOT NULL,
  `expense_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dollar_value` decimal(8,2) NOT NULL,
  `cost_per_dollar` decimal(8,2) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expenses_type_id`, `expense_name`, `created_by`, `updated_by`, `expense_amount`, `deleted_at`, `created_at`, `updated_at`, `description`, `dollar_value`, `cost_per_dollar`, `date`) VALUES
(3, 6, NULL, NULL, NULL, '800000.00', NULL, NULL, NULL, NULL, '32000.00', '25.00', '2022-09-03'),
(4, 3, NULL, NULL, NULL, '320000.00', NULL, NULL, NULL, NULL, '32000.00', '10.00', '2022-09-03'),
(7, 3, NULL, NULL, NULL, '500000.00', NULL, NULL, NULL, NULL, '40000.00', '12.50', '2022-10-04'),
(8, 3, NULL, NULL, NULL, '10000.00', NULL, NULL, NULL, 'sasd', '40000.00', '0.25', '2022-12-02'),
(9, 4, NULL, NULL, NULL, '100000.00', NULL, NULL, NULL, NULL, '40000.00', '2.50', '2022-12-02'),
(10, 3, NULL, NULL, NULL, '100000.00', NULL, NULL, NULL, NULL, '34000.00', '2.94', '2022-12-03'),
(11, 4, NULL, NULL, NULL, '100000.00', NULL, NULL, NULL, NULL, '38000.00', '2.63', '2022-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_types`
--

CREATE TABLE `expenses_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses_types`
--

INSERT INTO `expenses_types` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(3, 'benzin', '2022-09-02 06:51:52', '2022-09-02 06:51:52'),
(4, 'coffe', '2022-09-02 06:52:01', '2022-09-02 06:52:01'),
(5, 'water', '2022-09-02 06:52:17', '2022-09-02 06:52:17'),
(6, 'ajar ma7al', '2022-09-02 06:52:23', '2022-09-02 06:52:23'),
(7, 'de5an', '2022-09-02 06:52:42', '2022-09-02 06:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `invoice_nb` varchar(25) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` float NOT NULL,
  `p_total` float NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_nb`, `customer_id`, `total`, `p_total`, `date`, `created_at`, `updated_at`, `remember_token`) VALUES
(134, '4112022-1', 4, 860, 740, '2022-12-01', '2022-12-01 14:14:41', '2022-12-01 14:14:41', ''),
(135, '4112022-1', 4, 440, 400, '2022-11-30', '2022-12-01 15:55:52', '2022-12-01 15:55:52', ''),
(136, '4112022-1', 5, 570, 460, '2022-10-10', '2022-12-01 16:34:57', '2022-12-01 16:34:57', ''),
(137, '4112022-1', 5, 431.2, 400, '2022-01-10', '2022-12-01 16:41:57', '2022-12-01 16:41:57', ''),
(138, '4112022-2', 5, 22, 20, '2022-01-10', '2022-12-01 16:42:29', '2022-12-01 16:42:29', ''),
(139, '4112022-1', 5, 176, 160, '2022-07-10', '2022-12-01 16:46:45', '2022-12-01 16:46:45', ''),
(140, '5112022-3', 4, 176, 160, '2022-12-02', '2022-12-02 10:33:43', '2022-12-02 10:33:43', ''),
(141, '5112022-2', 4, 66, 60, '2022-12-02', '2022-12-02 10:33:53', '2022-12-02 10:33:53', ''),
(142, '5112022-1', 6, 88, 80, '2022-12-02', '2022-12-02 10:33:59', '2022-12-02 10:33:59', ''),
(143, '3112022-1', 4, 133, 116, '2022-12-21', '2022-12-21 08:37:15', '2022-12-21 08:37:15', '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_03_20_103059_create_categories_table', 1),
(4, '2020_03_22_183137_create_permission_tables', 1),
(5, '2020_03_23_174012_create_products_table', 1),
(6, '2020_03_23_180000_create_suppliers_table', 1),
(7, '2020_03_23_180553_create_purchases_table', 1),
(8, '2020_03_23_181600_create_customers_table', 1),
(9, '2020_03_23_181619_create_orders_table', 1),
(10, '2020_03_23_181632_create_order_details_table', 1),
(11, '2020_03_24_073150_create_expenses_table', 1),
(12, '2020_03_24_104532_create_returns_table', 1),
(13, '2020_03_29_101013_create_purchase_details_table', 1),
(14, '2022_10_26_172743_create_supliers_table', 2),
(16, '2022_11_19_103705_create_stocks_table', 3),
(17, '2022_11_28_080925_supplier_products_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `created_by`, `updated_by`, `product_name`, `product_code`, `product_image`, `product_slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(33, 44, 2, NULL, 'nido 900g', '111111', NULL, NULL, NULL, '2022-11-30 12:48:21', '2022-11-30 12:48:21'),
(34, 45, 2, NULL, 'najjar', '222222', NULL, NULL, NULL, '2022-11-30 14:28:04', '2022-11-30 14:28:04'),
(35, 44, 2, NULL, 'tartra', '333333', NULL, NULL, NULL, '2022-11-30 14:52:49', '2022-11-30 14:52:49'),
(36, 45, 2, NULL, 'maatouk', '444444', NULL, NULL, NULL, '2022-11-30 14:56:09', '2022-11-30 14:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale_price` decimal(8,2) NOT NULL,
  `purchasing_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `category_id`, `product_name`, `product_code`, `quantity`, `sale_price`, `purchasing_price`, `created_at`, `updated_at`) VALUES
(31, 33, 44, 'nido 900g', '111111', 102, '22.00', '20.00', '2022-11-30 12:50:56', '2022-12-03 06:59:54'),
(32, 34, 45, 'najjar', '222222', 17, '15.00', '12.00', '2022-11-30 14:28:33', '2022-12-02 16:07:42'),
(33, 35, 44, 'tartra', '333333', 10, '12.00', '10.00', '2022-11-30 14:53:32', '2022-11-30 14:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `stock_settings`
--

CREATE TABLE `stock_settings` (
  `id` int(11) NOT NULL,
  `min_stock` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_settings`
--

INSERT INTO `stock_settings` (`id`, `min_stock`, `created_at`, `updated_at`) VALUES
(1, 10, '2022-08-25 17:41:31', '2022-08-25 14:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `suplier_f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suplier_l_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suplier_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`id`, `suplier_f_name`, `suplier_l_name`, `suplier_phone`, `email`, `company_name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'hassan', 'reslan', '70837485', 'reslan_hassan@hotmail.com', 'weprokit', 'zefta', NULL, NULL),
(2, 'ali', 'reslan', '28345345', 'ali@ali', 'company', 'zefta', '2022-10-28 02:43:00', '2022-10-28 02:43:00'),
(7, 'aa', 'ddd', '223424', 'aaaa@example.com', 'sdfadfadf', 'sdfafdafd', '2022-12-02 05:57:24', '2022-12-02 05:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_products`
--

CREATE TABLE `supplier_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_products`
--

INSERT INTO `supplier_products` (`id`, `product_id`, `supplier_id`, `quantity`, `sale_price`, `created_at`, `updated_at`) VALUES
(20, 33, 1, '100', '20.00', NULL, NULL),
(21, 34, 1, '100', '12.00', NULL, NULL),
(22, 35, 1, '50', '10.00', NULL, NULL),
(23, 34, 1, '-10', '12.00', NULL, NULL),
(24, 33, 1, '100', '20.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_by`, `updated_by`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, NULL, NULL, 'Hassan', 'admin@example.com', NULL, '$2y$10$q1s3Ud488TSJzu8ArFBEZ.F4pRpNxu2b.ONev/n6xDj/7lnm6JcSK', 1, 'Ex2vo5i4XvQ5Lj3WH92wRaPh4yhdlutwpnjEY1ulJn2t0QK36rJBliuCuLbD', NULL, NULL, NULL),
(4, NULL, NULL, 'mohamad', 'mohamad@gmail', NULL, '$2y$10$q1s3Ud488TSJzu8ArFBEZ.F4pRpNxu2b.ONev/n6xDj/7lnm6JcSK', 2, NULL, NULL, NULL, NULL),
(6, NULL, NULL, 'general amin', 'reslan_hassan@hotmail.com', NULL, '$2y$10$9G7..OvYwNNb6Aa9d8NGp.FhzBWLUOn.J4pr3tf1RuJ096Mz7B9Iq', 1, NULL, NULL, NULL, NULL),
(7, NULL, NULL, 'srockuserss', 'stock@hotmail.com', NULL, '$2y$10$3cBNVd1An7s9eIZDBchKReI8y2pZ7aQiOcbhp.J2spXAB9DB.rjlq', 3, NULL, NULL, NULL, NULL),
(8, NULL, NULL, 'Stock Manager', 'Stockuser@hotmail.com', NULL, '$2y$10$71vdowrraK.9WO4PTLrh1eu/j5TTu3OIK/tov.kaFPyfofYAVq6Pm', 3, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_slug_unique` (`category_slug`),
  ADD UNIQUE KEY `categories_category_code_unique` (`category_code`),
  ADD KEY `categories_created_by_foreign` (`created_by`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`),
  ADD KEY `categories_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `content_invoices`
--
ALTER TABLE `content_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_created_by_foreign` (`created_by`),
  ADD KEY `customers_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_created_by_foreign` (`created_by`),
  ADD KEY `expenses_updated_by_foreign` (`updated_by`),
  ADD KEY `expenses_type_id` (`expenses_type_id`);

--
-- Indexes for table `expenses_types`
--
ALTER TABLE `expenses_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_code_unique` (`product_code`),
  ADD UNIQUE KEY `products_product_slug_unique` (`product_slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_created_by_foreign` (`created_by`),
  ADD KEY `products_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_product_id_foreign` (`product_id`),
  ADD KEY `stocks_category_id_foreign` (`category_id`);

--
-- Indexes for table `stock_settings`
--
ALTER TABLE `stock_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `supliers_company_name_unique` (`company_name`),
  ADD UNIQUE KEY `supliers_email_unique` (`email`);

--
-- Indexes for table `supplier_products`
--
ALTER TABLE `supplier_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_products_product_id_foreign` (`product_id`),
  ADD KEY `supplier_products_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_created_by_foreign` (`created_by`),
  ADD KEY `users_updated_by_foreign` (`updated_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `content_invoices`
--
ALTER TABLE `content_invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `expenses_types`
--
ALTER TABLE `expenses_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `stock_settings`
--
ALTER TABLE `stock_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supplier_products`
--
ALTER TABLE `supplier_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `content_invoices`
--
ALTER TABLE `content_invoices`
  ADD CONSTRAINT `content_invoices_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customers_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expenses_expenses_type_id_foreign` FOREIGN KEY (`expenses_type_id`) REFERENCES `expenses_types` (`id`),
  ADD CONSTRAINT `expenses_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `supplier_products`
--
ALTER TABLE `supplier_products`
  ADD CONSTRAINT `supplier_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `supplier_products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `supliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

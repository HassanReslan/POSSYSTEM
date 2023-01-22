-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2023 at 09:44 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET FOREIGN_KEY_CHECKS=0;
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
  `category_name` varchar(100) NOT NULL,
  `category_code` varchar(16) DEFAULT NULL,
  `category_image` varchar(100) DEFAULT NULL,
  `category_slug` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `categories`:
--   `created_by`
--       `users` -> `id`
--

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_by`, `updated_by`, `parent_id`, `category_name`, `category_code`, `category_image`, `category_slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(44, 2, NULL, NULL, 'milk', NULL, NULL, NULL, NULL, '2022-11-30 14:47:52', '2022-11-30 14:47:52'),
(45, 2, NULL, NULL, 'coffe', NULL, NULL, NULL, NULL, '2022-11-30 16:27:55', '2022-11-30 16:27:55'),
(48, 2, NULL, NULL, 'cheese', NULL, NULL, NULL, NULL, '2023-01-06 11:03:58', '2023-01-06 11:03:58'),
(49, 2, NULL, NULL, 'chips', NULL, NULL, NULL, NULL, '2023-01-06 11:05:01', '2023-01-06 11:05:01'),
(50, 2, NULL, NULL, 'Smoke', NULL, NULL, NULL, NULL, '2023-01-06 11:12:29', '2023-01-06 11:12:29'),
(51, 2, NULL, NULL, 'choclate', NULL, NULL, NULL, NULL, '2023-01-06 11:17:01', '2023-01-06 11:17:01');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `content_invoices`:
--   `invoice_id`
--       `invoices` -> `id`
--

--
-- Dumping data for table `content_invoices`
--

INSERT INTO `content_invoices` (`id`, `invoice_id`, `product_id`, `product_name`, `quantity`, `price`, `purchasing_price`, `discount`, `created_at`, `updated_at`) VALUES
(272, 210, 33, 'nido 900g', 5, 70, '13.00', 0, '2023-01-20 09:38:15', '2023-01-20 09:38:15'),
(273, 210, 35, 'tartra', 2, 24, '10.00', 0, '2023-01-20 09:38:15', '2023-01-20 09:38:15'),
(274, 211, 33, 'nido 900g', 2, 28, '13.00', 0, '2023-01-20 09:39:10', '2023-01-20 09:39:10'),
(275, 211, 38, 'klim 750g', 3, 30, '8.00', 0, '2023-01-20 09:39:10', '2023-01-20 09:39:10'),
(276, 212, 33, 'nido 900g', 1, 14, '13.00', 0, '2023-01-20 09:40:12', '2023-01-20 09:40:12'),
(277, 212, 43, 'Najjar 500g', 4, 48, '12.00', 0, '2023-01-20 09:40:13', '2023-01-20 09:40:13'),
(278, 212, 45, 'picon 12 pc', 10, 50, '4.00', 0, '2023-01-20 09:40:13', '2023-01-20 09:40:13'),
(279, 213, 33, 'nido 900g', 1, 14, '13.00', 0, '2023-01-20 09:59:51', '2023-01-20 09:59:51'),
(280, 213, 35, 'tartra', 1, 12, '10.00', 0, '2023-01-20 09:59:51', '2023-01-20 09:59:51'),
(281, 213, 36, 'maatouk', 1, 6, '5.00', 0, '2023-01-20 09:59:51', '2023-01-20 09:59:51'),
(282, 214, 60, 'Mars', 1, 7, '5.00', 0, '2023-01-20 10:33:02', '2023-01-20 10:33:02'),
(283, 214, 54, 'Marlboro gold', 1, 12, '11.00', 0, '2023-01-20 10:33:02', '2023-01-20 10:33:02'),
(284, 214, 59, 'milka', 1, 2, '1.00', 0, '2023-01-20 10:33:02', '2023-01-20 10:33:02'),
(285, 215, 33, 'nido 900g', 3, 42, '13.00', 0, '2023-01-20 10:36:25', '2023-01-20 10:36:25'),
(286, 215, 35, 'tartra', 1, 12, '10.00', 0, '2023-01-20 10:36:25', '2023-01-20 10:36:25'),
(287, 215, 36, 'maatouk', 2, 12, '5.00', 0, '2023-01-20 10:36:25', '2023-01-20 10:36:25'),
(288, 216, 33, 'nido 900g', 2, 28, '13.00', 0, '2023-01-20 11:20:12', '2023-01-20 11:20:12'),
(289, 216, 35, 'tartra', 3, 36, '10.00', 0, '2023-01-20 11:20:12', '2023-01-20 11:20:12'),
(290, 217, 35, 'tartra', 4, 48, '10.00', 0, '2023-01-20 11:20:41', '2023-01-20 11:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `customers`:
--   `created_by`
--       `users` -> `id`
--   `updated_by`
--       `users` -> `id`
--

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `created_by`, `updated_by`, `email`, `phone`, `image`, `address`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 'Customer one', NULL, NULL, 'one@gmail', '70838385', NULL, 'adress', NULL, '2022-07-30 07:38:24', '2022-07-30 07:38:24'),
(5, 'Customer two', NULL, NULL, 'tow@gmail', '70999999', NULL, NULL, NULL, '2022-07-30 07:39:42', '2022-07-30 07:39:42'),
(6, 'ali', NULL, NULL, 'test@example.com', '70837485', NULL, 'asdfasdfdd', NULL, '2022-08-31 07:14:46', '2022-08-31 07:14:46'),
(7, 'hassan', NULL, NULL, NULL, '41541', NULL, NULL, NULL, '2022-09-15 05:26:17', '2022-09-15 05:26:17'),
(8, 'mohamad', NULL, NULL, NULL, '23234', NULL, NULL, NULL, '2022-09-15 05:26:26', '2022-09-15 05:26:26'),
(9, 'zafer', NULL, NULL, NULL, '123234', NULL, NULL, NULL, '2022-09-15 05:26:33', '2022-09-15 05:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `phone` char(255) NOT NULL,
  `image` char(255) NOT NULL,
  `address` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `employees`:
--

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `image`, `address`, `created_at`, `updated_at`) VALUES
(6, 'hassan reslans', 'test@example.com', '70837485', '', 'nabatieh main road', '2022-12-27 11:39:35', '2023-01-05 04:44:30'),
(8, 'Employee 1', 'emp@hormail.com', '234123', '', 'sdfasdg f sad', '2022-12-29 04:47:47', '2022-12-29 04:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `es_contents`
--

CREATE TABLE `es_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `es_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` char(255) NOT NULL,
  `product_code` char(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale_price` decimal(8,2) NOT NULL,
  `purchasing_price` decimal(8,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `es_contents`:
--   `category_id`
--       `categories` -> `id`
--   `es_id`
--       `external_stocks` -> `id`
--   `product_id`
--       `products` -> `id`
--

--
-- Dumping data for table `es_contents`
--

INSERT INTO `es_contents` (`id`, `es_id`, `product_id`, `category_id`, `product_name`, `product_code`, `quantity`, `sale_price`, `purchasing_price`, `expiry_date`, `created_at`, `updated_at`) VALUES
(18, 13, 33, 44, 'nido 900g', '111111', 8, '14.00', '13.00', '0000-00-00', '2023-01-16 08:44:22', '2023-01-20 09:19:27'),
(19, 13, 35, 44, 'tartra', '333333', 13, '12.00', '10.00', '0000-00-00', '2023-01-20 09:19:35', '2023-01-20 09:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expenses_type_id` int(11) NOT NULL,
  `expense_name` varchar(50) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(20,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text DEFAULT NULL,
  `dollar_value` decimal(8,2) NOT NULL,
  `cost_per_dollar` decimal(8,2) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `expenses`:
--   `created_by`
--       `users` -> `id`
--   `expenses_type_id`
--       `expenses_types` -> `id`
--   `updated_by`
--       `users` -> `id`
--

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
(11, 4, NULL, NULL, NULL, '100000.00', NULL, NULL, NULL, NULL, '38000.00', '2.63', '2022-12-02'),
(12, 3, NULL, NULL, NULL, '20000.00', NULL, NULL, NULL, NULL, '35000.00', '0.57', '2023-01-04'),
(13, 3, NULL, NULL, NULL, '1000000.00', NULL, NULL, NULL, 'aaaa', '47000.00', '21.28', '2023-01-17'),
(14, 4, NULL, NULL, NULL, '20000.00', NULL, NULL, NULL, 'espresso', '47000.00', '0.43', '2023-01-17'),
(15, 3, NULL, NULL, NULL, '2000000.00', NULL, NULL, NULL, 'van benzin', '47000.00', '42.55', '2023-01-17'),
(16, 5, NULL, NULL, NULL, '47000.00', NULL, NULL, NULL, 'may shorob', '47000.00', '1.00', '2023-01-17'),
(17, 4, NULL, NULL, NULL, '15000.00', NULL, NULL, NULL, 'expresso', '47000.00', '0.32', '2023-01-17'),
(18, 7, NULL, NULL, NULL, '25000.00', NULL, NULL, NULL, 'cedears', '47000.00', '0.53', '2023-01-17'),
(19, 3, NULL, NULL, NULL, '10000000.00', NULL, NULL, NULL, 'van w moter', '74000.00', '135.14', '2023-12-17'),
(20, 4, NULL, NULL, NULL, '50000.00', NULL, NULL, NULL, 'coffe espresso', '47000.00', '1.06', '2023-01-18'),
(21, 5, NULL, NULL, NULL, '10000.00', NULL, NULL, NULL, NULL, '47000.00', '0.21', '2023-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_types`
--

CREATE TABLE `expenses_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `expenses_types`:
--

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
-- Table structure for table `external_stocks`
--

CREATE TABLE `external_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(255) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `external_stocks`:
--

--
-- Dumping data for table `external_stocks`
--

INSERT INTO `external_stocks` (`id`, `name`, `employee_id`, `created_at`, `updated_at`) VALUES
(13, 'stock 3', 6, '2023-01-16 07:24:54', '2023-01-16 07:24:54'),
(14, 's2', 8, '2023-01-21 06:05:55', '2023-01-21 06:05:55'),
(15, 'stock 3', 8, '2023-01-21 06:14:21', '2023-01-21 06:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL DEFAULT 0,
  `invoice_nb` varchar(25) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` float NOT NULL,
  `p_total` float NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `invoices`:
--

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `stock_id`, `invoice_nb`, `customer_id`, `total`, `p_total`, `date`, `created_at`, `updated_at`, `remember_token`) VALUES
(210, 0, '502023-1-0', 4, 94, 85, '2023-01-20', '2023-01-20 09:38:15', '2023-01-20 09:38:15', ''),
(211, 0, '502023-1-0', 5, 58, 50, '2023-01-01', '2023-01-20 09:39:09', '2023-01-20 09:39:09', ''),
(212, 0, '502023-1-0', 4, 112, 101, '2023-01-02', '2023-01-20 09:40:12', '2023-01-20 09:40:12', ''),
(213, 0, '502023-1-0', 4, 32, 28, '2022-12-20', '2023-01-20 09:59:51', '2023-01-20 09:59:51', ''),
(214, 0, '502023-2-0', 6, 21, 17, '2023-01-20', '2023-01-20 10:33:02', '2023-01-20 10:33:02', ''),
(215, 0, '502023-1-0', 4, 66, 59, '2023-02-01', '2023-01-20 10:36:25', '2023-01-20 10:36:25', ''),
(216, 13, '502023-1-13', 4, 64, 56, '2023-01-20', '2023-01-20 11:20:12', '2023-01-20 11:20:12', ''),
(217, 13, '502023-1-13', 4, 48, 40, '2023-01-01', '2023-01-20 11:20:40', '2023-01-20 11:20:40', '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `migrations`:
--

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
(17, '2022_11_28_080925_supplier_products_table', 4),
(18, '2022_12_27_112127_create_external_stocks_table', 5),
(19, '2022_12_27_113620_create_employees_table', 6),
(21, '2022_12_30_081411_create_es_contents_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_code` varchar(225) NOT NULL,
  `product_image` varchar(100) DEFAULT NULL,
  `product_slug` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `products`:
--   `category_id`
--       `categories` -> `id`
--   `created_by`
--       `users` -> `id`
--   `updated_by`
--       `users` -> `id`
--

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `created_by`, `updated_by`, `product_name`, `product_code`, `product_image`, `product_slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(33, 44, 2, NULL, 'nido 900g', '111111', NULL, NULL, NULL, '2022-11-30 12:48:21', '2022-11-30 12:48:21'),
(34, 45, 2, NULL, 'najjar', '222222', NULL, NULL, NULL, '2022-11-30 14:28:04', '2022-11-30 14:28:04'),
(35, 44, 2, NULL, 'tartra', '333333', NULL, NULL, NULL, '2022-11-30 14:52:49', '2022-11-30 14:52:49'),
(36, 45, 2, NULL, 'maatouk', '444444', NULL, NULL, NULL, '2022-11-30 14:56:09', '2022-11-30 14:56:09'),
(38, 44, 2, NULL, 'klim 750g', '123as23d', NULL, NULL, NULL, '2023-01-06 09:07:24', '2023-01-06 09:07:24'),
(39, 44, 2, NULL, 'klio 900 g', '1ds123de', NULL, NULL, NULL, '2023-01-06 09:07:47', '2023-01-06 09:07:47'),
(40, 44, 2, NULL, 'klim 900g', '123cd123', NULL, NULL, NULL, '2023-01-06 09:08:23', '2023-01-06 09:08:23'),
(42, 44, 2, NULL, 'klio 300g', '12edw11', NULL, NULL, NULL, '2023-01-06 09:08:53', '2023-01-06 09:08:53'),
(43, 45, 2, NULL, 'Najjar 500g', '12as23sd', NULL, NULL, NULL, '2023-01-06 09:09:48', '2023-01-06 09:09:48'),
(44, 45, 2, NULL, 'nescafe gold 250g', '12sd3', NULL, NULL, NULL, '2023-01-06 09:10:45', '2023-01-06 09:10:45'),
(45, 48, 2, NULL, 'picon 12 pc', '12dmk12', NULL, NULL, NULL, '2023-01-06 09:11:03', '2023-01-06 09:11:03'),
(46, 48, 2, NULL, 'kiri 12 pc', '12mks3', NULL, NULL, NULL, '2023-01-06 09:11:18', '2023-01-06 09:11:18'),
(47, 49, 2, NULL, 'Master 50g', '12ls93', NULL, NULL, NULL, '2023-01-06 09:11:32', '2023-01-06 09:11:32'),
(48, 49, 2, NULL, 'Master 100g', '12msd8', NULL, NULL, NULL, '2023-01-06 09:11:43', '2023-01-06 09:11:43'),
(49, 49, 2, NULL, 'Ringo 50g', '12mjdf73', NULL, NULL, NULL, '2023-01-06 09:12:01', '2023-01-06 09:12:01'),
(50, 49, 2, NULL, 'Ringo 100g', '123kmd7', NULL, NULL, NULL, '2023-01-06 09:12:20', '2023-01-06 09:12:20'),
(51, 50, 2, NULL, 'cedars silve kartoun', '12e msd8', NULL, NULL, NULL, '2023-01-06 09:12:58', '2023-01-06 09:13:31'),
(52, 50, 2, NULL, 'cedars blue', '3nsjdn', NULL, NULL, NULL, '2023-01-06 09:13:57', '2023-01-06 09:13:57'),
(53, 50, 2, NULL, 'Dovidof gold', '12323', NULL, NULL, NULL, '2023-01-06 09:14:20', '2023-01-06 09:14:20'),
(54, 50, 2, NULL, 'Marlboro gold', '123msd8', NULL, NULL, NULL, '2023-01-06 09:14:35', '2023-01-06 09:14:35'),
(55, 48, 2, NULL, '7aloum 100g', '23 mds8', NULL, NULL, NULL, '2023-01-06 09:14:59', '2023-01-06 09:14:59'),
(56, 48, 2, NULL, '7aloum 200g', '238 ndsf7sd', NULL, NULL, NULL, '2023-01-06 09:15:21', '2023-01-06 09:15:21'),
(57, 49, 2, NULL, 'fantasia 50g', '1sjd84', NULL, NULL, NULL, '2023-01-06 09:15:49', '2023-01-06 09:15:49'),
(58, 49, 2, NULL, 'fantasia 100g', '239s8832', NULL, NULL, NULL, '2023-01-06 09:16:06', '2023-01-06 09:16:06'),
(59, 51, 2, NULL, 'milka', '234g34', NULL, NULL, NULL, '2023-01-06 09:17:14', '2023-01-06 09:17:14'),
(60, 51, 2, NULL, 'Mars', '23isdfk9', NULL, NULL, NULL, '2023-01-06 09:17:24', '2023-01-06 09:17:24'),
(62, 44, 2, NULL, 'product one test', '14hu2548', NULL, NULL, NULL, '2023-01-16 09:15:28', '2023-01-16 09:15:28'),
(66, 44, 10, NULL, 'wqerqwer', 'wqerqwerqwer', NULL, NULL, NULL, '2023-01-21 06:41:47', '2023-01-21 06:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` char(255) NOT NULL,
  `product_code` char(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale_price` decimal(8,2) NOT NULL,
  `purchasing_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `stocks`:
--   `category_id`
--       `categories` -> `id`
--   `product_id`
--       `products` -> `id`
--

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `category_id`, `product_name`, `product_code`, `quantity`, `sale_price`, `purchasing_price`, `created_at`, `updated_at`) VALUES
(31, 33, 44, 'nido 900g', '111111', 88, '14.00', '13.00', '2022-11-30 12:50:56', '2023-01-21 06:33:05'),
(33, 35, 44, 'tartra', '333333', 76, '12.00', '10.00', '2022-11-30 14:53:32', '2023-01-21 06:32:14'),
(34, 36, 45, 'maatouk', '444444', 97, '6.00', '5.00', '2023-01-06 09:18:15', '2023-01-10 17:12:32'),
(35, 38, 44, 'klim 750g', '123as23d', 97, '10.00', '8.00', '2023-01-06 09:18:31', '2023-01-10 17:13:51'),
(36, 40, 44, 'klim 900g', '123cd123', 100, '15.00', '12.00', '2023-01-06 09:19:13', '2023-01-06 09:19:13'),
(37, 39, 44, 'klio 900 g', '1ds123de', 100, '2.00', '1.00', '2023-01-06 09:19:32', '2023-01-06 09:19:32'),
(38, 42, 44, 'klio 300g', '12edw11', 100, '6.00', '4.00', '2023-01-06 09:19:55', '2023-01-20 07:35:40'),
(39, 43, 45, 'Najjar 500g', '12as23sd', 96, '12.00', '12.00', '2023-01-06 09:20:58', '2023-01-06 09:30:06'),
(40, 44, 45, 'nescafe gold 250g', '12sd3', 100, '7.00', '6.00', '2023-01-06 09:21:11', '2023-01-20 07:35:47'),
(41, 45, 48, 'picon 12 pc', '12dmk12', 90, '5.00', '4.00', '2023-01-06 09:21:41', '2023-01-16 07:14:11'),
(42, 46, 48, 'kiri 12 pc', '12mks3', 100, '3.00', '2.00', '2023-01-06 09:22:02', '2023-01-06 09:22:02'),
(43, 47, 49, 'Master 50g', '12ls93', 100, '2.00', '1.00', '2023-01-06 09:22:25', '2023-01-06 09:22:25'),
(44, 48, 49, 'Master 100g', '12msd8', 100, '2.00', '1.00', '2023-01-06 09:22:50', '2023-01-20 07:35:53'),
(45, 49, 49, 'Ringo 50g', '12mjdf73', 100, '2.00', '1.00', '2023-01-06 09:23:45', '2023-01-06 09:23:45'),
(46, 50, 49, 'Ringo 100g', '123kmd7', 100, '2.00', '1.00', '2023-01-06 09:23:56', '2023-01-06 09:23:56'),
(47, 51, 50, 'cedars silve kartoun', '12e msd8', 100, '2.00', '1.00', '2023-01-06 09:24:19', '2023-01-06 09:24:19'),
(48, 52, 50, 'cedars blue', '3nsjdn', 100, '2.00', '1.00', '2023-01-06 09:24:31', '2023-01-06 09:24:31'),
(49, 53, 50, 'Dovidof gold', '12323', 100, '3.00', '2.00', '2023-01-06 09:24:49', '2023-01-20 07:36:02'),
(50, 54, 50, 'Marlboro gold', '123msd8', 99, '12.00', '11.00', '2023-01-06 09:25:08', '2023-01-06 09:25:08'),
(51, 60, 51, 'Mars', '23isdfk9', 99, '7.00', '5.00', '2023-01-06 09:25:29', '2023-01-06 09:25:29'),
(52, 59, 51, 'milka', '234g34', 99, '2.00', '1.00', '2023-01-06 09:25:49', '2023-01-06 09:25:49'),
(53, 58, 49, 'fantasia 100g', '239s8832', 100, '3.00', '2.00', '2023-01-06 09:25:59', '2023-01-06 09:25:59'),
(54, 57, 49, 'fantasia 50g', '1sjd84', 100, '5.00', '4.00', '2023-01-06 09:26:08', '2023-01-06 09:26:08'),
(55, 56, 48, '7aloum 200g', '238 ndsf7sd', 100, '11.00', '10.00', '2023-01-06 09:26:20', '2023-01-06 09:26:20'),
(56, 55, 48, '7aloum 100g', '23 mds8', 100, '12.00', '11.00', '2023-01-06 09:26:38', '2023-01-06 09:26:38'),
(58, 34, 45, 'najjar', '222222', 100, '15.00', '12.00', '2023-01-14 09:26:36', '2023-01-14 09:27:16');

-- --------------------------------------------------------

--
-- Table structure for table `stock_settings`
--

CREATE TABLE `stock_settings` (
  `id` int(11) NOT NULL,
  `min_stock` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `stock_settings`:
--

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
  `suplier_f_name` varchar(255) NOT NULL,
  `suplier_l_name` varchar(255) NOT NULL,
  `suplier_phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `supliers`:
--

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`id`, `suplier_f_name`, `suplier_l_name`, `suplier_phone`, `email`, `company_name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'hassans', 'reslan', '70837485', 'reslan_hassan@hotmail.com', 'weprokit', 'zefta', NULL, NULL),
(2, 'ali', 'reslan', '28345345', 'ali@ali', 'company', 'zefta', '2022-10-28 02:43:00', '2022-10-28 02:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_products`
--

CREATE TABLE `supplier_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` char(255) NOT NULL,
  `sale_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `supplier_products`:
--   `product_id`
--       `products` -> `id`
--   `supplier_id`
--       `supliers` -> `id`
--

--
-- Dumping data for table `supplier_products`
--

INSERT INTO `supplier_products` (`id`, `product_id`, `supplier_id`, `quantity`, `sale_price`, `created_at`, `updated_at`) VALUES
(20, 33, 1, '100', '20.00', NULL, NULL),
(21, 34, 1, '100', '12.00', NULL, NULL),
(22, 35, 1, '50', '10.00', NULL, NULL),
(23, 34, 1, '-10', '12.00', NULL, NULL),
(24, 33, 1, '100', '20.00', NULL, NULL),
(25, 33, 1, '222', '20.00', NULL, NULL),
(26, 35, 1, '1212', '10.00', NULL, NULL),
(27, 34, 1, '0', '12.00', NULL, NULL),
(28, 34, 1, '50', '12.00', NULL, NULL),
(29, 36, 1, '100', '5.00', NULL, NULL),
(30, 38, 1, '100', '8.00', NULL, NULL),
(31, 40, 1, '100', '12.00', NULL, NULL),
(32, 39, 2, '150', '1.00', NULL, NULL),
(33, 42, 2, '50', '4.00', NULL, NULL),
(34, 43, 2, '0', '12.00', NULL, NULL),
(35, 44, 1, '34', '6.00', NULL, NULL),
(36, 45, 1, '55', '4.00', NULL, NULL),
(37, 46, 2, '23', '2.00', NULL, NULL),
(38, 47, 1, '200', '1.00', NULL, NULL),
(39, 48, 2, '120', '1.00', NULL, NULL),
(40, 49, 1, '60', '1.00', NULL, NULL),
(41, 50, 1, '50', '1.00', NULL, NULL),
(42, 51, 2, '100', '1.00', NULL, NULL),
(43, 52, 1, '100', '1.00', NULL, NULL),
(44, 53, 1, '80', '2.00', NULL, NULL),
(45, 54, 1, '20', '11.00', NULL, NULL),
(46, 60, 1, '40', '5.00', NULL, NULL),
(47, 59, 1, '10', '1.00', NULL, NULL),
(48, 58, 1, '50', '2.00', NULL, NULL),
(49, 57, 1, '20', '4.00', NULL, NULL),
(50, 56, 1, '5', '10.00', NULL, NULL),
(51, 55, 1, '10', '11.00', NULL, NULL),
(52, 43, 1, '0', '12.00', NULL, NULL),
(53, 43, 1, '40', '12.00', NULL, NULL),
(54, 33, 1, '0', '20.50', NULL, NULL),
(55, 36, 1, '0', '5.00', NULL, NULL),
(56, 36, 1, '12', '5.00', NULL, NULL),
(57, 33, 1, '100', '22.60', NULL, NULL),
(58, 34, 1, '100', '12.00', NULL, NULL),
(59, 34, 1, '0', '12.00', NULL, NULL),
(60, 34, 1, '100', '12.00', NULL, NULL),
(61, 33, 1, '0', '0.00', NULL, NULL),
(62, 33, 1, '110', '13.00', NULL, NULL),
(63, 33, 1, '11', '13.00', NULL, NULL),
(64, 33, 2, '10', '13.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `users`:
--   `created_by`
--       `users` -> `id`
--   `updated_by`
--       `users` -> `id`
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_by`, `updated_by`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, NULL, NULL, 'Hassan', 'admin@example.com', NULL, '$2y$10$q1s3Ud488TSJzu8ArFBEZ.F4pRpNxu2b.ONev/n6xDj/7lnm6JcSK', 1, 'sRUlJQba6g7M9G38XcQQrmqSp3IJ4QQVUZo1aKgtHnVrDHBfNAhpc8wf9WBU', NULL, NULL, NULL),
(9, NULL, NULL, 'salesone', 'sales@gmail', NULL, '$2y$10$TLaRsxYFBXFGl47gLZJdmeuX5D.oYOWsMsgcEwGSF6nX2nQrUhaby', 2, NULL, NULL, NULL, NULL),
(10, NULL, NULL, 'stockuser', 'stock@gmail', NULL, '$2y$10$u3HzcDu/emfuQq2J1hNVNueeA3AvOxLx2.OcuFYAVc3L0nss5wa/q', 3, NULL, NULL, NULL, NULL);

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
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `es_contents`
--
ALTER TABLE `es_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `es_contents_es_id_foreign` (`es_id`),
  ADD KEY `es_contents_product_id_foreign` (`product_id`),
  ADD KEY `es_contents_category_id_foreign` (`category_id`);

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
-- Indexes for table `external_stocks`
--
ALTER TABLE `external_stocks`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `content_invoices`
--
ALTER TABLE `content_invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `es_contents`
--
ALTER TABLE `es_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `expenses_types`
--
ALTER TABLE `expenses_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `external_stocks`
--
ALTER TABLE `external_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Constraints for table `es_contents`
--
ALTER TABLE `es_contents`
  ADD CONSTRAINT `es_contents_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `es_contents_es_id_foreign` FOREIGN KEY (`es_id`) REFERENCES `external_stocks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `es_contents_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

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
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

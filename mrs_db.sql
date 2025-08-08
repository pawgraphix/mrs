-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2025 at 09:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL,
  `registration_number` varchar(100) NOT NULL,
  `year_of_purchase` year(4) NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `asset_category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `name`, `location_id`, `registration_number`, `year_of_purchase`, `department_id`, `asset_category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'HP ProBook 450', 1, 'CBE-ICT-001', '2022', 5, 3, '2025-07-05 18:39:43', '2025-08-05 09:42:30', NULL),
(2, 'Epson Printer', 2, 'CBE-ACT-004', '2021', 2, 3, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(3, 'Wooden Desk', 5, 'CBE-FUR-027', '2020', 5, 1, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(4, 'Library Bookshelf', 6, 'CBE-LIB-009', '2019', 6, 6, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(5, 'LED Projector', 3, 'CBE-MKT-015', '2023', 4, 2, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(6, 'Dell Desktop', 4, 'CBE-ICT-022', '2022', 5, 3, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(7, 'Office Chair', 1, 'CBE-PS-033', '2020', 3, 1, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(8, 'Photocopier', 5, 'CBE-GEN-050', '2021', 1, 7, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(9, 'Hp Monitor', 2, 'Lab A - Room 5', '2011', 5, 3, '2025-07-07 11:56:14', '2025-07-28 14:14:26', NULL),
(10, 'Wardrobe', 6, 'CBE-LIB-011', '2018', 9, 6, '2025-07-07 12:42:31', '2025-07-07 12:42:34', '2025-07-07 12:42:34'),
(11, 'Chair', 16, 'CBE-ICT-008', '2000', 2, 7, '2025-08-05 09:44:11', '2025-08-05 09:44:19', '2025-08-05 09:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `asset_categories`
--

CREATE TABLE `asset_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asset_categories`
--

INSERT INTO `asset_categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Furniture', 'Office desks, chairs, cabinets, and shelves', '2025-07-05 17:48:18', '2025-07-05 17:48:18', NULL),
(2, 'Electronics', 'TVs, projectors, speakers, and cameras', '2025-07-05 17:48:18', '2025-07-05 17:48:18', NULL),
(3, 'ICT Equipment', 'Computers, laptops, printers, scanners, routers', '2025-07-05 17:48:18', '2025-07-05 17:48:18', NULL),
(4, 'Lab Equipment', 'Items used in science, ICT or research labs', '2025-07-05 17:48:18', '2025-07-05 17:48:18', NULL),
(5, 'Vehicles', 'College cars, vans, motorcycles, and buses', '2025-07-05 17:48:18', '2025-07-05 17:48:18', NULL),
(6, 'Library Materials', 'Books, journals, shelves, and library computers', '2025-07-05 17:48:18', '2025-07-05 17:48:18', NULL),
(7, 'Office Equipment', 'Photocopiers, shredders, laminators, typewriters', '2025-07-05 17:48:18', '2025-07-05 17:48:18', NULL),
(8, 'Buildings', 'Lecture halls, admin blocks, hostels, etc.', '2025-07-05 17:48:18', '2025-07-05 17:48:18', NULL),
(9, 'Power Equipment', 'Generators, UPS, solar panels, stabilizers', '2025-07-05 17:48:18', '2025-07-05 17:48:18', NULL),
(10, 'Sports Facilities', 'Gym, sports equipment, playground structures', '2025-07-05 17:48:18', '2025-07-05 17:48:18', NULL),
(11, 'Testing', 'Majaribio tu hakuna la maana', '2025-07-05 15:21:32', '2025-07-05 15:25:02', '2025-07-05 15:25:02'),
(16, 'plastic item', 'plastic chairs, tables', '2025-08-05 09:51:01', '2025-08-05 09:51:37', '2025-08-05 09:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Business Administration', '2025-07-05 16:13:45', '2025-07-29 12:00:20', NULL),
(2, 'Accountancy', '2025-07-05 16:13:45', '2025-07-05 16:13:45', NULL),
(3, 'Procurement and Supply', '2025-07-05 16:13:45', '2025-08-05 09:38:50', NULL),
(4, 'Marketing', '2025-07-05 16:13:45', '2025-07-05 16:13:45', NULL),
(5, 'ICT and Mathematics', '2025-07-05 16:13:45', '2025-07-05 16:13:45', NULL),
(6, 'Legal Studies', '2025-07-05 16:13:45', '2025-07-05 16:13:45', NULL),
(7, 'General Studies', '2025-07-05 16:13:45', '2025-07-05 16:13:45', NULL),
(8, 'Research and Publications', '2025-07-05 16:13:45', '2025-07-05 16:13:45', NULL),
(9, 'Library and Information Management', '2025-07-05 16:13:45', '2025-07-05 14:50:15', NULL),
(12, 'Human Resource', '2025-07-29 08:17:35', '2025-07-29 08:17:35', NULL),
(13, 'Maintenance', '2025-08-05 09:37:10', '2025-08-05 09:37:56', '2025-08-05 09:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lab A - Room 1', '2025-07-11 10:35:39', '2025-07-12 06:20:12', NULL),
(2, 'Lab A - Room 2', '2025-07-11 10:35:39', '2025-07-11 10:35:39', NULL),
(3, 'Lab A - Room 3', '2025-07-11 10:35:39', '2025-07-11 10:35:39', NULL),
(4, 'Lab B - Room 1', '2025-07-11 10:35:39', '2025-07-11 10:35:39', NULL),
(5, 'Lab B - Room 2', '2025-07-11 10:35:39', '2025-07-11 10:35:39', NULL),
(6, 'Lecture Hall A', '2025-07-11 10:35:39', '2025-07-11 10:35:39', NULL),
(7, 'Lecture Hall B', '2025-07-11 10:35:39', '2025-07-11 10:35:39', NULL),
(8, 'Lecture Hall C', '2025-07-11 10:35:39', '2025-07-11 10:35:39', NULL),
(9, 'Library Main Hall', '2025-07-11 10:35:39', '2025-07-11 10:35:39', NULL),
(10, 'Library Reading Room', '2025-07-11 10:35:39', '2025-07-11 10:35:39', NULL),
(11, 'Administration Office 1', '2025-07-11 10:35:39', '2025-07-11 10:35:39', NULL),
(12, 'Administration Office 2', '2025-07-11 10:35:39', '2025-07-11 10:35:39', NULL),
(13, 'Dean\'s Office', '2025-07-11 10:35:39', '2025-07-11 10:35:39', NULL),
(14, 'Store Room 1', '2025-07-11 10:35:39', '2025-07-11 10:35:39', NULL),
(15, 'Store Room 2', '2025-07-11 10:35:39', '2025-07-11 10:35:39', NULL),
(16, 'Accounts Office', '2025-07-11 10:35:39', '2025-07-11 10:35:39', NULL),
(17, 'Staff Office 1', '2025-07-11 10:35:39', '2025-07-11 10:35:39', NULL),
(18, 'Staff Office 2', '2025-07-11 10:35:39', '2025-07-11 10:35:39', NULL),
(19, 'Admission Office', '2025-07-11 09:05:04', '2025-07-11 09:05:49', '2025-07-11 09:05:49'),
(20, 'B2 -  8', '2025-08-05 09:55:41', '2025-08-05 09:56:23', '2025-08-05 09:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_requests`
--

CREATE TABLE `maintenance_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `asset_id` int(11) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL,
  `issue` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `location_id` int(11) NOT NULL,
  `reported_at` timestamp NULL DEFAULT current_timestamp(),
  `resolved_at` timestamp NULL DEFAULT NULL,
  `closed_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `submitted_by` int(11) DEFAULT NULL,
  `submitted_at` timestamp NULL DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT NULL,
  `reviewed_by` int(11) DEFAULT NULL,
  `reviewed_at` timestamp NULL DEFAULT NULL,
  `request_id` varchar(255) DEFAULT NULL,
  `reject_comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenance_requests`
--

INSERT INTO `maintenance_requests` (`id`, `user_id`, `asset_id`, `department_id`, `issue`, `status`, `location_id`, `reported_at`, `resolved_at`, `closed_at`, `created_at`, `updated_at`, `deleted_at`, `submitted_by`, `submitted_at`, `is_approved`, `reviewed_by`, `reviewed_at`, `request_id`, `reject_comment`) VALUES
(1, 2, 2, 2, 'broken printer', 'Resolved', 1, '2025-08-07 07:47:51', '2025-08-07 07:50:00', NULL, '2025-08-07 07:47:51', '2025-08-07 07:50:00', NULL, 2, '2025-08-07 07:48:03', 1, 1, '2025-08-07 07:49:35', 'REQ-1754552871', NULL);

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
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_07_27_213058_addColumnDeparmentId', 1),
(2, '2025_07_27_234823_addRequestNumber', 1),
(3, '2025_07_28_213842_addColumnRejectComment', 2),
(4, '2014_10_12_100000_create_password_resets_table', 3),
(5, '2019_08_19_000000_create_failed_jobs_table', 3),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(7, '2025_07_02_202845_create_role_user_table', 3),
(8, '2025_08_04_224819_add_column_closed_at', 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '2025-03-02 16:44:30', '2025-07-15 11:09:51', NULL),
(2, 'Maintenance Officer', '2025-03-09 14:33:07', '2025-08-04 20:31:24', NULL),
(3, 'Student', '2025-06-03 13:57:39', '2025-07-15 11:29:28', NULL),
(9, 'HOD 2', '2025-08-05 09:57:13', '2025-08-05 09:57:31', '2025-08-05 09:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 3,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `gender` tinytext NOT NULL,
  `password` varchar(100) NOT NULL,
  `department_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `phone_number`, `email`, `gender`, `password`, `department_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'James', 'Paul', '0765392816', 'pawgraphix@gmail.com', 'Male', '$2y$10$AIJudWC7kJpfFJCxyaLlIu9SEsSZBjojTkjQgjZw.Zc2JEHlnmqw.', 5, '2025-07-15 07:35:18', '2025-08-07 03:05:24', NULL),
(2, 3, 'Omega', 'Nemes', '0657362817', 'omegakavishe5@gmail.com', 'Female', '$2y$10$W2Z4L4joOpvJNj0UuLCLVeSUHRPSUmoBrcCbCTp.s30rHJ9Hsywj.', 2, '2025-07-15 07:37:19', '2025-07-28 12:23:51', NULL),
(3, 1, 'Suzy', 'John', '0622376278', 'suzyanaljonh@gmail.com', 'Female', '$2y$10$zwk0f/QS9XUu43Hc9PhES.7D9v0yLvyy8mXmEbHyl/2s9R5IBV38a', 12, '2025-07-15 08:00:02', '2025-08-05 10:06:59', NULL),
(24, 2, 'Gabriel', 'Joseph', '0787695093', 'gabriel@gmail.com', 'Male', '$2y$10$JvURZFX07W6aGkFZUmEQ6OK3I1eEbIedh0/zchUExMFx8S2XP7IxC', 1, '2025-07-15 15:36:02', '2025-08-05 10:21:21', '2025-08-05 10:21:21'),
(31, 3, 'KIPALA', 'PESA', '0784537123', 'kipala@gmail.com', 'Male', '$2y$10$wE2YF8oYSqOvkNGrgXKBsuxkmMLcYijcQnoydtPPK25VrkKYpVJju', 2, '2025-07-28 13:35:43', '2025-08-05 10:19:30', '2025-08-05 10:19:30'),
(32, 2, 'suzanna', 'Joseph', '0789654732', 'suzyanaljonh@gmail.com', 'Female', '$2y$10$jbGtMOmr0ToBQdbJFDYJcORP95RNT3dT4uFUlk4s4R5KkIgbDkPYm', 2, '2025-07-28 13:53:10', '2025-08-05 10:19:32', '2025-08-05 10:19:32'),
(33, 2, 'Joshua', 'Cooke', '0776954321', 'joshua@gmail.com', 'Male', '$2y$10$43PtMARRhLrHKxfUBr..cenHLYKaktCVeSlUdY00/tJMnBfOQreS2', 3, '2025-07-29 08:21:48', '2025-08-05 10:19:33', '2025-08-05 10:19:33'),
(34, 2, 'Adam', 'Woodward', '0689745321', 'adam@gmail.com', 'Male', '$2y$10$oIzeAvXNLUw05LrK3zkVke/9G3HYwxd426yDT5obs3Afw2R5cYuoe', 4, '2025-07-29 08:24:10', '2025-08-05 10:19:35', '2025-08-05 10:19:35'),
(35, 2, 'Halima', 'Ramadhan', '0765432457', 'halima@gmail.com', 'Female', '$2y$10$2I7svEf0iZ0zyiCnBB1Hj.sMtMSYUO0oBk4eksNLyGNJmNFFyYqxW', 6, '2025-07-29 08:25:26', '2025-08-05 10:19:37', '2025-08-05 10:19:37'),
(36, 2, 'Burton', 'Howell', '0657978654', 'burton@gmail.com', 'Male', '$2y$10$rIzDQtkjEty1GoSu0vlPHOSYT7LJMsF6XnCjHOLYUJyJDLRLAQA1C', 7, '2025-07-29 08:27:11', '2025-08-05 10:19:38', '2025-08-05 10:19:38'),
(37, 2, 'Glory', 'James', '0789675453', 'glory@gmail.com', 'Female', '$2y$10$IhS0oTgLQoyWDiCht2Cxaez89taZV4gAVlBuB5hoAxY/cCjwaBxEW', 8, '2025-07-29 08:28:57', '2025-08-05 10:19:40', '2025-08-05 10:19:40'),
(38, 2, 'Noel', 'Paul', '0768546342', 'noel@gmail.com', 'Male', '$2y$10$t9L1nCcPgxfApX8DK4rKQeBhwKyS4.wgbAbGxbAbzgeb8KRJRV2RO', 9, '2025-07-29 08:31:58', '2025-08-05 10:19:41', '2025-08-05 10:19:41'),
(39, 2, 'Francis', 'George', '0678547369', 'francis@gmail.com', 'Male', '$2y$10$NJhJ9CwXmOkQNGDAuGrsN.Oyzpk/MsHYk2Qz9BsvxGanOsxzTHKDi', 12, '2025-07-29 08:34:31', '2025-08-05 10:19:43', '2025-08-05 10:19:43'),
(40, 3, '12', '12', 'abc', '12@12.com', 'male', '$2y$10$JU6CGosbOQ.JrVYOFmNnRuE5vwY36kXVrnBxfS4S7AdZnGS1e4jNW', 5, '2025-07-31 09:42:10', '2025-08-05 10:19:44', '2025-08-05 10:19:44'),
(41, 3, 'Rylee', 'Chapman', '0787647837', 'ryan@gmail.com', 'Male', '$2y$10$qCvaQUQqoXYmbpTMB/ItYeiglG5JAONuWOT8pUt9EYsagMR17OMLO', 7, '2025-08-05 09:29:37', '2025-08-05 10:19:45', '2025-08-05 10:19:45'),
(42, 3, 'Helen', 'Palmer', '0789878675', 'helen1@gmail.com', 'Female', '$2y$10$aCtDy4JQ/pvTgMDssSzpxemzCWkYMiWcNlSechHdOtsaAyT9qrNUC', 6, '2025-08-05 09:32:44', '2025-08-05 10:19:47', '2025-08-05 10:19:47'),
(43, 3, 'Amelia', 'Hamilton', '0789847367', 'onana@gmail.com', 'Female', '$2y$10$d0aL1UrS.AAgyrk.3XkX2uCiqEvZ3DpYSeYeN9hY/w0S4i6Obsn2K', 3, '2025-08-05 11:47:04', '2025-08-05 12:02:14', '2025-08-05 12:02:14'),
(44, 3, 'Aaron', 'Bowman', '0789898767', 'aaron@gmail.com', 'Female', '$2y$10$DHgurIhP/Gl3vEV8itR.AurW.jDgJdVIW0Eo1PItjoGzBhRYVp3b.', 12, '2025-08-06 10:49:05', '2025-08-06 10:53:23', '2025-08-06 10:53:23'),
(45, 3, 'JUMA', 'ABDUL', '0765782310', 'juma@gmail.com', 'Male', '$2y$10$Sz1Keqj7PVhQgh.nBBnWKetEETcDXzg5UhML5FDaP20oewdrMMMJy', 5, '2025-08-06 15:11:20', '2025-08-06 20:54:19', '2025-08-06 20:54:19'),
(46, 3, 'Laurel', 'Cox', '0789879867', 'dinibamawa@mailinator.com', 'Male', '$2y$10$pD5b4mzU5fG/9zVLkAqVVezo0.D3tYtFebQ2uuj0G9cyVQRHWZ.Hi', 4, '2025-08-06 20:52:29', '2025-08-06 20:54:17', '2025-08-06 20:54:17'),
(47, 1, 'Jenna', 'Hayes', '0879898767', 'libelydeq@mailinator.com', 'Female', '$2y$10$taHinxEKINiH9XMRjUzPRudTc2rfCj8x2kzgGbLv2UYw2ZB2nHM.6', 2, '2025-08-06 20:53:21', '2025-08-06 20:54:13', '2025-08-06 20:54:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `asset_category_id` (`asset_category_id`),
  ADD KEY `assets_ibfk_3` (`location_id`);

--
-- Indexes for table `asset_categories`
--
ALTER TABLE `asset_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_requests`
--
ALTER TABLE `maintenance_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_asset` (`asset_id`),
  ADD KEY `fk_user` (`user_id`),
  ADD KEY `fk_location` (`location_id`),
  ADD KEY `submitted_by` (`submitted_by`),
  ADD KEY `reviewed_by` (`reviewed_by`),
  ADD KEY `maintenance_requests_department_id_foreign` (`department_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_role_id` (`role_id`),
  ADD KEY `fk_users_department_id` (`department_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `asset_categories`
--
ALTER TABLE `asset_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `maintenance_requests`
--
ALTER TABLE `maintenance_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `assets_ibfk_2` FOREIGN KEY (`asset_category_id`) REFERENCES `asset_categories` (`id`),
  ADD CONSTRAINT `assets_ibfk_3` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);

--
-- Constraints for table `maintenance_requests`
--
ALTER TABLE `maintenance_requests`
  ADD CONSTRAINT `fk_asset` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`),
  ADD CONSTRAINT `fk_location` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `maintenance_requests_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `maintenance_requests_ibfk_1` FOREIGN KEY (`submitted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `maintenance_requests_ibfk_2` FOREIGN KEY (`reviewed_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

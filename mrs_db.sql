-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2025 at 08:01 PM
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
(1, 'HP ProBook 450', 1, 'CBE-ICT-001', '2022', 5, 3, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(2, 'Epson Printer', 2, 'CBE-ACT-004', '2021', 2, 3, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(3, 'Wooden Desk', 5, 'CBE-FUR-027', '2020', 5, 1, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(4, 'Library Bookshelf', 6, 'CBE-LIB-009', '2019', 6, 6, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(5, 'LED Projector', 3, 'CBE-MKT-015', '2023', 4, 2, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(6, 'Dell Desktop', 4, 'CBE-ICT-022', '2022', 5, 3, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(7, 'Office Chair', 1, 'CBE-PS-033', '2020', 3, 1, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(8, 'Photocopier', 5, 'CBE-GEN-050', '2021', 1, 7, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(9, 'Hp Monitor', 2, 'Lab A - Room 5', '2010', 5, 3, '2025-07-07 11:56:14', '2025-07-07 12:15:08', NULL),
(10, 'Wardrobe', 6, 'CBE-LIB-011', '2018', 9, 6, '2025-07-07 12:42:31', '2025-07-07 12:42:34', '2025-07-07 12:42:34');

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
(11, 'Testing', 'Majaribio tu hakuna la maana', '2025-07-05 15:21:32', '2025-07-05 15:25:02', '2025-07-05 15:25:02');

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
(1, 'Business Administration', '2025-07-05 16:13:45', '2025-07-05 16:13:45', NULL),
(2, 'Accountancy', '2025-07-05 16:13:45', '2025-07-05 16:13:45', NULL),
(3, 'Procurement and Supply', '2025-07-05 16:13:45', '2025-07-05 16:13:45', NULL),
(4, 'Marketing', '2025-07-05 16:13:45', '2025-07-05 16:13:45', NULL),
(5, 'ICT and Mathematics', '2025-07-05 16:13:45', '2025-07-05 16:13:45', NULL),
(6, 'Legal Studies', '2025-07-05 16:13:45', '2025-07-05 16:13:45', NULL),
(7, 'General Studies', '2025-07-05 16:13:45', '2025-07-05 16:13:45', NULL),
(8, 'Research and Publications', '2025-07-05 16:13:45', '2025-07-05 16:13:45', NULL),
(9, 'Library and Information Management', '2025-07-05 16:13:45', '2025-07-05 14:50:15', NULL);

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
(19, 'Admission Office', '2025-07-11 09:05:04', '2025-07-11 09:05:49', '2025-07-11 09:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_requests`
--

CREATE TABLE `maintenance_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `asset_id` int(11) UNSIGNED NOT NULL,
  `issue` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `location_id` int(11) NOT NULL,
  `reported_at` timestamp NULL DEFAULT current_timestamp(),
  `resolved_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `submitted_by` int(11) DEFAULT NULL,
  `submitted_at` timestamp NULL DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT NULL,
  `reviewed_by` int(11) DEFAULT NULL,
  `reviewed_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenance_requests`
--

INSERT INTO `maintenance_requests` (`id`, `user_id`, `asset_id`, `issue`, `status`, `location_id`, `reported_at`, `resolved_at`, `created_at`, `updated_at`, `deleted_at`, `submitted_by`, `submitted_at`, `is_approved`, `reviewed_by`, `reviewed_at`) VALUES
(2, 2, 6, 'screen inaonyesha giza', 'Resolved', 2, '2025-07-07 15:24:33', '2025-07-13 18:36:07', '2025-07-07 15:24:33', '2025-07-26 19:05:12', NULL, 2, '2025-07-13 13:47:57', 1, 3, '2025-07-13 14:09:54'),
(3, 2, 3, 'Sunt et labore quia', 'Approved', 5, '2025-07-07 19:14:56', NULL, '2025-07-07 16:14:56', '2025-07-26 10:07:38', NULL, 2, '2025-07-15 16:13:29', 1, 1, '2025-07-26 10:07:38'),
(4, 2, 3, 'Mguu mmoja mbovu', 'Submitted', 7, '2025-07-07 20:25:13', '2025-07-15 15:02:02', '2025-07-07 17:25:13', '2025-07-26 18:04:43', NULL, 2, '2025-07-26 18:04:43', 1, 3, '2025-07-15 15:01:22'),
(5, 2, 2, 'Qui est distinctio', 'Submitted', 13, '2025-07-15 11:46:20', NULL, '2025-07-15 11:46:20', '2025-07-26 19:05:17', NULL, 2, NULL, NULL, 3, NULL),
(6, 14, 4, 'broken', 'Approved', 3, '2025-07-15 15:15:29', NULL, '2025-07-15 15:15:29', '2025-07-26 10:07:59', NULL, 2, '2025-07-15 16:33:09', 1, 1, '2025-07-26 10:07:59'),
(7, 2, 1, 'ha ha ha', 'pending', 4, '2025-07-26 18:26:23', NULL, '2025-07-26 18:26:23', '2025-07-26 19:05:22', NULL, NULL, NULL, NULL, 1, NULL),
(8, 2, 3, 'Imevunjikaaaaa', 'pending', 6, '2025-07-26 18:53:56', NULL, '2025-07-26 18:53:56', '2025-07-26 19:05:26', NULL, NULL, NULL, NULL, 3, NULL),
(9, 2, 2, 'Imeharibika', 'pending', 1, '2025-07-26 19:06:49', NULL, '2025-07-26 19:06:49', '2025-07-26 19:06:49', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 2, 1, 'Halaaaa', 'pending', 6, '2025-07-26 19:08:37', NULL, '2025-07-26 19:08:37', '2025-07-26 19:08:37', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 2, 8, 'Halaaa', 'pending', 7, '2025-07-26 19:09:50', NULL, '2025-07-26 19:09:50', '2025-07-26 19:09:50', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 2, 3, 'hellooo', 'pending', 2, '2025-07-26 19:10:34', NULL, '2025-07-26 19:10:34', '2025-07-26 19:10:34', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 2, 6, 'Duuh', 'pending', 15, '2025-07-26 19:12:45', NULL, '2025-07-26 19:12:45', '2025-07-26 19:12:45', NULL, NULL, NULL, NULL, NULL, NULL);

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
(2, 'HoD', '2025-03-09 14:33:07', '2025-07-26 10:17:55', NULL),
(3, 'Student', '2025-06-03 13:57:39', '2025-07-15 11:29:28', NULL);

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
(1, 2, 'James', 'Paul', '0765392816', 'pawgraphix@gmail.com', 'male', '$2y$10$wE2YF8oYSqOvkNGrgXKBsuxkmMLcYijcQnoydtPPK25VrkKYpVJju', 5, '2025-07-15 07:35:18', '2025-07-15 15:19:58', NULL),
(2, 3, 'Omega', 'Nemes', '0657362817', 'omega255@gmail.com', 'female', '$2y$10$W2Z4L4joOpvJNj0UuLCLVeSUHRPSUmoBrcCbCTp.s30rHJ9Hsywj.', 2, '2025-07-15 07:37:19', '2025-07-15 08:14:36', NULL),
(3, 2, 'Suzy', 'John', '0622376278', 'suzyanaljonh@gmail.com', 'female', '$2y$10$zwk0f/QS9XUu43Hc9PhES.7D9v0yLvyy8mXmEbHyl/2s9R5IBV38a', 1, '2025-07-15 08:00:02', '2025-07-26 18:52:50', NULL),
(4, 3, 'Guinevere', 'Mcclure', '0782918627', 'mfano@gmail.com', 'female', '$2y$10$kI41YAYg.S5thS5oZA5YsOMyxFqoKIoC83AA8pYPCtYAY2t0JCnw6', 5, '2025-07-15 08:31:33', '2025-07-15 08:31:33', NULL),
(14, 1, 'Kipajo', 'Kivuli', '0789654732', 'kipajo@gmail.com', 'male', '$2y$10$Yu1LKPhBQnaAOftq/Vf8oeQaUBTVkIy/RVHvf7kGkS1TRE9fflYIq', 7, '2025-07-15 15:14:05', '2025-07-26 19:11:43', NULL),
(23, 2, 'Linda', 'Mussa', '0700000001', 'linda.mussa@cbe.ac.tz', 'female', '$2y$10$JvURZFX07W6aGkFZUmEQ6OK3I1eEbIedh0/zchUExMFx8S2XP7IxC', 1, '2025-07-15 15:36:02', '2025-07-15 15:36:02', NULL),
(24, 2, 'Daniel', 'Joseph', '0700000002', 'daniel.joseph@cbe.ac.tz', 'male', '$2y$10$JvURZFX07W6aGkFZUmEQ6OK3I1eEbIedh0/zchUExMFx8S2XP7IxC', 2, '2025-07-15 15:36:02', '2025-07-15 15:36:02', NULL),
(25, 2, 'Faith', 'Andrew', '0700000003', 'faith.andrew@cbe.ac.tz', 'female', '$2y$10$JvURZFX07W6aGkFZUmEQ6OK3I1eEbIedh0/zchUExMFx8S2XP7IxC', 3, '2025-07-15 15:36:02', '2025-07-15 15:36:02', NULL),
(26, 2, 'George', 'Lameck', '0700000004', 'george.lameck@cbe.ac.tz', 'male', '$2y$10$JvURZFX07W6aGkFZUmEQ6OK3I1eEbIedh0/zchUExMFx8S2XP7IxC', 4, '2025-07-15 15:36:02', '2025-07-15 15:36:02', NULL),
(27, 2, 'Dogo', 'Janja', '0700000006', 'jimmy@gmail.com', 'male', '$2y$10$JvURZFX07W6aGkFZUmEQ6OK3I1eEbIedh0/zchUExMFx8S2XP7IxC', 6, '2025-07-15 15:36:02', '2025-07-26 18:14:05', NULL),
(28, 2, 'Esther', 'Mwakalinga', '0700000007', 'esther.mwakalinga@cbe.ac.tz', 'female', '$2y$10$JvURZFX07W6aGkFZUmEQ6OK3I1eEbIedh0/zchUExMFx8S2XP7IxC', 7, '2025-07-15 15:36:02', '2025-07-15 15:36:02', NULL),
(29, 2, 'Felix', 'Chacha', '0700000008', 'felix.chacha@cbe.ac.tz', 'male', '$2y$10$JvURZFX07W6aGkFZUmEQ6OK3I1eEbIedh0/zchUExMFx8S2XP7IxC', 8, '2025-07-15 15:36:02', '2025-07-15 15:36:02', NULL),
(30, 2, 'Dogo', 'Janja', '0789276351', 'jiminho360@gmail.com', 'male', '$2y$10$G1nYQzJ4NMfe.HQV.s88qu8kUvGzGfihDX2YCjjaq/.7TUCrl0yyC', 7, '2025-07-26 18:14:41', '2025-07-26 18:15:41', NULL);

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
  ADD KEY `reviewed_by` (`reviewed_by`);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `asset_categories`
--
ALTER TABLE `asset_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `maintenance_requests`
--
ALTER TABLE `maintenance_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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

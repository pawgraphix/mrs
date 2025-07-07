-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2025 at 05:43 PM
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
  `location` varchar(255) DEFAULT NULL,
  `registration_number` varchar(100) DEFAULT NULL,
  `year_of_purchase` year(4) DEFAULT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `asset_category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `name`, `location`, `registration_number`, `year_of_purchase`, `department_id`, `asset_category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'HP ProBook 450', 'Lab A - Room 5', 'CBE-ICT-001', '2022', 5, 3, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(2, 'Epson Printer', 'Accounts Office', 'CBE-ACT-004', '2021', 2, 3, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(3, 'Wooden Desk', 'Office 202', 'CBE-FUR-027', '2020', 1, 1, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(4, 'Library Bookshelf', 'Library Block B', 'CBE-LIB-009', '2019', 6, 6, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(5, 'LED Projector', 'Lecture Hall 1', 'CBE-MKT-015', '2023', 4, 2, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(6, 'Dell Desktop', 'Admin Block', 'CBE-ICT-022', '2022', 5, 3, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(7, 'Office Chair', 'Procurement Room', 'CBE-PS-033', '2020', 3, 1, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(8, 'Photocopier', 'Registry Office', 'CBE-GEN-050', '2021', 7, 7, '2025-07-05 18:39:43', '2025-07-05 18:39:43', NULL),
(9, 'Hp Monitor', 'Lab A - Room 5', 'Lab A - Room 5', '2010', 5, 3, '2025-07-07 11:56:14', '2025-07-07 12:15:08', NULL),
(10, 'Wardrobe', 'Library Block B', 'CBE-LIB-011', '2018', 9, 6, '2025-07-07 12:42:31', '2025-07-07 12:42:34', '2025-07-07 12:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `asset_categories`
--

CREATE TABLE `asset_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
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
  `id` int(10) UNSIGNED NOT NULL,
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
(9, 'Library and Information Management', '2025-07-05 16:13:45', '2025-07-05 14:50:15', NULL),
(10, 'Schoo', '2025-07-05 14:09:29', '2025-07-05 14:12:39', '2025-07-05 14:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_requests`
--

CREATE TABLE `maintenance_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `asset_id` int(11) UNSIGNED NOT NULL,
  `issue` text NOT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `reported_at` timestamp NULL DEFAULT current_timestamp(),
  `resolved_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenance_requests`
--

INSERT INTO `maintenance_requests` (`id`, `user_id`, `asset_id`, `issue`, `status`, `reported_at`, `resolved_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 16, 6, 'screen inaonyesha giza', 'pending', '2025-07-07 15:24:33', NULL, '2025-07-07 15:24:33', '2025-07-07 15:33:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Admin', '2025-03-02 16:44:30', '2025-04-22 04:13:31', NULL),
(2, 'HoD', '2025-03-09 14:33:07', '2025-03-27 12:39:54', NULL),
(3, 'User', '2025-06-03 13:57:39', '2025-06-03 13:57:43', '2025-06-03 13:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 6, 3, '2025-07-02 23:50:48', '2025-07-03 00:20:13', NULL),
(3, 11, 3, '2025-07-02 23:51:02', '2025-07-02 23:51:02', NULL),
(4, 12, 3, '2025-07-02 23:54:25', '2025-07-02 23:54:25', NULL),
(6, 14, 3, '2025-07-03 00:33:08', '2025-07-03 00:33:08', NULL),
(7, 15, 3, '2025-07-03 00:33:13', '2025-07-03 00:33:13', NULL),
(8, 16, 3, '2025-07-03 00:34:15', '2025-07-03 00:34:15', NULL),
(9, 17, 3, '2025-07-03 00:34:48', '2025-07-03 00:34:48', NULL);

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `phone_number`, `email`, `gender`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 3, 'James', 'Paul', '+1 (875) 494-6392', 'jimmy@gmail.com', 'Male', '$2y$10$3XiqQrdrK5sqNJZunHm.rOhrOVmbCI3w.IrwFF9s943k2aP/UWVQO', '2025-03-27 15:18:34', '2025-07-03 00:25:08', NULL),
(7, 3, 'Zahir', 'Chandler', '+1 (769) 961-1297', 'Zahir@gmail.com', 'Male', '$2y$10$5vxITAjDVFTRlcWmoUhDFOVYV4.yVtWn2J77eDBg1bB0CRdxdV6ia', '2025-05-23 07:33:56', '2025-07-03 00:25:08', NULL),
(10, 3, 'Bruno', 'Cardenas', '+1 (841) 846-4986', 'vyzobokicu@mailinator.com', 'female', '$2y$10$reCLEypptxUr7DqePVJXwuvctXJmlH.xGUbgTgQhCnHVgPjijxFsm', '2025-07-02 20:50:48', '2025-07-03 00:25:08', NULL),
(11, 3, 'Kyle', 'Collier', '+1 (944) 846-7445', 'sylizypify@mailinator.com', 'male', '$2y$10$VDmOQ7X7I1u2CX3Z3a/whuNSszsd3rC/a.4C0nnfMAe5I0vea.Hz.', '2025-07-02 20:51:02', '2025-07-03 00:25:08', NULL),
(12, 3, 'Quynn', 'Harrington', '+1 (942) 772-4111', 'zalurad@mailinator.com', 'male', '$2y$10$g9m0BTH5aQzIkSpjUQ77xunC48Yw0AAAMrnbc9Q5wXDkEEQlIVRxW', '2025-07-02 20:54:25', '2025-07-03 00:25:08', NULL),
(14, 3, 'Tamara', 'Fitzpatrick', '+1 (866) 914-9567', 'nilawij@mailinator.com', 'male', '$2y$10$cBzu5/fhp2CUDSVxEkCFy.uz3Rva9m0qgsWPbjfxOCkW4a//Gt0xe', '2025-07-02 21:33:08', '2025-07-02 21:33:08', NULL),
(15, 3, 'David', 'Meyers', '+1 (832) 473-2238', 'karimokeca@mailinator.com', 'male', '$2y$10$o41zXU4bFusB4h0YPB9rUulFcArpOdHLqKVFpVXVo8GklzNxQnJtC', '2025-07-02 21:33:13', '2025-07-02 21:33:13', NULL),
(16, 3, 'Berk', 'Suarez', '+1 (904) 709-2798', 'rudegaf@mailinator.com', 'female', '$2y$10$A7FGvZ3FxBVVCcznIhnBc.yPwkRLAZ0aAKHnfv2yzKB6h3hZJpRRW', '2025-07-02 21:34:15', '2025-07-02 21:34:15', NULL),
(17, 3, 'Yvette', 'Odonnell', '+1 (964) 859-8817', 'kedosolo@mailinator.com', 'male', '$2y$10$HbiMBRVYg6qFtadq46x95O2MbY0FaE44cCekdQ55recFJOS0pmoRm', '2025-07-02 21:34:48', '2025-07-02 21:34:48', NULL),
(18, 3, 'Graiden', 'Knapp', '+1 (497) 275-8662', 'vedonu@mailinator.com', 'female', '$2y$10$PSR47cp4tRxq4txzT7jGZOQ9ieSplg.NteYBW2YfReVpG6ZSMv7Fm', '2025-07-05 08:04:29', '2025-07-05 08:04:29', NULL),
(19, 3, 'Bryar', 'Frost', '+1 (423) 689-1803', 'nuvec@mailinator.com', 'female', '$2y$10$RyeghwtRx79K21BsvaFTgOzGIjOwSBg1sXpCMHtBd9Ecb/S1TC7Ge', '2025-07-05 08:04:48', '2025-07-05 08:04:48', NULL),
(20, 3, 'Brenda', 'Cain', '+1 (535) 593-6514', 'diqyxisiw@mailinator.com', 'male', '$2y$10$LgW6QIHzFpy3Kitr/oLZfes9RF2GUT81saRi6st9zpH9yWDedy/k.', '2025-07-05 08:04:55', '2025-07-05 08:04:55', NULL),
(21, 3, 'Lydia', 'Lynch', '+1 (708) 698-9114', 'xynujif@mailinator.com', 'male', '$2y$10$6DqewfDu29uth1XxuEaSS.Fec/HWJQiwmeTZJ1X45YzRNqGUlkQTe', '2025-07-05 08:09:08', '2025-07-05 08:09:08', NULL),
(22, 3, 'Nigel', 'Blair', '+1 (494) 808-8164', 'mucowazegi@mailinator.com', 'female', '$2y$10$HzkAiqwAqHPsZcQhdaID0exyMSTc///xuN/b/S8D3IjIuxLD0d3sa', '2025-07-05 08:10:30', '2025-07-05 08:10:30', NULL),
(23, 3, 'Lael', 'Gates', '+1 (649) 647-7687', 'hijis@mailinator.com', 'female', '$2y$10$4u/95.amVHcbOpYr5Uu2DOqIEWVGwktnECZr9HTdCrA2Z3.GjLoIy', '2025-07-05 08:10:56', '2025-07-05 08:10:56', NULL),
(24, 3, 'Perry', 'Collins', '+1 (262) 678-2083', 'guhuzel@mailinator.com', 'male', '$2y$10$d93.fqwDVndbj.OuYdeufu.4SbQUstJ6uTKigwzRtbWZfkZc4W0gW', '2025-07-05 08:13:24', '2025-07-05 08:13:24', NULL),
(25, 3, 'Mari', 'Wolfe', '+1 (257) 931-9296', 'wafog@mailinator.com', 'male', '$2y$10$8JEoS4trL5i3ugiE/OO5NuueXTTk4DeyCMvao/YQcW4a856x1cYaq', '2025-07-05 08:14:52', '2025-07-05 08:14:52', NULL),
(26, 3, 'Patricia', 'Bradford', '+1 (756) 248-2225', 'sifobyq@mailinator.com', 'male', '$2y$10$zqaqOxYcMRd6tqy1ARH07.J2rb0bPxr5xQnm/rtV8bUf91qdHn8.e', '2025-07-05 08:15:45', '2025-07-05 08:15:45', NULL),
(27, 3, 'Chancellor', 'Montoya', '+1 (671) 369-6899', 'fawuje@mailinator.com', 'female', '$2y$10$xiXtyznbRIJja53wkDw1a.2cLDwZdxkPz56VWmz2ptJQLCmgIQxG.', '2025-07-05 08:16:23', '2025-07-05 08:16:23', NULL),
(28, 3, 'Whitney', 'Leblanc', '+1 (317) 208-8218', 'xegyku@mailinator.com', 'female', '$2y$10$1H.VpB/vuFc1JzV0dAUxyegd72NEx4iShV9XpywZQzlTn2YeFnRqG', '2025-07-05 08:17:43', '2025-07-05 08:17:43', NULL),
(29, 3, 'Maria', 'Abunuasi', '0763976000', 'abunuasimaria8@gmail.com', 'male', '$2y$10$5U9RevxlKNErIpSMyb9ceu8VxRQCFBb2IMyqUA0EFs0jnlRW/GJsC', '2025-07-05 09:35:32', '2025-07-05 09:35:32', NULL),
(30, 3, 'James', 'Rodriquez', '+1 (941) 295-9381', 'james@gmail.com', 'male', '$2y$10$Mf6vTDpYW.py//q/ji.YBusfr5taBYlYD8fLXoBGP3mVCCKVVLhoi', '2025-07-05 12:35:43', '2025-07-05 12:35:43', NULL),
(31, 3, 'Alexa', 'Harrington', '+1 (478) 507-8117', 'remyvy@mailinator.com', 'female', '$2y$10$9zOQHD7Scfys1RfwClp78ePxvCP//HnHzuxd9zUgauzRAGsi46ufO', '2025-07-06 13:57:09', '2025-07-06 13:57:09', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registration_number` (`registration_number`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `asset_category_id` (`asset_category_id`);

--
-- Indexes for table `asset_categories`
--
ALTER TABLE `asset_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `maintenance_requests`
--
ALTER TABLE `maintenance_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_asset` (`asset_id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_role_id` (`role_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `maintenance_requests`
--
ALTER TABLE `maintenance_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `assets_ibfk_2` FOREIGN KEY (`asset_category_id`) REFERENCES `asset_categories` (`id`);

--
-- Constraints for table `maintenance_requests`
--
ALTER TABLE `maintenance_requests`
  ADD CONSTRAINT `fk_asset` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

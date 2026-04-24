-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql100.infinityfree.com
-- Generation Time: Apr 24, 2026 at 05:15 AM
-- Server version: 11.4.10-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_41729749_student`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resource_title` varchar(200) DEFAULT NULL,
  `resource_url` varchar(500) DEFAULT NULL,
  `resource_icon` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `user_id`, `resource_title`, `resource_url`, `resource_icon`, `created_at`) VALUES
(2, 2, 'Document Checklist', 'https://www.documentchecklist.com/studyabroad', 'fas fa-check-square', '2026-04-22 17:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

CREATE TABLE `consultations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `preferred_date` date DEFAULT NULL,
  `preferred_time` varchar(20) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultations`
--

INSERT INTO `consultations` (`id`, `user_id`, `name`, `email`, `phone`, `country`, `preferred_date`, `preferred_time`, `message`, `status`, `created_at`) VALUES
(1, NULL, 'Md Rayhan', 'mdrayhan.mr1040@gmail.com', '01622401718', 'USA', '2026-04-25', '02:00 PM', 'বগফগ্য', 'pending', '2026-04-22 12:55:04'),
(2, 2, 'Md Rayhan', 'mdrayhan.mr1040@gmail.com', '01622401718', 'UK', '2026-04-24', '12:00 PM', 'dregt', 'approved', '2026-04-22 15:32:57'),
(3, 7, 'Khadiza 1276', 'begum2305341276@diu.edu.bd', '6546456', 'USA', '2026-04-30', '11:00 AM', 'hello', 'pending', '2026-04-22 18:58:01'),
(4, 7, 'Khadiza 1276', 'begum2305341276@diu.edu.bd', '6546456', 'USA', '2026-04-30', '11:00 AM', 'hello', 'pending', '2026-04-22 18:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `f_name` varchar(50) DEFAULT NULL,
  `l_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `inquiry` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `user_id`, `f_name`, `l_name`, `email`, `phone`, `country`, `inquiry`, `message`, `created_at`) VALUES
(1, NULL, 'Test', NULL, 'test@test.com', NULL, NULL, NULL, 'This is a test message', '2026-04-22 10:16:37'),
(2, NULL, '', '', 'mdrayhan.mr1040@gmail.com', '01622401718', 'BD', 'other', 'dfsfer', '2026-04-22 10:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `user_id`, `name`, `email`, `country`, `message`, `status`, `created_at`) VALUES
(1, NULL, 'Md Rayhan', 'mdrayhan.mr1040@gmail.com', 'Canada', 'ফগ্রথ', 'pending', '2026-04-22 13:17:20'),
(2, 7, 'Khadiza 1276', 'begum2305341276@diu.edu.bd', 'USA', 'hello', 'pending', '2026-04-22 19:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `student_profiles`
--

CREATE TABLE `student_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qualification` varchar(50) DEFAULT NULL,
  `major` varchar(100) DEFAULT NULL,
  `preferred_country` varchar(50) DEFAULT NULL,
  `intake` varchar(50) DEFAULT NULL,
  `program_level` varchar(50) DEFAULT NULL,
  `budget_range` varchar(50) DEFAULT NULL,
  `english_test` varchar(50) DEFAULT NULL,
  `test_score` varchar(50) DEFAULT NULL,
  `passport_status` varchar(50) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `terms_accepted` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_profiles`
--

INSERT INTO `student_profiles` (`id`, `user_id`, `qualification`, `major`, `preferred_country`, `intake`, `program_level`, `budget_range`, `english_test`, `test_score`, `passport_status`, `comments`, `terms_accepted`, `created_at`) VALUES
(2, 2, 'Bachelor\'s', 'ewfefefwefe', 'UK', 'Fall 2025', 'Master\'s', '<10k', 'IELTS', '6', 'yes', 'sfdfergerger', 1, '2026-04-22 09:26:51'),
(3, 7, 'Bachelor\'s', 'data science', 'USA', 'Fall 2025', 'Bachelor\'s', '<10k', 'IELTS', '6', 'yes', 'good', 1, '2026-04-22 18:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_admin` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `date_of_birth`, `country`, `city`, `created_at`, `is_admin`) VALUES
(2, 'Md Rayhan B', 'rayhan@gmail.com', '$2y$10$BGIU.Acp4D7glkpKQLSMl.9Ksl8xFdbLFDbcmDWTvRM5ET3hXCsbm', '01622401718', '1995-05-08', 'Bangladesh', 'Dhaka', '2026-04-22 09:26:51', 0),
(6, 'Admin', 'khadizamaria523@gmail.com', '$2y$10$qIO5R.zg72YtvM3Ppkoha.y2fyIHsh9g9d2kZQ5tCBjmABtPdAIom', NULL, NULL, NULL, NULL, '2026-04-22 12:29:19', 1),
(7, 'Khadiza 1276', 'begum2305341276@diu.edu.bd', '$2y$10$zCjaW6kXLQtbNCD2ikspSOowWcO/x.wVPtybl6mgBfEp7M3GS0Mb.', '6546456', '2026-04-06', 'Bangladesh', 'chittagong', '2026-04-22 18:53:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_token` varchar(255) NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_profiles`
--
ALTER TABLE `student_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_profiles`
--
ALTER TABLE `student_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `bookmarks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_profiles`
--
ALTER TABLE `student_profiles`
  ADD CONSTRAINT `student_profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD CONSTRAINT `user_sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

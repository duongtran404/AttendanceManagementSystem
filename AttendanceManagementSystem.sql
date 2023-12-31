-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 02, 2023 lúc 08:44 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `AttendanceManagementSystem`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `status`, `notes`, `lesson_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'present', NULL, 15, '2023-11-01 03:18:55', '2023-11-01 03:18:55'),
(2, 2, 'present', NULL, 15, '2023-11-01 03:18:55', '2023-11-01 03:18:55'),
(3, 3, 'present', NULL, 15, '2023-11-01 03:18:55', '2023-11-01 03:18:55'),
(4, 4, 'present', NULL, 15, '2023-11-01 03:18:55', '2023-11-01 03:18:55'),
(5, 1, 'present', NULL, 17, '2023-11-01 04:12:32', '2023-11-01 04:12:32'),
(6, 2, 'present', 'muon 15p', 17, '2023-11-01 04:12:32', '2023-11-01 04:12:32'),
(7, 3, 'present', NULL, 17, '2023-11-01 04:12:32', '2023-11-01 04:12:32'),
(8, 4, 'present', NULL, 17, '2023-11-01 04:12:32', '2023-11-01 04:12:32'),
(9, 1, 'absent', 'bi om', 14, '2023-11-01 18:28:54', '2023-11-01 18:28:54'),
(10, 2, 'present', 'muon 15p', 14, '2023-11-01 18:28:54', '2023-11-01 18:28:54'),
(11, 3, 'present', NULL, 14, '2023-11-01 18:28:54', '2023-11-01 18:28:54'),
(12, 4, 'present', NULL, 14, '2023-11-01 18:28:54', '2023-11-01 18:28:54'),
(13, 1, 'absent', 'den muon 15p', 19, '2023-11-01 20:49:07', '2023-11-01 20:49:07'),
(14, 2, 'present', NULL, 19, '2023-11-01 20:49:07', '2023-11-01 20:49:07'),
(15, 3, 'present', NULL, 19, '2023-11-01 20:49:07', '2023-11-01 20:49:07'),
(16, 4, 'present', NULL, 19, '2023-11-01 20:49:07', '2023-11-01 20:49:07'),
(17, 5, 'absent', NULL, 19, '2023-11-01 20:49:07', '2023-11-01 20:49:07'),
(18, 1, 'present', NULL, 20, '2023-11-01 21:18:16', '2023-11-01 21:18:16'),
(19, 2, 'present', NULL, 20, '2023-11-01 21:18:16', '2023-11-01 21:18:16'),
(20, 3, 'present', NULL, 20, '2023-11-01 21:18:16', '2023-11-01 21:18:16'),
(21, 4, 'absent', 'é', 20, '2023-11-01 21:18:16', '2023-11-01 21:18:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `begin_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `classes`
--

INSERT INTO `classes` (`id`, `name`, `begin_date`, `end_date`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'riki1 tieng nhat ', '2023-10-27', '2023-11-27', 7, NULL, NULL, NULL),
(2, 'riki2 tieng anh', '2023-10-27', '2023-11-27', 8, NULL, NULL, NULL),
(3, 'lap trinh laravel', '2023-10-31', '2023-12-31', 8, NULL, NULL, NULL),
(4, 'lap trinh laravel 10', '2023-10-31', '2023-11-30', 8, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class_members`
--

CREATE TABLE `class_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `class_members`
--

INSERT INTO `class_members` (`id`, `user_id`, `class_id`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, NULL),
(2, 2, 1, NULL, NULL, NULL),
(3, 3, 1, NULL, NULL, NULL),
(4, 4, 1, NULL, NULL, NULL),
(5, 1, 2, NULL, NULL, NULL),
(6, 2, 2, NULL, NULL, NULL),
(9, 3, 2, NULL, NULL, NULL),
(10, 5, 2, NULL, NULL, NULL),
(11, 1, 4, NULL, NULL, NULL),
(12, 2, 4, NULL, NULL, NULL),
(13, 3, 4, NULL, NULL, NULL),
(14, 4, 4, NULL, NULL, NULL),
(15, 5, 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class_subjects`
--

CREATE TABLE `class_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `class_subjects`
--

INSERT INTO `class_subjects` (`id`, `class_id`, `subject_id`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, NULL),
(2, 2, 2, NULL, NULL, NULL),
(3, 3, 3, NULL, '2023-10-31 06:37:23', NULL),
(4, 4, 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `begin_time` datetime NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lessons`
--

INSERT INTO `lessons` (`id`, `begin_time`, `class_id`, `location_id`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(14, '2023-10-31 17:40:00', 1, 1, '2023-10-31 03:40:35', '2023-11-01 18:28:54', NULL, '1'),
(15, '2023-11-01 08:32:00', 1, 1, '2023-10-31 18:32:21', '2023-10-31 18:32:21', NULL, '1'),
(16, '2023-11-02 08:32:00', 1, 1, '2023-10-31 18:32:37', '2023-10-31 18:32:37', NULL, '0'),
(17, '2023-11-01 08:32:00', 1, 2, '2023-10-31 18:32:51', '2023-11-01 04:12:32', NULL, '1'),
(18, '2023-11-01 14:45:00', 2, 2, '2023-11-01 00:45:24', '2023-11-01 00:45:24', NULL, '0'),
(19, '2023-11-04 10:46:00', 4, 2, '2023-11-01 20:46:55', '2023-11-01 20:49:07', NULL, '1'),
(20, '2023-11-02 06:08:00', 1, 1, '2023-11-01 21:18:01', '2023-11-01 21:18:16', NULL, '1'),
(21, '2023-11-02 11:40:00', 1, 1, '2023-11-01 21:41:00', '2023-11-01 21:41:00', NULL, '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `locations`
--

INSERT INTO `locations` (`id`, `name`, `address`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'room 1', 'ha dong, ha noi', NULL, NULL, NULL),
(2, 'room 2', 'nam tu liem, ha noi', NULL, NULL, NULL),
(3, 'room 3', 'cau giay, ha noi', NULL, NULL, NULL),
(4, 'room 1', 'cau giay, ha noi', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2023_10_25_075638_create_subjects_table', 1),
(7, '2023_10_25_075717_create_class_subjects_table', 1),
(9, '2023_10_25_075753_create_locations_table', 1),
(11, '2023_10_26_094922_adds_soft_deletes_to_users_table', 1),
(12, '2023_10_25_075508_create_classes_table', 2),
(13, '2023_10_25_075544_create_class_members_table', 2),
(18, '2023_10_25_075739_create_lessons_table', 3),
(19, '2023_10_31_081302_adds_soft_deletes_to_lessons_table', 3),
(20, '2023_10_25_075809_create_attendances_table', 4),
(21, '2023_11_01_103047_add_column_to_lessons', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `credits` int(11) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `credits`, `notes`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'tieng nhat', 3, NULL, NULL, NULL, NULL),
(2, 'tieng anh', 4, NULL, NULL, NULL, NULL),
(3, 'laravel', 5, NULL, NULL, '2023-10-31 06:35:42', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','student','teacher') NOT NULL,
  `phone_number` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `gerden` enum('male','female','another') NOT NULL,
  `status` enum('currently enrolled','dropped out','leave of absence') DEFAULT NULL,
  `title` enum('lecturer','associate professor','professor') DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `phone_number`, `location`, `gerden`, `status`, `title`, `email_verified_at`, `department`, `notes`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ronaldo', 'student@test.com', '$2y$10$X46.Pwq6lnyYZmku1WOBZOYPTkU88RyAaFxIlIWcAy3x1J4ZMV63i', 'student', 123456789, 'ha noi', 'female', 'currently enrolled', NULL, NULL, NULL, NULL, NULL, '2023-10-27 00:10:05', '2023-11-01 23:55:31', NULL),
(2, 'student2', 'student2@test.com', '$2y$10$iX7rwqhrAJbhE1DPjZtkBetvGjVADXHJGSKXmTVSztp6vPfe9o/ke', 'student', 123456788, 'hai phong', 'female', 'currently enrolled', NULL, NULL, NULL, 'kha banh', NULL, '2023-10-27 00:11:02', '2023-10-27 00:11:02', NULL),
(3, 'student3', 'student3@test.com', '$2y$10$oCKFOPSq0WSf6K3wn73upOinjMXJeZUAUoqcr.aCeUgtPP/n/b03K', 'student', 123456787, 'quang ninh', 'male', 'currently enrolled', NULL, NULL, NULL, 'aaaa', NULL, '2023-10-27 00:12:16', '2023-10-27 02:21:02', NULL),
(4, 'student4', 'student4@test.com', '$2y$10$SlmN6pyP0kHqAlL/nB52RO9biM0NJUgZNUNUBceeqORWUMt/hXI0m', 'student', 123456786, 'bac ninh', 'female', 'leave of absence', NULL, NULL, NULL, 'bao luu 1 nam', NULL, '2023-10-27 00:13:29', '2023-11-01 20:46:02', NULL),
(5, 'student5', 'student5@test.com', '$2y$10$qBlsRAg1ffTD2vvw..n53uvUBjCC.k9awL3iXy4hxfUJ7Jx.VfKNO', 'student', 123456786, 'ho chi minh', 'another', 'dropped out', NULL, NULL, NULL, NULL, NULL, '2023-10-27 00:14:51', '2023-11-01 20:45:49', NULL),
(6, 'admin', 'admin@test.com', '$2y$10$yXQRA72JKBeWmNHYOpDQJ.DqvkwTZyy9b0.FnjKIiaKlVe5getkxu', 'admin', 987654321, 'ca mau', 'male', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-27 00:15:43', '2023-10-27 00:15:43', NULL),
(7, 'teacher1', 'teacher@test.com', '$2y$10$g3/XJyZHSHxboVqo01DAo.jmYZ9ItLynPqpWRmH1jTGnJvk8peYea', 'teacher', 543219876, 'ha noi', 'female', NULL, 'lecturer', NULL, NULL, NULL, NULL, '2023-10-27 00:16:42', '2023-10-27 00:16:42', NULL),
(8, 'teacher2', 'teacher2@test.com', '$2y$10$7FLTnF0XwJzLmHYVdqANi.M.NaBF7zRhqv4L09MS81cFlspAswNqa', 'teacher', 192837465, 'ha noi', 'male', NULL, 'professor', NULL, NULL, NULL, NULL, '2023-10-27 00:17:35', '2023-10-27 00:17:35', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `class_members`
--
ALTER TABLE `class_members`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `class_subjects`
--
ALTER TABLE `class_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `class_members`
--
ALTER TABLE `class_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `class_subjects`
--
ALTER TABLE `class_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

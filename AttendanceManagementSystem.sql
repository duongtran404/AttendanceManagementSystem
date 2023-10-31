-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 31, 2023 lúc 02:53 AM
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
  `status` enum('present','absent','late') NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 'riki2 tieng anh', '2023-10-27', '2023-11-27', 8, NULL, NULL, NULL);

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
(10, 5, 2, NULL, NULL, NULL);

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
(2, 2, 2, NULL, NULL, NULL);

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
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lessons`
--

INSERT INTO `lessons` (`id`, `begin_time`, `class_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2023-10-31 02:14:46', 1, NULL, NULL, NULL),
(2, '2023-10-31 02:14:46', 2, NULL, NULL, NULL),
(3, '2023-10-31 02:14:46', 1, NULL, NULL, NULL),
(4, '2023-10-31 02:14:46', 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lesson_locations`
--

CREATE TABLE `lesson_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lesson_locations`
--

INSERT INTO `lesson_locations` (`id`, `location_id`, `lesson_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 2, NULL, NULL),
(4, 4, 2, NULL, NULL);

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
(1, 'room 1 ', 'ha dong, ha noi', NULL, NULL, NULL),
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
(10, '2023_10_25_075809_create_attendances_table', 1),
(11, '2023_10_26_094922_adds_soft_deletes_to_users_table', 1),
(12, '2023_10_25_075508_create_classes_table', 2),
(13, '2023_10_25_075544_create_class_members_table', 2),
(15, '2023_10_25_075739_create_lessons_table', 3),
(16, '2023_10_31_010839_lesson_locations', 3);

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
(2, 'tieng anh', 4, NULL, NULL, NULL, NULL);

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
(1, 'student', 'student@test.com', '$2y$10$X46.Pwq6lnyYZmku1WOBZOYPTkU88RyAaFxIlIWcAy3x1J4ZMV63i', 'student', 123456789, 'ha noi', 'male', 'currently enrolled', NULL, NULL, NULL, NULL, NULL, '2023-10-27 00:10:05', '2023-10-27 02:21:17', NULL),
(2, 'student2', 'student2@test.com', '$2y$10$iX7rwqhrAJbhE1DPjZtkBetvGjVADXHJGSKXmTVSztp6vPfe9o/ke', 'student', 123456788, 'hai phong', 'female', 'currently enrolled', NULL, NULL, NULL, 'kha banh', NULL, '2023-10-27 00:11:02', '2023-10-27 00:11:02', NULL),
(3, 'student3', 'student3@test.com', '$2y$10$oCKFOPSq0WSf6K3wn73upOinjMXJeZUAUoqcr.aCeUgtPP/n/b03K', 'student', 123456787, 'quang ninh', 'male', 'currently enrolled', NULL, NULL, NULL, 'aaaa', NULL, '2023-10-27 00:12:16', '2023-10-27 02:21:02', NULL),
(4, 'student4', 'student4@test.com', '$2y$10$SlmN6pyP0kHqAlL/nB52RO9biM0NJUgZNUNUBceeqORWUMt/hXI0m', 'student', 123456786, 'bac ninh', 'female', 'currently enrolled', NULL, NULL, NULL, NULL, NULL, '2023-10-27 00:13:29', '2023-10-27 00:13:29', NULL),
(5, 'student5', 'student5@test.com', '$2y$10$qBlsRAg1ffTD2vvw..n53uvUBjCC.k9awL3iXy4hxfUJ7Jx.VfKNO', 'student', 123456786, 'ho chi minh', 'another', 'currently enrolled', NULL, NULL, NULL, NULL, NULL, '2023-10-27 00:14:51', '2023-10-27 00:14:51', NULL),
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
-- Chỉ mục cho bảng `lesson_locations`
--
ALTER TABLE `lesson_locations`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `class_members`
--
ALTER TABLE `class_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `class_subjects`
--
ALTER TABLE `class_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lesson_locations`
--
ALTER TABLE `lesson_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2019 at 05:41 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `durpalla`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_panels`
--

CREATE TABLE `admin_panels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tracking` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat` int(11) NOT NULL,
  `message` varchar(9999) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promo_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `fine` int(11) DEFAULT NULL,
  `corporate` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_cancels`
--

CREATE TABLE `booking_cancels` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tracking` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_plate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_image1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_image2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kilometers` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car_brands`
--

CREATE TABLE `car_brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `close_accounts`
--

CREATE TABLE `close_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recommend` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `improve` varchar(9999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `corporates`
--

CREATE TABLE `corporates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_phone` int(11) NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `corporate_groups`
--

CREATE TABLE `corporate_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` int(11) NOT NULL,
  `corporate_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landing_images`
--

CREATE TABLE `landing_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_02_21_062226_create_users_table', 1),
(2, '2019_02_21_110806_create_admin_panels_table', 1),
(3, '2019_02_24_104118_create_cars_table', 1),
(4, '2019_02_25_013851_create_request_rides_table', 1),
(5, '2019_02_25_043236_create_post_rides_table', 1),
(6, '2019_02_26_121825_create_stopovers_table', 1),
(7, '2019_03_01_032831_create_ride_settings_table', 1),
(8, '2019_03_03_150729_create_verifications_table', 1),
(9, '2019_03_07_174107_create_resources_table', 1),
(10, '2019_03_08_173947_create_promo_codes_table', 1),
(11, '2019_03_09_062046_create_post_ride_addresses_table', 1),
(12, '2019_03_10_214001_create_bookings_table', 1),
(13, '2019_03_11_060328_create_corporates_table', 1),
(14, '2019_03_11_143056_create_corporate_groups_table', 1),
(15, '2019_03_12_112600_create_booking_cancels_table', 1),
(16, '2019_03_26_174636_create_car_brands_table', 1),
(17, '2019_03_27_055636_create_close_accounts_table', 1),
(18, '2019_03_30_080135_create_landing_images_table', 1),
(19, '2019_04_05_143908_create_notifications_table', 1),
(20, '2019_04_30_180148_create_popular_rides_table', 1),
(21, '2019_05_01_033034_create_user_ratings_table', 1),
(22, '2019_05_05_191435_create_references_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_post` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matching` varchar(9999) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `popular_rides`
--

CREATE TABLE `popular_rides` (
  `id` int(10) UNSIGNED NOT NULL,
  `tracking` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_rides`
--

CREATE TABLE `post_rides` (
  `id` int(10) UNSIGNED NOT NULL,
  `s_lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_lng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_lng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departure` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_time2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `return` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_time2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_id` int(11) NOT NULL,
  `driver` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_ride_addresses`
--

CREATE TABLE `post_ride_addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

CREATE TABLE `promo_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `p_amount` int(11) NOT NULL,
  `h_amount` int(11) NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_area` int(11) NOT NULL,
  `s_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `references`
--

CREATE TABLE `references` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_rides`
--

CREATE TABLE `request_rides` (
  `id` int(10) UNSIGNED NOT NULL,
  `s_lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_lng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_lng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `after` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `before` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_image1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_image2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ride_settings`
--

CREATE TABLE `ride_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `search` int(11) NOT NULL DEFAULT '0',
  `min_price` int(11) NOT NULL DEFAULT '0',
  `commission` int(11) NOT NULL DEFAULT '0',
  `fine_6h` int(11) NOT NULL DEFAULT '0',
  `fine_12h` int(11) NOT NULL DEFAULT '0',
  `fine_12_upper` int(11) NOT NULL DEFAULT '0',
  `km_1st` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `price2` int(11) NOT NULL DEFAULT '0',
  `pkm_1st` int(11) NOT NULL DEFAULT '0',
  `pprice` int(11) NOT NULL DEFAULT '0',
  `pprice2` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stopovers`
--

CREATE TABLE `stopovers` (
  `id` int(10) UNSIGNED NOT NULL,
  `going` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `seat` int(11) DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etime` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etime2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tracking` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_verify` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_ratings`
--

CREATE TABLE `user_ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tracking` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(9999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verifications`
--

CREATE TABLE `verifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_image1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_image2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_status` tinyint(1) NOT NULL DEFAULT '0',
  `passport` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_image1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_image2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_status` tinyint(1) NOT NULL DEFAULT '0',
  `driving` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driving_image1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driving_image2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driving_status` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_panels`
--
ALTER TABLE `admin_panels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_cancels`
--
ALTER TABLE `booking_cancels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_brands`
--
ALTER TABLE `car_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `close_accounts`
--
ALTER TABLE `close_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corporates`
--
ALTER TABLE `corporates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corporate_groups`
--
ALTER TABLE `corporate_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landing_images`
--
ALTER TABLE `landing_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `popular_rides`
--
ALTER TABLE `popular_rides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_rides`
--
ALTER TABLE `post_rides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_ride_addresses`
--
ALTER TABLE `post_ride_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_rides`
--
ALTER TABLE `request_rides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ride_settings`
--
ALTER TABLE `ride_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stopovers`
--
ALTER TABLE `stopovers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_ratings`
--
ALTER TABLE `user_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verifications`
--
ALTER TABLE `verifications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_panels`
--
ALTER TABLE `admin_panels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_cancels`
--
ALTER TABLE `booking_cancels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car_brands`
--
ALTER TABLE `car_brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `close_accounts`
--
ALTER TABLE `close_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `corporates`
--
ALTER TABLE `corporates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `corporate_groups`
--
ALTER TABLE `corporate_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landing_images`
--
ALTER TABLE `landing_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `popular_rides`
--
ALTER TABLE `popular_rides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_rides`
--
ALTER TABLE `post_rides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_ride_addresses`
--
ALTER TABLE `post_ride_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promo_codes`
--
ALTER TABLE `promo_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `references`
--
ALTER TABLE `references`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_rides`
--
ALTER TABLE `request_rides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ride_settings`
--
ALTER TABLE `ride_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stopovers`
--
ALTER TABLE `stopovers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_ratings`
--
ALTER TABLE `user_ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verifications`
--
ALTER TABLE `verifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2020 at 01:19 PM
-- Server version: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 7.1.31-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3dayapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `uniqueid` varchar(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `scanid` text NOT NULL,
  `lunch` int(100) NOT NULL DEFAULT '0' COMMENT '0=not done lunch ,1=done lunch',
  `tea` int(100) NOT NULL DEFAULT '0' COMMENT '1=first, 2=second 0=none',
  `book` int(100) NOT NULL DEFAULT '0' COMMENT '1=smb, 2=ycyw 3=both 0=none',
  `gala_dinner` int(100) NOT NULL DEFAULT '0' COMMENT '1=yes ,0=no ',
  `gala_reg` int(11) NOT NULL DEFAULT '0' COMMENT '1=yes , 0=no',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `uniqueid`, `name`, `email`, `phone`, `scanid`, `lunch`, `tea`, `book`, `gala_dinner`, `gala_reg`, `createdat`, `date`) VALUES
(2, '123222', 'pradeep1', 'pradeep1@arfeenkhan.com', '9874466200', '4332211', 0, 0, 3, 1, 1, '2020-03-04 12:08:41', NULL),
(3, '123456', 'anand 1', 'anand@arfeenkhan.com', '9874466200', '12', 0, 0, 0, 0, 0, '2020-03-04 12:01:44', NULL),
(4, '985632', 'pradeep', 'pradeep@arfeenkhan.com', '9874466200', '12', 0, 0, 0, 0, 0, '2020-03-04 12:45:14', NULL),
(5, '123666', 'pradeep6', 'pradeep6@arfeenkhan.com', '9874466200', '12', 0, 0, 0, 0, 0, '2020-03-04 12:45:47', NULL),
(6, '1234561', 'anand1', 'anand1@arfeenkhan.com', '9874466200', '12', 0, 0, 0, 0, 0, '2020-03-04 12:49:38', NULL),
(7, '1234562', 'bhavesh', 'bhavesh@arfeenkhan.com', '9874466200', '12', 0, 0, 0, 0, 0, '2020-03-04 12:50:21', NULL),
(8, '12345614', 'anand14', 'anand14@arfeenkhan.com', '9874466200', '12', 0, 0, 0, 0, 0, '2020-03-04 12:51:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintable`
--

CREATE TABLE `maintable` (
  `id` int(11) NOT NULL,
  `uniqueid` int(222) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `scanid` varchar(200) NOT NULL,
  `ticket` text NOT NULL,
  `lunch_tea` int(100) NOT NULL COMMENT '1=yes , 0=no',
  `book` int(100) NOT NULL,
  `gala_reg` varchar(200) NOT NULL COMMENT '1=yes , 0=no',
  `gala_dinner` varchar(200) NOT NULL COMMENT '1=yes , 0=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintable`
--

INSERT INTO `maintable` (`id`, `uniqueid`, `name`, `email`, `phone`, `scanid`, `ticket`, `lunch_tea`, `book`, `gala_reg`, `gala_dinner`) VALUES
(1, 123456, 'anand 1', 'anand@arfeenkhan.com', '9874466200', '12', 'Gold', 1, 1, '1', '1'),
(2, 1234561, 'anand1', 'anand1@arfeenkhan.com', '9874466200', '12', 'Platinum', 1, 1, '1', '1'),
(3, 1234562, 'bhavesh', 'bhavesh@arfeenkhan.com', '9874466200', '12', 'incredible', 1, 1, '1', '1'),
(5, 12345622, 'mahesh', 'mahesh@arfeenkhan.com', '9874466200', '32', 'Gold', 1, 1, '1', '1'),
(6, 12345614, 'anand14', 'anand14@arfeenkhan.com', '9874466200', '12', 'Platinum', 1, 1, '1', '1'),
(7, 985632, 'pradeep', 'pradeep@arfeenkhan.com', '9874466200', '12', 'Platinum', 1, 1, '1', '1'),
(8, 123222, 'pradeep1', 'pradeep1@arfeenkhan.com', '9874466200', '4332211', 'Platinum', 1, 1, '1', '1'),
(9, 123666, 'pradeep6', 'pradeep6@arfeenkhan.com', '9874466200', '12', 'Platinum', 1, 1, '1', '1');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('2c22c2159d3a9ec153472929d203c8f06c914242b3290cd9f92f58d9cd9d9af55c6348ef9894b34a', 1, 1, 'Personal Access Token', '[]', 0, '2020-02-29 04:49:53', '2020-02-29 04:49:53', '2020-03-07 10:19:53'),
('c9514deccfbe4ee85898e8baa0368c87b21b445f45f868f554d5a9fbe9a8abcb61ae4cab31848e36', 1, 1, 'Personal Access Token', '[]', 1, '2020-02-29 04:46:22', '2020-02-29 04:46:22', '2020-03-07 10:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'A1QWTGHu9RqppuQ7NqxYlqEGwXdYFVUcV3jlMpGG', 'http://localhost', 1, 0, 0, '2020-02-29 04:32:51', '2020-02-29 04:32:51'),
(2, NULL, 'Laravel Password Grant Client', 'B7ao0MDvRiAOpQX1G8iHn4XC7N11NHlWIQsEgrkl', 'http://localhost', 0, 1, 0, '2020-02-29 04:32:51', '2020-02-29 04:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-02-29 04:32:51', '2020-02-29 04:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'anand1', 'anand1@arfeenkhan.com', NULL, '$2y$10$NLxjsLxMd0huKauEUEBfU.Ga2ri/ezozRPUQNmwLZ6GEWG1dRN6bi', 'S2dVOGFCMFhXaWlNTzlucVpwcmt1R01lZlYwc29lRXlLSTBnSGxnd3hFVzRjbXFNaTBzMXBGNDR6dXFW5e5e012e90d9e', NULL, NULL),
(5, 'anand', 'anand@arfeenkhan.com', NULL, '$2y$10$FxRzdk0AZXXxOL4Fs.urQOMsB.nHmeZKf/5/Y91G.T4Atl73CYsTa', 'YzB6RUlJSTk0MEF2V2R5Zk5JdDFwSmhpZkIyQjRXTHhVQzBaOEFqV0pHZ3IyaFRKNzFZUjFYRnI2MVY45e5fa976a84da', NULL, '2020-03-04 13:13:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniqueid` (`uniqueid`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintable`
--
ALTER TABLE `maintable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniqueid` (`uniqueid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `maintable`
--
ALTER TABLE `maintable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

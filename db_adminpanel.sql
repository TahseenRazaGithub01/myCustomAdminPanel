-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2020 at 03:34 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_adminpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `banner_image`, `short_description`, `created_at`, `updated_at`) VALUES
(1, 'Banner 1', '1670382613240580SliderPK01.jpg', 'About us short description', '2020-06-24 07:16:36', '2020-06-24 07:16:36'),
(2, 'Banner 2', '1670382648729557SliderPK02.jpg', 'About us short description Update', '2020-06-24 07:17:10', '2020-06-24 07:17:10'),
(3, 'First Banner France', '1670382673872885SliderFr01.jpg', 'About us short description', '2020-06-24 07:17:34', '2020-06-24 07:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `banner_site`
--

CREATE TABLE `banner_site` (
  `banner_id` int(10) UNSIGNED NOT NULL,
  `site_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_site`
--

INSERT INTO `banner_site` (`banner_id`, `site_id`) VALUES
(1, 1),
(2, 1),
(3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trending` tinyint(1) NOT NULL DEFAULT 0,
  `latest` tinyint(1) NOT NULL DEFAULT 0,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `slug`, `blog_image`, `short_description`, `long_description`, `trending`, `latest`, `meta_title`, `meta_keyword`, `meta_description`, `page_status`, `created_at`, `updated_at`) VALUES
(1, 'Victorias Secret Semi Annual Sale to Make You Look and Feel Sassy', 'victorias-secret-semi-annual-sale-to-make-you-look-and-feel-sassy', '1670448092124912download.jpg', 'short description about blog update', '<p>Update With great offers, deals, promotions and big savings, Victoria&#39;s Secret Sale is here to give you all the sassiest, savviest and sexiest experience. Regardless of whether you&#39;re searching for lingerie, leisurewear, or magnificence contributions, the Victoria&#39;s Secret Semi Annual sale deal is a phenomenal method to stock up. What&#39;s more, the deal is at long last here! Look at the arrangements you can get from this well-known and popular retailer, at that point just take a peek on all the stuff in what&#39;s in store using the deals offered.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/myadminpanel/public/storage/uploads/b26c0a08-f8f4-4ee2-a527-c45e5ce7613e_1593008912.jpg\" style=\"height:280px; width:284px\" /></p>\r\n\r\n<h2>Victoria Secret Sale</h2>\r\n\r\n<p>Along these lines, you&#39;ve presumably gotten on at this point: This deal is huge in the realm of Victoria&#39;s Secret. It&#39;s foreseen and advertised as well for grabbing the attention of the customers. However, you will find the promotions to make things work for you on availing the best stuff as per your choice. Just a little lookout is what is required and this will make everything work for people with good taste.</p>\r\n\r\n<p>The June deals are something to opt for as they let ladies get what they have always been looking for. These deals incorporate limits of up to 60% off very nearly two thousand styles. This is the perfect time to select bras, excellence things and game clothing was on special.</p>\r\n\r\n<p>The January deal additionally bragged parcels low costs, including bras beginning at $9.99 and underwear beginning at $3.99. well, this is something to dig more into to find the best stuff to suit the liking. Notwithstanding scaled-down costs, online customers can frequently exploit free dispatching by means of online special codes too. Victoria&#39;s Secret additionally has been known to host tote giveaways and get one item, get another free</p>', 1, 1, 'meta title', 'meta keyword', 'meta description', 1, '2020-06-24 09:28:46', '2020-06-25 00:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `blog_site`
--

CREATE TABLE `blog_site` (
  `blog_id` int(10) UNSIGNED NOT NULL,
  `site_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_site`
--

INSERT INTO `blog_site` (`blog_id`, `site_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `category_image`, `short_description`, `long_description`, `meta_title`, `meta_keyword`, `meta_description`, `page_status`, `created_at`, `updated_at`) VALUES
(1, 'Claire\'s', 'claires', '1670477647714466claires-accessories-logo.jpg', 'let me coupon, short description content update', '<h3>Update Offering something for the whole family, from electricals and appliances, to toys, clothing and even furniture, you can find over 60,000 products at Argos - the classic UK catalogue retailer. Grab an Argos voucher for even bigger savings on all the biggest brands. That&rsquo;s money off toys, home furnishings, toastie makers, vacuum cleaners - pretty much everything you might need. With stores all across the UK, as well as an online shopping and delivery service, you can browse until your heart&#39;s content and kit out your home in no time, with big brands such as Samsung, LEGO, Bose, Beats and Dyson on offer.</h3>', 'meta title update', 'meta keyword update', 'meta description update', 1, '2020-06-25 08:13:12', '2020-06-25 08:27:08'),
(2, 'Valvoline Coupon Code Letmecoupon', 'valvoline-coupon-code-letmecoupon', '1670476864562930ValvolineCouponCode.jpg', 'short description about Valvoline Coupon Code Letmecoupon', '<p>long description about&nbsp;Valvoline Coupon Code Letmecoupon</p>', NULL, NULL, NULL, 1, '2020-06-25 08:14:41', '2020-06-25 08:14:41'),
(4, 'Argos', 'argos', '1670477992024254argos-logo.jpg', 'short description about argos', '<p>Shop the hottest styles and trends from cool jewellery &amp; hair accessories to gifts &amp; school supplies. Free delivery on orders over &pound;40. Argos this is testing description for testing purpose ...</p>', 'meta title', 'meta keyword', 'meta description', 1, '2020-06-25 08:32:37', '2020-06-25 08:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `category_site`
--

CREATE TABLE `category_site` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `site_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_site`
--

INSERT INTO `category_site` (`category_id`, `site_id`) VALUES
(2, 1),
(1, 7),
(4, 1);

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
(3, '2020_03_26_042029_add_gender_field_to_users_table', 1),
(17, '2020_06_21_081454_create_sites_table', 2),
(19, '2020_06_22_071019_create_page_site_table', 4),
(20, '2020_06_22_060614_create_pages_table', 5),
(21, '2020_06_23_145330_create_banners_table', 6),
(22, '2020_06_24_101513_create_banner_site_table', 7),
(23, '2020_06_24_123029_create_blogs_table', 8),
(24, '2020_06_24_142329_create_blog_site_table', 9),
(25, '2020_06_25_061701_create_subscribers_table', 10),
(26, '2020_06_25_125755_create_categories_table', 11),
(27, '2020_06_25_130455_create_category_site_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `banner_image`, `short_description`, `long_description`, `meta_title`, `meta_keyword`, `meta_description`, `page_status`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'about-us', '16702034686172761204_Oak_Wood_preview_0001_Oak_Wood_Bump.jpg', 'About us short description', '<p>long desc</p>', NULL, NULL, NULL, 1, '2020-06-22 07:49:11', '2020-06-22 07:49:11'),
(2, 'Privacy Policy', 'privacy-policy', '167020349792793121be42e0-3732-4e80-b931-efd665125fa5.jpeg.jpg', 'About us short description', '<p>long desc .</p>', 'meta title', 'meta keyword', 'meta description', 1, '2020-06-22 07:49:39', '2020-06-22 09:01:53'),
(4, 'FAQ', 'faq', '1670203623992387e8faa395ecab57e4f66a0fad35c0d073.jpg', 'About us short description', '<p>desc</p>', 'meta title', 'meta keyword', 'meta description', 1, '2020-06-22 07:51:39', '2020-06-22 07:51:39'),
(5, 'Datenschutz Bestimmungen', 'datenschutz-bestimmungen', '1670301112678511Desing Code Job Hiring Post copy.JPG', 'About us short description de', '<p>de</p>', 'meta title', 'meta keyword', 'meta description', 1, '2020-06-23 09:41:12', '2020-06-23 09:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `page_site`
--

CREATE TABLE `page_site` (
  `page_id` int(10) UNSIGNED NOT NULL,
  `site_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_site`
--

INSERT INTO `page_site` (`page_id`, `site_id`) VALUES
(1, 1),
(4, 1),
(2, 7),
(5, 7);

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
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `code`, `name`, `logo`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'pk', 'Pakistan', '1670107337331634b26c0a08-f8f4-4ee2-a527-c45e5ce7613e.jpg', '1670107337409304pk.jpg', '2020-06-21 06:21:13', '2020-06-21 06:21:13'),
(7, 'fr', 'France', '1670177233668348fr_logo.png', '1670177233740081fr_flag.jpg', '2020-06-22 00:52:11', '2020-06-22 00:52:11');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `page_url`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'testing_subscriber@gmail.com', 'http://localhost/myadminpanel/public/testing', '28.723210', '77.266440', '2020-06-25 06:31:33', '2020-06-25 06:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'male',
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `language`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', 'male', '1', NULL, 1, '$2y$10$F/BIvPzSxmneHVyNZTJcd.h/MwEOWFpBpYd03AMS5jYFEtAWitpUS', NULL, '2020-06-21 03:04:04', '2020-06-21 03:04:04'),
(2, 'User', 'user@user.com', 'male', '1', NULL, 0, '$2y$10$EYqW8zpjZUH8nCb2Obtt6ebxEVqnlmT8f21rlVy7ns8.mUSjUv6/u', NULL, '2020-06-21 03:04:04', '2020-06-21 03:04:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

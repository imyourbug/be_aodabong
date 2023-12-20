-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3340
-- Thời gian đã tạo: Th12 17, 2023 lúc 06:49 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoes`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `description`, `active`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Giày bóng đá Nike', 13, NULL, 1, 'giay-bong-da-nike', '2023-11-08 21:41:32', '2023-12-11 08:10:30'),
(2, 'Giày bóng đá Puma', 13, NULL, 1, 'giay-bong-da-puma', '2023-11-08 21:41:32', '2023-12-11 08:10:40'),
(4, 'Giày bóng đá Adidas', 13, '', 1, 'phu-kien', '2023-11-08 21:41:32', '2023-11-08 21:41:32'),
(5, 'Giày bóng đá Mizuno', 14, '', 1, 'gang', '2023-11-08 21:41:32', '2023-11-08 21:41:32'),
(6, 'Giày bóng đá Zocker', 14, '', 1, 'cup', '2023-11-08 21:41:32', '2023-11-08 21:41:32'),
(7, 'Giày bóng đá Kamito', 14, '', 1, 'cup-vang', '2023-11-08 21:41:32', '2023-11-08 21:41:32'),
(8, 'Giày bóng đá Wika', 14, '', 1, 'cup-bac', '2023-11-08 21:41:32', '2023-11-08 21:41:32'),
(13, 'Giày sân cỏ', 0, '', 1, 'giay-au-nam', '2023-11-08 21:41:32', '2023-11-08 21:41:32'),
(14, 'Giày sân nhân tạo', 0, '', 1, 'giay-bo-nam', '2023-11-08 21:41:32', '2023-11-08 21:41:32'),
(15, 'Adidas X', 4, NULL, 1, 'adidas-x', '2023-12-12 07:49:45', '2023-12-12 07:49:45'),
(16, 'Adidas Predator', 4, NULL, 1, 'adidas-predator', '2023-12-12 07:50:07', '2023-12-12 07:50:07'),
(17, 'Adidas Copa', 4, NULL, 1, 'adidas-copa', '2023-12-12 07:50:16', '2023-12-12 07:50:16'),
(18, 'Mizuno Morelia', 5, 'a', 1, 'mizuno-morelia', '2023-12-16 08:22:05', '2023-12-16 08:22:05'),
(19, 'Mizuno Monarcida', 5, 'a', 1, 'mizuno-monarcida', '2023-12-16 08:22:32', '2023-12-16 08:22:32'),
(20, 'Mizuno Alpha', 5, 'a', 1, 'mizuno-alpha', '2023-12-16 08:22:54', '2023-12-16 08:22:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id`, `name`, `code_color`, `created_at`, `updated_at`) VALUES
(1, 'Xanh lá', '#63AA31', '2023-11-08 21:41:32', '2023-11-08 21:41:32'),
(2, 'Đỏ', '#F62612', '2023-11-08 21:41:32', '2023-11-08 21:41:32'),
(3, 'Xanh lam', '#1145F6', '2023-11-08 21:41:32', '2023-11-08 21:41:32'),
(4, 'Da cam', '#F39402', '2023-11-08 21:41:32', '2023-11-08 21:41:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `reply_id` bigint UNSIGNED NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_star` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `reply_id`, `content`, `level_star`, `created_at`, `updated_at`) VALUES
(4, 2, 1, 3, 'Comment 4 rep cmt 3', 3, '2023-11-08 21:41:33', '2023-11-08 21:41:33'),
(5, 2, 1, 4, 'Comment 5 rep cmt 4', 2, '2023-11-08 21:41:33', '2023-11-08 21:41:33'),
(8, 2, 1, 7, 'Comment 8 rep cmt 7', 1, '2023-11-08 21:41:33', '2023-11-08 21:41:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `address`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Freeda Stiedemann', 'XXXXXXXXXX', '6888 Hansen Spur\nHailieborough, WV 26540', 'uprice@example.com', '2023-11-08 21:41:33', '2023-11-08 21:41:33'),
(2, 'Skylar Shanahan', 'XXXXXXXXXX', '93038 Kuhic Common\nLednerland, PA 32928-3012', 'jennie74@example.net', '2023-11-08 21:41:33', '2023-11-08 21:41:33'),
(3, 'Charlotte Luettgen', 'XXXXXXXXXX', '37682 Jerde Run\nSouth Ansleyhaven, TN 69302', 'nfay@example.org', '2023-11-08 21:41:33', '2023-11-08 21:41:33'),
(4, 'Mr. Henderson Fahey Jr.', 'XXXXXXXXXX', '1050 Miller Junctions\nNorth Gradyland, TX 06654-7530', 'friesen.abe@example.com', '2023-11-08 21:41:33', '2023-11-08 21:41:33'),
(5, 'Isabella Bailey PhD', 'XXXXXXXXXX', '84596 Blanda Road\nSouth Demarcusshire, ID 44757', 'vada.wunsch@example.net', '2023-11-08 21:41:33', '2023-11-08 21:41:33'),
(6, 'Ole Auer', 'XXXXXXXXXX', '340 Crist Rapids\nReingerborough, NV 48489', 'frieda.dibbert@example.net', '2023-11-08 21:41:33', '2023-11-08 21:41:33'),
(7, 'Prof. Alize Hintz Sr.', 'XXXXXXXXXX', '2864 Yost Street\nWest Marcelinochester, RI 63128-1503', 'theron.hayes@example.org', '2023-11-08 21:41:33', '2023-11-08 21:41:33'),
(8, 'Miss Twila Bechtelar I', 'XXXXXXXXXX', '4460 Block Summit\nWintheiserborough, VA 63817', 'dklocko@example.net', '2023-11-08 21:41:33', '2023-11-08 21:41:33'),
(9, 'Jazlyn Parker', 'XXXXXXXXXX', '708 Ebert Avenue Suite 989\nCrooksmouth, KY 04538-2182', 'schaefer.hilario@example.org', '2023-11-08 21:41:33', '2023-11-08 21:41:33'),
(10, 'Keanu Hoppe', 'XXXXXXXXXX', '98687 Carissa Roads\nNew Jerel, IN 90354-6895', 'abner43@example.org', '2023-11-08 21:41:33', '2023-11-08 21:41:33'),
(11, 'Khải', '0986768678', '-  -  -', 'duongvankhai2022001@gmail.com', '2023-11-08 22:02:06', '2023-11-08 22:02:06'),
(12, 'Khải', '0986768678', '-  -  -', 'duongvankhai2022001@gmail.com', '2023-11-22 07:14:06', '2023-11-22 07:14:06'),
(13, 'Khải', '0986768678', '-  -  -', 'duongvankhai2022001@gmail.com', '2023-11-22 07:14:48', '2023-11-22 07:14:48'),
(16, 'Khải', '0986768678', '-  -  -', 'duongvankhai2022001@gmail.com', '2023-11-24 19:12:12', '2023-11-24 19:12:12'),
(17, 'Dương Văn Khải', '0368822642', '1 - Thị trấn Xuân Mai - Huyện Chương Mỹ - Thành phố Hà Nội', 'duongvankhai2022001@gmail.com', '2023-12-16 20:28:51', '2023-12-16 20:28:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(140, '2014_09_13_042300_create_colors_table', 1),
(141, '2014_09_13_042313_create_sizes_table', 1),
(142, '2014_10_12_000000_create_users_table', 1),
(143, '2014_10_12_100000_create_password_resets_table', 1),
(144, '2019_08_19_000000_create_failed_jobs_table', 1),
(145, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(146, '2022_07_27_084123_create_shipments_table', 1),
(147, '2022_09_07_071009_create_categories_table', 1),
(148, '2022_09_07_071010_create_customers_table', 1),
(149, '2022_09_07_071041_create_suppliers_table', 1),
(150, '2022_09_07_071042_create_vouchers_table', 1),
(151, '2022_09_07_071043_create_products_table', 1),
(152, '2022_09_07_071200_create_orders_table', 1),
(153, '2022_09_07_071209_create_product_details_table', 1),
(154, '2022_09_07_071212_create_order_details_table', 1),
(155, '2022_09_09_093101_create_slides_table', 1),
(156, '2022_10_03_083454_create_comments_table', 1),
(157, '2022_10_07_010043_create_socials_table', 1),
(158, '2022_10_07_133020_create_jobs_table', 1),
(159, '2022_10_14_035802_create_rates_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `shipment_id` bigint UNSIGNED NOT NULL,
  `status` int NOT NULL,
  `discount` int NOT NULL DEFAULT '0',
  `total_money` int NOT NULL,
  `payment_method` int NOT NULL DEFAULT '0',
  `payment_status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `shipment_id`, `status`, `discount`, `total_money`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 4, 0, 1870000, 1, 1, '2023-12-08 22:02:06', '2023-12-05 08:03:26'),
(2, 12, 1, 5, 0, 410000, 0, 0, '2023-10-22 07:14:06', '2023-12-05 07:57:06'),
(3, 13, 3, 5, 7, 375500, 0, 0, '2022-11-22 07:14:48', '2023-12-06 05:51:35'),
(6, 16, 1, 0, 0, 340000, 0, 1, '2023-11-24 19:12:12', '2023-11-24 19:12:12'),
(7, 17, 1, 0, 7, 2272000, 0, 1, '2023-12-16 20:28:51', '2023-12-16 20:28:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_detail_id` bigint UNSIGNED NOT NULL,
  `unit_price` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_detail_id`, `unit_price`, `quantity`) VALUES
(1, 1, 11, 360000, 2),
(2, 1, 8, 370000, 3),
(3, 2, 8, 370000, 1),
(4, 3, 9, 350000, 1),
(7, 6, 12, 150000, 2),
(8, 7, 32, 2400000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `price` int NOT NULL,
  `price_sale` int DEFAULT NULL,
  `active` int NOT NULL,
  `sold` int NOT NULL DEFAULT '0',
  `thumb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `supplier_id`, `price`, `price_sale`, `active`, `sold`, `thumb`, `created_at`, `updated_at`) VALUES
(1, 'Nike Phantom GX Club MG Ready DD9483-600', 1, 1, 340000, NULL, 1, 0, 'http://localhost:8000/storage/uploads/images/1.jpg', '2023-11-08 21:41:33', '2023-12-11 09:13:48'),
(2, 'Nike Mercurial Vapor 15 Academy TF Air Zoom MDS 007 Dream Speed', 1, 1, 380000, 350000, 1, 0, 'http://localhost:8000/storage/uploads/images/1.jpg', '2023-11-08 21:41:33', '2023-12-12 08:11:01'),
(3, 'Nike Mercurial Vapor 15 Academy TF Air Zoom Ready', 1, 1, 370000, 340000, 1, 4, 'http://localhost:8000/storage/uploads/images/2.jpg', '2023-11-08 21:41:33', '2023-12-12 08:11:13'),
(4, 'Nike Mercurial Vapor 15 Academy TF Air Zoom', 1, 1, 350000, 250000, 1, 1, 'http://localhost:8000/storage/uploads/images/4.jpg', '2023-11-08 21:41:33', '2023-12-12 08:11:25'),
(5, 'Nike Mercurial Vapor 15 Academy MG Air Zoom Ready', 1, 1, 350000, 240000, 1, 0, 'http://localhost:8000/storage/uploads/images/6.jpg', '2023-11-08 21:41:33', '2023-12-12 08:11:34'),
(6, 'Nike Mercurial Superfly 9 Academy AG Air Zoom MDS 007 Dream Speed', 1, 1, 360000, NULL, 1, 2, 'http://localhost:8000/storage/uploads/images/5.jpg', '2023-11-08 21:41:33', '2023-12-12 08:11:47'),
(7, 'Nike Mercurial Vapor 15 Academy TF Peak Ready pack DJ5635-300', 1, 1, 150000, 100000, 1, 2, 'http://localhost:8000/storage/uploads/images/8.jpg', '2023-11-08 21:41:33', '2023-12-12 08:12:07'),
(8, 'Adidas X Crazyfast .1 TF Marine Rush IE6633', 15, 4, 2400000, 2300000, 1, 1, 'http://localhost:8000/storage/uploads/images/1.jpg', '2023-12-12 07:51:26', '2023-12-16 20:28:51'),
(9, 'Adidas X Crazyfast .3 TF Marine Rush ID9338', 15, 4, 2100000, 0, 1, 0, 'http://localhost:8000/storage/uploads/images/2.jpg', '2023-12-12 07:52:32', '2023-12-12 08:12:29'),
(10, 'Adidas X Crazyfast .1 FG Marine Rush GY7416', 15, 4, 2389000, 0, 1, 0, 'http://localhost:8000/storage/uploads/images/4.jpg', '2023-12-12 07:57:15', '2023-12-12 08:12:17'),
(11, 'Adidas X Crazyfast .3 TF IG0767', 15, 4, 2900000, 0, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-121504307.jpg', '2023-12-12 08:04:38', '2023-12-16 08:38:43'),
(12, 'Adidas X Speedportal .1 FG Game Data pack GW8426', 15, 4, 1500000, 0, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-121505258.jpg', '2023-12-12 08:05:33', '2023-12-16 19:12:39'),
(13, 'Adidas X Crazyfast .3 FG Crazyrush HQ4534', 15, 4, 2000000, 0, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-121505584.jpg', '2023-12-12 08:06:04', '2023-12-16 19:16:15'),
(14, 'Adidas Predator Accuracy .1 TF Marine Rush', 16, 4, 2850000, 2750000, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-121519541.jpg', '2023-12-12 08:20:06', '2023-12-12 08:20:06'),
(15, 'Adidas Predator Accuracy .3 TF', 16, 4, 1400000, 1200000, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-121525527.jpg', '2023-12-12 08:26:03', '2023-12-16 19:16:25'),
(16, 'Adidas Predator Accuracy .1 TF Crazyrush', 16, 4, 1700000, 1100000, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-121526356.jpg', '2023-12-12 08:26:46', '2023-12-12 08:26:46'),
(17, 'Adidas Predator Accuracy .3 L TF Heatspawn', 16, 4, 1690000, 1690000, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-121527065.jpg', '2023-12-12 08:27:19', '2023-12-12 08:27:19'),
(18, 'Adidas Predator Accuracy .1 TF', 16, 4, 1100000, 1000000, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-121527442.jpg', '2023-12-12 08:27:50', '2023-12-12 08:27:50'),
(19, 'Puma Future Match MG Gear Up Persian', 2, 2, 2200000, 2100000, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-161516211.jpg', '2023-12-16 08:16:26', '2023-12-16 18:56:34'),
(20, 'Puma Future Ultimate Energy Cage TT', 2, 2, 2850000, 2550000, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-161516522.jpg', '2023-12-16 08:16:57', '2023-12-16 18:56:42'),
(21, 'Puma Ultra Match TF Breakthrough', 2, 2, 2040000, 1040000, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-161517273.jpg', '2023-12-16 08:17:31', '2023-12-16 18:56:18'),
(23, 'Puma Future Match MG Breakthrough', 2, 2, 2250000, 0, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-161518405.jpg', '2023-12-16 08:18:44', '2023-12-16 08:18:44'),
(26, 'Puma Future Ultimate Cage TF Breakthrough', 2, 2, 2800000, 2200000, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-161519507.jpg', '2023-12-16 08:19:54', '2023-12-16 18:53:28'),
(27, 'Giày bóng đá Mizuno Morelia Neo 4 Pro AS TF', 18, 7, 2850000, 0, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-161521321.jpg', '2023-12-16 08:21:44', '2023-12-16 08:34:05'),
(28, 'Mizuno Morelia Neo 3 Pro TF', 18, 7, 1950000, 0, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-161530173.jpg', '2023-12-16 08:30:26', '2023-12-16 08:30:26'),
(29, 'Mizuno Morelia Sala Club TF', 18, 7, 1950000, 0, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-161531326.jpg', '2023-12-16 08:31:38', '2023-12-16 08:31:38'),
(30, 'Mizuno Morelia Neo III Pro AS TF', 18, 7, 2750000, 0, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-161532005.jpg', '2023-12-16 08:32:09', '2023-12-16 08:32:09'),
(31, 'Mizuno α Alpha Select AS TF', 20, 7, 1220000, 0, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-161532451.jpg', '2023-12-16 08:32:49', '2023-12-16 08:32:49'),
(32, 'Mizuno α Alpha Select TF AS', 20, 7, 1250000, NULL, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-161533222.jpg', '2023-12-16 08:33:30', '2023-12-16 08:33:30'),
(33, 'Mizuno Monarcida Neo Sala Pro TF', 19, 7, 1990000, 0, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-161535021.jpg', '2023-12-16 08:35:09', '2023-12-16 08:35:09'),
(34, 'Mizuno Monarcida Neo II Select AS TF', 19, 7, 1990000, 0, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-161535222.jpg', '2023-12-16 08:35:27', '2023-12-16 08:35:27'),
(35, 'Mizuno Monarcida Neo Sala Select TF', 19, 7, 1990000, 0, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-161535445.jpg', '2023-12-16 08:35:53', '2023-12-16 08:35:53'),
(36, 'Giày bóng đá Zocker Pioneer TF', 6, 5, 1390000, 0, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-161536471.jpg', '2023-12-16 08:36:53', '2023-12-16 08:36:53'),
(37, 'Giày bóng đá Zocker Inspire Pro TF', 6, 5, 729000, 0, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-161537142.jpg', '2023-12-16 08:37:19', '2023-12-16 08:37:19'),
(38, 'Giày bóng đá Zocker Inspire TF', 6, 5, 660000, 0, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-161537364.jpg', '2023-12-16 08:37:40', '2023-12-16 08:37:40'),
(39, 'Kamito TA11 TF Woncup WC 2022', 7, 6, 450000, 0, 1, 0, 'http://localhost:8000/storage/uploads/images/2023-12-161538141.png', '2023-12-16 08:38:19', '2023-12-16 08:38:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_details`
--

CREATE TABLE `product_details` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `code_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_in_stock` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `code_color`, `code_size`, `thumb`, `unit_in_stock`, `created_at`, `updated_at`) VALUES
(1, 1, '#F39402', '39', 'http://localhost:8000/storage/uploads/images/2023-12-170115102.jpg', 9, '2023-11-08 21:41:33', '2023-12-16 18:15:12'),
(2, 1, '#F39402', '40', 'http://localhost:8000/storage/uploads/images/2023-12-170114472.jpg', 8, '2023-11-08 21:41:33', '2023-12-16 18:14:48'),
(3, 1, '#FFFFFF', '39', 'http://localhost:8000/storage/uploads/images/2023-12-170114366.jpg', 3, '2023-11-08 21:41:33', '2023-12-16 18:14:37'),
(4, 1, '#2C3E50', '43', 'http://localhost:8000/storage/uploads/images/2023-12-170115204.jpg', 24, '2023-11-08 21:41:33', '2023-12-16 18:15:22'),
(5, 1, '#F8228A', '40', 'http://localhost:8000/storage/uploads/images/2023-12-170115313.jpg', 102, '2023-11-08 21:41:33', '2023-12-16 18:15:33'),
(6, 2, '#F62612', '42', 'http://localhost:8000/storage/uploads/images/2023-12-170115405.jpg', 9, '2023-11-08 21:41:33', '2023-12-16 18:15:42'),
(7, 2, '#F39402', '41', 'http://localhost:8000/storage/uploads/images/2023-12-170115512.jpg', 9, '2023-11-08 21:41:33', '2023-12-16 18:15:52'),
(8, 3, '#1145F6', '39', 'http://localhost:8000/storage/uploads/images/2023-12-170116004.jpg', 5, '2023-11-08 21:41:33', '2023-12-16 18:16:02'),
(9, 4, '#1145F6', '39', 'http://localhost:8000/storage/uploads/images/2023-12-170116174.jpg', 34, '2023-11-08 21:41:33', '2023-12-16 18:16:19'),
(10, 5, '#F62612', '42', 'http://localhost:8000/storage/uploads/images/2023-12-170116275.jpg', 11, '2023-11-08 21:41:33', '2023-12-16 18:16:29'),
(11, 6, '#F62612', '39', 'http://localhost:8000/storage/uploads/images/2023-12-170114035.jpg', 9, '2023-11-08 21:41:33', '2023-12-16 18:14:05'),
(12, 7, '#1145F6', '40', 'http://localhost:8000/storage/uploads/images/2023-12-161539487.jpg', 12, '2023-11-08 21:41:33', '2023-12-16 08:41:03'),
(14, 7, '#1145F6', '41', 'http://localhost:8000/storage/uploads/images/2023-12-161539487.jpg', 12, '2023-12-16 08:41:19', '2023-12-16 08:41:19'),
(15, 7, '#ca483f', '39', 'http://localhost:8000/storage/uploads/images/2023-12-161541371.jpg', 17, '2023-12-16 08:41:45', '2023-12-16 08:41:45'),
(16, 7, '#1145F6', '39', 'http://localhost:8000/storage/uploads/images/2023-12-161539487.jpg', 14, '2023-12-16 08:46:14', '2023-12-16 09:16:56'),
(17, 1, '#010000', '38', 'http://localhost:8000/storage/uploads/images/2023-12-170113451.jpg', 11, '2023-12-16 09:17:33', '2023-12-16 18:13:47'),
(18, 10, '#e12323', '38', 'http://localhost:8000/storage/uploads/images/2023-12-170117505.jpg', 11, '2023-12-16 18:17:55', '2023-12-16 18:17:55'),
(19, 10, '#f4d2d2', '40', 'http://localhost:8000/storage/uploads/images/2023-12-170118133.jpg', 12, '2023-12-16 18:18:17', '2023-12-16 18:18:17'),
(20, 39, '#f46c6c', '43', 'http://localhost:8000/storage/uploads/images/2023-12-170125481.png', 2, '2023-12-16 18:25:52', '2023-12-16 18:25:52'),
(21, 39, '#f46c6c', '39', 'http://localhost:8000/storage/uploads/images/2023-12-170126281.png', 22, '2023-12-16 18:26:31', '2023-12-16 18:26:31'),
(22, 35, '#8e3939', '38', 'http://localhost:8000/storage/uploads/images/2023-12-170149494.jpg', 34, '2023-12-16 18:49:54', '2023-12-16 18:49:54'),
(23, 26, '#010000', '38', 'http://localhost:8000/storage/uploads/images/2023-12-170151367.jpg', 34, '2023-12-16 18:51:38', '2023-12-16 18:51:38'),
(24, 26, '#010000', '39', 'http://localhost:8000/storage/uploads/images/2023-12-170151547.jpg', 31, '2023-12-16 18:52:00', '2023-12-16 18:52:00'),
(25, 26, '#4364c7', '40', 'http://localhost:8000/storage/uploads/images/2023-12-170152151.jpg', 1, '2023-12-16 18:52:18', '2023-12-16 18:52:18'),
(27, 36, '#010000', '38', 'http://localhost:8000/storage/uploads/images/2023-12-170206431.jpg', 1, '2023-12-16 19:06:46', '2023-12-16 19:06:46'),
(28, 36, '#b4fdb9', '40', 'http://localhost:8000/storage/uploads/images/2023-12-170206592.jpg', 12, '2023-12-16 19:07:03', '2023-12-16 19:07:03'),
(29, 36, '#65bbd7', '42', 'http://localhost:8000/storage/uploads/images/2023-12-170207133.jpg', 12, '2023-12-16 19:07:18', '2023-12-16 19:07:18'),
(30, 37, '#e5d7d7', '41', 'http://localhost:8000/storage/uploads/images/2023-12-170207285.jpg', 12, '2023-12-16 19:07:32', '2023-12-16 19:07:32'),
(31, 38, '#60d282', '41', 'http://localhost:8000/storage/uploads/images/2023-12-170207434.jpg', 12, '2023-12-16 19:07:48', '2023-12-16 19:07:48'),
(32, 8, '#b46464', '40', 'http://localhost:8000/storage/uploads/images/2023-12-170209058.jpg', 11, '2023-12-16 19:09:07', '2023-12-16 20:28:51'),
(33, 9, '#5ca0bc', '41', 'http://localhost:8000/storage/uploads/images/2023-12-170209202.jpg', 12, '2023-12-16 19:09:26', '2023-12-16 19:09:26'),
(34, 11, '#56d770', '40', 'http://localhost:8000/storage/uploads/images/2023-12-170209365.png', 12, '2023-12-16 19:09:41', '2023-12-16 19:09:41'),
(35, 12, '#010000', '40', 'http://localhost:8000/storage/uploads/images/2023-12-170209544.jpg', 12, '2023-12-16 19:10:00', '2023-12-16 19:10:00'),
(36, 14, '#63b0bb', '39', 'http://localhost:8000/storage/uploads/images/2023-12-170211241.jpg', 11, '2023-12-16 19:11:28', '2023-12-16 19:11:28'),
(37, 15, '#ef7625', '41', 'http://localhost:8000/storage/uploads/images/2023-12-170211365.jpg', 11, '2023-12-16 19:11:44', '2023-12-16 19:11:44'),
(38, 17, '#d123a3', '40', 'http://localhost:8000/storage/uploads/images/2023-12-170211537.jpg', 11, '2023-12-16 19:11:58', '2023-12-16 19:11:58'),
(39, 18, '#68e246', '41', 'http://localhost:8000/storage/uploads/images/2023-12-170212093.jpg', 11, '2023-12-16 19:12:14', '2023-12-16 19:12:14'),
(40, 19, '#010000', '40', 'http://localhost:8000/storage/uploads/images/2023-12-170214047.jpg', 11, '2023-12-16 19:14:10', '2023-12-16 19:14:10'),
(41, 20, '#d87e18', '39', 'http://localhost:8000/storage/uploads/images/2023-12-170214205.jpg', 11, '2023-12-16 19:14:26', '2023-12-16 19:14:26'),
(42, 21, '#ee5db9', '41', 'http://localhost:8000/storage/uploads/images/2023-12-170214384.jpg', 11, '2023-12-16 19:14:46', '2023-12-16 19:14:46'),
(43, 21, '#c7c93b', '41', 'http://localhost:8000/storage/uploads/images/2023-12-170214572.jpg', 11, '2023-12-16 19:15:02', '2023-12-16 19:15:02'),
(44, 26, '#164fd4', '41', 'http://localhost:8000/storage/uploads/images/2023-12-170215086.jpg', 18, '2023-12-16 19:15:23', '2023-12-16 19:15:23'),
(45, 33, '#eee2e2', '38', 'http://localhost:8000/storage/uploads/images/2023-12-170229361.jpg', 12, '2023-12-16 19:29:42', '2023-12-16 19:29:42'),
(46, 34, '#d32727', '40', 'http://localhost:8000/storage/uploads/images/2023-12-170229534.jpg', 12, '2023-12-16 19:29:59', '2023-12-16 19:29:59'),
(47, 33, '#161313', '42', 'http://localhost:8000/storage/uploads/images/2023-12-170230156.jpg', 12, '2023-12-16 19:30:20', '2023-12-16 19:30:20'),
(48, 35, '#34e549', '41', 'http://localhost:8000/storage/uploads/images/2023-12-170230345.jpg', 12, '2023-12-16 19:30:40', '2023-12-16 19:30:40'),
(49, 34, '#7bddea', '41', 'http://localhost:8000/storage/uploads/images/2023-12-170230512.jpg', 12, '2023-12-16 19:30:57', '2023-12-16 19:30:57'),
(50, 28, '#61c2ff', '39', 'http://localhost:8000/storage/uploads/images/2023-12-170231492.jpg', 12, '2023-12-16 19:31:51', '2023-12-16 19:31:51'),
(51, 29, '#ec4646', '41', 'http://localhost:8000/storage/uploads/images/2023-12-170232014.jpg', 12, '2023-12-16 19:32:05', '2023-12-16 19:32:05'),
(52, 29, '#e9dddd', '42', 'http://localhost:8000/storage/uploads/images/2023-12-170232158.jpg', 12, '2023-12-16 19:32:21', '2023-12-16 19:32:21'),
(53, 30, '#010000', '42', 'http://localhost:8000/storage/uploads/images/2023-12-170232306.jpg', 12, '2023-12-16 19:32:37', '2023-12-16 19:32:37'),
(54, 31, '#e13333', '39', 'http://localhost:8000/storage/uploads/images/2023-12-170233094.jpg', 12, '2023-12-16 19:33:14', '2023-12-16 19:33:14'),
(55, 32, '#5ddad8', '41', 'http://localhost:8000/storage/uploads/images/2023-12-170233202.jpg', 12, '2023-12-16 19:33:28', '2023-12-16 19:33:28'),
(56, 31, '#010000', '42', 'http://localhost:8000/storage/uploads/images/2023-12-170233356.jpg', 12, '2023-12-16 19:33:39', '2023-12-16 19:33:39'),
(57, 32, '#abf2b0', '41', 'http://localhost:8000/storage/uploads/images/2023-12-170233495.jpg', 12, '2023-12-16 19:34:00', '2023-12-16 19:34:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rates`
--

CREATE TABLE `rates` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `level_star` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipments`
--

CREATE TABLE `shipments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shipments`
--

INSERT INTO `shipments` (`id`, `name`, `fee`, `created_at`, `updated_at`) VALUES
(1, 'Shopee Express', 40000, '2023-11-08 21:41:32', '2023-11-08 21:41:32'),
(2, 'Ninja Vans', 30000, '2023-11-08 21:41:32', '2023-11-08 21:41:32'),
(3, 'Giao hàng tiết kiệm', 50000, '2023-11-08 21:41:32', '2023-11-08 21:41:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `created_at`, `updated_at`) VALUES
(1, '39', '2023-11-08 21:41:32', '2023-11-08 21:41:32'),
(2, '40', '2023-11-08 21:41:32', '2023-11-08 21:41:32'),
(3, '41', '2023-11-08 21:41:32', '2023-11-08 21:41:32'),
(4, '42', '2023-11-08 21:41:32', '2023-11-08 21:41:32'),
(5, '43', '2023-11-08 21:41:32', '2023-11-08 21:41:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int NOT NULL,
  `sort_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `image`, `active`, `sort_by`, `created_at`, `updated_at`) VALUES
(6, 'http://localhost:8000/storage/uploads/images/2023-12-121514411.jpeg', 1, 1, '2023-12-12 08:14:45', '2023-12-12 08:14:45'),
(7, 'http://localhost:8000/storage/uploads/images/2023-12-121514512.jpeg', 1, 1, '2023-12-12 08:14:52', '2023-12-12 08:14:52'),
(8, 'http://localhost:8000/storage/uploads/images/2023-12-121514593.jpeg', 1, 1, '2023-12-12 08:15:01', '2023-12-12 08:15:01'),
(9, 'http://localhost:8000/storage/uploads/images/2023-12-121515054.jpeg', 1, 1, '2023-12-12 08:15:07', '2023-12-12 08:15:07'),
(10, 'http://localhost:8000/storage/uploads/images/2023-12-121515125.png', 1, 1, '2023-12-12 08:15:13', '2023-12-12 08:15:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `socials`
--

CREATE TABLE `socials` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `provider_user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `socials`
--

INSERT INTO `socials` (`id`, `user_id`, `provider_user_id`, `provider`, `created_at`, `updated_at`) VALUES
(1, 1, '118162473771899746612', 'GOOGLE', '2023-11-22 07:11:33', '2023-11-22 07:11:33'),
(2, 1, '818566819657869', 'FACEBOOK', '2023-12-06 06:03:30', '2023-12-06 06:03:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Nike', 'Michigan, America', 'louis@gmail.com', '0368822642', '2023-11-08 21:41:32', '2023-12-11 09:03:18'),
(2, 'Puma', 'Michigan, America', 'gucci@gmail.com', '0368822642', '2023-11-08 21:41:32', '2023-12-11 09:03:34'),
(3, 'Wika', 'Texas, America', 'dolce@gmail.com', '0368822642', '2023-11-08 21:41:32', '2023-12-11 09:03:51'),
(4, 'Adidas', 'Ohio, America', 'adidas@gmail.com', 'XXXXXXXXXX', '2023-11-08 21:41:32', '2023-11-08 21:41:32'),
(5, 'Zocker', 'zocker', 'zocker@gmail.com', '0368822642', '2023-12-11 09:04:23', '2023-12-11 09:04:23'),
(6, 'Kamito', 'Kamito', 'kamito@gmail.com', '0368822642', NULL, NULL),
(7, 'Mizuno', 'Mizuno', 'mizuno@gmail.com', '0368822642', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int NOT NULL DEFAULT '0',
  `avatar` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` int DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `avatar`, `province`, `district`, `ward`, `street`, `zip_code`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dương Văn Khải', 'duongvankhai2022001@gmail.com', NULL, '$2y$10$oUu8waMeBLiBGBUF.iOyIuucsIsySot0XCwobwo06rXW6SPmNY2S6', 1, 'https://lh3.googleusercontent.com/a/ACg8ocKjvlAyXm7zY_S4otpgQbOD1VwjFZ7Lzo-IWEpJmcQHIp4=s96-c', 'Thành phố Hà Nội', 'Huyện Chương Mỹ', 'Thị trấn Xuân Mai', '1', 1, '0368822642', NULL, '2023-11-08 21:41:33', '2023-12-16 19:10:29'),
(2, 'Chiến', 'chien@gmail.com', NULL, '$2y$10$zcE2mc/Euz7ZMVKtkHKbD.v2152YzIM1q7NwCdkMFO0E7N0ZZWNjG', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-08 21:41:33', '2023-11-08 21:41:33'),
(3, 'Huy', 'huy@gmail.com', NULL, '$2y$10$jOju.OEeVeLbSUzleYGXDOXbMFK/MdAOTZ34sNFfJu4KKE9b1qozG', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-08 21:41:33', '2023-11-08 21:41:33'),
(5, 'Ga vcl', 'admin@gmail.com', NULL, '$2y$10$y/lp4gZ.XAC73lSB2FDuIuNYhG.vqE13vbj8e/X0cKGww7fnmAh0W', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-06 05:49:32', '2023-12-06 05:49:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int NOT NULL,
  `active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vouchers`
--

INSERT INTO `vouchers` (`id`, `name`, `discount`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Khuyến mãi 5%', 5, 1, '2023-11-08 21:41:33', '2023-11-08 21:41:33'),
(2, 'Khuyến mãi 6%', 6, 1, '2023-11-08 21:41:33', '2023-11-08 21:41:33'),
(3, 'Khuyến mãi 7%', 7, 1, '2023-11-08 21:41:33', '2023-11-08 21:41:33'),
(4, 'Khuyến mãi 8%', 8, 1, '2023-11-08 21:41:33', '2023-11-08 21:41:33'),
(5, 'Khuyến mãi 9%', 9, 1, '2023-11-08 21:41:33', '2023-11-08 21:41:33'),
(6, 'Khuyến mãi 10%', 10, 1, '2023-11-08 21:41:33', '2023-11-08 21:41:33');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_customer_id_unique` (`customer_id`),
  ADD KEY `orders_shipment_id_foreign` (`shipment_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_detail_id_foreign` (`product_detail_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_supplier_id_foreign` (`supplier_id`);

--
-- Chỉ mục cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_details_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rates_product_id_foreign` (`product_id`),
  ADD KEY `rates_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `socials_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `rates`
--
ALTER TABLE `rates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_shipment_id_foreign` FOREIGN KEY (`shipment_id`) REFERENCES `shipments` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_detail_id_foreign` FOREIGN KEY (`product_detail_id`) REFERENCES `product_details` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `socials`
--
ALTER TABLE `socials`
  ADD CONSTRAINT `socials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 29, 2021 lúc 04:28 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopb2c`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'users.id',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` int(11) NOT NULL,
  `brand_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_description`, `brand_status`, `brand_slug`, `brand_keyword`, `created_at`, `updated_at`) VALUES
(1, 'Hoa Quả Việt', '', 1, '', '', '2021-03-15 04:08:14', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `name`, `qty`, `sale`, `price`, `image`, `created_at`, `updated_at`) VALUES
(2, 4, 1, 'Xoài ', 1, 22, 10000, '1-1200x676-46.jpg', '2021-03-27 06:24:18', '2021-03-27 06:24:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_description`, `category_status`, `category_slug`, `category_keyword`, `created_at`, `updated_at`) VALUES
(1, 'Thịt Tươi Sống', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia mollit anim id est laborum.  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventor.  Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem', 1, 'thit-tuoi-song', 'meat', '2021-03-15 03:07:43', NULL),
(2, 'Rau sạch', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia mollit anim id est laborum.  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventor.  Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem', 1, 'rau-sach', 'vegetables', '2021-03-15 03:07:43', NULL),
(3, 'Trái Cây & Hạt', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia mollit anim id est laborum.  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventor.  Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem', 1, 'trai-cay-hat', 'fruilt', '2021-03-15 03:07:43', NULL),
(4, 'Hải Sản', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia mollit anim id est laborum.  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventor.  Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem', 1, 'hai-san', 'ocean foods', '2021-03-15 03:07:43', NULL),
(5, 'Bơ & Trứng', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia mollit anim id est laborum.  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventor.  Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem', 1, 'bo-trung', 'butter & eggs', '2021-03-15 03:07:43', NULL),
(6, 'Thức Ăn Nhanh', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia mollit anim id est laborum.  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventor.  Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem', 1, 'thuc-an-nhanh', 'butter & eggs', '2021-03-15 03:07:43', NULL),
(7, 'Thực Phẩm Khô', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia mollit anim id est laborum.  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventor.  Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem', 1, 'thuc-an-kho', 'butter & eggs', '2021-03-15 03:07:43', NULL),
(8, 'Thực Phâm Đóng Hộp', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia mollit anim id est laborum.  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventor.  Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem', 1, 'thuc-an-kho', 'butter & eggs', '2021-03-15 03:07:43', NULL),
(9, 'Gạo & Nông Sản', '', 1, 'thuc-an-kho', 'butter & eggs', '2021-03-15 03:07:43', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `feature` int(11) NOT NULL,
  `discount_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `code`, `qty`, `feature`, `discount_number`, `created_at`, `updated_at`) VALUES
(1, 'GIảm giá', '232', 111, 1, 11, '2021-03-29 06:46:40', '2021-03-29 06:55:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'users.id',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 3, 'Shop Hoa Quả', '012421413423', 'Ha Noi', '2021-03-15 04:04:38', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feeships`
--

CREATE TABLE `feeships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matp` bigint(20) UNSIGNED NOT NULL COMMENT 'vn_tinhthanhpho.id',
  `maqh` bigint(20) UNSIGNED NOT NULL COMMENT 'vn_quanhuyen.id',
  `maxptr` bigint(20) UNSIGNED NOT NULL COMMENT 'vn_xaphuongthitran.id',
  `feeship` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_03_08_023121_create_sellers_table', 1),
(4, '2021_03_08_101253_create_brands_table', 1),
(5, '2021_03_08_101414_create_categories_table', 1),
(6, '2021_03_08_101513_create_customers_table', 1),
(7, '2021_03_08_101543_create_roles_table', 1),
(8, '2021_03_08_101621_create_orders_table', 1),
(9, '2021_03_08_101647_create_order_details_table', 1),
(10, '2021_03_08_101725_create_products_table', 1),
(11, '2021_03_08_101801_create_ratings_table', 1),
(12, '2021_03_08_101835_create_product_images_table', 1),
(13, '2021_03_08_101913_create_product_tags_table', 1),
(14, '2021_03_08_101936_create_tags_table', 1),
(15, '2021_03_08_102037_create_payments_table', 1),
(16, '2021_03_08_102129_create_feeships_table', 1),
(17, '2021_03_08_102641_create_vn_quanhuyen_table', 1),
(18, '2021_03_08_102722_create_vn_tinhthanhpho_table', 1),
(19, '2021_03_08_102753_create_vn_xaphuongthitran_table', 1),
(20, '2021_03_08_103856_create_coupons_table', 1),
(21, '2021_03_08_104234_create_shippings_table', 1),
(22, '2021_03_09_014709_create_admins_table', 1),
(23, '2021_03_09_020249_create_socials_table', 1),
(24, '2021_03_09_022102_add_foreign_key_to_customers_table', 1),
(25, '2021_03_09_022510_add_foreign_key_to_orders_table', 1),
(26, '2021_03_09_022900_add_foreign_key_to_order_details_table', 1),
(27, '2021_03_09_024507_add_foreign_key_to_products_table', 1),
(28, '2021_03_09_024818_add_foreign_key_to_ratings_table', 1),
(29, '2021_03_09_025006_add_foreign_key_to_product_images_table', 1),
(30, '2021_03_09_025136_add_foreign_key_to_product_tags_table', 1),
(31, '2021_03_09_025607_add_foreign_key_to_feeships_table', 1),
(32, '2021_03_09_030027_add_foreign_key_to_vn_quanhuyen_table', 1),
(33, '2021_03_09_030149_add_foreign_key_to_vn_xaphuongthitran_table', 1),
(34, '2021_03_09_030430_add_foreign_key_to_shippings_table', 1),
(35, '2021_03_09_030627_add_foreign_key_to_admins_table', 1),
(36, '2021_03_09_030758_add_foreign_key_to_socials_table', 1),
(37, '2021_03_09_030852_add_foreign_key_to_sellers_table', 1),
(38, '2021_03_09_030852_add_foreign_key_to_users_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL COMMENT 'customers.id',
  `shipping_id` bigint(20) UNSIGNED NOT NULL COMMENT 'shippings.id',
  `payment_id` bigint(20) UNSIGNED NOT NULL COMMENT 'payments.id',
  `total` double(8,2) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL COMMENT 'orders.id',
  `product_id` bigint(20) UNSIGNED NOT NULL COMMENT 'products.id',
  `seller_id` bigint(20) UNSIGNED NOT NULL COMMENT 'sellers.id',
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee_ship` int(11) NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL COMMENT 'orders.id',
  `thanh_vien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `money` double(8,2) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vnp_response_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_vnpay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL COMMENT 'categorys.id',
  `brand_id` bigint(20) UNSIGNED NOT NULL COMMENT 'brands.id',
  `seller_id` bigint(20) UNSIGNED NOT NULL COMMENT 'sellers.id',
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` float NOT NULL,
  `sale` int(10) NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `seller_id`, `product_name`, `slug`, `product_desc`, `product_content`, `product_price`, `sale`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 'Xoài ', 'xoai', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia mollit anim id est laborum.  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventor.  Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem', 'Xoài chín cây, ngon', 10000, 22, 1, '2021-03-15 04:09:02', NULL),
(2, 3, 1, 1, 'Xoài ', 'xoai', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia mollit anim id est laborum.  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventor.  Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem', 'Xoài chín cây, ngon', 10000, 5, 1, '2021-03-15 04:09:02', NULL),
(3, 3, 1, 1, 'Xoài ', 'xoai', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia mollit anim id est laborum.  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventor.  Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem', 'Xoài chín cây, ngon', 10000, 10, 1, '2021-03-15 04:09:02', NULL),
(4, 3, 1, 1, 'Xoài ', 'xoai', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia mollit anim id est laborum.  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventor.  Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem', 'Xoài chín cây, ngon', 10000, 0, 1, '2021-03-15 04:09:02', NULL),
(5, 2, 1, 1, 'Cải Thảo', 'cai-thao', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia mollit anim id est laborum.  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventor.  Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem', 'Xoài chín cây, ngon', 20000, 10, 1, '2021-03-15 04:09:02', NULL),
(6, 1, 1, 1, 'Thịt Bò', 'thit-bo', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia mollit anim id est laborum.  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventor.  Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem', 'Xoài chín cây, ngon', 70000, 10, 1, '2021-03-15 04:09:02', NULL),
(7, 4, 1, 1, 'Cá Ngừ Bông', 'ca-ngu-bong', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia mollit anim id est laborum.  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventor.  Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem', 'Xoài chín cây, ngon', 70000, 10, 1, '2021-03-15 04:09:02', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL COMMENT 'products.id',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '1-1200x676-46.jpg', '2021-03-15 04:11:32', NULL),
(2, 2, '7-diem-danh-9-giong-xoai-thom-ngon-va-pho-bien-tai-viet-nam.jpg', '2021-03-15 04:11:32', NULL),
(3, 3, 'thum-1200x676-3.jpg', '2021-03-15 04:11:32', NULL),
(4, 4, '1574750592-4663ca7c57ee00aec30305c0167bf6d9.jpg', '2021-03-15 04:11:32', NULL),
(5, 5, 'mua-cai-thao-da-lat-tai-ha-noi.jpg', '2021-03-15 04:11:32', NULL),
(6, 6, 'photo-1-1482451521171.jpg', '2021-03-15 04:11:32', NULL),
(7, 7, 'Cá-ngừ-bông_Bonito.jpg', '2021-03-15 04:11:32', NULL),
(8, 1, '7-diem-danh-9-giong-xoai-thom-ngon-va-pho-bien-tai-viet-nam.jpg', '2021-03-15 04:11:32', NULL),
(9, 1, 'thum-1200x676-3.jpg', '2021-03-15 04:11:32', NULL),
(10, 1, '1574750592-4663ca7c57ee00aec30305c0167bf6d9.jpg', '2021-03-15 04:11:32', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_tags`
--

CREATE TABLE `product_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL COMMENT 'products.id',
  `tag_id` bigint(20) UNSIGNED NOT NULL COMMENT 'tags.id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_tags`
--

INSERT INTO `product_tags` (`id`, `product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-03-16 06:09:28', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL COMMENT 'products.id',
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'users.id',
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `product_id`, `user_id`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 2, '2021-03-16 03:38:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `status`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 0, 'user', '2021-03-10 02:00:39', NULL),
(2, 1, 'customer', '2021-03-10 02:00:39', NULL),
(3, 2, 'admin', '2021-03-10 02:00:39', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL COMMENT 'customers.id',
  `shop_info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sellers`
--

INSERT INTO `sellers` (`id`, `customer_id`, `shop_info`, `shop_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Shop bán hoa quả tươi ngon', 'shop 01', '2021-03-15 04:06:15', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL COMMENT 'customers.id',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'users.id',
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 'hoaqua', 'hoa quả', '2021-03-16 06:07:38', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL COMMENT 'user:0, customer:1, admin:2',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 3, 'Admin', 'hadv62@wru.vn', '$2y$10$F5XZXU/TogwQiXBDNHTZ8OBvU0dREfdhLggOR.v3w.KeFiQ9pyvX2', '2021-03-10 02:01:26', '2021-03-11 02:00:44'),
(3, 2, 'Customer', 'customer@gmail.com', '$2y$10$o828wF5m4k5a0V1QzKL6vubd4b6.4IidFEBEIJJ0e5/OJ1M2UZlge', '2021-03-10 02:01:26', NULL),
(4, 1, NULL, 'bapyeu9x@gmail.com', '$2y$10$hh8DPv8.KrV0wFQWjVUNJOd0z0.NxCneqZqBC1/e1KbZqOwmZJ7m.', '2021-03-26 20:46:32', '2021-03-26 20:46:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_quanhuyen`
--

CREATE TABLE `vn_quanhuyen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matp` bigint(20) UNSIGNED NOT NULL COMMENT 'vn_tinhthanhpho.id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vn_quanhuyen`
--

INSERT INTO `vn_quanhuyen` (`id`, `name`, `type`, `matp`, `created_at`, `updated_at`) VALUES
(1, 'Quận Ba Đình', 'Quận', 1, NULL, NULL),
(2, 'Quận Hoàn Kiếm', 'Quận', 1, NULL, NULL),
(3, 'Quận Tây Hồ', 'Quận', 1, NULL, NULL),
(4, 'Quận Long Biên', 'Quận', 1, NULL, NULL),
(5, 'Quận Cầu Giấy', 'Quận', 1, NULL, NULL),
(6, 'Quận Đống Đa', 'Quận', 1, NULL, NULL),
(7, 'Quận Hai Bà Trưng', 'Quận', 1, NULL, NULL),
(8, 'Quận Hoàng Mai', 'Quận', 1, NULL, NULL),
(9, 'Quận Thanh Xuân', 'Quận', 1, NULL, NULL),
(16, 'Huyện Sóc Sơn', 'Huyện', 1, NULL, NULL),
(17, 'Huyện Đông Anh', 'Huyện', 1, NULL, NULL),
(18, 'Huyện Gia Lâm', 'Huyện', 1, NULL, NULL),
(19, 'Quận Nam Từ Liêm', 'Quận', 1, NULL, NULL),
(20, 'Huyện Thanh Trì', 'Huyện', 1, NULL, NULL),
(21, 'Quận Bắc Từ Liêm', 'Quận', 1, NULL, NULL),
(24, 'Thành phố Hà Giang', 'Thành phố', 2, NULL, NULL),
(26, 'Huyện Đồng Văn', 'Huyện', 2, NULL, NULL),
(27, 'Huyện Mèo Vạc', 'Huyện', 2, NULL, NULL),
(28, 'Huyện Yên Minh', 'Huyện', 2, NULL, NULL),
(29, 'Huyện Quản Bạ', 'Huyện', 2, NULL, NULL),
(30, 'Huyện Vị Xuyên', 'Huyện', 2, NULL, NULL),
(31, 'Huyện Bắc Mê', 'Huyện', 2, NULL, NULL),
(32, 'Huyện Hoàng Su Phì', 'Huyện', 2, NULL, NULL),
(33, 'Huyện Xín Mần', 'Huyện', 2, NULL, NULL),
(34, 'Huyện Bắc Quang', 'Huyện', 2, NULL, NULL),
(35, 'Huyện Quang Bình', 'Huyện', 2, NULL, NULL),
(40, 'Thành phố Cao Bằng', 'Thành phố', 4, NULL, NULL),
(42, 'Huyện Bảo Lâm', 'Huyện', 4, NULL, NULL),
(43, 'Huyện Bảo Lạc', 'Huyện', 4, NULL, NULL),
(44, 'Huyện Thông Nông', 'Huyện', 4, NULL, NULL),
(45, 'Huyện Hà Quảng', 'Huyện', 4, NULL, NULL),
(46, 'Huyện Trà Lĩnh', 'Huyện', 4, NULL, NULL),
(47, 'Huyện Trùng Khánh', 'Huyện', 4, NULL, NULL),
(48, 'Huyện Hạ Lang', 'Huyện', 4, NULL, NULL),
(49, 'Huyện Quảng Uyên', 'Huyện', 4, NULL, NULL),
(50, 'Huyện Phục Hoà', 'Huyện', 4, NULL, NULL),
(51, 'Huyện Hoà An', 'Huyện', 4, NULL, NULL),
(52, 'Huyện Nguyên Bình', 'Huyện', 4, NULL, NULL),
(53, 'Huyện Thạch An', 'Huyện', 4, NULL, NULL),
(58, 'Thành Phố Bắc Kạn', 'Thành phố', 6, NULL, NULL),
(60, 'Huyện Pác Nặm', 'Huyện', 6, NULL, NULL),
(61, 'Huyện Ba Bể', 'Huyện', 6, NULL, NULL),
(62, 'Huyện Ngân Sơn', 'Huyện', 6, NULL, NULL),
(63, 'Huyện Bạch Thông', 'Huyện', 6, NULL, NULL),
(64, 'Huyện Chợ Đồn', 'Huyện', 6, NULL, NULL),
(65, 'Huyện Chợ Mới', 'Huyện', 6, NULL, NULL),
(66, 'Huyện Na Rì', 'Huyện', 6, NULL, NULL),
(70, 'Thành phố Tuyên Quang', 'Thành phố', 8, NULL, NULL),
(71, 'Huyện Lâm Bình', 'Huyện', 8, NULL, NULL),
(72, 'Huyện Nà Hang', 'Huyện', 8, NULL, NULL),
(73, 'Huyện Chiêm Hóa', 'Huyện', 8, NULL, NULL),
(74, 'Huyện Hàm Yên', 'Huyện', 8, NULL, NULL),
(75, 'Huyện Yên Sơn', 'Huyện', 8, NULL, NULL),
(76, 'Huyện Sơn Dương', 'Huyện', 8, NULL, NULL),
(80, 'Thành phố Lào Cai', 'Thành phố', 10, NULL, NULL),
(82, 'Huyện Bát Xát', 'Huyện', 10, NULL, NULL),
(83, 'Huyện Mường Khương', 'Huyện', 10, NULL, NULL),
(84, 'Huyện Si Ma Cai', 'Huyện', 10, NULL, NULL),
(85, 'Huyện Bắc Hà', 'Huyện', 10, NULL, NULL),
(86, 'Huyện Bảo Thắng', 'Huyện', 10, NULL, NULL),
(87, 'Huyện Bảo Yên', 'Huyện', 10, NULL, NULL),
(88, 'Huyện Sa Pa', 'Huyện', 10, NULL, NULL),
(89, 'Huyện Văn Bàn', 'Huyện', 10, NULL, NULL),
(94, 'Thành phố Điện Biên Phủ', 'Thành phố', 11, NULL, NULL),
(95, 'Thị Xã Mường Lay', 'Thị xã', 11, NULL, NULL),
(96, 'Huyện Mường Nhé', 'Huyện', 11, NULL, NULL),
(97, 'Huyện Mường Chà', 'Huyện', 11, NULL, NULL),
(98, 'Huyện Tủa Chùa', 'Huyện', 11, NULL, NULL),
(99, 'Huyện Tuần Giáo', 'Huyện', 11, NULL, NULL),
(100, 'Huyện Điện Biên', 'Huyện', 11, NULL, NULL),
(101, 'Huyện Điện Biên Đông', 'Huyện', 11, NULL, NULL),
(102, 'Huyện Mường Ảng', 'Huyện', 11, NULL, NULL),
(103, 'Huyện Nậm Pồ', 'Huyện', 11, NULL, NULL),
(105, 'Thành phố Lai Châu', 'Thành phố', 12, NULL, NULL),
(106, 'Huyện Tam Đường', 'Huyện', 12, NULL, NULL),
(107, 'Huyện Mường Tè', 'Huyện', 12, NULL, NULL),
(108, 'Huyện Sìn Hồ', 'Huyện', 12, NULL, NULL),
(109, 'Huyện Phong Thổ', 'Huyện', 12, NULL, NULL),
(110, 'Huyện Than Uyên', 'Huyện', 12, NULL, NULL),
(111, 'Huyện Tân Uyên', 'Huyện', 12, NULL, NULL),
(112, 'Huyện Nậm Nhùn', 'Huyện', 12, NULL, NULL),
(116, 'Thành phố Sơn La', 'Thành phố', 14, NULL, NULL),
(118, 'Huyện Quỳnh Nhai', 'Huyện', 14, NULL, NULL),
(119, 'Huyện Thuận Châu', 'Huyện', 14, NULL, NULL),
(120, 'Huyện Mường La', 'Huyện', 14, NULL, NULL),
(121, 'Huyện Bắc Yên', 'Huyện', 14, NULL, NULL),
(122, 'Huyện Phù Yên', 'Huyện', 14, NULL, NULL),
(123, 'Huyện Mộc Châu', 'Huyện', 14, NULL, NULL),
(124, 'Huyện Yên Châu', 'Huyện', 14, NULL, NULL),
(125, 'Huyện Mai Sơn', 'Huyện', 14, NULL, NULL),
(126, 'Huyện Sông Mã', 'Huyện', 14, NULL, NULL),
(127, 'Huyện Sốp Cộp', 'Huyện', 14, NULL, NULL),
(128, 'Huyện Vân Hồ', 'Huyện', 14, NULL, NULL),
(132, 'Thành phố Yên Bái', 'Thành phố', 15, NULL, NULL),
(133, 'Thị xã Nghĩa Lộ', 'Thị xã', 15, NULL, NULL),
(135, 'Huyện Lục Yên', 'Huyện', 15, NULL, NULL),
(136, 'Huyện Văn Yên', 'Huyện', 15, NULL, NULL),
(137, 'Huyện Mù Căng Chải', 'Huyện', 15, NULL, NULL),
(138, 'Huyện Trấn Yên', 'Huyện', 15, NULL, NULL),
(139, 'Huyện Trạm Tấu', 'Huyện', 15, NULL, NULL),
(140, 'Huyện Văn Chấn', 'Huyện', 15, NULL, NULL),
(141, 'Huyện Yên Bình', 'Huyện', 15, NULL, NULL),
(148, 'Thành phố Hòa Bình', 'Thành phố', 17, NULL, NULL),
(150, 'Huyện Đà Bắc', 'Huyện', 17, NULL, NULL),
(151, 'Huyện Kỳ Sơn', 'Huyện', 17, NULL, NULL),
(152, 'Huyện Lương Sơn', 'Huyện', 17, NULL, NULL),
(153, 'Huyện Kim Bôi', 'Huyện', 17, NULL, NULL),
(154, 'Huyện Cao Phong', 'Huyện', 17, NULL, NULL),
(155, 'Huyện Tân Lạc', 'Huyện', 17, NULL, NULL),
(156, 'Huyện Mai Châu', 'Huyện', 17, NULL, NULL),
(157, 'Huyện Lạc Sơn', 'Huyện', 17, NULL, NULL),
(158, 'Huyện Yên Thủy', 'Huyện', 17, NULL, NULL),
(159, 'Huyện Lạc Thủy', 'Huyện', 17, NULL, NULL),
(164, 'Thành phố Thái Nguyên', 'Thành phố', 19, NULL, NULL),
(165, 'Thành phố Sông Công', 'Thành phố', 19, NULL, NULL),
(167, 'Huyện Định Hóa', 'Huyện', 19, NULL, NULL),
(168, 'Huyện Phú Lương', 'Huyện', 19, NULL, NULL),
(169, 'Huyện Đồng Hỷ', 'Huyện', 19, NULL, NULL),
(170, 'Huyện Võ Nhai', 'Huyện', 19, NULL, NULL),
(171, 'Huyện Đại Từ', 'Huyện', 19, NULL, NULL),
(172, 'Thị xã Phổ Yên', 'Thị xã', 19, NULL, NULL),
(173, 'Huyện Phú Bình', 'Huyện', 19, NULL, NULL),
(178, 'Thành phố Lạng Sơn', 'Thành phố', 20, NULL, NULL),
(180, 'Huyện Tràng Định', 'Huyện', 20, NULL, NULL),
(181, 'Huyện Bình Gia', 'Huyện', 20, NULL, NULL),
(182, 'Huyện Văn Lãng', 'Huyện', 20, NULL, NULL),
(183, 'Huyện Cao Lộc', 'Huyện', 20, NULL, NULL),
(184, 'Huyện Văn Quan', 'Huyện', 20, NULL, NULL),
(185, 'Huyện Bắc Sơn', 'Huyện', 20, NULL, NULL),
(186, 'Huyện Hữu Lũng', 'Huyện', 20, NULL, NULL),
(187, 'Huyện Chi Lăng', 'Huyện', 20, NULL, NULL),
(188, 'Huyện Lộc Bình', 'Huyện', 20, NULL, NULL),
(189, 'Huyện Đình Lập', 'Huyện', 20, NULL, NULL),
(193, 'Thành phố Hạ Long', 'Thành phố', 22, NULL, NULL),
(194, 'Thành phố Móng Cái', 'Thành phố', 22, NULL, NULL),
(195, 'Thành phố Cẩm Phả', 'Thành phố', 22, NULL, NULL),
(196, 'Thành phố Uông Bí', 'Thành phố', 22, NULL, NULL),
(198, 'Huyện Bình Liêu', 'Huyện', 22, NULL, NULL),
(199, 'Huyện Tiên Yên', 'Huyện', 22, NULL, NULL),
(200, 'Huyện Đầm Hà', 'Huyện', 22, NULL, NULL),
(201, 'Huyện Hải Hà', 'Huyện', 22, NULL, NULL),
(202, 'Huyện Ba Chẽ', 'Huyện', 22, NULL, NULL),
(203, 'Huyện Vân Đồn', 'Huyện', 22, NULL, NULL),
(204, 'Huyện Hoành Bồ', 'Huyện', 22, NULL, NULL),
(205, 'Thị xã Đông Triều', 'Thị xã', 22, NULL, NULL),
(206, 'Thị xã Quảng Yên', 'Thị xã', 22, NULL, NULL),
(207, 'Huyện Cô Tô', 'Huyện', 22, NULL, NULL),
(213, 'Thành phố Bắc Giang', 'Thành phố', 24, NULL, NULL),
(215, 'Huyện Yên Thế', 'Huyện', 24, NULL, NULL),
(216, 'Huyện Tân Yên', 'Huyện', 24, NULL, NULL),
(217, 'Huyện Lạng Giang', 'Huyện', 24, NULL, NULL),
(218, 'Huyện Lục Nam', 'Huyện', 24, NULL, NULL),
(219, 'Huyện Lục Ngạn', 'Huyện', 24, NULL, NULL),
(220, 'Huyện Sơn Động', 'Huyện', 24, NULL, NULL),
(221, 'Huyện Yên Dũng', 'Huyện', 24, NULL, NULL),
(222, 'Huyện Việt Yên', 'Huyện', 24, NULL, NULL),
(223, 'Huyện Hiệp Hòa', 'Huyện', 24, NULL, NULL),
(227, 'Thành phố Việt Trì', 'Thành phố', 25, NULL, NULL),
(228, 'Thị xã Phú Thọ', 'Thị xã', 25, NULL, NULL),
(230, 'Huyện Đoan Hùng', 'Huyện', 25, NULL, NULL),
(231, 'Huyện Hạ Hoà', 'Huyện', 25, NULL, NULL),
(232, 'Huyện Thanh Ba', 'Huyện', 25, NULL, NULL),
(233, 'Huyện Phù Ninh', 'Huyện', 25, NULL, NULL),
(234, 'Huyện Yên Lập', 'Huyện', 25, NULL, NULL),
(235, 'Huyện Cẩm Khê', 'Huyện', 25, NULL, NULL),
(236, 'Huyện Tam Nông', 'Huyện', 25, NULL, NULL),
(237, 'Huyện Lâm Thao', 'Huyện', 25, NULL, NULL),
(238, 'Huyện Thanh Sơn', 'Huyện', 25, NULL, NULL),
(239, 'Huyện Thanh Thuỷ', 'Huyện', 25, NULL, NULL),
(240, 'Huyện Tân Sơn', 'Huyện', 25, NULL, NULL),
(243, 'Thành phố Vĩnh Yên', 'Thành phố', 26, NULL, NULL),
(244, 'Thị xã Phúc Yên', 'Thị xã', 26, NULL, NULL),
(246, 'Huyện Lập Thạch', 'Huyện', 26, NULL, NULL),
(247, 'Huyện Tam Dương', 'Huyện', 26, NULL, NULL),
(248, 'Huyện Tam Đảo', 'Huyện', 26, NULL, NULL),
(249, 'Huyện Bình Xuyên', 'Huyện', 26, NULL, NULL),
(250, 'Huyện Mê Linh', 'Huyện', 1, NULL, NULL),
(251, 'Huyện Yên Lạc', 'Huyện', 26, NULL, NULL),
(252, 'Huyện Vĩnh Tường', 'Huyện', 26, NULL, NULL),
(253, 'Huyện Sông Lô', 'Huyện', 26, NULL, NULL),
(256, 'Thành phố Bắc Ninh', 'Thành phố', 27, NULL, NULL),
(258, 'Huyện Yên Phong', 'Huyện', 27, NULL, NULL),
(259, 'Huyện Quế Võ', 'Huyện', 27, NULL, NULL),
(260, 'Huyện Tiên Du', 'Huyện', 27, NULL, NULL),
(261, 'Thị xã Từ Sơn', 'Thị xã', 27, NULL, NULL),
(262, 'Huyện Thuận Thành', 'Huyện', 27, NULL, NULL),
(263, 'Huyện Gia Bình', 'Huyện', 27, NULL, NULL),
(264, 'Huyện Lương Tài', 'Huyện', 27, NULL, NULL),
(268, 'Quận Hà Đông', 'Quận', 1, NULL, NULL),
(269, 'Thị xã Sơn Tây', 'Thị xã', 1, NULL, NULL),
(271, 'Huyện Ba Vì', 'Huyện', 1, NULL, NULL),
(272, 'Huyện Phúc Thọ', 'Huyện', 1, NULL, NULL),
(273, 'Huyện Đan Phượng', 'Huyện', 1, NULL, NULL),
(274, 'Huyện Hoài Đức', 'Huyện', 1, NULL, NULL),
(275, 'Huyện Quốc Oai', 'Huyện', 1, NULL, NULL),
(276, 'Huyện Thạch Thất', 'Huyện', 1, NULL, NULL),
(277, 'Huyện Chương Mỹ', 'Huyện', 1, NULL, NULL),
(278, 'Huyện Thanh Oai', 'Huyện', 1, NULL, NULL),
(279, 'Huyện Thường Tín', 'Huyện', 1, NULL, NULL),
(280, 'Huyện Phú Xuyên', 'Huyện', 1, NULL, NULL),
(281, 'Huyện Ứng Hòa', 'Huyện', 1, NULL, NULL),
(282, 'Huyện Mỹ Đức', 'Huyện', 1, NULL, NULL),
(288, 'Thành phố Hải Dương', 'Thành phố', 30, NULL, NULL),
(290, 'Thị xã Chí Linh', 'Thị xã', 30, NULL, NULL),
(291, 'Huyện Nam Sách', 'Huyện', 30, NULL, NULL),
(292, 'Huyện Kinh Môn', 'Huyện', 30, NULL, NULL),
(293, 'Huyện Kim Thành', 'Huyện', 30, NULL, NULL),
(294, 'Huyện Thanh Hà', 'Huyện', 30, NULL, NULL),
(295, 'Huyện Cẩm Giàng', 'Huyện', 30, NULL, NULL),
(296, 'Huyện Bình Giang', 'Huyện', 30, NULL, NULL),
(297, 'Huyện Gia Lộc', 'Huyện', 30, NULL, NULL),
(298, 'Huyện Tứ Kỳ', 'Huyện', 30, NULL, NULL),
(299, 'Huyện Ninh Giang', 'Huyện', 30, NULL, NULL),
(300, 'Huyện Thanh Miện', 'Huyện', 30, NULL, NULL),
(303, 'Quận Hồng Bàng', 'Quận', 31, NULL, NULL),
(304, 'Quận Ngô Quyền', 'Quận', 31, NULL, NULL),
(305, 'Quận Lê Chân', 'Quận', 31, NULL, NULL),
(306, 'Quận Hải An', 'Quận', 31, NULL, NULL),
(307, 'Quận Kiến An', 'Quận', 31, NULL, NULL),
(308, 'Quận Đồ Sơn', 'Quận', 31, NULL, NULL),
(309, 'Quận Dương Kinh', 'Quận', 31, NULL, NULL),
(311, 'Huyện Thuỷ Nguyên', 'Huyện', 31, NULL, NULL),
(312, 'Huyện An Dương', 'Huyện', 31, NULL, NULL),
(313, 'Huyện An Lão', 'Huyện', 31, NULL, NULL),
(314, 'Huyện Kiến Thuỵ', 'Huyện', 31, NULL, NULL),
(315, 'Huyện Tiên Lãng', 'Huyện', 31, NULL, NULL),
(316, 'Huyện Vĩnh Bảo', 'Huyện', 31, NULL, NULL),
(317, 'Huyện Cát Hải', 'Huyện', 31, NULL, NULL),
(318, 'Huyện Bạch Long Vĩ', 'Huyện', 31, NULL, NULL),
(323, 'Thành phố Hưng Yên', 'Thành phố', 33, NULL, NULL),
(325, 'Huyện Văn Lâm', 'Huyện', 33, NULL, NULL),
(326, 'Huyện Văn Giang', 'Huyện', 33, NULL, NULL),
(327, 'Huyện Yên Mỹ', 'Huyện', 33, NULL, NULL),
(328, 'Huyện Mỹ Hào', 'Huyện', 33, NULL, NULL),
(329, 'Huyện Ân Thi', 'Huyện', 33, NULL, NULL),
(330, 'Huyện Khoái Châu', 'Huyện', 33, NULL, NULL),
(331, 'Huyện Kim Động', 'Huyện', 33, NULL, NULL),
(332, 'Huyện Tiên Lữ', 'Huyện', 33, NULL, NULL),
(333, 'Huyện Phù Cừ', 'Huyện', 33, NULL, NULL),
(336, 'Thành phố Thái Bình', 'Thành phố', 34, NULL, NULL),
(338, 'Huyện Quỳnh Phụ', 'Huyện', 34, NULL, NULL),
(339, 'Huyện Hưng Hà', 'Huyện', 34, NULL, NULL),
(340, 'Huyện Đông Hưng', 'Huyện', 34, NULL, NULL),
(341, 'Huyện Thái Thụy', 'Huyện', 34, NULL, NULL),
(342, 'Huyện Tiền Hải', 'Huyện', 34, NULL, NULL),
(343, 'Huyện Kiến Xương', 'Huyện', 34, NULL, NULL),
(344, 'Huyện Vũ Thư', 'Huyện', 34, NULL, NULL),
(347, 'Thành phố Phủ Lý', 'Thành phố', 35, NULL, NULL),
(349, 'Huyện Duy Tiên', 'Huyện', 35, NULL, NULL),
(350, 'Huyện Kim Bảng', 'Huyện', 35, NULL, NULL),
(351, 'Huyện Thanh Liêm', 'Huyện', 35, NULL, NULL),
(352, 'Huyện Bình Lục', 'Huyện', 35, NULL, NULL),
(353, 'Huyện Lý Nhân', 'Huyện', 35, NULL, NULL),
(356, 'Thành phố Nam Định', 'Thành phố', 36, NULL, NULL),
(358, 'Huyện Mỹ Lộc', 'Huyện', 36, NULL, NULL),
(359, 'Huyện Vụ Bản', 'Huyện', 36, NULL, NULL),
(360, 'Huyện Ý Yên', 'Huyện', 36, NULL, NULL),
(361, 'Huyện Nghĩa Hưng', 'Huyện', 36, NULL, NULL),
(362, 'Huyện Nam Trực', 'Huyện', 36, NULL, NULL),
(363, 'Huyện Trực Ninh', 'Huyện', 36, NULL, NULL),
(364, 'Huyện Xuân Trường', 'Huyện', 36, NULL, NULL),
(365, 'Huyện Giao Thủy', 'Huyện', 36, NULL, NULL),
(366, 'Huyện Hải Hậu', 'Huyện', 36, NULL, NULL),
(369, 'Thành phố Ninh Bình', 'Thành phố', 37, NULL, NULL),
(370, 'Thành phố Tam Điệp', 'Thành phố', 37, NULL, NULL),
(372, 'Huyện Nho Quan', 'Huyện', 37, NULL, NULL),
(373, 'Huyện Gia Viễn', 'Huyện', 37, NULL, NULL),
(374, 'Huyện Hoa Lư', 'Huyện', 37, NULL, NULL),
(375, 'Huyện Yên Khánh', 'Huyện', 37, NULL, NULL),
(376, 'Huyện Kim Sơn', 'Huyện', 37, NULL, NULL),
(377, 'Huyện Yên Mô', 'Huyện', 37, NULL, NULL),
(380, 'Thành phố Thanh Hóa', 'Thành phố', 38, NULL, NULL),
(381, 'Thị xã Bỉm Sơn', 'Thị xã', 38, NULL, NULL),
(382, 'Thị xã Sầm Sơn', 'Thị xã', 38, NULL, NULL),
(384, 'Huyện Mường Lát', 'Huyện', 38, NULL, NULL),
(385, 'Huyện Quan Hóa', 'Huyện', 38, NULL, NULL),
(386, 'Huyện Bá Thước', 'Huyện', 38, NULL, NULL),
(387, 'Huyện Quan Sơn', 'Huyện', 38, NULL, NULL),
(388, 'Huyện Lang Chánh', 'Huyện', 38, NULL, NULL),
(389, 'Huyện Ngọc Lặc', 'Huyện', 38, NULL, NULL),
(390, 'Huyện Cẩm Thủy', 'Huyện', 38, NULL, NULL),
(391, 'Huyện Thạch Thành', 'Huyện', 38, NULL, NULL),
(392, 'Huyện Hà Trung', 'Huyện', 38, NULL, NULL),
(393, 'Huyện Vĩnh Lộc', 'Huyện', 38, NULL, NULL),
(394, 'Huyện Yên Định', 'Huyện', 38, NULL, NULL),
(395, 'Huyện Thọ Xuân', 'Huyện', 38, NULL, NULL),
(396, 'Huyện Thường Xuân', 'Huyện', 38, NULL, NULL),
(397, 'Huyện Triệu Sơn', 'Huyện', 38, NULL, NULL),
(398, 'Huyện Thiệu Hóa', 'Huyện', 38, NULL, NULL),
(399, 'Huyện Hoằng Hóa', 'Huyện', 38, NULL, NULL),
(400, 'Huyện Hậu Lộc', 'Huyện', 38, NULL, NULL),
(401, 'Huyện Nga Sơn', 'Huyện', 38, NULL, NULL),
(402, 'Huyện Như Xuân', 'Huyện', 38, NULL, NULL),
(403, 'Huyện Như Thanh', 'Huyện', 38, NULL, NULL),
(404, 'Huyện Nông Cống', 'Huyện', 38, NULL, NULL),
(405, 'Huyện Đông Sơn', 'Huyện', 38, NULL, NULL),
(406, 'Huyện Quảng Xương', 'Huyện', 38, NULL, NULL),
(407, 'Huyện Tĩnh Gia', 'Huyện', 38, NULL, NULL),
(412, 'Thành phố Vinh', 'Thành phố', 40, NULL, NULL),
(413, 'Thị xã Cửa Lò', 'Thị xã', 40, NULL, NULL),
(414, 'Thị xã Thái Hoà', 'Thị xã', 40, NULL, NULL),
(415, 'Huyện Quế Phong', 'Huyện', 40, NULL, NULL),
(416, 'Huyện Quỳ Châu', 'Huyện', 40, NULL, NULL),
(417, 'Huyện Kỳ Sơn', 'Huyện', 40, NULL, NULL),
(418, 'Huyện Tương Dương', 'Huyện', 40, NULL, NULL),
(419, 'Huyện Nghĩa Đàn', 'Huyện', 40, NULL, NULL),
(420, 'Huyện Quỳ Hợp', 'Huyện', 40, NULL, NULL),
(421, 'Huyện Quỳnh Lưu', 'Huyện', 40, NULL, NULL),
(422, 'Huyện Con Cuông', 'Huyện', 40, NULL, NULL),
(423, 'Huyện Tân Kỳ', 'Huyện', 40, NULL, NULL),
(424, 'Huyện Anh Sơn', 'Huyện', 40, NULL, NULL),
(425, 'Huyện Diễn Châu', 'Huyện', 40, NULL, NULL),
(426, 'Huyện Yên Thành', 'Huyện', 40, NULL, NULL),
(427, 'Huyện Đô Lương', 'Huyện', 40, NULL, NULL),
(428, 'Huyện Thanh Chương', 'Huyện', 40, NULL, NULL),
(429, 'Huyện Nghi Lộc', 'Huyện', 40, NULL, NULL),
(430, 'Huyện Nam Đàn', 'Huyện', 40, NULL, NULL),
(431, 'Huyện Hưng Nguyên', 'Huyện', 40, NULL, NULL),
(432, 'Thị xã Hoàng Mai', 'Thị xã', 40, NULL, NULL),
(436, 'Thành phố Hà Tĩnh', 'Thành phố', 42, NULL, NULL),
(437, 'Thị xã Hồng Lĩnh', 'Thị xã', 42, NULL, NULL),
(439, 'Huyện Hương Sơn', 'Huyện', 42, NULL, NULL),
(440, 'Huyện Đức Thọ', 'Huyện', 42, NULL, NULL),
(441, 'Huyện Vũ Quang', 'Huyện', 42, NULL, NULL),
(442, 'Huyện Nghi Xuân', 'Huyện', 42, NULL, NULL),
(443, 'Huyện Can Lộc', 'Huyện', 42, NULL, NULL),
(444, 'Huyện Hương Khê', 'Huyện', 42, NULL, NULL),
(445, 'Huyện Thạch Hà', 'Huyện', 42, NULL, NULL),
(446, 'Huyện Cẩm Xuyên', 'Huyện', 42, NULL, NULL),
(447, 'Huyện Kỳ Anh', 'Huyện', 42, NULL, NULL),
(448, 'Huyện Lộc Hà', 'Huyện', 42, NULL, NULL),
(449, 'Thị xã Kỳ Anh', 'Thị xã', 42, NULL, NULL),
(450, 'Thành Phố Đồng Hới', 'Thành phố', 44, NULL, NULL),
(452, 'Huyện Minh Hóa', 'Huyện', 44, NULL, NULL),
(453, 'Huyện Tuyên Hóa', 'Huyện', 44, NULL, NULL),
(454, 'Huyện Quảng Trạch', 'Thị xã', 44, NULL, NULL),
(455, 'Huyện Bố Trạch', 'Huyện', 44, NULL, NULL),
(456, 'Huyện Quảng Ninh', 'Huyện', 44, NULL, NULL),
(457, 'Huyện Lệ Thủy', 'Huyện', 44, NULL, NULL),
(458, 'Thị xã Ba Đồn', 'Huyện', 44, NULL, NULL),
(461, 'Thành phố Đông Hà', 'Thành phố', 45, NULL, NULL),
(462, 'Thị xã Quảng Trị', 'Thị xã', 45, NULL, NULL),
(464, 'Huyện Vĩnh Linh', 'Huyện', 45, NULL, NULL),
(465, 'Huyện Hướng Hóa', 'Huyện', 45, NULL, NULL),
(466, 'Huyện Gio Linh', 'Huyện', 45, NULL, NULL),
(467, 'Huyện Đa Krông', 'Huyện', 45, NULL, NULL),
(468, 'Huyện Cam Lộ', 'Huyện', 45, NULL, NULL),
(469, 'Huyện Triệu Phong', 'Huyện', 45, NULL, NULL),
(470, 'Huyện Hải Lăng', 'Huyện', 45, NULL, NULL),
(471, 'Huyện Cồn Cỏ', 'Huyện', 45, NULL, NULL),
(474, 'Thành phố Huế', 'Thành phố', 46, NULL, NULL),
(476, 'Huyện Phong Điền', 'Huyện', 46, NULL, NULL),
(477, 'Huyện Quảng Điền', 'Huyện', 46, NULL, NULL),
(478, 'Huyện Phú Vang', 'Huyện', 46, NULL, NULL),
(479, 'Thị xã Hương Thủy', 'Thị xã', 46, NULL, NULL),
(480, 'Thị xã Hương Trà', 'Thị xã', 46, NULL, NULL),
(481, 'Huyện A Lưới', 'Huyện', 46, NULL, NULL),
(482, 'Huyện Phú Lộc', 'Huyện', 46, NULL, NULL),
(483, 'Huyện Nam Đông', 'Huyện', 46, NULL, NULL),
(490, 'Quận Liên Chiểu', 'Quận', 48, NULL, NULL),
(491, 'Quận Thanh Khê', 'Quận', 48, NULL, NULL),
(492, 'Quận Hải Châu', 'Quận', 48, NULL, NULL),
(493, 'Quận Sơn Trà', 'Quận', 48, NULL, NULL),
(494, 'Quận Ngũ Hành Sơn', 'Quận', 48, NULL, NULL),
(495, 'Quận Cẩm Lệ', 'Quận', 48, NULL, NULL),
(497, 'Huyện Hòa Vang', 'Huyện', 48, NULL, NULL),
(498, 'Huyện Hoàng Sa', 'Huyện', 48, NULL, NULL),
(502, 'Thành phố Tam Kỳ', 'Thành phố', 49, NULL, NULL),
(503, 'Thành phố Hội An', 'Thành phố', 49, NULL, NULL),
(504, 'Huyện Tây Giang', 'Huyện', 49, NULL, NULL),
(505, 'Huyện Đông Giang', 'Huyện', 49, NULL, NULL),
(506, 'Huyện Đại Lộc', 'Huyện', 49, NULL, NULL),
(507, 'Thị xã Điện Bàn', 'Thị xã', 49, NULL, NULL),
(508, 'Huyện Duy Xuyên', 'Huyện', 49, NULL, NULL),
(509, 'Huyện Quế Sơn', 'Huyện', 49, NULL, NULL),
(510, 'Huyện Nam Giang', 'Huyện', 49, NULL, NULL),
(511, 'Huyện Phước Sơn', 'Huyện', 49, NULL, NULL),
(512, 'Huyện Hiệp Đức', 'Huyện', 49, NULL, NULL),
(513, 'Huyện Thăng Bình', 'Huyện', 49, NULL, NULL),
(514, 'Huyện Tiên Phước', 'Huyện', 49, NULL, NULL),
(515, 'Huyện Bắc Trà My', 'Huyện', 49, NULL, NULL),
(516, 'Huyện Nam Trà My', 'Huyện', 49, NULL, NULL),
(517, 'Huyện Núi Thành', 'Huyện', 49, NULL, NULL),
(518, 'Huyện Phú Ninh', 'Huyện', 49, NULL, NULL),
(519, 'Huyện Nông Sơn', 'Huyện', 49, NULL, NULL),
(522, 'Thành phố Quảng Ngãi', 'Thành phố', 51, NULL, NULL),
(524, 'Huyện Bình Sơn', 'Huyện', 51, NULL, NULL),
(525, 'Huyện Trà Bồng', 'Huyện', 51, NULL, NULL),
(526, 'Huyện Tây Trà', 'Huyện', 51, NULL, NULL),
(527, 'Huyện Sơn Tịnh', 'Huyện', 51, NULL, NULL),
(528, 'Huyện Tư Nghĩa', 'Huyện', 51, NULL, NULL),
(529, 'Huyện Sơn Hà', 'Huyện', 51, NULL, NULL),
(530, 'Huyện Sơn Tây', 'Huyện', 51, NULL, NULL),
(531, 'Huyện Minh Long', 'Huyện', 51, NULL, NULL),
(532, 'Huyện Nghĩa Hành', 'Huyện', 51, NULL, NULL),
(533, 'Huyện Mộ Đức', 'Huyện', 51, NULL, NULL),
(534, 'Huyện Đức Phổ', 'Huyện', 51, NULL, NULL),
(535, 'Huyện Ba Tơ', 'Huyện', 51, NULL, NULL),
(536, 'Huyện Lý Sơn', 'Huyện', 51, NULL, NULL),
(540, 'Thành phố Qui Nhơn', 'Thành phố', 52, NULL, NULL),
(542, 'Huyện An Lão', 'Huyện', 52, NULL, NULL),
(543, 'Huyện Hoài Nhơn', 'Huyện', 52, NULL, NULL),
(544, 'Huyện Hoài Ân', 'Huyện', 52, NULL, NULL),
(545, 'Huyện Phù Mỹ', 'Huyện', 52, NULL, NULL),
(546, 'Huyện Vĩnh Thạnh', 'Huyện', 52, NULL, NULL),
(547, 'Huyện Tây Sơn', 'Huyện', 52, NULL, NULL),
(548, 'Huyện Phù Cát', 'Huyện', 52, NULL, NULL),
(549, 'Thị xã An Nhơn', 'Thị xã', 52, NULL, NULL),
(550, 'Huyện Tuy Phước', 'Huyện', 52, NULL, NULL),
(551, 'Huyện Vân Canh', 'Huyện', 52, NULL, NULL),
(555, 'Thành phố Tuy Hoà', 'Thành phố', 54, NULL, NULL),
(557, 'Thị xã Sông Cầu', 'Thị xã', 54, NULL, NULL),
(558, 'Huyện Đồng Xuân', 'Huyện', 54, NULL, NULL),
(559, 'Huyện Tuy An', 'Huyện', 54, NULL, NULL),
(560, 'Huyện Sơn Hòa', 'Huyện', 54, NULL, NULL),
(561, 'Huyện Sông Hinh', 'Huyện', 54, NULL, NULL),
(562, 'Huyện Tây Hoà', 'Huyện', 54, NULL, NULL),
(563, 'Huyện Phú Hoà', 'Huyện', 54, NULL, NULL),
(564, 'Huyện Đông Hòa', 'Huyện', 54, NULL, NULL),
(568, 'Thành phố Nha Trang', 'Thành phố', 56, NULL, NULL),
(569, 'Thành phố Cam Ranh', 'Thành phố', 56, NULL, NULL),
(570, 'Huyện Cam Lâm', 'Huyện', 56, NULL, NULL),
(571, 'Huyện Vạn Ninh', 'Huyện', 56, NULL, NULL),
(572, 'Thị xã Ninh Hòa', 'Thị xã', 56, NULL, NULL),
(573, 'Huyện Khánh Vĩnh', 'Huyện', 56, NULL, NULL),
(574, 'Huyện Diên Khánh', 'Huyện', 56, NULL, NULL),
(575, 'Huyện Khánh Sơn', 'Huyện', 56, NULL, NULL),
(576, 'Huyện Trường Sa', 'Huyện', 56, NULL, NULL),
(582, 'Thành phố Phan Rang-Tháp Chàm', 'Thành phố', 58, NULL, NULL),
(584, 'Huyện Bác Ái', 'Huyện', 58, NULL, NULL),
(585, 'Huyện Ninh Sơn', 'Huyện', 58, NULL, NULL),
(586, 'Huyện Ninh Hải', 'Huyện', 58, NULL, NULL),
(587, 'Huyện Ninh Phước', 'Huyện', 58, NULL, NULL),
(588, 'Huyện Thuận Bắc', 'Huyện', 58, NULL, NULL),
(589, 'Huyện Thuận Nam', 'Huyện', 58, NULL, NULL),
(593, 'Thành phố Phan Thiết', 'Thành phố', 60, NULL, NULL),
(594, 'Thị xã La Gi', 'Thị xã', 60, NULL, NULL),
(595, 'Huyện Tuy Phong', 'Huyện', 60, NULL, NULL),
(596, 'Huyện Bắc Bình', 'Huyện', 60, NULL, NULL),
(597, 'Huyện Hàm Thuận Bắc', 'Huyện', 60, NULL, NULL),
(598, 'Huyện Hàm Thuận Nam', 'Huyện', 60, NULL, NULL),
(599, 'Huyện Tánh Linh', 'Huyện', 60, NULL, NULL),
(600, 'Huyện Đức Linh', 'Huyện', 60, NULL, NULL),
(601, 'Huyện Hàm Tân', 'Huyện', 60, NULL, NULL),
(602, 'Huyện Phú Quí', 'Huyện', 60, NULL, NULL),
(608, 'Thành phố Kon Tum', 'Thành phố', 62, NULL, NULL),
(610, 'Huyện Đắk Glei', 'Huyện', 62, NULL, NULL),
(611, 'Huyện Ngọc Hồi', 'Huyện', 62, NULL, NULL),
(612, 'Huyện Đắk Tô', 'Huyện', 62, NULL, NULL),
(613, 'Huyện Kon Plông', 'Huyện', 62, NULL, NULL),
(614, 'Huyện Kon Rẫy', 'Huyện', 62, NULL, NULL),
(615, 'Huyện Đắk Hà', 'Huyện', 62, NULL, NULL),
(616, 'Huyện Sa Thầy', 'Huyện', 62, NULL, NULL),
(617, 'Huyện Tu Mơ Rông', 'Huyện', 62, NULL, NULL),
(618, 'Huyện Ia H\' Drai', 'Huyện', 62, NULL, NULL),
(622, 'Thành phố Pleiku', 'Thành phố', 64, NULL, NULL),
(623, 'Thị xã An Khê', 'Thị xã', 64, NULL, NULL),
(624, 'Thị xã Ayun Pa', 'Thị xã', 64, NULL, NULL),
(625, 'Huyện KBang', 'Huyện', 64, NULL, NULL),
(626, 'Huyện Đăk Đoa', 'Huyện', 64, NULL, NULL),
(627, 'Huyện Chư Păh', 'Huyện', 64, NULL, NULL),
(628, 'Huyện Ia Grai', 'Huyện', 64, NULL, NULL),
(629, 'Huyện Mang Yang', 'Huyện', 64, NULL, NULL),
(630, 'Huyện Kông Chro', 'Huyện', 64, NULL, NULL),
(631, 'Huyện Đức Cơ', 'Huyện', 64, NULL, NULL),
(632, 'Huyện Chư Prông', 'Huyện', 64, NULL, NULL),
(633, 'Huyện Chư Sê', 'Huyện', 64, NULL, NULL),
(634, 'Huyện Đăk Pơ', 'Huyện', 64, NULL, NULL),
(635, 'Huyện Ia Pa', 'Huyện', 64, NULL, NULL),
(637, 'Huyện Krông Pa', 'Huyện', 64, NULL, NULL),
(638, 'Huyện Phú Thiện', 'Huyện', 64, NULL, NULL),
(639, 'Huyện Chư Pưh', 'Huyện', 64, NULL, NULL),
(643, 'Thành phố Buôn Ma Thuột', 'Thành phố', 66, NULL, NULL),
(644, 'Thị Xã Buôn Hồ', 'Thị xã', 66, NULL, NULL),
(645, 'Huyện Ea H\'leo', 'Huyện', 66, NULL, NULL),
(646, 'Huyện Ea Súp', 'Huyện', 66, NULL, NULL),
(647, 'Huyện Buôn Đôn', 'Huyện', 66, NULL, NULL),
(648, 'Huyện Cư M\'gar', 'Huyện', 66, NULL, NULL),
(649, 'Huyện Krông Búk', 'Huyện', 66, NULL, NULL),
(650, 'Huyện Krông Năng', 'Huyện', 66, NULL, NULL),
(651, 'Huyện Ea Kar', 'Huyện', 66, NULL, NULL),
(652, 'Huyện M\'Đrắk', 'Huyện', 66, NULL, NULL),
(653, 'Huyện Krông Bông', 'Huyện', 66, NULL, NULL),
(654, 'Huyện Krông Pắc', 'Huyện', 66, NULL, NULL),
(655, 'Huyện Krông A Na', 'Huyện', 66, NULL, NULL),
(656, 'Huyện Lắk', 'Huyện', 66, NULL, NULL),
(657, 'Huyện Cư Kuin', 'Huyện', 66, NULL, NULL),
(660, 'Thị xã Gia Nghĩa', 'Thị xã', 67, NULL, NULL),
(661, 'Huyện Đăk Glong', 'Huyện', 67, NULL, NULL),
(662, 'Huyện Cư Jút', 'Huyện', 67, NULL, NULL),
(663, 'Huyện Đắk Mil', 'Huyện', 67, NULL, NULL),
(664, 'Huyện Krông Nô', 'Huyện', 67, NULL, NULL),
(665, 'Huyện Đắk Song', 'Huyện', 67, NULL, NULL),
(666, 'Huyện Đắk R\'Lấp', 'Huyện', 67, NULL, NULL),
(667, 'Huyện Tuy Đức', 'Huyện', 67, NULL, NULL),
(672, 'Thành phố Đà Lạt', 'Thành phố', 68, NULL, NULL),
(673, 'Thành phố Bảo Lộc', 'Thành phố', 68, NULL, NULL),
(674, 'Huyện Đam Rông', 'Huyện', 68, NULL, NULL),
(675, 'Huyện Lạc Dương', 'Huyện', 68, NULL, NULL),
(676, 'Huyện Lâm Hà', 'Huyện', 68, NULL, NULL),
(677, 'Huyện Đơn Dương', 'Huyện', 68, NULL, NULL),
(678, 'Huyện Đức Trọng', 'Huyện', 68, NULL, NULL),
(679, 'Huyện Di Linh', 'Huyện', 68, NULL, NULL),
(680, 'Huyện Bảo Lâm', 'Huyện', 68, NULL, NULL),
(681, 'Huyện Đạ Huoai', 'Huyện', 68, NULL, NULL),
(682, 'Huyện Đạ Tẻh', 'Huyện', 68, NULL, NULL),
(683, 'Huyện Cát Tiên', 'Huyện', 68, NULL, NULL),
(688, 'Thị xã Phước Long', 'Thị xã', 70, NULL, NULL),
(689, 'Thị xã Đồng Xoài', 'Thị xã', 70, NULL, NULL),
(690, 'Thị xã Bình Long', 'Thị xã', 70, NULL, NULL),
(691, 'Huyện Bù Gia Mập', 'Huyện', 70, NULL, NULL),
(692, 'Huyện Lộc Ninh', 'Huyện', 70, NULL, NULL),
(693, 'Huyện Bù Đốp', 'Huyện', 70, NULL, NULL),
(694, 'Huyện Hớn Quản', 'Huyện', 70, NULL, NULL),
(695, 'Huyện Đồng Phú', 'Huyện', 70, NULL, NULL),
(696, 'Huyện Bù Đăng', 'Huyện', 70, NULL, NULL),
(697, 'Huyện Chơn Thành', 'Huyện', 70, NULL, NULL),
(698, 'Huyện Phú Riềng', 'Huyện', 70, NULL, NULL),
(703, 'Thành phố Tây Ninh', 'Thành phố', 72, NULL, NULL),
(705, 'Huyện Tân Biên', 'Huyện', 72, NULL, NULL),
(706, 'Huyện Tân Châu', 'Huyện', 72, NULL, NULL),
(707, 'Huyện Dương Minh Châu', 'Huyện', 72, NULL, NULL),
(708, 'Huyện Châu Thành', 'Huyện', 72, NULL, NULL),
(709, 'Huyện Hòa Thành', 'Huyện', 72, NULL, NULL),
(710, 'Huyện Gò Dầu', 'Huyện', 72, NULL, NULL),
(711, 'Huyện Bến Cầu', 'Huyện', 72, NULL, NULL),
(712, 'Huyện Trảng Bàng', 'Huyện', 72, NULL, NULL),
(718, 'Thành phố Thủ Dầu Một', 'Thành phố', 74, NULL, NULL),
(719, 'Huyện Bàu Bàng', 'Huyện', 74, NULL, NULL),
(720, 'Huyện Dầu Tiếng', 'Huyện', 74, NULL, NULL),
(721, 'Thị xã Bến Cát', 'Thị xã', 74, NULL, NULL),
(722, 'Huyện Phú Giáo', 'Huyện', 74, NULL, NULL),
(723, 'Thị xã Tân Uyên', 'Thị xã', 74, NULL, NULL),
(724, 'Thị xã Dĩ An', 'Thị xã', 74, NULL, NULL),
(725, 'Thị xã Thuận An', 'Thị xã', 74, NULL, NULL),
(726, 'Huyện Bắc Tân Uyên', 'Huyện', 74, NULL, NULL),
(731, 'Thành phố Biên Hòa', 'Thành phố', 75, NULL, NULL),
(732, 'Thị xã Long Khánh', 'Thị xã', 75, NULL, NULL),
(734, 'Huyện Tân Phú', 'Huyện', 75, NULL, NULL),
(735, 'Huyện Vĩnh Cửu', 'Huyện', 75, NULL, NULL),
(736, 'Huyện Định Quán', 'Huyện', 75, NULL, NULL),
(737, 'Huyện Trảng Bom', 'Huyện', 75, NULL, NULL),
(738, 'Huyện Thống Nhất', 'Huyện', 75, NULL, NULL),
(739, 'Huyện Cẩm Mỹ', 'Huyện', 75, NULL, NULL),
(740, 'Huyện Long Thành', 'Huyện', 75, NULL, NULL),
(741, 'Huyện Xuân Lộc', 'Huyện', 75, NULL, NULL),
(742, 'Huyện Nhơn Trạch', 'Huyện', 75, NULL, NULL),
(747, 'Thành phố Vũng Tàu', 'Thành phố', 77, NULL, NULL),
(748, 'Thành phố Bà Rịa', 'Thành phố', 77, NULL, NULL),
(750, 'Huyện Châu Đức', 'Huyện', 77, NULL, NULL),
(751, 'Huyện Xuyên Mộc', 'Huyện', 77, NULL, NULL),
(752, 'Huyện Long Điền', 'Huyện', 77, NULL, NULL),
(753, 'Huyện Đất Đỏ', 'Huyện', 77, NULL, NULL),
(754, 'Huyện Tân Thành', 'Huyện', 77, NULL, NULL),
(755, 'Huyện Côn Đảo', 'Huyện', 77, NULL, NULL),
(760, 'Quận 1', 'Quận', 79, NULL, NULL),
(761, 'Quận 12', 'Quận', 79, NULL, NULL),
(762, 'Quận Thủ Đức', 'Quận', 79, NULL, NULL),
(763, 'Quận 9', 'Quận', 79, NULL, NULL),
(764, 'Quận Gò Vấp', 'Quận', 79, NULL, NULL),
(765, 'Quận Bình Thạnh', 'Quận', 79, NULL, NULL),
(766, 'Quận Tân Bình', 'Quận', 79, NULL, NULL),
(767, 'Quận Tân Phú', 'Quận', 79, NULL, NULL),
(768, 'Quận Phú Nhuận', 'Quận', 79, NULL, NULL),
(769, 'Quận 2', 'Quận', 79, NULL, NULL),
(770, 'Quận 3', 'Quận', 79, NULL, NULL),
(771, 'Quận 10', 'Quận', 79, NULL, NULL),
(772, 'Quận 11', 'Quận', 79, NULL, NULL),
(773, 'Quận 4', 'Quận', 79, NULL, NULL),
(774, 'Quận 5', 'Quận', 79, NULL, NULL),
(775, 'Quận 6', 'Quận', 79, NULL, NULL),
(776, 'Quận 8', 'Quận', 79, NULL, NULL),
(777, 'Quận Bình Tân', 'Quận', 79, NULL, NULL),
(778, 'Quận 7', 'Quận', 79, NULL, NULL),
(783, 'Huyện Củ Chi', 'Huyện', 79, NULL, NULL),
(784, 'Huyện Hóc Môn', 'Huyện', 79, NULL, NULL),
(785, 'Huyện Bình Chánh', 'Huyện', 79, NULL, NULL),
(786, 'Huyện Nhà Bè', 'Huyện', 79, NULL, NULL),
(787, 'Huyện Cần Giờ', 'Huyện', 79, NULL, NULL),
(794, 'Thành phố Tân An', 'Thành phố', 80, NULL, NULL),
(795, 'Thị xã Kiến Tường', 'Thị xã', 80, NULL, NULL),
(796, 'Huyện Tân Hưng', 'Huyện', 80, NULL, NULL),
(797, 'Huyện Vĩnh Hưng', 'Huyện', 80, NULL, NULL),
(798, 'Huyện Mộc Hóa', 'Huyện', 80, NULL, NULL),
(799, 'Huyện Tân Thạnh', 'Huyện', 80, NULL, NULL),
(800, 'Huyện Thạnh Hóa', 'Huyện', 80, NULL, NULL),
(801, 'Huyện Đức Huệ', 'Huyện', 80, NULL, NULL),
(802, 'Huyện Đức Hòa', 'Huyện', 80, NULL, NULL),
(803, 'Huyện Bến Lức', 'Huyện', 80, NULL, NULL),
(804, 'Huyện Thủ Thừa', 'Huyện', 80, NULL, NULL),
(805, 'Huyện Tân Trụ', 'Huyện', 80, NULL, NULL),
(806, 'Huyện Cần Đước', 'Huyện', 80, NULL, NULL),
(807, 'Huyện Cần Giuộc', 'Huyện', 80, NULL, NULL),
(808, 'Huyện Châu Thành', 'Huyện', 80, NULL, NULL),
(815, 'Thành phố Mỹ Tho', 'Thành phố', 82, NULL, NULL),
(816, 'Thị xã Gò Công', 'Thị xã', 82, NULL, NULL),
(817, 'Thị xã Cai Lậy', 'Huyện', 82, NULL, NULL),
(818, 'Huyện Tân Phước', 'Huyện', 82, NULL, NULL),
(819, 'Huyện Cái Bè', 'Huyện', 82, NULL, NULL),
(820, 'Huyện Cai Lậy', 'Thị xã', 82, NULL, NULL),
(821, 'Huyện Châu Thành', 'Huyện', 82, NULL, NULL),
(822, 'Huyện Chợ Gạo', 'Huyện', 82, NULL, NULL),
(823, 'Huyện Gò Công Tây', 'Huyện', 82, NULL, NULL),
(824, 'Huyện Gò Công Đông', 'Huyện', 82, NULL, NULL),
(825, 'Huyện Tân Phú Đông', 'Huyện', 82, NULL, NULL),
(829, 'Thành phố Bến Tre', 'Thành phố', 83, NULL, NULL),
(831, 'Huyện Châu Thành', 'Huyện', 83, NULL, NULL),
(832, 'Huyện Chợ Lách', 'Huyện', 83, NULL, NULL),
(833, 'Huyện Mỏ Cày Nam', 'Huyện', 83, NULL, NULL),
(834, 'Huyện Giồng Trôm', 'Huyện', 83, NULL, NULL),
(835, 'Huyện Bình Đại', 'Huyện', 83, NULL, NULL),
(836, 'Huyện Ba Tri', 'Huyện', 83, NULL, NULL),
(837, 'Huyện Thạnh Phú', 'Huyện', 83, NULL, NULL),
(838, 'Huyện Mỏ Cày Bắc', 'Huyện', 83, NULL, NULL),
(842, 'Thành phố Trà Vinh', 'Thành phố', 84, NULL, NULL),
(844, 'Huyện Càng Long', 'Huyện', 84, NULL, NULL),
(845, 'Huyện Cầu Kè', 'Huyện', 84, NULL, NULL),
(846, 'Huyện Tiểu Cần', 'Huyện', 84, NULL, NULL),
(847, 'Huyện Châu Thành', 'Huyện', 84, NULL, NULL),
(848, 'Huyện Cầu Ngang', 'Huyện', 84, NULL, NULL),
(849, 'Huyện Trà Cú', 'Huyện', 84, NULL, NULL),
(850, 'Huyện Duyên Hải', 'Huyện', 84, NULL, NULL),
(851, 'Thị xã Duyên Hải', 'Thị xã', 84, NULL, NULL),
(855, 'Thành phố Vĩnh Long', 'Thành phố', 86, NULL, NULL),
(857, 'Huyện Long Hồ', 'Huyện', 86, NULL, NULL),
(858, 'Huyện Mang Thít', 'Huyện', 86, NULL, NULL),
(859, 'Huyện  Vũng Liêm', 'Huyện', 86, NULL, NULL),
(860, 'Huyện Tam Bình', 'Huyện', 86, NULL, NULL),
(861, 'Thị xã Bình Minh', 'Thị xã', 86, NULL, NULL),
(862, 'Huyện Trà Ôn', 'Huyện', 86, NULL, NULL),
(863, 'Huyện Bình Tân', 'Huyện', 86, NULL, NULL),
(866, 'Thành phố Cao Lãnh', 'Thành phố', 87, NULL, NULL),
(867, 'Thành phố Sa Đéc', 'Thành phố', 87, NULL, NULL),
(868, 'Thị xã Hồng Ngự', 'Thị xã', 87, NULL, NULL),
(869, 'Huyện Tân Hồng', 'Huyện', 87, NULL, NULL),
(870, 'Huyện Hồng Ngự', 'Huyện', 87, NULL, NULL),
(871, 'Huyện Tam Nông', 'Huyện', 87, NULL, NULL),
(872, 'Huyện Tháp Mười', 'Huyện', 87, NULL, NULL),
(873, 'Huyện Cao Lãnh', 'Huyện', 87, NULL, NULL),
(874, 'Huyện Thanh Bình', 'Huyện', 87, NULL, NULL),
(875, 'Huyện Lấp Vò', 'Huyện', 87, NULL, NULL),
(876, 'Huyện Lai Vung', 'Huyện', 87, NULL, NULL),
(877, 'Huyện Châu Thành', 'Huyện', 87, NULL, NULL),
(883, 'Thành phố Long Xuyên', 'Thành phố', 89, NULL, NULL),
(884, 'Thành phố Châu Đốc', 'Thành phố', 89, NULL, NULL),
(886, 'Huyện An Phú', 'Huyện', 89, NULL, NULL),
(887, 'Thị xã Tân Châu', 'Thị xã', 89, NULL, NULL),
(888, 'Huyện Phú Tân', 'Huyện', 89, NULL, NULL),
(889, 'Huyện Châu Phú', 'Huyện', 89, NULL, NULL),
(890, 'Huyện Tịnh Biên', 'Huyện', 89, NULL, NULL),
(891, 'Huyện Tri Tôn', 'Huyện', 89, NULL, NULL),
(892, 'Huyện Châu Thành', 'Huyện', 89, NULL, NULL),
(893, 'Huyện Chợ Mới', 'Huyện', 89, NULL, NULL),
(894, 'Huyện Thoại Sơn', 'Huyện', 89, NULL, NULL),
(899, 'Thành phố Rạch Giá', 'Thành phố', 91, NULL, NULL),
(900, 'Thị xã Hà Tiên', 'Thị xã', 91, NULL, NULL),
(902, 'Huyện Kiên Lương', 'Huyện', 91, NULL, NULL),
(903, 'Huyện Hòn Đất', 'Huyện', 91, NULL, NULL),
(904, 'Huyện Tân Hiệp', 'Huyện', 91, NULL, NULL),
(905, 'Huyện Châu Thành', 'Huyện', 91, NULL, NULL),
(906, 'Huyện Giồng Riềng', 'Huyện', 91, NULL, NULL),
(907, 'Huyện Gò Quao', 'Huyện', 91, NULL, NULL),
(908, 'Huyện An Biên', 'Huyện', 91, NULL, NULL),
(909, 'Huyện An Minh', 'Huyện', 91, NULL, NULL),
(910, 'Huyện Vĩnh Thuận', 'Huyện', 91, NULL, NULL),
(911, 'Huyện Phú Quốc', 'Huyện', 91, NULL, NULL),
(912, 'Huyện Kiên Hải', 'Huyện', 91, NULL, NULL),
(913, 'Huyện U Minh Thượng', 'Huyện', 91, NULL, NULL),
(914, 'Huyện Giang Thành', 'Huyện', 91, NULL, NULL),
(916, 'Quận Ninh Kiều', 'Quận', 92, NULL, NULL),
(917, 'Quận Ô Môn', 'Quận', 92, NULL, NULL),
(918, 'Quận Bình Thuỷ', 'Quận', 92, NULL, NULL),
(919, 'Quận Cái Răng', 'Quận', 92, NULL, NULL),
(923, 'Quận Thốt Nốt', 'Quận', 92, NULL, NULL),
(924, 'Huyện Vĩnh Thạnh', 'Huyện', 92, NULL, NULL),
(925, 'Huyện Cờ Đỏ', 'Huyện', 92, NULL, NULL),
(926, 'Huyện Phong Điền', 'Huyện', 92, NULL, NULL),
(927, 'Huyện Thới Lai', 'Huyện', 92, NULL, NULL),
(930, 'Thành phố Vị Thanh', 'Thành phố', 93, NULL, NULL),
(931, 'Thị xã Ngã Bảy', 'Thị xã', 93, NULL, NULL),
(932, 'Huyện Châu Thành A', 'Huyện', 93, NULL, NULL),
(933, 'Huyện Châu Thành', 'Huyện', 93, NULL, NULL),
(934, 'Huyện Phụng Hiệp', 'Huyện', 93, NULL, NULL),
(935, 'Huyện Vị Thuỷ', 'Huyện', 93, NULL, NULL),
(936, 'Huyện Long Mỹ', 'Huyện', 93, NULL, NULL),
(937, 'Thị xã Long Mỹ', 'Thị xã', 93, NULL, NULL),
(941, 'Thành phố Sóc Trăng', 'Thành phố', 94, NULL, NULL),
(942, 'Huyện Châu Thành', 'Huyện', 94, NULL, NULL),
(943, 'Huyện Kế Sách', 'Huyện', 94, NULL, NULL),
(944, 'Huyện Mỹ Tú', 'Huyện', 94, NULL, NULL),
(945, 'Huyện Cù Lao Dung', 'Huyện', 94, NULL, NULL),
(946, 'Huyện Long Phú', 'Huyện', 94, NULL, NULL),
(947, 'Huyện Mỹ Xuyên', 'Huyện', 94, NULL, NULL),
(948, 'Thị xã Ngã Năm', 'Thị xã', 94, NULL, NULL),
(949, 'Huyện Thạnh Trị', 'Huyện', 94, NULL, NULL),
(950, 'Thị xã Vĩnh Châu', 'Thị xã', 94, NULL, NULL),
(951, 'Huyện Trần Đề', 'Huyện', 94, NULL, NULL),
(954, 'Thành phố Bạc Liêu', 'Thành phố', 95, NULL, NULL),
(956, 'Huyện Hồng Dân', 'Huyện', 95, NULL, NULL),
(957, 'Huyện Phước Long', 'Huyện', 95, NULL, NULL),
(958, 'Huyện Vĩnh Lợi', 'Huyện', 95, NULL, NULL),
(959, 'Thị xã Giá Rai', 'Thị xã', 95, NULL, NULL),
(960, 'Huyện Đông Hải', 'Huyện', 95, NULL, NULL),
(961, 'Huyện Hoà Bình', 'Huyện', 95, NULL, NULL),
(964, 'Thành phố Cà Mau', 'Thành phố', 96, NULL, NULL),
(966, 'Huyện U Minh', 'Huyện', 96, NULL, NULL),
(967, 'Huyện Thới Bình', 'Huyện', 96, NULL, NULL),
(968, 'Huyện Trần Văn Thời', 'Huyện', 96, NULL, NULL),
(969, 'Huyện Cái Nước', 'Huyện', 96, NULL, NULL),
(970, 'Huyện Đầm Dơi', 'Huyện', 96, NULL, NULL),
(971, 'Huyện Năm Căn', 'Huyện', 96, NULL, NULL),
(972, 'Huyện Phú Tân', 'Huyện', 96, NULL, NULL),
(973, 'Huyện Ngọc Hiển', 'Huyện', 96, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_tinhthanhpho`
--

CREATE TABLE `vn_tinhthanhpho` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vn_tinhthanhpho`
--

INSERT INTO `vn_tinhthanhpho` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Thành phố Hà Nội', 'Thành phố Trung ương', NULL, NULL),
(2, 'Tỉnh Hà Giang', 'Tỉnh', NULL, NULL),
(4, 'Tỉnh Cao Bằng', 'Tỉnh', NULL, NULL),
(6, 'Tỉnh Bắc Kạn', 'Tỉnh', NULL, NULL),
(8, 'Tỉnh Tuyên Quang', 'Tỉnh', NULL, NULL),
(10, 'Tỉnh Lào Cai', 'Tỉnh', NULL, NULL),
(11, 'Tỉnh Điện Biên', 'Tỉnh', NULL, NULL),
(12, 'Tỉnh Lai Châu', 'Tỉnh', NULL, NULL),
(14, 'Tỉnh Sơn La', 'Tỉnh', NULL, NULL),
(15, 'Tỉnh Yên Bái', 'Tỉnh', NULL, NULL),
(17, 'Tỉnh Hoà Bình', 'Tỉnh', NULL, NULL),
(19, 'Tỉnh Thái Nguyên', 'Tỉnh', NULL, NULL),
(20, 'Tỉnh Lạng Sơn', 'Tỉnh', NULL, NULL),
(22, 'Tỉnh Quảng Ninh', 'Tỉnh', NULL, NULL),
(24, 'Tỉnh Bắc Giang', 'Tỉnh', NULL, NULL),
(25, 'Tỉnh Phú Thọ', 'Tỉnh', NULL, NULL),
(26, 'Tỉnh Vĩnh Phúc', 'Tỉnh', NULL, NULL),
(27, 'Tỉnh Bắc Ninh', 'Tỉnh', NULL, NULL),
(30, 'Tỉnh Hải Dương', 'Tỉnh', NULL, NULL),
(31, 'Thành phố Hải Phòng', 'Thành phố Trung ương', NULL, NULL),
(33, 'Tỉnh Hưng Yên', 'Tỉnh', NULL, NULL),
(34, 'Tỉnh Thái Bình', 'Tỉnh', NULL, NULL),
(35, 'Tỉnh Hà Nam', 'Tỉnh', NULL, NULL),
(36, 'Tỉnh Nam Định', 'Tỉnh', NULL, NULL),
(37, 'Tỉnh Ninh Bình', 'Tỉnh', NULL, NULL),
(38, 'Tỉnh Thanh Hóa', 'Tỉnh', NULL, NULL),
(40, 'Tỉnh Nghệ An', 'Tỉnh', NULL, NULL),
(42, 'Tỉnh Hà Tĩnh', 'Tỉnh', NULL, NULL),
(44, 'Tỉnh Quảng Bình', 'Tỉnh', NULL, NULL),
(45, 'Tỉnh Quảng Trị', 'Tỉnh', NULL, NULL),
(46, 'Tỉnh Thừa Thiên Huế', 'Tỉnh', NULL, NULL),
(48, 'Thành phố Đà Nẵng', 'Thành phố Trung ương', NULL, NULL),
(49, 'Tỉnh Quảng Nam', 'Tỉnh', NULL, NULL),
(51, 'Tỉnh Quảng Ngãi', 'Tỉnh', NULL, NULL),
(52, 'Tỉnh Bình Định', 'Tỉnh', NULL, NULL),
(54, 'Tỉnh Phú Yên', 'Tỉnh', NULL, NULL),
(56, 'Tỉnh Khánh Hòa', 'Tỉnh', NULL, NULL),
(58, 'Tỉnh Ninh Thuận', 'Tỉnh', NULL, NULL),
(60, 'Tỉnh Bình Thuận', 'Tỉnh', NULL, NULL),
(62, 'Tỉnh Kon Tum', 'Tỉnh', NULL, NULL),
(64, 'Tỉnh Gia Lai', 'Tỉnh', NULL, NULL),
(66, 'Tỉnh Đắk Lắk', 'Tỉnh', NULL, NULL),
(67, 'Tỉnh Đắk Nông', 'Tỉnh', NULL, NULL),
(68, 'Tỉnh Lâm Đồng', 'Tỉnh', NULL, NULL),
(70, 'Tỉnh Bình Phước', 'Tỉnh', NULL, NULL),
(72, 'Tỉnh Tây Ninh', 'Tỉnh', NULL, NULL),
(74, 'Tỉnh Bình Dương', 'Tỉnh', NULL, NULL),
(75, 'Tỉnh Đồng Nai', 'Tỉnh', NULL, NULL),
(77, 'Tỉnh Bà Rịa - Vũng Tàu', 'Tỉnh', NULL, NULL),
(79, 'Thành phố Hồ Chí Minh', 'Thành phố Trung ương', NULL, NULL),
(80, 'Tỉnh Long An', 'Tỉnh', NULL, NULL),
(82, 'Tỉnh Tiền Giang', 'Tỉnh', NULL, NULL),
(83, 'Tỉnh Bến Tre', 'Tỉnh', NULL, NULL),
(84, 'Tỉnh Trà Vinh', 'Tỉnh', NULL, NULL),
(86, 'Tỉnh Vĩnh Long', 'Tỉnh', NULL, NULL),
(87, 'Tỉnh Đồng Tháp', 'Tỉnh', NULL, NULL),
(89, 'Tỉnh An Giang', 'Tỉnh', NULL, NULL),
(91, 'Tỉnh Kiên Giang', 'Tỉnh', NULL, NULL),
(92, 'Thành phố Cần Thơ', 'Thành phố Trung ương', NULL, NULL),
(93, 'Tỉnh Hậu Giang', 'Tỉnh', NULL, NULL),
(94, 'Tỉnh Sóc Trăng', 'Tỉnh', NULL, NULL),
(95, 'Tỉnh Bạc Liêu', 'Tỉnh', NULL, NULL),
(96, 'Tỉnh Cà Mau', 'Tỉnh', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_xaphuongthitran`
--

CREATE TABLE `vn_xaphuongthitran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maqh` bigint(20) UNSIGNED NOT NULL COMMENT 'vn_quanhuyen.id',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vn_xaphuongthitran`
--

INSERT INTO `vn_xaphuongthitran` (`id`, `maqh`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'Phường Phúc Xá', 'Phường', NULL, NULL),
(4, 1, 'Phường Trúc Bạch', 'Phường', NULL, NULL),
(6, 1, 'Phường Vĩnh Phúc', 'Phường', NULL, NULL),
(7, 1, 'Phường Cống Vị', 'Phường', NULL, NULL),
(8, 1, 'Phường Liễu Giai', 'Phường', NULL, NULL),
(10, 1, 'Phường Nguyễn Trung Trực', 'Phường', NULL, NULL),
(13, 1, 'Phường Quán Thánh', 'Phường', NULL, NULL),
(16, 1, 'Phường Ngọc Hà', 'Phường', NULL, NULL),
(19, 1, 'Phường Điện Biên', 'Phường', NULL, NULL),
(22, 1, 'Phường Đội Cấn', 'Phường', NULL, NULL),
(25, 1, 'Phường Ngọc Khánh', 'Phường', NULL, NULL),
(28, 1, 'Phường Kim Mã', 'Phường', NULL, NULL),
(31, 1, 'Phường Giảng Võ', 'Phường', NULL, NULL),
(34, 1, 'Phường Thành Công', 'Phường', NULL, NULL),
(37, 2, 'Phường Phúc Tân', 'Phường', NULL, NULL),
(40, 2, 'Phường Đồng Xuân', 'Phường', NULL, NULL),
(43, 2, 'Phường Hàng Mã', 'Phường', NULL, NULL),
(46, 2, 'Phường Hàng Buồm', 'Phường', NULL, NULL),
(49, 2, 'Phường Hàng Đào', 'Phường', NULL, NULL),
(52, 2, 'Phường Hàng Bồ', 'Phường', NULL, NULL),
(55, 2, 'Phường Cửa Đông', 'Phường', NULL, NULL),
(58, 2, 'Phường Lý Thái Tổ', 'Phường', NULL, NULL),
(61, 2, 'Phường Hàng Bạc', 'Phường', NULL, NULL),
(64, 2, 'Phường Hàng Gai', 'Phường', NULL, NULL),
(67, 2, 'Phường Chương Dương Độ', 'Phường', NULL, NULL),
(70, 2, 'Phường Hàng Trống', 'Phường', NULL, NULL),
(73, 2, 'Phường Cửa Nam', 'Phường', NULL, NULL),
(76, 2, 'Phường Hàng Bông', 'Phường', NULL, NULL),
(79, 2, 'Phường Tràng Tiền', 'Phường', NULL, NULL),
(82, 2, 'Phường Trần Hưng Đạo', 'Phường', NULL, NULL),
(85, 2, 'Phường Phan Chu Trinh', 'Phường', NULL, NULL),
(88, 2, 'Phường Hàng Bài', 'Phường', NULL, NULL),
(91, 3, 'Phường Phú Thượng', 'Phường', NULL, NULL),
(94, 3, 'Phường Nhật Tân', 'Phường', NULL, NULL),
(97, 3, 'Phường Tứ Liên', 'Phường', NULL, NULL),
(100, 3, 'Phường Quảng An', 'Phường', NULL, NULL),
(103, 3, 'Phường Xuân La', 'Phường', NULL, NULL),
(106, 3, 'Phường Yên Phụ', 'Phường', NULL, NULL),
(109, 3, 'Phường Bưởi', 'Phường', NULL, NULL),
(112, 3, 'Phường Thụy Khuê', 'Phường', NULL, NULL),
(115, 4, 'Phường Thượng Thanh', 'Phường', NULL, NULL),
(118, 4, 'Phường Ngọc Thụy', 'Phường', NULL, NULL),
(121, 4, 'Phường Giang Biên', 'Phường', NULL, NULL),
(124, 4, 'Phường Đức Giang', 'Phường', NULL, NULL),
(127, 4, 'Phường Việt Hưng', 'Phường', NULL, NULL),
(130, 4, 'Phường Gia Thụy', 'Phường', NULL, NULL),
(133, 4, 'Phường Ngọc Lâm', 'Phường', NULL, NULL),
(136, 4, 'Phường Phúc Lợi', 'Phường', NULL, NULL),
(139, 4, 'Phường Bồ Đề', 'Phường', NULL, NULL),
(142, 4, 'Phường Sài Đồng', 'Phường', NULL, NULL),
(145, 4, 'Phường Long Biên', 'Phường', NULL, NULL),
(148, 4, 'Phường Thạch Bàn', 'Phường', NULL, NULL),
(151, 4, 'Phường Phúc Đồng', 'Phường', NULL, NULL),
(154, 4, 'Phường Cự Khối', 'Phường', NULL, NULL),
(157, 5, 'Phường Nghĩa Đô', 'Phường', NULL, NULL),
(160, 5, 'Phường Nghĩa Tân', 'Phường', NULL, NULL),
(163, 5, 'Phường Mai Dịch', 'Phường', NULL, NULL),
(166, 5, 'Phường Dịch Vọng', 'Phường', NULL, NULL),
(167, 5, 'Phường Dịch Vọng Hậu', 'Phường', NULL, NULL),
(169, 5, 'Phường Quan Hoa', 'Phường', NULL, NULL),
(172, 5, 'Phường Yên Hoà', 'Phường', NULL, NULL),
(175, 5, 'Phường Trung Hoà', 'Phường', NULL, NULL),
(178, 6, 'Phường Cát Linh', 'Phường', NULL, NULL),
(181, 6, 'Phường Văn Miếu', 'Phường', NULL, NULL),
(184, 6, 'Phường Quốc Tử Giám', 'Phường', NULL, NULL),
(187, 6, 'Phường Láng Thượng', 'Phường', NULL, NULL),
(190, 6, 'Phường Ô Chợ Dừa', 'Phường', NULL, NULL),
(193, 6, 'Phường Văn Chương', 'Phường', NULL, NULL),
(196, 6, 'Phường Hàng Bột', 'Phường', NULL, NULL),
(199, 6, 'Phường Láng Hạ', 'Phường', NULL, NULL),
(202, 6, 'Phường Khâm Thiên', 'Phường', NULL, NULL),
(205, 6, 'Phường Thổ Quan', 'Phường', NULL, NULL),
(208, 6, 'Phường Nam Đồng', 'Phường', NULL, NULL),
(211, 6, 'Phường Trung Phụng', 'Phường', NULL, NULL),
(214, 6, 'Phường Quang Trung', 'Phường', NULL, NULL),
(217, 6, 'Phường Trung Liệt', 'Phường', NULL, NULL),
(220, 6, 'Phường Phương Liên', 'Phường', NULL, NULL),
(223, 6, 'Phường Thịnh Quang', 'Phường', NULL, NULL),
(226, 6, 'Phường Trung Tự', 'Phường', NULL, NULL),
(229, 6, 'Phường Kim Liên', 'Phường', NULL, NULL),
(232, 6, 'Phường Phương Mai', 'Phường', NULL, NULL),
(235, 6, 'Phường Ngã Tư Sở', 'Phường', NULL, NULL),
(238, 6, 'Phường Khương Thượng', 'Phường', NULL, NULL),
(241, 7, 'Phường Nguyễn Du', 'Phường', NULL, NULL),
(244, 7, 'Phường Bạch Đằng', 'Phường', NULL, NULL),
(247, 7, 'Phường Phạm Đình Hổ', 'Phường', NULL, NULL),
(250, 7, 'Phường Bùi Thị Xuân', 'Phường', NULL, NULL),
(253, 7, 'Phường Ngô Thì Nhậm', 'Phường', NULL, NULL),
(256, 7, 'Phường Lê Đại Hành', 'Phường', NULL, NULL),
(259, 7, 'Phường Đồng Nhân', 'Phường', NULL, NULL),
(262, 7, 'Phường Phố Huế', 'Phường', NULL, NULL),
(265, 7, 'Phường Đống Mác', 'Phường', NULL, NULL),
(268, 7, 'Phường Thanh Lương', 'Phường', NULL, NULL),
(271, 7, 'Phường Thanh Nhàn', 'Phường', NULL, NULL),
(274, 7, 'Phường Cầu Dền', 'Phường', NULL, NULL),
(277, 7, 'Phường Bách Khoa', 'Phường', NULL, NULL),
(280, 7, 'Phường Đồng Tâm', 'Phường', NULL, NULL),
(283, 7, 'Phường Vĩnh Tuy', 'Phường', NULL, NULL),
(286, 7, 'Phường Bạch Mai', 'Phường', NULL, NULL),
(289, 7, 'Phường Quỳnh Mai', 'Phường', NULL, NULL),
(292, 7, 'Phường Quỳnh Lôi', 'Phường', NULL, NULL),
(295, 7, 'Phường Minh Khai', 'Phường', NULL, NULL),
(298, 7, 'Phường Trương Định', 'Phường', NULL, NULL),
(301, 8, 'Phường Thanh Trì', 'Phường', NULL, NULL),
(304, 8, 'Phường Vĩnh Hưng', 'Phường', NULL, NULL),
(307, 8, 'Phường Định Công', 'Phường', NULL, NULL),
(310, 8, 'Phường Mai Động', 'Phường', NULL, NULL),
(313, 8, 'Phường Tương Mai', 'Phường', NULL, NULL),
(316, 8, 'Phường Đại Kim', 'Phường', NULL, NULL),
(319, 8, 'Phường Tân Mai', 'Phường', NULL, NULL),
(322, 8, 'Phường Hoàng Văn Thụ', 'Phường', NULL, NULL),
(325, 8, 'Phường Giáp Bát', 'Phường', NULL, NULL),
(328, 8, 'Phường Lĩnh Nam', 'Phường', NULL, NULL),
(331, 8, 'Phường Thịnh Liệt', 'Phường', NULL, NULL),
(334, 8, 'Phường Trần Phú', 'Phường', NULL, NULL),
(337, 8, 'Phường Hoàng Liệt', 'Phường', NULL, NULL),
(340, 8, 'Phường Yên Sở', 'Phường', NULL, NULL),
(343, 9, 'Phường Nhân Chính', 'Phường', NULL, NULL),
(346, 9, 'Phường Thượng Đình', 'Phường', NULL, NULL),
(349, 9, 'Phường Khương Trung', 'Phường', NULL, NULL),
(352, 9, 'Phường Khương Mai', 'Phường', NULL, NULL),
(355, 9, 'Phường Thanh Xuân Trung', 'Phường', NULL, NULL),
(358, 9, 'Phường Phương Liệt', 'Phường', NULL, NULL),
(361, 9, 'Phường Hạ Đình', 'Phường', NULL, NULL),
(364, 9, 'Phường Khương Đình', 'Phường', NULL, NULL),
(367, 9, 'Phường Thanh Xuân Bắc', 'Phường', NULL, NULL),
(370, 9, 'Phường Thanh Xuân Nam', 'Phường', NULL, NULL),
(373, 9, 'Phường Kim Giang', 'Phường', NULL, NULL),
(376, 16, 'Thị trấn Sóc Sơn', 'Thị trấn', NULL, NULL),
(379, 16, 'Xã Bắc Sơn', 'Xã', NULL, NULL),
(382, 16, 'Xã Minh Trí', 'Xã', NULL, NULL),
(385, 16, 'Xã Hồng Kỳ', 'Xã', NULL, NULL),
(388, 16, 'Xã Nam Sơn', 'Xã', NULL, NULL),
(391, 16, 'Xã Trung Giã', 'Xã', NULL, NULL),
(394, 16, 'Xã Tân Hưng', 'Xã', NULL, NULL),
(397, 16, 'Xã Minh Phú', 'Xã', NULL, NULL),
(400, 16, 'Xã Phù Linh', 'Xã', NULL, NULL),
(403, 16, 'Xã Bắc Phú', 'Xã', NULL, NULL),
(406, 16, 'Xã Tân Minh', 'Xã', NULL, NULL),
(409, 16, 'Xã Quang Tiến', 'Xã', NULL, NULL),
(412, 16, 'Xã Hiền Ninh', 'Xã', NULL, NULL),
(415, 16, 'Xã Tân Dân', 'Xã', NULL, NULL),
(418, 16, 'Xã Tiên Dược', 'Xã', NULL, NULL),
(421, 16, 'Xã Việt Long', 'Xã', NULL, NULL),
(424, 16, 'Xã Xuân Giang', 'Xã', NULL, NULL),
(427, 16, 'Xã Mai Đình', 'Xã', NULL, NULL),
(430, 16, 'Xã Đức Hoà', 'Xã', NULL, NULL),
(433, 16, 'Xã Thanh Xuân', 'Xã', NULL, NULL),
(436, 16, 'Xã Đông Xuân', 'Xã', NULL, NULL),
(439, 16, 'Xã Kim Lũ', 'Xã', NULL, NULL),
(442, 16, 'Xã Phú Cường', 'Xã', NULL, NULL),
(445, 16, 'Xã Phú Minh', 'Xã', NULL, NULL),
(448, 16, 'Xã Phù Lỗ', 'Xã', NULL, NULL),
(451, 16, 'Xã Xuân Thu', 'Xã', NULL, NULL),
(454, 17, 'Thị trấn Đông Anh', 'Thị trấn', NULL, NULL),
(457, 17, 'Xã Xuân Nộn', 'Xã', NULL, NULL),
(460, 17, 'Xã Thuỵ Lâm', 'Xã', NULL, NULL),
(463, 17, 'Xã Bắc Hồng', 'Xã', NULL, NULL),
(466, 17, 'Xã Nguyên Khê', 'Xã', NULL, NULL),
(469, 17, 'Xã Nam Hồng', 'Xã', NULL, NULL),
(472, 17, 'Xã Tiên Dương', 'Xã', NULL, NULL),
(475, 17, 'Xã Vân Hà', 'Xã', NULL, NULL),
(478, 17, 'Xã Uy Nỗ', 'Xã', NULL, NULL),
(481, 17, 'Xã Vân Nội', 'Xã', NULL, NULL),
(484, 17, 'Xã Liên Hà', 'Xã', NULL, NULL),
(487, 17, 'Xã Việt Hùng', 'Xã', NULL, NULL),
(490, 17, 'Xã Kim Nỗ', 'Xã', NULL, NULL),
(493, 17, 'Xã Kim Chung', 'Xã', NULL, NULL),
(496, 17, 'Xã Dục Tú', 'Xã', NULL, NULL),
(499, 17, 'Xã Đại Mạch', 'Xã', NULL, NULL),
(502, 17, 'Xã Vĩnh Ngọc', 'Xã', NULL, NULL),
(505, 17, 'Xã Cổ Loa', 'Xã', NULL, NULL),
(508, 17, 'Xã Hải Bối', 'Xã', NULL, NULL),
(511, 17, 'Xã Xuân Canh', 'Xã', NULL, NULL),
(514, 17, 'Xã Võng La', 'Xã', NULL, NULL),
(517, 17, 'Xã Tầm Xá', 'Xã', NULL, NULL),
(520, 17, 'Xã Mai Lâm', 'Xã', NULL, NULL),
(523, 17, 'Xã Đông Hội', 'Xã', NULL, NULL),
(526, 18, 'Thị trấn Yên Viên', 'Thị trấn', NULL, NULL),
(529, 18, 'Xã Yên Thường', 'Xã', NULL, NULL),
(532, 18, 'Xã Yên Viên', 'Xã', NULL, NULL),
(535, 18, 'Xã Ninh Hiệp', 'Xã', NULL, NULL),
(538, 18, 'Xã Đình Xuyên', 'Xã', NULL, NULL),
(541, 18, 'Xã Dương Hà', 'Xã', NULL, NULL),
(544, 18, 'Xã Phù Đổng', 'Xã', NULL, NULL),
(547, 18, 'Xã Trung Mầu', 'Xã', NULL, NULL),
(550, 18, 'Xã Lệ Chi', 'Xã', NULL, NULL),
(553, 18, 'Xã Cổ Bi', 'Xã', NULL, NULL),
(556, 18, 'Xã Đặng Xá', 'Xã', NULL, NULL),
(559, 18, 'Xã Phú Thị', 'Xã', NULL, NULL),
(562, 18, 'Xã Kim Sơn', 'Xã', NULL, NULL),
(565, 18, 'Thị trấn Trâu Quỳ', 'Thị trấn', NULL, NULL),
(568, 18, 'Xã Dương Quang', 'Xã', NULL, NULL),
(571, 18, 'Xã Dương Xá', 'Xã', NULL, NULL),
(574, 18, 'Xã Đông Dư', 'Xã', NULL, NULL),
(577, 18, 'Xã Đa Tốn', 'Xã', NULL, NULL),
(580, 18, 'Xã Kiêu Kỵ', 'Xã', NULL, NULL),
(583, 18, 'Xã Bát Tràng', 'Xã', NULL, NULL),
(586, 18, 'Xã Kim Lan', 'Xã', NULL, NULL),
(589, 18, 'Xã Văn Đức', 'Xã', NULL, NULL),
(592, 19, 'Phường Cầu Diễn', 'Phường', NULL, NULL),
(595, 21, 'Phường Thượng Cát', 'Phường', NULL, NULL),
(598, 21, 'Phường Liên Mạc', 'Phường', NULL, NULL),
(601, 21, 'Phường Đông Ngạc', 'Phường', NULL, NULL),
(602, 21, 'Phường Đức Thắng', 'Phường', NULL, NULL),
(604, 21, 'Phường Thụy Phương', 'Phường', NULL, NULL),
(607, 21, 'Phường Tây Tựu', 'Phường', NULL, NULL),
(610, 21, 'Phường Xuân Đỉnh', 'Phường', NULL, NULL),
(611, 21, 'Phường Xuân Tảo', 'Phường', NULL, NULL),
(613, 21, 'Phường Minh Khai', 'Phường', NULL, NULL),
(616, 21, 'Phường Cổ Nhuế 1', 'Phường', NULL, NULL),
(617, 21, 'Phường Cổ Nhuế 2', 'Phường', NULL, NULL),
(619, 21, 'Phường Phú Diễn', 'Phường', NULL, NULL),
(620, 21, 'Phường Phúc Diễn', 'Phường', NULL, NULL),
(622, 19, 'Phường Xuân Phương', 'Phường', NULL, NULL),
(623, 19, 'Phường Phương Canh', 'Phường', NULL, NULL),
(625, 19, 'Phường Mỹ Đình 1', 'Phường', NULL, NULL),
(626, 19, 'Phường Mỹ Đình 2', 'Phường', NULL, NULL),
(628, 19, 'Phường Tây Mỗ', 'Phường', NULL, NULL),
(631, 19, 'Phường Mễ Trì', 'Phường', NULL, NULL),
(632, 19, 'Phường Phú Đô', 'Phường', NULL, NULL),
(634, 19, 'Phường Đại Mỗ', 'Phường', NULL, NULL),
(637, 19, 'Phường Trung Văn', 'Phường', NULL, NULL),
(640, 20, 'Thị trấn Văn Điển', 'Thị trấn', NULL, NULL),
(643, 20, 'Xã Tân Triều', 'Xã', NULL, NULL),
(646, 20, 'Xã Thanh Liệt', 'Xã', NULL, NULL),
(649, 20, 'Xã Tả Thanh Oai', 'Xã', NULL, NULL),
(652, 20, 'Xã Hữu Hoà', 'Xã', NULL, NULL),
(655, 20, 'Xã Tam Hiệp', 'Xã', NULL, NULL),
(658, 20, 'Xã Tứ Hiệp', 'Xã', NULL, NULL),
(661, 20, 'Xã Yên Mỹ', 'Xã', NULL, NULL),
(664, 20, 'Xã Vĩnh Quỳnh', 'Xã', NULL, NULL),
(667, 20, 'Xã Ngũ Hiệp', 'Xã', NULL, NULL),
(670, 20, 'Xã Duyên Hà', 'Xã', NULL, NULL),
(673, 20, 'Xã Ngọc Hồi', 'Xã', NULL, NULL),
(676, 20, 'Xã Vạn Phúc', 'Xã', NULL, NULL),
(679, 20, 'Xã Đại áng', 'Xã', NULL, NULL),
(682, 20, 'Xã Liên Ninh', 'Xã', NULL, NULL),
(685, 20, 'Xã Đông Mỹ', 'Xã', NULL, NULL),
(688, 24, 'Phường Quang Trung', 'Phường', NULL, NULL),
(691, 24, 'Phường Trần Phú', 'Phường', NULL, NULL),
(692, 24, 'Phường Ngọc Hà', 'Phường', NULL, NULL),
(694, 24, 'Phường Nguyễn Trãi', 'Phường', NULL, NULL),
(697, 24, 'Phường Minh Khai', 'Phường', NULL, NULL),
(700, 24, 'Xã Ngọc Đường', 'Xã', NULL, NULL),
(703, 30, 'Xã Kim Thạch', 'Xã', NULL, NULL),
(706, 30, 'Xã Phú Linh', 'Xã', NULL, NULL),
(709, 30, 'Xã Kim Linh', 'Xã', NULL, NULL),
(712, 26, 'Thị trấn Phó Bảng', 'Thị trấn', NULL, NULL),
(715, 26, 'Xã Lũng Cú', 'Xã', NULL, NULL),
(718, 26, 'Xã Má Lé', 'Xã', NULL, NULL),
(721, 26, 'Thị trấn Đồng Văn', 'Thị trấn', NULL, NULL),
(724, 26, 'Xã Lũng Táo', 'Xã', NULL, NULL),
(727, 26, 'Xã Phố Là', 'Xã', NULL, NULL),
(730, 26, 'Xã Thài Phìn Tủng', 'Xã', NULL, NULL),
(733, 26, 'Xã Sủng Là', 'Xã', NULL, NULL),
(736, 26, 'Xã Xà Phìn', 'Xã', NULL, NULL),
(739, 26, 'Xã Tả Phìn', 'Xã', NULL, NULL),
(742, 26, 'Xã Tả Lủng', 'Xã', NULL, NULL),
(745, 26, 'Xã Phố Cáo', 'Xã', NULL, NULL),
(748, 26, 'Xã Sính Lủng', 'Xã', NULL, NULL),
(751, 26, 'Xã Sảng Tủng', 'Xã', NULL, NULL),
(754, 26, 'Xã Lũng Thầu', 'Xã', NULL, NULL),
(757, 26, 'Xã Hố Quáng Phìn', 'Xã', NULL, NULL),
(760, 26, 'Xã Vần Chải', 'Xã', NULL, NULL),
(763, 26, 'Xã Lũng Phìn', 'Xã', NULL, NULL),
(766, 26, 'Xã Sủng Trái', 'Xã', NULL, NULL),
(769, 27, 'Thị trấn Mèo Vạc', 'Thị trấn', NULL, NULL),
(772, 27, 'Xã Thượng Phùng', 'Xã', NULL, NULL),
(775, 27, 'Xã Pải Lủng', 'Xã', NULL, NULL),
(778, 27, 'Xã Xín Cái', 'Xã', NULL, NULL),
(781, 27, 'Xã Pả Vi', 'Xã', NULL, NULL),
(784, 27, 'Xã Giàng Chu Phìn', 'Xã', NULL, NULL),
(787, 27, 'Xã Sủng Trà', 'Xã', NULL, NULL),
(790, 27, 'Xã Sủng Máng', 'Xã', NULL, NULL),
(793, 27, 'Xã Sơn Vĩ', 'Xã', NULL, NULL),
(796, 27, 'Xã Tả Lủng', 'Xã', NULL, NULL),
(799, 27, 'Xã Cán Chu Phìn', 'Xã', NULL, NULL),
(802, 27, 'Xã Lũng Pù', 'Xã', NULL, NULL),
(805, 27, 'Xã Lũng Chinh', 'Xã', NULL, NULL),
(808, 27, 'Xã Tát Ngà', 'Xã', NULL, NULL),
(811, 27, 'Xã Nậm Ban', 'Xã', NULL, NULL),
(814, 27, 'Xã Khâu Vai', 'Xã', NULL, NULL),
(815, 27, 'Xã Niêm Tòng', 'Xã', NULL, NULL),
(817, 27, 'Xã Niêm Sơn', 'Xã', NULL, NULL),
(820, 28, 'Thị trấn Yên Minh', 'Thị trấn', NULL, NULL),
(823, 28, 'Xã Thắng Mố', 'Xã', NULL, NULL),
(826, 28, 'Xã Phú Lũng', 'Xã', NULL, NULL),
(829, 28, 'Xã Sủng Tráng', 'Xã', NULL, NULL),
(832, 28, 'Xã Bạch Đích', 'Xã', NULL, NULL),
(835, 28, 'Xã Na Khê', 'Xã', NULL, NULL),
(838, 28, 'Xã Sủng Thài', 'Xã', NULL, NULL),
(841, 28, 'Xã Hữu Vinh', 'Xã', NULL, NULL),
(844, 28, 'Xã Lao Và Chải', 'Xã', NULL, NULL),
(847, 28, 'Xã Mậu Duệ', 'Xã', NULL, NULL),
(850, 28, 'Xã Đông Minh', 'Xã', NULL, NULL),
(853, 28, 'Xã Mậu Long', 'Xã', NULL, NULL),
(856, 28, 'Xã Ngam La', 'Xã', NULL, NULL),
(859, 28, 'Xã Ngọc Long', 'Xã', NULL, NULL),
(862, 28, 'Xã Đường Thượng', 'Xã', NULL, NULL),
(865, 28, 'Xã Lũng Hồ', 'Xã', NULL, NULL),
(868, 28, 'Xã Du Tiến', 'Xã', NULL, NULL),
(871, 28, 'Xã Du Già', 'Xã', NULL, NULL),
(874, 29, 'Thị trấn Tam Sơn', 'Thị trấn', NULL, NULL),
(877, 29, 'Xã Bát Đại Sơn', 'Xã', NULL, NULL),
(880, 29, 'Xã Nghĩa Thuận', 'Xã', NULL, NULL),
(883, 29, 'Xã Cán Tỷ', 'Xã', NULL, NULL),
(886, 29, 'Xã Cao Mã Pờ', 'Xã', NULL, NULL),
(889, 29, 'Xã Thanh Vân', 'Xã', NULL, NULL),
(892, 29, 'Xã Tùng Vài', 'Xã', NULL, NULL),
(895, 29, 'Xã Đông Hà', 'Xã', NULL, NULL),
(898, 29, 'Xã Quản Bạ', 'Xã', NULL, NULL),
(901, 29, 'Xã Lùng Tám', 'Xã', NULL, NULL),
(904, 29, 'Xã Quyết Tiến', 'Xã', NULL, NULL),
(907, 29, 'Xã Tả Ván', 'Xã', NULL, NULL),
(910, 29, 'Xã Thái An', 'Xã', NULL, NULL),
(913, 30, 'Thị trấn Vị Xuyên', 'Thị trấn', NULL, NULL),
(916, 30, 'Thị trấn Nông Trường Việt Lâm', 'Thị trấn', NULL, NULL),
(919, 30, 'Xã Minh Tân', 'Xã', NULL, NULL),
(922, 30, 'Xã Thuận Hoà', 'Xã', NULL, NULL),
(925, 30, 'Xã Tùng Bá', 'Xã', NULL, NULL),
(928, 30, 'Xã Thanh Thủy', 'Xã', NULL, NULL),
(931, 30, 'Xã Thanh Đức', 'Xã', NULL, NULL),
(934, 30, 'Xã Phong Quang', 'Xã', NULL, NULL),
(937, 30, 'Xã Xín Chải', 'Xã', NULL, NULL),
(940, 30, 'Xã Phương Tiến', 'Xã', NULL, NULL),
(943, 30, 'Xã Lao Chải', 'Xã', NULL, NULL),
(946, 24, 'Xã Phương Độ', 'Xã', NULL, NULL),
(949, 24, 'Xã Phương Thiện', 'Xã', NULL, NULL),
(952, 30, 'Xã Cao Bồ', 'Xã', NULL, NULL),
(955, 30, 'Xã Đạo Đức', 'Xã', NULL, NULL),
(958, 30, 'Xã Thượng Sơn', 'Xã', NULL, NULL),
(961, 30, 'Xã Linh Hồ', 'Xã', NULL, NULL),
(964, 30, 'Xã Quảng Ngần', 'Xã', NULL, NULL),
(967, 30, 'Xã Việt Lâm', 'Xã', NULL, NULL),
(970, 30, 'Xã Ngọc Linh', 'Xã', NULL, NULL),
(973, 30, 'Xã Ngọc Minh', 'Xã', NULL, NULL),
(976, 30, 'Xã Bạch Ngọc', 'Xã', NULL, NULL),
(979, 30, 'Xã Trung Thành', 'Xã', NULL, NULL),
(982, 31, 'Xã Minh Sơn', 'Xã', NULL, NULL),
(985, 31, 'Xã Giáp Trung', 'Xã', NULL, NULL),
(988, 31, 'Xã Yên Định', 'Xã', NULL, NULL),
(991, 31, 'Thị trấn Yên Phú', 'Thị trấn', NULL, NULL),
(994, 31, 'Xã Minh Ngọc', 'Xã', NULL, NULL),
(997, 31, 'Xã Yên Phong', 'Xã', NULL, NULL),
(1000, 31, 'Xã Lạc Nông', 'Xã', NULL, NULL),
(1003, 31, 'Xã Phú Nam', 'Xã', NULL, NULL),
(1006, 31, 'Xã Yên Cường', 'Xã', NULL, NULL),
(1009, 31, 'Xã Thượng Tân', 'Xã', NULL, NULL),
(1012, 31, 'Xã Đường Âm', 'Xã', NULL, NULL),
(1015, 31, 'Xã Đường Hồng', 'Xã', NULL, NULL),
(1018, 31, 'Xã Phiêng Luông', 'Xã', NULL, NULL),
(1021, 32, 'Thị trấn Vinh Quang', 'Thị trấn', NULL, NULL),
(1024, 32, 'Xã Bản Máy', 'Xã', NULL, NULL),
(1027, 32, 'Xã Thàng Tín', 'Xã', NULL, NULL),
(1030, 32, 'Xã Thèn Chu Phìn', 'Xã', NULL, NULL),
(1033, 32, 'Xã Pố Lồ', 'Xã', NULL, NULL),
(1036, 32, 'Xã Bản Phùng', 'Xã', NULL, NULL),
(1039, 32, 'Xã Túng Sán', 'Xã', NULL, NULL),
(1042, 32, 'Xã Chiến Phố', 'Xã', NULL, NULL),
(1045, 32, 'Xã Đản Ván', 'Xã', NULL, NULL),
(1048, 32, 'Xã Tụ Nhân', 'Xã', NULL, NULL),
(1051, 32, 'Xã Tân Tiến', 'Xã', NULL, NULL),
(1054, 32, 'Xã Nàng Đôn', 'Xã', NULL, NULL),
(1057, 32, 'Xã Pờ Ly Ngài', 'Xã', NULL, NULL),
(1060, 32, 'Xã Sán Xả Hồ', 'Xã', NULL, NULL),
(1063, 32, 'Xã Bản Luốc', 'Xã', NULL, NULL),
(1066, 32, 'Xã Ngàm Đăng Vài', 'Xã', NULL, NULL),
(1069, 32, 'Xã Bản Nhùng', 'Xã', NULL, NULL),
(1072, 32, 'Xã Tả Sử Choóng', 'Xã', NULL, NULL),
(1075, 32, 'Xã Nậm Dịch', 'Xã', NULL, NULL),
(1078, 32, 'Xã Bản Péo', 'Xã', NULL, NULL),
(1081, 32, 'Xã Hồ Thầu', 'Xã', NULL, NULL),
(1084, 32, 'Xã Nam Sơn', 'Xã', NULL, NULL),
(1087, 32, 'Xã Nậm Tỵ', 'Xã', NULL, NULL),
(1090, 32, 'Xã Thông Nguyên', 'Xã', NULL, NULL),
(1093, 32, 'Xã Nậm Khòa', 'Xã', NULL, NULL),
(1096, 33, 'Thị trấn Cốc Pài', 'Thị trấn', NULL, NULL),
(1099, 33, 'Xã Nàn Xỉn', 'Xã', NULL, NULL),
(1102, 33, 'Xã Bản Díu', 'Xã', NULL, NULL),
(1105, 33, 'Xã Chí Cà', 'Xã', NULL, NULL),
(1108, 33, 'Xã Xín Mần', 'Xã', NULL, NULL),
(1111, 33, 'Xã Trung Thịnh', 'Xã', NULL, NULL),
(1114, 33, 'Xã Thèn Phàng', 'Xã', NULL, NULL),
(1117, 33, 'Xã Ngán Chiên', 'Xã', NULL, NULL),
(1120, 33, 'Xã Pà Vầy Sủ', 'Xã', NULL, NULL),
(1123, 33, 'Xã Cốc Rế', 'Xã', NULL, NULL),
(1126, 33, 'Xã Thu Tà', 'Xã', NULL, NULL),
(1129, 33, 'Xã Nàn Ma', 'Xã', NULL, NULL),
(1132, 33, 'Xã Tả Nhìu', 'Xã', NULL, NULL),
(1135, 33, 'Xã Bản Ngò', 'Xã', NULL, NULL),
(1138, 33, 'Xã Chế Là', 'Xã', NULL, NULL),
(1141, 33, 'Xã Nấm Dẩn', 'Xã', NULL, NULL),
(1144, 33, 'Xã Quảng Nguyên', 'Xã', NULL, NULL),
(1147, 33, 'Xã Nà Chì', 'Xã', NULL, NULL),
(1150, 33, 'Xã Khuôn Lùng', 'Xã', NULL, NULL),
(1153, 34, 'Thị trấn Việt Quang', 'Thị trấn', NULL, NULL),
(1156, 34, 'Thị trấn Vĩnh Tuy', 'Thị trấn', NULL, NULL),
(1159, 34, 'Xã Tân Lập', 'Xã', NULL, NULL),
(1162, 34, 'Xã Tân Thành', 'Xã', NULL, NULL),
(1165, 34, 'Xã Đồng Tiến', 'Xã', NULL, NULL),
(1168, 34, 'Xã Đồng Tâm', 'Xã', NULL, NULL),
(1171, 34, 'Xã Tân Quang', 'Xã', NULL, NULL),
(1174, 34, 'Xã Thượng Bình', 'Xã', NULL, NULL),
(1177, 34, 'Xã Hữu Sản', 'Xã', NULL, NULL),
(1180, 34, 'Xã Kim Ngọc', 'Xã', NULL, NULL),
(1183, 34, 'Xã Việt Vinh', 'Xã', NULL, NULL),
(1186, 34, 'Xã Bằng Hành', 'Xã', NULL, NULL),
(1189, 34, 'Xã Quang Minh', 'Xã', NULL, NULL),
(1192, 34, 'Xã Liên Hiệp', 'Xã', NULL, NULL),
(1195, 34, 'Xã Vô Điếm', 'Xã', NULL, NULL),
(1198, 34, 'Xã Việt Hồng', 'Xã', NULL, NULL),
(1201, 34, 'Xã Hùng An', 'Xã', NULL, NULL),
(1204, 34, 'Xã Đức Xuân', 'Xã', NULL, NULL),
(1207, 34, 'Xã Tiên Kiều', 'Xã', NULL, NULL),
(1210, 34, 'Xã Vĩnh Hảo', 'Xã', NULL, NULL),
(1213, 34, 'Xã Vĩnh Phúc', 'Xã', NULL, NULL),
(1216, 34, 'Xã Đồng Yên', 'Xã', NULL, NULL),
(1219, 34, 'Xã Đông Thành', 'Xã', NULL, NULL),
(1222, 35, 'Xã Xuân Minh', 'Xã', NULL, NULL),
(1225, 35, 'Xã Tiên Nguyên', 'Xã', NULL, NULL),
(1228, 35, 'Xã Tân Nam', 'Xã', NULL, NULL),
(1231, 35, 'Xã Bản Rịa', 'Xã', NULL, NULL),
(1234, 35, 'Xã Yên Thành', 'Xã', NULL, NULL),
(1237, 35, 'Thị trấn Yên Bình', 'Thị trấn', NULL, NULL),
(1240, 35, 'Xã Tân Trịnh', 'Xã', NULL, NULL),
(1243, 35, 'Xã Tân Bắc', 'Xã', NULL, NULL),
(1246, 35, 'Xã Bằng Lang', 'Xã', NULL, NULL),
(1249, 35, 'Xã Yên Hà', 'Xã', NULL, NULL),
(1252, 35, 'Xã Hương Sơn', 'Xã', NULL, NULL),
(1255, 35, 'Xã Xuân Giang', 'Xã', NULL, NULL),
(1258, 35, 'Xã Nà Khương', 'Xã', NULL, NULL),
(1261, 35, 'Xã Tiên Yên', 'Xã', NULL, NULL),
(1264, 35, 'Xã Vĩ Thượng', 'Xã', NULL, NULL),
(1267, 40, 'Phường Sông Hiến', 'Phường', NULL, NULL),
(1270, 40, 'Phường Sông Bằng', 'Phường', NULL, NULL),
(1273, 40, 'Phường Hợp Giang', 'Phường', NULL, NULL),
(1276, 40, 'Phường Tân Giang', 'Phường', NULL, NULL),
(1279, 40, 'Phường Ngọc Xuân', 'Phường', NULL, NULL),
(1282, 40, 'Phường Đề Thám', 'Phường', NULL, NULL),
(1285, 40, 'Phường Hoà Chung', 'Phường', NULL, NULL),
(1288, 40, 'Phường Duyệt Trung', 'Phường', NULL, NULL),
(1290, 42, 'Thị trấn Pác Miầu', 'Thị trấn', NULL, NULL),
(1291, 42, 'Xã Đức Hạnh', 'Xã', NULL, NULL),
(1294, 42, 'Xã Lý Bôn', 'Xã', NULL, NULL),
(1296, 42, 'Xã Nam Cao', 'Xã', NULL, NULL),
(1297, 42, 'Xã Nam Quang', 'Xã', NULL, NULL),
(1300, 42, 'Xã Vĩnh Quang', 'Xã', NULL, NULL),
(1303, 42, 'Xã Quảng Lâm', 'Xã', NULL, NULL),
(1304, 42, 'Xã Thạch Lâm', 'Xã', NULL, NULL),
(1306, 42, 'Xã Tân Việt', 'Xã', NULL, NULL),
(1309, 42, 'Xã Vĩnh Phong', 'Xã', NULL, NULL),
(1312, 42, 'Xã Mông Ân', 'Xã', NULL, NULL),
(1315, 42, 'Xã Thái Học', 'Xã', NULL, NULL),
(1316, 42, 'Xã Thái Sơn', 'Xã', NULL, NULL),
(1318, 42, 'Xã Yên Thổ', 'Xã', NULL, NULL),
(1321, 43, 'Thị trấn Bảo Lạc', 'Thị trấn', NULL, NULL),
(1324, 43, 'Xã Cốc Pàng', 'Xã', NULL, NULL),
(1327, 43, 'Xã Thượng Hà', 'Xã', NULL, NULL),
(1330, 43, 'Xã Cô Ba', 'Xã', NULL, NULL),
(1333, 43, 'Xã Bảo Toàn', 'Xã', NULL, NULL),
(1336, 43, 'Xã Khánh Xuân', 'Xã', NULL, NULL),
(1339, 43, 'Xã Xuân Trường', 'Xã', NULL, NULL),
(1342, 43, 'Xã Hồng Trị', 'Xã', NULL, NULL),
(1343, 43, 'Xã Kim Cúc', 'Xã', NULL, NULL),
(1345, 43, 'Xã Phan Thanh', 'Xã', NULL, NULL),
(1348, 43, 'Xã Hồng An', 'Xã', NULL, NULL),
(1351, 43, 'Xã Hưng Đạo', 'Xã', NULL, NULL),
(1352, 43, 'Xã Hưng Thịnh', 'Xã', NULL, NULL),
(1354, 43, 'Xã Huy Giáp', 'Xã', NULL, NULL),
(1357, 43, 'Xã Đình Phùng', 'Xã', NULL, NULL),
(1359, 43, 'Xã Sơn Lập', 'Xã', NULL, NULL),
(1360, 43, 'Xã Sơn Lộ', 'Xã', NULL, NULL),
(1363, 44, 'Thị trấn Thông Nông', 'Thị trấn', NULL, NULL),
(1366, 44, 'Xã Cần Yên', 'Xã', NULL, NULL),
(1367, 44, 'Xã Cần Nông', 'Xã', NULL, NULL),
(1369, 44, 'Xã Vị Quang', 'Xã', NULL, NULL),
(1372, 44, 'Xã Lương Thông', 'Xã', NULL, NULL),
(1375, 44, 'Xã Đa Thông', 'Xã', NULL, NULL),
(1378, 44, 'Xã Ngọc Động', 'Xã', NULL, NULL),
(1381, 44, 'Xã Yên Sơn', 'Xã', NULL, NULL),
(1384, 44, 'Xã Lương Can', 'Xã', NULL, NULL),
(1387, 44, 'Xã Thanh Long', 'Xã', NULL, NULL),
(1390, 44, 'Xã Bình Lãng', 'Xã', NULL, NULL),
(1392, 45, 'Thị trấn Xuân Hòa', 'Thị trấn', NULL, NULL),
(1393, 45, 'Xã Lũng Nặm', 'Xã', NULL, NULL),
(1396, 45, 'Xã Kéo Yên', 'Xã', NULL, NULL),
(1399, 45, 'Xã Trường Hà', 'Xã', NULL, NULL),
(1402, 45, 'Xã Vân An', 'Xã', NULL, NULL),
(1405, 45, 'Xã Cải Viên', 'Xã', NULL, NULL),
(1408, 45, 'Xã Nà Sác', 'Xã', NULL, NULL),
(1411, 45, 'Xã Nội Thôn', 'Xã', NULL, NULL),
(1414, 45, 'Xã Tổng Cọt', 'Xã', NULL, NULL),
(1417, 45, 'Xã Sóc Hà', 'Xã', NULL, NULL),
(1420, 45, 'Xã Thượng Thôn', 'Xã', NULL, NULL),
(1423, 45, 'Xã Vần Dính', 'Xã', NULL, NULL),
(1426, 45, 'Xã Hồng Sĩ', 'Xã', NULL, NULL),
(1429, 45, 'Xã Sĩ Hai', 'Xã', NULL, NULL),
(1432, 45, 'Xã Quý Quân', 'Xã', NULL, NULL),
(1435, 45, 'Xã Mã Ba', 'Xã', NULL, NULL),
(1438, 45, 'Xã Phù Ngọc', 'Xã', NULL, NULL),
(1441, 45, 'Xã Đào Ngạn', 'Xã', NULL, NULL),
(1444, 45, 'Xã Hạ Thôn', 'Xã', NULL, NULL),
(1447, 46, 'Thị trấn Hùng Quốc', 'Thị trấn', NULL, NULL),
(1450, 46, 'Xã Cô Mười', 'Xã', NULL, NULL),
(1453, 46, 'Xã Tri Phương', 'Xã', NULL, NULL),
(1456, 46, 'Xã Quang Hán', 'Xã', NULL, NULL),
(1459, 46, 'Xã Quang Vinh', 'Xã', NULL, NULL),
(1462, 46, 'Xã Xuân Nội', 'Xã', NULL, NULL),
(1465, 46, 'Xã Quang Trung', 'Xã', NULL, NULL),
(1468, 46, 'Xã Lưu Ngọc', 'Xã', NULL, NULL),
(1471, 46, 'Xã Cao Chương', 'Xã', NULL, NULL),
(1474, 46, 'Xã Quốc Toản', 'Xã', NULL, NULL),
(1477, 47, 'Thị trấn Trùng Khánh', 'Thị trấn', NULL, NULL),
(1480, 47, 'Xã Ngọc Khê', 'Xã', NULL, NULL),
(1481, 47, 'Xã Ngọc Côn', 'Xã', NULL, NULL),
(1483, 47, 'Xã Phong Nậm', 'Xã', NULL, NULL),
(1486, 47, 'Xã Ngọc Chung', 'Xã', NULL, NULL),
(1489, 47, 'Xã Đình Phong', 'Xã', NULL, NULL),
(1492, 47, 'Xã Lăng Yên', 'Xã', NULL, NULL),
(1495, 47, 'Xã Đàm Thuỷ', 'Xã', NULL, NULL),
(1498, 47, 'Xã Khâm Thành', 'Xã', NULL, NULL),
(1501, 47, 'Xã Chí Viễn', 'Xã', NULL, NULL),
(1504, 47, 'Xã Lăng Hiếu', 'Xã', NULL, NULL),
(1507, 47, 'Xã Phong Châu', 'Xã', NULL, NULL),
(1510, 47, 'Xã Đình Minh', 'Xã', NULL, NULL),
(1513, 47, 'Xã Cảnh Tiên', 'Xã', NULL, NULL),
(1516, 47, 'Xã Trung Phúc', 'Xã', NULL, NULL),
(1519, 47, 'Xã Cao Thăng', 'Xã', NULL, NULL),
(1522, 47, 'Xã Đức Hồng', 'Xã', NULL, NULL),
(1525, 47, 'Xã Thông Hoè', 'Xã', NULL, NULL),
(1528, 47, 'Xã Thân Giáp', 'Xã', NULL, NULL),
(1531, 47, 'Xã Đoài Côn', 'Xã', NULL, NULL),
(1534, 48, 'Xã Minh Long', 'Xã', NULL, NULL),
(1537, 48, 'Xã Lý Quốc', 'Xã', NULL, NULL),
(1540, 48, 'Xã Thắng Lợi', 'Xã', NULL, NULL),
(1543, 48, 'Xã Đồng Loan', 'Xã', NULL, NULL),
(1546, 48, 'Xã Đức Quang', 'Xã', NULL, NULL),
(1549, 48, 'Xã Kim Loan', 'Xã', NULL, NULL),
(1552, 48, 'Xã Quang Long', 'Xã', NULL, NULL),
(1555, 48, 'Xã An Lạc', 'Xã', NULL, NULL),
(1558, 48, 'Thị trấn Thanh Nhật', 'Thị trấn', NULL, NULL),
(1561, 48, 'Xã Vinh Quý', 'Xã', NULL, NULL),
(1564, 48, 'Xã Việt Chu', 'Xã', NULL, NULL),
(1567, 48, 'Xã Cô Ngân', 'Xã', NULL, NULL),
(1570, 48, 'Xã Thái Đức', 'Xã', NULL, NULL),
(1573, 48, 'Xã Thị Hoa', 'Xã', NULL, NULL),
(1576, 49, 'Thị trấn Quảng Uyên', 'Thị trấn', NULL, NULL),
(1579, 49, 'Xã Phi Hải', 'Xã', NULL, NULL),
(1582, 49, 'Xã Quảng Hưng', 'Xã', NULL, NULL),
(1585, 49, 'Xã Bình Lăng', 'Xã', NULL, NULL),
(1588, 49, 'Xã Quốc Dân', 'Xã', NULL, NULL),
(1591, 49, 'Xã Quốc Phong', 'Xã', NULL, NULL),
(1594, 49, 'Xã Độc Lập', 'Xã', NULL, NULL),
(1597, 49, 'Xã Cai Bộ', 'Xã', NULL, NULL),
(1600, 49, 'Xã Đoài Khôn', 'Xã', NULL, NULL),
(1603, 49, 'Xã Phúc Sen', 'Xã', NULL, NULL),
(1606, 49, 'Xã Chí Thảo', 'Xã', NULL, NULL),
(1609, 49, 'Xã Tự Do', 'Xã', NULL, NULL),
(1612, 49, 'Xã Hồng Định', 'Xã', NULL, NULL),
(1615, 49, 'Xã Hồng Quang', 'Xã', NULL, NULL),
(1618, 49, 'Xã Ngọc Động', 'Xã', NULL, NULL),
(1621, 49, 'Xã Hoàng Hải', 'Xã', NULL, NULL),
(1624, 49, 'Xã Hạnh Phúc', 'Xã', NULL, NULL),
(1627, 50, 'Thị trấn Tà Lùng', 'Thị trấn', NULL, NULL),
(1630, 50, 'Xã Triệu ẩu', 'Xã', NULL, NULL),
(1633, 50, 'Xã Hồng Đại', 'Xã', NULL, NULL),
(1636, 50, 'Xã Cách Linh', 'Xã', NULL, NULL),
(1639, 50, 'Xã Đại Sơn', 'Xã', NULL, NULL),
(1642, 50, 'Xã Lương Thiện', 'Xã', NULL, NULL),
(1645, 50, 'Xã Tiên Thành', 'Xã', NULL, NULL),
(1648, 50, 'Thị trấn Hoà Thuận', 'Thị trấn', NULL, NULL),
(1651, 50, 'Xã Mỹ Hưng', 'Xã', NULL, NULL),
(1654, 51, 'Thị trấn Nước Hai', 'Thị trấn', NULL, NULL),
(1657, 51, 'Xã Dân Chủ', 'Xã', NULL, NULL),
(1660, 51, 'Xã Nam Tuấn', 'Xã', NULL, NULL),
(1663, 51, 'Xã Đức Xuân', 'Xã', NULL, NULL),
(1666, 51, 'Xã Đại Tiến', 'Xã', NULL, NULL),
(1669, 51, 'Xã Đức Long', 'Xã', NULL, NULL),
(1672, 51, 'Xã Ngũ Lão', 'Xã', NULL, NULL),
(1675, 51, 'Xã Trương Lương', 'Xã', NULL, NULL),
(1678, 51, 'Xã Bình Long', 'Xã', NULL, NULL),
(1681, 51, 'Xã Nguyễn Huệ', 'Xã', NULL, NULL),
(1684, 51, 'Xã Công Trừng', 'Xã', NULL, NULL),
(1687, 51, 'Xã Hồng Việt', 'Xã', NULL, NULL),
(1690, 51, 'Xã Bế Triều', 'Xã', NULL, NULL),
(1693, 40, 'Xã Vĩnh Quang', 'Xã', NULL, NULL),
(1696, 51, 'Xã Hoàng Tung', 'Xã', NULL, NULL),
(1699, 51, 'Xã Trương Vương', 'Xã', NULL, NULL),
(1702, 51, 'Xã Quang Trung', 'Xã', NULL, NULL),
(1705, 40, 'Xã Hưng Đạo', 'Xã', NULL, NULL),
(1708, 51, 'Xã Bạch Đằng', 'Xã', NULL, NULL),
(1711, 51, 'Xã Bình Dương', 'Xã', NULL, NULL),
(1714, 51, 'Xã Lê Chung', 'Xã', NULL, NULL),
(1717, 51, 'Xã Hà Trì', 'Xã', NULL, NULL),
(1720, 40, 'Xã Chu Trinh', 'Xã', NULL, NULL),
(1723, 51, 'Xã Hồng Nam', 'Xã', NULL, NULL),
(1726, 52, 'Thị trấn Nguyên Bình', 'Thị trấn', NULL, NULL),
(1729, 52, 'Thị trấn Tĩnh Túc', 'Thị trấn', NULL, NULL),
(1732, 52, 'Xã Yên Lạc', 'Xã', NULL, NULL),
(1735, 52, 'Xã Triệu Nguyên', 'Xã', NULL, NULL),
(1738, 52, 'Xã Ca Thành', 'Xã', NULL, NULL),
(1741, 52, 'Xã Thái Học', 'Xã', NULL, NULL),
(1744, 52, 'Xã Vũ Nông', 'Xã', NULL, NULL),
(1747, 52, 'Xã Minh Tâm', 'Xã', NULL, NULL),
(1750, 52, 'Xã Thể Dục', 'Xã', NULL, NULL),
(1753, 52, 'Xã Bắc Hợp', 'Xã', NULL, NULL),
(1756, 52, 'Xã Mai Long', 'Xã', NULL, NULL),
(1759, 52, 'Xã Lang Môn', 'Xã', NULL, NULL),
(1762, 52, 'Xã Minh Thanh', 'Xã', NULL, NULL),
(1765, 52, 'Xã Hoa Thám', 'Xã', NULL, NULL),
(1768, 52, 'Xã Phan Thanh', 'Xã', NULL, NULL),
(1771, 52, 'Xã Quang Thành', 'Xã', NULL, NULL),
(1774, 52, 'Xã Tam Kim', 'Xã', NULL, NULL),
(1777, 52, 'Xã Thành Công', 'Xã', NULL, NULL),
(1780, 52, 'Xã Thịnh Vượng', 'Xã', NULL, NULL),
(1783, 52, 'Xã Hưng Đạo', 'Xã', NULL, NULL),
(1786, 53, 'Thị trấn Đông Khê', 'Thị trấn', NULL, NULL),
(1789, 53, 'Xã Canh Tân', 'Xã', NULL, NULL),
(1792, 53, 'Xã Kim Đồng', 'Xã', NULL, NULL),
(1795, 53, 'Xã Minh Khai', 'Xã', NULL, NULL),
(1798, 53, 'Xã Thị Ngân', 'Xã', NULL, NULL),
(1801, 53, 'Xã Đức Thông', 'Xã', NULL, NULL),
(1804, 53, 'Xã Thái Cường', 'Xã', NULL, NULL),
(1807, 53, 'Xã Vân Trình', 'Xã', NULL, NULL),
(1810, 53, 'Xã Thụy Hùng', 'Xã', NULL, NULL),
(1813, 53, 'Xã Quang Trọng', 'Xã', NULL, NULL),
(1816, 53, 'Xã Trọng Con', 'Xã', NULL, NULL),
(1819, 53, 'Xã Lê Lai', 'Xã', NULL, NULL),
(1822, 53, 'Xã Đức Long', 'Xã', NULL, NULL),
(1825, 53, 'Xã Danh Sỹ', 'Xã', NULL, NULL),
(1828, 53, 'Xã Lê Lợi', 'Xã', NULL, NULL),
(1831, 53, 'Xã Đức Xuân', 'Xã', NULL, NULL),
(1834, 58, 'Phường Nguyễn Thị Minh Khai', 'Phường', NULL, NULL),
(1837, 58, 'Phường Sông Cầu', 'Phường', NULL, NULL),
(1840, 58, 'Phường Đức Xuân', 'Phường', NULL, NULL),
(1843, 58, 'Phường Phùng Chí Kiên', 'Phường', NULL, NULL),
(1846, 58, 'Phường Huyền Tụng', 'Phường', NULL, NULL),
(1849, 58, 'Xã Dương Quang', 'Xã', NULL, NULL),
(1852, 58, 'Xã Nông Thượng', 'Xã', NULL, NULL),
(1855, 58, 'Phường Xuất Hóa', 'Phường', NULL, NULL),
(1858, 60, 'Xã Bằng Thành', 'Xã', NULL, NULL),
(1861, 60, 'Xã Nhạn Môn', 'Xã', NULL, NULL),
(1864, 60, 'Xã Bộc Bố', 'Xã', NULL, NULL),
(1867, 60, 'Xã Công Bằng', 'Xã', NULL, NULL),
(1870, 60, 'Xã Giáo Hiệu', 'Xã', NULL, NULL),
(1873, 60, 'Xã Xuân La', 'Xã', NULL, NULL),
(1876, 60, 'Xã An Thắng', 'Xã', NULL, NULL),
(1879, 60, 'Xã Cổ Linh', 'Xã', NULL, NULL),
(1882, 60, 'Xã Nghiên Loan', 'Xã', NULL, NULL),
(1885, 60, 'Xã Cao Tân', 'Xã', NULL, NULL),
(1888, 61, 'Thị trấn Chợ Rã', 'Thị trấn', NULL, NULL),
(1891, 61, 'Xã Bành Trạch', 'Xã', NULL, NULL),
(1894, 61, 'Xã Phúc Lộc', 'Xã', NULL, NULL),
(1897, 61, 'Xã Hà Hiệu', 'Xã', NULL, NULL),
(1900, 61, 'Xã Cao Thượng', 'Xã', NULL, NULL),
(1903, 61, 'Xã Cao Trĩ', 'Xã', NULL, NULL),
(1906, 61, 'Xã Khang Ninh', 'Xã', NULL, NULL),
(1909, 61, 'Xã Nam Mẫu', 'Xã', NULL, NULL),
(1912, 61, 'Xã Thượng Giáo', 'Xã', NULL, NULL),
(1915, 61, 'Xã Địa Linh', 'Xã', NULL, NULL),
(1918, 61, 'Xã Yến Dương', 'Xã', NULL, NULL),
(1921, 61, 'Xã Chu Hương', 'Xã', NULL, NULL),
(1924, 61, 'Xã Quảng Khê', 'Xã', NULL, NULL),
(1927, 61, 'Xã Mỹ Phương', 'Xã', NULL, NULL),
(1930, 61, 'Xã Hoàng Trĩ', 'Xã', NULL, NULL),
(1933, 61, 'Xã Đồng Phúc', 'Xã', NULL, NULL),
(1936, 62, 'Thị trấn Nà Phặc', 'Thị trấn', NULL, NULL),
(1939, 62, 'Xã Thượng Ân', 'Xã', NULL, NULL),
(1942, 62, 'Xã Bằng Vân', 'Xã', NULL, NULL),
(1945, 62, 'Xã Cốc Đán', 'Xã', NULL, NULL),
(1948, 62, 'Xã Trung Hoà', 'Xã', NULL, NULL),
(1951, 62, 'Xã Đức Vân', 'Xã', NULL, NULL),
(1954, 62, 'Xã Vân Tùng', 'Xã', NULL, NULL),
(1957, 62, 'Xã Thượng Quan', 'Xã', NULL, NULL),
(1960, 62, 'Xã Lãng Ngâm', 'Xã', NULL, NULL),
(1963, 62, 'Xã Thuần Mang', 'Xã', NULL, NULL),
(1966, 62, 'Xã Hương Nê', 'Xã', NULL, NULL),
(1969, 63, 'Thị trấn Phủ Thông', 'Thị trấn', NULL, NULL),
(1972, 63, 'Xã Phương Linh', 'Xã', NULL, NULL),
(1975, 63, 'Xã Vi Hương', 'Xã', NULL, NULL),
(1978, 63, 'Xã Sĩ Bình', 'Xã', NULL, NULL),
(1981, 63, 'Xã Vũ Muộn', 'Xã', NULL, NULL),
(1984, 63, 'Xã Đôn Phong', 'Xã', NULL, NULL),
(1987, 63, 'Xã Tú Trĩ', 'Xã', NULL, NULL),
(1990, 63, 'Xã Lục Bình', 'Xã', NULL, NULL),
(1993, 63, 'Xã Tân Tiến', 'Xã', NULL, NULL),
(1996, 63, 'Xã Quân Bình', 'Xã', NULL, NULL),
(1999, 63, 'Xã Nguyên Phúc', 'Xã', NULL, NULL),
(2002, 63, 'Xã Cao Sơn', 'Xã', NULL, NULL),
(2005, 63, 'Xã Hà Vị', 'Xã', NULL, NULL),
(2008, 63, 'Xã Cẩm Giàng', 'Xã', NULL, NULL),
(2011, 63, 'Xã Mỹ Thanh', 'Xã', NULL, NULL),
(2014, 63, 'Xã Dương Phong', 'Xã', NULL, NULL),
(2017, 63, 'Xã Quang Thuận', 'Xã', NULL, NULL),
(2020, 64, 'Thị trấn Bằng Lũng', 'Thị trấn', NULL, NULL),
(2023, 64, 'Xã Xuân Lạc', 'Xã', NULL, NULL),
(2026, 64, 'Xã Nam Cường', 'Xã', NULL, NULL),
(2029, 64, 'Xã Đồng Lạc', 'Xã', NULL, NULL),
(2032, 64, 'Xã Tân Lập', 'Xã', NULL, NULL),
(2035, 64, 'Xã Bản Thi', 'Xã', NULL, NULL),
(2038, 64, 'Xã Quảng Bạch', 'Xã', NULL, NULL),
(2041, 64, 'Xã Bằng Phúc', 'Xã', NULL, NULL),
(2044, 64, 'Xã Yên Thịnh', 'Xã', NULL, NULL),
(2047, 64, 'Xã Yên Thượng', 'Xã', NULL, NULL),
(2050, 64, 'Xã Phương Viên', 'Xã', NULL, NULL),
(2053, 64, 'Xã Ngọc Phái', 'Xã', NULL, NULL),
(2056, 64, 'Xã Rã Bản', 'Xã', NULL, NULL),
(2059, 64, 'Xã Đông Viên', 'Xã', NULL, NULL),
(2062, 64, 'Xã Lương Bằng', 'Xã', NULL, NULL),
(2065, 64, 'Xã Bằng Lãng', 'Xã', NULL, NULL),
(2068, 64, 'Xã Đại Sảo', 'Xã', NULL, NULL),
(2071, 64, 'Xã Nghĩa Tá', 'Xã', NULL, NULL),
(2074, 64, 'Xã Phong Huân', 'Xã', NULL, NULL),
(2077, 64, 'Xã Yên Mỹ', 'Xã', NULL, NULL),
(2080, 64, 'Xã Bình Trung', 'Xã', NULL, NULL),
(2083, 64, 'Xã Yên Nhuận', 'Xã', NULL, NULL),
(2086, 65, 'Thị trấn Chợ Mới', 'Thị trấn', NULL, NULL),
(2089, 65, 'Xã Tân Sơn', 'Xã', NULL, NULL),
(2092, 65, 'Xã Thanh Vận', 'Xã', NULL, NULL),
(2095, 65, 'Xã Mai Lạp', 'Xã', NULL, NULL),
(2098, 65, 'Xã Hoà Mục', 'Xã', NULL, NULL),
(2101, 65, 'Xã Thanh Mai', 'Xã', NULL, NULL),
(2104, 65, 'Xã Cao Kỳ', 'Xã', NULL, NULL),
(2107, 65, 'Xã Nông Hạ', 'Xã', NULL, NULL),
(2110, 65, 'Xã Yên Cư', 'Xã', NULL, NULL),
(2113, 65, 'Xã Nông Thịnh', 'Xã', NULL, NULL),
(2116, 65, 'Xã Yên Hân', 'Xã', NULL, NULL),
(2119, 65, 'Xã Thanh Bình', 'Xã', NULL, NULL),
(2122, 65, 'Xã Như Cố', 'Xã', NULL, NULL),
(2125, 65, 'Xã Bình Văn', 'Xã', NULL, NULL),
(2128, 65, 'Xã Yên Đĩnh', 'Xã', NULL, NULL),
(2131, 65, 'Xã Quảng Chu', 'Xã', NULL, NULL),
(2134, 66, 'Thị trấn Yến Lạc', 'Thị trấn', NULL, NULL),
(2137, 66, 'Xã Vũ Loan', 'Xã', NULL, NULL),
(2140, 66, 'Xã Lạng San', 'Xã', NULL, NULL),
(2143, 66, 'Xã Lương Thượng', 'Xã', NULL, NULL),
(2146, 66, 'Xã Kim Hỷ', 'Xã', NULL, NULL),
(2149, 66, 'Xã Văn Học', 'Xã', NULL, NULL),
(2152, 66, 'Xã Cường Lợi', 'Xã', NULL, NULL),
(2155, 66, 'Xã Lương Hạ', 'Xã', NULL, NULL),
(2158, 66, 'Xã Kim Lư', 'Xã', NULL, NULL),
(2161, 66, 'Xã Lương Thành', 'Xã', NULL, NULL),
(2164, 66, 'Xã Ân Tình', 'Xã', NULL, NULL),
(2167, 66, 'Xã Lam Sơn', 'Xã', NULL, NULL),
(2170, 66, 'Xã Văn Minh', 'Xã', NULL, NULL),
(2173, 66, 'Xã Côn Minh', 'Xã', NULL, NULL),
(2176, 66, 'Xã Cư Lễ', 'Xã', NULL, NULL),
(2179, 66, 'Xã Hữu Thác', 'Xã', NULL, NULL),
(2182, 66, 'Xã Hảo Nghĩa', 'Xã', NULL, NULL),
(2185, 66, 'Xã Quang Phong', 'Xã', NULL, NULL),
(2188, 66, 'Xã Dương Sơn', 'Xã', NULL, NULL),
(2191, 66, 'Xã Xuân Dương', 'Xã', NULL, NULL),
(2194, 66, 'Xã Đổng Xá', 'Xã', NULL, NULL),
(2197, 66, 'Xã Liêm Thuỷ', 'Xã', NULL, NULL),
(2200, 70, 'Phường Phan Thiết', 'Phường', NULL, NULL),
(2203, 70, 'Phường Minh Xuân', 'Phường', NULL, NULL),
(2206, 70, 'Phường Tân Quang', 'Phường', NULL, NULL),
(2209, 70, 'Xã Tràng Đà', 'Xã', NULL, NULL),
(2212, 70, 'Phường Nông Tiến', 'Phường', NULL, NULL),
(2215, 70, 'Phường Ỷ La', 'Phường', NULL, NULL),
(2216, 70, 'Phường Tân Hà', 'Phường', NULL, NULL),
(2218, 70, 'Phường Hưng Thành', 'Phường', NULL, NULL),
(2221, 72, 'Thị trấn Nà Hang', 'Thị trấn', NULL, NULL),
(2227, 72, 'Xã Sinh Long', 'Xã', NULL, NULL),
(2230, 72, 'Xã Thượng Giáp', 'Xã', NULL, NULL),
(2233, 71, 'Xã Phúc Yên', 'Xã', NULL, NULL),
(2239, 72, 'Xã Thượng Nông', 'Xã', NULL, NULL),
(2242, 71, 'Xã Xuân Lập', 'Xã', NULL, NULL),
(2245, 72, 'Xã Côn Lôn', 'Xã', NULL, NULL),
(2248, 72, 'Xã Yên Hoa', 'Xã', NULL, NULL),
(2251, 71, 'Xã Khuôn Hà', 'Xã', NULL, NULL),
(2254, 72, 'Xã Hồng Thái', 'Xã', NULL, NULL),
(2260, 72, 'Xã Đà Vị', 'Xã', NULL, NULL),
(2263, 72, 'Xã Khau Tinh', 'Xã', NULL, NULL),
(2266, 71, 'Xã Lăng Can', 'Xã', NULL, NULL),
(2269, 71, 'Xã Thượng Lâm', 'Xã', NULL, NULL),
(2275, 72, 'Xã Sơn Phú', 'Xã', NULL, NULL),
(2281, 72, 'Xã Năng Khả', 'Xã', NULL, NULL),
(2284, 72, 'Xã Thanh Tương', 'Xã', NULL, NULL),
(2287, 73, 'Thị trấn Vĩnh Lộc', 'Thị trấn', NULL, NULL),
(2290, 71, 'Xã Bình An', 'Xã', NULL, NULL),
(2293, 71, 'Xã Hồng Quang', 'Xã', NULL, NULL),
(2296, 71, 'Xã Thổ Bình', 'Xã', NULL, NULL),
(2299, 73, 'Xã Phúc Sơn', 'Xã', NULL, NULL),
(2302, 73, 'Xã Minh Quang', 'Xã', NULL, NULL),
(2305, 73, 'Xã Trung Hà', 'Xã', NULL, NULL),
(2308, 73, 'Xã Tân Mỹ', 'Xã', NULL, NULL),
(2311, 73, 'Xã Hà Lang', 'Xã', NULL, NULL),
(2314, 73, 'Xã Hùng Mỹ', 'Xã', NULL, NULL),
(2317, 73, 'Xã Yên Lập', 'Xã', NULL, NULL),
(2320, 73, 'Xã Tân An', 'Xã', NULL, NULL),
(2323, 73, 'Xã Bình Phú', 'Xã', NULL, NULL),
(2326, 73, 'Xã Xuân Quang', 'Xã', NULL, NULL),
(2329, 73, 'Xã Ngọc Hội', 'Xã', NULL, NULL),
(2332, 73, 'Xã Phú Bình', 'Xã', NULL, NULL),
(2335, 73, 'Xã Hòa Phú', 'Xã', NULL, NULL),
(2338, 73, 'Xã Phúc Thịnh', 'Xã', NULL, NULL),
(2341, 73, 'Xã Kiên Đài', 'Xã', NULL, NULL),
(2344, 73, 'Xã Tân Thịnh', 'Xã', NULL, NULL),
(2347, 73, 'Xã Trung Hòa', 'Xã', NULL, NULL),
(2350, 73, 'Xã Kim Bình', 'Xã', NULL, NULL),
(2353, 73, 'Xã Hòa An', 'Xã', NULL, NULL),
(2356, 73, 'Xã Vinh Quang', 'Xã', NULL, NULL),
(2359, 73, 'Xã Tri Phú', 'Xã', NULL, NULL),
(2362, 73, 'Xã Nhân Lý', 'Xã', NULL, NULL),
(2365, 73, 'Xã Yên Nguyên', 'Xã', NULL, NULL),
(2368, 73, 'Xã Linh Phú', 'Xã', NULL, NULL),
(2371, 73, 'Xã Bình Nhân', 'Xã', NULL, NULL),
(2374, 74, 'Thị trấn Tân Yên', 'Thị trấn', NULL, NULL),
(2377, 74, 'Xã Yên Thuận', 'Xã', NULL, NULL),
(2380, 74, 'Xã Bạch Xa', 'Xã', NULL, NULL),
(2383, 74, 'Xã Minh Khương', 'Xã', NULL, NULL),
(2386, 74, 'Xã Yên Lâm', 'Xã', NULL, NULL),
(2389, 74, 'Xã Minh Dân', 'Xã', NULL, NULL),
(2392, 74, 'Xã Phù Lưu', 'Xã', NULL, NULL),
(2395, 74, 'Xã Minh Hương', 'Xã', NULL, NULL),
(2398, 74, 'Xã Yên Phú', 'Xã', NULL, NULL),
(2401, 74, 'Xã Tân Thành', 'Xã', NULL, NULL),
(2404, 74, 'Xã Bình Xa', 'Xã', NULL, NULL),
(2407, 74, 'Xã Thái Sơn', 'Xã', NULL, NULL),
(2410, 74, 'Xã Nhân Mục', 'Xã', NULL, NULL),
(2413, 74, 'Xã Thành Long', 'Xã', NULL, NULL),
(2416, 74, 'Xã Bằng Cốc', 'Xã', NULL, NULL),
(2419, 74, 'Xã Thái Hòa', 'Xã', NULL, NULL),
(2422, 74, 'Xã Đức Ninh', 'Xã', NULL, NULL),
(2425, 74, 'Xã Hùng Đức', 'Xã', NULL, NULL),
(2428, 75, 'Thị trấn Tân Bình', 'Thị trấn', NULL, NULL),
(2431, 75, 'Xã Quí Quân', 'Xã', NULL, NULL),
(2434, 75, 'Xã Lực Hành', 'Xã', NULL, NULL),
(2437, 75, 'Xã Kiến Thiết', 'Xã', NULL, NULL),
(2440, 75, 'Xã Trung Minh', 'Xã', NULL, NULL),
(2443, 75, 'Xã Chiêu Yên', 'Xã', NULL, NULL),
(2446, 75, 'Xã Trung Trực', 'Xã', NULL, NULL),
(2449, 75, 'Xã Xuân Vân', 'Xã', NULL, NULL),
(2452, 75, 'Xã Phúc Ninh', 'Xã', NULL, NULL),
(2455, 75, 'Xã Hùng Lợi', 'Xã', NULL, NULL),
(2458, 75, 'Xã Trung Sơn', 'Xã', NULL, NULL),
(2461, 75, 'Xã Tân Tiến', 'Xã', NULL, NULL),
(2464, 75, 'Xã Tứ Quận', 'Xã', NULL, NULL),
(2467, 75, 'Xã Đạo Viện', 'Xã', NULL, NULL),
(2470, 75, 'Xã Tân Long', 'Xã', NULL, NULL),
(2473, 75, 'Xã Thắng Quân', 'Xã', NULL, NULL),
(2476, 75, 'Xã Kim Quan', 'Xã', NULL, NULL),
(2479, 75, 'Xã Lang Quán', 'Xã', NULL, NULL),
(2482, 75, 'Xã Phú Thịnh', 'Xã', NULL, NULL),
(2485, 75, 'Xã Công Đa', 'Xã', NULL, NULL),
(2488, 75, 'Xã Trung Môn', 'Xã', NULL, NULL),
(2491, 75, 'Xã Chân Sơn', 'Xã', NULL, NULL),
(2494, 75, 'Xã Thái Bình', 'Xã', NULL, NULL),
(2497, 75, 'Xã Kim Phú', 'Xã', NULL, NULL),
(2500, 75, 'Xã Tiến Bộ', 'Xã', NULL, NULL),
(2503, 70, 'Xã An Khang', 'Xã', NULL, NULL),
(2506, 75, 'Xã Mỹ Bằng', 'Xã', NULL, NULL),
(2509, 75, 'Xã Phú Lâm', 'Xã', NULL, NULL),
(2512, 70, 'Xã An Tường', 'Xã', NULL, NULL),
(2515, 70, 'Xã Lưỡng Vượng', 'Xã', NULL, NULL),
(2518, 75, 'Xã Hoàng Khai', 'Xã', NULL, NULL),
(2521, 70, 'Xã Thái Long', 'Xã', NULL, NULL),
(2524, 70, 'Xã Đội Cấn', 'Xã', NULL, NULL),
(2527, 75, 'Xã Nhữ Hán', 'Xã', NULL, NULL),
(2530, 75, 'Xã Nhữ Khê', 'Xã', NULL, NULL),
(2533, 75, 'Xã Đội Bình', 'Xã', NULL, NULL),
(2536, 76, 'Thị trấn Sơn Dương', 'Thị trấn', NULL, NULL),
(2539, 76, 'Xã Trung Yên', 'Xã', NULL, NULL),
(2542, 76, 'Xã Minh Thanh', 'Xã', NULL, NULL),
(2545, 76, 'Xã Tân Trào', 'Xã', NULL, NULL),
(2548, 76, 'Xã Vĩnh Lợi', 'Xã', NULL, NULL),
(2551, 76, 'Xã Thượng Ấm', 'Xã', NULL, NULL),
(2554, 76, 'Xã Bình Yên', 'Xã', NULL, NULL),
(2557, 76, 'Xã Lương Thiện', 'Xã', NULL, NULL),
(2560, 76, 'Xã Tú Thịnh', 'Xã', NULL, NULL),
(2563, 76, 'Xã Cấp Tiến', 'Xã', NULL, NULL),
(2566, 76, 'Xã Hợp Thành', 'Xã', NULL, NULL),
(2569, 76, 'Xã Phúc Ứng', 'Xã', NULL, NULL),
(2572, 76, 'Xã Đông Thọ', 'Xã', NULL, NULL),
(2575, 76, 'Xã Kháng Nhật', 'Xã', NULL, NULL),
(2578, 76, 'Xã Hợp Hòa', 'Xã', NULL, NULL),
(2581, 76, 'Xã Thanh Phát', 'Xã', NULL, NULL),
(2584, 76, 'Xã Quyết Thắng', 'Xã', NULL, NULL),
(2587, 76, 'Xã Đồng Quý', 'Xã', NULL, NULL),
(2590, 76, 'Xã Tuân Lộ', 'Xã', NULL, NULL),
(2593, 76, 'Xã Vân Sơn', 'Xã', NULL, NULL),
(2596, 76, 'Xã Văn Phú', 'Xã', NULL, NULL),
(2599, 76, 'Xã Chi Thiết', 'Xã', NULL, NULL),
(2602, 76, 'Xã Đông Lợi', 'Xã', NULL, NULL),
(2605, 76, 'Xã Thiện Kế', 'Xã', NULL, NULL),
(2608, 76, 'Xã Hồng Lạc', 'Xã', NULL, NULL),
(2611, 76, 'Xã Phú Lương', 'Xã', NULL, NULL),
(2614, 76, 'Xã Ninh Lai', 'Xã', NULL, NULL),
(2617, 76, 'Xã Đại Phú', 'Xã', NULL, NULL),
(2620, 76, 'Xã Sơn Nam', 'Xã', NULL, NULL),
(2623, 76, 'Xã Hào Phú', 'Xã', NULL, NULL),
(2626, 76, 'Xã Tam Đa', 'Xã', NULL, NULL),
(2629, 76, 'Xã Sầm Dương', 'Xã', NULL, NULL),
(2632, 76, 'Xã Lâm Xuyên', 'Xã', NULL, NULL),
(2635, 80, 'Phường Duyên Hải', 'Phường', NULL, NULL),
(2638, 80, 'Phường Lào Cai', 'Phường', NULL, NULL),
(2641, 80, 'Phường Phố Mới', 'Phường', NULL, NULL),
(2644, 80, 'Phường Cốc Lếu', 'Phường', NULL, NULL),
(2647, 80, 'Phường Kim Tân', 'Phường', NULL, NULL),
(2650, 80, 'Phường Bắc Lệnh', 'Phường', NULL, NULL),
(2653, 80, 'Phường Pom Hán', 'Phường', NULL, NULL),
(2656, 80, 'Phường Xuân Tăng', 'Phường', NULL, NULL),
(2658, 80, 'Phường Bình Minh', 'Phường', NULL, NULL),
(2659, 80, 'Phường Thống Nhất', 'Phường', NULL, NULL),
(2662, 80, 'Xã Đồng Tuyển', 'Xã', NULL, NULL),
(2665, 80, 'Xã Vạn Hoà', 'Xã', NULL, NULL),
(2668, 80, 'Phường Bắc Cường', 'Phường', NULL, NULL),
(2671, 80, 'Phường Nam Cường', 'Phường', NULL, NULL),
(2674, 80, 'Xã Cam Đường', 'Xã', NULL, NULL),
(2677, 80, 'Xã Tả Phời', 'Xã', NULL, NULL),
(2680, 80, 'Xã Hợp Thành', 'Xã', NULL, NULL),
(2683, 82, 'Thị trấn Bát Xát', 'Thị trấn', NULL, NULL),
(2686, 82, 'Xã A Mú Sung', 'Xã', NULL, NULL),
(2689, 82, 'Xã Nậm Chạc', 'Xã', NULL, NULL),
(2692, 82, 'Xã A Lù', 'Xã', NULL, NULL),
(2695, 82, 'Xã Trịnh Tường', 'Xã', NULL, NULL),
(2698, 82, 'Xã Ngải Thầu', 'Xã', NULL, NULL),
(2701, 82, 'Xã Y Tý', 'Xã', NULL, NULL),
(2704, 82, 'Xã Cốc Mỳ', 'Xã', NULL, NULL),
(2707, 82, 'Xã Dền Sáng', 'Xã', NULL, NULL),
(2710, 82, 'Xã Bản Vược', 'Xã', NULL, NULL),
(2713, 82, 'Xã Sàng Ma Sáo', 'Xã', NULL, NULL),
(2716, 82, 'Xã Bản Qua', 'Xã', NULL, NULL),
(2719, 82, 'Xã Mường Vi', 'Xã', NULL, NULL),
(2722, 82, 'Xã Dền Thàng', 'Xã', NULL, NULL),
(2725, 82, 'Xã Bản Xèo', 'Xã', NULL, NULL),
(2728, 82, 'Xã Mường Hum', 'Xã', NULL, NULL),
(2731, 82, 'Xã Trung Lèng Hồ', 'Xã', NULL, NULL),
(2734, 82, 'Xã Quang Kim', 'Xã', NULL, NULL),
(2737, 82, 'Xã Pa Cheo', 'Xã', NULL, NULL),
(2740, 82, 'Xã Nậm Pung', 'Xã', NULL, NULL),
(2743, 82, 'Xã Phìn Ngan', 'Xã', NULL, NULL),
(2746, 82, 'Xã Cốc San', 'Xã', NULL, NULL),
(2749, 82, 'Xã Tòng Sành', 'Xã', NULL, NULL),
(2752, 83, 'Xã Pha Long', 'Xã', NULL, NULL),
(2755, 83, 'Xã Tả Ngải Chồ', 'Xã', NULL, NULL),
(2758, 83, 'Xã Tung Chung Phố', 'Xã', NULL, NULL),
(2761, 83, 'Thị trấn Mường Khương', 'Thị trấn', NULL, NULL),
(2764, 83, 'Xã Dìn Chin', 'Xã', NULL, NULL),
(2767, 83, 'Xã Tả Gia Khâu', 'Xã', NULL, NULL),
(2770, 83, 'Xã Nậm Chảy', 'Xã', NULL, NULL),
(2773, 83, 'Xã Nấm Lư', 'Xã', NULL, NULL),
(2776, 83, 'Xã Lùng Khấu Nhin', 'Xã', NULL, NULL),
(2779, 83, 'Xã Thanh Bình', 'Xã', NULL, NULL),
(2782, 83, 'Xã Cao Sơn', 'Xã', NULL, NULL),
(2785, 83, 'Xã Lùng Vai', 'Xã', NULL, NULL),
(2788, 83, 'Xã Bản Lầu', 'Xã', NULL, NULL),
(2791, 83, 'Xã La Pan Tẩn', 'Xã', NULL, NULL),
(2794, 83, 'Xã Tả Thàng', 'Xã', NULL, NULL),
(2797, 83, 'Xã Bản Sen', 'Xã', NULL, NULL),
(2800, 84, 'Xã Nàn Sán', 'Xã', NULL, NULL),
(2803, 84, 'Xã Thào Chư Phìn', 'Xã', NULL, NULL),
(2806, 84, 'Xã Bản Mế', 'Xã', NULL, NULL),
(2809, 84, 'Xã Si Ma Cai', 'Xã', NULL, NULL),
(2812, 84, 'Xã Sán Chải', 'Xã', NULL, NULL),
(2815, 84, 'Xã Mản Thẩn', 'Xã', NULL, NULL),
(2818, 84, 'Xã Lùng Sui', 'Xã', NULL, NULL),
(2821, 84, 'Xã Cán Cấu', 'Xã', NULL, NULL),
(2824, 84, 'Xã Sín Chéng', 'Xã', NULL, NULL),
(2827, 84, 'Xã Cán Hồ', 'Xã', NULL, NULL),
(2830, 84, 'Xã Quan Thần Sán', 'Xã', NULL, NULL),
(2833, 84, 'Xã Lử Thẩn', 'Xã', NULL, NULL),
(2836, 84, 'Xã Nàn Xín', 'Xã', NULL, NULL),
(2839, 85, 'Thị trấn Bắc Hà', 'Thị trấn', NULL, NULL),
(2842, 85, 'Xã Lùng Cải', 'Xã', NULL, NULL),
(2845, 85, 'Xã Bản Già', 'Xã', NULL, NULL),
(2848, 85, 'Xã Lùng Phình', 'Xã', NULL, NULL),
(2851, 85, 'Xã Tả Van Chư', 'Xã', NULL, NULL),
(2854, 85, 'Xã Tả Củ Tỷ', 'Xã', NULL, NULL),
(2857, 85, 'Xã Thải Giàng Phố', 'Xã', NULL, NULL),
(2860, 85, 'Xã Lầu Thí Ngài', 'Xã', NULL, NULL),
(2863, 85, 'Xã Hoàng Thu Phố', 'Xã', NULL, NULL),
(2866, 85, 'Xã Bản Phố', 'Xã', NULL, NULL),
(2869, 85, 'Xã Bản Liền', 'Xã', NULL, NULL),
(2872, 85, 'Xã Tà Chải', 'Xã', NULL, NULL),
(2875, 85, 'Xã Na Hối', 'Xã', NULL, NULL),
(2878, 85, 'Xã Cốc Ly', 'Xã', NULL, NULL),
(2881, 85, 'Xã Nậm Mòn', 'Xã', NULL, NULL),
(2884, 85, 'Xã Nậm Đét', 'Xã', NULL, NULL),
(2887, 85, 'Xã Nậm Khánh', 'Xã', NULL, NULL),
(2890, 85, 'Xã Bảo Nhai', 'Xã', NULL, NULL),
(2893, 85, 'Xã Nậm Lúc', 'Xã', NULL, NULL),
(2896, 85, 'Xã Cốc Lầu', 'Xã', NULL, NULL),
(2899, 85, 'Xã Bản Cái', 'Xã', NULL, NULL),
(2902, 86, 'Thị trấn N.T Phong Hải', 'Thị trấn', NULL, NULL),
(2905, 86, 'Thị trấn Phố Lu', 'Thị trấn', NULL, NULL),
(2908, 86, 'Thị trấn Tằng Loỏng', 'Thị trấn', NULL, NULL),
(2911, 86, 'Xã Bản Phiệt', 'Xã', NULL, NULL),
(2914, 86, 'Xã Bản Cầm', 'Xã', NULL, NULL),
(2917, 86, 'Xã Thái Niên', 'Xã', NULL, NULL),
(2920, 86, 'Xã Phong Niên', 'Xã', NULL, NULL),
(2923, 86, 'Xã Gia Phú', 'Xã', NULL, NULL),
(2926, 86, 'Xã Xuân Quang', 'Xã', NULL, NULL),
(2929, 86, 'Xã Sơn Hải', 'Xã', NULL, NULL),
(2932, 86, 'Xã Xuân Giao', 'Xã', NULL, NULL),
(2935, 86, 'Xã Trì Quang', 'Xã', NULL, NULL),
(2938, 86, 'Xã Sơn Hà', 'Xã', NULL, NULL),
(2941, 86, 'Xã Phố Lu', 'Xã', NULL, NULL),
(2944, 86, 'Xã Phú Nhuận', 'Xã', NULL, NULL),
(2947, 87, 'Thị trấn Phố Ràng', 'Thị trấn', NULL, NULL),
(2950, 87, 'Xã Tân Tiến', 'Xã', NULL, NULL),
(2953, 87, 'Xã Nghĩa Đô', 'Xã', NULL, NULL),
(2956, 87, 'Xã Vĩnh Yên', 'Xã', NULL, NULL),
(2959, 87, 'Xã Điện Quan', 'Xã', NULL, NULL),
(2962, 87, 'Xã Xuân Hoà', 'Xã', NULL, NULL),
(2965, 87, 'Xã Tân Dương', 'Xã', NULL, NULL),
(2968, 87, 'Xã Thượng Hà', 'Xã', NULL, NULL),
(2971, 87, 'Xã Kim Sơn', 'Xã', NULL, NULL),
(2974, 87, 'Xã Cam Cọn', 'Xã', NULL, NULL),
(2977, 87, 'Xã Minh Tân', 'Xã', NULL, NULL),
(2980, 87, 'Xã Xuân Thượng', 'Xã', NULL, NULL),
(2983, 87, 'Xã Việt Tiến', 'Xã', NULL, NULL),
(2986, 87, 'Xã Yên Sơn', 'Xã', NULL, NULL),
(2989, 87, 'Xã Bảo Hà', 'Xã', NULL, NULL),
(2992, 87, 'Xã Lương Sơn', 'Xã', NULL, NULL),
(2995, 87, 'Xã Long Phúc', 'Xã', NULL, NULL),
(2998, 87, 'Xã Long Khánh', 'Xã', NULL, NULL),
(3001, 88, 'Thị trấn Sa Pa', 'Thị trấn', NULL, NULL),
(3004, 88, 'Xã Bản Khoang', 'Xã', NULL, NULL),
(3007, 88, 'Xã Tả Giàng Phình', 'Xã', NULL, NULL),
(3010, 88, 'Xã Trung Chải', 'Xã', NULL, NULL),
(3013, 88, 'Xã Tả Phìn', 'Xã', NULL, NULL),
(3016, 88, 'Xã Sa Pả', 'Xã', NULL, NULL),
(3019, 88, 'Xã San Sả Hồ', 'Xã', NULL, NULL),
(3022, 88, 'Xã Bản Phùng', 'Xã', NULL, NULL),
(3025, 88, 'Xã Hầu Thào', 'Xã', NULL, NULL),
(3028, 88, 'Xã Lao Chải', 'Xã', NULL, NULL),
(3031, 88, 'Xã Thanh Kim', 'Xã', NULL, NULL),
(3034, 88, 'Xã Suối Thầu', 'Xã', NULL, NULL),
(3037, 88, 'Xã Sử Pán', 'Xã', NULL, NULL),
(3040, 88, 'Xã Tả Van', 'Xã', NULL, NULL),
(3043, 88, 'Xã Thanh Phú', 'Xã', NULL, NULL),
(3046, 88, 'Xã Bản Hồ', 'Xã', NULL, NULL),
(3049, 88, 'Xã Nậm Sài', 'Xã', NULL, NULL),
(3052, 88, 'Xã Nậm Cang', 'Xã', NULL, NULL),
(3055, 89, 'Thị trấn Khánh Yên', 'Thị trấn', NULL, NULL),
(3058, 89, 'Xã Văn Sơn', 'Xã', NULL, NULL),
(3061, 89, 'Xã Võ Lao', 'Xã', NULL, NULL),
(3064, 89, 'Xã Sơn Thuỷ', 'Xã', NULL, NULL),
(3067, 89, 'Xã Nậm Mả', 'Xã', NULL, NULL),
(3070, 89, 'Xã Tân Thượng', 'Xã', NULL, NULL),
(3073, 89, 'Xã Nậm Rạng', 'Xã', NULL, NULL),
(3076, 89, 'Xã Nậm Chầy', 'Xã', NULL, NULL),
(3079, 89, 'Xã Tân An', 'Xã', NULL, NULL),
(3082, 89, 'Xã Khánh Yên Thượng', 'Xã', NULL, NULL),
(3085, 89, 'Xã Nậm Xé', 'Xã', NULL, NULL),
(3088, 89, 'Xã Dần Thàng', 'Xã', NULL, NULL),
(3091, 89, 'Xã Chiềng Ken', 'Xã', NULL, NULL),
(3094, 89, 'Xã Làng Giàng', 'Xã', NULL, NULL),
(3097, 89, 'Xã Hoà Mạc', 'Xã', NULL, NULL),
(3100, 89, 'Xã Khánh Yên Trung', 'Xã', NULL, NULL),
(3103, 89, 'Xã Khánh Yên Hạ', 'Xã', NULL, NULL),
(3106, 89, 'Xã Dương Quỳ', 'Xã', NULL, NULL),
(3109, 89, 'Xã Nậm Tha', 'Xã', NULL, NULL),
(3112, 89, 'Xã Minh Lương', 'Xã', NULL, NULL),
(3115, 89, 'Xã Thẩm Dương', 'Xã', NULL, NULL),
(3118, 89, 'Xã Liêm Phú', 'Xã', NULL, NULL),
(3121, 89, 'Xã Nậm Xây', 'Xã', NULL, NULL),
(3124, 94, 'Phường Noong Bua', 'Phường', NULL, NULL),
(3127, 94, 'Phường Him Lam', 'Phường', NULL, NULL),
(3130, 94, 'Phường Thanh Bình', 'Phường', NULL, NULL),
(3133, 94, 'Phường Tân Thanh', 'Phường', NULL, NULL),
(3136, 94, 'Phường Mường Thanh', 'Phường', NULL, NULL),
(3139, 94, 'Phường Nam Thanh', 'Phường', NULL, NULL),
(3142, 94, 'Phường Thanh Trường', 'Phường', NULL, NULL),
(3144, 94, 'Xã Tà Lèng', 'Xã', NULL, NULL),
(3145, 94, 'Xã Thanh Minh', 'Xã', NULL, NULL),
(3148, 95, 'Phường Sông Đà', 'Phường', NULL, NULL),
(3151, 95, 'Phường Na Lay', 'Phường', NULL, NULL),
(3154, 96, 'Xã Sín Thầu', 'Xã', NULL, NULL),
(3155, 96, 'Xã Sen Thượng', 'Xã', NULL, NULL),
(3156, 103, 'Xã Nậm Tin', 'Xã', NULL, NULL),
(3157, 96, 'Xã Chung Chải', 'Xã', NULL, NULL),
(3158, 96, 'Xã Leng Su Sìn', 'Xã', NULL, NULL),
(3159, 96, 'Xã Pá Mỳ', 'Xã', NULL, NULL),
(3160, 96, 'Xã Mường Nhé', 'Xã', NULL, NULL),
(3161, 96, 'Xã Nậm Vì', 'Xã', NULL, NULL),
(3162, 96, 'Xã Nậm Kè', 'Xã', NULL, NULL),
(3163, 96, 'Xã Mường Toong', 'Xã', NULL, NULL),
(3164, 96, 'Xã Quảng Lâm', 'Xã', NULL, NULL),
(3165, 103, 'Xã Pa Tần', 'Xã', NULL, NULL),
(3166, 103, 'Xã Chà Cang', 'Xã', NULL, NULL),
(3167, 103, 'Xã Na Cô Sa', 'Xã', NULL, NULL),
(3168, 103, 'Xã Nà Khoa', 'Xã', NULL, NULL),
(3169, 103, 'Xã Nà Hỳ', 'Xã', NULL, NULL),
(3170, 103, 'Xã Nà Bủng', 'Xã', NULL, NULL),
(3171, 103, 'Xã Nậm Nhừ', 'Xã', NULL, NULL),
(3172, 97, 'Thị Trấn Mường Chà', 'Thị trấn', NULL, NULL),
(3173, 103, 'Xã Nậm Chua', 'Xã', NULL, NULL),
(3174, 103, 'Xã Nậm Khăn', 'Xã', NULL, NULL),
(3175, 103, 'Xã Chà Tở', 'Xã', NULL, NULL),
(3176, 103, 'Xã Vàng Đán', 'Xã', NULL, NULL),
(3177, 96, 'Xã Huổi Lếnh', 'Xã', NULL, NULL),
(3178, 97, 'Xã Xá Tổng', 'Xã', NULL, NULL),
(3181, 97, 'Xã Mường Tùng', 'Xã', NULL, NULL),
(3184, 95, 'Xã Lay Nưa', 'Xã', NULL, NULL),
(3187, 103, 'Xã Chà Nưa', 'Xã', NULL, NULL),
(3190, 97, 'Xã Hừa Ngài', 'Xã', NULL, NULL),
(3191, 97, 'Xã Huổi Mí', 'Xã', NULL, NULL),
(3193, 97, 'Xã Pa Ham', 'Xã', NULL, NULL),
(3194, 97, 'Xã Nậm Nèn', 'Xã', NULL, NULL),
(3196, 97, 'Xã Huổi Lèng', 'Xã', NULL, NULL),
(3197, 97, 'Xã Sa Lông', 'Xã', NULL, NULL),
(3198, 103, 'Xã Phìn Hồ', 'Xã', NULL, NULL),
(3199, 103, 'Xã Si Pa Phìn', 'Xã', NULL, NULL),
(3200, 97, 'Xã Ma Thì Hồ', 'Xã', NULL, NULL);
INSERT INTO `vn_xaphuongthitran` (`id`, `maqh`, `name`, `type`, `created_at`, `updated_at`) VALUES
(3201, 97, 'Xã Na Sang', 'Xã', NULL, NULL),
(3202, 97, 'Xã Mường Mươn', 'Xã', NULL, NULL),
(3203, 101, 'Thị trấn Điện Biên Đông', 'Thị trấn', NULL, NULL),
(3205, 101, 'Xã Na Son', 'Xã', NULL, NULL),
(3208, 101, 'Xã Phì Nhừ', 'Xã', NULL, NULL),
(3211, 101, 'Xã Chiềng Sơ', 'Xã', NULL, NULL),
(3214, 101, 'Xã Mường Luân', 'Xã', NULL, NULL),
(3217, 98, 'Thị trấn Tủa Chùa', 'Thị trấn', NULL, NULL),
(3220, 98, 'Xã Huổi Só', 'Xã', NULL, NULL),
(3223, 98, 'Xã Xín Chải', 'Xã', NULL, NULL),
(3226, 98, 'Xã Tả Sìn Thàng', 'Xã', NULL, NULL),
(3229, 98, 'Xã Lao Xả Phình', 'Xã', NULL, NULL),
(3232, 98, 'Xã Tả Phìn', 'Xã', NULL, NULL),
(3235, 98, 'Xã Tủa Thàng', 'Xã', NULL, NULL),
(3238, 98, 'Xã Trung Thu', 'Xã', NULL, NULL),
(3241, 98, 'Xã Sính Phình', 'Xã', NULL, NULL),
(3244, 98, 'Xã Sáng Nhè', 'Xã', NULL, NULL),
(3247, 98, 'Xã Mường Đun', 'Xã', NULL, NULL),
(3250, 98, 'Xã Mường Báng', 'Xã', NULL, NULL),
(3253, 99, 'Thị trấn Tuần Giáo', 'Thị trấn', NULL, NULL),
(3256, 102, 'Thị trấn Mường Ảng', 'Thị trấn', NULL, NULL),
(3259, 99, 'Xã Phình Sáng', 'Xã', NULL, NULL),
(3260, 99, 'Xã Rạng Đông', 'Xã', NULL, NULL),
(3262, 99, 'Xã Mùn Chung', 'Xã', NULL, NULL),
(3263, 99, 'Xã Nà Tòng', 'Xã', NULL, NULL),
(3265, 99, 'Xã Ta Ma', 'Xã', NULL, NULL),
(3268, 99, 'Xã Mường Mùn', 'Xã', NULL, NULL),
(3269, 99, 'Xã Pú Xi', 'Xã', NULL, NULL),
(3271, 99, 'Xã Pú Nhung', 'Xã', NULL, NULL),
(3274, 99, 'Xã Quài Nưa', 'Xã', NULL, NULL),
(3277, 99, 'Xã Mường Thín', 'Xã', NULL, NULL),
(3280, 99, 'Xã Tỏa Tình', 'Xã', NULL, NULL),
(3283, 99, 'Xã Nà Sáy', 'Xã', NULL, NULL),
(3284, 99, 'Xã Mường Khong', 'Xã', NULL, NULL),
(3286, 102, 'Xã Mường Đăng', 'Xã', NULL, NULL),
(3287, 102, 'Xã Ngối Cáy', 'Xã', NULL, NULL),
(3289, 99, 'Xã Quài Cang', 'Xã', NULL, NULL),
(3292, 102, 'Xã Ẳng Tở', 'Xã', NULL, NULL),
(3295, 99, 'Xã Quài Tở', 'Xã', NULL, NULL),
(3298, 99, 'Xã Chiềng Sinh', 'Xã', NULL, NULL),
(3299, 99, 'Xã Chiềng Đông', 'Xã', NULL, NULL),
(3301, 102, 'Xã Búng Lao', 'Xã', NULL, NULL),
(3302, 102, 'Xã Xuân Lao', 'Xã', NULL, NULL),
(3304, 99, 'Xã Tênh Phông', 'Xã', NULL, NULL),
(3307, 102, 'Xã Ẳng Nưa', 'Xã', NULL, NULL),
(3310, 102, 'Xã Ẳng Cang', 'Xã', NULL, NULL),
(3312, 102, 'Xã Nặm Lịch', 'Xã', NULL, NULL),
(3313, 102, 'Xã Mường Lạn', 'Xã', NULL, NULL),
(3316, 100, 'Xã Nà Tấu', 'Xã', NULL, NULL),
(3317, 100, 'Xã Nà Nhạn', 'Xã', NULL, NULL),
(3319, 100, 'Xã Mường Pồn', 'Xã', NULL, NULL),
(3322, 100, 'Xã Thanh Nưa', 'Xã', NULL, NULL),
(3323, 100, 'Xã Hua Thanh', 'Xã', NULL, NULL),
(3325, 100, 'Xã Mường Phăng', 'Xã', NULL, NULL),
(3326, 100, 'Xã Pá Khoang', 'Xã', NULL, NULL),
(3328, 100, 'Xã Thanh Luông', 'Xã', NULL, NULL),
(3331, 100, 'Xã Thanh Hưng', 'Xã', NULL, NULL),
(3334, 100, 'Xã Thanh Xương', 'Xã', NULL, NULL),
(3337, 100, 'Xã Thanh Chăn', 'Xã', NULL, NULL),
(3340, 100, 'Xã Pa Thơm', 'Xã', NULL, NULL),
(3343, 100, 'Xã Thanh An', 'Xã', NULL, NULL),
(3346, 100, 'Xã Thanh Yên', 'Xã', NULL, NULL),
(3349, 100, 'Xã Noong Luống', 'Xã', NULL, NULL),
(3352, 100, 'Xã Noọng Hẹt', 'Xã', NULL, NULL),
(3355, 100, 'Xã Sam Mứn', 'Xã', NULL, NULL),
(3356, 100, 'Xã Pom Lót', 'Xã', NULL, NULL),
(3358, 100, 'Xã Núa Ngam', 'Xã', NULL, NULL),
(3359, 100, 'Xã Hẹ Muông', 'Xã', NULL, NULL),
(3361, 100, 'Xã Na Ư', 'Xã', NULL, NULL),
(3364, 100, 'Xã Mường Nhà', 'Xã', NULL, NULL),
(3365, 100, 'Xã Na Tông', 'Xã', NULL, NULL),
(3367, 100, 'Xã Mường Lói', 'Xã', NULL, NULL),
(3368, 100, 'Xã Phu Luông', 'Xã', NULL, NULL),
(3370, 101, 'Xã Pú Nhi', 'Xã', NULL, NULL),
(3371, 101, 'Xã Nong U', 'Xã', NULL, NULL),
(3373, 101, 'Xã Xa Dung', 'Xã', NULL, NULL),
(3376, 101, 'Xã Keo Lôm', 'Xã', NULL, NULL),
(3379, 101, 'Xã Luân Giới', 'Xã', NULL, NULL),
(3382, 101, 'Xã Phình Giàng', 'Xã', NULL, NULL),
(3383, 101, 'Xã Pú Hồng', 'Xã', NULL, NULL),
(3384, 101, 'Xã Tìa Dình', 'Xã', NULL, NULL),
(3385, 101, 'Xã Háng Lìa', 'Xã', NULL, NULL),
(3386, 105, 'Phường Quyết Thắng', 'Phường', NULL, NULL),
(3387, 105, 'Phường Tân Phong', 'Phường', NULL, NULL),
(3388, 105, 'Phường Quyết Tiến', 'Phường', NULL, NULL),
(3389, 105, 'Phường Đoàn Kết', 'Phường', NULL, NULL),
(3390, 106, 'Thị trấn Tam Đường', 'Thị trấn', NULL, NULL),
(3391, 109, 'Xã Lả Nhì Thàng', 'Xã', NULL, NULL),
(3394, 106, 'Xã Thèn Sin', 'Xã', NULL, NULL),
(3397, 106, 'Xã Sùng Phài', 'Xã', NULL, NULL),
(3400, 106, 'Xã Tả Lèng', 'Xã', NULL, NULL),
(3403, 105, 'Xã Nậm Loỏng', 'Xã', NULL, NULL),
(3405, 106, 'Xã Giang Ma', 'Xã', NULL, NULL),
(3406, 106, 'Xã Hồ Thầu', 'Xã', NULL, NULL),
(3408, 105, 'Phường Đông Phong', 'Phường', NULL, NULL),
(3409, 105, 'Xã San Thàng', 'Xã', NULL, NULL),
(3412, 106, 'Xã Bình Lư', 'Xã', NULL, NULL),
(3413, 106, 'Xã Sơn Bình', 'Xã', NULL, NULL),
(3415, 106, 'Xã Nùng Nàng', 'Xã', NULL, NULL),
(3418, 106, 'Xã Bản Giang', 'Xã', NULL, NULL),
(3421, 106, 'Xã Bản Hon', 'Xã', NULL, NULL),
(3424, 106, 'Xã Bản Bo', 'Xã', NULL, NULL),
(3427, 106, 'Xã Nà Tăm', 'Xã', NULL, NULL),
(3430, 106, 'Xã Khun Há', 'Xã', NULL, NULL),
(3433, 107, 'Thị trấn Mường Tè', 'Thị trấn', NULL, NULL),
(3434, 112, 'Thị trấn Nậm Nhùn', 'Thị trấn', NULL, NULL),
(3436, 107, 'Xã Thu Lũm', 'Xã', NULL, NULL),
(3439, 107, 'Xã Ka Lăng', 'Xã', NULL, NULL),
(3440, 107, 'Xã Tá Bạ', 'Xã', NULL, NULL),
(3442, 107, 'Xã Pa ủ', 'Xã', NULL, NULL),
(3445, 107, 'Xã Mường Tè', 'Xã', NULL, NULL),
(3448, 107, 'Xã Pa Vệ Sử', 'Xã', NULL, NULL),
(3451, 107, 'Xã Mù Cả', 'Xã', NULL, NULL),
(3454, 107, 'Xã Bun Tở', 'Xã', NULL, NULL),
(3457, 107, 'Xã Nậm Khao', 'Xã', NULL, NULL),
(3460, 112, 'Xã Hua Bun', 'Xã', NULL, NULL),
(3463, 107, 'Xã Tà Tổng', 'Xã', NULL, NULL),
(3466, 107, 'Xã Bun Nưa', 'Xã', NULL, NULL),
(3467, 107, 'Xã Vàng San', 'Xã', NULL, NULL),
(3469, 107, 'Xã Kan Hồ', 'Xã', NULL, NULL),
(3472, 112, 'Xã Mường Mô', 'Xã', NULL, NULL),
(3473, 112, 'Xã Nậm Chà', 'Xã', NULL, NULL),
(3474, 112, 'Xã Nậm Manh', 'Xã', NULL, NULL),
(3475, 112, 'Xã Nậm Hàng', 'Xã', NULL, NULL),
(3478, 108, 'Thị trấn Sìn Hồ', 'Thị trấn', NULL, NULL),
(3481, 112, 'Xã Lê Lợi', 'Xã', NULL, NULL),
(3484, 112, 'Xã Pú Đao', 'Xã', NULL, NULL),
(3487, 108, 'Xã Chăn Nưa', 'Xã', NULL, NULL),
(3488, 112, 'Xã Nậm Pì', 'Xã', NULL, NULL),
(3490, 109, 'Xã Huổi Luông', 'Xã', NULL, NULL),
(3493, 108, 'Xã Pa Tần', 'Xã', NULL, NULL),
(3496, 108, 'Xã Phìn Hồ', 'Xã', NULL, NULL),
(3499, 108, 'Xã Hồng Thu', 'Xã', NULL, NULL),
(3502, 112, 'Xã Nậm Ban', 'Xã', NULL, NULL),
(3503, 112, 'Xã Trung Chải', 'Xã', NULL, NULL),
(3505, 108, 'Xã Phăng Sô Lin', 'Xã', NULL, NULL),
(3508, 108, 'Xã Ma Quai', 'Xã', NULL, NULL),
(3509, 108, 'Xã Lùng Thàng', 'Xã', NULL, NULL),
(3511, 108, 'Xã Tả Phìn', 'Xã', NULL, NULL),
(3514, 108, 'Xã Sà Dề Phìn', 'Xã', NULL, NULL),
(3517, 108, 'Xã Nậm Tăm', 'Xã', NULL, NULL),
(3520, 108, 'Xã Tả Ngảo', 'Xã', NULL, NULL),
(3523, 108, 'Xã Pu Sam Cáp', 'Xã', NULL, NULL),
(3526, 108, 'Xã Nậm Cha', 'Xã', NULL, NULL),
(3527, 108, 'Xã Pa Khoá', 'Xã', NULL, NULL),
(3529, 108, 'Xã Làng Mô', 'Xã', NULL, NULL),
(3532, 108, 'Xã Noong Hẻo', 'Xã', NULL, NULL),
(3535, 108, 'Xã Nậm Mạ', 'Xã', NULL, NULL),
(3538, 108, 'Xã Căn Co', 'Xã', NULL, NULL),
(3541, 108, 'Xã Tủa Sín Chải', 'Xã', NULL, NULL),
(3544, 108, 'Xã Nậm Cuổi', 'Xã', NULL, NULL),
(3547, 108, 'Xã Nậm Hăn', 'Xã', NULL, NULL),
(3549, 109, 'Thị trấn Phong Thổ', 'Thị trấn', NULL, NULL),
(3550, 109, 'Xã Sì Lờ Lầu', 'Xã', NULL, NULL),
(3553, 109, 'Xã Mồ Sì San', 'Xã', NULL, NULL),
(3556, 109, 'Xã Ma Li Chải', 'Xã', NULL, NULL),
(3559, 109, 'Xã Pa Vây Sử', 'Xã', NULL, NULL),
(3562, 109, 'Xã Vàng Ma Chải', 'Xã', NULL, NULL),
(3565, 109, 'Xã Tông Qua Lìn', 'Xã', NULL, NULL),
(3568, 109, 'Xã Mù Sang', 'Xã', NULL, NULL),
(3571, 109, 'Xã Dào San', 'Xã', NULL, NULL),
(3574, 109, 'Xã Ma Ly Pho', 'Xã', NULL, NULL),
(3577, 109, 'Xã Bản Lang', 'Xã', NULL, NULL),
(3580, 109, 'Xã Hoang Thèn', 'Xã', NULL, NULL),
(3583, 109, 'Xã Khổng Lào', 'Xã', NULL, NULL),
(3586, 109, 'Xã Nậm Xe', 'Xã', NULL, NULL),
(3589, 109, 'Xã Mường So', 'Xã', NULL, NULL),
(3592, 109, 'Xã Sin Suối Hồ', 'Xã', NULL, NULL),
(3595, 110, 'Thị trấn Than Uyên', 'Thị trấn', NULL, NULL),
(3598, 111, 'Thị trấn Tân Uyên', 'Thị trấn', NULL, NULL),
(3601, 111, 'Xã Mường Khoa', 'Xã', NULL, NULL),
(3602, 111, 'Xã Phúc Khoa', 'Xã', NULL, NULL),
(3604, 111, 'Xã Thân Thuộc', 'Xã', NULL, NULL),
(3605, 111, 'Xã Trung Đồng', 'Xã', NULL, NULL),
(3607, 111, 'Xã Hố Mít', 'Xã', NULL, NULL),
(3610, 111, 'Xã Nậm Cần', 'Xã', NULL, NULL),
(3613, 111, 'Xã Nậm Sỏ', 'Xã', NULL, NULL),
(3616, 111, 'Xã Pắc Ta', 'Xã', NULL, NULL),
(3618, 110, 'Xã Phúc Than', 'Xã', NULL, NULL),
(3619, 110, 'Xã Mường Than', 'Xã', NULL, NULL),
(3622, 111, 'Xã Tà Mít', 'Xã', NULL, NULL),
(3625, 110, 'Xã Mường Mít', 'Xã', NULL, NULL),
(3628, 110, 'Xã Pha Mu', 'Xã', NULL, NULL),
(3631, 110, 'Xã Mường Cang', 'Xã', NULL, NULL),
(3632, 110, 'Xã Hua Nà', 'Xã', NULL, NULL),
(3634, 110, 'Xã Tà Hừa', 'Xã', NULL, NULL),
(3637, 110, 'Xã Mường Kim', 'Xã', NULL, NULL),
(3638, 110, 'Xã Tà Mung', 'Xã', NULL, NULL),
(3640, 110, 'Xã Tà Gia', 'Xã', NULL, NULL),
(3643, 110, 'Xã Khoen On', 'Xã', NULL, NULL),
(3646, 116, 'Phường Chiềng Lề', 'Phường', NULL, NULL),
(3649, 116, 'Phường Tô Hiệu', 'Phường', NULL, NULL),
(3652, 116, 'Phường Quyết Thắng', 'Phường', NULL, NULL),
(3655, 116, 'Phường Quyết Tâm', 'Phường', NULL, NULL),
(3658, 116, 'Xã Chiềng Cọ', 'Xã', NULL, NULL),
(3661, 116, 'Xã Chiềng Đen', 'Xã', NULL, NULL),
(3664, 116, 'Xã Chiềng Xôm', 'Xã', NULL, NULL),
(3667, 116, 'Phường Chiềng An', 'Phường', NULL, NULL),
(3670, 116, 'Phường Chiềng Cơi', 'Phường', NULL, NULL),
(3673, 116, 'Xã Chiềng Ngần', 'Xã', NULL, NULL),
(3676, 116, 'Xã Hua La', 'Xã', NULL, NULL),
(3679, 116, 'Phường Chiềng Sinh', 'Phường', NULL, NULL),
(3682, 118, 'Xã Mường Chiên', 'Xã', NULL, NULL),
(3685, 118, 'Xã Cà Nàng', 'Xã', NULL, NULL),
(3688, 118, 'Xã Chiềng Khay', 'Xã', NULL, NULL),
(3694, 118, 'Xã Mường Giôn', 'Xã', NULL, NULL),
(3697, 118, 'Xã Pá Ma Pha Khinh', 'Xã', NULL, NULL),
(3700, 118, 'Xã Chiềng Ơn', 'Xã', NULL, NULL),
(3703, 118, 'Xã Mường Giàng', 'Xã', NULL, NULL),
(3706, 118, 'Xã Chiềng Bằng', 'Xã', NULL, NULL),
(3709, 118, 'Xã Mường Sại', 'Xã', NULL, NULL),
(3712, 118, 'Xã Nậm ét', 'Xã', NULL, NULL),
(3718, 118, 'Xã Chiềng Khoang', 'Xã', NULL, NULL),
(3721, 119, 'Thị trấn Thuận Châu', 'Thị trấn', NULL, NULL),
(3724, 119, 'Xã Phỏng Lái', 'Xã', NULL, NULL),
(3727, 119, 'Xã Mường é', 'Xã', NULL, NULL),
(3730, 119, 'Xã Chiềng Pha', 'Xã', NULL, NULL),
(3733, 119, 'Xã Chiềng La', 'Xã', NULL, NULL),
(3736, 119, 'Xã Chiềng Ngàm', 'Xã', NULL, NULL),
(3739, 119, 'Xã Liệp Tè', 'Xã', NULL, NULL),
(3742, 119, 'Xã é Tòng', 'Xã', NULL, NULL),
(3745, 119, 'Xã Phỏng Lập', 'Xã', NULL, NULL),
(3748, 119, 'Xã Chiềng Sơ', 'Xã', NULL, NULL),
(3751, 119, 'Xã Chiềng Ly', 'Xã', NULL, NULL),
(3754, 119, 'Xã Nong Lay', 'Xã', NULL, NULL),
(3757, 119, 'Xã Mường Khiêng', 'Xã', NULL, NULL),
(3760, 119, 'Xã Mường Bám', 'Xã', NULL, NULL),
(3763, 119, 'Xã Long Hẹ', 'Xã', NULL, NULL),
(3766, 119, 'Xã Chiềng Bôm', 'Xã', NULL, NULL),
(3769, 119, 'Xã Thôn Mòn', 'Xã', NULL, NULL),
(3772, 119, 'Xã Tòng Lệnh', 'Xã', NULL, NULL),
(3775, 119, 'Xã Tòng Cọ', 'Xã', NULL, NULL),
(3778, 119, 'Xã Bó Mười', 'Xã', NULL, NULL),
(3781, 119, 'Xã Co Mạ', 'Xã', NULL, NULL),
(3784, 119, 'Xã Púng Tra', 'Xã', NULL, NULL),
(3787, 119, 'Xã Chiềng Pấc', 'Xã', NULL, NULL),
(3790, 119, 'Xã Nậm Lầu', 'Xã', NULL, NULL),
(3793, 119, 'Xã Bon Phặng', 'Xã', NULL, NULL),
(3796, 119, 'Xã Co Tòng', 'Xã', NULL, NULL),
(3799, 119, 'Xã Muội Nọi', 'Xã', NULL, NULL),
(3802, 119, 'Xã Pá Lông', 'Xã', NULL, NULL),
(3805, 119, 'Xã Bản Lầm', 'Xã', NULL, NULL),
(3808, 120, 'Thị trấn Ít Ong', 'Thị trấn', NULL, NULL),
(3811, 120, 'Xã Nậm Giôn', 'Xã', NULL, NULL),
(3814, 120, 'Xã Chiềng Lao', 'Xã', NULL, NULL),
(3817, 120, 'Xã Hua Trai', 'Xã', NULL, NULL),
(3820, 120, 'Xã Ngọc Chiến', 'Xã', NULL, NULL),
(3823, 120, 'Xã Mường Trai', 'Xã', NULL, NULL),
(3826, 120, 'Xã Nậm Păm', 'Xã', NULL, NULL),
(3829, 120, 'Xã Chiềng Muôn', 'Xã', NULL, NULL),
(3832, 120, 'Xã Chiềng Ân', 'Xã', NULL, NULL),
(3835, 120, 'Xã Pi Toong', 'Xã', NULL, NULL),
(3838, 120, 'Xã Chiềng Công', 'Xã', NULL, NULL),
(3841, 120, 'Xã Tạ Bú', 'Xã', NULL, NULL),
(3844, 120, 'Xã Chiềng San', 'Xã', NULL, NULL),
(3847, 120, 'Xã Mường Bú', 'Xã', NULL, NULL),
(3850, 120, 'Xã Chiềng Hoa', 'Xã', NULL, NULL),
(3853, 120, 'Xã Mường Chùm', 'Xã', NULL, NULL),
(3856, 121, 'Thị trấn Bắc Yên', 'Thị trấn', NULL, NULL),
(3859, 121, 'Xã Phiêng Ban', 'Xã', NULL, NULL),
(3862, 121, 'Xã Hang Chú', 'Xã', NULL, NULL),
(3865, 121, 'Xã Xín Vàng', 'Xã', NULL, NULL),
(3868, 121, 'Xã Tà Xùa', 'Xã', NULL, NULL),
(3869, 121, 'Xã Háng Đồng', 'Xã', NULL, NULL),
(3871, 121, 'Xã Bắc Ngà', 'Xã', NULL, NULL),
(3874, 121, 'Xã Làng Chếu', 'Xã', NULL, NULL),
(3877, 121, 'Xã Chim Vàn', 'Xã', NULL, NULL),
(3880, 121, 'Xã Mường Khoa', 'Xã', NULL, NULL),
(3883, 121, 'Xã Song Pe', 'Xã', NULL, NULL),
(3886, 121, 'Xã Hồng Ngài', 'Xã', NULL, NULL),
(3889, 121, 'Xã Tạ Khoa', 'Xã', NULL, NULL),
(3890, 121, 'Xã Hua Nhàn', 'Xã', NULL, NULL),
(3892, 121, 'Xã Phiêng Kôn', 'Xã', NULL, NULL),
(3895, 121, 'Xã Chiềng Sại', 'Xã', NULL, NULL),
(3898, 122, 'Thị trấn Phù Yên', 'Thị trấn', NULL, NULL),
(3901, 122, 'Xã Suối Tọ', 'Xã', NULL, NULL),
(3904, 122, 'Xã Mường Thải', 'Xã', NULL, NULL),
(3907, 122, 'Xã Mường Cơi', 'Xã', NULL, NULL),
(3910, 122, 'Xã Quang Huy', 'Xã', NULL, NULL),
(3913, 122, 'Xã Huy Bắc', 'Xã', NULL, NULL),
(3916, 122, 'Xã Huy Thượng', 'Xã', NULL, NULL),
(3919, 122, 'Xã Tân Lang', 'Xã', NULL, NULL),
(3922, 122, 'Xã Gia Phù', 'Xã', NULL, NULL),
(3925, 122, 'Xã Tường Phù', 'Xã', NULL, NULL),
(3928, 122, 'Xã Huy Hạ', 'Xã', NULL, NULL),
(3931, 122, 'Xã Huy Tân', 'Xã', NULL, NULL),
(3934, 122, 'Xã Mường Lang', 'Xã', NULL, NULL),
(3937, 122, 'Xã Suối Bau', 'Xã', NULL, NULL),
(3940, 122, 'Xã Huy Tường', 'Xã', NULL, NULL),
(3943, 122, 'Xã Mường Do', 'Xã', NULL, NULL),
(3946, 122, 'Xã Sập Xa', 'Xã', NULL, NULL),
(3949, 122, 'Xã Tường Thượng', 'Xã', NULL, NULL),
(3952, 122, 'Xã Tường Tiến', 'Xã', NULL, NULL),
(3955, 122, 'Xã Tường Phong', 'Xã', NULL, NULL),
(3958, 122, 'Xã Tường Hạ', 'Xã', NULL, NULL),
(3961, 122, 'Xã Kim Bon', 'Xã', NULL, NULL),
(3964, 122, 'Xã Mường Bang', 'Xã', NULL, NULL),
(3967, 122, 'Xã Đá Đỏ', 'Xã', NULL, NULL),
(3970, 122, 'Xã Tân Phong', 'Xã', NULL, NULL),
(3973, 122, 'Xã Nam Phong', 'Xã', NULL, NULL),
(3976, 122, 'Xã Bắc Phong', 'Xã', NULL, NULL),
(3979, 123, 'Thị trấn Mộc Châu', 'Thị trấn', NULL, NULL),
(3982, 123, 'Thị trấn NT Mộc Châu', 'Thị trấn', NULL, NULL),
(3985, 123, 'Xã Chiềng Sơn', 'Xã', NULL, NULL),
(3988, 123, 'Xã Tân Hợp', 'Xã', NULL, NULL),
(3991, 123, 'Xã Qui Hướng', 'Xã', NULL, NULL),
(3994, 128, 'Xã Suối Bàng', 'Xã', NULL, NULL),
(3997, 123, 'Xã Tân Lập', 'Xã', NULL, NULL),
(4000, 123, 'Xã Nà Mường', 'Xã', NULL, NULL),
(4003, 123, 'Xã Tà Lai', 'Xã', NULL, NULL),
(4006, 128, 'Xã Song Khủa', 'Xã', NULL, NULL),
(4009, 128, 'Xã Liên Hoà', 'Xã', NULL, NULL),
(4012, 123, 'Xã Chiềng Hắc', 'Xã', NULL, NULL),
(4015, 123, 'Xã Hua Păng', 'Xã', NULL, NULL),
(4018, 128, 'Xã Tô Múa', 'Xã', NULL, NULL),
(4021, 128, 'Xã Mường Tè', 'Xã', NULL, NULL),
(4024, 123, 'Xã Chiềng Khừa', 'Xã', NULL, NULL),
(4027, 123, 'Xã Mường Sang', 'Xã', NULL, NULL),
(4030, 123, 'Xã Đông Sang', 'Xã', NULL, NULL),
(4033, 123, 'Xã Phiêng Luông', 'Xã', NULL, NULL),
(4036, 128, 'Xã Chiềng Khoa', 'Xã', NULL, NULL),
(4039, 128, 'Xã Mường Men', 'Xã', NULL, NULL),
(4042, 128, 'Xã Quang Minh', 'Xã', NULL, NULL),
(4045, 123, 'Xã Lóng Sập', 'Xã', NULL, NULL),
(4048, 128, 'Xã Vân Hồ', 'Xã', NULL, NULL),
(4051, 128, 'Xã Lóng Luông', 'Xã', NULL, NULL),
(4054, 128, 'Xã Chiềng Yên', 'Xã', NULL, NULL),
(4056, 128, 'Xã Chiềng Xuân', 'Xã', NULL, NULL),
(4057, 128, 'Xã Xuân Nha', 'Xã', NULL, NULL),
(4058, 128, 'Xã Tân Xuân', 'Xã', NULL, NULL),
(4060, 124, 'Thị trấn Yên Châu', 'Thị trấn', NULL, NULL),
(4063, 124, 'Xã Chiềng Đông', 'Xã', NULL, NULL),
(4066, 124, 'Xã Sập Vạt', 'Xã', NULL, NULL),
(4069, 124, 'Xã Chiềng Sàng', 'Xã', NULL, NULL),
(4072, 124, 'Xã Chiềng Pằn', 'Xã', NULL, NULL),
(4075, 124, 'Xã Viêng Lán', 'Xã', NULL, NULL),
(4078, 124, 'Xã Chiềng Hặc', 'Xã', NULL, NULL),
(4081, 124, 'Xã Mường Lựm', 'Xã', NULL, NULL),
(4084, 124, 'Xã Chiềng On', 'Xã', NULL, NULL),
(4087, 124, 'Xã Yên Sơn', 'Xã', NULL, NULL),
(4090, 124, 'Xã Chiềng Khoi', 'Xã', NULL, NULL),
(4093, 124, 'Xã Tú Nang', 'Xã', NULL, NULL),
(4096, 124, 'Xã Lóng Phiêng', 'Xã', NULL, NULL),
(4099, 124, 'Xã Phiêng Khoài', 'Xã', NULL, NULL),
(4102, 124, 'Xã Chiềng Tương', 'Xã', NULL, NULL),
(4105, 125, 'Thị trấn Hát Lót', 'Thị trấn', NULL, NULL),
(4108, 125, 'Xã Chiềng Sung', 'Xã', NULL, NULL),
(4111, 125, 'Xã Mường Bằng', 'Xã', NULL, NULL),
(4114, 125, 'Xã Chiềng Chăn', 'Xã', NULL, NULL),
(4117, 125, 'Xã Mương Tranh', 'Xã', NULL, NULL),
(4120, 125, 'Xã Chiềng Ban', 'Xã', NULL, NULL),
(4123, 125, 'Xã Chiềng Mung', 'Xã', NULL, NULL),
(4126, 125, 'Xã Mường Bon', 'Xã', NULL, NULL),
(4129, 125, 'Xã Chiềng Chung', 'Xã', NULL, NULL),
(4132, 125, 'Xã Chiềng Mai', 'Xã', NULL, NULL),
(4135, 125, 'Xã Hát Lót', 'Xã', NULL, NULL),
(4136, 125, 'Xã Nà Pó', 'Xã', NULL, NULL),
(4138, 125, 'Xã Cò  Nòi', 'Xã', NULL, NULL),
(4141, 125, 'Xã Chiềng Nơi', 'Xã', NULL, NULL),
(4144, 125, 'Xã Phiêng Cằm', 'Xã', NULL, NULL),
(4147, 125, 'Xã Chiềng Dong', 'Xã', NULL, NULL),
(4150, 125, 'Xã Chiềng Kheo', 'Xã', NULL, NULL),
(4153, 125, 'Xã Chiềng Ve', 'Xã', NULL, NULL),
(4156, 125, 'Xã Chiềng Lương', 'Xã', NULL, NULL),
(4159, 125, 'Xã Phiêng Pằn', 'Xã', NULL, NULL),
(4162, 125, 'Xã Nà Ơt', 'Xã', NULL, NULL),
(4165, 125, 'Xã Tà Hộc', 'Xã', NULL, NULL),
(4168, 126, 'Thị trấn Sông Mã', 'Thị trấn', NULL, NULL),
(4171, 126, 'Xã Bó Sinh', 'Xã', NULL, NULL),
(4174, 126, 'Xã Pú Pẩu', 'Xã', NULL, NULL),
(4177, 126, 'Xã Chiềng Phung', 'Xã', NULL, NULL),
(4180, 126, 'Xã Chiềng En', 'Xã', NULL, NULL),
(4183, 126, 'Xã Mường Lầm', 'Xã', NULL, NULL),
(4186, 126, 'Xã Nậm Ty', 'Xã', NULL, NULL),
(4189, 126, 'Xã Đứa Mòn', 'Xã', NULL, NULL),
(4192, 126, 'Xã Yên Hưng', 'Xã', NULL, NULL),
(4195, 126, 'Xã Chiềng Sơ', 'Xã', NULL, NULL),
(4198, 126, 'Xã Nà Ngựu', 'Xã', NULL, NULL),
(4201, 126, 'Xã Nậm Mằn', 'Xã', NULL, NULL),
(4204, 126, 'Xã Chiềng Khoong', 'Xã', NULL, NULL),
(4207, 126, 'Xã Chiềng Cang', 'Xã', NULL, NULL),
(4210, 126, 'Xã Huổi Một', 'Xã', NULL, NULL),
(4213, 126, 'Xã Mường Sai', 'Xã', NULL, NULL),
(4216, 126, 'Xã Mường Cai', 'Xã', NULL, NULL),
(4219, 126, 'Xã Mường Hung', 'Xã', NULL, NULL),
(4222, 126, 'Xã Chiềng Khương', 'Xã', NULL, NULL),
(4225, 127, 'Xã Sam Kha', 'Xã', NULL, NULL),
(4228, 127, 'Xã Púng Bánh', 'Xã', NULL, NULL),
(4231, 127, 'Xã Xốp Cộp', 'Xã', NULL, NULL),
(4234, 127, 'Xã Dồm Cang', 'Xã', NULL, NULL),
(4237, 127, 'Xã Nậm Lạnh', 'Xã', NULL, NULL),
(4240, 127, 'Xã Mường Lèo', 'Xã', NULL, NULL),
(4243, 127, 'Xã Mường Và', 'Xã', NULL, NULL),
(4246, 127, 'Xã Mường Lạn', 'Xã', NULL, NULL),
(4249, 132, 'Phường Yên Thịnh', 'Phường', NULL, NULL),
(4252, 132, 'Phường Yên Ninh', 'Phường', NULL, NULL),
(4255, 132, 'Phường Minh Tân', 'Phường', NULL, NULL),
(4258, 132, 'Phường Nguyễn Thái Học', 'Phường', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feeships`
--
ALTER TABLE `feeships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matp` (`matp`),
  ADD KEY `maqh` (`maqh`),
  ADD KEY `maxptr` (`maxptr`);

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
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `shipping_id` (`shipping_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Chỉ mục cho bảng `vn_quanhuyen`
--
ALTER TABLE `vn_quanhuyen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matp` (`matp`);

--
-- Chỉ mục cho bảng `vn_tinhthanhpho`
--
ALTER TABLE `vn_tinhthanhpho`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vn_xaphuongthitran`
--
ALTER TABLE `vn_xaphuongthitran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maqh` (`maqh`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `feeships`
--
ALTER TABLE `feeships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `vn_quanhuyen`
--
ALTER TABLE `vn_quanhuyen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=974;

--
-- AUTO_INCREMENT cho bảng `vn_tinhthanhpho`
--
ALTER TABLE `vn_tinhthanhpho`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng `vn_xaphuongthitran`
--
ALTER TABLE `vn_xaphuongthitran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4259;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `feeships`
--
ALTER TABLE `feeships`
  ADD CONSTRAINT `feeships_ibfk_1` FOREIGN KEY (`matp`) REFERENCES `vn_tinhthanhpho` (`id`),
  ADD CONSTRAINT `feeships_ibfk_2` FOREIGN KEY (`maqh`) REFERENCES `vn_quanhuyen` (`id`),
  ADD CONSTRAINT `feeships_ibfk_3` FOREIGN KEY (`maxptr`) REFERENCES `vn_xaphuongthitran` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`shipping_id`) REFERENCES `shippings` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`);

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  ADD CONSTRAINT `product_tags_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Các ràng buộc cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `sellers_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Các ràng buộc cho bảng `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Các ràng buộc cho bảng `socials`
--
ALTER TABLE `socials`
  ADD CONSTRAINT `socials_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Các ràng buộc cho bảng `vn_quanhuyen`
--
ALTER TABLE `vn_quanhuyen`
  ADD CONSTRAINT `vn_quanhuyen_ibfk_1` FOREIGN KEY (`matp`) REFERENCES `vn_tinhthanhpho` (`id`);

--
-- Các ràng buộc cho bảng `vn_xaphuongthitran`
--
ALTER TABLE `vn_xaphuongthitran`
  ADD CONSTRAINT `vn_xaphuongthitran_ibfk_1` FOREIGN KEY (`maqh`) REFERENCES `vn_quanhuyen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

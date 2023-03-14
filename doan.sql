-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 14, 2023 lúc 11:13 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT 1,
  `parent_id` int(11) DEFAULT NULL,
  `orders` int(11) DEFAULT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `level`, `parent_id`, `orders`, `trash`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(3, 'Apple', 'apple', 1, NULL, NULL, 1, 1, '2023-02-23 21:12:28', '2023-02-26 20:57:35', 12, 12, NULL),
(4, 'Điện thoại', 'dien-thoai', 1, NULL, NULL, 1, 0, '2023-02-24 03:08:35', '2023-02-24 03:08:35', 12, NULL, NULL),
(5, 'SamSung', 'samsung', 2, 4, NULL, 1, 1, '2023-02-24 03:12:53', '2023-02-24 03:12:53', 12, NULL, NULL),
(6, 'Laptop', 'laptop', 3, 4, NULL, 1, 1, '2023-02-26 20:57:26', '2023-02-26 20:57:26', 12, NULL, NULL),
(7, 'Phụ kiện', 'phu-kien', 1, 0, NULL, 1, 1, '2023-03-09 00:03:33', '2023-03-09 00:03:33', 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introtext` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fulltext` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `name`, `email`, `password`, `phone`, `address`, `img`, `trash`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ducnguyen', 'binh', 'binhnguyenluu124@gmail.com', '$2y$10$B6dNOjDg3DQXt3Mtu.kBf.c/udtzmKtnDsK6MhK/0pb3ZTH3pH9KK', '0356595951', NULL, NULL, 1, 1, '2023-03-13 00:16:45', '2023-03-13 00:16:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `limit_number` int(11) NOT NULL,
  `number_used` int(11) NOT NULL DEFAULT 0,
  `expiration_date` date NOT NULL,
  `payment_limit` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` bigint(20) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `discounts`
--

INSERT INTO `discounts` (`id`, `code`, `discount`, `limit_number`, `number_used`, `expiration_date`, `payment_limit`, `description`, `order_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 'HAIPHONG', 14000, 32, 0, '2023-03-17', 200000, 'ha n', 1, 1, '2023-03-13 21:56:43', '2023-03-14 01:07:19'),
(3, 'HANOI', 200000, 100, 0, '2023-03-18', 1000000, 'mã 200000', 1, 1, '2023-03-13 21:58:53', '2023-03-13 21:58:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_07_084042_create_roles_table', 1),
(6, '2022_12_07_084110_add_field_to_users_table', 1),
(7, '2022_12_08_042351_create_sliders_table', 1),
(8, '2022_12_08_042707_create_customers_table', 1),
(9, '2022_12_08_042722_create_categories_table', 1),
(10, '2022_12_08_042809_create_provinces_table', 1),
(11, '2022_12_08_042831_create_producers_table', 1),
(12, '2022_12_08_042901_create_products_table', 1),
(13, '2022_12_08_042923_create_districts_table', 1),
(14, '2022_12_08_042947_create_orders_table', 1),
(15, '2022_12_08_043011_create_discounts_table', 1),
(16, '2022_12_08_043033_create_contents_table', 1),
(17, '2022_12_08_043048_create_contacts_table', 1),
(18, '2022_12_09_064618_add_field_sliders_table', 1),
(19, '2023_02_19_110335_create_order_product_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `order_date` datetime NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `money` int(11) NOT NULL,
  `price_ship` int(11) NOT NULL,
  `coupon` int(11) NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `trash` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `producers`
--

CREATE TABLE `producers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `producers`
--

INSERT INTO `producers` (`id`, `name`, `code`, `keyword`, `trash`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(2, 'Hai Bà Trưng', 'HBT', 'maytinh,laban', 1, 0, '2023-02-26 23:39:36', '2023-02-26 23:51:05', 12, 12, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sortDesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `producer_id` bigint(20) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL,
  `number_buy` int(11) NOT NULL DEFAULT 0,
  `sale` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `price_sale` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `alias`, `avatar`, `img`, `sortDesc`, `detail`, `producer_id`, `number`, `number_buy`, `sale`, `price`, `price_sale`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 'SamSung', 4, 'samsung', '1677490952_wp.png', 'test_send_date.png#write_date.png#send_after_date.png#send_notification_for_user_use_stamp.png', 'SAM SUNG', '<h2>Đặc điểm loa Bluetooth Xiaomi Mi Basic 2 Ch&iacute;nh h&atilde;ng</h2>\r\n\r\n<p>Như truyền thống của thương hiệu,&nbsp;<strong>loa Bluetooth Xiaomi Mi Basic 2</strong>&nbsp;được b&aacute;n với mức gi&aacute; hấp dẫn m&agrave; chất lượng kh&ocirc;ng hề thua k&eacute;m nhiều sản phẩm gi&aacute; c&oacute; gi&aacute; cao hơn.&nbsp;<a href=\"https://cellphones.com.vn/thiet-bi-am-thanh/loa/xiaomi.html\" target=\"_blank\">Loa Xiaomi</a>&nbsp;l&agrave; sự lựa chọn l&yacute; tưởng với những người d&ugrave;ng muốn &ldquo;đổi gi&oacute;&rdquo; khi nghe nhạc d&ugrave; điều kiện t&agrave;i ch&iacute;nh hạn chế.</p>\r\n\r\n<p><strong>Loa Xiaomi Mi Basic 2</strong>&nbsp;c&oacute; k&iacute;ch thước vừa phải v&agrave; trọng lượng nhẹ, thuận tiện để người d&ugrave;ng mang theo tr&ecirc;n tay hay bỏ v&agrave;o ba l&ocirc;, t&uacute;i x&aacute;ch. B&ecirc;n cạnh đ&oacute;, loa sở hữu phần khung nh&ocirc;m v&agrave; c&aacute;c cạnh v&aacute;t được ho&agrave;n thiện tinh tế, tất cả pha trộn lại với nhau một c&aacute;ch ho&agrave;n hảo tạo n&ecirc;n vẻ đẹp đầy phong c&aacute;ch cho sản phẩm.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"/DO-AN-TN-2019/public/upload/images/Loa-Bluetooth-Xiaomi-Mi-Basic-2-Chinh-hang-4.jpg\" /></p>\r\n\r\n<p><strong>Loa Xiaomi Mi Basic 2</strong>&nbsp;c&oacute; k&iacute;ch thước vừa phải v&agrave; trọng lượng nhẹ, thuận tiện để người d&ugrave;ng mang theo tr&ecirc;n tay hay bỏ v&agrave;o ba l&ocirc;, t&uacute;i x&aacute;ch. B&ecirc;n cạnh đ&oacute;, loa sở hữu phần khung nh&ocirc;m v&agrave; c&aacute;c cạnh v&aacute;t được ho&agrave;n thiện tinh tế, tất cả pha trộn lại với nhau một c&aacute;ch ho&agrave;n hảo tạo n&ecirc;n vẻ đẹp đầy phong c&aacute;ch cho sản phẩm.</p>\r\n\r\n<p><img alt=\"\" src=\"/DO-AN-TN-2019/public/upload/images/Loa-Bluetooth-Xiaomi-Mi-Basic-2-Chinh-hang-2.jpg\" /></p>\r\n\r\n<h3>Loa Bluetooth Xiaomi Mi Basic 2 t&iacute;ch hợp micro</h3>\r\n\r\n<p>Với micro t&iacute;ch hợp,&nbsp;<strong><a href=\"https://cellphones.com.vn/loa-bluetooth-xiaomi-mi-basic-2-chinh-hang.html\" target=\"_self\">loa Xiaomi Mi Basic 2 ch&iacute;nh h&atilde;ng</a></strong>&nbsp;gi&uacute;p người d&ugrave;ng dễ d&agrave;ng trả lời cuộc gọi đến m&agrave; kh&ocirc;ng cần d&ugrave;ng điện thoại. Thay v&agrave;o đ&oacute;, bạn chỉ cần nhấn ph&iacute;m nguồn tr&ecirc;n loa, giữ đ&ocirc;i tay rảnh rang để l&agrave;m nhiều việc kh&aacute;c trong l&uacute;c tr&ograve; chuyện như xem tin tức, lau ch&ugrave;i b&agrave;n ghế...</p>\r\n\r\n<p><img alt=\"\" src=\"/DO-AN-TN-2019/public/upload/images/Loa-Bluetooth-Xiaomi-Mi-Basic-2-Chinh-hang-3.jpg\" /></p>\r\n\r\n<h3>Thời lượng pin loa Bluetooth Xiaomi Mi Basic 2 rất ấn tượng</h3>\r\n\r\n<p>Với vi&ecirc;n pin lithium polymer cho 10 giờ ph&aacute;t nhạc li&ecirc;n tục,&nbsp;<strong>loa di động Xiaomi Mi Basic 2</strong>&nbsp;cung cấp thời lượng pin tuyệt vời để người d&ugrave;ng thoải m&aacute;i nghe nhạc giải tr&iacute; c&aacute; nh&acirc;n hoặc tổ chức những cuộc vui chơi c&ugrave;ng người th&acirc;n v&agrave; bạn b&egrave; trong cả ng&agrave;y m&agrave; kh&ocirc;ng phải lo lắng về việc sạc pin.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"left:40.9659px; top:24px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 2, 1, 0, 3, 3232, 323232, 1, '2023-02-27 02:42:32', '2023-02-27 02:42:32', 12, NULL, NULL),
(2, 'Samsung Galaxy S10 White', 5, 'samsung-galaxy-s10-white', '1677491825_samsung-galaxy-a50-black-9(1).jpg', 'Loa-Bluetooth-Xiaomi-Mi-Basic-2-Chinh-hang-4.jpg#samsung-galaxy-a50-black-9(1).jpg#samsung-galaxy-a50-black-9.jpg', 'Điện thoại Samsung Galaxy S10 - Cập nhật thông tin cấu hình, giá bán, chương trình khuyến mãi', '<p><em>Sự kiện Samsung Unpacked 2019 đ&atilde; kh&eacute;p lại với th&agrave;nh c&ocirc;ng kh&ocirc;ng thể tuyệt vời hơn, ch&iacute;nh l&agrave; biết thế hệ S thứ 10 của m&igrave;nh th&agrave;nh t&acirc;m điểm, chiếm s&oacute;ng to&agrave;n bộ spotlight của Đại hội MWC 2019. Thực sự, Samsung Galaxy S10 kh&ocirc;ng hẳn l&agrave; bản n&acirc;ng cấp ho&agrave;n hảo về mọi mặt nhưng n&oacute; hội tụ đủ, đ&uacute;ng những yếu tố cần thiết để người d&ugrave;ng cả thấy kh&ocirc;ng nh&agrave;m ch&aacute;n v&agrave; h&agrave;o hứng muốn sở hữu. Samsung Galaxy S10 cũng ch&iacute;nh l&agrave; bước s&atilde;i ch&acirc;n xa bắt kịp với c&aacute;c đối thủ song vẫn chứng minh ng&ocirc;i vương của bản th&acirc;n sau một năm nhạt nh&ograve;a.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>Thiết kế đỉnh cao &ndash; điểm nhấn m&agrave;n h&igrave;nh &ldquo;nốt ruồi&rdquo;</strong></h3>\r\n\r\n<p>C&ocirc;ng nghệ Infinity O đ&atilde; được Samsung c&ocirc;ng bố v&agrave; ứng dụng tr&ecirc;n c&aacute;c smartphone tầm trung của m&igrave;nh. Tuy kh&ocirc;ng c&ograve;n qu&aacute; xa lạ nhưng với ph&acirc;n kh&uacute;c cao cấp đ&acirc;y l&agrave; một sự mới mẻ b&ecirc;n cạnh một rừng tai thỏ đủ thế loại. Tấm nền hiển thị tr&ecirc;n S10 cũng đ&atilde; được n&acirc;ng cấp, v&agrave; giờ đ&acirc;y sau bao nhi&ecirc;u năng gắn b&oacute; với Super AMOLED, Samsung gọi c&ocirc;ng nghệ mới của m&igrave;nh l&agrave; Dynamic AMOLED. Samsung Galaxy S10 c&oacute; độ ph&acirc;n giải m&agrave;n h&igrave;nh Quad HD+ với tỷ lệ 19:9 mới, điều đặt biệt l&agrave; độ s&aacute;ng của tấm nền mới l&ecirc;n đến 1200nits đạt chuẩn HDR10 v&agrave; HDR10+ đầu ti&ecirc;n tr&ecirc;n thiết bị duy động. Kh&ocirc;ng những thế Samsung Galaxy S10 c&ograve;n được c&ocirc;ng nhận đạt 100% chuẩn m&agrave;u điện ảnh DCI-P3 v&agrave; độ tương phản khủng khiếp 2.000.000:1. Hiển thị tr&ecirc;n Galaxy S10 kh&ocirc;ng c&oacute; g&igrave; để c&oacute; thể ph&agrave;n n&agrave;n bất kể mục đ&iacute;ch sử dụng, điều kiện m&ocirc;i trường.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cellphones.com.vn/media/wysiwyg/mobile/samsung/samsung-galaxy-s10.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Vẫn l&agrave; triết l&yacute; thiết kế quen thuộc của Samsung từ 2016, kim loại c&ugrave;ng với 2 mặt k&iacute;nh cong nhưng tr&igrave;nh độ ho&agrave;n thiện của Samsung Galaxy S10 đ&atilde; đạt đến tr&igrave;nh độ tuyệt hảo đến từng chi tiết nhỏ. M&agrave;u sắc cũng l&agrave; điểm thu h&uacute;t của c&aacute;c series S10 vẫn bắt kịp xung hướng Gradient nhưng c&aacute;ch l&agrave;m của Samsung v&ocirc; c&ugrave;ng tinh tế v&agrave; nhẹ nh&agrave;ng d&ugrave; l&agrave; chuyển m&agrave;u nhưng vẫn giữ t&ocirc;ng m&agrave;u ch&iacute;nh chủ đạo kh&ocirc;ng kề qu&aacute; rực, qu&aacute; chỏi nhau. Khung viền được đ&aacute;nh b&oacute;ng, c&ugrave;ng với mặt trước một m&agrave;u đen tạo cho viền c&oacute; cảm đ&atilde; mỏng lại c&agrave;ng mỏng hơn. Cụm ba camera sau đặt ngang hơi hướng của Note 8, kh&ocirc;ng c&ograve;n cảm biến v&acirc;n tay b&agrave;n chạm nữa n&ecirc;n mặt lưng trong gọn g&agrave;n c&acirc;n đối. Cạnh tr&ecirc;n l&agrave; khe sim + thẻ nhớ, dưới vẫn l&agrave; cổng 3.5mm + cổng sạc type-C + loa ngo&agrave;i, ph&iacute;m &acirc;m lượng + ph&iacute;m Bixby vẫn b&ecirc;n tr&aacute;i, b&ecirc;n phải l&agrave; ph&iacute;m nguồn.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cellphones.com.vn/media/wysiwyg/mobile/samsung/s10_-_m_t_sau.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tuy được đ&aacute;nh gi&aacute; cao về thiết kế song Samsung Galaxy S10 vẫn vấp phải nhưng tranh c&atilde;i về mặt thiết kế. Về ph&iacute;m nguồn đặt qu&aacute; cao, g&acirc;y thay t&aacute;c cho những người c&oacute; b&agrave;n tay nhỏ kh&oacute; khăn hơn. Hay kịch liệt hơn ch&iacute;nh l&agrave; c&ocirc;ng nghệ Infinity - O, phần nhỏ người d&ugrave;ng kh&ocirc;ng chấp nhận với việc m&agrave;n h&igrave;nh bị 1 lỗ đen ngứa mắt, cản trở hiển thị, phần c&ograve;n lại th&igrave; chấp nhận v&igrave; giới hạn c&ocirc;ng nghệ cũng như thấy b&igrave;nh thường v&igrave; kh&ocirc;ng ản hưởng qu&aacute; nhiều đến khả năng sử dụng hay hiển thị. Rồi ngay cả c&ocirc;ng nghệ mới v&acirc;n tay si&ecirc;u &acirc;m cũng bị ch&ecirc; tr&aacute;ch l&agrave; qu&aacute; chậm, kh&ocirc;ng thể d&aacute;m m&agrave;n h&igrave;nh&hellip; Nhưng tất cả những điều tr&ecirc;n đều kh&ocirc;ng thể phủ nhận l&agrave; Samsung Galaxy S10 gần như tiệm cận đến sự ho&agrave;n hảo.</p>\r\n\r\n<h3><strong>Bộ vi xử l&yacute; mới ho&agrave;n to&agrave;n, dung lượng pin cao chưa từng c&oacute;</strong></h3>\r\n\r\n<p>Ở thị trường Việt Nam, Samsung trang bị con chip &ldquo;nh&agrave; l&agrave;m&rdquo; Exynos 9820 Octa-core, tiến tr&igrave;nh 8nm mới nhất, 3 cụm nh&acirc;n phối hợp với nhau gồm 2xCustomCPU(M4), 2xCortexA75 v&agrave; 4xCortexA55 cho ph&eacute;p xung nhịp tối đa l&ecirc;n đến 2.7Hz. Về GPU th&igrave; Galaxy S10 trang bị Mali G76MP12 tăng đến 40% so với GPU đang trang bị tr&ecirc;n S9. Hỗ trợ chuẩn RAM cao nhất 4x 16-bit CHLPDDR4x l&ecirc;n đến 12GB, Exynos 9820 hổ trợ USF3.0 nhanh gấp 2 lần chuẩn 2.1 (2.9GHz). B&ecirc;n cạnh đ&oacute; tr&ecirc;n Exynos 9820 c&ograve;n được trang bị 2 nh&acirc;n NPU ri&ecirc;ng biệt hổ trợ c&aacute;c t&iacute;nh năng AI t&iacute;ch hợp v&agrave; d&ugrave;ng AI để do lường ch&iacute;nh x&aacute;c c&oacute; tiến tr&igrave;nh tr&ecirc;n m&aacute;y ph&acirc;n bổ t&agrave;i nguy&ecirc;n m&aacute;y, c&ograve;n c&oacute; c&aacute;c khu vực d&agrave;nh ri&ecirc;ng cho bảo mật, xử l&iacute; h&igrave;nh ảnh&hellip; Theo l&iacute; thuyết th&igrave; năng lực xử l&yacute; của 9820 cao hơn 20% so với 9810 v&agrave; tiết kiệm pin hơn 40%.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cellphones.com.vn/media/wysiwyg/mobile/samsung/samsung-galaxy-s10-cau-hinh.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dung lượng pin cũng l&agrave; thứ được Samsung nhấn mạnh cho S10, với vi&ecirc;n pin 4100mAh lớn nhất trong c&aacute;c flagship Samsung hiện tại cho ph&eacute;p d&ugrave;ng trong cả ng&agrave;y d&agrave;i, thậm ch&iacute; sạc ngược cho thiết bị kh&aacute;c bằng t&iacute;nh năng Wireless Powershare mới. Đ&acirc;y cũng l&agrave; lần đầy ti&ecirc;n, Samsung n&acirc;ng tốc độ sạc sau vụ việc Note7, từ 18watt l&ecirc;n 25watt kh&aacute; d&egrave; dặt nhưng vẫn l&agrave;m ấm l&ograve;ng người sử dụng khi m&agrave; Samsung đ&atilde; ở qu&aacute; l&acirc;u với chuẩn Quick Charge 2.0.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cellphones.com.vn/media/wysiwyg/mobile/samsung/Screenshot_5.jpg\" /></p>\r\n\r\n<p>Với cấu h&igrave;nh mạnh mẻ hiện tại cũng dung lượng pin thoải m&aacute;i, Galaxy S10 hầu như c&oacute; thẻ g&aacute;nh mọi t&aacute;c vụ nặng nề nhất tr&ecirc;n Android b&acirc;y giờ như chỉnh sửa h&igrave;nh ảnh, l&agrave;m video, t&aacute;c vụ AR, chơi c&aacute;c game khủng nhất tr&ecirc;n CH Play m&agrave; kh&ocirc;ng lo lắng t&igrave;nh trạng chậm, giật lag&hellip;</p>\r\n\r\n<h3><strong>Gia nhập hội flagship ba camera sau &ldquo;chậm nhưng chắc&rdquo;</strong></h3>\r\n\r\n<p>Thiếu s&oacute;t nếu kh&ocirc;ng đề cập đến những n&acirc;ng cấp s&aacute;ng gi&aacute; tr&ecirc;n bộ 3 camera tr&ecirc;n Galaxy S10. Ngo&agrave;i ống k&iacute;nh ch&iacute;nh f1.5-2.4 c&oacute; Dualpixel v&agrave; lấy n&eacute;t theo pha, c&ugrave;ng ống tele 2x f2.4 th&igrave; t&ecirc;n S10 c&ograve;n c&oacute; th&ecirc;m 1 mắt si&ecirc;u rộng l&ecirc;n đến 123 độ f2.2 Điểm được Samsung nhấn mạnh nhất năm nay tr&ecirc;n bộ ba camera ch&iacute;nh l&agrave; chất lượng video khi m&agrave;n được trang bị th&ecirc;m t&iacute;nh năng Steady Shot khiến cho khả năng chống rung tuyệt vời hơn. B&ecirc;n cạnh đ&oacute; sau, c&oacute; v&agrave;i sự thay đổi ch&iacute;nh l&agrave; t&iacute;nh năng x&oacute;a ph&ocirc;ng đ&atilde; được Samsung chuyển từ cam tele về cam ch&iacute;nh. Vừa c&oacute; lợi cũng vừa c&oacute; hại, ảnh từ cam ch&iacute;nh cho ra m&agrave;u sắc chi tiết hay độ s&aacute;ng đều nhỉnh hơn cam tele, g&oacute;c cũng rộng hơn nhưng b&ugrave; lại khi muốn lấy được gần chủ thể phải zoom bằng ch&acirc;n, v&agrave; khả năng t&aacute;ch nền tạo bokeh đều bằng phần mềm n&ecirc;n sẽ c&oacute; đ&ocirc;i ch&uacute;t kh&aacute;c biệt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cellphones.com.vn/media/wysiwyg/mobile/samsung/Screenshot_4.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Năm nay d&atilde;y nhạy s&aacute;ng cũng ch&iacute;nh l&agrave; một trong những sự cả tiến lớn. Khi m&agrave; cả cam trước lẫn cam sau đều phải gọi l&agrave; xuất sắc khi chụp c&aacute;c bức ngược s&aacute;ng, hay gần nguồn s&aacute;ng mạnh. N&oacute;i về camera trước, sự quay lại của lấy n&eacute;t tự động v&agrave; bổ sung th&ecirc;m g&oacute;c chụp rộng hơn l&agrave;m cho c&aacute;c t&ugrave;y chọn selfie phong ph&uacute; v&agrave; chuy&ecirc;n nghiệp hơn. M&agrave;u da v&agrave; c&aacute;c chi tiết đều được giữ lại nhiều hơn, do độ ph&acirc;n giải được n&acirc;ng l&ecirc;n từ 8MP l&ecirc;n 10MP.</p>\r\n\r\n<h3><strong>Giao diện mới OneUI hiện đại, hổ trợ tốt m&agrave;n h&igrave;nh d&agrave;i</strong></h3>\r\n\r\n<p>C&oacute; qu&aacute; nhiều b&agrave;i đ&aacute;nh gi&aacute; trải nghiệm OneUI kể từ khi S10 chưa xuất hiện, hầu như giao diện được trang bị tr&ecirc;n S10 sẽ kh&ocirc;ng kh&aacute;c qu&aacute; nhiều tr&ecirc;n S9 hay Note9 được cập nhật. OneUI được khen nức nở bởi t&iacute;nh tiện dụng c&ugrave;ng với những thay đổi th&acirc;n thiện hơn với người d&ugrave;ng, c&aacute;c t&iacute;nh năng như Darkmode hay điều khiển cử chỉ đều được trang bị ngo&agrave;i ra nhưng thay đổi nhỏ về c&aacute;ch sắp xếp hiện thị cũng ghi điểm c&ocirc;ng cho OneUI trong mắt người ti&ecirc;u d&ugrave;ng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cellphones.com.vn/media/wysiwyg/mobile/samsung/s10_-_OneUI.jpg\" /></p>\r\n\r\n<p>Tuy nhi&ecirc;n v&agrave;i vấn đề tr&ecirc;n OneUI ch&iacute;nh l&agrave; bộ Icon mới trong hoạt h&igrave;nh v&agrave; k&eacute;m sang hẳn so với giao diện cũ. V&agrave; c&aacute;ch điều hướng cử chỉ tr&ecirc;n OneUI kh&aacute; l&agrave; ngu, chả mấy tuận tiện cho người d&ugrave;ng.</p>\r\n\r\n<h3><strong>C&aacute;c t&iacute;nh năng mới được trang bị tr&ecirc;n Galaxy S10</strong></h3>\r\n\r\n<p>Phải kể đến t&iacute;nh năng được Samsung nhấn kh&aacute; s&acirc;u v&agrave; mạnh tr&ecirc;n S10 ch&iacute;nh l&agrave; t&iacute;nh năng sạc ngược Wireless Powershare. Thực tế đ&acirc;y kh&ocirc;ng phải l&agrave; t&iacute;nh năng mới do Samsung nghĩ ra, nhưng trước đ&oacute; với Huawei chưa bao giờ biến t&iacute;nh năng n&agrave;y trở n&ecirc;n hữu &iacute;ch, bởi mang t&iacute;nh tr&igrave;nh diễn nhiều hơn l&agrave; tiện &iacute;ch. Tuy nhi&ecirc;n với hệ sinh th&aacute;i Galaxy, như tai nghe Galaxy Bubs hay đồng hồ Galaxy Watch, Samsung sẽ gi&uacute;p t&iacute;nh năng n&agrave;y c&oacute; nhiều đất diễn hơn.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cellphones.com.vn/media/wysiwyg/mobile/samsung/Samsung-galaxy-s10-plus-chinh-hang-8.jpg\" /></p>\r\n\r\n<p>Một t&iacute;nh năng được xem l&agrave; điểm nhấn của S10 ch&iacute;nh l&agrave; cảm biến v&acirc;n tay si&ecirc;u &acirc;m 3D. đ&acirc;y cũng kh&ocirc;ng phải l&agrave; t&iacute;nh năng mới bởi n&oacute; đ&atilde; được Qualcomm nghi&ecirc;n cứu v&agrave; giới thiệu từ l&acirc;u, nhưng phải đến gần đ&acirc;y khi vị tr&iacute; của n&oacute; được đưa xuống dưới m&agrave;n h&igrave;nh th&igrave; mới được xem l&agrave; t&iacute;nh năng mới, v&agrave; Samsung l&agrave; nh&agrave; sản xuất đầu ti&ecirc;n d&ugrave;ng t&iacute;nh năng n&agrave;y. Cơ chế hoạt độ bằng s&oacute;ng &acirc;m vẻ bản đồ 3D v&acirc;n tay, ch&iacute;nh đến từng nm nếu so với c&ocirc;ng nghệ nhận diện Gương mặt th&igrave; đ&acirc;y ch&iacute;nh l&agrave; FaceID của Apple v&igrave; n&oacute; d&ugrave;ng h&igrave;nh ảnh 3D của sinh trắc học chứ kh&ocirc;ng pahir l&agrave; ảnh 2D th&ocirc;ng thường. T&iacute;nh năng tương lai n&agrave;y cho ph&eacute;p sử dụng cả khi ng&oacute;n tay bị d&iacute;nh nước, dầu, lotion&hellip; nhưng lại cự tuyệt d&aacute;n cường lực hay miếng d&aacute;n th&ocirc;ng thường. Trong tương lai Samsung sẽ chắc chắn cho ra mắt những miếng d&aacute;n hỗ trợ c&ocirc;ng nghệ n&agrave;y vừa d&ugrave;ng được v&acirc;n tay, vừa bảo vệ điện thoại khỏi trầy xướt.</p>', 2, 10, 0, 20, 20900000, 15400000, 1, '2023-02-27 02:57:05', '2023-02-27 02:57:05', 12, NULL, NULL),
(3, 'Samsung Galaxy S10 White', 5, 'samsung-galaxy-s10-white', '1678345036_4c7c90edfdbfb0767a20354a57343806.jpg', '#94052556ebb0823797ce33fe011877f9.jpg#636483223586024189_2.jpg#636483223586180190_1.jpg', 'Điện thoại Samsung Galaxy S10 - Cập nhật thông tin cấu hình, giá bán, chương trình khuyến mãi', '<p><em>Sự kiện Samsung Unpacked 2019 đ&atilde; kh&eacute;p lại với th&agrave;nh c&ocirc;ng kh&ocirc;ng thể tuyệt vời hơn, ch&iacute;nh l&agrave; biết thế hệ S thứ 10 của m&igrave;nh th&agrave;nh t&acirc;m điểm, chiếm s&oacute;ng to&agrave;n bộ spotlight của Đại hội MWC 2019. Thực sự, Samsung Galaxy S10 kh&ocirc;ng hẳn l&agrave; bản n&acirc;ng cấp ho&agrave;n hảo về mọi mặt nhưng n&oacute; hội tụ đủ, đ&uacute;ng những yếu tố cần thiết để người d&ugrave;ng cả thấy kh&ocirc;ng nh&agrave;m ch&aacute;n v&agrave; h&agrave;o hứng muốn sở hữu. Samsung Galaxy S10 cũng ch&iacute;nh l&agrave; bước s&atilde;i ch&acirc;n xa bắt kịp với c&aacute;c đối thủ song vẫn chứng minh ng&ocirc;i vương của bản th&acirc;n sau một năm nhạt nh&ograve;a.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>Thiết kế đỉnh cao &ndash; điểm nhấn m&agrave;n h&igrave;nh &ldquo;nốt ruồi&rdquo;</strong></h3>\r\n\r\n<p>C&ocirc;ng nghệ Infinity O đ&atilde; được Samsung c&ocirc;ng bố v&agrave; ứng dụng tr&ecirc;n c&aacute;c smartphone tầm trung của m&igrave;nh. Tuy kh&ocirc;ng c&ograve;n qu&aacute; xa lạ nhưng với ph&acirc;n kh&uacute;c cao cấp đ&acirc;y l&agrave; một sự mới mẻ b&ecirc;n cạnh một rừng tai thỏ đủ thế loại. Tấm nền hiển thị tr&ecirc;n S10 cũng đ&atilde; được n&acirc;ng cấp, v&agrave; giờ đ&acirc;y sau bao nhi&ecirc;u năng gắn b&oacute; với Super AMOLED, Samsung gọi c&ocirc;ng nghệ mới của m&igrave;nh l&agrave; Dynamic AMOLED. Samsung Galaxy S10 c&oacute; độ ph&acirc;n giải m&agrave;n h&igrave;nh Quad HD+ với tỷ lệ 19:9 mới, điều đặt biệt l&agrave; độ s&aacute;ng của tấm nền mới l&ecirc;n đến 1200nits đạt chuẩn HDR10 v&agrave; HDR10+ đầu ti&ecirc;n tr&ecirc;n thiết bị duy động. Kh&ocirc;ng những thế Samsung Galaxy S10 c&ograve;n được c&ocirc;ng nhận đạt 100% chuẩn m&agrave;u điện ảnh DCI-P3 v&agrave; độ tương phản khủng khiếp 2.000.000:1. Hiển thị tr&ecirc;n Galaxy S10 kh&ocirc;ng c&oacute; g&igrave; để c&oacute; thể ph&agrave;n n&agrave;n bất kể mục đ&iacute;ch sử dụng, điều kiện m&ocirc;i trường.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cellphones.com.vn/media/wysiwyg/mobile/samsung/samsung-galaxy-s10.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Vẫn l&agrave; triết l&yacute; thiết kế quen thuộc của Samsung từ 2016, kim loại c&ugrave;ng với 2 mặt k&iacute;nh cong nhưng tr&igrave;nh độ ho&agrave;n thiện của Samsung Galaxy S10 đ&atilde; đạt đến tr&igrave;nh độ tuyệt hảo đến từng chi tiết nhỏ. M&agrave;u sắc cũng l&agrave; điểm thu h&uacute;t của c&aacute;c series S10 vẫn bắt kịp xung hướng Gradient nhưng c&aacute;ch l&agrave;m của Samsung v&ocirc; c&ugrave;ng tinh tế v&agrave; nhẹ nh&agrave;ng d&ugrave; l&agrave; chuyển m&agrave;u nhưng vẫn giữ t&ocirc;ng m&agrave;u ch&iacute;nh chủ đạo kh&ocirc;ng kề qu&aacute; rực, qu&aacute; chỏi nhau. Khung viền được đ&aacute;nh b&oacute;ng, c&ugrave;ng với mặt trước một m&agrave;u đen tạo cho viền c&oacute; cảm đ&atilde; mỏng lại c&agrave;ng mỏng hơn. Cụm ba camera sau đặt ngang hơi hướng của Note 8, kh&ocirc;ng c&ograve;n cảm biến v&acirc;n tay b&agrave;n chạm nữa n&ecirc;n mặt lưng trong gọn g&agrave;n c&acirc;n đối. Cạnh tr&ecirc;n l&agrave; khe sim + thẻ nhớ, dưới vẫn l&agrave; cổng 3.5mm + cổng sạc type-C + loa ngo&agrave;i, ph&iacute;m &acirc;m lượng + ph&iacute;m Bixby vẫn b&ecirc;n tr&aacute;i, b&ecirc;n phải l&agrave; ph&iacute;m nguồn.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cellphones.com.vn/media/wysiwyg/mobile/samsung/s10_-_m_t_sau.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tuy được đ&aacute;nh gi&aacute; cao về thiết kế song Samsung Galaxy S10 vẫn vấp phải nhưng tranh c&atilde;i về mặt thiết kế. Về ph&iacute;m nguồn đặt qu&aacute; cao, g&acirc;y thay t&aacute;c cho những người c&oacute; b&agrave;n tay nhỏ kh&oacute; khăn hơn. Hay kịch liệt hơn ch&iacute;nh l&agrave; c&ocirc;ng nghệ Infinity - O, phần nhỏ người d&ugrave;ng kh&ocirc;ng chấp nhận với việc m&agrave;n h&igrave;nh bị 1 lỗ đen ngứa mắt, cản trở hiển thị, phần c&ograve;n lại th&igrave; chấp nhận v&igrave; giới hạn c&ocirc;ng nghệ cũng như thấy b&igrave;nh thường v&igrave; kh&ocirc;ng ản hưởng qu&aacute; nhiều đến khả năng sử dụng hay hiển thị. Rồi ngay cả c&ocirc;ng nghệ mới v&acirc;n tay si&ecirc;u &acirc;m cũng bị ch&ecirc; tr&aacute;ch l&agrave; qu&aacute; chậm, kh&ocirc;ng thể d&aacute;m m&agrave;n h&igrave;nh&hellip; Nhưng tất cả những điều tr&ecirc;n đều kh&ocirc;ng thể phủ nhận l&agrave; Samsung Galaxy S10 gần như tiệm cận đến sự ho&agrave;n hảo.</p>\r\n\r\n<h3><strong>Bộ vi xử l&yacute; mới ho&agrave;n to&agrave;n, dung lượng pin cao chưa từng c&oacute;</strong></h3>\r\n\r\n<p>Ở thị trường Việt Nam, Samsung trang bị con chip &ldquo;nh&agrave; l&agrave;m&rdquo; Exynos 9820 Octa-core, tiến tr&igrave;nh 8nm mới nhất, 3 cụm nh&acirc;n phối hợp với nhau gồm 2xCustomCPU(M4), 2xCortexA75 v&agrave; 4xCortexA55 cho ph&eacute;p xung nhịp tối đa l&ecirc;n đến 2.7Hz. Về GPU th&igrave; Galaxy S10 trang bị Mali G76MP12 tăng đến 40% so với GPU đang trang bị tr&ecirc;n S9. Hỗ trợ chuẩn RAM cao nhất 4x 16-bit CHLPDDR4x l&ecirc;n đến 12GB, Exynos 9820 hổ trợ USF3.0 nhanh gấp 2 lần chuẩn 2.1 (2.9GHz). B&ecirc;n cạnh đ&oacute; tr&ecirc;n Exynos 9820 c&ograve;n được trang bị 2 nh&acirc;n NPU ri&ecirc;ng biệt hổ trợ c&aacute;c t&iacute;nh năng AI t&iacute;ch hợp v&agrave; d&ugrave;ng AI để do lường ch&iacute;nh x&aacute;c c&oacute; tiến tr&igrave;nh tr&ecirc;n m&aacute;y ph&acirc;n bổ t&agrave;i nguy&ecirc;n m&aacute;y, c&ograve;n c&oacute; c&aacute;c khu vực d&agrave;nh ri&ecirc;ng cho bảo mật, xử l&iacute; h&igrave;nh ảnh&hellip; Theo l&iacute; thuyết th&igrave; năng lực xử l&yacute; của 9820 cao hơn 20% so với 9810 v&agrave; tiết kiệm pin hơn 40%.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cellphones.com.vn/media/wysiwyg/mobile/samsung/samsung-galaxy-s10-cau-hinh.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dung lượng pin cũng l&agrave; thứ được Samsung nhấn mạnh cho S10, với vi&ecirc;n pin 4100mAh lớn nhất trong c&aacute;c flagship Samsung hiện tại cho ph&eacute;p d&ugrave;ng trong cả ng&agrave;y d&agrave;i, thậm ch&iacute; sạc ngược cho thiết bị kh&aacute;c bằng t&iacute;nh năng Wireless Powershare mới. Đ&acirc;y cũng l&agrave; lần đầy ti&ecirc;n, Samsung n&acirc;ng tốc độ sạc sau vụ việc Note7, từ 18watt l&ecirc;n 25watt kh&aacute; d&egrave; dặt nhưng vẫn l&agrave;m ấm l&ograve;ng người sử dụng khi m&agrave; Samsung đ&atilde; ở qu&aacute; l&acirc;u với chuẩn Quick Charge 2.0.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cellphones.com.vn/media/wysiwyg/mobile/samsung/Screenshot_5.jpg\" /></p>\r\n\r\n<p>Với cấu h&igrave;nh mạnh mẻ hiện tại cũng dung lượng pin thoải m&aacute;i, Galaxy S10 hầu như c&oacute; thẻ g&aacute;nh mọi t&aacute;c vụ nặng nề nhất tr&ecirc;n Android b&acirc;y giờ như chỉnh sửa h&igrave;nh ảnh, l&agrave;m video, t&aacute;c vụ AR, chơi c&aacute;c game khủng nhất tr&ecirc;n CH Play m&agrave; kh&ocirc;ng lo lắng t&igrave;nh trạng chậm, giật lag&hellip;</p>\r\n\r\n<h3><strong>Gia nhập hội flagship ba camera sau &ldquo;chậm nhưng chắc&rdquo;</strong></h3>\r\n\r\n<p>Thiếu s&oacute;t nếu kh&ocirc;ng đề cập đến những n&acirc;ng cấp s&aacute;ng gi&aacute; tr&ecirc;n bộ 3 camera tr&ecirc;n Galaxy S10. Ngo&agrave;i ống k&iacute;nh ch&iacute;nh f1.5-2.4 c&oacute; Dualpixel v&agrave; lấy n&eacute;t theo pha, c&ugrave;ng ống tele 2x f2.4 th&igrave; t&ecirc;n S10 c&ograve;n c&oacute; th&ecirc;m 1 mắt si&ecirc;u rộng l&ecirc;n đến 123 độ f2.2 Điểm được Samsung nhấn mạnh nhất năm nay tr&ecirc;n bộ ba camera ch&iacute;nh l&agrave; chất lượng video khi m&agrave;n được trang bị th&ecirc;m t&iacute;nh năng Steady Shot khiến cho khả năng chống rung tuyệt vời hơn. B&ecirc;n cạnh đ&oacute; sau, c&oacute; v&agrave;i sự thay đổi ch&iacute;nh l&agrave; t&iacute;nh năng x&oacute;a ph&ocirc;ng đ&atilde; được Samsung chuyển từ cam tele về cam ch&iacute;nh. Vừa c&oacute; lợi cũng vừa c&oacute; hại, ảnh từ cam ch&iacute;nh cho ra m&agrave;u sắc chi tiết hay độ s&aacute;ng đều nhỉnh hơn cam tele, g&oacute;c cũng rộng hơn nhưng b&ugrave; lại khi muốn lấy được gần chủ thể phải zoom bằng ch&acirc;n, v&agrave; khả năng t&aacute;ch nền tạo bokeh đều bằng phần mềm n&ecirc;n sẽ c&oacute; đ&ocirc;i ch&uacute;t kh&aacute;c biệt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cellphones.com.vn/media/wysiwyg/mobile/samsung/Screenshot_4.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Năm nay d&atilde;y nhạy s&aacute;ng cũng ch&iacute;nh l&agrave; một trong những sự cả tiến lớn. Khi m&agrave; cả cam trước lẫn cam sau đều phải gọi l&agrave; xuất sắc khi chụp c&aacute;c bức ngược s&aacute;ng, hay gần nguồn s&aacute;ng mạnh. N&oacute;i về camera trước, sự quay lại của lấy n&eacute;t tự động v&agrave; bổ sung th&ecirc;m g&oacute;c chụp rộng hơn l&agrave;m cho c&aacute;c t&ugrave;y chọn selfie phong ph&uacute; v&agrave; chuy&ecirc;n nghiệp hơn. M&agrave;u da v&agrave; c&aacute;c chi tiết đều được giữ lại nhiều hơn, do độ ph&acirc;n giải được n&acirc;ng l&ecirc;n từ 8MP l&ecirc;n 10MP.</p>\r\n\r\n<h3><strong>Giao diện mới OneUI hiện đại, hổ trợ tốt m&agrave;n h&igrave;nh d&agrave;i</strong></h3>\r\n\r\n<p>C&oacute; qu&aacute; nhiều b&agrave;i đ&aacute;nh gi&aacute; trải nghiệm OneUI kể từ khi S10 chưa xuất hiện, hầu như giao diện được trang bị tr&ecirc;n S10 sẽ kh&ocirc;ng kh&aacute;c qu&aacute; nhiều tr&ecirc;n S9 hay Note9 được cập nhật. OneUI được khen nức nở bởi t&iacute;nh tiện dụng c&ugrave;ng với những thay đổi th&acirc;n thiện hơn với người d&ugrave;ng, c&aacute;c t&iacute;nh năng như Darkmode hay điều khiển cử chỉ đều được trang bị ngo&agrave;i ra nhưng thay đổi nhỏ về c&aacute;ch sắp xếp hiện thị cũng ghi điểm c&ocirc;ng cho OneUI trong mắt người ti&ecirc;u d&ugrave;ng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cellphones.com.vn/media/wysiwyg/mobile/samsung/s10_-_OneUI.jpg\" /></p>\r\n\r\n<p>Tuy nhi&ecirc;n v&agrave;i vấn đề tr&ecirc;n OneUI ch&iacute;nh l&agrave; bộ Icon mới trong hoạt h&igrave;nh v&agrave; k&eacute;m sang hẳn so với giao diện cũ. V&agrave; c&aacute;ch điều hướng cử chỉ tr&ecirc;n OneUI kh&aacute; l&agrave; ngu, chả mấy tuận tiện cho người d&ugrave;ng.</p>\r\n\r\n<h3><strong>C&aacute;c t&iacute;nh năng mới được trang bị tr&ecirc;n Galaxy S10</strong></h3>\r\n\r\n<p>Phải kể đến t&iacute;nh năng được Samsung nhấn kh&aacute; s&acirc;u v&agrave; mạnh tr&ecirc;n S10 ch&iacute;nh l&agrave; t&iacute;nh năng sạc ngược Wireless Powershare. Thực tế đ&acirc;y kh&ocirc;ng phải l&agrave; t&iacute;nh năng mới do Samsung nghĩ ra, nhưng trước đ&oacute; với Huawei chưa bao giờ biến t&iacute;nh năng n&agrave;y trở n&ecirc;n hữu &iacute;ch, bởi mang t&iacute;nh tr&igrave;nh diễn nhiều hơn l&agrave; tiện &iacute;ch. Tuy nhi&ecirc;n với hệ sinh th&aacute;i Galaxy, như tai nghe Galaxy Bubs hay đồng hồ Galaxy Watch, Samsung sẽ gi&uacute;p t&iacute;nh năng n&agrave;y c&oacute; nhiều đất diễn hơn.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cellphones.com.vn/media/wysiwyg/mobile/samsung/Samsung-galaxy-s10-plus-chinh-hang-8.jpg\" /></p>\r\n\r\n<p>Một t&iacute;nh năng được xem l&agrave; điểm nhấn của S10 ch&iacute;nh l&agrave; cảm biến v&acirc;n tay si&ecirc;u &acirc;m 3D. đ&acirc;y cũng kh&ocirc;ng phải l&agrave; t&iacute;nh năng mới bởi n&oacute; đ&atilde; được Qualcomm nghi&ecirc;n cứu v&agrave; giới thiệu từ l&acirc;u, nhưng phải đến gần đ&acirc;y khi vị tr&iacute; của n&oacute; được đưa xuống dưới m&agrave;n h&igrave;nh th&igrave; mới được xem l&agrave; t&iacute;nh năng mới, v&agrave; Samsung l&agrave; nh&agrave; sản xuất đầu ti&ecirc;n d&ugrave;ng t&iacute;nh năng n&agrave;y. Cơ chế hoạt độ bằng s&oacute;ng &acirc;m vẻ bản đồ 3D v&acirc;n tay, ch&iacute;nh đến từng nm nếu so với c&ocirc;ng nghệ nhận diện Gương mặt th&igrave; đ&acirc;y ch&iacute;nh l&agrave; FaceID của Apple v&igrave; n&oacute; d&ugrave;ng h&igrave;nh ảnh 3D của sinh trắc học chứ kh&ocirc;ng pahir l&agrave; ảnh 2D th&ocirc;ng thường. T&iacute;nh năng tương lai n&agrave;y cho ph&eacute;p sử dụng cả khi ng&oacute;n tay bị d&iacute;nh nước, dầu, lotion&hellip; nhưng lại cự tuyệt d&aacute;n cường lực hay miếng d&aacute;n th&ocirc;ng thường. Trong tương lai Samsung sẽ chắc chắn cho ra mắt những miếng d&aacute;n hỗ trợ c&ocirc;ng nghệ n&agrave;y vừa d&ugrave;ng được v&acirc;n tay, vừa bảo vệ điện thoại khỏi trầy xướt.</p>', 2, 10, 0, 20, 20900000, 15400000, 1, '2023-03-08 23:57:16', '2023-03-08 23:57:16', 12, NULL, NULL),
(4, 'Laptop Dell Inspiron 15 3576 (70157552)', 6, 'laptop-dell-inspiron-15-3576-70157552', '1678345310_4d08e4839006d7694348defb7980b91d.jpg', '#2d6c253a47b945c830cf2ea731f995ed.jpg#2d953af5e5cb66808c16a5f7adecb0f5.jpg', '14900000', '<p><em>Dell l&agrave; một trong những thương hiệu&nbsp;<a href=\"https://cellphones.com.vn/laptop.html\" target=\"_blank\"><strong>laptop</strong></a>&nbsp;thịnh h&agrave;nh tr&ecirc;n thị trường hiện nay với c&aacute;c sản phẩm chất lượng v&agrave; ph&ugrave; hợp với nhiều đối tượng người d&ugrave;ng, nổi bật trong đ&oacute; l&agrave; chiếc laptop&nbsp;<strong>Dell Inspiron 15</strong>. Nếu bạn l&agrave; một người d&ugrave;ng cơ bản v&agrave; kh&ocirc;ng y&ecirc;u cầu những chiếc m&aacute;y ultrabook cao cấp với thiết kế đẹp v&agrave; cấu h&igrave;nh khủng,&nbsp;<strong>Dell Inspiron 15 3576 70157552</strong>&nbsp;sẽ l&agrave; một lựa chọn ph&ugrave; hợp.</em></p>\r\n\r\n<h3><strong>Thiết kế cứng c&aacute;p, gọn nhẹ với chất liệu nhựa cao cấp</strong></h3>\r\n\r\n<p>Dell Inspiron 15 3576 70157552 được bao bọc bởi lớp vỏ ngo&agrave;i bằng nhựa m&agrave;u đen cứng c&aacute;p, bản lề chắc chắn gi&uacute;p bảo vệ tốt c&aacute;c linh kiện b&ecirc;n trong. C&aacute;c g&oacute;c cạnh của m&aacute;y được bo tr&ograve;n nhẹ tạo cảm gi&aacute;c thoải m&aacute;i khi cầm nắm, tr&aacute;nh việc cứa v&agrave;o da tay v&agrave; g&acirc;y kh&oacute; chịu khi sử dụng. Hai b&ecirc;n viền l&agrave; điểm nhấn ch&iacute;nh của m&aacute;y khi được l&agrave;m từ nhựa b&oacute;ng nổi bật, tinh tế.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cellphones.com.vn/media/wysiwyg/laptop/Dell/dell-inspiron-3576-1.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Với trọng lượng 2.3kg, người d&ugrave;ng c&oacute; thể mang theo m&aacute;y b&ecirc;n m&igrave;nh đến bất cứ nơi n&agrave;o để sử dụng khi cần. Hơn nữa, Dell c&ograve;n đảm bảo cho chiếc laptop của bạn hoạt động tốt nhất ở cả những khu vực n&oacute;ng v&agrave; c&oacute; nhiệt độ khắc nghiệt nhất khi khả năng chịu nhiệt độ của Dell Inspiron 15 3576 70157552 l&ecirc;n tới hơn 75 độ C.</p>\r\n\r\n<h3><strong>M&agrave;n h&igrave;nh Full HD, k&iacute;ch thước 15.6 inch đem đến trải nghiệm h&igrave;nh ảnh tuyệt vời</strong></h3>\r\n\r\n<p>Dell Inspiron 15 3576 70157552 được trang bị m&agrave;n h&igrave;nh Full HD, k&iacute;ch thước lớn 15.6 inch c&ugrave;ng độ ph&acirc;n giải 1920 x 1080 pixels, tương đương 142 ppi cho trải nghiệm tuyệt vời, sắc n&eacute;t đến từng chi tiết. M&agrave;n h&igrave;nh của Inspiron 3576 hiển thị m&agrave;u đẹp, sống động v&agrave; ch&acirc;n thực khiến bất cứ kh&aacute;ch h&agrave;ng kh&oacute; t&iacute;nh n&agrave;o đều phải h&agrave;i l&ograve;ng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cellphones.com.vn/media/wysiwyg/laptop/Dell/dell-inspiron-3576-2.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Đặc biệt, m&agrave;n h&igrave;nh c&ograve;n được t&iacute;ch hợp c&ocirc;ng nghệ chống l&oacute;a Anti-Glare cho ph&eacute;p hiển thị tốt ngay cả dưới điều kiện ban đ&ecirc;m thiếu &aacute;nh s&aacute;ng hoặc qu&aacute; nhiều &aacute;nh s&aacute;ng chiếu v&agrave;o. Ngo&agrave;i ra, trang bị HD Webcam gi&uacute;p người d&ugrave;ng c&oacute; những trải nghiệm ho&agrave;n hảo khi thực hiện c&aacute;c cuộc tr&ograve; chuyện trực tuyến.</p>\r\n\r\n<h3><strong>Hiệu năng vượt trội c&ugrave;ng chip&nbsp;<a href=\"https://ark.intel.com/content/www/vn/vi/ark/products/124967/intel-core-i5-8250u-processor-6m-cache-up-to-3-40-ghz.html\" target=\"_blank\">Intel Core i5-8250U</a>&nbsp;thế hệ thứ 8</strong></h3>\r\n\r\n<p>Dell Inspiron 15 3576 70157552 được trang bị chip Intel Core i5-8250U thế hệ thứ 8 si&ecirc;u tốc, 4 nh&acirc;n 8 buồng với tốc độ 1,6GHz upto 3,4GHz c&ugrave;ng bộ nhớ đệm 6MB xử l&yacute; tốt mọi ứng dụng m&agrave; bạn mong muốn. M&aacute;y c&oacute; 4GB DDR4 2400MHz ti&ecirc;n tiến c&ugrave;ng 1 khe cắm thứ 2 sẵn s&agrave;ng n&acirc;ng cấp th&ecirc;m bất cứ l&uacute;c n&agrave;o. Ổ cứng HDD 1TB cho bạn thoải m&aacute;i lưu trữ c&aacute;c dữ liệu c&aacute; nh&acirc;n.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cellphones.com.vn/media/wysiwyg/laptop/Dell/dell-inspiron-3576-3.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ngo&agrave;i phi&ecirc;n bản Win 10 được lập tr&igrave;nh sẵn, Dell Inspiron 15 3576 70157552 c&ograve;n c&oacute; cả phi&ecirc;n bản chạy hệ điều h&agrave;nh Ubuntu cho tốc độ xử l&yacute; vượt trội v&agrave; bảo mật cao hơn.</p>\r\n\r\n<p>M&aacute;y c&ograve;n c&oacute; card đồ họa rời AMD Radeon 520 Graphics 2GB GDDR5 sẵn s&agrave;ng hỗ trợ c&aacute;c ứng dụng đồ họa v&agrave; c&aacute;c game cấu h&igrave;nh mạnh. Dell Inspiron 15 3576 kh&ocirc;ng chỉ hoạt động tốt trong ứng dụng văn ph&ograve;ng m&agrave; c&ograve;n xử l&yacute; tốt c&aacute;c c&ocirc;ng việc đồ họa v&agrave; tất cả c&aacute;c tựa game như Dota, Li&ecirc;n minh huyền thoại,&nbsp;<a href=\"https://www.livemint.com/Technology/2KSD3xh8fRjBPuUkKCf8dK/Game-Review-PUBG-Mobile-is-immensely-addictive-like-the-PC.html\" target=\"_blank\">PUBG</a>,...</p>\r\n\r\n<h3><strong>B&agrave;n ph&iacute;m c&ugrave;ng touchpad dễ thao t&aacute;c</strong></h3>\r\n\r\n<p>B&agrave;n ph&iacute;m của Dell Inspiron 15 3576 70157552 được thiết kế theo phong c&aacute;ch truyền thống của Dell với k&iacute;ch thước, khoảng c&aacute;ch giữa c&aacute;c ph&iacute;m hợp l&yacute;, ph&iacute;m bấm &ecirc;m, h&agrave;nh tr&igrave;nh ph&iacute;m d&agrave;i, độ nảy tốt tạo cảm gi&aacute;c thoải m&aacute;i cho người d&ugrave;ng trong từng thao t&aacute;c nhập liệu.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cellphones.com.vn/media/wysiwyg/laptop/Dell/dell-inspiron-3576-4.jpg\" /></p>\r\n\r\n<p>B&agrave;n ph&iacute;m được thiết kế mỗi ph&iacute;m sử dụng được hơn 10 triệu lần bấm, ri&ecirc;ng Touchpad cảm ứng với hơn 1 triệu lần chạm m&agrave; kh&ocirc;ng bị lỗi. B&agrave;n ph&iacute;m cũng hỗ trợ đ&egrave;n nền backlit gi&uacute;p bạn ho&agrave;n to&agrave;n c&oacute; thể l&agrave;m việc trong m&ocirc;i trường thiếu s&aacute;ng.</p>\r\n\r\n<h3><strong>Dung lượng pin ổn định, thời lượng sử dụng bền bỉ</strong></h3>\r\n\r\n<p>Dell Inspiron 15 3576 70157552 được trang bị vi&ecirc;n pin dung lượng 42Wh, dạng 4 cell. Tuy dung lượng kh&ocirc;ng qu&aacute; cao như c&aacute;c sản phẩm kh&aacute;c nhưng vẫn đ&aacute;p ứng được c&aacute;c nhu cầu sử dụng h&agrave;ng ng&agrave;y của người d&ugrave;ng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cellphones.com.vn/media/wysiwyg/laptop/Dell/dell-inspiron-3576-5.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tuy vậy, c&aacute;c phần cứng &ldquo;ăn điện&rdquo; nhất được trang bị b&ecirc;n trong m&aacute;y (CPU v&agrave; GPU đồ họa rời) đều l&agrave; loại tiết kiệm điện (i5-8250U v&agrave;&nbsp;<a href=\"https://www.notebookcheck.net/AMD-Radeon-520-GPU-Benchmarks-and-Specs.214532.0.html\" target=\"_blank\">Radeon 520</a>), vi&ecirc;n pin của m&aacute;y ho&agrave;n to&agrave;n c&oacute; thể gi&uacute;p chiếc laptop n&agrave;y hoạt động tốt trong thời gian kh&aacute; d&agrave;i. Theo đo đạc thực tế, người d&ugrave;ng c&oacute; thể sử dụng m&aacute;y tới hơn 7 tiếng&nbsp; li&ecirc;n tục khi duyệt web v&agrave; hơn 4 tiếng khi sử dụng để xem video.</p>\r\n\r\n<h3><strong>Kết nối đa dạng, đ&aacute;p ứng mọi nhu cầu cần thiết</strong></h3>\r\n\r\n<p>L&agrave; chiếc laptop phục vụ c&ocirc;ng việc n&ecirc;n Dell Inspiron 15 3576 70157552 c&oacute; đầy đủ c&aacute;c cổng kết nối th&ocirc;ng dụng hiện nay. Cổng sạc, cổng ethernet v&agrave; 2 cổng USB 3.0 Type-A c&ugrave;ng khe tho&aacute;t nhiệt được đặt b&ecirc;n tr&aacute;i. Ở ph&iacute;a đối diện l&agrave; ổ đĩa quang, th&ecirc;m 1 cổng USB 2.0 Type-A nữa c&ugrave;ng khe thẻ SD v&agrave; 1 cổng &acirc;m thanh 3.5mm.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cellphones.com.vn/media/wysiwyg/laptop/Dell/dell-inspiron-3576-6.jpg\" /></p>\r\n\r\n<p>Cổng kết nối hiện đại&nbsp;<a href=\"https://www.lifewire.com/what-is-usb-3-0-2626038\" target=\"_blank\">USB 3.0</a>&nbsp;cho&nbsp;tốc độ sao ch&eacute;p dữ liệu được nhanh ch&oacute;ng hơn. Cổng HDMI hỗ trợ việc tr&igrave;nh chiếu h&igrave;nh ảnh, &acirc;m thanh từ laptop qua m&aacute;y chiếu, tivi được tiện lợi hơn. Ổ đĩa DVD th&iacute;ch hợp cho việc học ngoại ngữ hay c&agrave;i win, kết nối kh&ocirc;ng d&acirc;y Bluetooth 4.1 cho ph&eacute;p kết nối với c&aacute;c thiết bị như tai nghe, chuột v&agrave; sử dụng tiện lợi hơn.</p>\r\n\r\n<h3><strong>Laptop Dell Inspiron 15 3576 70157552 đảm bảo ch&iacute;nh h&atilde;ng, chất lượng tại hệ thống&nbsp;<a href=\"https://cellphones.com.vn/\" target=\"_blank\">CellphoneS</a></strong></h3>\r\n\r\n<p>H&atilde;y đến với CellphoneS - hệ thống b&aacute;n lẻ điện thoại tr&ecirc;n to&agrave;n quốc để sở hữu cho m&igrave;nh&nbsp;<strong>Laptop Dell Inspiron 15 3576 70157552</strong>&nbsp;đảm bảo ch&iacute;nh h&atilde;ng, chất lượng, mức gi&aacute; hợp l&yacute; c&ugrave;ng nhiều ưu đ&atilde;i hấp dẫn.&nbsp;Tại ​hệ thống&nbsp;<strong>CellphoneS</strong>​, bạn c&oacute; thể ho&agrave;n to&agrave;n y&ecirc;n t&acirc;m khi mua sản phẩm n&agrave;y v&igrave; ​CellphoneS c&oacute; chế độ bảo h&agrave;nh &ndash; đổi trả chu đ&aacute;o c&ugrave;ng dịch vụ giao h&agrave;ng &ndash; thu tiền tại nh&agrave; miễn ph&iacute; tr&ecirc;n to&agrave;n quốc. Đặc biệt, đối với những sản phẩm mới ra mắt, kh&aacute;ch h&agrave;ng c&oacute; thể đặt cọc online để ưu ti&ecirc;n nhận m&aacute;y v&agrave; sở hữu nhiều phần qu&agrave; hấp dẫn.</p>', 2, 2, 0, 2, 14900000, 14900000, 1, '2023-03-09 00:01:50', '2023-03-09 00:01:50', 12, NULL, NULL),
(5, 'Chuột không dây Logitech M1850', 7, 'chuot-khong-day-logitech-m1850', '1678345469_29abc8829fc0e8e2fe6ba1b2ee84ba04.jpg', '#3daf27b63c30e5a8f1dc1d2ab0934959.png#3f83d23fdc12378fc61ac5c0e55c2476.png', 'Chuột không dây Logitech M185, Chính hãng', '<p>Chuột kh&ocirc;ng d&acirc;y Logitech M185, Ch&iacute;nh h&atilde;ng</p>', 2, 1, 0, NULL, 250000, 250000, 1, '2023-03-09 00:04:29', '2023-03-09 00:04:29', 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1: Tỉnh , 2: Thành Phố',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `trash` tinyint(1) NOT NULL,
  `access` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `trash`, `access`, `status`) VALUES
(1, 'supderadmin', '2023-02-18 17:00:00', NULL, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `slug`, `img`, `updated_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'nguyenbinh', 'nguyenbinh', '1676950135_banner-samsungs10.png', NULL, 0, '2023-02-19 06:07:17', '2023-03-10 02:52:21', NULL),
(2, 'binhnl', 'binhnl', '1678264907_329767013_661350849329143_7894027735664800340_n.jpg', NULL, 1, '2023-02-26 21:07:11', '2023-03-08 01:41:47', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `gender` tinyint(1) NOT NULL DEFAULT 0,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `name`, `email`, `email_verified_at`, `password`, `role`, `gender`, `phone`, `address`, `img`, `trash`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, NULL, 'nguyenbinh', 'binhnguyenluu124@gmail.com', NULL, '$2y$10$.ph/Rw2R7kEuFEWxMJxuJ.vBbGSKcyLf0U0lw7JaMMigIOwYC7R6.', 1, 0, NULL, NULL, NULL, 1, 1, NULL, '2023-02-19 05:43:09', '2023-02-19 05:43:09'),
(12, NULL, 'nguyenbinh', 'binhnluu@gmail.com', NULL, '$2y$10$PQewabv56pTYjMG0dlF99u.t34grJN1eAIp499pebz01D3qBmBB7y', 1, 0, NULL, NULL, NULL, 1, 1, NULL, '2023-02-22 00:14:17', '2023-02-22 00:14:17');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contacts_email_unique` (`email`);

--
-- Chỉ mục cho bảng `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Chỉ mục cho bảng `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_province_id_foreign` (`province_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_province_id_foreign` (`province_id`),
  ADD KEY `orders_district_id_foreign` (`district_id`);

--
-- Chỉ mục cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `producers`
--
ALTER TABLE `producers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_producer_id_foreign` (`producer_id`);

--
-- Chỉ mục cho bảng `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_foreign` (`role`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `producers`
--
ALTER TABLE `producers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`),
  ADD CONSTRAINT `orders_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Các ràng buộc cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_producer_id_foreign` FOREIGN KEY (`producer_id`) REFERENCES `producers` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_foreign` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

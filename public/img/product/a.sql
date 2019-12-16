-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 21, 2019 lúc 04:41 PM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_category`
--

CREATE TABLE `db_category` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parentid` int(11) UNSIGNED NOT NULL,
  `orders` int(11) UNSIGNED NOT NULL,
  `metakey` varchar(150) NOT NULL,
  `metadesc` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `db_category`
--

INSERT INTO `db_category` (`id`, `name`, `slug`, `parentid`, `orders`, `metakey`, `metadesc`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Đồng hồ Casio', 'dong-ho-casio', 0, 1, 'Đồng hồ Nam', 'Đồng hồ Nam', '2019-11-28 17:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(2, 'Đồng hồ Citizen', 'dong-ho-citizen', 0, 1, 'Đồng hồ Nam', 'Đồng hồ Nam', '2019-11-28 17:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(3, 'Đồng hồ Orient', 'dong-ho-orient', 0, 1, 'Đồng hồ Nam', 'Đồng hồ Nam', '2019-11-29 17:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(4, 'Casio con ', 'dong-ho-nam', 1, 1, 'Cái gì gì đó seo', 'Cái gì gì đó mô tả', '2019-11-28 17:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(5, 'Đồng hồ Seiko', 'dong-ho-seiko', 0, 1, 'Đồng hồ Nam', 'Đồng hồ Nam', '2019-11-28 17:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(6, 'Đồng hồ Tissot', 'dong-ho-tissot', 0, 1, 'Đồng hồ Nam', 'Đồng hồ Nam', '2019-11-28 17:00:00', 1, '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_contact`
--

CREATE TABLE `db_contact` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `detail` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_menu`
--

CREATE TABLE `db_menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `tableid` int(11) DEFAULT NULL,
  `parentid` int(11) NOT NULL DEFAULT '0',
  `orders` int(11) NOT NULL DEFAULT '0',
  `position` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `db_menu`
--

INSERT INTO `db_menu` (`id`, `name`, `type`, `link`, `tableid`, `parentid`, `orders`, `position`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Trang Chủ', 'custom', 'http://localhost/websitedongho/public/', 0, 0, 0, 'mainmenu', '2019-11-12 08:38:51', 0, '0000-00-00 00:00:00', 0, 1),
(2, 'Giới Thiệu', 'page', 'http://localhost/websitedongho/public/page/gioi-thieu', 0, 0, 0, 'mainmenu', '2019-11-21 09:37:56', 0, '0000-00-00 00:00:00', 0, 1),
(3, 'Danh Sách Sản Phẩm', 'custom', 'san-pham', 0, 0, 0, 'mainmenu', '2019-11-21 09:46:05', 0, '0000-00-00 00:00:00', 0, 1),
(4, 'Tin Tức', 'post', 'bai-viet/tin-tuc', 0, 0, 0, 'mainmenu', '2019-11-06 07:44:42', 0, '0000-00-00 00:00:00', 0, 1),
(5, 'Liên Hệ', 'page', 'page/lien-he', 0, 0, 0, 'mainmenu', '2019-11-21 09:03:51', 0, '0000-00-00 00:00:00', 0, 1),
(6, 'Đồng Hồ Casio', 'category', 'san-pham/dong-ho-casio', 0, 3, 0, 'mainmenu', '2019-11-12 08:32:02', 0, '0000-00-00 00:00:00', 0, 1),
(7, 'Đồng Hồ Citizen', 'category', 'san-pham/dong-ho-citizen', 0, 3, 0, 'mainmenu', '2019-11-12 08:32:02', 0, '0000-00-00 00:00:00', 0, 1),
(8, 'Đồng Hồ Orient', 'category', 'san-pham/dong-ho-orient', 0, 3, 0, 'mainmenu', '2019-11-12 08:32:02', 0, '0000-00-00 00:00:00', 0, 1),
(9, 'Đồng Hồ Seiko', 'category', 'san-pham/dong-ho-seiko', 0, 3, 0, 'mainmenu', '2019-11-12 08:32:02', 0, '0000-00-00 00:00:00', 0, 1),
(10, 'Đồng Hồ Tissot', 'category', 'san-pham/dong-ho-tissot', 0, 3, 0, 'mainmenu', '2019-11-12 08:32:02', 0, '0000-00-00 00:00:00', 0, 1),
(11, 'Classic', 'category', 'san-pham/dong-ho-tissot', 0, 10, 0, 'mainmenu', '2019-11-12 09:02:19', 0, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_order`
--

CREATE TABLE `db_order` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` int(11) NOT NULL,
  `userid` int(11) UNSIGNED NOT NULL,
  `created_ate` date NOT NULL,
  `exportdate` date NOT NULL,
  `deliveryaddress` varchar(255) NOT NULL,
  `deliveryname` varchar(100) NOT NULL,
  `deliveryphone` varchar(255) NOT NULL,
  `deliveryemail` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_orderdetail`
--

CREATE TABLE `db_orderdetail` (
  `id` int(11) UNSIGNED NOT NULL,
  `orderid` int(11) UNSIGNED NOT NULL,
  `productid` int(11) UNSIGNED NOT NULL,
  `price` float(12,0) NOT NULL,
  `quantity` int(11) UNSIGNED NOT NULL,
  `amount` float(12,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_post`
--

CREATE TABLE `db_post` (
  `id` int(11) UNSIGNED NOT NULL,
  `topid` int(11) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `detail` longtext NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT 'post',
  `metakey` varchar(150) NOT NULL,
  `metadesc` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_product`
--

CREATE TABLE `db_product` (
  `id` int(11) UNSIGNED NOT NULL,
  `catid` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `img` varchar(100) NOT NULL,
  `detail` longtext NOT NULL,
  `number` int(11) UNSIGNED NOT NULL,
  `price` float(12,0) NOT NULL,
  `pricesale` float(12,0) NOT NULL,
  `metakey` varchar(150) NOT NULL,
  `metadesc` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `db_product`
--

INSERT INTO `db_product` (`id`, `catid`, `name`, `slug`, `img`, `detail`, `number`, `price`, `pricesale`, `metakey`, `metadesc`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 5, 'Đồng hồ Nam Seiko 5 SNK371K1', 'Seiko-5-SNK371K1', 'Seiko-5-SNK371K1.png', 'Đồng hồ nam Seiko', 1, 2910000, 0, 'Đồng hồ Seiko', 'Đồng hồ Seiko', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(2, 6, 'Đồng hồ Nam Tissot-T033.410.26.011.01', 'Tissot-T033.410.26.011.01', 'Tissot-T033-410-26-011-01.png', 'Đồng hồ nam Tissot', 1, 5960000, 0, 'Đồng hồ Tissot', 'Đồng hồ Tissot', '2019-11-19 17:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(14, 1, 'Đồng hồ Nam Casio-MTP-1374L-1AVDF', 'Casio-MTP-1374L-1AVDF', 'Casio-MTP-1374L-1AVDF.png', 'Đồng hồ Nam Casio', 1, 1121000, 0, 'đồng hồ casio', 'đồng hồ casio', '2019-11-29 17:00:00', 1, '2019-11-20 03:06:35', 1, 1),
(15, 2, 'Đồng hồ Nam CITIZEN CT-BF2009-11A', 'CITIZEN-CT-BF2009-11A', 'CITIZEN-CT-BF2009-11A.png', 'Đồng hồ nam Citizen', 1, 3140000, 0, 'Đồng hồ Citizen', 'Đồng hồ Citizen', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(16, 3, 'Đồng hồ Nam Orient FDBAD003W0', 'Orient-FDBAD003W0', 'Orient-FDBAD003W0.png', '', 1, 5210000, 0, 'Đồng hồ Orient', 'Đồng hồ Orient', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(19, 1, 'Đồng hồ Nam Casio MTP-1374D-1AVDF', 'Casio-MTP-1374D-1AVDF', 'Casio-MTP-1374D-1AVDF.png', 'Đồng hồ nam Casio', 0, 888000, 0, 'Đồng hồ Casio', 'Đồng hồ Casio', '0000-00-00 00:00:00', 1, '2019-11-20 03:55:18', 1, 1),
(20, 1, 'Đồng hồ Nam Casio-AE-1200WHD-1AVDF', 'Casio-AE-1200WHD-1AVDF', 'Casio-AE-1200WHD-1AVDF.png', 'Đồng hồ Nam Casio', 0, 1121000, 0, 'Đồng hồ Casio', 'Đồng hồ Casio', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(21, 1, 'Đồng hồ Nam Casio MTP-1374L-7AVDF', 'Casio MTP-1374L-7AVDF', 'Casio-MTP-1374L-7AVDF.png', 'Đồng hồ Nam Casio', 0, 1714000, 0, 'Đồng hồ Casio', 'Đồng hồ Casio', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(22, 2, 'Đồng hồ Nam CITIZEN CT-BI5051-51A', 'CITIZEN-CT-BI5051-51A', 'CITIZEN-CT-BI5051-51A.png', 'Đồng hồ Nam CITIZEN', 0, 3520000, 0, 'Đồng hồ CITIZEN', 'Đồng hồ CITIZEN', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(23, 2, 'Đồng hồ Nam CITIZEN CT-BM7354-85A', 'CITIZEN-CT-BM7354-85A', 'CITIZEN-CT-BM7354-85A.png', 'Đồng hồ Nam CITIZEN', 0, 5320000, 0, 'Đồng hồ CITIZEN', 'Đồng hồ CITIZEN', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(24, 2, 'Đồng hồ Nam CITIZEN-CT-NH8350-08A', 'CITIZEN-CT-NH8350-08A', 'CITIZEN-CT-NH8350-08A.png', 'Đồng hồ Nam CITIZEN', 0, 4750000, 0, 'Đồng hồ CITIZEN', 'Đồng hồ CITIZEN', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(25, 2, 'Đồng hồ Nam CITIZEN-CT-NH8350-59B', 'dong-ho-nam-citizen-ct-nh8350-59b', 'CITIZEN-CT-NH8350-59B.png', 'Đồng hồ Nam CITIZEN', 1, 10000, 10000, 'Đồng hồ CITIZEN', 'Đồng hồ CITIZEN', '0000-00-00 00:00:00', 1, '2019-11-21 02:28:06', 1, 1),
(26, 2, 'Đồng hồ Nam CITIZEN-CT-NH8360-80L', 'CITIZEN-CT-NH8360-80L', 'CITIZEN-CT-NH8360-80L.png', 'Đồng hồ Nam CITIZEN', 0, 4990000, 0, 'Đồng hồ CITIZEN', 'Đồng hồ CITIZEN', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(27, 3, 'Đồng hồ Nam Orient-RA-AC0E02S10B', 'Orient-RA-AC0E02S10B', 'Orient-RA-AC0E02S10B.png', 'Đồng hồ Nam Orient', 0, 4136000, 4136000, 'Đồng hồ Orient', 'Đồng hồ Orient', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(28, 3, 'Đồng hồ Nam Orient RA-AR0102S10B', 'Orient-RA-AR0102S10B', 'Orient-RA-AR0102S10B.png', 'Đồng hồ Nam Orient', 0, 7440000, 0, 'Đồng hồ Orient', 'Đồng hồ Orient', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(29, 3, 'Đồng hồ Nam Orient RE-AV0001S00B', 'Orient-RE-AV0001S00B', 'Orient-RE-AV0001S00B.png', 'Đồng hồ Nam Orient', 0, 17250000, 0, 'Đồng hồ Orient', 'Đồng hồ Orient', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(30, 3, 'Đồng hồ Nam Orient RE-AV0002S00B', 'Orient-RE-AV0002S00B', 'Orient-RE-AV0002S00B.png', 'Đồng hồ Nam Orient', 0, 16070000, 0, 'Đồng hồ Orient', 'Đồng hồ Orient', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(31, 3, 'Đồng hồ Nam Orient SAK00002S0', 'Orient-SAK00002S0', 'Orient-SAK00002S0.png', 'Đồng hồ Nam Orient', 0, 8352000, 0, 'Đồng hồ Nam Orient', 'Đồng hồ Nam Orient', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(32, 5, 'Đồng hồ Nam Seiko 5 SNKK33K1', 'Seiko-5-SNKK33K1', 'Seiko-5-SNKK33K1.png', 'Đồng hồ Nam Seiko', 0, 2910000, 0, 'Đồng hồ Nam Seiko', 'Đồng hồ Nam Seiko', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(33, 5, 'Đồng hồ Nam Seiko 5 SNXF11K', 'Seiko-5-SNXF11K', 'Seiko-5-SNXF11K.png', 'Đồng hồ Nam Seiko', 0, 2190000, 2190000, 'Đồng hồ Nam Seiko', 'Đồng hồ Nam Seiko', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(34, 5, 'Đồng hồ Nam Seiko 5 SRP669K1', 'Seiko-5-SRP669K1', 'Seiko-5-SRP669K1.png', 'Đồng hồ Nam Seiko', 0, 6860000, 0, 'Đồng hồ Seiko', 'Đồng hồ Seiko', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(35, 5, 'Đồng hồ Nam Seiko SKS539P2', 'Seiko SKS539P2', 'Seiko-SKS539P2.png', 'Đồng hồ Nam Seiko', 0, 3930000, 0, 'Đồng hồ Seiko', 'Đồng hồ Seiko', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(36, 5, 'Đồng hồ Nam Seiko SSC067P1', 'Seiko-SSC067P1', 'Seiko-SSC067P1.png', 'Đồng hồ Nam Seiko', 0, 8402000, 0, 'Đồng hồ Seiko', 'Đồng hồ Seiko', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(37, 6, 'Đồng hồ Nam Tissot T063.610.16.087.00', 'Tissot-T063.610.16.087.00', 'Tissot-T063.610.16.087.00.png', 'Đồng hồ Nam Tissot', 0, 8930000, 0, 'Đồng hồ Tissot', 'Đồng hồ Tissot', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(38, 6, 'Đồng hồ Nam TISSOT T063.907.22.038.00', 'TISSOT-T063.907.22.038.00', 'TISSOT-T063.907.22.038.00.png', 'Đồng hồ Nam TISSOT', 0, 23850000, 0, 'Đồng hồ TISSOT', 'Đồng hồ TISSOT', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(39, 6, 'Đồng hồ Nam Tissot T086.407.11.061.10', 'Tissot-T086.407.11.061.10', 'Tissot-T086.407.11.061.10.png', 'Đồng hồ Nam Tissot', 0, 26710000, 0, 'Đồng hồ Tissot', 'Đồng hồ Tissot', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(40, 6, 'Đồng hồ Nam Tissot T109.410.17.077.00', 'Tissot-T109.410.17.077.00', 'Tissot-T109.410.17.077.00.png', 'Đồng hồ Nam Tissot', 0, 5920000, 0, 'Đồng hồ Tissot', 'Đồng hồ Tissot', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(41, 6, 'Đồng hồ Nam Tissot T109.610.16.031.00', 'Tissot-T109.610.16.031.00', 'Tissot-T109.610.16.031.00.png', 'Đồng hồ Nam Tissot', 0, 6190000, 6190000, 'Đồng hồ Nam Tissot', 'Đồng hồ Nam Tissot', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(42, 1, 'Đồng hồ Nữ Casio-A159WGED-1DF', 'Casio-A159WGED-1DF', 'Casio-A159WGED-1DF.png', 'Đồng hồ Nữ Casio', 0, 2468000, 0, 'Đồng hồ Nữ', 'Đồng hồ Nữ', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(43, 1, 'Đồng hồ Nữ Casio-A168WEGB-1BDF', 'Casio-A168WEGB-1BDF', 'Casio-A168WEGB-1BDF.png', 'Đồng hồ Nữ Casio', 0, 2186000, 0, 'Đồng hồ Nữ', 'Đồng hồ Nữ', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(44, 1, 'Đồng hồ Nữ Casio-A168WEM-2DF', 'Casio-A168WEM-2DF', 'Casio-A168WEM-2DF.png', 'Đồng hồ Nữ Casio', 0, 1645000, 0, 'Đồng hồ Nữ', 'Đồng hồ Nữ', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(45, 1, 'Đồng hồ Nữ Casio-A168WEM-7DF', 'Casio-A168WEM-7DF', 'Casio-A168WEM-7DF.png', 'Đồng hồ Nữ Casio', 0, 1645000, 0, 'Đồng hồ Nữ', 'Đồng hồ Nữ', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(46, 1, 'Đồng hồ Nữ Casio-B640WC-5ADF', 'Casio-B640WC-5ADF', 'Casio-B640WC-5ADF.png', 'Đồng hồ Nữ Casio', 0, 1739000, 0, 'Đồng hồ Nữ ', 'Đồng hồ Nữ ', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(47, 2, 'Đồng hồ Nữ CITIZEN-CT-EJ6072-55A', 'CITIZEN-CT-EJ6072-55A', 'CITIZEN-CT-EJ6072-55A.png', 'Đồng hồ Nữ CITIZEN', 0, 3590000, 0, 'Đồng hồ Nữ ', 'Đồng hồ Nữ ', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(48, 2, 'Đồng hồ Nữ CITIZEN-CT-EJ6112-52P', 'CITIZEN-CT-EJ6112-52P', 'CITIZEN-CT-EJ6112-52P.png', 'Đồng hồ Nữ CITIZEN', 0, 3420000, 0, 'Đồng hồ Nữ', 'Đồng hồ Nữ', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(49, 2, 'Đồng hồ Nữ CITIZEN-CT-EJ6140-57D', 'CITIZEN-CT-EJ6140-57D', 'CITIZEN-CT-EJ6140-57D.png', 'Đồng hồ Nữ CITIZEN', 0, 3660000, 0, 'Đồng hồ Nữ', 'Đồng hồ Nữ', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(50, 2, 'Đồng hồ Nữ CITIZEN-CT-EL3042-50P', 'CITIZEN-CT-EL3042-50P', 'CITIZEN-CT-EL3042-50P.png', 'Đồng hồ Nữ CITIZEN', 0, 4180000, 0, 'Đồng hồ Nữ', 'Đồng hồ Nữ', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(51, 2, 'Đồng hồ Nữ CITIZEN-CT-EX1471-16D', 'CITIZEN-CT-EX1471-16D', 'CITIZEN-CT-EX1471-16D.png', 'Đồng hồ Nữ CITIZEN', 0, 4850000, 0, 'Đồng hồ Nữ', 'Đồng hồ Nữ', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(52, 2, 'Đồng hồ Nữ CITIZEN-CT-EX1480-15D', 'CITIZEN-CT-EX1480-15D', 'CITIZEN-CT-EX1480-15D.png', 'Đồng hồ Nữ CITIZEN', 0, 5510000, 0, 'Đồng hồ Nữ', 'Đồng hồ Nữ', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(53, 6, 'Đồng hồ Nữ TISSOT-T055.217.11.018.00', 'TISSOT-T055.217.11.018.00', 'TISSOT-T055.217.11.018.00.png', 'Đồng hồ Nữ TISSOT', 0, 14190000, 0, 'Đồng hồ Nữ', 'Đồng hồ Nữ', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(54, 6, 'Đồng hồ Nữ TISSOT-T050.207.11.117.05', 'TISSOT-T050.207.11.117.05', 'TISSOT-T050.207.11.117.05.png', 'Đồng hồ Nữ TISSOT', 0, 21940000, 0, 'Đồng hồ Nữ', 'Đồng hồ Nữ', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(55, 6, 'Đồng hồ Nữ TISSOT-T050.207.37.017.04', 'TISSOT-T050.207.37.017.04', 'TISSOT-T050.207.37.017.04.png', 'Đồng hồ Nữ TISSOT', 0, 23130000, 0, 'Đồng hồ Nữ', 'Đồng hồ Nữ', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(56, 6, 'Đồng hồ Nữ TISSOT-T086.207.16.261.00', 'TISSOT-T086.207.16.261.00', 'TISSOT-T086.207.16.261.00.png', 'Đồng hồ Nữ TISSOT', 0, 23130000, 0, 'Đồng hồ Nữ', 'Đồng hồ Nữ', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(57, 6, 'Đồng hồ Nữ TISSOT-T097.007.11.113.00', 'TISSOT-T097.007.11.113.00', 'TISSOT-T097.007.11.113.00.png', 'Đồng hồ Nữ TISSOT', 0, 18360000, 0, 'Đồng hồ Nữ', 'Đồng hồ Nữ', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(61, 2, 'thienga', 'thienga', 'thienga.jpg', 'áđâsd', 1, 10000, 10000, 'áđá', 'áđá', '2019-11-20 08:40:26', 1, '2019-11-20 08:50:19', 1, 0),
(62, 2, 'thiendeptrai', 'thiendeptrai', 'thiendeptrai.jpg', 'rất đẹp trai', 2, 10000, 10000, 'yeah', 'rất là đẹp', '2019-11-21 00:27:16', 1, '2019-11-21 00:33:00', 1, 0),
(63, 3, 'F1', 'f1', 'f1.jpg', 'Đồng Hồ', 1, 10000, 10000, 'Ok', 'Thành CÔng', '2019-11-21 00:43:38', 1, '2019-11-21 02:28:11', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_slider`
--

CREATE TABLE `db_slider` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `position` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `db_slider`
--

INSERT INTO `db_slider` (`id`, `name`, `url`, `position`, `img`, `order`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'slideshow', '#', 'silder', 'banner-1.png', 0, '2019-11-28 17:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(2, 'slideshow', '#', 'silder', 'banner-2.png', 0, '2019-11-28 17:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(3, 'slideshow', '#', 'silder', 'banner-3.png', 0, '2019-11-28 17:00:00', 1, '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_topic`
--

CREATE TABLE `db_topic` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parentid` int(11) UNSIGNED NOT NULL,
  `order` int(11) UNSIGNED NOT NULL,
  `metakey` varchar(150) NOT NULL,
  `metadesc` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_user`
--

CREATE TABLE `db_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `name` varchar(225) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `access` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `db_user`
--

INSERT INTO `db_user` (`id`, `fullname`, `name`, `password`, `email`, `gender`, `phone`, `img`, `access`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Phạm Minh Thiện', 'admin', '$2y$10$xrMOV1hxlxMYSk3/Y12oiOHh36VdauxYbH54TPXM2dYHfPVAVAuAi', 'thien.phamminhstu@gmail.com', 1, '0356581777', NULL, 1, '2019-11-19 17:00:00', 1, '0000-00-00 00:00:00', 1, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `db_category`
--
ALTER TABLE `db_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_contact`
--
ALTER TABLE `db_contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_menu`
--
ALTER TABLE `db_menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_order`
--
ALTER TABLE `db_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_orderdetail`
--
ALTER TABLE `db_orderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_post`
--
ALTER TABLE `db_post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_product`
--
ALTER TABLE `db_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catid` (`catid`);

--
-- Chỉ mục cho bảng `db_slider`
--
ALTER TABLE `db_slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_topic`
--
ALTER TABLE `db_topic`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `db_category`
--
ALTER TABLE `db_category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `db_contact`
--
ALTER TABLE `db_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_menu`
--
ALTER TABLE `db_menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `db_order`
--
ALTER TABLE `db_order`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_orderdetail`
--
ALTER TABLE `db_orderdetail`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_post`
--
ALTER TABLE `db_post`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_product`
--
ALTER TABLE `db_product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `db_slider`
--
ALTER TABLE `db_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `db_topic`
--
ALTER TABLE `db_topic`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_user`
--
ALTER TABLE `db_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `db_product`
--
ALTER TABLE `db_product`
  ADD CONSTRAINT `db_product_ibfk_1` FOREIGN KEY (`catid`) REFERENCES `db_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

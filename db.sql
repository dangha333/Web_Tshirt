-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 14, 2025 at 10:55 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_tshirt`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hinh_anh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `lien_ket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `hinh_anh`, `lien_ket`, `trang_thai`) VALUES
(30, 'Chất riêng trên từng chiếc áo', './uploads/1744352537z6488555165836_925e5131e06dbe695c83a1e749d08f5e.jpg', 'BlackFriday', 1),
(31, 'Mặc là mê – Phối là đỉnh!', './uploads/1744352577z6488555009990_0fdad0befd545f9ed3ca83bfaaf1afe0.jpg', 'BlackFriday', 1);

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `ten_nguoi_binh_luan` varchar(255) NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_binh_luan` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `binh_luans`
--

INSERT INTO `binh_luans` (`id`, `san_pham_id`, `ten_nguoi_binh_luan`, `noi_dung`, `ngay_binh_luan`) VALUES
(30, 50, 'đặng thanh hà', 'a ', '2025-04-09 04:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int NOT NULL,
  `don_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL,
  `don_gia` decimal(10,2) NOT NULL,
  `tong_tien` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `don_hang_id`, `san_pham_id`, `so_luong`, `don_gia`, `tong_tien`) VALUES
(30, 43, 50, 1, '260000.00', '260000.00'),
(31, 44, 61, 1, '227000.00', '227000.00'),
(32, 45, 51, 3, '230000.00', '690000.00');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gio_hangs`
--

CREATE TABLE `chi_tiet_gio_hangs` (
  `id` int NOT NULL,
  `gio_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_san_phams`
--

CREATE TABLE `chi_tiet_san_phams` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `ma_san_pham` varchar(50) NOT NULL,
  `mo_ta_chi_tiet` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `so_luong_ton` int NOT NULL,
  `trang_thai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_san_phams`
--

INSERT INTO `chi_tiet_san_phams` (`id`, `san_pham_id`, `ma_san_pham`, `mo_ta_chi_tiet`, `so_luong_ton`, `trang_thai`) VALUES
(23, 50, 'SP1042', 'Nâng cấp trang phục nữ tính của nàng bằng chiếc áo phông cách điệu đầy ấn tượng này. Đây là thiết kế mới mẻ, trẻ trung với phần cổ lệch và form dáng ôm co giãn giúp tôn lên đường cong cơ thể. Áo cho cảm giác mặc mềm mại, thoải mái đồng thời toát lên nét thanh lịch, trẻ trung.\r\n', 20, 1),
(25, 51, 'SP10420', 'Nâng cấp trang phục nữ tính của nàng bằng chiếc áo phông cách điệu đầy ấn tượng này. Đây là thiết kế mới mẻ, trẻ trung với phần cổ lệch và form dáng ôm co giãn giúp tôn lên đường cong cơ thể. Áo cho cảm giác mặc mềm mại, thoải mái đồng thời toát lên nét thanh lịch, trẻ trung.\r\n', 50, 1),
(26, 52, 'SP10444', 'Nâng cấp trang phục nữ tính của nàng bằng chiếc áo phông cách điệu đầy ấn tượng này. Đây là thiết kế mới mẻ, trẻ trung với phần cổ lệch và form dáng ôm co giãn giúp tôn lên đường cong cơ thể. Áo cho cảm giác mặc mềm mại, thoải mái đồng thời toát lên nét thanh lịch, trẻ trung.\r\n', 50, 1),
(27, 53, 'SP10442', 'Nâng cấp trang phục nữ tính của nàng bằng chiếc áo phông cách điệu đầy ấn tượng này. Đây là thiết kế mới mẻ, trẻ trung với phần cổ lệch và form dáng ôm co giãn giúp tôn lên đường cong cơ thể. Áo cho cảm giác mặc mềm mại, thoải mái đồng thời toát lên nét thanh lịch, trẻ trung.\r\n', 50, 1),
(28, 54, 'SP104422', 'Nâng cấp trang phục nữ tính của nàng bằng chiếc áo phông cách điệu đầy ấn tượng này. Đây là thiết kế mới mẻ, trẻ trung với phần cổ lệch và form dáng ôm co giãn giúp tôn lên đường cong cơ thể. Áo cho cảm giác mặc mềm mại, thoải mái đồng thời toát lên nét thanh lịch, trẻ trung.\r\n', 50, 1),
(29, 55, 'SP10433', 'Nâng cấp trang phục nữ tính của nàng bằng chiếc áo phông cách điệu đầy ấn tượng này. Đây là thiết kế mới mẻ, trẻ trung với phần cổ lệch và form dáng ôm co giãn giúp tôn lên đường cong cơ thể. Áo cho cảm giác mặc mềm mại, thoải mái đồng thời toát lên nét thanh lịch, trẻ trung.\r\n', 50, 1),
(31, 57, 'SP10441', 'Nâng cấp trang phục nữ tính của nàng bằng chiếc áo phông cách điệu đầy ấn tượng này. Đây là thiết kế mới mẻ, trẻ trung với phần cổ lệch và form dáng ôm co giãn giúp tôn lên đường cong cơ thể. Áo cho cảm giác mặc mềm mại, thoải mái đồng thời toát lên nét thanh lịch, trẻ trung.\r\n', 50, 1),
(32, 58, 'SP1042221', 'Nâng cấp trang phục nữ tính của nàng bằng chiếc áo phông cách điệu đầy ấn tượng này. Đây là thiết kế mới mẻ, trẻ trung với phần cổ lệch và form dáng ôm co giãn giúp tôn lên đường cong cơ thể. Áo cho cảm giác mặc mềm mại, thoải mái đồng thời toát lên nét thanh lịch, trẻ trung.\r\n', 50, 1),
(33, 59, 'SP104212', 'Nâng cấp trang phục nữ tính của nàng bằng chiếc áo phông cách điệu đầy ấn tượng này. Đây là thiết kế mới mẻ, trẻ trung với phần cổ lệch và form dáng ôm co giãn giúp tôn lên đường cong cơ thể. Áo cho cảm giác mặc mềm mại, thoải mái đồng thời toát lên nét thanh lịch, trẻ trung.\r\n', 50, 1),
(34, 60, 'SP10472', 'Nâng cấp trang phục nữ tính của nàng bằng chiếc áo phông cách điệu đầy ấn tượng này. Đây là thiết kế mới mẻ, trẻ trung với phần cổ lệch và form dáng ôm co giãn giúp tôn lên đường cong cơ thể. Áo cho cảm giác mặc mềm mại, thoải mái đồng thời toát lên nét thanh lịch, trẻ trung.\r\n', 50, 1),
(35, 61, 'SP10461', 'Nâng cấp trang phục nữ tính của nàng bằng chiếc áo phông cách điệu đầy ấn tượng này. Đây là thiết kế mới mẻ, trẻ trung với phần cổ lệch và form dáng ôm co giãn giúp tôn lên đường cong cơ thể. Áo cho cảm giác mặc mềm mại, thoải mái đồng thời toát lên nét thanh lịch, trẻ trung.\r\n', 50, 1),
(36, 62, 'SP104421', 'Nâng cấp trang phục nữ tính của nàng bằng chiếc áo phông cách điệu đầy ấn tượng này. Đây là thiết kế mới mẻ, trẻ trung với phần cổ lệch và form dáng ôm co giãn giúp tôn lên đường cong cơ thể. Áo cho cảm giác mặc mềm mại, thoải mái đồng thời toát lên nét thanh lịch, trẻ trung.\r\n', 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` int NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten_danh_muc`, `trang_thai`) VALUES
(1, 'Áo thun nam ', 1),
(2, 'Áo thun nữ ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int NOT NULL,
  `ma_don_hang` varchar(50) NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `ho_ten_nguoi_nhan` varchar(100) NOT NULL,
  `sdt_nguoi_nhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email_nguoi_nhan` varchar(100) DEFAULT NULL,
  `dia_chi_nguoi_nhan` text NOT NULL,
  `ngay_dat_hang` datetime NOT NULL,
  `tong_tien` decimal(10,2) DEFAULT NULL,
  `ghi_chu` varchar(200) NOT NULL,
  `phuong_thuc_thanh_toan_id` int DEFAULT NULL,
  `trang_thai_don_hang_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ma_don_hang`, `tai_khoan_id`, `ho_ten_nguoi_nhan`, `sdt_nguoi_nhan`, `email_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat_hang`, `tong_tien`, `ghi_chu`, `phuong_thuc_thanh_toan_id`, `trang_thai_don_hang_id`) VALUES
(43, 'DH137', 11, 'đặng thanh hà', '336423301', 'dangha333@gmail.com', 'Đội 2 đại Lan', '2025-04-14 10:09:58', '310000.00', '', 1, 3),
(44, 'DH487', 11, 'đặng thanh hà', '336423301', 'dangha333@gmail.com', 'Đội 2 đại Lan', '2025-04-14 10:36:05', '277000.00', '', 1, 7),
(45, 'DH958', 11, 'đặng thanh hà', '336423301', 'dangha333@gmail.com', 'Đội 2 đại Lan', '2025-04-14 10:37:05', '740000.00', '', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` int NOT NULL,
  `tai_khoan_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gio_hangs`
--

INSERT INTO `gio_hangs` (`id`, `tai_khoan_id`) VALUES
(28, 3),
(27, 8),
(29, 9),
(30, 11);

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_san_phams`
--

CREATE TABLE `hinh_anh_san_phams` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `album_hinh_anh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hinh_anh_san_phams`
--

INSERT INTO `hinh_anh_san_phams` (`id`, `san_pham_id`, `album_hinh_anh`) VALUES
(1, 24, ''),
(2, 28, './uploads/1731593916279749712_530299182020173_5296107756670684214_n.jpg'),
(3, 28, './uploads/1731593916IMG-0380.jpg'),
(4, 28, './uploads/1731593916IMG-1159.jpg'),
(5, 29, './uploads/1731593926279749712_530299182020173_5296107756670684214_n.jpg'),
(6, 29, './uploads/1731593926IMG-0380.jpg'),
(7, 29, './uploads/1731593926IMG-1159.jpg'),
(8, 31, './uploads/1731662349IMG-0380.jpg'),
(9, 31, './uploads/1731662349IMG-1159.jpg'),
(10, 31, './uploads/1731662349snapedit_1728291327469.jpg'),
(11, 35, './uploads/17321911596735fdac6bdf4_IMG-1159.jpg'),
(12, 36, './uploads/17322019441731886049sp5.jpg'),
(13, 37, './uploads/17322056284.jpg'),
(14, 38, './uploads/17322057215.jpg'),
(15, 39, './uploads/17322058006.jpg'),
(16, 39, './uploads/17322058008.jpg'),
(17, 40, './uploads/1733031072a1.jpg'),
(18, 40, './uploads/1733031072a1-1.jpg'),
(19, 40, './uploads/1733031072a1-2.jpg'),
(20, 40, './uploads/1733031072a1-3.jpg'),
(21, 40, './uploads/1733031072a1-4.jpg'),
(22, 41, './uploads/1733032777a1.jpg'),
(23, 41, './uploads/1733032777a1-1.jpg'),
(24, 41, './uploads/1733032777a1-2.jpg'),
(25, 41, './uploads/1733032777a1-3.jpg'),
(26, 41, './uploads/1733032777a1-4.jpg'),
(27, 42, './uploads/1733254619Vong-tay-bac-theo-cap-hinh-vong-dan-nhau-LILI_845123-01-400x400.jpg'),
(28, 43, './uploads/1733255275Vong-tay-bac-dinh-da-Zircon-The-Beauty-LILI_421447-01-400x400.jpg'),
(29, 43, './uploads/1733255275Lac-tay-bac-nu-dinh-da-CZ-The-Beauty-LILI_421447_12-400x400.jpg'),
(30, 44, './uploads/1733255490Lac-tay-bac-cap-doi-tinh-yeu-You-Complete-Me-LILI_552289_4-400x400.jpg'),
(31, 44, './uploads/1733255490Lac-tay-bac-cap-doi-tinh-yeu-You-Complete-Me-LILI_552289_5-400x400.jpg'),
(32, 45, './uploads/1733256302Lac-tay-bac-nu-dinh-da-CZ-trai-tim-vinh-cuu-LILI_167424_1-400x400.jpg'),
(33, 45, './uploads/1733256302Lac-tay-bac-nu-dinh-da-CZ-trai-tim-vinh-cuu-LILI_167424_4-400x400.jpg'),
(34, 46, './uploads/1733257283Bong-tai-bac-nu-dinh-da-CZ-hinh-nhung-bong-hoa-Luu-ly-LILI_148289_36-400x400.jpg'),
(35, 46, './uploads/1733257283Bong-tai-bac-dinh-da-Zircon-hinh-nhung-bong-hoa-Luu-ly-LILI_148289-01-400x400.jpg'),
(36, 47, './uploads/1733257737Bong-tai-bac-nu-dinh-da-CZ-hinh-tho-ngam-trang-LILI_924964_1-400x400.jpg'),
(37, 47, './uploads/1733257737Bong-tai-bac-nu-dinh-da-CZ-hinh-tho-ngam-trang-LILI_924964_5-400x400.jpg'),
(38, 48, './uploads/1733257968Nhan-doi-bac-hiep-si-va-cong-chua-dinh-da-CZ-LILI_819229_4-400x400.jpg'),
(39, 48, './uploads/1733257968Nhan-doi-bac-hiep-si-va-cong-chua-dinh-da-CZ-LILI_819229_3-400x400.jpg'),
(40, 50, './uploads/1744196061ao-phong-nam-sieu-mong-yody-MATS25S036-SK002 (7).webp'),
(41, 50, './uploads/1744196061ao-phong-nam-sieu-mong-yody-MATS25S036-SK002 (6).webp'),
(42, 50, './uploads/1744196061ao-phong-nam-sieu-mong-yody-MATS25S036-SK002 (3).webp'),
(43, 51, './uploads/1744196195ao-thun-nam-yody-TSM7131-GH1 (4).webp'),
(44, 51, './uploads/1744196195ao-thun-nam-yody-TSM7131-GH1 (6).webp'),
(45, 51, './uploads/1744196195ao-thun-nam-yody-TSM7131-GH1 (3).webp'),
(46, 52, './uploads/1744196265ao-phong-tay-raglan-yody-MATS25S028-SB009 (6).webp'),
(47, 52, './uploads/1744196265ao-phong-tay-raglan-yody-MATS25S028-SB009 (3).webp'),
(48, 52, './uploads/1744196265ao-phong-tay-raglan-yody-MATS25S028-SB009 (2).webp'),
(49, 53, './uploads/1744196377ao-thun-nam-yody-TSM7188-TRA (4).webp'),
(50, 53, './uploads/1744196377ao-thun-nam-yody-TSM7188-TRA (6).webp'),
(51, 53, './uploads/1744196377ao-thun-nam-yody-TSM7188-TRA (3).webp'),
(52, 54, './uploads/1744196461ao-thun-nam-yody-TSM7194-DEN (2).webp'),
(53, 54, './uploads/1744196461ao-thun-nam-yody-TSM7194-DEN (1)(1).webp'),
(54, 54, './uploads/1744196461ao-thun-nam-yody-TSM7194-DEN (6).webp'),
(55, 55, './uploads/1744196854ao-thun-nam-yody-TSM7177-TRA, QSM7031-TIT ,(4).webp'),
(56, 55, './uploads/1744196854ao-thun-nam-yody-TSM7177-TRA, QSM7031-TIT ,(3).webp'),
(57, 55, './uploads/1744196854ao-thun-nam-yody-TSM7177-TRA, QSM7031-TIT ,(8).webp'),
(58, 56, './uploads/1744196966ao-thun-thu-dong-giu-nhiet-nu-yody-ATN7009-XAM, CJN6008-XDM (7).webp'),
(59, 56, './uploads/1744196966ao-thun-thu-dong-giu-nhiet-nu-yody-ATN7009-XAM, CJN6008-XDM (6).webp'),
(60, 56, './uploads/1744196966ao-thun-thu-dong-giu-nhiet-nu-yody-ATN7009-XAM, CJN6008-XDM (5).webp'),
(61, 57, './uploads/1744197036ao-thun-nu-thoi-trang-yody-TSN7294-DEN (3).webp'),
(62, 57, './uploads/1744197036ao-thun-nu-thoi-trang-yody-TSN7294-DEN (7).webp'),
(63, 57, './uploads/1744197036ao-thun-nu-thoi-trang-yody-TSN7294-DEN (5).webp'),
(64, 58, './uploads/1744197098ao-phong-co-tron-yody-WCTS25S247-SK002 (4).webp'),
(65, 58, './uploads/1744197098ao-phong-co-tron-yody-WCTS25S247-SK002 (3).webp'),
(66, 58, './uploads/1744197098ao-phong-co-tron-yody-WCTS25S247-SK002 (2).webp'),
(67, 59, './uploads/1744197154WCTS25S004-SK002 (4).webp'),
(68, 59, './uploads/1744197154WCTS25S004-SK002 (5).webp'),
(69, 59, './uploads/1744197154WCTS25S004-SK002 (2).webp'),
(70, 60, './uploads/1744197499a-thun-tre-va-nu-yody-ATN7024-DDO QAN7118-BEE (1).webp'),
(71, 60, './uploads/1744197499a-thun-tre-va-nu-yody-ATN7024-DDO (1).webp'),
(72, 60, './uploads/1744197499a-thun-tre-va-nu-yody-ATN7024-DDO (9).webp'),
(73, 61, './uploads/1744197556ao-thu-dong-nu-tre-vai-yody-ATN7020-NAU, CJN6008-XDM (3).webp'),
(74, 61, './uploads/1744197556ao-thu-dong-nu-tre-vai-yody-ATN7020-NAU, CJN6008-XDM (6).webp'),
(75, 61, './uploads/1744197556ao-thu-dong-nu-tre-vai-yody-ATN7020-NAU, CJN6008-XDM (5).webp'),
(76, 62, './uploads/1744197623ao-thun-nu-yody-TSN7136-DOD CVN7058-DEN (1).webp'),
(77, 62, './uploads/1744197623ao-thun-nu-yody-TSN7136-DOD CVN7058-DEN (4).webp'),
(78, 62, './uploads/1744197623ao-thun-nu-yody-TSN7136-DOD CVN7058-DEN (3).webp'),
(79, 63, './uploads/1744624711iphone-14_1.webp'),
(80, 64, './uploads/17446266941a1c3061a40c82ee90478476e51a56e2.webp');

-- --------------------------------------------------------

--
-- Table structure for table `khuyen_mais`
--

CREATE TABLE `khuyen_mais` (
  `id` int NOT NULL,
  `ten_khuyen_mai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ma_khuyen_mai` varchar(50) DEFAULT NULL,
  `mo_ta` text,
  `giam_gia` decimal(6,2) DEFAULT NULL,
  `ngay_bat_dau` date DEFAULT NULL,
  `ngay_ket_thuc` date DEFAULT NULL,
  `trang_thai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `khuyen_mais`
--

INSERT INTO `khuyen_mais` (`id`, `ten_khuyen_mai`, `ma_khuyen_mai`, `mo_ta`, `giam_gia`, `ngay_bat_dau`, `ngay_ket_thuc`, `trang_thai`) VALUES
(1, 'Giảm giá mùa hè', '345', 'Giảm giá 20% cho tất cả sản phẩm mùa hè', '20.00', '2024-06-01', '2024-08-31', 1),
(2, 'Khuyến mãi Giáng Sinh', '123', 'Giảm giá đặc biệt mùa Giáng Sinh', '25.00', '2024-12-01', '2024-12-25', 1),
(3, 'Black Friday', '566', 'Giảm giá lớn nhân dịp Black Friday', '50.00', '2024-11-30', '2024-11-29', 2),
(4, 'Tết Nguyên Đán', '111Ap', 'Khuyến mãi đặc biệt mừng Tết Nguyên Đán', '30.00', '2025-01-10', '2025-02-10', 1),
(5, 'Giảm giá 8/8', 'AP123', 'Giảm ngay 50.000 cho đơn từ 200.000 khi mua sắm tại các danh mục Nhẫn Đính Kim Cương', '50.00', '2024-11-01', '2024-11-10', 1),
(7, 'Giảm giá cuối năm', '333', 'Khuyến mãi giảm giá lên đến 70% vào dịp cuối năm', '70.00', '2024-11-15', '2024-11-22', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dungs`
--

CREATE TABLE `nguoi_dungs` (
  `id` int NOT NULL,
  `ho_ten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `mat_khau` varchar(125) NOT NULL,
  `so_dien_thoai` varchar(12) NOT NULL,
  `dia_chi` varchar(125) NOT NULL,
  `vai_tro` enum('Admin','User') DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nguoi_dungs`
--

INSERT INTO `nguoi_dungs` (`id`, `ho_ten`, `email`, `mat_khau`, `so_dien_thoai`, `dia_chi`, `vai_tro`) VALUES
(1, 'Đàm Đức Thịnh', 'thinhdepzaivl@gmail.com', 'hangu', '0985671234', 'Hà Nội city ', 'User'),
(3, 'thinhj', 'thinhddph51501@gmail.com', '12435', '07865746', 'Hà Nội', 'User'),
(4, 'dsfsdfdsfsd', 'anhntph51526@gmail.com', 'fsfsdfsf', '7827528', 'Hà nội city', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `phuong_thuc_thanh_toans`
--

CREATE TABLE `phuong_thuc_thanh_toans` (
  `id` int NOT NULL,
  `phuong_thuc_thanh_toan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '1: ''Thanh toán tiền mặt khi giao hàng'' && 2: ''Thanh toán qua ví Momo, ZaloPay,...(Tiết kiệm 20.000đ)'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `phuong_thuc_thanh_toans`
--

INSERT INTO `phuong_thuc_thanh_toans` (`id`, `phuong_thuc_thanh_toan`) VALUES
(1, 'Thanh toán tiền mặt khi giao hàng'),
(2, 'Thanh toán qua ví Momo, ZaloPay,...(Tiết kiệm 20.000đ)');

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

CREATE TABLE `san_phams` (
  `id` int NOT NULL,
  `ten` varchar(255) NOT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gia_ban` decimal(10,0) NOT NULL,
  `gia_km` decimal(10,0) NOT NULL,
  `mo_ta` text NOT NULL,
  `so_luong` int NOT NULL,
  `date` date DEFAULT NULL,
  `trang_thai` int NOT NULL,
  `gia_nhap` decimal(10,0) NOT NULL,
  `danh_muc_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `ten`, `img`, `gia_ban`, `gia_km`, `mo_ta`, `so_luong`, `date`, `trang_thai`, `gia_nhap`, `danh_muc_id`) VALUES
(50, 'Áo Phông Nam Phối Vải Siêu Mỏng', './uploads/1744196061ao-phong-nam-sieu-mong-yody-MATS25S036-SK002 (2).webp', '269000', '260000', 'Mùa hè của bạn sẽ thoải mái, dễ chịu hơn nhờ có chiếc áo thun siêu mỏng này. Áo có đường cắt cắt công thái học phần nách giúp người mặc thoải mái vận động thể thao. Form dáng slimfit ôm nhẹ khỏe khoắn. Chất thun mát có khả năng chống tia UV, thấm hút mồ hôi hiệu quả.', 14, '2025-04-09', 1, '300000', 1),
(51, 'Áo Phông Nam Clean Việt Nam Do Great Things', './uploads/1744196195ao-thun-nam-yody-TSM7131-GH1 (2).webp', '239000', '230000', 'Kiểu dáng trẻ trung phù hợp mặc hằng ngày, dễ dàng phối đồ. Làm từ chất liệu tái chế mềm mại, thông thoáng, thấm hút tốt, co giãn nhẹ mang lại cảm giác dễ chịu, tự tin khi hoạt động. Chống nhăn nhàu, bền màu luôn giữ form dáng đẹp như mới.\r\n', 20, '2025-04-09', 1, '300000', 1),
(52, ' Áo Phông Tay Raglan Dải Chỉ', './uploads/1744196265ao-phong-tay-raglan-yody-MATS25S028-SB009.webp', '239000', '230000', 'Áo Phông Tay Raglan Dải Chỉ với điểm nhấn là chi tiết in phản quang thân sau Xẻ tà Đa năng. Thiết kế cắt Tay Raglan Form dáng slimfit mang lại cảm giác thể thao, khỏe khoắn. Áo cho cảm giác mặc mềm mại, mịn màng. Công nghệ dệt Jacquard tạo các họa tiết lỗ độc đáo giúp áo thấm hút tốt, khô nhanh và vô cùng thông thoáng.', 20, '2025-04-09', 1, '300000', 1),
(53, ' Áo thun Nam Basic Slimfit Thun Rib Cotton Mềm', './uploads/1744196377ao-thun-nam-yody-TSM7188-TRA (1).webp', '149000', '149000', 'Everyday Basics: SẢN PHẨM TỐT - GIÁ TRẢI NGHIỆM\r\nMềm mại - Thấm hút - Co giãn hiệu quả. Áo thun nam basic Everyday YODY là bí kíp cho mùa hè thoải mái của các anh. Một thiết kế đơn giản, bảng màu phong phú và tối ưu sự thoải mái trong thời tiết nắng nóng mùa hè. Sở hữu ngay nhé!', 20, '2025-04-09', 1, '200000', 1),
(54, 'T-shirt Nam Regular Phối Lé Vai', './uploads/1744196461ao-thun-nam-yody-TSM7194-DEN (5).webp', '149000', '149000', 'Áo thun nam regular phối lé vai với kiểu dệt Interlock hai mặt cao cấp, co giãn 4 chiều, thoải mái vận động. Vải mềm mịn, thoáng mát, bền màu. Thiết kế trẻ trung, form dáng chuẩn, kết hợp hoàn hảo yếu tố phong cách và thoải mái.', 20, '2025-04-09', 1, '200000', 1),
(55, 'Áo Phông Nam Slim Fit Rib', './uploads/1744196854ao-thun-nam-yody-TSM7177-TRA, QSM7031-TIT ,(7).webp', '199000', '149000', 'Áo thun nam YODY với thành phần ba loại sợi Cotton, Viscose, Spandex kết hợp cùng kiểu dệt rib nên sở hữu nhiều ưu điểm nổi bật. Áo cho cảm giác mặc mềm mướt trên da và vô cùng thông thoáng, phù hợp mặc trong mùa xuân hè. Sự co giãn đàn hồi tốt cũng giúp chiếc áo này xứng đáng trở thành món đồ yêu thích cho thời trang năng động hàng ngày của các anh.', 20, '2025-04-09', 1, '200000', 1),
(57, 'T-shirt Nữ Cổ Tim Dáng Slimfit', './uploads/1744197036ao-thun-nu-thoi-trang-yody-TSN7294-DEN (1).webp', '169000', '169000', 'Một chiếc áo thun basic cổ tim vô cùng đơn giản nhưng mang đến sự thoải mái ngay trên da. Áo được kết hợp giữa sợi bamboo lành tính, mềm thoáng, thân thiện môi trường cùng với sợ spandex giúp co giãn đàn hồi hiệu quả. Trong tủ đồ hàng ngày của nàng nhất định nên sở hữu một chiếc t-shirt đơn giản nhưng hiệu quả phối đồ cao như này.', 20, '2025-04-09', 1, '200000', 2),
(58, 'Áo Phông Thun Rib Cổ Tròn Cao Tay Lỡ', './uploads/1744197098ao-phong-co-tron-yody-WCTS25S247-SK002 (1).webp', '149000', '149000', 'Áo thun basic với thiết kế cổ cao giúp chị em dễ dạng mix & match với nhiều item thú vị khác như áo sơ mi, áo jeans khoác ngoài... tạo cá tính khác biệt. Sản phẩm siêu co giãn, đàn hồi, mang lại cảm giác mềm mại - thông thoáng khi mặc. Thiết kế cơ bản với bảng màu trung tính vô cùng dễ mặc. Sở hữu ngay!', 20, '2025-04-09', 1, '200000', 2),
(59, 'Áo Phông In Hình', './uploads/1744197154WCTS25S004-SK002.webp', '199000', '199000', 'Áo thun nữ với chất liệu Single Cotton Modal Spandex mềm mại, thông thoáng và co giãn tốt, mang lại sự thoải mái và thấm hút tối ưu. Dáng Slimfit tôn lên đường nét cơ thể, tạo vẻ ngoài gọn gàng và năng động. Điểm nhấn với hình in trước ngực đơn giản, tinh tế, đường can sườn thon thả và gấu đuôi tôm trẻ trung. Sản phẩm dễ dàng kết hợp cùng quần jean, quần short hoặc chân váy, lý tưởng cho các cô nàng yêu thích sự thoải mái và thời trang.', 200, '2025-04-09', 1, '200000', 2),
(60, 'Áo Thu Đông Nữ Trễ Vai', './uploads/1744197499a-thun-tre-va-nu-yody-ATN7024-DDO (8).webp', '149000', '149000', 'Mùa lạnh cũng không ngăn cản chị em mặc đẹp với những item của nhà YODY. Chiếc áo thu đông này sẽ giúp nàng diện xinh nữ tính lại vô cùng mềm mại, an tâm khi sử dụng. Thiết kế trễ vai tạo điểm nhấn riêng biệt. Sản phẩm sử dụng sợi có nguồn gốc lành tính nên vô cùng thân thiện môi trường, bền đẹp theo thời gian.', 200, '2025-04-09', 1, '200000', 2),
(61, ' Áo Thu Đông Nữ Trễ Vai', './uploads/1744197556ao-thu-dong-nu-tre-vai-yody-ATN7020-NAU, CJN6008-XDM (4).webp', '227000', '227000', 'Áo xinh cho nàng tự tin thả dáng. Thiết kế trễ vai giúp chị em khéo léo khoe đôi vai thon gọn của mình. Chất vải mềm mại, mướt trên da lại siêu co giãn đàn hồi, ôm gọn eo nàng. Đây xứng đáng là một item đinh giúp chị em nổi bật mỗi khi đi làm, đi chơi.', 51, '2025-04-09', 1, '300000', 2),
(62, ' Áo Phông Nữ Cách Điệu', './uploads/1744197623ao-thun-nu-yody-TSN7136-DOD CVN7058-DEN (2).webp', '169000', '169000', 'Nâng cấp trang phục nữ tính của nàng bằng chiếc áo phông cách điệu đầy ấn tượng này. Đây là thiết kế mới mẻ, trẻ trung với phần cổ lệch và form dáng ôm co giãn giúp tôn lên đường cong cơ thể. Áo cho cảm giác mặc mềm mại, thoải mái đồng thời toát lên nét thanh lịch, trẻ trung.', 50, '2025-04-09', 1, '200000', 2),
(64, 'Áo Phông In Chữ', './uploads/1744626694941c5e1d514d3c9c49e5d0f08a2fc10d.webp', '200000', '200000', 'a', 20, '2025-04-15', 1, '199000', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoans`
--

CREATE TABLE `tai_khoans` (
  `id` int NOT NULL,
  `ho_ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `anh_dai_dien` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ngay_sinh` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` int NOT NULL,
  `gioi_tinh` int NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `mat_khau` int NOT NULL,
  `chuc_vu_id` int NOT NULL,
  `trang_thai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tai_khoans`
--

INSERT INTO `tai_khoans` (`id`, `ho_ten`, `anh_dai_dien`, `ngay_sinh`, `email`, `so_dien_thoai`, `gioi_tinh`, `dia_chi`, `mat_khau`, `chuc_vu_id`, `trang_thai`) VALUES
(1, 'nguyenvanchien ', '', '2024-11-07', 'chiennvph51500@gmail.com', 338506483, 1, 'so 1 ha noi', 1, 1, '1'),
(2, 'chiennnguynvan', '', '2024-11-19', 'chienn@gmail.com', 338506458, 1, 'xp vip', 123456, 2, '2'),
(3, 'Tuấn Anh', '', '2024-01-01', 'anhntph51526@gmail.com', 325687430, 1, '', 123456, 2, '1'),
(5, 'dsád', '', '2024-01-01', 'tanh24@gmail.com', 9321312, 1, '', 123456, 2, '1'),
(6, 'dsád', '', '2024-01-01', 'anhntph5152666@gmail.com', 93213213, 1, '', 123456, 2, '1'),
(7, 'thinhj', '', '2024-01-01', 'thinhddph51501@gmail.com', 234234, 1, '', 123, 2, '1'),
(8, 'thinhj', '', '2024-01-01', 'thinhdd@gmail.com', 234234, 1, '', 1, 2, '1'),
(9, 'Đặng Thanh Hà', '', '2024-12-05', 'dangha333', 12912821, 1, 'Kkhkhkj', 1, 2, '1'),
(10, 'đặng thanh hà', '', '2024-01-01', 'dangha333', 336423301, 1, '', 123, 2, '1'),
(11, 'đặng thanh hà', '', '2024-01-01', 'dangha333@gmail.com', 336423301, 1, '', 12, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lienhe`
--

CREATE TABLE `tbl_lienhe` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `so_dien_thoai` int NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `ngay_gio` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_lienhe`
--

INSERT INTO `tbl_lienhe` (`id`, `name`, `so_dien_thoai`, `email`, `noi_dung`, `ngay_gio`) VALUES
(1, 'chiennnll', 338506483, 'chien@gmail.com', 'dfvgfbdsx', '2024-11-01 16:18:00'),
(2, 'thinhchi1444', 338506458, 'thinh@gmail.com', 'rfsgdhbazx', '2024-11-01 16:18:00'),
(6, 'dấ', 53543, 'thinh@gmail.com', 'đấ', '2024-11-01 16:18:00'),
(7, 'dsfsfds', 242423, 'thinh@gmail.com', 'fsd', '2024-11-01 16:18:00'),
(8, 'Quốc phòng', 7865746, 'thinh1232@gmail.com', 'ytiukhjl', '2024-11-23 14:45:20'),
(14, 'sacda', 234234, 'damthinh03@gmail.com', 'ád', '2024-11-24 11:05:25'),
(16, 'thinh', 4532543, 'damthinh03@gmail.com', '123', '2024-11-26 14:03:17'),
(17, 'chien lo', 4532543, 'damthinh03@gmail.com', 'wefrdew', '2024-11-26 14:22:38'),
(18, 'Tien', 4532543, 'thinhddph51501@gmail.com', 'qwd', '2024-11-27 12:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `tin_tucs`
--

CREATE TABLE `tin_tucs` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `img` text NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tin_tucs`
--

INSERT INTO `tin_tucs` (`id`, `title`, `content`, `img`, `date`) VALUES
(16, 'SINH NHẬT 11 TUỔI ChillWear- ƯU ĐÃI TRI ÂN NGẬP TRÀN', '<p><strong>ChillWear chính thức kỷ niệm 11 năm phát triển và gửi lời tri ân sâu sắc đến quý khách hàng đã tin tưởng và đồng hành cùng thương hiệu trong suốt thời gian qua.</strong></p><p>Để đánh dấu cột mốc quan trọng này, ChillWear hân hạnh mang đến chuỗi chương trình đặc biệt, diễn ra từ ngày <strong>01/04 đến 30/04/2025</strong>, hứa hẹn mang đến những trải nghiệm mua sắm tuyệt vời với vô vàn ưu đãi hấp dẫn.</p><h2><strong>I. ĐỒNG GIÁ VÀ GIẢM GIÁ LÊN ĐẾN 40%</strong></h2><p><strong>Thời gian diễn ra: </strong>từ 01/04 - 23/04/2025</p><p><strong>Nội dung chương trình:</strong></p><ul><li><strong>Đồng giá</strong> áp dụng cho nhiều sản phẩm.</li><li><strong>Giảm giá lên đến 20%, 30%, 40%</strong> cho các sản phẩm chọn lọc.</li></ul><p><img src=\"https://m.yodycdn.com/products/1_m9ax78x28hyyfj8ukip.png\" alt=\"image\"></p><h2><strong>II. MUA CÀNG NHIỀU GIẢM CÀNG SÂU&nbsp;(01.04 - 30.04.2025)</strong></h2><p><strong>Thời gian diễn ra: </strong>từ 01/04 đến 30/04/2025</p><p><strong>Nội dung chương trình:</strong> Ưu đãi giảm giá trực tiếp trên đơn hàng nguyên giá trong tháng 4:</p><ul><li>Giảm <strong>100.000 VNĐ</strong> cho đơn hàng từ 1.099.000 VNĐ.</li><li>Giảm <strong>150.000 VNĐ</strong> cho đơn hàng từ 1.599.000 VNĐ.</li><li>Giảm <strong>200.000 VNĐ</strong> cho đơn hàng từ 2.099.000 VNĐ.</li><li>Giảm <strong>250.000 VNĐ</strong> cho đơn hàng từ 2.599.000 VNĐ.</li><li>Giảm <strong>300.000 VNĐ</strong> cho đơn hàng từ 3.099.000 VNĐ.</li></ul><p><img src=\"https://m.yodycdn.com/products/2_m9ax73bxr6di269wd2f.png\" alt=\"image\"></p><h2><strong>III. SINH NHẬT LINH ĐÌNH - KHAO DEAL CỰC CHẤT</strong></h2><h3><strong>100% nhận quà miễn phí khi checkin tại cửa hàng</strong></h3><p><strong>Thời gian diễn ra:</strong></p><ul><li>Giai đoạn 1: 09/04 - 13/04/2025</li><li>Giai đoạn 2: 16/04 - 20/04/2025</li></ul><p><strong>Nội dung chương trình:</strong></p><ul><li><strong>Bốc thăm may mắn:</strong> Khách hàng khi ghé cửa hàng ChillWear trong tháng 4 sẽ được&nbsp;tham gia Bốc thăm may mắn, 100% nhận quà hiện vật hoặc Voucher mua sắm:<ul><li>Voucher <strong>50.000 VNĐ</strong> cho đơn hàng nguyên giá từ <strong>299.000 VNĐ</strong>.</li><li>Voucher <strong>100.000 VNĐ</strong> cho đơn hàng nguyên giá từ <strong>599.000 VNĐ</strong>.</li></ul></li><li><strong>Thời hạn sử dụng voucher:</strong> Chỉ có giá trị trong vòng 5 ngày diễn ra chương trình BTTT tại cửa hàng.</li><li><strong>Quà hiện vật bao gồm:</strong> tất, găng tay, Cốc SS25, Áo Tshirt SS25 và các sản phẩm khác tùy theo từng cửa hàng</li></ul><h3><strong>Flash sale 11h lên đến 50%</strong></h3><p><strong>Thời gian diễn ra:</strong> từ 01/04 - 23/04/2025</p><p><strong>Nội dung chương trình:</strong></p><ul><li>Sản phẩm hot được mở bán với mức <strong>Giá sốc giảm từ 30% đến 50%</strong> trong các khung giờ <strong>11h - 13h và 23h - 1h</strong> hàng ngày trên toàn bộ kênh bán hàng của ChillWear.</li><li>Sản phẩm nguyên giá được giảm thêm <strong>20% &amp; 30%</strong>.</li><li><strong>Đặc biệt:</strong> Vào các ngày <strong>04.04, 15.04, 25.04</strong>, sàn thương mại điện tử của ChillWear sẽ triển khai <strong>Flashsale đặc biệt từ 11h - 15h và 20h - 02h sáng</strong>.</li></ul>', '../uploads/3. 1920x1080.png', '2025-04-11'),
(17, 'Unisex là gì? 4 hiểu lầm trầm trọng về thời trang unisex', '<p><i><strong>Xu hướng thời trang unisex chưa bao giờ hạ nhiệt nhất là đối với giới trẻ. Vậy thời trang unisex là gì, bạn đã thực sự hiểu style thời trang này hay đang có những hiểu lầm trầm trọng. Cùng YODY tìm hiểu về </strong></i><a href=\"https://yody.vn/post/cach-phoi-do-unisex\"><i><strong>thời trang unisex</strong></i></a><i><strong> và cách phối đồ phù hợp với mọi giới tính, giúp bạn tạo dựng phong cách thời trang năng động, phóng khoáng nhé.</strong></i></p><h2>1. Thời trang unisex là gì?</h2><h3>1.1 Khái niệm unisex là gì?</h3><p>Unisex hay còn gọi là phong cách phi giới tính, là thuật ngữ chỉ những sản phẩm thời trang hoặc đồ dùng phù hợp cho cả nam và nữ.</p><p>Khái niệm unisex là gì xuất hiện lần đầu trên tạp chí Life của Mỹ vào năm 1968, thể hiện xu hướng xóa bỏ ranh giới giới tính trong các thiết kế. Thời trang unisex phổ biến ở nhiều loại sản phẩm như quần áo, giày dép, mũ, kiểu tóc và phụ kiện, tất cả đều được thiết kế để phù hợp với mọi giới.</p><p><img src=\"https://m.yodycdn.com/products/unisexlagi1_m3o51an2hks7l57e24k.jpg\" alt=\"image\"></p><p>Đồ unisex mang ý nghĩa là dành cho cả hai giới, bất kể sự khác biệt về cấu trúc cơ thể. Ví dụ, một số phụ nữ thích mặc quần jean nam vì chúng thường có thiết kế thoải mái và không nhấn mạnh vào đường cong hông.</p><p>Tương tự, áo sơ mi nam với tay áo dài thường phù hợp hơn cho những người phụ nữ cao. Điều này cho thấy, quần áo nam có thể dễ dàng được cả nam và nữ sử dụng, trong khi quần áo nữ thường khó đáp ứng nhu cầu của cả hai giới.</p><p>Không chỉ quần áo, các sản phẩm khác như dụng cụ thể thao hay thiết bị tập luyện cũng là những món đồ unisex, có thể sử dụng linh hoạt mà không bị giới hạn bởi giới tính</p><h3>1.2 Thời trang unisex là gì?</h3><p>Thời trang unisex là những sản phẩm may mặc được thiết kế để phù hợp cho cả nam và nữ, không phân biệt giới tính. Trong nhiều thập kỷ, xã hội đã áp đặt các quy chuẩn về trang phục: nam giới thường được khuyến khích mặc quần tây, áo sơ mi, trong khi váy hoặc trang phục màu hồng lại dành riêng cho nữ giới. Tuy nhiên, thời trang unisex đã phá vỡ những giới hạn này, mang đến sự tự do trong cách ăn mặc mà không bị ràng buộc bởi giới tính.</p><p><img src=\"https://m.yodycdn.com/products/unisexlagi2_m3o51i29uuad88fhcuf.jpg\" alt=\"image\"></p><p>Không chỉ dừng lại ở quần áo, thời trang unisex còn là một tuyên ngôn về bình đẳng giới. Các nhà thiết kế và thương hiệu unisex mong muốn tạo ra sự cân bằng, phá vỡ các rào cản giới tính trong thời đại hiện nay.</p><p>Với phong cách chú trọng vào sự đơn giản, thoải mái, thời trang unisex không chỉ mang lại vẻ ngoài hiện đại, năng động mà còn có tính linh hoạt, phù hợp với mọi hoàn cảnh. Đây cũng là xu hướng mang tính chu kỳ, thường xuyên quay trở lại và không bao giờ lỗi thời.</p><h2>2. Items phổ biến cho thời trang unisex là gì?</h2><h3>2.1 Áo thun unisex</h3><p>Áo thun là món đồ không thể thiếu trong tủ đồ của các tín đồ thời trang unisex. Đây được coi là item cơ bản và linh hoạt nhất, dễ dàng kết hợp với nhiều kiểu trang phục khác nhau. Áo thun unisex thường được phối cùng quần jean, quần baggy, và thêm một vài phụ kiện như dây đeo lưng hay mũ bucket để tạo điểm nhấn.</p>', '../uploads/cach-phoi-do-unisex-yody-vn-30.jpg', '2025-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hangs`
--

CREATE TABLE `trang_thai_don_hangs` (
  `id` int NOT NULL,
  `trang_thai_don_hang` varchar(255) NOT NULL COMMENT '1="''Chờ xác nhận'',2= ''Đã xác nhận''',
  `ngay_tao` date DEFAULT NULL,
  `trang_thai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trang_thai_don_hangs`
--

INSERT INTO `trang_thai_don_hangs` (`id`, `trang_thai_don_hang`, `ngay_tao`, `trang_thai`) VALUES
(1, 'Chờ xác nhận', '2024-11-12', 1),
(2, 'Đã xác nhận', '2024-11-23', 2),
(3, 'Đang giao', '2024-11-07', 1),
(4, 'Đã giao', '2024-11-13', 2),
(5, 'Đã hoàn thành', '2024-11-03', 1),
(6, 'Đã thất bại', '2024-11-03', 2),
(7, 'Đã Hủy', '2024-11-22', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `don_hang_id` (`don_hang_id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gio_hang_id` (`gio_hang_id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `chi_tiet_san_phams`
--
ALTER TABLE `chi_tiet_san_phams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_san_pham` (`ma_san_pham`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_phuong_thuc` (`phuong_thuc_thanh_toan_id`),
  ADD KEY `FK_trang_thai` (`trang_thai_don_hang_id`),
  ADD KEY `FK_don_hangs_tai_khoans` (`tai_khoan_id`);

--
-- Indexes for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tai_khoan_id` (`tai_khoan_id`);

--
-- Indexes for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khuyen_mais`
--
ALTER TABLE `khuyen_mais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nguoi_dungs`
--
ALTER TABLE `nguoi_dungs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_san_phams_danh_mucs` (`danh_muc_id`);

--
-- Indexes for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tin_tucs`
--
ALTER TABLE `tin_tucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `chi_tiet_san_phams`
--
ALTER TABLE `chi_tiet_san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `khuyen_mais`
--
ALTER TABLE `khuyen_mais`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nguoi_dungs`
--
ALTER TABLE `nguoi_dungs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tin_tucs`
--
ALTER TABLE `tin_tucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD CONSTRAINT `binh_luans_ibfk_1` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD CONSTRAINT `chi_tiet_don_hangs_ibfk_1` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hangs` (`id`),
  ADD CONSTRAINT `chi_tiet_don_hangs_ibfk_2` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`);

--
-- Constraints for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD CONSTRAINT `chi_tiet_gio_hangs_ibfk_1` FOREIGN KEY (`gio_hang_id`) REFERENCES `gio_hangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chi_tiet_gio_hangs_ibfk_2` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chi_tiet_san_phams`
--
ALTER TABLE `chi_tiet_san_phams`
  ADD CONSTRAINT `chi_tiet_san_phams_ibfk_1` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD CONSTRAINT `FK_phuong_thuc` FOREIGN KEY (`phuong_thuc_thanh_toan_id`) REFERENCES `phuong_thuc_thanh_toans` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_trang_thai` FOREIGN KEY (`trang_thai_don_hang_id`) REFERENCES `trang_thai_don_hangs` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD CONSTRAINT `gio_hangs_ibfk_1` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`);

--
-- Constraints for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD CONSTRAINT `FK_san_phams_danh_mucs` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_mucs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

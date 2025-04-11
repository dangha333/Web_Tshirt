-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2024 at 07:18 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_Tshirt`
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
(25, 'Black Friday', './uploads/17318855981-4.jpg', 'Black Friday', 1),
(26, 'Black Friday', './uploads/17318856111-5.jpg', 'Black Friday', 1),
(27, 'Black Friday', './uploads/17318856771-6.jpg', 'Black Friday', 1),
(28, 'Black Friday', './uploads/17319132981-7.jpg', 'Black Friday', 1),
(29, 'Black Friday', './uploads/17319133081-8.jpg', 'Black Friday', 1);

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
(11, 13, 'Nguyễn Văn A', 'Sản phẩm này rất tốt, tôi rất thích chất lượng của nó!', '2024-11-17 01:10:34'),
(12, 13, 'thinhj', 'Mua về dùng rất tiện lợi, sẽ giới thiệu cho bạn bè.', '2024-11-17 01:10:34'),
(17, 9, 'Trần Thị B', 'Mua về dùng rất tiện lợi, sẽ giới thiệu cho bạn bè.', '2024-11-17 01:45:55'),
(18, 13, 'Lê Minh C', 'Chất lượng sản phẩm vượt ngoài mong đợi, tôi rất hài lòng.', '2024-11-17 01:45:55'),
(19, 14, 'Phan Quốc D', 'Sản phẩm này có thể cải thiện thêm chút về thiết kế, nhưng rất ổn.', '2024-11-17 01:45:55'),
(20, 15, 'Vũ Thị E', 'Không thích lắm, mong sản phẩm sẽ tốt hơn trong tương lai.', '2024-11-17 01:45:55'),
(22, 8, 'Nguyễn Văn A', 'Sản phẩm này rất tốt, tôi rất thích chất lượng của nó!', '2024-11-17 01:56:29'),
(23, 13, 'Trần Thị B', 'Mua về dùng rất tiện lợi, sẽ giới thiệu cho bạn bè.', '2024-11-17 01:56:29'),
(24, 14, 'Lê Minh C', 'Chất lượng sản phẩm vượt ngoài mong đợi, tôi rất hài lòng.', '2024-11-17 01:56:29'),
(25, 15, 'Phan Quốc D', 'Sản phẩm này có thể cải thiện thêm chút về thiết kế, nhưng rất ổn.', '2024-11-17 01:56:29'),
(26, 31, 'Vũ Thị E', 'Không thích lắm, mong sản phẩm sẽ tốt hơn trong tương lai.', '2024-11-17 01:56:29'),
(27, 31, 'thinh', 'dxfdf', '2024-11-30 03:49:20');

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
(1, 4, 14, 10, '10000.00', '100000.00'),
(2, 5, 8, 1, '10000.00', '10000.00'),
(3, 6, 15, 10, '120000.00', '1200000.00'),
(4, 24, 9, 5, '20000.00', '100000.00'),
(5, 25, 9, 5, '20000.00', '100000.00'),
(6, 25, 8, 1, '20000.00', '20000.00'),
(7, 26, 9, 10, '20000.00', '200000.00'),
(8, 26, 8, 10, '20000.00', '200000.00'),
(9, 27, 9, 1, '20000.00', '20000.00'),
(10, 27, 14, 1, '20000.00', '20000.00'),
(11, 28, 32, 1, '32000.00', '32000.00'),
(12, 29, 31, 1, '32000.00', '32000.00'),
(13, 30, 32, 4, '32000.00', '128000.00'),
(14, 31, 31, 1, '32000.00', '32000.00'),
(15, 32, 32, 1, '32000.00', '32000.00'),
(16, 33, 8, 1, '20000.00', '20000.00'),
(17, 33, 9, 1, '20000.00', '20000.00'),
(18, 34, 41, 1, '2000000.00', '2000000.00'),
(19, 35, 31, 9, '32000.00', '288000.00'),
(20, 36, 8, 7, '20000.00', '140000.00'),
(21, 37, 8, 9, '20000.00', '180000.00'),
(22, 37, 9, 4, '20000.00', '80000.00'),
(23, 38, 8, 3, '20000.00', '60000.00'),
(24, 38, 14, 1, '20000.00', '20000.00');

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

--
-- Dumping data for table `chi_tiet_gio_hangs`
--

INSERT INTO `chi_tiet_gio_hangs` (`id`, `gio_hang_id`, `san_pham_id`, `so_luong`) VALUES
(31, 27, 33, 1),
(32, 27, 32, 11),
(56, 28, 9, 1),
(57, 28, 15, 12);

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
(1, 8, 'SP008', 'Nhẫn bạc nữ đính kim cương Moissanite Aidan là một món trang sức sang trọng, thiết kế tinh tế với kim cương Moissanite cao cấp, nổi bật với độ sáng lấp lánh và độ bền vượt trội. Được chế tác từ bạc 925, chiếc nhẫn này không chỉ là một món đồ trang sức mà còn là biểu tượng của tình yêu vĩnh cửu và sự tinh tế. Với thiết kế hiện đại, nhẫn bạc nữ Aidan sẽ làm nổi bật vẻ đẹp tự nhiên của bạn, phù hợp với những dịp quan trọng như đính hôn, cưới hỏi hay các buổi tiệc sang trọng. Sản phẩm có sự kết hợp hoàn hảo giữa tính thời trang và chất lượng tuyệt vời, chắc chắn sẽ là lựa chọn lý tưởng cho những ai yêu thích sự hoàn hảo.', 2, 1),
(2, 9, 'SP009', 'Dây chuyền bạc nữ đính đá CZ cá tiên là một sản phẩm thanh lịch, nhẹ nhàng nhưng đầy lôi cuốn. Với thiết kế tinh tế, dây chuyền này không chỉ là một món trang sức mà còn là một biểu tượng của sự may mắn và thịnh vượng. Được làm từ bạc cao cấp, sản phẩm có độ sáng bóng và bền đẹp theo thời gian. Phần mặt dây chuyền được đính đá CZ hình cá tiên, một biểu tượng cho sự khởi đầu mới và sự đổi mới. Đá CZ được lựa chọn kỹ càng, cắt mài tỉ mỉ để tạo ra những phản xạ ánh sáng hoàn hảo, khiến món trang sức này nổi bật mỗi khi bạn di chuyển. Đây là lựa chọn lý tưởng cho những cô gái yêu thích phong cách nhẹ nhàng nhưng cũng muốn mình thật nổi bật và ấn tượng trong mắt người khác.', 150, 1),
(3, 13, 'SP013', 'Lắc tay bạc nam mắt xích đơn giản nhưng đầy cá tính Cuban Saint được thiết kế dành riêng cho phái mạnh, với phong cách mạnh mẽ và hiện đại. Lắc tay này được làm từ bạc 925 cao cấp, với những mắt xích liên kết chặt chẽ, tạo nên sự chắc chắn và độ bền vượt trội. Đây là món trang sức lý tưởng cho những ai yêu thích sự đơn giản nhưng vẫn muốn tạo dấu ấn cá nhân. Lắc tay Cuban Saint không chỉ là món trang sức mà còn là biểu tượng của phong cách sống tự do và sự nổi bật.', 200, 2),
(4, 14, 'SP014', 'Bông tai bạc nữ đính đá CZ cỏ 4 lá, phù hợp cho mọi cô gái yêu thích sự nhẹ nhàng và thanh thoát. Thiết kế bông tai này kết hợp giữa sự hiện đại và vẻ đẹp tự nhiên, với đá CZ hình cỏ 4 lá tượng trưng cho may mắn và thịnh vượng. Bông tai được làm từ bạc cao cấp, có độ sáng bóng tuyệt vời và bền đẹp theo thời gian. Đây là món trang sức không thể thiếu trong bộ sưu tập của những cô gái yêu thích sự tinh tế và may mắn.', 100, 1),
(5, 15, 'SP015', 'Bông tai bạc Ý S925 nữ mạ bạch kim đính đá CZ hình trái tim là một món trang sức tinh tế, phù hợp cho những dịp đặc biệt. Được làm từ bạc Ý S925 cao cấp, bông tai này có lớp mạ bạch kim mang đến độ sáng bóng bền lâu. Đá CZ hình trái tim được cắt mài tinh xảo, mang lại hiệu ứng ánh sáng lấp lánh, làm nổi bật vẻ đẹp của người đeo. Đây là lựa chọn lý tưởng cho những cô gái yêu thích sự nhẹ nhàng, thanh thoát nhưng vẫn muốn tạo ấn tượng mạnh mẽ.', 12, 1),
(6, 31, 'SP031', 'Nhẫn bạc nữ đính đá CZ hoa bướm là món trang sức lãng mạn và nữ tính, được thiết kế tinh tế với những viên đá CZ hình hoa bướm lấp lánh. Chiếc nhẫn này mang đến sự tươi mới và duyên dáng cho người đeo, thích hợp cho những dịp đặc biệt hay làm quà tặng ý nghĩa. Được làm từ bạc cao cấp, nhẫn bạc nữ đính đá CZ hoa bướm chắc chắn sẽ làm bạn nổi bật và thu hút sự chú ý mỗi khi xuất hiện.', 123, 1),
(7, 32, 'SP032', 'Dây chuyền bạc nữ liền mặt mạ vàng đính đá CZ hình trái tim mang đến sự sang trọng và quý phái cho người đeo. Thiết kế dây chuyền này kết hợp giữa sự mềm mại của mặt dây trái tim và ánh sáng lấp lánh của đá CZ, tạo nên một món trang sức hoàn hảo cho những cô gái yêu thích sự thanh lịch và quyến rũ. Với lớp mạ vàng cao cấp, sản phẩm có độ bền vượt trội và sáng bóng lâu dài. Đây là món quà tuyệt vời cho những dịp quan trọng trong cuộc đời bạn.', 123, 1),
(8, 33, 'SP033', 'Lắc chân bạc nữ đính đá CZ hình cỏ 4 lá Mildred, tạo nên phong cách trẻ trung và năng động. Lắc chân này được thiết kế với sự kết hợp giữa đá CZ lấp lánh và bạc cao cấp, mang đến sự nhẹ nhàng nhưng đầy cuốn hút. Đá CZ hình cỏ 4 lá tượng trưng cho may mắn, là biểu tượng của sự khởi đầu mới và thịnh vượng. Lắc chân bạc nữ Mildred là lựa chọn lý tưởng cho những ai yêu thích sự nổi bật và khác biệt.', 12, 1),
(9, 34, 'SP034', 'Dây chuyền bạc nữ liền mặt mạ vàng đính đá CZ, phong cách hiện đại và sang trọng. Mặt dây chuyền được đính đá CZ lấp lánh, tạo nên sự nổi bật và quyến rũ cho người đeo. Với lớp mạ vàng bền bỉ, dây chuyền này không chỉ có độ sáng bóng tuyệt vời mà còn giữ được vẻ đẹp lâu dài theo thời gian. Đây là lựa chọn lý tưởng cho những ai yêu thích sự tinh tế và sang trọng.', 50, 1),
(10, 36, 'SP036', 'Nhẫn cặp đôi bạc đính kim cương Moissanite Theophilus mang lại sự lãng mạn cho các cặp đôi.', 120, 1),
(11, 37, 'SP037', 'Lắc tay bạc nữ đính pha lê Swarovski trái tim của biển cả mang vẻ đẹp sang trọng.', 120, 1),
(13, 39, 'SP039', 'Lắc tay bạc nữ đính kim cương Moissanite Curtis với thiết kế đẹp và tinh tế.', 300, 1),
(15, 41, 'SP1041', 'Sản phẩm được chế tác từ bạc 925 cao cấp, kết hợp với đá CZ sáng lấp lánh, không gây kích ứng da. Thiết kế trái tim cách điệu mang lại vẻ đẹp thanh lịch, thời thượng.', 100, 1);

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
(1, 'Vòng-Lắc', 1),
(2, 'Nhẫn', 1),
(3, 'Dây chuyền', 1),
(4, 'Lắc tay', 1),
(5, 'Bông tai', 1);

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
(4, 'DH00111', 1, 'Nguyễn Văn A', '0123456789', 'vana@example.com', '123 Đường A, Quận B, TP.C', '2024-11-17 10:00:00', '100000.00', '', 1, 4),
(5, 'DH002', 1, 'Trần Thị B', '0987654321', 'thib@example.com', '456 Đường X, Quận Y, TP.Z', '2024-11-12 11:00:00', '100000.00', '', 2, 7),
(6, 'DH003', 1, 'Lê Văn C', '0932112233', NULL, '789 Đường L, Quận M, TP.MMM', '2024-11-12 12:00:00', '200000.00', '', 2, 7),
(7, 'DH195', 8, 'thinhj', '234234', 'thinhdd@gmail.com', 'a', '2024-11-30 15:47:02', '1170000.00', 'a', 1, 1),
(8, 'DH328', 8, 'thinhj', '234234', 'thinhdd@gmail.com', 'Đội 2 đại Lan', '2024-11-30 15:58:58', '1170000.00', 'aaaaaaaa ', 1, 1),
(21, 'DH451', 3, 'Tuấn Anh', '325687430', 'anhntph51526@gmail.com', 'Tuấn Anh', '2024-11-30 20:04:41', '70000.00', 'ffsfsdfsd', 1, 1),
(24, 'DH272', 3, 'Tuấn Anh', '325687430', 'anhntph51526@gmail.com', '789 Đường L, Quận M, TP.MMM', '2024-11-30 21:42:13', '150000.00', 'Giao hàng nhanh', 1, 1),
(25, 'DH781', 3, 'Tuấn Anh', '325687430', 'anhntph51526@gmail.com', 'Tuấn Anh', '2024-11-30 21:43:48', '170000.00', '', 1, 1),
(26, 'DH379', 3, 'Tuấn Anh', '325687430', 'anhntph51526@gmail.com', 'Hà Nội', '2024-11-30 21:45:26', '450000.00', '', 1, 1),
(27, 'DH593', 3, 'Tuấn Anh', '325687430', 'anhntph51526@gmail.com', 'Hà Nộiiiiiiiiiiiii', '2024-11-30 21:54:27', '90000.00', '', 1, 1),
(28, 'DH521', 3, 'Tuấn Anh', '325687430', 'anhntph51526@gmail.com', 'Thịnh Ngu', '2024-11-30 21:55:51', '82000.00', '', 1, 7),
(29, 'DH519', 3, 'Tuấn Anh', '325687430', 'anhntph51526@gmail.com', 'Tuấn Anh', '2024-11-30 22:06:03', '82000.00', '', 1, 1),
(30, 'DH210', 3, 'Tuấn Anh', '325687430', 'anhntph51526@gmail.com', 'Thịnh Ngu', '2024-11-30 22:08:18', '178000.00', '', 1, 1),
(31, 'DH864', 3, 'Tuấn Anh', '325687430', 'anhntph51526@gmail.com', 'Tuấn Anh', '2024-11-30 23:16:56', '82000.00', '', 1, 1),
(32, 'DH274', 3, 'Tuấn Anh', '325687430', 'anhntph51526@gmail.com', '789 Đường L, Quận M, TP.M', '2024-11-30 23:17:13', '82000.00', '', 1, 1),
(33, 'DH638', 3, 'Tuấn Anh', '0325687430', 'anhntph51526@gmail.com', 'Hà Nội', '2024-11-30 23:17:54', '90000.00', '', 1, 4),
(34, 'DH725', 3, 'Tuấn Anh', '325687430', 'anhntph51526@gmail.com', 'Thịnh Ngu', '2024-12-01 06:01:38', '2050000.00', '', 1, 4),
(35, 'DH434', 3, 'Tuấn Anh', '325687430', 'anhntph51526@gmail.com', 'Hà Nội', '2024-12-01 06:45:17', '338000.00', 'sadsadsađá', 1, 4),
(36, 'DH382', 3, 'Tuấn Anh', '325687430', 'anhntph51526@gmail.com', 'Tuấn Anh', '2024-12-01 09:28:39', '190000.00', '', 1, 3),
(37, 'DH230', 3, 'Tuấn Anh', '325687430', 'anhntph51526@gmail.com', 'Tuấn Anh', '2024-12-01 10:21:35', '310000.00', '', 1, 1),
(38, 'DH673', 3, 'DinhGTV7', '0325687430', 'anhntph51526@gmail.com', 'đâsdâds', '2024-12-01 10:43:46', '130000.00', '', 1, 1);

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
(27, 8);

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
(26, 41, './uploads/1733032777a1-4.jpg');

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
(8, 'Nhẫn bạc nữ đính kim cương Moissanite Aidan', './uploads/1731885925sp1.jpg', '4300000', '20000', 'Mẫu nhẫn bạc nữ sang trọng, được đính kim cương Moissanite tỏa sáng, phù hợp cho các dịp đặc biệt, giúp tôn vinh vẻ đẹp của người sở hữu.\n\n', 2, '2024-11-06', 1, '56785', 2),
(9, 'Dây chuyền bạc nữ đính đá CZ cá tiên', './uploads/1731885957sp2.jpg', '2300000', '20000', 'Dây chuyền bạc nữ thiết kế thanh thoát, đính đá CZ hình cá tiên, mang đến vẻ đẹp nhẹ nhàng nhưng cũng không kém phần nổi bật.', 155, '2024-11-06', 1, '42345', 3),
(13, 'Lắc tay bạc nam mắt xích đơn giản ngầu Cuban Saint Laurent Paris', './uploads/1731885969sp3.jpg', '3926000', '20000', 'Lắc tay bạc nam thiết kế mắt xích đơn giản, mạnh mẽ nhưng tinh tế, phù hợp với phong cách nam tính, đặc biệt cho những ai yêu thích sự năng động.', 2, '2024-11-10', 2, '89679', 4),
(14, 'Bông tai bạc nữ đính đá CZ cỏ 4 lá', './uploads/1731886034sp4.jpg', '10000', '20000', 'Bông tai bạc Ý mạ bạch kim, đính đá CZ hình thù độc đáo, thích hợp cho những cô nàng yêu thích sự sang trọng và khác biệt.', 1, '2024-11-10', 1, '34675', 5),
(15, 'Bông tai bạc Ý S925 nữ mạ bạch kim đính đá CZ hình trái tim', './uploads/1731886049sp5.jpg', '120000', '4234', 'Bông tai bạc Ý mạ bạch kim, đính đá CZ hình thù độc đáo, thích hợp cho những cô nàng yêu thích sự sang trọng và khác biệt.', 12, '2024-11-10', 1, '1233333', 5),
(31, 'Nhẫn bạc nữ đính đá CZ hoa bướm', './uploads/1731886088sp6.jpg', '120000', '32000', 'Mẫu nhẫn bạc nữ sang trọng, được đính kim cương Moissanite tỏa sáng, phù hợp cho các dịp đặc biệt, giúp tôn vinh vẻ đẹp của người sở hữu.', 133, '2024-11-15', 1, '1413424', 2),
(32, 'Dây chuyền bạc nữ liền mặt mạ vàng đính đá CZ trái tim Double ', './uploads/1731886143sp7.jpg', '120000', '32000', 'Dây chuyền bạc nữ thiết kế thanh thoát, đính đá CZ hình cá tiên, mang đến vẻ đẹp nhẹ nhàng nhưng cũng không kém phần nổi bật.', 124, '2024-11-18', 1, '1413424', 3),
(33, 'Lắc chân bạc nữ đính đá CZ hình cỏ 4 lá Mildred', './uploads/1731927755cat-5.jpg', '810000', '800000', 'Bông tai bạc nữ kiểu dáng tinh tế, đính đá CZ hình cỏ 4 lá mang đến may mắn và sự duyên dáng cho người sử dụng.', 12, '2024-11-03', 1, '1000000', 4),
(34, 'Dây chuyền bạc nữ liền mặt mạ vàng đính đá CZ trái tim Double', './uploads/17319293338.jpg', '2100000', '1900000', 'Lắc tay bạc nam thiết kế mắt xích đơn giản, mạnh mẽ nhưng tinh tế, phù hợp với phong cách nam tính, đặc biệt cho những ai yêu thích sự năng động.', 50, '2024-11-07', 1, '1000000', 3),
(36, 'Nhẫn cặp đôi bạc đính kim cương Moissanite Theophilus ', './uploads/17322019441731886088sp6.jpg', '1500000', '110000', 'Đẹp', 120, '2024-11-19', 1, '1200000', 2),
(37, 'Lắc tay bạc nữ đính pha lê Swarovski trái tim của biển', './uploads/17322056284.jpg', '2000000', '20000', 'Gút!', 120, '2024-11-19', 1, '1200000', 4),
(39, 'Lắc tay bạc nữ đính kim cương Moissanite Curtis', './uploads/17322058008.jpg', '2000000', '200000', 'Beautiful', 300, '2024-11-13', 1, '1000000', 4),
(41, 'Dây chuyền bạc nữ đính đá CZ hình trái tim cách điệu đẹp Katalina', './uploads/1733032777a1.jpg', '2400000', '2000000', 'Sản phẩm được chế tác từ bạc 925 cao cấp, kết hợp với đá CZ sáng lấp lánh, không gây kích ứng da. Thiết kế trái tim cách điệu mang lại vẻ đẹp thanh lịch, thời thượng.', 100, '2024-11-29', 1, '1200000', 3);

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
(1, 'nguyenvanchien', '', '2024-11-07', 'chiennvph51500@gmail.com', 338506483, 1, 'so 1 ha noi', 123456, 1, '1'),
(2, 'chiennnguynvan', '', '2024-11-19', 'chienn@gmail.com', 338506458, 1, 'xp vip', 123456, 2, '2'),
(3, 'Tuấn Anh', '', '2024-01-01', 'anhntph51526@gmail.com', 325687430, 1, '', 123456, 2, '1'),
(5, 'dsád', '', '2024-01-01', 'tanh24@gmail.com', 9321312, 1, '', 123456, 2, '1'),
(6, 'dsád', '', '2024-01-01', 'anhntph5152666@gmail.com', 93213213, 1, '', 123456, 2, '1'),
(7, 'thinhj', '', '2024-01-01', 'thinhddph51501@gmail.com', 234234, 1, '', 123, 2, '1'),
(8, 'thinhj', '', '2024-01-01', 'thinhdd@gmail.com', 234234, 1, '', 1, 2, '1');

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
(11, 'Xu hướng nhẫn cưới 2024: Thiết kế độc đáo, giá cả phải chăng', 'Bài viết sẽ giới thiệu các mẫu nhẫn cưới mới nhất, những xu hướng thiết kế được ưa chuộng, chất liệu và giá cả. Ngoài ra, bài viết có thể đưa ra những gợi ý để bạn chọn được chiếc nhẫn cưới ưng ý.', '../uploads/7-2.jpg', '2024-11-01'),
(13, ' Top 5 cửa hàng vàng bạc đá quý uy tín tại Hà Nội/TP. Hồ Chí Minh', 'Bài viết sẽ cập nhật chi tiết giá vàng SJC, DOJI, PNJ và các thương hiệu khác trong ngày. Ngoài ra, bài viết có thể phân tích nguyên nhân tăng giảm giá vàng, dự báo xu hướng thị trường và tư vấn cho người mua.', '../uploads/13.jpg', '2024-11-23'),
(14, 'Khuyến Mãi Lớn Khi Mua Nhẫn Đẹp Tại Silver Ring', 'Silver Ring hân hạnh giới thiệu bộ sưu tập nhẫn mới nhất với thiết kế tinh tế, chất liệu cao cấp và giá cả hấp dẫn. Đây là cơ hội tuyệt vời để sở hữu những mẫu nhẫn độc đáo, phù hợp với mọi phong cách và sự kiện.', '../uploads/11-2.jpg', '2024-11-08');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `chi_tiet_san_phams`
--
ALTER TABLE `chi_tiet_san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tin_tucs`
--
ALTER TABLE `tin_tucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  ADD CONSTRAINT `binh_luans_ibfk_1` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`);

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

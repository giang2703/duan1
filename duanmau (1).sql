-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 02:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duanmau`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan_tt`
--

CREATE TABLE `binhluan_tt` (
  `ma` int(10) NOT NULL COMMENT 'mã bình luận tin tức',
  `noi_dung` varchar(225) NOT NULL COMMENT 'nội dung',
  `ma_kh` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'mã khách hàng',
  `ma_tt` int(10) NOT NULL COMMENT 'mã tin tức',
  `ngay` date NOT NULL COMMENT 'ngày bình luận ',
  `rating` tinyint(5) NOT NULL COMMENT 'đánh giá'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_bl` int(11) NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `ma_kh` varchar(20) NOT NULL,
  `ngay_bl` date NOT NULL,
  `rating` tinyint(5) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hang_hoa`
--

CREATE TABLE `hang_hoa` (
  `ma_hh` int(11) NOT NULL,
  `ten_hh` varchar(50) NOT NULL,
  `don_gia` int(11) NOT NULL,
  `giam_gia` int(11) DEFAULT 0,
  `hinh` varchar(50) NOT NULL,
  `ngay_nhap` date DEFAULT NULL,
  `mo_ta` text NOT NULL,
  `dac_biet` int(1) NOT NULL DEFAULT 0,
  `so_luot_xem` int(11) NOT NULL DEFAULT 0,
  `ma_loai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hang_hoa`
--

INSERT INTO `hang_hoa` (`ma_hh`, `ten_hh`, `don_gia`, `giam_gia`, `hinh`, `ngay_nhap`, `mo_ta`, `dac_biet`, `so_luot_xem`, `ma_loai`) VALUES
(41, 'Áo tâc', 2500000, 500000, 'product-7.jpg', '2023-10-12', 'Áo tấc hay còn gọi là áo ngũ thân tay thụng, áo lễ, áo thụng (ở miền Nam còn gọi là áo rộng), là một trang phục truyền thống của Việt Nam thời phong kiến, mặc cùng với quần dài, che thân từ cổ đến hoặc quá đầu gối và dành cho cả nam lẫn nữ với cổ đứng cài cúc bên phải (của người mặc), tà áo chắp từ năm mảnh', 1, 2, 18),
(43, 'Áo dài truyền thống', 1500000, 500000, 'cat-3.jpg', '2023-10-14', 'Áo dài là trang phục được cách tân theo hướng Tây hóa từ Áo ngũ thân lập lĩnh. Chính vì thế, áo dài còn gọi là áo tân thời (sau này còn được chiết eo). Chúa Nguyễn Phúc Khoát là người được xem là có công sáng chế chiếc áo ngũ thân - tiền thân của áo dài. Họa sĩ Le Mur Nguyễn Cát Tường là người có công định', 1, 0, 20),
(45, 'áo', 1000000, 50000, '5 TEN.png', '2023-11-27', 'ss', 0, 0, 23);

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` varchar(20) NOT NULL COMMENT 'mã đăng nhập',
  `mat_khau` varchar(50) NOT NULL COMMENT 'mật khẩu',
  `ho_ten` varchar(50) NOT NULL COMMENT 'họ tên',
  `kich_hoat` bit(1) NOT NULL DEFAULT b'0' COMMENT 'trạng thái kích hoạt',
  `hinh` varchar(255) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `vai_tro` bit(1) NOT NULL DEFAULT b'0' COMMENT 'vai trò true là nv'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `mat_khau`, `ho_ten`, `kich_hoat`, `hinh`, `email`, `vai_tro`) VALUES
('hanhan', '123', 'hân hân', b'1', NULL, 'it.vn@gmail.com', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

CREATE TABLE `loai` (
  `ma_loai` int(11) NOT NULL COMMENT 'mã loại hàng',
  `ten_loai` varchar(50) NOT NULL COMMENT 'tên loại hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`ma_loai`, `ten_loai`) VALUES
(18, 'Việt phục nguyên thủy'),
(20, 'Áo dài truyền thống'),
(23, 'thời trang ');

-- --------------------------------------------------------

--
-- Table structure for table `loai_tt`
--

CREATE TABLE `loai_tt` (
  `ma` int(10) NOT NULL COMMENT 'mã loại tin tức',
  `ten_loai_tt` int(50) NOT NULL COMMENT 'tên mã loại '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tin_tuc`
--

CREATE TABLE `tin_tuc` (
  `ma` int(10) NOT NULL COMMENT 'mã tin tức',
  `tieu_de` varchar(500) NOT NULL COMMENT 'tiêu đề ',
  `noi_dung` text NOT NULL COMMENT 'nội dung',
  `ngay` date NOT NULL COMMENT 'ngày đăng bài',
  `hinh` varchar(255) NOT NULL COMMENT 'hình ảnh',
  `luot_xem` int(11) NOT NULL COMMENT 'lượt xem',
  `ma_loai_tt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan_tt`
--
ALTER TABLE `binhluan_tt`
  ADD PRIMARY KEY (`ma`),
  ADD KEY `ma_kh` (`ma_kh`),
  ADD KEY `ma_tt` (`ma_tt`);

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `binh_luan_ibfk_1` (`ma_hh`),
  ADD KEY `binh_luan_ibfk_2` (`ma_kh`);

--
-- Indexes for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD PRIMARY KEY (`ma_hh`),
  ADD KEY `ma_loai` (`ma_loai`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Indexes for table `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Indexes for table `loai_tt`
--
ALTER TABLE `loai_tt`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD PRIMARY KEY (`ma`),
  ADD KEY `ma_loai_tt` (`ma_loai_tt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan_tt`
--
ALTER TABLE `binhluan_tt`
  MODIFY `ma` int(10) NOT NULL AUTO_INCREMENT COMMENT 'mã bình luận tin tức';

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  MODIFY `ma_hh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `loai`
--
ALTER TABLE `loai`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã loại hàng', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `loai_tt`
--
ALTER TABLE `loai_tt`
  MODIFY `ma` int(10) NOT NULL AUTO_INCREMENT COMMENT 'mã loại tin tức';

--
-- AUTO_INCREMENT for table `tin_tuc`
--
ALTER TABLE `tin_tuc`
  MODIFY `ma` int(10) NOT NULL AUTO_INCREMENT COMMENT 'mã tin tức';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan_tt`
--
ALTER TABLE `binhluan_tt`
  ADD CONSTRAINT `ma_kh` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`),
  ADD CONSTRAINT `ma_tt` FOREIGN KEY (`ma_tt`) REFERENCES `tin_tuc` (`ma`);

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`) ON DELETE CASCADE,
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD CONSTRAINT `hang_hoa_ibfk_1` FOREIGN KEY (`ma_loai`) REFERENCES `loai` (`ma_loai`) ON DELETE CASCADE;

--
-- Constraints for table `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD CONSTRAINT `ma_loai_tt` FOREIGN KEY (`ma_loai_tt`) REFERENCES `loai_tt` (`ma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

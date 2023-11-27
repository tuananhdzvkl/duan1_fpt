-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2023 lúc 05:10 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id_bl` int(11) NOT NULL,
  `comment` text NOT NULL,
  `id_sp` int(11) NOT NULL,
  `id_tk` int(11) NOT NULL,
  `ngaybinhluan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`id_bl`, `comment`, `id_sp`, `id_tk`, `ngaybinhluan`) VALUES
(3, 'drtgefd', 9, 1, '2023-11-25 00:00:00'),
(4, 'Sản Phẩm Đẹp Quá', 9, 4, '2023-11-25 00:00:00'),
(5, 'Hulu', 9, 4, '2023-11-25 18:27:48'),
(6, 'huhu', 9, 4, '2023-11-25 18:30:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_donhang`
--

CREATE TABLE `chitiet_donhang` (
  `id_ctdon` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `phone` int(11) NOT NULL,
  `dia_chi` text NOT NULL,
  `thoi_gian` datetime NOT NULL,
  `thanh_tien` int(11) NOT NULL,
  `trang_thai` tinyint(4) NOT NULL DEFAULT 0,
  `thanh_toan` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_donhang`
--

INSERT INTO `chitiet_donhang` (`id_ctdon`, `full_name`, `phone`, `dia_chi`, `thoi_gian`, `thanh_tien`, `trang_thai`, `thanh_toan`) VALUES
(2, 'Cao Xuân Phương', 985679042, 'Hà Nội', '2023-11-21 21:58:02', 1100000, 2, 1),
(3, 'Cao Xuân Phương', 985679042, 'Hà Nội', '2023-11-21 22:12:02', 1500000, 4, 0),
(4, 'Cao Xuân Phương', 985679042, 'Hà Nội', '2023-11-21 22:00:02', 1200000, 2, 0),
(5, 'Cao Xuân Phương', 985679042, 'Hà Nội', '2023-11-21 21:58:02', 1300000, 0, 0),
(6, 'Cao Xuân Phương', 985679042, 'Hà Nội', '2023-11-21 21:58:02', 1400000, 0, 0),
(7, 'Cao Xuân Phương', 985679042, 'Hà Nội', '2023-11-21 21:58:02', 1600000, 0, 0),
(8, 'Cao Xuân Phương', 985679042, 'Hà Nội', '2023-11-21 21:58:02', 1200000, 0, 0),
(9, 'Cao Xuân Phương', 985679042, 'Hà Nội', '2023-11-21 21:58:02', 2100000, 0, 0),
(10, 'Cao Xuân Phương', 985679042, 'Hà Nội', '2023-11-21 21:58:02', 1900000, 0, 0),
(11, 'Cao Xuân Phương', 985679042, 'Hà Nội', '2023-11-21 21:58:02', 1210000, 0, 0),
(12, 'Cao Xuân Phương', 985679042, 'Hà Nội', '2023-11-21 21:58:02', 1000000, 0, 0),
(13, 'Cao Xuân Phương', 985679042, 'Hà Nội', '2023-11-21 21:58:02', 1000000, 0, 0),
(14, 'Cao Xuân Phương', 985679042, 'Hà Nội', '2023-11-21 21:58:02', 1000000, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id_color` int(11) NOT NULL,
  `name_color` varchar(255) NOT NULL,
  `mau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id_color`, `name_color`, `mau`) VALUES
(1, 'Đỏ', '#ff0000'),
(2, 'Vàng', '#fbff00'),
(3, 'Tm', '#d400f0'),
(4, 'Xanh-Tím', '#462e9e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_dm` int(11) NOT NULL,
  `name_dm` varchar(255) NOT NULL,
  `trang_thai` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_dm`, `name_dm`, `trang_thai`) VALUES
(1, 'Giày Thể Thao', 0),
(2, 'Giày Nike', 0),
(6, 'phuongggg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id_don` int(11) NOT NULL,
  `id_ctd` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `mau_sac` varchar(255) NOT NULL,
  `kich_co` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id_don`, `id_ctd`, `id_sp`, `so_luong`, `mau_sac`, `kich_co`) VALUES
(6, 2, 11, 12, 'Vàng', 'Đỏ'),
(7, 2, 11, 12, 'Vàng', 'Đỏ'),
(8, 2, 11, 12, 'Vàng', 'Đỏ'),
(9, 3, 11, 12, 'Vàng', 'Đỏ'),
(10, 3, 11, 12, 'Vàng', 'Đỏ'),
(11, 3, 11, 12, 'Vàng', 'Đỏ'),
(12, 4, 11, 12, 'Vàng', 'Đỏ'),
(13, 4, 11, 12, 'Vàng', 'Đỏ'),
(14, 4, 11, 12, 'Vàng', 'Đỏ'),
(15, 5, 11, 12, 'Vàng', 'Đỏ'),
(16, 5, 11, 12, 'Vàng', 'Đỏ'),
(17, 5, 11, 12, 'Vàng', 'Đỏ'),
(18, 9, 11, 12, 'Vàng', 'Đỏ'),
(19, 8, 11, 12, 'Vàng', 'Đỏ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `namesp` varchar(150) NOT NULL,
  `soluong` int(11) NOT NULL,
  `color_product` int(11) NOT NULL,
  `size_product` int(11) NOT NULL,
  `gioi_tinh` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `img_sp`
--

CREATE TABLE `img_sp` (
  `id_img` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `img_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `img_sp`
--

INSERT INTO `img_sp` (`id_img`, `id_sp`, `img_url`) VALUES
(11, 1, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép - Sao chép (2).png'),
(12, 1, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép - Sao chép.png'),
(13, 1, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép (2) - Sao chép.png'),
(14, 5, 'Ảnh chụp màn hình 2023-10-30 140541.png'),
(18, 7, 'Ảnh chụp màn hình 2023-11-15 090604.png'),
(19, 7, 'Ảnh chụp màn hình 2023-11-15 093439.png'),
(20, 7, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép (2) - Sao chép - Sao chép.png'),
(21, 7, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép (3) - Sao chép.png'),
(23, 8, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép (2) - Sao chép - Sao chép.png'),
(24, 9, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép - Sao chép (2).png'),
(25, 9, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép - Sao chép.png'),
(26, 9, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép (2) - Sao chép - Sao chép.png'),
(27, 9, 'Ảnh chụp màn hình 2023-10-30 140541 - Sao chép.png'),
(28, 10, 'anh-nen-4k-cho-win-10_105907787.jpg'),
(29, 10, 'anh-nen-may-tinh-4k_105909115.jpg'),
(30, 10, 'Ảnh-nền-máy-tính-cực-đẹp-Gearvn.jpg'),
(31, 10, 'Hinh-nen-anime-5-min.jpg'),
(32, 10, 'hinh-nen-may-tinh-4k-de-thuong-scaled.jpg'),
(33, 10, 'hinh-nen-may-tinh-8-1.jpg'),
(34, 10, 'hinh-nen-may-tinh-hoat-hinh-de-thuong_053704784.jpg'),
(37, 12, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép - Sao chép (2).png'),
(38, 12, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép - Sao chép.png'),
(39, 12, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép (2) - Sao chép - Sao chép.png'),
(40, 12, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép (2) - Sao chép.png'),
(41, 13, 'Ảnh-nền-máy-tính-cực-đẹp-Gearvn - Sao chép.jpg'),
(42, 13, 'Ảnh-nền-máy-tính-cực-đẹp-Gearvn.jpg'),
(43, 13, 'hinh-nen-may-tinh-hoat-hinh-de-thuong_053704784.jpg'),
(44, 11, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép (2) - Sao chép - Sao chép.png'),
(45, 11, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép (2) - Sao chép.png'),
(46, 11, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép.png'),
(47, 11, 'Ảnh chụp màn hình 2023-10-30 140515.png'),
(48, 11, 'Ảnh chụp màn hình 2023-10-30 140541 - Sao chép.png'),
(49, 11, 'Ảnh chụp màn hình 2023-10-30 140541.png'),
(50, 6, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép - Sao chép (2).png'),
(51, 6, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép - Sao chép.png'),
(52, 6, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép (2) - Sao chép - Sao chép.png'),
(53, 6, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép (2) - Sao chép.png'),
(54, 6, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép (2).png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `name_sp` varchar(255) NOT NULL,
  `mo_ngan` text NOT NULL,
  `image_sp` varchar(300) NOT NULL,
  `giam_gia` int(2) DEFAULT 0,
  `gia` int(11) NOT NULL,
  `mo_ta` text NOT NULL,
  `ngay_nhap` date NOT NULL,
  `view` int(11) DEFAULT 0,
  `gioi_tinh` tinyint(4) NOT NULL,
  `id_dm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `name_sp`, `mo_ngan`, `image_sp`, `giam_gia`, `gia`, `mo_ta`, `ngay_nhap`, `view`, `gioi_tinh`, `id_dm`) VALUES
(7, 'Giày Vip', 'Đẹp Zai Khoai To ', 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép (2) - Sao chép.png', 12, 78676453, 'hgfds', '2004-08-17', 38, 0, 1),
(8, 'phuongggg21', '', 'Ảnh chụp màn hình 2023-10-30 210717.png', 30, 123, '  123', '2023-11-16', 3, 1, 2),
(9, 'phuongggg123', '', 'Ảnh chụp màn hình 2023-10-31 210245.png', 0, 1200000, 'phuongcao', '2023-11-16', 39, 1, 2),
(10, 'CAOXUANPHUONG', '', 'Ảnh chụp màn hình 2023-11-12 215708.png', 12, 1230000000, '   gulkyfjudtyhregsfadwq', '2023-11-16', 12, 1, 2),
(11, 'phuonggg', '', 'hinh-nen-may-tinh-hoat-hinh-de-thuong_053704784.jpg', 0, 123, ' 123', '2023-11-17', 0, 1, 1),
(12, 'phuongggg', '', 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép (2) - Sao chép - Sao chép.png', 0, 1342537, ' zsfdf', '2023-11-17', 22, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham_bienthe`
--

CREATE TABLE `sanpham_bienthe` (
  `id_spbt` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham_bienthe`
--

INSERT INTO `sanpham_bienthe` (`id_spbt`, `id_color`, `id_size`, `id_sp`, `soluong`) VALUES
(1, 2, 2, 8, 12),
(4, 2, 2, 9, 120),
(5, 1, 2, 10, 1234),
(6, 2, 3, 10, 12344),
(7, 2, 4, 10, 0),
(9, 1, 7, 10, 99),
(15, 1, 2, 11, 99),
(16, 1, 3, 11, 0),
(17, 2, 2, 12, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id_size` int(11) NOT NULL,
  `name_size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id_size`, `name_size`) VALUES
(2, 'S'),
(3, 'M'),
(4, 'L'),
(7, 'XL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_tk` int(11) NOT NULL,
  `name_tk` varchar(150) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `image_tk` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `chucvu` tinyint(4) NOT NULL DEFAULT 0,
  `email` varchar(150) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `dia_chi` text NOT NULL,
  `lock` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id_tk`, `name_tk`, `pass`, `image_tk`, `full_name`, `chucvu`, `email`, `phone`, `dia_chi`, `lock`) VALUES
(1, 'Admin1', '123', 'Ảnh chụp màn hình 2023-11-15 090604.png', 'Cao Xuân Phương', 1, '123', 1332, '123', 0),
(4, 'phuong', '123', 'author3.webp', 'Phuong Cao', 0, '1132456', 985679042, '23456', 0),
(5, 'phuong', '1234', NULL, ' Cao Xuân Phương', 0, 'phuonglun66666@gmail.com', NULL, '123', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id_bl`),
  ADD KEY `id_sp` (`id_sp`),
  ADD KEY `id_tk` (`id_tk`);

--
-- Chỉ mục cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  ADD PRIMARY KEY (`id_ctdon`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_dm`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id_don`),
  ADD KEY `id_sp` (`id_sp`),
  ADD KEY `id_ctd` (`id_ctd`),
  ADD KEY `mau_sac` (`mau_sac`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idsp` (`idsp`),
  ADD KEY `iduser` (`iduser`);

--
-- Chỉ mục cho bảng `img_sp`
--
ALTER TABLE `img_sp`
  ADD PRIMARY KEY (`id_img`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_dm` (`id_dm`);

--
-- Chỉ mục cho bảng `sanpham_bienthe`
--
ALTER TABLE `sanpham_bienthe`
  ADD PRIMARY KEY (`id_spbt`),
  ADD KEY `id_color` (`id_color`),
  ADD KEY `id_size` (`id_size`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_tk`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  MODIFY `id_ctdon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id_don` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `img_sp`
--
ALTER TABLE `img_sp`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `sanpham_bienthe`
--
ALTER TABLE `sanpham_bienthe`
  MODIFY `id_spbt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_tk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`id_tk`) REFERENCES `taikhoan` (`id_tk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binh_luan_ibfk_3` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_3` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `don_hang_ibfk_4` FOREIGN KEY (`id_ctd`) REFERENCES `chitiet_donhang` (`id_ctdon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id_tk`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`id_dm`) REFERENCES `danhmuc` (`id_dm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham_bienthe`
--
ALTER TABLE `sanpham_bienthe`
  ADD CONSTRAINT `sanpham_bienthe_ibfk_1` FOREIGN KEY (`id_color`) REFERENCES `color` (`id_color`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_bienthe_ibfk_2` FOREIGN KEY (`id_size`) REFERENCES `size` (`id_size`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_bienthe_ibfk_3` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

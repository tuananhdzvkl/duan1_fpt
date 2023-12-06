-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 05, 2023 lúc 02:20 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo_duan1`
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
(6, 'huhu', 9, 4, '2023-11-25 18:30:17'),
(9, 'HIHI', 7, 4, '2023-11-27 14:40:16'),
(10, 'hjhggfđs', 7, 1, '2023-11-27 14:59:31'),
(11, 'Tuấn Anh Đần Vler', 7, 1, '2023-11-29 09:33:31'),
(12, ',kgjhfds', 7, 1, '2023-11-29 09:37:44'),
(13, 'dưeer', 7, 1, '2023-11-29 09:38:08'),
(14, 'sản phẩm đẹp ', 17, 4, '2023-12-03 17:51:06'),
(15, 'ghfb', 11, 4, '2023-12-03 13:05:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_donhang`
--

CREATE TABLE `chitiet_donhang` (
  `id_ctdon` int(11) NOT NULL,
  `id_tk` int(11) NOT NULL,
  `ma_don` varchar(25) NOT NULL,
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

INSERT INTO `chitiet_donhang` (`id_ctdon`, `id_tk`, `ma_don`, `full_name`, `phone`, `dia_chi`, `thoi_gian`, `thanh_tien`, `trang_thai`, `thanh_toan`) VALUES
(11, 1, '#Don577', 'Cao Xuân Phương', 2147483647, '123 - Phường Hồng Gai - Thành phố Hạ Long -Tỉnh Quảng Ninh  ', '2023-12-04 22:31:41', 810000, 2, 0),
(14, 1, '#Don803', 'NGUYỄN HỮU TUẤN ANH', 2147483647, 'Thôn 1  - Phường Cổ Nhuế 2 - Quận Bắc Từ Liêm -Thành phố Hà Nội  ', '2023-12-05 01:59:04', 2430000, 1, 1),
(15, 0, '#Don432', 'Nguyễn Hữu Tuấn Anh', 2147483647, ' - Xã Đông Quan - Huyện Lộc Bình -Tỉnh Lạng Sơn  ', '2023-12-05 02:10:47', 2430000, 0, 1),
(16, 1, '#Don563', 'NGUYỄN HỮU TUẤN ANHNGUYỄN HỮU TUẤN ANH', 2147483647, 'Thôn 1  - Phường Giảng Võ - Quận Ba Đình -Thành phố Hà Nội  ', '2023-12-05 03:19:04', 5700000, 0, 0),
(17, 1, '#Don044', 'NGUYỄN HỮU TUẤN ANHNGUYỄN HỮU TUẤN ANH', 2147483647, 'Thôn 1  - Phường Giảng Võ - Quận Ba Đình -Thành phố Hà Nội  ', '2023-12-05 03:19:05', 5700000, 0, 0),
(18, 1, '#Don761', 'NGUYỄN HỮU TUẤN ANH', 2147483647, 'Thôn 1  - Xã Vĩnh Lại - Huyện Lâm Thao -Tỉnh Phú Thọ  ', '2023-12-05 03:44:28', 324000000, 0, 0),
(19, 0, '#Don585', 'Nguyễn Hữu Tuấn Anh', 2147483647, ' - Phường Tích Sơn - Thành phố Vĩnh Yên -Tỉnh Vĩnh Phúc  ', '2023-12-05 09:43:31', 16830000, 0, 1),
(20, 1, '#Don953', 'NGUYỄN HỮU TUẤN ANH', 2147483647, 'Thôn 1  - Phường Chương Dương - Quận Hoàn Kiếm -Thành phố Hà Nội  ', '2023-12-05 09:51:24', 111410000, 0, 0);

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
(3, 'Trắng', '#ffffff'),
(4, 'Xanh', '#3700ff');

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
(1, 'LOUIS VUITTON', 0),
(2, 'GUCCI', 0),
(8, 'ADIDAS', 0),
(9, 'CANIFA', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id_don` int(11) NOT NULL,
  `id_ctd` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `mau_sac` int(11) NOT NULL,
  `kich_co` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id_don`, `id_ctd`, `id_sp`, `so_luong`, `mau_sac`, `kich_co`) VALUES
(1, 2, 18, 1, 2, 4),
(2, 4, 18, 1, 2, 3),
(3, 4, 18, 1, 2, 4),
(4, 6, 16, 2, 1, 4),
(5, 7, 18, 2, 2, 3),
(6, 8, 18, 2, 2, 3),
(7, 9, 7, 1, 1, 2),
(8, 10, 18, 2, 2, 3),
(9, 11, 17, 1, 1, 3),
(10, 14, 17, 3, 3, 3),
(11, 15, 16, 10, 1, 4),
(12, 16, 18, 8, 2, 3),
(13, 18, 10, 4, 1, 2),
(14, 19, 12, 11, 2, 2),
(15, 20, 17, 5, 4, 2),
(16, 20, 7, 2, 1, 2);

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
(41, 13, 'Ảnh-nền-máy-tính-cực-đẹp-Gearvn - Sao chép.jpg'),
(42, 13, 'Ảnh-nền-máy-tính-cực-đẹp-Gearvn.jpg'),
(43, 13, 'hinh-nen-may-tinh-hoat-hinh-de-thuong_053704784.jpg'),
(50, 6, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép - Sao chép (2).png'),
(51, 6, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép - Sao chép.png'),
(52, 6, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép (2) - Sao chép - Sao chép.png'),
(53, 6, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép (2) - Sao chép.png'),
(54, 6, 'Ảnh chụp màn hình 2023-10-30 140515 - Sao chép (2).png'),
(98, 7, '4.avif'),
(99, 7, '5.avif'),
(100, 7, '3.avif'),
(101, 7, '2.avif'),
(102, 8, '10.avif'),
(103, 8, '9.jpg'),
(104, 8, '8.avif'),
(105, 8, '7.avif'),
(106, 18, '2.jpg'),
(107, 18, '1.png'),
(108, 18, '12.avif'),
(109, 18, '11.avif'),
(110, 9, '19.avif'),
(111, 9, '18.avif'),
(112, 9, '17.avif'),
(113, 9, '16.avif'),
(114, 9, '14.avif'),
(115, 10, '24.avif'),
(116, 10, '23.avif'),
(117, 10, '22.avif'),
(118, 10, '21.avif'),
(119, 11, '29.avif'),
(120, 11, '28.avif'),
(121, 11, '27.avif'),
(122, 11, '26.avif'),
(123, 12, '35.avif'),
(124, 12, '34.avif'),
(125, 12, '33.avif'),
(126, 12, '31.avif'),
(127, 12, '30.avif'),
(128, 15, '41.avif'),
(129, 15, '40.avif'),
(130, 15, '38.avif'),
(131, 15, '37.avif'),
(132, 15, '36.avif'),
(133, 16, '5.webp'),
(134, 16, '4.webp'),
(135, 16, '3.webp'),
(136, 16, '2.webp'),
(137, 17, '10.webp'),
(138, 17, '9.webp'),
(139, 17, '8.webp'),
(140, 17, '7.webp');

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
(7, 'Áo Sơ Mi Denim Dáng Rộng', 'Áo sơ mi Denim màu đen này là trang phục không thể thiếu trong tủ đồ thường nhật. ', '1.avif', 12, 61000000, 'Áo sơ mi Denim màu đen này là trang phục không thể thiếu trong tủ đồ thường nhật. Phom dáng tối giản được tô điểm với hoa văn Monogram được dập nổi trên túi áo. Áo có thể mặc như áo khoác và dễ dàng kết hợp với quần kiểu Carpenter đồng bộ để tạo nên tổng thể trẻ trung và năng động.', '2004-08-17', 376, 1, 1),
(8, 'Áo Denim Dáng Rộng', 'Mẫu áo Denim dáng rộng màu xanh chàm gây ấn tượng với mô típ Monogram Mappamundi tinh xảo tượng trưng cho sự kết nối giữa các nền văn hóa.', '6.avif', 1, 1000000, 'Mẫu áo Denim dáng rộng màu xanh chàm gây ấn tượng với mô típ Monogram Mappamundi tinh xảo tượng trưng cho sự kết nối giữa các nền văn hóa. Hình bản đồ thế giới được in dọc theo thân áo với hiệu ứng Pixel tẩy màu, kết hợp hoa văn Monogram kinh điển. Được hoàn thiện với túi áo lớn, thiết kế sẽ là điểm nhấn nổi bật cho bộ trang phục thường nhật.', '2023-11-23', 27, 0, 1),
(9, 'TECHNICAL FABRIC COAT', 'Lựa chọn trang phục nam cho Cruise 2024 lấy cảm hứng từ những năm 1990. Vải Moleskin và các họa tiết di sản lấy cảm hứng từ kho lưu trữ của House làm phong phú', '13.avif', 10, 1200000, 'Lựa chọn trang phục nam cho Cruise 2024 lấy cảm hứng từ những năm 1990. Vải Moleskin và các họa tiết di sản lấy cảm hứng từ kho lưu trữ của House làm phong phú thêm những chiếc áo khoác mới, kết hợp với quần denim để tạo nét hiện đại. Được làm bằng chất liệu vải kỹ thuật màu đen, chiếc áo khoác hai hàng khuy này khám phá một hình dáng có cấu trúc phù hợp với việc xếp lớp chuyển tiếp.', '2023-11-16', 50, 1, 2),
(10, 'GG WOOL FLANNEL PADDED OVERSHIRT', 'Màu sắc và họa tiết gắn liền với mùa lạnh hơn truyền cảm hứng cho tủ quần áo đô thị mới cho Bộ sưu tập Cruise 2024 của Gucci. ', '20.avif', 10, 90000000, 'Màu sắc và họa tiết gắn liền với mùa lạnh hơn truyền cảm hứng cho tủ quần áo đô thị mới cho Bộ sưu tập Cruise 2024 của Gucci. Lựa chọn trang phục nam bao gồm quần dài thoải mái bằng vải cotton và denim, được thiết kế theo kiểu xếp lớp. Chiếc áo khoác ngoài cổ điển cũng được tái hiện lại, được trình bày ở đây bằng vải flannel len GG màu xanh lá cây và xanh nước biển với khóa kéo tiện dụng.', '2023-11-16', 32, 1, 2),
(11, 'ÁO DỆT KIM LAMÉ CÓ KHÓA LIÊN ĐỘNG G', 'Kiểu dáng đẹp mắt của mùa này lấy cảm hứng từ những năm 1990, với phần áo ôm vừa vặn và phần quần hơi trễ.', '25.avif', 10, 1500000, 'Kiểu dáng đẹp mắt của mùa này lấy cảm hứng từ những năm 1990, với phần áo ôm vừa vặn và phần quần hơi trễ. Những chiếc áo dệt kim mỏng, nhẹ vừa vặn như làn da thứ hai, trong khi váy và quần được mặc với vẻ thanh lịch thoải mái. Được chế tác từ vải lamé có đường khâu sườn màu xanh lá cây nhạt, chiếc áo dệt kim này được tạo điểm nhấn bằng hình thêu chữ G lồng vào nhau ở giữa.', '2023-11-17', 16, 2, 2),
(12, 'ARSENAL FC 23/24 LFSTLR JERSEY', 'ÁO THI ĐẤU NGOÀI SÂN CỎ CAO CẤP CỦA ARSENAL, ĐƯỢC LÀM BẰNG VẬT LIỆU TÁI CHẾ.', '32.avif', 10, 1700000, 'Sử dụng bộ quần áo bóng đá thứ ba bắt mắt của câu lạc bộ làm nguồn cảm hứng, chiếc áo đấu Arsenal Jersey này của adidas tạo nên sự chuyển đổi từ hiệu suất bóng đá ưu tú sang khả năng mặc tuyệt vời. Chi tiết sang trọng và đường dệt đôi bằng polyester nâng cao vẻ ngoài và cảm giác của chiếc áo jersey cao cấp này để mang lại sự thoải mái, sang trọng khi mặc hàng ngày. ', '2023-11-17', 30, 1, 8),
(15, 'ÁO KHOÁC QUỐC CA REAL MADRID', 'ÁO THỂ THAO PHONG CÁCH VỚI MÀU SẮC CỔ ĐIỂN CỦA CÂU LẠC BỘ — VỚI HUY HIỆU PHONG PHÚ, ĐỦ MÀU SẮC', '39.avif', 25, 16000000, 'Khi các cầu thủ chuyên nghiệp mặc vest và bước vào sân, Áo khoác quốc ca của Real Madrid là dấu hiệu cho thấy tài năng đẳng cấp thế giới đã bước vào đấu trường. Với thiết kế bóng bẩy và màu sắc thuần túy của câu lạc bộ, chiếc áo khoác sành điệu giúp bạn mang theo tâm lý chiến thắng trong ngày thi đấu mọi lúc mọi nơi.', '2023-11-28', 8, 0, 8),
(16, 'Áo nỉ nam basic', 'Áo nỉ nam dáng rộng vừa, dày dặn đứng phom. Áo phù hợp để mặc thường ngày, áo đơn giản dễ dàng phối đồ, áo trơn basic, có cắt cúp sau lưng tạo điểm nhấn.', '1.webp', 5, 5000000, 'Giặt máy ở chế độ nhẹ, nhiệt độ thường. Không sử dụng hóa chất tẩy có chứa Clo. Phơi trong bóng mát. Sấy khô ở nhiệt độ thấp. Là ở nhiệt độ thấp 110 độ C. Giặt với sản phẩm cùng màu. Không là lên chi tiết trang trí.', '2023-12-01', 63, 1, 9),
(17, 'Quần mặc nhà nữ ống rộng', 'Quần mặc nhà dáng suông rủ vừa phải, gọn gàng nhưng vẫn rộng rãi thoải mái. Nguyên liệu dệt kim giả len mềm mại, ấm áp, mỏng nhẹ tạo cảm giác dễ chịu khi mặc, phù hợp các hoạt động nghỉ ngơi.', '6.webp', 10, 900000, 'Giặt máy ở chế độ nhẹ, nhiệt độ thường. Không sử dụng hóa chất tẩy có chứa Clo. Phơi vắt ngang, trong bóng mát. Không sử dụng máy sấy. Là ở nhiệt độ thấp 110 độ C. Giặt mặt trái sản phẩm. Giặt với sản phẩm cùng màu.', '2023-11-29', 69, 2, 9),
(18, 'Áo Khoác Parka Họa Tiết Monogram', 'Mẫu áo khoác Parka quen thuộc nay được nâng tầm với chất liệu Satin nhẹ tênh, sáng bóng. ', '1.jpg', 5, 750000, 'Mẫu áo khoác Parka quen thuộc nay được nâng tầm với chất liệu Satin nhẹ tênh, sáng bóng. Bên cạnh họa tiết Monogram cùng tông màu được dệt kiểu Jacquard trên toàn bộ thiết kế, áo còn nổi bật với các chi tiết bằng Monogram Canvas trên đầu khóa kéo phía trước và dây rút. Mang phong cách năng động với lớp lót bằng vải lưới thoáng khí, sản phẩm được hoàn thiện với mũ trùm tiện dụng, túi trước rộng rãi và tay áo bo chun.', '2023-11-29', 352, 2, 1);

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
(17, 2, 2, 12, 11),
(21, 1, 2, 7, 3),
(22, 1, 3, 7, 5),
(23, 2, 2, 7, 7),
(24, 3, 4, 7, 4),
(25, 2, 3, 8, 10),
(26, 1, 4, 8, 10),
(27, 1, 3, 8, 10),
(28, 1, 7, 11, 1),
(29, 1, 3, 15, 10),
(30, 1, 2, 15, 10),
(31, 2, 7, 15, 1),
(32, 2, 4, 15, 1),
(33, 3, 3, 15, 10),
(34, 4, 4, 16, 1),
(35, 1, 4, 16, 10),
(36, 4, 2, 17, 5),
(37, 1, 3, 17, 7),
(38, 3, 3, 17, 10),
(39, 3, 4, 18, 1),
(40, 2, 3, 18, 4),
(41, 2, 4, 18, 10),
(42, 4, 7, 7, 40);

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
(1, 'ADMIN', '123456', '4.webp', 'NGUYỄN HỮU TUẤN ANH', 1, 'anhnhtph41946@fpt.edu.vn', 985679042, 'Xã Thanh Hà', 0),
(4, 'Tuananh0812', '123456', '358029119_10159477036007078_7939670024004642255_n.jpg', 'Tuấn Anh', 0, 'anhthu09112k5@gmail.com', 985679042, 'Nguyên Xá, Cầu Diễn, Q.Bắc Từ Liêm, Hà Nội', 0),
(5, 'Tuananh01', 'f08a4c2c', NULL, 'NGUYỄN HỮU TUẤN ANH', 0, 'anhnhtph41946@fpt.edu.vn', NULL, '123', 1);

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
  ADD KEY `mau_sac` (`mau_sac`),
  ADD KEY `kich_co` (`kich_co`);

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
  MODIFY `id_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  MODIFY `id_ctdon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id_don` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `img_sp`
--
ALTER TABLE `img_sp`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `sanpham_bienthe`
--
ALTER TABLE `sanpham_bienthe`
  MODIFY `id_spbt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_tk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `don_hang_ibfk_4` FOREIGN KEY (`kich_co`) REFERENCES `size` (`id_size`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `don_hang_ibfk_5` FOREIGN KEY (`mau_sac`) REFERENCES `color` (`id_color`) ON DELETE CASCADE ON UPDATE CASCADE;

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

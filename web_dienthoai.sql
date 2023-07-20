-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 03, 2023 lúc 09:41 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_dienthoai`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `email`, `password`, `name`, `phone`, `address`) VALUES
(1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', '0153759852456', 'Đại Học Duy Tân, 120 Hoàng Minh Thảo, phường Hòa Khánh Nam, quận Liên Chiểu, TP. Đà Nẵng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhgia`
--

CREATE TABLE `tbl_danhgia` (
  `id_danhgia` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `noidung` text NOT NULL,
  `ngaydg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhgia`
--

INSERT INTO `tbl_danhgia` (`id_danhgia`, `id_taikhoan`, `id_sanpham`, `noidung`, `ngaydg`) VALUES
(31, 33, 62, 'Ok', '2022-12-30'),
(36, 33, 74, 'Ok', '2022-12-30'),
(37, 38, 60, 'Ok', '2022-12-30'),
(38, 38, 70, 'Ok', '2022-12-30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL,
  `hinhanh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tendanhmuc`, `hinhanh`) VALUES
(2, 'Apple', '1668682256_apple.png'),
(3, 'Samsung', 'samsung.png'),
(4, 'Oppo', 'oppo.png'),
(5, 'Realme', 'realme.png'),
(6, 'Xiaomi', 'xiaomi.png'),
(7, 'Vivo', 'vivo.png'),
(8, 'Vsmart', 'vsmart.png'),
(9, 'Huawei', 'huawei.png'),
(10, 'Nokia', '1671280912_nokia.png'),
(13, 'LG', '1668601620_lg.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `id_seller` int(11) NOT NULL,
  `code_order` varchar(10) NOT NULL,
  `total` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `id_taikhoan`, `id_seller`, `code_order`, `total`, `note`, `status`) VALUES
(52, 33, 38, '4231', 28480000, 'Lorem ipsum dolor sit amet consectetuer.', 2),
(53, 38, 33, '6654', 83570000, 'Lorem ipsum dolor sit amet consectetuer.', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `id_order_detail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`id_order_detail`, `id_order`, `id_sanpham`, `price`, `quantity`) VALUES
(90, 52, 62, 18490000, 1),
(91, 52, 74, 9990000, 1),
(92, 53, 60, 33590000, 1),
(93, 53, 70, 24990000, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(250) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `giasanpham` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `diadiem` varchar(250) NOT NULL,
  `noidung` text NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `hinhanh`, `giasanpham`, `soluong`, `diadiem`, `noidung`, `id_danhmuc`, `id_taikhoan`) VALUES
(60, 'Điện thoại iPhone 14 Pro Max 128GB', '1671009993_iphone2.png', 33590000, 2, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 2, 33),
(62, 'Điện thoại OPPO Reno8 Pro 5G', '1671014398_oppo.png', 18490000, 0, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 4, 38),
(63, 'Điện thoại Vivo V25 5G', '1671014527_vivo.png', 10490000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 7, 38),
(65, 'Điện thoại Xiaomi Redmi Note 11 (4GB/64GB)', '1671014655_xiaomi.png', 4390000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 6, 38),
(66, 'Điện thoại Vsmart Active 3', '1671014696_vsmart.png', 6000000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 8, 38),
(67, 'Điện thoại Nokia G21', '1671014736_nokia.png', 3890000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 10, 38),
(68, 'Điện thoại Huawei P30 Lite', '1671014793_huawei.png', 7490000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 9, 38),
(70, 'Điện thoại Samsung Galaxy S22 Ultra 5G 128GB', '1671014928_samsung2.png', 24990000, 3, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 3, 33),
(71, 'Điện thoại Samsung Galaxy Z Flip4 128GB', '1671014963_samsung.png', 20990000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 3, 33),
(72, 'Điện thoại iPhone 11 64GB', '1671015002_iphone.png', 11690000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 2, 33),
(74, 'Điện thoại Realme 9 Pro+ 5G', '1671524843_realme.png', 9990000, 0, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 5, 38),
(75, 'LG Velvet 5G (8GB|128GB) Hàn Quốc G900EM (Cũ 99%)', '1671525083_lg.png', 3990000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 13, 38),
(78, 'Điện thoại Xiaomi 11 Lite 5G NE', '1672567738_image-removebg-preview-19.png', 7490000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 6, 33),
(79, 'Điện thoại OPPO A95', '1672568117_dien-thoai-a95-_main_798_1020.png', 5990000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 4, 33),
(80, 'Điện thoại Vivo Y15s', '1672568314_b861e9457b3b9d4cd7eeedaca168162f.png', 2890000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 7, 33),
(81, 'Điện thoại Realme 8 Pro', '1672568542_realme-8-pro-blue-200x200.jpg', 8690000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 5, 33),
(82, 'Điện thoại Nokia G11 Plus 32GB', '1672569777_nokia-g11-plus-xam-thumb-200x200.jpg', 2690000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 10, 33),
(83, 'Điện thoại Vsmart Active 3 (6GB/64GB)', '1672570174_vsmart-active-3_3_.webp', 2990000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 8, 33),
(84, 'Điện thoại iPhone SE 64GB (2022)', '1672570314_iphone-se-black-200x200.jpeg', 10990000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 2, 38),
(85, 'Điện thoại Samsung Galaxy A23 4GB', '1672570611_samsung-galaxy-_main_939_1020.png.webp', 5590000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 3, 38),
(86, 'Điện thoại LG V50S ThinQ 5G (8GB-256GB) Like New 99%', '1673853190_lg-v50s-3.png', 3790000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 13, 41),
(87, 'Điện thoại Nokia X10 6GB 128GB', '1673853416_nokia-x10_2.webp', 3590000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 10, 41),
(88, 'Điện thoại Huawei Nova 3i', '1673853655_huawei-nova-3i-didongviet_1_1.jpg', 4390000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 9, 41),
(89, 'Điện thoại Vivo V23 5G 5G 8GB 128GB', '1673854039_vivo_v23_04_2.webp', 6190000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 7, 41),
(90, 'Điện thoại Vsmart Star 5 ', '1673854201_vsmart-star-5-1_3_3.webp', 1490000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 8, 41),
(91, 'Điện thoại Realme C11 2021', '1673854303_realme_c11_0003_layer_1_2_2_2.webp', 1890000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 5, 41),
(92, 'Điện thoại Xiaomi 12T Pro 12GB 256GB', '1673854542_xiaomi-12t-xanh_2_1.webp', 12690000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 6, 41),
(93, 'Điện thoại Oppo A55', '1673854720_oppo-a55-price-in-bangladesh_2.webp', 3090000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 4, 41),
(94, 'Điện thoại Samsung Galaxy A73 5G 8GB 256GB', '1673854906_a73-xanh_3.webp', 8790000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 3, 41),
(95, 'Điện thoại iPhone 13 Pro Max 128GB', '1673855057_3_51_1_2_2_1_1_2.webp', 22990000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 2, 41),
(96, 'Điện thoại Vsmart Live 4 6GB 64GB', '1673855793_vsmart-live-_4_1__2_3.webp', 2090000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 8, 45),
(97, 'Điện thoại Vivo Y55 8G 128GB', '1673856009_4_246.webp', 4490000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 7, 45),
(98, 'Điện thoại Realme 8 5G', '1673856107_realme-8-5g-blue-1-600x600_1_3.webp', 3890000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 5, 45),
(99, 'Điện thoại Nokia C31 4GB 128GB', '1673856229_1_250_1_3.webp', 2390000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 10, 45),
(100, 'Điện thoại OPPO A57 4GB 128GB', '1673856387_jikb212d9xgatxgg_3_1.webp', 3790000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 4, 45),
(101, 'Điện thoại Xiaomi 12', '1673856492_xiaomi-12-pro_arenamobiles_1_1_1.webp', 10690000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 6, 45),
(102, 'Điện thoại iPhone 13 mini 128GB', '1673856631_13_4_7_2_2_1.webp', 13390000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 2, 45),
(103, 'Điện thoại Samsung Galaxy A33 (5G)', '1673856749_download_5__2_1_1.webp', 5190000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 3, 45),
(104, 'Điện thoại Samsung Galaxy S21 5G Cũ đẹp', '1673857086_samsung-galaxy-s21-1_2.webp', 10990000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 3, 46),
(105, 'Điện thoại Xiaomi Redmi Note 11S', '1673857260_note_11s-01_1_1.webp', 4390000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 6, 46),
(107, 'Điện thoại Vivo V25 Pro 5G 8GB 128GB', '1673857770_e061bd2ab13b5e2263236cb206248daa_1.webp', 10390000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 7, 46),
(108, 'Điện thoại Nokia T20 4GB 64GB', '1673858073_nokia-t20-1-600x600_2_2_1_1.webp', 3290000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 10, 46),
(109, 'Điện thoại Oppo A16K 3GB 32GB', '1673858266_combo_a16k_-_blue_1_2_1.webp', 2290000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 4, 46),
(110, 'Điện thoại Realme C25Y 4GB 128GB', '1673858359_realme-c25y-2_2_3_1_1.webp', 2490000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 5, 46),
(111, 'Điện thoại OPPO Reno8 Z', '1673949288_photo_2022-08-05_09-40-15_1.webp', 7490000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 4, 45),
(112, 'Điện thoại Realme 9i 6GB 128GB', '1673949625_realme-9i-2_1_2.webp', 4290000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 5, 45),
(113, 'Điện thoại Vivo T1 5G', '1673949891_t_i_xu_ng_59__2.webp', 5590000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 7, 46),
(114, 'Điện thoại Samsung Galaxy A13 4G 128GB', '1673950661_galaxy_a13_3.webp', 3390000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 3, 46),
(115, 'Điện thoại Huawei Nova 5T', '1673951592_61SnLBKlA0L._SR476,476_.jpg', 8290000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 9, 46),
(131, 'Điện thoại iPhone Xs Max 64GB', '1675412027_1673951669_iphone_xs_max_512gb_1_1.webp', 8690000, 1, 'Đà Nẵng', 'Lorem ipsum dolor sit amet consectetuer.', 2, 46);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_taikhoan`
--

CREATE TABLE `tbl_taikhoan` (
  `id_taikhoan` int(11) NOT NULL,
  `tenkhachhang` varchar(200) NOT NULL,
  `dienthoai` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `matkhau` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_taikhoan`
--

INSERT INTO `tbl_taikhoan` (`id_taikhoan`, `tenkhachhang`, `dienthoai`, `email`, `diachi`, `matkhau`) VALUES
(33, 'Thiện Nguyễn', '0123456789', 'thiennguyen1701@gmail.com', '120 Hoàng Minh Thảo', '$2y$10$FS0YNM30PyW/l9Kgwa7TZexlOkW2NH6ud6LGFd1NvvVhv7ufRdbgG'),
(38, 'Lê Xuân Tạo', '0987654321', 'hahaha@gmail.com', '03 Quang Trung', '$2y$10$.07cmvMqPctzy7yQMW3mpuXXOCNTZ1yaDKWYM5MgqHsbqtIRsgYc.'),
(41, 'Trần Đức Danh', '0456789123', 'hohoho@gmail.com', '254 Nguyễn Văn Linh', '$2y$10$JGaPdZpClO9tixPego/N..EmlCb4IULSK//L0J9EAHLVTv5ppZNo.'),
(45, 'Nguyễn Ngọc Hùng', '0789123456', 'hehehe@gmail.com', '209 Phan Thanh', '$2y$10$7Ayl/d2r6csb5zxgl/RCLeJXvNvNxfivLQyBgX6ec./gd0poyresy'),
(46, 'Trần Đình Duy Nghĩa', '0123456987', 'hihihi@gmail.com', '137 Nguyễn Văn Linh', '$2y$10$mt8fPw0Fq4hum0HyG.WT9.OiDXHcwqK8MfAvzCcJL.dWa1p9ChT8a'),
(47, 'Nguyễn Văn A', '0123456789', '123213@gmail.com', 'Thái Thị Bôi', '$2y$10$MzQUiaMGwhR267QvFkC8JOTz7Fo3ACyB5M7VmQHIAIkq4whiJZon.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thuvienanh`
--

CREATE TABLE `tbl_thuvienanh` (
  `id` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `hinhanh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_thuvienanh`
--

INSERT INTO `tbl_thuvienanh` (`id`, `id_sanpham`, `hinhanh`) VALUES
(95, 62, 'oppo-reno8-pro-xanh-4.jpg'),
(96, 62, 'oppo-reno8-pro-xanh-5.jpg'),
(97, 62, 'oppo-reno8-pro-xanh-10.jpg'),
(101, 63, 'vivo-v25-vang-4.jpg'),
(102, 63, 'vivo-v25-vang-5.jpg'),
(103, 63, 'vivo-v25-vang-9.jpg'),
(107, 65, 'xiaomi-redmi-note-11-4.jpg'),
(108, 65, 'xiaomi-redmi-note-11-6.jpg'),
(109, 65, 'xiaomi-redmi-note-11-11.jpg'),
(110, 66, 'vsmart-active-3-xanh-4-org.jpg'),
(111, 66, 'vsmart-active-3-xanh-5-org.jpg'),
(112, 66, 'vsmart-active-3-xanh-8-org.jpg'),
(113, 67, 'nokia-g21-4.jpg'),
(114, 67, 'nokia-g21-5.jpg'),
(115, 67, 'nokia-g21-6.jpg'),
(116, 68, 'huawei-p30-lite-den-4-org.jpg'),
(117, 68, 'huawei-p30-lite-den-5-org.jpg'),
(118, 68, 'huawei-p30-lite-den-7-org.jpg'),
(120, 70, 'samsung-galaxy-s22-ultra-do-5.jpg'),
(121, 70, 'samsung-galaxy-s22-ultra-do-6.jpg'),
(122, 70, 'samsung-galaxy-s22-ultra-do-10.jpg'),
(123, 71, 'samsung-galaxy-z-flip4-tim-128gb-2.jpg'),
(124, 71, 'samsung-galaxy-z-flip4-tim-128gb-4.jpg'),
(125, 71, 'samsung-galaxy-z-flip4-tim-128gb-6.jpg'),
(126, 72, 'iphone-11-trang-4-1-org.jpg'),
(127, 72, 'iphone-11-trang-5-1-org.jpg'),
(128, 72, 'iphone-11-trang-9-org.jpg'),
(131, 74, 'realme-9-pro-plus-4-1.jpg'),
(132, 74, 'realme-9-pro-plus-5-1.jpg'),
(133, 74, 'realme-9-pro-plus-12-1.jpg'),
(135, 75, 'lg2.jpg'),
(159, 60, 'iphone-14-pro-vang-1-2.png'),
(160, 60, 'iphone-14-pro-vang-2-1.png'),
(161, 60, 'iphone-14-pro-vang-3-1.png'),
(162, 78, 'xiaomi-11-lite-5g-ne-6-4.jpg'),
(163, 78, 'xiaomi-11-lite-5g-ne-9-4.jpg'),
(164, 78, 'xiaomi-11-lite-5g-ne-11-4.jpg'),
(165, 79, 'oppo-a95-4g-bac-4-1.jpg'),
(166, 79, 'oppo-a95-4g-bac-6-1.jpg'),
(167, 79, 'oppo-a95-4g-bac-9-1.jpg'),
(168, 80, 'vivo-y15s-2021-d-5.jpg'),
(169, 80, 'vivo-y15s-2021-d-8.jpg'),
(170, 80, 'vivo-y15s-2021-d-10.jpg'),
(172, 81, 'realme-8-pro-xanh-duong-4-org.jpg'),
(173, 81, 'realme-8-pro-xanh-duong-5-org.jpg'),
(174, 81, 'realme-8-pro-xanh-duong-8-org.jpg'),
(178, 82, 'nokia-g11-plus-xam-4-1.jpg'),
(179, 82, 'nokia-g11-plus-xam-5.jpg'),
(180, 82, 'nokia-g11-plus-xam-8.jpg'),
(181, 83, 'vsmart-active-3-6gb-tim-5-org.jpg'),
(182, 83, 'vsmart-active-3-6gb-tim-8-org.jpg'),
(183, 83, 'vsmart-active-3-6gb-tim-10-org.jpg'),
(184, 84, 'iphone-se-2022-den-2.jpg'),
(188, 86, 'lg-v50s-hinh-anh-thuc-te-11.jpg'),
(189, 86, 'lg-v50s-hinh-anh-thuc-te-14.jpg'),
(190, 87, 'ld0005850038_1_1.webp'),
(191, 87, 't_i_xu_ng_70__1.webp'),
(192, 88, 'huawei-nova-3i-tim-4-org.jpg'),
(193, 88, 'huawei-nova-3i-tim-6-org.jpg'),
(194, 88, 'huawei-nova-3i-tim-9-org.jpg'),
(195, 89, '4096-2731-max_1__2_4_1.webp'),
(196, 89, '4096-2731-max_3__2_4_1.webp'),
(197, 90, 'vsmart-star-5-13_3_1.webp'),
(198, 90, 'vsmart-star-5-14_1.webp'),
(199, 91, 'realme_c11_0001_layer_3_2_1.webp'),
(200, 92, '11_38_1_1.webp'),
(201, 93, '_rainbow_blue__horizontal_version_1.webp'),
(202, 93, '1536-1024_9__2_16_1.webp'),
(203, 93, '1536-1024_10__14_1.webp'),
(204, 94, '013_galaxy_a73_5g_mint_back_l30_2.webp'),
(205, 94, '016_galaxy_a73_5g_mint_r_side_2.webp'),
(206, 95, 'iphone-13-pro-max-8_1_1_2_1_1_1_2.webp'),
(207, 95, 'iphone-13-pro-max-10_1_1_2_1_1_1_2.webp'),
(208, 96, 'vsmart-live-_4_2__2_3.webp'),
(209, 96, 'vsmart-live-_4_3__2_3.webp'),
(210, 97, '5_208.webp'),
(211, 97, '6_163.webp'),
(212, 98, 'realme-8-5g_1_2.webp'),
(213, 99, '3_222_1_1.webp'),
(214, 99, '8_62_1_1.webp'),
(215, 99, '11_32_1_1_1.webp'),
(216, 100, '3_58_2_2_1.webp'),
(217, 100, '4_51_4_1.webp'),
(218, 100, '5_41_4_1.webp'),
(219, 101, 'gsmarena_004_2_1_1.webp'),
(220, 101, 'gsmarena_009_2_1_1.webp'),
(221, 101, 'gsmarena_010_2_1_1.webp'),
(222, 102, '11_3_12_2_2_1.webp'),
(223, 102, '12_3_8_2_3_1.webp'),
(224, 102, '14_1_9_2_4_1.webp'),
(225, 103, 'samsung-galaxy-a33-5g-cam-3_1.webp'),
(226, 103, 'samsung-galaxy-a33-5g-cam-4_1.webp'),
(227, 103, 'samsung-galaxy-a33-5g-cam-6_1.webp'),
(229, 104, 'samsung-galaxy-s21-2_2.webp'),
(230, 104, 'samsung-galaxy-s21-3_2.webp'),
(231, 105, 'frame37917-640x640_1__2_1.webp'),
(232, 105, 'redmi-note-11-s-bl_1_1.webp'),
(233, 105, 'xiaomi_redmi_note_11_s_1_1.webp'),
(240, 107, '10_46_1.webp'),
(241, 107, 'vivo-v25-pro-xanh-glr-2_1.webp'),
(242, 107, 'vivo-v25-pro-xanh-glr-3_1.webp'),
(245, 108, 't_i_xu_ng_4__2_3_1_1_1_1.webp'),
(246, 108, 't_i_xu_ng_5__1_3_1_1_1_1.webp'),
(247, 109, '1955-1024_1_1_1.webp'),
(248, 109, 'oppo-a16k-4g-003_1_1_1.webp'),
(249, 110, 'realme-c25y-1_1_3_1_1.webp'),
(250, 111, '6_26_96_1.webp'),
(251, 111, 'oppo_reno8z_01_1.webp'),
(255, 112, '4096-2731-max_2__1_5_1.webp'),
(256, 112, '4096-2731-max_5__2_5_1.webp'),
(257, 112, '4096-2731-max_7__1_4_1.webp'),
(258, 113, 'gallery-pc-img3_1__1.webp'),
(259, 113, 'vivo-t1-5g-rainbow-fantasy-back-left_1.webp'),
(266, 114, 'samsung-galaxy-a13-4g-1_2.webp'),
(267, 114, 'samsung-galaxy-a13-4g-2_2.webp'),
(268, 115, '637105309125106244_huawei-nova-5t-xanh-3.webp'),
(269, 115, '637105309125166256_huawei-nova-5t-xanh-4.webp'),
(293, 131, 'iphone-xs-max-8-org.jpg'),
(294, 131, 'iphone-xs-max-7-org.jpg'),
(295, 131, 'iphone-xs-max-6-org.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  ADD PRIMARY KEY (`id_danhgia`),
  ADD KEY `id_taikhoan` (`id_taikhoan`),
  ADD KEY `id_sanpham` (`id_sanpham`),
  ADD KEY `id_taikhoan_2` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_taikhoan` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`id_order_detail`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `id_danhmuc` (`id_danhmuc`),
  ADD KEY `id_danhmuc_2` (`id_danhmuc`),
  ADD KEY `id_taikhoan` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `tbl_taikhoan`
--
ALTER TABLE `tbl_taikhoan`
  ADD PRIMARY KEY (`id_taikhoan`);

--
-- Chỉ mục cho bảng `tbl_thuvienanh`
--
ALTER TABLE `tbl_thuvienanh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  MODIFY `id_danhgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `id_order_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT cho bảng `tbl_taikhoan`
--
ALTER TABLE `tbl_taikhoan`
  MODIFY `id_taikhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `tbl_thuvienanh`
--
ALTER TABLE `tbl_thuvienanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  ADD CONSTRAINT `fk_spdg` FOREIGN KEY (`id_sanpham`) REFERENCES `tbl_sanpham` (`id_sanpham`),
  ADD CONSTRAINT `fk_tkdg` FOREIGN KEY (`id_taikhoan`) REFERENCES `tbl_taikhoan` (`id_taikhoan`);

--
-- Các ràng buộc cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`id_taikhoan`) REFERENCES `tbl_taikhoan` (`id_taikhoan`);

--
-- Các ràng buộc cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD CONSTRAINT `fk_order_detail` FOREIGN KEY (`id_order`) REFERENCES `tbl_order` (`id_order`),
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`id_sanpham`) REFERENCES `tbl_sanpham` (`id_sanpham`);

--
-- Các ràng buộc cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `fk_danhmuc` FOREIGN KEY (`id_danhmuc`) REFERENCES `tbl_danhmuc` (`id_danhmuc`),
  ADD CONSTRAINT `fk_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `tbl_taikhoan` (`id_taikhoan`);

--
-- Các ràng buộc cho bảng `tbl_thuvienanh`
--
ALTER TABLE `tbl_thuvienanh`
  ADD CONSTRAINT `fk_images` FOREIGN KEY (`id_sanpham`) REFERENCES `tbl_sanpham` (`id_sanpham`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

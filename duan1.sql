-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 07, 2025 lúc 04:03 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

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
-- Cấu trúc bảng cho bảng `bienthe`
--

CREATE TABLE `bienthe` (
  `namebt` varchar(255) DEFAULT NULL,
  `idbt` int(11) NOT NULL,
  `idsp` int(11) DEFAULT NULL,
  `hinhbt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bienthe`
--

INSERT INTO `bienthe` (`namebt`, `idbt`, `idsp`, `hinhbt`) VALUES
('haha', 6, 61, 'logo.png'),
('mau xam ', 10, 63, 'logo3.jpg'),
('orage', 15, 83, 'fcf51137-7a0c-414a-80ac-e1db54afdb4a.webp'),
('a', 16, 83, '33eb9f15-0a30-4244-bf41-77861d94a45f copy 2.webp'),
('aaa', 17, 61, '2-1654395353971.jpeg'),
('aaa', 18, 61, '2-1654395353971.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(10) NOT NULL,
  `bill_name` varchar(255) NOT NULL,
  `bill_address` varchar(255) NOT NULL,
  `bill_tel` varchar(50) NOT NULL,
  `bill_email` varchar(100) NOT NULL,
  `bill_pttt` tinyint(1) DEFAULT 1,
  `total` int(10) NOT NULL DEFAULT 0,
  `bill_status` tinyint(1) DEFAULT 0,
  `receive_name` varchar(255) DEFAULT NULL,
  `receive_address` varchar(255) DEFAULT NULL,
  `receive_tel` varchar(50) DEFAULT NULL,
  `ngaydathang` varchar(50) DEFAULT NULL,
  `iduser` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `total`, `bill_status`, `receive_name`, `receive_address`, `receive_tel`, `ngaydathang`, `iduser`) VALUES
(73, 'duy1999', 'ha noi', '03666', 'abc@gmai.com', 0, 2499000, 3, NULL, NULL, NULL, '03:42:17am 06/12/2023', 13),
(74, 'duy1999', 'ha noi', '0366632006', 'loviongs@gmail.com', 0, 5198000, 4, NULL, NULL, NULL, '05:04:05am 08/12/2023', 43),
(75, 'duy1999', 'ha noi', '0366632006', 'loviongs@gmail.com', 0, 5198000, 3, NULL, NULL, NULL, '05:04:35am 08/12/2023', 43),
(90, 'NGUYỄN THANH TÙNG', 'Tổ Dân Phố 6 Thi Trấn Nưa, Triệu Sơn, Thanh Hóa', '0123456789', 'nguyentung10c2@gmail.com', 0, 4998000, 0, NULL, NULL, NULL, '10:26:11am 05/04/2024', 46),
(91, 'NGUYỄN THANH TÙNG', 'Tổ Dân Phố 6 Thi Trấn Nưa, Triệu Sơn, Thanh Hóa', '0123456789', 'nguyentung10c2@gmail.com', 0, 0, 0, NULL, NULL, NULL, '10:26:23am 05/04/2024', 46),
(92, 'NGUYỄN THANH TÙNG', 'Tổ Dân Phố 6 Thi Trấn Nưa, Triệu Sơn, Thanh Hóa', '0123456789', 'tungntph45409@fpt.edu.vn', 0, 4998000, 0, NULL, NULL, NULL, '10:58:52am 05/04/2024', 10),
(93, 'NGUYỄN THANH TÙNG', 'Tổ Dân Phố 6 Thi Trấn Nưa, Triệu Sơn, Thanh Hóa', '0123456789', 'tungntph45409@fpt.edu.vn', 0, 2499000, 0, NULL, NULL, NULL, '09:59:19am 13/04/2024', 10),
(94, 'NGUYỄN THANH TÙNG', 'Tổ Dân Phố 6 Thi Trấn Nưa, Triệu Sơn, Thanh Hóa', '0123456789', 'tungntph45409@fpt.edu.vn', 0, 2990000, 0, NULL, NULL, NULL, '03:57:40pm 16/04/2024', 10),
(95, 'sdkjs', 'fsf', '374', 'asdfs', 0, 2499000, 2, NULL, NULL, NULL, '10:59:01am 23/05/2024', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `idbl` int(10) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idpro` int(11) NOT NULL,
  `ngaybinhluan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`idbl`, `noidung`, `iduser`, `idpro`, `ngaybinhluan`) VALUES
(30, 'oh it is good', 10, 61, '09:24:03am 03/12/2023'),
(31, 'hay quá', 10, 76, '10:14:25am 03/04/2024'),
(32, 'đệp quá\r\n', 45, 83, '10:15:32am 03/04/2024');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `iduser` int(10) NOT NULL,
  `idpro` int(10) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(10) NOT NULL,
  `soluong` int(3) NOT NULL DEFAULT 0,
  `thanhtien` int(10) NOT NULL,
  `idbill` int(10) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `màu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `iduser`, `idpro`, `img`, `name`, `price`, `soluong`, `thanhtien`, `idbill`, `size`, `màu`) VALUES
(107, 10, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red', 2499000, 1, 2499000, 72, NULL, ''),
(108, 13, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 73, NULL, ''),
(109, 43, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 2, 2499000, 74, NULL, NULL),
(110, 43, 61, 'disuwww5uxkqulu2aivh.webp', 'Nike InfinityRN 4 GORE', 200000, 1, 200000, 74, NULL, NULL),
(111, 43, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 2, 2499000, 75, NULL, NULL),
(112, 43, 61, 'disuwww5uxkqulu2aivh.webp', 'Nike InfinityRN 4 GORE', 200000, 1, 200000, 75, NULL, NULL),
(113, 43, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 76, NULL, NULL),
(114, 43, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 76, NULL, NULL),
(115, 43, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 77, NULL, NULL),
(116, 43, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 77, NULL, NULL),
(117, 43, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 78, NULL, NULL),
(118, 43, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 78, NULL, NULL),
(119, 43, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 79, NULL, NULL),
(120, 43, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 79, NULL, NULL),
(121, 43, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 80, NULL, NULL),
(122, 43, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 80, NULL, NULL),
(123, 43, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 81, NULL, NULL),
(124, 43, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 81, NULL, NULL),
(125, 43, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 82, NULL, NULL),
(126, 43, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 82, NULL, NULL),
(127, 43, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 83, NULL, NULL),
(128, 43, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 83, NULL, NULL),
(129, 43, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 4, 2499000, 84, NULL, NULL),
(130, 43, 63, 'f153b4e4-9069-44ae-bf86-f70ae8ecbaa1.webp', 'Nike Air Force 1 ', 2990000, 1, 2990000, 85, NULL, NULL),
(131, 43, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 85, NULL, NULL),
(132, 43, 63, 'f153b4e4-9069-44ae-bf86-f70ae8ecbaa1.webp', 'Nike Air Force 1 ', 2990000, 1, 2990000, 86, NULL, NULL),
(133, 43, 63, 'f153b4e4-9069-44ae-bf86-f70ae8ecbaa1.webp', 'Nike Air Force 1 ', 2990000, 1, 2990000, 86, NULL, NULL),
(134, 43, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 86, NULL, NULL),
(135, 43, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 87, NULL, NULL),
(136, 43, 63, 'f153b4e4-9069-44ae-bf86-f70ae8ecbaa1.webp', 'Nike Air Force 1 ', 2990000, 1, 2990000, 87, NULL, NULL),
(137, 10, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 89, NULL, NULL),
(138, 46, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 90, NULL, NULL),
(139, 46, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 90, NULL, NULL),
(140, 10, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 92, NULL, NULL),
(141, 10, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 92, NULL, NULL),
(142, 10, 83, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'Air Jordan 1 red black', 2499000, 1, 2499000, 93, NULL, NULL),
(143, 10, 63, 'f153b4e4-9069-44ae-bf86-f70ae8ecbaa1.webp', 'Nike Air Force 1 ', 2990000, 1, 2990000, 94, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(100) NOT NULL,
  `namedm` varchar(1000) NOT NULL,
  `idcha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `namedm`, `idcha`) VALUES
(57, 'Giày ', 7),
(58, 'Áo', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuccha`
--

CREATE TABLE `danhmuccha` (
  `iddmcha` int(11) NOT NULL,
  `tendmcha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuccha`
--

INSERT INTO `danhmuccha` (`iddmcha`, `tendmcha`) VALUES
(7, 'Sản phẩm'),
(40, 'Nam '),
(42, 'Nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lk_size_sp`
--

CREATE TABLE `lk_size_sp` (
  `idlk` int(11) NOT NULL,
  `sizeid` int(11) DEFAULT NULL,
  `spid` int(11) DEFAULT NULL,
  `slsize` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lk_size_sp`
--

INSERT INTO `lk_size_sp` (`idlk`, `sizeid`, `spid`, `slsize`) VALUES
(3, 1, 63, 5),
(4, 1, 61, 6),
(5, 4, 63, 3),
(6, 4, 61, 7),
(7, 5, 63, 2),
(8, 6, 83, 7),
(9, 7, 83, 2),
(10, 6, 63, 4),
(11, 7, 63, 11),
(12, 18, 84, 10),
(13, 19, 84, 6),
(14, 20, 84, 5),
(15, 21, 84, 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `luotxem` int(11) DEFAULT 0,
  `iddm` int(100) DEFAULT NULL,
  `priceold` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `price`, `img`, `mota`, `luotxem`, `iddm`, `priceold`) VALUES
(61, 'Nike InfinityRN 4 GORE', 200000, 'disuwww5uxkqulu2aivh.webp', 'San pham demo', 45, 57, 188999),
(63, 'Nike Air Force 1 ', 2990000, 'f153b4e4-9069-44ae-bf86-f70ae8ecbaa1.webp', '', 484, 57, NULL),
(76, 'Air Jordan 1 Low', 2499000, 'fcf51137-7a0c-414a-80ac-e1db54afdb4a.webp', 'Inspired by the original that debuted in 1985, the Air Jordan 1 Low offers a clean, classic look that is familiar yet always fresh. With an iconic design that pairs perfectly with any fit, these kicks ensure you all always be on point.', 15, 57, NULL),
(78, 'Nike Infinity', 2299000, '349d779a-6d86-4982-9c0f-93f979038cc4.webp', 'demo', 1, 57, NULL),
(81, 'Nike Blazer Mid 77 Vintage', 2990000, '389b709e-5102-4e55-aa5d-07099b500831.webp', 'demo', 9, 57, NULL),
(82, 'Nike Air Force 1 Mid 07', 2499000, '0447d3b3-28d3-4ba3-a6d6-deb0b21558af.webp', 'demo', 74, 58, 2990000),
(83, 'Air Jordan 1 red black', 2499000, '32b0f17a-38ba-40fa-9de7-31c5bb1661e3.webp', 'demo', 548, 57, 2699000),
(84, 'áo ', 110001, '3977a708-1566-491e-a922-672a4306b3bf.webp', 'm', 5, 0, 2900000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `idsize` int(11) NOT NULL,
  `namesize` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`idsize`, `namesize`) VALUES
(1, 'EU 38.5'),
(4, 'EU 39'),
(5, 'EU 40'),
(6, 'EU 41 '),
(7, 'EU 42'),
(8, 'EU 43'),
(9, 'EU 44'),
(10, 'EU 45'),
(11, 'EU 44'),
(12, 'EU 45'),
(13, 'EU 46'),
(15, 'EU 47'),
(16, 'EU 48'),
(17, 'EU 49'),
(18, 'S'),
(19, 'M'),
(20, 'L'),
(21, 'XL'),
(22, 'XXL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `birthday` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `pass`, `email`, `address`, `tel`, `role`, `birthday`) VALUES
(10, 'tungnt', '123456', 'tungntph45409@fpt.edu.vn', '', '', 1, '0'),
(43, 'thaind', '123456', 'thaindph45383@fpt.edu.vn', 'An Thượng, Hoài Đức, Hà Nội', '0908932004', 1, '0'),
(44, 'namnh', '123456', 'namnhph45424@fpt.edu.vn', '', '', 0, '0'),
(45, '', '', '', '', '', 0, '0'),
(46, 'abc', '123456', 'nguyentung10c2@gmail.com', NULL, NULL, 0, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bienthe`
--
ALTER TABLE `bienthe`
  ADD PRIMARY KEY (`idbt`),
  ADD KEY `lk_bienthe_sanpham` (`idsp`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`idbl`),
  ADD KEY `lk_binhluan_taikhoan` (`iduser`),
  ADD KEY `lk_binhluan_sanpham` (`idpro`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_dm_dmcha` (`idcha`);

--
-- Chỉ mục cho bảng `danhmuccha`
--
ALTER TABLE `danhmuccha`
  ADD PRIMARY KEY (`iddmcha`);

--
-- Chỉ mục cho bảng `lk_size_sp`
--
ALTER TABLE `lk_size_sp`
  ADD PRIMARY KEY (`idlk`),
  ADD KEY `lk_sp_lkssp` (`spid`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_sanpham_danhmuc` (`iddm`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`idsize`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bienthe`
--
ALTER TABLE `bienthe`
  MODIFY `idbt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `idbl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT cho bảng `danhmuccha`
--
ALTER TABLE `danhmuccha`
  MODIFY `iddmcha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `lk_size_sp`
--
ALTER TABLE `lk_size_sp`
  MODIFY `idlk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `idsize` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bienthe`
--
ALTER TABLE `bienthe`
  ADD CONSTRAINT `lk_bienthe_sanpham` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `lk_binhluan_sanpham` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `lk_binhluan_taikhoan` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`);

--
-- Các ràng buộc cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD CONSTRAINT `lk_dm_dmcha` FOREIGN KEY (`idcha`) REFERENCES `danhmuccha` (`iddmcha`);

--
-- Các ràng buộc cho bảng `lk_size_sp`
--
ALTER TABLE `lk_size_sp`
  ADD CONSTRAINT `lk_sp_lkssp` FOREIGN KEY (`spid`) REFERENCES `sanpham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

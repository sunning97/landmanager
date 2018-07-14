-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 14, 2018 lúc 08:52 AM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `land_manager`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `district`
--

INSERT INTO `district` (`id`, `name`) VALUES
(1, 'Quận 1'),
(2, 'Quận 2'),
(3, 'Quận 3'),
(4, 'Quận 4'),
(5, 'Quận 5'),
(6, 'Quận 6'),
(7, 'Quận 7'),
(8, 'Quận 8'),
(9, 'Quận 9'),
(10, 'Quận 10'),
(11, 'Quận 11'),
(12, 'Quận 12'),
(13, 'Quận Bình Tân'),
(14, 'Quận Gò Vấp'),
(15, 'Quận Phú Nhuận'),
(16, 'Quận Tân Bình'),
(17, 'Quận Tân Phú'),
(18, 'Quận Thủ Đức'),
(19, 'Quận Bình Thạnh'),
(20, 'Huyện Nhà Bè'),
(21, 'Huyện Hóc Môn'),
(22, 'Huyện Củ Chi'),
(23, 'Huyện Cần Giờ'),
(24, 'Huyện Bình Chánh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `house_type`
--

CREATE TABLE `house_type` (
  `house_type_id` int(11) NOT NULL,
  `house_type_name` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `house_type`
--

INSERT INTO `house_type` (`house_type_id`, `house_type_name`) VALUES
(1, 'Nhà cấp 1'),
(2, 'Nhà cấp 2'),
(3, 'Nhà cấp 3'),
(4, 'Nhà cấp 4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `land`
--

CREATE TABLE `land` (
  `land_id` int(11) NOT NULL,
  `land_owner` int(11) NOT NULL,
  `land_acreage` float NOT NULL,
  `house_type_id` int(11) NOT NULL,
  `purpose_use` int(11) NOT NULL,
  `land_price` decimal(10,0) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `land_owner`
--

CREATE TABLE `land_owner` (
  `id_owner` int(11) NOT NULL,
  `owner_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `owner_email` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `owner_phone` varchar(15) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `purpose_use`
--

CREATE TABLE `purpose_use` (
  `purpose_use_id` int(11) NOT NULL,
  `purpose_use_name` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `purpose_use`
--

INSERT INTO `purpose_use` (`purpose_use_id`, `purpose_use_name`) VALUES
(1, 'Nhà ở'),
(2, 'Kinh doanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `user_email` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `user_password` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `user_avatar` text COLLATE utf8_vietnamese_ci,
  `user_birthday` date DEFAULT NULL,
  `user_phone` varchar(15) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `user_sex` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_avatar`, `user_birthday`, `user_phone`, `user_sex`) VALUES
(1, 'Giang Nguyễn', 'user@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'user-default.png', '1997-04-15', '0971381894', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wards`
--

CREATE TABLE `wards` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `wards`
--

INSERT INTO `wards` (`id`, `name`, `district_id`) VALUES
(1, 'Phường Tân Định', 1),
(2, 'Phường Đa Kao', 1),
(3, 'Phường Bến Nghé', 1),
(4, 'Phường Bến Thành', 1),
(5, 'Phường Nguyễn Thái Bình', 1),
(6, 'Phường Phạm Ngũ Lão', 1),
(7, 'Phường Cầu Ông Lãnh', 1),
(8, 'Phường Cô Giang', 1),
(9, 'Phường Nguyễn Cư Trinh', 1),
(10, 'Phường Cầu Kho', 1),
(11, 'Phường Thạnh Xuân', 12),
(12, 'Phường Thạnh Lộc', 12),
(13, 'Phường Hiệp Thành', 12),
(14, 'Phường Thới An', 12),
(15, 'Phường Tân Chánh Hiệp', 12),
(16, 'Phường An Phú Đông', 12),
(17, 'Phường Tân Thới Hiệp', 12),
(18, 'Phường Trung Mỹ Tây', 12),
(19, 'Phường Tân Hưng Thuận', 12),
(20, 'Phường Đông Hưng Thuận', 12),
(21, 'Phường Tân Thới Nhất', 12),
(22, 'Phường Linh Xuân', 18),
(23, 'Phường Bình Chiểu', 18),
(24, 'Phường Linh Trung', 18),
(25, 'Phường Tam Bình', 18),
(26, 'Phường Tam Phú', 18),
(27, 'Phường Hiệp Bình Phước', 18),
(28, 'Phường Hiệp Bình Chánh', 18),
(29, 'Phường Linh Chiểu', 18),
(30, 'Phường Linh Tây', 18),
(31, 'Phường Linh Đông', 18),
(32, 'Phường Bình Thọ', 18),
(33, 'Phường Trường Thọ', 18),
(34, 'Phường Long Bình', 9),
(35, 'Phường Long Thạnh Mỹ', 9),
(36, 'Phường Tân Phú', 9),
(37, 'Phường Hiệp Phú', 9),
(38, 'Phường Tăng Nhơn Phú A', 9),
(39, 'Phường Tăng Nhơn Phú B', 9),
(40, 'Phường Phước Long B', 9),
(41, 'Phường Phước Long A', 9),
(42, 'Phường Trường Thạnh', 9),
(43, 'Phường Long Phước', 9),
(44, 'Phường Long Trường', 9),
(45, 'Phường Phước Bình', 9),
(46, 'Phường Phú Hữu', 9),
(47, 'Phường 15', 14),
(48, 'Phường 13', 14),
(49, 'Phường 17', 14),
(50, 'Phường 06', 14),
(51, 'Phường 16', 14),
(52, 'Phường 12', 14),
(53, 'Phường 14', 14),
(54, 'Phường 10', 14),
(55, 'Phường 05', 14),
(56, 'Phường 07', 14),
(57, 'Phường 04', 14),
(58, 'Phường 01', 14),
(59, 'Phường 09', 14),
(60, 'Phường 08', 14),
(61, 'Phường 11', 14),
(62, 'Phường 03', 14),
(63, 'Phường 13', 19),
(64, 'Phường 11', 19),
(65, 'Phường 27', 19),
(66, 'Phường 26', 19),
(67, 'Phường 12', 19),
(68, 'Phường 25', 19),
(69, 'Phường 05', 19),
(70, 'Phường 07', 19),
(71, 'Phường 24', 19),
(72, 'Phường 06', 19),
(73, 'Phường 14', 19),
(74, 'Phường 15', 19),
(75, 'Phường 02', 19),
(76, 'Phường 01', 19),
(77, 'Phường 03', 19),
(78, 'Phường 17', 19),
(79, 'Phường 21', 19),
(80, 'Phường 22', 19),
(81, 'Phường 19', 19),
(82, 'Phường 28', 19),
(83, 'Phường 02', 16),
(84, 'Phường 04', 16),
(85, 'Phường 12', 16),
(86, 'Phường 13', 16),
(87, 'Phường 01', 16),
(88, 'Phường 03', 16),
(89, 'Phường 11', 16),
(90, 'Phường 07', 16),
(91, 'Phường 05', 16),
(92, 'Phường 10', 16),
(93, 'Phường 06', 16),
(94, 'Phường 08', 16),
(95, 'Phường 09', 16),
(96, 'Phường 14', 16),
(97, 'Phường 15', 16),
(98, 'Phường Tân Sơn Nhì', 17),
(99, 'Phường Tây Thạnh', 17),
(100, 'Phường Sơn Kỳ', 17),
(101, 'Phường Tân Qúy', 17),
(102, 'Phường Tân Thành', 17),
(103, 'Phường Phú Thọ Hoà', 17),
(104, 'Phường Phú Thạnh', 17),
(105, 'Phường Phú Trung', 17),
(106, 'Phường Hoà Thạnh', 17),
(107, 'Phường Hiệp Tân', 17),
(108, 'Phường Tân Thới Hoà', 17),
(109, 'Phường 04', 15),
(110, 'Phường 05', 15),
(111, 'Phường 09', 15),
(112, 'Phường 07', 15),
(113, 'Phường 03', 15),
(114, 'Phường 01', 15),
(115, 'Phường 02', 15),
(116, 'Phường 08', 15),
(117, 'Phường 15', 15),
(118, 'Phường 10', 15),
(119, 'Phường 11', 15),
(120, 'Phường 17', 15),
(121, 'Phường 14', 15),
(122, 'Phường 12', 15),
(123, 'Phường 13', 15),
(124, 'Phường Thảo Điền', 2),
(125, 'Phường An Phú', 2),
(126, 'Phường Bình An', 2),
(127, 'Phường Bình Trưng Đông', 2),
(128, 'Phường Bình Trưng Tây', 2),
(129, 'Phường Bình Khánh', 2),
(130, 'Phường An Khánh', 2),
(131, 'Phường Cát Lái', 2),
(132, 'Phường Thạnh Mỹ Lợi', 2),
(133, 'Phường An Lợi Đông', 2),
(134, 'Phường Thủ Thiêm', 2),
(135, 'Phường 08', 3),
(136, 'Phường 07', 3),
(137, 'Phường 14', 3),
(138, 'Phường 12', 3),
(139, 'Phường 11', 3),
(140, 'Phường 13', 3),
(141, 'Phường 06', 3),
(142, 'Phường 09', 3),
(143, 'Phường 10', 3),
(144, 'Phường 04', 3),
(145, 'Phường 05', 3),
(146, 'Phường 03', 3),
(147, 'Phường 02', 3),
(148, 'Phường 01', 3),
(149, 'Phường 15', 10),
(150, 'Phường 13', 10),
(151, 'Phường 14', 10),
(152, 'Phường 12', 10),
(153, 'Phường 11', 10),
(154, 'Phường 10', 10),
(155, 'Phường 09', 10),
(156, 'Phường 01', 10),
(157, 'Phường 08', 10),
(158, 'Phường 02', 10),
(159, 'Phường 04', 10),
(160, 'Phường 07', 10),
(161, 'Phường 05', 10),
(162, 'Phường 06', 10),
(163, 'Phường 03', 10),
(164, 'Phường 15', 11),
(165, 'Phường 05', 11),
(166, 'Phường 14', 11),
(167, 'Phường 11', 11),
(168, 'Phường 03', 11),
(169, 'Phường 10', 11),
(170, 'Phường 13', 11),
(171, 'Phường 08', 11),
(172, 'Phường 09', 11),
(173, 'Phường 12', 11),
(174, 'Phường 07', 11),
(175, 'Phường 06', 11),
(176, 'Phường 04', 11),
(177, 'Phường 01', 11),
(178, 'Phường 02', 11),
(179, 'Phường 16', 11),
(180, 'Phường 12', 4),
(181, 'Phường 13', 4),
(182, 'Phường 09', 4),
(183, 'Phường 06', 4),
(184, 'Phường 08', 4),
(185, 'Phường 10', 4),
(186, 'Phường 05', 4),
(187, 'Phường 18', 4),
(188, 'Phường 14', 4),
(189, 'Phường 04', 4),
(190, 'Phường 03', 4),
(191, 'Phường 16', 4),
(192, 'Phường 02', 4),
(193, 'Phường 15', 4),
(194, 'Phường 01', 4),
(195, 'Phường 04', 5),
(196, 'Phường 09', 5),
(197, 'Phường 03', 5),
(198, 'Phường 12', 5),
(199, 'Phường 02', 5),
(200, 'Phường 08', 5),
(201, 'Phường 15', 5),
(202, 'Phường 07', 5),
(203, 'Phường 01', 5),
(204, 'Phường 11', 5),
(205, 'Phường 14', 5),
(206, 'Phường 05', 5),
(207, 'Phường 06', 5),
(208, 'Phường 10', 5),
(209, 'Phường 13', 5),
(210, 'Phường 14', 6),
(211, 'Phường 13', 6),
(212, 'Phường 09', 6),
(213, 'Phường 06', 6),
(214, 'Phường 12', 6),
(215, 'Phường 05', 6),
(216, 'Phường 11', 6),
(217, 'Phường 02', 6),
(218, 'Phường 01', 6),
(219, 'Phường 04', 6),
(220, 'Phường 08', 6),
(221, 'Phường 03', 6),
(222, 'Phường 07', 6),
(223, 'Phường 10', 6),
(224, 'Phường 08', 8),
(225, 'Phường 02', 8),
(226, 'Phường 01', 8),
(227, 'Phường 03', 8),
(228, 'Phường 11', 8),
(229, 'Phường 09', 8),
(230, 'Phường 10', 8),
(231, 'Phường 04', 8),
(232, 'Phường 13', 8),
(233, 'Phường 12', 8),
(234, 'Phường 05', 8),
(235, 'Phường 14', 8),
(236, 'Phường 06', 8),
(237, 'Phường 15', 8),
(238, 'Phường 16', 8),
(239, 'Phường 07', 8),
(240, 'Phường Bình Hưng Hòa', 13),
(241, 'Phường Bình Hưng Hoà A', 13),
(242, 'Phường Bình Hưng Hoà B', 13),
(243, 'Phường Bình Trị Đông', 13),
(244, 'Phường Bình Trị Đông A', 13),
(245, 'Phường Bình Trị Đông B', 13),
(246, 'Phường Tân Tạo', 13),
(247, 'Phường Tân Tạo A', 13),
(248, 'Phường An Lạc', 13),
(249, 'Phường An Lạc A', 13),
(250, 'Phường Tân Thuận Đông', 7),
(251, 'Phường Tân Thuận Tây', 7),
(252, 'Phường Tân Kiểng', 7),
(253, 'Phường Tân Hưng', 7),
(254, 'Phường Bình Thuận', 7),
(255, 'Phường Tân Quy', 7),
(256, 'Phường Phú Thuận', 7),
(257, 'Phường Tân Phú', 7),
(258, 'Phường Tân Phong', 7),
(259, 'Phường Phú Mỹ', 7),
(260, 'Thị trấn Củ Chi', 22),
(261, 'Xã Phú Mỹ Hưng', 22),
(262, 'Xã An Phú', 22),
(263, 'Xã Trung Lập Thượng', 22),
(264, 'Xã An Nhơn Tây', 22),
(265, 'Xã Nhuận Đức', 22),
(266, 'Xã Phạm Văn Cội', 22),
(267, 'Xã Phú Hòa Đông', 22),
(268, 'Xã Trung Lập Hạ', 22),
(269, 'Xã Trung An', 22),
(270, 'Xã Phước Thạnh', 22),
(271, 'Xã Phước Hiệp', 22),
(272, 'Xã Tân An Hội', 22),
(273, 'Xã Phước Vĩnh An', 22),
(274, 'Xã Thái Mỹ', 22),
(275, 'Xã Tân Thạnh Tây', 22),
(276, 'Xã Hòa Phú', 22),
(277, 'Xã Tân Thạnh Đông', 22),
(278, 'Xã Bình Mỹ', 22),
(279, 'Xã Tân Phú Trung', 22),
(280, 'Xã Tân Thông Hội', 22),
(281, 'Thị trấn Hóc Môn', 21),
(282, 'Xã Tân Hiệp', 21),
(283, 'Xã Nhị Bình', 21),
(284, 'Xã Đông Thạnh', 21),
(285, 'Xã Tân Thới Nhì', 21),
(286, 'Xã Thới Tam Thôn', 21),
(287, 'Xã Xuân Thới Sơn', 21),
(288, 'Xã Tân Xuân', 21),
(289, 'Xã Xuân Thới Đông', 21),
(290, 'Xã Trung Chánh', 21),
(291, 'Xã Xuân Thới Thượng', 21),
(292, 'Xã Bà Điểm', 21),
(293, 'Thị trấn Tân Túc', 24),
(294, 'Xã Phạm Văn Hai', 24),
(295, 'Xã Vĩnh Lộc A', 24),
(296, 'Xã Vĩnh Lộc B', 24),
(297, 'Xã Bình Lợi', 24),
(298, 'Xã Lê Minh Xuân', 24),
(299, 'Xã Tân Nhựt', 24),
(300, 'Xã Tân Kiên', 24),
(301, 'Xã Bình Hưng', 24),
(302, 'Xã Phong Phú', 24),
(303, 'Xã An Phú Tây', 24),
(304, 'Xã Hưng Long', 24),
(305, 'Xã Đa Phước', 24),
(306, 'Xã Tân Quý Tây', 24),
(307, 'Xã Bình Chánh', 24),
(308, 'Xã Quy Đức', 24),
(309, 'Thị trấn Nhà Bè', 20),
(310, 'Xã Phước Kiển', 20),
(311, 'Xã Phước Lộc', 20),
(312, 'Xã Nhơn Đức', 20),
(313, 'Xã Phú Xuân', 20),
(314, 'Xã Long Thới', 20),
(315, 'Xã Hiệp Phước', 20),
(316, 'Thị trấn Cần Thạnh', 23),
(317, 'Xã Bình Khánh', 23),
(318, 'Xã Tam Thôn Hiệp', 23),
(319, 'Xã An Thới Đông', 23),
(320, 'Xã Thạnh An', 23),
(321, 'Xã Long Hòa', 23),
(322, 'Xã Lý Nhơn', 23);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `house_type`
--
ALTER TABLE `house_type`
  ADD PRIMARY KEY (`house_type_id`);

--
-- Chỉ mục cho bảng `land`
--
ALTER TABLE `land`
  ADD PRIMARY KEY (`land_id`),
  ADD KEY `house_type_id` (`house_type_id`),
  ADD KEY `purpose_use` (`purpose_use`),
  ADD KEY `land_owner` (`land_owner`);

--
-- Chỉ mục cho bảng `land_owner`
--
ALTER TABLE `land_owner`
  ADD PRIMARY KEY (`id_owner`);

--
-- Chỉ mục cho bảng `purpose_use`
--
ALTER TABLE `purpose_use`
  ADD PRIMARY KEY (`purpose_use_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id` (`district_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `house_type`
--
ALTER TABLE `house_type`
  MODIFY `house_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `land`
--
ALTER TABLE `land`
  MODIFY `land_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `land_owner`
--
ALTER TABLE `land_owner`
  MODIFY `id_owner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT cho bảng `purpose_use`
--
ALTER TABLE `purpose_use`
  MODIFY `purpose_use_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `wards`
--
ALTER TABLE `wards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `land`
--
ALTER TABLE `land`
  ADD CONSTRAINT `land_ibfk_1` FOREIGN KEY (`house_type_id`) REFERENCES `house_type` (`house_type_id`),
  ADD CONSTRAINT `land_ibfk_2` FOREIGN KEY (`purpose_use`) REFERENCES `purpose_use` (`purpose_use_id`),
  ADD CONSTRAINT `land_ibfk_3` FOREIGN KEY (`land_owner`) REFERENCES `land_owner` (`id_owner`);

--
-- Các ràng buộc cho bảng `wards`
--
ALTER TABLE `wards`
  ADD CONSTRAINT `wards_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 24, 2021 lúc 03:55 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `NienLuan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ChiTietHoaDon`
--

CREATE TABLE `ChiTietHoaDon` (
  `CTHD_Ma` int(11) NOT NULL,
  `HD_STT` varchar(10) NOT NULL,
  `SP_Ma` int(11) NOT NULL,
  `SoLuong` int(9) NOT NULL,
  `SP_GiaHienTai` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `HoaDon`
--

CREATE TABLE `HoaDon` (
  `HD_Ma` int(11) NOT NULL,
  `HD_STT` varchar(10) NOT NULL,
  `HD_NgayLap` date DEFAULT NULL,
  `HD_GiaTri` int(11) DEFAULT NULL,
  `KH_Ma` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `KhachHang`
--

CREATE TABLE `KhachHang` (
  `KH_Ma` int(11) NOT NULL,
  `KH_Ten` varchar(100) NOT NULL,
  `KH_GioiTinh` varchar(10) DEFAULT NULL,
  `KH_NgaySinh` date DEFAULT NULL,
  `KH_DiemTichLuy` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `KhachHang`
--

INSERT INTO `KhachHang` (`KH_Ma`, `KH_Ten`, `KH_GioiTinh`, `KH_NgaySinh`, `KH_DiemTichLuy`) VALUES
(1, 'lê chánh nhựt', 'nam', '2000-03-03', NULL),
(2, 'nguyen le vinh ky', 'nam', '2000-05-15', NULL),
(3, 'bùi quốc trọng', 'nam', '2000-05-11', NULL),
(4, 'quách khả ái', 'nữ', '2020-11-02', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `SanPham`
--

CREATE TABLE `SanPham` (
  `SP_Ma` int(11) NOT NULL,
  `SP_Ten` varchar(100) NOT NULL,
  `SP_DonViTinh` varchar(50) NOT NULL,
  `SP_GiaHienTai` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `SanPham`
--

INSERT INTO `SanPham` (`SP_Ma`, `SP_Ten`, `SP_DonViTinh`, `SP_GiaHienTai`) VALUES
(2, 'laptop asus', 'máy', 50000),
(4, 'laptop asus', 'máy', 20000),
(5, 'samsung galaxy s21', 'máy', 15000),
(6, 'iphone 19', 'máy', 999999),
(7, 'dell ', 'máy', 55555),
(8, 'Airpods Pro', 'Bộ', 350),
(9, 'macbook', 'máy', 20000),
(10, 'acer', 'máy', 123123),
(11, 'samsung galaxy buds', 'bộ', 360),
(12, 'iphone Xs Max', 'Máy', 8000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ChiTietHoaDon`
--
ALTER TABLE `ChiTietHoaDon`
  ADD PRIMARY KEY (`CTHD_Ma`);

--
-- Chỉ mục cho bảng `HoaDon`
--
ALTER TABLE `HoaDon`
  ADD PRIMARY KEY (`HD_Ma`);

--
-- Chỉ mục cho bảng `KhachHang`
--
ALTER TABLE `KhachHang`
  ADD PRIMARY KEY (`KH_Ma`);

--
-- Chỉ mục cho bảng `SanPham`
--
ALTER TABLE `SanPham`
  ADD PRIMARY KEY (`SP_Ma`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ChiTietHoaDon`
--
ALTER TABLE `ChiTietHoaDon`
  MODIFY `CTHD_Ma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `HoaDon`
--
ALTER TABLE `HoaDon`
  MODIFY `HD_Ma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `KhachHang`
--
ALTER TABLE `KhachHang`
  MODIFY `KH_Ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `SanPham`
--
ALTER TABLE `SanPham`
  MODIFY `SP_Ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

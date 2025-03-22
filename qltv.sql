-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2023 at 05:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qltv`
--

-- --------------------------------------------------------

--
-- Table structure for table `danhsachmuon`
--

CREATE TABLE `danhsachmuon` (
  `id` int(3) NOT NULL,
  `nm` int(3) DEFAULT NULL,
  `tensach` int(3) NOT NULL,
  `soluongmuon` int(3) NOT NULL,
  `songaytra` int(3) DEFAULT NULL,
  `ngaymuon` date DEFAULT NULL,
  `ngaytra` date DEFAULT NULL,
  `tinhtrang` int(2) NOT NULL,
  `lanmuon` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `danhsachmuon`
--

INSERT INTO `danhsachmuon` (`id`, `nm`, `tensach`, `soluongmuon`, `songaytra`, `ngaymuon`, `ngaytra`, `tinhtrang`, `lanmuon`) VALUES
(1, 1, 1, 1, 30, '2022-12-25', '2023-01-24', 1, 1),
(2, 1, 1, 1, 7, '2023-01-06', '2023-01-13', 1, 1),
(3, 2, 8, 1, 7, '2023-01-07', '2023-01-14', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `docgia`
--

CREATE TABLE `docgia` (
  `id` int(3) NOT NULL,
  `madg` varchar(10) NOT NULL,
  `matkhau` varchar(20) NOT NULL,
  `tendg` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` varchar(13) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `diachi` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodu` int(10) DEFAULT NULL,
  `khoanno` int(10) DEFAULT NULL,
  `img` varchar(30) DEFAULT NULL,
  `role` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `docgia`
--

INSERT INTO `docgia` (`id`, `madg`, `matkhau`, `tendg`, `ngaysinh`, `gioitinh`, `sdt`, `email`, `status`, `diachi`, `sodu`, `khoanno`, `img`, `role`) VALUES
(1, '2019606748', '123', 'Đỗ Văn Trung', '2001-04-07', 'Nam', '0184719474', 'abcxyz123ua@gmail.com', 0, 'Bắc Ninh', 941999, 695800, 'contact-list.png', 1),
(2, '2019605483', '2019605483', 'Đào Thu Trang', '2001-04-20', 'Nữ', '0123445699', 'ttrang@gmail.com', 0, 'Hải Dương', 150000, 20500, NULL, 1),
(3, '2019605605', '2019605605', 'Trần Xuân Toản', '2002-01-08', 'Nam', '0123445688', 'xtoanr@gmail.com', 0, 'Hà Nội', 900000, 123900, NULL, 1),
(4, '2019605606', '2019605606', 'Lê Minh Tuấn', '2002-06-26', 'Nam', '0123445677', 'LMT@gmail.com', 1, 'Hưng Yên', 639500, 50000, NULL, 1),
(5, '2019605333', '2019605333', 'Đặng Phương Thúy', '1997-09-18', 'Nữ', '0123445633', 'DPThuy@gmail.com', 0, 'Thái Bình', 500000, 100000, NULL, 1),
(6, '2019606666', '2019606666', 'Đặng Thiên Thu', '2003-06-10', 'Nữ', '0124729471', 'dtthu@gmail.com', 0, 'Cà Mau', 12000, 0, NULL, 1),
(7, 'admin', 'admin', 'Đào Thu Trang', '2001-04-20', 'Nữ', '0345748739', 'teng@gmail.com', 0, 'An Giang', NULL, NULL, NULL, 0),
(8, 'admin1', 'admin1', 'Đỗ Văn Trung', '2001-04-10', 'LGBT', '0345748736', 'trung@gmail.com', 0, 'Thái Bình', NULL, NULL, NULL, 0),
(9, 'admin2', 'admin2', 'Lều Ngọc An', '2001-03-11', 'Nữ', '0345678921', 'ngan@gmail.com', 0, 'Vĩnh Phúc', NULL, NULL, NULL, 0),
(10, 'admin3', 'admin3', 'Phạm Phương Duy', '2002-07-11', 'Nam', '0345671234', 'phduy@gmail.com', 1, 'Hải Phòng', NULL, NULL, NULL, 0),
(11, 'admin5', 'admin5', 'Phạm Phương Duy', '2002-07-11', 'Nam', '0345671234', 'phduy@gmail.com', 1, 'Hải Phòng', NULL, NULL, NULL, 0),
(12, '2022606202', 'Tr47201!', 'Đào Nam', '2001-06-21', 'Nam', NULL, NULL, 0, 'HN', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nganhang`
--

CREATE TABLE `nganhang` (
  `id` int(3) NOT NULL,
  `img` varchar(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `madg` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nganhang`
--

INSERT INTO `nganhang` (`id`, `img`, `name`, `madg`) VALUES
(1, 'momo.png', 'MoMo', NULL),
(2, 'zalopay.png', 'ZaloPay', NULL),
(3, 'viettelpay.png', 'Viettel Money', NULL),
(4, 'vietcombank.png', 'Vietcombank', NULL),
(5, 'techcombank.png', 'Techcombank', NULL),
(6, 'viettinbank.png', 'Viettinbank', NULL),
(7, 'bidv.png', 'BIDV', NULL),
(8, 'agribank.png', 'Agribank', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phieumuon`
--

CREATE TABLE `phieumuon` (
  `id` int(3) NOT NULL,
  `nguoimuon` int(3) DEFAULT NULL,
  `tensach` int(3) DEFAULT NULL,
  `soluongmuon` int(3) NOT NULL,
  `ngaymuon` date DEFAULT NULL,
  `ngaytra` date NOT NULL,
  `tinhtrang` int(2) DEFAULT NULL,
  `canbo` int(3) DEFAULT NULL,
  `noidung` int(2) DEFAULT NULL,
  `tienphat` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phieumuon`
--

INSERT INTO `phieumuon` (`id`, `nguoimuon`, `tensach`, `soluongmuon`, `ngaymuon`, `ngaytra`, `tinhtrang`, `canbo`, `noidung`, `tienphat`) VALUES
(1, 1, 4, 1, '2022-09-21', '2022-10-27', 4, 1, 2, 0),
(2, 2, 5, 1, '2022-10-16', '2022-11-16', 0, 1, 0, 0),
(3, 5, 8, 2, '2022-08-27', '2022-09-27', 4, 2, 2, 0),
(4, 3, 8, 1, '2022-08-03', '2022-08-23', 0, 2, 0, 0),
(5, 5, 5, 2, '2022-06-19', '2022-07-19', 0, 4, 0, 0),
(6, 5, 10, 3, '2022-08-05', '2022-11-25', 2, 3, 1, 0),
(7, 4, 4, 1, '2022-08-27', '2022-09-02', 0, 4, 1, 0),
(8, 2, 1, 2, '2022-03-17', '2022-04-12', 3, 3, 1, 0),
(9, 1, 7, 1, '2022-08-15', '2023-01-12', 0, 1, 0, 0),
(10, 3, 2, 3, '2022-08-21', '2020-09-21', 0, 2, 0, 0),
(11, 1, 1, 2, '2022-12-25', '2023-01-24', 1, 1, 0, 0),
(12, 1, 1, 1, '2023-01-06', '2023-01-13', 0, 1, 0, 0),
(13, 1, 4, 3, '2022-09-21', '2022-10-27', 4, 1, 2, 0),
(14, 1, 4, 1, '2022-09-21', '2023-01-03', 0, 1, 1, 9000),
(15, 1, 3, 1, '2023-01-06', '2023-09-21', 0, 1, 0, NULL),
(16, 1, 5, 1, '2023-01-06', '2023-09-21', 0, 3, 0, NULL),
(17, 1, 2, 1, '2023-01-07', '2023-09-07', 3, 6, 1, 0),
(18, 2, 4, 1, '2023-01-07', '2023-01-14', 1, 1, 0, NULL),
(19, 2, 8, 1, '2023-01-07', '2023-01-14', 5, 999, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

CREATE TABLE `sach` (
  `id_sach` int(3) NOT NULL,
  `gia` int(10) NOT NULL,
  `tensach` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `soluongcon` int(5) NOT NULL,
  `tacgia` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nxb` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tomtatnoidung` int(2) DEFAULT NULL,
  `id_theloai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`id_sach`, `gia`, `tensach`, `soluongcon`, `tacgia`, `nxb`, `tomtatnoidung`, `id_theloai`) VALUES
(1, 123000, 'Lập Trình C Căn Bản Và Nâng Cao', 52, 'Phạm Văn Ất', 'Giao thông vận tải', 1, 1),
(2, 47000, 'Bush Và Quyền Lực Nước Mỹ', 75, 'Bob Woodward', 'NXB Lao Động', 0, 4),
(3, 35000, 'World Literature Today', 14, 'Daniel Simon', 'University of Oklahoma', 1, 5),
(4, 20500, 'Glimmer Train', 0, 'Linda Swanson-Davies', 'Glimmer Train Press (Hoa Kỳ)', 0, 5),
(5, 75000, 'PHP: The Complete Reference', 48, 'Steven Holzner', 'McGraw Hill; 1st edition', 0, 1),
(6, 99900, 'Việt Nam phong tục', 994, 'Phan Kế Bính', 'NXB Văn học', 0, 3),
(7, 50000, 'Một Số Chủ Đề Số Học', 502, ' Nguyễn Nhất Huy', 'ĐHQGHN', 1, 2),
(8, 85000, 'Chính Trị Thế Giới Sau Năm 1945', 499, 'Peter Calvocoressi', 'NXB Lao Động', 0, 4),
(9, 77000, 'Tony Blair – Hành Trình Chính Trị Của Tôi', 199, 'Tony Blair', 'Công An Nhân Dân', 0, 5),
(10, 62000, '500 câu hỏi đáp sắc màu văn hóa Việt Nam', 98, 'Hà Nguyễn', 'NXB Thông tấn', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `id` int(3) NOT NULL,
  `matheloai` varchar(10) NOT NULL,
  `tentheloai` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mota` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`id`, `matheloai`, `tentheloai`, `mota`) VALUES
(1, 'TL01', 'Giáo trình học', NULL),
(2, 'TL02', 'Sách tham khảo', NULL),
(3, 'TL03', 'Văn hóa lịch sử', 'VN'),
(4, 'TL04', 'Chính trị, Pháp luật', NULL),
(5, 'TL05', 'Tạp chí', NULL),
(6, 'TL06', 'Tiểu thuyết', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thuthu`
--

CREATE TABLE `thuthu` (
  `id` int(3) NOT NULL,
  `macb` varchar(10) DEFAULT NULL,
  `matkhau` varchar(20) DEFAULT NULL,
  `tencb` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` varchar(13) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thuthu`
--

INSERT INTO `thuthu` (`id`, `macb`, `matkhau`, `tencb`, `ngaysinh`, `gioitinh`, `sdt`, `email`, `status`, `role`) VALUES
(1, 'admin', 'admin', 'Đào Thu Trang', '2001-04-20', 'Nữ', '0345748739', 'teng@gmail.com', 0, 0),
(2, 'admin1', 'admin1', 'Đỗ Văn Trung', '2001-04-10', 'LGBT', '0345748736', 'trung@gmail.com', 0, 0),
(3, 'admin2', 'admin2', 'Lều Ngọc An', '2001-03-11', 'Nữ', '0345678921', 'ngan@gmail.com', 0, 0),
(4, 'admin3', 'admin3', 'Phạm Phương Duy', '2002-07-11', 'Nam', '0345671234', 'phduy@gmail.com', 1, 0),
(5, 'admin5', 'admin5', 'Ngô Thị Phương', '2001-05-22', 'Nữ', '0345612324', 'ngothiphuong@gmail.com', 0, 0),
(6, 'admin6', 'admin6', 'Bùi Thị Hà', '2002-05-13', 'Nữ', '0345612882', 'btha@gmail.com', 0, 0),
(7, 'admin7', 'admin7', 'Vũ Minh Hiếu', '2000-05-08', 'Nam', '0345612125', 'vmh@gmail.com', 0, 0),
(999, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danhsachmuon`
--
ALTER TABLE `danhsachmuon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sachtt` (`tensach`),
  ADD KEY `fk_nm` (`nm`);

--
-- Indexes for table `docgia`
--
ALTER TABLE `docgia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nganhang`
--
ALTER TABLE `nganhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dg` (`madg`);

--
-- Indexes for table `phieumuon`
--
ALTER TABLE `phieumuon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nguoimuon` (`nguoimuon`),
  ADD KEY `fk_canbo` (`canbo`),
  ADD KEY `fk_sach` (`tensach`);

--
-- Indexes for table `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`id_sach`),
  ADD KEY `fk_sach_tl` (`id_theloai`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thuthu`
--
ALTER TABLE `thuthu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhsachmuon`
--
ALTER TABLE `danhsachmuon`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `docgia`
--
ALTER TABLE `docgia`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nganhang`
--
ALTER TABLE `nganhang`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `phieumuon`
--
ALTER TABLE `phieumuon`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sach`
--
ALTER TABLE `sach`
  MODIFY `id_sach` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `thuthu`
--
ALTER TABLE `thuthu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `danhsachmuon`
--
ALTER TABLE `danhsachmuon`
  ADD CONSTRAINT `fk_nm` FOREIGN KEY (`nm`) REFERENCES `docgia` (`id`),
  ADD CONSTRAINT `fk_sachtt` FOREIGN KEY (`tensach`) REFERENCES `sach` (`id_sach`);

--
-- Constraints for table `nganhang`
--
ALTER TABLE `nganhang`
  ADD CONSTRAINT `fk_dg` FOREIGN KEY (`madg`) REFERENCES `docgia` (`id`);

--
-- Constraints for table `phieumuon`
--
ALTER TABLE `phieumuon`
  ADD CONSTRAINT `fk_canbo` FOREIGN KEY (`canbo`) REFERENCES `thuthu` (`id`),
  ADD CONSTRAINT `fk_nguoimuon` FOREIGN KEY (`nguoimuon`) REFERENCES `docgia` (`id`),
  ADD CONSTRAINT `fk_sach` FOREIGN KEY (`tensach`) REFERENCES `sach` (`id_sach`);

--
-- Constraints for table `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `fk_sach_tl` FOREIGN KEY (`id_theloai`) REFERENCES `theloai` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

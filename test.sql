-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 24, 2021 lúc 10:21 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhchon`
--

CREATE TABLE `binhchon` (
  `idBC` int(11) NOT NULL,
  `MoTa` varchar(255) NOT NULL,
  `idLT` int(11) NOT NULL,
  `SoLanChon` int(11) NOT NULL,
  `AnHien` int(11) NOT NULL,
  `ThuTu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `binhchon`
--

INSERT INTO `binhchon` (`idBC`, `MoTa`, `idLT`, `SoLanChon`, `AnHien`, `ThuTu`) VALUES
(1, 'Bạn nghĩ hocweb.com.vn có giúp bạn học tập tốt hơn không?', 1, 36, 1, 0),
(2, 'Bạn dự đoán Phương Mỹ Chi có đoạt giải The Voice năm nay không?', 1, 28, 1, 0),
(3, 'Bạn thích làm gì trong các nghề dưới đây?', 9, 17, 1, 0),
(4, 'Bạn sẽ cho con làm gì trong kỳ nghỉ hè này?', 9, 19, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuongan`
--

CREATE TABLE `phuongan` (
  `idPA` int(11) NOT NULL,
  `MoTaPA` varchar(255) NOT NULL,
  `SoLanBinhChon` int(11) NOT NULL,
  `idBC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phuongan`
--

INSERT INTO `phuongan` (`idPA`, `MoTaPA`, `SoLanBinhChon`, `idBC`) VALUES
(1, 'Là nơi để sinh viên có thể tự học CNTT tốt nhất', 23, 1),
(2, 'Nội dung không phong phú lắm', 7, 1),
(3, 'Làm công chức nhà nước', 4, 3),
(4, 'Làm cho các công ty', 7, 3),
(5, 'Làm trong các cơ quan nghiên cứu', 3, 3),
(6, 'Các lĩnh vực khác', 2, 3),
(7, 'Chất lượng thì cũng bình thường thôi', 4, 1),
(8, 'Chắc chắn đoạt giải nhất', 23, 2),
(9, 'Hát dỡ quá, rớt chắc luôn', 4, 2),
(10, 'Đi học thêm', 11, 4),
(11, 'Chơi ở nhà', 4, 4),
(12, 'Đi du lịch ', 4, 4);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhchon`
--
ALTER TABLE `binhchon`
  ADD PRIMARY KEY (`idBC`);

--
-- Chỉ mục cho bảng `phuongan`
--
ALTER TABLE `phuongan`
  ADD PRIMARY KEY (`idPA`),
  ADD KEY `idBC` (`idBC`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhchon`
--
ALTER TABLE `binhchon`
  MODIFY `idBC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `phuongan`
--
ALTER TABLE `phuongan`
  MODIFY `idPA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `phuongan`
--
ALTER TABLE `phuongan`
  ADD CONSTRAINT `phuongan_ibfk_1` FOREIGN KEY (`idBC`) REFERENCES `binhchon` (`idBC`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

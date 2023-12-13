-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 08:25 AM
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
-- Database: `qlsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MASP` char(4) NOT NULL,
  `TENSP` varchar(50) NOT NULL,
  `DVT` varchar(50) NOT NULL,
  `NUOCSX` varchar(20) NOT NULL,
  `GIA` int(11) NOT NULL,
  `HINHANH` varchar(40) NOT NULL,
  `LOAISP` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MASP`, `TENSP`, `DVT`, `NUOCSX`, `GIA`, `HINHANH`, `LOAISP`) VALUES
('1', 'Bút bi Thiên Long', 'cây ', 'Việt Nam ', 5000, './img/tl.jpg', 'but'),
('12', 'Phấn đào', 'hộp', 'Việt Nam ', 15000, './img/phan.jpg', 'phan'),
('2', 'Bảng trắng ', 'Cái ', 'Trung Của ', 120000, './img/bang.jpg', 'bang'),
('3', 'Tập heo hồng ', 'Quyển ', 'Campuchia ', 5000, './img/tap.jpg', 'tap'),
('4', 'Bút chì 2D', 'Cây ', 'Rusia ', 2000, './img/butchi.jpg', 'but '),
('5', 'Phấn màu Thiên Long ', 'Hộp ', 'Thai Land ', 5000, './img/phan-mau.jpg', 'phan'),
('6', 'Phấn màu Thiên Long ', 'Hộp ', 'Phi líp pin ', 15000, './img/phan-mau.jpg', 'phan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MASP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

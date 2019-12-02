-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 02, 2019 at 03:22 AM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlysinhvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `quatrinhhoctap`
--

CREATE TABLE IF NOT EXISTS `quatrinhhoctap` (
  `ma` int(11) NOT NULL,
  `tunam` int(11) NOT NULL,
  `dennam` int(11) NOT NULL,
  `tentruong` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diachitruong` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `masinhvien` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quatrinhhoctap`
--

INSERT INTO `quatrinhhoctap` (`ma`, `tunam`, `dennam`, `tentruong`, `diachitruong`, `masinhvien`) VALUES
(1, 2006, 2007, 'Phan Boi Chau', 'Hue', '101'),
(2, 2010, 2013, 'DHKH ', 'Quy nhon', '101'),
(3, 2004, 2007, 'Hai Ba Trung ', 'Thua Thien Hue', '101'),
(4, 2008, 2011, 'Le Quy Don', 'Da Nang', '101'),
(5, 2005, 2009, 'Nguyễn Tri Phương', 'Quang Binh ', '101'),
(7, 2000, 2003, 'Sơn Ca', 'Đà Nẵng', '101'),
(8, 2013, 2018, 'HUSC', 'Huế', '101'),
(9, 2001, 2005, 'Cao Bá Quát', 'Nha Trang', '101'),
(10, 2003, 2007, 'Nguyễn Tri Phương', 'Huế', '101'),
(11, 2005, 2009, 'Nguyễn Huệ', 'Huế', '101'),
(12, 2007, 2011, 'Quang Trung', 'Huế', '101'),
(13, 2015, 2019, 'Hai Bà Trưng', 'Huế', '101'),
(14, 2014, 2018, 'Quốc Học Huế', 'Huế', '101'),
(17, 2007, 2012, 'NEU', 'Ha Noi', '101'),
(18, 2015, 2019, 'VNUA', 'Ha Noi', '101'),
(19, 2014, 2018, 'Rmit', 'Ho Chi Minh ', '101'),
(20, 1990, 1996, 'Phan Boi Chau', 'Hue', '107');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `masinhvien` varchar(20) CHARACTER SET armscii8 NOT NULL,
  `ho` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `noisinh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`masinhvien`, `ho`, `ten`, `ngaysinh`, `noisinh`, `gioitinh`) VALUES
('101', 'Luu', 'Danh', '0000-00-00', 'Hue', 0),
('102', 'luu', 'danh', '1997-07-02', 'Hue', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`) VALUES
(1, 'LuuDanh', '12345', 'LuuVanDanh', 'luudanh00078@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quatrinhhoctap`
--
ALTER TABLE `quatrinhhoctap`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`masinhvien`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quatrinhhoctap`
--
ALTER TABLE `quatrinhhoctap`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2019 at 05:19 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `toandq_doantotnghiep`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_donvi`
--

CREATE TABLE IF NOT EXISTS `tb_donvi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(200) NOT NULL,
  `mota` text,
  `thutu` tinyint(3) DEFAULT NULL,
  `tinhtrang` tinyint(4) NOT NULL,
  `ngaytao` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_donvi`
--

INSERT INTO `tb_donvi` (`id`, `ten`, `mota`, `thutu`, `tinhtrang`, `ngaytao`) VALUES
(1, 'Tổng công ty đầu tư phát triển đường cao tốc Việt Nam (VEC)', 'Đơn vị trực thuộc Ủy ban quản lý vốn nhà nước.', 0, 1, '2018-12-27 00:00:00'),
(2, 'Trung tâm giám sát khai thác vận hành đường cao tốc Việt Nam (VEC M)', 'Đơn vị trực thuộc Tổng công ty đầu tư phát triển đường cao tốc Việt Nam.', 0, 1, '2018-12-27 00:00:00'),
(3, 'Trung tâm nghiên cứu phát triển (VEC R&D)', 'Đơn vị trực thuộc Tổng công ty đầu tư phát triển đường cao tốc Việt Nam.', 0, 1, '2018-12-27 00:00:00'),
(4, 'Trung tâm khai thác vận hành đường cao tốc Đà Nẵng - Quảng Ngãi', 'Đơn vị trực thuộc Tổng công ty đầu tư phát triển đường cao tốc Việt Nam.', 0, 1, '2018-12-27 00:00:00'),
(5, 'Công ty CP vận hành và bảo trì đường cao tốc Việt Nam (VEC O&M)', 'Đơn vị trực thuộc Tổng công ty đầu tư phát triển đường cao tốc Việt Nam.', 0, 1, '2018-12-27 00:00:00'),
(6, 'Công ty CP dịch vụ đường cao tốc Việt Nam (VECS)', 'Đơn vị trực thuộc Tổng công ty đầu tư phát triển đường cao tốc Việt Nam.', 0, 1, '2018-12-27 00:00:00'),
(7, 'Công ty CP dịch vụ kỹ thuật đường cao tốc Việt Nam (VECE)', 'Đơn vị trực thuộc Tổng công ty đầu tư phát triển đường cao tốc Việt Nam.', 0, 1, '2018-12-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nhansu`
--

CREATE TABLE IF NOT EXISTS `tb_nhansu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_donvi` int(11) NOT NULL,
  `tendangnhap` varchar(200) NOT NULL,
  `matkhau` varchar(33) NOT NULL,
  `ten` varchar(200) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `sodienthoai` varchar(15) DEFAULT NULL,
  `quyen` varchar(100) NOT NULL,
  `tinhtrang` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_nhansu`
--

INSERT INTO `tb_nhansu` (`id`, `ma_donvi`, `tendangnhap`, `matkhau`, `ten`, `email`, `sodienthoai`, `quyen`, `tinhtrang`) VALUES
(1, 1, 'toandq', 'e10adc3949ba59abbe56e057f20f883e', 'Đinh Quốc Toản', 'quoctoan.tinvick31@gmal.com', '0914637988', '1', 1);

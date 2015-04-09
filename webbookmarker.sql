-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-04-09 17:34:06
-- 服务器版本： 5.5.40
-- PHP Version: 5.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webbookmarker`
--

-- --------------------------------------------------------

--
-- 表的结构 `web_marker`
--

CREATE TABLE IF NOT EXISTS `web_marker` (
  `id` int(10) unsigned NOT NULL,
  `title` mediumtext NOT NULL,
  `href` mediumtext NOT NULL,
  `icon` mediumtext NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `web_marker`
--

INSERT INTO `web_marker` (`id`, `title`, `href`, `icon`) VALUES
(1, 'dzlzh''s blog', 'http://duanzhilei.tk', 'http://duanzhilei.tk/favicon.ico');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `web_marker`
--
ALTER TABLE `web_marker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `web_marker`
--
ALTER TABLE `web_marker`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-01-11 13:48:06
-- 伺服器版本: 10.1.29-MariaDB
-- PHP 版本： 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `sa`
--

-- --------------------------------------------------------

--
-- 資料表結構 `makeorder`
--

CREATE TABLE `makeorder` (
  `id` int(11) NOT NULL,
  `OrderID` varchar(10) CHARACTER SET latin1 NOT NULL,
  `IPartNumber` varchar(10) NOT NULL,
  `ILong` varchar(10) CHARACTER SET latin1 NOT NULL,
  `INum` varchar(10) CHARACTER SET latin1 NOT NULL,
  `OPartNumber` varchar(10) NOT NULL,
  `OLong` varchar(10) CHARACTER SET latin1 NOT NULL,
  `ONum` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `makeorder`
--

INSERT INTO `makeorder` (`id`, `OrderID`, `IPartNumber`, `ILong`, `INum`, `OPartNumber`, `OLong`, `ONum`) VALUES
(3, 'MO101', '銅線(A)', '1000', '1', '銅條(B)', '2000', '3'),
(5, 'MO102', '0', '0', '0', '0', '0', '0');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `makeorder`
--
ALTER TABLE `makeorder`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `makeorder`
--
ALTER TABLE `makeorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

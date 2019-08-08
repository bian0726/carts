-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019 年 08 月 08 日 11:12
-- 伺服器版本： 10.3.15-MariaDB
-- PHP 版本： 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `bob_bian`
--

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `m_UID` int(10) NOT NULL,
  `m_ID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `m_Password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `m_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `m_Birth` date NOT NULL,
  `m_Phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `m_Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `m_Level` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`m_UID`, `m_ID`, `m_Password`, `m_Name`, `m_Birth`, `m_Phone`, `m_Address`, `m_Level`) VALUES
(1, 'feng', '', '簡奉君', '1987-04-04', '0922988876', '台北市濟洲北路12號', 'member'),
(2, 'hang', '', '黃靖輪', '1987-07-01', '0918181111', '台北市敦化南路93號5樓', 'member'),
(3, 'four', '', '潘四敬', '1987-08-11', '0914530768', '台北市中央路201號7樓', 'member'),
(4, 'shan', '', '賴勝恩', '1984-06-20', '0946820035', '台北市建國路177號6樓', 'member'),
(5, 'lee', '', '黎楚寧', '1988-02-15', '0920981230', '台北市忠孝東路520號6樓', 'member'),
(6, 'middle', '', '蔡中穎', '1987-05-05', '0951983366', '台北市三民路1巷10號', 'member'),
(7, 'jia', '', '徐佳螢', '1985-08-30', '0918123456', '台北市仁愛路100號', 'member'),
(8, 'rain', '', '林雨媗', '1986-12-10', '0907408965', '台北市民族路204號', 'member'),
(9, 'heard', '', '林心儀', '1988-12-01', '0916456723', '台北市建國北路10號', 'member'),
(10, 'boo', '', '王燕博', '1993-08-10', '0918976588', '台北市北環路2巷80號', 'member');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `productID` int(10) NOT NULL,
  `productName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `productPrice` int(10) NOT NULL,
  `productUnit` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `productCategory` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `productStock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`productID`, `productName`, `productPrice`, `productUnit`, `productCategory`, `productStock`) VALUES
(1, '微星GTX1650 AERO 4G OC', 5228, '張', '顯示卡', 44),
(2, 'Intel i5-8500 6/6 3.0G', 6300, '盒', 'CPU', 342),
(3, '美光 16G DDR4 2666', 1988, '條', 'RAM', 43);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_UID`),
  ADD UNIQUE KEY `m_ID` (`m_ID`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `m_UID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

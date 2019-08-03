-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27 يوليو 2019 الساعة 17:32
-- إصدار الخادم: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uoh`
--

-- --------------------------------------------------------

--
-- بنية الجدول `advertising`
--

CREATE TABLE `advertising` (
  `Adv_ID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Category_ID` int(11) NOT NULL,
  `Uname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `advertising`
--

INSERT INTO `advertising` (`Adv_ID`, `Title`, `City`, `Picture`, `Description`, `Category_ID`, `Uname`) VALUES
(2, 'TYTGHG', 'r', 'drees1.jpeg', 'GHGHG', 3, 'ah@psau.com');

-- --------------------------------------------------------

--
-- بنية الجدول `category`
--

CREATE TABLE `category` (
  `Category_ID` int(11) NOT NULL,
  `Category_Name` varchar(50) NOT NULL,
  `Adv-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `category`
--

INSERT INTO `category` (`Category_ID`, `Category_Name`, `Adv-id`) VALUES
(3, 'الفساتين', 0),
(4, 'الأحذيه', 0);

-- --------------------------------------------------------

--
-- بنية الجدول `comment`
--

CREATE TABLE `comment` (
  `Comment_ID` int(11) NOT NULL,
  `Content` text NOT NULL,
  `Adv_ID` int(11) NOT NULL,
  `User_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `comment`
--

INSERT INTO `comment` (`Comment_ID`, `Content`, `Adv_ID`, `User_Name`) VALUES
(5, 'gdgdfgdfg', 2, 'ah@psau.com');

-- --------------------------------------------------------

--
-- بنية الجدول `user`
--

CREATE TABLE `user` (
  `User_Name` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhonNo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `user`
--

INSERT INTO `user` (`User_Name`, `Password`, `Email`, `PhonNo`) VALUES
('22amal', '1234', 'amal@gmail.com', 501234567),
('dfdfdf', '123', 'ah@psau.com', 2323232);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertising`
--
ALTER TABLE `advertising`
  ADD PRIMARY KEY (`Adv_ID`),
  ADD KEY `FK_catID_Adv` (`Category_ID`),
  ADD KEY `FK_username_Adv` (`Uname`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_ID`),
  ADD KEY `FK_advID_cat` (`Adv-id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`Comment_ID`),
  ADD KEY `FK_advID_com` (`Adv_ID`),
  ADD KEY `FK_username_com` (`User_Name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertising`
--
ALTER TABLE `advertising`
  MODIFY `Adv_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `Comment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

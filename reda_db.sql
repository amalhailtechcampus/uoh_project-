-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 24, 2019 at 11:06 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `reda`
--

-- --------------------------------------------------------

--
-- Table structure for table `Advertising`
--

CREATE TABLE `Advertising` (
  `Adv_ID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Category_ID` int(11) NOT NULL,
  `Comment_id` int(11) NOT NULL,
  `Uname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `Category_ID` int(11) NOT NULL,
  `Category_Name` varchar(50) NOT NULL,
  `Adv-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

CREATE TABLE `Comment` (
  `Comment_ID` int(11) NOT NULL,
  `Content` text NOT NULL,
  `Adv-ID` int(11) NOT NULL,
  `User_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `User_Name` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhonNo` int(10) NOT NULL,
  `Comment_ID` int(11) DEFAULT NULL,
  `Adv_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`User_Name`, `Password`, `Email`, `PhonNo`, `Comment_ID`, `Adv_ID`) VALUES
('22amal', '1234', 'amal@gmail.com', 501234567, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Advertising`
--
ALTER TABLE `Advertising`
  ADD PRIMARY KEY (`Adv_ID`),
  ADD KEY `FK_catID_Adv` (`Category_ID`),
  ADD KEY `FK_comID_Adv` (`Comment_id`),
  ADD KEY `FK_username_Adv` (`Uname`);

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`Category_ID`),
  ADD KEY `FK_advID_cat` (`Adv-id`);

--
-- Indexes for table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`Comment_ID`),
  ADD KEY `FK_advID_com` (`Adv-ID`),
  ADD KEY `FK_username_com` (`User_Name`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`User_Name`),
  ADD KEY `FK_comID_user` (`Comment_ID`),
  ADD KEY `FK_advID_user` (`Adv_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Advertising`
--
ALTER TABLE `Advertising`
  MODIFY `Adv_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `Comment_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Advertising`
--
ALTER TABLE `Advertising`
  ADD CONSTRAINT `FK_username_Adv` FOREIGN KEY (`Uname`) REFERENCES `User` (`User_Name`);

--
-- Constraints for table `Category`
--
ALTER TABLE `Category`
  ADD CONSTRAINT `FK_advID_cat` FOREIGN KEY (`Adv-id`) REFERENCES `Advertising` (`Adv_ID`);

--
-- Constraints for table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `FK_username_com` FOREIGN KEY (`User_Name`) REFERENCES `User` (`User_Name`);

--
-- Constraints for table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `FK_advID_user` FOREIGN KEY (`Adv_ID`) REFERENCES `Advertising` (`Adv_ID`);

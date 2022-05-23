-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: fdb17.freehostingeu.com
-- Generation Time: Feb 19, 2020 at 07:02 PM
-- Server version: 5.7.20-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3324813_amr`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ID` int(30) NOT NULL,
  `invoice` int(30) NOT NULL,
  `client` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `RepName` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `total` int(30) NOT NULL,
  `cash` int(30) NOT NULL,
  `surplus` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ID`, `invoice`, `client`, `RepName`, `total`, `cash`, `surplus`) VALUES
(1, 3, 'Adel', 'amr', 50, 20, 30),
(2, 4, 'hassan', 'amr', 20, 10, 10),
(3, 1, 'Ahmed', 'amr', 100, 50, 50),
(4, 2, '', 'amr', 100, 50, 50),
(5, 5, 'Ahmed', 'amr', 120, 100, 20),
(6, 5, 'Ahmed', 'amr', 120, 100, 20);

-- --------------------------------------------------------

--
-- Table structure for table `invno`
--

CREATE TABLE `invno` (
  `ID` int(30) NOT NULL,
  `INVOICE` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `RepName` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TIME` datetime NOT NULL,
  `paid` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invno`
--

INSERT INTO `invno` (`ID`, `INVOICE`, `RepName`, `client`, `TIME`, `paid`) VALUES
(1, ' ÙØ§ØªÙˆØ±Ø© Ù…Ø¨ÙŠØ¹Ø§Øª', 'amr', 'Ahmed', '0000-00-00 00:00:00', 'cash on  hand'),
(2, ' ÙØ§ØªÙˆØ±Ø© Ù…Ø¨ÙŠØ¹Ø§Øª', 'amr', 'ahmed', '0000-00-00 00:00:00', 'cash on  hand'),
(3, ' ÙØ§ØªÙˆØ±Ø© Ù…Ø¨ÙŠØ¹Ø§Øª', 'amr', 'Adel', '2020-02-17 03:39:38', 'cash on  hand'),
(4, ' ÙØ§ØªÙˆØ±Ø© Ù…Ø¨ÙŠØ¹Ø§Øª', 'amr', 'hassan', '2020-02-17 03:44:25', 'cash on  hand'),
(5, ' ÙØ§ØªÙˆØ±Ø© Ù…Ø¨ÙŠØ¹Ø§Øª', 'amr', 'Ahmed', '2020-02-17 05:44:28', 'cash on  hand');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `ID` int(30) NOT NULL,
  `Item_ID` int(30) NOT NULL,
  `Item` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `QOrder` int(30) NOT NULL,
  `Qsupply` int(30) NOT NULL,
  `price` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `RepName` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `total` int(30) NOT NULL,
  `Time` int(30) NOT NULL,
  `InvoiceNo` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`ID`, `Item_ID`, `Item`, `QOrder`, `Qsupply`, `price`, `RepName`, `client`, `total`, `Time`, `InvoiceNo`) VALUES
(1, 1, 'Tv ', 10, 20, '10', 'amr', '', 100, 2147483647, 2),
(2, 1, 'Tv ', 5, 10, '10', 'amr', 'Adel', 50, 2147483647, 3),
(4, 1, 'Tv ', 1, 5, '10', 'amr', 'hassan', 10, 2147483647, 4),
(6, 1, 'Tv ', 1, 4, '10', 'amr', 'hassan', 10, 2147483647, 4),
(7, 2, 'Cars ', 10, 20, '10', 'amr', 'Ahmed', 100, 2147483647, 5),
(9, 1, 'Tv ', 2, 23, '10', 'amr', 'Ahmed', 20, 2147483647, 5),
(10, 1, 'Tv ', 10, 31, '10', 'amr', 'Ahmed', 100, 2147483647, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `ID` int(30) NOT NULL,
  `INVOICE` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `RepName` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `vendors` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `paid` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`ID`, `INVOICE`, `RepName`, `vendors`, `paid`, `Time`) VALUES
(1, ' ÙØ§ØªÙˆØ±Ø© Ù…Ø´ØªØ±ÙŠØ§Øª', 'amr', 'mohamed', 'cash on  hand', '2020-02-17 03:47:31'),
(2, ' ÙØ§ØªÙˆØ±Ø© Ù…Ø´ØªØ±ÙŠØ§Øª', 'amr', 'ali', 'cash on  hand', '2020-02-17 03:49:05'),
(3, ' ÙØ§ØªÙˆØ±Ø© Ù…Ø´ØªØ±ÙŠØ§Øª', 'amr', 'haasan', 'cash on  hand', '2020-02-17 20:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `pur_order`
--

CREATE TABLE `pur_order` (
  `ID` int(30) NOT NULL,
  `Item_ID` int(30) NOT NULL,
  `Item` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `vendors` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `RepName` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Qsupply` int(30) NOT NULL,
  `Qpurchase` int(30) NOT NULL,
  `cost` int(30) NOT NULL,
  `total` int(30) NOT NULL,
  `InvoiceNo` int(30) NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pur_order`
--

INSERT INTO `pur_order` (`ID`, `Item_ID`, `Item`, `vendors`, `RepName`, `Qsupply`, `Qpurchase`, `cost`, `total`, `InvoiceNo`, `Time`) VALUES
(1, 1, 'Tv ', 'mohamed', 'amr', 3, 10, 10, 100, 1, '2020-02-17 03:47:50'),
(3, 1, 'Tv ', 'ali', 'amr', 13, 10, 10, 100, 2, '2020-02-17 03:49:21'),
(5, 1, 'Tv ', 'haasan', 'amr', 21, 10, 10, 100, 3, '2020-02-17 20:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `seles rep`
--

CREATE TABLE `seles rep` (
  `ID` int(30) NOT NULL,
  `Seles Rep` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `ID` int(30) NOT NULL,
  `Item` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Item_dep` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `Qsupply` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`ID`, `Item`, `Item_dep`, `price`, `Qsupply`) VALUES
(1, 'Tv ', '0', 10, 21),
(2, 'Cars ', 'Electronical', 10, 10),
(3, 'tea ', 'drink', 5, 40);

-- --------------------------------------------------------

--
-- Table structure for table `tecsupport`
--

CREATE TABLE `tecsupport` (
  `ID` int(30) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `massage` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tecsupport`
--

INSERT INTO `tecsupport` (`ID`, `username`, `lastname`, `massage`) VALUES
(1, ' amr ', ' hassan ', 'hi ihave problem'),
(2, ' amr ', ' hassan ', 'hi ihave problem');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(30) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` int(30) NOT NULL,
  `user_TYPE` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `lastname`, `email`, `password`, `user_TYPE`) VALUES
(1, 'amr', 'hassan', 'amrhassanjob5@gmail.com', 1019970655, 'Admin'),
(2, 'mohamed', 'hassan', 'mohamedhassan22@gmail.com', 1277498826, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `ID` int(15) NOT NULL,
  `invoice` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `vendors` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cash` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `surplus` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`ID`, `invoice`, `vendors`, `total`, `cash`, `surplus`) VALUES
(1, '1', 'mohamed', '100', '90', '10'),
(2, '2', 'ali', '100', '50', '50'),
(3, '3', 'haasan', '100', '95', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `invno`
--
ALTER TABLE `invno`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pur_order`
--
ALTER TABLE `pur_order`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `seles rep`
--
ALTER TABLE `seles rep`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tecsupport`
--
ALTER TABLE `tecsupport`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `invno`
--
ALTER TABLE `invno`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pur_order`
--
ALTER TABLE `pur_order`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `seles rep`
--
ALTER TABLE `seles rep`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tecsupport`
--
ALTER TABLE `tecsupport`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

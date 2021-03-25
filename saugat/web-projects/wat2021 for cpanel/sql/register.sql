-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2021 at 10:26 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `sno` int(4) NOT NULL,
  `email` varchar(20) NOT NULL,
  `userName` varchar(10) NOT NULL,
  `ageGroup` text NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`sno`, `email`, `userName`, `ageGroup`, `password`) VALUES
(3, 'haha@gmail.com', 'frog', 'adult', '44aec5c90998c729635347147dce882e'),
(6, 'roshi@yahoo.com', 'roshiroshi', 'senior', '63b44a78ff67a7977d7126ba084ec8cf'),
(8, 'rashika@gmail.com', 'rashi223', 'adult', '26b8405d55e920ec90d03fd2b4b9b48b'),
(9, 'new@gmail.com', 'newuser123', 'adult', 'd0aabe9a362cb2712ee90e04810902f3'),
(10, 'another@gmail.com', 'sugondeez', 'adult', '325e943f06eb552caafa8d5da3d428ff'),
(13, 'prabin@gmail.com', 'prabin', 'adult', '629392467a2b8517828454955610baac'),
(14, 'saugatapk@gmail.com', 'vileroze', 'adult', '8aa043fe4e13b9a3659e2705d9cf7450');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `sno` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

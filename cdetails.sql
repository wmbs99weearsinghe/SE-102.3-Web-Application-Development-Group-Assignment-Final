-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 06:50 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `checkform`
--

-- --------------------------------------------------------

--
-- Table structure for table `cdetails`
--

CREATE TABLE `cdetails` (
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `room_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cdetails`
--

INSERT INTO `cdetails` (`checkin`, `checkout`, `room_type`) VALUES
('2021-01-01', '2021-01-02', 'double'),
('2021-01-01', '2021-01-04', 'single'),
('2021-01-02', '2021-01-03', 'king'),
('2021-01-02', '2021-01-03', 'double'),
('2021-01-02', '2021-01-04', 'queen'),
('2021-01-04', '2021-01-05', 'double'),
('2021-01-04', '2021-01-05', 'single'),
('2021-01-04', '2021-01-06', 'triple'),
('2021-01-04', '2021-01-06', 'single');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

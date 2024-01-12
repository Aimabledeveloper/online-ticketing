-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 01:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `adminname` varchar(255) DEFAULT NULL,
  `emailaddress` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminname`, `emailaddress`, `country`, `password`) VALUES
(98765, 'clement nzabamwita', 'aimablesemuhungu@gmail.com', 'Rwanda', '12345'),
(456789, 'semuhungu', 'aimablesemuhungu@gmail.com', 'Burundi', '12345678'),
(9876543, 'karenzi', 'aimablesemuhungu@gmail.com', 'Rwanda', '123');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Names` text NOT NULL,
  `Phone number` int(200) NOT NULL,
  `Amount` int(200) NOT NULL,
  `Momo password` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `busid` text DEFAULT NULL,
  `busmode` varchar(50) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `seatingcapacity` int(11) DEFAULT NULL,
  `standingcapacity` int(11) DEFAULT NULL,
  `length` decimal(10,2) DEFAULT NULL,
  `width` decimal(10,2) DEFAULT NULL,
  `fueltype` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`busid`, `busmode`, `capacity`, `seatingcapacity`, `standingcapacity`, `length`, `width`, `fueltype`) VALUES
('RAC 450', 'php', 30, 20, 10, 300.00, 400.00, 'Diesel'),
('RAC 450', 'php', 30, 20, 10, 300.00, 400.00, 'Diesel'),
('RAC 452', 'php', 35, 25, 10, 534.00, 1234.00, 'Diesel'),
('RAC 452', 'php', 35, 25, 10, 534.00, 1234.00, 'Diesel'),
('RAC 45', 'php', 40, 35, 5, 6543.00, 2345.00, 'Diesel'),
('RAC 451', 'php', 45, 35, 10, 543.00, 654.00, 'Diesel'),
('RAC 451', 'php', 45, 35, 10, 543.00, 654.00, 'Diesel'),
('RAC 456', 'php', 45, 40, 5, 453.00, 453.00, 'Diesel');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client ID` int(200) NOT NULL,
  `client name` char(200) NOT NULL,
  `Email address` varchar(250) NOT NULL,
  `Hpone number` int(200) NOT NULL,
  `address` int(200) NOT NULL,
  `gender` char(200) NOT NULL,
  `payment history` varchar(200) NOT NULL,
  `booking information` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(20) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `massage` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `username`, `email`, `phonenumber`, `subject`, `massage`) VALUES
(2, 'semuhungu', 'aimablesemuhungu@gmail.com', '0787016151', 'reqwest', 'muraho neza'),
(3, 'kazungu', 'aimablesemuhungu@gmail.com', '0785853', 'reqwest', 'ndifuzako');

-- --------------------------------------------------------

--
-- Table structure for table `create account`
--

CREATE TABLE `create account` (
  `Email address` varchar(250) NOT NULL,
  `user name` text NOT NULL,
  `password` int(200) NOT NULL,
  `country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `create_account`
--

CREATE TABLE `create_account` (
  `adminid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `country` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `create_account`
--

INSERT INTO `create_account` (`adminid`, `email`, `username`, `password`, `country`) VALUES
(6, 'dieudonne@gmail.com', 'myname', '$2y$10$rPcMs3V/8A0oGcf1lcvOJ.7SlXOrEt7GEqJMLn6eiRm', 'Rwanda'),
(7, 'dieudonne@gmail.com', 'Aimable', '$2y$10$UmuXY/uTo1WlF2TRvfVeA.Do8ZOZ4ssZd5tCj6AzOh8', 'Rwanda'),
(22, 'aimablesemuhungu@gmail.com', 'elize', '$2y$10$Gu9JJvf4CBP5y9dDDoEsWeG8fG3WrjFBhhVdrHr7CQv', 'Rwanda'),
(24, 'aimablesemuhungu@gmail.com', 'hakimu', '12345', 'Rwanda'),
(25, 'aimablesemuhungu@gmail.com', 'hafff', '123', 'Rwanda'),
(26, 'aimablesemuhungu@gmail.com', 'elice', '12345', 'Rwanda');

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `destinationid` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`destinationid`, `name`) VALUES
(1, 'huye-nyanza'),
(236, 'Kigali - Muhanga'),
(237, 'Kigali - Ruhango – Nyanza'),
(238, 'Kigali - Nyamagabe'),
(239, 'Kigali - Gisagara'),
(240, 'Kigali - Gisagara'),
(241, 'Kigali - Nyaruguru'),
(242, 'Kigali - Nyaruguru'),
(243, 'Kigali-nyagatare'),
(244, 'Huye-nyamagabe'),
(245, 'Huye-muhanga'),
(246, 'Nyanza-kigali');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driverid` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `secondname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `location` varchar(100) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driverid`, `firstname`, `secondname`, `gender`, `location`, `phonenumber`, `email`, `age`, `category`) VALUES
(438477, 'nzabamwita', 'Aimable', 'male', 'huye', '0787016151', 'dieudonne@gmail.com', 20, 'c'),
(7654567, 'semuhungu', 'Aimable', 'male', 'gisagara', '0787016151', 'aimablesemuhungu@gmail.com', 20, 'c');

-- --------------------------------------------------------

--
-- Table structure for table `edditticket`
--

CREATE TABLE `edditticket` (
  `ticketid` int(11) NOT NULL,
  `departure` varchar(255) DEFAULT NULL,
  `platenumber` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `arrival` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `edditticket`
--

INSERT INTO `edditticket` (`ticketid`, `departure`, `platenumber`, `location`, `arrival`, `price`, `time`, `status`) VALUES
(13, '2023-11-29', 'RAB 458', 'huye', '2023-12-27', 23.00, '0000-00-00 00:00:00', 'available'),
(112, '2024-01-01', 'AAA', 'muhanga', '2024-01-01', 300.00, '0000-00-00 00:00:00', 'available'),
(113, '', '', '', '', 0.00, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user name` varchar(200) NOT NULL,
  `password` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `message`) VALUES
(1, 'Payment received for ticket. Username: kazungu, Ticket time: 2024-01-03 14:18:48'),
(2, 'Payment received for ticket. Username: kazungu, Ticket time: 2024-01-03 14:44:00'),
(3, 'Payment received for ticket. Username: kazungu, Ticket time: 2024-01-03 14:53:03, Ticket price: 300'),
(4, 'Payment received for ticket. Username: kazungu, Ticket time: 2024-01-03 15:16:58, Ticket price: 400'),
(5, 'Payment received for ticket. Username: kazungu, Ticket time: 2024-01-03 15:17:50, Ticket price: 400'),
(6, 'Payment received for ticket. Username: kazungu, Ticket time: 2024-01-03 15:26:21, Ticket price: 400'),
(7, 'Payment received for ticket. Username: kazungu, Ticket time: 2024-01-03 15:30:06, Ticket price: 400'),
(8, 'Payment received for ticket. Username: kazungu, Ticket time: 2024-01-03 15:30:29, Ticket price: 400'),
(9, 'Payment received for ticket. Username: kazungu, Ticket time: 2024-01-03 15:34:24, Ticket price: 400'),
(10, 'Payment received for ticket. Username: kazungu, Ticket time: 2024-01-03 15:37:24, Ticket price: 1000'),
(11, 'Payment received for ticket. Username: kazungu, Ticket time: 2024-01-03 15:38:23, Ticket price: 400'),
(12, 'Payment received for ticket. Username: kazungu, Ticket time: 2024-01-03 15:38:36, Ticket price: 400'),
(13, 'Payment received for ticket. Username: kazungu, Ticket time: 2024-01-03 15:38:48, Ticket price: 12000'),
(14, 'Payment received for ticket. Username: kazungu, Ticket time: 2024-01-03 15:39:11, Ticket price: 12000'),
(15, 'Payment received for ticket. Username: kazungu, Ticket time: 2024-01-03 15:39:37, Ticket price: 12000'),
(16, 'Payment received for ticket. Username: kazungu, Ticket time: 2024-01-03 15:39:57, Ticket price: 21'),
(17, 'Payment received for ticket. Username: kazungu, Ticket time: 2024-01-03 15:41:14, Ticket price: 12000'),
(18, 'Payment received for ticket. Username: kazungu, Ticket time: 2024-01-03 15:47:41, Ticket price: 400'),
(19, 'Payment received for ticket. Username: kazungu, Ticket time: 2024-01-03 15:47:58, Ticket price: 98765'),
(20, 'Payment received for ticket. Username: kazungu, Ticket time: 2024-01-04 04:21:10, Ticket price: 12000'),
(21, 'Payment received for ticket. Username: kazungu, Ticket time: 2024-01-04 09:39:51, Ticket price: 300'),
(22, 'Payment received for ticket. Username: hakimu, Ticket time: 2024-01-06 07:16:55, Ticket price: 1000'),
(23, 'Payment received for ticket. Username: hafff, Ticket time: 2024-01-10 07:26:23, Ticket price: 400'),
(24, 'Payment received for ticket. Username: hakimu, Ticket time: 2024-01-11 08:40:26, Ticket price: 4567'),
(25, 'Payment received for ticket. Username: hakimu, Ticket time: 2024-01-11 19:34:35, Ticket price: 4532'),
(26, 'Payment received for ticket. Username: elice, Ticket time: 2024-01-11 19:35:20, Ticket price: 6543');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `ticket_time` text DEFAULT NULL,
  `ticket_price` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `username`, `ticket_time`, `ticket_price`) VALUES
(4, 'kazungu', '2024-01-03 15:26:21', '400'),
(5, 'kazungu', '2024-01-03 15:30:06', '400'),
(6, 'kazungu', '2024-01-03 15:30:29', '400'),
(7, 'kazungu', '2024-01-03 15:34:24', '400'),
(8, 'kazungu', '2024-01-03 15:37:24', '1000'),
(9, 'kazungu', '2024-01-03 15:38:23', '400'),
(10, 'kazungu', '2024-01-03 15:38:36', '400'),
(11, 'kazungu', '2024-01-03 15:38:48', '12000'),
(12, 'kazungu', '2024-01-03 15:39:11', '12000'),
(13, 'kazungu', '2024-01-03 15:39:37', '12000'),
(14, 'kazungu', '2024-01-03 15:39:57', '21'),
(15, 'kazungu', '2024-01-03 15:41:14', '12000'),
(16, 'kazungu', '2024-01-03 15:47:41', '400'),
(17, 'kazungu', '2024-01-03 15:47:58', '98765'),
(18, 'kazungu', '2024-01-04 04:21:10', '12000'),
(19, 'kazungu', '2024-01-04 09:39:51', '300'),
(20, 'hakimu', '2024-01-06 07:16:55', '1000'),
(21, 'hafff', '2024-01-10 07:26:23', '400'),
(22, 'hakimu', '2024-01-11 08:40:26', '4567'),
(23, 'hakimu', '2024-01-11 19:34:35', '4532'),
(24, 'elice', '2024-01-11 19:35:20', '6543');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticketid` int(11) NOT NULL,
  `departure` varchar(255) DEFAULT NULL,
  `platenumber` varchar(50) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `arrival` varchar(255) DEFAULT NULL,
  `price` text DEFAULT NULL,
  `time` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticketid`, `departure`, `platenumber`, `location`, `arrival`, `price`, `time`, `status`) VALUES
(5, '2024-01-19', 'RAB 451', 'Huye-kigali', '2024-01-19', '2,560 Rwf', '5:30', 'available'),
(6, '2024-01-19', 'RAB 452', 'Huye-kigali', '2024-01-19', '2,560 Rwf', '6:00', 'available'),
(9, '2024-01-19', 'RAB 454', 'Huye-kigali', '2024-01-19', '2,560 Rwf', '7:00', 'available'),
(10, '2024-01-19', 'RAB 455', 'Huye-kigali', '2024-01-19', '2,560 Rwf', '7:30', 'available'),
(11, '2024-01-19', 'RAB 456', 'Huye-kigali', '2024-01-19', '2,560 Rwf', '8:00', 'available'),
(12, '2024-01-19', 'RAB 458', 'Huye-kigali', '2024-01-19', '2,560 Rwf', '8:30', 'available'),
(13, '2024-01-19', 'RAB 458', 'Huye-kigali', '2024-01-19', '2,560 Rwf', '9:00', 'available'),
(14, '2024-01-19', 'RAB 459', 'Huye-kigali', '2024-01-19', '2,560 Rwf', '9:30', 'available'),
(15, '2024-01-19', 'RAB 460', 'Huye-kigali', '2024-01-19', '2,560 Rwf', '10:00', 'available'),
(16, '2024-01-19', 'RAB 461', 'Huye-kigali', '2024-01-19', '2,560 Rwf', '10:30', 'available'),
(17, '2024-01-19', 'RAB 458', 'Huye-kigali', '2024-01-19', '2,560 Rwf', '12:00', 'available'),
(18, '2024-01-19', 'RAB 430', 'Kigali – Muhanga', '2024-01-19', '1,030 Rwf', '5:30', 'available'),
(19, '2024-01-19', 'RAB 431', 'Kigali – Muhanga', '2024-01-19', '1,030 Rwf', '6:00', 'available'),
(20, '2024-01-19', 'RAB 432', 'Kigali – Muhanga', '2024-01-19', '1,030 Rwf', '6:30', 'available'),
(21, '2024-01-19', 'RAB 470', ' Kigali – Ruhango', '2024-01-19', '1,490 Rwf', '5:30', 'available'),
(22, '2024-01-19', 'RAB 444', 'Kigali – Nyanza', '2024-01-19', '1,850 Rwf', '5:30', 'available'),
(23, '2024-01-19', 'RAB 445', 'Muhanga – Ruhango', '2024-01-19', '550 Rwf', '5:30', 'available'),
(24, '2024-01-19', 'RAB 988', 'Muhanga – Nyanza', '2024-01-19', '820 Rwf', '5:30', 'available'),
(27, '2024-01-19', 'RAB 998', 'Huye – Ruheru', '2024-01-19', '2,010 Rwf', '5:30', 'available'),
(28, '2024-01-19', 'RAB 456', 'Huye – Munini', '2024-01-19', '1,010 Rwf', '5:30', 'available'),
(29, '2024-01-19', 'RAB 564', 'Huye – Cyahinda', '2024-01-19', '1,340 Rwf', '5:30', 'available'),
(30, '2024-01-19', 'RAB 435', 'Kiyonza – Huye', '2024-01-19', '710 Rwf', '5:30', 'available'),
(31, '2024-01-19', 'RAB 458', 'Kigali – Muhanga', '2024-01-19', '1,030 Rwf', '6:00', 'available'),
(32, '2024-01-19', 'RAB 4589', 'Kigali – Muhanga', '2024-01-19', '1,030 Rwf', '6:30', 'available'),
(33, '2024-01-19', 'RAB 4589', 'Kigali – Muhanga', '2024-01-19', '1,030 Rwf', '7:00', 'available'),
(34, '2024-01-19', 'RAB 4589', 'Kigali – Muhanga', '2024-01-19', '1,030 Rwf', '7:30', 'available'),
(35, '2024-01-19', 'RAB 345', 'Kigali – Muhanga', '2024-01-19', '1,030 Rwf', '7:30', 'available'),
(36, '2024-01-19', 'RAB 450', 'Kigali – Muhanga', '2024-01-19', '1,030 Rwf', '10:00', 'available'),
(37, '2024-01-19', 'RAB 451', 'Kigali – Ruhango', '2024-01-19', '1,490 Rwf', '5:30', 'available'),
(38, '2024-01-19', 'RAB 45', 'Kigali – Ruhango', '2024-01-19', '1,490 Rwf', '6:00', 'available'),
(39, '2024-01-12', 'RAB 453', 'Kigali – Ruhango', '2024-01-19', '1,490 Rwf', '7:00', 'available'),
(40, '2024-01-19', 'RAB 452', 'Kigali – Ruhango', '2024-01-19', '1,490 Rwf', '7:30', 'available'),
(41, '2024-01-19', 'RAB 451', 'Kigali – Ruhango', '2024-01-19', '1,490 Rwf', '8:00', 'available'),
(42, '2024-01-19', 'RAB 457', 'Kigali – Ruhango', '2024-01-19', '1,490 Rwf', '8:30', 'available'),
(43, '2024-01-19', 'RAB 234', 'Kigali – Ruhango', '2024-01-19', '1,490 Rwf', '9:00', 'available'),
(44, '2024-01-19', 'RAB 458', 'Kigali – Ruhango', '2024-01-19', '1,490 Rwf', '10:01', 'available'),
(45, '2024-01-19', 'RAB 4509', 'Huye-kigali', '2024-01-19', '2,560 Rwf', '12:30', 'available'),
(46, '2024-01-19', 'RAB 451', 'Huye-kigali', '2024-01-19', '2,560 Rwf', '11:00', 'available'),
(47, '2024-01-19', 'RAB 9876', 'Kigali – Muhanga', '2024-01-19', '1,030 Rwf', '10:30', 'available'),
(48, '2024-01-12', 'RAB 458', 'Kigali – Nyanza', '2024-01-19', '1,850 Rwf', '6:00', 'available'),
(49, '2024-01-19', 'RAB 453', 'Kigali – Nyanza', '2024-01-19', '1,850 Rwf', '7:00', 'available'),
(50, '2024-01-19', 'RAc 458', 'Muhanga – Ruhango', '2024-01-19', '550 Rwf', '6:00', 'available'),
(51, '2024-01-19', 'RAC 124', 'Muhanga – Ruhango', '2024-01-19', '550 Rwf', '7:00', 'available'),
(52, '2024-01-19', 'RAB 458', 'Muhanga – Nyanza', '2024-01-19', '820 Rwf', '6:00', 'available'),
(53, '2024-01-19', 'RAC 124', 'Muhanga – Nyanza', '2024-01-19', '820 Rwf', '6:30', 'available'),
(54, '2024-01-12', 'RAB 458', 'Muhanga – Huye', '2024-01-12', '1880 Rwf', '6:00', 'available'),
(55, '2024-01-12', 'RAB 451', 'Muhanga – Huye', '2024-01-12', '1880 Rwf', '6:30', 'available'),
(56, '2024-01-19', 'RAB 453', 'Muhanga – Huye', '2024-01-19', '1880 Rwf', '10:30', 'available'),
(57, '2024-01-19', 'RAB 453', 'Kiyonza – Huye', '2024-01-19', '710  Rwf', '6:30', 'available'),
(58, '2024-01-19', 'RAB 453', 'Kiyonza – Huye', '2024-01-19', '710  Rwf', '7:30', 'available'),
(59, '2024-01-12', 'RAB 452', 'Huye – Cyahinda', '2024-01-19', '1340 Rwf', '7:00', 'available'),
(60, '2024-01-12', 'RAB 451', 'Huye – Cyahinda', '2024-01-12', '1340 Rwf', '10:00', 'available'),
(61, '2024-01-12', 'RAB 451', ' Huye – Ruheru', '2024-01-12', '2,010 Rwf', '6:00', 'available'),
(62, '2024-01-12', 'RAB 451', 'Huye – Ruheru', '2024-01-12', '2,010 Rwf', '7:00', 'available'),
(63, '2024-01-12', 'RAB 452', 'Huye – Munini', '2024-01-12', '1,010 Rwf', '10:30', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `uppdetprice`
--

CREATE TABLE `uppdetprice` (
  `id` int(11) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `price` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uppdetprice`
--

INSERT INTO `uppdetprice` (`id`, `location`, `price`) VALUES
(1, 'Kigali - Huye', '2,560 Rwf'),
(3, 'Kigali – Ruhango', '1,490 Rwf'),
(4, 'Kigali – Nyanza', '1,850 Rwf'),
(5, 'Muhanga – Ruhango', '550 Rwf'),
(6, 'Muhanga – Nyanza', '820 Rwf'),
(7, 'Muhanga – Huye', '1300 Rwf'),
(8, 'Ruhango – Huye', '1,070 Rwf'),
(9, 'Huye – Nyanza', '740 Rwf'),
(10, 'Huye – Nyamagabe', '560 Rwf'),
(11, ' Huye – Mamba', '1,000 Rwf'),
(12, 'Kigali – Muhanga', '1,030 Rwf'),
(13, 'Kibirizi – Huye', '500 Rwf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Momo password`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create account`
--
ALTER TABLE `create account`
  ADD PRIMARY KEY (`password`);

--
-- Indexes for table `create_account`
--
ALTER TABLE `create_account`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`destinationid`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driverid`);

--
-- Indexes for table `edditticket`
--
ALTER TABLE `edditticket`
  ADD PRIMARY KEY (`ticketid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user name`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticketid`);

--
-- Indexes for table `uppdetprice`
--
ALTER TABLE `uppdetprice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `create_account`
--
ALTER TABLE `create_account`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `destinationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driverid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7654568;

--
-- AUTO_INCREMENT for table `edditticket`
--
ALTER TABLE `edditticket`
  MODIFY `ticketid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticketid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `uppdetprice`
--
ALTER TABLE `uppdetprice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

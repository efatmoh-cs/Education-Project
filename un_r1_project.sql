-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2023 at 09:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `un_r1_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_meeting`
--

CREATE TABLE `add_meeting` (
  `id` int(11) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `meetingDate` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(200) NOT NULL,
  `location` varchar(60) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(100) NOT NULL,
  `published` int(1) NOT NULL DEFAULT 1 COMMENT '1 Yes, 0No',
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `add_meeting`
--

INSERT INTO `add_meeting` (`id`, `regDate`, `meetingDate`, `title`, `content`, `location`, `price`, `image`, `published`, `cat_id`) VALUES
(47, '2023-10-19 12:30:54', '2023-12-06', 'HTML ', ' Html in Front End', 'Aswan', 500, 'aa64263ec6e63d1543a754f0273458d0.jpeg', 0, 24),
(49, '2023-10-19 14:04:11', '2024-02-27', 'Mobile Application', 'Important to learn mobile application', 'Cario ,Eltahryr', 600, 'fc0fad703c69222c784605b556eecba7.jpeg', 1, 28),
(50, '2023-10-19 14:53:12', '2023-08-19', 'Testing', '  Contents', 'Geza', 654, '31793d93953743b4ac58c95c6e37e05b.jpeg', 0, 27),
(51, '2023-10-19 14:57:57', '2024-03-19', 'Design of plan', 'The structure of the design', 'Elzamlec ,Lebnain street', 100, 'cb8411bc68ff083de56e289d306e3ab5.jpeg', 1, 22),
(52, '2023-10-19 18:20:23', '2023-11-19', 'Task', 'Contents', 'cario', 654, 'a09781873daa52b1a3509c1934a40f00.jpeg', 1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `catogries`
--

CREATE TABLE `catogries` (
  `cat_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catogries`
--

INSERT INTO `catogries` (`cat_id`, `category`) VALUES
(22, 'Autocad 10'),
(24, 'Front End'),
(27, 'Test Software'),
(28, 'Flutter'),
(29, 'ICT'),
(30, 'Backend R1'),
(32, 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `usears`
--

CREATE TABLE `usears` (
  `id` int(11) NOT NULL,
  `registrationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `regDate` date NOT NULL DEFAULT current_timestamp(),
  `fullname` varchar(60) NOT NULL,
  `user_name` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `active` int(1) NOT NULL COMMENT '1Yes,0 NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usears`
--

INSERT INTO `usears` (`id`, `registrationDate`, `regDate`, `fullname`, `user_name`, `email`, `pass`, `active`) VALUES
(60, '2023-10-14 10:00:20', '2023-10-14', 'shahd yasser', 'shahod', 'shahdyasser@gmail.com', '$2y$10$r9S1SO6lcljhQ0MXmXxOj.hN5onsWitAdsdTPo9qE.9oCDA0SUAgC', 1),
(63, '2023-10-19 15:10:52', '2023-10-19', 'efat mohamed khedr', 'root', 'efatkhadr1982@gmail.com', '$2y$10$XzRUWYkxFX4fLZK9YVQ2XO7M5qgaJNbBEhSKGoJk4uZsh7ijM1Y3i', 0),
(65, '2023-10-19 15:16:44', '2023-10-19', 'Ali yasser', 'ELHALWANY', 'Aliyasser@gmail.com', '$2y$10$tgEiCJOlbRfBM.sG7U2CcOEJ0J5Siph7HGWYgWOFDEtoyfDRq87vC', 1),
(66, '2023-10-19 15:19:33', '2023-10-19', 'Mona mahmoud', 'ELshekh_mm', 'monamahmoud@gmail.com', '$2y$10$xQvG2CFye32.EFg9Ks1u6uiQg9hpBpuTM4CrzVLCjrsyhfb.8SS0G', 1),
(67, '2023-10-19 15:22:34', '2023-10-19', 'Amera Mohamed', 'root', 'AMERA@gmail.com', '$2y$10$5y1WqalL6N9QR26hZo0NkOOoRtbYn/1HlpwQUFB5wNzl8B.0V3TXK', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_meeting`
--
ALTER TABLE `add_meeting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `catogries`
--
ALTER TABLE `catogries`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `usears`
--
ALTER TABLE `usears`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fullname` (`fullname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_meeting`
--
ALTER TABLE `add_meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `catogries`
--
ALTER TABLE `catogries`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `usears`
--
ALTER TABLE `usears`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_meeting`
--
ALTER TABLE `add_meeting`
  ADD CONSTRAINT `cat_id` FOREIGN KEY (`cat_id`) REFERENCES `catogries` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 03, 2022 at 09:07 AM
-- Server version: 5.7.24
-- PHP Version: 7.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz3`
--

-- --------------------------------------------------------

--
-- Table structure for table `match_with`
--

CREATE TABLE `match_with` (
  `id` int(11) NOT NULL,
  `body_type` varchar(11) NOT NULL,
  `celebrity_name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `match_with`
--

INSERT INTO `match_with` (`id`, `body_type`, `celebrity_name`, `photo`) VALUES
(1, 'K', 'Cristiano Ronaldo', '1.jpg'),
(2, 'K', 'Kareena Kapoor', '2.jpg'),
(3, 'P', 'Donald Trump', '3.jpg'),
(4, 'P', 'Kamala Harris', '4.jpg'),
(5, 'V', 'Joe Biden', '5.jpg'),
(6, 'V', 'Deepika Padukone', '6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_option` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `category` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `answer_option`, `photo`, `category`) VALUES
(1, 1, 'Thin', '1.jpg', 'V'),
(2, 1, 'Medium', '2.jpg', 'P'),
(3, 1, 'Well Built', '3.jpg', 'K'),
(4, 2, 'Dry', '4.jpg', 'V'),
(5, 2, 'Oily', '5.jpg', 'P'),
(6, 2, 'Cold & Soft', '6.jpg', 'K'),
(7, 3, 'Dry', '7.jpg', 'V'),
(8, 3, 'Soft & Shiny', '8.jpg', 'P'),
(9, 3, 'Oily', '9.jpg', 'K'),
(10, 4, 'Low Appetite', '10.jpg', 'V'),
(11, 4, 'Good Appetite', '11.jpg', 'P'),
(12, 4, 'Heavy Appetite', '12.jpg', 'K'),
(13, 5, 'Heavy', '13.jpg', 'K'),
(14, 5, 'Pungent in Odour', '14.jpg', 'P'),
(15, 5, 'Minimal', '15.jpg', 'V'),
(16, 6, 'Light Sleeper', '16.jpg', 'V'),
(17, 6, 'Sound Moderate', '17.jpg', 'P'),
(18, 6, 'Heavy Excessive', '18.jpg', 'K'),
(19, 7, 'Curious', '19.jpg', 'V'),
(20, 7, 'Aggressive', '20.jpg', 'P'),
(21, 7, 'Logical', '21.jpg', 'P'),
(22, 8, 'Restless', '22.jpg', 'V'),
(23, 8, 'Goal Oriented', '23.jpg', 'P'),
(24, 8, 'Relaxed Lifestyle', '24.jpg', 'K');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`) VALUES
(1, 'What is Your Body Frame?'),
(2, 'Your Skin Type'),
(3, 'Your Hair Type'),
(4, 'Appetite'),
(5, 'Sweat'),
(6, 'Sleep'),
(7, 'Mind'),
(8, 'Activity');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `your_name` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `result_detail`
--

CREATE TABLE `result_detail` (
  `id` int(11) NOT NULL,
  `result_id` int(11) NOT NULL,
  `result_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `match_with`
--
ALTER TABLE `match_with`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_detail`
--
ALTER TABLE `result_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `match_with`
--
ALTER TABLE `match_with`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `result_detail`
--
ALTER TABLE `result_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

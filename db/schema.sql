-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2022 at 04:55 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adise2021`
--
CREATE DATABASE IF NOT EXISTS `adise2021` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `adise2021`;

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

DROP TABLE IF EXISTS `cards`;
CREATE TABLE `cards` (
  `number` tinyint(2) NOT NULL,
  `symbol` varchar(1) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`number`, `symbol`, `image`, `id`) VALUES
(1, 'C', 'https://i.ibb.co/zm2XGGs/ace-of-clubs.png', 1),
(2, 'C', 'https://i.ibb.co/Lt2y8GD/2-of-clubs.png', 2),
(3, 'C', 'https://i.ibb.co/kXRvGZX/3-of-clubs.png', 3),
(4, 'C', 'https://i.ibb.co/TgdLSyM/4-of-clubs.png', 4),
(5, 'C', 'https://i.ibb.co/y087fqs/5-of-clubs.png', 5),
(6, 'C', 'https://i.ibb.co/3pYyKFW/6-of-clubs.png', 6),
(7, 'C', 'https://i.ibb.co/chNVpdP/7-of-clubs.png', 7),
(8, 'C', 'https://i.ibb.co/hDfrq3d/8-of-clubs.png', 8),
(9, 'C', 'https://i.ibb.co/tLpZGzN/9-of-clubs.png', 9),
(10, 'C', 'https://i.ibb.co/1dV1RDN/10-of-clubs.png', 10),
(13, 'S', 'https://i.ibb.co/WDw9QMt/king-of-spades2.png', 11),
(1, 'S', 'https://i.ibb.co/nCJkC46/ace-of-spades2.png', 12),
(2, 'S', 'https://i.ibb.co/wWF4fdw/2-of-spades.png', 13),
(3, 'S', 'https://i.ibb.co/VBZ1Txq/3-of-spades.png', 14),
(4, 'S', 'https://i.ibb.co/T4ybhnk/4-of-spades.png', 15),
(5, 'S', 'https://i.ibb.co/1XgsZht/5-of-spades.png', 16),
(6, 'S', 'https://i.ibb.co/QCkVcK0/6-of-spades.png', 17),
(7, 'S', 'https://i.ibb.co/B31zVc6/7-of-spades.png', 18),
(8, 'S', 'https://i.ibb.co/hy5QbNf/8-of-spades.png', 19),
(9, 'S', 'https://i.ibb.co/tM86g6K/9-of-spades.png', 20),
(10, 'S', 'https://i.ibb.co/w48pPM2/10-of-spades.png\r\n', 21),
(1, 'H', 'https://i.ibb.co/0X406MH/ace-of-hearts.png', 22),
(2, 'H', 'https://i.ibb.co/ByHLnQW/2-of-hearts.png', 23),
(3, 'H', 'https://i.ibb.co/m5qYQqK/3-of-hearts.png', 24),
(4, 'H', 'https://i.ibb.co/8n3zy7J/4-of-hearts.png', 25),
(5, 'H', 'https://i.ibb.co/KNPtys5/5-of-hearts.png', 26),
(6, 'H', 'https://i.ibb.co/ZH1zx30/6-of-hearts.png', 27),
(7, 'H', 'https://i.ibb.co/yfcRN2k/7-of-hearts.png', 28),
(8, 'H', 'https://i.ibb.co/djJ16Jx/8-of-hearts.png', 29),
(9, 'H', 'https://i.ibb.co/X72C5Dg/9-of-hearts.png', 30),
(10, 'H', 'https://i.ibb.co/LhfT5B1/10-of-hearts.png', 31),
(1, 'D', 'https://i.ibb.co/CMkMY43/ace-of-diamonds.png', 32),
(2, 'D', 'https://i.ibb.co/X8fwqpd/2-of-diamonds.png', 33),
(3, 'D', 'https://i.ibb.co/NC5Mqr6/3-of-diamonds.png', 34),
(4, 'D', 'https://i.ibb.co/c6c7VfJ/4-of-diamonds.png', 35),
(5, 'D', 'https://i.ibb.co/8mcH1Qb/5-of-diamonds.png', 36),
(6, 'D', 'https://i.ibb.co/Fmmcwdy/6-of-diamonds.png', 37),
(7, 'D', 'https://i.ibb.co/zVw2PxV/7-of-diamonds.png', 38),
(8, 'D', 'https://i.ibb.co/NNz7txH/8-of-diamonds.png', 39),
(9, 'D', 'https://i.ibb.co/vmCgv2x/9-of-diamonds.png', 40),
(10, 'D', 'https://i.ibb.co/Ct4nXk7/10-of-diamonds.png', 41);

-- --------------------------------------------------------

--
-- Table structure for table `deck_cards`
--

DROP TABLE IF EXISTS `deck_cards`;
CREATE TABLE `deck_cards` (
  `id_card` int(11) NOT NULL,
  `id_player` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `game_status`
--

DROP TABLE IF EXISTS `game_status`;
CREATE TABLE `game_status` (
  `status` enum('not active','initialized','started','ended','aborded') NOT NULL DEFAULT 'not active',
  `p_turn` enum('L','N') DEFAULT NULL,
  `result` enum('L','N') DEFAULT NULL,
  `last_change` timestamp NULL DEFAULT NULL,
  `id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game_status`
--

INSERT INTO `game_status` (`status`, `p_turn`, `result`, `last_change`, `id`) VALUES
('started', 'L', NULL, '2022-01-14 18:06:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_action` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `token` varchar(255) NOT NULL,
  `player_turn` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deck_cards`
--
ALTER TABLE `deck_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `deck_cards`
--
ALTER TABLE `deck_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

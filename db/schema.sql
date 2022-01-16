
DROP DATABASE IF EXISTS `adise2021`;

CREATE DATABASE`adise2021`;

USE `adise2021`;


DROP TABLE IF EXISTS `cards`;
CREATE TABLE `cards` (
  `number` tinyint(2) NOT NULL,
  `symbol` varchar(1) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL
);

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

DROP TABLE IF EXISTS `deck_cards`;
CREATE TABLE `deck_cards` (
  `id_card` int(11) NOT NULL,
  `id_player` int(11) NOT NULL,
  `id` int(11) NOT NULL
);

INSERT INTO `deck_cards` (`id_card`, `id_player`, `id`) VALUES
(10, 45, 3486),
(12, 46, 3487),
(37, 45, 3488),
(9, 46, 3489),
(3, 45, 3490),
(23, 46, 3491),
(16, 45, 3492),
(14, 46, 3493),
(35, 45, 3494),
(27, 46, 3495),
(36, 45, 3496),
(2, 46, 3497),
(1, 45, 3498),
(40, 46, 3499),
(28, 45, 3500),
(6, 46, 3501),
(34, 45, 3502),
(20, 46, 3503),
(41, 45, 3504),
(19, 46, 3505),
(24, 45, 3506),
(18, 46, 3507),
(21, 45, 3508),
(39, 46, 3509),
(7, 45, 3510),
(22, 46, 3511),
(38, 45, 3512),
(25, 46, 3513),
(5, 45, 3514),
(8, 46, 3515),
(30, 45, 3516),
(17, 46, 3517),
(26, 45, 3518),
(4, 46, 3519),
(32, 45, 3520),
(13, 46, 3521),
(29, 45, 3522),
(31, 46, 3523),
(11, 45, 3524),
(15, 46, 3525),
(33, 45, 3526);

DROP TABLE IF EXISTS `game_status`;
CREATE TABLE `game_status` (
  `status` enum('not active','initialized','started','ended','aborded') NOT NULL DEFAULT 'not active',
  `p_turn` enum('L','N') DEFAULT NULL,
  `result` enum('L','N') DEFAULT NULL,
  `last_change` timestamp NULL DEFAULT NULL,
  `id` int(1) NOT NULL
);

INSERT INTO `game_status` (`status`, `p_turn`, `result`, `last_change`, `id`) VALUES
('started', 'L', NULL, '2022-01-16 12:48:34', 0);

DROP TABLE IF EXISTS `players`;
CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_action` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `token` varchar(255) NOT NULL,
  `player_turn` int(2) NOT NULL
);

INSERT INTO `players` (`id`, `name`, `last_action`, `token`, `player_turn`) VALUES
(45, 'a', '2022-01-16 13:31:19', 'wVAdBVXnZ4Ivj74EJJ0j', 1),
(46, 'asd', '2022-01-16 12:21:22', 'W87FXpfnkIwm2b3B3fSw', 2);

ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `deck_cards`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

ALTER TABLE `deck_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3527;

ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 09 mei 2017 om 16:38
-- Serverversie: 10.1.19-MariaDB
-- PHP-versie: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_fifa`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_matches`
--

CREATE TABLE `tbl_matches` (
  `id` int(10) UNSIGNED NOT NULL,
  `team_id_a` int(10) UNSIGNED NOT NULL,
  `team_id_b` int(10) UNSIGNED NOT NULL,
  `score_team_a` int(10) UNSIGNED DEFAULT NULL,
  `score_team_b` int(10) UNSIGNED DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `start_play_time` int(11) DEFAULT NULL,
  `pauze_time` int(11) DEFAULT NULL,
  `exstra_time` int(11) DEFAULT NULL,
  `played` enum('T','F') NOT NULL DEFAULT 'F'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_matches`
--

INSERT INTO `tbl_matches` (`id`, `team_id_a`, `team_id_b`, `score_team_a`, `score_team_b`, `start_time`, `start_play_time`, `pauze_time`, `exstra_time`, `played`) VALUES
(3, 1, 2, NULL, NULL, NULL, 1494332670, NULL, NULL, 'F'),
(4, 38, 39, NULL, NULL, NULL, NULL, NULL, NULL, 'F');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_players`
--

CREATE TABLE `tbl_players` (
  `id` int(11) UNSIGNED NOT NULL,
  `student_id` int(10) NOT NULL,
  `team_id` int(3) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `goals` int(10) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_players`
--

INSERT INTO `tbl_players` (`id`, `student_id`, `team_id`, `first_name`, `last_name`, `goals`, `created_at`, `deleted_at`) VALUES
(1, 0, 1, 'Lasse', 'Schöne', 0, '2017-04-13 09:44:13', NULL),
(2, 0, 1, 'Davy ', 'Klaassen', 0, '2017-04-13 09:44:13', NULL),
(3, 0, 1, 'Hakim ', 'Ziyech', 0, '2017-04-13 09:45:47', NULL),
(4, 0, 1, 'Kasper', 'Dolberg', 0, '2017-04-13 09:45:47', NULL),
(5, 0, 2, 'Luuk', 'de Jong', 0, '2017-04-13 09:48:23', NULL),
(6, 0, 2, 'Siem', 'de Jong', 0, '2017-04-13 09:48:23', NULL),
(7, 0, 2, 'Jeroen', 'Zoet', 0, '2017-04-13 09:48:23', NULL),
(8, 0, 2, 'Hector', 'Moreno', 0, '2017-04-13 09:48:23', NULL),
(17, 55555555, NULL, 'test', 'tstt', 0, '2017-05-08 15:59:03', NULL),
(18, 0, NULL, '', '', 0, '2017-05-09 15:30:06', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_poules`
--

CREATE TABLE `tbl_poules` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_poules`
--

INSERT INTO `tbl_poules` (`id`, `name`, `created_at`, `deleted_at`) VALUES
(6, '1', '2017-05-04 10:21:23', NULL),
(7, '2', '2017-05-04 10:21:23', NULL),
(8, '3', '2017-05-04 10:21:23', NULL),
(9, '4', '2017-05-04 10:21:23', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_teams`
--

CREATE TABLE `tbl_teams` (
  `id` int(11) UNSIGNED NOT NULL,
  `poule_id` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL,
  `wins` int(10) NOT NULL DEFAULT '0',
  `losses` int(10) NOT NULL DEFAULT '0',
  `draws` int(10) NOT NULL DEFAULT '0',
  `points` int(10) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_teams`
--

INSERT INTO `tbl_teams` (`id`, `poule_id`, `name`, `wins`, `losses`, `draws`, `points`, `created_at`, `deleted_at`) VALUES
(1, 3, 'Ajax', 0, 0, 0, 0, '2017-04-13 09:42:45', NULL),
(2, 3, 'PSV', 0, 0, 0, 0, '2017-04-13 09:42:45', NULL),
(34, 2, 'team1', 0, 0, 0, 0, '2017-05-04 11:20:54', NULL),
(35, 2, 'team2', 0, 0, 0, 0, '2017-05-04 11:20:54', NULL),
(36, 2, 'team3', 0, 0, 0, 0, '2017-05-04 11:20:54', NULL),
(37, 1, 'team4', 0, 0, 0, 0, '2017-05-04 11:20:54', NULL),
(38, 1, 'team5', 0, 0, 0, 0, '2017-05-04 11:20:54', NULL),
(39, 1, 'team6', 0, 0, 0, 0, '2017-05-04 11:20:54', NULL),
(40, 2, 'team7', 0, 0, 0, 0, '2017-05-04 11:20:54', NULL),
(41, 4, 'team8', 0, 0, 0, 0, '2017-05-04 11:20:54', NULL),
(42, 4, 'team9', 0, 0, 0, 0, '2017-05-04 11:20:54', NULL),
(43, 1, 'team10', 0, 0, 0, 0, '2017-05-04 11:20:54', NULL),
(44, 4, 'team11', 0, 0, 0, 0, '2017-05-04 11:20:54', NULL),
(45, 2, 'team12', 0, 0, 0, 0, '2017-05-04 11:20:54', NULL),
(46, 3, 'team13', 0, 0, 0, 0, '2017-05-04 11:20:54', NULL),
(47, 3, 'team14', 0, 0, 0, 0, '2017-05-04 11:20:54', NULL),
(48, 1, 'team15', 0, 0, 0, 0, '2017-05-04 11:20:54', NULL),
(49, 4, 'team16', 0, 0, 0, 0, '2017-05-04 11:20:54', NULL),
(50, 3, 'team17', 0, 0, 0, 0, '2017-05-04 11:20:54', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `studentnumber` varchar(255) NOT NULL,
  `admin` int(1) DEFAULT '1',
  `teamrights` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `email`, `password`, `studentnumber`, `admin`, `teamrights`) VALUES
(1, 'grandadmin', 'd228214@edu.rocwb.nl', '$2y$10$xiRWLedkFQC2J.6WJ35hrOMi2lx7OnOnyoRWlRfWNTWh6140cCF4S', 'd228214', 2, NULL),
(2, 'JoostLont', 'joost.lont@xs4all.nl', '$2y$10$ZCFaqnolXw7OpDk2HoMJG.1cSPm58u2CFijdhWp05LFwqZKqOnH8K', '228214', 1, NULL),
(3, 'Joost1', 'joost.lont@gmail.com', '$2y$10$IL8w/5boINsbRyizezzUyukAdTT5qI//8Hh5MR.vzWNh2OGJII6ae', '228214D', 1, NULL),
(4, 'ttisbest', 'timoski@outlook.com', '$2y$10$BahjQO72pJ2Dhj8l759lCeoJuFM1PjlhjTibz9iekxcTUgwmuYez.', '222926', 3, NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `tbl_matches`
--
ALTER TABLE `tbl_matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_matches_ibfk_1` (`team_id_a`),
  ADD KEY `tbl_matches_ibfk_2` (`team_id_b`);

--
-- Indexen voor tabel `tbl_players`
--
ALTER TABLE `tbl_players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexen voor tabel `tbl_poules`
--
ALTER TABLE `tbl_poules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `naam` (`name`);

--
-- Indexen voor tabel `tbl_teams`
--
ALTER TABLE `tbl_teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexen voor tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `tbl_matches`
--
ALTER TABLE `tbl_matches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `tbl_players`
--
ALTER TABLE `tbl_players`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT voor een tabel `tbl_poules`
--
ALTER TABLE `tbl_poules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT voor een tabel `tbl_teams`
--
ALTER TABLE `tbl_teams`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT voor een tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `tbl_matches`
--
ALTER TABLE `tbl_matches`
  ADD CONSTRAINT `tbl_matches_ibfk_1` FOREIGN KEY (`team_id_a`) REFERENCES `tbl_teams` (`id`),
  ADD CONSTRAINT `tbl_matches_ibfk_2` FOREIGN KEY (`team_id_b`) REFERENCES `tbl_teams` (`id`);

--
-- Beperkingen voor tabel `tbl_players`
--
ALTER TABLE `tbl_players`
  ADD CONSTRAINT `tbl_players_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `tbl_teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

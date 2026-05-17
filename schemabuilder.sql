-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 17 maj 2026 kl 17:37
-- Serverversion: 10.4.32-MariaDB
-- PHP-version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `schemabuilder`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `finishedworkouts`
--

CREATE TABLE `finishedworkouts` (
  `id` int(11) NOT NULL,
  `workout` text NOT NULL,
  `completion` int(11) NOT NULL,
  `timecompleted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `finishedworkouts`
--

INSERT INTO `finishedworkouts` (`id`, `workout`, `completion`, `timecompleted`) VALUES
(2, '67', 1, '2026-05-17 15:36:54');

-- --------------------------------------------------------

--
-- Tabellstruktur `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `userinfo`
--

INSERT INTO `userinfo` (`id`, `user`, `pass`, `mail`) VALUES
(6, 'BPPabbGFWVfTFXdjGij51LOcNBjrzIsW21RSFN9MkBYJ6cU/W5qUf6auyom55fZRp+nCp+KRRQ6fQS7mjz+FBQ==', 'a5aefd7730f1012d998dbe609a116ad6', 'XhoXgd50NzEvdUDJ6du06TM3xBZX8602Iily06msgxDrlHvjFNVQ2TKmiPfyvJ7QuqvGpre+hUbcirKi5VflTA==');

-- --------------------------------------------------------

--
-- Tabellstruktur `workouts`
--

CREATE TABLE `workouts` (
  `id` int(11) NOT NULL,
  `schedule_name` varchar(255) NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `linkeduser` int(11) NOT NULL,
  `isfromemplate` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `workouts`
--

INSERT INTO `workouts` (`id`, `schedule_name`, `data`, `linkeduser`, `isfromemplate`) VALUES
(87, 'Comp prep', '{\n  \"scheduleName\": \"Comp prep\",\n  \"exercises\": [\n    {\n      \"exercise\": 1,\n      \"name\": \"Squat\",\n      \"sets\": [\n        {\n          \"set\": 1,\n          \"reps\": \"1\",\n          \"weight\": \"12\",\n          \"rpe\": \"6\"\n        }\n      ]\n    }\n  ]\n}', 6, 0),
(89, '1', '{\n  \"scheduleName\": \"1\",\n  \"exercises\": [\n    {\n      \"exercise\": 1,\n      \"name\": \"1\",\n      \"sets\": [\n        {\n          \"set\": 1,\n          \"reps\": \"1\",\n          \"weight\": \"1\",\n          \"rpe\": \"1\"\n        },\n        {\n          \"set\": 2,\n          \"reps\": \"1\",\n          \"weight\": \"1\",\n          \"rpe\": \"1\"\n        },\n        {\n          \"set\": 3,\n          \"reps\": \"1\",\n          \"weight\": \"11\",\n          \"rpe\": \"1\"\n        }\n      ]\n    }\n  ]\n}', 6, 0);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `finishedworkouts`
--
ALTER TABLE `finishedworkouts`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `workouts`
--
ALTER TABLE `workouts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `finishedworkouts`
--
ALTER TABLE `finishedworkouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT för tabell `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT för tabell `workouts`
--
ALTER TABLE `workouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

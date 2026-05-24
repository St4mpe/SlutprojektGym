-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 24 maj 2026 kl 15:29
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
-- Tabellstruktur `excercisescompleted`
--

CREATE TABLE `excercisescompleted` (
  `id` int(11) NOT NULL,
  `namn` text NOT NULL,
  `antal` int(11) NOT NULL,
  `linkeduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `excercisescompleted`
--

INSERT INTO `excercisescompleted` (`id`, `namn`, `antal`, `linkeduser`) VALUES
(9, '\n            Squat\n            \n        ', 2, 6),
(10, '\n            1\n            \n        ', 4, 6),
(11, '\n            Bench\n            \n        ', 6, 6),
(12, '\n            Incline Dumbell Press\n            \n        ', 1, 6),
(13, '\n            Bänk\n            \n        ', 2, 8);

-- --------------------------------------------------------

--
-- Tabellstruktur `finishedworkouts`
--

CREATE TABLE `finishedworkouts` (
  `id` int(11) NOT NULL,
  `workout` text NOT NULL,
  `completion` int(11) NOT NULL,
  `timecompleted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `linkeduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `finishedworkouts`
--

INSERT INTO `finishedworkouts` (`id`, `workout`, `completion`, `timecompleted`, `linkeduser`) VALUES
(69, 'ag', 75, '2026-05-24 12:55:39', 6),
(70, 'Bänkaren', 100, '2026-05-24 13:07:48', 8);

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
(6, 'BPPabbGFWVfTFXdjGij51LOcNBjrzIsW21RSFN9MkBYJ6cU/W5qUf6auyom55fZRp+nCp+KRRQ6fQS7mjz+FBQ==', 'a5aefd7730f1012d998dbe609a116ad6', 'XhoXgd50NzEvdUDJ6du06TM3xBZX8602Iily06msgxDrlHvjFNVQ2TKmiPfyvJ7QuqvGpre+hUbcirKi5VflTA=='),
(8, 'PUH6Cy//HgMP80Po9u57vo5I6/H7FuR6QYr+nBfTCay5PEM02D3xLdDwBTcm255TFElu+BMJa74kWFQIg7LWaQ==', 'a5aefd7730f1012d998dbe609a116ad6', 'jH8o31M2GtAgCZnVdss7YkqdeOhB61gsd7tHReHQgcrKLbu9IBUyFLoWKprwcqXZNCiJbHY8oFx0kordV9cHCQ==');

-- --------------------------------------------------------

--
-- Tabellstruktur `workouts`
--

CREATE TABLE `workouts` (
  `id` int(11) NOT NULL,
  `schedule_name` varchar(255) NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `linkeduser` int(11) NOT NULL,
  `isfromemplate` tinyint(1) NOT NULL,
  `completed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `workouts`
--

INSERT INTO `workouts` (`id`, `schedule_name`, `data`, `linkeduser`, `isfromemplate`, `completed`) VALUES
(92, 'ag', '{\n  \"scheduleName\": \"ag\",\n  \"exercises\": [\n    {\n      \"exercise\": 1,\n      \"name\": \"Bench\",\n      \"sets\": [\n        {\n          \"set\": 1,\n          \"reps\": \"1\",\n          \"weight\": \"2\",\n          \"rpe\": \"3\"\n        },\n        {\n          \"set\": 2,\n          \"reps\": \"2\",\n          \"weight\": \"3\",\n          \"rpe\": \"2\"\n        }\n      ]\n    },\n    {\n      \"exercise\": 2,\n      \"name\": \"Incline Dumbell Press\",\n      \"sets\": [\n        {\n          \"set\": 1,\n          \"reps\": \"2\",\n          \"weight\": \"2\",\n          \"rpe\": \"2\"\n        },\n        {\n          \"set\": 2,\n          \"reps\": \"3\",\n          \"weight\": \"3\",\n          \"rpe\": \"3\"\n        }\n      ]\n    }\n  ]\n}', 6, 0, 1),
(93, 'Bänkaren', '{\n  \"scheduleName\": \"Bänkaren\",\n  \"exercises\": [\n    {\n      \"exercise\": 1,\n      \"name\": \"Bänk\",\n      \"sets\": [\n        {\n          \"set\": 1,\n          \"reps\": \"1\",\n          \"weight\": \"1\",\n          \"rpe\": \"1\"\n        },\n        {\n          \"set\": 2,\n          \"reps\": \"1\",\n          \"weight\": \"1\",\n          \"rpe\": \"1\"\n        }\n      ]\n    }\n  ]\n}', 8, 0, 1);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `excercisescompleted`
--
ALTER TABLE `excercisescompleted`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT för tabell `excercisescompleted`
--
ALTER TABLE `excercisescompleted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT för tabell `finishedworkouts`
--
ALTER TABLE `finishedworkouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT för tabell `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT för tabell `workouts`
--
ALTER TABLE `workouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

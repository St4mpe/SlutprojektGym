-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 20 maj 2026 kl 11:14
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
  `timecompleted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `linkeduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `finishedworkouts`
--

INSERT INTO `finishedworkouts` (`id`, `workout`, `completion`, `timecompleted`, `linkeduser`) VALUES
(26, 'Jack of arms', 75, '2026-05-19 12:29:21', 6);

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
  `isfromemplate` tinyint(1) NOT NULL,
  `completed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `workouts`
--

INSERT INTO `workouts` (`id`, `schedule_name`, `data`, `linkeduser`, `isfromemplate`, `completed`) VALUES
(94, 'Jack of arms', '{\n  \"scheduleName\": \"Jack of arms\",\n  \"exercises\": [\n    {\n      \"exercise\": 1,\n      \"name\": \"Kitty cats\",\n      \"sets\": [\n        {\n          \"set\": 1,\n          \"reps\": \"20\",\n          \"weight\": \"20\",\n          \"rpe\": \"6\"\n        },\n        {\n          \"set\": 2,\n          \"reps\": \"30\",\n          \"weight\": \"15\",\n          \"rpe\": \"6\"\n        },\n        {\n          \"set\": 3,\n          \"reps\": \"6-7\",\n          \"weight\": \"30\",\n          \"rpe\": \"8\"\n        }\n      ]\n    },\n    {\n      \"exercise\": 2,\n      \"name\": \"squat\",\n      \"sets\": [\n        {\n          \"set\": 1,\n          \"reps\": \"1\",\n          \"weight\": \"20\",\n          \"rpe\": \"10\"\n        }\n      ]\n    }\n  ]\n}', 6, 0, 1),
(95, 'big leg', '{\n  \"scheduleName\": \"big leg\",\n  \"exercises\": [\n    {\n      \"exercise\": 1,\n      \"name\": \"Kitty cats\",\n      \"sets\": [\n        {\n          \"set\": 1,\n          \"reps\": \"1\",\n          \"weight\": \"30\",\n          \"rpe\": \"5\"\n        },\n        {\n          \"set\": 2,\n          \"reps\": \"10\",\n          \"weight\": \"20\",\n          \"rpe\": \"7\"\n        },\n        {\n          \"set\": 3,\n          \"reps\": \"100\",\n          \"weight\": \"10\",\n          \"rpe\": \"9\"\n        }\n      ]\n    },\n    {\n      \"exercise\": 2,\n      \"name\": \"squat\",\n      \"sets\": [\n        {\n          \"set\": 1,\n          \"reps\": \"30-67\",\n          \"weight\": \"30\",\n          \"rpe\": \"9\"\n        }\n      ]\n    }\n  ]\n}', 6, 0, 1),
(96, 'JAHH(från: big leg)', '{\n  \"scheduleName\": \"JAHH(från: big leg)\",\n  \"exercises\": [\n    {\n      \"exercise\": 1,\n      \"name\": \"Kitty cats\",\n      \"sets\": [\n        {\n          \"set\": 1,\n          \"reps\": \"1\",\n          \"weight\": \"1\",\n          \"rpe\": \"12\"\n        },\n        {\n          \"set\": 2,\n          \"reps\": \"12\",\n          \"weight\": \"12\",\n          \"rpe\": \"2\"\n        },\n        {\n          \"set\": 3,\n          \"reps\": \"13\",\n          \"weight\": \"13\",\n          \"rpe\": \"3\"\n        }\n      ]\n    },\n    {\n      \"exercise\": 2,\n      \"name\": \"squat\",\n      \"sets\": [\n        {\n          \"set\": 1,\n          \"reps\": \"120\",\n          \"weight\": \"120\",\n          \"rpe\": \"0.1\"\n        }\n      ]\n    }\n  ]\n}', 6, 1, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT för tabell `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT för tabell `workouts`
--
ALTER TABLE `workouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

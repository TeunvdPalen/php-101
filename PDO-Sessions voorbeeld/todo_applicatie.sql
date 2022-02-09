-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 09 feb 2022 om 11:47
-- Serverversie: 10.4.21-MariaDB
-- PHP-versie: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_applicatie`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categorie`
--

CREATE TABLE `categorie` (
  `id` int(10) UNSIGNED NOT NULL,
  `naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `categorie`
--

INSERT INTO `categorie` (`id`, `naam`) VALUES
(1, 'supermarkt'),
(2, 'tuin'),
(3, 'school'),
(4, 'binnenshuis');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `username`, `email`, `password`) VALUES
(1, 'Teun', 'teun@mail.com', '$2y$10$oTCz509p1TIuqk4.jv2jI.lOvzKg4UEQPE0IfjobjBr1rbPKS3s5O'),
(2, 'test', 'test@mail.com', '$2y$10$MTNPHuRK7sGPyn8lN/ox6u3SWbIPesLrfLg2LhUxAC//yQnB8RbEC');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `todo_items`
--

CREATE TABLE `todo_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `omschrijving` varchar(255) NOT NULL,
  `datum` date NOT NULL DEFAULT current_timestamp(),
  `afgewerkt` tinyint(1) NOT NULL DEFAULT 0,
  `prioriteit` int(11) NOT NULL DEFAULT 0,
  `categorie_id` int(11) DEFAULT NULL,
  `gebruiker_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `todo_items`
--

INSERT INTO `todo_items` (`id`, `omschrijving`, `datum`, `afgewerkt`, `prioriteit`, `categorie_id`, `gebruiker_id`) VALUES
(2, 'huiswerk', '2022-01-26', 0, 1, 3, 1),
(3, 'melk halen', '2022-01-26', 1, 0, NULL, 0),
(4, 'php afwerken', '2022-01-26', 0, 2, 3, 1),
(6, 'test', '2022-01-26', 0, 4, NULL, 0),
(7, 'groenten', '2022-02-02', 0, 0, 1, 1),
(9, 'onkruid plukken', '2022-02-09', 0, 1, 2, 1),
(16, 'rde', '2022-02-09', 0, 0, 2, 1),
(17, 'tesssssst', '2022-02-09', 0, 4, 4, 2);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `todo_items`
--
ALTER TABLE `todo_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `todo_items`
--
ALTER TABLE `todo_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

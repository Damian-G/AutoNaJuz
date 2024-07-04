-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lip 04, 2024 at 05:59 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wypozyczalniaautdb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `flota`
--

CREATE TABLE `flota` (
  `id` int(11) NOT NULL,
  `idKategorii` int(11) DEFAULT NULL,
  `marka` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `rok` int(11) DEFAULT NULL,
  `rodzaj_paliwa` varchar(50) DEFAULT NULL,
  `spalanie` decimal(8,1) NOT NULL,
  `skrzynia_biegow` varchar(50) DEFAULT NULL,
  `rodzaj_napedu` varchar(50) DEFAULT NULL,
  `ilosc_miejsc` int(11) DEFAULT NULL,
  `kolor` varchar(50) DEFAULT NULL,
  `stawka_dzienna` decimal(10,2) DEFAULT NULL,
  `stawka_miesieczna` decimal(10,2) DEFAULT NULL,
  `stawka_kilometrowa` decimal(10,2) DEFAULT NULL,
  `obrazek` varchar(255) DEFAULT NULL,
  `opis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flota`
--

INSERT INTO `flota` (`id`, `idKategorii`, `marka`, `model`, `rok`, `rodzaj_paliwa`, `spalanie`, `skrzynia_biegow`, `rodzaj_napedu`, `ilosc_miejsc`, `kolor`, `stawka_dzienna`, `stawka_miesieczna`, `stawka_kilometrowa`, `obrazek`, `opis`) VALUES
(3, 3, 'Mercedes', 'Sprinter', 2019, 'Diesel', 12.5, 'Manualna', '4x4', 3, 'Srebrny', 220.00, 4200.00, 0.70, 'mercedes.png', 'Niezawodny samochód dostawczy.'),
(4, 4, 'BMW', 'X5', 2021, 'Benzyna', 14.2, 'Automatyczna', '4x4', 5, 'Biały', 300.00, 6000.00, 1.00, 'bmwx5.png', 'Luksusowy SUV.'),
(5, 1, 'Mercedes-Benz', 'S-Class', 2023, 'Benzyna', 8.5, 'Automatyczna', 'Tył', 5, 'Czarny', 1200.00, 30000.00, 3.00, 'mercedes_s_class.png', 'Luksusowy sedan z najwyższej półki, oferujący niespotykany komfort i zaawansowane technologie.'),
(7, 1, 'Audi', 'A8', 2023, 'Benzyna', 9.0, 'Automatyczna', '4x4', 5, 'Srebrny', 1150.00, 29000.00, 3.00, 'audi_a8.png', 'Nowoczesna limuzyna oferująca luksus, zaawansowane technologie i dynamiczne osiągi.'),
(8, 1, 'Lexus', 'LS', 2023, 'Hybryda', 7.5, 'Automatyczna', 'Tył', 5, 'Biały', 1050.00, 27000.00, 3.00, 'lexus_ls.png', 'Luksusowy sedan z ekologicznym napędem hybrydowym, zapewniający wyjątkowy komfort i oszczędność paliwa.'),
(9, 1, 'Porsche', 'Panamera', 2023, 'Benzyna', 10.0, 'Automatyczna', '4x4', 4, 'Czerwony', 1300.00, 32000.00, 4.00, 'porsche_panamera.png', 'Sportowy sedan łączący luksus i osiągi, oferujący niezrównane wrażenia z jazdy.'),
(10, 1, 'Tesla', 'Model S', 2023, 'Elektryczny', 0.0, 'Automatyczna', '4x4', 5, 'Czarny', 1400.00, 35000.00, 4.00, 'tesla_model_s.png', 'Najnowocześniejszy elektryczny sedan oferujący wyjątkowe osiągi, zasięg i zaawansowane technologie autonomiczne.'),
(11, 3, 'Renault', 'Master', 2023, 'Diesel', 9.5, 'Manualna', 'Przód', 3, 'Biały', 260.00, 6200.00, 1.30, 'renault_master.png', 'Renault Master to wszechstronny samochód dostawczy, idealny do dużych zadań transportowych.'),
(12, 3, 'Volkswagen', 'Crafter', 2023, 'Diesel', 9.0, 'Manualna', 'Tył', 3, 'Czarny', 270.00, 6400.00, 1.40, 'vw_crafter.png', 'Volkswagen Crafter oferuje przestronność i wydajność, idealny do każdej pracy.'),
(13, 4, 'Jeep', 'Wrangler', 2023, 'Benzyna', 11.0, 'Automatyczna', '4x4', 5, 'Srebrny', 400.00, 9000.00, 1.80, 'jeep_wrangler.png', 'Jeep Wrangler to legendarny samochód terenowy, gotowy na każde wyzwanie.'),
(14, 4, 'Toyota', 'Land Cruiser', 2023, 'Diesel', 10.5, 'Automatyczna', '4x4', 7, 'Brąz', 420.00, 9500.00, 1.90, 'toyota_land_cruiser.png', 'Toyota Land Cruiser to solidny i niezawodny SUV, idealny na najtrudniejsze trasy.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) NOT NULL,
  `opis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategorie`
--

INSERT INTO `kategorie` (`id`, `nazwa`, `opis`) VALUES
(1, 'Osobowe', 'Samochody osobowe do codziennego użytku.'),
(3, 'Dostawcze', 'Samochody dostawcze do transportu towarów.'),
(4, 'TERENOWE', 'Samochody terenowe do jazdy w ciężkich warunkach.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odpowiedzi`
--

CREATE TABLE `odpowiedzi` (
  `id` int(11) NOT NULL,
  `idZgloszenia` int(11) NOT NULL,
  `tresc` text NOT NULL,
  `data_dodania` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `odpowiedzi`
--

INSERT INTO `odpowiedzi` (`id`, `idZgloszenia`, `tresc`, `data_dodania`) VALUES
(52, 44, 'Jaki czas opoznienia?', '2024-07-04 11:24:35'),
(53, 45, 'W takim razie nie ma problemu.', '2024-07-04 11:28:48'),
(55, 53, 'Spoks', '2024-07-04 12:40:05'),
(56, 54, 'tttttt', '2024-07-04 12:53:14');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `recenzje`
--

CREATE TABLE `recenzje` (
  `id` int(11) NOT NULL,
  `idAuta` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `tresc` text NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacje`
--

CREATE TABLE `rezerwacje` (
  `id` int(11) NOT NULL,
  `idAuta` int(11) NOT NULL,
  `idUzytkownika` int(11) NOT NULL,
  `metoda_rezerwacji` varchar(50) NOT NULL,
  `data_rezerwacji` datetime NOT NULL,
  `koniec_rezerwacji` datetime DEFAULT NULL,
  `czas_rezerwacji` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rezerwacje`
--

INSERT INTO `rezerwacje` (`id`, `idAuta`, `idUzytkownika`, `metoda_rezerwacji`, `data_rezerwacji`, `koniec_rezerwacji`, `czas_rezerwacji`) VALUES
(92, 7, 23, 'dzień', '2024-07-16 19:36:00', '2024-07-17 19:36:00', '2024-07-03 17:36:50'),
(96, 9, 23, 'dzień', '2024-07-05 11:18:00', '2024-07-06 11:18:00', '2024-07-04 09:18:55'),
(97, 9, 23, 'dzień', '2024-07-07 11:19:00', '2024-07-08 11:19:00', '2024-07-04 09:19:11');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ulubione`
--

CREATE TABLE `ulubione` (
  `id` int(11) NOT NULL,
  `idAuta` int(11) DEFAULT NULL,
  `idUzytkownika` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(10) NOT NULL,
  `login` varchar(50) NOT NULL,
  `haslo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rola` varchar(50) NOT NULL DEFAULT 'user',
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`, `email`, `rola`, `data`) VALUES
(20, 'damian', 'fe0b714aaecbd5c8961994c655d18a0d', 'damian@wp.pl', 'admin', '2024-07-03 06:51:15'),
(21, 'damian123', '6aeb26e16a1d52280e515a85edbe2e71', 'damian.boy@interia.pl', 'user', '2024-07-03 06:25:49'),
(22, 'adam', '1d7c2923c1684726dc23d2901c4d8157', 'adam@wp.pl', 'user', '2024-07-03 06:30:38'),
(23, 'karol', 'c19c27722ea415a93e1576ee0eb6ba1b', 'karol@wp.pl', 'user', '2024-07-03 06:31:30'),
(24, 'robert', '684c851af59965b680086b7b4896ff98', 'robert@wp.pl', 'user', '2024-07-03 06:33:11');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zgloszenia`
--

CREATE TABLE `zgloszenia` (
  `id` int(11) NOT NULL,
  `idUzytkownika` int(11) NOT NULL,
  `tresc` text NOT NULL,
  `data` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zgloszenia`
--

INSERT INTO `zgloszenia` (`id`, `idUzytkownika`, `tresc`, `data`) VALUES
(44, 23, 'Czy mogę oddac auto z opoznieniem?', '2024-07-04 11:23:37'),
(45, 23, '2h', '2024-07-04 11:24:46'),
(53, 23, 'Co tam', '2024-07-04 12:39:43'),
(54, 23, 'eeeeeeeeeeeeeee', '2024-07-04 12:52:47'),
(55, 24, 'sssssssssssss', '2024-07-04 16:20:42');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `flota`
--
ALTER TABLE `flota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idKategorii` (`idKategorii`),
  ADD KEY `id` (`id`);

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idZgloszenia` (`idZgloszenia`);

--
-- Indeksy dla tabeli `recenzje`
--
ALTER TABLE `recenzje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAuta` (`idAuta`);

--
-- Indeksy dla tabeli `rezerwacje`
--
ALTER TABLE `rezerwacje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAuta` (`idAuta`),
  ADD KEY `idUzytkownika` (`idUzytkownika`);

--
-- Indeksy dla tabeli `ulubione`
--
ALTER TABLE `ulubione`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAuta` (`idAuta`),
  ADD KEY `idUzytkownika` (`idUzytkownika`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indeksy dla tabeli `zgloszenia`
--
ALTER TABLE `zgloszenia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUzytkownika` (`idUzytkownika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flota`
--
ALTER TABLE `flota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `recenzje`
--
ALTER TABLE `recenzje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rezerwacje`
--
ALTER TABLE `rezerwacje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `ulubione`
--
ALTER TABLE `ulubione`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `zgloszenia`
--
ALTER TABLE `zgloszenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flota`
--
ALTER TABLE `flota`
  ADD CONSTRAINT `flota_ibfk_1` FOREIGN KEY (`idKategorii`) REFERENCES `kategorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  ADD CONSTRAINT `odpowiedzi_ibfk_1` FOREIGN KEY (`idZgloszenia`) REFERENCES `zgloszenia` (`id`);

--
-- Constraints for table `recenzje`
--
ALTER TABLE `recenzje`
  ADD CONSTRAINT `recenzje_ibfk_1` FOREIGN KEY (`idAuta`) REFERENCES `flota` (`id`);

--
-- Constraints for table `rezerwacje`
--
ALTER TABLE `rezerwacje`
  ADD CONSTRAINT `rezerwacje_ibfk_2` FOREIGN KEY (`idUzytkownika`) REFERENCES `uzytkownicy` (`id`);

--
-- Constraints for table `ulubione`
--
ALTER TABLE `ulubione`
  ADD CONSTRAINT `ulubione_ibfk_1` FOREIGN KEY (`idAuta`) REFERENCES `flota` (`id`),
  ADD CONSTRAINT `ulubione_ibfk_2` FOREIGN KEY (`idUzytkownika`) REFERENCES `uzytkownicy` (`id`);

--
-- Constraints for table `zgloszenia`
--
ALTER TABLE `zgloszenia`
  ADD CONSTRAINT `zgloszenia_ibfk_1` FOREIGN KEY (`idUzytkownika`) REFERENCES `uzytkownicy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

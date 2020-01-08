-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Maj 2016, 14:57
-- Wersja serwera: 10.1.10-MariaDB
-- Wersja PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `reklamacjehurtownia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE `klient` (
  `IdKlienta` int(11) NOT NULL,
  `Nazwa_firmy` char(255) COLLATE utf8_polish_ci NOT NULL,
  `Miasto` char(255) COLLATE utf8_polish_ci NOT NULL,
  `Ulica` char(255) COLLATE utf8_polish_ci NOT NULL,
  `Kod_pocztowy` char(255) COLLATE utf8_polish_ci NOT NULL,
  `mail` char(55) COLLATE utf8_polish_ci NOT NULL,
  `Telefon` int(11) NOT NULL,
  `NIP` int(11) NOT NULL,
  `login` char(55) COLLATE utf8_polish_ci NOT NULL,
  `haslo` char(55) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klient`
--

INSERT INTO `klient` (`IdKlienta`, `Nazwa_firmy`, `Miasto`, `Ulica`, `Kod_pocztowy`, `mail`, `Telefon`, `NIP`, `login`, `haslo`) VALUES
(1, 'Elektro-Sklep', 'Warszawa', 'Miejska 12', '00-254', 'elektrosklep@sklep.pl', 800200900, 1591231559, 'Elektro-Sklep', '111'),
(2, 'Swiatlo Lumen', 'Olsztyn', 'Prosta 184', '74-887', 'swiatlolumen@swiatlo-lumen.pl', 963852741, 1234567889, 'Swiatlo-Lumen', '222'),
(3, 'Prad-Elektryka', 'Gdynia', 'Nowowiejska 25', '54-888', 'pradelektryka@gmail.com', 852741963, 1471591231, 'Prad-Elektryka', '333');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reklamacja`
--

CREATE TABLE `reklamacja` (
  `IdReklamacja` int(11) NOT NULL,
  `IdZamowienia` int(11) NOT NULL,
  `data_reklamacji` date NOT NULL,
  `opis_wady` char(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `towar`
--

CREATE TABLE `towar` (
  `idTowaru` int(11) NOT NULL,
  `Nazwa_towaru` char(255) COLLATE utf8_polish_ci NOT NULL,
  `Symbol_towaru` char(255) COLLATE utf8_polish_ci NOT NULL,
  `Producent` char(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `towar`
--

INSERT INTO `towar` (`idTowaru`, `Nazwa_towaru`, `Symbol_towaru`, `Producent`) VALUES
(1, 'Zasilacz Hermetyczny 60W 12V IP67', 'IP-60-12', 'MojeLedyChiny'),
(2, 'Zasilacz Standard 50W 12V', 'PR-50-12', 'MojeLedyChiny'),
(3, 'Swietlowka Liniowa 36W 4000K', '3684T', 'Dura Lamp'),
(4, 'Statecznik Elektroniczny BCS 2x36W', '10077591', 'B.A.G.'),
(5, 'Oprawka Ceramiczna GU10 + przewod', 'GU10-15', 'Polskie Oswietlenie'),
(6, 'Profil MICRO-Alu 1M ANODA MLECZNA', 'MICRO-ALU-1M-ML-A', 'KLUŚDESIGN'),
(7, 'Tasma LED PREMIUM 60LED/M RGB', 'E007-050-8-RGB', 'MojeLedyChiny'),
(8, 'Zarowka LED 10W E27 3000K', 'PR10-e27-WW', 'MojeLedyChiny'),
(9, 'Zarowka LED GU10 4W 4000K', 'PR4-GU10-SMD2835-NW', 'MojeLedyChiny'),
(10, 'Naswietlacz LED 100W 4000K', 'PRN-100W-4000K-CZ', 'World PIR Lamps');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `towarwzamowieniu`
--

CREATE TABLE `towarwzamowieniu` (
  `IdTowarwzamowieniu` int(11) NOT NULL,
  `IdZamowienia` int(11) NOT NULL,
  `IdTowaru` int(11) NOT NULL,
  `Ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `towarwzamowieniu`
--

INSERT INTO `towarwzamowieniu` (`IdTowarwzamowieniu`, `IdZamowienia`, `IdTowaru`, `Ilosc`) VALUES
(1, 1, 2, 15),
(2, 1, 2, 15),
(3, 1, 5, 3),
(4, 1, 3, 1),
(5, 2, 1, 10),
(6, 2, 3, 3),
(7, 3, 7, 7),
(8, 3, 8, 2),
(9, 4, 2, 2),
(10, 5, 9, 23),
(11, 5, 7, 150),
(12, 6, 6, 6),
(13, 7, 2, 134),
(14, 7, 2, 15),
(15, 8, 5, 22),
(16, 8, 6, 23),
(17, 9, 1, 153),
(18, 9, 4, 15);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `IdZamowienia` int(11) NOT NULL,
  `IdKlienta` int(11) NOT NULL,
  `data_zamowienia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`IdZamowienia`, `IdKlienta`, `data_zamowienia`) VALUES
(1, 1, '2015-03-10'),
(2, 2, '2014-12-15'),
(3, 3, '2016-01-08'),
(4, 1, '2015-03-15'),
(5, 2, '2015-08-17'),
(6, 3, '2015-04-02'),
(7, 1, '2015-05-05'),
(8, 2, '2014-12-30'),
(9, 3, '2015-07-05');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`IdKlienta`);

--
-- Indexes for table `reklamacja`
--
ALTER TABLE `reklamacja`
  ADD PRIMARY KEY (`IdReklamacja`);

--
-- Indexes for table `towar`
--
ALTER TABLE `towar`
  ADD PRIMARY KEY (`idTowaru`);

--
-- Indexes for table `towarwzamowieniu`
--
ALTER TABLE `towarwzamowieniu`
  ADD PRIMARY KEY (`IdTowarwzamowieniu`);

--
-- Indexes for table `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`IdZamowienia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `klient`
--
ALTER TABLE `klient`
  MODIFY `IdKlienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `reklamacja`
--
ALTER TABLE `reklamacja`
  MODIFY `IdReklamacja` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `towar`
--
ALTER TABLE `towar`
  MODIFY `idTowaru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT dla tabeli `towarwzamowieniu`
--
ALTER TABLE `towarwzamowieniu`
  MODIFY `IdTowarwzamowieniu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `IdZamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

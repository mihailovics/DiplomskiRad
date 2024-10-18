-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 09:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kozmetika`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikl`
--

CREATE TABLE `artikl` (
  `sifra` int(30) NOT NULL,
  `naziv` varchar(100) NOT NULL,
  `kolicina` int(30) NOT NULL,
  `kategorija` int(30) NOT NULL,
  `proizvodjac` varchar(30) NOT NULL,
  `slika` varchar(99) DEFAULT NULL,
  `datum` date NOT NULL,
  `cena` decimal(10,0) NOT NULL,
  `opis` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikl`
--

INSERT INTO `artikl` (`sifra`, `naziv`, `kolicina`, `kategorija`, `proizvodjac`, `slika`, `datum`, `cena`, `opis`) VALUES
(1, 'Nourish Facial Oil 30ml – Hranljivo ulje za lice', 0, 1, 'John Masters Organics', 'img/proizvodi/jsm.jpg', '2024-01-23', 1900, 'Ulje sadrži obilje organskih sastojaka koji daju koži izuzetnu hidrataciju, čine je mekanom i glatkom i daju joj svež izgled. U svom sastavu ima voćna i cvetna ulja bogata antioksidansima. Zahvaljujući ulju nara, suncokreta, masline i noćurka ulje će učiniti hidriranom i veoma suvu kožu.'),
(2, 'Vitamin C Anti-Aging Face Serum 30ml – Serum za smanjenje pojave bora i pega', 84, 2, 'John Masters Organics', 'img/proizvodi/jsm2.jpg', '2023-03-28', 2750, 'Ovo je moćan serum sa kakadu šljivom, najbogatijim izvorom vitamina C na svetu. Nezaobilazan deo svakodnevne rutine protiv starenja kože, prepun je sastojaka koji posvetljuju kožu dajući joj prirodnu blistavost. Ovaj lagani dnevni serum umanjuje vidljivost tamnih fleka i bora. Sadrži ekstrakt kakadu šljive koji posvetljuje i ujednačava ten. Štiti kožu od slobodnih radikala koji izazivaju njeno prerano starenje.'),
(3, 'Kérastase Elixir Ultime – kupka za kosu 250ml', 89, 3, 'Kérastase', 'img/proizvodi/kerastase.webp', '2023-12-20', 3650, 'Kérastase Elixir Ultime kupka je kupka za beživotnu kosu kojoj je potreban sjaj. Formula obogaćena uljem marule čini kosu sjajnijom, mekšom i svilenkastom na dodir. Intenzivno čisti skalp i kosu od nečistoća. Kupka ostavlja nežan mirisni trag blagih cvetnih nota. Kosa je blistavog sjaja i pripremljena je za dalju negu.\r\n\r\n '),
(4, 'Schwarzkopf Professional BC Scalp Genesis Activating Densifying pena 150ml', 91, 3, 'Schwarzkopf Professional', 'img/proizvodi/8398-schwarzkopf-professional-bc-scalp.webp', '2023-12-20', 1751, 'BC Scalp Genesis je od Schwarzkopf Professional-a prvi holistički pristup za detoksikaciju skalpa koji trenutno uravnotežuje zdravlje kože glave i osigurava kvalitetan rast buduće kose!\r\n\r\n1. Na koži glave: Formula pojačana vitaminima odmah vraća ravnotežu skalpa kože i obnavlja zaštitne barijere , ciljajući specifične neravnoteže kože skalpa.\r\n\r\n2. Unutar kože glave: StemCode kompleks pomaže u održavanju zdrave kose formiranjem zaštitnog štita oko korena i same dlake, osiguravajući izvor budućeg rasta kose.\r\n\r\n \r\n\r\nBC Scalp Genesis Activating Densifying pena sa StemCode kompleksom i Biotinom bez otežavanja pruža kosi 30% više volumena! Stvara osećaj gušće kose, dok kosa postaje do 5x otpornija na lomljenje! Korišćenjem ove pene osiguravate optimalni kvalitet kose!'),
(5, 'Acca Kappa AiryNo. 1 Brush – 100 Nylon Bristles – Četka za najosetljivije kose', 39, 3, 'Acca Kappa ', 'img/proizvodi/acca-kappa-cetka.webp', '2023-12-19', 3990, 'Acca Kappa Airy antistatička četka sa drškom od karbona i najlonskim vlaknima.\r\n\r\nZa sve tipove kose, čak i najosetljivije. Dizajn, lakoća i fleksibilnost u službi savršenog stilizovanja kose za muškarce i žene. Idealna za ravnomerno rasporedjivanje proizvoda za negu kose, čak i pod tušem. Lako se pere.\r\n\r\n \r\n\r\nKLJUČNE KARAKTERISTIKE:\r\n\r\nfleksibilno pomeranje sva tri dela\r\nanatomska drška od karbonskih vlakana\r\nnajlonska vlakna otporna na toplotu');

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `IDKategorije` int(10) NOT NULL,
  `Naziv` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`IDKategorije`, `Naziv`) VALUES
(1, 'Nega lica'),
(2, 'Nega tela'),
(3, 'Kosa');

-- --------------------------------------------------------

--
-- Table structure for table `kategorija_usluge`
--

CREATE TABLE `kategorija_usluge` (
  `id_katUsluge` int(11) NOT NULL,
  `Naziv` varchar(30) NOT NULL,
  `slika` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategorija_usluge`
--

INSERT INTO `kategorija_usluge` (`id_katUsluge`, `Naziv`, `slika`) VALUES
(1, 'Masaže', 'img/usluge/kategorije/masage.jpg\r\n'),
(2, 'Šišanje', 'img/usluge/kategorije/sisanje.jpg'),
(3, 'Tretman lica', 'img/usluge/kategorije/tretman-lica.webp\r\n'),
(4, 'Tretman tela', 'img/usluge/kategorije/tretman-tela.png'),
(5, 'Epilacija', 'img/usluge/kategorije/epilacija.jpg'),
(6, 'Manikir i pedikir', 'img/usluge/kategorije/manikir.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `ID` int(30) NOT NULL,
  `Ime` varchar(30) NOT NULL,
  `Prezime` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Lozinka` varchar(255) NOT NULL,
  `Adresa` varchar(30) NOT NULL,
  `Telefon` varchar(30) NOT NULL,
  `Rola` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`ID`, `Ime`, `Prezime`, `Email`, `Lozinka`, `Adresa`, `Telefon`, `Rola`) VALUES
(1, 'Stevan', 'Mihailovic', 'mihailovic023@gmail.com', '$2y$10$xQ5.3hJ64sulFqGS0oq24.6zZk2oAVINXuGfH6YaT5Wq/DVjcID/y', 'Duborovacka 42, Zrenjanin', '0677777707', 3),
(2, 'Vukasin', 'Markovic', 'markovic@gmail.com', '$2y$10$98Q/tuztreGrJuUgCy8WqOceXPPP3MpGUGT4btkBQOUc4./87oTn6', 'Cara Lazara 4, Beograd', '065340341', 1),
(3, 'Marko', 'Stanisic', 'manager@gmail.com', '$2y$10$fXGYT5bYiN2cnJd/coa1wuCwGtTvR7U9Y.tTci2aJe3WVzmnrcHDC', 'Cara Dusana 12, Beograd', '065653265', 2);

-- --------------------------------------------------------

--
-- Table structure for table `narudzbenica`
--

CREATE TABLE `narudzbenica` (
  `id_narudzbenica` int(30) NOT NULL,
  `vreme` datetime NOT NULL,
  `korisnik_id` int(30) DEFAULT NULL,
  `ukupna_cena` float NOT NULL,
  `adresa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `narudzbenica`
--

INSERT INTO `narudzbenica` (`id_narudzbenica`, `vreme`, `korisnik_id`, `ukupna_cena`, `adresa`) VALUES
(1, '2024-01-06 17:03:15', 1, 15960, 'Duborovacka 42, Zrenjanin'),
(2, '2024-01-06 19:39:30', 2, 27005, 'Cara Lazara 4, Beograd'),
(3, '2024-01-06 21:06:00', NULL, 2750, 'Temerinska 13, Novi Sad\r\n'),
(4, '2024-03-02 17:36:05', 2, 14720, 'Cara Lazara 4, Beograd'),
(5, '2024-03-07 19:19:23', 1, 11000, 'Duborovacka 42, Zrenjanin'),
(6, '2024-03-24 17:27:31', 1, 26960, 'Duborovacka 42, Zrenjanin'),
(7, '2024-04-09 22:13:46', NULL, 2750, 'Kej 2. Oktobra 21, Beograd'),
(8, '2024-04-09 22:23:06', 3, 2750, 'Cara Dusana 12, Beograd'),
(9, '2024-04-09 22:24:36', 3, 10950, 'Cara Dusana 12, Beograd'),
(10, '2024-04-09 22:36:18', 3, 10654, 'Cara Dusana 12, Beograd'),
(11, '2024-04-09 22:38:49', NULL, 3990, 'Makedonska 21, Beograd'),
(12, '2024-04-09 22:42:04', 1, 7980, 'Duborovacka 42, Zrenjanin');

-- --------------------------------------------------------

--
-- Table structure for table `radnik`
--

CREATE TABLE `radnik` (
  `id_radnik` int(30) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `JMBG` bigint(13) NOT NULL,
  `broj_telefona` varchar(30) NOT NULL,
  `usluga` int(30) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `radnik`
--

INSERT INTO `radnik` (`id_radnik`, `ime`, `prezime`, `JMBG`, `broj_telefona`, `usluga`, `email`) VALUES
(1, 'Ana', 'Markovic', 26080003411003, '+381656968333', 1, 'anovica@gmail.com'),
(2, 'Marko', 'Markovic', 210319913913, '1234', 1, 'anovicsa@gmail.com'),
(3, 'Jovana', 'Topic', 27010015131112, '0606891908', 3, 'vannajoklek@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacije`
--

CREATE TABLE `rezervacije` (
  `id_rezervacije` int(30) NOT NULL,
  `id_usluge` int(30) NOT NULL,
  `id_radnika` int(30) NOT NULL,
  `id_korisnik` int(30) NOT NULL,
  `datum` date NOT NULL,
  `vreme` time NOT NULL,
  `cena` float NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rezervacije`
--

INSERT INTO `rezervacije` (`id_rezervacije`, `id_usluge`, `id_radnika`, `id_korisnik`, `datum`, `vreme`, `cena`, `created`) VALUES
(1, 1, 1, 2, '2024-01-16', '16:00:00', 3650, '2024-01-15 21:20:54'),
(2, 1, 1, 2, '2024-01-17', '13:00:00', 3650, '2024-01-16 15:10:23'),
(3, 1, 1, 2, '2024-01-18', '15:00:00', 3650, '2024-01-17 14:39:56'),
(5, 3, 1, 1, '2024-03-04', '10:00:00', 4210, '2024-03-02 18:43:42'),
(7, 1, 2, 1, '2024-03-14', '10:00:00', 3650, '2024-03-07 18:20:12'),
(8, 1, 2, 1, '2024-03-24', '09:00:00', 3650, '2024-03-23 13:52:54'),
(9, 1, 2, 1, '2024-03-26', '09:00:00', 3650, '2024-03-24 16:20:24');

-- --------------------------------------------------------

--
-- Table structure for table `rola`
--

CREATE TABLE `rola` (
  `IDRola` int(11) NOT NULL,
  `Naziv` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rola`
--

INSERT INTO `rola` (`IDRola`, `Naziv`) VALUES
(1, 'Korisnik'),
(2, 'Moderator'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `stavka_narudzbenice`
--

CREATE TABLE `stavka_narudzbenice` (
  `id_stavka` int(30) NOT NULL,
  `artikl_id` int(30) NOT NULL,
  `kolicina` int(30) NOT NULL,
  `narudzbenica_id` int(30) NOT NULL,
  `cena` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stavka_narudzbenice`
--

INSERT INTO `stavka_narudzbenice` (`id_stavka`, `artikl_id`, `kolicina`, `narudzbenica_id`, `cena`) VALUES
(1, 5, 4, 1, 15960),
(2, 3, 5, 2, 18250),
(3, 4, 5, 2, 8755),
(4, 2, 1, 3, 2750),
(5, 2, 1, 4, 2750),
(6, 5, 3, 4, 11970),
(7, 2, 4, 5, 11000),
(8, 2, 4, 6, 11000),
(9, 5, 4, 6, 15960),
(10, 2, 1, 7, 2750),
(11, 2, 1, 8, 2750),
(12, 3, 3, 9, 10950),
(13, 3, 1, 10, 3650),
(14, 4, 4, 10, 7004),
(16, 5, 1, 11, 3990),
(17, 5, 2, 12, 7980);

--
-- Triggers `stavka_narudzbenice`
--
DELIMITER $$
CREATE TRIGGER `triggKupio` AFTER INSERT ON `stavka_narudzbenice` FOR EACH ROW UPDATE artikl
SET kolicina = kolicina - NEW.kolicina
WHERE sifra = NEW.artikl_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `usluge`
--

CREATE TABLE `usluge` (
  `id_usluge` int(30) NOT NULL,
  `naziv` varchar(30) NOT NULL,
  `cena` double NOT NULL,
  `kategorija_usluge` int(30) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usluge`
--

INSERT INTO `usluge` (`id_usluge`, `naziv`, `cena`, `kategorija_usluge`, `img`) VALUES
(1, 'Relaks masaza', 3650, 1, 'img/usluge/relax-masaza.webp\r\n'),
(2, 'Masaža bambusom', 5200, 1, 'img/usluge/masage-bamboo.webp'),
(3, 'Sportska masaža', 4210, 1, 'img/usluge/sport-masage.jpg\r\n'),
(4, 'Muško šišanje', 1900, 2, 'img/usluge/ay.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikl`
--
ALTER TABLE `artikl`
  ADD PRIMARY KEY (`sifra`),
  ADD KEY `kategorija` (`kategorija`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`IDKategorije`);

--
-- Indexes for table `kategorija_usluge`
--
ALTER TABLE `kategorija_usluge`
  ADD PRIMARY KEY (`id_katUsluge`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Rola` (`Rola`);

--
-- Indexes for table `narudzbenica`
--
ALTER TABLE `narudzbenica`
  ADD PRIMARY KEY (`id_narudzbenica`),
  ADD KEY `korisnik_id` (`korisnik_id`);

--
-- Indexes for table `radnik`
--
ALTER TABLE `radnik`
  ADD PRIMARY KEY (`id_radnik`),
  ADD KEY `kategorija_usluge` (`usluga`);

--
-- Indexes for table `rezervacije`
--
ALTER TABLE `rezervacije`
  ADD PRIMARY KEY (`id_rezervacije`),
  ADD KEY `id_usluge` (`id_usluge`,`id_radnika`,`id_korisnik`),
  ADD KEY `id_korisnik` (`id_korisnik`),
  ADD KEY `id_radnika` (`id_radnika`);

--
-- Indexes for table `rola`
--
ALTER TABLE `rola`
  ADD PRIMARY KEY (`IDRola`);

--
-- Indexes for table `stavka_narudzbenice`
--
ALTER TABLE `stavka_narudzbenice`
  ADD PRIMARY KEY (`id_stavka`),
  ADD KEY `artikl_id` (`artikl_id`),
  ADD KEY `narudzbenica_id` (`narudzbenica_id`);

--
-- Indexes for table `usluge`
--
ALTER TABLE `usluge`
  ADD PRIMARY KEY (`id_usluge`),
  ADD KEY `kategorija_usluge` (`kategorija_usluge`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `IDKategorije` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategorija_usluge`
--
ALTER TABLE `kategorija_usluge`
  MODIFY `id_katUsluge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `narudzbenica`
--
ALTER TABLE `narudzbenica`
  MODIFY `id_narudzbenica` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `radnik`
--
ALTER TABLE `radnik`
  MODIFY `id_radnik` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rezervacije`
--
ALTER TABLE `rezervacije`
  MODIFY `id_rezervacije` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stavka_narudzbenice`
--
ALTER TABLE `stavka_narudzbenice`
  MODIFY `id_stavka` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `usluge`
--
ALTER TABLE `usluge`
  MODIFY `id_usluge` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikl`
--
ALTER TABLE `artikl`
  ADD CONSTRAINT `artikl_ibfk_1` FOREIGN KEY (`kategorija`) REFERENCES `kategorija` (`IDKategorije`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`Rola`) REFERENCES `rola` (`IDRola`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `narudzbenica`
--
ALTER TABLE `narudzbenica`
  ADD CONSTRAINT `narudzbenica_ibfk_1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `radnik`
--
ALTER TABLE `radnik`
  ADD CONSTRAINT `radnik_ibfk_1` FOREIGN KEY (`usluga`) REFERENCES `kategorija_usluge` (`id_katUsluge`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rezervacije`
--
ALTER TABLE `rezervacije`
  ADD CONSTRAINT `rezervacije_ibfk_1` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnik` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rezervacije_ibfk_2` FOREIGN KEY (`id_radnika`) REFERENCES `radnik` (`id_radnik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rezervacije_ibfk_3` FOREIGN KEY (`id_usluge`) REFERENCES `usluge` (`id_usluge`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stavka_narudzbenice`
--
ALTER TABLE `stavka_narudzbenice`
  ADD CONSTRAINT `stavka_narudzbenice_ibfk_1` FOREIGN KEY (`artikl_id`) REFERENCES `artikl` (`sifra`),
  ADD CONSTRAINT `stavka_narudzbenice_ibfk_2` FOREIGN KEY (`narudzbenica_id`) REFERENCES `narudzbenica` (`id_narudzbenica`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usluge`
--
ALTER TABLE `usluge`
  ADD CONSTRAINT `usluge_ibfk_1` FOREIGN KEY (`kategorija_usluge`) REFERENCES `kategorija_usluge` (`id_katUsluge`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

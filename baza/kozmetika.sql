-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 06:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
  `kategorija` varchar(30) NOT NULL,
  `proizvodjac` varchar(30) NOT NULL,
  `slika` varchar(30) DEFAULT NULL,
  `datum` date NOT NULL,
  `cena` decimal(10,0) NOT NULL,
  `opis` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikl`
--

INSERT INTO `artikl` (`sifra`, `naziv`, `kolicina`, `kategorija`, `proizvodjac`, `slika`, `datum`, `cena`, `opis`) VALUES
(1, 'Nourish Facial Oil 29ml – Hranljivo ulje za lice\r\n', 100, 'nega lica', 'John Masters Organics', 'img/proizvodi/jsm.jpg', '2023-03-28', '3900', 'Ulje sadrži obilje organskih sastojaka koji daju koži izuzetnu hidrataciju, čine je mekanom i glatkom i daju joj svež izgled. U svom sastavu ima voćna i cvetna ulja bogata antioksidansima. Zahvaljujući ulju nara, suncokreta, masline i noćurka ulje će učiniti hidriranom i veoma suvu kožu.'),
(2, 'Vitamin C Anti-Aging Face Serum 30ml – Serum za smanjenje pojave bora i pega', 100, 'nega lica', 'John Masters Organics', 'img/proizvodi/jsm2.jpg', '2023-03-28', '2750', 'Ovo je moćan serum sa kakadu šljivom, najbogatijim izvorom vitamina C na svetu. Nezaobilazan deo svakodnevne rutine protiv starenja kože, prepun je sastojaka koji posvetljuju kožu dajući joj prirodnu blistavost. Ovaj lagani dnevni serum umanjuje vidljivost tamnih fleka i bora. Sadrži ekstrakt kakadu šljive koji posvetljuje i ujednačava ten. Štiti kožu od slobodnih radikala koji izazivaju njeno prerano starenje.');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `ID` int(30) NOT NULL,
  `Ime` varchar(30) NOT NULL,
  `Prezime` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Lozinka` varchar(30) NOT NULL,
  `Adresa` varchar(30) NOT NULL,
  `Telefon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikl`
--
ALTER TABLE `artikl`
  ADD PRIMARY KEY (`sifra`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

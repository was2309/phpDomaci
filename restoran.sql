-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2022 at 12:17 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `recenzije`
--

CREATE TABLE `recenzije` (
  `recenzija_id` int(11) NOT NULL,
  `restoran_grupa` varchar(60) NOT NULL,
  `restoran_opis` text NOT NULL,
  `restoran_cena` varchar(60) NOT NULL,
  `restoran_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recenzije`
--

INSERT INTO `recenzije` (`recenzija_id`, `restoran_grupa`, `restoran_opis`, `restoran_cena`, `restoran_id`) VALUES
(1, 'Italijanska kuhinja', '\'<p style=\\\'text-align: justify;\\\'>Nekoliko meseci već odlažem da vam predstavim pivnicu <strong>Žirafa 23 na Novom Beogradu</strong>. Pre svega – <strong>zbog nekih prilično kompleksnih sistema nostalgija, koje smo razvili mi koji smo odrasli u njenoj blizini</strong>. Naime, na mestu ove, danas popularne pivnice, decenijama se nalazila kafana Gril Odmor. U njoj su mnogi roditelji nas lokalaca proslavili svoje venčanje i za mnoge od nas je to bila prva kafana u koju smo ušli u svojim malim novobeogradskim životima.&nbsp;Nekoliko godina&nbsp;kasnije je u našem kraju osvanuo i luksuzni italijanski restoran i jedna od prvih picerija u gradu – HB, kog takođe više nema, ali je njegov famozni enterijer ostao zabeležen u mnogim filmovima i serijama sa kraja osamdesetih i početka devedesetih… Tako je nama ostala duboko u intimnoj memoriji&nbsp;kafana Odmor: u kojoj smo pili svoje prve kafe i u kojoj smo se okupljali subotom prepodne na razmeni blokovskih novosti. <strong>Zbog toga ćete razumeti skepsu s kojom smo podozrivo dočekali otvaranje novog, stranog objekta na istom mestu.</strong></p>\'', '10', 1),
(2, 'Kineska kuhinja', '\'<p style=\\\"text-align: justify;\\\">U odabiru destinacije za putovanje hrana na mojoj listi ZA i PROTIV zauzima visoko mesto. Ipak, kako je Kuba već godinama na mom spisku želja, na put sam krenula pomalo danteovski – <strong>˝ostavite svu nadu (da ćete dobro jesti), vi koji ulazite˝</strong>. Svi prijatelji koji su prethodno bili na Kubi su imali sličan opis – <strong>hrana je užasna, a alkohol je jeftin.&nbsp;</strong>Na našu&nbsp;veliku sreću, prvo se ispostavilo kao apsolutno netačno, a drugo kao apsolutno tačno.</p>\'', '20', 3);

-- --------------------------------------------------------

--
-- Table structure for table `restorani`
--

CREATE TABLE `restorani` (
  `restoran_id` int(11) NOT NULL,
  `restoran_naziv` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restorani`
--

INSERT INTO `restorani` (`restoran_id`, `restoran_naziv`) VALUES
(1, 'Majstor i Margarita'),
(2, 'Chez Nik'),
(3, 'Stari hrast'),
(4, 'Lipov lad'),
(5, 'Bela reka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recenzije`
--
ALTER TABLE `recenzije`
  ADD PRIMARY KEY (`recenzija_id`),
  ADD KEY `restoran_id` (`restoran_id`);

--
-- Indexes for table `restorani`
--
ALTER TABLE `restorani`
  ADD PRIMARY KEY (`restoran_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recenzije`
--
ALTER TABLE `recenzije`
  MODIFY `recenzija_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `restorani`
--
ALTER TABLE `restorani`
  MODIFY `restoran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recenzije`
--
ALTER TABLE `recenzije`
  ADD CONSTRAINT `recenzije_ibfk_1` FOREIGN KEY (`restoran_id`) REFERENCES `restorani` (`restoran_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

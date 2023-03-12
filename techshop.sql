-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 09:24 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `email` varchar(255) NOT NULL,
  `produkti_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `email` varchar(255) NOT NULL,
  `produkti_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`email`, `produkti_id`) VALUES
('filanfisteku@gmail.com', 6),
('filanfisteku@gmail.com', 7),
('filanfisteku@gmail.com', 9);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `produkti_id` int(11) NOT NULL,
  `image_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`produkti_id`, `image_url`) VALUES
(2, 'IMG-63b452d63ac854.31794829.png'),
(3, 'IMG-63b45282930f64.46687156.png'),
(4, 'IMG-63b44a91000747.83412153.png'),
(5, 'IMG-63b451e3a8c098.33948391.png'),
(6, 'IMG-63b45230c08475.35201859.png'),
(7, 'IMG-63b453944afe76.43294918.png'),
(8, 'IMG-63b45557c9cb28.53508104.png'),
(9, 'IMG-63b4542966ff40.37277799.png'),
(10, 'IMG-63b454e942f2e8.35340341.png'),
(29, 'IMG-63b44f0be571b5.32874292.jpg'),
(30, 'IMG-63b46837ced928.22662155.png'),
(39, 'IMG-640e2ef264bf76.28301046.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategoria`
--

CREATE TABLE `kategoria` (
  `kategoria_id` int(11) NOT NULL,
  `emri_kategorise` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoria`
--

INSERT INTO `kategoria` (`kategoria_id`, `emri_kategorise`) VALUES
(1, 'Electronics'),
(2, 'IT Shop'),
(3, 'Smart Home'),
(4, 'Lifestyle'),
(5, 'Accessories'),
(6, 'Offers'),
(7, 'New');

-- --------------------------------------------------------

--
-- Table structure for table `perdoruesi`
--

CREATE TABLE `perdoruesi` (
  `email` varchar(255) NOT NULL,
  `emri` varchar(255) DEFAULT NULL,
  `mbiemri` varchar(255) DEFAULT NULL,
  `datalindjes` date DEFAULT NULL,
  `telefoni` varchar(255) DEFAULT NULL,
  `adresa` varchar(255) DEFAULT NULL,
  `roli` bit(1) DEFAULT b'0',
  `passwordi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perdoruesi`
--

INSERT INTO `perdoruesi` (`email`, `emri`, `mbiemri`, `datalindjes`, `telefoni`, `adresa`, `roli`, `passwordi`) VALUES
('arti_shabani@outlook.com', 'arti', 'shabani', '0000-00-00', '044692432', 'nazim budrika', b'0', '12345678'),
('betimgashi@gmail.com', 'betim', 'gashi', '0000-00-00', '044444444', 'prishtine', b'0', '12345678'),
('edonramadani@gmail.com', 'edon', 'ramadani', '0000-00-00', '012930123', 'gjioan', b'0', '12345678'),
('elinashabani@gmail.com', 'Elina', 'Shabani', '2009-04-08', '044211122', 'Gjilan, Ramiz Cerrnica', b'0', '12345678'),
('fatmir_shabani@atrium-ks.com', 'Fatmir', 'Shabani', '0000-00-00', '044505137', 'ramiz cerrnica', b'0', '12345678'),
('filanfisteku@gmail.com', 'filan', 'fisteku', '1963-01-20', '045444222', 'gjilan', b'0', '12345678'),
('leartshabani77@gmail.com', 'Leart', 'Shabani', '2003-01-28', '045359900', 'Gjilan, Ramiz Cerrnica', b'1', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `porosia`
--

CREATE TABLE `porosia` (
  `email` varchar(255) NOT NULL,
  `produkti_id` int(11) NOT NULL,
  `dataeporosise` date DEFAULT NULL,
  `shumapageses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `porosia`
--

INSERT INTO `porosia` (`email`, `produkti_id`, `dataeporosise`, `shumapageses`) VALUES
('arti_shabani@outlook.com', 5, '2023-01-01', 499),
('arti_shabani@outlook.com', 7, '2022-12-31', 3299),
('filanfisteku@gmail.com', 4, '2023-03-12', 499);

-- --------------------------------------------------------

--
-- Table structure for table `produkti`
--

CREATE TABLE `produkti` (
  `produkti_id` int(11) NOT NULL,
  `emri` varchar(255) DEFAULT NULL,
  `prodhuesi` varchar(255) DEFAULT NULL,
  `vitiprodhimit` int(11) DEFAULT NULL,
  `cmimi` int(11) DEFAULT NULL,
  `pershkrimi` varchar(255) DEFAULT NULL,
  `kategoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produkti`
--

INSERT INTO `produkti` (`produkti_id`, `emri`, `prodhuesi`, `vitiprodhimit`, `cmimi`, `pershkrimi`, `kategoria_id`) VALUES
(2, ' UMAX U-Band P1 PRO, Silver', 'Umax', 2019, 87, 'UMAX U-Band P1 PRO, Silver', 5),
(3, ' SPC Gear LIX Plus Wireless, Black', 'SPC Gear', 2022, 90, 'SPC Gear LIX Plus Wireless, Black', 2),
(4, 'SAMSUNG UE50AU8072UXXH, 50', 'Samsung', 2018, 498, 'SAMSUNG UE50AU8072UXXH, 50', 1),
(5, 'Çantë shpine Lenovo 1B210 për laptop 15.6', 'Lenovo', 2021, 19, 'Çantë shpine Lenovo 1B210 për laptop 15.6', 1),
(6, 'EPOS GSP 302 Headphones, Black', 'EPOS', 2022, 165, 'EPOS GSP 302 Headphones, Black', 5),
(7, 'Celular Honor 70, 6.7', 'Honor', 2020, 568, 'Celular Honor 70, 6.7', 1),
(8, 'Monitor Samsung LS24A400VEUXEN, 24', 'Samsung', 2022, 271, 'Monitor Samsung LS24A400VEUXEN, 24', 5),
(9, 'Karikues Samsung EP-TA12 për Samsung micro USB, i zi', 'Samsung', 2017, 14, 'Karikues Samsung EP-TA12 për Samsung micro USB, i zi', 2),
(10, 'Altoparlant JBL CLIP 4, i kaltër i hapur', 'JBL', 2019, 69, 'Altoparlant JBL CLIP 4, i kaltër i hapur', 2),
(29, 'Disk SSD GIGABYTE, M.2 - 256GB', 'SanDisk', 2021, 33, 'Disk SSD GIGABYTE, M.2 - 256GB', 2),
(30, 'USB Kingston DataTraveler Exodia - 64GB, i zi / kaltër', 'Kingston', 2018, 11, 'USB Kingston DataTraveler Exodia - 64GB, i zi / kaltër', 5),
(35, 'Çantë shpine Lenovo 1B210 për laptop 15.6\", gri', 'Lenovo', 2021, 29, 'Çantë shpine Lenovo 1B210 për laptop 15.6\", gri', 3),
(36, 'Çantë shpine Lenovo 1B210 për laptop 15.6\", gri', 'Philips ', 2021, 29, 'Çantë shpine Lenovo 1B210 për laptop 15.6\", gri', 1),
(39, 'Apple MacBook Pro 14\"', 'Apple', 2021, 2199, 'Apple MacBook Pro 14\"', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`email`,`produkti_id`),
  ADD KEY `produkti_id` (`produkti_id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`email`,`produkti_id`),
  ADD KEY `produkti_id` (`produkti_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`produkti_id`);

--
-- Indexes for table `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`kategoria_id`);

--
-- Indexes for table `perdoruesi`
--
ALTER TABLE `perdoruesi`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `porosia`
--
ALTER TABLE `porosia`
  ADD PRIMARY KEY (`email`,`produkti_id`),
  ADD KEY `produkti_id` (`produkti_id`);

--
-- Indexes for table `produkti`
--
ALTER TABLE `produkti`
  ADD PRIMARY KEY (`produkti_id`),
  ADD KEY `kategoria_id` (`kategoria_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `kategoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produkti`
--
ALTER TABLE `produkti`
  MODIFY `produkti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`email`) REFERENCES `perdoruesi` (`email`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`produkti_id`) REFERENCES `produkti` (`produkti_id`);

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`email`) REFERENCES `perdoruesi` (`email`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`produkti_id`) REFERENCES `produkti` (`produkti_id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`produkti_id`) REFERENCES `produkti` (`produkti_id`);

--
-- Constraints for table `porosia`
--
ALTER TABLE `porosia`
  ADD CONSTRAINT `porosia_ibfk_1` FOREIGN KEY (`email`) REFERENCES `perdoruesi` (`email`),
  ADD CONSTRAINT `porosia_ibfk_2` FOREIGN KEY (`produkti_id`) REFERENCES `produkti` (`produkti_id`);

--
-- Constraints for table `produkti`
--
ALTER TABLE `produkti`
  ADD CONSTRAINT `produkti_ibfk_1` FOREIGN KEY (`kategoria_id`) REFERENCES `kategoria` (`kategoria_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

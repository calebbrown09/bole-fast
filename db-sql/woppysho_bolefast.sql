-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 24, 2021 at 04:06 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `woppysho_bolefast`
--

-- --------------------------------------------------------

--
-- Table structure for table `boletines`
--

CREATE TABLE `boletines` (
  `id` int(11) NOT NULL,
  `num_cedula` varchar(100) NOT NULL,
  `boletin` mediumblob NOT NULL,
  `trimestre` int(11) NOT NULL,
  `colegio` varchar(1000) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  `fecha_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boletines`
--

INSERT INTO `boletines` (`id`, `num_cedula`, `boletin`, `trimestre`, `colegio`, `activo`, `fecha_add`) VALUES
(1, '3-748-953', 0x2e2e2f646f63756d656e74732f437572736f2064652046756e64616d656e746f7320646520504850202e706466, 1, 'Benigno Jimenez Garay', 1, '2020-12-18 06:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `rol_user`
--

CREATE TABLE `rol_user` (
  `id` int(11) NOT NULL,
  `rol_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rol_user`
--

INSERT INTO `rol_user` (`id`, `rol_user`) VALUES
(1, 'Estudiante'),
(2, 'Administrativo');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_completo` text NOT NULL,
  `num_cedula` text NOT NULL,
  `password` text NOT NULL,
  `colegio` varchar(200) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_completo`, `num_cedula`, `password`, `colegio`, `id_rol`, `fecha_creacion`) VALUES
(1, 'Caleb Brown', '3-748-953', 'c4dc95bd81b9a82e6639707e27b4b26c', 'Benigno Jimenez Garay', 1, '2020-11-19 04:22:59'),
(2, 'Luis Ayarza', '3-751-1365', 'a84eecf8097dceb73756c1ab1a8943c8', 'Benigno Jimenez Garay', 1, '2020-11-19 04:25:41'),
(3, 'Brenes Leonel Racero ', '3-756-414', '078720486141dbef3b3a01b3da7f58cc', 'Benigno Jimenez Garay', 1, '2020-11-19 04:34:50'),
(4, 'Aziel Flores ', '3-749-1758', '44d0fe09e56e55d5842815b7c5828673', 'Benigno Jimenez Garay', 1, '2020-11-19 07:17:08'),
(5, 'Eddukate', '3-000-000', 'e3d666d8eeda0f27798256e2b8ab4e15\r\n', 'Benigno Jimenez Garay', 2, '2020-11-24 20:57:27'),
(6, 'BoleFast', '3-000-0000', 'e3d666d8eeda0f27798256e2b8ab4e15', 'Benigno Jimenez Garay', 2, '2020-11-24 20:59:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boletines`
--
ALTER TABLE `boletines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rol_user`
--
ALTER TABLE `rol_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boletines`
--
ALTER TABLE `boletines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rol_user`
--
ALTER TABLE `rol_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

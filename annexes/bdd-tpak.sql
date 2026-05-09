-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: base_mysql:3306
-- Generation Time: May 02, 2026 at 01:53 PM
-- Server version: 9.6.0
-- PHP Version: 8.3.30

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdd-tpak`
--

DROP DATABASE IF EXISTS `bdd-tpak`;
CREATE DATABASE IF NOT EXISTS `bdd-tpak` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bdd-tpak`;

-- Create admin
DROP USER IF EXISTS 'DB_USERNAME'@'%';
CREATE USER IF NOT EXISTS 'DB_USERNAME'@'%' IDENTIFIED BY 'DB_PASSWORD';
GRANT ALL PRIVILEGES ON `bdd-tpak`.* TO 'DB_USERNAME'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;
-- --------------------------------------------------------

--
-- Table structure for table `agences`
--

DROP TABLE IF EXISTS `agences`;
CREATE TABLE `agences` (
  `ID_AGENCE` int NOT NULL,
  `ville_agence` varchar(150) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grpUsers`
--

DROP TABLE IF EXISTS `grpUsers`;
CREATE TABLE `grpUsers` (
  `ID_GRPUSERS` int NOT NULL,
  `ID_USER` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trajets`
--

DROP TABLE IF EXISTS `trajets`;
CREATE TABLE `trajets` (
  `ID_TRAJET` int NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `nb_users` int NOT NULL DEFAULT '1',
  `nb_max_users` int NOT NULL DEFAULT '1',
  `ID_DESTINATION` int NOT NULL,
  `ID_DEPART` int NOT NULL,
  `ID_USER` int NOT NULL,
  `ID_GRPUSERS` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `ID_USER` int NOT NULL,
  `nom_user` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom_user` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tel` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `is_admin` BOOL NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agences`
--
ALTER TABLE `agences`
  ADD PRIMARY KEY (`ID_AGENCE`),
  ADD UNIQUE KEY `ville_agence` (`ville_agence`);

--
-- Indexes for table `grpUsers`
--
ALTER TABLE `grpUsers`
  ADD PRIMARY KEY (`ID_GRPUSERS`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `trajets`
--
ALTER TABLE `trajets`
  ADD PRIMARY KEY (`ID_TRAJET`),
  ADD KEY `ID_DESTINATION` (`ID_DESTINATION`),
  ADD KEY `ID_DEPART` (`ID_DEPART`),
  ADD KEY `ID_USER` (`ID_USER`),
  ADD KEY `ID_GRPUSERS` (`ID_GRPUSERS`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_USER`),
  ADD UNIQUE KEY (`mail`),
  ADD UNIQUE KEY (`tel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agences`
--
ALTER TABLE `agences`
  MODIFY `ID_AGENCE` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `grpUsers`
--
ALTER TABLE `grpUsers`
  MODIFY `ID_GRPUSERS` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trajets`
--
ALTER TABLE `trajets`
  MODIFY `ID_TRAJET` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID_USER` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grpUsers`
--
ALTER TABLE `grpUsers`
  ADD CONSTRAINT `grpUsers_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`ID_USER`);

--
-- Constraints for table `trajets`
--
ALTER TABLE `trajets`
  ADD CONSTRAINT `trajets_ibfk_1` FOREIGN KEY (`ID_DESTINATION`) REFERENCES `agences` (`ID_AGENCE`),
  ADD CONSTRAINT `trajets_ibfk_2` FOREIGN KEY (`ID_DEPART`) REFERENCES `agences` (`ID_AGENCE`),
  ADD CONSTRAINT `trajets_ibfk_3` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`ID_USER`),
  ADD CONSTRAINT `trajets_ibfk_4` FOREIGN KEY (`ID_GRPUSERS`) REFERENCES `grpUsers` (`ID_GRPUSERS`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

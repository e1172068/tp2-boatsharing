-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 15 juil. 2022 à 22:50
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tp2-boatsharing`
--

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`id`, `first_name`, `last_name`, `email`, `phone`) VALUES
(2, 'Mathieuu', 'StOnge', 'aaa@ccc.ca', '514-555-1104'),
(6, 'Xavier', 'Laliberté', 'youpi@cm.com', '333-333-3333'),
(13, 'Marcos', 'Sanches', 'ccc@ccc.com', '555-555-5555');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `crew_size` smallint(6) DEFAULT NULL,
  `sailboat_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reservation_sailboat1_idx` (`sailboat_id`),
  KEY `fk_reservation_member1_idx` (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `start`, `end`, `crew_size`, `sailboat_id`, `member_id`) VALUES
(5, '2022-07-28 00:00:00', '2022-07-18 00:00:00', 4, 9, 6),
(6, '2022-07-12 00:00:00', '2022-07-27 00:00:00', NULL, 15, 2),
(7, '2022-07-28 00:00:00', '2022-07-18 00:00:00', 2, 9, 6),
(8, '2022-07-28 00:00:00', '2022-07-18 00:00:00', 2, 9, 6);

-- --------------------------------------------------------

--
-- Structure de la table `sailboat`
--

DROP TABLE IF EXISTS `sailboat`;
CREATE TABLE IF NOT EXISTS `sailboat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `sailboat_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sailboat_sailboat_type1_idx` (`sailboat_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sailboat`
--

INSERT INTO `sailboat` (`id`, `name`, `sailboat_type_id`) VALUES
(7, 'Holdfast', 2),
(9, 'Gran Blan', 1),
(15, 'aaaaa', 3),
(18, 'Aleau', 3),
(19, 'Seayou', 1);

-- --------------------------------------------------------

--
-- Structure de la table `sailboat_type`
--

DROP TABLE IF EXISTS `sailboat_type`;
CREATE TABLE IF NOT EXISTS `sailboat_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `min_crew_size` smallint(6) DEFAULT NULL,
  `length` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sailboat_type`
--

INSERT INTO `sailboat_type` (`id`, `name`, `min_crew_size`, `length`) VALUES
(1, 'Shark', 2, 24),
(2, 'Tanzer', 2, 22),
(3, 'Niagara', 3, 26);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_reservation_member1` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservation_sailboat1` FOREIGN KEY (`sailboat_id`) REFERENCES `sailboat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `sailboat`
--
ALTER TABLE `sailboat`
  ADD CONSTRAINT `fk_sailboat_sailboat_type1` FOREIGN KEY (`sailboat_type_id`) REFERENCES `sailboat_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 05 juin 2022 à 14:03
-- Version du serveur :  5.7.24
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gadget`
--

-- --------------------------------------------------------

--
-- Structure de la table `badge`
--

CREATE TABLE `badge` (
  `ID` int(11) NOT NULL,
  `Badge1` tinyint(1) NOT NULL,
  `Badge2` tinyint(1) NOT NULL,
  `Badge3` tinyint(1) NOT NULL,
  `Badge4` tinyint(1) NOT NULL,
  `Badge5` tinyint(1) NOT NULL,
  `Badge6` tinyint(1) NOT NULL,
  `Badge7` tinyint(1) NOT NULL,
  `Badge8` tinyint(1) NOT NULL,
  `Badge9` tinyint(1) NOT NULL,
  `Badge10` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `badge`
--

INSERT INTO `badge` (`ID`, `Badge1`, `Badge2`, `Badge3`, `Badge4`, `Badge5`, `Badge6`, `Badge7`, `Badge8`, `Badge9`, `Badge10`) VALUES
(1, 0, 0, 1, 0, 0, 0, 1, 1, 0, 0),
(2, 0, 0, 0, 0, 1, 1, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `clone`
--

CREATE TABLE `clone` (
  `Ligne` varchar(512) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `grilles`
--

CREATE TABLE `grilles` (
  `Ligne` varchar(256) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `grilles`
--

INSERT INTO `grilles` (`Ligne`, `ID`) VALUES
('a:8:{i:0;i:2;i:1;i:1;i:2;i:1;i:3;i:2;i:4;i:1;i:5;i:2;i:6;i:1;i:7;i:2;}', 1),
('a:8:{i:0;i:1;i:1;i:2;i:2;i:1;i:3;i:2;i:4;i:1;i:5;i:2;i:6;i:1;i:7;i:2;}', 2),
('a:8:{i:0;i:1;i:1;i:2;i:2;i:2;i:3;i:1;i:4;i:2;i:5;i:1;i:6;i:2;i:7;i:1;}', 3),
('a:8:{i:0;i:2;i:1;i:1;i:2;i:2;i:3;i:1;i:4;i:2;i:5;i:1;i:6;i:1;i:7;i:2;}', 4),
('a:8:{i:0;i:1;i:1;i:2;i:2;i:1;i:3;i:2;i:4;i:1;i:5;i:2;i:6;i:2;i:7;i:1;}', 5),
('a:8:{i:0;i:2;i:1;i:2;i:2;i:1;i:3;i:1;i:4;i:2;i:5;i:1;i:6;i:2;i:7;i:1;}', 6),
('a:8:{i:0;i:1;i:1;i:1;i:2;i:2;i:3;i:1;i:4;i:2;i:5;i:2;i:6;i:1;i:7;i:2;}', 7),
('a:8:{i:0;i:2;i:1;i:1;i:2;i:2;i:3;i:2;i:4;i:1;i:5;i:1;i:6;i:2;i:7;i:1;}', 8);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `ID` int(11) NOT NULL,
  `login` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `Score` int(11) NOT NULL,
  `Indice` int(11) NOT NULL,
  `Moula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID`, `login`, `password`, `Score`, `Indice`, `Moula`) VALUES
(1, 'raph', '177d41b0ba61150811f48651f1033e19569b4cd0a8646eb9afb8b6f1cb50fdd2', 0, 5, 1000),
(2, 'test', 'bde25a9204400a92e31f180904001d50e5038a0c3ebab4c1dc7c3aa2a692b8b5', 0, 16, 890),
(3, 'rafoufou', '695d45103bff6472099a7d5ef87ee44160278c15b6dacea2c3cb86e5df05da61', 0, 5, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `badge`
--
ALTER TABLE `badge`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `grilles`
--
ALTER TABLE `grilles`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `badge`
--
ALTER TABLE `badge`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

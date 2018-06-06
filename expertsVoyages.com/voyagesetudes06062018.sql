-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 06 Juin 2018 à 14:43
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `voyagesetudes`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

DROP TABLE IF EXISTS `billets`;
CREATE TABLE `billets` (
  `id` int(11) NOT NULL,
  `civiliteB` varchar(30) NOT NULL,
  `prenomB` varchar(50) NOT NULL,
  `nomB` varchar(50) NOT NULL,
  `villeDepartB` varchar(50) NOT NULL,
  `villeArriveB` varchar(50) NOT NULL,
  `dateB` date NOT NULL,
  `telB` int(11) NOT NULL,
  `emailB` varchar(50) NOT NULL,
  `entretienB` varchar(30) NOT NULL,
  `messageB` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `billets`
--

INSERT INTO `billets` (`id`, `civiliteB`, `prenomB`, `nomB`, `villeDepartB`, `villeArriveB`, `dateB`, `telB`, `emailB`, `entretienB`, `messageB`) VALUES
(1, '1', 'Thierno Mamadou', 'Diallo', 'Conakry', 'Conakry', '2018-02-07', 101, 'omdousmane@gmail.com', '1', 'lrf'),
(2, '1', 'Thierno', 'Soumah', 'Villetaneuse', 'Villetaneuse', '2018-01-02', 101, 'saidsoumah@gmail.com', '2', 'lrf'),
(3, '1', 'Ousmane', 'Diallo', 'Fria', 'Fria', '2018-02-01', 101, 'omdousmane@gmail.com', '1', 'gm'),
(4, '1', 'Ousmane', 'Diallo', 'Fria', 'Fria', '2018-02-01', 101, 'omdousmane@gmail.com', '1', 'gm'),
(5, '1', 'Thierno', 'Soumah', 'Villetaneuse', 'Villetaneuse', '2018-02-08', 101, 'saidsoumah@gmail.com', '1', 'ùdmf'),
(6, '1', 'Thierno', 'Soumah', 'Villetaneuse', 'Villetaneuse', '2018-02-08', 101, 'saidsoumah@gmail.com', '1', 'ùdmf'),
(7, '1', 'Thierno', 'Soumah', 'Villetaneuse', 'Villetaneuse', '2018-02-08', 101, 'saidsoumah@gmail.com', '1', 'ùdmf'),
(8, '1', 'Thierno', 'Soumah', 'Villetaneuse', 'Villetaneuse', '2018-02-08', 101, 'saidsoumah@gmail.com', '1', 'ùdmf'),
(9, '1', 'Thierno', 'Soumah', 'Villetaneuse', 'Villetaneuse', '2018-02-08', 101, 'saidsoumah@gmail.com', '1', 'ùdmf'),
(10, '1', 'kfg', 'kd', 'kd', 'kdk', '2017-01-02', 0, 'drk@gls.cop', '1', 'rmtl'),
(11, '1', 'kfg', 'kd', 'kd', 'kdk', '2017-01-02', 0, 'drk@gls.cop', '1', 'rmtl');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nomPrenom` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `messageContact` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `nomPrenom`, `email`, `messageContact`) VALUES
(1, 'Thierno Saïdou Soumah', 'saidsoumah@gmail.com', 'Bonjour'),
(2, 'Thierno Saïdou Soumah', 'saidsoumah@gmail.com', '                      \r\n                    flfl'),
(3, 'Thierno Saïdou Soumah', 'saidsoumah@gmail.com', '                      \r\n                    flfl'),
(4, 'Thierno Saïdou Soumah', 'saidsoumah@gmail.com', '                      \r\n                    flfl');

-- --------------------------------------------------------

--
-- Structure de la table `preinscription`
--

DROP TABLE IF EXISTS `preinscription`;
CREATE TABLE `preinscription` (
  `id` int(11) NOT NULL,
  `civiliteInscript` varchar(25) NOT NULL,
  `prenomInscript` varchar(100) NOT NULL,
  `nomInscript` varchar(50) NOT NULL,
  `dateInscript` date NOT NULL,
  `adresseInscript` varchar(255) NOT NULL,
  `telInscript` int(11) NOT NULL,
  `emailInscript` varchar(50) NOT NULL,
  `formationInscript` varchar(255) NOT NULL,
  `niveauInscript` varchar(50) NOT NULL,
  `destinationInscript` varchar(50) NOT NULL,
  `entretienInscript` varchar(50) NOT NULL,
  `messageInscript` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `preinscription`
--

INSERT INTO `preinscription` (`id`, `civiliteInscript`, `prenomInscript`, `nomInscript`, `dateInscript`, `adresseInscript`, `telInscript`, `emailInscript`, `formationInscript`, `niveauInscript`, `destinationInscript`, `entretienInscript`, `messageInscript`) VALUES
(1, 'sai', 'oui', 'nn', '2016-01-02', 'qoui alors', 10203, 'said@gmail.co', 'azer', '1 ere', 'ofof', 'lfflf', 'flfl'),
(2, '1', 'Thierno Mamadou', 'Diallo', '2018-02-28', '5 rue de temple', 10203, 'saidsoumah@gmail.com', 'Informatique', '2', '1', '1', 'nn'),
(4, '1', 'flm', 'flf', '2015-12-31', '4 rue Pablo Neruda', 10203, 'saidsoumah@gmail.com', 'Informatique', '2', '2', '2', 'mrrm'),
(5, '1', 'sas', 'sas', '2018-12-30', '5 rue de temple', 10203, 'toubaSandaga@gmail.com', 'Informatique', '5', '3', '2', 'Merci');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `billets`
--
ALTER TABLE `billets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `preinscription`
--
ALTER TABLE `preinscription`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `billets`
--
ALTER TABLE `billets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `preinscription`
--
ALTER TABLE `preinscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

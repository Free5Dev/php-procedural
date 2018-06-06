-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 06 Juin 2018 à 14:46
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `superette`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `IDARTICLE` int(11) NOT NULL,
  `CODECATE` char(9) CHARACTER SET utf8mb4 NOT NULL,
  `ARTICLE` varchar(35) DEFAULT NULL,
  `PRIXUT` int(11) DEFAULT NULL,
  `STOCK` int(11) DEFAULT '1000',
  `RUPTURE` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`IDARTICLE`, `CODECATE`, `ARTICLE`, `PRIXUT`, `STOCK`, `RUPTURE`) VALUES
(1, 'sup001', 'ail', 50, 1000, 0),
(2, 'sup001', 'ananas', 50, 200, 1),
(3, 'sup001', 'asperges', 50, 900, 0),
(4, 'sup001', 'avocat', 50, 100, 1),
(5, 'sup001', 'bananes', 50, 1000, 0),
(6, 'sup001', 'betteraves', 50, 1000, 0),
(7, 'sup001', 'bleuets', 50, 1000, 0),
(8, 'sup001', 'brocoli', 50, 1000, 0),
(9, 'sup001', 'cantaloup', 50, 1000, 0),
(10, 'sup001', 'carottes', 50, 1000, 0),
(11, 'sup001', 'celeri', 50, 1000, 0),
(12, 'sup001', 'champignons', 50, 1000, 0),
(13, 'sup001', 'chou', 50, 1000, 0),
(14, 'sup001', 'chou-fleur', 50, 1000, 0),
(15, 'sup001', 'citrons', 50, 1000, 0),
(16, 'sup001', 'concombre', 50, 1000, 0),
(17, 'sup001', 'courge', 50, 1000, 0),
(18, 'sup001', 'courgette', 50, 1000, 0),
(19, 'sup001', 'epinards', 50, 1000, 0),
(20, 'sup001', 'fraises', 50, 1000, 0),
(21, 'sup001', 'framboises', 50, 1000, 0),
(22, 'sup001', 'kiwis', 50, 1000, 0),
(23, 'sup001', 'laitue', 50, 1000, 0),
(24, 'sup001', 'mais', 50, 1000, 0),
(25, 'sup001', 'mangue', 50, 1000, 0),
(26, 'sup001', 'melon miel', 50, 1000, 0),
(27, 'sup001', 'meslun', 50, 1000, 0),
(28, 'sup001', 'navet', 50, 1000, 0),
(29, 'sup001', 'oignons verts', 50, 1000, 0),
(30, 'sup001', 'oranges', 50, 1000, 0),
(31, 'sup001', 'pamplemousse', 50, 1000, 0),
(32, 'sup001', 'patate douce', 50, 1000, 0),
(33, 'sup001', 'peches', 50, 1000, 0),
(34, 'sup001', 'poireau', 50, 1000, 0),
(35, 'sup001', 'pois ', 50, 1000, 0),
(36, 'sup001', 'poivrons', 50, 1000, 0),
(37, 'sup001', 'pommes ', 50, 1000, 0),
(38, 'sup001', 'pommes de terre', 50, 1000, 0),
(39, 'sup001', 'radis ', 50, 1000, 0),
(40, 'sup001', 'raisins', 50, 1000, 0),
(41, 'sup001', 'tomates', 50, 1000, 0),
(42, 'sup002', 'canneberges  ', 100, 1000, 0),
(43, 'sup002', 'cassonade', 100, 1000, 0),
(44, 'sup002', 'concentre boeuf ', 100, 1000, 0),
(45, 'sup002', 'concentre poulet', 100, 1000, 0),
(46, 'sup002', 'dattes sechees ', 100, 1000, 0),
(47, 'sup002', 'epices ', 100, 1000, 0),
(48, 'sup002', 'farine ', 100, 1000, 0),
(49, 'sup002', 'fines herbes ', 100, 1000, 0),
(50, 'sup002', 'noix ', 100, 1000, 0),
(51, 'sup002', 'nourriture bebe', 100, 1000, 0),
(52, 'sup002', 'pates alimentaires ', 100, 1000, 0),
(53, 'sup002', 'raisins secs', 100, 1000, 0),
(54, 'sup002', 'riz ', 100, 1000, 0),
(55, 'sup002', 'sucre', 100, 1000, 0),
(56, 'sup003', 'creme de tomates ', 200, 1000, 0),
(57, 'sup003', 'fruits ', 200, 1000, 0),
(58, 'sup003', 'jus de tomate ', 200, 1000, 0),
(59, 'sup003', 'legumes ', 200, 1000, 0),
(60, 'sup003', 'nourriture bebe', 200, 1000, 0),
(61, 'sup003', 'tomates entieres', 200, 1000, 0),
(62, 'sup004', 'bagels ', 150, 1000, 0),
(63, 'sup004', 'barres tendres', 150, 1000, 0),
(64, 'sup004', 'biscuits sales', 150, 1000, 0),
(65, 'sup004', 'biscuits sucres', 150, 1000, 0),
(66, 'sup004', 'cereales a dejeuner', 150, 1000, 0),
(67, 'sup004', 'cereales bebe', 150, 1000, 0),
(68, 'sup004', 'croissants', 150, 1000, 0),
(69, 'sup004', 'gruau', 150, 1000, 0),
(70, 'sup004', 'muffins', 150, 1000, 0),
(71, 'sup004', 'pain tranche', 150, 1000, 0),
(72, 'sup004', 'pains hamburger', 150, 1000, 0),
(73, 'sup004', 'pains hot-dog', 150, 1000, 0),
(74, 'sup004', 'pains pita', 150, 1000, 0),
(75, 'sup004', 'pates a pizza', 150, 1000, 0),
(76, 'sup004', 'tortillas', 150, 1000, 0),
(77, 'sup005', 'cafe', 50, 1000, 0),
(78, 'sup005', 'eau', 50, 1000, 0),
(79, 'sup005', 'jus de fruits', 50, 1000, 0),
(80, 'sup005', 'the', 50, 1000, 0),
(81, 'sup005', 'tisane', 50, 1000, 0),
(82, 'sup006', 'beurre d arachides ', 250, 1000, 0),
(83, 'sup006', 'boeuf', 250, 1000, 0),
(84, 'sup006', 'charcuteries ', 250, 1000, 0),
(85, 'sup006', 'jambon', 250, 1000, 0),
(86, 'sup006', 'legumineuses ', 100, 1000, 0),
(87, 'sup006', 'oeufs', 100, 1000, 0),
(89, 'sup006', 'poissons', 250, 1000, 0),
(90, 'sup006', 'porc', 250, 1000, 0),
(91, 'sup006', 'poulet', 2500, 1000, 0),
(92, 'sup006', 'tofu', 250, 1000, 0),
(93, 'sup006', 'veau', 250, 1000, 0),
(94, 'sup006', 'viandes vege', 250, 1000, 0),
(95, 'sup007', 'beurre', 50, 1000, 0),
(96, 'sup007', 'romage a tartiner', 50, 1000, 0),
(97, 'sup007', 'cheddar', 50, 1000, 0),
(98, 'sup007', 'cottage', 50, 1000, 0),
(99, 'sup007', 'mozzarella ', 50, 1000, 0),
(100, 'sup007', 'fromage tranche', 50, 1000, 0),
(101, 'sup007', 'lait', 100, 1000, 0),
(102, 'sup007', 'margarine', 50, 1000, 0),
(103, 'sup007', 'yogourt', 1500, 1000, 0),
(104, 'sup007', 'yogourts individuels', 250, 1000, 0),
(105, 'sup008', 'friandises glacees', 250, 1000, 0),
(106, 'sup008', 'fruits', 150, 1000, 0),
(107, 'sup008', 'jus de fruits ', 150, 1000, 0),
(108, 'sup008', 'legumes', 150, 1000, 0),
(109, 'sup009', 'bonbons', 3500, 1000, 0),
(110, 'sup008', 'ornichons', 1500, 1000, 0),
(111, 'sup009', 'croustilles', 2000, 1000, 0),
(112, 'sup009', 'gomme a macher', 2500, 1000, 0),
(113, 'sup009', 'guimauves', 100, 1000, 0),
(114, 'sup009', 'huile vegetale', 1500, 1000, 0),
(115, 'sup009', 'ketchup', 2000, 1000, 0),
(116, 'sup009', 'liqueurs', 500, 1000, 0),
(117, 'sup009', 'mayonnaise', 500, 1000, 0),
(118, 'sup009', 'miel', 200, 1000, 0),
(119, 'sup009', 'moutarde', 200, 1000, 0),
(120, 'sup009', 'olives', 250, 1000, 0),
(121, 'sup009', 'relish', 300, 1000, 0),
(122, 'sup009', 'vinaigre', 500, 1000, 0),
(123, 'sup009', 'vinaigrettes', 500, 1000, 0),
(124, 'sup010', 'couches', 800, 1000, 0),
(125, 'sup010', 'lames de rasoir', 100, 1000, 0),
(126, 'sup010', 'moules a muffins', 250, 1000, 0),
(127, 'sup010', 'mousse a raser', 700, 1000, 0),
(128, 'sup010', 'papier d aluminium', 1500, 1000, 0),
(129, 'sup010', 'papier de toilette', 2000, 1000, 0),
(130, 'sup010', 'papier essuie-tout', 1000, 1000, 0),
(131, 'sup010', 'papiers mouchoirs', 750, 1000, 0),
(132, 'sup010', 'pate a dents ', 100, 1000, 0),
(133, 'sup010', 'pellicule plastique', 50, 1000, 0),
(134, 'sup010', 'produits bebe', 1500, 1000, 0),
(135, 'sup010', 'produits nettoyants', 3000, 1000, 0),
(136, 'sup010', 'sacs de congelation', 500, 1000, 0),
(137, 'sup010', 'sacs pour collation', 500, 1000, 0),
(138, 'sup010', 'savon a laver', 150, 1000, 0),
(139, 'sup010', 'savon a mains', 175, 1000, 0),
(140, 'sup010', 'savon a vaisselle', 150, 1000, 0),
(141, 'sup010', 'serviettes hygieniques', 200, 1000, 0),
(142, 'sup010', 'shampoing ', 1000, 1000, 0),
(143, 'sup010', 'tampons a recurer', 200, 1000, 0);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE `categorie` (
  `CODECATE` char(9) CHARACTER SET utf8mb4 NOT NULL,
  `CATEGORIE` varchar(35) CHARACTER SET utf8mb4 DEFAULT NULL,
  `DESCRIPTION` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`CODECATE`, `CATEGORIE`, `DESCRIPTION`) VALUES
('rtf56', 'cocc', 'dldldld ');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `IDCLIENT` int(11) NOT NULL,
  `NOMCLIENT` varchar(255) DEFAULT NULL,
  `ADRESSECLIENT` varchar(255) DEFAULT NULL,
  `TEL` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`IDCLIENT`, `NOMCLIENT`, `ADRESSECLIENT`, `TEL`) VALUES
(1, 'saidou soumah', 'Paris', '774521302'),
(2, 'dk', '56 rue jean', '622');

-- --------------------------------------------------------

--
-- Structure de la table `clientweb`
--

DROP TABLE IF EXISTS `clientweb`;
CREATE TABLE `clientweb` (
  `id` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `ipadress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `clientweb`
--

INSERT INTO `clientweb` (`id`, `prenom`, `nom`, `email`, `pass`, `ipadress`) VALUES
(5, 'mamadou morlaye', 'camara', 'camaralayemamadou@yahoo.fr', '1478596', '::1');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE `commande` (
  `IDCOMMANDE` int(11) NOT NULL,
  `IDCLIENT` int(11) DEFAULT NULL,
  `IDARTICLE` int(11) DEFAULT NULL,
  `DATECOMMANDE` date DEFAULT NULL,
  `QTECOMMANDE` int(11) DEFAULT NULL,
  `PRIXPAYE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`IDCOMMANDE`, `IDCLIENT`, `IDARTICLE`, `DATECOMMANDE`, `QTECOMMANDE`, `PRIXPAYE`) VALUES
(1, 1, 2, '2015-09-17', 500, 25000),
(2, 1, 3, '2015-09-17', 100, 5000),
(3, 1, 4, '2015-09-17', 200, 10000),
(4, 1, 2, '2015-09-18', 300, 15000),
(5, 1, 4, '2015-09-18', 700, 35000);

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

DROP TABLE IF EXISTS `demande`;
CREATE TABLE `demande` (
  `IDDEMANDE` int(11) NOT NULL,
  `IDFOURNISSEUR` int(11) DEFAULT NULL,
  `IDARTICLE` int(11) DEFAULT NULL,
  `DATEDEMANDE` date DEFAULT NULL,
  `QTEDEMANDE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE `fournisseur` (
  `IDFOURNISSEUR` int(11) NOT NULL,
  `SOCIETE` varchar(35) DEFAULT NULL,
  `ADRESSE` varchar(255) DEFAULT NULL,
  `CODEPOSTAL` varchar(15) DEFAULT NULL,
  `TELEPHONE` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `fournisseur`
--

INSERT INTO `fournisseur` (`IDFOURNISSEUR`, `SOCIETE`, `ADRESSE`, `CODEPOSTAL`, `TELEPHONE`) VALUES
(2, 'atac', 'dakar', '92000', '0022222');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `IDUSER` int(11) NOT NULL,
  `NOMUSER` varchar(35) DEFAULT NULL,
  `PRENOMUSER` varchar(35) DEFAULT NULL,
  `LOGINUSER` varchar(35) DEFAULT NULL,
  `PASSWORDUSER` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`IDUSER`, `NOMUSER`, `PRENOMUSER`, `LOGINUSER`, `PASSWORDUSER`) VALUES
(1, 'camara', 'morlaye', 'tucson', 'tucson');

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE `vendeur` (
  `IDVENDRE` int(11) NOT NULL,
  `IDUSER` int(11) DEFAULT NULL,
  `IDARTICLE` int(11) DEFAULT NULL,
  `QTEVENDRE` int(11) DEFAULT NULL,
  `DATEVENDRE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`IDARTICLE`),
  ADD KEY `FK_CONTIENT` (`CODECATE`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`CODECATE`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`IDCLIENT`);

--
-- Index pour la table `clientweb`
--
ALTER TABLE `clientweb`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`IDCOMMANDE`),
  ADD KEY `FK_COMMANDER` (`IDCLIENT`),
  ADD KEY `FK_ETRECOMMADER` (`IDARTICLE`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`IDDEMANDE`),
  ADD KEY `FK_DONNER` (`IDFOURNISSEUR`),
  ADD KEY `FK_ETREDEMANDER` (`IDARTICLE`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`IDFOURNISSEUR`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IDUSER`);

--
-- Index pour la table `vendeur`
--
ALTER TABLE `vendeur`
  ADD PRIMARY KEY (`IDVENDRE`),
  ADD KEY `FK_ACHETER` (`IDARTICLE`),
  ADD KEY `FK_VENDRE` (`IDUSER`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `clientweb`
--
ALTER TABLE `clientweb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_ETRECOMMADER` FOREIGN KEY (`IDARTICLE`) REFERENCES `article` (`IDARTICLE`),
  ADD CONSTRAINT `fk_commande` FOREIGN KEY (`IDCLIENT`) REFERENCES `client` (`IDCLIENT`);

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `FK_DONNER` FOREIGN KEY (`IDFOURNISSEUR`) REFERENCES `fournisseur` (`IDFOURNISSEUR`),
  ADD CONSTRAINT `FK_ETREDEMANDER` FOREIGN KEY (`IDARTICLE`) REFERENCES `article` (`IDARTICLE`);

--
-- Contraintes pour la table `vendeur`
--
ALTER TABLE `vendeur`
  ADD CONSTRAINT `FK_ACHETER` FOREIGN KEY (`IDARTICLE`) REFERENCES `article` (`IDARTICLE`),
  ADD CONSTRAINT `FK_VENDRE` FOREIGN KEY (`IDUSER`) REFERENCES `users` (`IDUSER`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

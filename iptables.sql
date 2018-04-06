-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 06 Avril 2018 à 15:32
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `iptables`
--

-- --------------------------------------------------------

--
-- Structure de la table `alias`
--

CREATE TABLE `alias` (
  `idAlias` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ip` varchar(18) NOT NULL,
  `port` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `alias`
--

INSERT INTO `alias` (`idAlias`, `name`, `ip`, `port`) VALUES
(3, 'monAlias', '10.0.0.5', 80),
(4, 'monAlias2', '10.0.0.5', 80);

-- --------------------------------------------------------

--
-- Structure de la table `firewall`
--

CREATE TABLE `firewall` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `ip_src` varchar(18) NOT NULL,
  `port_src` int(10) NOT NULL,
  `ip_dest` varchar(18) NOT NULL,
  `port_dest` int(10) NOT NULL,
  `state` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `nat`
--

CREATE TABLE `nat` (
  `id` int(10) NOT NULL,
  `id_alias` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ip` varchar(18) NOT NULL,
  `port` int(10) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `nat`
--

INSERT INTO `nat` (`id`, `id_alias`, `name`, `ip`, `port`, `type`) VALUES
(12, 3, 'monAlias', '10.0.0.5', 80, 'Source NAT'),
(13, 4, 'monAlias2', '10.5.5.2', 80, 'Destination NAT');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `alias`
--
ALTER TABLE `alias`
  ADD PRIMARY KEY (`idAlias`);

--
-- Index pour la table `firewall`
--
ALTER TABLE `firewall`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `nat`
--
ALTER TABLE `nat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alias` (`id_alias`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `alias`
--
ALTER TABLE `alias`
  MODIFY `idAlias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `firewall`
--
ALTER TABLE `firewall`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `nat`
--
ALTER TABLE `nat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `nat`
--
ALTER TABLE `nat`
  ADD CONSTRAINT `fk_id_alias` FOREIGN KEY (`id_alias`) REFERENCES `alias` (`idAlias`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

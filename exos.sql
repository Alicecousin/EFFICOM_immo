-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 29 Avril 2015 à 11:40
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `exos`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `pnom` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `pnom`, `age`) VALUES
(1, 'Bellut', 'Leslie', 29),
(2, 'Camus', 'Alix', 26),
(3, 'Chalon', 'Justine', 23),
(4, 'Cousin', 'Alice', 24),
(5, 'Delannoy', 'Gwenaelle', 25),
(6, 'Gauthier', 'Benoit', 23),
(7, 'Gauthier', 'Maeva', 22),
(8, 'Grenet', 'Solène', 22),
(9, 'Klaric', 'Julien', 24),
(10, 'Mariette', 'Amélie', 23),
(11, 'Merires', 'Sarah', 24),
(23, 'Hollande', 'Francois', 60),
(16, 'Gauthier54', 'Benoit87', 0),
(15, 'Enchanteur', 'Merlin', 0),
(17, 'Gauthier54', 'Benoit87', 0),
(24, 'Berthou', 'Serge', 60),
(27, 'Le pen', 'Marine', 50),
(26, 'Sarko', 'Nico', 58);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `montant` double NOT NULL,
  `date_achat` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `id_client`, `montant`, `date_achat`) VALUES
(1, 2, 90, '2015-02-01'),
(2, 2, 75, '2015-01-31'),
(3, 3, 42.3, '2014-12-10'),
(4, 3, 23.75, '2015-01-27'),
(5, 4, 9.99, '2015-02-03'),
(6, 5, 67.9, '2015-02-01'),
(7, 6, 45.9, '2015-02-20'),
(8, 7, 88.9, '2015-01-29'),
(9, 8, 19.9, '2015-02-01'),
(10, 8, 19.9, '2015-02-08'),
(11, 9, 75, '2014-11-10'),
(12, 10, 95.9, '2015-01-22'),
(13, 0, 10, '2015-02-05');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `pnom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `pnom`, `email`, `login`, `mdp`) VALUES
(1, 'Larrat222', 'Philippe2222', 'philippe.larrat@gmail.com2222', 'admin2222', 'admin22222'),
(2, 'Larrat', 'Philippe', 'philippe.larrat@gmail.com', 'admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 06 Décembre 2014 à 12:51
-- Version du serveur: 5.5.40-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `git-rank`
--

-- --------------------------------------------------------

--
-- Structure de la table `variables`
--

CREATE TABLE IF NOT EXISTS `variables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `coeff` double NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `variables`
--

INSERT INTO `variables` (`id`, `category`, `name`, `coeff`, `type`) VALUES
(1, 'Issues', 'number open', 0, 'issues_open'),
(2, 'Issues', 'number closed', 0, 'issues_closed'),
(3, 'Issues', 'ratio open/closed', 0.3, 'ratio'),
(4, 'Issues', 'days before last activity', 0, 'temporal'),
(5, 'Issues', 'days before 5th activity', 0.05, 'temporal'),
(6, 'Pull Requests', 'number open', 0, 'pr_open'),
(7, 'Pull Requests', 'number closed', 0, 'pr_closed'),
(8, 'Pull Requests', 'ratio open/closed', 0.3, 'ratio'),
(9, 'Pull Requests', 'days before last activity', 0, 'temporal'),
(10, 'Pull Requests', 'days before 5th activity', 0.05, 'temporal'),
(11, 'Commits', 'number', 0, 'commits'),
(12, 'Commits', 'days before last day with commit', 0, 'temporal'),
(13, 'Commits', 'days before 5th day with commit', 0.05, 'temporal'),
(14, 'Commits', 'any commit in the past 3 months (yes/no)', 0.1, 'yesno'),
(15, 'Others', 'contributors', 0.05, 'contributors'),
(16, 'Others', 'stars', 0, 'stars'),
(17, 'Others', 'fork', 0, 'fork'),
(18, 'Others', 'releases', 0, 'releases'),
(19, 'Others', 'days last release', 0, 'temporal');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

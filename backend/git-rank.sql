-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 08 Décembre 2014 à 03:44
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
-- Structure de la table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `variable_1` double NOT NULL,
  `variable_2` double NOT NULL,
  `variable_3` double NOT NULL,
  `variable_4` double NOT NULL,
  `variable_5` double NOT NULL,
  `variable_6` double NOT NULL,
  `variable_7` double NOT NULL,
  `variable_8` double NOT NULL,
  `variable_9` double NOT NULL,
  `variable_10` double NOT NULL,
  `variable_11` double NOT NULL,
  `variable_12` double NOT NULL,
  `variable_13` double NOT NULL,
  `variable_14` double NOT NULL,
  `variable_15` double NOT NULL,
  `variable_16` double NOT NULL,
  `variable_17` double NOT NULL,
  `variable_18` double NOT NULL,
  `variable_19` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Contenu de la table `project`
--

INSERT INTO `project` (`id`, `name`, `variable_1`, `variable_2`, `variable_3`, `variable_4`, `variable_5`, `variable_6`, `variable_7`, `variable_8`, `variable_9`, `variable_10`, `variable_11`, `variable_12`, `variable_13`, `variable_14`, `variable_15`, `variable_16`, `variable_17`, `variable_18`, `variable_19`) VALUES
(1, 'darul75/ng-slider', 8, 14, 0.5714285714, 7, 64, 0, 11, 0, 7, 103, 65, 4, 15, 1, 8, 40, 26, 4, 7),
(2, 'danielcrisp/angular-rangeslider', 2, 20, 0.1, 3, 3, 4, 10, 0.4, 59, 180, 64, 3, 159, 1, 9, 89, 50, 6, 3),
(3, 'egorkhmelev/jslider', 77, 9, 8.555555556, 63, 92, 10, 3, 3.333333333, 184, 479, 24, 644, 972, 0, 3, 501, 197, 0, 0),
(4, 'prajwalkman/angular-slider', 35, 8, 4.375, 35, 149, 16, 5, 3.2, 107, 302, 29, 94, 477, 0, 1, 215, 130, 5, 477),
(5, 'PopSugar/angular-slider', 1, 2, 0.5, 11, 0, 1, 2, 0.5, 11, 0, 41, 29, 220, 1, 4, 32, 130, 11, 82),
(6, 'Venturocket/angular-slider', 22, 38, 0.5789473684, 2, 12, 1, 14, 0.07142857143, 1, 64, 47, 64, 202, 1, 6, 164, 80, 13, 206),
(7, 'angular-ui/ui-slider', 16, 24, 0.6666666667, 1, 82, 8, 14, 0.5714285714, 3, 42, 31, 157, 373, 0, 8, 140, 109, 2, 157),
(8, 'seiyria/bootstrap-slider', 35, 141, 0.2482269504, 1, 7, 5, 68, 0.07352941176, 12, 23, 298, 1, 10, 1, 34, 465, 215, 24, 2),
(9, 'CreateJS/EaselJS', 25, 364, 0.06868131868, 3, 4, 5, 111, 0.04504504505, 11, 15, 980, 13, 18, 1, 26, 3778, 1006, 11, 331),
(10, 'mendhak/angular-intro.js', 14, 8, 1.75, 1, 37, 0, 12, 0, 1, 130, 69, 3, 122, 1, 10, 157, 30, 7, 3),
(11, 'usablica/intro.js', 79, 115, 0.6869565217, 0, 3, 54, 122, 0.4426229508, 0, 15, 307, 22, 43, 1, 43, 8216, 1076, 12, 22),
(12, 'angular/angular.js', 811, 4321, 0.1876880352, 0, 0, 370, 4463, 0.08290387632, 0, 0, 6044, 0, 4, 1, 1059, 31227, 12000, 113, 1),
(13, 'jashkenas/backbone', 21, 1905, 0.01102362205, 1, 2, 23, 1413, 0.01627742392, 0, 4, 2704, 5, 16, 1, 240, 19600, 4443, 21, 261),
(14, 'emberjs/ember.js', 118, 2670, 0.04419475655, 0, 1, 52, 3092, 0.01681759379, 0, 1, 7607, 1, 5, 1, 416, 11689, 2524, 93, 3),
(15, 'knockout/knockout', 280, 823, 0.340218712, 0, 1, 76, 424, 0.179245283, 2, 5, 1258, 0, 5, 1, 45, 5652, 934, 33, 88),
(16, 'tastejs/todomvc', 77, 302, 0.2549668874, 0, 2, 11, 671, 0.01639344262, 0, 2, 1997, 0, 5, 1, 199, 10581, 5359, 6, 1),
(17, 'spine/spine', 36, 242, 0.1487603306, 53, 87, 18, 265, 0.0679245283, 8, 65, 830, 20, 137, 1, 65, 2817, 358, 18, 136),
(18, 'Polymer/polymer', 177, 616, 0.2873376623, 0, 2, 3, 98, 0.0306122449, 4, 23, 1667, 2, 8, 1, 24, 6497, 526, 32, 37),
(19, 'mozbrick/brick', 25, 180, 0.1388888889, 10, 39, 1, 64, 0.015625, 25, 87, 683, 38, 87, 1, 18, 2628, 189, 20, 95),
(20, 'facebook/react', 312, 816, 0.3823529412, 0, 0, 95, 1264, 0.07515822785, 0, 0, 3103, 0, 4, 1, 237, 10771, 1442, 19, 11),
(21, 'sproutcore/sproutcore', 67, 607, 0.1103789127, 43, 105, 22, 597, 0.03685092127, 0, 32, 9267, 1, 30, 1, 121, 2075, 295, 64, 4),
(22, 'meteor/meteor', 241, 1990, 0.1211055276, 0, 0, 53, 759, 0.069828722, 0, 1, 11917, 0, 0, 1, 148, 20352, 2234, 460, 11),
(23, 'yahoo/mojito', 35, 347, 0.1008645533, 24, 129, 1, 1005, 0.0009950248756, 92, 135, 4034, 38, 116, 1, 35, 1575, 247, 63, 92),
(24, 'bitovi/canjs', 203, 540, 0.3759259259, 0, 1, 46, 530, 0.08679245283, 0, 1, 6102, 1, 5, 1, 95, 1048, 285, 36, 75),
(25, 'derbyjs/derby', 25, 351, 0.07122507123, 2, 52, 13, 78, 0.1666666667, 46, 107, 1529, 2, 80, 1, 19, 3494, 193, 88, 3),
(26, 'gka/chroma.js', 3, 21, 0.1428571429, 18, 61, 1, 10, 0.1, 18, 355, 194, 18, 161, 1, 5, 1258, 143, 11, 18),
(27, 'mbostock/d3', 145, 1076, 0.1347583643, 0, 2, 66, 813, 0.08118081181, 4, 8, 3279, 16, 25, 1, 81, 31332, 7510, 175, 22),
(28, 'benpickles/peity', 0, 27, 0, 19, 136, 1, 19, 0.05263157895, 17, 32, 269, 17, 23, 1, 6, 2664, 227, 27, 22),
(29, 'okfn/recline', 40, 302, 0.1324503311, 1, 12, 1, 111, 0.009009009009, 5, 44, 1299, 5, 44, 1, 41, 1463, 245, 6, 496),
(30, 'jacomyal/sigma.js', 103, 226, 0.4557522124, 1, 4, 8, 97, 0.0824742268, 7, 29, 613, 9, 31, 1, 32, 4116, 572, 4, 78),
(31, 'samizdatco/arbor', 44, 3, 14.66666667, 102, 305, 15, 3, 5, 102, 254, 12, 894, 1391, 0, 1, 1881, 450, 0, 0),
(32, 'HumbleSoftware/envisionjs', 15, 11, 1.363636364, 191, 369, 1, 1, 1, 806, 0, 569, 542, 860, 0, 2, 1297, 197, 0, 0),
(33, 'kartograph/kartograph.js', 27, 25, 1.08, 9, 50, 1, 7, 0.1428571429, 2, 631, 238, 177, 407, 0, 6, 1121, 160, 2, 407),
(34, 'trifacta/vega', 62, 120, 0.5166666667, 10, 46, 4, 36, 0.1111111111, 29, 67, 276, 67, 184, 1, 11, 2570, 241, 11, 67),
(35, 'stamen/modestmaps-js', 13, 109, 0.119266055, 440, 849, 0, 23, 0, 691, 890, 434, 840, 954, 0, 7, 455, 121, 16, 960),
(36, 'Leaflet/Leaflet', 163, 1759, 0.09266628766, 0, 1, 32, 1051, 0.03044719315, 0, 2, 3378, 1, 8, 1, 170, 8961, 1632, 22, 169),
(37, 'GoodBoyDigital/pixi.js', 135, 588, 0.2295918367, 0, 1, 24, 392, 0.0612244898, 0, 1, 1274, 16, 20, 1, 92, 5838, 1115, 15, 16),
(38, 'photonstorm/phaser', 49, 676, 0.0724852071, 0, 1, 4, 570, 0.00701754386, 0, 3, 2544, 16, 0, 1, 111, 6608, 2145, 34, 16),
(39, 'melonjs/melonJS', 92, 366, 0.2513661202, 0, 4, 1, 144, 0.006944444444, 13, 86, 2763, 0, 11, 1, 26, 1185, 282, 20, 18),
(40, 'gamelab/kiwi.js', 36, 75, 0.48, 2, 22, 0, 12, 0, 102, 156, 685, 40, 78, 1, 11, 413, 99, 12, 40),
(41, 'craftyjs/Crafty', 44, 291, 0.1512027491, 1, 7, 17, 475, 0.03578947368, 1, 26, 1519, 7, 27, 1, 87, 1584, 405, 29, 9),
(42, 'goldfire/howler.js', 23, 150, 0.1533333333, 4, 11, 5, 56, 0.08928571429, 4, 87, 246, 102, 127, 0, 27, 2593, 323, 26, 103),
(43, 'wellcaffeinated/PhysicsJS', 36, 62, 0.5806451613, 2, 37, 5, 21, 0.2380952381, 59, 152, 403, 113, 159, 0, 10, 1991, 245, 5, 200),
(44, 'piqnt/cutjs', 1, 0, 0, 257, 0, 1, 18, 0.05555555556, 5, 293, 317, 34, 47, 1, 2, 661, 89, 4, 43),
(45, 'cocos2d/cocos2d-html5', 73, 178, 0.4101123596, 0, 3, 6, 2187, 0.002743484225, 1, 1, 6173, 1, 8, 1, 72, 1457, 606, 24, 17),
(46, 'playcanvas/engine', 10, 22, 0.4545454545, 0, 0, 3, 36, 0.08333333333, 1, 3, 3057, 0, 5, 1, 10, 860, 141, 324, 10),
(47, 'mishoo/UglifyJS', 33, 133, 0.2481203008, 5, 106, 33, 133, 0.2481203008, 5, 106, 540, 261, 749, 0, 37, 5336, 490, 25, 519),
(48, 'google/closure-library', 294, 24, 12.25, 0, 2, 29, 24, 1.208333333, 8, 12, 4294, 3, 0, 1, 12, 457, 147, 0, 0),
(49, 'jquery/jquery', 88, 56, 1.571428571, 0, 1, 27, 1664, 0.01622596154, 0, 0, 5667, 0, 7, 1, 200, 32418, 7523, 122, 191),
(50, 'blueimp/JavaScript-MD5', 0, 5, 0, 129, 480, 0, 5, 0, 129, 480, 22, 55, 486, 1, 1, 339, 129, 4, 361),
(51, 'jashkenas/underscore', 33, 902, 0.03658536585, 1, 3, 17, 970, 0.0175257732, 0, 3, 1743, 1, 16, 1, 186, 12737, 2821, 57, 74),
(52, 'Sage/streamlinejs', 12, 183, 0.06557377049, 0, 18, 0, 51, 0, 17, 95, 1150, 0, 28, 1, 22, 711, 37, 30, 38),
(53, 'douglascrockford/JSON-js', 1, 26, 0.03846153846, 43, 206, 1, 26, 0.03846153846, 43, 206, 20, 277, 811, 0, 1, 4706, 2982, 0, 0),
(54, 'turtl/js', 61, 93, 0.6559139785, 65, 114, 0, 0, 0, 0, 0, 959, 44, 166, 1, 2, 50, 1, 11, 169),
(55, 'blasten/turn.js', 224, 260, 0.8615384615, 6, 17, 0, 4, 0, 649, 0, 34, 553, 918, 0, 3, 3611, 1221, 0, 0),
(56, 'nnnick/Chart.js', 284, 287, 0.9895470383, 0, 1, 91, 80, 1.1375, 1, 3, 97, 52, 80, 1, 14, 11999, 3523, 6, 83);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `pos_neg` varchar(10) NOT NULL,
  `min` double NOT NULL,
  `max` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id`, `name`, `pos_neg`, `min`, `max`) VALUES
(1, 'ratio', 'negative', 0, 10),
(2, 'yesno', 'positive', 0, 1),
(3, 'temporal', 'negative', 3, 365),
(4, 'commits', 'positive', 0, 10000),
(5, 'issues_open', 'negative', 0, 500),
(6, 'issues_closed', 'positive', 0, 4000),
(7, 'pr_open', 'negative', 0, 60),
(8, 'pr_closed', 'positive', 0, 4000),
(9, 'contributors', 'positive', 0, 150),
(10, 'stars', 'positive', 0, 30000),
(11, 'fork', 'positive', 0, 5000),
(12, 'releases', 'positive', 0, 100);

-- --------------------------------------------------------

--
-- Structure de la table `variable`
--

CREATE TABLE IF NOT EXISTS `variable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `coeff` double NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `variable`
--

INSERT INTO `variable` (`id`, `category`, `name`, `coeff`, `type`) VALUES
(1, 'Issues', 'number open', 0, 'issues_open'),
(2, 'Issues', 'number closed', 0, 'issues_closed'),
(3, 'Issues', 'ratio open/closed', 0.25, 'ratio'),
(4, 'Issues', 'days before last activity', 0, 'temporal'),
(5, 'Issues', 'days before 5th activity', 0.1, 'temporal'),
(6, 'Pull Requests', 'number open', 0, 'pr_open'),
(7, 'Pull Requests', 'number closed', 0, 'pr_closed'),
(8, 'Pull Requests', 'ratio open/closed', 0.25, 'ratio'),
(9, 'Pull Requests', 'days before last activity', 0, 'temporal'),
(10, 'Pull Requests', 'days before 5th activity', 0.1, 'temporal'),
(11, 'Commits', 'number', 0, 'commits'),
(12, 'Commits', 'days before last day with commit', 0, 'temporal'),
(13, 'Commits', 'days before 5th day with commit', 0.1, 'temporal'),
(14, 'Commits', 'any commit in the past 3 months (yes/no)', 0.2, 'yesno'),
(15, 'Others', 'contributors', 0, 'contributors'),
(16, 'Others', 'stars', 0, 'stars'),
(17, 'Others', 'fork', 0, 'fork'),
(18, 'Others', 'releases', 0, 'releases'),
(19, 'Others', 'days last release', 0, 'temporal');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
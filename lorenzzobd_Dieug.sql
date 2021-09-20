-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 10 sep. 2021 à 09:18
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lorenzzobd_dieug`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `poste` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `pass`, `phone`, `poste`) VALUES
(1, 'LeNain', 'Guihelm', 'lenain@gmail.com', '$2y$10$mrd/tKNsb6WGNy6F9EzX/ug3i22Eoi4vhWZ2NUragAAtdqOlCLeaW', '0666666666', 'Admin\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Nos Pizzas'),
(3, 'Nos Boissons'),
(4, 'Nos Vins'),
(5, 'Nos Desserts'),
(6, 'Nos Glaces');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `first_name`, `email`, `phone`, `subject`, `message`) VALUES
(1, 'guillaume', 'guihelm.lenain@gmail.com', '0786804323', 'J\'ai un soucis avec ma commande', 'c\'est de la merde\r\n'),
(2, 'guillaume', 'guihelm.lenain@gmail.com', '0786804323', 'J\'ai un soucis avec ma commande', 'c\'est de la merte');

-- --------------------------------------------------------

--
-- Structure de la table `option_product`
--

DROP TABLE IF EXISTS `option_product`;
CREATE TABLE IF NOT EXISTS `option_product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `opt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_option_category` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `option_product`
--

INSERT INTO `option_product` (`id`, `opt`, `category_id`) VALUES
(1, '24 cm', 2),
(2, '36 cm', 2),
(3, '42 cm', 2),
(4, 'chocolat', 6),
(5, 'vanille', 6),
(6, 'fraise', 6),
(7, 'pistache', 6),
(8, 'blanc', 4),
(9, 'rouge', 4),
(10, 'rosé', 4),
(11, '33cl', 3),
(12, '1l', 3);

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `statut_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `produit_id` int NOT NULL,
  `quantity` float NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `price`
--

DROP TABLE IF EXISTS `price`;
CREATE TABLE IF NOT EXISTS `price` (
  `id` int NOT NULL AUTO_INCREMENT,
  `price` float DEFAULT NULL,
  `option_id` int DEFAULT NULL,
  `produit_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_size` (`option_id`),
  KEY `fk_product_price` (`produit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `price`
--

INSERT INTO `price` (`id`, `price`, `option_id`, `produit_id`) VALUES
(1, 8, 1, 5),
(2, 8, 1, 1),
(3, 8, 1, 4),
(4, 8, 1, 6),
(5, 6.5, NULL, 3),
(6, 8, 1, 7),
(7, 8, 1, 2),
(8, 4.5, 11, 10),
(9, 4.5, 11, 8),
(10, 9.9, 8, 11),
(11, 9.9, 10, 11),
(12, 9.9, 9, 11),
(13, 5.5, 11, 9),
(14, 3.9, 4, 14),
(15, 3.9, 6, 14),
(16, 3.9, 7, 14),
(17, 3.9, 5, 14),
(18, 3.9, NULL, 12),
(19, 3.9, NULL, 15),
(20, 5.5, NULL, 13),
(21, 10, 2, 1),
(22, 10, 2, 5),
(23, 10, 2, 4),
(24, 10, 2, 6),
(25, 10, 2, 7),
(79, 10, 2, 2),
(80, 6, 12, 10),
(81, 6, 12, 9),
(82, 6, 12, 8),
(83, 12.5, 3, 5),
(84, 12.5, 3, 1),
(85, 12.5, 3, 4),
(86, 12.5, 3, 6),
(87, 12.5, 3, 7),
(88, 12.5, 3, 2),
(90, NULL, NULL, 3),
(91, NULL, NULL, 3),
(92, NULL, NULL, 15),
(93, NULL, NULL, 15),
(94, NULL, NULL, 13),
(95, NULL, NULL, 13),
(96, NULL, NULL, 12),
(97, NULL, NULL, 12),
(98, NULL, NULL, 8),
(99, NULL, NULL, 9),
(100, NULL, NULL, 10),
(101, 3.9, 4, 21),
(102, 3.9, 6, 21),
(103, 3.9, 7, 21),
(104, 3.9, 5, 21),
(105, 3.9, 4, 22),
(106, 3.9, 7, 22),
(107, 3.9, 6, 22),
(108, 3.9, 5, 22),
(109, 9.9, 8, 19),
(110, 9.9, 10, 19),
(111, 9.9, 9, 19),
(112, 9.9, 8, 20),
(113, 9.9, 9, 20),
(114, 9.9, 10, 20),
(121, 8, 1, 29),
(122, 10, 2, 29),
(123, 12.5, 3, 29),
(124, 3.9, 4, 30),
(125, 3.9, 5, 30),
(126, 3.9, 6, 30),
(127, 3.9, 7, 30);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_category` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `name`, `details`, `img_path`, `category_id`) VALUES
(1, 'La chorizzo', 'pizza base tomate et chorizzo', 'assets/img/pizza2.jpg', 2),
(2, 'La poulette', 'composition : \r\n- pate fine\r\n- base crème fraiche\r\n- émincer de poulet\r\n- olive noir\r\n- câpre\r\n- roquette\r\n', 'assets/img/pizza3.jpg', 2),
(3, 'La pizza enfant ', 'taille unique pizza classique jambon formage', 'assets/img/pizza4.jpg', 2),
(4, 'La chèvre', 'pizza au chevre', 'assets/img/discover1.jpg', 2),
(5, 'La 4 fromages', 'La 4 fromages', 'assets/img/discover2.jpg', 2),
(6, 'La Mozza', 'Pizza tomate mozza', 'assets/img/discover3.jpg', 2),
(7, 'La pepperoni', 'pizza tomate pepperoni', 'assets/img/discover4.jpg', 2),
(8, 'Schweppes', 'Boisson fraiche gazeuse', 'assets/img/drink1.jpg', 3),
(9, 'Carlsberg', 'La ptite binouze', 'assets/img/drink2.jpg', 3),
(10, 'Coca-Cola', 'Coca-Cola rouge', 'assets/img/drink3.jpg', 3),
(11, 'Jacob\'s Creek', 'réserve shiraz vintage 2017', 'assets/img/drink4.jpg', 4),
(12, 'Tiramisu', 'Tiramisu', 'assets/img/sweet1.jpg', 5),
(13, 'Cookie', 'Cookie', 'assets/img/sweet2.jpg', 5),
(14, 'Magnum', 'Parfum au choix :\r\nchocolat, fraise , vanille ,pistache', 'assets/img/sweet6.jpg', 6),
(15, 'Muffins', 'Muffins', 'assets/img/sweet4.jpg', 5),
(19, 'monbazillac', 'monbazillac', 'assets/img/drink6.jpg', 4),
(20, 'chateauneuf du pape', 'chateauneuf du pape', 'assets/img/drink5.jpg', 4),
(21, 'Corneto', 'Parfum au choix :\r\nchocolat, fraise , vanille ,pistache', 'assets/img/sweet5.jpg', 6),
(22, 'Glace a L\'italienne', 'Parfum au choix :\r\nchocolat, fraise , vanille ,pistache', 'assets/img/sweet7.jpg', 6),
(29, 'La chti', 'pizza du chnord', 'assets/upload/produit16311883592997.jpg', 2),
(30, 'Coupe de Glace', 'glace 3 boules', 'assets/upload/produit16311892820676.jpg', 6);

-- --------------------------------------------------------

--
-- Structure de la table `quantity`
--

DROP TABLE IF EXISTS `quantity`;
CREATE TABLE IF NOT EXISTS `quantity` (
  `id` int NOT NULL AUTO_INCREMENT,
  `value` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `id` int NOT NULL AUTO_INCREMENT,
  `statut` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `suggestion`
--

DROP TABLE IF EXISTS `suggestion`;
CREATE TABLE IF NOT EXISTS `suggestion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `produit_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_suggestion` (`produit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `suggestion`
--

INSERT INTO `suggestion` (`id`, `produit_id`) VALUES
(3, 1),
(2, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cpt_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `post_code` int NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `address`, `cpt_address`, `post_code`, `city`, `phone`, `email`, `pass`) VALUES
(12, 'guillaume', 'lari', '62 rue de la pizza', '', 59000, 'LILLE', '0786804323', 'guihelm.lenain5@gmail.com', '$2y$10$mrd/tKNsb6WGNy6F9EzX/ug3i22Eoi4vhWZ2NUragAAtdqOlCLeaW');

-- --------------------------------------------------------

--
-- Structure de la table `worker`
--

DROP TABLE IF EXISTS `worker`;
CREATE TABLE IF NOT EXISTS `worker` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` text COLLATE utf8mb4_general_ci NOT NULL,
  `phone` int NOT NULL,
  `poste` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `worker`
--

INSERT INTO `worker` (`id`, `first_name`, `last_name`, `email`, `pass`, `phone`, `poste`) VALUES
(3, 'gui', 'lar', 'gui@gmail.com', '$2y$10$u2AdAWytR4bqYZII/HeSXekLeznoYA9iz5txA8YwaPXGggLw3Ch26', 232659845, 'Employé(e) de cuisine');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `option_product`
--
ALTER TABLE `option_product`
  ADD CONSTRAINT `fk_option_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `fk_product_price` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `fk_product_size` FOREIGN KEY (`option_id`) REFERENCES `option_product` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `suggestion`
--
ALTER TABLE `suggestion`
  ADD CONSTRAINT `fk_product_suggestion` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

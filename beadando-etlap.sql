-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Szerver verzió:               5.7.33 - MySQL Community Server (GPL)
-- Szerver OS:                   Win64
-- HeidiSQL Verzió:              11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Struktúra mentése tábla beadando. menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `price` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `contains` text COLLATE utf8_hungarian_ci,
  `type` int(11) DEFAULT NULL,
  `img_url` text COLLATE utf8_hungarian_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- Tábla adatainak mentése beadando.menu: ~2 rows (hozzávetőleg)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `name`, `price`, `contains`, `type`, `img_url`) VALUES
	(1, 'Lobster Bisque', '5.95', 'Lorem, deren, trataro, filede, nerada', 1, '/assets/img/menu/lobster-bisque.jpg'),
	(16, 'cake', '2', 'sugar', 3, '/assets/img/menu/cake.jpg'),
	(24, 'mozzarella', '6', 'sajt', 1, '/assets/img/menu/mozzarella.jpg');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Struktúra mentése tábla beadando. menu_types
CREATE TABLE IF NOT EXISTS `menu_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- Tábla adatainak mentése beadando.menu_types: ~2 rows (hozzávetőleg)
/*!40000 ALTER TABLE `menu_types` DISABLE KEYS */;
INSERT INTO `menu_types` (`id`, `type`) VALUES
	(1, 'starters'),
	(2, 'salads'),
	(3, 'specialty');
/*!40000 ALTER TABLE `menu_types` ENABLE KEYS */;

-- Struktúra mentése tábla beadando. post
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `body` text COLLATE utf8_hungarian_ci NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- Tábla adatainak mentése beadando.post: ~2 rows (hozzávetőleg)
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id`, `title`, `body`, `userid`) VALUES
	(1, 'elso2', 'body321a', 1),
	(2, 'masodika', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 2);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

-- Struktúra mentése tábla beadando. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `password` text COLLATE utf8_hungarian_ci NOT NULL,
  `isadmin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- Tábla adatainak mentése beadando.user: ~3 rows (hozzávetőleg)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `email`, `password`, `isadmin`) VALUES
	(1, 'a', 'a@a.hu', '$2y$10$8nm/Frs70Q8p7XRnKZDB6eApzXHBOYY4m/aVfFRccOuNaM9C8WL9C', 1),
	(6, 'c', 'a@aa.hu', '$2y$10$14XlMAHJfLVNGuYEbILka.m7PYS9LDHzP8/nuAY8.qd2y9ovJjhA2', 0),
	(7, 'aaa', 'a@ab.hu', '$2y$10$hPEyewHjBWjSfZ744s7GWOw0ArmleNrxSC0y4X6e.ue6JpGB4lhfW', 0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Struktúra mentése tábla beadando. user_role
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- Tábla adatainak mentése beadando.user_role: ~0 rows (hozzávetőleg)
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
